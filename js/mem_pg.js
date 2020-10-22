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

// $(document).ready(function(){
//   $("a.tab").on("click", function(e){
//     e.preventDefault();

//     $(this).closest("ul").find("a.tab").removeClass("-on");
//     $(this).addClass("-on");

//     $("div.tab").removeClass("-on");
//     $("div.tab." + $(this).attr("data-target")).addClass("-on");
//   });

//   $(".small-title img").on("click", function(){
//     let smalltitle = $(this).closest(".small-title");
//     $("div.overlay").addClass("-on");
//     $(".btn_modal_send").click(function(){
//       $(smalltitle).closest(".box").remove(".box");
//       $("div.overlay").removeClass("-on");
//     });
//   });

//   $("button.btn_modal_close").on("click", function(){
//     $("div.overlay").removeClass("-on");
//   });

//   $(".Next-page").click(function(){
//       let id = $(".tab.-on .page").attr("id");
//       console.log(id);
//   });
// });