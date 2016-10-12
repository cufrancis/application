<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';

    // 返回热门标签，按照num排序，取前10
    static public function getHotTags(){
        $tags = self::limit(10)->orderBy('num', 'desc')->get();

        return $tags;
    }
}
