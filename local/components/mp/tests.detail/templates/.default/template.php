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
        <? if(isset($arResult['FINAL'])): ?>
            <img src="<?=$arResult['FINAL']['PREVIEW_PICTURE_SRC'];?>" alt="<?=$arResult['TEST']['NAME'];?>" style="max-height: 300px;">
        <? else: ?>
            <img src="<?=$arResult['TEST']['PREVIEW_PICTURE_SRC'];?>" alt="<?=$arResult['TEST']['NAME'];?>" style="max-height: 300px;">
        <? endif; ?>
        <div class="card-body">
            <? if(isset($arResult['FINAL'])): ?>
                <h5 class="card-title">Ваш результат: <?=$arResult['FINAL']['NAME'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted">Счет: <?=$_POST['score'];?></h5>
            <? endif; ?>
            <p class="card-text ">
                <? if(isset($arResult['FINAL'])): ?>
                    <?=$arResult['FINAL']['PREVIEW_TEXT'];?>
                <? else: ?>
                    <?=$arResult['TEST']['DETAIL_TEXT'];?>
                <? endif; ?>
            </p>
            <div class="d-grid">
                <? if(isset($arResult['FINAL'])): ?>
                    <a class="btn btn-success" href="/tests">Вернуться к списку тестов</a>
                <? else: ?>
                    <button class="btn btn-success btn-continue" type="button">Начать</button>
                <? endif; ?>
            </div>
            
        </div>
    </div>
    <div class="questions"></div>
</div>


