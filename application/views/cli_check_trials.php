<?php
// cli_check_trials.php

// Set the base path for CodeIgniter
define('BASEPATH', __DIR__ . '/');

// Load CodeIgniter's index.php file
require_once 'index.php';

// Load the necessary controller and execute the method
$controller = new TrialController();
$controller->checkTrialExpiration();
