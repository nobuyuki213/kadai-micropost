<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //userに属する複数のポストを取得
    public function microposts()
    {
        return $this->hasMany(Micropost::class);
    }
    
    
    // UserがフォローしているUser達を取得
    public function followings()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'user_id', 'follow_id')->withTimestamps();
    }
    
    // UserをフォローしているUser達を取得
    public function followers()
    {
        return $this->belongsToMany(User::class, 'user_follow', 'follow_id', 'user_id')->withTimestamps();
    }
    
    public function follow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 自分自身では無いかの確認
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me){
            // 既にフォローしていれば何もしない
            return false;
        }else {
            // フォローしていなければフォローを実行
            $this->followings()->attach($userId);
            return true;
        }
    }
    
    public function unfollow($userId)
    {
        // 既にフォローしているかの確認
        $exist = $this->is_following($userId);
        // 自分自身では無いかの確認
        $its_me = $this->id == $userId;
        
        if ($exist || $its_me){
            // フォローしていればフォロー解除を実行
            $this->followings()->detach($userId);
            return true;
        }else {
            // 未フォローなら何もしない
            return false;
        }
    }
    
    public function is_following($userId){
        //UserがフォローするUser達の中にfollow_idが存在するかを確認
        return $this->followings()->where('follow_id', $userId)->exists();
    }
    
    //UserがフォローしたUser達のidと、自分のidを取得する
    public function feed_microposts()
    {
        $follow_user_ids = $this->followings()->pluck('users.id')->toArray();
        
        $follow_user_ids[] = $this->id;
        
        return Micropost::whereIn('user_id', $follow_user_ids);
    }
}
