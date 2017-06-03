<?php
function GetVid($str){
    $data=substr($str,strrpos($str,"/")+1);
    $data=strrev($data);
    $data=substr($data,5);
    $data=strrev($data);
    return $data;
}
function GetUrl($url_vid){
  $xml_data=file_get_contents("http://vv.video.qq.com/geturl?vid=".$url_vid."&otype=xml&platform=1&ran=0%2E9652906153351068");
  $xml_parser=xml_parser_create();
  xml_parse_into_struct($xml_parser,$xml_data,$xml_array);
  xml_parser_free($xml_parser);
  return $xml_array[20]['value'];
}
if(is_array($_GET)&&count($_GET)>0){
  if(isset($_REQUEST["url"])){
    $url=$_REQUEST["url"];//存在
    $vid=GetVid($url);
    echo GetUrl($vid);
  }else{
    die("Error!");
  }
}else{
  die("Error!");
}


?>
