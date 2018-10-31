<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">सँस्था</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="orgid" id="orgid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="parent_orgid">माउँ सँस्था</label>
					  <select class="form-control" id="parent_orgid" name="parent_orgid">
					  	<option value="0">None</option>
					  	 <?php
					  	foreach($parent as $p){?>
					  		<option value="<?php echo $p->orgid; ?>"><?php echo $p->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="code">कोड</label>
					  <input type="text" name='code' id='code' class="form-control"  >
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
					  <label for="orgtypeid">सँस्थाको प्रकार</label>
					  <select class="form-control" id="orgtypeid" name="orgtypeid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($orgtype as $ot){?>
					  		<option value="<?php echo $ot->orgtypeid; ?>"><?php echo $ot->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="districtid">जिल्ला</label>
					  <select class="form-control" id="districtid" name="districtid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($district as $d){?>
					  		<option value="<?php echo $d->did; ?>"><?php echo $d->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="vdc">गा वि स</label>
					  <input type="text" name='vdc' id='vdc' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="wardno">वडा नं.</label>
					  <input type="text" name='wardno' id='wardno' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="street">Street</label>
					  <input type="text" name='street' id='street' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="houseno">घर नम्वर</label>
					  <input type="text" name='houseno' id='houseno' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="latitude">अक्षांश</label>
					  <input type="text" name='latitude' id='latitude' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="longitude">देशान्तर</label>
					  <input type="text" name='longitude' id='longitude' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="phone">फोन</label>
					  <input type="text" name='phone' id='phone' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="fax">फ्याक्स</label>
					  <input type="text" name='fax' id='fax' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="email">ईमेल</label>
					  <input type="text" name='email' id='email' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="website">वेभसाइट</label>
					  <input type="text" name='website' id='website' class="form-control" >
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
    var url = "organization";
    if( $('#orgid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#orgid').val();
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