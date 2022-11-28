<?php
$id = $_GET['id'];
$ids[] = 'NEWS';
$ids[] = 'NEWS';
$ids[] = 'FINA';
$ids[] = 'FINA';
$url = 'https://inews-api.tvb.com/news/checkout/live/hd/ott_I-'.$ids[$id].'_h264?profile=safari';
$header[] = 'CLIENT-IP:127.0.0.1';
$header[] = 'X-FORWARDED-FOR:127.0.0.1';
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_HTTPHEADER,$header);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,false);
$data = curl_exec($ch);
curl_close($ch);
$json = json_decode($data)->content->url;
if($id == 0 || $id == 2) {
    header('location:'.$json->hd);
};
if($id == 1 || $id == 3) {
    header('location:'.$json->sd);
};
/*
    .php?id=0 無線新聞HD
    .php?id=1 無線新聞SD
    .php?id=2 無線財經HD
    .php?id=3 無線財經SD
*/
?>
