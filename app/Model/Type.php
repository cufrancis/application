<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    // 显示所有分类，供模板使用
    static public function getAll(){
        $types = self::all();

        return $types;
    }

}
