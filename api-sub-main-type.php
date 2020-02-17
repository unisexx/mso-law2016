<?php
include_once 'include/config.inc.php';
try {
    $db = new Conf();
    $pdo = new PDO("mysql:dbname=".$db->db.";host=".$db->host, $db->user, $db->pass);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $pdo->exec("set names utf8");

    $statement = $pdo->prepare("select id,
    case
    when substr(typeName, locate('\"th\":', typeName)+6, locate('\",\"', typeName, locate('\"th\":', typeName)) - locate('\"th\":', typeName) - 6) <> ''
    then substr(typeName, locate('\"th\":', typeName)+6, locate('\",\"', typeName, locate('\"th\":', typeName)) - locate('\"th\":', typeName) - 6)
    else typeName
    end as title
    from law_submaintypes where mt_id = :main_id order by id");
    $statement->bindParam(':main_id', $_GET['main_id'], PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($results);

    header('Content-Type: text/html; charset=utf-8');
    echo $json;
}
catch(PDOException $e) {
    echo $e->getMessage();
}
