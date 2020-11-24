<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Monitor extends Model
{
    use HasApiTokens, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'alt_phone',
        'email',
        'gender', 
        'dob',
        'address',
        'origin',
        'lga_origin',
        'residence',
        'lga_residence',
        'marital_status',
        'bank_name',
        'acct_number',
        'type',
        'unique_id',
        'sponsor_fullname',
        'sponsor_designation',
        'sponsor_address', 
        'sponsor_phone',
        'password',
        'bio',
        'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

