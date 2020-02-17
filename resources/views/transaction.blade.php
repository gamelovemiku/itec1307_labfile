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
                <li><a href="#">About</a></li>
                <li><a href="/shop">Pay (จ่ายเงิน)</a></li>
                <li><a href="#">Menu</a></li>
                <li><a href="#">Brew</a></li>
            </ul>
        </div>
    </nav>

    <section class="section">
        <div class="container">
            <div class="columns is-multilined">
                <div class="column is-4">
                    <h4 class="title is-4">Transaction: {{ $transaction->status }}!</h4>
                    <h4 class="subtitle is-6">Success!</h4>
                    <table class="table is-narrowed">
                        <tbody>
                            <tr>
                                <th>ID</th>
                                <th>{{ $transaction->id }}</th>
                            </tr>
                            <tr>
                                <th>ราคาขาย</th>
                                <th>{{ $transaction->amount }}</th>
                            </tr>
                            <tr>
                                <th>ซื้อเมื่อ</th>
                                <th>{{$transaction->createdAt->format('Y-m-d H:i:s')}}</th>
                            </tr>
                            <tr>
                                <th>Response Type</th>
                                <th>{{ $transaction->processorResponseType }}</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
    </div>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>
    <script>
        new Vue({
            el: '#app'
        })
    </script>
</body>
</html>
