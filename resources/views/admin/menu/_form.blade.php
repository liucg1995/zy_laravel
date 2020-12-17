{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">所属菜单</label>
    <div class="layui-input-block">

        <select name="parent_id" class="layui-input">
            <option value="0">顶级菜单</option>
            @foreach($menus as $val)
                <option value="{{$val['id']}}"
                        @if(isset($menu->parent_id) && $menu->parent_id == $val['id']) selected @endif>{!! $val['title'] !!}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">菜单名称</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="{{ old('title', ($menu->title ??'' )) }}" lay-verify="required"
               placeholder="请输入角色名" class="layui-input">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">菜单标识</label>
    <div class="layui-input-block">
        <input type="text" name="ident" value="{{  old('ident' , ($menu->ident ?? "") )  }}" lay-verify="required"
               placeholder="请输入菜单标识" class="layui-input">
    </div>
</div>


<div class="layui-form-item">
    <label for="" class="layui-form-label">菜单路由</label>
    <div class="layui-input-block">
        <input type="text" name="uri" value="{{ old('uri', ($menu->uri ??'' ) ) }}"
               placeholder="请输入菜单路由" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">权限</label>
    <div class="layui-input-block">
        @foreach(config('backend.menu_permission') as $key => $btn)
            <input type="checkbox" name="btns[]" value="{{$key}}"
                   title="{{$btn}}" @if(isset($menu->id)) {{ in_array($key , Arr::pluck($menu->permissions , 'btn')) ? 'checked' : ''  }}  @endif>
        @endforeach
    </div>
</div>

<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a class="layui-btn" href="{{route('admin.role')}}">返 回</a>
    </div>
</div>
