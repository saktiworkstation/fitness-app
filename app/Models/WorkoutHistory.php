<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkoutHistory extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Member()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
