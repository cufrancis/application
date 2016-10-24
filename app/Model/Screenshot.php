<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $fillable = ['app_id', 'url', 'isShow'];

    public function getLastId(){
        return self::where('isShow', '=', 1)->orderBy('id', 'desc')->first();
    }

}
