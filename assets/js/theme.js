
const body = document.querySelector(".body");
themeToggleBtn = body.querySelector(".theme input");
themeToggleBtn.onclick = ()=>{
    let xhr = new  XMLHttpRequest();
    xhr.open('POST','dashboard.php', true);
    xhr.onload = ()=>{
        if(xhr.readyState = XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                console.log('Document found');
                body.style.filter = "invert(1)";
                }
                else{
                    console.log("Document not found");
                }
            }
        }
    let formData = new FormData(body);
    xhr.send(formData);
 }
