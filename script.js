let form = document.getElementById("form")
let name = document.getElementById('name');
let password = document.getElementById('password');
let Confirmpassword = document.getElementById('conpassword');
let email = document.getElementById('email');
let regemail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
let regname=  /^[a-zA-Z0-9]+$/;



form.addEventListener('submit', (event)=>{

    if(!validiteform())
        event.preventDefault();
})

function validiteform(){
let erreur = true;

    if (name.value.trim() == "") {
        document.getElementById('messagename').innerHTML ="Please fill the userName";
        erreur = false;
    }else if (name.value.match(regname)){
        document.getElementById('messagename').innerHTML = "";
      }else{
        document.getElementById('messagename').innerHTML = "user name invalid ";
        erreur = false;
    } 
 
      
    if (email.value == "") {
        document.getElementById('messageemail').innerHTML = "Please fill the Email";
        erreur =  false;
       
    }else if (email.value.match(regemail)){
        document.getElementById('messageemail').innerHTML = "";
      }else{
        document.getElementById('messageemail').innerHTML = "email invalid ";
        erreur = false;
    } 



    if (password.value == "") {
        document.getElementById('messagepassword').innerHTML ="Please fill the password field";
                erreur =  false;
      
    }else if (password.value == name.value) {
        document.getElementById('messagepassword').innerHTML ="Password cant'be your FirstName or LastName"
                erreur =  false;
      
    }else if ((password.value.length <=6)  ||  (password.value.length >=20)) {
        document.getElementById('messagepassword').innerHTML ="user password should be between 6 to 20 characters "
                erreur =  false;
      
            }else{
        document.getElementById('messagepassword').innerHTML =" "
      }


      if (Confirmpassword.value == "") {
        document.getElementById('messageconfpass').innerHTML ="Enter ConfirmPassword"
                erreur =  false;
      
    }else if (password.value!=Confirmpassword.value) {
        document.getElementById('messageconfpass').innerHTML ="Password does'nt Match"
                erreur =  false;

    }else{
        document.getElementById('messageconfpass').innerHTML =""
      }
    
    return erreur;
}
