const section = document.querySelector('.container-fluid nav');
submitBtn = section.querySelector('.list-group .add-student');
contentText = section.querySelector('main .students');

submitBtn.onclick = ()=>{
    let xhr = new  XMLHttpRequest();
    xhr.open('POST','add-student.php', true);
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