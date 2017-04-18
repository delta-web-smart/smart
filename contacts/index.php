<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>
<div class="contacts">
    <span class="contact-type">Телефоны:</span>
    <span>8 (495) 669-32-69,  999-02-90, 364-78-19</span>
    <span class="contact-type">Время работы:</span>
    <span>ежедневно с 9.00 до 21.00 </span>
    <span class="contact-type">E-mail:</span>
    <span>info@mr-wheels.ru</span>
    <span class="contact-type">Адрес склада:</span>
    <p>Москва, Южнопортовая, д. 7, стр. 2.<br>За товаром приезжать на склад только по предварительному заказу!!<br>Самовывоз товара менее 4 шин или дисков платный 600 руб.</p>
    <div class="map-wrap">
        <?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view", 
	".default", 
	array(
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:5:{s:10:\"yandex_lat\";d:55.70686328578614;s:10:\"yandex_lon\";d:37.69260589814759;s:12:\"yandex_scale\";i:16;s:10:\"PLACEMARKS\";a:1:{i:0;a:3:{s:3:\"LON\";d:37.69260589814759;s:3:\"LAT\";d:55.70686328579237;s:4:\"TEXT\";s:60:\"г. Москва, Южнопортовая, д. 7, стр. 2\";}}s:9:\"POLYLINES\";a:0:{}}",
		"MAP_WIDTH" => "600",
		"MAP_HEIGHT" => "258",
		"CONTROLS" => array(
			0 => "ZOOM",
			1 => "SMALLZOOM",
		),
		"OPTIONS" => array(
			0 => "ENABLE_SCROLL_ZOOM",
			1 => "ENABLE_DBLCLICK_ZOOM",
			2 => "ENABLE_DRAGGING",
		),
		"MAP_ID" => "yam_1",
		"COMPONENT_TEMPLATE" => ".default"
	),
	false
);?>
    </div>
</div>
<? 
    ob_start();
    $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/contacts/description.php"), false);
    $description = ob_get_contents();
    ob_end_clean();
?>
<? $APPLICATION->AddViewContent('BOTTOM_DESCRIPTION', $description);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>