<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Покупателю");
?>
<?$APPLICATION->IncludeComponent(
"bitrix:sale.order.ajax",
    "",
    Array(
        "ADDITIONAL_PICT_PROP_8" => "-",
        "ALLOW_AUTO_REGISTER" => "N",
        "ALLOW_NEW_PROFILE" => "Y",
        "ALLOW_USER_PROFILES" => "Y",
        "BASKET_IMAGES_SCALING" => "standard",
        "BASKET_POSITION" => "after",
        "COMPATIBLE_MODE" => "Y",
        "DELIVERIES_PER_PAGE" => "8",
        "DELIVERY_FADE_EXTRA_SERVICES" => "Y",
        "DELIVERY_NO_AJAX" => "Y",
        "DELIVERY_NO_SESSION" => "Y",
        "DELIVERY_TO_PAYSYSTEM" => "d2p",
        "DISABLE_BASKET_REDIRECT" => "N",
        "MESS_DELIVERY_CALC_ERROR_TEXT" => "Вы можете продолжить оформление заказа, а чуть позже менеджер магазина свяжется с вами и уточнит информацию по доставке.",
        "MESS_DELIVERY_CALC_ERROR_TITLE" => "Не удалось рассчитать стоимость доставки.",
        "MESS_FAIL_PRELOAD_TEXT" => "Вы заказывали в нашем интернет-магазине, поэтому мы заполнили все данные автоматически. Обратите внимание на развернутый блок с информацией о заказе. Здесь вы можете внести необходимые изменения или оставить как есть и нажать кнопку \"#ORDER_BUTTON#\".",
        "MESS_SUCCESS_PRELOAD_TEXT" => "Вы заказывали в нашем интернет-магазине, поэтому мы заполнили все данные автоматически. Если все заполнено верно, нажмите кнопку \"#ORDER_BUTTON#\".",
        "ONLY_FULL_PAY_FROM_ACCOUNT" => "N",
        "PATH_TO_AUTH" => "/auth/",
        "PATH_TO_BASKET" => "basket.php",
        "PATH_TO_PAYMENT" => "payment.php",
        "PATH_TO_PERSONAL" => "index.php",
        "PAY_FROM_ACCOUNT" => "Y",
        "PAY_SYSTEMS_PER_PAGE" => "8",
        "PICKUPS_PER_PAGE" => "5",
        "PRODUCT_COLUMNS_HIDDEN" => array("PROPERTY_MATERIAL"),
        "PRODUCT_COLUMNS_VISIBLE" => array("PREVIEW_PICTURE","PROPS"),
        "PROPS_FADE_LIST_1" => array("17","19"),
        "SEND_NEW_USER_NOTIFY" => "Y",
        "SERVICES_IMAGES_SCALING" => "standard",
        "SET_TITLE" => "Y",
        "SHOW_BASKET_HEADERS" => "N",
        "SHOW_COUPONS_BASKET" => "Y",
        "SHOW_COUPONS_DELIVERY" => "Y",
        "SHOW_COUPONS_PAY_SYSTEM" => "Y",
        "SHOW_DELIVERY_INFO_NAME" => "Y",
        "SHOW_DELIVERY_LIST_NAMES" => "Y",
        "SHOW_DELIVERY_PARENT_NAMES" => "Y",
        "SHOW_MAP_IN_PROPS" => "N",
        "SHOW_NEAREST_PICKUP" => "N",
        "SHOW_ORDER_BUTTON" => "final_step",
        "SHOW_PAY_SYSTEM_INFO_NAME" => "Y",
        "SHOW_PAY_SYSTEM_LIST_NAMES" => "Y",
        "SHOW_STORES_IMAGES" => "Y",
        "SHOW_TOTAL_ORDER_BUTTON" => "Y",
        "SHOW_VAT_PRICE" => "Y",
        "SKIP_USELESS_BLOCK" => "Y",
        "TEMPLATE_LOCATION" => "popup",
        "TEMPLATE_THEME" => "site",
        "USE_CUSTOM_ADDITIONAL_MESSAGES" => "N",
        "USE_CUSTOM_ERROR_MESSAGES" => "Y",
        "USE_CUSTOM_MAIN_MESSAGES" => "N",
        "USE_PREPAYMENT" => "N",
        "USE_YM_GOALS" => "N"
    )
);?>
<div class="for-purchaser">
    <h4>Как оплатить</h4>
    <p>Оплатить заказанные у нас шины и диски Вы можете в рублях, за наличный и безналичный расчет.</p>
    <a href="#" class="method">НАЛИЧНЫЙ РАСЧЕТ:</a>
    <p>Расчет за товар производится с водителем-экспедитором при получении заказа.</p>
    <a  href="#"class="method">БЕЗНАЛИЧНЫЙ РАСЧЕТ:</a>
    <p>Оплата по банковским картам временно невозможна.<br>Для оплаты по безналичному расчёту Вам необходимо выслать нам по электронной почте реквизиты плательщика, получить Счет на оплату и оплатить его со своего расчетного счета.</p>
    <p class="separately">Отгрузка товара производится только после зачисления денежных средств на расчетный счет нашей<br>компании.</p>
    <p class="separately">Для получения товара необходима доверенность (или печать организации), при отгрузке товара предоставляются товарная накладная и счет-фактура.</p>
    <h4>Условия доставки</h4>
    <span>При заказе от 4 шин или дисков:</span>
    <ul>
      <li>- Доставка по Москве в пределах МКАД – БЕСПЛАТНО</li>
      <li>- Доставка за МКАД до 10 км. – 500 руб.</li>
      <li>- Доставка за МКАД свыше 10 км. – 500 руб. + 30 руб./км.</li>
      <span>Стоимость доставки менее 4 шин или дисков по Москве в пределах МКАД – 600 руб.</span>
      <p>Стоимость доставки до транспортной компании для отправки в регионы России: доставка до транспортной компании по Москве бесплатно, расходы транспортной компании оплачивает клиент по факту получения</p>
    </ul>
  </div>
<? 
    ob_start();
    $APPLICATION->IncludeComponent("bitrix:main.include", "", array("AREA_FILE_SHOW" => "file", "PATH" => SITE_DIR."include/for_purchaser/description.php"), false);
    $description = ob_get_contents();
    ob_end_clean();
?>
<? $APPLICATION->AddViewContent('BOTTOM_DESCRIPTION', $description);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>