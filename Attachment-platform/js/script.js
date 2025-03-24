

/*document.getElementById("login-form").addEventListener("submit",(e)=>{
    e.preventDefault();
    const formData=e.target;
    const messageArea=formData.querySelector(".message-area");
    const usernameElement=formData.elements["regNo"].value;
    const passwordElement=formData.elements["password"].value;

    if(!passwordElement.trim()||!usernameElement.trim()){
       messageArea.innerHTML="Kindly fill all feilds";
       setTimeout(()=>{
            messageArea.innerHTML="";    
        },5000)
    }
});*/

const eyeBtn=document.querySelector(".fa-eye");
const password=document.getElementById("password");


eyeBtn.addEventListener("click",(e)=>{
    e.preventDefault();
    if(password.type=="password"){
        password.type="text";
    }else{
        
        password.type="password";
    }
    eyeBtn.classList.toggle("fa-eye-slash");
        eyeBtn.classList.toggle("fa-eye");
    
})
