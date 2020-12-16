<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin pro - 通用后台管理模板系统（单页面专业版）</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="stylesheet" href="/static/rc/css/layui.css?t=1.4.0" media="all">
    <script>
        /^http(s*):\/\//.test(location.href) || alert('请先部署到 localhost 下再访问');
    </script>
    <link id="layuicss-layer" rel="stylesheet"
          href="/static/rc/css/modules/layer/default/layer.css?v=3.1.1" media="all">
    <link id="layuicss-layuiAdmin" rel="stylesheet" href="/static/style/admin.css?v=1.4.0 pro-1" media="all">
    <link id="layuicss-laydate" rel="stylesheet"
          href="/static/rc/css/modules/laydate/default/laydate.css?v=5.0.9" media="all">

    <script src="/static/rc/layui.js"></script>
</head>
<body layadmin-themealias="default" class="layui-layout-body">
<div id="LAY_app" class="layadmin-tabspage-none">
    <div class="layui-layout layui-layout-admin">
        <div class="layui-header">
            <!-- 头部区域 -->
            <ul class="layui-nav layui-layout-left">
                <li class="layui-nav-item layadmin-flexible" lay-unselect="">
                    <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                        <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                    </a>
                </li>
                <!--<li class="layui-nav-item layui-this layui-hide-xs layui-hide-sm layui-show-md-inline-block">
                  <a lay-href="" title="">
                    控制台
                  </a>
                </li>-->
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="http://www.layui.com/admin/" target="_blank" title="前台">
                        <i class="layui-icon layui-icon-website"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect="">
                    <a href="javascript:;" layadmin-event="refresh" title="刷新">
                        <i class="layui-icon layui-icon-refresh-3"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search"
                           layadmin-event="serach" lay-action="template/search/keywords=">
                </li>
                <span class="layui-nav-bar"></span></ul>
            <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">

                <li class="layui-nav-item" lay-unselect="">
                    <a lay-href="app/message/" layadmin-event="message">
                        <i class="layui-icon layui-icon-notice"></i>

                        <!-- 如果有新消息，则显示小圆点 -->
                        <script type="text/html" template="" lay-url="./json/message/new.js">
                            <span class="layui-badge-dot"></span>
                        </script>
                        <span class="layui-badge-dot"></span>

                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="theme">
                        <i class="layui-icon layui-icon-theme"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="note">
                        <i class="layui-icon layui-icon-note"></i>
                    </a>
                </li>
                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="fullscreen">
                        <i class="layui-icon layui-icon-screen-full"></i>
                    </a>
                </li>
                <li class="layui-nav-item" lay-unselect="">
                    <script type="text/html" template="" lay-url="./json/user/session.js"
                            lay-done="layui.element.render('nav', 'layadmin-layout-right');">
                        <a href="javascript:;">
                            <cite>d.data.username </cite>
                        </a>
                        <dl class="layui-nav-child">
                            <dd><a lay-href="set/user/info">基本资料</a></dd>
                            <dd><a lay-href="set/user/password">修改密码</a></dd>
                            <hr>
                            <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
                        </dl>
                    </script>
                    <a href="javascript:;"> <cite>贤心</cite> <span class="layui-nav-more"></span></a>
                    <dl class="layui-nav-child">
                        <dd><a lay-href="set/user/info">基本资料</a></dd>
                        <dd><a lay-href="set/user/password">修改密码</a></dd>
                        <hr>
                        <dd layadmin-event="logout" style="text-align: center;"><a>退出</a></dd>
                    </dl>
                </li>

                <li class="layui-nav-item layui-hide-xs" lay-unselect="">
                    <a href="javascript:;" layadmin-event="about"><i
                            class="layui-icon layui-icon-more-vertical"></i></a>
                </li>
                <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect="">
                    <a href="javascript:;" layadmin-event="more"><i class="layui-icon layui-icon-more-vertical"></i></a>
                </li>
                <span class="layui-nav-bar" style="left: 292px; top: 48px; width: 0px; opacity: 0;"></span></ul>
        </div>

        <!-- 侧边菜单 -->
        <div class="layui-side layui-side-menu">
            <div class="layui-side-scroll">
                <script type="text/html" template="" lay-url="./json/menu.js?v=1"
                        lay-done="layui.element.render('nav', 'layadmin-system-side-menu');" id="TPL_layout">

                    <div class="layui-logo" lay-href="">
                        <span>layuiAdmin</span>
                    </div>

                    <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
                        lay-filter="layadmin-system-side-menu">

                    </ul>
                </script>
                <div class="layui-logo" lay-href=""><span>layuiAdmin Pro</span></div>
                <ul class="layui-nav layui-nav-tree" lay-shrink="all" id="LAY-system-side-menu"
                    lay-filter="layadmin-system-side-menu">
                    <li data-name="" data-jump="" class="layui-nav-item layui-nav-itemed"><a href="javascript:;"
                                                                                             lay-tips="主页"
                                                                                             lay-direction="2"> <i
                                class="layui-icon layui-icon-home"></i> <cite>主页</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="" data-jump="/" class="layui-this"><a href="javascript:;"
                                                                                 lay-href="/">控制台</a></dd>
                            <dd data-name="homepage1" data-jump="home/homepage1" class=""><a href="javascript:;"
                                                                                             lay-href="home/homepage1">主页一</a>
                            </dd>
                            <dd data-name="homepage2" data-jump="home/homepage2" class=""><a href="javascript:;"
                                                                                             lay-href="home/homepage2">主页二</a>
                            </dd>
                        </dl>
                    </li>
                    <li data-name="component" data-jump="" class="layui-nav-item"><a href="javascript:;" lay-tips="组件"
                                                                                     lay-direction="2"> <i
                                class="layui-icon layui-icon-component"></i> <cite>组件</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="grid" data-jump=""><a href="javascript:;">栅格<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="list" data-jump=""><a href="javascript:;"
                                                                         lay-href="component/grid/list">等比例列表排列</a></dd>
                                    <dd data-name="mobile" data-jump=""><a href="javascript:;"
                                                                           lay-href="component/grid/mobile">按移动端排列</a>
                                    </dd>
                                    <dd data-name="mobile-pc" data-jump=""><a href="javascript:;"
                                                                              lay-href="component/grid/mobile-pc">移动桌面端组合</a>
                                    </dd>
                                    <dd data-name="all" data-jump=""><a href="javascript:;"
                                                                        lay-href="component/grid/all">全端复杂组合</a></dd>
                                    <dd data-name="stack" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/grid/stack">低于桌面堆叠排列</a>
                                    </dd>
                                    <dd data-name="speed-dial" data-jump=""><a href="javascript:;"
                                                                               lay-href="component/grid/speed-dial">九宫格</a>
                                    </dd>
                                </dl>
                            </dd>
                            <dd data-name="button" data-jump=""><a href="javascript:;"
                                                                   lay-href="component/button/">按钮</a></dd>
                            <dd data-name="form" data-jump=""><a href="javascript:;">表单<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="element" data-jump=""><a href="javascript:;"
                                                                            lay-href="component/form/element">表单元素</a>
                                    </dd>
                                    <dd data-name="group" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/form/group">表单组合</a></dd>
                                </dl>
                            </dd>
                            <dd data-name="nav" data-jump="" class=""><a href="javascript:;" lay-href="component/nav/">导航</a>
                            </dd>
                            <dd data-name="tabs" data-jump="" class=""><a href="javascript:;"
                                                                          lay-href="component/tabs/">选项卡</a></dd>
                            <dd data-name="progress" data-jump=""><a href="javascript:;" lay-href="component/progress/">进度条</a>
                            </dd>
                            <dd data-name="panel" data-jump="" class=""><a href="javascript:;"
                                                                           lay-href="component/panel/">面板</a></dd>
                            <dd data-name="badge" data-jump=""><a href="javascript:;" lay-href="component/badge/">徽章</a>
                            </dd>
                            <dd data-name="timeline" data-jump="" class=""><a href="javascript:;"
                                                                              lay-href="component/timeline/">时间线</a>
                            </dd>
                            <dd data-name="anim" data-jump=""><a href="javascript:;" lay-href="component/anim/">动画</a>
                            </dd>
                            <dd data-name="auxiliar" data-jump="" class=""><a href="javascript:;"
                                                                              lay-href="component/auxiliar/">辅助</a></dd>
                            <dd data-name="layer" data-jump=""><a href="javascript:;">通用弹层<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="list" data-jump=""><a href="javascript:;"
                                                                         lay-href="component/layer/list">功能演示</a></dd>
                                    <dd data-name="special-demo" data-jump=""><a href="javascript:;"
                                                                                 lay-href="component/layer/special-demo">特殊示例</a>
                                    </dd>
                                    <dd data-name="theme" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/layer/theme">风格定制</a></dd>
                                </dl>
                            </dd>
                            <dd data-name="laydate" data-jump="" class=""><a href="javascript:;">日期时间<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="demo1" data-jump="" class=""><a href="javascript:;"
                                                                                   lay-href="component/laydate/demo1">功能演示一</a>
                                    </dd>
                                    <dd data-name="demo2" data-jump="" class=""><a href="javascript:;"
                                                                                   lay-href="component/laydate/demo2">功能演示二</a>
                                    </dd>
                                    <dd data-name="theme" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/laydate/theme">设定主题</a>
                                    </dd>
                                    <dd data-name="special-demo" data-jump=""><a href="javascript:;"
                                                                                 lay-href="component/laydate/special-demo">特殊示例</a>
                                    </dd>
                                </dl>
                            </dd>
                            <dd data-name="table" data-jump="" class="layui-nav-itemed"><a href="javascript:;">表格<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="simple" data-jump=""><a href="javascript:;"
                                                                           lay-href="component/table/simple">简单数据表格</a>
                                    </dd>
                                    <dd data-name="auto" data-jump=""><a href="javascript:;"
                                                                         lay-href="component/table/auto">列宽自动分配</a></dd>
                                    <dd data-name="data" data-jump=""><a href="javascript:;"
                                                                         lay-href="component/table/data">赋值已知数据</a></dd>
                                    <dd data-name="tostatic" data-jump=""><a href="javascript:;"
                                                                             lay-href="component/table/tostatic">转化静态表格</a>
                                    </dd>
                                    <dd data-name="page" data-jump="" class=""><a href="javascript:;"
                                                                                  lay-href="component/table/page">开启分页</a>
                                    </dd>
                                    <dd data-name="resetPage" data-jump=""><a href="javascript:;"
                                                                              lay-href="component/table/resetPage">自定义分页</a>
                                    </dd>
                                    <dd data-name="toolbar" data-jump=""><a href="javascript:;"
                                                                            lay-href="component/table/toolbar">开启头部工具栏</a>
                                    </dd>
                                    <dd data-name="totalRow" data-jump=""><a href="javascript:;"
                                                                             lay-href="component/table/totalRow">开启合计行</a>
                                    </dd>
                                    <dd data-name="height" data-jump=""><a href="javascript:;"
                                                                           lay-href="component/table/height">高度最大适应</a>
                                    </dd>
                                    <dd data-name="checkbox" data-jump=""><a href="javascript:;"
                                                                             lay-href="component/table/checkbox">开启复选框</a>
                                    </dd>
                                    <dd data-name="radio" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/table/radio">开启单选框</a>
                                    </dd>
                                    <dd data-name="cellEdit" data-jump=""><a href="javascript:;"
                                                                             lay-href="component/table/cellEdit">开启单元格编辑</a>
                                    </dd>
                                    <dd data-name="form" data-jump=""><a href="javascript:;"
                                                                         lay-href="component/table/form">加入表单元素</a></dd>
                                    <dd data-name="style" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/table/style">设置单元格样式</a>
                                    </dd>
                                    <dd data-name="fixed" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/table/fixed">固定列</a></dd>
                                    <dd data-name="operate" data-jump=""><a href="javascript:;"
                                                                            lay-href="component/table/operate">数据操作</a>
                                    </dd>
                                    <dd data-name="parseData" data-jump=""><a href="javascript:;"
                                                                              lay-href="component/table/parseData">解析任意数据格式</a>
                                    </dd>
                                    <dd data-name="onrow" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/table/onrow">监听行事件</a>
                                    </dd>
                                    <dd data-name="reload" data-jump=""><a href="javascript:;"
                                                                           lay-href="component/table/reload">数据表格的重载</a>
                                    </dd>
                                    <dd data-name="initSort" data-jump=""><a href="javascript:;"
                                                                             lay-href="component/table/initSort">设置初始排序</a>
                                    </dd>
                                    <dd data-name="cellEvent" data-jump=""><a href="javascript:;"
                                                                              lay-href="component/table/cellEvent">监听单元格事件</a>
                                    </dd>
                                    <dd data-name="thead" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/table/thead">复杂表头</a></dd>
                                </dl>
                            </dd>
                            <dd data-name="laypage" data-jump=""><a href="javascript:;">分页<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="demo1" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/laypage/demo1">功能演示一</a>
                                    </dd>
                                    <dd data-name="demo2" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/laypage/demo2">功能演示二</a>
                                    </dd>
                                </dl>
                            </dd>
                            <dd data-name="upload" data-jump=""><a href="javascript:;">上传<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="demo1" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/upload/demo1">功能演示一</a>
                                    </dd>
                                    <dd data-name="demo2" data-jump=""><a href="javascript:;"
                                                                          lay-href="component/upload/demo2">功能演示二</a>
                                    </dd>
                                </dl>
                            </dd>
                            <dd data-name="colorpicker" data-jump=""><a href="javascript:;"
                                                                        lay-href="component/colorpicker/">颜色选择器</a></dd>
                            <dd data-name="slider" data-jump=""><a href="javascript:;"
                                                                   lay-href="component/slider/">滑块组件</a></dd>
                            <dd data-name="rate" data-jump=""><a href="javascript:;" lay-href="component/rate/">评分</a>
                            </dd>
                            <dd data-name="carousel" data-jump=""><a href="javascript:;" lay-href="component/carousel/">轮播</a>
                            </dd>
                            <dd data-name="flow" data-jump=""><a href="javascript:;" lay-href="component/flow/">流加载</a>
                            </dd>
                            <dd data-name="util" data-jump=""><a href="javascript:;" lay-href="component/util/">工具</a>
                            </dd>
                            <dd data-name="code" data-jump=""><a href="javascript:;" lay-href="component/code/">代码修饰</a>
                            </dd>
                            <dd data-name="layim" data-jump="senior/im/"><a href="javascript:;" lay-href="senior/im/">即时聊天</a>
                            </dd>
                        </dl>
                    </li>
                    <li data-name="template" data-jump="" class="layui-nav-item"><a href="javascript:;" lay-tips="页面"
                                                                                    lay-direction="2"> <i
                                class="layui-icon layui-icon-template"></i> <cite>页面</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="personalpage" data-jump="template/personalpage"><a href="javascript:;"
                                                                                              lay-href="template/personalpage">个人主页</a>
                            </dd>
                            <dd data-name="addresslist" data-jump="template/addresslist"><a href="javascript:;"
                                                                                            lay-href="template/addresslist">通讯录</a>
                            </dd>
                            <dd data-name="caller" data-jump="template/caller"><a href="javascript:;"
                                                                                  lay-href="template/caller">客户列表</a>
                            </dd>
                            <dd data-name="goodslist" data-jump="template/goodslist"><a href="javascript:;"
                                                                                        lay-href="template/goodslist">商品列表</a>
                            </dd>
                            <dd data-name="msgboard" data-jump="template/msgboard"><a href="javascript:;"
                                                                                      lay-href="template/msgboard">留言板</a>
                            </dd>
                            <dd data-name="search" data-jump="template/search"><a href="javascript:;"
                                                                                  lay-href="template/search">搜索结果</a>
                            </dd>
                            <dd data-name="reg" data-jump="user/reg"><a href="javascript:;" lay-href="user/reg">注册</a>
                            </dd>
                            <dd data-name="login" data-jump="user/login"><a href="javascript:;"
                                                                            lay-href="user/login">登入</a></dd>
                            <dd data-name="forget" data-jump="user/forget"><a href="javascript:;"
                                                                              lay-href="user/forget">忘记密码</a></dd>
                            <dd data-name="404" data-jump="template/tips/404"><a href="javascript:;"
                                                                                 lay-href="template/tips/404">404</a>
                            </dd>
                            <dd data-name="error" data-jump="template/tips/error"><a href="javascript:;"
                                                                                     lay-href="template/tips/error">错误提示</a>
                            </dd>
                            <dd data-name="" data-jump="" class="layui-nav-itemed"><a href="javascript:;">内嵌页面<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="" data-jump="/iframe/link/baidu"><a href="javascript:;"
                                                                                       lay-href="/iframe/link/baidu">百度一下</a>
                                    </dd>
                                    <dd data-name="" data-jump="/iframe/link/layui"><a href="javascript:;"
                                                                                       lay-href="/iframe/link/layui">layui官网</a>
                                    </dd>
                                    <dd data-name="" data-jump="/iframe/link/layuiAdmin"><a href="javascript:;"
                                                                                            lay-href="/iframe/link/layuiAdmin">layuiAdmin官网</a>
                                    </dd>
                                </dl>
                            </dd>
                        </dl>
                    </li>
                    <li data-name="app" data-jump="" class="layui-nav-item"><a href="javascript:;" lay-tips="应用"
                                                                               lay-direction="2"> <i
                                class="layui-icon layui-icon-app"></i> <cite>应用</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="content" data-jump=""><a href="javascript:;">内容系统<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="list" data-jump=""><a href="javascript:;"
                                                                         lay-href="app/content/list">文章列表</a></dd>
                                    <dd data-name="tags" data-jump=""><a href="javascript:;"
                                                                         lay-href="app/content/tags">分类管理</a></dd>
                                    <dd data-name="comment" data-jump=""><a href="javascript:;"
                                                                            lay-href="app/content/comment">评论管理</a></dd>
                                </dl>
                            </dd>
                            <dd data-name="forum" data-jump=""><a href="javascript:;">社区系统<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="list" data-jump=""><a href="javascript:;" lay-href="app/forum/list">帖子列表</a>
                                    </dd>
                                    <dd data-name="replys" data-jump=""><a href="javascript:;"
                                                                           lay-href="app/forum/replys">回帖列表</a></dd>
                                </dl>
                            </dd>
                            <dd data-name="message" data-jump=""><a href="javascript:;" lay-href="app/message/">消息中心</a>
                            </dd>
                            <dd data-name="workorder" data-jump="app/workorder/list"><a href="javascript:;"
                                                                                        lay-href="app/workorder/list">工单系统</a>
                            </dd>
                        </dl>
                    </li>
                    <li data-name="senior" data-jump="" class="layui-nav-item"><a href="javascript:;" lay-tips="高级"
                                                                                  lay-direction="2"> <i
                                class="layui-icon layui-icon-senior"></i> <cite>高级</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="im" data-jump=""><a href="javascript:;" lay-href="senior/im/">通讯系统</a></dd>
                            <dd data-name="echarts" data-jump=""><a href="javascript:;">Echarts集成<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="line" data-jump=""><a href="javascript:;"
                                                                         lay-href="senior/echarts/line">折线图</a></dd>
                                    <dd data-name="bar" data-jump=""><a href="javascript:;"
                                                                        lay-href="senior/echarts/bar">柱状图</a></dd>
                                    <dd data-name="map" data-jump=""><a href="javascript:;"
                                                                        lay-href="senior/echarts/map">地图</a></dd>
                                </dl>
                            </dd>
                        </dl>
                    </li>
                    <li data-name="user" data-jump="" class="layui-nav-item"><a href="javascript:;" lay-tips="用户"
                                                                                lay-direction="2"> <i
                                class="layui-icon layui-icon-user"></i> <cite>用户</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="user" data-jump="user/user/list"><a href="javascript:;"
                                                                               lay-href="user/user/list">网站用户</a></dd>
                            <dd data-name="administrators-list" data-jump="user/administrators/list"><a
                                    href="javascript:;" lay-href="user/administrators/list">后台管理员</a></dd>
                            <dd data-name="administrators-rule" data-jump="user/administrators/role"><a
                                    href="javascript:;" lay-href="user/administrators/role">角色管理</a></dd>
                        </dl>
                    </li>
                    <li data-name="set" data-jump="" class="layui-nav-item"><a href="javascript:;" lay-tips="设置"
                                                                               lay-direction="2"> <i
                                class="layui-icon layui-icon-set"></i> <cite>设置</cite> <span
                                class="layui-nav-more"></span></a>
                        <dl class="layui-nav-child">
                            <dd data-name="system" data-jump="" class="layui-nav-itemed"><a
                                    href="javascript:;">系统设置<span class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="website" data-jump=""><a href="javascript:;"
                                                                            lay-href="set/system/website">网站设置</a></dd>
                                    <dd data-name="email" data-jump=""><a href="javascript:;"
                                                                          lay-href="set/system/email">邮件服务</a></dd>
                                </dl>
                            </dd>
                            <dd data-name="user" data-jump="" class="layui-nav-itemed"><a href="javascript:;">我的设置<span
                                        class="layui-nav-more"></span></a>
                                <dl class="layui-nav-child">
                                    <dd data-name="info" data-jump=""><a href="javascript:;" lay-href="set/user/info">基本资料</a>
                                    </dd>
                                    <dd data-name="password" data-jump=""><a href="javascript:;"
                                                                             lay-href="set/user/password">修改密码</a></dd>
                                </dl>
                            </dd>
                        </dl>
                    </li>
                    <li data-name="get" data-jump="system/get" class="layui-nav-item"><a href="javascript:;"
                                                                                         lay-href="system/get"
                                                                                         lay-tips="授权"
                                                                                         lay-direction="2"> <i
                                class="layui-icon layui-icon-auz"></i> <cite>授权</cite> </a></li>
                    <span class="layui-nav-bar" style="top: 326px; height: 0px; opacity: 0;"></span></ul>
            </div>
        </div>


        <!-- 页面标签 -->
        <script type="text/html" template="" lay-done="layui.element.render('nav', 'layadmin-pagetabs-nav')">
            <div class="layadmin-pagetabs" id="LAY_app_tabs">
                <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
                <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
                <div class="layui-icon layadmin-tabs-control layui-icon-down">
                    <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                        <li class="layui-nav-item" lay-unselect>
                            <a href="javascript:;"></a>
                            <dl class="layui-nav-child layui-anim-fadein">
                                <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                                <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                                <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                            </dl>
                        </li>
                    </ul>
                </div>
                <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                    <ul class="layui-tab-title" id="LAY_app_tabsheader">
                        <li lay-id="/"><i class="layui-icon layui-icon-home"></i></li>
                    </ul>
                </div>
            </div>
        </script>


        <!-- 主体内容 -->
        <div class="layui-body" id="LAY_app_body">
            <div class="layadmin-tabsbody-item layui-show">
                <div class="layui-fluid">
                    <div class="layui-row layui-col-space15">
                        <div class="layui-col-md8">
                            <div class="layui-row layui-col-space15">
                                <div class="layui-col-md6">
                                    <div class="layui-card">
                                        <div class="layui-card-header">快捷方式</div>
                                        <div class="layui-card-body">

                                            <div class="layui-carousel layadmin-carousel layadmin-shortcut" lay-anim=""
                                                 lay-indicator="inside" lay-arrow="none"
                                                 style="width: 100%; height: 280px;">
                                                <div carousel-item="">
                                                    <ul class="layui-row layui-col-space10 layui-this">
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="home/homepage1">
                                                                <i class="layui-icon layui-icon-console"></i>
                                                                <cite>主页一</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="home/homepage2">
                                                                <i class="layui-icon layui-icon-chart"></i>
                                                                <cite>主页二</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="component/layer/list">
                                                                <i class="layui-icon layui-icon-template-1"></i>
                                                                <cite>弹层</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="/senior/im/">
                                                                <i class="layui-icon layui-icon-chat"></i>
                                                                <cite>聊天</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="component/progress/index">
                                                                <i class="layui-icon layui-icon-find-fill"></i>
                                                                <cite>进度条</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="app/workorder/list">
                                                                <i class="layui-icon layui-icon-survey"></i>
                                                                <cite>工单</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="user/user/list">
                                                                <i class="layui-icon layui-icon-user"></i>
                                                                <cite>用户</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/system/website">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>设置</cite>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="layui-row layui-col-space10">
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs3">
                                                            <a lay-href="set/user/info">
                                                                <i class="layui-icon layui-icon-set"></i>
                                                                <cite>我的资料</cite>
                                                            </a>
                                                        </li>
                                                    </ul>

                                                </div>
                                                <div class="layui-carousel-ind">
                                                    <ul>
                                                        <li class="layui-this"></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <button class="layui-icon layui-carousel-arrow" lay-type="sub">
                                                </button>
                                                <button class="layui-icon layui-carousel-arrow" lay-type="add">
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="layui-col-md6">
                                    <div class="layui-card">
                                        <div class="layui-card-header">待办事项</div>
                                        <div class="layui-card-body">

                                            <div class="layui-carousel layadmin-carousel layadmin-backlog" lay-anim=""
                                                 lay-indicator="inside" lay-arrow="none"
                                                 style="width: 100%; height: 280px;">
                                                <div carousel-item="">
                                                    <ul class="layui-row layui-col-space10 layui-this">
                                                        <li class="layui-col-xs6">
                                                            <a lay-href="app/content/comment"
                                                               class="layadmin-backlog-body">
                                                                <h3>待审评论</h3>
                                                                <p><cite>66</cite></p>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs6">
                                                            <a lay-href="app/forum/list" class="layadmin-backlog-body">
                                                                <h3>待审帖子</h3>
                                                                <p><cite>12</cite></p>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs6">
                                                            <a lay-href="template/goodslist"
                                                               class="layadmin-backlog-body">
                                                                <h3>待审商品</h3>
                                                                <p><cite>99</cite></p>
                                                            </a>
                                                        </li>
                                                        <li class="layui-col-xs6">
                                                            <a href="javascript:;"
                                                               onclick="layer.tips('不跳转', this, {tips: 3});"
                                                               class="layadmin-backlog-body">
                                                                <h3>待发货</h3>
                                                                <p><cite>20</cite></p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="layui-row layui-col-space10">
                                                        <li class="layui-col-xs6">
                                                            <a href="javascript:;" class="layadmin-backlog-body">
                                                                <h3>待审友情链接</h3>
                                                                <p><cite style="color: #FF5722;">5</cite></p>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="layui-carousel-ind">
                                                    <ul>
                                                        <li class="layui-this"></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <button class="layui-icon layui-carousel-arrow" lay-type="sub">
                                                </button>
                                                <button class="layui-icon layui-carousel-arrow" lay-type="add">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="layui-col-md12">
                                    <div class="layui-card">
                                        <div class="layui-card-header">数据概览</div>
                                        <div class="layui-card-body">

                                            <div class="layui-carousel layadmin-carousel layadmin-dataview"
                                                 data-anim="fade" lay-filter="LAY-index-dataview" lay-anim="fade"
                                                 lay-indicator="inside" lay-arrow="none"
                                                 style="width: 100%; height: 280px;">
                                                <div carousel-item="" id="LAY-index-dataview">
                                                    <div class="layui-this" _echarts_instance_="1607999680058"
                                                         style="-webkit-tap-highlight-color: transparent; user-select: none; cursor: default; background-color: rgba(0, 0, 0, 0);">
                                                        <div
                                                            style="position: relative; overflow: hidden; width: 638px; height: 332px;">
                                                            <div data-zr-dom-id="bg" class="zr-element"
                                                                 style="position: absolute; left: 0px; top: 0px; width: 638px; height: 332px; user-select: none;"></div>
                                                            <canvas width="638" height="332" data-zr-dom-id="0"
                                                                    class="zr-element"
                                                                    style="position: absolute; left: 0px; top: 0px; width: 638px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas>
                                                            <canvas width="638" height="332" data-zr-dom-id="1"
                                                                    class="zr-element"
                                                                    style="position: absolute; left: 0px; top: 0px; width: 638px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas>
                                                            <canvas width="638" height="332"
                                                                    data-zr-dom-id="_zrender_hover_" class="zr-element"
                                                                    style="position: absolute; left: 0px; top: 0px; width: 638px; height: 332px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></canvas>
                                                        </div>
                                                    </div>
                                                    <div></div>
                                                    <div></div>
                                                </div>
                                                <div class="layui-carousel-ind">
                                                    <ul>
                                                        <li class="layui-this"></li>
                                                        <li></li>
                                                        <li></li>
                                                    </ul>
                                                </div>
                                                <button class="layui-icon layui-carousel-arrow" lay-type="sub">
                                                </button>
                                                <button class="layui-icon layui-carousel-arrow" lay-type="add">
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="layui-card">
                                        <div class="layui-tab layui-tab-brief layadmin-latestData">
                                            <ul class="layui-tab-title">
                                                <li class="layui-this">今日热搜</li>
                                                <li class="">今日热帖</li>
                                            </ul>
                                            <div class="layui-tab-content">
                                                <div class="layui-tab-item layui-show">
                                                    <table id="LAY-index-topSearch"></table>
                                                    <div class="layui-form layui-border-box layui-table-view"
                                                         lay-filter="LAY-table-9" lay-id="LAY-index-topSearch"
                                                         style=" ">
                                                        <div class="layui-table-box">
                                                            <div class="layui-table-header">
                                                                <table cellspacing="0" cellpadding="0" border="0"
                                                                       class="layui-table" lay-skin="line">
                                                                    <thead>
                                                                    <tr>
                                                                        <th data-field="0" data-key="9-0-0"
                                                                            data-unresize="true"
                                                                            class=" layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                <span></span></div>
                                                                        </th>
                                                                        <th data-field="keywords" data-key="9-0-1"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <span>关键词</span></div>
                                                                        </th>
                                                                        <th data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class=" layui-unselect">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                <span>搜索次数</span><span
                                                                                    class="layui-table-sort layui-inline"><i
                                                                                        class="layui-edge layui-table-sort-asc"
                                                                                        title="升序"></i><i
                                                                                        class="layui-edge layui-table-sort-desc"
                                                                                        title="降序"></i></span></div>
                                                                        </th>
                                                                        <th data-field="userNums" data-key="9-0-3"
                                                                            class=" layui-unselect">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                <span>用户数</span><span
                                                                                    class="layui-table-sort layui-inline"><i
                                                                                        class="layui-edge layui-table-sort-asc"
                                                                                        title="升序"></i><i
                                                                                        class="layui-edge layui-table-sort-desc"
                                                                                        title="降序"></i></span></div>
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <div class="layui-table-body layui-table-main">
                                                                <table cellspacing="0" cellpadding="0" border="0"
                                                                       class="layui-table" lay-skin="line">
                                                                    <tbody>
                                                                    <tr data-index="0">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                1
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="贤心是男是女" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=贤心是男是女"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">贤心是男是女</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                8520
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                2216
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="1">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                2
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="Java程序员能找到女朋友吗"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=Java程序员能找到女朋友吗"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">Java程序员能找到女朋友吗</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="2">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                3
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="此表格是静态模拟数据"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=此表格是静态模拟数据"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">此表格是静态模拟数据</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="3">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                4
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="4">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                5
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="5">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                6
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="6">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                7
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="7">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                8
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="8">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                9
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="9">
                                                                        <td data-field="0" data-key="9-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                10
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="keywords" data-key="9-0-1"
                                                                            data-content="layui官方教程" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-1">
                                                                                <a href="https://www.baidu.com/s?wd=layui官方教程"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui官方教程</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="frequency" data-key="9-0-2"
                                                                            data-minwidth="120" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-2">
                                                                                666
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="userNums" data-key="9-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-9-0-3">
                                                                                333
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="layui-table-fixed layui-table-fixed-l">
                                                                <div class="layui-table-header">
                                                                    <table cellspacing="0" cellpadding="0" border="0"
                                                                           class="layui-table" lay-skin="line">
                                                                        <thead>
                                                                        <tr>
                                                                            <th data-field="0" data-key="9-0-0"
                                                                                data-unresize="true"
                                                                                class=" layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    <span></span></div>
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div class="layui-table-body" style="height: 390px;">
                                                                    <table cellspacing="0" cellpadding="0" border="0"
                                                                           class="layui-table" lay-skin="line">
                                                                        <tbody>
                                                                        <tr data-index="0">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    1
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="1">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    2
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="2">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    3
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="3">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    4
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="4">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    5
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="5">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    6
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="6">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    7
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="7">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    8
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="8">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    9
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="9">
                                                                            <td data-field="0" data-key="9-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-9-0-0 laytable-cell-numbers">
                                                                                    10
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="layui-table-page">
                                                            <div id="layui-table-page9">
                                                                <div
                                                                    class="layui-box layui-laypage layui-laypage-default"
                                                                    id="layui-laypage-6"><a href="javascript:;"
                                                                                            class="layui-laypage-prev layui-disabled"
                                                                                            data-page="0"><i
                                                                            class="layui-icon"></i></a><span
                                                                        class="layui-laypage-curr"><em
                                                                            class="layui-laypage-em"></em><em>1</em></span><a
                                                                        href="javascript:;" data-page="2">2</a><a
                                                                        href="javascript:;" data-page="3">3</a><span
                                                                        class="layui-laypage-spr">…</span><a
                                                                        href="javascript:;" class="layui-laypage-last"
                                                                        title="尾页" data-page="10">10</a><a
                                                                        href="javascript:;" class="layui-laypage-next"
                                                                        data-page="2"><i
                                                                            class="layui-icon"></i></a><span
                                                                        class="layui-laypage-skip">到第<input type="text"
                                                                                                            min="1"
                                                                                                            value="1"
                                                                                                            class="layui-input">页<button
                                                                            type="button"
                                                                            class="layui-laypage-btn">确定</button></span><span
                                                                        class="layui-laypage-count">共 100 条</span><span
                                                                        class="layui-laypage-limits"><select
                                                                            lay-ignore=""><option value="10"
                                                                                                  selected="">10 条/页</option><option
                                                                                value="20">20 条/页</option><option
                                                                                value="30">30 条/页</option><option
                                                                                value="40">40 条/页</option><option
                                                                                value="50">50 条/页</option><option
                                                                                value="60">60 条/页</option><option
                                                                                value="70">70 条/页</option><option
                                                                                value="80">80 条/页</option><option
                                                                                value="90">90 条/页</option></select></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <style>.laytable-cell-9-0-0 {
                                                                width: 40px;
                                                            }

                                                            .laytable-cell-9-0-1 {
                                                            }

                                                            .laytable-cell-9-0-2 {
                                                            }

                                                            .laytable-cell-9-0-3 {
                                                            }</style>
                                                    </div>
                                                </div>
                                                <div class="layui-tab-item" style="">
                                                    <table id="LAY-index-topCard"></table>
                                                    <div class="layui-form layui-border-box layui-table-view"
                                                         lay-filter="LAY-table-10" lay-id="LAY-index-topCard" style=" ">
                                                        <div class="layui-table-box">
                                                            <div class="layui-table-header">
                                                                <table cellspacing="0" cellpadding="0" border="0"
                                                                       class="layui-table" lay-skin="line">
                                                                    <thead>
                                                                    <tr>
                                                                        <th data-field="0" data-key="10-0-0"
                                                                            data-unresize="true"
                                                                            class=" layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                <span></span></div>
                                                                        </th>
                                                                        <th data-field="title" data-key="10-0-1"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <span>标题</span></div>
                                                                        </th>
                                                                        <th data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                <span>发帖者</span></div>
                                                                        </th>
                                                                        <th data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                <span>类别</span></div>
                                                                        </th>
                                                                        <th data-field="crt" data-key="10-0-4"
                                                                            class=" layui-unselect">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                <span>点击率</span><span
                                                                                    class="layui-table-sort layui-inline"><i
                                                                                        class="layui-edge layui-table-sort-asc"
                                                                                        title="升序"></i><i
                                                                                        class="layui-edge layui-table-sort-desc"
                                                                                        title="降序"></i></span></div>
                                                                        </th>
                                                                    </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                            <div class="layui-table-body layui-table-main">
                                                                <table cellspacing="0" cellpadding="0" border="0"
                                                                       class="layui-table" lay-skin="line">
                                                                    <tbody>
                                                                    <tr data-index="0">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                1
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="社区开始接受 “赞助商广告” 投放"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/15697/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">社区开始接受
                                                                                    “赞助商广告” 投放</a></div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                贤心
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                公告
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="1">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                2
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="layui 一周年" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/16622/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">layui
                                                                                    一周年</a></div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                猫吃
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                讨论
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="2">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                3
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="四个月的前端" data-minwidth="300"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/16651/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">四个月的前端</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                fd
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                分享
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="3">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                4
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="4">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                5
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="5">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                6
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="6">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                7
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="7">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                8
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="8">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                9
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr data-index="9">
                                                                        <td data-field="0" data-key="10-0-0"
                                                                            class="layui-table-col-special">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                10
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="title" data-key="10-0-1"
                                                                            data-content="如何评价LayUI和他的作者闲心"
                                                                            data-minwidth="300" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-1">
                                                                                <a href="http://fly.layui.com/jie/9352/"
                                                                                   target="_blank"
                                                                                   class="layui-table-link">如何评价LayUI和他的作者闲心</a>
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="username" data-key="10-0-2"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-2">
                                                                                纸飞机
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="channel" data-key="10-0-3"
                                                                            class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-3">
                                                                                提问
                                                                            </div>
                                                                        </td>
                                                                        <td data-field="crt" data-key="10-0-4" class="">
                                                                            <div
                                                                                class="layui-table-cell laytable-cell-10-0-4">
                                                                                61632
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="layui-table-fixed layui-table-fixed-l">
                                                                <div class="layui-table-header">
                                                                    <table cellspacing="0" cellpadding="0" border="0"
                                                                           class="layui-table" lay-skin="line">
                                                                        <thead>
                                                                        <tr>
                                                                            <th data-field="0" data-key="10-0-0"
                                                                                data-unresize="true"
                                                                                class=" layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    <span></span></div>
                                                                            </th>
                                                                        </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div class="layui-table-body" style="height: 0px;">
                                                                    <table cellspacing="0" cellpadding="0" border="0"
                                                                           class="layui-table" lay-skin="line">
                                                                        <tbody>
                                                                        <tr data-index="0">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    1
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="1">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    2
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="2">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    3
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="3">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    4
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="4">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    5
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="5">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    6
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="6">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    7
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="7">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    8
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="8">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    9
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <tr data-index="9">
                                                                            <td data-field="0" data-key="10-0-0"
                                                                                class="layui-table-col-special">
                                                                                <div
                                                                                    class="layui-table-cell laytable-cell-10-0-0 laytable-cell-numbers">
                                                                                    10
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="layui-table-page">
                                                            <div id="layui-table-page10">
                                                                <div
                                                                    class="layui-box layui-laypage layui-laypage-default"
                                                                    id="layui-laypage-7"><a href="javascript:;"
                                                                                            class="layui-laypage-prev layui-disabled"
                                                                                            data-page="0"><i
                                                                            class="layui-icon"></i></a><span
                                                                        class="layui-laypage-curr"><em
                                                                            class="layui-laypage-em"></em><em>1</em></span><a
                                                                        href="javascript:;" data-page="2">2</a><a
                                                                        href="javascript:;" data-page="3">3</a><span
                                                                        class="layui-laypage-spr">…</span><a
                                                                        href="javascript:;" class="layui-laypage-last"
                                                                        title="尾页" data-page="10">10</a><a
                                                                        href="javascript:;" class="layui-laypage-next"
                                                                        data-page="2"><i
                                                                            class="layui-icon"></i></a><span
                                                                        class="layui-laypage-skip">到第<input type="text"
                                                                                                            min="1"
                                                                                                            value="1"
                                                                                                            class="layui-input">页<button
                                                                            type="button"
                                                                            class="layui-laypage-btn">确定</button></span><span
                                                                        class="layui-laypage-count">共 100 条</span><span
                                                                        class="layui-laypage-limits"><select
                                                                            lay-ignore=""><option value="10"
                                                                                                  selected="">10 条/页</option><option
                                                                                value="20">20 条/页</option><option
                                                                                value="30">30 条/页</option><option
                                                                                value="40">40 条/页</option><option
                                                                                value="50">50 条/页</option><option
                                                                                value="60">60 条/页</option><option
                                                                                value="70">70 条/页</option><option
                                                                                value="80">80 条/页</option><option
                                                                                value="90">90 条/页</option></select></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <style>.laytable-cell-10-0-0 {
                                                                width: 40px;
                                                            }

                                                            .laytable-cell-10-0-1 {
                                                            }

                                                            .laytable-cell-10-0-2 {
                                                            }

                                                            .laytable-cell-10-0-3 {
                                                            }

                                                            .laytable-cell-10-0-4 {
                                                            }</style>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="layui-col-md4">
                            <div class="layui-card">
                                <div class="layui-card-header">版本信息</div>
                                <div class="layui-card-body layui-text">
                                    <table class="layui-table">
                                        <colgroup>
                                            <col width="100">
                                            <col>
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td>当前版本</td>
                                            <td>
                                                <script type="text/html" template="">

                                                    <a href="http://fly.layui.com/docs/3/" target="_blank"
                                                       style="padding-left: 10px;">日志</a>
                                                </script>
                                                v1.4.0 pro <a href="http://fly.layui.com/docs/3/" target="_blank"
                                                              style="padding-left: 10px;">日志</a>
                                                <a href="javascript:;" layadmin-event="update"
                                                   style="padding-left: 5px;">检查更新</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>基于框架</td>
                                            <td>
                                                <script type="text/html" template="">
                                                    layui-v
                                                </script>
                                                layui-v2.5.6
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>主要特色</td>
                                            <td>单页面 / 响应式 / 清爽 / 极简</td>
                                        </tr>
                                        <tr>
                                            <td>获取渠道</td>
                                            <td style="padding-bottom: 0;">
                                                <div class="layui-btn-container">
                                                    <a href="http://www.layui.com/admin/" target="_blank"
                                                       class="layui-btn layui-btn-danger">获取授权</a>
                                                    <a href="http://fly.layui.com/download/layuiAdmin/" target="_blank"
                                                       class="layui-btn">立即下载</a>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="layui-card">
                                <div class="layui-card-header">效果报告</div>
                                <div class="layui-card-body layadmin-takerates">
                                    <div class="layui-progress" lay-showpercent="yes">
                                        <h3>转化率（日同比 28% <span class="layui-edge layui-edge-top" lay-tips="增长"
                                                              lay-offset="-15"></span>）</h3>
                                        <div class="layui-progress-bar" lay-percent="65%" style="width: 65%;"><span
                                                class="layui-progress-text">65%</span></div>
                                    </div>
                                    <div class="layui-progress" lay-showpercent="yes">
                                        <h3>签到率（日同比 11% <span class="layui-edge layui-edge-bottom" lay-tips="下降"
                                                              lay-offset="-15"></span>）</h3>
                                        <div class="layui-progress-bar" lay-percent="32%" style="width: 32%;"><span
                                                class="layui-progress-text">32%</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="layui-card">
                                <div class="layui-card-header">实时监控</div>
                                <div class="layui-card-body layadmin-takerates">
                                    <div class="layui-progress" lay-showpercent="yes">
                                        <h3>CPU使用率</h3>
                                        <div class="layui-progress-bar" lay-percent="58%" style="width: 58%;"><span
                                                class="layui-progress-text">58%</span></div>
                                    </div>
                                    <div class="layui-progress" lay-showpercent="yes">
                                        <h3>内存占用率</h3>
                                        <div class="layui-progress-bar layui-bg-red" lay-percent="90%"
                                             style="width: 90%;"><span class="layui-progress-text">90%</span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="layui-card">
                                <div class="layui-card-header">产品动态</div>
                                <div class="layui-card-body">
                                    <div class="layui-carousel layadmin-carousel layadmin-news" data-autoplay="true"
                                         data-anim="fade" lay-filter="news" lay-anim="fade" lay-indicator="inside"
                                         lay-arrow="none" style="width: 100%; height: 280px;">
                                        <div carousel-item="">
                                            <div class=""><a href="http://fly.layui.com/docs/2/" target="_blank"
                                                             class="layui-bg-red">layuiAdmin 快速上手文档</a></div>
                                            <div class="layui-this"><a
                                                    href="http://fly.layui.com/vipclub/list/layuiadmin/" target="_blank"
                                                    class="layui-bg-green">layuiAdmin 会员讨论专区</a></div>
                                            <div class="layui-carousel-next"><a href="http://www.layui.com/admin/#get"
                                                                                target="_blank" class="layui-bg-blue">获得
                                                    layui 官方后台模板系统</a></div>
                                        </div>
                                        <div class="layui-carousel-ind">
                                            <ul>
                                                <li class=""></li>
                                                <li class=""></li>
                                                <li class="layui-this"></li>
                                            </ul>
                                        </div>
                                        <button class="layui-icon layui-carousel-arrow" lay-type="sub"></button>
                                        <button class="layui-icon layui-carousel-arrow" lay-type="add"></button>
                                    </div>
                                </div>
                            </div>

                            <div class="layui-card">
                                <div class="layui-card-header">
                                    作者心语
                                    <i class="layui-icon layui-icon-tips" lay-tips="要支持的噢" lay-offset="5"></i>
                                </div>
                                <div class="layui-card-body layui-text layadmin-text">
                                    <p>一直以来，layui 秉承无偿开源的初心，虔诚致力于服务各层次前后端 Web
                                        开发者，在商业横飞的当今时代，这一信念从未动摇。即便身单力薄，仍然重拾决心，埋头造轮，以尽可能地填补产品本身的缺口。</p>
                                    <p>在过去的一段的时间，我一直在寻求持久之道，已维持你眼前所见的一切。而 layuiAdmin 是我们尝试解决的手段之一。我相信真正有爱于 layui
                                        生态的你，定然不会错过这一拥抱吧。</p>
                                    <p>子曰：君子不用防，小人防不住。请务必通过官网正规渠道，获得 <a href="http://www.layui.com/admin/"
                                                                        target="_blank">layuiAdmin</a>！</p>
                                    <p>—— 贤心（<a href="http://www.layui.com/" target="_blank">layui.com</a>）</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <script>
                    //加载 controller 目录下的对应模块
                    /*

                      小贴士：
                        这里 console 模块对应 的 console.js 并不会重复加载，
                        然而该页面的视图则是重新插入到容器，那如何保证能重新来控制视图？有两种方式：
                          1): 借助 layui.factory 方法获取 console 模块的工厂（回调函数）给 layui.use
                          2): 直接在 layui.use 方法的回调中书写业务代码，即:
                              layui.use('console', function(){
                                //同 console.js 中的 layui.define 回调中的代码
                              });

                      这里我们采用的是方式1。其它很多视图中采用的其实都是方式2，因为更简单些，也减少了一个请求数。

                    */
                    layui.use('console', layui.factory('console'));
                </script>
            </div>
        </div>

        <!-- 辅助元素，一般用于移动设备下遮罩 -->
        <div class="layadmin-body-shade" layadmin-event="shade"></div>

    </div>
