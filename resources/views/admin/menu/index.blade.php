@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group">
{{--                @can('zixun.menu.create')--}}
                    <a class="layui-btn layui-btn-sm" href="{{ route('admin.menu.create') }}">添 加</a>
{{--                @endcan--}}
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
{{--                    @can('zixun.menu')--}}
{{--                    @endcan--}}
{{--                    @can('zixun.menu.edit')--}}
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
{{--                    @endcan--}}
                        <a class="layui-btn layui-btn-sm" lay-event="edit">权限</a>
{{--                    @can('zixun.menu.destroy')--}}
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
{{--                    @endcan--}}
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
{{--    @can('zixun.menu')--}}
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,height: 500
                    ,url: "{{ route('admin.menu.data') }}" //数据接口
                    ,page: true //开启分页
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true,width:80}
                        ,{field: 'ident', title: '菜单标识'}
                        ,{field: 'title', title: '菜单名称'}
                        ,{field: 'uri', title: '路由'}
                        ,{field: 'icon', title: '图标'}
                        ,{field: 'created_at', title: '创建时间'}
                        ,{field: 'updated_at', title: '更新时间'}
                        ,{fixed: 'right',  align:'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        ,layEvent = obj.event; //获得 lay-event 对应的值
                    if(layEvent === 'del'){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("{{route('admin.menu.destroy')}}",{_method:'delete',_token:'{{csrf_token()}}',ids:data.id},function (result) {
                                if (result.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if(layEvent === 'edit'){
                        location.href = '/admin/menu/'+data.id+'/edit';
                    }
                });

                //返回上一级
                $("#returnParent").click(function () {
                    var pid = $(this).attr("pid");
                    if (pid!='0'){
                        ids = pid.split('_');
                        parent_id = ids.pop();
                        $(this).attr("pid",ids.join('_'));
                    }else {
                        parent_id=pid;
                    }
                    dataTable.reload({
                        where:{model:"permission",parent_id:parent_id},
                        page:{curr:1}
                    })
                })
            })
        </script>
{{--    @endcan--}}
@endsection
