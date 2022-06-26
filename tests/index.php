<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тесты");
?>
<? if ($USER->isAdmin()): ?>
	<div class="pb-3">
		<a class="btn btn-success" href="./create.php">Создать тест</a>
	</div>
<? endif; ?>
<?$APPLICATION->IncludeComponent(
	"mp:tests.list",
	".default",
	Array(
		"COMPONENT_TEMPLATE" => ".default",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"PRECISION" => "inf"
	)
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>