<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class KafeelGift extends Model
{
    use HasFactory,HasTranslations,SearchableTrait;

    protected $fillable=['title','detail','price','image'];
    public $translatable = ['title','detail'];

    protected $searchable = [
        'columns' => [
            'title' => 10,
            'detail' => 10,
            'price' => 10,
        ]
    ];

    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

}
