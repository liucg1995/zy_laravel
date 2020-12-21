@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group">
                @can('admin.permission.create')
                    <a class="layui-btn layui-btn-sm" href="{{ route('admin.permission.create' ) }}">添加</a>
                @endcan
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    @can('admin.permission.edit')
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                    @endcan
                    @can('admin.permission.destroy')
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    @endcan
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
    @can('admin.permission')
        <script>
            layui.config({
                base: '/static/admin/layuiadmin/modules/'
            }).extend({
                treetable: 'treetable-lay/treetable'
            }).use(['layer', 'table', 'form', 'treetable'], function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                var treetable = layui.treetable;

                function tabledata() {

                    //用户表格初始化
                    var dataTable = treetable.render({
                        treeColIndex: 1,          // treetable新增参数
                        treeSpid: 0,             // treetable新增参数
                        treeIdName: 'id',       // treetable新增参数
                        treePidName: 'parent_id',     // treetable新增参数
                        treeDefaultClose: false,   // treetable新增参数
                        treeLinkage: false,        // treetable新增参数
                        elem: '#dataTable'
                        , url: "{{ route('admin.permission.data') }}" //数据接口
                        , page: true //开启分页
                        , cols: [[ //表头
                            {field: 'id', title: 'ID', sort: true, width: 80}
                            , {field: 'show_name', title: '权限名称'}
                            , {field: 'name', title: '权限标识'}
                            , {field: 'route', title: '路由'}

                            , {fixed: 'right', align: 'center', toolbar: '#options'}
                        ]]
                    });

                }
                tabledata();

                //监听工具条
                table.on('tool(dataTable)', function (obj) { //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        , layEvent = obj.event; //获得 lay-event 对应的值
                    if (layEvent === 'del') {
                        layer.confirm('确认删除吗？', function (index) {
                            $.post("{{route('admin.permission.destroy')}}", {
                                _method: 'delete',
                                _token: '{{csrf_token()}}',
                                ids: data.id
                            }, function (result) {
                                if (result.code == 0) {
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } else if (layEvent === 'edit') {
                        location.href = '/admin/permission/' + data.id + '/edit';
                    }
                });

            })
        </script>
    @endcan
@endsection
