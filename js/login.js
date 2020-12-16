document.getElementsByClassName('error').style.display = 'none'

checkUser = () => {
    let username = document.getElementById('inputEmail').value
    let password = document.getElementById('inputPassword').value

    for (let i = 0; i < Users.length(); i++) {
        let currentName = Users[i].name
        if (currentName != username) {
            document.getElementsByClassName('errorName').style.display = 'block'
        }
    }
}

document.getElementsById('errorName').style.display = 'block'