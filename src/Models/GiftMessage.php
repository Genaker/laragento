<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class GiftMessage
 * 
 * @property int $gift_message_id
 * @property int $customer_id
 * @property string|null $sender
 * @property string|null $recipient
 * @property string|null $message
 *
 * @package Laragento\Models
 */
class GiftMessage extends Model
{
	protected $table = 'gift_message';
	protected $primaryKey = 'gift_message_id';
	public $timestamps = false;

	protected $casts = [
		'customer_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'sender',
		'recipient',
		'message'
	];
}
