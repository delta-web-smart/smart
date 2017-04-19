</div>
<?
    if (!$isCatalogDetail) {
        $APPLICATION->IncludeComponent(
            "bitrix:main.include",
            "",
            Array(
                "AREA_FILE_SHOW" => "sect",
                "AREA_FILE_SUFFIX" => "bottom",
                "AREA_FILE_RECURSIVE" => "N",
                "EDIT_MODE" => "html",
            ),
            false,
            Array('HIDE_ICONS' => 'Y')
        );
    }
?>
<article class="bottom-article">
    <?
        $APPLICATION->ShowViewContent('BOTTOM_DESCRIPTION');
    ?>
</article>
<?
		$APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => MAIN_TEMPLATE_PATH ."footer.php"), false);
?>