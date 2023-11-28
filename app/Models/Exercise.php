<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    const TYPE_CARDIO = 'Cardio';
    const TYPE_WEIGHT = 'Weight';


    protected $fillable = [
        'workout_id',
        'name',
        'muscle_group',
        'notes',
        'type',
        'duration',
        'alternate_id'
    ];

    public static $rules = [
        'workout_id' => 'required|exists:workouts,id',
        'name' => 'required|string',
        'muscle_group' => 'required|string',
        'notes' => 'nullable|string',
        'type' => 'required|in:'.self::TYPE_CARDIO.','.self::TYPE_WEIGHT,
        'duration' => 'required|integer',
        'alternate_id' => 'required|uuid',
    ];

    public function getName()
    {
        return $this['name'];
    }
    public function getDuration(){
        return $this['duration'];
    }public function getId(){
        return $this['id'];
    }public function getMuscleGroup(){
        return $this['muscle_group'];
    }public function getType(){
        return $this['type'];
    }public function getNotes(){
        return $this['notes'];
    }
}
