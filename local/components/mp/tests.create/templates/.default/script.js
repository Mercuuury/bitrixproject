$(document).ready(function() 
{
    // Валидация формы
    const form = document.querySelector('.createForm');
    form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        } else {
            document.querySelector('.spinner-border').classList.remove('d-none');
        }
        form.classList.add('was-validated')
    }, false)
    
    // Добавление форм создания результатов
    $('.rc-input').focusout(function() {
        let rc_len = $('.rc-input').attr('value') - $('.results .result').length;
        if (rc_len > 0) {
            for (i = 1; i <= rc_len; i++) {
                let r_num = $('.results .result').length + 1;
                $('.results').append(`
                <div class="result result-`+r_num+` bg-white p-3 mb-2" id="results-`+r_num+`">
                    <h5>Результат `+r_num+`</h5>
                    <div class="mb-3">
                        <label for="result-`+r_num+`-title" class="form-label">Заголовок результата</label>
                        <input type="text" class="form-control form-control-sm" id="result-`+r_num+`-title" name="results[result-`+r_num+`][title]" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="result-`+r_num+`-desc" class="form-label">Описание результата</label>
                        <input type="text" class="form-control form-control-sm" id="result-`+r_num+`-desc" name="results[result-`+r_num+`][desc]" required>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="result-`+r_num+`-preview-picture" class="form-label">Картинка для анонса</label>
                        <input class="form-control form-control-sm" type="file" accept="image/png, image/jpeg" id="result-`+r_num+`-preview-picture" name="results[result-`+r_num+`][preview-picture]" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="result-`+r_num+`-score" class="form-label">Проходной балл</label>
                        <input type="text" class="form-control form-control-sm" id="result-`+r_num+`-score" name="results[result-`+r_num+`][score]" required>
                    </div>
                </div>
                <hr>
                `);
                $('.results-nav').append(`<a class="nav-link ms-3 my-1 rlink-`+r_num+`" href="#results-`+r_num+`">Результат `+r_num+`</a>`);
            }
        } else if (rc_len < 0) {
            for (i = 0; i > rc_len; i--) {
                $('.results').children().last().remove();
                $('.results').children().last().remove();
                $('.results-nav').children().last().remove();
            }
        }
    });

    // Добавление форм создания вопросов
    $('.qc-input').focusout(function() {
        let qc_len = $('.qc-input').attr('value') - $('.questions .question').length;
        if (qc_len > 0) {
            for (i = 1; i <= qc_len; i++) {
                let q_num = $('.questions .question').length + 1;
                $('.questions').append(`
                <div class="question question-`+q_num+` bg-white p-3 mb-2" id="questions-`+q_num+`">
                    <h5>Вопрос `+q_num+`</h5>
                    <div class="mb-3">
                        <label for="question-`+q_num+`-title" class="form-label">Текст вопроса</label>
                        <input type="text" class="form-control form-control-sm" id="question-`+q_num+`-title" name="questions[question-`+q_num+`][title]" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="question-`+q_num+`-type" class="form-label">Тип вопроса</label>
                        <select class="form-select form-select-sm" aria-label="question-`+q_num+`-type" name="questions[question-`+q_num+`][type]" required>
                            <option value="radio" selected>Одиночный выбор (radio)</option>
                            <option value="checkbox">Множественный выбор (checkbox)</option>
                        </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="question-`+q_num+`-preview-picture" class="form-label">Картинка для анонса</label>
                        <input class="form-control form-control-sm" type="file" accept="image/png, image/jpeg" id="question-`+q_num+`-preview-picture" name="questions[question-`+q_num+`][preview-picture]" required>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="answer-count" class="form-label">Количество ответов</label>
                        <input type="text" class="form-control form-control-sm ac-input q`+q_num+`-ac-input" id="answer-count" data-qnum="`+q_num+`" required>
                    </div>
                    <div class="answers">
                        <h5>Ответы</h5>
                    </div>
                </div>
                <hr>
                `);
                $('.questions-nav').append(`<a class="nav-link ms-3 my-1 qlink-`+q_num+`" href="#questions-`+q_num+`">Вопрос `+q_num+`</a>`);
            }
        } else if (qc_len < 0) {
            for (i = 0; i > qc_len; i--) {
                $('.questions').children().last().remove();
                $('.questions').children().last().remove();
                $('.questions-nav').children().last().remove();
            }
        }

        // Добавление форм создания ответов на вопрос
        let $a_counters = $('.ac-input');
        $a_counters.focusout(function(e) {
            let $qAnswers = $(e.target).parents('.question').children('.answers');
            let ac_len = $(e.target).attr('value') - $qAnswers.children('.answer').length;
            if (ac_len > 0) {
                for (i = 1; i <= ac_len; i++) {
                    let a_num = $qAnswers.children('.answer').length + 1;
                    let q_num = $(e.target).attr('data-qnum');
                    $qAnswers.append(`
                    <div class="answer answer-`+a_num+` bg-white p-3 pb-0">
                        <div class="mb-1">
                            <label for="q-`+q_num+`a-`+a_num+`-title" class="form-label">Текст ответа</label>
                            <input type="text" class="form-control form-control-sm" id="q-`+q_num+`a-`+a_num+`-title" name="questions[question-`+q_num+`][answers][answer-`+a_num+`][title]" required>
                        </div>
                        <div class="mb-1">
                            <label for="q-`+q_num+`a-`+a_num+`-desc" class="form-label">Комментарий к ответу</label>
                            <textarea class="form-control form-control-sm" id="q-`+q_num+`a-`+a_num+`-desc" name="questions[question-`+q_num+`][answers][answer-`+a_num+`][desc]" rows="1"></textarea>
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for="q-`+q_num+`a-`+a_num+`-score" class="form-label">Количество баллов</label>
                            <input type="text" class="form-control form-control-sm" id="q-`+q_num+`a-`+a_num+`-score" name="questions[question-`+q_num+`][answers][answer-`+a_num+`][score]" required>
                        </div>
                        <hr class="mb-0">
                    </div>
                    `);
                }
            } else if (ac_len < 0) {
                for (i = 0; i > ac_len; i--) {
                    $qAnswers.children().last().remove();
                }
            }
        });
    });
});