function validateform() {
var uname=document.jobportal.uname.value.length;
//var address=document.jobportal.address.value;
//var phone=document.jobportal.phone.value;
var email=document.jobportal.mail.value;
var password=document.jobportal.password.value;
var confirm_password= document.jobportal.confirm_password.value;
if (uname==null || uname==""  ||  email1==null || email1=="" || 
        password==null || password=="" ||  confirm_password==null || confirm_password=="")
                {
                  alert("Please fill all the inputs");
                  return false;
                }
  }

// function validateEmail(mail) {
// var mail=document.jobportal.mail.value;
// var reg = /^\w+([-+.']\ w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*$/
//  if(reg.test(mail) == false) {
//     email_error="Email address required";
//     document.getElementById("email_error").innerHTML= email_error;
//     return false;
// }
// else {
//           email_error="";
//           document.getElementById("email_error").innerHTML= "";
//           return false;                
//         }
//       }
function validateEmail(email) {
var email=document.jobportal.email.value;
var reg = /^\w+([-+.']\ w+)*@\w+([-.]\w+)*.\w+([-.]\w+)*$/
 if(reg.test(email) == false) {
         var email1=document.getElementById("email1").src="unchecked.png";   
        document.getElementById("email1").innerHTML= email1;
    return false;
}
else if(email1 == "") {
        var email1=document.getElementById("email1").src="unchecked.png";   
        document.getElementById("email1").innerHTML= email1;        
}
else{
        var email1=document.getElementById("email1").src="checked.png";   
        document.getElementById("email1").innerHTML= email1; 
}
      }
  

function validateUsername() {
var uname=document.jobportal.uname.value;  
if(uname == "") {
    var username=document.getElementById('username').src="unchecked.png";
    document.getElementById("username").innerHTML= username;         
}
else if(uname.length < 5 ) {
  var username=document.getElementById('username').src="unchecked.png";
  document.getElementById("username").innerHTML= username;
  }
else if(uname.length > 15) {
  var username=document.getElementById('username').src="unchecked.png";
  document.getElementById("username").innerHTML= username;  
  }
    else {
   var username=document.getElementById('username').src="checked.png";
   document.getElementById("username").innerHTML= username; 
    }
      }


function matchPassword() {
  if (document.getElementById('password').value != ""  && document.getElementById('password').value == 
  document.getElementById('confirm_password').value)  
  {
  document.getElementById('message').style.color='green';
  document.getElementById('message').innerHTML = 'matching';
   } 
  else {
    document.getElementById('message').style.color='red';
    document.getElementById('message').innerHTML = 'Passowrds does not match';
          }
  }