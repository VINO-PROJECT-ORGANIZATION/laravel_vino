export default class Verification{

    constructor(formulaire , les_champs , bouton ){

        this.formulaire = formulaire;
        this.bouton = bouton;
        this.inputs = les_champs;
        
        this.resultat();
        this.init();
    }

    init(){
        
        this.resultat();
        this.verifierInputNumber();
        this.verifierInputText();

    }


    resultat(){


        if(this.verifierInputNumber() == true && this.verifierInputText() == true ){

            this.bouton.classList.remove('desactive');

            return true;
        }
        else if(this.verifierInputText() == true  && this.verifierInputNumber() == false){
            this.bouton.classList.add('desactive');
        return false;
        }
        else if(this.verifierInputNumber() == false && this.verifierInputText() == true ){

            this.bouton.classList.add('desactive');
            return false;
        }
        else if( this.verifierInputNumber() == false && this.verifierInputText == false){

            this.bouton.classList.add('desactive');
            return false;
        }

    }


    verifierInputText(){

        let approuve = false;
    this.inputs.forEach((element)=>{
    element.addEventListener('input',()=>{

                    this.bouton.classList.remove('desactive');                    
        })

        if(element.type == 'text'){

                if(element.value.length < 3){

                    element.parentElement.lastElementChild.classList.remove('invisible');
                    element.parentElement.lastElementChild.textContent = "il faut augmenter le nombre de caracteres";
                    approuve = false;
                }
                else{
                        element.parentElement.lastElementChild.classList.add('invisible');
                        approuve = true;
                }
            }
        })
        return approuve;
    }

    

    verifierInputNumber(){

        let approuve=false;
             this.inputs.forEach((element)=>{

                element.addEventListener('input',()=>{

                    this.bouton.classList.remove('desactive');                    
                })

          if(element.type == 'number'){

                if(element.value <= 0){

                    element.parentElement.lastElementChild.classList.remove('invisible');
                    element.parentElement.lastElementChild.textContent = "la valeur doit etre superieur a 0";
                    approuve = false;
                }
                else{
                        element.parentElement.lastElementChild.classList.add('invisible');
                        approuve = true;
                }
            }
    }
    )
    return approuve;
}
    
}