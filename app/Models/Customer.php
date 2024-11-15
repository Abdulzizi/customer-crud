<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['firstName', 'lastName', 'email', 'phoneNumber', 'bankNumber', 'about'];
}
