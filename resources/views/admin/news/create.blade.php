@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加角色</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.news.store')}}" method="post">
                @include('admin.news._form')
            </form>
        </div>
    </div>
@endsection
