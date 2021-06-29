<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class IndexerState
 * 
 * @property int $state_id
 * @property string|null $indexer_id
 * @property string|null $status
 * @property Carbon|null $updated
 * @property string $hash_config
 *
 * @package Laragento\Models
 */
class IndexerState extends Model
{
	protected $table = 'indexer_state';
	protected $primaryKey = 'state_id';
	public $timestamps = false;

	protected $dates = [
		'updated'
	];

	protected $fillable = [
		'indexer_id',
		'status',
		'updated',
		'hash_config'
	];
}
