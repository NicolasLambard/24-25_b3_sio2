<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PFXUser
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $comment
 * @property string $code_gender
 * @property int $id_role
 * 
 * @property PFXGender $p_f_x_gender
 * @property PFXRole $p_f_x_role
 *
 * @package App\Models
 */
class PFXUser extends Model
{
	protected $table = 'PFX_users';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'id_role' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'first_name',
		'last_name',
		'comment',
		'code_gender',
		'id_role'
	];

	public function p_f_x_gender()
	{
		return $this->belongsTo(PFXGender::class, 'code_gender');
	}

	public function p_f_x_role()
	{
		return $this->belongsTo(PFXRole::class, 'id_role');
	}
}
