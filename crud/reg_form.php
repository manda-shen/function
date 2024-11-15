
<?php

// if(!empty($_POST['acc'])){
//     print_r($_POST);
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
<div>
    <?php
    if (isset($_GET['status'])) {
        if ($_GET['status'] == 1) {
            echo "註冊成功";
        } else {
            echo "註冊失敗";
        }
    }
    ?>
</div>


    <h1>會員註冊</h1>
<!-- form:post>(label+input:text)*4+div>input:submit+input:reset -->
    <form action="reg.php" method="post">
        <div>
            <label for="">帳號：</label>
            <input type="text" name="acc" id="">
        </div>
        <div>
            <label for="">密碼：</label>
            <input type="password" name="pw" id="">
        </div>
        <div>
            <label for="">電子郵件：</label>
            <input type="text" name="email" id="">
        </div>
        <div>
            <label for="">電話：</label>
            <input type="text" name="tel" id="">
        </div>
        <div>
            <input type="submit" value="註冊">
            <input type="reset" value="重置">
        </div>
    </form>
</body>
</html>