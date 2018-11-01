<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">सेवा</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="pid" id="pid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="pcid">सेवाको वर्ग</label>
					  <select class="form-control" id="pcid" name="pcid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($proCat as $p){?>
					  		<option value="<?php echo $p->pcid; ?>"><?php echo $p->name; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="product_name">सेवा</label>
					  <input type="text" name='product_name' id='product_name' class="form-control"  >
					</div>
				  	<div class="form-group">
					  <label for="description">वर्णन</label>
					  <input type="text" name='description' id='description' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="approved">अनुमोदित</label>
					  <select class="form-control" id="approved" name="approved">
                                            <option value="1" selected="selected">हो</option>
                                            <option value="0" >होईन</option>
                                          </select>
					</div>
					<div class="form-group">
					  <label for="disabled">निलम्वित्</label>
					  <select class="form-control" id="disabled" name="disabled">                                    
                                  
                                  <option value="1" >हो</option>
                                  <option value="0" selected="selected" >होईन</option>
                                                 
                        </select>
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
    var url = "product";
    if( $('#pid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#pid').val();
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