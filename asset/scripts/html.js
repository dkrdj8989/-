function css(count){
    switch(count){
        case 1 :
            $("#question").css('display','none');
            $("#layer1").css('top','170px');
            $("#layer1").css('display','initial');
            
            $("#layer1-left").css({
                'height':'540px',
                'padding-left':'30px',
                'width':'230px'
            });
            
            $("#layer1-right").css({
                'height':'540px',
                'padding-right':'55px',
                'width':'230px'
            });
            
            $("#layer1-left > li").css({
                "width": "100%",
                "height": "113px",
                'margin-top':'18px',
                'margin-bottom':'0'
            });
            
            $("#layer1-right > li").css({
                "width": "100%",
                "height":"25%",
                "margin-bottom":"0"
            });            
            break;
        
        case 3:
            $("#layer1").css('display','none');
            $("#layer3").css('display','initial');
            
            $("#layer3-left").css({
                'height':'538px',
                'padding-left':'30px',
                'width':'230px',
                'padding-top': '20px'
            });
            
            $("#layer3-right").css({
                'height':'538px',
                'padding-right':'55px',
                'width':'230px',
                'padding-top': '20px'
            });
            
            $("#layer3-left > li").css({
                "width": "100%",
                "height": "20%",
                'margin-bottom':'0'
            });
            
            $("#layer3-right > li").css({
                "width": "100%",
                "height":"20%",
                "margin-bottom":"0"
            });   
            break;
            
            case 4:
                $("#layer3").css('display','none');
                break;
            case 5:
                $("#layer5").css('display','initial');
                break;
                
            case 6:
                $("#layer5").css('display','none');
                $("#layer6").css('display','initial');
                $("#layer6-right").css('padding-top','20px');
                $("#layer6-left").css('padding-top','20px');
                break;
                
           case 7:
                $("#layer6").css('display','none');
                $("#layer3").css('display','initial');
                break;     
    }   
}


function reverse(count){
    switch(count){
        case 0 :
            $("#question").css('display','initial');
            $("#layer1").css('display','none');
            break;
        case 1 :
            $("#question").css('display','none');
            $("#layer3").css('display','none'); 
            $("#layer1").css('display','initial');     
            break;
        case 2:
            $("#layer3").css('display','none'); 
            $("#layer1").css('display','initial');
            break;
        case 3:
            $("#layer1").css('display','none');
            $("#layer6").css('display','none');
            $("#layer3").css('display','initial');   
            break;
                
            case 6:
                $("#layer6").css('display','initial');
                $("#layer3").css('display','none');
                break;
                
           case 7:

                break;     
    }   
}

function check(linemap,num,c){
    var questions = [ [0,1,2],[1,3,0,2],[1,0,3,2],[2,1,0,4,3],[1,2,0],[1,2,0,4,3],[2,0,4,1,3],[2,4,0,1,3] ];
    var count=0;
    var i=0;
    var length = Object.keys(linemap).length;
   
    if(c >= 6)
        c -=2;

    for(i; i<length; i++){
         console.log(c);
        if(linemap[i] == questions[c][i])
        {
            count++;
        }
    }
    console.log(count);
    if(count == num){
        console.log('정답입니다');
        StockInDb();
    }else{
        console.log("정답ㄴ");
    }
}
 

    


    


