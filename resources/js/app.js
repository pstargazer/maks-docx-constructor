import 'bootstrap';

const spoilers = document.querySelectorAll('.spoiler');

spoilers.forEach(spoiler => {
   spoiler.addEventListener('click', e => {
        e.preventDefault();
        spoiler.classList.toggle('bg-black')
   })
})

