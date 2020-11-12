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
    }

    function soundEffect() {
        var audio = $("audio")[0];
        audio.pause();
        audio.currentTime = 0;
        audio.play();
    }

    $(".dice-container").on("dragstop ", function() {
        var number = randomizeNumber();
        let ccc = document.querySelector('#denDice').className;

        // console.log(ccc);
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