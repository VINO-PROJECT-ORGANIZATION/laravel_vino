
export default function fermerMessage(){

const composante_message = document.querySelector('.composante_message');
const fermer = document.querySelector('.fermer');


fermer.addEventListener('click',(e)=>{

    e.target.parentElement.parentElement.classList.add("invisible");    
})

}

fermerMessage();

