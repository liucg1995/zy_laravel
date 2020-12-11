@extends('admin.layout.common')
@section('content')
    <!-- general form elements -->
    <div class="card  card-secondary">
        <div class="card-header">
            <h3 class="card-title">添加新闻</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" method="post" action="{{route('news.store')}}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">新闻标题</label>
                    {!! form_input('title',$news->title ,'class="form-control" placeholder="请输入新闻标题" ') !!}
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">来源</label>
                    {!! form_input('source',$news->source ,'class="form-control" placeholder="请输入来源" ') !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">作者</label>
                    {!! form_input('author',$news->author ,'class="form-control" placeholder="请输入作者" ') !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">简介</label>
                    {!! form_textarea('intro',$news->intro ,'class="form-control" placeholder="请输入简介" ') !!}
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">发布时间</label>
                    <input type="date" class="form-control" name="publish_time" value="{{$news->publish_time}}"
                           placeholder="请输入发布时间">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">是否发布</label>
                    <div>
{{--                        {{$news->getOriginal('is_pub')}}--}}
                        {!! form_radio('is_pub',[0=>'未发布' ,1=>'已发布'] , $news->is_pub) !!}
                    </div>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
@endsection
