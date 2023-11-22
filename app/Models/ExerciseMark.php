<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseMark extends Model
{
    use HasFactory;
    protected $fillable = [
        'exercise_id',
        'mark',
        'alternate_id'
    ];
}
