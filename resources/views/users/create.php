<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">प्रयोगकर्ता थप्नुहोस्</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="userid" id="userid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="parent_orgid">कार्यालय</label>
					  <select class="form-control" id="orgid" name="orgid">
					  	<option value="0">None</option>
					  	 <?php
					  	foreach($parent as $p){?>
					  		<option value="<?php echo $p->orgid; ?>"><?php echo $p->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="empid">कर्मचारी</label>
					  <select class="form-control" id="empid" name="empid">
					  	<option value="0">None</option>
					  	 <?php
					  	foreach($emp as $e){?>
					  		<option value="<?php echo $e->staffid; ?>"><?php echo $e->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="mobile">मोबाइल</label>
					  <input type="text" name='mobile' id='mobile' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="username">Username</label>
					  <input type="text" name='username' id='username' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="password">Password</label>
					  <input type="password" name='password' id='password' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="usertypeid">प्रयोगकर्ताको प्रकार</label>
					  <select class="form-control" id="usertypeid" name="usertypeid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($usertype as $ut){?>
					  		<option value="<?php echo $ut->utid; ?>"><?php echo $ut->nameen; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="status">Status</label>
					  <select class="form-control" id="status" name="status">
                                            <option value="1" selected="selected">चालु</option>
                                            <option value="0" >चालु नभएको</option>
                                          </select>
					</div>
					<div class="form-group">
					  <label for="send_sms">Send SMS</label>
					  <select class="form-control" id="send_sms" name="send_sms">                                    
                                  
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
    var url = "users";
    if( $('#userid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#userid').val();
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