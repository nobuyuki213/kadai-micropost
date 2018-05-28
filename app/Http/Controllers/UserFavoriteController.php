<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    // ログインユーザがお気に入り実行によるお気に入り生成
    public function store(Request $request, $id)
    {
        // ログインユーザがお気に入り生成
        \Auth::user()->favorite($id);
        // 元に戻す？
        return redirect()->back();
    }
    
    // ログインユーザがお気に入り解除実行によるお気に入り削除
    public function destroy($id)
    {
        //ログインユーザがお気に入り削除
        \Auth::user()->unfavorite($id);
        // 元にページに戻す？
        return redirect()->back();
    }
}
