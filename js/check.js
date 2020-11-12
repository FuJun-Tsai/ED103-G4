function doFirst() {
    let a = $('#player1').attr('src', './image/den_image/white.png');

    let boxss = document.querySelectorAll('.box'); //list是陣列



    for (let i = 0; i < boxss.length; i++) {

        boxss[i].addEventListener('click', function() {

            let boxss1 = boxss[i].id;
            let boxId = boxss1.substr(1, 2)
            let ccc = boxss[i].getElementsByTagName('img')[0];
            console.log(boxId);

            var newImg01
            for (let i = 0; i < 4; i++) {
                let newImg01 = document.createElement("img");
                newImg01.setAttribute("id", "no" + i);
                newImg01.src = ccc.src;
                document.querySelector('.purchasebox_content_left').appendChild(newImg01)
            }

            let rsTitle = document.createElement("h2");
            let rsName = document.createElement("h3");
            let rsContent = document.createElement("p");

            document.querySelector('.purchasebox_content_right').appendChild(rsTitle)
            document.querySelector('.purchasebox_content_right').appendChild(rsName);
            let qq = document.querySelector('.purchasebox_content_right').appendChild(rsContent)
            rsTitle.innerText = "今晚!我想來點~"
            rsContent.innerText = place[boxId].text;
            rsName.innerText = place[boxId].name;
            purchase.style.visibility = "visible";
            $('.game_background').css('display', 'block');
        });


        // purchase.children[2].onclick = function() {
        //     let boxss1 = boxss[i].id;
        //     let boxId = boxss1.substr(1, 1)

        //     purchase.style.visibility = "hidden";
        //     person.money -= place[boxId].value;
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


        //     // showMsgbox();
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

        //     // showMsgbox();
        //     gameSequence();
        // }

    }

    $('#b0 img:nth-child(3)').remove();
}

window.addEventListener('load', doFirst);