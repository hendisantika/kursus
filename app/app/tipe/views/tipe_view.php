<script src="<?php echo base_url();?>assets/js/table-manage-responsive.demo.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assets/plugins/DataTables/js/dataTables.responsive.js"></script>
<script src="<?php echo base_url();?>assets/js/table-manage-responsive.demo.min.js"></script>
<script src="<?php echo base_url();?>assets/js/autoNumeric.js"></script>
<script src="<?php echo base_url();?>assets/js/tipe.js"></script>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                <a href="<?php echo base_url();?><?php echo $link;?>/add" title="Tambah <?php echo $halaman;?>" class="btn btn-primary btn-xs m-r-5">Tambah Data</a>
                </div>
                <h4 class="panel-title"><?php echo $halaman;?></h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="data-table" class="table table-striped table-bordered nowrap" width="100%">
                        <thead>
                            <tr>
                                <th style="text-align:center" width="1%">No.</th>
                                <th style="text-align:center" width="20">Jenis</th>
                                <th style="text-align:center" width="50">Tipe</th>
                                <th style="text-align:center" width="10">Hrg Pendaftaran</th>
                                <th style="text-align:center" width="10">Hrg Pendidikan</th>
                                <th style="text-align:center" width="10">Durasi</th>
                                <th style="text-align:center" width="10">Pertemuan</th>
                                <th style="text-align:center" width="10">Expired</th>
                                <th style="text-align:center" width="13%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>