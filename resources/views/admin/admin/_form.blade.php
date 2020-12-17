{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">用户名</label>
    <div class="layui-input-block">
        <input type="text" name="username" value="{{ $admin->username ?? old('username') }}" lay-verify="required"
               placeholder="请输入用户名" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">密码</label>
    <div class="layui-input-block">
        <input type="password" name="password" value="{{  old('password') }}" lay-verify="required" placeholder="请输入密码"
               class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">邮箱</label>
    <div class="layui-input-block">
        <input type="text" name="email" value="{{ $admin->email ?? old('email') }}" lay-verify="required"
               placeholder="请输入用户名" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a class="layui-btn" href="{{route('admin.user')}}">返 回</a>
    </div>
</div>
