<?php
include "tag_like.php";
photo();
$users=high();
$max=max($users);
$keys=array_keys($users, $max);
$akeys=array_keys($users);

// echo'<pre>';
// print_r($users);
function name($id)
{
  $curl = curl_init();
  $paccess_token=pagetoken();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://graph.facebook.com/v2.9/{$id}/?access_token=".$paccess_token,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "cache-control: no-cache",
      "postman-token: 11b77365-aba0-91f6-a4a9-81c4825aa54b"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $result=(json_decode($response,true));
    // echo'<pre>';
    // print_r($result);
    $name=$result['name'];
    //echo $name;
    return $name;
  }
}
$top=name($akeys[0]);
$top1=name($akeys[1]);
$top2=name($akeys[2]);

$score=$users[$akeys[0]];
$score1=$users[$akeys[1]];
$score2=$users[$akeys[2]];

$like=$likes[$akeys[0]];
$like1=$likes[$akeys[1]];
$like2=$likes[$akeys[2]];

$comm=$comments[$akeys[0]];
$comm1=$comments[$akeys[1]];
$comm2=$comments[$akeys[2]];

//$top1="Sajee";
 ?>
<!DOCTYPE html>
<html>
<head>
<style>
/*body {background-color: orange;}*/
/*h1   {color: blue;}*/
/*p    {color: red;}*/
</style>
</head>
<body>
<img src="wins.jpg" style="float:left; margin-right:10px; width:100px; height:100px; border:none;">
<img src="wins.jpg" style="float:right; margin-right:10px; width:100px; height:100px; border:none;" >
<img src="wins.jpg" style="float:left; margin-right:10px; width:100px; height:100px; border:none;">
<img src="wins.jpg" style="float:right; margin-right:10px; width:100px; height:100px; border:none;">

<h3><center>HIGHEST CONTRIBUTOR<br><h2><?=$top?> </h2></center></h3>
  <center>      <img src="cong.png"></center>
  <center>
  <h2>Top Contributors</h2>
        <table class="table" border="5">
     <tr>
       <th><b>Name</th>
       <th><b>Score</th>
       <th><b>Likes</th>
        <th><b>Comments</th>
     </tr>
     <tr>
       <td><?=$top?></td>
        <td><?=$score?></td>
         <td><?=$like?></td>
          <td><?=$comm?></td>

     </tr>
     <td><?=$top1?></td>
     <td><?=$score1?></td>
      <td><?=$like1?></td>
       <td><?=$comm1?></td>
     <tr>
       <td><?=$top2?></td>
       <td><?=$score2?></td>
        <td><?=$like2?></td>
         <td><?=$comm2?></td>
     </tr>
   </table>
</body>
</html>
