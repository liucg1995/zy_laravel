@extends('admin.layout.common')
@section('content')

    <!-- /.card -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">DataTable with default features</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row text-right" style="margin-bottom: 15px">
                <div class="col-sm-12 col-md-12">
                    <a class="btn btn-primary" href="{{route('news.create')}}">添加</a>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>标题</th>
                            <th>发布状态</th>
                            <th>发布时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news_list as $item)
                            <tr>
                                <td>{{$item->title}}</td>
                                <td>{{$item->is_pub_arr}}</td>
                                <td>{{$item->publish_time}}</td>
                                <td>
                                    <span class="meta float-left">

                                    <a href="{{ route('news.edit', $item->id) }}" class="btn  btn-xs" role="button">
                                        <i class="far fa-edit"></i>
                                    </a>
                                                                            </span>

                                    <span class="meta float-left">
                                    <form action="{{ route('news.destroy', $item->id) }}"
                                          onsubmit="return confirm('确定要删除此评论？');"
                                          method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-xs">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </form>
                                    </span>
                                </td>

                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-7">
                    {{ $news_list->links() }}
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

@endsection
