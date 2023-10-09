<?php
class PluginCheckbizApi{
  public $token = null;
  public function get_personalinformation($SSN){
    wfPlugin::includeonce('server/json');
    $server = new PluginServerJson();
    $url = 'https://api.checkbiz.se/api/v1';
    $get = '/personinformation?SSN='.$SSN;
    $result = $server->get($url.$get, array('Package' => 'PersonInformation', 'Authorization' => 'Basic '.$this->token));
    return $result;
  }
}
