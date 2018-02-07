<?php
    include 'DbContext\DbConnect.php';
    
    $query="INSERT INTO users(UserName,UserId,UserPassword,UserGrade,UserClass,UserSex) "
            . "values(?,?,?,?,?,?)";
    $UserName= htmlspecialchars($_POST['이름']);
    $UserId=htmlspecialchars($_POST['아이디']);
    $UserPassword=htmlspecialchars($_POST['비밀번호']);
    $UserGrade=htmlspecialchars($_POST['학년']);
    $UserClass=htmlspecialchars($_POST['반']);
    $UserSex=htmlspecialchars($_POST['성별']);
     
    $stmt = $con->prepare($query);
    $stmt->bind_param('ssssss',$UserName,$UserId,$UserPassword,$UserGrade,$UserClass,$UserSex);
    $stmt->execute(); 
    
    echo 'dd';
?>

