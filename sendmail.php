<?php 
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'phpmailer/src/Exception.php';
	require 'phpmailer/src/PHPMailer.php';

	$mail = new PHPMailer(true);
	$mail->CharSet = 'UTF-8';
	$mail->seltLanguage('ru', 'phpmailer/language/');
	$mail->IsHTML(true);

	//От кого письмо
	$mail->setForm('askerboziev9@gmail.com' 'Пациент')
	//Кому отправлять
	$mail->addAddress('askerboziev2003@gmail.com')
	//Тема письма
	$mail->Subject = 'Пациент';

	//Тело письма
	$body = '<h1>вы получили письмо от пациента!</h1>';

	if(trim(!empty($_POST['surname']))){
		$body.= '<p><strong>Фамилия:</strong> '.$_POST['surname'].'</p>';
	}
	if(trim(!empty($_POST['name']))){
		$body.= '<p><strong>Имя:</strong> '.$_POST['name'].'</p>';
	}
	if(trim(!empty($_POST['patronymic']))){
		$body.= '<p><strong>Отчество:</strong> '.$_POST['patronymic'].'</p>';
	}
	if(trim(!empty($_POST['telephonenumber']))){
		$body.= '<p><strong>Номер телефона:</strong> '.$_POST['telephonenumber'].'</p>';
	}
	if(trim(!empty($_POST['email']))){
		$body.= '<p><strong>E-mail:</strong> '.$_POST['email'].'</p>';
	}
		if(trim(!empty($_POST['speciality']))){
		$body.= '<p><strong>Специальность:</strong> '.$_POST['speciality'].'</p>';
	}
		if(trim(!empty($_POST['specialist']))){
		$body.= '<p><strong>Специалист:</strong> '.$_POST['specialist'].'</p>';
	}
		if(trim(!empty($_POST['date']))){
		$body.= '<p><strong>Выберите дату:</strong> '.$_POST['date'].'</p>';
	}
		if(trim(!empty($_POST['time']))){
		$body.= '<p><strong>Выберите  время:</strong> '.$_POST['time'].'</p>';
	}
		if(trim(!empty($_POST['message']))){
		$body.= '<p><strong>Сообщение:</strong> '.$_POST['message'].'</p>';
	}

	//Отправвляем
	if (!$mail->send()){
		$message = 'Ошибка'ж
	}else {
		$message = 'Данные отправленны!'
	}

	$response = ['message' => $message];

	header('Content-type: application/json');
	echo json_encode($response);
?>