<?php

require 'vendor/autoload.php';

use Minerva\TotalVoice\TotalVoice;
use Minerva\TotalVoice\SMS\SMS;

class SmsSend
{
    private $number = '21998935437';
    //private $number = '21976059613';
    private $token = '93c7a449a6aa832bf0f433f5409ee4c5';
    private $key = '25123369';
    private $authenticated = false;
    private $textBlock = 'stop123456';
    private $textUnlock = 'resume123456';
    public $textResponse = '';

    public function block($key)
    {
        if(!$this->authentication($key)) {
            return false;
        }
        $sms = new SMS();
        $sms->setNumber($this->number);
        $sms->setText($this->textBlock);

        TotalVoice::$token = $this->token;
        $response = TotalVoice::sendSms($sms);
        return $this->textResponse = $response->getContent();
    }

    public function unlock($key)
    {
        if(!$this->authentication($key)) {
            return false;
        }
        $sms = new SMS();
        $sms->setNumber($this->number);
        $sms->setText($this->textUnlock);

        TotalVoice::$token = $this->token;
        $response = TotalVoice::sendSms($sms);
        return $this->textResponse = $response->getContent();
    }

    private function authentication($key)
    {
        return $this->key === $key;
    }
}
