$(document).ready(function(){
    //________餐廳與團渲染______________
 
    $.ajax({
        url: './home_second_screen.php',
        type: 'GET',
        dataType: 'json',
        success(data) {
            console.log(data);
            var resData = data[0];
            var groupData1 = data[1];
       
            //餐廳渲染
            for(let i=0; i<5; i++){
                $('.container').append(
                `
                <div class="store" id="store${i+1}">
                <a href="http://140.115.236.71/demo-projects/ED103/ED103G4/singlerestaurant.html?RES_NO=${resData[i].RES_NO}"><img src="./image/${resData[i].RES_IMAGE1}" alt="#"></a>
                <h4>${resData[i].RES_NAME}</h4>
                <input type="hidden" value="${resData[i].RES_NO}">
                </div>
                `
                )
            }

            console.log(groupData1);
            //一開始的美食團渲染        
            for(let j=0; j<4 && groupData1.length; j++){
                $('.fourTeam').append(
                `
                <div class="team team_${j+1}">
                    <div class="content">
                        <p class="group_no" style="display: none;">${groupData1[j].GROUP_NO}</p>
                        <p>團主：${groupData1[j].MEMBER_NAME}</p>
                        <p>團名：${groupData1[j].GROUP_NAME}</p>
                        <p>用餐日期：${groupData1[j].dMT}</p>
                        <p>用餐時間：${groupData1[j].hmMT}</p>
                    </div>
                    <button class="btn_5 btn_js">
                        參加 &#9658 
                        <span></span>
                    </button>
                </div>
                `
                )
            }
            left();  
            clickImg3();    
        },
    });
});


//左右鍵
var storeContainer = document.getElementById("storeContainer");
var Rarrow = document.getElementById("Rarrow");
var Larrow = document.getElementById("Larrow");

