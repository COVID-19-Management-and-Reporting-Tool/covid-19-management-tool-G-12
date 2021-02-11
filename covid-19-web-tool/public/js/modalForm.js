const displayModalForm = () => {
    const modalBtn = document.querySelector('.modal-btn');
    const modalForm = document.querySelector('.modal-form');
    const modalBtnClose = document.querySelector('#modal-btn-close');
    const addPaymentBtn = document.querySelector('.add-payment-btn');
    const paymentForm = document.querySelector('.form-payment');

    modalBtn.addEventListener('click', () => {
        modalForm.classList.add('active');
    });

    modalBtnClose.addEventListener('click', () => {
        if (modalForm.className == 'modal-form active') {
            modalForm.classList.remove('active');
        }
    });
}

const displayPromotionForm = () => {
    const promoteBtn= document.querySelector('.promote-btn');
    const promoteForm = document.querySelector('.modal-promote-form');
    const promoteBtnClose = document.querySelector('.promotion-hdr #modal-btn-close');
    

    // adding active class to modal form
   promoteBtn.addEventListener('click',()=>{
       promoteForm.classList.add('active');
   });
   //removing active class to modal class
   promoteBtnClose.addEventListener('click',()=>{
       if(promoteForm.className == 'modal-promote-form active')
       {
           promoteForm.classList.remove('active');
       }
   });

        


   
}

const checkMonth = () => {
    const getMonth = () => {
        const month = document.querySelector('form .input #month');
        const date = new Date().getMonth();
        const months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        month.value = months[date];
        console.log(months[date]);
    }
    if (document.querySelector('form .input #month')) {
        getMonth();
    } else {
        console.log('Month not applicable');
    }
}

checkMonth();
displayModalForm();
displayPromotionForm();