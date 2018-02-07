<?php
    include 'DbContext\DbConnect.php';
    
    $query = "SELECT correct FROM grade WHERE cookie = ?";
    $stmt = $con ->prepare($query);
    isVaild($stmt);
    $stmt->bind_param("i",$_COOKIE['user']);
    $stmt->execute();
    $stmt->store_result();    
    $stmt->bind_result($correct);   
    $time = date("Ymd", strtotime("now")); // 현재
    echo $stmt->num_rows;
    // 저장된 값이 없으면 
    if(!$stmt->num_rows){
        echo 'q';
        echo $_POST['data'];
        $data = $_POST['data'];
        $user = $_COOKIE["user"];
        $stmt = null;
        //SELECT DATE_FORMAT(now(),"%Y%c%e")
        $query = 'INSERT INTO grade(cookie,correct,time) VALUES(?,?,?)';
        $stmt = $con->prepare($query);
        isVaild($stmt);
        $stmt->bind_param("iii", $_COOKIE["user"], $data,$time);
        $stmt->execute();
    }else{//저장된 값이 있으면       
        $stmt->fetch();
        if($correct === 8)
        {
            exit;
        }
        echo $correct+1;
        $query = 'UPDATE grade SET correct ='.($correct+1).' WHERE cookie ='.$_COOKIE['user'];
        $stmt = $con ->prepare($query);
        $stmt->execute();
    }
    
    function isVaild($stmt){
        if(!$stmt){
            echo "false";
        }
    }
?>

