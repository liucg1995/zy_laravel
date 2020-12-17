@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>个人信息</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.profile.update')}}" method="post">
                {{ method_field('put') }}
                {{csrf_field()}}
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">登录用户名</label>
                    <div class="layui-input-block">
                        <input type="text" disabled value=" {{$user->username}}"class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">邮箱</label>
                    <div class="layui-input-block">
                        <input type="text" name="email" value="{{ $user->email ?? old('email') }}"
                               placeholder="请输入邮箱" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">姓名</label>
                    <div class="layui-input-block">
                        <input type="text" name="name" value="{{ $user->name ?? old('name') }}"
                               placeholder="请输入姓名" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="password" value="" class="layui-input">
                    </div>
                </div>

                <div class="layui-form-item">
                    <label for="" class="layui-form-label">确认密码</label>
                    <div class="layui-input-block">
                        <input type="password" name="confirm_password" value="" class="layui-input">
                    </div>
                </div>


                <div class="layui-form-item">
                    <div class="layui-input-block">
                        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
