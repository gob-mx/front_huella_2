<?php

namespace App\Models\Expediente;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
	protected $table = "subject";

	protected $fillable = [
		'Template',
		'SubjectId',
		'GaleryId',
		'FirstName',
		'LastName',
		'YearOfBirth',
		'GenderString',
		'Country',
		'City',
		'Thumbnail',
		'EnrollData'
	];
}