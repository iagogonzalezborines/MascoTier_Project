let button = document.getElementById("button-account");

button.addEventListener("click",()=>{
   console.log("estoy aqui"); 

   let container = document.getElementById("settings-container");
   container.classList.remove("hidden");
});