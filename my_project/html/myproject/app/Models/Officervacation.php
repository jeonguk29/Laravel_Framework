<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officervacation extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'startwriteday42',
		'endwriteday42',
		'uids_id42',
		'name42',
		'rank42',
		'tel42',
		'area42',
	
	];
}
