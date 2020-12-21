<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.role.index');
    }

    public function data(Request $request)
    {
        $res = Role::query()->orderBy('id', 'desc')->paginate($request->get('limit', 30))->toArray();
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
        //
        return view('admin.role.create');
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
            'name' => 'required|string',
            'show_name' => 'required|string',
        ]);
        $role = Role::create(['name' => $request->name, 'show_name' => $request->show_name,]);
        if ($role) {
            return redirect(route('admin.role'))->with('success', '添加成功');
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
        $role_info = Role::query()->findOrFail($id);

        return view('admin.role.edit', ['role' => $role_info]);
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
        $role = Role::query()->findOrFail($id);

        $role->name = $request->name;
        $role->show_name = $request->show_name;

        if ($role->save()) {
            return redirect(route('admin.role'))->with('success', '更新成功');
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
        if (Role::destroy($ids)) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }


    /**
     * @param $id
     * 给 角色赋权限
     */
    public function permission($id)
    {
        $role = Role::query()->findOrFail($id);


        $permission_arr = Permission::query()->with('thirdchilds')->where('parent_id', 0)->get();

        foreach ($permission_arr as $p1) {
            $p1->own = $role->hasPermissionTo($p1->id) ? 'checked' : false;
            if ($p1->childs->isNotEmpty()) {
                foreach ($p1->childs as $p2) {
                    $p2->own = $role->hasPermissionTo($p2->id) ? 'checked' : false;
                    if ($p2->childs->isNotEmpty()) {
                        foreach ($p2->childs as $p3) {
                            $p3->own = $role->hasPermissionTo($p3->id) ? 'checked' : false;
                        }
                    }
                }
            }

        }


        return view('admin.role.permission', compact('role', 'permission_arr'));
    }


    /**
     * 存储权限
     */
    public function assignPermission(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $permissions = $request->get('permissions');

        if (empty($permissions)) {
            $role->permissions()->detach();
            return redirect()->to(route('admin.role'))->with(['status' => '已更新角色权限']);
        }
        $role->syncPermissions($permissions);
        return redirect()->to(route('admin.role'))->with(['status' => '已更新角色权限']);
    }


}
