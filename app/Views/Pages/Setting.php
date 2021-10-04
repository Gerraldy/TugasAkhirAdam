<?= $this->extend('Layout/Template'); ?>

<?= $this->section('content'); ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <a href="<?=base_url('public/Pages/SettingAkun') ?>">
        <button class="k-button" type="button" name="button">Akun</button>
      </a>
      <a href="<?=base_url('public/Pages/SettingAkun') ?>">
        <button class="k-button" type="button" name="button">Profile</button>
      </a>
      <a href="<?=base_url('public/Pages/SettingAkun') ?>">
        <button class="k-button" type="button" name="button">Password</button>
      </a>
    </div>
  </div>
</div>

<?= $this->endSection();  ?>
