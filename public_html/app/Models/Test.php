<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'duration_minutes', 'attempts'];

    public function questions()
    {
        return $this->hasMany(\App\Models\Question::class);
    }
}