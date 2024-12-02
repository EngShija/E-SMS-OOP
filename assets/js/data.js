const section = document.querySelector('.container-fluid nav');
continueBtn = section.querySelector('li .student');
continueBtn1 = section.querySelector('li .teacher');
continueBtn2 = section.querySelector('li .admin');
continueBtn3 = section.querySelector('li .class');
continueBtn4 = section.querySelector('li .subject');
continueBtn5 = section.querySelector('li .exams');
continueBtn6 = section.querySelector('li .results');
settingButton = section.querySelector('li .settings');
contentText = section.querySelector('main .students');

let check_data = (myButton, url) => {
    myButton.onclick = () => {
        let xhr = new XMLHttpRequest();
        xhr.open('POST', url, true);
        xhr.onload = () => {
            if (xhr.readyState = XMLHttpRequest.DONE){
                if (xhr.status === 200) {
                    let data = xhr.response;
                    displayData(data);
                }
            } 
        }
        xhr.send();
    }
}

let displayData = (data) => {
    let htmlTemplate = `${data}`;
    document.querySelector('.students').innerHTML = htmlTemplate;
}

check_data(continueBtn, 'student.php');
check_data(continueBtn1, 'teacher.php');
check_data(continueBtn2, 'admin.php');
check_data(continueBtn3, 'class.php');
check_data(continueBtn4, 'subject.php');
check_data(continueBtn5, 'exams.php');
check_data(continueBtn6, 'results.php')
check_data(settingButton, 'settings.php')


