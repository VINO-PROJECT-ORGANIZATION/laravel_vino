import Verification from "./Verification.js";
class Formulaire{

    constructor(){

        this.form = document.querySelector('[data-js-formulaire]');
        this.button = this.form.querySelector('[data-js-btn]');
        this.champs = this.form.querySelectorAll('[required]');
         
        this.init();

      
    }

    init(){

  this.form.addEventListener('submit',(e)=>this.handleSubmit(e));

    
    }

  handleSubmit(event){

    event.preventDefault();
    const verifier = new Verification(this.form,this.champs,this.button);

    console.log(verifier.resultat());
    
    if(verifier.resultat() ){

        this.form.removeEventListener('submit',this.handleSubmit);
        this.form.submit();
    }
  }  


}

new Formulaire();