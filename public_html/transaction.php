<?php
require_once("../includes/braintree_init.php");

if (isset($_GET["id"])) {
    $transaction = $gateway->transaction()->find($_GET["id"]);

    $transactionSuccessStatuses = [
        Braintree\Transaction::AUTHORIZED,
        Braintree\Transaction::AUTHORIZING,
        Braintree\Transaction::SETTLED,
        Braintree\Transaction::SETTLING,
        Braintree\Transaction::SETTLEMENT_CONFIRMED,
        Braintree\Transaction::SETTLEMENT_PENDING,
        Braintree\Transaction::SUBMITTED_FOR_SETTLEMENT
    ];

    if (in_array($transaction->status, $transactionSuccessStatuses)) {
        $header = "จ่ายเงินเรียบร้อย!";
        $icon = "success";
        $message = "ขอบพระคุณที่อุดหนุน โปรดมารับกาแฟของคุณภายใน 1 ชม. ไม่งั้นเดี๋ยวเย็น";
    } else {
        $header = "อะไรครับคุณ";
        $icon = "fail";
        $message = "เลขบัตรของคุณเนี่ยมันตัดเงินไม่ได้ เนี่ยขึ้นสถานะ " . $transaction->status . " ด้วยเนี่ย สักป๊าปดีไหมห๊ะ";
    }
}

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
    <title>สำเร็จ | รหัสธุรกรรม <?= $_GET["id"] ?> </title>
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
                <div class="content">
                    <h1 class="title is-4">
                        <img src="/images/<?php echo ($icon) ?>.svg" alt="">
                        <?php echo ($header) ?>
                    </h1>
                    <p class="subtitle is-6"><?php echo ($message) ?></p>

                    <h5>ข้อมูลการทำรายการ</h5>
                <table class="table is-narrowed is-bordered" cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th>หัวข้อ</th>
                            <th>ข้อมูลที่ได้รับ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>id</td>
                            <td><?php echo ($transaction->id) ?></td>
                        </tr>
                        <tr>
                            <td>type</td>
                            <td><?php echo ($transaction->type) ?></td>
                        </tr>
                        <tr>
                            <td>amount</td>
                            <td><?php echo ($transaction->amount) ?></td>
                        </tr>
                        <tr>
                            <td>status</td>
                            <td><?php echo ($transaction->status) ?></td>
                        </tr>
                        <tr>
                            <td>created_at</td>
                            <td><?php echo ($transaction->createdAt->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <td>updated_at</td>
                            <td><?php echo ($transaction->updatedAt->format('Y-m-d H:i:s')) ?></td>
                        </tr>
                        <tr>
                            <td>token</td>
                            <td><?php echo ($transaction->creditCardDetails->token) ?></td>
                        </tr>
                        <tr>
                            <td>bin</td>
                            <td><?php echo ($transaction->creditCardDetails->bin) ?></td>
                        </tr>
                        <tr>
                            <td>last_4</td>
                            <td><?php echo ($transaction->creditCardDetails->last4) ?></td>
                        </tr>
                        <tr>
                            <td>card_type</td>
                            <td><?php echo ($transaction->creditCardDetails->cardType) ?></td>
                        </tr>
                        <tr>
                            <td>expiration_date</td>
                            <td><?php echo ($transaction->creditCardDetails->expirationDate) ?></td>
                        </tr>
                        <tr>
                            <td>cardholder_name</td>
                            <td><?php echo ($transaction->creditCardDetails->cardholderName) ?></td>
                        </tr>
                        <tr>
                            <td>customer_location</td>
                            <td><?php echo ($transaction->creditCardDetails->customerLocation) ?></td>
                        </tr>
                    </tbody>
                </table>

                    <a class="button primary back" href="/index.php">
                        <span>กลับไปหน้าแรกกันเถอะ</span>
                    </a>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            methods : {}
        })
    </script>
</body>
</html>