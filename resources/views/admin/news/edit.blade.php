@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新新闻</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.news.update',['id'=>$news->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.news._form')
            </form>
        </div>
    </div>
@endsection
