<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class SalesOrderAddress
 * 
 * @property int $entity_id
 * @property int|null $parent_id
 * @property int|null $customer_address_id
 * @property int|null $quote_address_id
 * @property int|null $region_id
 * @property int|null $customer_id
 * @property string|null $fax
 * @property string|null $region
 * @property string|null $postcode
 * @property string|null $lastname
 * @property string|null $street
 * @property string|null $city
 * @property string|null $email
 * @property string|null $telephone
 * @property string|null $country_id
 * @property string|null $firstname
 * @property string|null $address_type
 * @property string|null $prefix
 * @property string|null $middlename
 * @property string|null $suffix
 * @property string|null $company
 * @property string|null $vat_id
 * @property int|null $vat_is_valid
 * @property string|null $vat_request_id
 * @property string|null $vat_request_date
 * @property int|null $vat_request_success
 * 
 * @property SalesOrder|null $sales_order
 *
 * @package Laragento\Models
 */
class SalesOrderAddress extends Model
{
	protected $table = 'sales_order_address';
	protected $primaryKey = 'entity_id';
	public $timestamps = false;

	protected $casts = [
		'parent_id' => 'int',
		'customer_address_id' => 'int',
		'quote_address_id' => 'int',
		'region_id' => 'int',
		'customer_id' => 'int',
		'vat_is_valid' => 'int',
		'vat_request_success' => 'int'
	];

	protected $fillable = [
		'parent_id',
		'customer_address_id',
		'quote_address_id',
		'region_id',
		'customer_id',
		'fax',
		'region',
		'postcode',
		'lastname',
		'street',
		'city',
		'email',
		'telephone',
		'country_id',
		'firstname',
		'address_type',
		'prefix',
		'middlename',
		'suffix',
		'company',
		'vat_id',
		'vat_is_valid',
		'vat_request_id',
		'vat_request_date',
		'vat_request_success'
	];

	public function sales_order()
	{
		return $this->belongsTo(SalesOrder::class, 'parent_id');
	}
}
