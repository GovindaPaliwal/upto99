<?php

  error_reporting(E_ALL);

  // Define global variables
  $s_endpoint = "http://open.api.ebay.com/shopping?";  // Shopping URL to call
  $cellColor = "bgcolor=\"#dfefff\"";  // Light blue background used for selected items 
  $m_endpoint = 'http://svcs.ebay.com/MerchandisingService?';  // Merchandising URL to call
  $appid = 'Arifkhan-product-PRD-38ec8fa73-98f7a427';  // You will need to supply your own AppID
  $responseEncoding = 'XML';  // Type of response we want back

  function getItem($categoryID, $itemDisplay){

    global $m_endpoint;
    global $appid;
    global $responseEncoding;
    // Construct getMostWatchedItems call with maxResults and categoryId as input
    $apicalla  = "$m_endpoint";
    $apicalla .= "OPERATION-NAME=getMostWatchedItems";
    $apicalla .= "&SERVICE-VERSION=1.0.0";
    $apicalla .= "&CONSUMER-ID=$appid";
    $apicalla .= "&RESPONSE-DATA-FORMAT=$responseEncoding";
    $apicalla .= "&maxResults=$itemDisplay";
    $r = ($categoryID == "") ? "" : "&categoryId=$categoryID";
    $apicalla .= $r;
    
    $resp = simplexml_load_file($apicalla);

    if($resp){
        $res = '';
        if($resp->ack == "Success"){

         foreach ($resp->itemRecommendations->item as $item) {
            
         // Determine which price to display
        if ($item->currentPrice) {
            $price = $item->currentPrice;
            } else {
            $price = $item->buyItNowPrice;
            }   

         $res .= '<div class="col-md-3 col-sm-4  col-xs-12">';
         $res .= '<div class="card">';
         $res .= '<img src="'.$item->imageURL.'" style="width:100%; height:230px">';
         $res .= '<h4 style="height:25px;">'.substr($item->title,0,35).'</h4><br>';
         $res .= '<p class="price">$'.$price.'</p>';
         $res .= '<p><a href="'.$item->viewItemURL.'" target="Blank" class="btn btn-skin-outline full-width ">Compare price</a></p>';
         $res .= '</div>';
         $res .= '</div>';
             

         }   

        }

    }

    return $res;

  }


  function homeItem($categoryID, $itemDisplay){

    global $m_endpoint;
    global $appid;
    global $responseEncoding;
    // Construct getMostWatchedItems call with maxResults and categoryId as input
    $apicalla  = "$m_endpoint";
    $apicalla .= "OPERATION-NAME=getMostWatchedItems";
    $apicalla .= "&SERVICE-VERSION=1.0.0";
    $apicalla .= "&CONSUMER-ID=$appid";
    $apicalla .= "&RESPONSE-DATA-FORMAT=$responseEncoding";
    $apicalla .= "&maxResults=$itemDisplay";
    $r = ($categoryID == "") ? "" : "&categoryId=$categoryID";
    $apicalla .= $r;
    
    $resp = simplexml_load_file($apicalla);

    if($resp){
        $res = '';
        if($resp->ack == "Success"){

         foreach ($resp->itemRecommendations->item as $item) {
            
         // Determine which price to display
        if ($item->currentPrice) {
            $price = $item->currentPrice;
            } else {
            $price = $item->buyItNowPrice;
            }   

        $res .= '<div class="item">';
        $res .= '<img src="'.$item->imageURL.'" class="img-responsive" style="width:100%; height:150px">';
        $res .= '<h5>'.substr($item->title,0,20).'</h5>';
        $res .= '<h5 class="secondary-color font-800">$'.$price.'</h5>';
        $res .= '<a href="'.$item->viewItemURL.'" target="Blank" class="btn btn-skin-outline">compare price</a>';
        $res .= '</div>';
             

         }   

        }

    }

    return $res;

  }



?>