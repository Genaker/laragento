<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerAddressEntity
 * 
 * @property int $entity_id
 * @property string|null $increment_id
 * @property int|null $parent_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $is_active
 * @property string $city
 * @property string|null $company
 * @property string $country_id
 * @property string|null $fax
 * @property string $firstname
 * @property string $lastname
 * @property string|null $middlename
 * @property string|null $postcode
 * @property string|null $prefix
 * @property string|null $region
 * @property int|null $region_id
 * @property string $street
 * @property string|null $suffix
 * @property string $telephone
 * @property string|null $vat_id
 * @property int|null $vat_is_valid
 * @property string|null $vat_request_date
 * @property string|null $vat_request_id
 * @property int|null $vat_request_success
 * 
 * @property CustomerEntity|null $customer_entity
 * @property Collection|CustomerAddressEntityDatetime[] $customer_address_entity_datetimes
 * @property Collection|CustomerAddressEntityDecimal[] $customer_address_entity_decimals
 * @property Collection|CustomerAddressEntityInt[] $customer_address_entity_ints
 * @property Collection|CustomerAddressEntityText[] $customer_address_entity_texts
 * @property Collection|CustomerAddressEntityVarchar[] $customer_address_entity_varchars
 *
 * @package Laragento\Models
 */
class CustomerAddressEntity extends Model
{
	protected $table = 'customer_address_entity';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'parent_id' => 'int',
		'is_active' => 'int',
		'region_id' => 'int',
		'vat_is_valid' => 'int',
		'vat_request_success' => 'int'
	];

	protected $fillable = [
		'increment_id',
		'parent_id',
		'is_active',
		'city',
		'company',
		'country_id',
		'fax',
		'firstname',
		'lastname',
		'middlename',
		'postcode',
		'prefix',
		'region',
		'region_id',
		'street',
		'suffix',
		'telephone',
		'vat_id',
		'vat_is_valid',
		'vat_request_date',
		'vat_request_id',
		'vat_request_success'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'parent_id');
	}

	public function customer_address_entity_datetimes()
	{
		return $this->hasMany(CustomerAddressEntityDatetime::class, 'entity_id');
	}

	public function customer_address_entity_decimals()
	{
		return $this->hasMany(CustomerAddressEntityDecimal::class, 'entity_id');
	}

	public function customer_address_entity_ints()
	{
		return $this->hasMany(CustomerAddressEntityInt::class, 'entity_id');
	}

	public function customer_address_entity_texts()
	{
		return $this->hasMany(CustomerAddressEntityText::class, 'entity_id');
	}

	public function customer_address_entity_varchars()
	{
		return $this->hasMany(CustomerAddressEntityVarchar::class, 'entity_id');
	}
}
