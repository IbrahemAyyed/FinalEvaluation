<?php 
include('cat.php');
$chat1 = new Chat('Bleu', 15, 'blue', 'male', 'européen');
$chat1 = $chat1->getInfos();
foreach($chat1 as $c) {
	echo $c;
}
$chat2 = new Chat('Rouge', 14, 'red', 'male', 'british');
$chat2 = $chat2->getInfos();
foreach($chat2 as $c) {
	echo $c;
}
$chat3 = new Chat('Verte', 1, 'green', 'female', 'gouttière');
$chat3 = $chat3->getInfos();
foreach($chat3 as $c) {
	echo $c;
}
?>