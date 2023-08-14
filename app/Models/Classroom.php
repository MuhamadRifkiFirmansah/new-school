<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'classroom';
    protected $fillable = ['name'];

    public function student()
    {
        return $this->hasMany(Student::class, 'id_classroom', 'id');
    }

    protected static function booted () {
        static::deleting(function(Classroom $classroom) {
             $classroom->student()->delete();
        });
    }
}
