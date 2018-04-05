function validateform() {
var uname=document.jobportal.uname.value.length;
//var address=document.jobportal.address.value;
//var phone=document.jobportal.phone.value;
var email=document.jobportal.email1.value;
var password=document.jobportal.password.value;
var confirm_password= document.jobportal.confirm_password.value;
if (uname==null || uname=="" ||  email1==null || email1=="" || 
        password==null || password=="" ||  confirm_password==null || confirm_password=="")
                {
                  alert("Please fill all the details");
                  return false;
                }
  }

function validateEmail(email) {
var email=document.jobportal.email.value;
var reg=/^([A-Za-z0-9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z0-9_\-\.]){2,4}$/;
//var reg = /^([A-Za-z0_9_\-\.]){1,}\@([A-Za-z0-9_\-\.]){1,}\.([A-Za-z0-9_\-\.]){2,4}$/;
 if(reg.test(email) == false) {
         var email1=document.getElementById("email1").src="/jobportal/images/unchecked.png";   
        document.getElementById("email1").innerHTML= email1;
    return false;
}
else if(email1 == "") {
        var email1=document.getElementById("email1").src="/jobportal/images/unchecked.png";   
        document.getElementById("email1").innerHTML= email1;        
}
else{
        var email1=document.getElementById("email1").src="/jobportal/images/checked.png";   
        document.getElementById("email1").innerHTML= email1; 
}
      }
  

function validateUsername() {
var uname=document.jobportal.uname.value;  
if(uname == "") {
    var username=document.getElementById('username').src="/jobportal/images/unchecked.png";
    document.getElementById("username").innerHTML= username;         
}
else if(uname.length <  4 ) {
  var username=document.getElementById('username').src="/jobportal/images/unchecked.png";
  document.getElementById("username").innerHTML= username;
  }
else if(uname.length > 15) {
  var username=document.getElementById('username').src="/jobportal/images/unchecked.png";
  document.getElementById("username").innerHTML= username;  
  }
    else {
   var username=document.getElementById('username').src="/jobportal/images/checked.png";
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