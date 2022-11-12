<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    use HasFactory;
	protected $fillable = [
		'writeday42',
		'divisions_id42',
		'operation42',
		'code42',
		'location42',
		'manager42',
		'bigo42',
	
	];
}
