<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"] . "/bitrix/templates/" . SITE_TEMPLATE_ID . "/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

$curPage = $APPLICATION->GetCurPage(true);
$curSection = explode('/', $curPage)[1];
global $USER;
?>

<!DOCTYPE html>
<html xml:lang="<?= LANGUAGE_ID ?>" lang="<?= LANGUAGE_ID ?>">

<head>
	<title><? $APPLICATION->ShowTitle() ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?= SITE_DIR ?>favicon.ico" />
	<? $APPLICATION->ShowHead(); ?>
</head>

<body>
	<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>

	<div class="container">
		<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
			<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
				<img src="/local/templates/bootstrap_v5/images/logo.png" width="48" height="48" class="d-inline-block align-top" alt="">
			</a>

			<ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
				<li><a href="/news" class="nav-link px-2 <?$curSection == 'news' ? print('link-secondary') : print('link-dark');?>">Новости</a></li>
				<li><a href="/articles" class="nav-link px-2 <?$curSection == 'articles' ? print('link-secondary') : print('link-dark');?>">Статьи</a></li>
				<li><a href="/blogs" class="nav-link px-2 <?$curSection == 'blogs' ? print('link-secondary') : print('link-dark');?>">Блоги</a></li>
				<li><a href="/tests" class="nav-link px-2 <?$curSection == 'tests' ? print('link-secondary') : print('link-dark');?>">Тесты</a></li>
				<li><a href="/about" class="nav-link px-2 <?$curSection == 'about' ? print('link-secondary') : print('link-dark');?>">О проекте</a></li>
				<li><a href="/contacts" class="nav-link px-2 <?$curSection == 'contacts' ? print('link-secondary') : print('link-dark');?>">Контакты</a></li>
			</ul>

			<div class="col-md-3 text-end">
				<?$APPLICATION->IncludeComponent(
					"bitrix:system.auth.form", 
					"auth_header_bootstrap_v5", 
					array(
						"COMPONENT_TEMPLATE" => ".default",
						"REGISTER_URL" => "/register.php",
						"FORGOT_PASSWORD_URL" => "/forgot.php",
						"PROFILE_URL" => "/profile.php",
						"SHOW_ERRORS" => "N"
					),
					false
				);?>
			</div>
		</header>
	</div>

	<main>
		<div class="container">
