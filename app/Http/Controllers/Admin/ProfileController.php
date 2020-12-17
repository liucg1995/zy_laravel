<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AdminBaseController;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends AdminBaseController
{
    //

    /**
     * 基本信息
     * 修改密码
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        return view('admin.profile.password', compact('user'));
    }


    public function update(Request $request)
    {

        $password = $request->password;
        $confirm_password = $request->confirm_password;

        if (!empty($password) && $password != $confirm_password) {
            back()->withErrors(['密码与确认密码不一致'])->withInput();
        }

        $admin = Auth::user();
        $admin->fill($request->only(['email', 'name']));
        if (!empty($password)) {
            $admin->password = $password;
        }
        $res = $admin->save();
        if ($res){
            return back()->with('success','更新成功');
        }
        return back()->withErrors(['更新失败'])->withInput();
    }

}
