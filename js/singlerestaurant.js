$(document).ready(function(){

    $('.small img').click(function(){
        $('.small img').addClass('togray');
        $(this).removeClass('togray');
        let src = $(this).attr('src');
        $('#mainimg').attr('src',src);

    });

    $('#send').submit(function(){
        let content = $('textarea').val();
        let id = $('#leavemessage div:last-child').attr('id').split('L')[1];
        id = parseInt(id);
        id+=1;
        

        $('#leavemessage').append(`
        <div id='L${id}' class='L'  >
            <img src="http://fakeimg.pl/60x60" alt="">
            <p>${content}</p>
        </div>` 
        );
        content = '';
        $('textarea').val('');
        return false;
    });

    let today = new Date();
    day = today.getDay();

    $(`#week #${day}`).css({
        'color':'red',
        'fontSize':'18px',
    });

    function largeH(){
        let ww = $(window).width();
        // console.log(ww);
        if(ww<600){
            $('.large').css({'height':`${ww}px`});
        }else{
            $('.large').css({'height':'600px'});
        }
    }

    largeH();

    $(window).resize(function(){
        largeH();
    });

    // m_MouseDown = false;
    // selected = '';

    // document.getElementsByTagName('textarea')[0].onmousedown = function (e) {
    //     m_MouseDown = true;
    //     // console.log(1);
    // };

    // document.getElementsByTagName('textarea')[0].onmouseup = function (e) {
    //     m_MouseDown = false;
    //     // console.log(2);
    // };

    // document.getElementsByTagName('textarea')[0].onmousemove = function(e) {
    //     if (m_MouseDown) {
    //         selected = getText();
    //         $('textarea').append(`<span>${selected}</span>`);
    //     }        
    // }

    // function getText() {
    //     var elem = document.getElementsByTagName('textarea')[0];
    //         return elem.value.substring(elem.selectionStart,elem.selectionEnd);
    // }
    
    $('.fa-bold').on('click',function(){
        $('textarea').toggleClass('bold');
        $(this).toggleClass('used');
    });
    $('.fa-italic').on('click',function(){
        $('textarea').toggleClass('italic');
        $(this).toggleClass('used');
    });
    $('.fa-underline').on('click',function(){
        $('textarea').toggleClass('underline');
        $(this).toggleClass('used');
    });

});