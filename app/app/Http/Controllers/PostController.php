<?php

namespace App\Http\Controllers;

use App\Post;

use App\Team;

use App\User;

use App\Like;

use App\Http\Requests\PostUpdateRequest;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //一般マイページ表示
    public function index()
    {
        $likes =  Like::where('user_id', Auth::id())->get();

        return view('posts.index', [
            'likes' => $likes,
        ]);
    }

    //一般マイページ表示
    public function LikeIndex()
    {
        $like_model = new Like;

        $teams = Team::all();

        return view('teams.index', [
            'teams' => $teams,
            'like_model' => $like_model,
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //チーム新規投稿
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //登録処理
    public function store(Request $request)
    {
        $post = new Post;

        ///ユーザーIDの取得
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->episode = $request->episode;

        // アップロードされたファイルの取得
        $post->image = $request->file('image')->getClientOriginalName();
        $dir = 'image';
        // 取得したファイル名で保存
        $request->file('image')->storeAs('public/' . $dir, $post->image);

        $post->save();

        return redirect()->route('teampage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //詳細表示
    public function show(Request $request, $id)
    {
        $post = Post::find($id);

        return view('posts.show', [
            'post' => $post,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //編集表示
    public function edit($id)
    {
        return view('posts.edit', [
            'id' => $id,
        ]);
    }
    public function postEdit(Post $post)
    {
        return view('posts.postedit', [
            'post' => $post,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //編集の処理
    public function update(PostUpdateRequest $request, $id)
    {
        $user =  User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->file('icon') != null) {
            // アップロードされたファイルの取得
            $user->icon = $request->file('icon')->getClientOriginalName();
            $dir = 'image';
            // 取得したファイル名で保存
            $request->file('icon')->storeAs('public/' . $dir, $user->icon);
        }

        $user->save();

        return redirect()->route('teampage');
    }


    public function postUpdate(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->episode = $request->episode;
        $post->user_id = Auth::id();

        if ($request->file('image') != null) {
            // アップロードされたファイルの取得
            $post->image = $request->file('image')->getClientOriginalName();
            $dir = 'image';
            // 取得したファイル名で保存
            $request->file('image')->storeAs('public/' . $dir, $post->image);
        }

        $post->save();

        return redirect()->route('teampage');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //削除
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('teampage');
    }
}
