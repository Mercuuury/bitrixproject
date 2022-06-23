<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Категория");
?><div class="row g-5">
	<div class="col-md-4">
		<div class="position-sticky" style="top: 2rem;">
			<div class="row card mb-3">
				<?$APPLICATION->IncludeComponent(
					"bitrix:catalog.smart.filter",
					"articles_bsv5",
					Array(
						"CACHE_GROUPS" => "Y",
						"CACHE_TIME" => "36000000",
						"CACHE_TYPE" => "A",
						"COMPOSITE_FRAME_MODE" => "A",
						"COMPOSITE_FRAME_TYPE" => "AUTO",
						"DISPLAY_ELEMENT_COUNT" => "Y",
						"FILTER_NAME" => "arrFilter",
						"FILTER_VIEW_MODE" => "vertical",
						"IBLOCK_ID" => "2",
						"IBLOCK_TYPE" => "materials",
						"PAGER_PARAMS_NAME" => "arrPager",
						"POPUP_POSITION" => "left",
						"PREFILTER_NAME" => "smartPreFilter",
						"SAVE_IN_SESSION" => "N",
						"SECTION_CODE" => "",
						"SECTION_DESCRIPTION" => "-",
						"SECTION_ID" => $_REQUEST["SECTION_ID"],
						"SECTION_TITLE" => "-",
						"SEF_MODE" => "N",
						"TEMPLATE_THEME" => "blue",
						"XML_EXPORT" => "N"
					)
				);?>
			</div>
		</div>
	</div>
	<div class="col-md-8 mb-0">
		<?$APPLICATION->IncludeComponent(
			"bitrix:breadcrumb",
			"",
		Array()
		);?>
		<?$APPLICATION->IncludeComponent("bitrix:catalog.section", "articles_bsv5", Array(
			"ACTION_VARIABLE" => "action",	// Название переменной, в которой передается действие
			"ADD_PICT_PROP" => "-",
			"ADD_PROPERTIES_TO_BASKET" => "Y",	// Добавлять в корзину свойства товаров и предложений
			"ADD_SECTIONS_CHAIN" => "Y",	// Включать раздел в цепочку навигации
			"AJAX_MODE" => "N",	// Включить режим AJAX
			"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
			"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
			"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
			"AJAX_OPTION_STYLE" => "Y",	// Включить подгрузку стилей
			"BACKGROUND_IMAGE" => "-",	// Установить фоновую картинку для шаблона из свойства
			"BASKET_URL" => "/personal/basket.php",	// URL, ведущий на страницу с корзиной покупателя
			"BROWSER_TITLE" => "-",	// Установить заголовок окна браузера из свойства
			"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_TYPE" => "A",	// Тип кеширования
			"COMPATIBLE_MODE" => "Y",	// Включить режим совместимости
			"COMPONENT_TEMPLATE" => "board",
			"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
			"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
			"DETAIL_URL" => "",	// URL, ведущий на страницу с содержимым элемента раздела
			"DISABLE_INIT_JS_IN_COMPONENT" => "N",	// Не подключать js-библиотеки в компоненте
			"DISPLAY_BOTTOM_PAGER" => "Y",	// Выводить под списком
			"DISPLAY_COMPARE" => "N",	// Разрешить сравнение товаров
			"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
			"ELEMENT_SORT_FIELD" => "PUBLIC_DATE",	// По какому полю сортируем элементы
			"ELEMENT_SORT_FIELD2" => "id",	// Поле для второй сортировки элементов
			"ELEMENT_SORT_ORDER" => "desc",	// Порядок сортировки элементов
			"ELEMENT_SORT_ORDER2" => "desc",	// Порядок второй сортировки элементов
			"ENLARGE_PRODUCT" => "STRICT",
			"FILTER_NAME" => "arrFilter",	// Имя массива со значениями фильтра для фильтрации элементов
			"IBLOCK_ID" => "2",	// Инфоблок
			"IBLOCK_TYPE" => "materials",	// Тип инфоблока
			"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
			"LABEL_PROP" => "",
			"LAZY_LOAD" => "N",
			"LINE_ELEMENT_COUNT" => "3",	// Количество элементов выводимых в одной строке таблицы
			"LOAD_ON_SCROLL" => "N",
			"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
			"MESS_BTN_ADD_TO_BASKET" => "В корзину",
			"MESS_BTN_BUY" => "Купить",
			"MESS_BTN_DETAIL" => "Подробнее",
			"MESS_BTN_LAZY_LOAD" => "Показать ещё",
			"MESS_BTN_SUBSCRIBE" => "Подписаться",
			"MESS_NOT_AVAILABLE" => "Нет в наличии",
			"META_DESCRIPTION" => "-",	// Установить описание страницы из свойства
			"META_KEYWORDS" => "-",	// Установить ключевые слова страницы из свойства
			"OFFERS_LIMIT" => "5",	// Максимальное количество предложений для показа (0 - все)
			"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
			"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
			"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
			"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
			"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
			"PAGER_TITLE" => "Товары",	// Название категорий
			"PAGE_ELEMENT_COUNT" => "18",	// Количество элементов на странице
			"PARTIAL_PRODUCT_PROPERTIES" => "N",	// Разрешить добавлять в корзину товары, у которых заполнены не все характеристики
			"PRICE_CODE" => "",	// Тип цены
			"PRICE_VAT_INCLUDE" => "Y",	// Включать НДС в цену
			"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
			"PRODUCT_ID_VARIABLE" => "id",	// Название переменной, в которой передается код товара для покупки
			"PRODUCT_PROPS_VARIABLE" => "prop",	// Название переменной, в которой передаются характеристики товара
			"PRODUCT_QUANTITY_VARIABLE" => "quantity",	// Название переменной, в которой передается количество товара
			"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
			"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
			"RCM_TYPE" => "personal",
			"SECTION_CODE" => $_REQUEST["SECTION_CODE"],	// Код раздела
			"SECTION_CODE_PATH" => "",	// Путь из символьных кодов раздела
			"SECTION_ID" => "",	// ID раздела
			"SECTION_ID_VARIABLE" => "",	// Название переменной, в которой передается код группы
			"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
			"SECTION_USER_FIELDS" => array(	// Свойства раздела
				0 => "",
				1 => "",
			),
			"SEF_MODE" => "Y",	// Включить поддержку ЧПУ
			"SEF_RULE" => "#SECTION_CODE#",	// Правило для обработки
			"SET_BROWSER_TITLE" => "Y",	// Устанавливать заголовок окна браузера
			"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
			"SET_META_DESCRIPTION" => "Y",	// Устанавливать описание страницы
			"SET_META_KEYWORDS" => "Y",	// Устанавливать ключевые слова страницы
			"SET_STATUS_404" => "N",	// Устанавливать статус 404
			"SET_TITLE" => "Y",	// Устанавливать заголовок страницы
			"SHOW_404" => "N",	// Показ специальной страницы
			"SHOW_ALL_WO_SECTION" => "N",	// Показывать все элементы, если не указан раздел
			"SHOW_FROM_SECTION" => "N",
			"SHOW_PRICE_COUNT" => "1",	// Выводить цены для количества
			"SHOW_SLIDER" => "Y",
			"SLIDER_INTERVAL" => "3000",
			"SLIDER_PROGRESS" => "N",
			"TEMPLATE_THEME" => "blue",
			"USE_ENHANCED_ECOMMERCE" => "N",
			"USE_MAIN_ELEMENT_SECTION" => "N",	// Использовать основной раздел для показа элемента
			"USE_PRICE_COUNT" => "N",	// Использовать вывод цен с диапазонами
			"USE_PRODUCT_QUANTITY" => "N",	// Разрешить указание количества товара
			),
			false
		);?>
	</div>
</div>
<br><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>