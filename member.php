<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/vender/other/hover-min.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    <!-- <script src="./js/header_fixed.js"></script> -->
    <title>會員專區</title>
    <!--按鈕的css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="./css/allstyle.css">
</head>

<body>
    <header>
        <section>
            <div class="logo">
                <a href="./home.html">
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
            <div class="member" id="login">
                <a class="icon" href="./member.php">
                    <img src="./image/icon.svg" id="headshot_icon">
                </a>
                <span style="display: none;" class="memberNoNum" id="memberNoNum"></span>
                <span id="spanLogin">登入</span>
            </div>
            <div id="menu-bar">
                <div id="menu" onclick="onClickMenu()">
                    <div id="bar1" class="bar"></div>
                    <div id="bar2" class="bar"></div>
                    <div id="bar3" class="bar"></div>
                </div>
                <ul class="nav1" id="nav1">
                    <div class="member">
                        <a class="icon" href="./member.php">
                            <img src="./image/icon.svg" id="mobileheadshot_icon">
                        </a>
                        <span style="display: none;" class="memberNoNum" id="mob_memberNoNum"></span>
                        <span id="mobilespanLogin">登入</span>
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

    <!---------------------------------- 登入bar 區域開始 ---------------------------------->	
    <!-- 登入lightbox -->
    <div class="jun_back"></div>
    <section class="section_res" id="login_box" style="display:none" >
        <div class="container_res">
            <div class="ic" id="btnLoginCancel"><i class="fas fa-times"></i></div>
            <div class="user singinBx">
                <div class="img_res img_res1">
                    <img src="./image/2.png">
                </div>
                <div class="form_res form_res1">
                    <form name="login" class="form">
                        <h2>會員登入</h2>
                        <input type="text" name="MEMBER_ID" placeholder="請輸入帳號" id="loginID">
                        <input type="password" name="MEMBER_PSW" placeholder="請輸入密碼" id="loginPsd">
                        <div class="btn_6 btn_js loginuse">
                            <input type="button" name="" value="登入" id="btnLogin">
                            <span></span>
                        </div>
                        <p class="learn">還未成為會員?<br><a href="#" onclick="toggleForm();">註冊會員請點我</a></p>
                    </form>
                </div>
            </div>
            <div class="user singupBx">
                <div class="form_res form_res2">
                    <div class="form">
                        <h2>註冊</h2>
                        <input type="text" id="newmem_account" name="newmem_account" placeholder="請輸入帳號">
                        <input type="button" id="btnCheckId" value="檢查帳號" class="checkbtn"><span id="idMsg" class="idMsg"></span>
                        <input type="password" id="newmem_psw" name="newmem_psw" placeholder="請輸入密碼">
                        <input type="password" id="again_psw" name="again_psw" placeholder="再次確認密碼">
                        <input type="email" id="newmem_email" name="newmem_email" placeholder="請輸入email">
                        <button class="btn_5 btn_js" id="next_re">下一步
                            <span></span>
                        </button>
                    </div>
                </div>
                <div class="img_res img_res2">
                    <div class="form">
                        <input type="text" id="newmem_name" name="newmem_name" placeholder="來個暱稱吧">
                        <input type="text" id="newmem_in" name="newmem_in" placeholder="簡短的介紹自己">
                        <select name="newmem_sex" id="newmem_sex">
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
                        <select name="newmem_age" id="newmem_age">
                            <option value="25↓">25↓</option>
                            <option value="26~35">26~35</option>
                            <option value="36~45">36~45</option>
                            <option value="46~55">46~55</option>
                            <option value="56↑">56↑</option>
                        </select>
                        <input type="submit" id="submit" value="註冊">
                        <p class="learn">已經有會員了?<br>
                            <a href="#" onclick="toggleForm();">會員登入點我點我</a>
                            <button class="btn_5 btn_js for_btn" id="previous_re">上一步
                                <span></span>
                            </button>
                        </p>
                    </div>  
                </div>
            </div>
        </div>
    </section>
