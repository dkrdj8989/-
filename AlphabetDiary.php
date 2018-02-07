<html>
    <head>
        <title>한글공부</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"/>
        <title>한글공부</title>
        <link rel="stylesheet" href="./asset/styles/normalize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/customize.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/addon.css" type="text/css"/>
        <link rel="stylesheet" href="./asset/styles/hangul.css" type="text/css"/>
        <style>
            img[src$='home.png']{
                position: absolute;
                width: 140px;
                height: 140px;
                top: 40px;
                left: 30px;
                z-index: 2;
            }
            a{
                font-size: 0;
            }

            img[src$='08_1.png']{
                position: absolute;
                top: 150px;
                left: 70px;
                width: 400px;
                height: 555px;
            }
            img[src$='08_2.png']{
                position: absolute;
                top: 150px;
                left: 560px;
                width: 400px;
                height: 555px;
            }
            svg{
                width:1020px;
            }
            .bb-axis-y > .tick tspan{
                display: none !important;
            }
        </style>

        <script src="https://d3js.org/d3.v4.min.js"></script>

        <script type="text/javascript" src="https://naver.github.io/billboard.js/release/latest/dist/billboard.pkgd.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://naver.github.io/billboard.js/release/latest/dist/billboard.min.css"/>
    </head>
    <body>
        <div id="container">
            <a href="./home.php">
                <img src="./asset/images/home.png" class="">
                홈
            </a>

            <div id="chart" style="width: 1000px;top: 270px;"></div>  
            <script type="text/javascript">
                
                <?php
                    include 'php\pullGrades.php';
                    
                    $time = date("Y-m-d", strtotime("-1 week"));
                    $x = array("x");
                    $i=6;
                    for($i;$i!=-1;$i--){
                        array_push($x, $time);
                        $time = date("Y-m-d", strtotime(-($i)." day"));
                    }
                    $time = date("Y-m-d", strtotime("now"));
                    array_push($x, $time);
                    $arrayX = array($x);
                    $arrayY = array($y);
                ?>
                var x = <?php echo json_encode($arrayX); ?>;
                var y = <?php echo json_encode($arrayY); ?>;
                console.log(x[0]);
                console.log(y[0]);
                var chart = bb.generate({
                    "data": {
                        "x": "x",
                        "columns": [
                            x[0],
                            y[0],
                        ]
                    },
                    "axis": {
                        "x": {
                            "type": "timeseries",
                            "tick": {
                                "format": "%Y-%m-%d"
                            }
                        }
                    },
                    "bindto": "#chart"
                });
            </script>
        </div>
    </body>
</html>
