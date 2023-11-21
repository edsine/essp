<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Laravel\Sanctum\HasApiTokens;

class Employer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'branch_id',
        'contact_surname',
        'contact_firstname',
        'contact_middlename',
        'contact_position',
        'contact_number',
        'company_phone',
        'company_state',
        'company_localgovt',
        'company_name',
        'business_area',
        'company_rcnumber',
        'cac_reg_year',
        'company_address',
        'company_email',
        'password',
        'account_officer_id',
        'certificate_of_incorporation',
        'user_id',
        'ecs_number',
        'paid_registration',
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
        'password' => 'hashed',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function accident_claims()
    {
        return $this->hasMany(AccidentClaim::class);
    }

    public function death_claims()
    {
        return $this->hasMany(DeathClaim::class);
    }

    public function disease_claims()
    {
        return $this->hasMany(DiseaseClaim::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'company_state', 'id');
    }

    public function lga()
    {
        return $this->belongsTo(LGA::class, 'company_localgovt', 'id');
    }

    public function routeNotificationForMail(Notification $notification): array|string
    {
        // Return email address only...
        return $this->company_email;
    }

    public function branch(){
        return $this->belongsTo(Branch::class);
    }
}
