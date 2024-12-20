<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $primarykey = 'id';

    protected $fillable = [
        'name',
        'address',
        'contact',
        'course_id',
        'fee',
        'remaining_fee',
    ];

    public function getCourse(){
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
