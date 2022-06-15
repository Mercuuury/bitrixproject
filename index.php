<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Игровой интернет-портал");
?>

<div class="jumbotrons">
    <div class="p-5 mb-4 bg-light rounded-3 jumbotron jumbotron-news">
        <div class="container-fluid py-5 text-light">
            <div>
                <h1 class="display-5 fw-bold">Игровые новости</h1>
                <p class="col-md-8 fs-4">Самые актуальные новости — оставайся всегда в курсе свежих новостей из мира игр и игровой индустрии</p>
                <a href="/news" class="btn btn-outline-light stretched-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="row align-items-md-stretch">
        <div class="col-md-6">
            <div class="h-100 p-5 fs-5 text-white rounded-3 jumbotron jumbotron-articles">
                <div>
                    <h2>Игровые статьи</h2>
                    <p>Профессиональные и любительские обзоры новых игр, интересные подборки, превью ожидаемых проектов, итоги выставок и других событий игрового мира</p>
                    <a href="/articles" class="btn btn-outline-light stretched-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 fs-5 text-white border rounded-3 jumbotron jumbotron-blog">
                <div>
                    <h2>Игровые блоги</h2>
                    <p>Популярные пользовательские новости и блоги. Интересные заметки и обсуждения на игровую и развлекательную тематику.</p>
                    <a href="/blogs" class="btn btn-outline-light stretched-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="20" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>