<html>
    <head>
        <title>한글공부</title>
        <link rel="stylesheet" href="./asset/styles/normalize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/customize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/addon.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/hangul.css" type="text/css"/>

        <style>
            #example{
                position: absolute;
                top: 150px;
                left: 50px;
                width: 350px;
                height: 500px;
                background-image: url(./asset/images/06_1.png);
            }

            img[src$='pen_black.png']{
                position: absolute;
                left: 865px;
                top: 50px;
                width: 160px;
                height: 75px;
            }

            img[src$='pen_red.png']{
                position: absolute;
                left: 865px;
                top: 140px;
                width: 160px;
                height: 75px;
            }

            img[src$='pen_blue.png']{
                position: absolute;
                left: 865px;
                top: 230px;
                width: 160px;
                height: 75px;
            }

            img[src$="btn_save.png"]{

            }

            img[src$='home.png']{
                position: absolute;
                top: 20px;
                left: 35px;
                width: 120px;
                height: 120px;
                cursor: pointer;
            }

            img[src$='btn_prev.png']{
                display: none;
            }

            img[src$='btn_prev.png'],img[src$='btn_next.png']{
                cursor: pointer;               
            }

            img[src$='speaker.png']{
                position: absolute;
                left: 85px;
                top: 500px;
                width: 40px;
                height: 30px;
            }

            img[src*='pen']{
                cursor: pointer;
                z-index: 2;
            }

            #canvas{
                position: absolute;
                top: 50px;
                left: 480px;
                width: 470px;
                height: 590px;
                z-index: 1;
            }

            h1{
                position: absolute;
                top: 0;
                left: 0;
                width: 335px;
                height: 382px;
                text-align: center;
                line-height: 382px;
                font-size: 310px;
            }

            h2{
                position: absolute;
                bottom: 32px;
                left: 0;
                width: 335px;
                height: 50px;
                margin: auto;
                text-align: center;
            }
            #example{
                position: absolute;
                top: 150px;
                left: 50px;
                width: 350px;
                height: 500px;
                background-image: url(./asset/images/06_1.png);
                background-size: contain;
                background-repeat: no-repeat;
            }
            
            p{
                position: absolute;
                bottom: 27px;
                left: 0;
                width: 335px;
                height: 50px;
                margin: auto;
                text-align: center;
                font-size: 24px;
            }
        </style>

        <script type="text/javascript" src="./asset/scripts/jquery-1.11.1.min.js"></script>
        <script src="./asset/scripts/DbFunction.js"></script>
        <script type="text/javascript">

            // When the window has loaded, scroll to the top of the
            // visible document.
            jQuery(window).load(
                    function () {
                        
                        // When scrolling the document, using a timeout to
                        // create a slight delay seems to be necessary.
                        // NOTE: For the iPhone, the window has a native
                        // method, scrollTo().
                        setTimeout(
                                function () {
                                    window.scrollTo(0, 0);
                                },
                                50
                                );

                    }
            );


            // When The DOM loads, initialize the scripts.
            jQuery(function ($) {
                var ppl = ['나', '너', '우리', '친구', '선생님','1','2','3',
                           '4','5','6','7','8'];
                var ani = ['여우', '너구리', '오소리', '오리', '사자','거미','너구리',
                           '다람쥐','달팽이','돼지','두꺼비','두더지','매미','자라',
                           '제비','참새','코끼리','타조','토끼','하마','호랑이'];
                var food = ['가지', '도토리', '레몬', '사과', '자두','고구마','도라지',
                            '무','물고기','바나나','사과','오이','참외','콩','파','포도',
                            '호박'];
                var obj = ['구두', '지우개', '모자', '바지','바구니','가방','꽃','단풍',
                           '시계','안경','양말','자동차','장갑','장난감','책상','화분',
                           '회전목마'];
                var ContentDetail;  
//                var ContentDetails = new Array();
//                var Contents = new Array();
                var idle = true;
                function Content(Type,SubType,Detail,IsLearned){
                    this.Type = Type;
                    this.SubType = SubType;
                    this.Detail = Detail;
                    this.IsLearned = IsLearned;
                };
                // Get a refernce to the canvase.
                var canvas = $("canvas");

                // Get the rendering context for the canvas (curently,
                // 2D is the only one available). We will use this
                // rendering context to perform the actually drawing.
                var pen = canvas[ 0 ].getContext("2d");

                var penColor = 'black';

                // Create a variable to hold the last point of contact
                // for the pen (so that we can draw FROM-TO lines).
                var lastPenPoint = null;

                // This is a flag to determine if we using an iPhone.
                // If not, we want to use the mouse commands, not the
                // the touch commands.
                var isTouch = typeof (window.ontouchstart) !== 'undefined';


                // I take the event X,Y and translate it into a local
                // coordinate system for the canvas.
                var getCanvasLocalCoordinates = function (pageX, pageY) {
                    // Get the position of the canvas.
                    var position = canvas.offset();

                    // Translate the X/Y to the canvas element.
                    return({
                        x: (pageX - position.left),
                        y: (pageY - position.top)
                    });
                };


                // I get appropriate event object based on the client
                // environment.
                var getTouchEvent = function (event) {
                    // Check to see if we are in the iPhont. If so,
                    // grab the native touch event. By its nature,
                    // the iPhone tracks multiple touch points; but,
                    // to keep this demo simple, just grab the first
                    // available touch event.
                    return(
                            isTouch ?
                            window.event.targetTouches[ 0 ] :
                            event
                            );
                };


                // I handle the touch start event. With this event,
                // we will be starting a new line.
                var onTouchStart = function (event) {
                    ContentDetail = WhatToLearn[<?php echo $_GET['count']; ?>];
                    console.log(ContentDetail);
                    if(idle){
                        ContentDetail = WhatToLearn[order];
                        var c = new Content("Word",SubType,order,true);
                        console.log(JSON.stringify(c));
                        SaveInDb(JSON.stringify(c)); 
                        idle = false;
                    }
                    ////////// localstorage ///////////
//                     if(localStorage.getItem("ContentDetails") == null)
//                     {
//                         console.log("ContentDetails is null");
//                     }else
//                     {
//                         ContentDetails = JSON.parse(localStorage.getItem("ContentDetails"));
//                     }
                     
//                     if(ContentDetails.indexOf(ContentDetail) == -1) // 중복되지 않는다면 
//                     {   
//                         ContentDetails.push(ContentDetail);
//                         // 페이지가 바뀔때 마다 값이 초기화되기 때문에 localStorage에 저장해둔다.
//                         localStorage.setItem("ContentDetails",
//                                               JSON.stringify(ContentDetails)); 
//                         var c = new Content("Word",SubType,ContentDetail,true);
//                         
//                         if(localStorage.getItem("Contents") != null)
//                         {
//                            Contents = JSON.parse(localStorage.getItem("Contents"));
//                            Contents.push(c); 
//                            localStorage.setItem("Contents",JSON.stringify(Contents));
//                            
//                            console.log(Contents);
//                        }else
//                        {
//                            Contents.push(c);
//                            localStorage.setItem("Contents",JSON.stringify(Contents));
//                        }
//                     }
                    // Get the native touch event.
                    var touch = getTouchEvent(event);

                    // Get the local position of the touch event
                    // (taking into account scrolling and offset).
                    var localPosition = getCanvasLocalCoordinates(
                            touch.pageX,
                            touch.pageY
                            );

                    // Store the last pen point based on touch.
                    lastPenPoint = {
                        x: localPosition.x,
                        y: localPosition.y
                    };

                    // Since we are starting a new line, let's move
                    // the pen to the new point and beign a path.
                    pen.beginPath();
                    pen.moveTo(lastPenPoint.x, lastPenPoint.y);


                    // Now that we have initiated a line, we need to
                    // bind the touch/mouse event listeners.
                    canvas.bind(
                            (isTouch ? "touchmove" : "mousemove"),
                            onTouchMove
                            );

                    // Bind the touch/mouse end events so we know
                    // when to end the line.
                    canvas.bind(
                            (isTouch ? "touchend" : "mouseup"),
                            onTouchEnd
                            );
                };


                // I handle the touch move event. With this event, we
                // will be drawing a line from the previous point to
                // the current point.
                var onTouchMove = function (event) {
                    // Get the native touch event.
                    var touch = getTouchEvent(event);

                    // Get the local position of the touch event
                    // (taking into account scrolling and offset).
                    var localPosition = getCanvasLocalCoordinates(
                            touch.pageX,
                            touch.pageY
                            );

                    // Store the last pen point based on touch.
                    lastPenPoint = {
                        x: localPosition.x,
                        y: localPosition.y
                    };

                    // Draw a line from the last pen point to the
                    // current touch point.
                    pen.strokeStyle = penColor;
                    pen.lineWidth = 10;
                    pen.lineTo(lastPenPoint.x, lastPenPoint.y);

                    // Render the line.
                    pen.stroke();
                };


                // I handle the touch end event. Here, we are basically
                // just unbinding the move event listeners.
                var onTouchEnd = function (event) {
                    // Unbind event listeners.
                    canvas.unbind(
                            (isTouch ? "touchmove" : "mousemove")
                            );

                    // Unbind event listeners.
                    canvas.unbind(
                            (isTouch ? "touchend" : "mouseup")
                            );
                };


                // Bind the touch start event to the canvas. With
                // this event, we will be starting a new line. The
                // touch event is NOT part of the jQuery event object.
                // We have to get the Touch even from the native
                // window object.
                canvas.bind(
                        (isTouch ? "touchstart" : "mousedown"),
                        function (event) {
                            // Pass this event off to the primary event
                            // handler.
                            onTouchStart(event);

                            // Return FALSE to prevent the default behavior
                            // of the touch event (scroll / gesture) since
                            // we only want this to perform a drawing
                            // operation on the canvas.
                            return(false);
                        }
                );

                $('img[src$="pen_black.png"]').click(function () {
                    console.log('검정');
                    penColor = 'black';
                })

                $('img[src$="pen_red.png"]').click(function () {
                    penColor = 'red';
                })

                $('img[src$="pen_blue.png"]').click(function () {
                    penColor = 'blue'
                })
                var count=0;
                var order=<?php echo $_GET['count']?>;
                var title="<?php echo $_GET['learn'];?>";
                var SubType;
                var WhatToLearn;
                console.log(title);
                switch(title){
                    case 'in':                   
                        btn(ppl);
                        WhatToLearn = ppl;
                        SubType = "ppl";
                        break;
                    case 'dong':
                        btn(ani);
                        WhatToLearn = ani;
                        SubType = "ani";
                        break;
                    case 'um':
                        btn(food);
                        WhatToLearn = food;
                        SubType = "food";
                        break;
                    case 'sa':
                        btn(obj);
                        WhatToLearn = obj;
                        SubType = "obj";
                        break;
                         
                }

                function btn(data){ 
                    var len=data[order].length; // 첫번째 단어 길이.                   
//                    var word=new Object(); // 파싱한 단어 담을곳 
                    var cha=new Array(); // 단어 글자 하나씩 파싱.
                    var i=0;
                    
                        for(; i<len;i++){ // 파싱 
                            cha[i]=data[order].substring(i,i+1);                            
                        }
                        $("h1").text(cha[0]);
                        for(i=0;i<cha.length;i++){
                            if(i==0){
                                $("p").html('<strong>'+cha[0]+'</strong>');
                            }
                            else{
                                $('p').append(cha[i]);
                            }
                            
                        }
                        
                      if(cha.length==1){
                              $('img[src$="btn_next.png"]').css('display','none');
                        }      
                    $('img[src$="btn_next.png"]').click(function (){
                        pen.clearRect(0, 0, 1024, 1024);
                        count++;
                        var str='';
                        $('h1').text(cha[count]);
                        for(i=0;i<cha.length;i++){
                            if(i==count)
                                str+='<strong>'+cha[count]+'</strong>';
                            else
                                str+=cha[i];
                            
                            $("p").html(str);
                        }
                        
                        if(count>0){
                              $('img[src$="btn_prev.png"]').css('display','initial');
                        }

                        if(cha.length-1==count){
                              $('img[src$="btn_next.png"]').css('display','none');
                        }                   
                    });

                    $('img[src$="btn_prev.png"]').click(function (){
                        pen.clearRect(0, 0, 1024, 1024);
                        count--;
                        var str='';
                        $('h1').text(cha[count]);
                        for(i=0;i<cha.length;i++){
                            if(i==count)
                                str+='<strong>'+cha[count]+'</strong>';
                            else
                                str+=cha[i];
                            
                            $("p").html(str);
                        }

                        if(count==0){
                            $('img[src$="btn_prev.png"]').css('display','none');
                        }else{
                            $('img[src$="btn_prev.png"]').css('display','inital');
                        }

                        if(cha.length-1 != count){
                            $('img[src$="btn_next.png"]').css('display','initial');
                        }
                    })
               }
               
               $("img[src$='home.png']").click(function(){
                    location.href='./learn2.php?count='+order+'&learn='+title;
               })
            });

        </script>
    </head>
    <body>
        <div id="container">
            <img src='./asset/images/06_2.png'>
            <div id='example'>
                <!--<img src='./asset/images/06_1.png'>-->
                <h1></h1>
                <h2></h2>
                <p></p>
                
            </div>

            <img src='./asset/images/speaker.png'>
            <img src='./asset/images/pen_black.png'>
            <img src='./asset/images/pen_red.png'>
            <img src='./asset/images/pen_blue.png'>

                <img src='./asset/images/home.png'>

            
            <img src="./asset/images/btn_prev.png" class="leftBottomButton smallButton"/>
            <img src="./asset/images/btn_next.png" class="rightBottomButton smallButton"/>

            <canvas id='canvas' width="470" height="590"></canvas>
        </div>
        
    </body>
</html>
