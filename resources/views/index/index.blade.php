@extends('layouts.app')

@section('content')
    <div class="container">
    	<div class="hero-unit">
    		<table class='table'>
    			<tr>
                    @if(Setting()->get('isShowUse')) <th>操作</th> @endif
    				<th>标题</th>
                    @if(Setting()->get('isShowSize')) <th>大小</th> @endif
                    @if(Setting()->get('isShowDownloadNumber'))
                        <th>下载 @if(Setting()->get('isShowVisitNumber'))
                            /浏览</th>
                        @else
                        </th>
                        @endif
                    @endif
                    @if(Setting()->get('isShowAuthor')) <th>发布者</th> @endif
                    @if(Setting()->get('isShowTag')) <th>标签</th> @endif
                    @if(Setting()->get('isShowIntegration')) <th>日期</th> @endif
    			</tr>

                @foreach($apps as $app)
                    <tr>
                        <td><a href="{{ route('website.app.show', $app['id']) }}">{{ $app['title'] }}</a></td>

                        @if(Setting()->get('isShowSize'))
                            <td>{{ $app['size'] }}</td>
                        @endif

                        @if(Setting()->get('isShowDownloadNumber'))
                            <td>{{ $app['downloadNumber'] }}
                            @if(Setting()->get('isShowVisitNumber'))
                                /{{ $app['visitNumber'] }}</td>
                            @else
                            </td>
                            @endif
                        @endif

                        @if(Setting()->get('isShowAuthor'))
                            <td>{{ $app['author'] }}</td>
                        @endif

                        {{-- Tag --}}
                        @if(Setting()->get('isShowTag'))
                            <td>NULL</td>
                        @endif

                        {{-- 时间 --}}
                        @if(Setting()->get('isShowDate'))
                            <td>{{ $app['created_at'] }}</td>
                        @endif
                    </tr>
                @endforeach
    		</table>
@endsection
