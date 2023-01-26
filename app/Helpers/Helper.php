<?php

function responseCase($request){
	
	$data = $request;
	$response = [];
	foreach($data as $key=>$datas){
		$response[lcfirst(str_replace(' ', '',ucwords(str_replace('_', ' ',$key))))] = $datas;
	}
	return $response;
}
