<?php
include 'class.CodAPI.php';
include 'players.php';
$data= new CodAPI;

$all_data= [];
foreach ($players as $player) {
	$stats=$data->getStats($player, 'bo4', 'xbl');
	echo '<br><br>';
	var_dump($stats['user']);
	echo '<br><br>';

}