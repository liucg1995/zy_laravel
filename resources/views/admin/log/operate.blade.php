@extends('admin.layout')

@section('content')
    <div class="layui-card">

        <div class="layui-card-body">
            <div class="layui-form layui-search-form layui-form-pane">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="username"   autocomplete="off"
                                   class="layui-input">
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

                    @can('admin.operatelog.destroy')
                        <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">删除</a>
                    @endcan
                </div>
            </script>
        </div>
    </div>
@endsection

@section('script')
    @can('admin.operatelog')
        <script>
            layui.use(['layer','table','form'],function () {
                var layer = layui.layer;
                var form = layui.form;
                var table = layui.table;
                //用户表格初始化
                var dataTable = table.render({
                    elem: '#dataTable'
                    ,url: "{{ route('admin.operatelog.data') }}" //数据接口
                    ,page: true //开启分页
                    ,cols: [[ //表头
                        {checkbox: true,fixed: true}
                        ,{field: 'id', title: 'ID', sort: true,width:80}
                        ,{field: 'username', title: '操作人'}
                        ,{field: 'uri', title: '访问地址'}
                        ,{field: 'parameter', title: '请求参数'}
                        ,{field: 'created_at', title: '登录时间'}
                        ,{fixed: 'right',  align:'center', toolbar: '#options'}
                    ]]
                });

                //监听工具条
                table.on('tool(dataTable)', function(obj){ //注：tool是工具条事件名，dataTable是table原始容器的属性 lay-filter="对应的值"
                    var data = obj.data //获得当前行数据
                        ,layEvent = obj.event; //获得 lay-event 对应的值
                    if(layEvent === 'del'){
                        layer.confirm('确认删除吗？', function(index){
                            $.post("{{ route('admin.operatelog.destroy') }}",{_method:'delete',_token:'{{csrf_token()}}',ids:data.id},function (result) {
                                if (result.code==0){
                                    obj.del(); //删除对应行（tr）的DOM结构
                                }
                                layer.close(index);
                                layer.msg(result.msg)
                            });
                        });
                    } 
                });

                $('#searchBtn').on('click', function () {
                    var type = $(this).data('type');
                    active[type] ? active[type].call(this) : '';
                });

                // 点击获取数据
                var active = {
                    getInfo: function () {
                        var username = $('#username').val();
                        if (username ) {
                            var index = layer.msg('查询中，请稍候...', {icon: 16, time: false, shade: 0});
                            setTimeout(function () {
                                table.reload('dataTable', {
                                    where: {
                                        'username': username,
                                    }
                                });
                                layer.close(index);
                            }, 800);
                        } else {
                            table.reload('dataTable', {
                                where: {
                                    'username': username,
                                }
                            });
                        }
                    },
                };


            })
        </script>
    @endcan
@endsection
