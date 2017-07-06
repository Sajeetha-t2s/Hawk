<?php
function pagetoken()
{
$uaccess_token ="EAACEdEose0cBAPYM33L2xT6DGcVixyi8cggsiupiJmPbKdSRmEhugPjuHBG2yEtQiGz7sUMEO9kJR65mNcspmNTbLK7A6Fq8SHdxRA7ixFT1fsHesNZB2QACmjQQFqJchVUrRP1p6RlwmZCc0ZAYbE4Vgov2nDp3Vkfz9L96yCRUvGJ1oIsZCnequcgAuKMZD";
// $fb = new \Facebook\Facebook([
//   'app_id' => '290373331428347',
//   'app_secret' => '5b4c6c02022025e8ef8f6a8483bae4d6',
//   'default_graph_version' => 'v2.9',
//   //'default_access_token' => '{access-token}', // optional
// ]);
//$access_token =  $fb->getAccessToken();
// $fb->setAccessToken($access_token);


  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://graph.facebook.com/1365851496824871?fields=access_token&access_token=".$uaccess_token,
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
    //return $err;

  } else {
    $result=(json_decode($response,true));
    //echo '<pre>';
    //print_r($result);
    $page=$result['access_token'];
    // echo $page;
    return $page;
  }

}

// pagetoken();
