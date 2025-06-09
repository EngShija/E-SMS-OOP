
const form = document.querySelector(".login #loginForm");
continueBtn = form.querySelector(".button button");
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    let xhr = new  XMLHttpRequest();
    xhr.open('POST','controllers/login_handler.php', true);
    xhr.onload = ()=>{
        if(xhr.readyState = XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success") {
                    location.href = "dashboard.php";
                }else{
                    console.log(data);
                    errorText.style.display = "block";
                    errorText.textContent = data;
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}

// const form = document.querySelector(".login form");

// errorText = form.querySelector(".error-text");

// $(".login form .button input").click(function(){
//     $(".error-text").load("controllers/login_handler.php", function(responseText, statusText, xhr){
//         if(statusText == "success"){
//             location.href = "dashboard.php";
//         }
//         else if(statusText == "error"){
//             const data = responseText;
//             console.log(data);
//             errorText.style.display = "block";
//             errorText.textContent = data;
//         }
//     })
// })
