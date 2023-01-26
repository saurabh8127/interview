<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
	protected $fillable = [
        'company_id',
        'category_id',
		'color_id',
		'date',
		'description',
		'name',
		'quentity'
    ];
}
