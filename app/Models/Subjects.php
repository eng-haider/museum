<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\Translatable\HasTranslations;
use App\Models\Sections;

class Subjects extends Model
{

    use HasTranslations;
    use HasFactory;

    protected $fillable=[
        'title','more','photo',
        'views','downloads','inputs',
        'sections_id'
    ];

    public $translatable = ['more'];
    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    public function sections(){
        return $this->belongsTo(Sections::class);
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
    public function inputSubjects(){
        return $this->hasMany(InputsSubjects::class);
    }


}
