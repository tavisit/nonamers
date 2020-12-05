document.write('\
<div class="form-popup" id="myForm" style="background-color: #000;">\
    <form action="/action_page.php" class="form-container">\
      <h1>Login</h1>\
  \
      <label for="email"><b>Email</b></label>\
      <input type="text" placeholder="Enter Email" name="email" required>\
  \
      <label for="psw"><b>Password</b></label>\
      <input type="password" placeholder="Enter Password" name="psw" required>\
  \
      <button type="submit" class="btn" style = "color:#fff">Login</button>\
      <button type="submit" class="btn cancel" onclick="closeForm()"style = "color:#fff">Close</button>\
    </form>\
  </div>\
\
    \
  \
\
  <div class="form-popup" id="myForm_register" style="background-color: #000;">\
    \
    <form action="/action_page.php" class="form-container">\
      <h1>Register</h1>\
  \
      <label for="email"><b>Email</b></label>\
      <input type="text" placeholder="Enter Email" name="email" required>\
  \
      <label for="psw"><b>Password</b></label>\
      <input type="password" placeholder="Enter Password" name="psw" required>\
\
      <label for="psw"><b>Again Password</b></label>\
      <input type="password" placeholder="Enter Password" name="psw" required>\
\
      <button type="submit" class="btn" style = "color:#fff">Register</button>\
      <button type="submit" class="btn cancel" onclick="closeForm_reg()"style = "color:#fff">Close</button>\
    </form>\
  \
  </div>\
');