<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">अञ्चल</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="zid" id="zid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="disabled">क्षेत्र</label>
					  <select class="form-control" id="regionid" name="regionid">
					  <option value="">.......</option>  
					  <?php
					  	foreach($region as $c){?>
					  		<option value="<?php echo $c->rid; ?>"><?php echo $c->namenp; ?></option>
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
    var url = "zone";
    if( $('#zid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#zid').val();
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