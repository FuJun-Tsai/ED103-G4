$(".dice-container").on("dragstop ", game)

function game() {
    //骰子点数显示
    var num = Math.ceil(Math.random() * 6);
    var bgi = Math.ceil(Math.random() * 2);


    function rollDice(side) {
        var dice = $("#denDice");
        var currentClass = dice.attr("class");
        var newClass = "show-" + side;

        dice.removeClass();
        dice.addClass(newClass);

    }

    if (num == 6) {
        rollDice("front");
        console.log('6');
    } else if (num == 1) {
        rollDice("back");
        console.log('1');
    } else if (num == 4) {
        rollDice("right");
        console.log('4');
    } else if (num == 3) {
        rollDice("left");
        console.log('3');
    } else if (num == 2) {
        rollDice("top");
        console.log('2');
    } else if (num == 5) {
        rollDice("bottom");
        console.log('5');
    }

    if (s == 1) {
        var move = setInterval(p1move, v);
        text = "p1";
        playing();

    }
    // 游戏核心
    function playing() {
        setTimeout(function() {
            clearInterval(move);
            //绑定对应角色
            if (text == "p1") {
                position = po1;
                console.log(po1)
                person = p1;
            }

            if (place[position].owner == "none") {
                if (person.control == 0) {
                    purchase.style.visibility = "visible";
                } else {
                    purchase.style.visibility = "visible";
                    $('.game_background').css('display', 'block');
                }
                // 买公用地产
                if (place[position].state == 0) {
                    var newImg1
                    for (let i = 0; i < 4; i++) {
                        let newImg1 = document.createElement("img");
                        newImg1.setAttribute("id", "no" + i);
                        newImg1.src = place[position].src_img;
                        document.querySelector('.purchasebox_content_left').appendChild(newImg1)
                    }

                    let rsTitle = document.createElement("h2");
                    let rsName = document.createElement("h3");
                    let rsContent = document.createElement("p");


                    document.querySelector('.purchasebox_content_right').appendChild(rsTitle)
                    document.querySelector('.purchasebox_content_right').appendChild(rsName)
                    document.querySelector('.purchasebox_content_right').appendChild(rsContent)
                    rsTitle.innerText = "今晚!我想來點~"
                    console.log(rsTitle)
                    rsContent.innerText = place[position].text;
                    rsName.innerText = place[position].name;

                    // purchase.children[2].onclick = function() {
                    //     place[position].owner = person.name;
                    //     purchase.style.visibility = "hidden";
                    //     person.money -= place[position].value;
                    //     msgtype = "purchase";
                    //     for (let i = 0; i < 4; i++) {
                    //         let imgAll = document.querySelector('.purchasebox_content_left img')
                    //         imgAll.remove();
                    //     }
                    //     let rsContent = document.querySelector('.purchasebox_content_right p')
                    //     rsContent.remove();
                    //     let rsName = document.querySelector('.purchasebox_content_right h3')
                    //     rsName.remove();
                    //     let rsTitle = document.querySelector('.purchasebox_content_right h2')
                    //     rsTitle.remove();

                    //     gameSequence();
                    // }
                    // purchase.children[3].onclick = function() {
                    //     for (let i = 0; i < 4; i++) {
                    //         let imgAll = document.querySelector('.purchasebox_content_left img')
                    //         imgAll.remove();
                    //     }
                    //     let rsContent = document.querySelector('.purchasebox_content_right p')
                    //         // console.log(rsContent)
                    //     rsContent.remove();
                    //     let rsName = document.querySelector('.purchasebox_content_right h3')
                    //     rsName.remove();
                    //     let rsTitle = document.querySelector('.purchasebox_content_right h2')
                    //     rsTitle.remove();

                    //     purchase.style.visibility = "hidden";

                    //     gameSequence();

                    // }
                    // if (person.control == 0) {
                    //     gameSequence();
                    // }
                }
            }
            //查看变化
            // console.log(person.name + "现在有$" + person.money);

        }, v * num + v * 0.9);

    }

}



spdice.on("click", gamble);

function gamble() {
    var gain = Math.ceil(Math.random() * 6);
    var bgm = Math.ceil(Math.random() * 2);
    spdice.css("background-image", "url(./img/s" + '0' + bgm + ".jpg");
    setTimeout(function() {
        spdice.css("background-image", "url(./img/" + '0' + gain + ".jpg");
    }, 300);
    setTimeout(function() {
        msgtype = "casino";
        casinoMoney = gain * 500;
        person.money += casinoMoney;
        showMsgbox();
        document.querySelector(".bet").style.visibility = "hidden";

    }, v * 2);
    spdice.css("pointer-events", "none");
}



// 轮骰顺序
function gameSequence() {
    if (text == "p1") {
        p1checkState();
    }

}

function p1checkState() {
    if (p2.stop !== 0) {
        setTimeout(function() {
            p2checkState();
            p2.stop -= 1;
            myName = p1.name;
            daysLeft = p2.stop + 1;
            if (po2 == 11) {
                msgtype = "injail";
            } else {
                msgtype = "intrip";
            }
            showMsgbox();
        }, v * 2);
    } else if (p2.state == "bankrupt") {
        p2checkState();
    } else {
        if (p2.control == 0) {
            setTimeout(function() {
                game();
            }, v * 2)
        } else {
            dice.css("pointer-events", "auto");
        }
        s = 1; //第一個角色跑
        // title.innerHTML = p2.name;
        checkColor();
    }
    //     // game();  //game function 是自動跑
}

