@extends('layouts.app')

@section('header')
    <meta name="_token" content="{{ csrf_token() }}"/>
@endsection

@section('content')
    {{-- <script src="{{ asset('js/jquery.uploadify.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/jquery.ajaxfileupload.js') }}"></script> --}}
    <script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/uploadify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styletiny.css') }}">
    <style type="text/css">
    .uploadify-button {
        background-color: transparent;
        border: none;
        padding: 0;
    }
    .uploadify:hover .uploadify-button {
        background-color: transparent;
    }

    .btn{position: relative;overflow: hidden;margin-right: 4px;display:inline-block;
    *display:inline;padding:4px 10px 4px;font-size:14px;line-height:18px;
    *line-height:20px;color:#fff;
    text-align:center;vertical-align:middle;cursor:pointer;background:#5bb75b;
    border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf;
    border-bottom-color:#b3b3b3;-webkit-border-radius:4px;
    -moz-border-radius:4px;border-radius:4px;}
    .btn input{position: absolute;top: 0; right: 0;margin: 0;border:solid transparent;
    opacity: 0;filter:alpha(opacity=0); cursor: pointer;}
    .progress{
        position:relative;
        /*margin-left:100px; 
        margin-top:-24px;*/
        width:200px;padding: 1px; border-radius:3px; display:none}
    .bar {background-color: green; display:block; width:0%; height:20px;
    border-radius:3px; }
    .percent{position:absolute; height:20px; display:inline-block;
    top:3px; left:2%; color:#fff }
    .files{height:22px; line-height:22px; margin:10px 0}
    .delimg{margin-left:20px; color:#090; cursor:pointer}
    </style>

    <div class="container">
    	<div class="hero-unit">

            <div class="btn">
                <span>添加附件</span>
                {!! Form::file('file_upload', ['id' => 'file_upload','multiple' => true]) !!}
            </div>
            <br />
            <div class="progress">
                <span class="bar"></span><span class="percent">0%</span >
            </div>

            <div class="files"></div>
            <div id="showimg"></div>

            {!! Form::open(['route'    =>  'website.app.store',
                                'method' =>  'POST',
                                'files' =>  true,
                                'onsubmite' =>  'return Check(this)']) !!}
            {!! Form::token() !!}

            <p>{!! Form::label('标题：', null, ['style'    =>  'width:502px;']) !!}
                {!! Form::text('title', null, ['id' =>  'title',    'style' =>  'width:502px;']) !!}</p>

            <p>{!! Form::label('分类：') !!}
                {!! Form::select('type', $types, null, ['placeholder'  =>  'pick a type...']) !!}</p>

            <p>{!! Form::label('资源地址：') !!}
                {!! Form::text('fileurl', null, ['id'  =>  'url',
                                                'style' =>  'width:502px;']) !!}</p>

            <p>{!! Form::label('文件名称：') !!}
                {!! Form::text('filename', null, ['id' =>  'filename',
                                                'style' =>  'width:502px;']) !!}</p>

            <p>{!! Form::label('文件大小:') !!}
                {!! Form::text('filesize', null, ['id' =>  'filesize',
                                                'style' =>  'width:502px;']) !!}</p>

            <p>{!! Form::label('文章标签：') !!}
                {!! Form::text('tag', null, ['id'  =>  'tag',
                                            'style' =>  'width:502px;']) !!}</p>

            <p>{!! Form::label('热门标签：') !!}
            @foreach($hotTags as $tag)
                <a href="javascript:void(0)" onClick="javascript:selecttag('{{ $tag['name'] }}')">{{ $tag['name'] }}&nbsp;&nbsp;&nbsp;</a>
            @endforeach
            </p>

            {{-- 介绍 --}}
            {!! Form::text('introduction', null, ['id' => 'editinput', 'style'=>'width:400px; height:200px']) !!}

            <p>{!! Form::label('内容摘要：') !!}
                {!! Form::text('description', null, ['style'   =>  'width:502px;']) !!}</p>

            {!! Form::submit('发布',['onclick'    =>  'editor.post()']) !!}

            {!! Form::close() !!}
    	</div>
    </div>
    <script type="text/javascript" src="{{ asset('js/tinyeditor.js') }}"></script>
    <script type="text/javascript">
    	new TINY.editor.edit('editor',{
    	id:'editinput',
    	width:584,
    	height:175,
    	cssclass:'te',
    	controlclass:'tecontrol',
    	rowclass:'teheader',
    	dividerclass:'tedivider',
    	controls:['bold','italic','underline','strikethrough','|','subscript','superscript','|',
    			  'orderedlist','unorderedlist','|','outdent','indent','|','leftalign',
    			  'centeralign','rightalign','blockjustify','|','unformat','|','undo','redo','n',
    			  'font','size','style','|','image','hr','link','unlink','|','cut','copy','paste','print'],
    	footer:true,
    	fonts:['Verdana','Arial','Georgia','Trebuchet MS'],
    	xhtml:true,
    	bodyid:'editor',
    	footerclass:'tefooter',
    	toggle:{text:'source',activetext:'wysiwyg',cssclass:'toggle'},
    	resize:{cssclass:'resize'}
    });
    </script>
    <script type="text/javascript">

    function Check(form)
    {
    	var type = document.getElementById("type").value;
    	var title = document.getElementById("title").value;
    	var url = document.getElementById("url").value;
    	if( type == "" )
    	{
    		window.alert("你没有选择分类");
    		return false;
    	}
    	if( title == "" )
    	{
    		window.alert("文章标题不能为空");
    		return false;
    	}
    	if( url == "" )
    	{
    		window.alert("资源地址不能为空");
    		return false;
    	}
    }

    function selecttag( tag )
    {
    	document.getElementById('tag').value += tag + ',';
    }

    </script>

    <script>
        $(function(){
            var bar = $(".bar");
            var percent = $(".percent");
            var showimg = $("showimg");
            var progress = $(".progress");
            var files = $(".files");
            var btn = $(".btn span");

            var title = document.getElementById("title");
            var name  = document.getElementById("filename");
            var size  = document.getElementById("filesize");
            // var ext   = document.getElementById("fileext");
            var url   = document.getElementById("url");

            $("#file_upload").wrap("<form id='myupload' action='{{ route('website.app.uploader') }}' method='post' enctype='multipart/form-data'></form>");
            $("#myupload").change(function(){
                $("#myupload").ajaxSubmit({
                    dataType:  'json', //数据格式为json
                    data: {'_token': '{{ csrf_token() }}'},
                     beforeSend: function() { //开始上传
                         showimg.empty(); //清空显示的图片
                         progress.show(); //显示进度条
                         var percentVal = '0%'; //开始进度为0%
                         bar.width(percentVal); //进度条的宽度
                         percent.html(percentVal); //显示进度为0%
                         btn.html("上传中..."); //上传按钮显示上传中
                     },
                     uploadProgress: function(event, position, total, percentComplete) {
                         var percentVal = percentComplete + '%'; //获得进度
                         bar.width(percentVal); //上传进度条宽度变宽
                         percent.html(percentVal); //显示上传进度百分比
                     },
                     success: function(data) { //成功
                        title.value = data.title;
                        url.value = data.url;
                        name.value = data.filename;
                        size.value = data.size;
                        //  获得后台返回的json数据，显示文件名，大小，以及删除按钮
                        //  files.html("<b>"+data.filename+"("+data.size+"k)</b>
                        //  <span class='delimg' rel='"+data.path+"'>删除</span>");
                        //  //显示上传后的图片
                        //  var img = "http://demo.helloweba.com/upload/files/"+data.path;
                        //  showimg.html("<img src='"+img+"'>");
                        btn.html("上传完成");
                        $(".myupload").hide();
                        //  btn.html("添加附件"); //上传按钮还原
                     },
                     error:function(xhr){ //上传失败
                         btn.html("上传失败");
                         bar.width('0');
                         files.html(xhr.responseText); //返回失败信息
                     }
                });
            });
        });
    </script>

    {{-- <script type="text/javascript">
        $(function() {
            $('#file_upload').change(function(){
                $.ajax({
                    url: '{{ route('website.app.uploader') }}',
                    dataType: 'json',
                    success:function(data){
                        alert(data);
                    },
                });
            });
        });
    </script> --}}
@endsection
