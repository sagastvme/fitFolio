<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    public mixed $name;
    public mixed $day;
    public mixed $duration;
    public mixed $user_id;
    public mixed $alternate_id;
    protected $fillable = [
        'user_id',
        'name',
        'day',
        'duration',
        'alternate_id'

    ];
}
