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
            $('[name=csrf_order_services]').val(response.token);

            if(!response.error) {

              if(response.info) {
                $('#response').html(`<div class="alert alert-info">${response.info}</div>`);

              } else {
                window.location.href = '<?php echo site_url("/users/show/$user->id"); ?>';
              };
            };

            if(response.error) {
              $('#response').html(`<div class="alert alert-danger">${response.error}</div>`);

              if(response.errors) {
                $.each(response.errors, function(key, value) {
                  $('#response').append(`
                    <ul class="list-unstyled">
                      <li class="text-danger">
                        ${value}
                      </li>
                    </ul>
                  `);
                });
              }
            }; 
          },
          
          error: function() {
            alert('Não foi possível processar a solicitação. Por favor entre em contato com o suporte técnico.');
            $('#btn-save').val('Salvar').removeAttr('disabled');
          }
        });
      });

      $('#form').submit(function() {
        $(this).find(':submit').attr('disabled', 'disabled');
      });
    });
  </script>
<?php echo $this->endSection(); ?>