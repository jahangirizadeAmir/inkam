<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 9/10/18
 * Time: 8:02 PM
 */

class Fanava
{

    private $UserName = 'I_FANAVA';
    private $password = '123';
    private $serial = 'ipg0000001';
    private $terminalId = '71057515';
    private $merchantCode='71054773';
    private $token='';
    private $url='https://nafis.fanavacard.com/_ipgn_';
    private $redirectUrl='http://inkam.ir/testVerf.php';
    private $ip='37.187.143.206';
public function __construct()
{
    session_start();
}
    public function GetToken()
    {
        $ch = curl_init("https://nafis.fanavacard.com/token_manager/AuthenticateUser/");
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "Username=I_FANAVA&Password=123");
        $result = curl_exec($ch);
        $jsonResult = json_decode($result,true);
        $this->token = $jsonResult['Token'];
        $_SESSION['Token']=$this->token;
    }
    public function SendRequest($amount){
        $this->GetToken();
        //token
        //MerchantCode
        //TerminalCode
        //TerminalSerial
        //Amount
        //InvoiceNumber
        //Stan
        //RedirectURL
        //IP
        $InvoiceNumber = rand(100000,999999);
        $Stan = rand(100000,999999);

//        $ch = curl_init($this->url);
//        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_POSTFIELDS,
//            'token='.$this->token.
//            '&MerchantCode='.$this->merchantCode.
//            '&TerminalCode='.$this->terminalId.
//            '&TerminalSerial'.$this->serial.
//            '&Amount'.$amount.
//            '&InvoiceNumber'.$InvoiceNumber.
//            '&Stan'.$Stan.
//            '&RedirectURL'.$this->redirectUrl.
//            '&IP'.$this->ip
//        );
//
//        $result = curl_exec($ch);
//
//        print_r($result);

echo '<div id="melatBank"></div>
<script language="javascript" type="text/javascript"> 
				function postRefId () {
				var form = document.createElement("form");
				form.setAttribute("method", "POST");
				form.setAttribute("action", "'.$this->url.'");         
				form.setAttribute("target", "_self");
				var hiddenField = document.createElement("input");              
				hiddenField.setAttribute("name", "token");
				hiddenField.setAttribute("value", "'.$this->token.'");
	              
	            var hiddenField2 = document.createElement("input");              
				hiddenField2.setAttribute("name", "MerchantCode");
				hiddenField2.setAttribute("value", "'.$this->merchantCode.'");
				
	            var hiddenField3 = document.createElement("input");              
				hiddenField3.setAttribute("name", "TerminalCode");
				hiddenField3.setAttribute("value", "'.$this->terminalId.'");
				
	            var hiddenField4 = document.createElement("input");              
				hiddenField4.setAttribute("name", "TerminalSerial");
				hiddenField4.setAttribute("value", "'.$this->serial.'");
				
	            var hiddenField5 = document.createElement("input");              
				hiddenField5.setAttribute("name", "Amount");
				hiddenField5.setAttribute("value", "'.$amount.'");
				
	            var hiddenField6 = document.createElement("input");              
				hiddenField6.setAttribute("name", "InvoiceNumber");
				hiddenField6.setAttribute("value", "'.$InvoiceNumber.'");
				
	            var hiddenField7 = document.createElement("input");              
				hiddenField7.setAttribute("name", "Stan");
				hiddenField7.setAttribute("value", "'.$Stan.'");
				
	            var hiddenField8 = document.createElement("input");              
				hiddenField8.setAttribute("name", "RedirectURL");
				hiddenField8.setAttribute("value", "'.$this->redirectUrl.'");
				
	            var hiddenField9 = document.createElement("input");              
				hiddenField9.setAttribute("name", "IP");
				hiddenField9.setAttribute("value", "'.$this->ip.'");
				
				
				form.appendChild(hiddenField);
				form.appendChild(hiddenField2);
				form.appendChild(hiddenField3);
				form.appendChild(hiddenField4);
				form.appendChild(hiddenField5);
				form.appendChild(hiddenField6);
				form.appendChild(hiddenField7);
				form.appendChild(hiddenField8);
				form.appendChild(hiddenField9);
	
				document.getElementById("melatBank").appendChild(form);         
				form.submit();
				document.getElementById("melatBank").removeChild(form);
			}
			postRefId();
			</script>';
    }
    public function Settlement($response)
    {
//        token
//        RefNo
//        Stan
//        MerchantCode
//        TerminalCode
//        TerminalSerial
//        Amount
//        RequestType
//        RequestDate
//        RequestTime

//        <xs:element minOccurs="0" name="Amount" type="xs:long"/>
//<xs:element minOccurs="0" name="CustMobile" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="MerchantCode" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="RefNo" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="RequestDate" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="RequestTime" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="RequestType" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="Stan" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="TerminalCode" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="TerminalSerial" nillable="true" type="xs:string"/>
//<xs:element minOccurs="0" name="Token" nillable="true" type="xs:string"/>


        $client = new SoapClient('https://nafis.fanavacard.com/extsrv-ipg/Confirmation.svc?wsdl');
        $parameters = array(
            'Amount'=> $response['BuyModel_Amount'],
            'CustMobile'=> "09166157859",
            'MerchantCode'=> $this->merchantCode,
            'RefNo'=> $response['BuyModel_RefNo'],
            'RequestDate'=> $response['RequestDate'],
            'RequestTime'=> $response['RequestTime'],
            'RequestType'=> $response['BuyModel_RequestType'],
            'Stan'=> $response['Stan'],
            'TerminalCode'=> $this->terminalId,
            'TerminalSerial'=> $this->serial,
            'Token'=> $_SESSION['Token'],
        );
        $result = $client->Settlement($parameters);
        $jsonResult = json_encode($result);
        return $jsonResult;
//        if ($call == "0") {
//            return array(
//                "status" => "success",
//                "trans" => $response["BuyModel_RefNo"]
//            );
//        } else {
//            return $call;
//        }
    }


}