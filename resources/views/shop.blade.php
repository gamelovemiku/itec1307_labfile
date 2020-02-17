<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    <link rel="stylesheet" href="/coffee/general.css">
    <link rel="stylesheet" href="/coffee/layout.css">
</head>

<body>
    <div id="app">
    <header id="header" class="page-header">
        <div class="title">
            <h1>Wombat Coffee Roasters</h1>
            <div class="slogan">We love coffee</div>
        </div>
    </header>

    <nav class="menu" id="main-menu">
        <button class="menu-toggle" id="toggle-menu">
            toggle menu
        </button>
        <div class="menu-dropdown">
            <ul class="nav-menu">
                <li><a href="/about.html">About</a></li>
                <li><a href="/pay.php">Pay (จ่ายเงิน)</a></li>
                <li><a href="/menu.html">Menu</a></li>
                <li><a href="/brew.html">Brew</a></li>
            </ul>
        </div>
    </nav>

    <section class="section">
        <div class="container">
            <h4 class="title is-4">Hi, Let's test a transaction</h4>
            <p class="subtitle is-6">
                Make a test payment with Braintree using PayPal or a card
            </p>
            <form method="post" id="payment-form" action="{{ route('payment.make') }}">
                @csrf
                <section>
                    <label for="amount">
                        <span class="input-label">Amount</span>
                        <div class="input-wrapper amount-wrapper">
                            <input class="input" id="amount" name="amount" type="tel" min="1" placeholder="Amount" value="10">
                        </div>
                    </label>

                    <div class="bt-drop-in-wrapper">
                        <div id="bt-dropin"></div>
                    </div>
                </section>

                <input id="nonce" name="payment_method_nonce" type="hidden" />
                <div class="buttons">
                    <button class="button" type="submit"><span>Test Transaction</span></button>
                </div>
            </form>
        </div>
    </section>
    </div>

    <script src="/js/demo.js"></script>
    <script src="https://js.braintreegateway.com/web/dropin/1.22.0/js/dropin.min.js"></script>
    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>
    <script>
        new Vue({
            el: '#app'
        })

        var form = document.querySelector('#payment-form');
        var client_token = "{{ Braintree_ClientToken::generate() }}";

        braintree.dropin.create({
          authorization: client_token,
          selector: '#bt-dropin',
          paypal: {
            flow: 'vault'
          }
        }, function (createErr, instance) {
          if (createErr) {
            console.log('Create Error', createErr);
            return;
          }
          form.addEventListener('submit', function (event) {
            event.preventDefault();

            instance.requestPaymentMethod(function (err, payload) {
              if (err) {
                console.log('Request Payment Method Error', err);
                return;
              }

              // Add the nonce to the form and submit
              document.querySelector('#nonce').value = payload.nonce;
              form.submit();
            });
          });
        });
    </script>
</body>
</html>
