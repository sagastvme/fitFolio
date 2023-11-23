<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    private ?string $name = null;
    public string $day;
    public int $duration;
    public int $user_id;
    public ?string $alternate_id = null;

    protected $fillable = [
        'user_id',
        'name',
        'day',
        'duration',
        'alternate_id',
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        // Initialize default values or perform any additional setup here
        $this->duration = 0; // Example default value for duration
    }

    public function getName()
    {
        return $this['name'];
    }
    public function getDuration()
    {
        return $this['duration'];
    }

    public function getAlternateId()
    {
        return $this['alternate_id'];
    }
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }


}

