<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Doctor;
use Illuminate\Support\Str;
use App\Models\Specialization;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'email',
        'password',
        'name',
        'lastname',
        'address',
        'slug',
       
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function doctor()
    {
        return $this->hasOne(Doctor::class);
    }

    public function specializations()
    {
        return $this->belongsToMany(Specialization::class);
    }

    public function getRouteKey()
    {
        return $this->slug;
    }

    public static function slugger($string)
    {
        //Project::slugger($title)

        //generare lo slug base

        $baseSlug = Str::slug($string); //ciao-a-tutti
        $i = 1;
        $slug = $baseSlug;

        //finchè lo slug generato è presente nella tabella
        while (User::where('slug', $slug)->first()) {

            //genera un nuovo slug concatenando il contatore
            $slug = $baseSlug . '-' . $i; //ciao-a-tutti-1

            //incrementa il contatore
            $i++; //ciao-a-tutti-2
        }

        return $slug;
    }

}
