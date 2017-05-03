<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?>

<?
    $APPLICATION->IncludeFile(SITE_DIR."include/picking_auto_for_tyres_and_disks.php", array(
        "template" => "podbor"
    ));
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>