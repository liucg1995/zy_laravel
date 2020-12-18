<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin std - 通用后台管理模板系统（iframe标准版）</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/admin/layuiadmin/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="/static/admin/layuiadmin/style/admin.css" media="all">
    <link rel="stylesheet" href="/static/admin/css/style.css" media="all">
    <link rel="stylesheet" href="/vendor/uploader/css/uploader.css" media="all">
    <link rel="stylesheet" href="/vendor/uploader/css/font-awesome.min.css" media="all">
    <link rel="stylesheet" href="/vendor/uploader/css/webuploader.css" media="all">


    <script src="/static/admin/layuiadmin/layui/layui.js"></script>
    {{--<script>--}}
    {{--    layui.config({--}}
    {{--        base: '/static/admin/layuiadmin/' //静态资源所在路径--}}
    {{--    }).extend({--}}
    {{--        index: 'lib/index' //主入口模块--}}
    {{--    }).use('index');--}}
    {{--</script>--}}

    {{--<script src="/js/jquery.min.js"></script>--}}
    <script src="https://cdn.bootcdn.net/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    {{--<script src="/js/socket.io.js"></script>--}}
    <script src="/static/admin/layuiadmin/layui/layui.js"></script>
    <script src="/vendor/uploader/js/webuploader.js"></script>
    <script src="/vendor/uploader/js/Mywebuploader.js"></script>

</head>
<body class="layui-layout-body">

<div id="LAY_app" class="layadmin-tabspage-none">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect>
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>

            </ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">
                {{--                <li class="layui-nav-item" lay-unselect>--}}
                {{--                    <a lay-href="{{route('admin.message.mine')}}" layadmin-event="message" lay-text="消息中心">--}}
                {{--                        <i class="layui-icon layui-icon-notice"></i>--}}
                {{--                        <!-- 如果有新消息，则显示小圆点 -->--}}
                {{--                        @if($unreadMessage)--}}
                {{--                            <span class="layui-badge-dot"></span>--}}
                {{--                        @endif--}}
                {{--                    </a>--}}
                {{--                </li>--}}

                <li class="layui-nav-item" lay-unselect style="margin-right: 10px">
                    <a href="javascript:;">
                        <cite>{{Auth::user()->name}}</cite>
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="{{route('admin.profile')}}">基本资料</a></dd>
                        <hr>
                        <dd style="text-align: center;"><a href="{{route('admin.logout')}}">退出</a></dd>
                    </dl>
                </li>
            </ul>
        </div>

        <!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <div class="layui-logo">
                    <span>laravel</span>
                </div>

                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
                    lay-filter="layadmin-system-side-menu">
                    <li data-name="home" class="layui-nav-item layui-nav-itemed">
                        <a href="javascript:;" lay-tips="主页" lay-direction="2">
                            <i class="layui-icon layui-icon-home"></i>
                            <cite>主页</cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd data-name="console">
                                <a href="{{route('admin.home')}}">控制台</a>
                            </dd>
                        </dl>
                    </li>
                    @foreach($layout_menus as $child)
                        @can($child['ident'])
{{--                        @if($user_info->can())--}}
                            <li class="layui-nav-item layui-nav-itemed">
                                <a href="javascript:;" lay-tips="{{$child['title']}}" lay-direction="2">
                                    <i class="layui-icon layui-icon-home"></i>
                                    <cite>{{$child['title']}}</cite>
                                </a>
                                @foreach($child['_child'] as $second)
                                    @can($second['ident'])
                                    <dl class="layui-nav-child">
                                        <dd>
                                            @if($second['_child'])
                                                <a href="javascript:;" lay-tips="{{$second['title']}}">
                                                    {{--                                                <i class="layui-icon layui-icon-home"></i>--}}
                                                    <cite>{{$second['title']}}</cite>
                                                </a>
                                                @if($second['_child'])
                                                    <dl class="layui-nav-child">
                                                        <dd>
                                                            <a href="{{route($second['uri'])}}">{{$second['title']}}</a>
                                                        </dd>
                                                    </dl>
                                                    @foreach($second['_child'] as $third)
                                                        @can($third['ident'])
                                                        <dl class="layui-nav-child">
                                                            <dd>
                                                                <a href="{{route($third['uri'])}}">{{$third['title']}}</a>
                                                            </dd>
                                                        </dl>
                                                        @endcan
                                                    @endforeach
                                                @endif

                                            @else
                                                <a href="{{route($second['uri'])}}">{{$second['title']}}</a>
                                            @endif
                                        </dd>
                                    </dl>
                                    @endcan
                                @endforeach
                            </li>
                        @endcan
                    @endforeach

                </ul>
            </div>
        </div>

        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">


            <div class="layadmin-tabsbody-item layui-show">


{{--                <div class="layui-card layadmin-header">--}}
{{--                    <div class="layui-breadcrumb" lay-filter="breadcrumb" style="visibility: visible;">--}}
{{--                        <a lay-href="">主页</a><span lay-separator="">/</span>--}}
{{--                        <a><cite>组件</cite></a><span lay-separator="">/</span>--}}
{{--                        <a><cite>辅助</cite></a>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="layui-fluid">
                    <div class="layui-row">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>
    </div>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    layui.config({
        base: '/static/admin/layuiadmin/' //静态资源所在路径
    }).extend({
        index: 'lib/index' //主入口模块
    }).use(['element', 'form', 'layer', 'table', 'upload', 'laydate'], function () {
        var element = layui.element;
        var layer = layui.layer;
        var form = layui.form;
        var table = layui.table;
        var upload = layui.upload;
        var laydate = layui.laydate;

        //错误提示
        @if(count($errors)>0)
        @foreach($errors->all() as $error)
        layer.msg("{{$error}}", {icon: 5});
        @break
        @endforeach
        @endif

        //信息提示
        @if(session('status'))
        layer.msg("{{session('status')}}", {icon: 6});
        @endif

        {{--//监听消息推送--}}
        {{--$(document).ready(function () {--}}
        {{--    // 连接服务端--}}
        {{--    var socket = io("{{config('custom.PUSH_MESSAGE_LOGIN')}}");--}}
        {{--    // 连接后登录--}}
        {{--    socket.on('connect', function () {--}}
        {{--        socket.emit('login', "{{auth()->user()->uuid}}");--}}
        {{--    });--}}
        {{--    // 后端推送来消息时--}}
        {{--    socket.on('new_msg', function (title, content) {--}}
        {{--        //弹框提示--}}
        {{--        layer.open({--}}
        {{--            title: title,--}}
        {{--            content: content,--}}
        {{--            offset: 'rb',--}}
        {{--            anim: 1,--}}
        {{--            time: 5000--}}
        {{--        })--}}
        {{--    });--}}
        {{--});--}}

    });


</script>
@yield('script')

</body>
</html>


