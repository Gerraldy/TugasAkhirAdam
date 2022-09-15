<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dark Mode</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@200;600&family=Orelega+One&family=Prompt:wght@100&display=swap"
      rel="stylesheet"
    />
    <!-- <link rel="stylesheet" href="styledark.css" />
    <link rel="stylesheet" href="dark.css" /> -->
    <link rel="stylesheet" href="<?= base_url('public/darkmode/styledark.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('public/darkmode/dark.css'); ?>">
    <!-- Masukan defer jika ingin taruh dih atas </head> -->
    <!-- <script src="scriptdark.js" defer></script> -->
    <script src="<?= base_url('public/darkmode/scriptdark.js'); ?>" defer></script>
  </head>
  <body>
    <nav>
      <div class="logo">YANSAAN</div>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a id="dark-btn">Dark Mode</a></li>
      </ul>
    </nav>
    <section>
      <div class="center">
        <h1>Ini merupakan contoh Dark Mode</h1>
        <h5>Yare Yare Daze...</h5>
      </div>
    </section>
  </body>
</html>
