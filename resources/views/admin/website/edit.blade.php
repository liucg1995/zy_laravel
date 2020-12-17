@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>更新菜单</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.website.update',['id'=>$website->id])}}" method="post">
                {{ method_field('put') }}
                @include('admin.website._form')
            </form>
        </div>
    </div>
@endsection
