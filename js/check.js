function doFirst(e) {
    let a = $('#player1').attr('src', './image/den_image/white.png');

    let boxss = document.querySelectorAll('.box'); //list是陣列



    for (let i = 0; i < boxss.length; i++) {

        boxss[i].addEventListener('click', function() {

            let boxss1 = boxss[i].id;
            let boxId = boxss1.substr(1, 2)
            let ccc = boxss[i].getElementsByTagName('img')[0];

            var newImg01

            $('.purchasebox_content_left').append(
                `
                    <div class="main_img">
                        <img src="./image/restaurant_management_img/${e[boxId].RES_IMAGE1}">            
                    </div>
                    <div class="vice_img">
                        <img src="./image/restaurant_management_img/${e[boxId].RES_IMAGE1}">            
                        <img src="./image/restaurant_management_img/${e[boxId].RES_IMAGE2}">            
                        <img src="./image/restaurant_management_img/${e[boxId].RES_IMAGE3}">            
                        <img src="./image/restaurant_management_img/${e[boxId].RES_IMAGE4}">                              
                    </div>                    
                    `
            );
            $('.purchasebox_content_right').append(
                `
                    <h2>今晚！我想來點～</h2>
                    <h3>店名:</h3>
                    <h4>  ${e[boxId].RES_NAME}</h4>
                    <br>
                    <h3>簡介:</h3>
                    <p>${e[boxId].RES_SUMMARY}</p>
                `
            );






            // let rsTitle = document.createElement("h2");
            // let rsName = document.createElement("h3");
            // let rsContent = document.createElement("p");

            // document.querySelector('.purchasebox_content_right').appendChild(rsTitle)
            // document.querySelector('.purchasebox_content_right').appendChild(rsName);
            // let qq = document.querySelector('.purchasebox_content_right').appendChild(rsContent)
            // rsTitle.innerText = "今晚!我想來點~"
            // console.log(e);
            // rsContent.innerText = e[boxId].RES_SUMMARY;
            // rsName.innerText = e[boxId].RES_NAME;
            $('.purchasebox').css('visibility', ' visible');
            $('.game_background').css('display', 'block');
        });

    }

    $('#b0 img:nth-child(3)').remove();
}