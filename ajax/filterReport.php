<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/25/18
 * Time: 10:01 PM
 */
if($_SERVER['REQUEST_METHOD']=="POST"){
    session_start();
    if(
        isset($_SESSION['userLogin']) && $_SESSION['userLogin']==true

    ){
        include "../inc/db.php";
        include "../inc/my_frame.php";
        $conn = new db();
        $userId = $conn->real($_SESSION['userId']);
        $where = '';
        $html.='';
        $myBuy='0';
        $allUserBuy='0';
        $UserBuyMyWalet='0';

        if(
            isset($_POST['stratDate']) && $_POST['stratDate']!='' &&
            isset($_POST['endDate']) && $_POST['endDate']!=''
        ){
            $startDate = $conn->real($_POST['stratDate']);
            $endDate = $conn->real($_POST['endDate']);
            $startDate=$conn->converNumberToEn($startDate);
            $endDate=$conn->converNumberToEn($endDate);
            $startDate = str_replace("/","-",$startDate);
            $endDate = str_replace("/","-",$endDate);
            $G_StartDate = gregory($startDate);
            $G_EndDate = gregory($endDate);
            $where .=" AND payRegDate between '$G_StartDate' and '$G_EndDate'";


            $selectPriceOwne = mysqli_query($conn->conn(), "

                SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId'
                AND pay.payModel='6' AND payRegDate between '$G_StartDate' and '$G_EndDate'");

            $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
            if ($rowPriceOwne['sum'] == '')
                $myBuy =  '0 تومان';
            else
                $myBuy = $rowPriceOwne['sum'] . " تومان ";


            $selectUserPayment = mysqli_query($conn->conn(), "SELECT SUM(pay.payPrice) as sumPrice from pay,user where pay.payUserId=user.userId
                              and user.UserOwner='$userId' and pay.payModel!='1' and pay.payModel!='5' and pay.payModel!='6' and pay.payModel!='10' 
                               AND payRegDate between '$G_StartDate' and '$G_EndDate'
                              ");
            $rowPayPrice = mysqli_fetch_assoc($selectUserPayment);
            $rowPayPrice['sumPrice'] == null ? $allUserBuy = "0 تومان" : $allUserBuy = $rowPayPrice['sumPrice'] . " تومان ";

            $selectPriceOwne = mysqli_query($conn->conn(), "SELECT sum(payPrice) as sum FROM pay where pay.payUserId='$userId' AND pay.payModel='5'
 AND payRegDate between '$G_StartDate' and '$G_EndDate'");
            $rowPriceOwne = mysqli_fetch_assoc($selectPriceOwne);
            if ($rowPriceOwne['sum'] == '')
                $UserBuyMyWalet = '0 تومان';
            else
                $UserBuyMyWalet = $rowPriceOwne['sum'] . " تومان ";

        }


        //UserORPanel
        if(isset($_POST['trakoneshVar']) && $_POST['trakoneshVar']!=''){
            if($_POST['trakoneshVar']=='p1'){
                //Panel
                $where.=" AND payModel!='5'";



            }elseif($_POST['trakoneshVar']=='p2'){
                //User
                $where.=" AND payModel='6'";
            }
        }
        if(isset($_POST['RProductVar']) && $_POST['RProductVar']!=''){
            //sharj baste pin etebar

            //sharj
            if($_POST['RProductVar']=='p7'){
                $where.=" AND payModel='3'";
            }
            //pin
            elseif($_POST['RProductVar']=='p8'){
                $where.=" AND payModel='4'";
            }
            //baste
            elseif($_POST['RProductVar']=='p9'){
                $where.=" AND payModel='2'";
            }
            elseif($_POST['RProductVar']=='p10'){
                $where.=" AND ( payModel='1' OR payModel='10')";
            }
        }
        if(isset($_POST['Rsearch']) && $_POST['Rsearch']!=''){
            $Rsearch = $conn->real($_POST['Rsearch']);
            $where.=" AND (payService LIKE '%$Rsearch%' OR payPin LIKE '$Rsearch' OR paySerial LIKE '%$Rsearch%')";
        }

        //in Panel Just See Add&Remove
        //in User Just See Add
        //Add&Remove
        if(isset($_POST['RAddRemoveVar']) && $_POST['RAddRemoveVar']!='') {
            //add
            if($_POST['RAddRemoveVar']=='p4'){
                $where.=" AND (payModel='6' OR payModel='5' OR payModel='1' OR payModel='20')";
            }
            //remove
            elseif ($_POST['RAddRemoveVar']=='p3'){
                $where.=" AND (payModel='2' OR payModel='3' OR payModel='4' OR payModel='10')";
            }


        }

        //OnlineOrWalet
        //JustPanelSee Online And Walet
        if(isset($_POST['modelPardakht']) && $_POST['modelPardakht']!=''){
            //walet
            if($_POST['modelPardakht']=='p6'){
                $where.=" AND payProduct='01'";
            }
            //Online
            elseif ($_POST['modelPardakht']=='p5'){
                $where.=" AND payProduct='02'";
            }
        }




        $i = 1;
        $typeOfPayment = "موفق";
        $color = "green";

        $rq = "SELECT * FROM pay where (pay.payUserId='$userId' OR pay.userPay='$userId')".$where." ORDER BY date(payRegDate) DESC , time(payRegTime) DESC";
        $select = mysqli_query($conn->conn(),$rq);

        while ($rowPaymentList = mysqli_fetch_assoc($select)) {
            if (
                $rowPaymentList['payModel'] == "5" ||
                $rowPaymentList['payModel'] == "6" ||
                $rowPaymentList['payModel'] == "1" ||
                $rowPaymentList['payModel'] == "20"
            ) {
                $upeer = $rowPaymentList['payPrice'] . "+" . " تومان ";

            } else {
                $upeer = "0";
            }
            if (
                $rowPaymentList['payModel'] == "2" ||
                $rowPaymentList['payModel'] == "3" ||
                $rowPaymentList['payModel'] == "4" ||
                $rowPaymentList['payModel'] == "10"
            ) {
                $countDown = $rowPaymentList['payPrice'] . "-" . " تومان ";
            } else {
                $countDown = "0";
            }


            if ($rowPaymentList['payModel'] == "2") {
                $productName = 'بسته اینترنتی';
                $service = $rowPaymentList['payService'];
            } elseif ($rowPaymentList['payModel'] == "3") {
                $productName = 'شارژ مستقیم';
                $service = $rowPaymentList['payService'];
            } elseif ($rowPaymentList['payModel'] == "4") {
                $productName = 'پین شارژ';
                $service = $rowPaymentList['payPin'] . '<br>' . $rowPaymentList['paySerial'];

            } else {
                $productName = '';
            }

            if ($rowPaymentList['payModel'] == '5') {
                $detail = "درآمد از خرید کاربر";
                $service = $rowPaymentList['payService'];

            } elseif ($rowPaymentList['payModel'] == '6') {
                $detail = "درآمد خرید از پنل";
                $service = $rowPaymentList['payService'];

                if ($rowPaymentList['payText'] == "2") {
                    $productName = 'بسته اینترنتی';
                } elseif ($rowPaymentList['payText'] == "3") {
                    $productName = 'شارژ مستقیم';
                } elseif ($rowPaymentList['payText'] == "4") {
                    $productName = 'پین شارژ';
                } else {
                    $productName = '';
                }

            } elseif ($rowPaymentList['payModel'] == '1') {
                $detail = "افزایش اعتبار";
                $service = $rowPaymentList['payService'];

            } elseif ($rowPaymentList['payModel'] == '10') {
                $detail = "درخواست واریز وجه";
                $service = $rowPaymentList['payService'];

                //Status Of GetMoney
                $payId = $rowPaymentList['payId'];
                $selectGetMoney = mysqli_query($conn->conn(), "SELECT * FROM getMoney where getMoney.getMoneyId='$payId'");
                $rowPayGet = mysqli_fetch_assoc($selectGetMoney);
                $Status = $rowPayGet['getMoneyStatus'];
                if ($Status == "0") {
                    $typeOfPayment = "درانتظار";
                    $color = "#000";
                }
            } else {
                $detail = '';
            }
            if($rowPaymentList['payProduct']=='01'){
                $textModelPay = 'کیف پول';
            }if($rowPaymentList['payProduct']=='02'){
                $textModelPay = 'آنلاین';
            }

            $date = jalali($rowPaymentList['payRegDate']);
            $time = $rowPaymentList['payRegTime'];

            $dateAndTime = $date . ' - ' . $time;

            $html.='
            <tr>
                <td>'.$i.'</td>
                <td>'. $textModelPay.'</td>
                <td style="color:green">'.$upeer.'</td>
                <td style="color:red">'.$countDown.'</td>
                <td style="">'. $rowPaymentList['lastUserMoney'] . " تومان " .'</td>
                <td style="">'. $productName .'</td>
                <td style="">'. $service .'</td>
                <td style="">'. $detail .'</td>
                <td style="'.$color.'">'.$typeOfPayment.'</td>
                <td style="">'.$rowPaymentList['payRef'].'</td>
                <td style="">'.$dateAndTime.'</td>
            </tr>';
            $i++;
        }

        $call=array("Error"=>false,"html"=>$html,"Request"=>$rq,"myBuy"=>$myBuy,"allUserBuy"=>$allUserBuy,"userBuyMyWalet"=>$UserBuyMyWalet);
        echo json_encode($call);
        return;

    }
}