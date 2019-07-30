</div> 
</div>
</body>
<footer style="background-color: #161616;color:white;text-align: right; padding: 10px; font-size:10px;" >
	Realizado por: Chambi Ajata Adimer Paul <br>Lopez Gutierrez Alejandro Fernando <br>
  Cel: 69603027 - 73822069
</footer>
  <script src="<?=base_url('assets/js');?>/jquery.min.js"></script>
  <script src="<?=base_url('assets/js');?>/jquery-ui.js"></script>
  <script src="<?=base_url('assets/js');?>/popper.min.js"></script>
  <script src="<?=base_url('assets/js');?>/bootstrap.min.js"></script>
  <script src="<?=base_url('assets/js');?>/bootstrap-toggle.min.js"></script>
<script src="<?=base_url('assets/js');?>/bootstrap-select.js"></script>
<script src="<?=base_url('assets/js');?>/moment.min.js"></script>
<script src="<?=base_url('assets/js');?>/daterangepicker.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js');?>/Chart.min.js"></script>
<script type="text/javascript" src="<?=base_url('assets/js');?>/jquery.canvasjs.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
  <?=$js?>
  <script src="<?=base_url('assets/js');?>/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/js');?>/dataTables.buttons.min.js"></script>
<script src="<?=base_url('assets/js');?>/buttons.flash.min.js"></script>
<script src="<?=base_url('assets/js');?>/jszip.min.js"></script>
<script src="<?=base_url('assets/js');?>/pdfmake.min.js"></script>
<script src="<?=base_url('assets/js');?>/vfs_fonts.js"></script>
<script src="<?=base_url('assets/js');?>/buttons.html5.min.js"></script>
<script src="<?=base_url('assets/js');?>/buttons.print.min.js"></script>
<script src="<?=base_url('assets/js');?>/jquery.multi-select.js"></script>

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