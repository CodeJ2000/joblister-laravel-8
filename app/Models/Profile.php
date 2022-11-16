<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['educ', 'address', 'gender', 'contact_number', 'birthdate'];

    public function user ()
    {
        return $this->belongsTo(User::class);
    }
}