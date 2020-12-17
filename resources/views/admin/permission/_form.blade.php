{{csrf_field()}}


<div class="layui-form-item">
    <label for="" class="layui-form-label">权限名称</label>
    <div class="layui-input-block">
        <input type="text" name="show_name" value="{{  old('show_name' , ( $permission->show_name ?? '' ) ) }}"
               lay-verify="required"
               placeholder="请输入权限名称" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">权限标识</label>
    <div class="layui-input-block">
        <input type="text" name="name" value="{{  old('name' , ($permission->name ?? '')) }}" lay-verify="required"
               placeholder="请输入权限标识" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a class="layui-btn" href="{{URL::previous()}}">返 回</a>
    </div>
</div>
