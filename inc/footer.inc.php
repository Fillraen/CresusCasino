<footer id = 'footer' >
    <nav class = 'smallContainer bot footer' >
    <a href = "#"class = 'signIn2' >
    <i class = "fas fa-user"> </i>
    Connexion
    </a> </nav>
    </footer>


<script >
    var doing = false;
var spin = [new Audio("./images/sounds/spin.mp3"), new Audio("./images/sounds/spin.mp3"), new Audio("./images/sounds/spin.mp3"), new Audio("./images/sounds/spin.mp3"), new Audio("./images/sounds/spin.mp3"), new Audio("./images/sounds/spin.mp3"), new Audio("./images/sounds/spin.mp3")];
var coin = [new Audio("./images/sounds/coin.mp3"), new Audio("./images/sounds/coin.mp3"), new Audio("./images/sounds/coin.mp3")]
var win = new Audio("./images/sounds/win.mp3");
var lose = new Audio("./images/sounds/lose.mp3");
var audio = false;
let status = document.getElementById("status")
var info = true;

function doSlot() {
    if (doing) {
        return null;
    }
    doing = true;
    var numChanges = randomInt(1, 4) * 7
    var numeberSlot1 = numChanges + randomInt(1, 7)
    var numeberSlot2 = numChanges + 2 * 7 + randomInt(1, 7)
    var numeberSlot3 = numChanges + 4 * 7 + randomInt(1, 7)

    var i1 = 0;
    var i2 = 0;
    var i3 = 0;
    var sound = 0
    status.innerHTML = "SPINNING"
    slot1 = setInterval(spin1, 50);
    slot2 = setInterval(spin2, 50);
    slot3 = setInterval(spin3, 50);

    function spin1() {
        i1++;
        if (i1 >= numeberSlot1) {
            coin[0].play()
            clearInterval(slot1);
            return null;
        }
        slotTile = document.getElementById("slot1");
        if (slotTile.className == "a7") {
            slotTile.className = "a0";
        }
        slotTile.className = "a" + (parseInt(slotTile.className.substring(1)) + 1)
    }

    function spin2() {
        i2++;
        if (i2 >= numeberSlot2) {
            coin[1].play()
            clearInterval(slot2);
            return null;
        }
        slotTile = document.getElementById("slot2");
        if (slotTile.className == "a7") {
            slotTile.className = "a0";
        }
        slotTile.className = "a" + (parseInt(slotTile.className.substring(1)) + 1)
    }

    function spin3() {
        i3++;
        if (i3 >= numeberSlot3) {
            coin[2].play()
            clearInterval(slot3);
            testWin();
            return null;
        }
        slotTile = document.getElementById("slot3");
        if (slotTile.className == "a7") {
            slotTile.className = "a0";
        }
        sound++;
        if (sound == spin.length) {
            sound = 0;
        }
        spin[sound].play();
        slotTile.className = "a" + (parseInt(slotTile.className.substring(1)) + 1)
    }
}

function testWin() {
    var slot1 = document.getElementById("slot1").className
    var slot2 = document.getElementById("slot2").className
    var slot3 = document.getElementById("slot3").className

    if (((slot1 == slot2 && slot2 == slot3) ||
            (slot1 == slot2 && slot3 == "a7") ||
            (slot1 == slot3 && slot2 == "a7") ||
            (slot2 == slot3 && slot1 == "a7") ||
            (slot1 == slot2 && slot1 == "a7") ||
            (slot1 == slot3 && slot1 == "a7") ||
            (slot2 == slot3 && slot2 == "a7")) && !(slot1 == slot2 && slot2 == slot3 && slot1 == "a7")) {
        status.innerHTML = "YOU WIN!";
        win.play();
    } else {
        status.innerHTML = "YOU LOSE!"
        lose.play();
    }
    doing = false;
}

function toggleAudio() {
    if (!audio) {
        audio = !audio;
        for (var x of spin) {
            x.volume = 0.5;
        }
        for (var x of coin) {
            x.volume = 0.5;
        }
        win.volume = 1.0;
        lose.volume = 1.0;
    } else {
        audio = !audio;
        for (var x of spin) {
            x.volume = 0;
        }
        for (var x of coin) {
            x.volume = 0;
        }
        win.volume = 0;
        lose.volume = 0;
    }
    document.getElementById("audio").src = "./images/icons/audio" + (audio ? "On" : "Off") + ".png";
}

function randomInt(min, max) {
    return Math.floor((Math.random() * (max - min + 1)) + min);
}
window.addEventListener('load', init);

// Globals

// Available Levels
const levels = {
    easy: 5,

};

// To change level
const currentLevel = levels.easy;

let time = currentLevel;
let score = 0;
let isPlaying;

