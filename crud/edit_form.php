<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員資料編輯</title>
    <style>
        h1{
            text-align:center;
        }
        form{
            width: 380px;
            margin: 20px auto;
            border:0.1em solid rgba(0,0,0,0.1);
            box-shadow:0.7px 1px 5px rgba(0,0,0,0.1);
            padding: 20px;
            padding-left: 40px;
            border: 1px solid #ccc;
            border-radius: 10px;

            
        }
        form label{
            display:inline-block;
            width: 80px;
            text-align-last:justify;
        }
        form input[type=text],
        form input[type=password],
        form input[type=date],
        form input[type=number]
        {
            padding:5px;
            font-size:15px;
            margin:5px;
            border:0px;
            border-bottom:1px solid #ccc;
        }
        form input[type=submit],
        form input[type=reset]
        {
            padding:5px;
            font-size:14px;
            background-color:#DCF2F6;
            border-radius:5px;
            border:1px solid #eee;
            margin:10px 10px;
        }

        form input[type=submit]:hover,
        form input[type=reset]:hover
        {
            padding:6px;
            font-size:15px;
            background-color:#ccc;
        
        }

        form input[type=reset]{
            background-color:#DCF2F6;
        }

        form div:nth-child(5){
            text-align:center;
        }
        
    </style>
</head>

<body>

<?php

if(isset($_GET['status'])){
    if ($_GET['status'] == 1) {
        echo "更新成功";
    } else {
        echo "更新失敗";
    }
}
?>

<?php
    $dsn="mysql:host=localhost;charset=utf8;dbname=crud";
    $pdo=new PDO($dsn,'root','');

    $mem=$pdo->query("select * from `member` where `id`='{$_GET['id']}'")->fetch(PDO::FETCH_ASSOC);

//     echo "<pre>";
// print_r($mem);
// echo "</pre>";
    ?>

    <fieldset class="login-container">
    <?php
    if(!isset($_COOKIE['login'])){
    ?>
        <div style="font-size:16px;">會員資料</div>

        <form action="edit.php" method="post">
        <div>
            <label for="">帳號：</label>
            <input type="text" name="acc" value="<?=$mem['acc'];?>">
        </div>
        <div>
            <label for="">密碼：</label>
            <input type="password" name="pw" value="<?=$mem['pw'];?>">
        </div>
        <div>
            <label for="">電子郵件：</label>
            <input type="text" name="email" value="<?=$mem['email'];?>">
        </div>
        <div>
            <label for="">電話：</label>
            <input type="text" name="tel" value="<?=$mem['tel'];?>">
        </div>
        <div>
            <input type="hidden" name="id" value="<?=$mem['id'];?>">
            <input type="submit" value="編輯">
            <input type="reset" value="重置">
        </div>

        </form>
        <?php
}else{
?>
        <div>
            你已登入
        </div>
<?php
}
?>

    </fieldset>

</body>

</html>