<?php
function getRepos($userName){
    $url ="https://api.github.com/users/$userName/repos";
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    $headers = array(
        "User-Agent: index.php",
    );
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    $curl_data = curl_exec($curl_handle);
    curl_close($curl_handle);
    $response_data = json_decode($curl_data,true);
    return $response_data;
}
function getFollowers($userName){
    $url ="https://api.github.com/users/$userName/followers";
    $curl_handle = curl_init();
    curl_setopt($curl_handle, CURLOPT_URL, $url);
    $headers = array(
        "User-Agent: index.php",
    );
    curl_setopt($curl_handle, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
    $curl_data = curl_exec($curl_handle);
    curl_close($curl_handle);
    $response_data = json_decode($curl_data,true);
    if(gettype($response_data)!== 'array'){
        return false;
    }else{
        return $response_data;
    }
}
