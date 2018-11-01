<div class="box">
				<div class="box-header with-border">
                    <h3 class="box-title">कर्मचारी विवरण</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="staffid" id="staff">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="parent_orgid">सँस्था</label>
					  <select class="form-control" id="orgid" name="orgid">
					  	<option value="">........</option>
					  	 <?php
					  	foreach($parent as $p){?>
					  		<option value="<?php echo $p->orgid; ?>"><?php echo $p->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="employeeno">कर्मचारी नं.</label>
					  <input type="text" name='employeeno' id='employeeno' class="form-control"  >
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
					  <label for="gender">लिङ्ग</label>
					  <select class="form-control" id="gender" name="gender">
					  	<option value="">.......</option>
					  	<option value="1">पुरुष</option>
					  	<option value="2">महिला</option>
					  	<option value="3">अन्य</option>
					  </select>
					</div>
					<div class="form-group">
					  <label for="wardno">जन्म मिति</label>
					  <input type="text" name='wardno' id='wardno' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="vdc">पद</label>
					  <input type="text" name='vdc' id='vdc' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="phone">फोन</label>
					  <input type="text" name='phone' id='phone' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="fax">मोबाइल</label>
					  <input type="text" name='fax' id='fax' class="form-control" >
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
					<!-- <fieldset>
						<h4>बिशेषज्ञता</h4>
					<div class="row">
						<div class="col-md-3 col-xs-3">
					<div class="form-group">
					  <label for="approved">अनुमोदित</label>
					  <select class="form-control" id="approved" name="approved">
                                            <option value="1" selected="selected">हो</option>
                                            <option value="0" >होईन</option>
                                          </select>
					</div>
					</div>
					<div class="col-md-3 col-xs-3">
					<div class="form-group">
					  <label for="disabled">निलम्वित्</label>
					  <select class="form-control" id="disabled" name="disabled">                                    
                                  
                                  <option value="1" >हो</option>
                                  <option value="0" selected="selected" >होईन</option>
                                                 
                        </select>
                    </div>
					</div>
					<div class="col-md-3 col-xs-3">
					<div class="form-group">
					  <label for="remarks">कैफियत</label>
					  <input type="text" name='remarks' id='remarks' class="form-control" >
                    </div>
					</div>
					</div>
					</fieldset> -->
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
    var url = "staff-info";
    if( $('#staffid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#staffid').val();
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