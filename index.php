<?php
session_start();

require 'vendor/autoload.php';

$dataSourcePath = __DIR__ . DIRECTORY_SEPARATOR . 'resources' . DIRECTORY_SEPARATOR;

$data = new App\JsonData( $dataSourcePath );

$game = new App\Game( $data );

$game->spin();