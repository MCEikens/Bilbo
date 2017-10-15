<?php
/**
 * Created by PhpStorm.
 * User: MCEikens
 * Date: 15.10.2017
 * Time: 16:57
 */

class Messages
{

    public function errorMessages($errorType, $errorCode) {

        $errorTypeArr = array (/*HIER KOMMEN GESTYLE DIV UND CO FÜR DIE MELDUNGEN REIN BSP: "ERRORTYPE" => "ERRORCODE"*/);
        $errorMsgArr = array ( /*HIER KOMMEN DANN DIE MELDUNGEN REIN BSP: "ERRORMELDUNG" => "ERRORCODE"*/);

        $errorTyp = array_search($errorType, $errorTypeArr);
        $errorMsg = array_search($errorCode, $errorMsgArr);

        $errorMessage = $errorTyp.$errorMsg;
        return $errorMessage;

    }
}