function checkColor() {
    if (title.innerHTML == "Joker") {
        title.style.background = colorscheme.joker;
    }
}

function getcolor() {
    if (p1.name == "Joker") {
        $(".p1info h1").css("background", colorscheme.joker);
    }
}
//显示信息
function writeinfo() {
    $(".p1info h1").text(p1.name);
    $(".p1info h2").text("$" + p1.money);
    getcolor();
}
// 显示地产信息
for (var i = 0; i < boxes.length; i++) {

}