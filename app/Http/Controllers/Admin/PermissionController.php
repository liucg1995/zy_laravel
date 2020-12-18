<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id = 0)
    {
        //
        return view('admin.permission.index', compact('id'));
    }

    public function data(Request $request, $menu_id = false)
    {
        $query = Permission::query();
        if ($menu_id) {
            $query = $query->where('menu_id', $menu_id);
        }
        $res = $query->paginate($request->get('limit'))->toArray();
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
    public function create(Request $request, $id = false)
    {
        //
        return view('admin.permission.create', compact('id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $menu_id = false)
    {
        //

        $this->validate($request, [
            'name' => 'required|string',
            'show_name' => 'required|string',
        ]);

        $permission = new Permission;
        $permission->fill($request->only(['name', 'show_name']));
        $permission->menu_id = $menu_id;
        $permission->btn = 'other';
        $rs = $permission->save();

        if ($rs) {
            return redirect(route('admin.permission', ['id' => $menu_id]))->with('success', '权限添加成功');
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
        return view('admin.permission.edit', compact('permission'));
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
            'name' => 'required|string',
            'show_name' => 'required|string',
        ]);

        $permission = Permission::query()->findOrFail($id);
        $permission->fill($request->only(['name', 'show_name']));
        $rs = $permission->save();

        if ($rs) {
            return redirect(route('admin.permission', ['id' => $permission->menu_id]))->with('success', '权限更新成功');
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
        if ($menu->btn == 'list') {
            return response()->json(['code' => 1, 'msg' => '列表权限禁止删除']);
        }
        $res = $menu->delete();
        if ($res) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }
}
