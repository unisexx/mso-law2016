<?php
session_start();

class Conf{
    var $host;
    var $db;
    var $user;
    var $pass;
    var $dbtype;
    var $port;
    var $tbl_top;
    var $tbl_bottom;
    var $MsgConnDB;
    function Conf(){
        $this->dbtype="mysql";
        $this->host = "127.0.0.1";
        $this->db = "law2016";
        $this->user = "lawdb";
        $this->pass = "lawpwd";
        $this->port = '';
        //$this->tbl_top = '';
        //$this->tbl_top = '';
    }
}
?>
