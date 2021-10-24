<?php
error_reporting(-1);
header('Content-Type: application/json; charset=utf-8');
require_once('application/app.php');


function router($params) {
	$method = $params['method'];
	if ($method) {
		$app = new Application();
		switch ($method) {
			case 'login': return $app->loginMethod($params);
			case 'logout': return $app->logout($params);
		}
	}
	return false;
}

function answer($data) {
	if ($data) {
		return array(
			'result' => 'ok',
			'data' => $data
		);
	}
	return array('result'=>'error');
}

echo json_encode(answer(router($_GET)));