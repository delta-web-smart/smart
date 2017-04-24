<?
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>
<?
    global $arSectionFilter;
    $arSectionFilter = array("PARAMS" => array("iblock_section" => 70));
?>
<?$APPLICATION->IncludeComponent(
	"delta_web:search.page", 
	"main", 
	array(
		"RESTART" => "N",
		"CHECK_DATES" => "N",
		"USE_TITLE_RANK" => "N",
		"DEFAULT_SORT" => "rank",
		"arrFILTER" => array(
			0 => "iblock_1c_catalog",
		),
        "arrFILTER_iblock_1c_catalog" => array(
          0 => "all",
        ),
		"SHOW_WHERE" => "N",
		"SHOW_WHEN" => "N",
		"PAGE_RESULT_COUNT" => "4",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_SHADOW" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "36000000",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "main",
        "TAGS_INHERIT" => "Y",
        "SHOW_CHAIN" => "Y",
		"USE_SUGGEST" => "N",
		"SHOW_ITEM_TAGS" => "N",
		"SHOW_ITEM_DATE_CHANGE" => "N",
		"SHOW_ORDER_BY" => "N",
		"SHOW_TAGS_CLOUD" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"COMPONENT_TEMPLATE" => "clear",
		"NO_WORD_LOGIC" => "N",
		"FILTER_NAME" => "arSectionFilter",
		"USE_LANGUAGE_GUESS" => "Y",
		"SHOW_RATING" => "",
		"RATING_TYPE" => "",
		"PATH_TO_USER_PROFILE" => ""
	),
	false
);?>
<? 
    ob_start();
    $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/search/description.php"), false);
    $description = ob_get_contents();
    ob_end_clean();
?>
<? $APPLICATION->AddViewContent('BOTTOM_DESCRIPTION', $description);?>
<?  
    require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>