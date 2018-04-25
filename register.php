<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Register</title>

    <!-- Stylesheets -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"> -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <h4 class="mb-3">Register</h4>
          <form class="needs-validation" role="form" method="POST" action="products/regConfig.php" novalidate>

          <div class="row">
            <!-- firstName -->
            <div class="col-md-6 mb-3">
              <label>First name</label>
              <input type="text"  name="firstName" class="form-control" id="firstName" placeholder="" value="" required>
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>
            <!-- lastName -->
            <div class="col-md-6 mb-3">
              <label for="lastName">Last name</label>
              <input type="text" name="lastName" class="form-control" id="lastName" required>
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>
          </div>

          <!-- username -->
          <div class="mb-3">
            <label for="username">Username</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">@</span>
              </div>
              <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your username is required.
              </div>
            </div>
          </div>

          <!-- password -->
          <div class="mb-3">
            <label for="username">Password</label>
            <div class="input-group">
              <input type="password" name="password"  class="form-control" id="password" onchange = "passwordMatch" pattern="[a-zA-Z0-9]{8,}" placeholder="Password" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your password is required. It should be at least 8 characters.
              </div>
            </div>
          </div>

          <!-- match password -->
          <div class="mb-3">
            <label for="username">Verify Password</label>
            <div class="input-group">
              <input type="password" name="passwordRepeat" class="form-control" id="passwordRepeat" pattern="" placeholder="Verify password" required>
              <div class="invalid-feedback" style="width: 100%;">
                Your password is required. Password does not match.
              </div>
            </div>
          </div>
          <!--  email -->
          <div class="mb-3">
            <label for="email">Email <span class="text-muted">(Optional)</span></label>
            <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com">
            <div class="invalid-feedback">
              Please enter a valid email address for shipping updates.
            </div>
          </div>
          <!-- address -->
          <div class="mb-3">
            <label for="address">Address</label>
            <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
            <div class="invalid-feedback">
              Please enter your shipping address.
            </div>
          </div>
          <!-- address2 -->
          <div class="mb-3">
            <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
            <input type="text" name="address2" class="form-control" id="address2" placeholder="Apartment or suite">
          </div>

          <div class="row">
            <!-- country -->
            <div class="col-md-5 mb-3">
              <label for="country">Country</label>
              <input name="country" type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
            <!-- state -->
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
              <input name="state" type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Please provide a valid state.
              </div>
            </div>
            <!-- zip -->
            <div class="col-md-3 mb-3">
              <label for="zip">Zip</label>
              <input name="zip" type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div>
          </div>
          <hr class="mb-4">
          <button id='checkoutButton' class="btn btn-primary btn-lg btn-block" type="submit" onclick="validatePassword()">Register</button>
  </form>
        </div>
    </div>
  </div>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>  <!--Include the above in your HEAD tag ---------->
  <script>
   // Example starter JavaScript for disabling form submissions if there are invalid fields
   (function() {
     'use strict';

     window.addEventListener('load', function() {
       // Fetch all the forms we want to apply custom Bootstrap validation styles to
       var forms = document.getElementsByClassName('needs-validation');

       // Loop over them and prevent submission
       var validation = Array.prototype.filter.call(forms, function(form) {
         form.addEventListener('submit', function(event) {
           if (form.checkValidity() === false) {
             event.preventDefault();
             event.stopPropagation();
           }
           form.classList.add('was-validated');
         }, false);
       });
     }, false);
   })();</script>
  <script>
  function validatePassword(pwd){
    var pwd = document.getElementById('password').value;
    var pwd2 = document.getElementById('passwordRepeat').value;
    var reg = /^[a-zA-Z0-9]{8,}$/;
    var re = reg.test(pwd);
    var re2 = reg.test(pwd);

    // if (re == true)
    //   $('#checkoutButton').prop('disabled', false);
    // else{
    //   $('#checkoutButton').prop('disabled', true)
    // }
  }
  $(document).ready(function(){
    $('#password').keyup(validatePassword);
  })

  $("#password").change(function(){
    var pattern = $("#password").val();
    $("#passwordRepeat").attr('pattern', pattern);
  });
  </script>


</body>
</html>
