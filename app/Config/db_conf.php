<?php
$config = Dbconnect::instance();
$config->set(array(
    'host' => 'ovl.io',
    'user' => 'trem200',
    'pass' => 'A4511223746a',
    'name' => 'trem200'
));
$config->connect();

unset($config);