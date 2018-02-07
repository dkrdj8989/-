<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"/>
        <title>한글공부</title>
        <link rel="stylesheet" href="./asset/styles/normalize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/customize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/addon.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/hangul.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/pointCss.css" type="text/css"/>
        
        <style>
            ul {
                padding: 0;
                margin: 0;
                padding-right: 130px;
                z-index: 10;
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

            #left{
                float: left;
            }

            #right{
                float: right;
            }
            
            #left1{
                height: 540px;
                padding-left: 30px;
                width: 230px;
            }
            
            #right1{
                height: 540px;
                padding-right: 130px;
                width: 230px;
            }
            
            
            
            #left1 > li{
                width: 100%;
                height: 113px;
                margin-top: 18px;
                margin-bottom: 0px;
            }
            
            #right1 > li{
                width: 100%;
                height: 25%;
                margin-bottom: 0px;
            }

            canvas {
                position: absolute;
                z-index: 1;
            }

            #question {
                position: absolute;
                z-index: 1;

                width: 100%;
                height: 100%;
                top: 210px;
                left: 40px;
            }
            
            #question2{
                position: absolute;
                background-size: contain;
                width: 90%;
                height: 70%;
                top: 150px;
                left: 40px;
            }
            
            a{
                font-size: 0;
            }
            img[src$='home.png']{
                position: absolute;
                width: 100px;
                height: 100px;
                top: 40px;
                left: 30px;
                z-index: 20;
            }

            img[src$="btn_next.png"],
            img[src$="btn_prev.png"]{
                cursor: pointer;
                z-index: 20;
                bottom: 10px;
            }

            h1{
                font-size: 70px;
                width: 150px;
            }
            
            .q-image{
                width: 100%;
                height: 100%;   
            }
            
            .vo{
                position: absolute;
                width: 50px;
                height: 50px;
            }
        </style>

        <script type="text/javascript" src="./asset/scripts/jquery-1.11.1.min.js"></script>
        <script src="./asset/scripts/DbFunction.js"></script>
        <script src="./asset/scripts/html.js"></script>
        
        <script>

            jQuery(function ($) {

                var ctx = $('canvas')[0].getContext('2d');

                var lineNumber = [3,4,4,5,0,0,3,5,5,5,0];
                var lineMap = {};
                var dragLine = null;
                var dragLineIndex = null;
                var dragLineArea = null;
                var count=0;
                
                
                function drawLines(count) {
                    ctx.clearRect(0, 0, 1024, 768);
                    var leftItem,rightItem,leftPos,rightPos,leftX,leftY,rightX,rightY;
                    for (var n = 0; n < lineNumber[count]; ++n) {

                        if (typeof (lineMap[n]) === 'undefined') {
                            continue;
                        }
                        
                        switch(count){
                            case 0:
                                leftItem = $("#left li").eq(n);
                                rightItem = $("#right li").eq(lineMap[n]);
                                break;
                            case 1:
                                leftItem = $("#layer1-left li").eq(n);
                                rightItem = $("#layer1-right li").eq(lineMap[n]);
                                break;
                                
                            case 2:
                                leftItem = $("#layer1-left li").eq(n);
                                rightItem = $("#layer1-right li").eq(lineMap[n]);
                                break;
                                
                            case 3:
                                leftItem = $("#layer3-left li").eq(n);
                                rightItem = $("#layer3-right li").eq(lineMap[n]);
                                break;
                                
                            case 6:
                                leftItem = $("#layer6-left li").eq(n);
                                rightItem = $("#layer6-right li").eq(lineMap[n]);
                                break;
                                
                            case 7:
                                leftItem = $("#layer3-left li").eq(n);
                                rightItem = $("#layer3-right li").eq(lineMap[n]);
                                break;
                                
                            case 8:
                                leftItem = $("#layer3-left li").eq(n);
                                rightItem = $("#layer3-right li").eq(lineMap[n]);
                                break;
                                
                            case 9:
                                leftItem = $("#layer3-left li").eq(n);
                                rightItem = $("#layer3-right li").eq(lineMap[n]);
                                break;    
                        }
                        
//                        var leftItem = $("#left li").eq(n);
//                        var rightItem = $("#right li").eq(lineMap[n]);

                        var leftPos = leftItem.offset();
                        var rightPos = rightItem.offset();

                        switch(count){
                            case 0:
                                leftX = leftPos.left + leftItem.width() + 100;
                                leftY = leftPos.top + leftItem.height() / 2;
                                
                                rightX = rightPos.left + -100;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;
                                break;
                            case 1:
                                leftX = leftPos.left + leftItem.width();
                                leftY = leftPos.top + leftItem.height() / 2;
                                
                                rightX = rightPos.left;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;
                                
                                break;
                                
                           case 2:
                                leftX = leftPos.left + leftItem.width();
                                leftY = leftPos.top + leftItem.height() / 2;
                                
                                rightX = rightPos.left;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;
                                
                                break;
                                
                           case 3:
                                leftX = leftPos.left + leftItem.width();
                                leftY = leftPos.top + leftItem.height() / 2;

                                rightX = rightPos.left;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;
                                
                                break;
                                
                            case 6:
                                leftX = leftPos.left + leftItem.width() + 30;
                                leftY = leftPos.top + 10 +leftItem.height() / 2;

                                rightX = rightPos.left - 30;//rightItem.width() / 2;
                                rightY = rightPos.top + 10 + rightItem.height() / 2;
                                
                                break;
                            
                            case 7:
                                leftX = leftPos.left + leftItem.width();
                                leftY = leftPos.top + leftItem.height() / 2;

                                rightX = rightPos.left;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;
           
                                break;
                            
                            case 8:
                                leftX = leftPos.left + leftItem.width();
                                leftY = leftPos.top + leftItem.height() / 2;

                                rightX = rightPos.left;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;
                                
                                break;
                             
                            case 9:
                                leftX = leftPos.left + leftItem.width();
                                leftY = leftPos.top + leftItem.height() / 2;

                                rightX = rightPos.left;//rightItem.width() / 2;
                                rightY = rightPos.top + rightItem.height() / 2;

                                break; 
                                
                        }
            
                        ctx.beginPath();
                        ctx.lineWidth = 5;
                        ctx.strokStyle = '#000000';
                        ctx.moveTo(leftX, leftY);
                        ctx.lineTo(rightX, rightY);
                        ctx.stroke();
                    }
                    check(lineMap,lineNumber[count],count);
                }
                
                $('li').on("click",function () {

                    var idx = $(this).index();
                    var left;
                    
                    switch(count){
                        case 0:
                               left='left'
                               break;
                        case 1: 
                               left='layer1-left'
                               break;
                        case 2: 
                               left='layer1-left'
                               break;
                        case 3: 
                               left='layer3-left'
                               break;
                        case 6: 
                               left='layer6-left'
                               break;
                        case 7: 
                               left='layer3-left'
                               break;
                        case 8: 
                               left='layer3-left'
                               break;
                        case 9: 
                               left='layer3-left'
                               break;         
                    }

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
                            
                            if (dragLineArea == left) {
                                if (lineMap[n] == idx) {
                                    lineMap[n] = undefined;
                                }
                            } else {
                                if (lineMap[n] == dragLineIndex) {
                                    lineMap[n] = undefined;
                                }
                            }
                        }
    
                        if (dragLineArea == left) {
                            lineMap[dragLineIndex] = idx;
                        } else {
                            lineMap[idx] = dragLineIndex;
                        }

                        drawLines(count);

                        dragLine = null;
                        dragLineIndex = null;
                        dragLineArea = null;
                    }
                });
                
                $("img[src$='btn_next.png']").click(function () {
                    ctx.clearRect(0, 0, 1024, 1024);
                    lineMap=[];
                    if(count == 3) count=count+2;
                    if(count < 10){
                        count++;
//                        $('#question').css('display','none');
                        $("img[src$='btn_prev.png']").css('display','initial');
                        $('#question2').html("'<img class='q-image' src="+"./asset/images/play/l"+count+".png>'");
                    }
                    if(count == 9){
                        $("img[src$='btn_next.png']").css('display','none');
                    }
                    console.log(count);
                    switch(count){
                        case 1 :
                            css(count);
                            break;
                        case 2 :
                            
                            break;
                        case 3 :
                            css(count);
                            break;
                        case 4:
                            css(count);
                            break;
                        case 5:
                            css(count);
                            break;
                        case 6:
                            css(count);
                            break;
                        case 7:
                            css(count);
                            break;       
                    }
                })
                
                $("img[src$='btn_prev.png']").click(function () {
                    ctx.clearRect(0, 0, 1024, 1024);
                    
                    lineMap=[];
                    
                    if(count == 6)count = count-2;
                    
                    if(count < 10){  
                            count--;
                            console.log(count);
                            switch(count){
                                case 0 :reverse(count);
                                    break; 
                                case 1 :
                                    reverse(count);
                                    break;
                                case 2 :
                                    reverse(count);    
                                    break;
                                case 3 :
                                    reverse(count);
                                    break;
                                case 4:
                                    reverse(count);
                                    break;
                                case 5:
                                    reverse(count);
                                    break;
                                case 6:
                                    reverse(count);
                                    break;
                                case 7:
                                    reverse(count);
                                    break;       
                    }
                        if(count == 0){
                            
                        }else{
                            console.log('fds');
                            $('#question2').html("'<img class='q-image' src="+"./asset/images/play/l"+count+".png>'");
                        }

                    }
                    if(count <= 9){
                        $("img[src$='btn_next.png']").css('display','initial');
                    }
                    if(count == 0){
                        $('#question2').empty();
                        $("img[src$='btn_prev.png']").css('display','none');
                    }
     
                })

                $("#right li:eq(0)").html('구두');
                $("#right li:eq(1)").html('가지');
                $("#right li:eq(2)").html('여우');

                $("#left li:eq(0)").html('<img src="./asset/images/play/gudu.png"/>');
                $("#left li:eq(1)").html('<img src="./asset/images/play/gazi.png"/>');
                $("#left li:eq(2)").html('<img src="./asset/images/play/fox.png"/>');
                
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
            <div id="question2">

            </div>
            
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
            
            <div style="display: none" id="layer1">
                <ul id="layer1-left">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul id="layer1-right">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            
            <div style="display: none" id="layer3">
                <ul id="layer3-left">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul id="layer3-right">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            
            <div style="display: none" id="layer4">
                <ul id="layer4-left">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                 <ul id="layer4-center">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul id="layer4-right">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            
            <div style="display: none" id="layer5">
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
                <a class="vo"><p></p></a>
            </div>
            
            <div style="display: none;" id="layer6">
                <ul id="layer6-left">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ul id="layer6-right">
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            
            <img style="right : 0;" src="./asset/images/btn_next.png" class="rightBottomButton smallButton"/>
            <img style="left: 0; display: none;" src="./asset/images/btn_prev.png" class="leftBottomButton smallButton"/>
        </div>
    </body>
</html>
