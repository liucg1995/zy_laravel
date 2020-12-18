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
            <div class="layui-form layui-search-form layui-form-pane">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">标题</label>
                        <div class="layui-input-inline">
                            <input type="text" id="title"   autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">发布状态</label>
                        <div class="layui-input-inline">
                            <select name="interest" id="is_pub" lay-filter="aihao">
                                <option value="">请选择</option>
                                <option value="0">未发布</option>
                                <option value="1">已发布</option>
                            </select>
                        </div>
                    </div>

                    <div class="layui-inline">
                        <div class="layui-input-inline">
                            <button class="layui-btn search" id="searchBtn" data-type="getInfo" lay-filter="demo2">查询</button>
                        </div>
                    </div>
                </div>
            </div>
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
                        @{{# if(d.is_pub){ }}
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                        @{{# } }}
                    @endcan
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
    @can('admin.news')
        <script>
            var pub_arr = new Array();
            pub_arr[0] = '未发布';
            pub_arr[1] = '已发布';


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
                        , {
                            field: 'is_pub', title: '发布状态', templet: function (d) {
                                return pub_arr[d.is_pub]
                            }
                        }
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

                $('#searchBtn').on('click', function () {
                    var type = $(this).data('type');
                    active[type] ? active[type].call(this) : '';
                });

                // 点击获取数据
                var active = {
                    getInfo: function () {
                        var title = $('#title').val();
                        // var startTime=$('#startTime').val();
                        // var endTime=$('#endTime').val();
                        var is_pub = $('#is_pub').val();
                        if (title || is_pub) {
                            var index = layer.msg('查询中，请稍候...', {icon: 16, time: false, shade: 0});
                            setTimeout(function () {
                                table.reload('dataTable', {
                                    where: {
                                        'title': title,
                                        'is_pub': is_pub
                                    }
                                });
                                layer.close(index);
                            }, 800);
                        } else {
                            table.reload('dataTable', {
                                where: {
                                    'title': title,
                                    'is_pub': is_pub
                                }
                            });
                        }
                    },
                };


            })






        </script>
    @endcan
@endsection
