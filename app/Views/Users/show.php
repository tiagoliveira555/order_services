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
      <h5 class="card-title mt-2"><?php echo esc($user->name); ?></h5>
      <p class="card-text"><?php echo esc($user->email); ?></p>
      <p class="card-text">Criado <?php echo esc($user->created_at); ?></p>
      <p class="card-text">Atualizado <?php echo esc($user->updated_at); ?></p>
      <div class="btn-group">
        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Ações
        </button>
        <div class="dropdown-menu">
          <a class="dropdown-item" href="<?php echo site_url("users/edit/$user->id") ?>">Editar usuário</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Separated link</a>
        </div>
      </div>
      <a href="<?php echo site_url("users") ?>" class="btn btn-secondary ml-2">Voltar</a>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<?php  ?>
<?php echo $this->endSection(); ?>