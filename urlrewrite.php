<?php
$arUrlRewrite=array (
  4 => 
  array (
    'CONDITION' => '#^/articles/([\\w\\d\\-]+)/([\\w\\d\\-]+)(\\?(.*))?#',
    'RULE' => 'SECTION_CODE=$1&ELEMENT_CODE=$2',
    'ID' => '',
    'PATH' => '/articles/detail.php',
    'SORT' => 100,
  ),
  5 => 
  array (
    'CONDITION' => '#^/articles/([\\w\\d\\-]+)(\\?(.*))?#',
    'RULE' => 'SECTION_CODE=$1',
    'ID' => '',
    'PATH' => '/articles/section.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^([^/]+?)\\??(.*)#',
    'RULE' => 'SECTION_CODE=$1&$2',
    'ID' => 'bitrix:catalog.section',
    'PATH' => '/articles/section.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/blogs/#',
    'RULE' => '',
    'ID' => 'bitrix:blog',
    'PATH' => '/blogs/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/news/#',
    'RULE' => '',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
