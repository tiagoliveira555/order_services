<?php echo $this->extend('Layouts/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo $title; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('styles'); ?>
<?php ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="row">
  <div class="col-lg-4">
    <div class="block">
      <div class="text-center">
        <?php if ($user->image == null) : ?>
          <img class="card-img-top" src="<?php echo site_url('assets/img/user-image-default.png') ?>" alt="User Image Dafault" style="width: 90%;">
        <?php else : ?>
          <img class="card-img-top" src="<?php echo site_url("users/image/$user->image") ?>" alt="<?php echo esc($user->name); ?>" style="width: 90%;">
        <?php endif; ?>
        <a href="<?php echo site_url("users/imageedit/$user->id") ?>" class="btn btn-outline-primary btn-sm mt-3">Alterar imagem</a>
      </div>
      <hr class="border-secondary">
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<?php  ?>
<?php echo $this->endSection(); ?>