


let close = document.querySelector("button");

let form = document.querySelector("form");

console.log(close);


form.addEventListener("click",(e)=>{


    e.preventDefault();
    e.target.closest('form').submit();
    console.log(e.target);
})