<?php 
// require_once("login.inc");
?>
<!---------------------------------- 登入bar 區域結束 ---------------------------------->
    <!-- ***************************** -->

    <section class="memberpage container">
        <div class="myallpage" id="app">
            <div class="member_side">
                <form class="avatar" id="avatar">
                    <div class="pic_change">
                        <img id="avatar_change">
                        <div class="upload">
                            <p id="namefile">只收圖片檔喔! (jpg,jpeg,bmp,png)</p>
                        </div>
                    </div>
                    <button type="button" class="btn_10 btn_js btn1">更換
                        <span></span>
                        <input type="file" name="theFile" id="theFileid" class="theFile">
                    </button>
                    <button type="button" class="btn_10 btn_js btn2">送出
                        <span></span>
                        <input type="submit" value="送出" class="btn-primary " id="sub_pic">
                    </button>
                    <button type="button" class="btn btn-default " disabled="disabled" id="fakebtn">拒絕!</button>
                </form>
                <div class="name">
                    <h5 id="user_name">
                    </h5>
                </div>
                <div class="mypa">
                    <div class="mylist">
                        <ul>
                            <li>
                                <button data-target="my_main" class="tabbtn -on btn_11 btn_js -on1" id="my_main_btn">我的資訊<span></span></button>
                            </li>
                            <li>
                                <button data-target="my_group" class="tabbtn btn_11 btn_js -on1" id="my_group_btn">我的開團<span></span></button>
                            </li>
                            <li>
                                <button data-target="my_join" class="tabbtn btn_11 btn_js -on1" id="my_jion_btn">我的參團<span></span></button>
                            </li>
                            <li>
                                <button data-target="my_collect" class="tabbtn btn_11 btn_js -on1" id="my_collect_btn">我的收藏<span></span></button>
                            </li>
                            <li>
                                <button data-target="my_article" class="tabbtn btn_11 btn_js -on1" id="my_article_btn">我的文章<span></span></button>
                            </li>
                            <li>
                                <button data-target="my_friend" class="tabbtn btn_11 btn_js -on1" id="my_friend_btn">我的好友<span></span></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="my_main tabbtn_1 -on">
                <div class="block">
                    <h3 class="title">
                        我的資訊
                    </h3>
                    <div class="small_block">
                        <form class="memberform">
                            <div class="part">
                                <h4 class="small_title">
                                    姓名:
                                </h4>
                                <h5 class="content" id="mem_name" name="MEMBER_NAME">
                                </h5>
                                <button class="change btn_10 btn_js">
                                    修改<span></span>
                                </button>
                            </div>
                            <div class="part">
                                <h4 class="small_title">
                                    帳號:
                                </h4>
                                <h5 class="content" id="mem_account">
                                </h5>
                            </div>
                            <div class="part">
                                <h4 class="small_title">
                                    年齡:
                                </h4>
                                <h5 class="content" id="mem_age" >
                                </h5>
                            </div>
                            <div class="part">
                                <h4 class="small_title">
                                    密碼:
                                </h4>
                                <h5 class="content" id="mem_psw" name="MEMBER_PSW">
                                </h5>
                                <button class="change btn_10 btn_js">
                                    修改<span></span>
                                </button>
                            </div>
                            <div class="part">
                                <h4 class="small_title">
                                    性別:
                                </h4>
                                <h5 class="content" id="mem_sex">
                                </h5>
                            </div>
                            <div class="part">
                                <h4 class="small_title">
                                    信箱:
                                </h4>
                                <h5 class="content" id="mem_email" name="MEMBER_EMAIL">
                                </h5>
                                <button class="change btn_10 btn_js">
                                    修改<span></span>
                                </button>
                            </div>
                            <div class="part">
                                <h4 class="small_title">
                                    自我介紹:
                                </h4>
                                <button class="change btn_10 btn_js">
                                    修改<span></span>
                                </button>
                                <h5 class="content" id="mem_introduction" name="MEMBER_INTRODUCTION">
                                </h5>
                            </div>
                            <button class="btn_10 btn_js" id="change_main">修改
                                <span></span>
                            </button>
                            <button type="button" class="btn_10 btn_js btn2">送出
                                <span></span>
                                <input type="submit" value="送出" class="sub_main" id="sub_main">
                            </button>
                        </form>
                        <p id="#results"></p>
                    </div>
                </div>
            </div>
            <div class="my_group tabbtn_1">
                <div class="block">
                    <h3 class="title">
                        我的開團
                    </h3>
                    <div class="small_block no_group" id="no_group">
                        <h3>
                            目前沒有開團喔!快來糾一波
                        </h3>
                        <button class="btn_3 btn_js">
                            <a href="./open_group.html" id="no_groupbtn">
                                前往開團
                            </a>
                            <span></span>
                        </button>
                    </div>
                    <div class="small_block have_group" id="have_group">
                        <div class="jay_box2">
                            <div class="box2_row_left">
                                <div class="main_img">
                                    <img id="MAIN_IMG">
                                </div>
                                <div class="sm_pic">
                                    <img id="RES_IMAGE1">
                                    <img id="RES_IMAGE2">
                                    <img id="RES_IMAGE3">
                                    <img id="RES_IMAGE4">
                                </div>
                            </div>
                            <div class="box2_row_right">
                                <div>
                                    <h5>團號:</h5>
                                    <h5 id="GROUP_NO"></h5>
                                    <br>
                                    <h5>團名:</h5>
                                    <h5 id="GROUP_NAME"></h5>
                                    <br>
                                    <h5>店名:</h5>
                                    <h5 id="RES_NAME"></h5>
                                    <br>
                                    <h6 id="STYLE_NAME"></h6>
                                    <h6 id="KIND_NAME"></h6>
                                </div>
                                <div>
                                    <h5>開團團主:</h5>
                                    <h5 id="MEMBER_NAME"></h5>
                                    <br>
                                    <h5>目前人數:</h5>
                                    <h5 id="JOIN_NUMBER"></h5>
                                    <div id="MAX_NUMBER" class="MAX_NUMBER"></div>
                                    <h5></h5>
                                    <h5></h5>
                                    <h5></h5>
                                    <h5></h5>
                                    <br>
                                    <h5>用餐時間:</h5>
                                    <h5 id="MEAL_TIME"></h5>
                                    <br>
                                </div>
                                <div>
                                    <h5>店家資訊</h5>
                                    <br>
                                    <h5>地址:</h5>
                                    <h5 id="RES_ADDRESS"></h5>
                                    <a href="" id="RES_ADDRESS">
                                        <img src="" alt="">
                                    </a>
                                    <br>
                                    <h5>電話:</h5>
                                    <h5 id="RES_TEL"></h5>
                                    <br>
                                    <h5>營業時間:</h5>
                                    <h5 id="RES_BUS_HOURS"></h5>
                                </div>
                            </div>
                        </div>
                        <div class="add_stranger">
                            <h3 class="add_stranger_title">審核區</h3>
                            <ul class="add_stranger_block tab doingcontent" id="add_stranger_block">
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_join tabbtn_1 ">
                <div class="block">
                    <h3 class="title">
                        我的參團
                    </h3>
                    <div class="small_block no_group" id="no_group2">
                        <h3>
                            目前沒有參團喔!快來糾一波
                        </h3>
                        <button class="btn_4 btn_js">
                            <a href="./open_group.html" id="no_groupbtn2">
                                前往參團
                            </a>
                            <span></span>
                        </button>
                    </div>
                    <div class="small_block" id="have_my_join">
                        <div class="tab_list_block">
                            <ul class="tab_list">
                                <li>
                                    <a href="#" data-target="tab_ok" class="tab -on btn_5 btn_js">
                                    確認參團<span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-target="tab_notok" class="tab btn_5 btn_js">
                                    團主待回覆<span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab_contents ">
                            <div class="tab tab_ok -on" id="tab_ok">
                            </div>
                            <div class="tab tab_notok doingcontent" id="tab_notok">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_collect tabbtn_1">
                <div class="overlay1">
                    <article>
                        <h4>是否要刪除</h4>
                        <button type="button" class="btn_modal_send">是</button>
                        <button type="button" class="btn_modal_close">否</button>
                    </article>
                </div>
                <div class="block">
                    <h3 class="title">
                        我的收藏
                    </h3>
                    <div class="small_block no_group" id="no_group3">
                        <h3>
                            目前沒有收藏喔!快來糾一波
                        </h3>
                        <button class="btn_6 btn_js">
                            <a href="./searchrestaurant.html" id="no_groupbtn3">
                                前往收藏
                            </a>
                            <span></span>
                        </button>
                    </div>
                    <div class="small_block" id="have_con">
                        <div class="tab_list_block">
                            <ul class="tab_list">
                                <li>
                                    <a href="#" data-target="tab_gruop_collection" class="tab -on btn_5 btn_js">
                                    美食團收藏<span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-target="tab_restaurant_collection" class="tab btn_5 btn_js">
                                    餐廳收收藏<span></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" data-target="tab_article_collection" class="tab btn_5 btn_js">
                                    文章收收藏<span></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab_contents">
                            <div class="tab tab_gruop_collection -on" id="food_group_collection">
                                <div id="gc_page1" class="page -on">
                                </div>
                                <div id="page2" class="page">
                                </div>
                            </div>
                            <div class="tab tab_restaurant_collection" id="restaurant_collection">
                                <div id="rc_page1" class="page -on">
                                    
                                </div>
                            </div>
                            <div class="tab tab_article_collection" id="article_collection">
                                <div id="ac_page1" class="page -on">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_article tabbtn_1">
                <div class="overlay1">
                    <article>
                        <h1>是否要刪除</h1>
                        <button type="button" class="btn_modal_send">是</button>
                        <button type="button" class="btn_modal_close">否</button>
                    </article>
                </div>
                <div class="block">
                    <h3 class="title">
                        我的文章
                    </h3>
                    <div class="small_block no_group" id="no_group4">
                        <h3>
                            目前沒有撰文喔!快來寫一波
                        </h3>
                        <button class="btn_6 btn_js">
                            <a href="./share.html" id="no_groupbtn4">
                                前往寫文
                            </a>
                            <span></span>
                        </button>
                    </div>
                    <div class="small_block" id="have_article">
                        <div class="tab_list_block">
                            <ul class="tab_list">
                                <li>
                                    <a href="#" data-target="tab_date" class="tab -on btn_5 btn_js">
                                日期排序<span></span>
                                </a>
                                </li>
                                <li>
                                    <a href="#" data-target="tab_leave_a_comment" class="tab btn_5 btn_js">
                                留言排序<span></span>
                                </a>
                                </li>
                                <li>
                                    <a href="#" data-target="tab_like" class="tab btn_5 btn_js">
                                愛心排序<span></span>
                                </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab_contents">
                            <div class="tab tab_date -on"  id="tab_date">
                                <div id="ma_page1" class="page -on">
                                </div>
                            </div>
                            <div class="tab tab_leave_a_comment"  id="tab_leave_a_comment">
                                <div  class="page -on" id="mes_page1">
                                </div>
                            </div>
                            <div class="tab tab_like"  id="tab_like">
                                <div  class="page -on" id="like_page1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="my_friend tabbtn_1">
                <div class="block">
                    <h3 class="title">
                        我的好友
                    </h3>
                    <div class="fd_search" id="have_friend">
                        <input type="text" placeholder="請輸入好友名稱">
                        <input type="submit" value="搜尋">
                    </div>
                    <div class="fd_list">
                        <ul class="fd_ul doingcontent" id="fd_ul">
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ***************************** -->
    <!-- <footer>
        <div class="footer">
            <h6>Copyright © 2020 食緣 All Rights Reserved</h6>
        </div>
    </footer> -->

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
    <script src="js/login.js"></script>
    <!-- <script src="js/mem_php.js"></script> -->
    <script src="./js/mem_pg.js"></script>
</body>

</html>