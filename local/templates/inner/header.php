<?
		$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => MAIN_TEMPLATE_PATH. "header.php"), false);
?>
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "main", array(
        "START_FROM" => "0",
        "PATH" => "",
        "SITE_ID" => SITE_ID
    ),
    false,
    Array('HIDE_ICONS' => 'Y')
);?>
<div class="border-wrap">
    <h2 class="title"><span><?=$APPLICATION->ShowTitle(false);?></span></h2>