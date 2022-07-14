fetch("/wp-content/themes/liam/php/blaize-evict-cache.php")

fetch('/blaize/payment/braintree/token')
.then(res => res.json())
.then(
    (result) => {
        let response;      
        const productId = 'basic-plan';                   
        const token = result.token
        const button = document.getElementById('submit-button')

        function BraintreeDropin () {
            braintree.dropin.create({ 
                authorization: token, 
                selector: '#payment-form'
            },  function (createErr, instance) { 
                button.addEventListener('click', function (e) { 
                    e.preventDefault();
                    instance.requestPaymentMethod(function (err, payload) { 
                        let xhr = new (XMLHttpRequest || ActiveXObject)('MSXML2.XMLHTTP.3.0'); 
                        xhr.open('POST', '/blaize/payment/braintree/subscribe', true); 
                        xhr.setRequestHeader('Content-type', 'application/json'); 
                        xhr.onreadystatechange = function () { 
                            if (xhr.readyState === 4) {
                                if (xhr.status === 200) {
	                                window.location.replace("/signup/success");
                                } else {
                                    console.log('Error!')
                                }
                            }
                        }
                        let req = { 
                            product_id: productId, 
                            payment_nonce: payload.nonce 
                        }; 
                        xhr.send(JSON.stringify(req)); 
                    })
                })
            })
        }
        BraintreeDropin();
    }
)