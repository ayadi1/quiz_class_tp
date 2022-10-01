<?php
session_start();

require_once '../controllers/LogoutController.php';

LogoutController::logout();