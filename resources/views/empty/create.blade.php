@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加分类</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.admin.store')}}" method="post">
                @include('admin.admin._form')
            </form>
        </div>
    </div>
@endsection
