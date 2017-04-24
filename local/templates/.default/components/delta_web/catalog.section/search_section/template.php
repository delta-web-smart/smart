<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<? if (!empty($arResult['ITEMS'])):?>
    <? foreach($arResult['ITEMS'] as $arItem):?>
        <li class="mini-card">
            <a href="#" class="preview">
                <img alt="" src="img/product-photo13.jpg">
                <div class="loupe"></div>
                <div class="action-label hit"></div>
            </a>
            <div class="right-part">
                <a href="#" class="name">Колодки тормозные пер. ВАЗ-2108 в уп 4 шт. Kraft</a>
                <span class="article">Артикул: 0023402</span>
                <table>
                  <tr>
                    <td>OEM №:</td>
                    <td>2385723D39</td>
                  </tr>
                  <tr>
                    <td>Диаметр:</td>
                    <td>323</td>
                  </tr>
                  <tr>
                    <td>Ширина:</td>
                    <td>21</td>
                  </tr>
                  <tr class="available">
                    <td>Наличие:</td>
                    <td>>12</td>
                  </tr>
                </table>
            </div>
            <div class="clear"></div>
            <div class="controls">
                <button class="price-btn">99 999<i>i</i></button>
                <input type="text" class="spinner" value="0">
            </div>
        </li>
    <? endforeach;?>
<? endif;?>