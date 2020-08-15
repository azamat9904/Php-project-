const baseUrl = 'http://site/ajax';


//Post request to the server
const postRequest = async (obj)=>{
    let response = await fetch(baseUrl + '/order.php',{
        method:'POST',
        body:JSON.stringify(obj)
    });
    return await response.json();
};

//Logout Action
const logoutBtn = document.querySelector('#logout');
logoutBtn.addEventListener('click',()=>{
    document.cookie = 'token=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    window.location.href = '/sign.php';
});


//Delete order button actions
const deleteButtons = document.querySelectorAll('.deleteOrder');
const contentWrapper = document.querySelector('.content__wrapper');

if(deleteButtons) deleteButtons.forEach( deleteButton => {
    deleteButton.addEventListener('click',async ()=>{
        const isSure = confirm('Are you sure to delete this product ?');
        if(isSure){
            const id = deleteButton.dataset.id;
            const result = await postRequest({id});
            if(result.empty){
                const table = deleteButton.closest('table');
                table.remove();
                const div = document.createElement('div');
                div.textContent = 'No orders yet';
                div.className = 'empty';
               contentWrapper.append(div);
            }else{
                if(result.message === 'success'){
                    const tr = deleteButton.closest('tr');
                    tr.remove();
                }
            }
        }
    })
});