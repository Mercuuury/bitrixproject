<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Регистрация");
?>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.register",
	"register_bootstrap_v5",
	Array(
		"AUTH" => "Y",
		"REQUIRED_FIELDS" => array("EMAIL","TITLE","NAME","PERSONAL_GENDER","PERSONAL_BIRTHDAY"),
		"SET_TITLE" => "Y",
		"SHOW_FIELDS" => array("EMAIL","TITLE","NAME","LAST_NAME","PERSONAL_GENDER","PERSONAL_BIRTHDAY","PERSONAL_PHONE","PERSONAL_CITY"),
		"SUCCESS_PAGE" => "",
		"USER_PROPERTY" => array(),
		"USER_PROPERTY_NAME" => "",
		"USE_BACKURL" => "Y"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>