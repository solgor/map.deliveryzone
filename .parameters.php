<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc as Loc;

Loc::loadMessages(__FILE__);

try
{
    if (!Main\Loader::includeModule('iblock'))
        throw new Main\LoaderException(Loc::getMessage('STANDARD_ELEMENTS_PARAMETERS_IBLOCK_MODULE_NOT_INSTALLED'));
    $arComponentParameters = [
        'GROUPS' => [
            'YAMAPS'=>[
                "NAME"=>"Настройки яндекс карт",
                "SORT"=>100
            ]
        ],
        'PARAMETERS' => [
                        'YAMAPS_DOMID'=>[
                'PARENT' => 'YAMAPS',
                'NAME' => Loc::getMessage('STANDARD_ELEMENTS_PARAMETERS_YAMAPS_DOMID'),
                'TYPE' => 'TEXT',
                //'DEFAULT' => 'marfamap'
            ],

            'YAMAPS_APIKEY'=>[
                'PARENT' => 'YAMAPS',
                'NAME' => Loc::getMessage('STANDARD_ELEMENTS_PARAMETERS_YAMAPS_APIKEY'),
                'TYPE' => 'TEXT',
                'DEFAULT' => ''
            ],
            'YAMAPS_GEOJSON'=>[
                'PARENT' => 'YAMAPS',
                'NAME' => Loc::getMessage('STANDARD_ELEMENTS_PARAMETERS_YAMAPS_GEOJSON'),
                'TYPE' => 'FILE',
                'DEFAULT' => '',
                "FD_TARGET" => "F",
                "FD_EXT" => 'json,geojson',
                "FD_UPLOAD" => true,
                "FD_USE_MEDIALIB" => true,
                //"FD_MEDIALIB_TYPES" => Array('video', 'sound')
                ],
            'YAMAPS_CENTERLAT'=>[
                'PARENT' => 'YAMAPS',
                'NAME' => Loc::getMessage('STANDARD_ELEMENTS_PARAMETERS_YAMAPS_CENTERLAT'),
                'TYPE' => 'TEXT',
                'DEFAULT' => '37.62493141565861'
            ],
            'YAMAPS_CENTERLON'=>[
                'PARENT' => 'YAMAPS',
                'NAME' => Loc::getMessage('STANDARD_ELEMENTS_PARAMETERS_YAMAPS_CENTERLON'),
                'TYPE' => 'TEXT',
                'DEFAULT' => '55.70869574653657'
            ],
            ],
            'CACHE_TIME' => [
                'DEFAULT' => 3600
            ]
    ];
}
catch (Main\LoaderException $e)
{
    ShowError($e->getMessage());
}
?>
