$(document).ready(function() {
    $(".dice-container").draggable();

    var previous;

    function randomizeNumber() {
        //Randimizes a number between 1 and 6
        var random = Math.floor(Math.random() * 6 + 1);
        return random;
    }

    function rollDice(side) {
        //Removes old class and adds the new
        var dice = $("#denDice");
        var currentClass = dice.attr("class");
        var newClass = "show-" + side;

        dice.removeClass();
        dice.addClass(newClass);

        // if (currentClass == newClass) {
        //     dice.addClass("show-same");
        // }
    }

    function soundEffect() {
        var audio = $("audio")[0];
        audio.pause();
        audio.currentTime = 0;
        audio.play();
    }

    $(".dice-container").on("dragstop ", function() {
        //Function triggered on dice dragstop
        var number = randomizeNumber();

        // console.log('1');


        let ccc = document.querySelector('#denDice').className;
        console.log(ccc);



        // if (number == 1) {
        //     rollDice("front");
        //     console.log('6');
        // } else if (number == 2) {
        //     rollDice("back");
        //     console.log('1');
        // } else if (number == 3) {
        //     rollDice("right");
        //     console.log('4');
        // } else if (number == 4) {
        //     rollDice("left");
        //     console.log('3');
        // } else if (number == 5) {
        //     rollDice("top");
        //     console.log('2');
        // } else if (number == 6) {
        //     rollDice("bottom");
        //     console.log('5');
        // }

        soundEffect();
    });

    $("#help").on("click", function() {
        //Toggles the instructions
        var help = $("#help");
        var instructions = $("#instructions");

        instructions.fadeToggle();

        if (help.text() == "?") {
            help.text("X");
        } else {
            help.text("?");
        }
    });
});