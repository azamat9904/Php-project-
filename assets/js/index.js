const logoutBtn = document.querySelector('#logout');
logoutBtn.addEventListener('click',()=>{
    document.cookie = 'token=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    window.location.href = '/sign.php';
});