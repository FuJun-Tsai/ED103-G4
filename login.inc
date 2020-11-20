<!-- 登入lightbox -->
<section class="section_res" id="login_box" style="display:none">
    <div class="container_res">
        <div class="user singinBx">
            <div class="img_res">
                <img src="./image/2.png" alt="">
            </div>
            <div class="form_res">
                <form name="login">
                    <h2>會員登入</h2>
                    <input type="text" name="MEMBER_ID" placeholder="請輸入帳號" id="loginID">
                    <input type="password" name="MEMBER_PSW" placeholder="請輸入密碼" id="loginPsd">

                    <input type="button" name="" value="登入" id="btnLogin">
                    <input type="button" name="" value="取消" id="btnLoginCancel">
                    <p class="learn">還未成為會員?<br><a href="#" onclick="toggleForm();">註冊會員請點我</a></p>
                </form>
            </div>
        </div>
        <div class="user singupBx">
            <div class="form_res">
                <form action="signup.php" method="post">
                    <h2>註冊</h2>
                    <input type="text" name="newmem_account" placeholder="請輸入註冊email">
                    <input type="password" name="newmem_psw" placeholder="請輸入密碼">
                    <!-- <input type="password" name="password" placeholder="再次確認密碼"> -->
                    <input type="submit" name="submit" value="註冊">
                    <p class="learn">已經有會員了?<br><a href="#" onclick="toggleForm();">會員登入點我點我</a></p>
                </form>
            </div>
            <div class="img_res">
                <img src="./image/4.jpg" alt="">
            </div>
        </div>
    </div>
</section>
