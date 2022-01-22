<?php

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
use \Bitrix\Main\Loader;
use \Bitrix\Main\Application;

class MarfaDeliveryzone extends \CBitrixComponent
{
    /**
     * шаблоны путей по умолчанию
     * @var array
     */
    protected $defaultUrlTemplates404 = array();

    /**
     * переменные шаблонов путей
     * @var array
     */
    protected $componentVariables = array();

    /**
     * страница шаблона
     * @var string
     */
    protected $page = '';

    /**
     * выполняет логику работы компонента
     */

    function getParamDataGeoJson(){
        $file_path=$this->arParams['YAMAPS_GEOJSON'];

        if(!empty($file_path)){
            $data=file_get_contents($_SERVER['DOCUMENT_ROOT'].$file_path);
        }
        else{
            $result['error'][]='No file geojson path';
            return $result;
        }

        if(!empty($data)){
            $result = $data;
        }
        else{
            $result['error'][]='Empty file geojson';
            return $result;
        }

        return $result;
    }

    function getParamCentermap(){
        $res['CENTERLAT']=$this->arParams['YAMAPS_CENTERLAT'];
        $res['CENTERLON']=$this->arParams['YAMAPS_CENTERLON'];
        var_dump($res);
        return $res;
    }

    function getParamIdDom(){
        $DOMID= !empty($this->arParams['YAMAPS_DOMID']) ? $this->arParams['YAMAPS_DOMID'] : 'marfamap_'.rand(0,10000);
        return $DOMID;
    }

    function getResult(){

        $CENTERMAP=$this->getParamCentermap();
        $this->arResult['CENTERMAP']=$CENTERMAP;

        $DOMID=$this->getParamIdDom();
        $this->arResult['DOMID']=$DOMID;

        $GEOJSON=$this->getParamDataGeoJson();
        if(empty($GEOJSON['error'])){
            $this->arResult['GEOJSON']=$GEOJSON;
        }
        else{
            $this->arResult['error'][]=$GEOJSON;
        }
    }

    public function executeComponent()
    {
        $this->getResult();
        try
        {
            $this->includeComponentTemplate();
        }
        catch (Exception $e)
        {
            ShowError($e->getMessage());
        }
    }
}