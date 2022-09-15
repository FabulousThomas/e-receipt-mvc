// CALCULATION

// function getValue() {
//     //  var outstanding = document.form.total_outstanding.value;
//     //  var outstanding = +outstanding;
//     //  var amount = document.form.amount_paid.value;
//     //  var amount = +amount;
//     //  var balance = amount - outstanding;
//     //  document.getElementById('balance').value = balance.toLocaleString();


// }

$(document).keyup(function() {
    // var amount = +$('#amount_paid').val().toLocaleString();
    // var outstanding = +$('#total_outstanding').val().toLocaleString();
    // // total = amount - outstanding;
    // var total = amount - outstanding;
    // $('#balance').val(total).toLocaleString();

    total = $('#amount_paid').val() - $('#total_outstanding').val();
    $('#balance').val(total).toLocaleString();
});

// ==========PRINT RECEIPT================
function printpdf() {
    // This logic determines which div should be printed...
    $("#receipt").addClass("print-content");
    window.print();
}

// ===========SHARING PERCENTAGE===========
function sharePercentage(value) {

    dc = (17 * value) / 100;
    lo = (2 * value) / 100;
    lt = (1 * value) / 100;
    br = (30 * value) / 100;
    oc = (10 * value) / 100;
    bs = (5 * value) / 100;
    ds = (2.5 * value) / 100;
    ceo = (17 * value) / 100;
    gm = (4.5 * value) / 100;
    md = (11 * value) / 100;

    document.getElementById('dircom').value = dc.toLocaleString();
    document.getElementById('level-one').value = lo.toLocaleString();
    document.getElementById('level-two').value = lt.toLocaleString();
    document.getElementById('business-invest').value = br.toLocaleString();
    document.getElementById('office-cost').value = oc.toLocaleString();
    document.getElementById('business-savings').value = bs.toLocaleString();
    document.getElementById('director-share').value = ds.toLocaleString();
    document.getElementById('ceo').value = ceo.toLocaleString();
    document.getElementById('gm').value = gm.toLocaleString();
    document.getElementById('md').value = md.toLocaleString();
}

// ===========SHARE RECEIPT OPTION============
const facebookBtn = document.querySelector(".btn-facebook");
const twitterBtn = document.querySelector(".btn-twitter");
const whatsappBtn = document.querySelector(".btn-whatsapp");

function init() {
    let postUrl = encodeURI(document.location.href);
    let postTitle = encodeURI("Hi, please download receipt with the link below");

    facebookBtn.setAttribute("href", `https://www.facebook.com/sharer.php?u=${postUrl}`);

    twitterBtn.setAttribute("href", `https://twitter.com/share?url=${postUrl}&text=${postTitle}&via=[via]&hashtags=[hashtags]`);

    whatsappBtn.setAttribute("href", `https://api.whatsapp.com/send?text=${postTitle} ${postUrl}`);
}

init();