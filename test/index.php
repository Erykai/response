<?php
use Erykai\Response\Response;
require "test/config.php";
require "vendor/autoload.php";
$response = new Response();

$data = new stdClass();
$data->code = 200;
$data->type = 'success';
$data->message = "hello my name is alex vidal and my email is webav.com.br@gmail.com";
$data->data = null;
$data->dynamic = "alexvidal@as.com";

echo $response->data($data)->json();
//echo $response->data($data)->lang()->json();
//var_dump($response->data($data)->object());
//var_dump($response->data($data)->array());
//var_dump($response->data($data)->lang('es')->object());