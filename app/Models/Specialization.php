<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Specialization extends Model
{
    
    use HasFactory;
    use SoftDeletes;

    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}