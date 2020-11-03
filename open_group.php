<?php 
// $aaa = 1;
try {
	require_once("./connectRes.php");
    //------------------------where
    $RES_KIND = isset($_GET["RES_KIND"]) ? $_GET["RES_KIND"] : "";
    $cond1 = isset($_GET["RES_KIND"]) ? "RES_KIND = '$RES_KIND'" : "";
    $RES_STYLE = isset($_GET["RES_STYLE"]) ? $_GET["RES_STYLE"] : "";
    $cond2 = isset($_GET["RES_STYLE"]) ? "RES_STYLE = '$RES_STYLE'" : "" ;
    $TTT=isset($_GET["RES_NO"]);
    $RES_NO =  isset($_GET['RES_NO']) ? $_GET['RES_NO'] : "";
    //---------------------------    
    // echo $RES_NO;
    // $c= "<script>
    // document.write(ttt)</script>"; 
    // echo $c; 


    $sql = "select * from restaurant_management R
        join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
        join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO) 
        ";
    if($cond1 !=""){ // 
        $sql .= "where $cond1";
        if($cond2 != ""){
            $sql .= " and $cond2";
        }
    }else{
        if($cond2 != ""){
            $sql .= "where $cond2";
        }
    }
    $products = $pdo->query($sql);
    $prodRows = $products->fetchAll(PDO::FETCH_ASSOC);
    

//   var_dump($_GET);
    // print_r($prodRows[0]['RES_ADDRESS']);
    // $RES_NO = isset($_GET["RES_NO"]) ? $_GET["RES_NO"] :3;
// exit($RES_NO);
    

    $sql1 = "select * from restaurant_management R
    join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
    join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO)
    ";
	$products1 = $pdo->query($sql1);
    $prodRows1 = $products1->fetch(PDO::FETCH_ASSOC);

    if($RES_NO!=""){
    $sql1 .= "where RES_NO=$RES_NO";
}
} catch (PDOException $e) {
	
}
 ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./sass/vender/other/hover-min.css">
    <link rel="stylesheet" href="./css/allstyle.css">
