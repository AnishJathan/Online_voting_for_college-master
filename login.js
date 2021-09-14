function myFunction() {
    var x = document.getElementById("input");
    if (x.type === "password")
    {
        x.type = "text";
    }
    else
     {
        x.type = "password";
     }
}

function checkPassword()
{
  var x = document.getElementById("password");
  var y = document.getElementById("Confirm-password");
  if(x.type === y.type)
  {

  }
  else {
      alert("Check your password");
  }
}
