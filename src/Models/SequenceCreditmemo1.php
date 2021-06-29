<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SequenceCreditmemo1
 * 
 * @property int $sequence_value
 *
 * @package Laragento\Models
 */
class SequenceCreditmemo1 extends Model
{
	protected $table = 'sequence_creditmemo_1';
	protected $primaryKey = 'sequence_value';
	public $timestamps = false;
}
