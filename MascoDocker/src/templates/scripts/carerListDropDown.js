// TEMPORALLY NOT USED - 26-02-2024
window.onload = () => {
  let trFeedUser = document.querySelectorAll(".trFeedUser");
  console.log(trFeedUser);

  trFeedUser.forEach((arrow) => { 
    arrow.addEventListener("click", () => {
        console.log("Hello");
        let newTrFeedUser = document.createElement("tr");
        let newTdFeedUser = document.createElement("td");
        newTdFeedUser.innerHTML = "Hello";
        newTrFeedUser.appendChild(newTdFeedUser);
      });
    
  });
};

