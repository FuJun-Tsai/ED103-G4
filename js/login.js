function $id(id){
	return document.getElementById(id);
}	

let member;

    function showLoginForm(){
      //檢查登入bar面版上 spanLogin 的字是登入或登出
      //如果是登入，就顯示登入用的燈箱(lightBox)
      //如果是登出
      //將登入bar面版上，登入者資料清空 
      //spanLogin的字改成登入
      //將頁面上的使用者資料清掉
      if($id('spanLogin').innerHTML == "登入"){
        $id('login_box').style.display = 'flex';
      }else{//登出
        let xhr = new XMLHttpRequest();
        xhr.onload = function(){
          $id("headshot_icon").setAttribute("src","./image/icon.svg");
          $id('spanLogin').innerHTML = '登入';          
        }
        xhr.open("post", "php/logout.php", true);
        xhr.send(null);
      }

    }//showLoginForm

    function sendForm(){
      //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上 
      let MEMBER_ID = document.getElementsByName("MEMBER_ID")[0].value;
      let MEMBER_PSW = document.getElementsByName("MEMBER_PSW")[0].value;
      let xhr = new XMLHttpRequest();
      xhr.onload = function(){
        member = JSON.parse(xhr.responseText);
        if(member.MEMBER_ID = true){
          $id("headshot_icon").setAttribute("src",`./image/member/${member.MEMBER_IMAGE}`);
          $id('spanLogin').innerHTML = '登出';
          //將登入表單上的資料清空，並隱藏起來
          
          $id('login_box').style.display = 'none';
          MEMBER_ID = '';
          MEMBER_PSW = '';          
        }else{
            window.alert("帳密錯誤~");
        }
      }

      xhr.open("Post", "php/login.php", true);
      xhr.setRequestHeader("content-type","application/x-www-form-urlencoded");
      let data_info = `MEMBER_ID=${MEMBER_ID}&MEMBER_PSW=${MEMBER_PSW}`;
      console.log(data_info);
      xhr.send(data_info); 
    }

    function cancelLogin(){
      //將登入表單上的資料清空，並將燈箱隱藏起來
      $id('login_box').style.display = 'none';
      document.getElementsByName("MEMBER_ID").value = '';
      document.getElementsByName("MEMBER_PSW").value = '';
    }


    function getMemberInfo(){
      let xhr = new XMLHttpRequest();

      xhr.onload = function(){
        if(xhr.status == 200){ //success
          member = JSON.parse(xhr.responseText);
          if(member.MEMBER_ID){
            $id("headshot_icon").setAttribute("src",`./image/member/${member.MEMBER_IMAGE}`);
            $id('spanLogin').innerHTML = '登出';
            $id('avatar_change').setAttribute("src",`./image/member/${member.MEMBER_IMAGE}`);            
            $id('user_name').innerHTML = `${member.MEMBER_NAME}`;
            $id('mem_name').innerHTML = `${member.MEMBER_NAME}`;
            $id('mem_account').innerHTML = `${member.MEMBER_ID}`;
            $id('mem_age').innerHTML = `${member.MEMBER_AGE}`;
            $id('mem_psw').innerHTML = `${member.MEMBER_PSW}`;
            $id('mem_sex').innerHTML = `${member.MEMBER_SEX}`;
            $id('mem_email').innerHTML = `${member.MEMBER_EMAIL}`;
            $id('mem_introduction').innerHTML = `${member.MEMBER_INTRODUCTION}`;
            $id('GROUP_NO').innerHTML = `${member.GROUP_NO}`;
            $id('GROUP_NAME').innerHTML = `${member.GROUP_NAME}`; 
            $id('RES_NAME').innerHTML = `${member.RES_NAME}`;
            $id('STYLE_NAME').innerHTML = `${member.STYLE_NAME}`;
            $id('KIND_NAME').innerHTML = `${member.KIND_NAME}`;
            $id('MEMBER_NAME').innerHTML = `${member.MEMBER_NAME}`;
            $id('JOIN_NUMBER').innerHTML = `${member.JOIN_NUMBER}`;
            $id('MEAL_TIME').innerHTML = `${member.MEAL_TIME}`;
            $id('RES_ADDRESS').innerHTML = `${member.RES_ADDRESS}`;
            $id('RES_TEL').innerHTML = `${member.RES_TEL}`;
            $id('RES_BUS_HOURS').innerHTML = `${member.RES_BUS_HOURS}`;
            $id('MAIN_IMG').setAttribute("src",`./image/restaurant_management_img/${member.RES_IMAGE1}`);
            $id('RES_IMAGE1').setAttribute("src",`./image/restaurant_management_img/${member.RES_IMAGE1}`);
            $id('RES_IMAGE2').setAttribute("src",`./image/restaurant_management_img/${member.RES_IMAGE2}`);
            $id('RES_IMAGE3').setAttribute("src",`./image/restaurant_management_img/${member.RES_IMAGE3}`);
            $id('RES_IMAGE4').setAttribute("src",`./image/restaurant_management_img/${member.RES_IMAGE4}`);            
          }
        }else{ //error
          alert(xhr.status);
        }

      }

      xhr.open("get", "php/getMemberInfo_copy.php", true);
      console.log(xhr.responseText);
      xhr.send(null);
    }

    function init(){

      //-----------------------檢查是否已登入
      getMemberInfo();

      //===設定spanLogin.onclick 事件處理程序是 showLoginForm

      $id('spanLogin').onclick = showLoginForm;

      //===設定btnLogin.onclick 事件處理程序是 sendForm
      $id('btnLogin').onclick = sendForm;

      //===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
      $id('btnLoginCancel').onclick = cancelLogin;

    }; //window.onload

    window.addEventListener("load",init,false);

    function toggleForm() {
        var container_res = document.querySelector('.container_res');
        container_res.classList.toggle('act')
    }

