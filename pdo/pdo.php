<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-pdo.css">
</head>
<body>
    <h1>資料庫連線</h1>
    <?php
$dsn= "mysql:host=localhost;charset=utf8;dbname=school";
$pdo=new PDO($dsn,'root','');

$sql="select * from classes";

$rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>

<table>
    <tr>
        <td>序號</td>
        <td>班級</td>
        <td>導師</td>
    </tr>


<?php
foreach($rows as $row){
?>


<tr>
<td><?=$row['id'];?></td>
<td>
    <a href="classes_detail.php">
    <?=$row['name'];?></a>
</td>
<td><?=$row['tutor'];?></td>
</tr>




<?php
}


// echo $rows[0]['tutor'];

/*echo"<pre>";
print_r($rows);
echo "</pre>";
*/


?>

</table>

    
</body>
</html>