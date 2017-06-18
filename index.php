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
            #container {
                background-position: 0 -425px;
            }
            
            img[src$="bg_index.png"] {    
                width: 100%;
                margin-top: 340px;
            }
            
            img[src$="h_text1.png"] {
                position: absolute;
                top: 40px;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 560px;
            }
            
            img[src$="h_text2.png"] {
                position: absolute;
                top: 120px;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 670px;
                padding-right: 210px;
            }
            
            img[src$="h_text3.png"] {
                position: absolute;
                top: 200px;
                left: 0;
                right: 0;
                margin: 0 auto;
                width: 630px;
                padding-left: 450px;
            }
            
            a,
            img[src$="btn_start1.png"] { 
                display: block;
                width: 320px;
                height: 395px;
                position: absolute;
                bottom: 80px;
                left: 0;
                right: 0;
                margin: 0 auto;  
            }
            
            img[src$="btn_start2.png"] { 
                display: none;
                width: 580px;
                position: absolute;
                bottom: 80px;
                left: 0;
                right: 0;
                margin: 0 auto;  
            }
        </style>
        
        <script src="./asset/scripts/jquery-1.11.1.min.js"></script>
        <script>
            $(document).ready(function () {
                
                $('a').click(function (event) {
                    event.preventDefault();
                    
                    var href = $(this).attr('href');
                    
                    $('img[src$="btn_start1.png"]').fadeOut(2000);
                    
                    $('img[src$="btn_start2.png"]')
                        .fadeIn(
                            2000, 
                            function () {
                                window.location.href = href;
                            });
                })
            })
        </script>
    </head>
    <body>
        <div id="container">
            
            <img src="./asset/images/bg_index.png"/>
            
            <img src="./asset/images/h_text1.png"/>
            <img src="./asset/images/h_text2.png"/>
            <img src="./asset/images/h_text3.png"/>
            
            
            <img src="./asset/images/btn_start1.png"/>
            <img src="./asset/images/btn_start2.png"/>

            <a href="./menu.php"></a>
        </div>
    </body>
</html>