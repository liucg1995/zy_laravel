{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">所属菜单</label>
    <div class="layui-input-block">

        <select name="parent_id" class="layui-input">
            <option value="0">顶级菜单</option>
            @foreach($websites as $val)
                <option value="{{$val['id']}}"
                        @if(isset($website->parent_id) && $website->parent_id == $val['id']) selected @endif>{!! $val['title'] !!}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">菜单名称</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="{{ old('title', ($website->title ??'' )) }}" lay-verify="required"
               placeholder="请输入角色名" class="layui-input">
    </div>
</div>




<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a class="layui-btn" href="{{route('admin.role')}}">返 回</a>
    </div>
</div>
