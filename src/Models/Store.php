<?php

/**
 * Laragento 2020.
 */

namespace Laragento\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Store
 * 
 * @property int $store_id
 * @property string|null $code
 * @property int $website_id
 * @property int $group_id
 * @property string $name
 * @property int $sort_order
 * @property int $is_active
 * 
 * @property StoreGroup $store_group
 * @property StoreWebsite $store_website
 * @property Collection|CatalogCategoryEntityDatetime[] $catalog_category_entity_datetimes
 * @property Collection|CatalogCategoryEntityDecimal[] $catalog_category_entity_decimals
 * @property Collection|CatalogCategoryEntityInt[] $catalog_category_entity_ints
 * @property Collection|CatalogCategoryEntityText[] $catalog_category_entity_texts
 * @property Collection|CatalogCategoryEntityVarchar[] $catalog_category_entity_varchars
 * @property Collection|CatalogCompareItem[] $catalog_compare_items
 * @property Collection|CatalogProductEntityDatetime[] $catalog_product_entity_datetimes
 * @property Collection|CatalogProductEntityDecimal[] $catalog_product_entity_decimals
 * @property Collection|CatalogProductEntityGallery[] $catalog_product_entity_galleries
 * @property Collection|CatalogProductEntityInt[] $catalog_product_entity_ints
 * @property Collection|CatalogProductEntityMediaGalleryValue[] $catalog_product_entity_media_gallery_values
 * @property Collection|CatalogProductEntityMediaGalleryValueVideo[] $catalog_product_entity_media_gallery_value_videos
 * @property Collection|CatalogProductEntityText[] $catalog_product_entity_texts
 * @property Collection|CatalogProductEntityVarchar[] $catalog_product_entity_varchars
 * @property Collection|CatalogProductOptionPrice[] $catalog_product_option_prices
 * @property Collection|CatalogProductOptionTitle[] $catalog_product_option_titles
 * @property Collection|CatalogProductOptionTypePrice[] $catalog_product_option_type_prices
 * @property Collection|CatalogProductOptionTypeTitle[] $catalog_product_option_type_titles
 * @property Collection|CatalogProductSuperAttributeLabel[] $catalog_product_super_attribute_labels
 * @property Collection|CheckoutAgreement[] $checkout_agreements
 * @property Collection|CmsBlock[] $cms_blocks
 * @property Collection|CmsPage[] $cms_pages
 * @property Collection|CustomerEntity[] $customer_entities
 * @property Collection|DesignChange[] $design_changes
 * @property Collection|DownloadableLinkTitle[] $downloadable_link_titles
 * @property Collection|DownloadableSampleTitle[] $downloadable_sample_titles
 * @property Collection|EavAttributeLabel[] $eav_attribute_labels
 * @property Collection|EavAttributeOptionSwatch[] $eav_attribute_option_swatches
 * @property Collection|EavAttributeOptionValue[] $eav_attribute_option_values
 * @property Collection|EavEntity[] $eav_entities
 * @property Collection|EavEntityDatetime[] $eav_entity_datetimes
 * @property Collection|EavEntityDecimal[] $eav_entity_decimals
 * @property Collection|EavEntityInt[] $eav_entity_ints
 * @property Collection|EavEntityStore[] $eav_entity_stores
 * @property Collection|EavEntityText[] $eav_entity_texts
 * @property Collection|EavEntityVarchar[] $eav_entity_varchars
 * @property Collection|EavFormFieldsetLabel[] $eav_form_fieldset_labels
 * @property Collection|EavFormType[] $eav_form_types
 * @property Collection|GoogleoptimizerCode[] $googleoptimizer_codes
 * @property Collection|LayoutLink[] $layout_links
 * @property Collection|NewsletterQueue[] $newsletter_queues
 * @property Collection|NewsletterSubscriber[] $newsletter_subscribers
 * @property Collection|PaypalBillingAgreement[] $paypal_billing_agreements
 * @property Collection|ProductAlertPrice[] $product_alert_prices
 * @property Collection|ProductAlertStock[] $product_alert_stocks
 * @property Collection|Quote[] $quotes
 * @property Collection|QuoteItem[] $quote_items
 * @property Collection|RatingOptionVoteAggregated[] $rating_option_vote_aggregateds
 * @property Collection|Rating[] $ratings
 * @property Collection|RatingTitle[] $rating_titles
 * @property Collection|ReportComparedProductIndex[] $report_compared_product_indices
 * @property Collection|ReportEvent[] $report_events
 * @property Collection|ReportViewedProductAggregatedDaily[] $report_viewed_product_aggregated_dailies
 * @property Collection|ReportViewedProductAggregatedMonthly[] $report_viewed_product_aggregated_monthlies
 * @property Collection|ReportViewedProductAggregatedYearly[] $report_viewed_product_aggregated_yearlies
 * @property Collection|ReportViewedProductIndex[] $report_viewed_product_indices
 * @property Collection|ReviewDetail[] $review_details
 * @property Collection|ReviewEntitySummary[] $review_entity_summaries
 * @property Collection|Review[] $reviews
 * @property Collection|SalesBestsellersAggregatedDaily[] $sales_bestsellers_aggregated_dailies
 * @property Collection|SalesBestsellersAggregatedMonthly[] $sales_bestsellers_aggregated_monthlies
 * @property Collection|SalesBestsellersAggregatedYearly[] $sales_bestsellers_aggregated_yearlies
 * @property Collection|SalesCreditmemo[] $sales_creditmemos
 * @property Collection|SalesInvoice[] $sales_invoices
 * @property Collection|SalesInvoicedAggregated[] $sales_invoiced_aggregateds
 * @property Collection|SalesInvoicedAggregatedOrder[] $sales_invoiced_aggregated_orders
 * @property Collection|SalesOrder[] $sales_orders
 * @property Collection|SalesOrderAggregatedCreated[] $sales_order_aggregated_createds
 * @property Collection|SalesOrderAggregatedUpdated[] $sales_order_aggregated_updateds
 * @property Collection|SalesOrderItem[] $sales_order_items
 * @property Collection|SalesOrderStatusLabel[] $sales_order_status_labels
 * @property Collection|SalesRefundedAggregated[] $sales_refunded_aggregateds
 * @property Collection|SalesRefundedAggregatedOrder[] $sales_refunded_aggregated_orders
 * @property Collection|SalesShipment[] $sales_shipments
 * @property Collection|SalesShippingAggregated[] $sales_shipping_aggregateds
 * @property Collection|SalesShippingAggregatedOrder[] $sales_shipping_aggregated_orders
 * @property Collection|SalesruleCouponAggregated[] $salesrule_coupon_aggregateds
 * @property Collection|SalesruleCouponAggregatedOrder[] $salesrule_coupon_aggregated_orders
 * @property Collection|SalesruleCouponAggregatedUpdated[] $salesrule_coupon_aggregated_updateds
 * @property Collection|SalesruleLabel[] $salesrule_labels
 * @property Collection|SearchQuery[] $search_queries
 * @property Collection|SearchSynonym[] $search_synonyms
 * @property Collection|Sitemap[] $sitemaps
 * @property Collection|TaxCalculationRateTitle[] $tax_calculation_rate_titles
 * @property Collection|TaxOrderAggregatedCreated[] $tax_order_aggregated_createds
 * @property Collection|TaxOrderAggregatedUpdated[] $tax_order_aggregated_updateds
 * @property Collection|Translation[] $translations
 * @property Collection|VariableValue[] $variable_values
 * @property Collection|WishlistItem[] $wishlist_items
 *
 * @package Laragento\Models
 */
