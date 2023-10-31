<?php


session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Directpay|OneTimePayment</title>
    <link rel="stylesheet" href="bootstrap.css">
</head>
<div id="card_container"></div>
<?php


$grand_total =0;
if (isset($_SESSION["t"]))

    $t =  $_SESSION["t"]["total"];
    $qty = $_SESSION["t"]["qty"];
    $grand_total = $t * $qty;
?>


<div id="total" class=" visually-hidden "><?php echo $grand_total ?></div>



<?php
?>

<body>
    <script src="https://cdn.directpay.lk/dev/v1/directpayCardPayment.js?v=1"></script>
    <script>
        var total = document.getElementById("total").innerText;


        DirectPayCardPayment.init({
            container: 'card_container', //<div id="card_container"></div>
            merchantId: 'IX15322', //your merchant_id
            amount: total,
            refCode: "DP12345", //unique referance code form merchant
            currency: 'LKR',
            type: 'ONE_TIME_PAYMENT',
            customerEmail: 'abc@mail.com',
            customerMobile: '+94712345674',
            description: 'test products', //product or service description
            debug: true,
            responseCallback: responseCallback,
            errorCallback: errorCallback,
            logo: 'https://test.com/directpay_logo.png',
            apiKey: '76c66f7d2773342cdb5c6541be8d37dd8f08e47c2295a3b139e0ebe5aa73a094'
        });

        //response callback.
        function responseCallback(result) {
            console.log("successCallback-Client", result);
            // alert(JSON.stringify(result));

            

                window.location = "invoice.php";
                
        
            
            





        }

        //error callback
        function errorCallback(result) {
            console.log("successCallback-Client", result);
            // alert(JSON.stringify(result));
            window.location = "invoice.php";
        }
    </script>
</body>

</html>