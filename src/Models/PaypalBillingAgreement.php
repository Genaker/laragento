<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PaypalBillingAgreement
 * 
 * @property int $agreement_id
 * @property int $customer_id
 * @property string $method_code
 * @property string $reference_id
 * @property string $status
 * @property Carbon $created_at
 * @property Carbon|null $updated_at
 * @property int|null $store_id
 * @property string|null $agreement_label
 * 
 * @property CustomerEntity $customer_entity
 * @property Store|null $store
 * @property Collection|PaypalBillingAgreementOrder[] $paypal_billing_agreement_orders
 *
 * @package Laragento\Models
 */
class PaypalBillingAgreement extends Model
{
	protected $table = 'paypal_billing_agreement';
	protected $primaryKey = 'agreement_id';

	protected $casts = [
		'customer_id' => 'int',
		'store_id' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'method_code',
		'reference_id',
		'status',
		'store_id',
		'agreement_label'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function paypal_billing_agreement_orders()
	{
		return $this->hasMany(PaypalBillingAgreementOrder::class, 'agreement_id');
	}
}
