<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Контакты");
?>

<div class="container">
    <div class="text-center pb-5">
        <h1 class="pb-3">Контактная информация</h1>
    </div>
    <div class="row">
        <div class="col-lg-6 mb-5">
            <div class="row profile">
                <div class="avatar mx-auto border border-dark rounded-circle"></div>
                <p class="text-center fs-4">Ковшик Александр Сергеевич</p>
                <p class="text-center">Студент 2-го курса направления "Корпоративные информационные системы" факультета "Информационные технологии" Московского политехнического университета.</p>
            </div>
            <div class="row contacts">
                <div class="container-fluid d-flex justify-content-center flex-wrap">
                    <div class="px-5 py-2"><a href="tel:+79687696974" class="header-phone">+7 (968) 769-79-74</a></div>
                    <div class="px-5 py-2"><a href="mailto:kovshiksa@gmail.com" class="header-email">kovshiksa@gmail.com</a></div>
                    <div class="px-5 py-2"><a href="https://github.com/Mercuuury/" class="header-github">Mercuuury</a></div>
                </div>
            </div>
            <!-- <div class="skills">
                <h3>Мои навыки</h3>
                <dl class="skills-list">
                    <dt class="skill-php">PHP</dt>
                    <dd class="level"><div style="width: 85%;">85%</div></dd>
                    <dt class="skill-html">HTML</dt>
                    <dd class="level"><div style="width: 80%;">80%</div></dd>
                    <dt class="skill-css">CSS</dt>
                    <dd class="level"><div style="width: 70%;">70%</div></dd>
                    <dt class="skill-java">Java</dt>
                    <dd class="level"><div style="width: 60%;">60%</div></dd>
                    <dt class="skill-js">JS</dt>
                    <dd class="level"><div style="width: 40%;">40%</div></dd>
                    
                </dl>
            </div> -->
        </div>
        <div class="col-lg-6 mb-5">
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" name="name" id="name" class="form-control mb-3" placeholder="Введите имя...">
                    <label for="email" class="form-label">Электронная почта</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Введите email...">
                    <div class="form-text mb-3">Ваши персональные данные не передаются третьим лицам</div>
                    <label for="message" class="form-label">Сообщение</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Введите сообщение..."></textarea>
                    <button type="button" class="btn btn-outline-primary mt-3">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>