<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
// print_r($arResult)
?>

<div class ="col-md-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title "><?=$arResult['TEST']['NAME'];?></h5>
        </div>

        <?php if($arResult['TEST']['PREVIEW_PICTURE_SRC']): ?>
            <img src="<?=$arResult['TEST']['PREVIEW_PICTURE_SRC'];?>" alt="<?=$arResult['TEST']['NAME'];?>" style="max-height: 300px;">
        <?php endif; ?>

        <div class="card-body">
            <p class="card-text "><?=$arResult['TEST']['DETAIL_TEXT'];?></p>
            <div class="d-grid">
                <a class="btn btn-success start_test" href=''>Начать</a>
            </div>
        </div>
    </div>
</div>

<!-- <p class="card-text"><small class="text-muted">Тип вопроса: <?=$arResult['DATA']['PROPERTY_QUESTION_TYPE'];?></small></p> -->

