<?php
    include("./inc/header.inc.php");
?>
<site>

<?php
    include("./inc/aside.inc.php");
?>
<content id="content slotMachine">
<main>
	<section id="status">Bienvenue!</section>
	<section id="Slots">
		<div id="slot1" class="a1"></div>
		<div id="slot2" class="a1"></div>
		<div id="slot3" class="a1"></div>
	</section>
	<section onclick="doSlot()" id="Gira">TAKE A SPIN!</section>
	<section id="options">
		<img src="./images/icons/audioOn.png" id="audio" class="option" onclick="toggleAudio()" />
	</section>
</main>
</content>
</site>
<?php
    include("./inc/footer.inc.php");
?>
