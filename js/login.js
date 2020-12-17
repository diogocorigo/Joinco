checkUser = () => {
    // Input dos utilizadores
    let username = document.getElementById('inputEmail').value
    let password = document.getElementById('inputPassword').value
    let dbCod
    let dbName
    let dbEmail
    let dbPass
    let dbType
    let encryptedcodUser
    let encryptedtype
    // Percorre a base de dados
    for (let i = 0; i < Users.length; i++) {
        dbCod = Users[i].codUser
        dbName = Users[i].name
        dbEmail = Users[i].email
        dbPass = Users[i].password
        dbType = Users[i].type
    }
    // Certifica que o utilizador existe
    if (dbName != username && dbEmail != username) {
        document.getElementById('errorName').classList.remove('error')
    } else if (dbName == username || dbEmail == username && dbPass != password) {
        // Certifica que o nome corresponde à password inserida
        document.getElementById('errorName').classList.add('error')
        document.getElementById('errorCompatible').classList.remove('error')
    } else if ((dbName == username || dbEmail == username && dbPass == password)){
        encryptedcodUser = CryptoJS.AES.encrypt(dbCod.toString(), "Joincov3_dc_fc")
        encryptedtype = CryptoJS.AES.encrypt(dbType.toString(), "Joincov3_dc_fc")
        window.location = '../index.html?c=' + encryptedcodUser + '&d='+encryptedtype
    }
}