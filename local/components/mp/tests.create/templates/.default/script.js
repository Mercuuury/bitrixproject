$(document).ready(function() 
{
    // Добавление форм создания вопросов
    $('.qc-input').focusout(function() {
        let qc_len = $('.qc-input').attr('value') - $('.questions .question').length;
        if (qc_len > 0) {
            for (i = 1; i <= qc_len; i++) {
                let q_num = $('.questions .question').length + 1;
                $('.questions').append(`
                <div class="question question-`+q_num+` bg-white p-3 mb-2">
                    <h5>Вопрос `+q_num+`</h5>
                    <div class="mb-3">
                        <label for="question-`+q_num+`-title" class="form-label">Текст вопроса</label>
                        <input type="text" class="form-control form-control-sm" id="question-`+q_num+`-title" name="questions[question-`+q_num+`][title]">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="question-`+q_num+`-type" class="form-label">Тип вопроса</label>
                        <select class="form-select form-select-sm" aria-label="question-`+q_num+`-type" name="questions[question-`+q_num+`][type]">
                            <option value="radio" selected>Одиночный выбор (radio)</option>
                            <option value="checkbox">Множественный выбор (checkbox)</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="answer-count" class="form-label">Количество ответов</label>
                        <input type="text" class="form-control form-control-sm ac-input q`+q_num+`-ac-input" id="answer-count" data-qnum="`+q_num+`">
                    </div>
                    <div class="answers">
                        <h5>Ответы</h5>
                    </div>
                </div>
                <hr>
                `);
            }
        } else if (qc_len < 0) {
            for (i = 0; i > qc_len; i--) {
                $('.questions').children().last().remove();
                $('.questions').children().last().remove();
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
                            <label for="answer-`+a_num+`-title" class="form-label">Текст ответа</label>
                            <input type="text" class="form-control form-control-sm" id="answer-`+a_num+`-title" name="questions[question-`+q_num+`][answers][answer-`+a_num+`][title]">
                        </div>
                        <div class="mb-1">
                            <label for="answer-`+a_num+`-desc" class="form-label">Комментарий к ответу</label>
                            <textarea class="form-control" id="answer-`+a_num+`-desc" name="questions[question-`+q_num+`][answers][answer-`+a_num+`][desc]" rows="1"></textarea>
                        </div>
                        <div class="col-md-3 mb-1">
                            <label for="answer-`+a_num+`-score" class="form-label">Количество баллов</label>
                            <input type="text" class="form-control form-control-sm" id="answer-`+a_num+`-score" name="questions[question-`+q_num+`][answers][answer-`+a_num+`][score]">
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