class Store extends Model
{
	protected $table = 'store';
	protected $primaryKey = 'store_id';
	public $timestamps = false;

	protected $casts = [
		'website_id' => 'int',
		'group_id' => 'int',
		'sort_order' => 'int',
		'is_active' => 'int'
	];

	protected $fillable = [
		'code',
		'website_id',
		'group_id',
		'name',
		'sort_order',
		'is_active'
	];

	public function store_group()
	{
		return $this->belongsTo(StoreGroup::class, 'group_id');
	}

	public function store_website()
	{
		return $this->belongsTo(StoreWebsite::class, 'website_id');
	}

	public function catalog_category_entity_datetimes()
	{
		return $this->hasMany(CatalogCategoryEntityDatetime::class);
	}

	public function catalog_category_entity_decimals()
	{
		return $this->hasMany(CatalogCategoryEntityDecimal::class);
	}

	public function catalog_category_entity_ints()
	{
		return $this->hasMany(CatalogCategoryEntityInt::class);
	}

	public function catalog_category_entity_texts()
	{
		return $this->hasMany(CatalogCategoryEntityText::class);
	}

	public function catalog_category_entity_varchars()
	{
		return $this->hasMany(CatalogCategoryEntityVarchar::class);
	}

	public function catalog_compare_items()
	{
		return $this->hasMany(CatalogCompareItem::class);
	}

	public function catalog_product_entity_datetimes()
	{
		return $this->hasMany(CatalogProductEntityDatetime::class);
	}

	public function catalog_product_entity_decimals()
	{
		return $this->hasMany(CatalogProductEntityDecimal::class);
	}

	public function catalog_product_entity_galleries()
	{
		return $this->hasMany(CatalogProductEntityGallery::class);
	}

