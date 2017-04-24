<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog", 
	"main", 
	array(
		"IBLOCK_TYPE" => "1c_catalog",
		"IBLOCK_ID" => IBLOCK_ID_CATALOG,
		"TEMPLATE_THEME" => "site",
		"HIDE_NOT_AVAILABLE" => "N",
		"BASKET_URL" => "/personal/cart/",
		"ACTION_VARIABLE" => "action",
		"PRODUCT_ID_VARIABLE" => "id",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"SEF_MODE" => "Y",
		"SEF_FOLDER" => "/catalog/",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"SET_TITLE" => "Y",
		"ADD_SECTION_CHAIN" => "Y",
		"ADD_ELEMENT_CHAIN" => "Y",
		"SET_STATUS_404" => "Y",
		"DETAIL_DISPLAY_NAME" => "N",
		"USE_ELEMENT_COUNTER" => "Y",
		"USE_FILTER" => "Y",
		"FILTER_NAME" => "",
		"FILTER_VIEW_MODE" => "VERTICAL",
		"FILTER_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"FILTER_PROPERTY_CODE" => array(
			0 => "ET",
			1 => "SLOYNOST",
			2 => "SEZON",
			3 => "SHIP",
			4 => "TIP_AVTO",
			5 => "BLOG_POST_ID",
			6 => "CML2_ARTICLE",
			7 => "CML2_BASE_UNIT",
			8 => "KOD_PROIZVODITELYA",
			9 => "BLOG_COMMENTS_CNT",
			10 => "CML2_MANUFACTURER",
			11 => "CML2_TRAITS",
			12 => "CML2_TAXES",
			13 => "CML2_ATTRIBUTES",
			14 => "SHIRINA",
			15 => "CML2_BAR_CODE",
			16 => "VYSOTA",
			17 => "TIP_DISKA",
			18 => "DIAMETR",
			19 => "INDEKS_NAGRUZKI",
			20 => "INDEKS_SKOROSTI",
			21 => "RUNFLAT",
			22 => "SHIRINA_OBODA",
			23 => "DIAMETR_1",
			24 => "PCD",
			25 => "KREPEZH",
			26 => "ET_1",
			27 => "DIA",
			28 => "TSVET",
			29 => "KOD_PROIZVODITELYA_1",
			30 => "VNUTRENNIY_NOMER",
			31 => "",
		),
		"FILTER_PRICE_CODE" => array(
			0 => "BASE",
		),
		"FILTER_OFFERS_FIELD_CODE" => array(
			0 => "ID",
			1 => "CODE",
			2 => "XML_ID",
			3 => "NAME",
			4 => "TAGS",
			5 => "SORT",
			6 => "PREVIEW_TEXT",
			7 => "PREVIEW_PICTURE",
			8 => "DETAIL_TEXT",
			9 => "DETAIL_PICTURE",
			10 => "DATE_ACTIVE_FROM",
			11 => "ACTIVE_FROM",
			12 => "DATE_ACTIVE_TO",
			13 => "ACTIVE_TO",
			14 => "SHOW_COUNTER",
			15 => "SHOW_COUNTER_START",
			16 => "IBLOCK_TYPE_ID",
			17 => "IBLOCK_ID",
			18 => "IBLOCK_CODE",
			19 => "IBLOCK_NAME",
			20 => "IBLOCK_EXTERNAL_ID",
			21 => "DATE_CREATE",
			22 => "CREATED_BY",
			23 => "CREATED_USER_NAME",
			24 => "TIMESTAMP_X",
			25 => "MODIFIED_BY",
			26 => "USER_NAME",
			27 => "",
		),
		"FILTER_OFFERS_PROPERTY_CODE" => array(
			0 => "ET",
			1 => "SEZON",
			2 => "SHIP",
			3 => "TIP_AVTO",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "CML2_MANUFACTURER",
			7 => "CML2_TRAITS",
			8 => "CML2_TAXES",
			9 => "CML2_ATTRIBUTES",
			10 => "SHIRINA",
			11 => "CML2_BAR_CODE",
			12 => "VYSOTA",
			13 => "DIAMETR",
			14 => "INDEKS_NAGRUZKI",
			15 => "INDEKS_SKOROSTI",
			16 => "RUNFLAT",
			17 => "KOD_PROIZVODITELYA",
			18 => "TIP_DISKA",
			19 => "SHIRINA_OBODA",
			20 => "DIAMETR_1",
			21 => "PCD",
			22 => "KREPEZH",
			23 => "ET_1",
			24 => "DIA",
			25 => "TSVET",
			26 => "KOD_PROIZVODITELYA_1",
			27 => "VNUTRENNIY_NOMER",
			28 => "",
		),
		"USE_REVIEW" => "Y",
		"MESSAGES_PER_PAGE" => "10",
		"USE_CAPTCHA" => "Y",
		"REVIEW_AJAX_POST" => "Y",
		"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
		"FORUM_ID" => "1",
		"URL_TEMPLATES_READ" => "",
		"SHOW_LINK_TO_FORUM" => "Y",
		"USE_COMPARE" => "N",
		"PRICE_CODE" => array(
			0 => "BASE",
		),
		"USE_PRICE_COUNT" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"PRICE_VAT_INCLUDE" => "Y",
		"PRICE_VAT_SHOW_VALUE" => "N",
		"PRODUCT_PROPERTIES" => array(
			0 => "ET",
			1 => "SLOYNOST",
			2 => "SEZON",
			3 => "SHIP",
			4 => "TIP_AVTO",
			5 => "KOD_PROIZVODITELYA",
			6 => "CML2_MANUFACTURER",
			7 => "CML2_TRAITS",
			8 => "CML2_TAXES",
			9 => "CML2_ATTRIBUTES",
			10 => "SHIRINA",
			11 => "VYSOTA",
			12 => "TIP_DISKA",
			13 => "DIAMETR",
			14 => "INDEKS_NAGRUZKI",
			15 => "INDEKS_SKOROSTI",
			16 => "RUNFLAT",
			17 => "SHIRINA_OBODA",
			18 => "DIAMETR_1",
			19 => "PCD",
			20 => "KREPEZH",
			21 => "ET_1",
			22 => "DIA",
			23 => "TSVET",
			24 => "KOD_PROIZVODITELYA_1",
		),
		"USE_PRODUCT_QUANTITY" => "Y",
		"CONVERT_CURRENCY" => "N",
		"QUANTITY_FLOAT" => "N",
		"OFFERS_CART_PROPERTIES" => array(
			0 => "ET",
			1 => "SEZON",
			2 => "SHIP",
			3 => "TIP_AVTO",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "CML2_MANUFACTURER",
			7 => "CML2_TRAITS",
			8 => "CML2_TAXES",
			9 => "CML2_ATTRIBUTES",
			10 => "SHIRINA",
			11 => "CML2_BAR_CODE",
			12 => "VYSOTA",
			13 => "DIAMETR",
			14 => "INDEKS_NAGRUZKI",
			15 => "INDEKS_SKOROSTI",
			16 => "RUNFLAT",
			17 => "KOD_PROIZVODITELYA",
			18 => "TIP_DISKA",
			19 => "SHIRINA_OBODA",
			20 => "DIAMETR_1",
			21 => "PCD",
			22 => "KREPEZH",
			23 => "ET_1",
			24 => "DIA",
			25 => "TSVET",
			26 => "KOD_PROIZVODITELYA_1",
			27 => "VNUTRENNIY_NOMER",
		),
		"SHOW_TOP_ELEMENTS" => "N",
		"SECTION_COUNT_ELEMENTS" => "N",
		"SECTION_TOP_DEPTH" => "3",
		"SECTIONS_VIEW_MODE" => "LIST",
		"SECTIONS_SHOW_PARENT_NAME" => "N",
		"PAGE_ELEMENT_COUNT" => "15",
		"LINE_ELEMENT_COUNT" => "3",
		"ELEMENT_SORT_FIELD" => "desc",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_FIELD2" => "shows",
		"ELEMENT_SORT_ORDER2" => "asc",
		"LIST_PROPERTY_CODE" => array(
			0 => "ET",
			1 => "SLOYNOST",
			2 => "SEZON",
			3 => "SHIP",
			4 => "TIP_AVTO",
			5 => "BLOG_POST_ID",
			6 => "CML2_ARTICLE",
			7 => "CML2_BASE_UNIT",
			8 => "KOD_PROIZVODITELYA",
			9 => "BLOG_COMMENTS_CNT",
			10 => "CML2_MANUFACTURER",
			11 => "CML2_TRAITS",
			12 => "CML2_TAXES",
			13 => "CML2_ATTRIBUTES",
			14 => "SHIRINA",
			15 => "CML2_BAR_CODE",
			16 => "VYSOTA",
			17 => "TIP_DISKA",
			18 => "DIAMETR",
			19 => "INDEKS_NAGRUZKI",
			20 => "INDEKS_SKOROSTI",
			21 => "RUNFLAT",
			22 => "SHIRINA_OBODA",
			23 => "DIAMETR_1",
			24 => "PCD",
			25 => "KREPEZH",
			26 => "ET_1",
			27 => "DIA",
			28 => "TSVET",
			29 => "KOD_PROIZVODITELYA_1",
			30 => "VNUTRENNIY_NOMER",
			31 => "NEWPRODUCT",
			32 => "SALELEADER",
			33 => "SPECIALOFFER",
			34 => "",
		),
		"INCLUDE_SUBSECTIONS" => "Y",
		"LIST_META_KEYWORDS" => "-",
		"LIST_META_DESCRIPTION" => "-",
		"LIST_BROWSER_TITLE" => "-",
		"LIST_OFFERS_FIELD_CODE" => array(
			0 => "TAGS",
			1 => "",
		),
		"LIST_OFFERS_PROPERTY_CODE" => array(
			0 => "ET",
			1 => "SEZON",
			2 => "SHIP",
			3 => "TIP_AVTO",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "MORE_PHOTO",
			7 => "CML2_MANUFACTURER",
			8 => "CML2_TRAITS",
			9 => "CML2_TAXES",
			10 => "FILES",
			11 => "CML2_ATTRIBUTES",
			12 => "SHIRINA",
			13 => "CML2_BAR_CODE",
			14 => "VYSOTA",
			15 => "DIAMETR",
			16 => "INDEKS_NAGRUZKI",
			17 => "INDEKS_SKOROSTI",
			18 => "RUNFLAT",
			19 => "KOD_PROIZVODITELYA",
			20 => "TIP_DISKA",
			21 => "SHIRINA_OBODA",
			22 => "DIAMETR_1",
			23 => "PCD",
			24 => "KREPEZH",
			25 => "ET_1",
			26 => "DIA",
			27 => "TSVET",
			28 => "KOD_PROIZVODITELYA_1",
			29 => "VNUTRENNIY_NOMER",
			30 => "ARTNUMBER",
			31 => "COLOR_REF",
			32 => "SIZES_SHOES",
			33 => "SIZES_CLOTHES",
			34 => "",
		),
		"LIST_OFFERS_LIMIT" => "0",
		"SECTION_BACKGROUND_IMAGE" => "-",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "TIP_AVTO",
			1 => "NEWPRODUCT",
			2 => "MANUFACTURER",
			3 => "MATERIAL",
			4 => "",
		),
		"DETAIL_META_KEYWORDS" => "-",
		"DETAIL_META_DESCRIPTION" => "-",
		"DETAIL_BROWSER_TITLE" => "-",
		"DETAIL_OFFERS_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_OFFERS_PROPERTY_CODE" => array(
			0 => "ET",
			1 => "SEZON",
			2 => "SHIP",
			3 => "TIP_AVTO",
			4 => "CML2_ARTICLE",
			5 => "CML2_BASE_UNIT",
			6 => "MORE_PHOTO",
			7 => "CML2_MANUFACTURER",
			8 => "CML2_TRAITS",
			9 => "CML2_TAXES",
			10 => "FILES",
			11 => "CML2_ATTRIBUTES",
			12 => "SHIRINA",
			13 => "CML2_BAR_CODE",
			14 => "VYSOTA",
			15 => "DIAMETR",
			16 => "INDEKS_NAGRUZKI",
			17 => "INDEKS_SKOROSTI",
			18 => "RUNFLAT",
			19 => "KOD_PROIZVODITELYA",
			20 => "TIP_DISKA",
			21 => "SHIRINA_OBODA",
			22 => "DIAMETR_1",
			23 => "PCD",
			24 => "KREPEZH",
			25 => "ET_1",
			26 => "DIA",
			27 => "TSVET",
			28 => "KOD_PROIZVODITELYA_1",
			29 => "VNUTRENNIY_NOMER",
			30 => "ARTNUMBER",
			31 => "COLOR_REF",
			32 => "SIZES_SHOES",
			33 => "SIZES_CLOTHES",
			34 => "",
		),
		"DETAIL_BACKGROUND_IMAGE" => "-",
		"LINK_IBLOCK_TYPE" => "",
		"LINK_IBLOCK_ID" => "",
		"LINK_PROPERTY_SID" => "",
		"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
		"USE_ALSO_BUY" => "Y",
		"ALSO_BUY_ELEMENT_COUNT" => "4",
		"ALSO_BUY_MIN_BUYES" => "1",
		"OFFERS_SORT_FIELD" => "shows",
		"OFFERS_SORT_ORDER" => "asc",
		"OFFERS_SORT_FIELD2" => "shows",
		"OFFERS_SORT_ORDER2" => "asc",
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Товары",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000000",
		"PAGER_SHOW_ALL" => "N",
		"ADD_PICT_PROP" => "-",
		"LABEL_PROP" => "-",
		"PRODUCT_DISPLAY_MODE" => "N",
		"OFFER_ADD_PICT_PROP" => "-",
		"OFFER_TREE_PROPS" => array(
			0 => "ET",
			1 => "SEZON",
			2 => "SHIP",
			3 => "TIP_AVTO",
			4 => "CML2_MANUFACTURER",
			5 => "SHIRINA",
			6 => "VYSOTA",
			7 => "DIAMETR",
			8 => "INDEKS_NAGRUZKI",
			9 => "INDEKS_SKOROSTI",
			10 => "RUNFLAT",
			11 => "KOD_PROIZVODITELYA",
			12 => "TIP_DISKA",
			13 => "SHIRINA_OBODA",
			14 => "DIAMETR_1",
			15 => "PCD",
			16 => "KREPEZH",
			17 => "ET_1",
			18 => "DIA",
			19 => "TSVET",
			20 => "KOD_PROIZVODITELYA_1",
		),
		"SHOW_DISCOUNT_PERCENT" => "Y",
		"SHOW_OLD_PRICE" => "Y",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_COMPARE" => "Сравнение",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"DETAIL_USE_VOTE_RATING" => "Y",
		"DETAIL_VOTE_DISPLAY_AS_RATING" => "rating",
		"DETAIL_USE_COMMENTS" => "Y",
		"DETAIL_BLOG_USE" => "Y",
		"DETAIL_VK_USE" => "N",
		"DETAIL_FB_USE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"USE_STORE" => "Y",
		"FIELDS" => array(
			0 => "",
			1 => "STORE",
			2 => "",
		),
		"USE_MIN_AMOUNT" => "N",
		"STORE_PATH" => "/store/#store_id#",
		"MAIN_TITLE" => "Наличие на складах",
		"MIN_AMOUNT" => "10",
		"DETAIL_BRAND_USE" => "Y",
		"DETAIL_BRAND_PROP_CODE" => array(
			0 => "",
			1 => "BRAND_REF",
			2 => "",
		),
		"SIDEBAR_SECTION_SHOW" => "Y",
		"SIDEBAR_DETAIL_SHOW" => "Y",
		"SIDEBAR_PATH" => "/catalog/sidebar.php",
		"COMPONENT_TEMPLATE" => ".default_old",
		"COMMON_SHOW_CLOSE_POPUP" => "N",
		"DETAIL_SHOW_MAX_QUANTITY" => "N",
		"DETAIL_BLOG_URL" => "catalog_comments",
		"DETAIL_BLOG_EMAIL_NOTIFY" => "N",
		"DETAIL_FB_APP_ID" => "",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"SET_LAST_MODIFIED" => "N",
		"ADD_SECTIONS_CHAIN" => "Y",
		"USE_SALE_BESTSELLERS" => "Y",
		"INSTANT_RELOAD" => "N",
		"ADD_PROPERTIES_TO_BASKET" => "Y",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"USE_COMMON_SETTINGS_BASKET_POPUP" => "N",
		"COMMON_ADD_TO_BASKET_ACTION" => "",
		"TOP_ADD_TO_BASKET_ACTION" => "BUY",
		"SECTION_ADD_TO_BASKET_ACTION" => "BUY",
		"DETAIL_ADD_TO_BASKET_ACTION" => array(
		),
		"DETAIL_SHOW_BASIS_PRICE" => "Y",
		"SECTIONS_HIDE_SECTION_NAME" => "N",
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DETAIL_CHECK_SECTION_ID_VARIABLE" => "N",
		"SHOW_DEACTIVATED" => "N",
		"DETAIL_DETAIL_PICTURE_MODE" => "IMG",
		"DETAIL_ADD_DETAIL_TO_SLIDER" => "N",
		"DETAIL_DISPLAY_PREVIEW_TEXT_MODE" => "H",
		"USE_GIFTS_DETAIL" => "Y",
		"USE_GIFTS_SECTION" => "Y",
		"USE_GIFTS_MAIN_PR_SECTION_LIST" => "Y",
		"GIFTS_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_DETAIL_BLOCK_TITLE" => "Выберите один из подарков",
		"GIFTS_DETAIL_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SECTION_LIST_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_SECTION_LIST_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_SECTION_LIST_BLOCK_TITLE" => "Подарки к товарам этого раздела",
		"GIFTS_SECTION_LIST_TEXT_LABEL_GIFT" => "Подарок",
		"GIFTS_SHOW_DISCOUNT_PERCENT" => "Y",
		"GIFTS_SHOW_OLD_PRICE" => "Y",
		"GIFTS_SHOW_NAME" => "Y",
		"GIFTS_SHOW_IMAGE" => "Y",
		"GIFTS_MESS_BTN_BUY" => "Выбрать",
		"GIFTS_MAIN_PRODUCT_DETAIL_PAGE_ELEMENT_COUNT" => "3",
		"GIFTS_MAIN_PRODUCT_DETAIL_HIDE_BLOCK_TITLE" => "N",
		"GIFTS_MAIN_PRODUCT_DETAIL_BLOCK_TITLE" => "Выберите один из товаров, чтобы получить подарок",
		"STORES" => array(
		),
		"USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SHOW_EMPTY_STORE" => "Y",
		"SHOW_GENERAL_STORE_INFORMATION" => "N",
		"USE_BIG_DATA" => "Y",
		"BIG_DATA_RCM_TYPE" => "bestsell",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"SHOW_404" => "N",
		"MESSAGE_404" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DETAIL_SET_VIEWED_IN_COMPONENT" => "N",
		"SEF_URL_TEMPLATES" => array(
			"sections" => "",
			"section" => "#SECTION_CODE#/",
			"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
			"compare" => "compare/",
			"smart_filter" => "#SECTION_CODE#/filter/#SMART_FILTER_PATH#/apply/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>