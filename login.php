<?php
/* Template Name: Login */
get_header();
?>

<section class="banner" style="background-image:url(https://placehold.co/1920x300)" >
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
    </ol>
    <h2>Contact Us</h2>
  </div>
</section>
<section class="gap">
   <div class="container">
      <div class="row">
        <div class="col-lg-6" >
          <div class="box login">
            <h3>Log In Your Account</h3>
            <form>
              <input type="email" name="email" placeholder="Username or email address">
              <input type="password" name="password" placeholder="Password">
              <div class="remember">
                <div class="first">
                  <input type="checkbox" name="checkbox" id="checkbox">
                  <label for="checkbox">Remember me</label>
                </div>
                <div class="second">
                  <a href="javascript:void(0)">Forget a Password?</a>
                </div>
              </div>
              <button type="submit" class="btn"><span>Login</span></button>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="box register">
            <div class="parallax" style="background-image: url(assets/img/patron.jpg)"></div>
            <h3>Log In Your Account</h3>
            <form>
              <input type="text" name="text" placeholder="Complete Name">
              <input type="email" name="email" placeholder="Username or email address">
              <input type="password" name="password" placeholder="Password">
              <p>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our privacy policy.</p>
              <button type="submit" class="btn two"><span>Register</span></button>
            </form>
          </div>
        </div>
      </div>
   </div>
</section>

<?php
get_footer();
?>