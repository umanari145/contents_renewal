<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Model\Admin;
use App\Model\Item;
use App\Model\ItemTag;
use App\Model\Tag;
use DB;
use Validator;

class ItemController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function regist(Request $request, $item_id)
    {
      $data = null;
      $errors = null;

      $itemObj = new Item();
      $data = $itemObj->find($item_id);

      if ($request->isMethod('post')) {
        $post_data =$request->all();
        list($rules, $messages) = $this->getValidateInfo();

        $validator = Validator::make($post_data, $rules, $messages);

        $data->title     = $post_data['title'];
        $data->movie_url = $post_data['movie_url'];
        $data->tag_arr   = @$post_data['tag'] ?: [];

        if (!$validator->fails()) {

          DB::beginTransaction();
          try {
              $tag_arr = $data->tag_arr;
            unset($data->tag_arr);
            $data->save();
            $itemTag = new ItemTag();
            $itemTag->createItemTags($item_id, $tag_arr);
            DB::commit();
          } catch (\Exception $e) {
            DB::rollback();
          }

          $request->session()->flash('message', '商品の登録に成功しました。');
          return redirect()->route('AdminHome');
        }

        $errors = $validator->errors();

      } else {

        $item_tags = $itemObj->getTagByItem($item_id);
        $item_tag_ids = $item_tags->pluck('id')->toArray();
        $data->tag_arr = $item_tag_ids;
      }

      $tag = new Tag();
      $tags = $tag->where('show_tag',0)->pluck('id','tag');
      return view('pc.admins.items.regist',[
        'item' => $data,
        'tags' => $tags,
        'errors' => $errors
      ]);
    }

    /**
    *   エラーのルールとメッセージ
    *   @return $rules,$message
    */
    private function getValidateInfo()
    {
      $rules = [
        'title' => 'required',
        'movie_url' => 'required|url'
      ];

      $messages = [
        'title.required' => 'タイトルが入力されていません。',
        'movie_url.required' => '動画URLが入力されていません。',
        'movie_url.url' => '正しいURLを入力してください。'
      ];

      return [$rules, $messages];

    }
}
