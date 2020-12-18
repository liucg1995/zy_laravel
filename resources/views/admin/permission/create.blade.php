@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>添加权限</h2>
        </div>
        <div class="layui-card-body">
            <form class="layui-form" action="{{route('admin.permission.store' ) }}" method="post">
                <div class="layui-form-item">
                    <label for="" class="layui-form-label">所属菜单</label>
                    <div class="layui-input-block">
                        <select name="menu_id" class="layui-input">
                            <option value="0">顶级菜单</option>
                            @foreach($menus as $val)
                                <option value="{{$val['id']}}"
                                        @if( $id == $val['id']) selected @endif>{!! $val['title'] !!}</option>
                            @endforeach

                        </select>
                    </div>
                </div>
                @include('admin.permission._form')
            </form>
        </div>
    </div>
@endsection
