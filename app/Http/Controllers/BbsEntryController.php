<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BbsEntry;

class BbsEntryController extends Controller
{
    function index(){
		//@TODO 投稿一覧画面を表示
		$lists = BbsEntry::all();

        return view('bbs_entry_list', [
            'lists' => $lists,
        ]);
	}

    public function showCreateForm()
    {
        return view('bbs_entry_form');
    }

	function create(){
		//@TODO 投稿処理を行う
		echo "create";
	}
}
