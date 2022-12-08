<?php

require_once('../classes/Aluno.php');

if(!isset($_GET['ra']) or !is_numeric($_GET['ra'])){
    header('location: dashboard.php');
    exit;
}

$aluno = Aluno::getAlunos($_GET['ra']);
