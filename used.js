function register() {
  document.getElementById("register-form").style.display = "block";
  return false;
}

function checkform()
{
    var f = document.forms["frmRegistration"].elements;
    var cansubmit = true;

    for (var i = 0; i < f.length; i++) {
        if (f[i].value.length == 0) cansubmit = false;
    }

    if(cansubmit)
    document.getElementById("regist").style.display = "block";
    else
    document.getElementById("regist").style.display = "none";
}

function registerIT() {
  $.ajax({
     type: "POST",
     url: "register.php",
     data: $('.frmRegistration').serialize(),
     cache: false,

     success: function(d)
     {
       return true;
     }
  });
}

function editFunc(id)
{
  document.getElementById("register-form").style.display = "block";
  document.getElementById("user-id").value=id;
  $.ajax({
     type: "POST",
     url: "userEdit.php",
     data: 'id='+id,
     dataType: 'json',
     cache: false,

     success: function(dt)
     {
       document.getElementById("user-name").value=dt["name"];
       document.getElementById("user-email").value=dt["email"];
       document.getElementById("user-dob").value=dt["dob"];
       return false;
     }
  });
}

function deleteFunc(id) {
  $.ajax({
     type: "POST",
     url: "delete.php",
     data: "id="+id,
     cache: false,

     success: function()
     {
       var elem = document.getElementById('list'+id);
       elem.parentNode.removeChild(elem);
       return false;
    }
  });
}
