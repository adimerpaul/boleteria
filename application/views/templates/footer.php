</div> 
</div>
</body>
<footer style="background-color: #161616;color:white;text-align: right; padding: 10px; font-size:10px;" >
	Realizado por: Alejandro Lopez Gutierrez
</footer>
  <script src="<?=base_url('assets/js');?>/jquery.min.js"></script>
  <script src="<?=base_url('assets/js');?>/jquery-ui.js"></script>
  <script src="<?=base_url('assets/js');?>/popper.min.js"></script>
  <script src="<?=base_url('assets/js');?>/bootstrap.min.js"></script>
  <script src="<?=base_url('assets/js');?>/bootstrap-toggle.min.js"></script>
<script src="<?=base_url('assets/js');?>/moment.min.js"></script>
<script src="<?=base_url('assets/js');?>/daterangepicker.js"></script>

  <?=$js?>
  <script src="<?=base_url('assets/js');?>/jquery.dataTables.min.js"></script>
  <script>
  $(document).ready(function() {
    $('#example').DataTable(
        {
            "language": { "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"}    
        }
    );
    } );
</script>

</html>