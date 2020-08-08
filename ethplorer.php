<?php
class Ethplorer{

    public $apiAdress = "https://api.ethplorer.io/";
    public $apiKey = "freekey";
    public $proxy = "http://p.webshare.io:80";
    public function curl($jsonURL, $proxyUserId){

        $url = $jsonURL;
        $header[0] = "Accept: text/xml,application/xml,application/xhtml+xml,";
        $header[0] .= "text/html;q=0.9,text/plain;q=0.8,image/png,*/*;q=0.5";

        $header[] = "Cache-Control: max-age=0";
        $header[] = "Connection: keep-alive";
        $header[] = "Keep-Alive: 300";
        $header[] = "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7";
        $header[] = "Accept-Language: en-us,en;q=0.5";
        $header[] = "Pragma: ";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_USERAGENT, 'Googlebot/2.1 (+http://www.google.com/bot.html)');
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_REFERER, 'http://www.google.com');
        curl_setopt($curl, CURLOPT_ENCODING, 'gzip,deflate');
        curl_setopt($curl, CURLOPT_AUTOREFERER, true);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_VERBOSE, 1);
//        curl_setopt($curl, CURLOPT_PROXY, $this->proxy);
//        curl_setopt($curl, CURLOPT_PROXYUSERPWD, "sysgkasd-".$proxyUserId.":vjen2q1odk92" );


        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

    public function getLastBlock($proxyUserId){
        return $response = $this->curl($this->apiAdress."getLastBlock?apiKey=".$this->apiKey."", $proxyUserId );
    }

    public function getTokenInfo($token, $proxyUserId){
        return $response = $this->curl($this->apiAdress."getTokenInfo/".$token."?apiKey=".$this->apiKey."", $proxyUserId);
    }

    public function getAddressInfo($address, $proxyUserId){
        return $response = $this->curl($this->apiAdress."getAddressInfo/".$address."?apiKey=".$this->apiKey."", $proxyUserId);
    }

    public function getTxInfo($tx, $proxyUserId){
        return $respomse = $this->curl($this->apiAdress."getTxInfo/".$tx."?apiKey=".$this->apiKey."", $proxyUserId);
    }

    public function getTokenHistory($token, $type = "transfer", $limit = 10, $proxyUserId = null){
        return $response = $this->curl($this->apiAdress."getTokenHistory/".$token."?apiKey=".$this->apiKey."&type=".$type."&limit=".$limit."", $proxyUserId);
    }

    public function getAddressHistory($token, $type = "transfer", $limit = 10, $proxyUserId = null){
        return $response = $this->curl($this->apiAdress."getAddressHistory/".$token."?apiKey=".$this->apiKey."&type=".$type."&limit=".$limit."", $proxyUserId);
    }

    public function getAddressTransactions($token, $limit = 10, $proxyUserId = null){

        return $response = $this->curl($this->apiAdress."getAddressTransactions/".$token."?apiKey=".$this->apiKey."&limit=".$limit."", $proxyUserId);
    }

    public function getTop($criteria = "cap", $limit = 50, $proxyUserId = null){

        return $response = $this->curl($this->apiAdress."getTop?apiKey=".$this->apiKey."&criteria=".$criteria."&limit=".$limit."", $proxyUserId);

    }

    public function getTopTokens($proxyUserId){

        return $response = $this->curl($this->apiAdress."getTopTokens/?apiKey=".$this->apiKey."", $proxyUserId);
    }


    public function getTopTokenHolders($token, $limit = 100, $proxyUserId){

        return $response = $this->curl($this->apiAdress."getTopTokenHolders/".$token."?apiKey=".$this->apiKey."&limit=".$limit."", $proxyUserId);

    }

    public function getTokenHistoryGrouped($token, $proxyUserId){
        return $response = $this->curl($this->apiAdress."getTokenHistoryGrouped/".$token."?apiKey=".$this->apiKey."", $proxyUserId);

    }

    public function getTokenPriceHistoryGrouped($token, $period = 365, $proxyUserId){

        return $response = $this->curl($this->apiAdress."getTokenPriceHistoryGrouped/".$token."?apiKey=".$this->apiKey."&period=".$period."", $proxyUserId);
    }

}
