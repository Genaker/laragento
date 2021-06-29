<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class AuthorizationRole
 * 
 * @property int $role_id
 * @property int $parent_id
 * @property int $tree_level
 * @property int $sort_order
 * @property string $role_type
 * @property int $user_id
 * @property string|null $user_type
 * @property string|null $role_name
 * 
 * @property Collection|AuthorizationRule[] $authorization_rules
 *
 * @package Laragento\Models
 */
class AuthorizationRole extends Model
{
	protected $table = 'authorization_role';
	protected $primaryKey = 'role_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'tree_level' => 'int',
		'sort_order' => 'int',
		'user_id' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'tree_level',
		'sort_order',
		'role_type',
		'user_id',
		'user_type',
		'role_name'
	];

	public function authorization_rules()
	{
		return $this->hasMany(AuthorizationRule::class, 'role_id');
	}
}
