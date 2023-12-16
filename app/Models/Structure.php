<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Structure extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable=[
        'title','text','photo','arrange'
    ];


    public $translatable = ['title','text'];
    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }
//    public function Images()
//    {
//        return $this->morphMany('App\Models\Images', 'imageable');
//    }
//
//            public function Image()
//        {
//            return $this->morphOne(Images::class, 'imageable')->oldestOfMany();
//        }

}
