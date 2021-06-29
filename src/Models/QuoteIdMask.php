<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class QuoteIdMask
 * 
 * @property int $entity_id
 * @property int $quote_id
 * @property string|null $masked_id
 * 
 * @property Quote $quote
 *
 * @package Laragento\Models
 */
class QuoteIdMask extends Model
{
	protected $table = 'quote_id_mask';
	public $timestamps = false;

	protected $casts = [
		'quote_id' => 'int'
	];

	protected $fillable = [
		'masked_id'
	];

	public function quote()
	{
		return $this->belongsTo(Quote::class);
	}
}
