<?php
include 'class.CodAPI.php';
include 'players.php';
include 'config.php';
$data= new CodAPI;

$all_data= [];
foreach ($players as $player) {
	$stats=$data->getStats($player, 'bo4', 'xbl');
	echo '<br><br>';
	var_dump($stats['user']['username']);
	$messages['weekly_stats'] = $stats['user']['username'];
	echo '<br><br>';

}