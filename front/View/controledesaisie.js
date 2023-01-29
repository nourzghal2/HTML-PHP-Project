let textInput = document.getElementById("zmessage");

let button = document.getElementsById("submit");


function messagesValidation() {
    if (textInput.value.length < 10) {
        textError = " Le message doit compter au minimum 10 caractères.";
        document.getElementById("textEr").innerHTML = textError;
        document.getElementById("submit").setAttribute("disabled", "true");

        return false;
    }else
    {
    document.getElementById("textEr").innerHTML =
        "<p style='color:green'> Correct </p>";
        document.getElementById('submit').removeAttribute("disabled");

    return true;
    }
}

/*let textInput = document.getElementById("message");*/
let name = document.getElementById("name");
//let button = document.getElementsById("submit");

function nameValidation() {
    var letters = /^[A-Za-z]+$/;
    let pseudo = document.getElementById("pseudo"); 
   // document.getElementById('submit').setAttribute('disabled', 'disabled');
   

  if (pseudo.value.length < 3) {
      NameError = " Le nom doit compter au minimum 3 caractères.";
      document.getElementById("nomEr").innerHTML = NameError;
      document.getElementById("seconddiv").setAttribute("hidden", true);
      document.getElementById("thirddiv").setAttribute("hidden", true);
      document.getElementById("fourthdiv").setAttribute("hidden", true);
      document.getElementById("fifthdiv").setAttribute("hidden", true);
      document.getElementById("sixthdiv").setAttribute("hidden", true);


      return false;
  }
  if (!pseudo.value.match(letters)) {
      NameError2 = "Veuillez entrer un nom valid ! (seulement des lettres)";
      lNameValid2 = false;
      document.getElementById("nomEr").innerHTML = NameError2;
      document.getElementById("seconddiv").setAttribute("hidden", true);
      document.getElementById("thirddiv").setAttribute("hidden", true);
      document.getElementById("fourthdiv").setAttribute("hidden", true);
      document.getElementById("fifthdiv").setAttribute("hidden", true);
      document.getElementById("sixthdiv").setAttribute("hidden", true);
      return false;
  }
  document.getElementById("nomEr").innerHTML =
      "<p style='color:green'>Correct</p>";
      Valid= document.getElementById("nomEr").value;
      document.getElementById("seconddiv").removeAttribute("hidden"); 

    
  return true;
  }
  


  function verifyEmail() 
  {
    var regex = /^\S+@\S+\.\S+$/;

    var email = document.getElementById("email").value;
    if(email == "") 
    {
        document.getElementById("email").innerHTML="Please fill in your email.";
       
        document.getElementById("fourthdiv").setAttribute("hidden", true);
        document.getElementById("fifthdiv").setAttribute("hidden", true);
        document.getElementById("sixthdiv").setAttribute("hidden", true);        return false;
    } 
    if(!email.match(regex)) 
    {
        document.getElementById("email").innerHTML= "Please enter a valid email address";
        document.getElementById("fourthdiv").setAttribute("hidden", true);
        document.getElementById("fifthdiv").setAttribute("hidden", true);
        document.getElementById("sixthdiv").setAttribute("hidden", true);      
        return false;
    } 
 
        document.getElementById("email").innerHTML =
        "<p style='color:green'> Correct </p>";  
        document.getElementById("fourthdiv").removeAttribute("hidden"); 


    return true;
    
    

}
  function verifyPassword() {  
    var password= document.getElementById("password").value;  
    //check empty password field  
    if(password== "") {  
       document.getElementById("password").innerHTML = "Fill the password please.";  
    
       document.getElementById("fifthdiv").setAttribute("hidden", true);
       document.getElementById("sixthdiv").setAttribute("hidden", true);
       return false;  
    }  
     
   //minimum password length validation  
    if(password.length < 8) {  
       document.getElementById("password").innerHTML = "Password length must be atleast 8 characters"; 
       
       document.getElementById("fifthdiv").setAttribute("hidden", true);
       document.getElementById("sixthdiv").setAttribute("hidden", true);
       return false;  
    }  
    
  //maximum length of password validation  
    if(password.length > 15) {  
       document.getElementById("password").innerHTML = "Password length must not exceed 15 characters";  
       
       document.getElementById("fifthdiv").setAttribute("hidden", true);
       document.getElementById("sixthdiv").setAttribute("hidden", true);
       return false;  
    } else {  
        document.getElementById("password").innerHTML =
        "<p style='color:green'> Correct </p>";  
        document.getElementById("fifthdiv").removeAttribute("hidden"); 

        
    }  
  }  

  function matchingpasswords()
  {
    var passInput = document.getElementById("password");  
    var cPassInput = document.getElementById("password_retype");

    if (
        passInput.value != cPassInput.value ||
        passInput.value == "" ||
        cPassInput == ""
    ) {
        document.getElementById("password_retype").innerHTML = "mot de passe différent";  
                document.getElementById("sixthdiv").setAttribute("hidden", true)

        return false; 
    } 
   
        document.getElementById("password_retype").innerHTML =
        "<p style='color:green'> Matchy matchy </p>";
        document.getElementById("sixthdiv").removeAttribute("hidden"); 


  }