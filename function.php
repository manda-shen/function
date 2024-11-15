
<style>
    * {
        font-family:'courier new';
    }

</style>



<?php


function starts($line){
    for($i=0;$i<$line;$i++){
    
        for($k=0;$k<$line-1-$i;$k++){
            echo "&nbsp;";
        }
    
        for($j=0;$j<(2*$i+1);$j++){
            echo "*";
        }
        break;
    
    }
}

$dsn="mysql:host=localhost;charset=utf8;dbname=crud";
$pdo=new PDO($dsn,'root','');
/**
 * 建立資料庫的連線變數
 * @param string $db 資料庫名稱
 * @return object
 */
function pdo($db){
    $dsn="mysql:host=localhost;charset=utf8;dbname=$db";
    $pdo=new PDO($dsn,'root','');
    return $pdo;
}


/**
 * 回傳指定資料表的所有資料
 * @param string $table 資料表名稱
 * @return array
 */
function all($table){
    /* $pdo=pdo('crud'); */
    global $pdo;

    $sql="select * from $table";
    $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/**
 * 回傳指定資料表的特定ID的單筆資料
 * @param string $table 資料表名稱
 * @param integer $id || array $id 資料表ID
 * @return array
 */
function find($table,$id){
    
    global $pdo;

    if(is_array($id)){
        $tmp=[];
        foreach($id as $key => $value){
            //sprintf("`%s`='%s'",$key,$value);
            $tmp[]="`$key`='$value'";
        }
        $sql="select * from $table where ".join(" && ",$tmp);
        
    }else{
        $sql="select * from $table where id='$id'";
    }
    $row=$pdo->query($sql)->fetch(PDO::FETCH_ASSOC);

    return $row;
}


/**
 * 刪除指定條件的資料
 * @param string $table 資料表名稱
 * @param array $id 條件(數字或陣列)
 * @return boolean
 */

 function del($table ,$id){
    $pdo=$pdo=pdo('crud');

    if(is_array($id)){
        $tmp=[];
        foreach($id as $key => $value){
            //sprintf("`%s`='%s'",$key,$value);
            $tmp[]="`$key`='$value'";
        }
        $sql="delete from $table where ".join(" && ",$tmp);
        
    }else{
        $sql="delete from $table where id='$id'";
    }

     return  $pdo->exec($sql);
    

}

/**
 * 列出陣列內容
 */
function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

?>