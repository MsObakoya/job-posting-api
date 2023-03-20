<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\Factory;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'salary',
        'location',
        'category',
        'type'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
