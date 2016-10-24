<?php

namespace App\Http\Controllers;

use Pinyin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Model\App;
use App\Model\Type;
use App\Model\Tag;
use App\Model\Setting;
use App\Model\Address;
use App\Model\Screenshot;

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
        $hotTags = Tag::getHotTags();
        $types = Type::all();
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
        // dd($request);
        $data = [
            'title' =>  $request->title,
            'filename'  => $request->filename,
            'size'  =>  $request->filesize,
            'introduction'  =>  $request->introduction,
        ];
        $store = App::create($data);

        $address = new Address(['disk'   =>  'local', 'url'   => $request->fileurl]);
        $address = $store->addresses()->save($address);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $app = App::findOrFail($id);
        $types = Type::all();

        return view('app.edit', compact('app','types'));
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

        $title = splitFileName($file->getClientOriginalName());

        $file->storeAs('public', Pinyin::permalink($title['name']).".".$title['ext']);

        // 文件url
        $url = Storage::url(Pinyin::permalink($title['name']).".".$title['ext']);


        $file_info = array(
            'url'  =>  $url,
            'title' =>  $title['name'],
            'filename'  =>  $file->getClientOriginalName(),
            'ext'   =>  $title['ext'],
            'size'  =>  formatBytes($file->getClientSize()),
        );
        //
        echo json_encode($file_info);
    }

    /**
     * [uploadImage 上传截图]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function uploadImage(Request $request){
        $file = $request->file('screenshot_upload');

        $title = splitFileName($file->getClientOriginalName());

        $file->storeAs('public/screenshots', Pinyin::permalink($title['name']).".".$title['ext']);
        $url = Storage::url('screenshots/'.Pinyin::permalink($title['name']).".".$title['ext']);

        $data = [
            'url'   => $url,
        ];

        $app = App::findOrFail($request->app_id);
        $screenshot = new Screenshot(['url'   =>  $url]);
        $screenshot = $app->screenshots()->save($screenshot);

        echo json_encode(['url' => $url, 'id' => $screenshot->id]);

    }


}
