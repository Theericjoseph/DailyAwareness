<?php

namespace App\Models;

use App\Models\User;
use App\Models\Metric;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Entry extends Model
{
    use HasFactory;

    protected $fillable = [
        'metric_id',
        'value',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function metric()
    {
        return $this->belongsTo(Metric::class);
    }
}
