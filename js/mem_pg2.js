// $(document).ready(function(){
// });
$("a.tab").on("click", function(e){
  e.preventDefault();

  $(this).closest("ul").find("a.tab").removeClass("-on");
  $(this).addClass("-on");

  $("div.tab").removeClass("-on");
  $("div.tab." + $(this).attr("data-target")).addClass("-on");
});

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
    console.log(id);
});
console.log('jq ok');