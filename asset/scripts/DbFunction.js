function SaveInDb(content){
    console.log(content);
    $.ajax({
        type: 'POST',
        url: "./php/wordStoreProcess.php",
        data: {data: content},
        success: function (result) {
            if (result) {
                console.log('success!');
            } else {
                console.log('fail!');
            }
        }
    })
}

// 정답 저장
function StockInDb(){
    $.ajax({
        type: 'POST',
        url: "./php/checkProcess.php",
        data: {data: 1},
        success: function (result) {
            if (result) {
                console.log('success!');
            } else {
                console.log('fail!');
            }
        }
    })
}