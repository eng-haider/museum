<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasFactory;
    use HasTranslations;

    protected $fillable=[
        'views','photo','about','title'
    ];


    public $translatable = ['about','title'];

    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }
}