//右鍵
Rarrow.addEventListener("click",function(){
    let Res_NO = storeContainer.querySelectorAll('div input');
    var aaa=Res_NO[1].value;
    console.log(aaa);
    var s2nd = storeContainer.getElementsByTagName("div")[0];
    var last = storeContainer.getElementsByTagName("div")[4];
    storeContainer.insertBefore( last,s2nd);
   //美食團渲染
    $.ajax({
        url: 'home_second_screen.php',
        type: 'GET',
        data:{
            RES_NO:aaa
        },
        dataType: 'json',
        complete(data) {
            console.log(data);
        
            let groupData1=JSON.parse(data.responseText)[1];
            console.log(groupData1);

            $('.fourTeam').empty();
            for(let j=0; j<4 && j<groupData1.length; j++){
                $('.fourTeam').append(
                `
                <div class="team team_${j+1}">
                    <div class="content">
                    <p class="group_no" style="display: none;">${groupData1[j].GROUP_NO}</p>
                    <p>團主：${groupData1[j].MEMBER_NAME}</p>
                        <p>團名：${groupData1[j].GROUP_NAME}</p>
                        <p>用餐日期：${groupData1[j].dMT}</p>
                        <p>用餐時間：${groupData1[j].hmMT}</p>
                    </div>
                    <button class="btn_5 btn_js">
                        參加 &#9658 
                        <span></span>
                    </button>
                </div>
                `
                )
            }
        //點擊美食團跳燈箱
        $('.btn_5').on('click', function() {             
            var groupNo=this.previousSibling.previousSibling.children[0].innerText;       
            $.ajax({
                url: 'home_fourTeam.php',
                type: 'GET',
                data: {
                    groupNo: groupNo
                },
                dataType: 'json',
                success(data) {
                    $('.chu_header').css('display','none');
                    var foodGroupBox = data[1];
                    $('.chu_box_row').empty();
                    $('.chu_box_row').append(`
                    <div class="box3_row_left">
                        <div class="main_img">
                            <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE1}">
                        </div>
                        <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE1}">
                        <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE2}">
                        <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE3}">
                        <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE4}">
                    </div>
                    <div class="box3_row_right">
                        <div>
                            <div class="chu_collection">           
                                <span>收藏</span> 
                                <span class="collect_status" style="display:none"></span>                        
                                <img src="./image/den_image/fourth_screen_redHollowHeart.png">
                            </div>
                            <br>
                            <h3>團號：</h3>
                            <h3 class="groupNo">${foodGroupBox[0].GROUP_NO}</h3>
                            <br>
                            <h3>團名：</h3>
                            <h3>${foodGroupBox[0].GROUP_NAME}</h3>
                            <br>
                            <h3>店名：</h3>
                            <h3>${foodGroupBox[0].RES_NAME}</h3>
                            <br>
                            <h6>${foodGroupBox[0].KIND_NAME}</h6>
                            <h6>${foodGroupBox[0].STYLE_NAME}</h6>
                            
                        </div>
                        <div>
                            <h3>開團團主：</h3>
                            <h3>${foodGroupBox[0].MEMBER_NAME}</h3>
                            <br>
                            <div class="den_groupPeople">
                                <h3>目前人數：</h3>
                            </div>                               
                            <h3>用餐時間：</h3>
                            <h3>${foodGroupBox[0].MEAL_TIME}</h3>
                            <br>
                        </div>
                        <div>
                            <h3>店家資訊</h3>
                            <br>
                            <h3>地址：</h3>
                            <h3>${foodGroupBox[0].RES_ADDRESS}</h3>
                            <a href="">
                                <img src="" alt="">
                            </a>
                            <br>
                            <h3>電話：</h3>
                            <h3>${foodGroupBox[0].RES_TEL}</h3>
                            <br>
                            <h3>營業時間：</h3>
                            <h3>${foodGroupBox[0].RES_START}-${foodGroupBox[0].RES_CLOSE}</h3>
                        </div>
                    </div>
                    `)
                    $('.chu_box').css('display', 'block');
                    $('.box_background').css('display', 'block');
                    clickImg3(); 
                    //執行收藏功能
                    collection(`${foodGroupBox[0].GROUP_NO}`);

                    //目前加入的人
                    let groupNo = $('.groupNo').text();
                    $.ajax({
                        url: './home_second_screen_friend.php',
                        data: {
                            groupNo: groupNo,
                        },
                        type: 'GET',
                        dataType: 'json',
                        success(data) {
                            let memberName = data;
                            console.log(memberName);

                            for (let i = 0; i < memberName.length; i++) {
                                $('.box3_row_right div:nth-child(2) .den_groupPeople').append(
                                    `                                      
                                <div>
                                    <p>${memberName[i].MEMBER_NAME}</p>
                                    <img src="./image/den_image/user-plus-solid.svg">
                                    <p class="friendNO" style="display:none">${memberName[i].FRIEND}</p>
                                </div>
                               
                                `)
                            }
                            //加入好友
                            $('.den_groupPeople div').on('click', function() {
                                let friendNo = $(this).children()[2].innerText;
                                let memberNoNum1 = $('.memberNoNum1').text();
                                $('.den_true_box_friend').css('display', 'block');
                                //    確認鈕
                                if ($('#spanLogin').text() == '登出') {
                                    $('.friend_yes').on('click', function() {
                                        $('.den_true_box_friend').css('display', 'none');
                                        let groupNo3 = $('.groupNo').text();
                                        // let friendNo = $(this).children()[2].innerText;
                                        $.ajax({
                                            url: './open_group_friends.php',
                                            data: {
                                                friendNo: friendNo,
                                                memberNoNum1: memberNoNum1,
                                            },
                                            type: 'GET',
                                            dataType: 'json',
                                        });
                                    });
                                    $('.friend_no button').on('click', function() {
                                        $('.den_true_box_friend').css('display', 'none');
                                    });
                                } else if ($('#spanLogin').text() == '登入') {
                                    // alert('請先登入喔');
                                    $('.den_true_box_friend').css('display', 'none');
                                    $('.den_box3').css('display', 'none');
                                    $('.section_res').css('display', 'block');
                                    $('.box_background').css('display', 'block');
                                }
                            });
                        }
                    });
                    clickImg3();                         
                }              
            });

            $('.chu_box_button button').on('click',function(){
                //第三個燈箱參團button
                if ($('#spanLogin').text() == '登出') {
                    // let memNo = $('.memberNoNum1').text();
                    let groupNo3 = $('.groupNo').text();
                    $.ajax({
                        url: './home_second_screen_join.php',
                        data: {
                            // memNo: memNo,
                            groupNo3: groupNo3,
                        },
                        type: 'GET',
                        dataType: 'JSON',
                    });
                    $('.chu_box').css('display', 'none');
                    $('.box_background').css('display', 'none');
                    $('.den_true_box_join').css('display', 'block');
                    console.log()
                } else {
                    // alert('請先登入~~');
                    $('.section_res').css('display', 'block');
                    $('.chu_box').css('display', 'none');
                    $('.box_background').css('display', 'none');
                }
            });
        });
    //--------------------------      
        }
    });   

});


