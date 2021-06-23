<?php
$name = $_POST["name"];
$kansou = $_POST["kansou"];
$date = $_POST["date"];

try {
    $pdo = new PDO('mysql:dbname=movie_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

$kiki = $pdo->prepare("INSERT INTO movie_table(id, name, kansou, date)VALUES(NULL, :name, :kansou, :date)");
$kiki->bindValue(':name', $name, PDO::PARAM_STR);  
$kiki->bindValue(':kanosu', $kansou, PDO::PARAM_STR);  
$kiki->bindValue(':date', $date, PDO::PARAM_STR);


$jiji = $kiki->execute();

if($jiji==false){
    $error = $kiki->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    header("Location: select.php");
    exit;
}

?>