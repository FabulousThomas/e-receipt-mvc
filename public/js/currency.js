// CURRENCY FORMAT FUNCTIONS

var currencyInput = document.querySelector('input[type="currency"]')
var currency = 'GBP' // https://www.currency-iso.org/dam/downloads/lists/list_one.xml

// format inital value
onblur({ target: currencyInput })

// bind event listeners
currencyInput.addEventListener('focus', onFocus)
currencyInput.addEventListener('blur', onblur)


function localStringToNumber(s) {
    return Number(String(s).replace(/[^0-9.-]+/g, ""))
}

function onFocus(e) {
    var value = e.target.value;
    e.target.value = value ? localStringToNumber(value) : ''
}

function onblur(e) {
    var value = e.target.value

    var options = {
        maximumFractionDigits: 2,
        currency: currency,
        //   style: "currency",
        currencyDisplay: "symbol"
    }

    e.target.value = (value || value === 0) ?
        localStringToNumber(value).toLocaleString(undefined, options) : '';

}