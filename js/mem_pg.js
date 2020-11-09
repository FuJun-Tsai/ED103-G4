function doFirst(){
  //先跟HTML畫面產生關聯, 再建事件聆聽功能
  document.getElementById('theFile').onchange = fileChange;
}
function fileChange() {

  let res= $('#theFile').val();
  let arr= res.split("\\");
  let filename=arr.slice(-1)[0];
  filextension=filename.split(".");
  filext="."+filextension.slice(-1)[0];
  valid=[".jpg",".png",".jpeg",".bmp"];
  // console.log(res);
  // console.log(arr);
  // console.log(filename);
  // console.log(filextension);
  // console.log(filext);
  //如果檔案不是圖檔，我們秀出error icon, 紅色X,然後取消掉 submit按鈕
  if (valid.indexOf(filext.toLowerCase())==-1){
    $("#namefile").css({"color":"red","font-weight":700});
    $("#namefile").html(filename+"不是圖檔喔!");
    $(".btn2").hide()
    // $( "#submitbtn" ).hide();
    $( "#fakebtn" ).show();
  }else{
    let file = document.getElementById('theFile').files[0];
    let readFile = new FileReader();
    readFile.readAsDataURL(file);
    readFile.addEventListener('load',function(e){
      let image = document.getElementById('avatar_change');
      image.src = readFile.result;
    });

    $('#namefile').css({"color":"green","font-weight":700});
    $('#namefile').html(filename);

    $( ".btn2" ).show();
    $( "#fakebtn" ).hide();
  }
}
window.addEventListener('load',doFirst);

$(document).ready(function(){
  //更換大頭貼的hover

  $("#theFile").mouseenter(function(){
    $(".upload").css("transform" , "translateY(0%)");
  });
  $("#theFile").mouseout(function(){
    $(".upload").css("transform" , "translateY(100%)");
  });


  //開團按鈕hover a
  $("#no_group .btn_3").mouseover(function(){
    $(".btn_3 a").css("color","#76AFAF");
  });
  $("#no_group .btn_3").mouseout(function(){
    $(".btn_3 a").css("color","#FFF");
  });
  //會員專區修改  
  $(document).ready(function(){
    var name = 0;
    psw = 0;
    email = 0;
    introduce = 0;

    $('.change').on('click',function(){
      let here = $(this).siblings('.content').attr('id');
      tochange(here);
    });

    function tochange(e){
      switch (e){
        case 'name':
          changethis(name,e);
          if(name==0){
            name+=1;
          }else{
            name=0;
          }
        break;
        case 'psw':
          changethis(psw,e);
          if(psw==0){
            psw+=1;
          }else{
            psw=0;
          }
        break;
        case 'email':
          changethis(email,e);
          if(email==0){
            email+=1;
          }else{
            email=0;
          }
        break;
        case 'introduce':
          changethis(introduce,e);
          if(introduce==0){
            introduce+=1;
          }else{
            introduce=0;
          }
        break;
      }
    }

    function changethis(e,id){
      e = parseInt(e);
      if(e==0){
        console.log(id);
        console.log(e);
        let value = $.trim($(`#${id}`).text());
        $(`#${id}`).siblings('.change').text('確認');
        $(`#${id}`).replaceWith(`<input type="text" class="content" id="${id}" value="${value}">`);
      }else{
        console.log('here');
        console.log(id);
        console.log(e);
        let value = $.trim($(`#${id}`).val());
        $(`#${id}`).siblings('.change').text('修改');
        $(`#${id}`).replaceWith(`<div class="content" id="${id}">${value}</div>`);
      }
    };
  });
  


  
  //按鈕切換
  $("button.tabbtn").on("click", function(e){
    e.preventDefault();  
    $(this).closest("ul").find("button.tabbtn").removeClass("-on");
    $(this).addClass("-on");
  
    $("div.tabbtn_1").removeClass("-on");
    $("div.tabbtn_1." + $(this).attr("data-target")).addClass("-on");
  });
  
  //內頁籤切換
  $("a.tab").on("click", function(e){
    e.preventDefault();
  
    $(this).closest("ul").find("a.tab").removeClass("-on");
    $(this).addClass("-on");
  
    $(this).parent().parent().parent().siblings().children("div.tab").removeClass("-on");
    $("div." + $(this).attr("data-target")).addClass("-on");
  });

  //上下頁切換
  //下一頁
  let Next_page1 = document.getElementsByClassName('Next_page')[0];
  let Next_page2 = document.getElementsByClassName('Next_page')[1];
  let Previous_page1 = document.getElementsByClassName('Previous_page')[0];
  let Previous_page2 = document.getElementsByClassName('Previous_page')[1];
  let asd =1;
  Next_page1.addEventListener('click',nextPageChange);
  function nextPageChange(){
      document.getElementById(`page${asd}`).classList.remove('-on');
      document.getElementById(`page${asd+1}`).classList.add('-on');
      asd++;
  }


  Previous_page1.addEventListener('click',PreviousPageChange);
  function PreviousPageChange(){
      document.getElementById(`page${asd}`).classList.remove('-on');
      document.getElementById(`page${asd-1}`).classList.add('-on');
      asd--;
  }

  //上一頁
  $(".Previous_page").click(function(){
    var num = $(this).parent().siblings().children().children('-on').index() - 1;
    console.log(num);
    page.removeClass("-on");
    $(".tab_gruop_collection .page").eq(num).addClass("-on");
  });


  //刪除收藏東西
  $(".small-title img").on("click", function(){
    let smalltitle = $(this).closest(".small-title");
    $("div.overlay").addClass("-on");
    $(".btn_modal_send").click(function(){
      $(smalltitle).closest(".box").remove(".box");
      $("div.overlay").removeClass("-on");
    });
  });
  
  $("button.btn_modal_close").on("click", function(){
    $("div.overlay").removeClass("-on");
  });
  
  $(".Next-page").click(function(){
      let id = $(".tab.-on .page").attr("id");
  });
});

//登入連線
function $id(id){
	return document.getElementById(id);
}	
$id('my_group_btn').addEventListener('click',myGroupNow);
function myGroupNow(){
  // mem_account = $id("mem_account").innerHTML;
  let xhr1 = new XMLHttpRequest();
  xhr1.onload = function(){
    if(xhr1.status == 200){ //success
      group = JSON.parse(xhr1.responseText);
      if(group.MEMBER_ID){

      }
    }else{ //error
      alert(xhr1.status);
    }
  }
  xhr1.open("Post", "./php/my_group.php", true);
  xhr1.setRequestHeader("content-type","application/x-www-form-urlencoded");
  let data_info = `MEMBER_ID='aaa123'&MEMBER_PSW='qwe456123789'`;
  xhr1.send(data_info);
}

window.addEventListener("load",myGroupNow,false);