<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.permission.index');
    }

    public function data(Request $request)
    {
        $res = Permission::query()->get();
        $data = [
            'code' => 0,
            'msg' => '正在请求中...',
            'count' => $res->count(),
            'data' => $res
        ];
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $permissions = Permission::query()->with('childs')->where('parent_id', 0)->get();
        $permission_arr = [];
        foreach ($permissions as $val) {
            $permission_arr[] = $val;
            if ($val['childs']) {
                foreach ($val['childs'] as $index => $child) {
                    $child['show_name'] = '         ' . '├' . $child['show_name'];
                    $permission_arr[] = $child;
                }
            }
        }

        return view('admin.permission.create', compact('permission_arr'));
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
            'parent_id' => 'required|numeric',
            'name' => 'required|string',
            'show_name' => 'required|string',
        ]);

        $permission = new Permission;
        $permission->fill($request->only(['name', 'show_name', 'route' ,'parent_id']));
        $rs = $permission->save();

        if ($rs) {
            return redirect($request->get('previous_url'))->with('success', '权限添加成功');
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
        $permission = Permission::query()->findOrFail($id);
        $permissions = Permission::query()->with('childs')->where('parent_id', 0)->get();
        $permission_arr = [];
        foreach ($permissions as $val) {
            $permission_arr[] = $val;
            if ($val['childs']) {
                foreach ($val['childs'] as $index => $child) {
                    $child['show_name'] = '         ' . '├' . $child['show_name'];
                    $permission_arr[] = $child;
                }
            }
        }


        return view('admin.permission.edit', compact('permission' , 'permission_arr'));
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
            'parent_id' => 'required|numeric',
            'name' => 'required|string',
            'show_name' => 'required|string',
        ]);

        $permission = Permission::query()->findOrFail($id);
        $permission->fill($request->only(['name', 'show_name', 'route' ,'parent_id']));
        $rs = $permission->save();

        if ($rs) {
            return redirect($request->get('previous_url'))->with('success', '权限更新成功');
        }

        return back()->withErrors(['更新失败'])->withInput();

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
        $menu = Permission::query()->findOrFail($ids);
        $res = $menu->delete();
        if ($res) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }
}
