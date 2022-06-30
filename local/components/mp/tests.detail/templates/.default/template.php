<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
// print_r($arResult)
?>

<div class ="col-md-6 mx-auto cards-container">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title "><?=$arResult['TEST']['NAME'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?=getTermination($arResult['TEST']['PROPERTY_QUESTION_COUNT_VALUE']);?></h6>
        </div>

        <?php if($arResult['TEST']['PREVIEW_PICTURE_SRC']): ?>
            <img src="<?=$arResult['TEST']['PREVIEW_PICTURE_SRC'];?>" alt="<?=$arResult['TEST']['NAME'];?>" style="max-height: 300px;">
        <?php endif; ?>

        <div class="card-body">
            <p class="card-text "><?=$arResult['TEST']['DETAIL_TEXT'];?></p>
            <div class="d-grid">
                <button class="btn btn-success btn-continue" type="button">Начать</button>
            </div>
        </div>
    </div>
    <? foreach($arResult['QUESTIONS'] as $qKey => $question): ?>
    <div class="card mb-3 question">
        <div class="card-body">
            <h5 class="card-title "><?=$arResult['TEST']['NAME'];?></h5>
            <h6 class="card-subtitle mb-2 text-muted">Вопрос <?=$qKey + 1;?>/<?=$arResult['TEST']['PROPERTY_QUESTION_COUNT_VALUE'];?></h6>
        </div>

        <?php if($question['PREVIEW_PICTURE_SRC']): ?>
            <img src="<?=$question['PREVIEW_PICTURE_SRC'];?>" alt="<?=$question['NAME'];?>" style="max-height: 300px;">
        <?php endif; ?>

        <div class="card-body">
            <p class="card-text "><?=$question['NAME'];?></p>
            <hr>
            <? foreach($question['ANSWERS'] as $aKey => $answer): ?>
                <div class="d-grid mb-2 answer">
                    <input type="radio" class="btn-check" id="q<?=$qKey;?>a<?=$aKey;?>" autocomplete="off" data-aid="<?=$aKey;?>" data-qid="<?=$qKey;?>">
                    <label class="btn btn-outline-success rounded-0 shadow-none" for="q<?=$qKey;?>a<?=$aKey;?>"><?=$answer['NAME'];?></label>
                    <div class="bg-light text-dark px-2 pt-2 qa-desc">
                        <p>
                            <span class="px-2"><? if($answer['PROPERTY_SCORE_VALUE'] >= 0) echo '+';?><?=$answer['PROPERTY_SCORE_VALUE'];?></span>
                            <?=$answer['DETAIL_TEXT'];?>
                            <br><span class="px-2">50%</span> ответили так же
                        </p>
                    </div>
                </div>
            <? endforeach; ?>
            <? if($qKey+1 != $arResult['TEST']['PROPERTY_QUESTION_COUNT_VALUE']): ?>
            <div class="d-grid">
                <button class="btn btn-success btn-continue" type="button">Дальше</button>
            </div>
            <? else: ?>
            <div class="d-grid">
                <button class="btn btn-success btn-end" type="button">Результат</button>
            </div>
            <? endif; ?>
        </div>
    </div>
    <? endforeach; ?>
</div>

<!-- <p class="card-text"><small class="text-muted">Тип вопроса: <?=$arResult['DATA']['PROPERTY_QUESTION_TYPE'];?></small></p> -->

