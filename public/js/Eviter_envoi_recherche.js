export default class Eviter_envoi{

    constructor(){

        this.form = document.querySelector('#form-recherche-cellier');
        this.recherche = document.querySelector('#input-recherche-cellier');
        this.bouton = document.querySelector('#bouton-recherche-cellier');

        this.init();
    }

    init(){

        this.bloquerEnvoi();
    }

    bloquerEnvoi(){

        this.form.addEventListener('submit',(e)=>{

            if(this.recherche.value.trim() === ""){

                // e.preventDefault();
            }
        })

        this.bouton.addEventListener('click',(e)=>{

                if(this.recherche.value.trim() === ""){

                    // e.preventDefault();
                    this.recherche.focus();
                }
        })

    }
}

new Eviter_envoi();