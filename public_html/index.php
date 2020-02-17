<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://fonts.googleapis.com/css?family=Kanit:400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/coffee/general.css">
    <link rel="stylesheet" href="/coffee/layout.css">
    <style>
        body {
            font-family: 'Kanit', sans-serif !important;
        }
    </style>
    <title>ร้านกาแฟแห่งหนึ่งย่านทำเนียบรัฐบาล</title>
</head>

<body>
<?php require_once("../includes/braintree_init.php"); ?>
    <header id="header" class="page-header">
        <div class="title">
            <h1>ทำเนียบ คอฟฟี่</h1>
            <div class="slogan">ใครๆ ก็ชงได้ แต่ไม่อร่อยเท่าซื้อกิน</div>
        </div>
    </header>

    <nav class="menu" id="main-menu">

        <button class="menu-toggle" id="toggle-menu">
            toggle menu
        </button>
        <div class="menu-dropdown">
            <ul class="nav-menu">
                <li><a href="/shop.php">ซื้อกาแฟ</a></li>
                <li><a href="/pay.php">Pay (จ่ายเงิน)</a></li>
                <li><a href="/menu.html">Menu</a></li>
                <li><a href="/brew.html">Brew</a></li>
            </ul>
        </div>
    </nav>

    <aside id="hero" class="hero">
        ยินดีต้อนรับสู่ทำเนียบคอฟฟี่ ที่มีแต่ผู้นำคุณภาพเท่านั้นที่สามารถสั่งชงได้ฟรี <br>นอกนั้นกดสั่งซื้อได้เลย ผู้นำคุณภาพการันตีด้วยใบรับรองการอยู่ต่อ 5+1 ปี
    </aside>

    <main id="main">
        <div class="row">

            <section class="column">
                <h2 class="subtitle">เมล็ดกาแฟคุณภาพ ปลูกจากขี้ไก่ฟาร์มปารีณา</h2>
                <p>
                    ไม่ว่าคุณจะแอบดื่ม หรือ ดื่มอย่างโจ่งแจ้ง เจ้านายของคุณก็จะไม่มีความผิดใดๆ เพียงแค่เอาแก้ไปคืนก็พอแล้ว
                </p>
            </section>
            <section class="column">
                <h2 class="subtitle">วิษณุคอนเฟิร์ม!</h2>
                <p>
                    สุดยอดนักชิมวิษณุ การันตีความอร่อย กลมกล่อม ถึงแม้บางแก้วรสชาติอาจจะไม่เหมือนกันก็ตาม
                </p>
            </section>
            <section class="column">
                <h2 class="subtitle">เปิดให้บริการตลอดไม่มีวันปิด</h2>
                <p>
                    เราจะอยู่ที่นี่เปิดให้บริการตลอดไป ต่อให้ใครมาไล่เราก็ไม่ไปไหน จะขอยืนหยัดให้คุณได้สัมผัสรสชาติกาแฟนี้ตลอดไป
                </p>
            </section>
        </div>
    </main>

    <script type="text/javascript">
        (function () {
            var button = document.getElementById('toggle-menu');
            button.addEventListener('click', function (event) {
                event.preventDefault();
                var menu = document.getElementById('main-menu');
                menu.classList.toggle('is-open');
            });
        })();
    </script>
</body>

</html>