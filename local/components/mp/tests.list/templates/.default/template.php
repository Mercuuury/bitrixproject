<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
?>

<div class="col">
    <div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($arResult['DATA'] as $item) { ?>
        <div class ="col">
            <div class="card h-100">
                <?php if($item['PREVIEW_PICTURE_SRC']): ?>
                    <img src="<?=$item['PREVIEW_PICTURE_SRC'];?>" alt="<?=$item['NAME'];?>" style="max-height: 300px;">
                <?php endif; ?>
                <div class="card-body">
                    <h5 class="card-title"><?=$item['NAME'];?></h5>
                    <p class="card-text"><?=$item['PREVIEW_TEXT'];?></p>
                    <p class="card-text"><small class="text-muted">Количество вопросов: <?=$item['PROPERTY_QUESTION_COUNT_VALUE'];?></small></p>
                    <a class="btn btn-outline-success" href="<?=$item['DETAIL_PAGE_URL'];?>">Пройти</a>
                </div>
            </div>
        </div>
    <?php } ?>
    </div>
</div>
