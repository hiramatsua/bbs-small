<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateBbs;
use App\Models\BbsEntry;

class BbsEntryController extends Controller
{
    function index(){
		//@TODO 投稿一覧画面を表示
        // $lists = BbsEntry::all();
        // 新しい投稿から表示させるように変更 20210506-A
        // ページング追加 20210506-C
		$lists = BbsEntry::orderBy("updated_at", "desc")->paginate(10);

        return view('bbs_entry_list', [
            'lists' => $lists,
        ]);
	}

    // 投稿の新規登録フォーム
    public function showCreateForm()
    {
        return view('bbs_entry_form');
    }

    // 投稿の新規登録処理
    public function create(CreateBbs $request)
    {
        $bbsEntry = new BbsEntry;   // BbsEntryモデルのインスタンス作成

        // post すべてのパラメータを受取
        $form = $request->all();
        unset($form['_token']);
        // DB保存
        $bbsEntry->fill($form)->save();
        // 投稿後、最新投稿一覧を取得して、一覧画面を表示
        return redirect('home')->with('message', '投稿しました。');
	}

    // 投稿の編集フォーム
    public function showEditForm(int $id)
    {
        $item = BbsEntry::find($id);

        return view('edit', [
            'item' => $item,
        ]);
    }

    // 投稿の編集処理
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

    // 投稿の削除フォーム
    public function showRemoveForm(int $id)
    {
        $item = BbsEntry::find($id);

        return view('remove', [
            'item' => $item,
        ]);
    }

    // 投稿の削除処理
    public function remove(int $id)
    {
        BbsEntry::where('id', '=',$id)->delete();

        return redirect('home')->with('message', '投稿を削除しました。');
    }
}
