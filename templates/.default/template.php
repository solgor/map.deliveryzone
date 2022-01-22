<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
use Bitrix\Main\Page\Asset;
Asset::getInstance()->addJs('https://api-maps.yandex.ru/2.1/?lang=ru_RU&coordorder=longlat&apikey='.$arParams['YAMAPS_APIKEY']);
?>
<section class="marfamap-section">
    <div class="marfamap-container">
        <div class="marfamap-title">
            <h2>Карта</h2>
            <div class="marfa-container-map" id="<?=$arResult['DOMID']?>">
            </div>
        </div>
    </div>
</section>
