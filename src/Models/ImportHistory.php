<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ImportHistory
 * 
 * @property int $history_id
 * @property Carbon $started_at
 * @property int $user_id
 * @property string|null $imported_file
 * @property string|null $execution_time
 * @property string|null $summary
 * @property string $error_file
 *
 * @package Laragento\Models
 */
class ImportHistory extends Model
{
	protected $table = 'import_history';
	protected $primaryKey = 'history_id';
	public $timestamps = false;

	protected $casts = [
		'user_id' => 'int'
	];

	protected $dates = [
		'started_at'
	];

	protected $fillable = [
		'started_at',
		'user_id',
		'imported_file',
		'execution_time',
		'summary',
		'error_file'
	];
}
