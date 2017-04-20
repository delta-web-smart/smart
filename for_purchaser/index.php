<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Покупателю");
?>
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