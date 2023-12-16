<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MainSections extends Model
{
    use HasTranslations;
    use HasFactory;
    protected $fillable=[
        'title','photo','bg'
    ];

    public $translatable = ['title'];

    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    public function sections(){
        return $this->hasMany(Sections::class);
    }
}
