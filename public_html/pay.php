<?php
require_once("../includes/braintree_init.php");
$price = $_GET["price"];
?>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
  <style>
    body {
      font-family: 'Kanit', sans-serif !important;
    }
  </style>
  <title>จ่ายเงิน <?= $price ?> บาท</title>
</head>

<body>
  <div id="app">
    <template>
      <b-navbar class="is-fixed-top is-spaced" type="is-white">
        <template slot="brand">
          <b-navbar-item href="/">
            <div><b>ทำเนียบคอฟฟี่</b></div>
          </b-navbar-item>
        </template>
        <template slot="start">
          <b-navbar-item href="/shop.php">
            ร้านค้า
          </b-navbar-item>
        </template>
      </b-navbar>
    </template>
    <section class="section" style="margin-top: 3rem">
      <div class="container">
        <h4 class="title is-4">สวัสดี, คุณชื่ออะไรนะ อ้าวมันไม่มีระบบล็อคอินนี่หว่า<br>อยากกินกาแฟหรือยัง?</h4>
        <p class="subtitle is-6">ถ้าอยากกินแล้ว กดจ่ายเงินได้เลย แต่ไม่ส่งของให้นะ มากินที่ร้านเอง</p>

        <h4 class="title is-4" style="margin-top: 2rem;">ราคาสินค้า <span class="has-text-info"><?= $price ?> บาท</span></span>
          <form method="post" id="payment-form" action="<?php echo $baseUrl; ?>checkout.php">
            <section>
              <input id="amount" class="button is-fullwidth" name="amount" type="hidden" min="1" placeholder="Amount" value="<?= $price + 150 ?>">

              <div class="bt-drop-in-wrapper">
                <div id="bt-dropin"></div>
              </div>
            </section>

            <input id="nonce" name="payment_method_nonce" type="hidden" />
            <div class="buttons">
              <button class="button is-primary is-outlined" type="submit"><span>จ่ายเงิน <?= $price + 150 ?> บาทให้กับร้านค้านี้ (+ค่าส่งลงทะเบียน 150 บาท)</span></button>
            </div>
          </form>
      </div>
    </section>
  </div>

  <script src="https://js.braintreegateway.com/web/dropin/1.22.0/js/dropin.min.js"></script>
  <script src="https://unpkg.com/vue"></script>
  <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

  <script>
    new Vue({
      el: '#app',
      methods: {}
    })

    var form = document.querySelector('#payment-form');
    var client_token = "<?php echo ($gateway->ClientToken()->generate()); ?>";

    braintree.dropin.create({
      authorization: client_token,
      selector: '#bt-dropin',
      paypal: {
        flow: 'vault'
      }
    }, function(createErr, instance) {
      if (createErr) {
        console.log('Create Error', createErr);
        return;
      }
      form.addEventListener('submit', function(event) {
        event.preventDefault();

        instance.requestPaymentMethod(function(err, payload) {
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
  <script src="javascript/demo.js"></script>
</body>

</html>