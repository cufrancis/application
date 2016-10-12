<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $fillable = ['name'];
    public $timestamps = false;

    // 显示所有分类，供模板使用
    static public function getAll($format = null){
        if($format == null){
            $types = self::all();
        } elseif($format == 'array') {
            // 这个格式留给view模板使用的，select
            // dd(Type::getAll('array')) 输出
            // array:2 [▼
            //       "Internet" => 1
            //       "print" => 2
            // ]
            $tmp = self::all();
            foreach ($tmp as $key) {
                $types[$key['name']]    =   $key['id'];
            }
        }

        return $types;
    }

    // public function getAll()
}
