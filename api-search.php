<?php
//include_once 'common.php';
define('TEMP_LAW','temp_law');
define('LAW_DATALAW','law_datalaws');
define('LAW_GROUP','law_groups');
define('LAW_MAINTYPE','law_maintypes');
define('LAW_SUBMAINTYPE','law_submaintypes');
define('LAW_CATEGORY','law_category');
define('LAW_TYPE','law_types');
define('LAW_OPTION','law_option');
define('LAW_OVSK','law_overlap_or_skip');
define('LAW_OPTIONFILE','law_optionfile');
define('LAW_OPTIONINLAW','law_optioninlaw');
define('LAW_VERSION','law_version');
define('LAW_DOWNLOAD','law_downloads');
define('LAW_LOG','law_log');
define('LAW_SEARCHLOG','law_searchlog');
define('LAW_POLL','law_poll');
define('USER_LOG','user_log');
define('LAW_ALERT','law_alert');
define('LAW_QUIZ','law_quiz');
define('LAW_ANSWER','law_answer');
define('LAW_OPINION','law_opinion');
define('LAW_OPINIONTITLE','law_opiniontitle');
define('LAW_RESOLUTION','law_resolution');
define('LAW_COMMITTEE','law_committee');
define('LAW_COMMITTEE_TYPE','law_committee_type');
define('LAW_PRIVILEGE','law_privilege');
define('LAW_LINK_PRIVILEGE','law_link_privilege');
define('LAW_PLAN','law_plan');
include "include/config.inc.php";
include "include/class.db.php";
include "include/class.serach.php";
try {
    $db = new Conf();
    $pdo = new PDO("mysql:dbname=".$db->db.";host=".$db->host, $db->user, $db->pass);
    //$pdo = new PDO("mysql:dbname=".$db['mso']['database'].";host=".$db['mso']['hostname'], $db['mso']['username'], $db['mso']['password']);
    $pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $pdo->exec("set names utf8");

    $keyword = str_replace("\\",  "", $_GET['keyword']);
    if(!empty($_GET['session_id']) && !empty($_GET['ip'])) {
        $session_id = $_GET['session_id'];
        $ip = $_GET['ip'];
    } else {
        $session_id = session_id();
        $ip = $_SERVER['REMOTE_ADDR'];

        // Save log
        $_SESSION['v_user'] = 1;
        $user = 1;
        $searchTime = date("Y-m-d H-i-s");
        $log = $pdo->prepare("insert into law_searchlog (keyword, keytime, keyuser, ip, created) values (:keyword, :datetime, :user, :ip, :created)");
        $log->bindParam(':keyword', $keyword, PDO::PARAM_STR);
        $log->bindParam(':datetime', $searchTime, PDO::PARAM_STR);
        $log->bindParam(':user', $user);
        $log->bindParam(':ip', $ip, PDO::PARAM_STR);
        $log->bindParam(':created', $searchTime, PDO::PARAM_STR);
        $log->execute();

        // fulltext search
        $cSerach = new serach();
        $cSerach->searchT($keyword,"doSearch_7");
        $_SESSION['Cookies']= $cSerach->getCookies();
    }

    // count all items
    $sql = "select count(*) as total
    from (
    	select sourcecode
    	from temp_law
        where session_id = :session_id
    	and ip = :ip
    	and keyword = :keyword
    ) t,
    (
    	select ref_code
    	from law_datalaws l
    	-- join law_groups on law_groups.id = l.law_group_id
    	-- join law_types on law_types.id = l.law_type_id
    	-- join law_maintypes on law_maintypes.id = l.law_maintype_id
    	-- join law_submaintypes on law_submaintypes.id = l.law_submaintype_id
    	where l.status <> 2
    ) l
    where trim(t.sourcecode) = l.ref_code ";
    $counter = $pdo->prepare($sql);
    $counter->bindParam(':session_id', $session_id, PDO::PARAM_STR);
    $counter->bindParam(':ip', $ip, PDO::PARAM_STR);
    $counter->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $counter->execute();
    $total = $counter->fetchColumn();

    // query data
    $offset = 0;
    $limit = 20;
    $page = empty($_GET['page']) ? 1 : $_GET['page'];
    $offset = ($limit * $page) - $limit;
    $sql = "select l.name_th as title_th, l.name_eng as title_en, l.filename_th, l.filename_eng,
    group_title,
    -- category_title,
    type_title,
    subtype_title,
    case
when SUBSTR(category_title, LOCATE('\"th\":', category_title)+6, LOCATE('\",\"',category_title, LOCATE('\"th\":', category_title))-LOCATE('\"th\":',category_title)-6) <> \"\"
then SUBSTR(category_title, LOCATE('\"th\":', category_title)+6, LOCATE('\",\"',category_title, LOCATE('\"th\":', category_title))-LOCATE('\"th\":',category_title)-6)
else category_title
end as category_title
    from (
    	select sourcecode, headline from temp_law
    	where session_id = :session_id
    	and ip = :ip
    	and keyword = :keyword
    ) t,
    (
    	select
    	l.name_th, l.name_eng, l.filename_th, l.filename_eng, ref_code, l.import_code, l.law_group_id, l.law_maintype_id, length(l.law_submaintype_id) ,l.law_submaintype_id,
    	law_groups.`name` as group_title,
    	law_types.`name` as category_title,
    	law_maintypes.typeName as type_title,
    	law_submaintypes.typeName as subtype_title
    	from law_datalaws l
        join law_groups on law_groups.id = l.law_group_id
    	join law_types on law_types.id = l.law_type_id
    	join law_maintypes on law_maintypes.id = l.law_maintype_id
    	join law_submaintypes on law_submaintypes.id = l.law_submaintype_id
    	where l.status <> 2
    ) l
    where t.sourcecode = l.ref_code
    order by l.import_code, l.law_group_id, l.law_maintype_id, length(l.law_submaintype_id) ,l.law_submaintype_id,t.headline
    asc limit $offset, $limit";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':session_id', $session_id, PDO::PARAM_STR);
    $statement->bindParam(':ip', $ip, PDO::PARAM_STR);
    $statement->bindParam(':keyword', $keyword, PDO::PARAM_STR);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);

    $data = array();
    $data['total'] = $total;
    $data['total_page'] = ceil($total/$limit);
    $data['page'] = $page;
    $data['session_id'] = $session_id;
    $data['ip'] = $ip;
    $data['keyword'] = $keyword;
    $data['items'] = $results;

    header('Content-Type: text/html; charset=utf-8');
    echo json_encode($data);
}
catch(PDOException $e) {
    echo $e->getMessage();
}
