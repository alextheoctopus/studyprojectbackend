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
			case 'joinArrival': return true;		//� ������� ��������� ����� � ������������� ������, � ����� ������� ����� �������
			//����� ����������� ���������� ������� ����� ������ racer � ������� racers � ������� ��� ������ ������ � ���� ����-id
			//������: �� ������ �������� �����, � ���� ������ ����-id
			//����� ��� �������� ������, � ������� ����� ������������ ��� ���, � ���������� ����, ���� ���� �����������
			//���� �� ���, �� ������� ����� �����

			//������� ��������: 'open'/'close'/'racing'	- ��� ���� ������ racers

			case 'isArrivalReady': return true;		//������������ �������� ������ �� ������: ����� �� �����
			//��� racer ��������� � ������ arrival - racing

			/*about race*/
			case 'getRace': return true;			//��������� ������ � ������ (..?)
			case 'getRacers': return true;			//��������� ������ � ������ (��������� �������); ��������� ������� ������� ��������� �����
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