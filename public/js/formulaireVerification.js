
export default class Formulaire{

    constructor(){

        
        this.conteneur = document.querySelector(".enregistrement-form__container");
        this.formulaire = this.conteneur.querySelector("form");
        this.inputs_text = this.formulaire.querySelectorAll("input[type='text']");
        this.inputs_number = this.formulaire.querySelectorAll("input[type='number']");
        this.select = this.formulaire.querySelector("select");
        this.soumettre = this.formulaire.querySelector("button");
        this.balises_erreur = this.formulaire.querySelectorAll(".erreur");

      
      
        if (this.formulaire.checkValidity()){

            this.soumettre.disabled = false;
        }
        
        this.init();
        
    }

    init(){

        console.log(this.balises_erreur);
        

        this.formulaire.addEventListener('submit',(e)=>{

         
        
            // this.verifierTexte();
            

            // if(this.verifierNumber() || this.verifierTexte()){
                //  e.preventDefault();
                 new Verification(this.inputs_number,this.inputs_text,this.soumettre);
                 e.preventDefault();
                 this.formulaire.reset();
            //     this.soumettre.disabled=true;
            // }
            // else
             if(this.formulaire.checkValidity()){

                this.soumettre.disabled=false;
            }
            
        })
    }


    verifierNumber(element){

                //     this.inputs_number.forEach((element)=>{

                // if(element.value < 0){
                //       element.parentElement.lastElementChild.innerHTML += '<p>ca prend une valeur positive</p>';
                //     element.parentElement.lastElementChild.classList.remove('invisible');
                //      this.soumettre.disabled=true; 
                // }

                if(element.value < 0){

                      element.parentElement.lastElementChild.innerHTML += '<p>ca prend une valeur positive</p>';
                    element.parentElement.lastElementChild.classList.remove('invisible');
                    event.preventDefault();
                      this.soumettre.disabled=true; 
                }
                return true;

            }

    }


class Verification{

    constructor(tab1,tab2,element){

        this.tableau_number = tab1;
        this.tableau_text = tab2;
        this.el = element;

        console.log(this.tableau_number,this.tableau_text,this.el);
        

              this.tableau_number.forEach((element)=>{

                if(element.value < 0){
                      element.parentElement.lastElementChild.innerHTML += '<p>ca prend une valeur positive</p>';
                    element.parentElement.lastElementChild.classList.remove('invisible');
                     this.el.disabled=false; 
                }
    })

    }
}


new Formulaire();
