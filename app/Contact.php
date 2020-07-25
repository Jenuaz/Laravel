<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Model which will be used to interact with the contacts DB
class Contact extends Model
{
	protected $fillable = [
		'first_name',
		'last_name',
		'email',
		'city',
		'country',
		'job_title'
	];
}
