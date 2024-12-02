
const form = document.querySelector(".login form");
continueBtn = form.querySelector(".button button");
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault();
}
continueBtn.onclick = ()=>{
    let xhr = new  XMLHttpRequest();
    xhr.open('POST','controllers/register_handler.php', true);
    xhr.onload = ()=>{
        if(xhr.readyState = XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data == "success") {
                    console.log(data);
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
