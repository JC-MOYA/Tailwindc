
const _helper = {};

// Checks for valid numeric key input
_helper.isNumeric = function (e) {
    var charCode = e.which ? e.which : event.keyCode;
    return charCode >= 48 && charCode <= 57 ? true : false;
};

// Accept all characters
_helper.allChars = function (e) {
    var charCode = e.which ? e.which : event.keyCode;
    return (charCode >= 40 && charCode <= 130) || charCode == 32 ? true : false;
};

function numberWithCommas(num) {
    var n = parseFloat(num).toFixed(2);
    var parts = n.toString().split(".");
    var number = parts[0].replace(/\B(?=(\d{3})+(?!\d))/g, ",") + "." + parts[1];
    return number;
}

function getCurrentTime(){
    const date = new Date();
    let current_time = date.toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
    return current_time;
}