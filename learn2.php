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
                z-index: 9999;
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
                left: 160px;
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
                var ppl = ['나', '너', '우리', '친구', '선생님','가족','나무꾼','아기',
                           '아버지','어머니','요리사','임금님','콩쥐'];
                var pplImage = ['na', 'neo', 'woori', 'friends', 'teacher','1','2','3',
                           '4','5','6','7','8'];
                var ani = ['여우', '너구리', '오소리', '오리','거미',
                            '너구리','다람쥐','달팽이','돼지','두꺼비','두더지','매미',
                            '자라','제비','참새','코끼리','타조','토끼','하마','호랑이'];
                       
                       
                var aniImage = ['fox', 'raccoon', 'osori', 'duck', 'lion','1','2',
                           '3','4','5','6','7','8','9','10','11','12','13','14','15','16'];
                var food = ['가지', '도토리', '레몬', '사과', '자두','고구마','도라지',
                            '무','물고기','바나나','사과','오이','참외','콩','파','포도',
                            '호박'];
                var foodImage = ['gazi', 'acorn', 'lemon', 'apple', 'plum','1',
                            '2','3','4','5','6','7','8','9',
                            '10','11','12'];
                var obj = ['구두', '지우개', '모자', '바지','바구니','가방','꽃','단풍',
                           '시계','안경','양말','자동차','장갑','장난감','책상','화분',
                           '회전목마'];
                var objImage = ['gudu', 'eraser', 'hat', 'pants', 'baske','1',
                           '2','3','4','5','6','7','8','9',
                           '10','11','12'];

                var title = "<?php echo $_GET['learn'] ?>";
                var count =<?php echo$_GET['count'] ?>;
                var image,folder;

                if (!count) {
                    count = 0;
                }

                switch (title) {
                    case 'in':
                        word = ppl;
                        folder = 'ppl';
                        image = pplImage;
                        break;
                    case 'dong':
                        word = ani;
                        folder = 'ani';
                        image = aniImage;
                        break;
                    case 'um':
                        word = food;
                        folder = 'food';
                        image = foodImage;
                        break;
                    case 'sa':
                        word = obj;
                        folder = 'obj';
                        image = objImage;
                        break;

                };
                
                if (count > 0) {
                    $("img[src$='btn_prev.png']").css('display', 'initial');
                }
                if (word.length - 1 == count) {
                    $("img[src$='btn_next.png']").css('display', 'none');
                }

                $("#show").attr('src', './asset/images/'+ folder+'/'+ image[count] + '.png');

                $("img[src$='btn_next.png']").click(function () {
                    count++;
                    $("#show").attr('src', './asset/images/'+ folder+'/' + image[count] + '.png');
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
                    $("#show").attr('src', './asset/images/'+folder+'/' + image[count] + '.png');
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
