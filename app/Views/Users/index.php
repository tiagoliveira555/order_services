<?php echo $this->extend('Layouts/main'); ?>

<?php echo $this->section('title'); ?>
<?php echo $title; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('styles'); ?>
<link href="<?php echo site_url('assets/'); ?>DataTables/datatables.min.css" rel="stylesheet">
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
<div class="row">
  <div class="col-lg-12">
    <div class="block">
      <div class="table-responsive">
        <table id="ajaxTable" class="table table-striped table-sm" style="width: 100%;">
          <thead>
            <tr>
              <th>Imagem</th>
              <th>Nome</th>
              <th>E-mail</th>
              <th>Situação</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
<script src="<?php echo site_url('assets/'); ?>DataTables/datatables.min.js"></script>
<script>
new DataTable('#ajaxTable', {
  ajax: 'users/getusers',
  columns: [
      { data: 'image' },
      { data: 'name' },
      { data: 'email' },
      { data: 'active' }
  ]
});
</script>
<?php echo $this->endSection(); ?>