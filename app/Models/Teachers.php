<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'contact',
        'address',
        'course_id',
    ];

    public function getCourse(){
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
