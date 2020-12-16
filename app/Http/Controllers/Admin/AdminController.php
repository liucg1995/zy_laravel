<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\News;
use App\Models\Role;
use Illuminate\Http\Request;
use \App\Http\Controllers\AdminBaseController;

class AdminController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.admin.index');
    }

    public function data(Request $request)
    {
        $res = Admin::query()->orderBy('id', 'desc')->paginate($request->get('limit', 30))->toArray();
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
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Admin $admin)
    {
        //

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string',
            'email' => 'email',
        ]);

        $count = Admin::where(['username' => $request->username])->count();

        if ($count) {
            return back()->withErrors(['用户名已存在'])->withInput();
        }

        $admin->fill($request->only(['username', 'email', 'password']));
        $rs = $admin->save();

        if ($rs) {
            return redirect(route('admin.admin'))->with('success', '添加成功');

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
        $info = Admin::findorfail($id);

        if ($info) {
            return view('admin.admin.edit', ['admin' => $info]);
        } else {
            return back()->withErrors(['参数有误']);
        }


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
            'password' => 'required|string',
            'email' => 'email',
        ]);
        $category = Admin::findOrFail($id);
        if ($category->update($request->only(['email', 'password']))) {
            return redirect(route('admin.admin'))->with(['status' => '更新成功']);
        }
        return redirect(route('admin.admin'))->withErrors(['status' => '系统错误']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $ids = $request->get('ids');
        if (empty($ids)) {
            return response()->json(['code' => 1, 'msg' => '请选择删除项']);
        }
        if (Admin::destroy($ids)) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }


    public function role(Request $request, $id)
    {

        $admin = Admin::query()->findOrFail($id);

        $roles = Role::query()->get();
        foreach ($roles as $index => $role) {

            $role->own = $admin->hasrole($role);
        }

        return view('admin.admin.role', compact('admin', 'roles'));

    }

    public function assignrole(Request $request, $id)
    {
        $admin = Admin::query()->findOrFail($id);

        $roles = $request->get('roles', []);
        if ($admin->syncRoles($roles)){
            return redirect()->to(route('admin.admin'))->with(['status'=>'更新用户角色成功']);
        }
        return redirect()->to(route('admin.admin'))->withErrors('系统错误');
    }
}
