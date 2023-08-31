<?php if (session()->has('success')) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Tudo certo!</strong> <?php echo session('success') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if (session()->has('attention')) : ?>
  <div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong>Informação!</strong> <?php echo session('attention') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if (session()->has('error')) : ?>
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> <?php echo session('error') ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
<?php endif; ?>

<?php if (session()->has('errors')) : ?>
  <ul>
    <?php foreach ($errors as $error) : ?>
      <li class="text-danger"><?php echo $error; ?></li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>