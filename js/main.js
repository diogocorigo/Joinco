// MAIN

function getParameter(theParameter) {
    var params = window.location.search.substr(1).split('&');

    for (var i = 0; i < params.length; i++) {
        var p = params[i].split('=');
        if (p[0] == theParameter) {
            return decodeURIComponent(p[1]);
        }
    }
    return false;
}
var encryptedc = getParameter('c')
var decryptedc = CryptoJS.AES.decrypt(encryptedc, "Joincov3_dc_fc");
var c = decryptedc.toString(CryptoJS.enc.Utf8);
var encryptedd = getParameter('d')
var decryptedd = CryptoJS.AES.decrypt(encryptedd, "Joincov3_dc_fc");
var d = decryptedd.toString(CryptoJS.enc.Utf8);
if (c == '' || d == '') {
    window.location = "../login.html"
}
c = parseInt(c)
d = parseInt(d)



// ANIMATIONS

changeTypeUser = () => {
    let defaultUser = document.getElementById('main')
    let adminUser = document.getElementById('admin')
    let superUser = document.getElementById('super')
}