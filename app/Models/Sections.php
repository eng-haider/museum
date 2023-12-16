<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Spatie\Translatable\HasTranslations;

class Sections extends Model
{
    use HasTranslations,
        HasFactory,
        SearchableTrait;

    protected $fillable=[
        'title','photo','views','main_sections_id'
    ];

    public $translatable = ['title'];

    protected $searchable = [
        'columns' => [
            'title' => 10,
        ]
    ];


    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    public function subjects(){
        return $this->hasMany(Subjects::class);
    }

    public function mainSections(){
        return $this->belongsTo(MainSections::class);
    }

}
