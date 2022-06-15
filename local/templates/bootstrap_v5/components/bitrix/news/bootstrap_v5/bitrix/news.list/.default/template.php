<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<style>
	.card {
		transition: 0.5s;
	}
	.card:hover {
		transform: scale(1.05);
	}
</style>
<? if ($arParams["DISPLAY_TOP_PAGER"]) : ?>
	<?= $arResult["NAV_STRING"] ?><br />
<? endif; ?>
<div class="row row-cols-1 row-cols-md-3 g-4">
	<? foreach ($arResult["ITEMS"] as $key => $arItem) : ?>
		<? if ($key > 0 && $key % 3 == 0) : ?>
			</div><div class="row row-cols-1 row-cols-md-3 g-4">
		<? endif; ?>
		<div class="col mb-5">
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="card h-100" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
				<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])) : ?>
					<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>
						<img class="preview_picture" border="0" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>">
					<? else : ?>
						<img class="preview_picture card-img-top" border="0" src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>" width="<?= $arItem["PREVIEW_PICTURE"]["WIDTH"] ?>" height="<?= $arItem["PREVIEW_PICTURE"]["HEIGHT"] ?>" alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" title="<?= $arItem["PREVIEW_PICTURE"]["TITLE"] ?>"  />
					<? endif; ?>
				<? endif ?>
				<? if ($arParams["DISPLAY_DATE"] != "N" && $arItem["DISPLAY_ACTIVE_FROM"]) : ?>
					<span class="news-date-time"><? echo $arItem["DISPLAY_ACTIVE_FROM"] ?></span>
				<? endif ?>
				<div class="card-body">
					<? if ($arParams["DISPLAY_NAME"] != "N" && $arItem["NAME"]) : ?>
						<? if (!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])) : ?>
							<h5 class="card-title"><? echo $arItem["NAME"] ?></h5>
						<? else : ?>
							<h5 class="card-title"><? echo $arItem["NAME"] ?></h5>
						<? endif; ?>
					<? endif; ?>
					<? if ($arParams["DISPLAY_PREVIEW_TEXT"] != "N" && $arItem["PREVIEW_TEXT"]) : ?>
						<p class="card-text"><? echo $arItem["PREVIEW_TEXT"]; ?></p>
					<? endif; ?>
					<a class="stretched-link" href="<? echo $arItem["DETAIL_PAGE_URL"] ?>"></a>
					<? if ($arParams["DISPLAY_PICTURE"] != "N" && is_array($arItem["PREVIEW_PICTURE"])) : ?>
						<div style="clear:both"></div>
					<? endif ?>
				</div>
				<div class="card-footer">
					<? foreach ($arItem["FIELDS"] as $code => $value) : ?>
						<small>
							<?= GetMessage("IBLOCK_FIELD_" . $code) ?>:&nbsp;<?= $value; ?>
						</small><br />
					<? endforeach; ?>
					<? foreach ($arItem["DISPLAY_PROPERTIES"] as $pid => $arProperty) : ?>
						<small>
							<?= $arProperty["NAME"] ?>:&nbsp;
							<? if (is_array($arProperty["DISPLAY_VALUE"])) : ?>
								<?= implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]); ?>
							<? else : ?>
								<?= $arProperty["DISPLAY_VALUE"]; ?>
							<? endif ?>
						</small><br />
					<? endforeach; ?>
				</div>
			</div>
		</div>
	<? endforeach; ?>
<? if ($arParams["DISPLAY_BOTTOM_PAGER"]) : ?>
	<br /><?= $arResult["NAV_STRING"] ?>
<? endif; ?>
