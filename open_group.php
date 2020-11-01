<?php 
$aaa = 1;
try {
	require_once("./connectRes.php");
    $sql = "select * from restaurant_management R
        join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
        join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
        ";
	$products = $pdo->query($sql);
  $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
  
  $sql1 = "select * from restaurant_management where RES_NO=1";
	$products1 = $pdo->query($sql1);
  $prodRows1 = $products1->fetch(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
	
}
 ?>

<?php
   
   
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/vender/other/hover-min.css">
    <link rel="stylesheet" href="./css/allstyle.css">
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
    <script src="./js/header_fixed.js"></script>
    <script src="./js/group_date_D.js"></script>
    <script src="./js/res_change_D.js"></script>
    <title>開團/參團頁面</title>
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
    <!--header-->
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
    <!--banner-->
    <div class="den_banner">
        <!-- <div class="den_banner_background"></div> -->
        <div class="container">
            <div id="den_banner_title">
                <!-- <span>就算發一千條短信，心與心之間的距離也不曾拉近過一厘米，
                那麼怎樣的速度，才能走完我與你之間的距離</span> -->
                <span>天才總是伴隨著飢餓，但你不是</span>
                <!-- <span>秒速5厘米，那是櫻花飄落的速度，
                那麼怎樣的速度，才能走完我與你之間的距離?</span> -->
                <span>還等什麼，一起加入美食團吧！</span>
            </div>
            <div class="den_search">
                <div class="den_search_icon">
                    <input type="text" name="" id="" placeholder="餐廳快報">
                    <img src="./image/search.svg" alt="">
                </div>
                <div class="den_search_icon2">
                    <p>搜尋:</p>
                    <p>日式</p>
                    <p>西式</p>
                    <p>中台</p>
                    <p>燒烤</p>
                    <p>火鍋</p>
                    <p>簡餐</p>
                </div>
            </div>
        </div>
    </div>

    <!-- main -->
    <section class="den_section">
        <div class="den_wrapper">
            <!-- <div class="den_gif">
                <img src="./image/giphy.gif" alt="">
            </div> -->
            <div class="den_background_round"></div>
            <div class="den_container">
                <div class="den_row">
                    <div class="den_title">
                        <div class="title_left">
                            <h2>開團</h2>
                            <h2>參團</h2>
                        </div>
                        <div class="title_right">
                            <span>一起加入美食團吧 !</span>
                        </div>
                    </div>

                    <div class="den_Condition_search">
                        <div class="den_row">
                            <div class="den_selection col-lg-8">
                                <h3>條件搜尋:</h3>
                                <div class="den_res_type">
                                    <h3>餐廳種類</h3>
                                    <div>
                                        <input type="radio" name="kind" value="日式" id="kind1">
                                        <label for="kind1">日式</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="kind" value="美式" id="kind2">
                                        <label for="kind2">美式</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="kind" value="西式" id="kind3">
                                        <label for="kind3">西式</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="kind" value="韓式" id="kind4">
                                        <label for="kind4">韓式</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="kind" value="中台" id="kind5">
                                        <label for="kind5">中台</label>
                                    </div>
                                    <div>
                                        <input type="radio" name="kind" value="東南亞" id="kind6">
                                        <label for="kind6">東南亞</label>
                                    </div>
                                </div>
                                <div class="den_cooking_style">
                                    <h3>料理風格</h3>
                                    <div>
                                        <input type="checkbox" name="style" value="火鍋" id="style1">
                                        <label for="style1">火鍋</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="style" value="燒烤" id="style2">
                                        <label for="style2">燒烤</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="style" value="炸物" id="style3">
                                        <label for="style3">炸物</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="style" value="快炒" id="style4">
                                        <label for="style4">快炒</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="style" value="簡餐" id="style5">
                                        <label for="style5">簡餐</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="style" value="排餐" id="style6">
                                        <label for="style6">排餐</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="style" value="冷盤" id="style7">
                                        <label for="style7">冷盤</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section id="den_tab1">
                            <h3>搜尋結果</h3>
                            <hr>
                            <div class="den_food_map">
                            <div class="result_owl">
                                <div class="den_row">
                                    <div class="den_nav_left">
                                        <img src="./image/chevron-circle-left-solid.svg" alt="">
                                    </div>
                                    <div class="den_content_range">
                                        <div class="den_content">
                                            <!-- <div id="1">
                                                <span id="日式"></span>
                                                <span id="火鍋"></span>
                                                <p>寶咖咖火烤1吃</p>
                                                <img src="./image/food1.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="2">
                                                <span id="日式"></span>
                                                <span id="燒烤"></span>
                                                <p>寶咖咖火烤2吃</p>
                                                <img src="./image/food2.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="3">
                                                <span id="美式"></span>
                                                <span id="炸物"></span>
                                                <p>寶咖咖火烤3吃</p>
                                                <img src="./image/food3.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="4">
                                                <span id="韓式"></span>
                                                <span id="排餐"></span>
                                                <p>寶咖咖火烤4吃</p>
                                                <img src="./image/food4.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="5">
                                                <span id="日式"></span>
                                                <span id="燒烤"></span>
                                                <p>寶咖咖火烤5吃</p>
                                                <img src="./image/food5.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="6">
                                                <span id="美式"></span>
                                                <span id="排餐"></span>
                                                <p>寶咖咖火烤6吃</p>
                                                <img src="./image/food6.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="7">
                                                <span id="韓式"></span>
                                                <span id="燒烤"></span>
                                                <p>寶咖咖火烤7吃</p>
                                                <img src="./image/food5.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="8">
                                                <span id="日式"></span>
                                                <span id="排餐"></span>
                                                <p>寶咖咖火烤8吃</p>
                                                <img src="./image/food4.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div>
                                            <div id="9">
                                                <span id="韓式"></span>
                                                <span id="排餐"></span>
                                                <p>寶咖咖火烤9吃</p>
                                                <img src="./image/food6.jpg" alt="">
                                                <h6>查看餐廳介紹</h6>
                                            </div> -->
                                            <?php foreach($prodRows as $i=>$prodRow){ ?>
                                              <div>
                                              <span id="韓式"><?=$prodRow["STYLE_NAME"]?></span>
                                              <span id="排餐"><?=$prodRow["KIND_NAME"]?></span>                                 
                                              <p><?=$prodRow["RES_NAME"]?></p>
                                              <img src="./image/restaurant_management_img/<?=$prodRow["RES_IMAGE1"]?>" class="prodImg">
                                              <h6>查看餐廳介紹</h6>
                                              </div>
                                              <?php } ?>
                                        </div>
                                    </div>
                                    <div class="den_nav_right">
                                        <img src="./image/chevron-circle-right-solid.svg" alt="">
                                    </div>
                                </div>
                            </div>
                            

                            </div>
                           
                            <div class="den_Fill_Information_wrapper">
                                <div class="den_Fill_Information">
                                    <div class="den_Information_title">
                                        <h3>開團資訊填寫</h3>
                                        <hr>
                                    </div>
                                    <form action="">
                                        <div>
                                            <label>用餐餐廳:</label>
                                            <input type="text" value="" id="resName">
                                        </div>
                                        <div>
                                            <label>團名:</label>
                                            <input type="text" value="" id="groupName">
                                        </div>
                                        <div>
                                            <label>用餐日期:</label>
                                            <input type="date" value="" id="resDate">
                                        </div>
                                        <div>
                                            <label>用餐時間:</label>
                                            <select name="" id="resTime">
                                    <option value="">請選擇用餐時間</option>
                                    <option value="" disabled="disabled" style="background-color: #dfdfdf;">上午</option>
                                    <option value="">07:00-08:00</option>
                                    <option value="">08:00-09:00</option>
                                    <option value="">09:00-10:00</option>
                                    <option value="" disabled="disabled" style="background-color:  #dfdfdf;">中午</option>
                                    <option value="">11:00-12:00</option>
                                    <option value="">12:00-13:00</option>
                                    <option value="">13:00-14:00</option>
                                    <option value="" disabled="disabled" style="background-color:  #dfdfdf;">晚上</option>
                                    <option value="">17:00-18:00</option>
                                    <option value="">18:00-19:00</option>
                                    <option value="">19:00-20:00</option>
                                    <option value="" disabled="disabled" style="background-color:  #dfdfdf;">凌晨</option>
                                    <option value="">23:00-00:00</option>
                                    <option value="">00:00-01:00</option>
                                    <option value="">01:00-02:00</option>
                                </select>
                                        </div>
                                        <div>
                                            <label>參加人數:</label>
                                            <select name="" id="resMen">
                                    <option value="">請選擇參加人數</option>
                                    <option value="">2</option>
                                    <option value="">3</option>
                                    <option value="">4</option>
                                </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="den_friend_window">
                                    <div class="friend_title">
                                        <h3>找好友</h3>
                                        <hr>
                                    </div>
                                    <form action="">
                                        <div>
                                            <img src="./image/icon.svg" alt="">
                                            <input type="checkbox" id="friend1" name="Checkbox[]">
                                            <label for="friend1">孫小美</label>
                                        </div>
                                        <div>
                                            <img src="./image/icon.svg" alt="">
                                            <input type="checkbox" id="friend2" name="Checkbox[]">
                                            <label for="friend2">阿土伯</label>
                                        </div>
                                        <div>
                                            <img src="./image/icon.svg" alt="">
                                            <input type="checkbox" id="friend3" name="Checkbox[]">
                                            <label for="friend3">金貝貝</label>
                                        </div>
                                        <div>
                                            <img src="./image/icon.svg" alt="">
                                            <input type="checkbox" id="friend4" name="Checkbox[]">
                                            <label for="friend4">錢夫人</label>
                                        </div>
                                        <div>
                                            <img src="./image/icon.svg" alt="">
                                            <input type="checkbox" id="friend5" name="Checkbox[]">
                                            <label for="friend5">宮本武藏</label>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="den_button">
                                <button>送出</button>
                            </div>
                        </section>
                        <section id="den_tab2">
                            <h3>目前有的吃吃團</h3>
                            <div class="den_foodGroup">
                                <div class="den_eatGroup" id="eatGroup1">
                                    <span>1</span>
                                    <img src="./image/people.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                                <div class="den_eatGroup" id="eatGroup2">
                                    <span>2</span>
                                    <img src="./image/people1.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                                <div class="den_eatGroup" id="eatGroup3">
                                    <span>3</span>
                                    <img src="./image/people.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                                <div class="den_eatGroup" id="eatGroup4">
                                    <span>4</span>
                                    <img src="./image/people1.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                                <div class="den_eatGroup" id="eatGroup5">
                                    <span>5</span>
                                    <img src="./image/people1.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                                <div class="den_eatGroup" id="eatGroup6">
                                    <span>6</span>
                                    <img src="./image/people.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                                <div class="den_eatGroup" id="eatGroup7">
                                    <span>7</span>
                                    <img src="./image/people1.jpg" alt="">
                                    <div class="den_eatGroup_content">
                                        <div>
                                            <h4>目前人數:</h4>
                                            <h4>1/4</h4>
                                        </div>
                                        <h3>團名:</h3>
                                        <h3>不吐不歸</h3>
                                        <br>
                                        <h3>店名:</h3>
                                        <h3>寶咖咖</h3>
                                        <br>
                                        <h3>用餐日期:</h3>
                                        <h3>9/28</h3>
                                        <br>
                                        <h3>用餐時間:</h3>
                                        <h3>18:00</h3>
                                    </div>
                                    <div class="den_eatGroup_button">
                                        <button>參加 &#9658</button>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
    </section>

    <!-- footr -->
    <footer>
        <div class="footer">
            <h6>Copyright © 2020 食緣 All Rights Reserved</h6>
        </div>
    </footer>

    <!--燈箱1/餐廳畫面-->
    <div class="den_box">
        <div class="leave_btn">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <div class="den_box_row" id="box1">
            <div class="box_row_left">
                <div class="main_img">
                  <img src="./image/restaurant_management_img/<?=$prodRows1["RES_IMAGE4"]?>">
                </div>
                <img src="./image/restaurant_management_img/<?=$prodRows1["RES_IMAGE1"]?>">
                <img src="./image/restaurant_management_img/<?=$prodRows1["RES_IMAGE2"]?>">
                <img src="./image/restaurant_management_img/<?=$prodRows1["RES_IMAGE3"]?>">
                <img src="./image/restaurant_management_img/<?=$prodRows1["RES_IMAGE4"]?>">
                <!-- <img src="./image/food2.jpg" alt="">
                <img src="./image/food3.jpg" alt="">
                <img src="./image/food6.jpg" alt="">
                <img src="./image/food4.jpg" alt=""> -->
            </div>
            
            <div class="box_row_right">
                <h2><?=$prodRows1["RES_NAME"]?></h2>
                <span><?=$prodRows1["RES_STYLE"]?></span>
                <span><?=$prodRows1["RES_KIND"]?></span>
                <br>
                <div class="den_box_msg">
                    <p>地址:</p>
                    <p><?=$prodRows1["RES_ADDRESS"]?></p>
                    <br>
                    <p>電話:</p>
                    <p><?=$prodRows1["RES_TEL"]?></p>
                </div>
                <div class="den_box_content">
                    <p>店家介紹:</p>
                    <p><?=$prodRows1["RES_INTRODUCTION"]?></p>
                </div>
            </div>
            
        </div>
        <div class="den_box_button">
            <button>送出</button>
        </div>
    </div>
    <!--燈箱2/開團確認-->
    <div class="den_box2">
        <div class="leave_btn">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <div class="den_box2_row">
            <div class="box2_row_left">
                <div class="main_img">
                    <img src="./image/food1.jpg" alt="">
                </div>
                <img src="./image/food2.jpg" alt="">
                <img src="./image/food3.jpg" alt="">
                <img src="./image/food6.jpg" alt="">
                <img src="./image/food4.jpg" alt="">
            </div>
            <div class="box2_row_right">
                <div>
                    <h3>團號:</h3>
                    <h3>4758691</h3>
                    <br>
                    <h3>團名:</h3>
                    <h3></h3>
                    <br>
                    <h3>店名:</h3>
                    <h3></h3>
                    <br>
                    <h6>日式</h6>
                    <h6>火鍋</h6>
                    <h6>燒烤</h6>
                </div>
                <div>
                    <h3>開團團主:</h3>
                    <h3>XXXXX</h3>
                    <br>
                    <h3>目前人數:</h3>
                    <h3></h3>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                    <br>
                    <h3>用餐時間:</h3>
                    <h3></h3>
                    <br>
                </div>
                <div>
                    <h3>店家資訊</h3>
                    <br>
                    <h3>地址:</h3>
                    <h3>中壢中央路1號</h3>
                    <a href="">
                        <img src="" alt="">
                    </a>
                    <br>
                    <h3>電話:</h3>
                    <h3>03-9886578</h3>
                    <br>
                    <h3>營業時間:</h3>
                    <h3>XXXXXX</h3>
                </div>
            </div>
        </div>
        <div class="denAllButton">
            <div class="den_box_button">
                <button>確認開團</button>
            </div>
            <div class="box_button_close">
                <button>取消</button>
            </div>
        </div>

    </div>
    <!--燈箱3/參團確認-->
    <!-- <div class="box3">
        <div class="leave_btn">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <div class="box3_row">
            <div class="box3_row_left">
                <div class="main_img">
                    <img src="./image/food1.jpg" alt="">
                </div>
                <img src="./image/food2.jpg" alt="">
                <img src="./image/food3.jpg" alt="">
                <img src="./image/food6.jpg" alt="">
                <img src="./image/food4.jpg" alt="">
                <div class="box_button">
                    <button>開團</button>
                </div>
            </div>
            <div class="box3_row_right">
                <div>
                    <h3>團號:</h3>
                    <h3>4758691</h3>
                    <br>
                    <h3>團名:</h3>
                    <h3></h3>
                    <br>
                    <h3>店名:</h3>
                    <h3></h3>
                    <br>
                    <h6>日式</h6>
                    <h6>火鍋</h6>
                    <h6>燒烤</h6>
                </div>
                <div>
                    <h3>開團團主:</h3>
                    <h3>XXXXX</h3>
                    <br>
                    <h3>目前人數:</h3>
                    <h3></h3>
                    <br>
                    <h3>用餐時間:</h3>
                    <h3></h3>
                    <br>
                </div>
                <div>
                    <h2>店家資訊</h2>
                    <h3>地址:</h3>
                    <h3>中壢中央路1號</h3>
                    <a href="">
                        <img src="" alt="">
                    </a>
                    <br>
                    <h3>電話:</h3>
                    <h3>03-9886578</h3>
                    <br>
                    <h3>營業時間:</h3>
                    <h3>XXXXXX</h3>
                </div>
            </div>
        </div>
    </div> -->

    <div class="den_box3">
        <div class="leave_btn">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <div class="den_box3_row">
            <div class="box3_row_left">
                <div class="main_img">
                    <img src="./image/food1.jpg" alt="">
                </div>
                <img src="./image/food2.jpg" alt="">
                <img src="./image/food3.jpg" alt="">
                <img src="./image/food6.jpg" alt="">
                <img src="./image/food4.jpg" alt="">
            </div>
            <div class="box3_row_right">
                <div>
                    <h3>團號:</h3>
                    <h3>4758691</h3>
                    <br>
                    <h3>團名:</h3>
                    <h3></h3>
                    <br>
                    <h3>店名:</h3>
                    <h3></h3>
                    <br>
                    <h6>日式</h6>
                    <h6>火鍋</h6>
                    <h6>燒烤</h6>
                </div>
                <div>
                    <h3>開團團主:</h3>
                    <h3>XXXXX</h3>
                    <br>
                    <h3>目前人數:</h3>
                    <h3></h3>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                    <br>
                    <h3>用餐時間:</h3>
                    <h3></h3>
                    <br>
                </div>
                <div>
                    <h3>店家資訊</h3>
                    <br>
                    <h3>地址:</h3>
                    <h3>中壢中央路1號</h3>
                    <a href="">
                        <img src="" alt="">
                    </a>
                    <br>
                    <h3>電話:</h3>
                    <h3>03-9886578</h3>
                    <br>
                    <h3>營業時間:</h3>
                    <h3>XXXXXX</h3>
                </div>
            </div>
        </div>
        <div class="denAllButton3">
            <div class="den_box_button">
                <button>確認開團</button>
            </div>
            <div class="box_button_close">
                <button>取消</button>
            </div>
        </div>

    </div>


    <!-- <div class="den_box3">
        <div class="leave_btn">
            <div class="line1"></div>
            <div class="line2"></div>
        </div>
        <div class="den_box3_row">
            <div class="box3_row_left">
                <div class="main_img">
                    <img src="./image/food1.jpg" alt="">
                </div>
                <img src="./image/food2.jpg" alt="">
                <img src="./image/food3.jpg" alt="">
                <img src="./image/food6.jpg" alt="">
                <img src="./image/food4.jpg" alt="">
                <div class="den_box_button">
                    <button>確認</button>
                </div>
                <div class="box_button_close">
                    <button>取消</button>
                </div>
            </div>
            <div class="box3_row_right">
                <div>
                    <h3>團號:</h3>
                    <h3>4758691</h3>
                    <br>
                    <h3>團名:</h3>
                    <h3></h3>
                    <br>
                    <h3>店名:</h3>
                    <h3></h3>
                    <br>
                    <h6>日式</h6>
                    <h6>火鍋</h6>
                    <h6>燒烤</h6>
                </div>
                <div>
                    <h3>開團團主:</h3>
                    <h3>XXXXX</h3>
                    <br>
                    <h3>目前人數:</h3>
                    <h3></h3>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                    <h4></h4>
                    <br>
                    <h3>用餐時間:</h3>
                    <h3></h3>
                    <br>
                </div>
                <div>
                    <h3>店家資訊</h3>
                    <br>
                    <h3>地址:</h3>
                    <h3>中壢中央路1號</h3>
                    <a href="">
                        <img src="" alt="">
                    </a>
                    <br>
                    <h3>電話:</h3>
                    <h3>03-9886578</h3>
                    <br>
                    <h3>營業時間:</h3>
                    <h3>XXXXXX</h3>
                </div>
            </div>
        </div>

    </div> -->

    <!--燈箱背景-->
    <div class="box_background"></div>

    <!--javaScript--->

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

    <script>
        function doFirst() {
            //點擊input
            $('.den_res_type div input').on('change', function() {
                $('.den_res_type div').css('background', 'rgba(255, 255, 255, 0)');
                $('.den_res_type div').css('box-shadow', '0px 0px 0px 0px rgba(223, 114, 25, 0)');

                $(this).parent().css('background', 'rgba(223, 114, 25, 0.6)');
                $(this).parent().css('box-shadow', '0px 0px 0px 0px rgba(223, 114, 25, 0.8)');
            });
            $('.den_cooking_style div input').on('change', function() {
                // $('.den_cooking_style div').css('background', 'rgba(255, 255, 255, 0)');
                // $('.den_cooking_style div').css('box-shadow', '0px 0px 0px 0px rgba(223, 114, 25, 0)');

                $(this).parent().css('background', 'rgba(223, 114, 25, 0.6)');
                $(this).parent().css('box-shadow', '0px 0px 0px 0px rgba(223, 114, 25, 0.8)');
            });



            //頁籤
            $('.title_left h2:nth-child(1)').on('click', function() {
                $('#den_tab1').fadeIn();
                $('#den_tab2').fadeOut();
                $('.title_left h2:nth-child(1)').css('background-color', '#DF7219');
                $('.title_left h2:nth-child(1)').css('color', '#ffffff');
                $('.title_left h2:nth-child(2)').css('background-color', '#ffffff');
                $('.title_left h2:nth-child(2)').css('color', '#DF7219');

            });
            $('.title_left h2:nth-child(2)').on('click', function() {
                $('#den_tab1').fadeOut();
                $('#den_tab2').fadeIn();
                $('.title_left h2:nth-child(2)').css('background-color', '#DF7219');
                $('.title_left h2:nth-child(2)').css('color', '#ffffff');
                $('.title_left h2:nth-child(1)').css('background-color', '#ffffff');
                $('.title_left h2:nth-child(1)').css('color', '#DF7219');

            });

            // 第一個燈箱
            let owlImage = document.querySelectorAll('.den_content div h6'); //list是陣列
            for (let i = 0; i < owlImage.length; i++) {
                owlImage[i].addEventListener('click', function() {
                    console.log(owlImage[i])
                    <?php
                   
                    ?>
                    $('.den_box').css('display', 'block');
                    $('.box_background').css('display', 'block');
                });
            }

            // 第2個燈箱
            let yy = $('.den_Fill_Information form :input').val();
            // console.log(yy);
            $('.den_button button').on('click', function() {
                $('.den_box2').css('display', 'block');
                $('.box_background').css('display', 'block');
            });

            // 第三個燈箱
            let eatGroup = document.querySelectorAll('.den_eatGroup'); //list是陣列
            for (let i = 0; i < eatGroup.length; i++) {
                eatGroup[i].addEventListener('click', function() {
                    console.log(eatGroup[i])
                    $('.den_box3').css('display', 'block');
                    $('.box_background').css('display', 'block');
                });
            }

            // 燈箱離開
            $('.leave_btn').on('click', function() {
                $('.den_box').css('display', 'none');
                $('.den_box2').css('display', 'none');
                $('.den_box3').css('display', 'none');
                $('.box_background').css('display', 'none');
                $('.box2_row_right div:nth-child(1) h3:nth-child(5)').empty();
                $('.box2_row_right div:nth-child(1) h3:nth-child(8)').empty();
                $('.box2_row_right div:nth-child(2) h3:nth-child(12)').empty();
                $('.box2_row_right div:nth-child(2) h3:nth-child(5)').empty();
            });

            // owl左右移動
            $('.den_nav_right').on('click', function() {
                let x = $('.den_content_range').scrollLeft() + 1
                x = x + 150;
                let scrollVal1 = $('.den_content_range').scrollLeft(x)
                console.log(x);
            });
            // owl左右移動
            $('.den_nav_left').on('click', function() {
                let x = $('.den_content_range').scrollLeft() + 1
                x = x - 150;
                let scrollVal1 = $('.den_content_range').scrollLeft(x)
                console.log(x);
            });
        }
        window.addEventListener('load', doFirst);
    </script>
</body>

</html>