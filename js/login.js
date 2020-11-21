function $id(id) {
  return document.getElementById(id);
}

let member;
//註冊 
function registered() {
  $("#submit").on("click", function() {
    var newmem_account = $("#newmem_account").val();
    var newmem_psw = $("#newmem_psw").val();
    var again_psw = $("#again_psw").val();
    var newmem_email = $("#newmem_email").val();
    var newmem_name = $("#newmem_name").val();
    var newmem_in = $("#newmem_in").val();
    var newmem_sex = $("#newmem_sex").val();
    var newmem_age = $("#newmem_age").val();
    if (newmem_account == "" || newmem_psw == "" || again_psw == "" || newmem_email == "") {
      document.getElementById("idMsg").innerText = "左邊欄位不能為空喔";
      document.getElementById("idMsg").style['color'] = 'red';
    } else if (newmem_email.indexOf("@") == -1) {
      document.getElementById("idMsg").innerText = "email要正確填寫喔";
      document.getElementById("idMsg").style['color'] = 'red';
    } else {
      let xhr = new XMLHttpRequest();
      xhr.onload = function() {
        member = JSON.parse(xhr.responseText);
        console.log(member);
        if (xhr.status == 200) { //success
          $id("headshot_icon").setAttribute("src", `./image/member/${member.MEMBER_IMAGE}`);
          $id("mobileheadshot_icon").setAttribute("src", `./image/member/${member.MEMBER_IMAGE}`);
          $id('spanLogin').innerHTML = '登出';
          $id('mobilespanLogin').innerHTML = '登出';
          $('.username').text(`${member.MEMBER_NO}`);
          $id('login_box').style.display = 'none';
          MEMBER_ID = '';
          MEMBER_PSW = '';
          // memberrender();
        } else { //error
        }
      }
      xhr.open("POST", "./php/registered.php", true);
      let data_info = `newmem_account=${newmem_account}&newmem_psw=${newmem_psw}&newmem_email=${newmem_email}&newmem_name=${newmem_name}&newmem_in=${newmem_in}&newmem_sex=${newmem_sex}&newmem_age=${newmem_age}`;
      xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
      xhr.send(data_info);
    }
  });
}
//手機板RWD註冊上下頁
function registeredRWD() {
  $("#next_re").on("click", function() {
    console.log(1);
    $(".form_res2").css({ "width": "0%", "display": "none" });
    $(".img_res2").css({ "width": "100%", "display": "flex" });
  });
  $("#previous_re").on("click", function() {
    $(".form_res2").css({ "width": "100%", "display": "flex" });
    $(".img_res2").css({ "width": "0%", "display": "none" });
  });
}
//判斷帳號是否註冊過
function checkId() {
  $("#newmem_account").on("change", function() {
    var xhr = new XMLHttpRequest();
    //註冊callback function
    xhr.onreadystatechange = function() {
      if (xhr.readyState == XMLHttpRequest.DONE) { //server端已處理完畢
        if (xhr.status === 200) { //xhr.status為200時表示, server端有正常的處理完畢
          if (xhr.responseText == "此帳號已存在, 不可用") {
              document.getElementById("idMsg").innerText = xhr.responseText;
              document.getElementById("idMsg").style['color'] = 'red';
            } else {
              document.getElementById("idMsg").innerText = xhr.responseText;
              document.getElementById("idMsg").style['color'] = 'black';
            }
          } else {
            alert(xhr.statusText);  
          }
        }
      }
      //設定好所要連結的程式
    let url = "./php/GetResponseText.php?MEMBER_ID=" + document.getElementById("newmem_account").value;
    console.log(url);
    // let url = "member.php"
    xhr.open("get", url, true);
    //送出資料
    xhr.send(null);
  });
}

function showLoginForm() {
  if ($id('spanLogin').innerHTML == "登入") {
    $id('login_box').style.display = 'flex';
    $('.jun_back').css({ 'display': 'block' });
  } else { //登出
    let xhr = new XMLHttpRequest();
    xhr.onload = function() {
      $id("headshot_icon").setAttribute("src", "./image/icon.svg");
      $id("mobileheadshot_icon").setAttribute("src", "./image/icon.svg");
      $id('spanLogin').innerHTML = '登入';
      $id('mobilespanLogin').innerHTML = '登入';
    }
    xhr.open("post", "php/logout.php", true);
    xhr.send(null);
  }
}

