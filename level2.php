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

            img[src$='person.png']{
                position: absolute;
                top: 200px;
                left: 50px;
                width: 260px;
                height: 525px;
            }

            img[src$='animal.png']{
                position: absolute;
                top: 100px;
                left: 242px;
                width: 260px;
                height: 525px;
                z-index: 1;
            }

            img[src$='food.png']{
                position: absolute;
                top: 200px;
                left: 450px;
                width: 260px;
                height: 525px;
                z-index: 2;
            }

            img[src$='obj.png']{
                position: absolute;
                top: 100px;
                left: 662px;
                width: 260px;
                height: 525px;
                z-index: 3;
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
            <a href="./learn2.php?count=0&learn=in">
                <img src="./asset/images/person.png"/>
                인물
            </a>

            <a href="./learn2.php?count=0&learn=dong">
                <img src="./asset/images/animal.png"/>
                동물
            </a>

            <a href="./learn2.php?count=0&learn=um">
                <img src="./asset/images/food.png"/>
                음식
            </a>
            <a href="./learn2.php?count=0&learn=sa">
                <img src="./asset/images/obj.png"/>
                사물
            </a>

        </div>
    </body>
</html>