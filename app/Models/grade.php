<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\sections;
use Spatie\Translatable\HasTranslations;

class grade extends Model
{

    use HasFactory , HasTranslations;

    public $translatable = ['name' , 'notes'];

    protected $fillable = ['name' , 'notes'];
    protected $table = 'grades';
    public $timestamps = true;





public function  sections()
{
    return $this->hasMany(sections::class, 'grade_id', 'id');
}

}


