<?php echo $this->extend('Layouts/main'); ?>

<?php echo $this->section('title'); ?>
  <?php echo $title; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('styles'); ?>
  <?php ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('content'); ?>
  <?php echo 'Menu principal'; ?>
<?php echo $this->endSection(); ?>

<?php echo $this->section('scripts'); ?>
  <?php  ?>
<?php echo $this->endSection(); ?>