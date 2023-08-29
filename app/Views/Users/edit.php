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
          <input class="btn btn-danger mr-2 btn-sm" type="submit" id="btn-save" value="Salvar">
          <a href="<?php echo site_url("users/show/$user->id"); ?>" class="btn btn-sm btn-secondary ml-2">Voltar</a>
        </div>

        <?php echo form_close(); ?>

      </div>
    </div>
  </div>
</div>

<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
  <script>
    $(document).ready(function(){
      $('#form').on('submit', function(e){
        e.preventDefault();
        $.ajax({
          type: 'POST',
          url: '<?php echo site_url('users/update'); ?>',
          data: new FormData(this),
          dataType: 'json',
          contentType: false,
          cache: false,
          processData: false,
          beforeSend: function(){
            $('#response').html('');
            $('#btn-save').val('Por favor aguarde...');
          },
          success: function(response) {
            $('#btn-save').val('Salvar').removeAttr('disabled');
          }
        });
      });
    });
  </script>
<?php echo $this->endSection(); ?>