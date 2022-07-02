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
|                                Test results
|--------------------------------------------------------------------------
*/

if(isset($_POST['answers']) && isset($_POST['score'])) {
    $score = $_POST['score'];
    $answers = json_decode($_POST['answers'], true);

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
            'PROPERTY_ENDING_COUNT',
        ]
    );

    while ($arResResult = $dbResResults->GetNext()) {
        $arResResult['PREVIEW_PICTURE_SRC'] = CFile::GetPath($arResResult['PREVIEW_PICTURE']);
        $arResults[] = $arResResult;
    }

    $result = [
        'index' => null,
        'value' => null,
    ];
    foreach ($arResults as $arKey => $resultVal) {
        $reqScore = $resultVal['PROPERTY_REQUIRED_SCORE_VALUE'];
        if ($score >= $reqScore && $reqScore >= $result['value']) {
            $result['index'] = $arKey;
            $result['value'] = $reqScore;
        }
    }
    $arResult['FINAL'] = $arResults[$result['index']];

    # Update PASSES_COUNT & ANSWERS_COUNT & ENDING_COUNT values
    foreach ($answers as $aKey => $answer) {
        CIBlockElement::SetPropertyValues($answer['ID'], 5, $answer['PROPERTY_ANSWERS_COUNT_VALUE'] + 1, 'ANSWERS_COUNT');
    }
    CIBlockElement::SetPropertyValues($arResult['TEST']['ID'], 3, $arResult['TEST']['PROPERTY_PASSES_COUNT_VALUE'] + 1, 'PASSES_COUNT');
    CIBlockElement::SetPropertyValues($arResult['FINAL']['ID'], 6, $arResult['FINAL']['PROPERTY_ENDING_COUNT_VALUE'] + 1, 'ENDING_COUNT');
}

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
    # Question answers
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

$this->includeComponentTemplate();

$jsArr = json_encode($arResult);
?>

<script>
    let arResult = <?= $jsArr; ?>;
    let arAnswers = [];
    let score = 0;
    let curQuestionIdx = 0;

    $(document).ready(function() 
    {
        function appendQuestion() 
        {
            let nextBtn = `<div class="d-grid">
                            <button class="btn btn-success btn-continue" type="button" style="display: none">Дальше</button>
                        </div>`
            if (curQuestionIdx + 1 == arResult['TEST']['PROPERTY_QUESTION_COUNT_VALUE']) {
                nextBtn = `<form method='POST'>
                            <div class="d-grid">
                                <input id="scoreIpt" type="hidden" name="score">
                                <input id="answersIpt" type="hidden" name="answers">
                                <input class="btn btn-success btn-end" type="submit" value='Результат' style="display: none">
                            </div>
                        </form>`
            }

            let answers = '';
            arResult['QUESTIONS'][curQuestionIdx]['ANSWERS'].forEach(function(answer, aidx, arr) {
                let plus;
                (answer['PROPERTY_SCORE_VALUE'] >= 0) ? plus = '+': plus = '';
                let respPercent = Math.round(answer['PROPERTY_ANSWERS_COUNT_VALUE'] / arResult['TEST']['PROPERTY_PASSES_COUNT_VALUE'] * 100)  || 0;
                respPercent = isFinite(respPercent) ? respPercent : 0;
                answers += `
                <div class="d-grid mb-2 answer">
                    <input type="radio" class="btn-check" id="q` + curQuestionIdx + `a` + aidx + `" autocomplete="off" data-aid="` + aidx + `" data-qid="` + curQuestionIdx + `">
                    <label class="btn btn-outline-success rounded-0 shadow-none" for="q` + curQuestionIdx + `a` + aidx + `">` + answer['NAME'] + `</label>
                    <div class="bg-light text-dark px-2 pt-2 qa-desc" style="display: none">
                        <p>
                            <span class="px-2">` + plus + `` + answer['PROPERTY_SCORE_VALUE'] + `</span>
                            ` + answer['DETAIL_TEXT'] + `
                            <br><span class="px-2">`+respPercent+`%</span> ответили так же
                        </p>
                    </div>
                </div>
                `;
            });

            $('.questions').append(`
            <div class="card mb-3 question">
                <div class="card-body">
                    <h5 class="card-title ">` + arResult['TEST']['NAME'] + `</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Вопрос ` + (curQuestionIdx + 1) + `/` + arResult['TEST']['PROPERTY_QUESTION_COUNT_VALUE'] + `</h6>
                </div>
                <img src="` + arResult['QUESTIONS'][curQuestionIdx]['PREVIEW_PICTURE_SRC'] + `" alt="` + arResult['QUESTIONS'][curQuestionIdx]['NAME'] + `" style="max-height: 300px;">
                <div class="card-body">
                    <p class="card-text ">` + arResult['QUESTIONS'][curQuestionIdx]['NAME'] + `</p>
                    <hr>
                    ` + answers + `
                    ` + nextBtn + `
                </div>
            </div>
            `);

            $('html, body').animate({
                scrollTop: $('.question').last().offset().top
            }, 'fast');

            $('.question').last().find('.btn-check').click(function() {
                arAnswers.push(arResult['QUESTIONS'][$(this).data('qid')]['ANSWERS'][$(this).data('aid')]);
                $(this).parent().parent().find('.btn-check').prop('disabled', true);
                $(this).parent().find('.qa-desc').show();
                $(this).parent().parent().find('.btn-continue').show();
                $(this).parent().parent().find('.btn-end').show();
            });

            curQuestionIdx++;
        }

        function setHandlers() {
            $('.btn-continue').on('click', function() {
                $(this).prop('disabled', true);
                appendQuestion();
                setHandlers();
            });

            $('.btn-end').on('click', function() {
                arAnswers.forEach(answer => {
                    score += Number(answer['PROPERTY_SCORE_VALUE']);
                });

                $('#scoreIpt').val(score);
                $('#answersIpt').val(JSON.stringify(arAnswers));
            });
        }

        setHandlers();
    });
</script>