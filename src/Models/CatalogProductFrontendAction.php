<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CatalogProductFrontendAction
 * 
 * @property int $action_id
 * @property string $type_id
 * @property int|null $visitor_id
 * @property int|null $customer_id
 * @property int $product_id
 * @property int $added_at
 * 
 * @property CustomerEntity|null $customer_entity
 * @property CatalogProductEntity $catalog_product_entity
 *
 * @package Laragento\Models
 */
class CatalogProductFrontendAction extends Model
{
	protected $table = 'catalog_product_frontend_action';
	protected $primaryKey = 'action_id';
	public $timestamps = false;

	protected $casts = [
		'visitor_id' => 'int',
		'customer_id' => 'int',
		'product_id' => 'int',
		'added_at' => 'int'
	];

	protected $fillable = [
		'type_id',
		'visitor_id',
		'customer_id',
		'product_id',
		'added_at'
	];

	public function customer_entity()
	{
		return $this->belongsTo(CustomerEntity::class, 'customer_id');
	}

	public function catalog_product_entity()
	{
		return $this->belongsTo(CatalogProductEntity::class, 'product_id');
	}
}
