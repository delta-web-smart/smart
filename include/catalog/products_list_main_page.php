<? foreach($arResult['ITEMS'] as $arItem):?>
    <li>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="img-wrap">
            <img src="<?=$arItem["PICTURE"]["src"]?>" alt="<?=$arItem["NAME"]?>" title="<?=$arItem["NAME"]?>">
            <?if($LABEL_FOR_SALE != "viewed"):?>
                <div class="action-label <?=$LABEL_FOR_SALE?>"></div>
            <?endif;?>
        </a>
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="name"><?=$arItem["NAME"]?></a>
        <? if (!empty($arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"])):?>
            <span class="article"><?=GetMessage("CML2_ARTICLE_TITLE");?> <?=$arItem["PROPERTIES"]["CML2_ARTICLE"]["VALUE"]?></span>
        <? endif;?>
        <input type="text" class="spinner" value="0">
        <button class="price-btn"><?=$arItem["PRICE_DISCOUNT_VALUE"]?><i>i</i></button>
    </li>
<? endforeach;?>