function sendForm() {
  //=====使用Ajax 回server端,取回登入者姓名, 放到頁面上 
  let MEMBER_ID = document.getElementsByName("MEMBER_ID")[0].value;
  let MEMBER_PSW = document.getElementsByName("MEMBER_PSW")[0].value;
  let xhr = new XMLHttpRequest();
  xhr.onload = function() {
    member = JSON.parse(xhr.responseText);
    // console.log("====",member);
    if (member.MEMBER_ID != undefined) {
      $id("headshot_icon").setAttribute("src", `./image/member/${member.MEMBER_IMAGE}`);
      $id("mobileheadshot_icon").setAttribute("src", `./image/member/${member.MEMBER_IMAGE}`);
      $id('spanLogin').innerHTML = '登出';
      $id('mobilespanLogin').innerHTML = '登出';
      $('.username').text(`${member.MEMBER_NO}`);
      //將登入表單上的資料清空，並隱藏起來
      $id('login_box').style.display = 'none';
      MEMBER_ID = '';
      MEMBER_PSW = '';
    } else {
      window.alert("帳密錯誤~");
    }
  }
  xhr.open("Post", "php/login.php", true);
  xhr.setRequestHeader("content-type", "application/x-www-form-urlencoded");
  let data_info = `MEMBER_ID=${MEMBER_ID}&MEMBER_PSW=${MEMBER_PSW}`;
  console.log(data_info);
  xhr.send(data_info);
}

function cancelLogin() {
  $id('login_box').style.display = 'none';
  document.getElementsByName("MEMBER_ID").value = '';
  document.getElementsByName("MEMBER_PSW").value = '';
  $('.jun_back').css({ 'display': 'none' });
}

function getMemberInfo() {
  let xhr = new XMLHttpRequest();
  xhr.onload = function() {
    if (xhr.status == 200) { //success
      member = JSON.parse(xhr.responseText);
      if (member.MEMBER_ID) {
        $id("headshot_icon").setAttribute("src", `./image/member/${member.MEMBER_IMAGE}`);
        $id("mobileheadshot_icon").setAttribute("src", `./image/member/${member.MEMBER_IMAGE}`);
        $id('spanLogin').innerHTML = '登出';
        $id('mobilespanLogin').innerHTML = '登出';
        $("#memberNoNum").text(`${member.MEMBER_NO}`);
        $("#mob_memberNoNum").text(`${member.MEMBER_NO}`);
      }
    } else { //error
    }
  }
  xhr.open("get", "php/getMemberInfo.php", true);
  xhr.send(null);
}

function toggleForm() {
    var container_res = document.querySelector('.container_res');
    container_res.classList.toggle('act');
}

function btnjs() {
  $('.btn_js')
    .on('mouseenter', function(e) {
      var parentOffset = $(this).offset(),
        relX = e.pageX - parentOffset.left,
        relY = e.pageY - parentOffset.top;
      $(this).find('span').css({ top: relY, left: relX })
    })
    .on('mouseout', function(e) {
      var parentOffset = $(this).offset(),
        relX = e.pageX - parentOffset.left,
        relY = e.pageY - parentOffset.top;
      $(this).find('span').css({ top: relY, left: relX })
    });
}

function init() {
    //===判斷帳號是否能使用
    checkId();
    //===註冊事件
    registered();
    //手機板RWD註冊上下頁
    registeredRWD();
    //-----------------------檢查是否已登入
    getMemberInfo();
    //===設定spanLogin.onclick 事件處理程序是 showLoginForm
    $id('spanLogin').onclick = showLoginForm;
    $id('mobilespanLogin').onclick = showLoginForm;
    //===設定btnLogin.onclick 事件處理程序是 sendForm
    $id('btnLogin').onclick = sendForm;
    //===設定btnLoginCancel.onclick 事件處理程序是 cancelLogin
    $id('btnLoginCancel').onclick = cancelLogin;
    //btnhover效果
    btnjs();
}; 
window.addEventListener("load", init, false);

//登入成功後整頁渲染
function memberrender() {
    let herehref = location.href.split('?')[0].split('/')[location.href.split('?')[0].split('/').length - 1];
    if (herehref == 'singlerestaurant.html') {
        singleJS();
    };
    if (herehref == 'searchrestaurant.html') {
        searchJS();
    };
};
