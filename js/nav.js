const navSlide = () => {
    const burger = document.querySelector('.header__nav--burger');
    const nav = document.querySelector('.header__nav--content');
    const navLinks = document.querySelectorAll('.header__nav--content li')

    burger.addEventListener('click', () => {
        //Toogle Nav
        nav.classList.toggle('header__nav--contentActive');
        
        //Animated links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `header__nav--contentFade 0.5s ease forwards ${index / 7 + 0.2}s`;
            }
        });
        //Burger Animation
        burger.classList.toggle('toggle');
    });

}

navSlide();