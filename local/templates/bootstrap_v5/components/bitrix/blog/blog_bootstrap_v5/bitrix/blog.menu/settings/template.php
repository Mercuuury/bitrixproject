<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
if (!$this->__component->__parent || empty($this->__component->__parent->__name) || $this->__component->__parent->__name != "bitrix:blog") :
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/style.css');
	$GLOBALS['APPLICATION']->SetAdditionalCSS('/bitrix/components/bitrix/blog/templates/.default/themes/blue/style.css');
endif;
?>
<?
if ($arResult["urlToNewPost"] <> '' || $arResult["urlToBecomeFriend"] <> '' || $arResult["urlToAddFriend"] <> '') {
?>
	<div class="p-4">
		<h4 class="fst-italic"><?= GetMessage("BLOG_MENU_TITLE")?></h4>
		<ol class="list-unstyled mb-0">
			<?
			if ($arResult["urlToNewPost"] <> '') {
			?>
				<li><a href="<?= $arResult["urlToNewPost"] ?>" title="<?= GetMessage("BLOG_MENU_ADD_MESSAGE_TITLE") ?>"><?= GetMessage("BLOG_MENU_ADD_MESSAGE") ?></a></li>
			<?
			}

			if ($arResult["urlToDraft"] <> '') {
			?>
				<li><a href="<?= $arResult["urlToDraft"] ?>" title="<?= GetMessage("BLOG_MENU_DRAFT_MESSAGES_TITLE") ?>"><?= GetMessage("BLOG_MENU_DRAFT_MESSAGES") ?><? if (intval($arResult["CntToDraft"]) > 0) echo " (" . $arResult["CntToDraft"] . ")" ?></a></li>

			<?
			}
			if ($arResult["urlToModeration"] <> '' && intval($arResult["CntToModerate"]) > 0) {
			?>
				<li><a href="<?= $arResult["urlToModeration"] ?>" title="<?= GetMessage("BLOG_MENU_MODERATION_MESSAGES_TITLE") ?>"><?= GetMessage("BLOG_MENU_MODERATION_MESSAGES") ?><? if (intval($arResult["CntToModerate"]) > 0) echo " (" . $arResult["CntToModerate"] . ")" ?></a></li>

			<?
			}
			if ($arResult["urlToFriends"] <> '') {
			?>
				<li><a href="<?= $arResult["urlToFriends"] ?>" title="<?= GetMessage("BLOG_MENU_FRIENDS_TITLE") ?>"><?= GetMessage("BLOG_MENU_FRIENDS") ?></a></li>
			<?
			}

			if ($arResult["urlToBecomeFriend"] <> '') {
			?>
				<li><a href="<?= $arResult["urlToBecomeFriend"] ?>" title="<?= GetMessage("BLOG_MENU_FR_B_F") ?>"><?= GetMessage("BLOG_MENU_FR_B_F") ?></a></li>
			<?
			}
			if ($arResult["urlToAddFriend"] <> '') {
			?>
				<li><a href="<?= $arResult["urlToAddFriend"] ?>" title="<?= GetMessage("BLOG_MENU_FR_A_F") ?>"><?= GetMessage("BLOG_MENU_FR_A_F") ?></a></li>
			<?
			}
			if ($arResult["urlToBlogEdit"] <> '') {
			?>
				<li><a href="<?= $arResult["urlToBlogEdit"] ?>" title="<?= GetMessage("BLOG_MENU_SETTINGS_TITLE") ?>"><?= GetMessage("BLOG_MENU_SETTINGS") ?></a></li>
			<?
			}
			?>
		</ol>
	</div>
<?
}
