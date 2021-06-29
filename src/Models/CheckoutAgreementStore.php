<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CheckoutAgreementStore
 * 
 * @property int $agreement_id
 * @property int $store_id
 * 
 * @property Store $store
 * @property CheckoutAgreement $checkout_agreement
 *
 * @package Laragento\Models
 */
class CheckoutAgreementStore extends Model
{
	protected $table = 'checkout_agreement_store';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'agreement_id' => 'int',
		'store_id' => 'int'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function checkout_agreement()
	{
		return $this->belongsTo(CheckoutAgreement::class, 'agreement_id');
	}
}
