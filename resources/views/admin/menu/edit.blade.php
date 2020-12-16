@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新菜单</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.menu.update',['id'=>$menu->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.menu._form')
            </form>
        </div>
    </div>
@endsection
