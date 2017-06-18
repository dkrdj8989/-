<html>
    <head>
        <title>한글공부</title>
        <link rel="stylesheet" href="./asset/styles/normalize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/customize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/addon.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/hangul.css" type="text/css"/>

        <style>

            img[src$="btn_save.png"]{

            }

            img[src$='home.png']{
                position: absolute;
                top: 60px;
                left: 85px;
                width: 120px;
                height: 120px;
            }

            img[src$='btn_prev.png']{
                display: none;
            }

            img[src$='btn_prev.png'],img[src$='btn_next.png']{
                cursor: pointer;               
            }

            img[src$='speaker2.png']{
                position: absolute;
                top: 70px;
                right: 80px;
                width: 90px;
                height: 80px;
            }

            img[src$='note.png']{
                position: absolute;
                right: 80px;
                top: 200px;
                width: 100px;
            }
            #book{
                position: absolute;
                top: 15px;
                left: 0px;
                width: 930px;
                height: 730px;
            }

            #show{
                position: absolute;
                top: 140px;
                left: 270px;
                width: 340px;
                height: 400px;
            }
            .leftBottomButton {
                bottom: 80px;
                left: 70px;
            }

            .rightBottomButton {
                bottom: 80px;
                right: 80px;
            }
        </style>

        <script type="text/javascript" src="./asset/scripts/jquery-1.11.1.min.js"></script> 
        <script>
            jQuery(function ($) {
                var ppl = ['나', '너', '우리', '친구', '선생님'];
                var pplImage = ['na', 'neo', 'woori', 'friends', 'teacher'];
                var ani = ['여우', '너구리', '오소리', '오리', '사자'];
                var aniImage = ['fox', 'raccoon', 'osori', 'duck', 'lion'];
                var food = ['가지', '도토리', '레몬', '사과', '자두'];
                var foodImage = ['gazi', 'acorn', 'lemon', 'apple', 'plum'];
                var obj = ['구두', '지우개', '모자', '바지', '바구니'];
                var objImage = ['gudu', 'eraser', 'hat', 'pants', 'baske'];

                var title = "<?php echo $_GET['learn'] ?>";
                var count =<?php echo$_GET['count'] ?>;
                var image;

                if (!count) {
                    count = 0;
                }

                switch (title) {
                    case 'in':
                        word = ppl;
                        image = pplImage;
                        break;
                    case 'dong':
                        word = ani;
                        image = aniImage;
                        break;
                    case 'um':
                        word = food;
                        image = foodImage;
                        break;
                    case 'sa':
                        word = obj;
                        image = objImage;
                        break;

                }
                ;
                if (count > 0) {
                    $("img[src$='btn_prev.png']").css('display', 'initial');
                }
                if (word.length - 1 == count) {
                    $("img[src$='btn_next.png']").css('display', 'none');
                }

                $("#show").attr('src', './asset/images/' + image[count] + '.png');

                $("img[src$='btn_next.png']").click(function () {
                    count++;
                    $("#show").attr('src', './asset/images/' + image[count] + '.png');
                    if (count > 0) {
                        $("img[src$='btn_prev.png']").css('display', 'initial');
                    }

                    if (word.length - 1 == count) {
                        $("img[src$='btn_next.png']").css('display', 'none');
                    }
                    console.log(word[count]);
                    var url = "./learn2_1.php?count=" + count + "&learn=<?php echo $_GET['learn'] ?>";
                    $("a:first").attr('href', url);
                });

                $("img[src$='btn_prev.png']").click(function () {
                    count--;
                    $("#show").attr('src', './asset/images/' + image[count] + '.png');
                    if (count == 0) {
                        $("img[src$='btn_prev.png']").css('display', 'none');
                    }

                    if (word.length - 1 > count) {
                        $("img[src$='btn_next.png']").css('display', 'initial');
                    }
                    console.log(word[count]);

                    var url = "./learn2_1.php?count=" + count + "&learn=<?php echo $_GET['learn'] ?>";
                    $("a:first").attr('href', url);
                });

                var url = "./learn2_1.php?count=" + count + "&learn=<?php echo $_GET['learn'] ?>";
                $("a:first").attr('href', url);
            });
        </script>
    </head>
    <body>
        <div id="container">
            <div id='book'>
                <img src='./asset/images/07_1.png' style="max-width: 111%;"/>
                <img src='./asset/images/speaker2.png'>
                <a href="./learn2_1.php?learn=<?php echo $_GET['learn'] ?>">
                    <img src='./asset/images/note.png'>
                </a>

                <a href="./level2.php">
                    <img src='./asset/images/home.png'>
                </a>
                <img id="show">
                <img src="./asset/images/btn_prev.png" class="leftBottomButton smallButton"/>
                <img src="./asset/images/btn_next.png" class="rightBottomButton smallButton"/>
            </div>
        </div>
    </body>
</html>
