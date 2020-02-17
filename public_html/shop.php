<?php
require_once("../includes/braintree_init.php");
?>
<!DOCTYPE html>
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
                <h4 class="title is-4">กาแฟจากเราเอง</h4>
                <p class="subtitle is-6">คั่วสด ๆ จากฝีมือท่านผู้นำ ไหม้ทุกเม็ด</p>
                <div class="columns is-multiline">
                    <div class="column is-3">
                        <div class="card">
                            <div class="card-image">
                                <figure class="image is-4by3">
                                    <img width="500" src="https://f.ptcdn.info/317/045/000/oc5yxfbqkNk2iONqMAf-o.jpg">
                                </figure>
                            </div>
                            <div class="card-content">
                                <div class="media">
                                    <div class="media-content">
                                        <p class="title is-6">กาแฟ ตรา คั่วถึงเช้าตรู่</p>
                                        <p class="subtitle is-6">44 บาท</p>
                                    </div>
                                </div>
                            </div>
                            <footer class="card-footer">
                                <a @click="submit()" class="card-footer-item">ซื้ออันนี้</a>
                                <form ref="item1" action="/pay.php" method="get">
                                    <input type="hidden" name="price" value="44" />
                                </form>
                            </footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

    <script>
        new Vue({
            el: '#app',
            methods: {
                submit: function() {
                    this.$refs.item1.submit()
                }
            }
        })
    </script>
</body>

</html>