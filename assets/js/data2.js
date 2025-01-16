const section = document.querySelector('.modal form');
submitBtn = section.querySelector('.button button');
contentText = section.querySelector('.error-text');

submitBtn.onclick = ()=>{
    let xhr = new  XMLHttpRequest();
    xhr.open('POST','controllers/register_handler.php', true);
    xhr.onload = ()=>{
        if(xhr.readyState = XMLHttpRequest.DONE) {
            console.log("Loaded");
            if(xhr.status === 200) {
                let data = xhr.response;
                    console.log(data);
                displayData(data);
            }
        }else{
            document.log("Not loaded");
        }
    }
    xhr.send();
}