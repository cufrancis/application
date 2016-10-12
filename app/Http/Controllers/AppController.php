<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\App;
use App\Model\Type;
use App\Model\Tag;
use App\Model\Setting;
use App\Http\Requests;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::getAll('array');
        $hotTags = Tag::getHotTags();
        // dd($hotTags);
        // dd($types);
        return view('app.create', compact('types', 'hotTags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $app = App::where('id', '=', $id)->first()->get();
        $app = App::findOrFail($id);
        return view('app.show', compact('app'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Ajax 上传文件
    public function uploader(Request $request){

        $file = $request->file('file_upload');

        $path = $file->store('files');
        $tmp = explode('.', $file->getClientOriginalName());
        $title = $tmp[0];
        $filename   =   $file->getClientOriginalName(); // 文件名
        $ext = $file->getMimeType(); // 文件格式 MIME
        $size = $file->getClientSize(); // 文件大小
        //
        $file_info = array(
            'url'  =>  $path,
            'title' =>  $title,
            'filename'  =>  $filename,
            'ext'   =>  $ext,
            'size'  =>  $size,
        );

        echo json_encode($file_info);
    }


}
