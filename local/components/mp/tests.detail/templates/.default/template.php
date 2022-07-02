<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$jsArr = json_encode($arResult);
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="py-5 bg-light rounded-3 rounded-top">
    <div class="container-fluid">
        <div class="col-md-6 mx-auto cards-container">
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title "><?= $arResult['TEST']['NAME']; ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= getTermination($arResult['TEST']['PROPERTY_QUESTION_COUNT_VALUE']); ?></h6>
                </div>
                <? if (isset($arResult['FINAL'])) : ?>
                    <img src="<?= $arResult['FINAL']['PREVIEW_PICTURE_SRC']; ?>" alt="<?= $arResult['TEST']['NAME']; ?>" style="max-height: 300px;">
                <? else : ?>
                    <img src="<?= $arResult['TEST']['PREVIEW_PICTURE_SRC']; ?>" alt="<?= $arResult['TEST']['NAME']; ?>" style="max-height: 300px;">
                <? endif; ?>
                <div class="card-body">
                    <? if (isset($arResult['FINAL'])) : ?>
                        <h5 class="card-title">Ваш результат: <?= $arResult['FINAL']['NAME']; ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Счет: <?= $_POST['score']; ?></h5>
                    <? endif; ?>
                    <p class="card-text ">
                        <? if (isset($arResult['FINAL'])) : ?>
                            <?= $arResult['FINAL']['PREVIEW_TEXT']; ?>
                        <? else : ?>
                            <?= $arResult['TEST']['DETAIL_TEXT']; ?>
                        <? endif; ?>
                    </p>
                    <div class="d-grid">
                        <? if (isset($arResult['FINAL'])) : ?>
                            <a class="btn btn-success" href="/tests">Вернуться к списку тестов</a>
                        <? else : ?>
                            <button class="btn btn-success btn-continue" type="button">Начать</button>
                        <? endif; ?>
                    </div>
                </div>
            </div>
            <div class="questions"></div>
        </div>
    </div>
</div>
<? if (isset($arResult['FINAL'])) : ?>
    <div class="py-2 mb-4 bg-light rounded-3 rounded-bottom ">
        <div class="container-fluid">
            <h2 class="text-center py-2">Статистика</h2>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <? foreach ($arResult['QUESTIONS'] as $qKey => $question) : ?>
                    <div class="col">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">Вопрос <?= $qkey + 1; ?></h5>
                                <p class="card-text"><?= $question['NAME']; ?></p>
                                <canvas id="q<?= $qKey + 1; ?>chart"></canvas>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            arResult['QUESTIONS'].forEach(function(question, qId, arr) {
                const labels = Array.from(question['ANSWERS'], x => x['NAME']);

                const data = {
                    labels: labels,
                    datasets: [{
                        label: 'Question ' + (qId + 1) + ' dataset',
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(255, 205, 86, 0.5)',
                            'rgba(201, 203, 207, 0.5)',
                            'rgba(54, 162, 235, 0.5)'
                        ],
                        data: Array.from(question['ANSWERS'], x => x['PROPERTY_ANSWERS_COUNT_VALUE']),
                    }]
                };

                let delayed;
                const config = {
                    type: 'polarArea',
                    data: data,
                    options: {
                        scales: {
                            r: {
                                ticks: {
                                    z: 1
                                }
                            }
                        }
                    }
                };

                const qChart = new Chart(
                    document.getElementById('q' + (qId + 1) + 'chart'),
                    config
                );
            });
        });
    </script>
<? endif; ?>