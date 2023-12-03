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
        'alternate_id',
        'id'
    ];
    public function getMark(){
        return $this['mark'];
    }  public function getId(){
        return $this['id'];
    }
    public function getCreated(){
        return $this['created_at'];
    }
}
