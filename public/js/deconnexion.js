


export default function deconnecter(){

    let deconnecter = document.querySelector("#deconnecter");

    let form = document.querySelector("form");
        
    deconnecter.addEventListener("click",(e)=>{
           
    // correction je ferme le form 
       form.classList.toggle("invisible");
        
    }
)
}


deconnecter();

