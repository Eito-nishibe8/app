<?php

namespace App\Http\Controllers;

use App\Team;

use App\Post;

use App\Like;

use App\Http\Requests\TeamsCreateRequest;



use Illuminate\Http\Request;

//下記の内容を追記する
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ホーム
    public function index(Request $request)
    {
        $area = $request->area;
        $time = $request->time;
        $level = $request->level;

        $like_model = new Like;

        $query = Team::query();

        if (!empty($area)) {
            $query->where('area', $area);
        }

        if (!empty($time)) {
            $query->where('time', $time);
        }

        if (!empty($level)) {
            $query->where('level', $level);
        }

        $teams = $query->get();

        return view('teams.index', [
            'teams' => $teams,
            'like_model' => $like_model,
            'area' => $area,
            'time' => $time,
            'level' => $level,
        ]);
    }

    public function ajaxLike(Request $request)
    {
        $id = Auth::user()->id;
        $team_id = $request->team_id;
        $like = new Like;

        // 空でない（既にいいねしている）なら
        if ($like->like_exist($id, $team_id)) {
            //likesテーブルのレコードを削除
            $like = Like::where('team_id', $team_id)->where('user_id', $id)->delete();
        } else {
            //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
            $like = new like;
            $like->team_id = $request->team_id;
            $like->user_id = Auth::user()->id;
            $like->save();
        }

        return response()->json();
    }

    //チームページ
    public function teampage()
    {
        $team =  Team::where('user_id', Auth::id())->first();

        if ($team == null) {
            return redirect()->route('teams.create');
        }

        $posts = Post::where('user_id', Auth::id())->get();

        return view('teams.teampage', [
            'team' => $team,
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //チーム作成ページ
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //新規登録
    public function store(TeamsCreateRequest $request)
    {
        $team = new Team;

        $team->team_name = $request->team_name;
        ///ユーザーIDの取得
        $team->user_id = Auth::id();
        $team->area = $request->area;
        $team->level = $request->level;
        $team->time = $request->time;
        $team->profile = $request->profile;

        // アップロードされたファイルの取得
        $team->team_icon = $request->file('team_icon')->getClientOriginalName();
        $dir = 'image';
        // 取得したファイル名で保存
        $request->file('team_icon')->storeAs('public/' . $dir, $team->team_icon);

        $team->save();

        return redirect()->route('teampage');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //チームの投稿詳細
    public function show($id)
    {
        $team = Team::find($id);

        return view('teams.show', [
            'team' => $team
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //チーム情報編集
    public function edit($id)
    {
        $team =  Team::where('user_id', Auth::id())->first();

        return view('teams.edit', [
            'team' => $team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //チーム情報編集
    public function update(Request $request, $id)
    {
        $team =  Team::find($id);

        $team->team_name = $request->team_name;
        ///ユーザーIDの取得
        $team->user_id = Auth::id();
        $team->area = $request->area;
        $team->level = $request->level;
        $team->time = $request->time;
        $team->profile = $request->profile;

        // アップロードされたファイルの取得
        $team->team_icon = $request->file('team_icon')->getClientOriginalName();
        $dir = 'image';
        // 取得したファイル名で保存
        $request->file('team_icon')->storeAs('public/' . $dir, $team->team_icon);

        $team->save();

        return redirect()->route('teampage');
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
}
