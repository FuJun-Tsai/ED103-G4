// function doFirst(){
//   //先跟HTML畫面產生關聯, 再建事件聆聽功能
//   document.getElementById('theFile').onchange = fileChange;
// }
// function fileChange() {
//   let file = document.getElementById('theFile').files[0];
//   let readFile = new FileReader();
//   readFile.readAsDataURL(file);
//   readFile.addEventListener('load',function(e){
//     console.log(123);
//       let image = document.getElementById('avatar_change');
//       image.src = readFile.result;
//   });
// }
// window.addEventListener('load',doFirst);

function doFirst(){
  document.getElementById('theFile').onchange = fileChange;
}
function fileChange(){
  let res= $('#theFile').val();
  let arr= res.split("\\");
  var filename=arr.slice(-1)[0];

}

$(document).ready(function(){
  //會員專區修改
  id = '';
  $(document).ready(function(){
    $('.change').click(function(){
      id = $(this).siblings('.content').attr('id');
      let value = $.trim($(`#${id}`).text());
      $(`#${id}`).replaceWith(`<input type="text" value="${value}" class="ok">`);
      $('.ok').css({
        "font-size":"16px",
      });
      $(this).text('確認');
      $(this).on('click',function(){
        let ok = $('.ok').val();
        $(this).siblings('.ok').replaceWith(`<div class="content" id="${id}">${ok}</div>`);
        $(this).text('修改');
      });
    });
  });
  
  //按鈕切換
  $("button.tabbtn").on("click", function(e){
    e.preventDefault();
    console.log(123);
  
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
  
    $("div.tab").removeClass("-on");
    $("div.tab." + $(this).attr("data-target")).addClass("-on");
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