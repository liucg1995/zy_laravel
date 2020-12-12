<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Upload;
use App\Models\UploadMulti;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['news_list'] = News::paginate(5);
        //
        return view('admin.news.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $news)
    {
        //
        return view('admin.news.create', compact('news'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, News $news)
    {

        //
        $news->fill($request->all());
        $news->user_id = Auth::guard('admin')->id();
        $news->save();


        UploadMulti::save_multi_info($request->avatar, $news->id, 'news');
        return redirect()->to(route('news.index'))->with('success', '新闻创建成功！');
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
    public function edit(News $news)
    {

        $news->upload_list = UploadMulti::get_multi_info($news->id, 'news');


//        $a =   UploadMulti::where("rid",$news->id)->get();
        return view('admin.news.create', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
        $news->update($request->all());

        UploadMulti::save_multi_info($request->avatar, $news->id, 'news');

        return redirect()->to(route('news.index'))->with('success', '更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        $news->delete();
        return redirect()->to(route('news.index'))->with('success', '删除成功！');
    }
}
