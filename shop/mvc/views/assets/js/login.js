function validateForm() {
    const pwd = document.querySelector('#pwd').value
    const confirmPwd = document.querySelector('#confirmation_pwd').value
    if(pwd != '' && pwd.length < 6) {
        alert('Mật khẩu tối thiểu 6 ký tự')
        return false
    }
    if(pwd != confirmPwd) {
        alert('Mật khẩu không khớp!')
        return false
    }
    return true
}

function confirmAction() {
    const confirmAct = confirm("Bạn vẫn muốn tiếp tục?")
    return confirmAct;
}

function closeToast() {
    document.querySelector('._toast_').style.display = 'none'
    document.querySelector('._toast_').style.height = '0px'
}

;(function fadeOut() {
    setTimeout( e => {
        document.querySelector('._toast_').style.height = '0px';
    }, 3000)
})()

