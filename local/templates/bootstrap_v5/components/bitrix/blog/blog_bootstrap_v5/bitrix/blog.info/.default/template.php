<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog"):
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
endif;
?>
<?
if(!empty($arResult))
{
	if(!empty($arResult["CATEGORY"]))
	{
		?>
		<noindex>
			<div class="p-4">
				<h4 class="fst-italic"><?=GetMessage("BLOG_BLOG_TAG_CLOUD")?></h4>
				<!-- <ol class="list-unstyled mb-0">
					<li><a href="#">March 2021</a></li>
					<li><a href="#">February 2021</a></li>
					<li><a href="#">January 2021</a></li>
					<li><a href="#">December 2020</a></li>
					<li><a href="#">November 2020</a></li>
					<li><a href="#">October 2020</a></li>
					<li><a href="#">September 2020</a></li>
					<li><a href="#">August 2020</a></li>
					<li><a href="#">July 2020</a></li>
					<li><a href="#">June 2020</a></li>
					<li><a href="#">May 2020</a></li>
					<li><a href="#">April 2020</a></li>
				</ol> -->
				<div class="blog-tags-cloud" <?=$arParams["WIDTH"]?>>
					<?
					foreach($arResult["CATEGORY"] as $arCategory)
					{
						if($arCategory["SELECTED"]=="Y")
							echo "<b>";
						?><a href="<?=$arCategory["urlToCategory"]?>" title="<?GetMessage("BLOG_BLOG_BLOGINFO_CAT_VIEW")?>" style="font-size: <?=$arCategory["FONT_SIZE"]?>px;" rel="nofollow"><?=$arCategory["NAME"]?></a> <?
						if($arCategory["SELECTED"]=="Y")
								echo "</b>";
					}
				?></div>
			</div>
		</noindex>
		<?
	}
}
?>	
