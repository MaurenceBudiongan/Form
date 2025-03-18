
const user = document.getElementById("user");
const serviceSection = document.getElementById("service-section");
const transferSection = document.getElementById("transfer-section");
const paymentSection = document.getElementById("payment-section");


function showUser(){
 user.style.display = "block"
 serviceSection.style.display = "none";
 transferSection.style.display = "none";
 paymentSection.style.display = "none";
}
function showMain(){
 user.style.display = "none"
 serviceSection.style.display = "block";
 transferSection.style.display = "block";
 paymentSection.style.display = "block";
}
