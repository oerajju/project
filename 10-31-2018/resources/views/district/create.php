<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">जिल्ला</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="did" id="did">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="district_thm">क्षेत्र</label>
					  <select class="form-control" id="district_thm" name="district_thm">
					  	<option value="">.......</option>
					  	<option value="T">Terai</option>
					  	<option value="H">Hills</option>
					  	<option value="M">Moutain</option> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="zoneid">अञ्चल</label>
					  <select class="form-control" id="zoneid" name="zoneid">
					  <option value="">.......</option>  
					  <?php
					  	foreach($zone as $c){?>
					  		<option value="<?php echo $c->zid; ?>"><?php echo $c->namenp; ?></option>
					  <?php } ?>                                  
                        </select>
					</div>
					<div class="form-group">
					  <label for="namenp">नाम [नेपाली]</label>
					  <input type="text" name='namenp' id='namenp' class="form-control"  >
					</div>
				  	<div class="form-group">
					  <label for="nameen">Name[English]</label>
					  <input type="text" name='nameen' id='nameen' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="code">कोड</label>
					  <input type="text" name='code' id='code' class="form-control"  >
					</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>
<script>
function formSubmit(e){
    e.preventDefault();
    var url = "district";
    if( $('#did').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#did').val();
	var formData = $("#form").serialize()+'&_method=PUT';
    }
    var xhr = submitFormAjax(url,formData);
    xhr.done(function(resp){
        resetForm($('#form'));
        table();
        toast(resp);
    }).fail(function(reason){
    	var rsp = reason.responseJSON;
    	console.log(rsp);
        toast(rsp);
    });
}
</script>