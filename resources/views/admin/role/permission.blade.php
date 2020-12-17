@extends('admin.layout')

@section('content')
    <style>
        .cate-box {
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f0f0f0
        }

        .cate-box dt {
            margin-bottom: 10px;
        }

        .cate-box dt .cate-first {
            padding: 10px 20px
        }

        .cate-box dd {
            padding: 0 50px
        }

        .cate-box dd .cate-second {
            margin-bottom: 10px
        }

        .cate-box dd .cate-third {
            padding: 0 40px;
            margin-bottom: 10px
        }
    </style>
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <h2>角色 【{{$role->name}}】分配权限</h2>
        </div>
        <div class="layui-card-body">
            <form action="{{route('admin.role.assignPermission',['id'=>$role->id])}}" method="post" class="layui-form">
                {{csrf_field()}}
                {{method_field('put')}}
                @forelse($menus as $menu)

                    <dl class="cate-box">
                        <dt>
                            <div class="cate-first">
                                <input id="menu{{$menu['id']}}" type="checkbox" name="permissions[]"
                                                           value="{{$menu['list_id']['id']}}" title="{{$menu['title']}}"
                                                           lay-skin="primary" {{$menu['list_id']['own']??''}} ></div>
                        </dt>
                        <dd>
                            @if(isset($menu['permission']) && $menu['level'])
                                <div class="cate-third" style="margin-left: {{$menu['level']*3}}em">
                                    @foreach($menu['permission'] as $thild)
                                        <input type="checkbox" id="menu{{$menu['id']}}-{{$thild['id']}}"
                                               name="permissions[]" value="{{$thild['id']}}"
                                               title="{{$thild['show_name']}}" lay-skin="primary" {{$thild['own']??''}}>
                                    @endforeach
                                </div>
                            @endif
                        </dd>
                    </dl>
                @empty
                    <div style="text-align: center;padding:20px 0;">
                        无数据
                    </div>
                @endforelse
                <div class="layui-form-item">
                    <button type="submit" class="layui-btn" lay-submit="">确 认</button>
                    <a href="{{route('admin.role')}}" class="layui-btn">返 回</a>
                </div>

            </form>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        layui.use(['layer', 'table', 'form'], function () {
            var layer = layui.layer;
            var form = layui.form;
            var table = layui.table;

            form.on('checkbox', function (data) {
                var check = data.elem.checked;//是否选中
                var checkId = data.elem.id;//当前操作的选项框
                if (check) {
                    //选中
                    var ids = checkId.split("-");
                    if (ids.length == 3) {
                        //第三极菜单
                        //第三极菜单选中,则他的上级选中
                        $("#" + (ids[0] + '-' + ids[1])).prop("checked", true);
                        $("#" + (ids[0])).prop("checked", true);
                    } else if (ids.length == 2) {
                        //第二季菜单
                        $("#" + (ids[0])).prop("checked", true);
                        $("input[id*=" + ids[0] + '-' + ids[1] + "]").each(function (i, ele) {
                            $(ele).prop("checked", true);
                        });
                    } else {
                        //第一季菜单不需要做处理
                        $("input[id*=" + ids[0] + "-]").each(function (i, ele) {
                            $(ele).prop("checked", true);
                        });
                    }
                } else {
                    //取消选中
                    var ids = checkId.split("-");
                    if (ids.length == 2) {
                        //第二极菜单
                        $("input[id*=" + ids[0] + '-' + ids[1] + "]").each(function (i, ele) {
                            $(ele).prop("checked", false);
                        });
                    } else if (ids.length == 1) {
                        $("input[id*=" + ids[0] + "-]").each(function (i, ele) {
                            $(ele).prop("checked", false);
                        });
                    }
                }
                form.render();
            });
        })
    </script>
@endsection

