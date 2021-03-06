<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Micropost;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(2);
        return view('users.index', [
            'users' => $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    // User ’が’ フォローしているUser一覧の取得とビューへのそれら値を渡す
    public function followings($id)
    {
        $user = User::find($id);
        $followings = $user->followings()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followings,
            ];
        
        $data += $this->counts($user);
        
        return view('users.followings', $data);
    }
    
    // User ’を’ フォローしているUser一覧の取得とビューへのそれら値を渡す
    public function followers($id)
    {
        $user = User::find($id);
        
        $followers = $user->followers()->paginate(10);
        
        $data = [
            'user' => $user,
            'users' => $followers
            ];
            
        $data += $this->counts($user);
        
        return view('users.followers', $data);
    }
    
    /*
    *Userお気に入り機能追加をここから記述開始
    */

    // userがお気に入りしたポスト一覧リストの取得
    public function favorites($id)
    {
        $user = User::find($id);
        
        $favorites = $user->user_favorites()->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $favorites,
            ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
}
