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
            img[src$="btn_menu2.png"] {
                position: absolute; 
                left: 0;
                right: 0;
                margin: auto;
                width: 970px;
                bottom: 0;
            }
            
            a {
                position: absolute;
                display: block;
                width: 540px;
                height: 100px;
                font-size: 0;
            }
            
            a[href$="level1.php"] {
                top:440px;
                left:20px;
            }
            
            a[href$="level2.php"] {
                top:345px;
                left:140px;
            }
            
            a[href$="point.php"] {
                top:245px;
                left:240px;
            }
            
            a[href$="history.php"] {
                top:140px;
                left:330px;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <img src="./asset/images/btn_menu2.png"/>
            
            <a href="./level1.php">
                자음 모음 익히기
            </a>
            
            <a href="./level2.php">
                단어 익히기
            </a>
            
            <a href="./point.php">
                한글놀이로 익히기
            </a>
            
            
            <a href="./history.php">
                나의 한글성장 일기
            </a>
            
        </div>
    </body>
</html>