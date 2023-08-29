<?php echo $this->extend('Layouts/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo $title; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>

<div class="row">
  <div class="col-lg-6">
    <div class="block">
      <div class="block-body">
        <div id="response">

        </div>

        <?php echo form_open('/', ['id' => 'form'], ['id' => "$user->id"]); ?>

        <?php echo $this->include('Users/_form'); ?>

        <div class="form-group mt-5 mb-2">
          <input class="btn btn-danger mr-2" type="submit" id="btn-salvar" value="Salvar">
          <a href="<?php echo site_url("users/show/$user->id"); ?>" class="btn btn-secondary ml-2">Voltar</a>
        </div>

        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>