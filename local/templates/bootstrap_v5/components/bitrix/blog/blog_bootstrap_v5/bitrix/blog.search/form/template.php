<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
endif;
?>
<div class="p-4">
	<h4 class="fst-italic"><?=GetMessage("BLOG_MAIN_SEARCH_SEARCH")?></h4>
	<form method="get" action="<?=$arParams["SEARCH_PAGE"]?>">
		<input type="hidden" name="<?=$arParams["PAGE_VAR"]?>" value="search">
		<div class="mb-3">
			<input class="form-control form-control-sm" type="text" name="q" size="15" value="<?=$arResult["q"]?>">
		</div>
		<div class="mb-3">
			<select class="form-select form-select-sm" name="where">
				<?foreach($arResult["WHERE"] as $k => $v)
				{
					?><option value="<?=$k?>"<?=$k==$arResult["where"]?" selected":""?>><?=$v?></option><?
				}
				?>
			</select>
		</div>
		<input type="submit" class="btn btn-primary" value="<?=GetMessage("BLOG_SEARCH_BUTTON")?>">
		<?if($arResult["how"]=="d"):?>
			<input type="hidden" name="how" value="d">
		<?endif;?>
	</form>
</div>


