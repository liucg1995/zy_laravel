<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Menu;
use App\Models\News;
use App\Models\Upload;
use App\Models\UploadMulti;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use function Psy\sh;

class NewsController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = News::query()->orderBy('id', 'desc')->paginate(2);

        return view('admin.news.index', compact('list'));
    }

    public function data(Request $request)
    {

        $res = News::get_data($request->only('title', 'is_pub'), $request->get('limit', 30));
        $data = [
            'code' => 0,
            'msg' => '正在请求中...',
            'count' => $res['total'],
            'data' => $res['data']
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::get_list();
        //
        return view('admin.news.create', compact('menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

        //
        $news = new News();
        $news->fill($request->all());
        $news->user_id = Auth::id();
        $news->save();


        UploadMulti::save_multi_info($request->file, $news->id, 'news');
        return redirect()->to(route('admin.news'))->with('success', '新闻创建成功！');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menus = Menu::get_list();
        $news = News::query()->findOrFail($id);

        return view('admin.news.edit', compact('news', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
        $news = News::query()->findOrFail($id);
        $news->fill($request->all());
        $news->save();

        UploadMulti::save_multi_info($request->file, $news->id, 'news');

        return redirect()->to(route('admin.news'))->with('success', '更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)) {
            return response()->json(['code' => 1, 'msg' => '请选择删除项']);
        }
        $menu = News::query()->findOrFail($ids);
        $res = $menu->delete();
        if ($res) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }
}
