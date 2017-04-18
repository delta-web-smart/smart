<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();?>
<div class="corf">
  <a href="<?=$arParams['PATH_TO_BASKET']?>" class="corf-ico"></a>
  <span class="title"><?=GetMessage('TSB1_CART')?></span>
  <div class="goods"><span class="count"><?=GetMessage('TSB1_PRODUCTS')?> <b><?=$arResult['NUM_PRODUCTS']?></b></span><span class="price"><?=$arResult['CUSTOM_TOTAL_PRICE']?><b>c</b></span></div>
</div>