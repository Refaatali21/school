<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class sections extends Model
{
    use HasFactory , HasTranslations;

    public $translatable = ['name_section'];

    protected $fillable = ['name_section' , 'status' , 'class_id' , 'grade_id'];
    protected $table = 'sections';
    public $timestamps = true;



    public function  classrooms()
    {
        return $this->belongsTo(classroom::class, 'class_id' , 'id');
    }


}
