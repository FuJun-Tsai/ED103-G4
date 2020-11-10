$(document).ready(function() {
    $.ajax({
        url: 'index_fourth_screen.php',
        type: 'GET',
        dataType: 'json',
        success(data) {
            var collectionData = data[0];
            var messageData = data[1];
            var sharingData = data[2];

            // console.log(data);
            // console.log(collectionData[0]);
            // console.log(messageData[0]);
            // console.log(sharingData[0]);


            $('.chu_row1').append(
            `
            <div class="chu_left">
                <div class="chu_left_icon1">
                    <img src="./image/member/${collectionData[0].MEMBER_IMAGE}" alt="">
                </div>
                <div class="chu_left_icon3">
                    <img class="heart" src="./image/index/fourth_screen_redHollowHeart.png" alt="">
                    <p>${collectionData[0].ARTICLE_LIKE}</p>
                    <p class="articleNo" style="display:none">${collectionData[0].ARTICLE_NO}</p>
                    <p></p>
                </div>
                <p class="chu_left_content"><img src="./image/index/fourth_screen_speaker.svg" alt="">${collectionData[0].ARTICLE_TITLE}</p>
                <span>＜最多收藏貼文＞</span>
                <div class="chu_left_icon2">
                    <img src="./image/index/arrow_right.svg" alt="">
                </div>
            </div>


            <div class="chu_center">
                <div class="chu_center_icon1">
                    <img src="./image/member/${messageData[0].MEMBER_IMAGE}" alt="">
                </div>
                <div class="chu_center_icon3">
                    <img src="./image/index/fourth_screen_comment.svg" alt="">
                    <p>${messageData[0].ARTICLE_LIKE}</p>
                </div>
                <p class="chu_center_content"><img src="./image/index/fourth_screen_speaker.svg" alt="">${messageData[0].ARTICLE_TITLE}</p>
                <span>＜最多留言貼文＞</span>
                <div class="chu_center_icon2">
                    <img src="./image/index/arrow_right.svg" alt="">
                </div>
            </div>
            `

            )

            var toggle1=true;
            $('.chu_left_icon3').click(function(){
                let aaa=$('#spanLogin').text();
                // console.log(aaa);
            if(aaa=='登出'){
                if(toggle1){
                $('.chu_left_icon3 img').attr('src','./image/index/fourth_screen_redHeart.png');
                toggle1=false;

                let ggg=parseInt($('.chu_left_icon3 p:nth-child(2)').text());
                console.log(ggg)
                $('.chu_left_icon3 p:nth-child(2)').text(ggg+1);
               
                // console.log(ggg);
                var articleNo=$('.articleNo').text()
                    console.log(articleNo);
                $.ajax({
                    url:'index_fourth_screen_HeartCollection_insert.php',
                    data:{
                        


                    },
                    type:'GET',
                    dataType:'JSON'
                });

                }else{
                $('.chu_left_icon3 img').attr('src','./image/index/fourth_screen_redHollowHeart.png');
                toggle1=true;
                let ggg=parseInt($('.chu_left_icon3 p:nth-child(2)').text());
                console.log(ggg)
                $('.chu_left_icon3 p:nth-child(2)').text(ggg-1);
                
                // $.ajax({

                // });

                }
            }
            if(aaa=='登入'){
                $('.section_res').css('display','flex');
            }
            });
            
            
        }
    });
});


//  <div class="chu_right">
// <div class="chu_right_icon1">
//     <img src="./image/member/${sharingData.MEMBER_IMAGE}" alt="">
// </div>
// <div class="chu_right_icon3">
//     <img src="./image/index/fourth_screen_share.svg" alt="">
//     <p>13</p>
// </div>
// <p class="chu_right_content"><img src="./image/index/fourth_screen_speaker.svg" alt=""> 爭鮮好好吃
// </p>
// <span>＜最多分享貼文＞</span>
// <div class="chu_right_icon2">
//     <img src="./image/index/arrow_right.svg" alt="">
// </div>
// </div> 




// $(".heart").click(function(){
                
//     if($('.heart').attr('src')=='./image/index/fourth_screen_redHollowHeart.png'){
//         $('.heart').attr('src','./image/index/fourth_screen_redHeart.png');
//     }

// });

// $(".heart").click(function(){
    
//     if($('.heart').attr('src')=='./image/index/fourth_screen_redHeart.png'){
//         $('.heart').attr('src','./image/index/fourth_screen_redHollowHeart.png');
//     }

// });

