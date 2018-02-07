<?php
    include 'Dbcontext\DbConnect.php';
    $time = date("Ymd", strtotime("-1 week")); // 일주일전
    $query ="SELECT correct,time FROM grade WHERE time >".$time;
    $stmt = $con->prepare($query);
    $stmt->execute();
    $stmt->store_result();    
    $stmt->bind_result($c,$t);
    $data = array();
    $y=array("맞춘갯수",0,0,0,0,0,0,0,0);    
    $temp=array(2);
    
    $i = 6;
    for ($i; $i != -1; $i--) {
        array_push($temp, $time);
        $time = date("Ymd", strtotime(-($i) . " day"));
    }
    $time = date("Ymd", strtotime("now"));
    array_push($temp, $time);

    if($stmt->num_rows){
        while($stmt->fetch()){
            $i=1;           
            for ($i; $i < 9; $i++){
                if($temp[$i] == $t)
                {
                    $y[$i] = $c;   
                }
            }   
        }
        
    }else{
 
        $i=0;
        for($i; $i<7; $i++){
            array_push($data, 0);
        }
        
    }
?>