<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    // $table = 'apps';
    protected $fillable = ['title', 'filename', 'size', 'introduction'];

    // 一对多关联下载地址表
    // addresses: appid
    // app: id
    public function addresses(){
        return $this->hasMany('App\Model\Address', 'app_id', 'id');
    }

    public function screenshots(){
        return $this->hasMany('App\Model\Screenshot', 'app_id', 'id');
    }

    public function type(){
        return $this->belongsTo('App\Model\AppType', 'app_id', 'id');
    }
}
