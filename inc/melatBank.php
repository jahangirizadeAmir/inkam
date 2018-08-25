
<?php
class MellatBank {


    private $terminal = 1535231;
    private $username = 'pgpisp95';
    private $password = '72711237';
    private $nameSpace = "http://interfaces.core.sw.bps.com/";
    private $callBackUrl = "http://inkam.ir/vrf.php";



    public function __construct($terminal = '', $username = '', $password = '')
    {
        if(!empty($terminal))
            $this->terminal = $terminal;

        if(!empty($username))
            $this->username = $username;

        if(!empty($password))
            $this->password = $password;
    }


    public function startPayment($amount)
    {

        $client = new SoapClient('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
        $terminalId = $this->terminal ;
        $userName = $this->username;
        $userPassword = $this->password;
        $orderId = rand(10000,99999);
        $localDate = date('ymj');
        $localTime = date('His');
        $additionalData = '';
        $payerId = 0;
        $parameters = array(
            'terminalId' => $terminalId,
            'userName' => $userName,
            'userPassword' => $userPassword,
            'orderId' => $orderId,
            'amount' => $amount,
            'localDate' => $localDate,
            'localTime' => $localTime,
            'additionalData' => $additionalData,
            'callBackUrl' => $this->callBackUrl,
            'payerId' => $payerId
        );
        $result = $client->bpPayRequest($parameters, $this->nameSpace);
        $res = $result->return;
                $res = explode (',',$res);
                $ResCode = $res[0];
                if ($ResCode == "0") {
                    $this->postRefId($res[1]);
                }
                else {
                    $this->error($ResCode);
                }
    }



    protected function verifyPayment($params)
    {
        $client = new SoapClient( 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl' ) ;
        $orderId = $params["SaleOrderId"];
        $verifySaleOrderId = $params["SaleOrderId"];
        $verifySaleReferenceId = $params['SaleReferenceId'];
        $parameters = array(
            'terminalId'=> $this->terminal,
            'userName'=> $this->username,
            'userPassword'=> $this->password,
            'orderId' => $orderId,
            'saleOrderId' => $verifySaleOrderId,
            'saleReferenceId' => $verifySaleReferenceId);
        $result = $client->bpVerifyRequest($parameters, $this->nameSpace);
            $resultStr = $result->return;
                if( $resultStr == '0' ) {
                    return true;
                }else{
                    return false;
                }
    }
    protected function settlePayment($params)
    {
        $client = new SoapClient( 'https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl' ) ;
        $orderId = $params["SaleOrderId"];
        $settleSaleOrderId = $params["SaleOrderId"];
        $settleSaleReferenceId = $params['SaleReferenceId'];

        $parameters = array(
            'terminalId'=> $this->terminal,
            'userName'=> $this->username,
            'userPassword'=> $this->password,
            'orderId' => $orderId,
            'saleOrderId' => $settleSaleOrderId,
            'saleReferenceId' => $settleSaleReferenceId);
        $result = $client->bpSettleRequest($parameters,$this->nameSpace);

            $resultStr = $result->return;

                if( $resultStr == '0' ) {
                    return true;
                }else{
                    return false;
                }
    }



    public function checkPayment($params)
    {
        if( $params["ResCode"] == 0 )
        {
            if( $this->verifyPayment($params) == true ) {
                if( $this->settlePayment($params) == true ) {
                    return array(
                        "status"=>"success",
                        "trans"=>$params["SaleReferenceId"]
                    );
                }
                else{
                        return array(
                            "status"=>"222"
                        );
                    }

            }else{
                return array(
                    "status"=>"111"
                );
            }
        }
        return null;
    }

    protected function postRefId($refIdValue)
    {
        echo '<div id="melatBank"></div>
<script language="javascript" type="text/javascript"> 
				function postRefId (refIdValue) {
				var form = document.createElement("form");
				form.setAttribute("method", "POST");
				form.setAttribute("action", "https://bpm.shaparak.ir/pgwchannel/startpay.mellat");         
				form.setAttribute("target", "_self");
				var hiddenField = document.createElement("input");              
				hiddenField.setAttribute("name", "RefId");
				hiddenField.setAttribute("value", refIdValue);
				form.appendChild(hiddenField);
	
				document.getElementById("melatBank").appendChild(form);         
				form.submit();
				document.getElementById("melatBank").removeChild(form);
			}
			postRefId("' . $refIdValue . '");
			</script>';
    }


    protected function error($number)
    {
        $err = $this->response($number);
        echo '<!doctype html><html><head><meta charset="utf-8"><title>خطا</title></head><body dir="rtl">';
        echo '<style>div.error{direction:rtl;background:#A80202;float:right;text-align:right;color:#fff;';
        echo 'font-family:tahoma;font-size:13px;padding:3px 10px}</style>';
        echo '<div class="error"><strong>خطا</strong> : ' . $err . '</div>';
        die ;
    }



    protected function response($number)
    {
        switch($number) {
            case 31 :
                $err = "پاسخ نامعتبر است!";
                break;
            case 17 :
                $err = "کاربر از انجام تراکنش منصرف شده است!";
                break;
            case 21 :
                $err = "پذیرنده نامعتبر است!";
                break;
            case 25 :
                $err = "مبلغ نامعتبر است!";
                break;
            case 34 :
                $err = "خطای سیستمی!";
                break;
            case 41 :
                $err = "شماره درخواست تکراری است!";
                break;
            case 421 :
                $err = "ای پی نامعتبر است!";
                break;
            case 412 :
                $err = "شناسه قبض نادرست است!";
                break;
            case 45 :
                $err = "تراکنش از قبل ستل شده است";
                break;
            case 46 :
                $err = "تراکنش ستل شده است";
                break;
            case 35 :
                $err = "تاریخ نامعتبر است";
                break;
            case 32 :
                $err = "فرمت اطلاعات وارد شده صحیح نمیباشد";
                break;
            case 43 :
                $err = "درخواست verify قبلا صادر شده است";
                break;

        }
        return $err ;
    }
}
