<?php

function query($sql) {
    $pdo = new PDO('mysql:host=localhost; charset=utf8; dbname=c9', 'root', '');
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
    //pre($sql);
    if (stripos($sql,'insert')!== false)
    {
        $stmt = $pdo->query($sql);
        $rt = $pdo->lastInsertId();
        return $rt;
    }

else {
        $stmt = $pdo->query($sql);
        //echo("about to run fetchall after executing $sql<br />");
        $rt= $stmt->fetchAll();
        return $rt;
    } 
    
    return [];
}

function sqlBuildSelect($table, $fields = [])
{
    if(empty($fields)) {
        $fields = '*';
    }
    else {
        $fields = '`'.implode('`,`', $fields).'`';
    }
    
    $sql = "SELECT $fields FROM `$table` ";
    return $sql;
}

function sqlBuildDelete($table)
{
    return "DELETE FROM `$table` ";
}

function sqlBuildInsert($table, $pairs)
{
    $fields = array_keys($pairs);
    $values = array_values($pairs);
    
    $fields = '`'.implode('`,`', $fields).'`';
    $values = "'".implode("','", $values)."'";

    return "INSERT INTO `$table` ($fields) VALUES ($values) ";
}

function sqlBuildUpdate($table, $pairs)
{
    $update = [];
    foreach ($pairs as $k => $v) {
        $update[] = "`$k`='$v'";
    }
    
    $update = implode(',', $update);
    return "UPDATE `$table` SET $update ";
}

function sqlBuildWhere($pairs, $method = 'AND')
{
    $where = [];
    $method = trim($method);
    $method = " $method ";
    
    foreach ($pairs as $k => $v) {
        $where[] = "`$k`='$v'";
    }
    
    return "WHERE ".implode($method, $where);
}

function pre($arr) {
    ?><pre><?php print_r($arr); ?></pre><?php
}

 function is_login()
{
    if  ($_SESSION['login'] === 'yes'){
    return true; }
}

function is_admin()
{
    if ($_SESSION['type'] === 'admin') {
        return true;}
}
?>