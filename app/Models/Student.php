<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name','id_classroom','gender','email','status','parent_number'
    ];

    public function classroom()
    {
        return $this->hasOne(Classroom::class, 'id', 'id_classroom');
    }
}
