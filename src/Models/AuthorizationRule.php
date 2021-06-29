<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthorizationRule
 * 
 * @property int $rule_id
 * @property int $role_id
 * @property string|null $resource_id
 * @property string|null $privileges
 * @property string|null $permission
 * 
 * @property AuthorizationRole $authorization_role
 *
 * @package Laragento\Models
 */
class AuthorizationRule extends Model
{
	protected $table = 'authorization_rule';
	protected $primaryKey = 'rule_id';
	public $timestamps = false;

	protected $casts = [
		'role_id' => 'int'
	];

	protected $fillable = [
		'role_id',
		'resource_id',
		'privileges',
		'permission'
	];

	public function authorization_role()
	{
		return $this->belongsTo(AuthorizationRole::class, 'role_id');
	}
}
