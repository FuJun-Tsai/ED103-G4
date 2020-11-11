$(document).ready(function(){
    //餐廳與團渲染
    // let Res_NO = storeContainer.querySelectorAll('div input');
    // var aaa=Res_NO[1].value;
    // console.log(aaa);

    $.ajax({
        url: './index_second_screen.php',
        type: 'GET',
        // data:{
        //     RES_NO:aaa
        // },
        dataType: 'json',
        success(data) {
            console.log(data);
            // let groupData1=JSON.parse(data.responseText)[1];

            var resData = data[0];
            var groupData1 = data[1];

            // console.log(data[0]);
            // console.log(resData);
            for(let i=0; i<5; i++){
                $('.container').append(
                `
                <div class="store" id="store${i+1}">
                <a href="#"><img src="./image/${resData[i].RES_IMAGE1}" alt="#"></a>
                <h4>${resData[i].RES_NAME}</h4>
                <input type="hidden" value="${resData[i].RES_NO}">
                </div>
                `
                )
            }
            // let Res_NO = storeContainer.querySelectorAll('div input');
            // var aaa=Res_NO[2].value;
            // console.log(aaa);

            // // var groupData = data[0];
            // // var firstFoodGroup = groupData[2];
            console.log(groupData1);
            

            for(let j=0; j<4; j++){
                $('.fourTeam').append(
                `
                <div class="team team_${j+1}">
                    <div class="content">
                        <p>團主：${groupData1[j].MEMBER_NAME}</p>
                        <p>團名：${groupData1[j].GROUP_NAME}</p>
                        <p>用餐日期：${groupData1[j].dMT}</p>
                        <p>用餐時間：${groupData1[j].hmMT}</p>
                    </div>
                    <button class="btn_5 btn_js">
                        參加 &#9658 
                        <span></span>
                    </button>
                </div>
                `
                )
            }

            left();
        },

    });
    //  let Res_NO = storeContainer.querySelectorAll('div input');
    //             var aaa=Res_NO[2].value;
    //             console.log(aaa);


    // let aaa=$('#store3 input').value;
    // var aaa=${resData[i].RES_NO}
    // var resData = data[0];
    // var aaa=resData[2].RES_NO;
    //             console.log(aaa);
    

    // $.ajax({    
    //     url: './index_second_screen.php',
    //     type: 'GET',
    //     data:{
    //         RES_NO:aaa
    //     },
    //     dataType: 'json',

    //     success(data){
    //             var groupData = data[0];
    //             var firstFoodGroup = groupData[2];
    //             console.log(groupData1);

    //             for(let j=0; j<4; j++){
    //                 $('.fourTeam').append(
    //                 `
    //                 <div class="team team_${j+1}">
    //                     <div class="content">
    //                         <p>團主：${groupData1[j].MEMBER_NAME}</p>
    //                         <p>團名：${groupData1[j].GROUP_NAME}</p>
    //                         <p>用餐日期：${groupData1[j].dMT}</p>
    //                         <p>用餐時間：${groupData1[j].hmMT}</p>
    //                     </div>
    //                     <button class="btn_5 btn_js">
    //                         參加 &#9658 
    //                         <span></span>
    //                     </button>
    //                 </div>
    //                 `
    //                 )
    //             }

    //         }
    // });

});


//左右鍵
var storeContainer = document.getElementById("storeContainer");
var Rarrow = document.getElementById("Rarrow");
var Larrow = document.getElementById("Larrow");

//右鍵
Rarrow.addEventListener("click",function(){
    let Res_NO = storeContainer.querySelectorAll('div input');
    var aaa=Res_NO[1].value;
    console.log(aaa);

    var s2nd = storeContainer.getElementsByTagName("div")[0];
    var last = storeContainer.getElementsByTagName("div")[4];
    storeContainer.insertBefore( last,s2nd);

    
    $.ajax({
        url: 'index_second_screen.php',
        type: 'GET',
        data:{
            RES_NO:aaa
        },
        dataType: 'json',

        complete(data) {
            console.log(data);
           
            // console.log(JSON.parse(data.responseText));
            let groupData1=JSON.parse(data.responseText)[1];
            // let groupData1=JSON.parse(date.responseText);

            console.log(groupData1);

            $('.fourTeam').empty();

            for(let j=0; j<4; j++){
                $('.fourTeam').append(
                `
                <div class="team team_${j+1}">
                    <div class="content">
                        <p>團主：${groupData1[j].MEMBER_NAME}</p>
                        <p>團名：${groupData1[j].GROUP_NAME}</p>
                        <p>用餐日期：${groupData1[j].dMT}</p>
                        <p>用餐時間：${groupData1[j].hmMT}</p>
                    </div>
                    <button class="btn_5 btn_js">
                        參加 &#9658 
                        <span></span>
                    </button>
                </div>
                `
                )
            }
        }
    });

});


//左鍵
function left(){
    
    var first = document.getElementById("store1");
    var second = document.getElementById("store2");
    var third = document.getElementById("store3");
    var fourth = document.getElementById("store4");
    var fifth = document.getElementById("store5");
    var imgArr = [first,second,third,fourth,fifth];
    var index = 0;

    Larrow.addEventListener("click",function(){
        // alert('123');
        storeContainer.appendChild(imgArr[index]);
        index++
        if(index > 4){
            index = 0;
        }

        let Res_NO = storeContainer.querySelectorAll('div input');
        var bbb=Res_NO[2].value;
        console.log(bbb);

        $.ajax({
            url: 'index_second_screen.php',
            type: 'GET',
            data:{
                RES_NO:bbb
            },
            dataType: 'json',
    
            complete(data) {
                let groupData2=JSON.parse(data.responseText)[1];
                console.log(groupData2);
    
                $('.fourTeam').empty();
    
                for(let j=0; j<4; j++){
                    $('.fourTeam').append(
                    `
                    <div class="team team_${j+1}">
                        <div class="content">
                            <p>團主：${groupData2[j].MEMBER_NAME}</p>
                            <p>團名：${groupData2[j].GROUP_NAME}</p>
                            <p>用餐日期：${groupData2[j].dMT}</p>
                            <p>用餐時間：${groupData2[j].hmMT}</p>
                        </div>
                        <button class="btn_5 btn_js">
                            參加 &#9658 
                            <span></span>
                        </button>
                    </div>
                    `
                    )
                }
            }
        });

    },false);

}


