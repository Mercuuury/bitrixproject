<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="h-100 p-5 bg-light border rounded-3">
    <h2>Создание теста</h2>
    <form class="col-md-8" action="create.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <div class="mb-3">
            <label for="preview-text" class="form-label">Описание для анонса</label>
            <textarea class="form-control" id="preview-text" name="preview-text" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="detail-text" class="form-label">Детальное описание</label>
            <textarea class="form-control" id="detail-text" name="detail-text" rows="3"></textarea>
        </div>
        <div class="col-md-6 mb-3">
            <label for="preview-picture" class="form-label">Картинка для анонса</label>
            <input class="form-control" type="file" id="preview-picture" name="preview-picture">
        </div>
        <div class="col-md-6 mb-3">
            <label for="detail-picture" class="form-label">Детальная картинка</label>
            <input class="form-control" type="file" id="detail-picture" name="detail-picture">
        </div>
        <div class="col-md-3 mb-3">
            <label for="question-count" class="form-label">Количество вопросов</label>
            <input type="text" class="form-control qc-input" id="question-count" name="question-count">
        </div>
        <hr>
        <div class="questions pb-3">

        </div>
        <input class="btn btn-outline-primary" type="submit" value="Опубликовать">
    </form>
</div>