<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- other -->
    <link rel="stylesheet" href="./sass/vender/other/hover-min.css">
    <!-- <link rel="stylesheet" href="./css/other/animation.css"> -->
    <!-- H&F -->
    <!-- <link rel="stylesheet" href="./css/head_footer_style.css"> -->
    <!-- kits -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="./css/btn_hover.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- <link rel="stylesheet" href="./css/bootstrap-grid.css"> -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>

    <script src="./js/btn_hover.js"></script>
    <script src="./js/bootstrap.js"></script>
    <script src="./js/header_fixed.js"></script>
    <!-- <link rel="stylesheet" href="./css/background.css"> -->
    <!-- local -->
    <!-- <link rel="stylesheet" href="./css/bootstrap/bootstrap_nopm.css"> -->
    <link rel="stylesheet" href="./css/allstyle.css">
    <!-- btn -->
    <link rel="stylesheet" href="./css/btn_hover.css">
    <script src="js/btn_hover.js"></script>

    <title>Document</title>
</head>

<body>
    <!-- 背景泡泡 -->
    <div id="bubbles">
        <div class="bubble x1"></div>
        <div class="bubble x2"></div>
        <div class="bubble x3"></div>
        <div class="bubble x4"></div>
        <div class="bubble x5"></div>
        <div class="bubble x6"></div>
        <div class="bubble x7"></div>
        <div class="bubble x8"></div>
        <div class="bubble x9"></div>
    </div>
    <header>
        <section>
            <div class="logo">
                <a href="./index.html">
                    <img src="./image/logoHeader.svg" alt="">
                </a>
            </div>
            <div class="nav">
                <ul>
                    <li class="hvr-pulse-grow">
                        <a href="./game.html"> 吃吃配對</a>
                    </li>
                    <li class="hvr-pulse-grow">
                        <a href="./searchrestaurant.html">餐廳介紹</a>
                    </li>
                    <li class="hvr-pulse-grow">
                        <a href="./share.html">吃貨分享</a>
                    </li>
                    <li class="hvr-pulse-grow">
                        <a href="./about_us.html">關於我們</a>
                    </li>
                    <li>
                        <a href="./open_group.html" class="hvr-pulse-grow"><button style="padding: 10px 20px;">揪團去!</button></a>
                    </li>
                </ul>
            </div>
            <div class="member">
                <div class="icon">
                    <a href="./login.html">
                        <img src="./image/icon.svg" alt="">
                    </a>
                </div>
                <a href="./login.html" class="hvr-pulse-grow"><span style="color: black;">登入</span></a>
            </div>
            <div id="menu-bar">
                <div id="menu" onclick="onClickMenu()">
                    <div id="bar1" class="bar"></div>
                    <div id="bar2" class="bar"></div>
                    <div id="bar3" class="bar"></div>
                </div>
                <ul class="nav1" id="nav1">
                    <div class="member">
                        <div class="icon">
                            <a href="./login.html">
                                <img src="./image/icon.svg" alt="">
                            </a>
                        </div>
                        <a href="./login.html" class="hvr-pulse-grow"><span style="color: black;">登入</span></a>
                    </div>
                    <li>
                        <a href="./game.html">吃吃配對</a>
                    </li>
                    <li>
                        <a href="./searchrestaurant.html">餐廳介紹</a>
                    </li>
                    <li>
                        <a href="./share.html"> 吃貨分享</a>
                    </li>
                    <li>
                        <a href="./about_us.html">關於我們</a>
                    </li>
                    <li>
                        <a href="./open_group.html" class="hvr-pulse-grow"><button>揪團去!</button></a>
                    </li>
                </ul>
            </div>
            <div class="menu-bg" id="menu-bg"></div>
        </section>
    </header>

    <!-- ***************************** -->

    <section>
        <input type="text" style="display:none;">
        <!-- <div class="back"></div>
       <div class="back"></div> -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="selection col-lg-8">

                        <input id="searchword" type="text" placeholder="美食快搜">
                        <button id="searchwordbtn">搜尋</button>

                        <label for="" class="kind">餐廳種類：
                        <label for="jap"><input type="checkbox" name="kind" id="jap" value="jap">日式</label>
                        <label for="usa"><input type="checkbox" name="kind" id="usa" value="usa">美式</label>
                        <label for="west"><input type="checkbox" name="kind" id="west" value="west">西式</label>
                        <label for="kor"><input type="checkbox" name="kind" id="kor" value="kor">韓式</label>
                        <label for="chi"><input type="checkbox" name="kind" id="chi" value="chi">中台</label>
                        <label for="sea"><input type="checkbox" name="kind" id="sea" value="sea">東南亞</label>
                        </label>

                        <label for="" class="style">料理風格：
                       <label for="pot"><input type="checkbox" name="style[]" id="pot" value="pot">火鍋</label>
                        <label for="bbq"><input type="checkbox" name="style[]" id="bbq" value="bbq">燒烤</label>
                        <label for="fried"><input type="checkbox" name="style[]" id="fried" value="fried">炸物</label>
                        <label for="stirfry"><input type="checkbox" name="style[]" id="stirfry" value="stirfry">快炒</label>
                        <label for="light"><input type="checkbox" name="style[]" id="light" value="light">簡餐</label>
                        <label for="steak"><input type="checkbox" name="style[]" id="steak" value="steak">排餐</label>
                        <label for="cold"><input type="checkbox" name="style[]" id="cold" value="cold">冷盤</label>
                        </label>
                        <!-- <button>熱門排序</button> -->
                        <!-- <button>收藏排序</button> -->
                        <!-- <div class="sort">
                           <div class="like"><img src="./image/Icon awesome-heart.png" alt="">收藏排續</div>
                           <div class="mess"><img src="./image/Icon feather-message-square.png" alt="">留言排序</div>
                           <div class="group"><img src="./image/Icon material-group.png" alt="">美食團排序</div>
                       </div> -->
                    </div>

                </div>
            </div>

            <div class="result">
                <div class="container">
                    <div class="row">
                        <div class="error" style="display: none;">似乎沒有匹配篩選的店家...換其他的搜尋條件吧~</div>
                    </div>
                </div>

                <div id="R1" class="rest container">
                    <div class="row">
                        <div class="rep col-lg-5">
                            <img src="./image/restaurant_management_img/牛篷牛排_1.jpg" alt="">
                        </div>
                        <div class="detail col-lg-7">
                            <h2>牛篷牛排店</h2>
                            <div class="kind west"></div>
                            <div class="style steak"></div>
                            <div class="record">
                                <div class="like"><i class="fas fa-heart"></i><span>23</span></div>
                                <div class="mess"><i class="far fa-comment-dots"></i><span>45</span></div>
                                <div class="group"><i class="fas fa-users"></i><span>300</span></div>
                            </div>
                            <h3>餐廳介紹：</h3>
                            <p id="rint">三月了，氣溫逐漸回升，儘管台北不是一個擅於開花的城市，卻也能嗅見春天的味道。春天來臨，就想著出遊踏青，然而不想跑得太遠，就從台北市裡挑選一間充滿綠意的小天地吧，Purrson Bistro 呼嚕小酒館，座落於木柵的小山坡，彷彿走進城市裡的森林。</p>
                            <h3>網友留言：</h3>
                            <div id="leavemessage" class="insearch">
                                <div id="L1" class="L">
                                    <img src="http://fakeimg.pl/60x60" alt="">
                                    <p>1231232313</p>
                                </div>
                                <div id="L2" class="L">
                                    <img src="http://fakeimg.pl/60x60" alt="">
                                    <p>1231232313</p>
                                </div>
                                <div id="L3" class="L">
                                    <img src="http://fakeimg.pl/60x60" alt="">
                                    <p>1231232313</p>
                                </div>
                                <div id="L4" class="L">
                                    <img src="http://fakeimg.pl/60x60" alt="">
                                    <p>1231232313</p>
                                </div>
                            </div>
                            <a href="./singlerestaurant.html"><button class="btnsingle btn_10 btn_js">詳細<span></span></button></a>
                            <div class="go">
                                <a href="./open_group.html"><button class="btnRed btn_3 btn_js">開團<span></span></button></a>
                                <a href=""><button class="btnBlue btn_4 btn_js">參團<span></span></button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <ul class="page">

            </ul>
        </div>

    </section>

    <!-- ***************************** -->
    <footer>
        <div class="footer">
            <h6>Copyright © 2020 食緣 All Rights Reserved</h6>
        </div>
    </footer>

    <!--hambuger-->
    <script>
        function onClickMenu() {
            document.getElementById("menu").classList.toggle("change");
            document.getElementById("nav1").classList.toggle("change");
            document.getElementById("menu-bg").classList.toggle("change-bg");
        }

        function onClickSubMenu() {
            document.getElementById("sub_menu").classList.toggle("change1");
            document.querySelector(".nav1>li:nth-child(1)").classList.toggle("none");
            document.querySelector(".nav1>li:nth-child(3)").classList.toggle("none");
            document.querySelector(".nav1>li:nth-child(4)").classList.toggle("none");
            document.querySelector(".nav1>li:nth-child(5)").classList.toggle("none");
        }
    </script>

    <!-- <script src="./js/searchrestaurant.js"></script> -->
    <script>
        
        $(document).ready(function(){
            let xdddd = '1498813777-3421484685_n.jpg'
            console.log(xdddd.length);
            conditionK = []; //kind搜尋條件
            conditionS = []; //style搜尋條件
            RK = []; //kind符合餐廳
            RS = []; //style符合餐廳
            show = []; //顯示的餐廳
            pages = Math.ceil($('.rest').length/4); //分頁
            index = 0; // 頁次


            $('.jap').text('日式');
            $('.usa').text('美式');
            $('.west').text('西式');
            $('.kor').text('韓式');
            $('.chi').text('中台');
            $('.sea').text('東南亞');

            $('.kind input').on('click',function(){
                if($(this).prop('checked')){
                    $('.kind input:checkbox').prop('checked',false);
                    $(this).prop('checked',true);
                };
            });
            
            $('.pot').text('火鍋');
            $('.bbq').text('燒烤');
            $('.fried').text('炸物');
            $('.stirfry').text('快炒');
            $('.light').text('簡餐');
            $('.steak').text('排餐');
            $('.cold').text('冷盤');
            
            // 項目
            for(let i=1;i<=$('.rest').length;i+=1){
                show.push($(`#R${i}`).attr('id'));
            };
            for(let i=1;i<=pages;i+=1){
                $('.page').append(`<li>${i}</li>`);
            };
            for(let i=0;i<=$('.page li').length;i+=1){
                $(`.page li:nth-child(${i})`).attr('data-page',`${i-1}`);
            }

            $('.page li:nth-child(1)').css({'color':'black'});

            function createpage(){
                $('.page').empty('li');
                // 分頁

                for(let i=1;i<=Math.ceil(show.length/4);i+=1){
                    $('.page').append(`<li>${i}</li>`);
                };

                for(let i=0;i<=$('.page li').length;i+=1){
                    $(`.page li:nth-child(${i})`).attr('data-page',`${i-1}`);
                }

                $('.page li').on('click',function(){
                    // index = $('.page li').index(this);
                    index = $(this).attr('data-page');
                    $('.page li').css({
                        'color':'cornflowerblue',
                        'cursor':'pointer',
                    });
                    $(this).css({'color':'black'});
                    showresult();
                });

                $('.page li:nth-child(1)').css({'color':'black'});

            }

            showresult();

            $('.kind input').on('click',function(){
                
                searchnone('kind',$(this).val());

            });

            $('.style input').on('click',function(){

                searchnone('style',$(this).val());

            });

            function searchnone(e,condition){

                if(e =='kind'){
                    conditionK = [];
                    RK = [];

                    if($("input[name='kind']:checked").length>0){
                        conditionK = $("input[name='kind']:checked").map(function(){
                            return $(this).val(); 
                        }).get();
                        
                        let K = $('.rest').has(`.${conditionK}`);
                        for(let i=0;i<=K.length-1;i+=1){
                            RK.push(K[i].id);
                        }
                    }


                }else if(e =='style'){
                    conditionS = [];
                    RS = [];

                    if($("input[name='style[]']:checked").length>0){

                        conditionS = $("input[name='style[]']:checked").map(function(){
                            return $(this).val(); 
                        }).get();
                        
                        for(let i=0;i<=conditionS.length-1;i+=1){
                            let S = $('.rest').has(`.${conditionS[i]}`);

                            for(let j=0;j<=S.length-1;j+=1){
                                RS.push(S[j].id);

                            }
                        }
                    }
                }
                // 條件 餐廳

                // RK RS
                // console.log(conditionK);//kind搜尋條件
                // console.log(RK);        //style搜尋條件
                // console.log(conditionS);//kind符合餐廳
                // console.log(RS);        //style符合餐廳
                // console.log(show);          //要顯示的餐廳

                if(conditionK==0 && conditionS==0){
                    show = [];
                    $('.rest').css({'display':'block',});
                    for(let i=1;i<=$('.rest').length;i+=1){
                        show.push($(`#R${i}`).attr('id'));
                    }
                    createpage();
                    showresult();
                }else{
                    show = [];
                    index = 0;
                    if((RK.length+RS.length)==0){
                        $('.rest').css({'display':'block',});
                    }else if(RK.length==0^RS.length==0){
                        let x = [];
                        $('.rest').css({'display':'none'});
                        if(RK.length>0){
                            x = RK;
                        }else{
                            x = RS;
                        }
                        for(let i=0;i<=x.length-1;i+=1){
                            $(`#${x[i]}`).css({'display':'block'});
                            show.push(x[i]);

                        }
                        
                    }else{
                        let x = RK;
                        let y = RS;
                        $('.rest').css({'display':'none'});
                        for(let i=0;i<=x.length-1;i+=1){
                            if($.inArray(x[i],y)!=-1){
                                $(`#${x[i]}`).css({'display':'block'});
                                show.push(x[i]);
                                
                            };
                            
                        };

                    };
                    createpage();
                    showresult();
                };

            };

            $('#searchwordbtn').on('click',function(){
                let word = $('#searchword').val();
                let total = $('.rest').length;
                
                if(word.length>0){
                    show = [];
                    for(let i=1;i<total;i+=1){
                        if($(`#R${i} h2`).text().indexOf($.trim(word)) != -1){
                            show.push($(`#R${i}`).attr('id'));
                            console.log('key');
                        }
                    }
                }

                createpage();
                showresult();

            });

            $('#searchword').on('click',function(){
                
                show = [];
                for(let i=1;i<=$('.rest').length;i+=1){
                    show.push($(`#R${i}`).attr('id'));
                }

                console.log(show);
                createpage();
                showresult();
                
            });


            function showresult(){
                $('.rest').css({'display':'none',});
                $('.error').css({'display':'none'});

                for(let i=0;i<=3;i+=1){
                    $(`#${show[i + index * 4]}`).css({'display':'block',});
                    TweenLite.from(`#${show[i + index * 4]}`,.5,{
                        opacity:-2,
                        y:-300,
                    },);
                };
                if(show.length == 0){
                    $('.error').css({'display':'block'});
                }
            };
            
            $('.page li').on('click',function(){
                // index = $('.page li').index(this);
                index = $(this).attr('data-page');
                $('.page li').css({'color':'cornflowerblue'});
                $(this).css({'color':'black'});
                showresult();
                $('html,body').animate({ scrollTop: 0 }, 0);
            });

            imgcube();

            function imgcube(){
                let imgwidth = $('.rep div').width();
                if($(window).width()<600){
                    $('.rep div').height(imgwidth);
                    // console.log(imgwidth);
                }else{
                    $('.rep div').height(500);
                }
            };

            window.addEventListener('resize',function(){
                    imgcube();
            });

        });

    </script>

</body>

</html>