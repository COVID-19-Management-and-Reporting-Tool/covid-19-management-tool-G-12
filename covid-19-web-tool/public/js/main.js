// const sidenavMenu = document.querySelector('.sidenav-menu');
// const btnShow = document.querySelector('.sidenav-hdr .show');
// const btnHide = document.querySelector('.sidenav-hdr .hide');

// btnShow.classList.add('active');

// btnShow.addEventListener('click', () => {
//     btnShow.classList.remove('active');
//     btnHide.classList.add('active');
//     sidenavMenu.classList.add('show');
// });

// btnHide.addEventListener('click', () => {
//     btnHide.classList.remove('active');
//     btnShow.classList.add('active');
//     sidenavMenu.classList.remove('show');
// });

const numCounter = () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 20;

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;

            const inc = target / speed;
            console.log(inc);
            if (count < target) {
                counter.innerText = count + inc;
                setTimeout(updateCount, 100);
            } else {
                count.innerText = target;
            }

        }

        updateCount();
    });
}

const backToTop = () => {
    const backBtn = document.querySelector('.btn-top');
    const scrollFunction = () => {
        if (document.body.scrollTop > 250 || document.documentElement.scrollTop > 250) {
            backBtn.classList.add('show');
            backBtn.classList.remove('hide');
        } else {
            backBtn.classList.remove('show');
            backBtn.classList.add('hide');
        }
    }
    window.onscroll = () => {
        scrollFunction();
    }
    backBtn.addEventListener('click', () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 10;
    });
}

const checkWindowPosistion = () => {
    window.addEventListener('scroll', () => {
        if (window.scrollY > 280) {
            numCounter();
        }
    });
}

checkWindowPosistion();
backToTop();