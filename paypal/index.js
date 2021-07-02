paypal.Buttons({
    style: {
        color: 'blue',
        shape: 'pill'
    },
    createOder:function(data,actions){
        return actions.order.create({
            purchase_units: [{
                amount:{
                    value:"0.1"
                }
            }]
        });
    },
    onApprove:function(data,actions){
        return actions.order.capture().then(function(details){
            console.log(details)
            window.location.replace("./paypal/successpaypal.php")
        })
    },
    onCancel:function(data){
        window.location.replace("./paypal/cancelpaypal.php")
    }
}).render('#paypal-payment-button');