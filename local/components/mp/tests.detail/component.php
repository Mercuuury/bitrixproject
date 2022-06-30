<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

CModule::IncludeModule('iblock');

/*
|--------------------------------------------------------------------------
|                                Test info
|--------------------------------------------------------------------------
*/

$arFilterTest = [
    'IBLOCK_CODE' => 'tests',
    'CODE' => $_REQUEST['ELEMENT_CODE'],
];

$dbResTest = CIBlockElement::GetList(
    [],
    $arFilterTest,
    false,
    false,
    [
        'ID',
        'NAME',
        'DETAIL_TEXT',
        'PREVIEW_PICTURE',
        'DETAIL_PICTURE',
        'PROPERTY_QUESTION_COUNT',
        'PROPERTY_PASSES_COUNT',
    ]
);

$arResTest = $dbResTest->GetNext();
$arResTest['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arResTest['PREVIEW_PICTURE']);
$arResult['TEST'] = $arResTest;

/*
|--------------------------------------------------------------------------
|                              Test questions
|--------------------------------------------------------------------------
*/

$arFilterQuestions = [
    'IBLOCK_CODE' => 'questions',
    'PROPERTY_TEST_ID' => $arResult['TEST']['ID'],
];
$dbResQuestions = CIBlockElement::GetList(
    [],
    $arFilterQuestions,
    false,
    false,
    [
        'ID',
        'NAME',
        'PREVIEW_PICTURE',
        'PROPERTY_TEST_ID',
        'PROPERTY_QUESTION_TYPE',
        'PROPERTY_ANSWERS_COUNT',
    ]
);

while ($arResQuestion = $dbResQuestions->GetNext()) {
    // Question answers
    $arFilterAnswers = [
        'IBLOCK_CODE' => 'answers',
        'PROPERTY_QUESTION_ID' => $arResQuestion['ID'],
    ];
    $dbResAnswers = CIBlockElement::GetList(
        [],
        $arFilterAnswers,
        false,
        false,
        [
            'ID',
            'NAME',
            'PREVIEW_PICTURE',
            'DETAIL_TEXT',
            'PROPERTY_QUESTION_ID',
            'PROPERTY_SCORE',
            'PROPERTY_ANSWERS_COUNT',
        ]
    );

    while ($arResAnswer = $dbResAnswers->GetNext()) {
        $arResQuestion['ANSWERS'][] = $arResAnswer;
    }

    $arResQuestion['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arResQuestion['PREVIEW_PICTURE']);
    $arResult['QUESTIONS'][] = $arResQuestion;
}

/*
|--------------------------------------------------------------------------
|                              Test results
|--------------------------------------------------------------------------
*/

$arFilterResults = [
    'IBLOCK_CODE' => 'results',
    'PROPERTY_TEST_ID' => $arResult['TEST']['ID'],
];
$dbResResults = CIBlockElement::GetList(
    [],
    $arFilterResults,
    false,
    false,
    [
        'ID',
        'NAME',
        'PREVIEW_PICTURE',
        'PREVIEW_TEXT',
        'PROPERTY_TEST_ID',
        'PROPERTY_REQUIRED_SCORE',
    ]
);

while ($arResResult = $dbResResults->GetNext()) {
    $arResResult['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arResResult['PREVIEW_PICTURE']);
    $arResult['RESULTS'][] = $arResResult;
}

function getTermination($num)
{
    $number = substr($num, -2);
    if ($number > 10 and $number < 15) {
        $term = "ов";
    } else {
        $number = substr($number, -1);
        if ($number == 0 || $number > 4) {
            $term = "ов";
        }
        if ($number == 1) {
            $term = "";
        }
        if ($number > 1) {
            $term = "а";
        }
    }
    return  $num . ' вопрос' . $term;
}

// echo '<pre>', print_r($arResult), '</pre>';
$this->includeComponentTemplate();

$jsArr = json_encode($arResult);
?>
<script>
    // console.log(<?=$jsArr;?>)
</script>