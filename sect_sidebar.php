<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    $APPLICATION->ShowViewContent('LEFT_SIDE_FILTER');
?>
<?
    $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/left_sidebar/left_menu_widget.php"), false);
?>
<div class="yandex-widget-wrap"><img src="<?=SITE_TEMPLATE_PATH?>/img/temp-yandex-widget.png" alt=""></div>
    <?
        $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/left_sidebar/news_widget.php"), false);
    ?>
<div class="vk-widget-wrap">
    <?
        $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/left_sidebar/vk_widget.php"), false);
    ?>
</div>