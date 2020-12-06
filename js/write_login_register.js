document.write('\
<div class="form-popup" id="myForm" style="background-color: #000;">\
    <form action="./include/login.inc.php" class="form-container" method="POST">\
      <h1>Login</h1>\
  \
      <label for="email"><b>Email</b></label>\
      <input type="text" placeholder="Email" name="uid" required>\
  \
      <label for="psw"><b>Password</b></label>\
      <input type="password" placeholder="Parola " name="psw" required>\
  \
      <input type="submit" class="btn" style = "color:#fff" name="submit" value="Login">\
      <button type="submit" class="btn cancel" onclick="closeForm()"style = "color:#fff">Close</button>\
    </form>\
  </div>\
\
    \
  \
\
  <div class="form-popup" id="myForm_register" style="background-color: #000;">\
    \
    <form action="./include/signup.inc.php" class="form-container" method="POST">\
      <h1>Register</h1>\
  \
      <label for="first"><b>Prenume</b></label>\
      <input type="text" placeholder="prenume" name="first" required>\
  \
    \
      <label for="email"><b>Nume</b></label>\
      <input type="text" placeholder="Nume" name="last" required>\
  \
      <label for="email"><b>Email</b></label>\
      <input type="text" placeholder="Email" name="email" required>\
  \
      <label for="email"><b>Username</b></label>\
      <input type="text" placeholder="User" name="uid" required>\
  \
      <label for="psw"><b>Parola</b></label>\
      <input type="password" placeholder="Parola" name="psw" required>\
\
      <label for="psw"><b>Validare</b></label>\
      <input type="password" placeholder="Parola" name="psw2" required>\
\
      <input type="submit" class="btn" style = "color:#fff" name="submit" value ="Register">\
      <button type="submit" class="btn cancel" onclick="closeForm_reg()"style = "color:#fff">Close</button>\
    </form>\
  \
  </div>\
');