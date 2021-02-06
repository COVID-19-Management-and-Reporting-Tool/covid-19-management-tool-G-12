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
    const promoteBtns = document.querySelectorAll('.promote-btn');
    const promoteForm = document.querySelector('.modal-promote-form');
    const promoteBtnClose = document.querySelector('.promotion-hdr #modal-btn-close');
    const fullName = document.querySelector('.promotion-form form .input #fullname');

    // adding active class to modal form
    promoteBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            promoteForm.classList.add('active');

            // getting name of health officer from table
            const tds = btn.parentElement.parentElement.childNodes;

            tds.forEach(td => {
                if (td.className === 'name') {
                    fullName.value = td.innerText;
                }
            });
        });

        const parentArray = btn.parentElement.parentElement.childNodes;

        parentArray.forEach(td => {
            // change promote btn color
            if (td.className === 'type') {
                const type = td.innerText;

                switch (type) {
                    case 'Junior Officer':
                        btn.className = 'junior';
                        break;
                    case 'Senior Officer':
                        btn.className = 'senior';
                        break;
                    case 'Expert Officer':
                        btn.className = 'deactivate';
                        break;
                    default:
                        break;
                }
            }
        });
    });


    // removing active class to modal form
    promoteBtnClose.addEventListener('click', () => {
        if (promoteForm.className == 'modal-promote-form active') {
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