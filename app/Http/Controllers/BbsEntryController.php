<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBbs;
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

	function create(CreateBbs $request){
		//@TODO 投稿処理を行う
        $bbsEntry = new BbsEntry;   // BbsEntryモデルのインスタンス作成

        // post すべてのパラメータを受取
        $form = $request->all();
        unset($form['_token']);
        // DB保存
        $bbsEntry->fill($form)->save();
        // 投稿後、最新投稿一覧を取得して、一覧画面を表示
        return redirect('home')->with('message', '投稿しました。');
	}

    public function showEditForm(int $id)
    {
        $item = BbsEntry::find($id);

        return view('edit', [
            'item' => $item,
        ]);
    }

    public function edit(int $id, CreateBbs $request)
    {
        $bbsEdit = BbsEntry::find($id);

        $editForm = $request->all();
        unset($editForm['_token']);

        // DB更新
        $bbsEdit->fill($editForm)->save();
        // 投稿編集後、最新投稿一覧を取得して、一覧画面を表示
        return redirect('home')->with('message', '投稿を編集しました。');
    }

    public function showRemoveForm(int $id)
    {
        $item = BbsEntry::find($id);

        return view('remove', [
            'item' => $item,
        ]);
    }

    public function remove(int $id)
    {
        BbsEntry::where('id', '=',$id)->delete();

        return redirect('home')->with('message', '投稿を削除しました。');
    }
}
