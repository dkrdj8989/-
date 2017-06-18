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

            img[src$='05_1.png']{
                position: absolute;
                top: 150px;
                left: 50px;
                width: 280px;
                height: 555px;
            }

            img[src$='05_2.png']{
                position: absolute;
                top: 150px;
                left: 372px;
                width: 280px;
                height: 555px;
            }

            img[src$='05_3.png']{
                position: absolute;
                top: 150px;
                left: 690px;
                width: 280px;
                height: 555px;
            }

            img[src$='home.png']{
                position: absolute;
                top: 20px;
                left: 35px;
                width: 120px;
                height: 120px;
            }

            a {
/*                position: absolute;
                display: block;
                width: 540px;
                height: 100px;*/
                font-size: 0;
            }

            a[href$="learn1.php"] {
                top:440px;
                left:20px;
            }

            a[href$="learn2.php"] {
                top:345px;
                left:140px;
            }

            a[href$="learn3.php"] {
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
            <a href="./home.php">
            <img src="./asset/images/home.png">
            홈
            </a>
            <a href="./learn1.php?learn=ja">
                <img src="./asset/images/05_1.png"/>
                ㄱㄴㄷ
            </a>

            <a href="./learn1.php?learn=mo">
                <img src="./asset/images/05_2.png"/>
                ㅏㅑㅓ
            </a>

            <a href="./learn1.php?learn=ga">
                <img src="./asset/images/05_3.png"/>
                가나다
            </a>

        </div>
    </body>
</html>