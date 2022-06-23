<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
	.bs-news-list .card {
		transition: 0.5s;
	}
	.bs-news-list .card:hover {
		transform: scale(1.03);
	}
</style>
<div class="catalog-section">
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "tree", Array(
	"IBLOCK_TYPE"	=>	$arParams["IBLOCK_TYPE"],
	"IBLOCK_ID"	=>	$arParams["IBLOCK_ID"],
	"SECTION_ID"	=>	"0",
	"COUNT_ELEMENTS"	=>	"Y",
	"TOP_DEPTH"	=>	"2",
	"SECTION_URL"	=>	$arParams["SECTION_URL"],
	"CACHE_TYPE"	=>	"N",
	"CACHE_TIME"	=>	$arParams["CACHE_TIME"],
	"DISPLAY_PANEL"	=>	"N",
	"ADD_SECTIONS_CHAIN"	=>	$arParams["ADD_SECTIONS_CHAIN"],
	"SECTION_USER_FIELDS"	=>	$arParams["SECTION_USER_FIELDS"],
	),
	$component
);?>
</div>
<div class="catalog-section">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<div class="bs-news-list">
	<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		<div class="card mb-3" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="row g-0">
				<div class="col-md-7">
					<div class="card-body">
						<h5 class="card-title">
							<a class="stretched-link text-decoration-none text-dark" href="<?echo $arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
						</h5>
						<p class="card-text"><?=$arElement["PREVIEW_TEXT"]?></p>
						<p class="card-text"><small class="text-muted">
							<?
							$pub_date = '';
							if ($arElement["ACTIVE_FROM"])
								$pub_date = FormatDate($GLOBALS['DB']->DateFormatToPhp(CSite::GetDateFormat('SHORT')), MakeTimeStamp($arElement["ACTIVE_FROM"]));
							elseif ($arElement["DATE_CREATE"])
								$pub_date =  FormatDate($GLOBALS['DB']->DateFormatToPhp(CSite::GetDateFormat('SHORT')), MakeTimeStamp($arElement["DATE_CREATE"]));
							if ($pub_date)
								echo GetMessage('PUB_DATE').'&nbsp;'.$pub_date.'<br />';
							?>
							<?foreach($arElement["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
								echo $arProperty["NAME"].':&nbsp;';
								if(is_array($arProperty["DISPLAY_VALUE"]))
									echo implode("&nbsp;/&nbsp;", $arProperty["DISPLAY_VALUE"]);
								else
									echo $arProperty["DISPLAY_VALUE"];
								?><br />
							<?endforeach?>
						</small></p>
					</div>
				</div>
				<div class="col-md-5 overflow-hidden">
				<!-- image -->
				<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
					<img
						class="img d-block rounded-end"
						src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>"
						alt="<?=$arElement["PREVIEW_PICTURE"]["ALT"]?>"
						title="<?=$arElement["PREVIEW_PICTURE"]["TITLE"]?>"
						style="min-width:100px;
								max-width:none;
								height:240px;"
					/>
				<?endif?>
				<!-- end image -->
			</div>
			</div>
		</div>
	<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>
	<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
		<br /><?=$arResult["NAV_STRING"]?>
	<?endif;?>
</div>
