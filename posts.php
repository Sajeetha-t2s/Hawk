<?php
include "pagetoken.php";

function posts()
{
  $curl = curl_init();
  $paccess_token=pagetoken();
  //echo $access_token;
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://graph.facebook.com/1365851496824871/posts?access_token=".$paccess_token,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "postman-token: e4d23fcb-75ed-ece9-4fa2-32764d9de2ad"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
    die();
  }
   else {

    $result=(json_decode($response,true));
    // echo '<pre>';
    // print_r($result);

    $data=$result['data'];
    //
    // echo '<pre>';
    // print_r($data);

    $dcount=count($data);
    $posts_id=array();
    for($i=0;$i<$dcount;$i++)
    {
      $posts_id[$i]=$data[$i]['id'];
    }
    // echo '<pre>';
    // print_r($posts_id);
    return $posts_id;
  }
}
// posts();
