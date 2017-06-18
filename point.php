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
            ul {
                padding: 0;
                margin: 0;
                padding-right: 130px;
            }

            li {
                list-style: none;
                width: 100px;
                height: 100px;
                margin-bottom: 60px;
                line-height: 100px;
                font-size: 50px;
                text-align: center;

            }

            #left {
                float: left;
            }

            #right {
                float: right;
            }

            canvas {
                position: absolute;
            }

            #question {
                position: absolute;
                z-index: 1;

                width: 100%;
                height: 100%;
                top: 210px;
                left: 40px;
            }
            a{
                font-size: 0;
            }
            img[src$='home.png']{
                position: absolute;
                width: 140px;
                height: 140px;
                top: 40px;
                left: 30px;
                z-index: 2;
            }
            
            img[src$="btn_next.png"]{
                cursor: pointer;
                z-index: 2;
            }
            
            h1{
                font-size: 70px;
                width: 150px;
            }
            
        </style>

        <script type="text/javascript" src="./asset/scripts/jquery-1.11.1.min.js"></script> 
        <script>

            jQuery(function ($) {

                var ctx = $('canvas')[0].getContext('2d');

                var lineNumber = $('#left li').length;
                var lineMap = {};
                var dragLine = null;
                var dragLineIndex = null;
                var dragLineArea = null;

                function drawLines() {
                    ctx.clearRect(0, 0, 1024, 768);

                    for (var n = 0; n < lineNumber; ++n) {

                        if (typeof (lineMap[n]) === 'undefined') {
                            continue;
                        }

                        var leftItem = $("#left li").eq(n);
                        var rightItem = $("#right li").eq(lineMap[n]);

                        var leftPos = leftItem.offset();
                        var rightPos = rightItem.offset();

                        var leftX = leftPos.left + leftItem.width() + 100;
                        var leftY = leftPos.top + leftItem.height() / 2;

                        var rightX = rightPos.left + -100//rightItem.width() / 2;
                        var rightY = rightPos.top + rightItem.height() / 2;

                        ctx.beginPath();
                        ctx.lineWidth = 5;
                        ctx.strokStyle = '#000000';
                        ctx.moveTo(leftX, leftY);
                        ctx.lineTo(rightX, rightY);
                        ctx.stroke();
                    }
                }

                $('li').click(function () {

                    var idx = $(this).index();

                    if (!dragLine) {
                        dragLineArea = $(this).parents('ul').attr('id');
                        dragLine = $(this);
                        dragLineIndex = $(this).index();
                    } else {
                        if (dragLine.parents('ul').find(this).length) { // 같은 영역에 있는놈을 클릭할땐 취소
                            return;
                        }

                        for (var n = 0; n < lineNumber; ++n) {
                            if (typeof (lineMap[n]) === 'undefined') {
                                continue;
                            }

                            if (dragLineArea == 'left') {
                                if (lineMap[n] == idx) {
                                    lineMap[n] = undefined;
                                }
                            } else {
                                if (lineMap[n] == dragLineIndex) {
                                    lineMap[n] = undefined;
                                }
                            }
                        }

                        if (dragLineArea == 'left') {
                            lineMap[dragLineIndex] = idx;
                        } else {
                            lineMap[idx] = dragLineIndex;
                        }

                        drawLines();

                        dragLine = null;
                        dragLineIndex = null;
                        dragLineArea = null;
                    }
                });
                $("#right li:eq(0)").html('구두');
                $("#right li:eq(1)").html('가지');
                $("#right li:eq(2)").html('여우');

                $("#left li:eq(0)").html('<img src="./asset/images/gudu.png"/>');
                $("#left li:eq(1)").html('<img src="./asset/images/gazi.png"/>');
                $("#left li:eq(2)").html('<img src="./asset/images/fox.png"/>');

            });

        </script>

    </head>
    <body>
        <div id="container">
            <a href="./home.php">
                <img src="./asset/images/home.png" class="">
                홈
            </a>
            <canvas width="1024" height="768"></canvas>

            <div id="question" class="clearFix">

                <ul id="left">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>

                <ul id="right">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>

            </div>
<!--            <a href="">
            <img src="./asset/images/btn_next.png" class="rightBottomButton smallButton"/>
            </a>-->
        </div>
    </body>
</html>
