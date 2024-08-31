//  publishableKey
var stripe = Stripe('pk_test_6pRNASCoBOKtIshFeQd4XMUh');
var elements = stripe.elements();

var style = {
  base: {
    iconColor: '#666EE8',
    color: '#31325F',
    lineHeight: '40px',
    fontWeight: 300,
    fontFamily: 'Open Sans',
    fontSize: '15px',

    '::placeholder': {
      color: '#CFD7E0',
    },
  },
};

// Create an instance of the card Element
var cardNumberElement = elements.create('cardNumber', {
  style: style
});

// Add an instance of the card Element into the `card-element` <div>
cardNumberElement.mount('#card-number-element');

var cardExpiryElement = elements.create('cardExpiry', {
  style: style
});
cardExpiryElement.mount('#card-expiry-element');

var cardCvcElement = elements.create('cardCvc', {
  style: style
});
cardCvcElement.mount('#card-cvc-element');

var postalCodeElement = elements.create('postalCode', {
  style: style
});
postalCodeElement.mount('#postal-code-element');


function setOutcome(result) {
  var successElement = document.querySelector('.success');
  var errorElement = document.querySelector('.error');
  successElement.classList.remove('visible');
  errorElement.classList.remove('visible');

  if (result.error) {
    errorElement.textContent = result.error.message;
    errorElement.classList.add('visible');
  }
}

var cardBrandToPfClass = {
	'visa': 'fa-cc-visa',
    'mastercard': 'a-cc-mastercard',
    'amex': 'fa-cc-amex',
    'discover': 'fa-cc-discover',
    'diners': 'fa-cc-diners-club',
    'jcb': 'fa-cc-jcb',
    'unknown': 'fa-cc-credit-card',
}

function setBrandIcon(brand) {
    var brandIconElement = document.getElementById('brand-icon');
    var pfClass = 'pf-credit-card';

    if (brand in cardBrandToPfClass) {
        pfClass = cardBrandToPfClass[brand];
    }
    for (var i = brandIconElement.classList.length - 1; i >= 0; i--) {
        brandIconElement.classList.remove(brandIconElement.classList[i]);
    }
    brandIconElement.classList.add('fa');
    brandIconElement.classList.add(pfClass);
}

// Handle real-time validation errors from the card Element.
cardNumberElement.on('change', function(event) {
	// Switch brand logo
	if (event.brand) {
  	    setBrandIcon(event.brand);
    }
	setOutcome(event);
});

// Handle form submission
document.getElementById('checkout-form').addEventListener('submit', function(e) {
  e.preventDefault();
  
  stripe.createToken(cardNumberElement).then(function(result) {
    if (result.error) {

        // Inform the user if there was an error
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {

        // Send the token to your server
        stripeTokenHandler(result.token);
      }
  });

});

function stripeTokenHandler(token) {
    
    // Insert the token Id into form and submit form to server
    var form = document.getElementById('checkout-form');
    form.querySelector('input[name="token"]').setAttribute('value', token.id);
    
    form.submit();
}