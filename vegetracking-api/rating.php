<?php

include_once './dbConnect.php';
function rating($type, $id, $score, $comment)
{
	$db = new dbConnect();
	if($type == 0){
		$result = mysqli_query($db->connect(),"INSERT INTO product_rating values (".$id.",".$score.",".$comment.")");

	} else{
		$result = mysqli_query($db->connect(),"INSERT INTO transportation_rating values (".$id.",".$score.",".$comment.")");
	}
	echo $result;
}

$type = $_GET["type"];
$id = $_GET["id"];
$score = $_GET["score"];
$comment = $_GET["comment"];
rating($type, $id, $score, $comment);
?>