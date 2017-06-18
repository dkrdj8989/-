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
                width: 110px;
                left: 920px;

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
            #follow{
                position: absolute;
                top: 50px;
                left: 480px;
                width: 470px;
                height: 590px;
            }
            #followImg{
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                margin: auto;
                position: absolute;
            }
        </style>

        <script type="text/javascript" src="./asset/scripts/jquery-1.11.1.min.js"></script> 
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
                var con = ['ㄱ', 'ㄴ', 'ㄷ', 'ㄹ', 'ㅁ'];
                var fullCon = ['기역', '니은', '디귿', '리을', '미음'];
                var vo = ['ㅏ', 'ㅑ', 'ㅓ', 'ㅕ', 'ㅗ'];
                var fullVo = ['아', '야', '어', '여', '오'];
                var ch = ['가', '나', '다', '라', '마'];
                var ppl = ['나', '너', '우리', '친구', '선생님'];
                var ani = ['여우', '너구리', '오소리', '오리', '사자'];
                var food = ['가지', '도토리', '레몬', '사과', '자두'];
                var obj = ['구두', '지우개', '모자', '바지', '바구니'];
                var imgCon = ['09-01', '09-02', '09-03', '09-04', '09-05'];
                var imgVo = ['09-06', '09-07', '09-08', '09-09', '09-10'];
                var imgCh = ['09-11', '09-12', '09-13', '09-14', '09-15'];
                var img;
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
                var count = 0;
                var title = "<?php echo $_GET['learn']; ?>";
                console.log(title);
                switch (title) {
                    case 'ja':
                        $('h1').text(con[count]);
                        $('h2').text(fullCon[count]);
                        img = imgCon;
                        btn(con, fullCon);
                        break;
                    case 'mo':
                        $('h1').text(vo[count]);
                        $('h2').text(fullVo[count]);
                        img = imgVo;
                        btn(vo, fullVo);
                        break;
                    case 'ga':
                        $('h1').text(ch[count]);
                        $('h2').text(ch[count]);
                        img = imgCh;
                        btn(ch, ch);
                        break;

                }
                $('#followImg').attr('src', './asset/images/' + img[count] + '.png');
                function btn(con, fullCon) {
                    $('img[src$="btn_next.png"]').click(function () {
                        pen.clearRect(0, 0, 1024, 1024);
                        count++;
                        $('h1').text(con[count]);
                        $('h2').text(fullCon[count]);
                        $('#followImg').attr('src', './asset/images/' + img[count] + '.png');
                        if (count > 0) {
                            $('img[src$="btn_prev.png"]').css('display', 'initial');
                        }

                        if (con.length - 1 == count) {
                            $('img[src$="btn_next.png"]').css('display', 'none');
                        }
                    });

                    $('img[src$="btn_prev.png"]').click(function () {
                        pen.clearRect(0, 0, 1024, 1024);
                        count--;
                        $('h1').text(con[count]);
                        $('h2').text(fullCon[count]);
                        $('#followImg').attr('src', './asset/images/' + img[count] + '.png');
                        if (count == 0) {
                            $('img[src$="btn_prev.png"]').css('display', 'none');
                        } else {
                            $('img[src$="btn_prev.png"]').css('display', 'inital');
                        }

                        if (con.length - 1 != count) {
                            $('img[src$="btn_next.png"]').css('display', 'initial');
                        }
                    })

//                    var img=new Image();
//                    img.src='./asset/images/arrow.png';
//                    pen.drawImage(img,145,15,43,25,300,50,100,100);

                }
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
            </div>

            <img src='./asset/images/speaker.png'>
            <img src='./asset/images/pen_black.png'>
            <img src='./asset/images/pen_red.png'>
            <img src='./asset/images/pen_blue.png'>
            <a href="./level1.php">
                <img src='./asset/images/home.png'>
            </a>
            <div id='follow'>
                <img id='followImg'>
            </div>
            <img src="./asset/images/btn_prev.png" class="leftBottomButton smallButton"/>
            <img src="./asset/images/btn_next.png" class="rightBottomButton smallButton"/>

            <canvas id='canvas' width="470" height="590"></canvas>
        </div>
    </body>
</html>
