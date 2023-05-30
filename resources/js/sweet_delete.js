export function addSweetDelete(btnQuery,wrapperQuery,titleQuery) {
    const deleteBtns = document.querySelectorAll(btnQuery);
    deleteBtns.forEach( btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
    
            const elementTitle = btn.closest(wrapperQuery).querySelector(titleQuery).innerHTML;
    
            const deleteAlert = document.getElementById('sweet-delete-alert');
            deleteAlert.querySelector('h2').innerHTML = elementTitle;
            deleteAlert.classList.remove('d-none')
    
            const confirmDeleteBtn = deleteAlert.querySelector('.confirm.btn');
            const dismissBtn = deleteAlert.querySelector('.dismiss.btn');
    
            confirmDeleteBtn.addEventListener('click', () => {
                btn.parentElement.submit();
            });
    
            dismissBtn.addEventListener('click', () => {
                deleteAlert.classList.add('d-none');
            })
        })
    })
}

export function addFormElementDelete(fieldName){
    const deleteBtn = document.querySelector('.'+fieldName+'.btn');
    deleteBtn.addEventListener('click', () => {
        const deleteForm = document.querySelector('.'+fieldName+' form');
        deleteForm.submit();
    })
}