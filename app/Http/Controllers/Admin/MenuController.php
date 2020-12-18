<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Models\Admin;
use App\Models\Menu;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class MenuController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $user = $this->get_user_info();
       $usera = $user->can('admin.system');

//       dd($usera);

        return view('admin.menu.index');
    }

    public function data()
    {

        $list = Menu::get_list();
        $data = [
            'code' => 0,
            'msg' => '正在请求中...',
            'data' => $list,
            'count' => count($list),
        ];


        echo json_encode($data);
//        return response()->json($data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $menus = Menu::get_list();


        return view('admin.menu.create', compact('menus'));
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
            'ident' => 'required|string',
//            'icon' => 'required|string',
//            'uri' => 'string',
            'parent_id' => 'required|numeric',
        ]);

        $btns = $request->get('btns', []);

        $menu = new Menu();
        $menu->fill($request->only(['title', 'ident', 'icon', 'uri', 'parent_id']));
        $res = $menu->save();

//        dd($menu->title);


//        $res = Menu::query()->create($request->only(['title', 'ident', 'icon', 'uri', 'parent_id']));

        if ($res) {

            Menu::save_permission_info($menu, $btns, $menu);


            return redirect(route('admin.menu'))->with('success', '添加成功');
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
        $menu = Menu::query()->findOrFail($id);
        $menus = Menu::get_list();


        return view('admin.menu.edit', compact('menu', 'menus'));
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
            'ident' => 'required|string',
//            'icon' => 'required|string',
//            'uri' => 'string',
            'parent_id' => 'required|numeric',
        ]);

        $btns = $request->get('btns', []);



        $menu = $old_menu = Menu::query()->findOrFail($id);
        $menu->fill($request->only(['title', 'ident', 'icon', 'uri', 'parent_id']));
        $res = $menu->save();
        if ($res) {
            Menu::save_permission_info($menu, $btns, $old_menu);
            return redirect(route('admin.menu'))->with('success', '修改成功');
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
        $menu = Menu::query()->findOrFail($ids);
        $res = $menu->delete();
        if ($res) {
            return response()->json(['code' => 0, 'msg' => '删除成功']);
        }
        return response()->json(['code' => 1, 'msg' => '删除失败']);
    }


    public function permission($id)
    {
        $menu = Menu::query()->findOrFail($id);
        return view('admin.menu.permission' , compact('menu'));
    }

    public function permission_data(Request $request)
    {

    }
}
