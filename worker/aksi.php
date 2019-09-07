<?php
include "proses.php";
$p = new pekerja();
if (isset($_GET['aksi'])) {
    $url = $_GET['aksi'];
    if ($url == 'addworker') {
        $p->addworker($_POST['name'], $_POST['work'], $_POST['salary']);
    } elseif ($url == 'update') {
        $p->updateworker($_POST['id'], $_POST['name'], $_POST['work'], $_POST['salary']);
    } elseif ($url == 'delete') {
        $p->delete($_GET['id']);
    }
}
