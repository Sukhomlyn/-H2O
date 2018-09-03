<?php

	$mysqli = new mysqli ("localhost", "root", "", "water"); //подключение к БД
	$mysqli->query ("SET NAMES 'utf8'");//установка кодировки

	/* проверка соединения */
	if ($mysqli->connect_errno) {
		printf("Соединение не удалось: %s\n", $mysqli->connect_error);
		exit();
	}

	$index = $_POST["consumers"];//значение по которому идет выборка из БД
	$resid = $_POST["resident"];//количество потребителей

	$query = "SELECT general,hot,coef,time FROM `table_a1_a2` WHERE id = '$index'";//получение данных с БД
	if ($result = $mysqli->query($query)){
		while ($row = $result->fetch_assoc()){
			global $general;
			$general = $row["general"];
			global $hot;
			$hot = $row["hot"];
			global $cold;
			$cold = $general - $hot;
			global $coefficient;
			$coefficient = $row['coef'];
			global $time;
			$time = $row['time'];
		}
		/* удаление выборки */
		$result->free();
	}
	/*закрыть таблицу*/
	$mysqli->close();
	/*расчет по удельным расходам*/
	$result = array();//массив отправляемый на клиент
	echo json_encode ($result);
	//л/доб Середні (за рік) витрати води за розрахунковий час споживання води
	$generalLD = $general * (int)$resid;
	$hotLD = $hot * (int)$resid;
	$coldLD = $cold * (int)$resid;
	//л/год Середні (за рік) витрати води за розрахунковий час споживання води(данные для получения коеффициента)
	$generalLH = $generalLD / $time;
	$hotLH = $hotLD / $time;
	$coldLH = $coldLD / $time;
	//∑QТ= Q/1000 м3/доб  Середні (за рік) добові витрати води за розрахунковий час споживання води
	$generalMD = $generalLD / 1000;
	$hotMD = $hotLD / 1000;
	$coldMD = $coldLD / 1000;
	//Максимальні добові витрати води:
	if($index >= 121){
		$generalMDmax = $generalMD * $coefficient;
		$hotMDmax = $hotMD * $coefficient;
		$coldMDmax = $coldMD * $coefficient;
	}
	//
	//Середні за годину розрахункові витрати,  м3/год
	$generalMH = $generalMD / $time;
	$hotMH = $hotMD / $time;
	$coldMH = $coldMD / $time;
?>
