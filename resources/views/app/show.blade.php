@extends('layouts.app')

@section('header')
    <link rel="stylesheet" type="text/css" href="{{ asset('easySlider/css/style.css') }}">
    <script src="{{ asset('easySlider/dist/easySlider.js') }}"></script>
@endsection

@section('content')
    <style>
    #common_content_main{background:#fff;position:relative;}
    .common_content_main .yanshi_xiazai{margin-top:18px;margin-bottom:8px;}
    .common_content_main .yanshi_xiazai a{font-size:16px;padding:10px 20px;margin-right:20px;background:#2DBFBE;color:#fff;}
    .common_content_main .yanshi_xiazai a:hover{background:#FF6263;}
    </style>

    <div class="container">
    	<div class="hero-unit">

            <center><b>{{ $app['name'] }}</b>
                <div class="common_content_main">
                    <p class="yanshi_xiazai">

                        {{-- 这里是下载地址 --}}
                        {{-- End --}}

                        @if(!Auth::guest())
                            <a href="">收藏资源</a>
                            {{-- @if(Auth::admin())
                                <a href="">
                            @endif --}}
                        @endif
                    </p>
                </div>
            </center><br />
            <!-- 百度分享代码 -->
            <div class="bdsharebuttonbox" data-tag="share_1">
                <a class="bds_qzone" data-cmd="qzone" href="#"></a>
                <a class="bds_tsina" data-cmd="tsina"></a>
                <a class="bds_renren" data-cmd="renren"></a>
                <a class="bds_tqq" data-cmd="tqq"></a>
                <a class="bds_douban" data-cmd="douban"></a>
                <a class="bds_huaban" data-cmd="huaban"></a>
                <a class="bds_weixin" data-cmd="weixin"></a>
                <a class="bds_bdysc" data-cmd="bdysc"></a>
                <a class="bds_copy" data-cmd="copy"></a>
                <a class="bds_count" data-cmd="count"></a>
            </div>
<script>
    window._bd_share_config = {
        common : {
            bdText : "{{ $app['name'] }}",
            bdDesc : "{{ ($app['introduction'] != '') ? $app['introduction'] : $app['name'] }}",
            bdUrl : "{{ url('/') }}"
        },
        share : [{
            "bdSize" : 32
        }]
    }
    with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>


资源作者：{{ $app['author'] }}<br />
共被下载：{{ $app['downloadNumber'] }}&nbsp;次<br />
文件名称：{{ $app['name'] }}<br />
资源大小：{{ $app['size'] }}<br />
{{-- 下载积分：<br /> --}}
{{-- 文件标签：<br /> --}}
发布日期：{{ $app['created_at'] }}<br />
资源介绍：<br />{{ $app['introduction'] }}<br />
<hr />
软件截图<br />


<div id="slider">
  <ul class="slides">
      @foreach ($app->screenshots()->get() as $screenshot)
          <li><img class="responsive" src="{{ asset($screenshot->url) }}" /></li>
      @endforeach
  </ul>

  <ul class="controls">
      <li><img src="{{ asset('easySlider/img/prev.png') }}" alt="previous"></li>
      <li><img src="{{ asset('easySlider/img/next.png') }}" alt="next"></li>
  </ul>

  {{-- <ul class="pagination">
      @foreach ($app->screenshots()->get() as $screenshot)
          <li></li>
      @endforeach
  </ul> --}}
</div>

    <div class="Download">
        下载地址
    </div>
    @foreach($app->addresses()->get() as $address)
        {{-- {{dd($address->url)}} --}}
        <a href="{{ asset("$address->url") }}">{{ $address->disk }}</a>
    @endforeach

    </div>
</div>

@endsection

@section('js')
    <script>
        $(function() {
            $("#slider").easySlider({});
        });
    </script>
@endsection
