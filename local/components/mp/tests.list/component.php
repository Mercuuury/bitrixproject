<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule('iblock');

$dbRes = CIBlockElement::GetList(
    [],
    [
        'IBLOCK_CODE' => 'tests'
    ],
    false,
    false,
    [
        'ID',
        'NAME',
        'DATE_CREATE',
        'PREVIEW_TEXT',
        'PREVIEW_PICTURE',
        'PROPERTY_QUESTION_COUNT',
        'PROPERTY_PASSES_COUNT',
        'DETAIL_PAGE_URL'
    ]
);

while($arRes = $dbRes->GetNext()) {
    $arRes['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arRes['PREVIEW_PICTURE']);
    $arRes['PREVIEW_PICTURE_RESIZE'] = CFile::ResizeImageGet(
        $arRes['PREVIEW_PICTURE'],
        ['width' => 200, 'height' => 200],
        BX_RESIZE_IMAGE_PROPORTIONAL
    );
    $arResult['DATA'][] = $arRes;
}

$this->includeComponentTemplate();