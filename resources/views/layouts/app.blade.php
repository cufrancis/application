<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="{{ Setting()->get('keywords') }}" />
	<meta name="description" content="{{ Setting()->get('description') }}" />
	<meta name="author" content="{{ Setting()->get('author') }}" />
	<meta name="copyright" content="© http://hbdx.cc" />
	<meta charset="utf-8">
	<title>{{ Setting()->get('website_title') }}</title>
	<link rel="stylesheet" href="{{ asset('css/style.css') }}" />
	<script>var Home = "{{ url('/') }}"</script>
	{{-- <script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script> --}}
	<script src="//cdn.bootcss.com/jquery/3.1.1/jquery.min.js"></script>
	@yield('header')
</head>
<body>
<div class="navbar">
	<div class="navbar-inner">
		<div class="container">
			<div class="nav">
				<li><a href="{{ url('/') }}">首页</a></li>
				@foreach(AppTypes()->getAll() as $type)
					<li><a href="{{ route('website.type.show', $type['id']) }}"><?php echo $type['name'] ?></a></li>
				@endforeach
			</div>
			<div class="navr">
				@if(!Auth::guest())
					{{-- 是否是管理员 --}}
					@if(Auth::admin())
						<a href="">会员</a>&nbsp;&nbsp;&nbsp;
						<a href="">系统</a>&nbsp;&nbsp;&nbsp;
					@endif
					<a href="">个人</a>&nbsp;&nbsp;&nbsp;
					<a href="">资源</a>&nbsp;&nbsp;&nbsp;
					<a href=">">收藏</a>&nbsp;&nbsp;&nbsp;
					<a href="">发布</a>&nbsp;&nbsp;&nbsp;
					<a href="">注销</a>&nbsp;&nbsp;&nbsp;
				@else
					<a href="">注册</a>&nbsp;&nbsp;&nbsp;
					<a href="">登录</a>
				@endif
			</div>
		</div>
	</div>
</div>
@yield('content')

</div>
</div>
<div class="scf-footer">
<ul class="scf-link-list">合作网站：
    <li><a href="http://down.admin5.com" target="_blank">A5源码</a></li>
    <li><a href="http://down.chinaz.com/" target="_blank">站长下载</a></li>
    <li><a href="http://www.tudou.com/home/dolphin836" target="_blank">视频教程</a></li>
    <li class="last"><a href="http://blog.hbdx.cc" target="_blank">站长博客</a></li><br />
</ul><p>Copyright © 2013 <a href="http://d.hbdx.cc" target="_blank">Simple Down v6.2</a>. All Rights Reserved. <a href="http://hbdx.cc" target="_blank">海兵大侠</a> 版权所有
</div>

</body>
</html>
