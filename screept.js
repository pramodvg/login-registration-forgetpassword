function hideShowPassword() {
    var x = document.getElementById("show");
    var showbtntxt = document.getElementById("showbtn");
    if (x.type === "password") {
        x.type = "text";
        showbtntxt.innerHTML = "Hide";
    } else {
        x.type = "password";
        showbtntxt.innerHTML = "Show";
    }
}
function hideShowConfirmPassword() {
    var x = document.getElementById("showconfirm");
    var showbtntxt = document.getElementById("showconfirmbtn");
    if (x.type === "password") {
        x.type = "text";
        showbtntxt.innerHTML = "Hide";
    } else {
        x.type = "password";
        showbtntxt.innerHTML = "Show";
    }
}

