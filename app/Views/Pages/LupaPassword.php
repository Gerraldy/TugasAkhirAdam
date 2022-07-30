
<style media="screen">
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
box-sizing: border-box;
}

body {
background: #232222;
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
font-family: 'Montserrat', sans-serif;
height: 100vh;
margin: -20px 0 50px;
}

h1 {
font-weight: bold;
margin: 0;
}

h2 {
text-align: center;
}

p {
font-size: 14px;
font-weight: 100;
line-height: 20px;
letter-spacing: 0.5px;
margin: 20px 0 30px;
}

span {
font-size: 12px;
}

a {
color: #333;
font-size: 14px;
text-decoration: none;
margin: 15px 0;
}

button {
border-radius: 20px;
border: 3px solid #FF4B2B;
background-color: #232222;
color: #FFFFFF;
font-size: 12px;
font-weight: bold;
padding: 12px 45px;
letter-spacing: 1px;
text-transform: uppercase;
transition: transform 80ms ease-in;
}

button:active {
transform: scale(0.95);
}

button:focus {
outline: none;
}

button.ghost {
background-color: transparent;
border-color: #FFFFFF;
}

form {
background-color: #FFFFFF;
align-items: center;
justify-content: center;
height: 100%;
text-align: center;
}

input {
background-color: #eee;
border: none;
padding: 12px 15px;
margin: 8px 0;
width: 100%;
}

.container {
background-color: #fff;
border-radius: 10px;
  box-shadow: 0 14px 28px rgba(0,0,0,0.25),
    0 10px 10px rgba(0,0,0,0.22);
position: relative;
overflow: hidden;
width: 500px;
max-width: 100%;
min-height: 450px;
}

.form-container {
position: absolute;
top: 0;
height: 100%;
transition: all 0.6s ease-in-out;
}

.sign-in-container {
left: 0;
width: 50%;
z-index: 2;
}

.container.right-panel-active .sign-in-container {
transform: translateX(100%);
}

.sign-up-container {
left: 0;
width: 50%;
opacity: 0;
z-index: 1;
}

.container.right-panel-active .sign-up-container {
transform: translateX(100%);
opacity: 1;
z-index: 5;
animation: show 0.6s;
}

@keyframes show {
0%, 49.99% {
  opacity: 0;
  z-index: 1;
}

50%, 100% {
  opacity: 1;
  z-index: 5;
}
}

.overlay-container {
position: absolute;
top: 0;
left: 50%;
width: 50%;
height: 100%;
overflow: hidden;
transition: transform 0.6s ease-in-out;
z-index: 100;
}

.container.right-panel-active .overlay-container{
transform: translateX(-100%);
}

.overlay {
background-color: #232222;
background-repeat: no-repeat;
background-size: cover;
background-position: 0 0;
color: #FFFFFF;
position: relative;
left: -100%;
height: 100%;
width: 200%;
  transform: translateX(0);
transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  transform: translateX(50%);
}

.overlay-panel {
position: absolute;
display: flex;
align-items: center;
justify-content: center;
flex-direction: column;
padding: 0 40px;
text-align: center;
top: 0;
height: 100%;
width: 50%;
transform: translateX(0);
transition: transform 0.6s ease-in-out;
}

.overlay-left {
transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
transform: translateX(0);
}

.overlay-right {
right: 0;
transform: translateX(0);
}

.container.right-panel-active .overlay-right {
transform: translateX(20%);
}

.social-container {
margin: 20px 0;
}

.social-container a {
border: 1px solid #DDDDDD;
border-radius: 50%;
display: inline-flex;
justify-content: center;
align-items: center;
margin: 0 5px;
height: 40px;
width: 40px;
}

</style>


<div class="container" id="container">
	<div class="" style="text-align: center;">
    <a class="navbar-nav" href="<?= base_url('/public') ?>">
      <img src="<?= base_url('/public/gambar/Logo.png') ?>" alt="Avatar" class="avatar" style="width: 150px; border-radius: 10%;">
    </a>
  </div>
  <div class="card">
	<div class="card-body">
		<h3 class="card-title text-center" style="text-align: center;">Reset password</h3>
    <?php
                if (!empty(session()->getFlashdata('success'))) { ?>
                    <div class="alert-success">
                        <?php echo session()->getFlashdata('success'); ?>
                    </div>
                <?php }

                if (!empty(session()->getFlashdata('error'))) { ?>
                    <div class="alert-danger">
                        <?php echo session()->getFlashdata('error'); ?>
                    </div>
                <?php } ?>

      <form class="" action="<?=base_url('public/Email/send_email') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
        <div class="" style="text-align: center;">
          <img src="<?= base_url('/public/gambar/lock.png') ?>" alt="Avatar" class="avatar" style="width: 150px; border-radius: 10%;"><br>
					<label for="exampleInputEmail1">Enter your email address and we will send you a link to reset your password.</label><br><br>
					<input type="email" name="Email" class="form-control form-control-sm" placeholder="Enter your email address"><br><br>
          	<button type="submit" class="btn btn-primary btn-block">Send password reset email</button>
        </div>
      </form>

	</div>
</div>
</div>

<script type="text/javascript">

</script>