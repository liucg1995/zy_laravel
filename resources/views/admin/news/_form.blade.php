{{csrf_field()}}
<div class="layui-form-item">
    <label for="" class="layui-form-label">所属菜单</label>
    <div class="layui-input-block">

        <select name="wid" class="layui-input">
            <option value="0">顶级菜单</option>
            @foreach($menus as $val)
                <option value="{{$val['id']}}"
                        @if(isset($news->wid) && $news->wid == $val['id']) selected @endif>{!! $val['title'] !!}</option>
            @endforeach

        </select>
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">新闻标题</label>
    <div class="layui-input-block">
        <input type="text" name="title" value="{{ old('title' , ($news->title ?? '')) }}" lay-verify="required"
               placeholder="请输入新闻标题" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">新闻来源</label>
    <div class="layui-input-block">
        <input type="text" name="source" value="{{ old('source' , ($news->source ?? '')) }}"
               placeholder="请输入新闻来源" class="layui-input">
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">发布者</label>
    <div class="layui-input-block">
        <input type="text" name="author" value="{{ old('author' , ($news->author ?? '')) }}"
               placeholder="请输入发布者" class="layui-input">
    </div>
</div>


<div class="layui-form-item">
    <label for="" class="layui-form-label">发布时间</label>
    <div class="layui-input-block">

        <input type="text" name="publish_time" id="publish_time" value="{{ old('publish_time' , ($news->publish_time ?? '')) }}" lay-verify="date" placeholder="yyyy-MM-dd" autocomplete="off" class="layui-input" lay-key="1">
    </div>
</div>
<div class="layui-form-item">
    <label for="" class="layui-form-label">发布状态</label>
    <div class="layui-input-block">

        <input type="radio" name="is_pub" value="0"
               title="未发布" {{ (old("is_pub" ,($news->is_pub??""))==0) ? 'checked':''}}>
        <input type="radio" name="is_pub" value="1"
               title=" 已发布" {{ (old("is_pub" ,($news->is_pub??""))==1) ? 'checked':''}}>

    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">简介</label>
    <div class="layui-input-block">
        <textarea name="intro" class="layui-textarea">{{ old('intro' , ($news->intro ?? '')) }}</textarea>
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">代表图</label>
    <div class="layui-input-block">
        {!!      form_upload_image('image','news', $news??'') !!}
    </div>
</div>

<div class="layui-form-item">
    <label for="" class="layui-form-label">附件</label>
    <div class="layui-input-block">
        {!!      form_upload_attaches('file','news', $news->id??'') !!}
    </div>
</div>


<div class="layui-form-item">
    <div class="layui-input-block">
        <button type="submit" class="layui-btn" lay-submit="" lay-filter="formDemo">确 认</button>
        <a class="layui-btn" href="{{URL::previous()}}">返 回</a>
    </div>
</div>


<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#publish_time' //指定元素
        });
    });
</script>
