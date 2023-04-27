<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class classroom extends Model
{
    use HasFactory , HasTranslations;

    public $translatable = ['name_class'];

    protected $fillable = ['name_class' , 'grade_id'];
    protected $table = 'classrooms';
    public $timestamps = true;


    public function  grade()
    {
        return $this->belongsTo(grade::class, 'grade_id' , 'id');
    }
}
