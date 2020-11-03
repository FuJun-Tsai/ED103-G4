<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- other -->
    <link rel="stylesheet" href="./sass/vender/other/hover-min.css">
    <!-- <link rel="stylesheet" href="./css/other/animation.css"> -->
    <!-- bootstrap -->
    <!-- <link rel="stylesheet" href="./css/bootstrap/bootstrap.css"> -->
    <link rel="stylesheet" href="./css/bootstrap.css">
    <!-- <link rel="stylesheet" href="./css/bootstrap-reboot.css"> -->



    <script src="./js/bootstrap.js"></script>
    <!-- H&F -->
    <!-- <link rel="stylesheet" href="./css/head_footer_style.css"> -->
    <!-- kits -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- <link rel="stylesheet" href="./css/btn_hover.css"> -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    <script src="./js/header_fixed.js"></script>
    <script src="./js/btn_hover.js"></script>
    <!-- local -->
    <!-- <link rel="stylesheet" href="./css/background.css"> -->
    <!-- <link rel="stylesheet" href="./css/bootstrap/bootstrap_nopm.css"> -->
    <link rel="stylesheet" href="./css/allstyle.css">
    <title>Document</title>
    <!-- btn -->
    <link rel="stylesheet" href="./css/btn_hover.css">
    <script src="js/btn_hover.js"></script>

</head>


