<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Nicolaslopezj\Searchable\SearchableTrait;

class News extends Model
{
    use HasFactory;
    use HasTranslations,SearchableTrait;

    protected $fillable =['title','views','photo',
    'pics','text','more','photo_more',
    'time','ces','category'];

    public $translatable = ['title','text','more','photo_more'];

    protected $searchable = [
        'columns' => [
            'title' => 10,
            'more' => 10,
        ]
    ];

    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    public function Images()
    {
        return $this->hasMany(Images::class );
    }
//
//    public function Image()
//        {
//            return $this->morphOne(Images::class, 'imageable')->oldestOfMany();
//        }

}
