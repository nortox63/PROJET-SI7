<?php
session_start();
ini_set('display_errors', 'on');
error_reporting(E_ALL);
include_once 'base.php';
$pdo = PdoBD::getPdoBD();
if ( isset($_GET['uc']) && $_GET['uc']!='' ) {
    $uc = $_GET['uc'];
    switch ($uc) {
        case 'getTrucs' :
            echo json_encode($pdo->getTrucs());
            break;
        case 'addTruc' :
            $libTruc = $_GET['libTruc'];
            echo $pdo->addTruc($libTruc);
            break;
        case 'delTruc' :
            $idTruc = $_GET['idTruc'];
            echo $pdo->delTruc($idTruc);
            break;
        case 'updateTruc':
            $idTruc = $_GET['idTruc'];
            $libTruc = $_GET['libTruc'];
            echo $pdo->updateTruc($idTruc , $libTruc);
            break;
    }
}else{
    include_once 'descws.html';
}
?>