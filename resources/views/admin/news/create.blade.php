@extends('admin.layout.common')
@section('content')
    <!-- general form elements -->
    <div class="card  card-secondary">
        <div class="card-header">
            <h3 class="card-title">@if($news->id)
                    编辑新闻
                @else
                    新建新闻
                @endif</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        {{--        <form role="form" method="post" action="{{route('news.store')}}">--}}
        @if($news->id)
            <form action="{{ route('news.update', $news->id) }}" method="POST" accept-charset="UTF-8">
                <input type="hidden" name="_method" value="PUT">
                @else
                    <form action="{{ route('news.store') }}" method="POST" accept-charset="UTF-8">
                        @endif

                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">新闻标题</label>
                                <input type="text" name="title"  class="form-control"
                                       value="{{old('title' , $news->title)}}" placeholder="请输入新闻标题">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">来源</label>
                                <input type="text" name="source"  class="form-control"
                                       value="{{old('source' , $news->source)}}" placeholder="请输入来源">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">作者</label>
                                <input type="text" name="author"  class="form-control"
                                       value="{{old('author' , $news->author)}}" placeholder="请输入来源">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">简介</label>
                                <textarea name="intro" class="form-control" id="editor" rows="6"
                                          placeholder="请填入至少三个字符的内容。"
                                          required>{{ old('intro', $news->intro ) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">发布时间</label>
                                <input type="date" class="form-control" name="publish_time"
                                       value="{{old('publish_time',$news->publish_time)}}"
                                       placeholder="请输入发布时间">
                            </div>    <div class="form-group">
                                <label for="exampleInputPassword1">发布时间</label>
                                <script>
                                    var ups = $("div[id^='uploader_']");
                                </script>
                                @uploader(['name' => 'avatar', 'max' => 3, 'accept' => 'jpg,png,gif' , 'upload_list'=> $news->upload_list  ])
                                @uploader('assets')

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
