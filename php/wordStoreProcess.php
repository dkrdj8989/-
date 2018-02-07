<?php
    include 'DbContext\DbConnect.php';

    $data = JSON_decode($_POST['data']);
    $query="INSERT INTO subject(Type,IsLearned,Detail,SubType,UserNo) "
            . "values(?,?,?,?,?)";
    $Type= htmlspecialchars($data->Type);
    $IsLearned=htmlspecialchars($data->IsLearned);
    $UserNo = $_COOKIE['user'];
    $Detail= $data->Detail;
    $SubType=htmlspecialchars($data->SubType);
 
    $stmt = $con->prepare($query);
    $stmt->bind_param('sssss',$Type,$IsLearned,$Detail,$SubType,$UserNo);
    $stmt->execute();
    phpinfo();
?>

