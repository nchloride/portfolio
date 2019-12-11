var useremail = document.querySelector(".emailbox");
var usermessage = document.querySelector(".messagebox");
var form = document.querySelector(".form");
form.addEventListener("submit", sendemail);
function sendemail(e) {
  e.preventDefault();
  var mailformat = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  if (!mailformat.test(useremail.value) || usermessage.value == "") {
    alert("Invalid e-mail");
  } else {
    var xhr = new XMLHttpRequest();
    var emessage = "email=" + useremail.value + "&message=" + usermessage.value;
    xhr.open("POST", "emailajax.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onload = function() {
      alert(this.responseText);
    };
    xhr.send(emessage);
    setTimeout(clear, 1000);
  }
}
function clear() {
  useremail.value = "";
  usermessage.value = "";
}
