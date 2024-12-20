<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table = 'courses';

    protected $primaryKey = 'id';

    protected $fillable = [
        'course_name',
        'course_duration',
        'fee',
    ];

    //mutator
    public function setCourse_NameAttribute($value){
        $this->attributes['course_name'] = strtoupper($value);
    }
}
