<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $APPLICATION;
?>
<?php if(!empty($arResult['GEOJSON'])) :?>

<script>
    var geoDataObj,mapDomId,centallat,centerlon

    BX.ready(function (){
        mapDomId="<?=$arResult['DOMID']?>";
        centallat="<?=$arResult['CENTERMAP']['CENTERLAT']?>";
        centerlon="<?=$arResult['CENTERMAP']['CENTERLON']?>";
        geoDataObj=JSON.parse(<?=json_encode($arResult['GEOJSON'])?>)
    })
</script>

<?php endif;?>