<body>
    <!-- 背景泡泡 -->
    <div class="container-fluid">
        <div class="row">
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
        </div>
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
                        <a href="./open_group.html" class="hvr-pulse-grow"><button>揪團去!</button></a>
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
        <!-- <div class="back"></div>
       <div class="back"></div> -->
       <div class="single_content">
           <div class="container">
               <div class="row">
                   <div class="col-lg">
                       <div class="single_bread"><a href="./index.html">首頁</a><span>></span><a href="./searchrestaurant.html">餐廳介紹</a><span>></span><a href="">碳佐麻里</a></div>
                       <h2 id="name">
                           碳佐麻里
                       </h2>
                       <div class="single_attr">
                           <span id="kind">日式</span><span id="style">燒烤</span>
                       </div>
                   </div>
               </div>
           </div>



           <div id="introduction">
               <div class="container">
                   <div class="row single_restaurant">
                       <div id="imgs" class="col-lg-7">
                           <div class="single_large">
                               <img id="mainimg" src="./image/1-600.png" alt="">
                           </div>
                           <div class="single_small">
                               <img class="single_small_img" src="./image/1-600.png" alt="">
                               <img class="single_small_img" src="./image/2-600.png" alt="">
                               <img class="single_small_img" src="./image/3-600.png" alt="">
                               <img class="single_small_img" src="./image/4-600.png" alt="">
                           </div>
                       </div>
                       <aside id="detail" class="col-lg-5">
                           <h3 class="single_item">店家名稱：</h3>
                           <span id="rname">123</span>
                           <h3 class="single_item">店家介紹：</h3>
                           <p id="rint">三月了，氣溫逐漸回升，儘管台北不是一個擅於開花的城市，卻也能嗅見春天的味道。春天來臨，就想著出遊踏青，然而不想跑得太遠，就從台北市裡挑選一間充滿綠意的小天地吧，Purrson Bistro 呼嚕小酒館，座落於木柵的小山坡，彷彿走進城市裡的森林。</p>
                           <h3 class="single_item">營業時間：</h3>
                           <ul id="week">
                               <li id="1">星期一：<span>公休</span></li>
                               <li id="2">星期二：<span>17:00 - 22:00</span></li>
                               <li id="3">星期三：<span>17:00 - 22:00</span></li>
                               <li id="4">星期四：<span>17:00 - 22:00</span></li>
                               <li id="5">星期五：<span>17:00 - 22:00</span></li>
                               <li id="6">星期六：<span>17:00 - 22:00</span></li>
                               <li id="0">星期日：<span>17:00 - 22:00</span></li>
                           </ul>
                           <div>
                               <p>地址：<span>桃園市桃園區成功路二段101號</span></p>
                               <p>電話：<span>0987-654-321</span></p>
                           </div>
                           <div class="single_togroup">
                               <button class="btnRed btn_3 btn_js">開團<span></span></button>
                               <button class="btnBlue btn_4 btn_js">餐團<span></span></button>
                           </div>
                       </aside>
                   </div>
               </div>
           </div>

           <div class="container">
               <div class="row">
                   <div class="col-lg">
                       <h4>聽聽網友怎麼說：</h4>
                       <div class="single_messagecontrol">
                           <div id="leavemessage">
                               <div id="L1" class="single_L">
                                   <img src="http://fakeimg.pl/60x60" alt="">
                                   <p>1231232313</p>
                                   <i class="fas fa-exclamation-triangle">檢舉</i>
                               </div>
                               <div id="L2" class="single_L">
                                   <img src="http://fakeimg.pl/60x60" alt="">
                                   <p>1231232313</p>
                                   <i class="fas fa-exclamation-triangle">檢舉</i>
                               </div>
                               <div id="L3" class="single_L">
                                   <img src="http://fakeimg.pl/60x60" alt="">
                                   <p>1231232313</p>
                                   <i class="fas fa-exclamation-triangle">檢舉</i>
                               </div>
                               <div id="L4" class="single_L">
                                   <img src="http://fakeimg.pl/60x60" alt="">
                                   <p>1231232313</p>
                                   <i class="fas fa-exclamation-triangle">檢舉</i>
                               </div>
                           </div>
                           <div class="single_messaging">
                               <img src="http://fakeimg.pl/60x60" alt="">
                               <form id="send" action="">
                                   <textarea name="" id="" cols="30" rows="10"></textarea>
                                   <button class="btn_6 btn_js">送出
                                       <span></span>
                                   </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="report">
            <div class="single_reportback">
                <i class="fas fa-times single_cancel"></i>
                <h2>檢舉餐廳留言</h2>
                <label for="report">
                    選擇檢舉類型:
                    <select name="report">
                        <option value="1">惡意謾罵</option>
                        <option value="2">淫穢色情</option>
                        <option value="3">無關主題</option>
                        <option value="0">其他</option>
                    </select>
                </label>
                <h4 style="font-weight: bold;">檢舉原因：</h4>
                <textarea name="" id=""></textarea>
                <button>送出檢舉</button>
            </div>
            <div class="single_thank">
                
            </div>
        </div> 

    </section>
    <!-- ***************************** -->
    <footer>
        <div class="footer">
            <h6>Copyright © 2020 食緣 All Rights Reserved</h6>
        </div>
    </footer>

    <div class="jun_back"></div>


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

    <!-- <script src="./js/singlerestaurant.js"></script> -->

    <script>
        $(document).ready(function(){

            $('.single_small img').not('.single_small img:nth-child(1)').addClass('togray');

            $('.single_small img').on('click',function(){
                $('.single_small img').addClass('togray');
                $(this).removeClass('togray');
                let src = $(this).attr('src');
                $('#mainimg').attr('src',src);
            });

            $('#send').on('submit',function(){
                let content = $('#send textarea').val();
                let array = content.split('');
                let id = $('#leavemessage div:last-child').attr('id').split('L')[1];
                id = parseInt(id);
                id+=1;
                for(let i=0;i<=array.length-1;i+=1){
                    if(array[i].charCodeAt()==10){
                        array[i]='<br>';
                    }
                    content = array.join('');
                }

                $('#leavemessage').append(`
                <div id='L${id}' class='single_L'  >
                    <img src="http://fakeimg.pl/60x60" alt="">
                    <p>${content}</p>
                    <i class="fas fa-exclamation-triangle">檢舉</i>
                </div>` 
                );
                content = '';
                $('textarea').val('');
                return false;
            });

            let today = new Date();
            day = today.getDay();

            $(`#${day}`).css({
                'color':'red',
                'fontSize':'20px',
            });

            $(`#${day} span`).css({
                'color':'red',
                'fontSize':'20px',
            });

            function largeH(){
                let ww = $(window).width()+17;
                if(ww<600){
                    $('.single_large').css({
                        'height':`${ww}px`,
                    });
                }
            }

            largeH();

            window.addEventListener('resize',function(){
                largeH();
            });

            // m_MouseDown = false;
            // selected = '';

            // document.getElementsByTagName('textarea')[0].onmousedown = function (e) {
            //     m_MouseDown = true;
            //     // console.log(1);
            // };

            // document.getElementsByTagName('textarea')[0].onmouseup = function (e) {
            //     m_MouseDown = false;
            //     // console.log(2);
            // };

            // document.getElementsByTagName('textarea')[0].onmousemove = function(e) {
            //     if (m_MouseDown) {
            //         selected = getText();
            //         $('textarea').append(`<span>${selected}</span>`);
            //     }        
            // }

            // function getText() {
            //     var elem = document.getElementsByTagName('textarea')[0];
            //         return elem.value.substring(elem.selectionStart,elem.selectionEnd);
            // }

            $('.single_L i').on('click',function(){
                $('#report').css({'display':'inline-block'});
                $('.jun_back').css({'display':'inline-block'});
            });

            $('.single_cancel').on('click',function(){
                $('#report').css({'display':'none'});
                $('.jun_back').css({'display':'none'});
            });

        });

    </script>

</body>


</html>