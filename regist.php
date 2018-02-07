<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"/>
        <title>한글공부</title>

        <link rel="stylesheet" href="./asset/styles/normalize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/customize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/addon.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/hangul.css" type="text/css"/>
        
        <style> 
            img[src$="bg_index.png"] {    
                position: absolute;
                width: 100%;
                top: 340px;
            }
            
            input[type="text"],
            input[type="password"] {
                position: absolute;
                border: 0px none;
                height: 50px;
                
                font-size: 30px;
                
                background-color: transparent;
                background-repeat: no-repeat;
                background-size: contain;
                background-position-x: right;
            }
            
            input[name="이름"] { 
                width: 370px;
                
                top: 100px; 
                left: 70px; 
                
                padding-left:205px; 
                
                background-image: url(./asset/images/tf_regist0.png);
            }
            
            input[name="아이디"] { 
                width: 370px;
                
                top: 200px;
                left: 70px; 
                
                padding-left:205px; 
                
                background-image: url(./asset/images/tf_regist3.png);
            }
            
            input[name="비밀번호"] { 
                width: 370px;
                
                top: 300px;
                left: 70px; 
                
                padding-left:205px; 
                
                background-image: url(./asset/images/tf_regist4.png);
            }
            
            input[name="학년"] { 
                padding-left: 100px;
                top: 100px;
                left: 500px;
                background-image: url(./asset/images/tf_regist1.png);
                width: 170px;
            }
            
            input[name="반"] { 
                padding-left: 100px;
                top: 100px;
                left: 690px;
                background-image: url(./asset/images/tf_regist2.png);
                width: 170px;
            }
            
            img[src$="txt_regist5.png"] {
                position: absolute;
                top: 450px;
                left: 110px;
                height: 45px;
            }
            
            input[type="radio"] {
                position: absolute;
                top: 400px;
                opacity: 0.5;
                
                -webkit-appearance: none;
                
                background-color: transparent;
                background-size: contain;
                border: 0px none;
                
                width: 150px;
                height: 150px;
                
                padding: 0;
                font-size: 0;
            }
            
            input[type="radio"]:checked {
                opacity: 1;
            }
            
            input[type="radio"][value="남자"] {
                left: 320px;
                
                background-image: url(./asset/images/btn_regist_male.png);
            }
            
            input[type="radio"][value="여자"] { 
                left: 480px;
                
                background-image: url(./asset/images/btn_regist_female.png);
            }
            
            #submit{
                background-image: url('')
            }
            
            .rightBottomButton {
                right: 150px;
                bottom: 140px;
            }
            
            .largeButton {
                width: 130px;
            }
        </style>
        
        <script src="./asset/scripts/jquery-1.11.1.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                var User = {"Name":null,"Grade":null,"Class":null,"Id":null,"Password":null,"Sex":null};
                
                
                $('#submit').click(function () {
                        // 입력한 데이터들이 유효한가 
                        var IsVaild=true;
                        // 공백제거 (비밀번호 제외)
                        User.Name = $.trim(user.이름.value); 
                        User.Grade = $.trim(user.학년.value);
                        User.Class = $.trim(user.반.value);
                        User.Id = $.trim(user.아이디.value);
                        User.Password = user.비밀번호.value;
                        User.Sex = $(':input:radio[name=성별]:checked').val();
                        
                        console.log(User.Name);
                        for(var key in User)
                        {
                            console.log(key);
                            console.log(User[key]);
                            if(!User[key]) // 하나라도 값이 비어있다면
                            {
                                IsVaild=false;
                            }
                        }
                        
                        if(!IsVaild)
                        {
                            alert("사용자 정보를 모두 입력하세요");
                            return;
                        }else
                        {
                           localStorage.clear();
                            $("form[name=user]").submit();
                            localStorage.setItem("user",User);
                            location.href="./home.php";
                        }   
//                        location.href="./home.php";
                });
                
            });
        </script>
    </head>
    <body>
        <div id="container">
            <form name="user" method="post" action="php/UserStoreProcess.php">

                <img src="./asset/images/bg_regist.png"/>

                <input type="text" size="20px" name="이름"/>

                <input type="text" name="학년"/>
                <input type="text" name="반"/>

                <input type="text" name="아이디"/>
                <input type="password" name="비밀번호"/>

                <img src="./asset/images/txt_regist5.png"/>

                <input type="radio" name="성별" value="남자"/>
                <input type="radio" name="성별" value="여자"/>
                
                <a type="submit" id="submit" class="rightBottomButton largeButton">
                    <img src="./asset/images/btn_submit.png"/>
                </a>

            </form>
        </div>
    </body>
</html>