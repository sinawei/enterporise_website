<?php
//这个文件是老师的
include 'sql_autoload.php';

$db = new DBDriver();
$sql = 'select * from users';
// $db->query($sql);
$r = $db->get_results_recods($sql,true);
var_dump($r);
exit;
// echo '<hr/>';
// echo '名字是：' . $r['name'],'<br/>';
// echo '密码是：' . $r['password'];
echo '<hr/>';
$name = '李小龙';
$sql = 'delete from users where name = "' . $name . '"';
$db->exec($sql);


// $name = $_POST['name'];		//$name是"业成""
$sql = 'insert into users (name,password,intro) values ("业成","lixiaolong","lixiaolong")';
$db->exec($sql);
$id = $db->lastInsertId();
echo 'id是：' . $id . '<br/>';
$sql = 'select name from users where id = "' . $id . '"';
$r = $db->get_results_recods($sql);
echo '欢迎你，' . $r['name'] . '!';
// var_dump($r);



