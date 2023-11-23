<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    public function getDay(): string
    {
        return $this['day'];
    }

    public function getUserId(): int
    {
        return $this['user_id'];
    }
    use HasFactory;

    private ?string $name = null;
    public ?string $day;
    public ?int $duration = null;
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
    }

    public function getName()
    {
        return $this['name'];
    }
    public function getDuration()
    {
        return $this['duration'];
    }

    public function getId(){
        return $this['id'];
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

