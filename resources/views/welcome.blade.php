<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CrytoCurrency</title>
    <style>

        .position {
            text-align: center;
            font-weight: 900;
        }

        select#stock {
            margin-left: 100px !important;
        }

        .all {
            justify-content: center;
            border: solid black;
            border-radius: 30px;
            width: 20%;
            margin: 80px;
            margin-left: 600px;
        }
    </style>
</head>
<body>
<div class="all">
    <select id="stock" onchange="stocks()">
        <option>انتخاب کنید</option>
        <option value="0">BTC</option>
        <option value="1">Ethereum</option>
        <option value="2">BNB</option>
    </select>
    <section class="position">
        <div id="bitcoin">
            <h1>...</h1>
        </div>
        <div id="ethereum">
            <h1>...</h1>
        </div>
        <div id="BNB">
            <h1>...</h1>
        </div>
    </section>
</div>
<script>
    function stocks() {
        let d = document.getElementById("stock").value;
        if (d == 0) {
            document.getElementById("bitcoin").style.display = "block";
            document.getElementById("ethereum").style.display = "none";
            document.getElementById("BNB").style.display = "none";
            let ws = new WebSocket('wss://fstream.binance.com/ws/btcbusd@trade');
            let StockPriceElement = document.getElementById('bitcoin');
            let lastprice = null;

            ws.onmessage = (event) => {
                let stockObject = JSON.parse(event.data);
                let price = parseFloat(stockObject.p).toFixed(2);
                StockPriceElement.innerText = parseFloat(stockObject.p).toFixed(2);

                StockPriceElement.style.color = !lastprice ||
                lastprice === price ? 'black' : price > lastprice ? 'green' : 'red';

                lastprice = price;
            }
        } else if (d == 1) {
            document.getElementById("ethereum").style.display = "block";
            document.getElementById("bitcoin").style.display = "none";
            document.getElementById("BNB").style.display = "none";
            let ws = new WebSocket('wss://fstream.binance.com/ws/ethbusd@trade');
            let StockPriceElement = document.getElementById('ethereum');
            let lastprice = null;

            ws.onmessage = (event) => {
                let stockObject = JSON.parse(event.data);
                let price = parseFloat(stockObject.p).toFixed(2);
                StockPriceElement.innerText = parseFloat(stockObject.p).toFixed(2);

                StockPriceElement.style.color = !lastprice ||
                lastprice === price ? 'black' : price > lastprice ? 'green' : 'red';

                lastprice = price;
            }
        } else if (d == 2) {
            document.getElementById("BNB").style.display = "block";
            document.getElementById("ethereum").style.display = "none";
            document.getElementById("bitcoin").style.display = "none";

            let ws = new WebSocket('wss://fstream.binance.com/ws/bnbbusd@trade');
            let StockPriceElement = document.getElementById('BNB');
            let lastprice = null;

            ws.onmessage = (event) => {
                let stockObject = JSON.parse(event.data);
                let price = parseFloat(stockObject.p).toFixed(2);
                StockPriceElement.innerText = parseFloat(stockObject.p).toFixed(2);

                StockPriceElement.style.color = !lastprice ||
                lastprice === price ? 'black' : price > lastprice ? 'green' : 'red';

                lastprice = price;
            }
        } else {
            alert('hhhh');
        }
    }
</script>
</body>

</html>
