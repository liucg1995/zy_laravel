@extends('admin.layout')

@section('content')
    <div class="layui-card">
        <div class="layui-card-header layuiadmin-card-header-auto">
            <div class="layui-btn-group">
                @can('admin.news.create')
                    <a class="layui-btn layui-btn-sm" href="{{ route('admin.news.create') }}">添 加</a>
                @endcan
            </div>
        </div>
        <div class="layui-card-body">
            <table id="dataTable" lay-filter="dataTable"></table>
            <script type="text/html" id="options">
                <div class="layui-btn-group">
                    @can('admin.news.edit')
                        <a class="layui-btn layui-btn-sm" lay-event="edit">编辑</a>
                    @endcan
                    @can('admin.news.audit')
                        <a class="layui-btn layui-btn-sm" lay-event="audit">审核</a>
                    @endcan
                    @can('admin.news.destroy')
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    @endcan
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
    @can('admin.news')
        <script>
            layui.use(['layer', 'table', 'form'], function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    , url: "{{ route('admin.news.data') }}" //数据接口
                    , page: true //开启分页
                    , cols: [[ //表头
                        {checkbox: true, fixed: true}
                        , {field: 'id', title: 'ID', sort: true}
                        , {field: 'title', title: '标题'}
                        , {field: 'source', title: '来源'}
                        , {field: 'author', title: '发布者'}
                        , {field: 'publish_time', title: '发布时间'}
                        , {field: 'is_pub', title: '发布状态'}
                        , {fixed: 'right', align: 'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function (obj) { //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        , layEvent = obj.event; //获得 lay-event 对应的值
                    if (layEvent === 'del') {
                        layer.confirm('确认删除吗？', function (index) {
                            $.post("{{ route('admin.news.destroy') }}", {
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
                        location.href = '/admin/news/' + data.id + '/edit';
                    }
                });
            })
        </script>
    @endcan
@endsection
