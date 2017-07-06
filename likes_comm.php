<?php
include "posts.php";
$posts=posts();
 // echo '<pre>';
 // print_r($posts);
 // echo $paccess_token;
function likes($like)
{
   $curl = curl_init();
   $paccess_token=pagetoken();
   //echo $access_token;
   curl_setopt_array($curl, array(
     CURLOPT_URL => "https://graph.facebook.com/".$like."/likes?access_token=".$paccess_token,
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
      $data=$result['data'];
      // echo '<pre>';
      // print_r($data);
      $dcount=count($data);
      $likes_id=array();
      for($i=0;$i<$dcount;$i++)
      {
        $likes_id[$i]=$data[$i]['id'];
      }
      // echo '<pre>';
      // print_r($posts_id);
      return $likes_id;

   }
 }
 function comments($like)
 {
   $curl = curl_init();
   $paccess_token=pagetoken();
   //echo $access_token;
   curl_setopt_array($curl, array(
     CURLOPT_URL => "https://graph.facebook.com/".$like."/comments?access_token=".$paccess_token,
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
      $data=$result['data'];
        // echo '<pre>';
        // print_r($data);
        $dcount=count($data);
        $likes_id=array();
        for($i=0;$i<$dcount;$i++)
        {
          $likes_id[$i]=$data[$i]['from']['id'];
        }
        // echo '<pre>';
        // print_r($posts_id);
        return $likes_id;

   }
 }
 function cusers()
 {
   $posts=posts();
   $pcount=count($posts);
   $post_likes=array();
   for($i=0;$i<$pcount;$i++)
   {
     $post_likes[$i]= comments($posts[$i]);
   }
  //  echo '<pre>';
  //  print_r($post_likes);
  $plikes=count($post_likes);
  $all_likes=array();
  for($i=0;$i<$plikes;$i++)
  {

    $temp=$post_likes[$i];
    //print_r($temp);
    $tcount=count($temp);
    // echo $i."=>".$tcount;
    // echo "<br>";
    for($j=0;$j<$tcount;$j++)
    {
      array_push($all_likes,$temp[$j]);
    }

  }
  // echo '<pre>';
  // print_r($all_likes);
  // echo"****************************<br>";
  // print_r(array_count_values($all_likes));
  $user_ids=array_count_values($all_likes);
  // echo '<pre>';
  // print_r($user_id);
  arsort($user_ids);
  // echo '<pre>';
  // print_r($user_ids);
  //$user_id = array_keys($user_ids);
  return $user_ids;

  }
 function users()
 {
   $posts=posts();
   $pcount=count($posts);
   $post_likes=array();
   for($i=0;$i<$pcount;$i++)
   {
     $post_likes[$i]= likes($posts[$i]);
   }
   // echo '<pre>';
   // print_r($post_likes);
  $plikes=count($post_likes);
  $all_likes=array();
  for($i=0;$i<$plikes;$i++)
  {

    $temp=$post_likes[$i];
    //print_r($temp);
    $tcount=count($temp);
    // echo $i."=>".$tcount;
    // echo "<br>";
    for($j=0;$j<$tcount;$j++)
    {
      array_push($all_likes,$temp[$j]);
    }

  }
  // echo '<pre>';
  // print_r($all_likes);
  // echo"****************************<br>";
  // print_r(array_count_values($all_likes));
  $user_ids=array_count_values($all_likes);
  // echo '<pre>';
  // print_r($user_id);
  arsort($user_ids);
  // echo '<pre>';
  // print_r($user_ids);
  // $max = max($user_ids); // $max == 7
  // $keys=array_keys($user_ids, $max);
  //print_r($keys);
  //$user_id = array_keys($user_ids);
  return $user_ids;

 }
 //users();
