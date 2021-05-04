<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    //Authクラスのインポート

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();   // ログインユーザーを取得する
        if (is_null($user)) {
            abort(403);
        }
        return view('home');
    }
}
