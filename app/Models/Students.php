<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'address',
        'contact',
        'course_id',
        'fee',
        'remaining_fee'
    ];

    public function getCourses(){
        return $this->hasOne(Course::class, 'id', 'course_id');
    }
}
