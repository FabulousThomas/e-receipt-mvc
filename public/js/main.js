// alert('Hello JS FILE');

// CALCULATION
// function getValue() {
//     //  var outstanding = document.form.total_outstanding.value;
//     //  var outstanding = +outstanding;
//     //  var amount = document.form.amount_paid.value;
//     //  var amount = +amount;
//     //  var balance = amount - outstanding;
//     //  document.getElementById('balance').value = balance.toLocaleString();


//     var outstanding = outstanding;
//     var outstanding = document.getElementById('total_outstanding').value;
//     var amount = amount;
//     var amount = document.getElementById('amount_paid').value;
//     var balance = amount - outstanding;
//     document.getElementById('balance').value = balance.toLocaleString();


// }

$(document).keyup(function() {
    var amount = +$('#amount_paid').val().toLocaleString();
    var outstanding = +$('#total_outstanding').val().toLocaleString();
    // total = amount - outstanding;
    var total = amount - outstanding;
    $('#balance').val(total);

    // total = $('#amount_paid').val() - $('#total_outstanding').val();
    // $('#balance').val(total).toLocaleString();
});

function printpdf() {
    // This logic determines which div should be printed...
    $("#receipt").addClass("print-content");
    window.print();
}