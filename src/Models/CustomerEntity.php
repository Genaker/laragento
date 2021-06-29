<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CustomerEntity
 * 
 * @property int $entity_id
 * @property int|null $website_id
 * @property string|null $email
 * @property int $group_id
 * @property string|null $increment_id
 * @property int|null $store_id
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property int $is_active
 * @property int $disable_auto_group_change
 * @property string|null $created_in
 * @property string|null $prefix
 * @property string|null $firstname
 * @property string|null $middlename
 * @property string|null $lastname
 * @property string|null $suffix
 * @property Carbon|null $dob
 * @property string|null $password_hash
 * @property string|null $rp_token
 * @property Carbon|null $rp_token_created_at
 * @property int|null $default_billing
 * @property int|null $default_shipping
 * @property string|null $taxvat
 * @property string|null $confirmation
 * @property int|null $gender
 * @property int|null $failures_num
 * @property Carbon|null $first_failure
 * @property Carbon|null $lock_expires
 * 
 * @property Store|null $store
 * @property StoreWebsite|null $store_website
 * @property Collection|CatalogCompareItem[] $catalog_compare_items
 * @property CatalogCompareList $catalog_compare_list
 * @property Collection|CatalogProductFrontendAction[] $catalog_product_frontend_actions
 * @property Collection|CustomerAddressEntity[] $customer_address_entities
 * @property Collection|CustomerEntityDatetime[] $customer_entity_datetimes
 * @property Collection|CustomerEntityDecimal[] $customer_entity_decimals
 * @property Collection|CustomerEntityInt[] $customer_entity_ints
 * @property Collection|CustomerEntityText[] $customer_entity_texts
 * @property Collection|CustomerEntityVarchar[] $customer_entity_varchars
 * @property Collection|DownloadableLinkPurchased[] $downloadable_link_purchaseds
 * @property LoginAsCustomerAssistanceAllowed $login_as_customer_assistance_allowed
 * @property Collection|OauthToken[] $oauth_tokens
 * @property Collection|PaypalBillingAgreement[] $paypal_billing_agreements
 * @property PersistentSession $persistent_session
 * @property Collection|ProductAlertPrice[] $product_alert_prices
 * @property Collection|ProductAlertStock[] $product_alert_stocks
 * @property Collection|ReportComparedProductIndex[] $report_compared_product_indices
 * @property Collection|ReportViewedProductIndex[] $report_viewed_product_indices
 * @property Collection|ReviewDetail[] $review_details
 * @property Collection|SalesOrder[] $sales_orders
 * @property Collection|SalesruleCouponUsage[] $salesrule_coupon_usages
 * @property Collection|SalesruleCustomer[] $salesrule_customers
 * @property Collection|VaultPaymentToken[] $vault_payment_tokens
 * @property Wishlist $wishlist
 *
 * @package Laragento\Models
 */
class CustomerEntity extends Model
{
	protected $table = 'customer_entity';
	protected $primaryKey = 'entity_id';

	protected $casts = [
		'website_id' => 'int',
		'group_id' => 'int',
		'store_id' => 'int',
		'is_active' => 'int',
		'disable_auto_group_change' => 'int',
		'default_billing' => 'int',
		'default_shipping' => 'int',
		'gender' => 'int',
		'failures_num' => 'int'
	];

	protected $dates = [
		'dob',
		'rp_token_created_at',
		'first_failure',
		'lock_expires'
	];

	protected $hidden = [
		'rp_token'
	];

	protected $fillable = [
		'website_id',
		'email',
		'group_id',
		'increment_id',
		'store_id',
		'is_active',
		'disable_auto_group_change',
		'created_in',
		'prefix',
		'firstname',
		'middlename',
		'lastname',
		'suffix',
		'dob',
		'password_hash',
		'rp_token',
		'rp_token_created_at',
		'default_billing',
		'default_shipping',
		'taxvat',
		'confirmation',
		'gender',
		'failures_num',
		'first_failure',
		'lock_expires'
	];

	public function store()
	{
		return $this->belongsTo(Store::class);
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}

	public function catalog_compare_items()
	{
		return $this->hasMany(CatalogCompareItem::class, 'customer_id');
	}

	public function catalog_compare_list()
	{
		return $this->hasOne(CatalogCompareList::class, 'customer_id');
	}

	public function catalog_product_frontend_actions()
	{
		return $this->hasMany(CatalogProductFrontendAction::class, 'customer_id');
	}

	public function customer_address_entities()
	{
		return $this->hasMany(CustomerAddressEntity::class, 'parent_id');
	}

	public function customer_entity_datetimes()
	{
		return $this->hasMany(CustomerEntityDatetime::class, 'entity_id');
	}

	public function customer_entity_decimals()
	{
		return $this->hasMany(CustomerEntityDecimal::class, 'entity_id');
	}

	public function customer_entity_ints()
	{
		return $this->hasMany(CustomerEntityInt::class, 'entity_id');
	}

	public function customer_entity_texts()
	{
		return $this->hasMany(CustomerEntityText::class, 'entity_id');
	}

	public function customer_entity_varchars()
	{
		return $this->hasMany(CustomerEntityVarchar::class, 'entity_id');
	}

	public function downloadable_link_purchaseds()
	{
		return $this->hasMany(DownloadableLinkPurchased::class, 'customer_id');
	}

	public function login_as_customer_assistance_allowed()
	{
		return $this->hasOne(LoginAsCustomerAssistanceAllowed::class, 'customer_id');
	}

	public function oauth_tokens()
	{
		return $this->hasMany(OauthToken::class, 'customer_id');
	}

	public function paypal_billing_agreements()
	{
		return $this->hasMany(PaypalBillingAgreement::class, 'customer_id');
	}

	public function persistent_session()
	{
		return $this->hasOne(PersistentSession::class, 'customer_id');
	}

	public function product_alert_prices()
	{
		return $this->hasMany(ProductAlertPrice::class, 'customer_id');
	}

	public function product_alert_stocks()
	{
		return $this->hasMany(ProductAlertStock::class, 'customer_id');
	}

	public function report_compared_product_indices()
	{
		return $this->hasMany(ReportComparedProductIndex::class, 'customer_id');
	}

	public function report_viewed_product_indices()
	{
		return $this->hasMany(ReportViewedProductIndex::class, 'customer_id');
	}

	public function review_details()
	{
		return $this->hasMany(ReviewDetail::class, 'customer_id');
	}

	public function sales_orders()
	{
		return $this->hasMany(SalesOrder::class, 'customer_id');
	}

	public function salesrule_coupon_usages()
	{
		return $this->hasMany(SalesruleCouponUsage::class, 'customer_id');
	}

	public function salesrule_customers()
	{
		return $this->hasMany(SalesruleCustomer::class, 'customer_id');
	}

	public function vault_payment_tokens()
	{
		return $this->hasMany(VaultPaymentToken::class, 'customer_id');
	}

	public function wishlist()
	{
		return $this->hasOne(Wishlist::class, 'customer_id');
	}
}
