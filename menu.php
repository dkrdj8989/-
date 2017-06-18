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
            img[src$="btn_menu1.png"] {
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                margin: auto;
                width: 610px;
                bottom: 0;
            }
            
            a[href$="regist.php"] {
                position: absolute;
                top: 150px;
                width: 250px;
                height: 250px;
                left: 260px;
                display: block;
                font-size: 0;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <img src="./asset/images/btn_menu1.png"/>
            
            <a href="./regist.php">사용자만들기</a>
            
            
            <a href="./index.php" class="leftBottomButton largeButton">
                <img src="./asset/images/btn_prev.png"/>
            </a>
            
            <a href="./home.php" class="rightBottomButton largeButton">
                <img src="./asset/images/btn_next.png"/>
            </a>
        </div>
    </body>
</html>