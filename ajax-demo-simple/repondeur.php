<?php

function mySubmit() {
	return "clické sur submit";
}


if(isset($_REQUEST['idFct']) && $_REQUEST['idFct'] == 1) {
	echo json_encode(getData());
}

function getData() {
	 $array = [
    "data 1",
    "data 2"
];

return $array;
}



if(isset($_REQUEST['idFct']) && $_REQUEST['idFct']  == 2) {
	echo json_encode(cliqueDeux());
}


function cliqueDeux() {
	$array = [
		"data whatever",
		"data forever"
	];
	
	return $array;
}