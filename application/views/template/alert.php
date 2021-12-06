<!-- ALERT -->
<?php if ($this->session->flashdata('error')) { ?>
<script>
  Swal.fire({
    text: '<?php echo $this->session->flashdata('error');?>',
    icon: 'info',
  })

</script>
<?php }?>

<?php if ($this->session->flashdata('warning')) { ?>
<script>
  Swal.fire({
    text: '<?php echo $this->session->flashdata('warning');?>',
    icon: 'warning',
  })

</script>
<?php }?>

<?php if ($this->session->flashdata('success')) { ?>
<script>
  Swal.fire({
    text: '<?php echo $this->session->flashdata('success');?>',
    icon: 'success',
  })

</script>
<?php }?>