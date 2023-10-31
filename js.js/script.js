const containerm = document.querySelector(".containerm"),
      pwShowHide = document.querySelectorAll(".showHidePw"),
      pwFields = document.querySelectorAll(".password"),
      signUp = document.querySelector(".signup-link"),
      login = document.querySelector(".login-link");
//   show/hide password and change icon
    pwShowHide.forEach(eyeIcon =>{
        eyeIcon.addEventListener("click", ()=>{
            pwFields.forEach(pwField =>{
                if(pwField.type ==="password"){
                    pwField.type = "text";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye-slash", "uil-eye");
                    })
                }else{
                    pwField.type = "password";

                    pwShowHide.forEach(icon =>{
                        icon.classList.replace("uil-eye", "uil-eye-slash");
                    })
                }
            }) 
        })
    })
// signup and login form
    signUp.addEventListener("click", ( )=>{
        containerm.classList.add("active");
    });
    login.addEventListener("click", ( )=>{
        containerm.classList.remove("active");
    });


// ________________userBox_________________

let userbox = document.querySelector('.header .header-2 .user-box');
let navbar = document.querySelector('.header .header-2 .navbar');

document.querySelector('#user-btn').onclick = () =>{
   userbox.classList.toggle('active');
   navbar.classList.remove('active');
}



document.querySelector('#menu-btn').onclick = () =>{
   navbar.classList.toggle('active');
   userbox.classList.remove('active');
   navbar.classList.remove('active');
}

window.onscroll = () =>{
    userbox.classList.remove('active');
    navbar.classList.remove('active');
 
    if(window.scrollY > 60){
       document.querySelector('.header .header-2').classList.add('active');
    }else{
       document.querySelector('.header .header-2').classList.remove('active');
    }
 }

