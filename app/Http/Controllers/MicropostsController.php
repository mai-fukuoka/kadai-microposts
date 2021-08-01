<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MicropostsController extends Controller
{
    public function index()
    {
        $data=[];
        if (\Auth::check()) {    // 認証済みの場合
            $user = \Auth::user();
            // ユーザとフォロー中ユーザの投稿の一覧を作成日時の降順で取得
            $microposts=$user->feed_microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data=[
                'user'=>$user,
                'microposts'=>$microposts,];
        }
        
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
             'content'=>'required|max:255',]);
             
        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->microposts()->create([
             'content'=>$request->content,
             ]);
             
        return back();
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $micropost=\App\Micropost::findOrFail($id);
        
        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id()===$micropost->user_id) {
            $micropost->delete();
        }
        return back();
    }
    
    public function show($id)
    {
        // idの値でユーザを検索して取得
        $user=User::findOrFail($id);
        
        // 関係するモデルの件数をロード
        $user->loadRelationshipCounts();
        
        // ユーザの投稿一覧を作成日時の降順で取得
        $microposts=$user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        // ユーザ詳細ビューでそれらを表示
        return view('user.show', [
            'user'=>$user,
            'microposts'=>$microposts,
            ]);
    }
}
