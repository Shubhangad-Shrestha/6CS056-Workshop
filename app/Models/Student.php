<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'date_of_birth',
    ];

    // Cast date_of_birth as a date
    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
        ];
    }

    // Calculate student's age
    protected function age(): Attribute
    {
        return Attribute::get(fn () => $this->date_of_birth?->age);
    }
}
