<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterAccountRequest;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role === 1) {
            $team = Team::where('user_id', Auth::id())->get();

            if ($team->isEmpty()) {
                return redirect()->route('teams.create');
            }
        }
        return redirect()->route('teams.index');
    }

    public function editProfile(Request $request)
    {
        $user = Auth::user();

        ///ユーザーIDの取得
        $user->name = $request->name;
        $user->email = $request->email;

        // アップロードされたファイルの取得
        $user->icon = $request->file('icon')->getClientOriginalName();
        $dir = 'image';
        // 取得したファイル名で保存
        $request->file('icon')->storeAs('public/' . $dir, $user->icon);

        $user->save();

        return redirect()->route('posts.index');
    }

    // 作成アカウント選択ページ表示
    public function choose()
    {
        return view('choose');
    }

    // 個人アカウント作成フォーム表示
    public function registerForm()
    {
        return view('auth.registerAccount');
    }

    // 個人アカウント作成
    public function userRegister(RegisterAccountRequest $data)
    {
        $user = new User;

        $user->name = $data->name;
        $user->email = $data->email;
        $user->password = Hash::make($data->password);
        $user->role = 0;

        $user->save();

        Auth::login($user);

        return redirect()->route('teams.index');
    }
}
