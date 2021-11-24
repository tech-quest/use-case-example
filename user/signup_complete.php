<?php
require_once(__DIR__ . '/../dao/UserDao.php');
require_once(__DIR__ . '/../utils/redirect.php');
require_once(__DIR__ . '/../UseCase/UseCaseInput/SignUpInput.php');
require_once(__DIR__ . '/../UseCase/UseCaseInteractor/SignUpInteractor.php');

$userName = filter_input(INPUT_POST, 'userName');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
$confirmPassword = filter_input(INPUT_POST, 'confirmPassword');

session_start();
if (empty($password) || empty($confirmPassword)) $_SESSION['errors'][] = "パスワードを入力してください";
if ($password !== $confirmPassword) $_SESSION['errors'][] = "パスワードが一致しません";

if (!empty($_SESSION['errors'])) {
  $_SESSION['user']['name'] = $userName;
  $_SESSION['user']['email'] = $email;
  redirect('./signup.php');
}

$useCaseInput = new SignUpInput($userName, $email, $password);
$useCase = new SignUpInteractor($useCaseInput);
$useCaseOutput = $useCase->handler();

if ($useCaseOutput->isSuccess()) {
  $_SESSION['message'] = $useCaseOutput->message();
  redirect('./signin.php');
}  else {
  $_SESSION['errors'][] = $useCaseOutput->message();
  redirect('./signup.php');
}