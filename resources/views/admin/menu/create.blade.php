@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加菜单</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.menu.store')}}" method="post">
                @include('admin.menu._form')
            </form>
        </div>
    </div>
@endsection
