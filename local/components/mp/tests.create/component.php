<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(array("jquery"));
// echo '<pre>', print_r($_POST), '</pre>';

// CModule::IncludeModule('iblock');

// /*
// |--------------------------------------------------------------------------
// |                                Test info
// |--------------------------------------------------------------------------
// */

// $arFilterTest = [
//     'IBLOCK_CODE' => 'tests',
//     'CODE' => $_REQUEST['ELEMENT_CODE'],
// ];

// $dbResTest = CIBlockElement::GetList(
//     [],
//     $arFilterTest,
//     false,
//     false,
//     [
//         'ID',
//         'NAME',
//         'DETAIL_TEXT',
//         'PREVIEW_PICTURE',
//         'PROPERTY_QUESTION_TYPE',
//     ]
// );

// $arResTest = $dbResTest->GetNext();
// $arResTest['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arResTest['PREVIEW_PICTURE']);
// $arResult['TEST'] = $arResTest;

// /*
// |--------------------------------------------------------------------------
// |                              Test questions
// |--------------------------------------------------------------------------
// */

// $arFilterQuestions = [
//     'IBLOCK_CODE' => 'questions',
//     'PROPERTY_TEST_ID' => $arResult['TEST']['ID'],
// ];
// $dbResQuestions = CIBlockElement::GetList(
//     [],
//     $arFilterQuestions,
//     false,
//     false,
//     [
//         'ID',
//         'NAME',
//         'PREVIEW_PICTURE',
//         'PROPERTY_TEST_ID',
//         'PROPERTY_QUESTION_TYPE',
//     ]
// );

// while($arResQuestion = $dbResQuestions->GetNext()) {
//     $arResQuestion['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arResQuestion['PREVIEW_PICTURE']);
//     $arResult['QUESTIONS'][] = $arResQuestion;
// }
// // echo '<pre>', print_r($arResult), '</pre>';
$this->includeComponentTemplate();