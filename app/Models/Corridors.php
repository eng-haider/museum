<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Corridors extends Model
{
    use HasFactory;
    use HasTranslations;
    protected $fillable=[
        'views','more','pack',
    'photo','size','time',
    'downloads','rating'];
    public $translatable = ['more'];

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
