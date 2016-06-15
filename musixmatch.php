<?php
/**
 * musixmatch api handeler
 * @author Saiful Islam <http://saiful.im>
 */
class musiXmatch
{
    public function __construct($key = "")
    {
        if (empty($key)) {
            throw new Exception("api key can't be empty", 1);
        }
        $this->param = [];
        $this->param['apikey'] = $key;
        $this->baseurl = "http://api.musixmatch.com/ws/1.1/";
        $this->ch = curl_init();
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($this->ch, CURLOPT_USERAGENT, "musicxmatch-php-0.0.1");
    }

    /**
     * @param  [string] parameter name
     * @param  [string] parameter value
     * @return [void]
     */
    public function param($name, $value)
    {
        $this->param[$name] = $value;
    }

    /**
     * @return [string] request code in text
     */
    public function status()
    {
        $codes = [
            200 => "The request was successful.",
            400 => "The request had bad syntax or was inherently impossible to be satisfied.",
            401 => "Authentication failed, probably because of invalid/missing API key.",
            402 => "The usage limit has been reached, either you exceeded per day requests limits or your balance is insufficient.",
            403 => "You are not authorized to perform this operation.",
            404 => "The requested resource was not found.",
            405 => "The requested method was not found.",
            500 => "Ops. Something were wrong.",
            503 => "Our system is a bit busy at the moment and your request can’t be satisfied.",
        ];
        $code = $this->result->message->header->status_code;
        if (array_key_exists($code, $codes)) {
            return $code . ":" . $codes[$code];
        } else {
            return curl_error($this->ch);
        }
    }

    /**
     * @param  [string] musixmatch api method <https://developer.musixmatch.com/documentation/api-methods>
     * @param  [string] output formate (json/xml)
     * @return [string] json/xml/string data
     */
    public function find($method, $type = "json")
    {
        $this->param['format'] = $type;
        $url = $this->baseurl . strtolower($method) . "?" . http_build_query($this->param);
        curl_setopt($this->ch, CURLOPT_URL, $url);
        $result = curl_exec($this->ch);
        $this->result = ($type == "json") ? json_decode($result) : simplexml_load_string($result);
        if (!$result) {
            return curl_error($this->ch);
        }
        return $this->result;
    }
}