	public function catalog_product_entity_ints()
	{
		return $this->hasMany(CatalogProductEntityInt::class);
	}

	public function catalog_product_entity_media_gallery_values()
	{
		return $this->hasMany(CatalogProductEntityMediaGalleryValue::class);
	}

	public function catalog_product_entity_media_gallery_value_videos()
	{
		return $this->hasMany(CatalogProductEntityMediaGalleryValueVideo::class);
	}

	public function catalog_product_entity_texts()
	{
		return $this->hasMany(CatalogProductEntityText::class);
	}

	public function catalog_product_entity_varchars()
	{
		return $this->hasMany(CatalogProductEntityVarchar::class);
	}

	public function catalog_product_option_prices()
	{
		return $this->hasMany(CatalogProductOptionPrice::class);
	}

	public function catalog_product_option_titles()
	{
		return $this->hasMany(CatalogProductOptionTitle::class);
	}

	public function catalog_product_option_type_prices()
	{
		return $this->hasMany(CatalogProductOptionTypePrice::class);
	}

	public function catalog_product_option_type_titles()
	{
		return $this->hasMany(CatalogProductOptionTypeTitle::class);
	}

	public function catalog_product_super_attribute_labels()
	{
		return $this->hasMany(CatalogProductSuperAttributeLabel::class);
	}

	public function checkout_agreements()
	{
		return $this->belongsToMany(CheckoutAgreement::class, 'checkout_agreement_store', 'store_id', 'agreement_id');
	}

	public function cms_blocks()
	{
		return $this->belongsToMany(CmsBlock::class, 'cms_block_store', 'store_id', 'block_id');
	}

	public function cms_pages()
	{
		return $this->belongsToMany(CmsPage::class, 'cms_page_store', 'store_id', 'page_id');
	}

	public function customer_entities()
	{
		return $this->hasMany(CustomerEntity::class);
	}

	public function design_changes()
	{
		return $this->hasMany(DesignChange::class);
	}

	public function downloadable_link_titles()
	{
		return $this->hasMany(DownloadableLinkTitle::class);
	}

	public function downloadable_sample_titles()
	{
		return $this->hasMany(DownloadableSampleTitle::class);
	}

	public function eav_attribute_labels()
	{
		return $this->hasMany(EavAttributeLabel::class);
	}

	public function eav_attribute_option_swatches()
	{
		return $this->hasMany(EavAttributeOptionSwatch::class);
	}

	public function eav_attribute_option_values()
	{
		return $this->hasMany(EavAttributeOptionValue::class);
	}

	public function eav_entities()
	{
		return $this->hasMany(EavEntity::class);
	}

	public function eav_entity_datetimes()
	{
		return $this->hasMany(EavEntityDatetime::class);
	}

	public function eav_entity_decimals()
	{
		return $this->hasMany(EavEntityDecimal::class);
	}

	public function eav_entity_ints()
	{
		return $this->hasMany(EavEntityInt::class);
	}

	public function eav_entity_stores()
	{
		return $this->hasMany(EavEntityStore::class);
	}

	public function eav_entity_texts()
	{
		return $this->hasMany(EavEntityText::class);
	}

	public function eav_entity_varchars()
	{
		return $this->hasMany(EavEntityVarchar::class);
	}

	public function eav_form_fieldset_labels()
	{
		return $this->hasMany(EavFormFieldsetLabel::class);
	}

	public function eav_form_types()
	{
		return $this->hasMany(EavFormType::class);
	}

	public function googleoptimizer_codes()
	{
		return $this->hasMany(GoogleoptimizerCode::class);
	}

	public function layout_links()
	{
		return $this->hasMany(LayoutLink::class);
	}

	public function newsletter_queues()
	{
		return $this->belongsToMany(NewsletterQueue::class, 'newsletter_queue_store_link', 'store_id', 'queue_id');
	}

	public function newsletter_subscribers()
	{
		return $this->hasMany(NewsletterSubscriber::class);
	}

	public function paypal_billing_agreements()
	{
		return $this->hasMany(PaypalBillingAgreement::class);
	}

	public function product_alert_prices()
	{
		return $this->hasMany(ProductAlertPrice::class);
	}

	public function product_alert_stocks()
	{
		return $this->hasMany(ProductAlertStock::class);
	}

	public function quotes()
	{
		return $this->hasMany(Quote::class);
	}

	public function quote_items()
	{
		return $this->hasMany(QuoteItem::class);
	}

	public function rating_option_vote_aggregateds()
	{
		return $this->hasMany(RatingOptionVoteAggregated::class);
	}

	public function ratings()
	{
		return $this->belongsToMany(Rating::class);
	}

