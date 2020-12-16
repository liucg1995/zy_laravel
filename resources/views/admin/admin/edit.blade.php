@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新管理员</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.admin.update',['id'=>$admin->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.admin._form')
            </form>
        </div>
    </div>
@endsection
