<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class InputsSubjects extends Model
{
    use HasFactory,HasTranslations;

    protected $fillable=[
        'val','spec','subjects_id'
    ];

    public $translatable = ['val','spec'];

    protected function asJson($value){
        return json_encode($value,JSON_UNESCAPED_UNICODE);
    }

    public function subjects(){
        return $this->belongsTo(Subjects::class);
    }

}
