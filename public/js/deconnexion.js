


export default function deconnecter(){

    let deconnecter = document.querySelector("#deconnecter");

    let form = document.querySelector("form");
        
    deconnecter.addEventListener("click",(e)=>{
           
       console.log(e.target.parentElement.parentElement.nextElementSibling);
       e.target.parentElement.parentElement.nextElementSibling.classList.toggle("invisible");
        
    }
)
}


deconnecter();

