<?php
/* Set the error reporting. */
error_reporting(0);

/* Start output buffer. */
ob_start();

/* Define the run mode as front. */
define('RUN_MODE', 'api');

/* Load the framework. */
include '../framework/router.class.php';
include '../framework/control.class.php';
include '../framework/model.class.php';
include '../framework/helper.class.php';

/* Log the time and define the run mode. */
$startTime = getTime();

/* Instance the app. */
$app = router::createApp('sys');

/* Run the app. */
$common = $app->loadCommon();

/* Check entry. */
$common->checkEntry();

/* Set default params. */
$config->requestType   = 'GET';
$config->default->view = 'json';

$app->parseRequest();
$common->checkPriv();
$app->loadModule();

$output = json_decode(ob_get_clean());
$data   = new stdClass();
$data->status = isset($output->status) ? $output->status : $output->result;
if(isset($output->message)) $data->message = $output->message;
if(isset($output->data))    $data->data    = json_decode($output->data);
$output = json_encode($data);

unset($_SESSION['entryCode']);
unset($_SESSION['validEntry']);

/* Flush the buffer. */
echo helper::removeUTF8Bom($output);
