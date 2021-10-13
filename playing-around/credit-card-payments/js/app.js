var request, config;

config = {
  fields: {
    cardpan: {
      selector: "cardpan",                 // put name of your div-container here
      type: "text",                        // text (default), password, tel
      style: "font-size: 1em; border: 1px solid #000;"
    },
    cardcvc2: {
      selector: "cardcvc2",                // put name of your div-container here
      type: "password",                    // select(default), text, password, tel
      style: "font-size: 1em; border: 1px solid #000;",
      size: "4",
      maxlength: "4",
      length: { "A": 4, "V": 3, "M": 3, "J": 0 }
    },
    cardexpiremonth: {
      selector: "cardexpiremonth",         // put name of your div-container here
      type: "select",                      // select(default), text, password, tel
      size: "2",
      maxlength: "2",
      iframe: {
        width: "50px"
      }
    },
    cardexpireyear: {
      selector: "cardexpireyear",          // put name of your div-container here
      type: "select",                      // select(default), text, password, tel
      iframe: {
        width: "80px"
      }
    }
  },
  defaultStyle: {
    input: "font-size: 1em; border: 1px solid #000; width: 175px;",
    select: "font-size: 1em; border: 1px solid #000;",
    iframe: {
      height: "33px",
      width: "180px"
    }
  },
  error: "errorOutput",                        // area to display error-messages (optional)
  language: Payone.ClientApi.Language.en       // Language to display error-messages
                                               // (default: Payone.ClientApi.Language.en)
};

request = {
  request: 'creditcardcheck',                  // fixed value
  responsetype: 'JSON',                        // fixed value
  mode: 'live',                                // desired mode
  mid: '10001',                                // your MID
  aid: '10002',                                // your AID
  portalid: '2000002',                         // your PortalId
  encoding: 'UTF-8',                           // desired encoding
  storecarddata: 'yes',                        // fixed value
  // hash calculated over your request-parameter-values (alphabetical request-order) plus PMI portal key
  hash: '5c4014cebeb361d9e186fd42c810b9b1'     // see https://docs.payone.com/x/K4gS
};
var iframes = new Payone.ClientApi.HostedIFrames(config, request);
iframes.setCardType("V");

document.getElementById('cardtype').onchange = function () {
  iframes.setCardType(this.value);              // on change: set new type of credit card to process
};

function check() {                               // Function called by submitting PAY-button
  if (iframes.isComplete()) {
    iframes.creditCardCheck('checkCallback');// Perform "CreditCardCheck" to create and get a
                                             // PseudoCardPan; then call your function "checkCallback"
  } else {
    console.debug("not complete");
  }
}

function checkCallback(response) {
  console.debug(response);
  if (response.status === "VALID") {
    document.getElementById("pseudocardpan").value = response.pseudocardpan;
    document.getElementById("truncatedcardpan").value = response.truncatedcardpan;
    document.paymentform.submit();
  }
}