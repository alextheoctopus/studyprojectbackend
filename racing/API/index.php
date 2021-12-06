<?php
error_reporting(-1);
header('Content-Type: application/json; charset=utf-8');
require_once('application/app.php');


function router($params) {
	$method = $params['method'];
	if ($method) {
		$app = new Application();
		switch ($method) {
			case 'reg': return $app->regMethod($params);
			case 'login': return $app->loginMethod($params);
			case 'logout': return $app->logout($params);
			/*about arrival*/
			case 'getRaces': return $app->getRaces($params);
			case 'joinArrival': return true;		//с клиента присылаем токен и идентификатор трассы, в заезд которой хотим попасть
			//после авторизации необходимо создать новую запись racer в таблице racers и удалить все старые записи с этим юзер-id
			//бэкенд: по токену получаем юзера, у него узнаем юзер-id
			//взять все открытые заезды, в которых этого пользователя еще нет, и записаться туда, если есть возможность
			//если их нет, то создать новый заезд

			//статусы рэйсеров: 'open'/'close'/'racing'	- для базы данных racers

			case 'isArrivalReady': return true;		//периодически посылать запрос на сервер: готов ли заезд
			//все racer заполнены и статус arrival - racing

			/*about race*/
			case 'getRace': return true;			//получение данных о трассе (..?)
			case 'getRacers': return true;			//получение данных о трассе (положение машинок); изменение позиций машинок считается здесь
			case 'userCommand': return true;
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