<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVarient extends Model
{
    use HasFactory;
	protected $fillable = ['varient','user_id'];
	public $timestamps = false;
}