// DOM Elements
const wordInput = document.querySelector('#word-input');
const currentWord = document.querySelector('#current-word');
const scoreDisplay = document.querySelector('#score');
const timeDisplay = document.querySelector('#time');
const message = document.querySelector('#message');
const seconds = document.querySelector('#seconds');

const words = [
    'bonjour',
    'javascript',
    'php',
    'wordpress',
    'notepad',
    'bloc-note',
    'visualcode',
    'digital',
    'marketing',
    'web',
    'digitalschool',
    'adobe',
    'fruit',
    'tacos',
    'puzzle',
    'iphone',
    'samsung',
    'sac',
    'voiture',
    'facebook',
    'instagram',
    'messenger',

];

// Initialize Game
function init() {
    // Show number of seconds in UI
    seconds.innerHTML = currentLevel;
    // Load word from array
    showWord(words);
    // Start matching on word input
    wordInput.addEventListener('input', startMatch);
    // Call countdown every second
    setInterval(countdown, 1000);
    // Check game status
    setInterval(checkStatus, 50);
}

// Start match
function startMatch() {
    if (matchWords()) {
        isPlaying = true;
        time = currentLevel + 1;
        showWord(words);
        wordInput.value = '';
        score++;
    }

    // If score is -1, display 0
    if (score === -1) {
        scoreDisplay.innerHTML = 0;
    } else {
        scoreDisplay.innerHTML = score;
    }
}

// Match currentWord to wordInput
function matchWords() {
    if (wordInput.value === currentWord.innerHTML) {
        message.innerHTML = 'BIEN';
        return true;
    } else {
        message.innerHTML = '';
        return false;
    }
}

// Pick & show random word
function showWord(words) {
    // Generate random array index
    const randIndex = Math.floor(Math.random() * words.length);
    // Output random word
    currentWord.innerHTML = words[randIndex];
}

// Countdown timer
function countdown() {
    // Make sure time is not run out
    if (time > 0) {
        // Decrement
        time--;
    } else if (time === 0) {
        // Game is over
        isPlaying = false;
    }
    // Show time
    timeDisplay.innerHTML = time;
}

// Check game status
function checkStatus() {
    if (!isPlaying && time === 0) {
        message.innerHTML = 'PERDU !';
        score = -1;
    }
}




// Keyboard

(function () {
    var kTab = [],
        rTab = [],
        rTabC,
        k,
        t,
        ct,
        cons,
        regi = !1,
        srt;

    /**/
    function KeyC() {

    }
    /* Random */
    function KeyR() {
        i = Math.floor((Math.random() * rTabC.length));
        tr = document.getElementById('k' + rTabC[i]);
        tr.className = 'key active';
    }
    /* register */
    function R() {
        if (!regi) regi = !0;
        else regi = !1;
    }
    /* Input */
    function I() {
        onkeydown = function (e) {
            k = e.which;
            kTab[k] = !0;
            TD(k);
        };
        onkeyup = function (e) {
            k = e.which;
            kTab[k] = !1;
            TU(k);
            if (regi) {
                rTab.push(k);
                TD(k);
            };
        };
        onclick = function (e) {
            c = e.target.id;
            C(c);
            if (c == "btnStart") {
                B(cons, 'btnConsign');
                N(srt, 'btnStart');
                R();
            }
            if (c == "btnConsign") {
                R();
                rTabC = cleanArray(rTab);
                for (var i = 0; i < rTabC.length; i++) {
                    var touch = document.getElementById('k' + rTabC[i]);
                    touch.className = 'key';
                };
                N(cons, 'btnConsign');
                setInterval(KeyR, 1000);
            }

            this.console.log(this.onkeyup)
        };
    }
    /* touch Down */
    function TD(_k) {
        t = document.getElementById('k' + _k)
        t.className = 'key tap';
    }
    /* touch Up */
    function TU(_k) {
        t = document.getElementById('k' + _k)
        t.className = 'key';
    }
    /* display None */
    function N(_v, _o) {
        if (_o) _v = document.getElementById(_o);
        _v.style.display = "none";
        _v.style.opacity = "0";
    }
    /* display Block */
    function B(_v, _o) {
        _v = document.getElementById(_o);
        _v.style.display = "block";
        _v.style.opacity = "1";
    }
    /* Cible click */
    function C(_c) {
        ct = document.getElementById(_c);
    }
    /* Clean Array */
    function cleanArray(array) {
        var i, j, len = array.length,
            out = [],
            obj = {};
        for (i = 0; i < len; i++) {
            obj[array[i]] = 0;
        }
        for (j in obj) {
            out.push(j);
        }
        return out;
    }
    I();
    SG();
}())

</script>

</body>

</html>