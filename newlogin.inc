<!-- 登入lightbox -->
<section class="section_res" id="login_box" style="display:none">
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
                    <!-- <input type="button" name="" value="取消" id="btnLoginCancel"> -->
                    <p class="learn">還未成為會員?<br><a href="#" onclick="toggleForm();">註冊會員請點我</a></p>
                </form>
            </div>
        </div>
        <div class="user singupBx">
            <div class="form_res form_res2">
                <div class="form">
                    <h2>註冊</h2>
                    <input type="text" id="newmem_account" name="newmem_account" placeholder="請輸入帳號">
                    <input type="password" id="newmem_psw" name="newmem_psw" placeholder="請輸入密碼">
                    <input type="password" id="again_psw" name="again_psw" placeholder="再次確認密碼">
                    <input type="text" id="newmem_email" name="newmem_email" placeholder="請輸入email">
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
                    <p class="learn">已經有會員了?<br><a href="#" onclick="toggleForm();">會員登入點我點我</a></p>
                </div>  
            </div>
        </div>
    </div>
</section>