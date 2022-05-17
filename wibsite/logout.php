<?php
require_once 'controller/Auth.php';
(new Auth())->logout();
header('Location:login.php');