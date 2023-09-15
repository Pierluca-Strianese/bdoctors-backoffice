<?php

namespace App\Models;

use App\Models\User;
use App\Models\Promotion;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class,'doctor_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class,'doctor_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($doctor) {
            if (!$doctor->user_id) {
                $doctor->user_id = auth()->user()->id;
            }
        });
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
        while (Doctor::where('slug', $slug)->first()) {

            //genera un nuovo slug concatenando il contatore
            $slug = $baseSlug . '-' . $i; //ciao-a-tutti-1

            //incrementa il contatore
            $i++; //ciao-a-tutti-2
        }

        return $slug;
    }

    public function calculateAverageRating()  {
        $totalRatings = 0;
        $numberOfRatings = count($this->reviews);

        if ($numberOfRatings === 0) {
           return 0;
        }

        foreach ($this->reviews as $review) {
          $totalRatings += $review['valutation'];
        }

        return $totalRatings / $numberOfRatings;
    }

}





