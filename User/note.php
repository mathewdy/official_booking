<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="paypal-button-container"></div>
    

  
    

<script src="https://www.paypal.com/sdk/js?client-id=AdDcVDMzP8YD0zXoj_MWIhaoWYLQNjG7cvtwglGkm18cLBKyar60OPBcvq9hXZjxVBaaMng4b3ltZaMr"></script>
    <script>
        paypal.Buttons().render('#paypal-button-container');
    </script>
</body>

        
</html>












script src="https://www.paypal.com/sdk/js?client-id=AdDcVDMzP8YD0zXoj_MWIhaoWYLQNjG7cvtwglGkm18cLBKyar60OPBcvq9hXZjxVBaaMng4b3ltZaMr"></script>
<script>
     paypal.Buttons({
        style: {
        layout: 'horizontal',
        color:  'blue',
        shape:  'pill',
        label:  'pay',
        //if the tagline want to remove uncomment this section
        // tagline: 'false, 
  },
  
    createOrder: function(data,actions){
        return actions.order.crzeate({
            purchase_units:[{
                amount: {
                    value: '<?php echo $total?>',
              
                }
            }]
        });
    },
    onApprove: function(data,actions){
        return actions.order.capture().then(function(details){

            window.location.replace("http://<?php echo $_SERVER['SERVER_NAME']?>/official_booking/User/success.php")
            

        })
    }
      }).render('#paypal-button-container');
    </script>