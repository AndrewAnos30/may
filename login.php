
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/material-icons@1.13.12/iconfont/material-icons.min.css">
</head>

<body>
  <nav class="navbar">
    <div class="container">
      <div class="row justify-content-between align-items-center">
        <input type="checkbox" name="" id="click">
        <label for="click" class="menu-btn">
          <i class="material-icons">menu</i>
        </label>
      </div>
    </div>
  </nav>

  <section>
    <div class="container">
      <div class="row full-screen align-items-center">
        <div class="left">
          <img src="image/pcplogo1.png" alt="logo of pcp" />
          <img src="image/banner.jpg" alt="logo of pcp" />
          <div class="social-media">
            <a href="https://www.facebook.com/pcpofficialpage/"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://x.com/pcp1953"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.instagram.com/philippinecollegeofphysicians/"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://www.youtube.com/@philippinecollegeofphysicians"><i class="fa-brands fa-youtube"></i></a>
            <a href="https://www.linkedin.com/company/philippine-college-of-physicians/"><i class="fa-brands fa-linkedin-in"></i></a>
          </div>
        </div>
        <div class="right">
          <div class="form">
            <div class="text-center">
              <h6><span>DOCTOR</span><span>STAFF</span></h6>
              <input type="checkbox" class="checkbox" id="reg-log">
              <label for="reg-log"></label>
              <div class="card-3d-wrap">
                <div class="card-3d-wrapper">
                  <div class="card-front">
                    <div class="center-wrap">
                      <h4 class="heading">Log In</h4>
                      <form action="memberlogin.php" method="POST">
                        <div class="form-group">
                          <input type="text" id="uid" name="uid" placeholder="Enter QR ID or UID" oninput="validateUID()" required>
                        </div>

                        <!-- Hidden input to identify user type as 'member' -->
                        <input type="hidden" name="user_type" value="member">

                        <!-- Submit button -->
                        <button type="submit" class="btn">Submit</button>
                      </form>
                      <p class="text-center"><a href="#" class="link">Forgot your UID?</a></p>
                    </div>
                  </div>

                  <div class="card-back">
                    <div class="center-wrap">
                      <h4 class="heading">Log In</h4>
                      <form action="adminlogin.php" method="POST">
                        <div class="form-group">
                          <input type="text" name="UID" class="form-style" placeholder="Enter UID" required>
                          <i class="input-icon material-icons">perm_identity</i>
                        </div>

                        <div class="form-group">
                          <input type="password" name="password" class="form-style" placeholder="Enter Password" required>
                          <i class="input-icon material-icons">lock</i>
                        </div>

                        <button type="submit" class="btn">Login</button>
                        <?php 
                        // Display error if any
                        if (isset($error)) {
                          echo "<p class='error'>$error</p>";
                        }
                        ?>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script>
    function validateUID() {
      const uidInput = document.getElementById('uid');
      let uidValue = uidInput.value;

      // Remove any non-digit characters
      uidValue = uidValue.replace(/\D/g, '');

      // Limit to 11 characters
      if (uidValue.length > 11) {
          uidValue = uidValue.slice(0, 11);
      }

      uidInput.value = uidValue;
    }
  </script>
</body>

<footer></footer>

</html>
