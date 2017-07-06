<?php
include "compare.php";

// echo $user_id;
function getphoto()
{
  $curl = curl_init();
  $paccess_token=pagetoken();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://graph.facebook.com/1365851496824871/photos?access_token=".$paccess_token,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"url\"\r\n\r\nhttp://static.digit.in/fckeditor/Nikhil%20images/food%20delivery%20apps/foodpanda.jpg\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"caption\"\r\n\r\nHuuray!! u unlocked 25% offer on your next 5 orders in foodpanda!!\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
      "postman-token: aef2fb5b-8c10-1716-7d14-76b971583a18"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
    die();
  } else {
    $result=(json_decode($response,true));
    // echo '<pre>';
    // print_r($result);
    $id=$result[id];
    return $id;
    //echo $id;
  }
}
function photo()
{
  $user_id=high();
  //print_r($user_id);
  $max=max($user_id);
  $keys=array_keys($user_id, $max);
  $photo_id=getphoto();
  $curl1 = curl_init();
  $paccess_token1=pagetoken();
  curl_setopt_array($curl1, array(
    CURLOPT_URL => "https://graph.facebook.com/".$photo_id."/tags?access_token=".$paccess_token1,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"\"\r\n\r\n\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW\r\nContent-Disposition: form-data; name=\"to\"\r\n\r\n{$keys[0]}\r\n------WebKitFormBoundary7MA4YWxkTrZu0gW--",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW",
      "postman-token: 422f04b5-a723-1c8b-a196-6cc613f6dbc3"
    ),
  ));

  $response = curl_exec($curl1);
  $err = curl_error($curl1);

  curl_close($curl1);

  if ($err) {
    echo "cURL Error #:" . $err;
    die();
  } else {
    //echo $response;
  }
 }
//photo();

 ?>
