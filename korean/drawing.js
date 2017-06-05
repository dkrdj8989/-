            var count = 0;
            var consonant = ['기역', '니은', '디귿', '리을', '미음'];
            var vowel = ['아', '야', '어', '여', '우'];
            var ch = ['가', '나', '다', '라', '마'];
            var sx, sy, drawing;
            var canvas = document.getElementById('canvas');
            var ctx = canvas.getContext('2d');
            ctx.lineCap = "round";
            ctx.strokeStyle = 'black';

            //현재위치 저장
            canvas.onmousedown = function (e) {
                e.preventDefault();
                sx = canvasX(e.clientX);
                sy = canvasY(e.clientY);
                drawing = true;
            }

            // 현재 위치에서 새로 이동한 곳까지 선을 그린다.
            canvas.onmousemove = function (e) {

                if (drawing) {
                    e.preventDefault();
                    ctx.beginPath();

                    // 선 굵기
                    ctx.lineWidth = 5;
                    ctx.moveTo(sx, sy);
                    console.log('moveto sx:' + sx + "  sy:" + sy);
                    sx = canvasX(e.clientX);
                    sy = canvasY(e.clientY);
                    ctx.lineTo(sx, sy);
                    console.log('lineto sx:' + sx + "  sy:" + sy);
                    ctx.stroke();
                }
            }

            // 그리기를 종료한다.
            canvas.onmouseup = function (e) {
                drawing = false;
            }

            // 모두 지우기
//            var btnclear = document.getElementById("clear");
//            btnclear.onclick = function (e) {
//                ctx.clearRect(0, 0, canvas.width, canvas.height);
//            }

            function canvasX(clientX) {
                var bound = canvas.getBoundingClientRect();
                var bw = 5;
                return (clientX - bound.left - bw) * (canvas.width / (bound.width - bw * 2));
            }

            function canvasY(clientY) {
                var bound = canvas.getBoundingClientRect();
                var bw = 5;
                return (clientY - bound.top - bw) * (canvas.height / (bound.height - bw * 2));
            }
            function blackcolor() {
                ctx.strokeStyle = 'black';
                console.log('빨강');
            }
            ;
            function redcolor() {
                ctx.strokeStyle = 'red';
                console.log('빨강');
            }
            ;
            function bluecolor() {
                ctx.strokeStyle = 'blue';
            }
            ;
            $("#home_button").click(function () {
                location.href = "play1.html";
            })