//左鍵
function left(){ 
    var first = document.getElementById("store1");
    var second = document.getElementById("store2");
    var third = document.getElementById("store3");
    var fourth = document.getElementById("store4");
    var fifth = document.getElementById("store5");
    var imgArr = [first,second,third,fourth,fifth];
    var index = 0;

    Larrow.addEventListener("click",function(){
        // alert('123');
        storeContainer.appendChild(imgArr[index]);
        index++
        if(index > 4){
            index = 0;
        }
        let Res_NO = storeContainer.querySelectorAll('div input');
        var bbb=Res_NO[2].value;
        console.log(bbb);
   //美食團渲染
        $.ajax({
            url: 'home_second_screen.php',
            type: 'GET',
            data:{
                RES_NO:bbb
            },
            dataType: 'json',
            complete(data) {
                let groupData2=JSON.parse(data.responseText)[1];
                console.log(groupData2);
                $('.fourTeam').empty();
    
                for(let j=0; j<4 && j<groupData2.length; j++){
                    $('.fourTeam').append(
                    `
                    <div class="team team_${j+1}">
                        <div class="content">
                        <p class="group_no" style="display: none;">${groupData2[j].GROUP_NO}</p>
                            <p>團主：${groupData2[j].MEMBER_NAME}</p>
                            <p>團名：${groupData2[j].GROUP_NAME}</p>
                            <p>用餐日期：${groupData2[j].dMT}</p>
                            <p>用餐時間：${groupData2[j].hmMT}</p>
                        </div>
                        <button class="btn_5 btn_js">
                            參加 &#9658 
                            <span></span>
                        </button>
                    </div>
                    `
                    )
                }
                //點擊美食團跳燈箱
                $('.btn_5').on('click', function() {             
                    var groupNo=this.previousSibling.previousSibling.children[0].innerText;       
                    $.ajax({
                        url: 'home_fourTeam.php',
                        type: 'GET',
                        data: {
                            groupNo: groupNo
                        },
                        dataType: 'json',
                        success(data) {
                            $('.chu_header').css('display','none');
                            var foodGroupBox = data[1];
                            $('.chu_box_row').empty();
                            $('.chu_box_row').append(`
                            <div class="box3_row_left">
                                <div class="main_img">
                                    <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE1}">
                                </div>
                                <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE1}">
                                <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE2}">
                                <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE3}">
                                <img src="./image/restaurant_management_img/${foodGroupBox[0].RES_IMAGE4}">
                            </div>
                            <div class="box3_row_right">
                                <div>
                                    <div class="chu_collection">           
                                        <span>收藏</span> 
                                        <span class="collect_status" style="display:none"></span>                        
                                        <img src="./image/den_image/fourth_screen_redHollowHeart.png">
                                    </div>
                                    <br>
                                    <h3>團號：</h3>
                                    <h3 class="groupNo">${foodGroupBox[0].GROUP_NO}</h3>
                                    <br>
                                    <h3>團名：</h3>
                                    <h3>${foodGroupBox[0].GROUP_NAME}</h3>
                                    <br>
                                    <h3>店名：</h3>
                                    <h3>${foodGroupBox[0].RES_NAME}</h3>
                                    <br>
                                    <h6>${foodGroupBox[0].KIND_NAME}</h6>
                                    <h6>${foodGroupBox[0].STYLE_NAME}</h6>
                                    
                                </div>
                                <div>
                                    <h3>開團團主：</h3>
                                    <h3>${foodGroupBox[0].MEMBER_NAME}</h3>
                                    <br>
                                    <div class="den_groupPeople">
                                        <h3>目前人數：</h3>
                                    </div>                               
                                    <h3>用餐時間：</h3>
                                    <h3>${foodGroupBox[0].MEAL_TIME}</h3>
                                    <br>
                                </div>
                                <div>
                                    <h3>店家資訊</h3>
                                    <br>
                                    <h3>地址：</h3>
                                    <h3>${foodGroupBox[0].RES_ADDRESS}</h3>
                                    <a href="">
                                        <img src="" alt="">
                                    </a>
                                    <br>
                                    <h3>電話：</h3>
                                    <h3>${foodGroupBox[0].RES_TEL}</h3>
                                    <br>
                                    <h3>營業時間：</h3>
                                    <h3>${foodGroupBox[0].RES_START}-${foodGroupBox[0].RES_CLOSE}</h3>
                                </div>
                            </div>
                            `)
                            $('.chu_box').css('display', 'block');
                            $('.box_background').css('display', 'block');
                            clickImg3(); 
                            //執行收藏功能
                            collection(`${foodGroupBox[0].GROUP_NO}`);

                            //加入的好友
                            let groupNo = $('.groupNo').text();
                            $.ajax({
                                url: './home_second_screen_friend.php',
                                data: {
                                    groupNo: groupNo,
                                },
                                type: 'GET',
                                dataType: 'json',
                                success(data) {
                                    let memberName = data;
                                    console.log(memberName);
                                    for (let i = 0; i < memberName.length; i++) {
                                        $('.box3_row_right div:nth-child(2) .den_groupPeople').append(
                                            `                                      
                                        <div>
                                            <p>${memberName[i].MEMBER_NAME}</p>
                                            <img src="./image/den_image/user-plus-solid.svg">
                                            <p class="friendNO" style="display:none">${memberName[i].FRIEND}</p>
                                        </div>                             
                                        `)
                                    }
                                    //加入好友
                                    $('.den_groupPeople div').on('click', function() {
                                        let friendNo = $(this).children()[2].innerText;
                                        let memberNoNum1 = $('.memberNoNum1').text();
                                        $('.den_true_box_friend').css('display', 'block');
                                        //    確認鈕
                                        if ($('#spanLogin').text() == '登出') {
                                            $('.friend_yes').on('click', function() {
                                                $('.den_true_box_friend').css('display', 'none');
                                                let groupNo3 = $('.groupNo').text();
                                                // let friendNo = $(this).children()[2].innerText;
                                                $.ajax({
                                                    url: './open_group_friends.php',
                                                    data: {
                                                        friendNo: friendNo,
                                                        memberNoNum1: memberNoNum1,
                                                    },
                                                    type: 'GET',
                                                    dataType: 'json',
                                                });
                                            });
                                            $('.friend_no button').on('click', function() {
                                                $('.den_true_box_friend').css('display', 'none');
                                            });
                                        } else if ($('#spanLogin').text() == '登入') {
                                            // alert('請先登入喔');
                                            $('.den_true_box_friend').css('display', 'none');
                                            $('.den_box3').css('display', 'none');
                                            $('.section_res').css('display', 'block');
                                            $('.box_background').css('display', 'block');
                                        }
                                    });
                                }
                            });
                            clickImg3();                         
                        }              
                    });
                    //第三個燈箱參團button
                    $('.chu_box_button button').on('click',function(){       
                        if ($('#spanLogin').text() == '登出') {
                            // let memNo = $('.memberNoNum1').text();
                            let groupNo3 = $('.groupNo').text();
                            $.ajax({
                                url: './home_second_screen_join.php',
                                data: {
                                    // memNo: memNo,
                                    groupNo3: groupNo3,
                                },
                                type: 'GET',
                                dataType: 'JSON',
                            });
                            $('.chu_box').css('display', 'none');
                            $('.box_background').css('display', 'none');
                            $('.den_true_box_join').css('display', 'block');
                            console.log()
                        } else {
                            // alert('請先登入~~');
                            $('.section_res').css('display', 'block');
                            $('.chu_box').css('display', 'none');
                            $('.box_background').css('display', 'none');
                        }
                    });
                });

                $('.leave_btn').on('click',function(){
                    $('.chu_box').css('display', 'none');
                    $('.box_background').css('display', 'none');
                    $('.chu_header').css('display','block');
                }); 
                //--------------------------
                // getNewGroup();
                //--------------------------
            }
        });
    },false);
    Larrow.click();   
    // clickImg3();
}

 //第三個燈箱圖片點擊
 function clickImg3() {
    // console.log(1);
    $('.box3_row_left > img').not('.box3_row_left > img:nth-child(2)').addClass('togray');
    $('.box3_row_left > img').on('click', function() {
        $('.main_img img').attr('src', `${$(this).attr('src')}`);
        $('.box3_row_left > img').addClass('togray');
        $(this).removeClass('togray');
    });
}
        //美食團收藏
        function collection(groupNo) {
            console.log('1----', groupNo);
            $.ajax({
                url: './open_group_join_collection.php',
                type: 'GET',
                dataType: 'JSON',
                success(data) {
                    let memberNoNum1 = $('#memberNoNum').text();
                    // console.log('2----', memberNoNum1);
                    console.log(data);
                    for (let i = 0; i < data.length; i++) {
                        if (data[i].MEMBER_NO == memberNoNum1 && data[i].GROUP_NO == groupNo) {
                            //有收藏
                            $('.chu_collection img').attr('src', './image/den_image/fourth_screen_redHeart.png');
                            $('.collect_status').text('1');
                            break;
                        } else {
                            //沒收藏
                            $('.chu_collection img').attr('src', './image/den_image/fourth_screen_redHollowHeart.png');
                            $('.collect_status').text('2');
                        }
                    }
                }
            });

            var toggle1 = true;
            $('.chu_collection img').click(function() {
                let aaa = $('#spanLogin').text();
                var memberNoNum1 = $('#memberNoNum').text();
                console.log(groupNo);
                if (aaa == '登出') {
                    if ($('.collect_status').text() == '1') {
                        //這裡是紅色愛心變成黑色愛心的地方
                        $('.chu_collection img').attr('src', './image/den_image/fourth_screen_redHollowHeart.png');
                        $('.collect_status').empty();
                        $('.collect_status').append('2');
                        // alert('取消收藏');
                        $.ajax({
                            url: './open_group_delete_collection.php',
                            type: 'GET',
                            data: {
                                memberNoNum1: memberNoNum1,
                                groupNo: groupNo
                            },
                            dataType: 'JSON',
                        });
                    } else if ($('.collect_status').text() == '2') {
                        // 這裡是黑色愛心變成紅色愛心的地方
                        $('.chu_collection img').attr('src', './image/den_image/fourth_screen_redHeart.png');
                        $('.collect_status').empty();
                        $('.collect_status').append('1');
                        // alert('收藏完成');
                        $.ajax({
                            url: './open_group_join_collection.php',
                            type: 'GET',
                            data: {
                                memberNoNum1: memberNoNum1,
                                groupNo: groupNo
                            },
                            dataType: 'JSON',
                        });
                    }
                }
                if (aaa == '登入') {
                    // alert('請先登入會員~~');
                    $('.section_res').css('display', 'flex');
                }
            });
        }



    

