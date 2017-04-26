<?php

require_once(__DIR__ .'/constants.php');
require_once(__DIR__ .'/functions.php');
require_once(__DIR__ .'/events.php');

CModule::AddAutoloadClasses(
    '',
    array(
        'ProductStickers' => '/local/php_interface/classes/ProductStickers.php',
        'Morpher' => '/local/php_interface/classes/Morpher.php',
    )
);