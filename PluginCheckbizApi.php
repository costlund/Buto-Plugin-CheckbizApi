<?php
class PluginCheckbizApi{
  public $token = null;
  private $url = 'https://api.checkbiz.se/api/v1';
  public function get_personalinformation($SSN){
    wfPlugin::includeonce('server/json');
    $server = new PluginServerJson();
    $get = '/personinformation?SSN='.$SSN;
    $result = $server->get($this->url.$get, array('Package' => 'PersonInformation', 'Authorization' => 'Basic '.$this->token));
    /**
     * db
     */
    wfPlugin::includeonce('checkbiz/db');
    $db = new PluginCheckbizDb();
    $insert = array();
    $insert['SSN'] = $SSN;
    $insert['ssnStatus'] = $result['ssnStatus'];
    $insert['responseCode'] = $result['responseCode'];
    $insert['responseMessage'] = $result['responseMessage'];
    foreach($result['basic'] as $k => $v){
      $insert["basic_$k"] = $v;
    }
    foreach($result['extended'] as $k => $v){
      $insert["extended_$k"] = $v;
    }
    $db->checkbiz_personalinformation_insert($insert);
    /**
     * 
     */
    return $result;
  }
}