{{csrf_field()}}

<div class="layui-form-item">
    <label for="" class="layui-form-label">所属菜单</label>
    <div class="layui-input-block">
        <select name="parent_id" class="layui-input">
            <option value="0">顶级菜单</option>
            @foreach($permission_arr as $val)
                <option value="{{$val['id']}}"
                        @if( isset($permission) && $permission->parent_id == $val['id']) selected @endif>{!! $val['show_name'] !!}</option>
            @endforeach

        </select>
    </div>
</div>
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
    <label for="" class="layui-form-label">权限路由</label>
    <div class="layui-input-block">
        <input type="text" name="route" value="{{  old('route' , ($permission->route ?? '')) }}"
               placeholder="请输入权限路由" class="layui-input">
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <input type="hidden" name="previous_url" value="{{URL::previous()}}" id="">
        <a class="layui-btn" href="{{URL::previous()}}">返 回</a>
    </div>
</div>
