<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
	
	protected $fillable = [
		'uid42',
		'pwd42',
		'name42',
		'tel42',
		'rank42',
	
	];
	/*  여기 등록된 필드만 사용 가능 아니면 사용 불가함 지정 필요함 (보안) */
}
