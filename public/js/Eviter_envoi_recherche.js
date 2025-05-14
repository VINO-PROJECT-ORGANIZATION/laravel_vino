export default class Eviter_envoi{


    constructor(){

        this.form = document.querySelector('#form-recherche-cellier');
        this.recherche = document.querySelector('#input-recherche-cellier');
        this.bouton = document.querySelector('#bouton-recherche-cellier');


        console.log( this.form,this.recherche,this.bouton);
        
        this.init();
    }

    init(){

        this.bloquerEnvoi();
    }

    bloquerEnvoi(){

        
    }
}

new Eviter_envoi();