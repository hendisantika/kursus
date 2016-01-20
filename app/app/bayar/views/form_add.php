<link href="<?php echo base_url();?>assets/plugins/parsley/src/parsley.css" rel="stylesheet" />
<script src="<?php echo base_url();?>assets/plugins/parsley/dist/parsley.js"></script>
<script src="<?php echo base_url();?>assets/js/duit.js"></script>
<script>
$(document).ready(function() {
    jQuery("#detilna").hide('');
    jQuery("#nama").autocomplete({
        source: function(req,add){
            jQuery.ajax({
                url:"<?php echo base_url() . 'bayar/get_member/';?>",
                dataType:'json',
                type:'POST',
                data:req,                                                   
                success:function(data){
                    if(data.response=='true'){
                        add(data.message);                              
                    }else{
                        jQuery("#detilna").hide('');
                        $.gritter.add({title:"INFORMASI SISWA !",text: "DATA SISWA TIDAK DITEMUKAN"});return false;
                    }
                },
                error:function(XMLHttpRequest){
                    alert(XMLHttpRequest.responseText);
                }
            })
        },
        minLength:3,
        select: function(event,ui){
            jQuery("#detilna").show('slow');
            jQuery('#nama').val(ui.item.id);
            jQuery('#nama').val(ui.item.nama);
            jQuery('#kode').val(ui.item.kode);
            jQuery('#foto').val(ui.item.foto);
            jQuery('#tipe').val(ui.item.nama_tipe);
            jQuery('#sisa').val(ui.item.sisa);
            jQuery('#sisa').priceFormat({
		        prefix: '',
		        centsSeparator: ',',
		        thousandsSeparator: '.'
		    });     
		    jQuery('#bayar').priceFormat({
		        prefix: '',
		        centsSeparator: ',',
		        thousandsSeparator: '.'
		    });     
            var nama = jQuery('#nama').val();
            var kode = jQuery('#kode').val();
            var foto = jQuery('#foto').val();
            var tipe = jQuery('#tipe').val();
            document.getElementById('nama').focus();
            $.gritter.add({title:"INFORMASI SISWA !",text: "NAMA : " + nama + "<br/>"+"TIPE KURSUS : "+tipe,image:"<?php echo base_url() . 'foto/member/';?>"+foto});return false;
        }
    })
});
function bayar_bro(){
	var sisa = jQuery("#sisa").unmask();
	if(sisa!="0"){
		var bayar = jQuery("#bayar").unmask();
		var sesa = sisa - bayar;
		jQuery("#sisa").val(sesa);
		jQuery('#sisa').priceFormat({
	        prefix: '',
	        centsSeparator: ',',
	        thousandsSeparator: '.'
	    });  
		$.gritter.add({title:"INFORMASI PEMBAYARAN !",text: "DIBAYAR : " + jQuery("#bayar").val()+"<br/>"+"SISA : " + jQuery("#sisa").val()});return false;
	}else{
		$.gritter.add({title:"INFORMASI PEMBAYARAN !",text: "PEMBAYARAN SUDAH LUNAS !"});
		jQuery("#detilna").hide("slow");
		jQuery("#nama").val('');
		jQuery("#sisa").val('');
		jQuery("#bayar").val('');
	}

}
</script>
<div class="row">
    <div class="col-md-12">
		<div class="panel panel-inverse" data-sortable-id="form-validation-2">
		    <div class="panel-heading">
		        <div class="panel-heading-btn">
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
		            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
		        </div>
		        <h4 class="panel-title"><?php echo $halaman;?></h4>
		    </div>
		    <div class="panel-body panel-form">
		        <form class="form-horizontal form-bordered" action="<?php echo base_url();?>bayar/proses_bayar" id="form" method="post" enctype="multipart/form-data" data-parsley-validate="true">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3">Nama Siswa * :</label>
						<div class="col-md-3 col-sm-3">
							<input class="form-control" type="hidden" id="foto" name="foto" data-type="foto"/>
                            <input class="form-control" type="hidden" id="tipe" name="tipe" data-type="tipe"/>
                            <input class="form-control" type="hidden" id="kode" name="kode" data-type="tipe"/>
							<input class="form-control" type="text" id="nama" minlength="1" name="nama" value="<?php echo set_value('nama',isset($default['nama']) ? $default['nama'] : ''); ?>" data-type="nama" placeholder="Masukan Nama Siswa" data-parsley-required="true" data-parsley-minlength="1"/>
						</div>
					</div>
					<div id="detilna">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">Sisa Pembayaran :</label>
							<div class="input-group col-md-3 col-sm-3">
	                            <span class="input-group-addon">RP.</span>
								<input class="form-control" style="text-align:right" readonly="readonly" type="text" id="sisa" minlength="1" name="sisa" value="<?php echo set_value('sisa',isset($default['sisa']) ? $default['sisa'] : ''); ?>" data-type="sisa" data-parsley-required="true" data-parsley-minlength="1"/>
	                            <span class="input-group-addon">.00</span>
	                        </div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3">Bayar * :</label>
							<div class="input-group col-md-3 col-sm-3">
	                            <span class="input-group-addon">RP.</span>
								<input class="form-control" style="text-align:right" type="text" onchange="javascript:bayar_bro()" id="bayar" minlength="1" name="bayar" value="<?php echo set_value('bayar',isset($default['bayar']) ? $default['bayar'] : ''); ?>" data-type="bayar" data-parsley-required="true" data-parsley-minlength="1"/>
	                            <span class="input-group-addon">.00</span>
	                        </div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3"></label>
							<div class="col-md-3 col-sm-3">
								<button type="submit" class="btn btn-success btn-sm"><?php echo $tombolsimpan;?></button>
	                      		<button type="button" onclick="history.go(-1)" class="btn btn-info btn-sm"><?php echo $tombolbatal ; ?></button>
							</div>
						</div>
					</div>
		        </form>
		    </div>
		</div>
	</div>
</div>
