<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SequenceShipment1
 * 
 * @property int $sequence_value
 *
 * @package Laragento\Models
 */
class SequenceShipment1 extends Model
{
	protected $table = 'sequence_shipment_1';
	protected $primaryKey = 'sequence_value';
	public $timestamps = false;
}
