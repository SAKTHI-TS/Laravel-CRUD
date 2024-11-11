<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Crud
 * 
 * @property int $id
 * @property string $name
 * @property int $age
 * @property string $dept
 *
 * @package App\Models
 */
class Crud extends Model
{
	protected $table = 'crud';
	public $timestamps = false;

	protected $casts = [
		'age' => 'int'
	];

	protected $fillable = [
		'name',
		'age',
		'dept'
	];
}