// 关闭对话框按钮
// purchase.children[3].onclick = function() {
//     purchase.style.visibility = "hidden";
//     gameSequence();
//     purchase.children[2].style.pointerEvents = "auto";
//     purchase.children[2].style.background = "#e1e1e1";
// }
// upgrade.children[3].onclick = function() {
//     upgrade.style.visibility = "hidden";
//     gameSequence();
//     upgrade.children[2].style.pointerEvents = "auto";
//     upgrade.children[2].style.background = "#e1e1e1";
// }

// 角色移动
function p1move() {

    // $('#denDice').cla

    if (po1 == 19) {
        po1 = -1;
        boxes[0].append(i1);
        // p1.money += 2000;
    }
    po1++;
    boxes[po1].append(i1);

    if (po1 == 0 || po1 == 1 || po1 == 2 || po1 == 3 || po1 == 4 || po1 == 5) {

        let aaa = $('.control h1').text();
        let bbb = aaa.substr(0, 1)
        console.log(bbb);

        switch (bbb) {
            case '乂':
                $('#player1').attr('src', './image/den_image/allgif/乂小壞乂.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '大':
                $('#player1').attr('src', './image/den_image/allgif/大番薯.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '方':
                $('#player1').attr('src', './image/den_image/allgif/方塊號.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '眼':
                $('#player1').attr('src', './image/den_image/allgif/眼鏡仔.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '煞':
                $('#player1').attr('src', './image/den_image/allgif/煞氣乂流氓.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '辣':
                $('#player1').attr('src', './image/den_image/allgif/辣個男人.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '德':
                $('#player1').attr('src', './image/den_image/allgif/德克斯特.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                // $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
        }
    }


    if (po1 == 11 || po1 == 12 || po1 == 13 || po1 == 14 || po1 == 15) {

        let aaa = $('.control h1').text();
        let bbb = aaa.substr(0, 1)
        console.log(bbb);

        switch (bbb) {
            case '乂':
                $('#player1').attr('src', './image/den_image/allgif/乂小壞乂.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '大':
                $('#player1').attr('src', './image/den_image/allgif/大番薯.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '方':
                $('#player1').attr('src', './image/den_image/allgif/方塊號.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '眼':
                $('#player1').attr('src', './image/den_image/allgif/眼鏡仔.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '煞':
                $('#player1').attr('src', './image/den_image/allgif/煞氣乂流氓.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '辣':
                $('#player1').attr('src', './image/den_image/allgif/辣個男人.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '德':
                $('#player1').attr('src', './image/den_image/allgif/德克斯特.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
        }
    }


    if (po1 == 6 || po1 == 7 || po1 == 8 || po1 == 9 || po1 == 10) {

        let aaa = $('.control h1').text();
        let bbb = aaa.substr(0, 1)
        console.log(bbb);

        switch (bbb) {
            case '乂':
                $('#player1').attr('src', './image/den_image/allgif/乂小壞乂_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '大':
                $('#player1').attr('src', './image/den_image/allgif/大番薯_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '方':
                $('#player1').attr('src', './image/den_image/allgif/方塊號_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '眼':
                $('#player1').attr('src', './image/den_image/allgif/眼鏡仔_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '煞':
                $('#player1').attr('src', './image/den_image/allgif/煞氣乂流氓_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '辣':
                $('#player1').attr('src', './image/den_image/allgif/辣個男人_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
            case '德':
                $('#player1').attr('src', './image/den_image/allgif/德克斯特_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(-1)');
                // $('#player1').width(190).height(190);
                break;
        }
    }


    if (po1 == 16 || po1 == 17 || po1 == 18 || po1 == 19) {

        let aaa = $('.control h1').text();
        let bbb = aaa.substr(0, 1)
        console.log(bbb);

        switch (bbb) {
            case '乂':
                $('#player1').attr('src', './image/den_image/allgif/乂小壞乂_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
            case '大':
                $('#player1').attr('src', './image/den_image/allgif/大番薯_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
            case '方':
                $('#player1').attr('src', './image/den_image/allgif/方塊號_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
            case '眼':
                $('#player1').attr('src', './image/den_image/allgif/眼鏡仔_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
            case '煞':
                $('#player1').attr('src', './image/den_image/allgif/煞氣乂流氓_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
            case '辣':
                $('#player1').attr('src', './image/den_image/allgif/辣個男人_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
            case '德':
                $('#player1').attr('src', './image/den_image/allgif/德克斯特_jump.gif');
                // $('#player1').css('transform', 'translate(-80px,-20px) scaleX(-1)');
                $('#player1').css('transform', 'scaleX(1)');
                // $('#player1').width(190).height(190);
                break;
        }
    }


}
$('.close').on('click', function() {
    $('.purchasebox').css('visibility', 'hidden');
    $('.purchasebox_content_left').empty();
    $('.purchasebox_content_right').empty();
    $('.game_background').css('display', 'none');
});