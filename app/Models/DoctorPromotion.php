<?php

namespace App\Models;

use App\Models\Promotion;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DoctorPromotion extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['subscription_date', 'promotion_id', 'doctor_id'];

    protected $dates = ['subscription_date', 'expiration_date']; 


    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class);
    }

    public function getExpirationDateAttribute()
    {
        // Ottieni la durata prevista dalla promozione associata
        $promotionDuration = $this->promotion->duration; // Supponendo che ci sia una relazione "promotion" nel tuo modello

        // Calcola la data di scadenza aggiungendo la durata in giorni alla data di sottoscrizione
        return $this->subscription_date->addDays($promotionDuration);

    }

}