<?php

namespace App\Models;

use App\Models\User;
use App\Models\Metric;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Metric extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'input_type',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function entries()
    {
        return $this->hasMany(Metric::class);
    }
}

