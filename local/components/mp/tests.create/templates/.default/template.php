<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die(); ?>
<div class="row g-5">
    <div class="col-md-8">
        <div class="h-100 p-5 bg-light border rounded-3" data-bs-spy="scroll" data-bs-target="#createNav" data-bs-smooth-scroll="true" tabindex="0">
            <h2>Создание теста</h2>
            <form class="col-md-12 createForm" action="create.php" method="post" enctype="multipart/form-data" novalidate>
                <div id="main-form">
                    <div class="mb-3">
                        <label for="title" class="form-label">Название</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="preview-text" class="form-label">Описание для анонса</label>
                        <textarea class="form-control" id="preview-text" name="preview-text" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="detail-text" class="form-label">Детальное описание</label>
                        <textarea class="form-control" id="detail-text" name="detail-text" rows="3" required></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="preview-picture" class="form-label">Картинка для анонса</label>
                        <input class="form-control" type="file" accept="image/png, image/jpeg" id="preview-picture" name="preview-picture" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="detail-picture" class="form-label">Детальная картинка</label>
                        <input class="form-control" type="file" accept="image/png, image/jpeg" id="detail-picture" name="detail-picture" required>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="question-count" class="form-label">Количество вопросов</label>
                            <input type="text" class="form-control qc-input" id="question-count" name="question-count" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="result-count" class="form-label">Количество результатов</label>
                            <input type="text" class="form-control rc-input" id="result-count" required>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="questions pb-3" id="questions"></div>
                <div class="results pb-3" id="results"></div>
                <div class="d-flex align-items-center">
                    <input class="btn btn-outline-primary" type="submit" value="Опубликовать">
                    <div class="spinner-border ms-auto d-none" role="status" aria-hidden="true"></div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <nav id="createNav" class="navbar bg-light flex-column align-items-stretch p-3 border rounded-3 position-sticky" style="top: 2rem;">
            <nav class="nav nav-pills flex-column">
                <a class="nav-link" href="#main-form">Основная информация</a>
                <a class="nav-link" href="#questions">Вопросы</a>
                <nav class="nav nav-pills flex-column questions-nav"></nav>
                <a class="nav-link" href="#results">Результаты</a>
                <nav class="nav nav-pills flex-column results-nav"></nav>
            </nav>
        </nav>
    </div>
</div>
