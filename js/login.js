checkUser = () => {
    // Input dos utilizadores
    let username = document.getElementById('inputEmail').value
    let password = document.getElementById('inputPassword').value
    let j = null
    let dbCod
    let dbType
    let encryptedcodUser
    let encryptedtype
    // Percorre a base de dados
    for (let i = 0; i < Users.length; i++) {
        if (Users[i].name == username || Users[i].email == username) {
            j = i
        }
    }
    if (j == null) {
        document.getElementById('errorName').classList.remove('error')
    } else if (Users[j].password != password) {
        document.getElementById('errorName').classList.add('error')
        document.getElementById('errorCompatible').classList.remove('error')
    } else {
        dbCod = Users[j].codUser
        dbType = Users[j].type
        encryptedcodUser = CryptoJS.AES.encrypt(dbCod.toString(), "Joincov3_dc_fc")
        encryptedtype = CryptoJS.AES.encrypt(dbType.toString(), "Joincov3_dc_fc")
        window.location = '../index.html?c=' + encryptedcodUser + '&d=' + encryptedtype
    }
}