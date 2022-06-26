<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"BOLD_TITLE" => array(
			"PARENT" => "BASE",
			"NAME" => GetMessage("BOLD_TITLE"),
			"TYPE" => "LIST",
			"VALUES" => [
                'Y' => 'Да',
                'N' => 'Нет'
            ],
			"DEFAULT" => '={$_REQUEST["ID"]}',
		),
		
	),
);