	public function rating_titles()
	{
		return $this->hasMany(RatingTitle::class);
	}

	public function report_compared_product_indices()
	{
		return $this->hasMany(ReportComparedProductIndex::class);
	}

	public function report_events()
	{
		return $this->hasMany(ReportEvent::class);
	}

	public function report_viewed_product_aggregated_dailies()
	{
		return $this->hasMany(ReportViewedProductAggregatedDaily::class);
	}

	public function report_viewed_product_aggregated_monthlies()
	{
		return $this->hasMany(ReportViewedProductAggregatedMonthly::class);
	}

	public function report_viewed_product_aggregated_yearlies()
	{
		return $this->hasMany(ReportViewedProductAggregatedYearly::class);
	}

	public function report_viewed_product_indices()
	{
		return $this->hasMany(ReportViewedProductIndex::class);
	}

	public function review_details()
	{
		return $this->hasMany(ReviewDetail::class);
	}

	public function review_entity_summaries()
	{
		return $this->hasMany(ReviewEntitySummary::class);
	}

	public function reviews()
	{
		return $this->belongsToMany(Review::class);
	}

	public function sales_bestsellers_aggregated_dailies()
	{
		return $this->hasMany(SalesBestsellersAggregatedDaily::class);
	}

	public function sales_bestsellers_aggregated_monthlies()
	{
		return $this->hasMany(SalesBestsellersAggregatedMonthly::class);
	}

	public function sales_bestsellers_aggregated_yearlies()
	{
		return $this->hasMany(SalesBestsellersAggregatedYearly::class);
	}

	public function sales_creditmemos()
	{
		return $this->hasMany(SalesCreditmemo::class);
	}

	public function sales_invoices()
	{
		return $this->hasMany(SalesInvoice::class);
	}

	public function sales_invoiced_aggregateds()
	{
		return $this->hasMany(SalesInvoicedAggregated::class);
	}

	public function sales_invoiced_aggregated_orders()
	{
		return $this->hasMany(SalesInvoicedAggregatedOrder::class);
	}

	public function sales_orders()
	{
		return $this->hasMany(SalesOrder::class);
	}

	public function sales_order_aggregated_createds()
	{
		return $this->hasMany(SalesOrderAggregatedCreated::class);
	}

	public function sales_order_aggregated_updateds()
	{
		return $this->hasMany(SalesOrderAggregatedUpdated::class);
	}

	public function sales_order_items()
	{
		return $this->hasMany(SalesOrderItem::class);
	}

	public function sales_order_status_labels()
	{
		return $this->hasMany(SalesOrderStatusLabel::class);
	}

	public function sales_refunded_aggregateds()
	{
		return $this->hasMany(SalesRefundedAggregated::class);
	}

	public function sales_refunded_aggregated_orders()
	{
		return $this->hasMany(SalesRefundedAggregatedOrder::class);
	}

	public function sales_shipments()
	{
		return $this->hasMany(SalesShipment::class);
	}

	public function sales_shipping_aggregateds()
	{
		return $this->hasMany(SalesShippingAggregated::class);
	}

	public function sales_shipping_aggregated_orders()
	{
		return $this->hasMany(SalesShippingAggregatedOrder::class);
	}

	public function salesrule_coupon_aggregateds()
	{
		return $this->hasMany(SalesruleCouponAggregated::class);
	}

	public function salesrule_coupon_aggregated_orders()
	{
		return $this->hasMany(SalesruleCouponAggregatedOrder::class);
	}

	public function salesrule_coupon_aggregated_updateds()
	{
		return $this->hasMany(SalesruleCouponAggregatedUpdated::class);
	}

	public function salesrule_labels()
	{
		return $this->hasMany(SalesruleLabel::class);
	}

	public function search_queries()
	{
		return $this->hasMany(SearchQuery::class);
	}

	public function search_synonyms()
	{
		return $this->hasMany(SearchSynonym::class);
	}

	public function sitemaps()
	{
		return $this->hasMany(Sitemap::class);
	}

	public function tax_calculation_rate_titles()
	{
		return $this->hasMany(TaxCalculationRateTitle::class);
	}

	public function tax_order_aggregated_createds()
	{
		return $this->hasMany(TaxOrderAggregatedCreated::class);
	}

	public function tax_order_aggregated_updateds()
	{
		return $this->hasMany(TaxOrderAggregatedUpdated::class);
	}

	public function translations()
	{
		return $this->hasMany(Translation::class);
	}

	public function variable_values()
	{
		return $this->hasMany(VariableValue::class);
	}

	public function wishlist_items()
	{
		return $this->hasMany(WishlistItem::class);
	}
}
