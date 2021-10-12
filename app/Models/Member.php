<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public $timestamps = false;
    protected $fillable = ['nama', 'password', 'no_hp', 'tangal_lahir', 'email', 'jenis_kelamin', 'no_ktp', 'foto'];
    use HasFactory;
    // protected $table = 'member';
}
