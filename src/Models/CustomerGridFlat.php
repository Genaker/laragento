<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerGridFlat
 * 
 * @property int $entity_id
 * @property string|null $name
 * @property string|null $email
 * @property int|null $group_id
 * @property Carbon|null $created_at
 * @property int|null $website_id
 * @property string|null $confirmation
 * @property string|null $created_in
 * @property Carbon|null $dob
 * @property int|null $gender
 * @property string|null $taxvat
 * @property Carbon|null $lock_expires
 * @property string|null $shipping_full
 * @property string|null $billing_full
 * @property string|null $billing_firstname
 * @property string|null $billing_lastname
 * @property string|null $billing_telephone
 * @property string|null $billing_postcode
 * @property string|null $billing_country_id
 * @property string|null $billing_region
 * @property int|null $billing_region_id
 * @property string|null $billing_street
 * @property string|null $billing_city
 * @property string|null $billing_fax
 * @property string|null $billing_vat_id
 * @property string|null $billing_company
 *
 * @package Laragento\Models
 */
class CustomerGridFlat extends Model
{
	protected $table = 'customer_grid_flat';
	protected $primaryKey = 'entity_id';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'entity_id' => 'int',
		'group_id' => 'int',
		'website_id' => 'int',
		'gender' => 'int',
		'billing_region_id' => 'int'
	];

	protected $dates = [
		'dob',
		'lock_expires'
	];

	protected $fillable = [
		'name',
		'email',
		'group_id',
		'website_id',
		'confirmation',
		'created_in',
		'dob',
		'gender',
		'taxvat',
		'lock_expires',
		'shipping_full',
		'billing_full',
		'billing_firstname',
		'billing_lastname',
		'billing_telephone',
		'billing_postcode',
		'billing_country_id',
		'billing_region',
		'billing_region_id',
		'billing_street',
		'billing_city',
		'billing_fax',
		'billing_vat_id',
		'billing_company'
	];
}
