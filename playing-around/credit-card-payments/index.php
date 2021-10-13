<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://secure.pay1.de/client-api/js/v1/payone_hosted_min.js" defer></script>
  <script src="js/app.js" defer></script>
  <title>Document</title>
</head>
<body>
  <form name="paymentform" action="" method="post">
    <fieldset>
      <input type="hidden" name="pseudocardpan" id="pseudocardpan">
      <input type="hidden" name="truncatedcardpan" id="truncatedcardpan">

      <!-- configure your cardtype-selection here -->
      <label for="cardtypeInput">Card type</label>
      <select id="cardtype">
        <option value="V">VISA</option>
        <option value="M">Mastercard</option>
        <option value="A">Amex</option>
      </select>

      <label for="cardpanInput">Cardpan:</label>
      <span class="inputIframe" id="cardpan"></span>

      <label for="cvcInput">CVC:</label>
      <span id="cardcvc2" class="inputIframe"></span>

      <label for="expireInput">Expire Date:</label>
      <span id="expireInput" class="inputIframe">
            <span id="cardexpiremonth"></span>
            <span id="cardexpireyear"></span>
        </span>

      <label for="firstname">Firstname:</label>
      <input id="firstname" type="text" name="firstname" value="">
      <label for="lastname">Lastname:</label>
      <input id="lastname" type="text" name="lastname" value="">

      <div id="errorOutput"></div>
      <input id="paymentsubmit" type="button" value="Submit" onclick="check();">
    </fieldset>
  </form>
  <div id="paymentform"></div>
</body>
</html>