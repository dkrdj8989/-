
var canvas, ctx,start=null,end;
var sx,sy,ex,ey;
var left1_position, left2_position, left3_position,
        right1_position, right2_position, right3_position;
var left_array = new Array();
var right_array = new Array();

document.getElementById('abc').setAttribute('value','리플투더문!');
window.onload = function () {
    canvas = document.getElementById('canvas');
    ctx = canvas.getContext("2d");
//    canvas.onmousedown = onmousedown;
//    draw();
    init();
    left1_position = $('#left1').offset();
    left2_position = $('#left2').offset();
    left3_position = $('#left3').offset();
    right1_position = $('#right1').offset();
    right2_position = $('#right2').offset();
    right3_position = $('#right3').offset();
}

function canvasX(X)
{
    return X - canvas.offsetLeft;
}
function canvasY(Y)
{
    return Y - canvas.offsetTop;
}

function onmousedown(e) {
    e.preventDefault();
    draw();
}
function stop(e) {
    e.preventDefault();
    e.stopPropagation();
    e.cancelBubble;
    e.cancelable;
}
function init() {
    left_array = [left(), left(), left()];
    right_array = [right(), right(), right()];
}
function left() {
    var left = {
        'on': false,
        'location': 'left',
        'match': false,
        'overlap': false,
        'x': null,
        'y': null
    };
    return left;
}
function right() {
    var right = {
        'on': false,
        'location': 'right',
        'match': false,
        'overlap': false,
        'x': null,
        'y': null
    };
    return right;
}
function draw() {
//    ctx.clearRect(0, 0, canvas.width, canvas.height);
//    ctx.beginPath();
//    ctx.arc(x, y, 15, 0, 2 * Math.PI);
//    ctx.fillStyle = "yellow";
//    ctx.fill();
//    ctx.strokeStyle = "red";
//    ctx.lineWidth = 3;
//    ctx.stroke();
    drawLine();
}
function drawLine(a) {
    if(!(start) || start==a.location){ // 비어있으면 시작 좌표 설정 
      start=a.location;
      sx=a.x;
      sy=a.y;
      console.log('비어있을때'+canvas.offsetLeft+" "+canvas.offsetTop);
  }
 
    if(start  != a.location){ // 반대편 버튼이 선택됬으면
      end=a.location;
      ex=a.x;
      ey=a.y;
       console.log('2번쨰 좌표'+ex+" "+ey);
  }
    if(sx && sy && ex && ey){
      ctx.beginPath();
      ctx.moveTo(sx,sy);
      ctx.lineTo(ex,ey);
      ctx.stroke();
      sx=null;sy=null;
      ex=null;ey=null;
    }
    
}



$('#left1').on('click', function (e) {
    left_array[0].on = true;
    left_array[1].on = false;
    left_array[2].on = false;

    left_array[0].x = 5;
    left_array[0].y = 10;

    drawLine(left_array[0]);

})
$('#left2').on('click', function (e) {
    left_array[0].on = false;
    left_array[1].on = true;
    left_array[2].on = false;

    left_array[1].x = 5;
    left_array[1].y = 61;
    drawLine(left_array[1]);
})
$('#left3').on('click', function (e) {
    left_array[0].on = false;
    left_array[1].on = false;
    left_array[2].on = true;

    left_array[2].x = 5;
    left_array[2].y = 112;
    drawLine(left_array[2]);
})
$('#right1').on('click', function (e) {
    right_array[0].on = true;
    right_array[1].on = false;
    right_array[2].on = false;

    right_array[0].x = 300;
    right_array[0].y = 10;
    drawLine(right_array[0]);
})
$('#right2').on('click', function (e) {
    right_array[0].on = false;
    right_array[1].on = true;
    right_array[2].on = false;
    
    right_array[1].x = 300;
    right_array[1].y = 61;
    drawLine(right_array[1]);
})
$('#right3').on('click', function (e) {
    right_array[0].on = false;
    right_array[1].on = false;
    right_array[2].on = true;
    
    right_array[2].x = 300;
    right_array[2].y = 112;
    drawLine(right_array[2]);
})

canvas = document.addEventListener('click', function (e) {
    console.log("x :" + e.layerX + "y :" + e.layerY);
});