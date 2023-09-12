<?php
    include("./inc/header.inc.php");
?>


<site>

<?php
    include("./inc/aside.inc.php");
?>

<div class="container text-center">
    <div class="row ">
        <div class="">
            <p class="lead">VOUS AVEZ
                <span class="text-success" id="seconds">5</span> SECONDES PAR MOTS</p>
            <h2 class="display-2 mb-5" id="current-word">SALUT</h2>
            <input type="text" class="form-control form-control-lg" placeholder="" id="word-input" autofocus>
            <h4 class="mt-3" id="message"></h4>


            <div class="row time">
                <div class="col-md-6">
                    <h3>TEMPS :
                        <span id="time">0</span>
                    </h3>
                </div>
                <div class="col-md-6">
                    <h3>SCORE :
                        <span id="score">0</span>
                    </h3>
                </div>
            </div>




            <div class="key-wrapper center" id="clavier">
                <ul class="lign">
                    <li id="k65" class="key">A</li>
                    <li id="k90" class="key">Z</li>
                    <li id="k69" class="key">E</li>
                    <li id="k82" class="key">R</li>
                    <li id="k84" class="key">T</li>
                    <li id="k89" class="key">Y</li>
                    <li id="k85" class="key">U</li>
                    <li id="k73" class="key">I</li>
                    <li id="k79" class="key">O</li>
                    <li id="k80" class="key">P</li>
                </ul>
                <ul class="lign">
                    <li id="k81" class="key">Q</li>
                    <li id="k83" class="key">S</li>
                    <li id="k68" class="key">D</li>
                    <li id="k70" class="key">F</li>
                    <li id="k71" class="key">G</li>
                    <li id="k72" class="key">H</li>
                    <li id="k74" class="key">J</li>
                    <li id="k75" class="key">K</li>
                    <li id="k76" class="key">L</li>
                    <li id="k77" class="key">M</li>
                </ul>
                <ul class="lign">
                    <li id="k87" class="key">W</li>
                    <li id="k88" class="key">X</li>
                    <li id="k67" class="key">C</li>
                    <li id="k86" class="key">V</li>
                    <li id="k66" class="key">B</li>
                    <li id="k78" class="key">N</li>
                </ul>
                <ul class="lign">
                    <li id="k32" class="key">ESPACE</li>
                </ul>
            </div>
</content id='content'>

</site>






<?php
    include("./inc/footer.inc.php");
?>
