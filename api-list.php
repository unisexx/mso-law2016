<?php
include_once 'include/config.inc.php';
try {
    $db = new Conf();
    $pdo = new PDO("mysql:dbname=".$db->db.";host=".$db->host, $db->user, $db->pass);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $pdo->exec("set names utf8");

    //$statement = $pdo->prepare("select id, name_th as title, filename_th as filename from law_datalaw where category_id = :category_id and type_id = :type_id and subtype_id = :subtype_id order by id");
    $statement = $pdo->prepare("select id, name_th as title, filename_th as filename from law_datalaws
    where law_type_id = :category_id
    and law_maintype_id = :type_id
    and law_submaintype_id = :subtype_id
    order by id desc");
    $statement->bindParam(':category_id', $_GET['category_id'], PDO::PARAM_INT);
    $statement->bindParam(':type_id', $_GET['type_id'], PDO::PARAM_INT);
    $statement->bindParam(':subtype_id', $_GET['subtype_id'], PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);

    header('Content-Type: text/html; charset=utf-8');
    echo $json;
}
catch(PDOException $e) {
    echo $e->getMessage();
}
