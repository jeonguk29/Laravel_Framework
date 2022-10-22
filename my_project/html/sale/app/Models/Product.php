<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'products42',
		'name42',
		'price42',
		'jaego42',
		'pic42',
	
	];
}
