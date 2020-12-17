<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Admin;
use App\Models\Website;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class WebsiteController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.website.index');
    }

    public function data()
    {

        $list = Website::get_list();
        $data = [
            'code' => 0,
            'msg' => '正在请求中...',
            'count' => count($list),
            'data' => $list
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
        //
        $websites = Website::get_list();


        return view('admin.website.create', compact('websites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'title' => 'required|string',
            'parent_id' => 'required|numeric',
        ]);

        $website = new Website();
        $website->fill($request->only(['title', 'parent_id']));
        $res = $website->save();

        if ($res) {
            return redirect(route('admin.website'))->with('success', '添加成功');
        }

        return back()->withErrors(['添加失败'])->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $website = Website::query()->findOrFail($id);
        $websites = Website::get_list();


        return view('admin.website.edit', compact('website', 'websites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required|string',
            'parent_id' => 'required|numeric',
        ]);

        $website = $old_website = Website::query()->findOrFail($id);
        $website->fill($request->only(['title',  'parent_id']));
        $res = $website->save();
        if ($res) {
            return redirect(route('admin.website'))->with('success', '修改成功');
        }

        return back()->withErrors(['添加失败'])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $ids = $request->get('ids');
        if (empty($ids)) {
            return response()->json(['code' => 1, 'msg' => '请选择删除项']);
        }
        $website = Website::query()->findOrFail($ids);
        $res = $website->delete();
        if ($res) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }


}
