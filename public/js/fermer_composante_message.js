
export default function fermerMessage(){

const composante_message = document.querySelector('.composante_message');
const fermer = document.querySelector('.fermer');


fermer.addEventListener('click',(e)=>{

    // correction je ferme la boite composante_message
    composante_message.classList.add("invisible");
        
})

}

fermerMessage();

