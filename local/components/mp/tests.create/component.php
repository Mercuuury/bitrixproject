<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
CJSCore::Init(array("jquery"));
CModule::IncludeModule('iblock');

if(!isset($_POST['title']) || $_POST['title'] == 'BX_DEBUG') 
{
    if ($_POST['title'] == 'BX_DEBUG') {
        echo '<pre>', print_r($_POST), '</pre>';
        echo '<pre>', print_r($_FILES), '</pre>';
    }
    $this->includeComponentTemplate();
} 
else 
{
    $obElTest = new CIBlockElement();
    $testId = $obElTest->Add(
        [
        'IBLOCK_ID' => 3,
        'ACTIVE' => 'Y',
        'NAME' => $_POST['title'],
        'CODE' => CUtil::translit($_POST['title'], "ru", array("replace_space"=>"-","replace_other"=>"-")),
        'PREVIEW_TEXT' => $_POST['preview-text'],
        'DETAIL_TEXT' => $_POST['detail-text'],
        "PREVIEW_PICTURE" => $_FILES['preview-picture'],
        "DETAIL_PICTURE" => $_FILES['detail-picture'],
        "PROPERTY_VALUES" => array(
            "QUESTION_COUNT" => $_POST['question-count'],
            "PASSES_COUNT" => 0,
        ),
    ]
    );

    foreach ($_POST['questions'] as $questionKey => $question) {
        $obElQuestion = new CIBlockElement();
        $questionId = $obElQuestion->Add(
            [
            'IBLOCK_ID' => 4,
            'ACTIVE' => 'Y',
            'NAME' => $question['title'],
            'CODE' => CUtil::translit($question['title'], "ru", array("replace_space"=>"-","replace_other"=>"-")),
            "PREVIEW_PICTURE" => [
                "name" => $_FILES['questions']['name'][$questionKey]['preview-picture'],
                "type" => $_FILES['questions']['type'][$questionKey]['preview-picture'],
                "tmp_name" => $_FILES['questions']['tmp_name'][$questionKey]['preview-picture'],
                "error" => $_FILES['questions']['error'][$questionKey]['preview-picture'],
                "size" => $_FILES['questions']['size'][$questionKey]['preview-picture'],
            ],
            "PROPERTY_VALUES" => array(
                "QUESTION_TYPE" => [
                    "VALUE" => $question['type'] == 'radio' ? 21 : 22,
                ],
                "TEST_ID" => $testId,
                "ANSWERS_COUNT" => 0,
            ),
        ]
        );

        foreach ($question['answers'] as $answer) {
            $obElAnswer = new CIBlockElement();
            $answerId = $obElAnswer->Add(
                [
                'IBLOCK_ID' => 5,
                'ACTIVE' => 'Y',
                'NAME' => $answer['title'],
                'CODE' => CUtil::translit($answer['title'], "ru", array("replace_space"=>"-","replace_other"=>"-")),
                "DETAIL_TEXT" => $answer['desc'],
                "PROPERTY_VALUES" => array(
                    "SCORE" => $answer['score'],
                    "QUESTION_ID" => $questionId,
                    "ANSWERS_COUNT" => 0,
                ),
            ]
            );
        }
    }

    foreach ($_POST['results'] as $resultKey => $result) {
        $obElResult = new CIBlockElement();
        $resultId = $obElResult->Add(
            [
            'IBLOCK_ID' => 6,
            'ACTIVE' => 'Y',
            'NAME' => $result['title'],
            'CODE' => CUtil::translit($result['title'], "ru", array("replace_space"=>"-","replace_other"=>"-")),
            'PREVIEW_TEXT' => $result['desc'],
            'PREVIEW_PICTURE' => [
                "name" => $_FILES['results']['name'][$resultKey]['preview-picture'],
                "type" => $_FILES['results']['type'][$resultKey]['preview-picture'],
                "tmp_name" => $_FILES['results']['tmp_name'][$resultKey]['preview-picture'],
                "error" => $_FILES['results']['error'][$resultKey]['preview-picture'],
                "size" => $_FILES['results']['size'][$resultKey]['preview-picture'],
            ],
            "PROPERTY_VALUES" => array(
                "REQUIRED_SCORE" => $result['score'],
                "TEST_ID" => $testId,
                "ENDING_COUNT" => 0,
            ),
        ]
        );
    }

    LocalRedirect("/tests/".CUtil::translit($_POST['title'], "ru", array("replace_space"=>"-","replace_other"=>"-")));
}