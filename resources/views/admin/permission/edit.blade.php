@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新权限</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.permission.update',['id'=>$permission->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.permission._form')
            </form>
        </div>
    </div>
@endsection