</div>
<script src="/static/rc/layui.js?t=1.4.0"></script>
<script src="/static/dist/lib/admin.js?v=1.4.0"></script>
<script src="/static/style/admin.css?v=1.4.0"></script>
{{--<script>--}}
{{--    layui.config({--}}
{{--        base: '/static/dist/' //指定 layuiAdmin 项目路径--}}
{{--        , version: '1.4.0'--}}
{{--    }).use('index', function () {--}}
{{--        var layer = layui.layer, admin = layui.admin;--}}
{{--        layer.ready(function () {--}}
{{--            admin.popup({--}}
{{--                content: '单页面专业版默认未开启“多标签”功能，实际运用时，你可以自定义是否开启'--}}
{{--                , area: '300px'--}}
{{--                , shade: false--}}
{{--            });--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}



<style
    id="LAY_layadmin_theme">.layui-side-menu, .layadmin-pagetabs .layui-tab-title li:after, .layadmin-pagetabs .layui-tab-title li.layui-this:after, .layui-layer-admin .layui-layer-title, .layadmin-side-shrink .layui-side-menu .layui-nav > .layui-nav-item > .layui-nav-child {
        background-color: #20222A !important;
    }

    .layui-nav-tree .layui-this, .layui-nav-tree .layui-this > a, .layui-nav-tree .layui-nav-child dd.layui-this, .layui-nav-tree .layui-nav-child dd.layui-this a {
        background-color: #009688 !important;
    }

    .layui-layout-admin .layui-logo {
        background-color: #20222A !important;
    }</style>
<div class="layui-layer-move"></div>
</body>
</html>
