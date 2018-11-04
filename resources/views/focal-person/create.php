<div id="spec-create" class="box">
				<div class="box-header with-border">
                    <h3 class="box-title">मूख्य व्यक्ति</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="fpersonid" id="fpersonid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="corgid">सँस्था</label>
					  <select class="form-control" id="corgid" name="corgid">
					  	<option value="">........</option>
					  	 <?php
					  	foreach($clientorg as $co){?>
					  		<option value="<?php echo $co->corgid; ?>"><?php echo $co->namenp; ?></option>
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
					  <label for="post">पद</label>
					  <input type="text" name='post' id='post' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="phone">फोन</label>
					  <input type="text" name='phone' id='phone' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="mobile">मोबाइल</label>
					  <input type="text" name='mobile' id='mobile' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="email">ईमेल</label>
					  <input type="text" name='email' id='email' class="form-control" >
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
				</div>
				<div class="box-footer" style="width:200%;">
					<button type="submit" class="btn btn-primary">Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>
<script>
function formSubmit(e){
    e.preventDefault();
    var url = "focal-person";
    if( $('#fpersonid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#fpersonid').val();
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