<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
	protected $fillable = [
        'company_name',
        'phone',
		'email',
		'address',
		'company_contact_person_name'
    ];
}