<!--地圖-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css"></link> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css"></link> 
<!--地圖-->
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.0/js/all.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js'></script>
<!--自己的js-->
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
                            <div class="den_food_map" id="map">
                            </div>
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
                                              <span><?=$prodRow["STYLE_NAME"]?></span>
                                              <span><?=$prodRow["KIND_NAME"]?></span>
                                              <span><?=$prodRow["RES_NO"]?></span>                                 
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
                
               
            </div>
            
            <div class="box_row_right">
                <h2><?=$prodRows1["RES_NAME"]?></h2>
                <span><?=$prodRows1["STYLE_NAME"]?></span>
                <span><?=$prodRows1["KIND_NAME"]?></span>
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
            let owlImage = document.querySelectorAll('.den_content div h6'); 
            //list是陣列
            for (let i = 0; i < owlImage.length; i++) {
                owlImage[i].addEventListener('click', function() {

                    var ttt=this.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.previousSibling.innerText;

                    
                    console.log(ttt);


                    // location.href=`http://localhost/ED103-G4/open_group.php?RES_NO=${ttt}`;
                    // let iii=document.querySelector('.den_content div span:nth-child(3)').innerText;
                    // console.log(iii);


                    
                    // location.href = `?RES_NO=${ttt}`;
                   
                    // $sql1 = "select * from restaurant_management R
                    // join restaurant_kind rk on (R.RES_KIND = rk.KIND_NO)
                    // join restaurant_style rs on (R.RES_STYLE = rs.STYLE_NO) 
                    // where RES_NO=$TTT";
                  

                 
                    // console.log(owlImage[i]);
                    // location.href=`RES_NO=${owlImage[i]}`;
                    // let aa=2;
                    
                    // location.href=`open_group.php?RES_NO=${aa}`;
                    //   location.href=`?RES_NO=${aa}`;




                    //--------------------------------------
                    $.ajax({
                        url:'open_group.php',                     
                        data:{
                            RES_NO:ttt,
                            },
                        type: 'GET',
                        success:function(data){
                           
                            
                                // console.log(data)
                           
                            // $('.den_content div span:nth-child(3)').html(data);
                             
                            // $('#aaa').html(yyy);
                            // $('#input').hide();
                            // $('#response').show().html(res);
                            // console.log('yes');
                        },
                    });
                    //-------------------------------------

                    // var xhr = new XMLHttpRequest();
                    //         xhr.onload=function (){
	                //             if( xhr.status == 200 ){
  		            //                 // alert( xhr.responseText );	
  		            //                 // showMember( modify_here ); //=============修改左側程式碼
	                //             }else{
	                //                 // alert( xhr.status );
	                //                     }
                    //             }
                    //             console.log(ttt);
                        
                    //     var url = "open_group.php?RES_NO=" +ttt ;
                    //     console.log(url);
                    //     xhr.open("Get", url, true);
                    //     xhr.send( null );





                    

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
    <!--地圖-->
<script>      
        var map = L.map('map', {
            center: [24.9647762,121.1908706], //哈堡堡
            zoom: 18
        });
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var redIcon = new L.Icon({
        iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
        shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
        iconSize: [25, 41],
        iconAnchor: [12, 41],
        popupAnchor: [1, -34],
        shadowSize: [41, 41]
        });
        var data = [
        {'name':'竹香快餐','hover':'竹香快餐',lat:24.9643636,lng:121.1893723,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food1.jpg'},
        {'name':'大中央厚切牛排','hover':'大中央厚切牛排',lat:24.9647076,lng:121.1885262,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food2.jpg'},
        {'name':'重慶酸辣粉','hover':'重慶酸辣粉',lat:24.9647373,lng:121.1892811,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food3.jpg'},
        {'name':'雞叔叔醬汁照燒雞排','hover':'雞叔叔醬汁照燒雞排',lat:24.9648977,lng:121.19345,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food4.jpg'},
        {'name':'無敵蛋餅','hover':'無敵蛋餅',lat:24.9652668,lng:121.1931109,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food5.jpg'},
        {'name':'霸王香雞排','hover':'霸王香雞排',lat:24.9650691,lng:121.1926797,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food6.jpg'},
        {'name':'27秀梅','hover':'27秀梅',lat:24.9647026,lng:121.1910093,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food7.jpg'},
        {'name':'哈堡堡輕食早午餐','hover':'哈堡堡輕食早午餐',lat:24.9647762,lng:121.1908706,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food8.jpg'},
        {'name':'福泉豆花','hover':'福泉豆花',lat:24.965285,lng:121.1908942,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food9.jpg'},
        {'name':'燒餅窯','hover':'燒餅窯',lat:24.9645288,lng:121.1930604,'address':'地址：桃園市中壢區中央路216巷86弄','phoneNumber':'電話：(03)123-4567','photo':'./image/map/food10.jpg'}
        ]
        var markers = new L.MarkerClusterGroup().addTo(map);;
        
        for(let i =0;data.length>i;i++){
        console.log(data[i].name)
        markers.addLayer(L.marker([data[i].lat,data[i].lng], 
            {icon: redIcon , title:data[i].hover})    
            .bindPopup('<h1>'+ data[i].name +'</h1>'+
                       '<img src=" ' + data[i].photo + ' " /> <br>'+
                       '<i class="fas fa-heart"></i>&nbsp;30 &nbsp;&nbsp;'+
                       '<i class="fas fa-comments"></i>&nbsp;46 &nbsp;&nbsp;'+
                       '<i class="fas fa-share-square"></i>&nbsp;25 &nbsp;&nbsp;'+
                       '<p>'+ data[i].address +'</p>'+
                       '<p>'+ data[i].phoneNumber +'</p>'
                       ));
        }
        map.addLayer(markers);

        // var xhr = new XMLHttpRequest();
        // xhr.open("get","https://raw.githubusercontent.com/kiang/pharmacies/master/json/points.json");
        // xhr.send();
        // xhr.onload = function(){
        // var data = JSON.parse(xhr.responseText).features
        // for(let i =0;data.length>i;i++){
        
        // markers.addLayer(L.marker([data[i].geometry.coordinates[1],data[i].geometry.coordinates[0]], {icon: greenIcon}).bindPopup(data[i].properties.name));
        // // add more markers here...
        // // L.marker().addTo(map)
        // //   )
        // }
        // map.addLayer(markers);
        // }

    </script>
   
</body>

</html>