<?php
/**
 * Created by PhpStorm.
 * User: amirjahangiri
 * Date: 8/22/18
 * Time: 9:11 PM
 */
if(
    isset($_GET['price'])&&
    $_GET['price']!=''&&
    is_numeric($_GET['price']) &&
    isset($_GET['model']) &&
    $_GET['model']!=''
    ){
    session_start();

    include "../inc/db.php";
    include "../inc/melatBank.php";
    $db = new db();
    $bank = new MellatBank();

    $price = $db->real($_GET['price']);
    $model = $db->real($_GET['model']);

    if($model=="walet"){
        if(isset($_SESSION['userLogin']) && $_SESSION['userLogin']==true)
        {
            $_SESSION['model']="walet";
            $_SESSION['price']=$price;
            $toam = $price*10;
            $bank->startPayment($toam);
        }
    }
    if($model=="baste"){
        $_SESSION['price']=$price;
        if($_GET['modelSharj']=="undefined"){
            $_SESSION['model']="baste";
        }else{
            $_SESSION['modelSharj']  = $_GET['modelSharj'];
            $_SESSION['model']="sharj";
            $price = $price*10;
        }
        if(isset($_GET['code']) && $_GET['code']!=''){
         $_SESSION['code']=$_GET['code'];
         $_SESSION['mobile']=$_GET['mobile'];
         $_SESSION['operator']=$_GET['operator'];
         $_SESSION['simModel']=$_GET['sim'];
         $_SESSION['amz']=$_GET['amz'];
         if(isset($_GET['etebar']) && $_GET['etebar']==true) {
            echo '<div id="melatBank"></div>
                    <script language="javascript" type="text/javascript"> 
                        function postRefId () {
                        var form = document.createElement("form");
                        form.setAttribute("method", "POST");
                        form.setAttribute("action", "../vrf.php");         
                        form.setAttribute("target", "_self");
                        var hiddenField = document.createElement("input");              
                        hiddenField.setAttribute("name", "etebar");
                        hiddenField.setAttribute("value", true);
                        form.appendChild(hiddenField);
                        document.getElementById("melatBank").appendChild(form);         
                        form.submit();
                        document.getElementById("melatBank").removeChild(form);
			}
			postRefId();
			</script>';
         }else{
             $bank->startPayment($price);

         }
        }
    }
}
?>
<html>
<body id="melatBank">
</body>
</html>