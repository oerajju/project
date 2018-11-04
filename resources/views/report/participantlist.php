<?php if(!request()->ajax()):
    include(resource_path().'/views/header.php');
    include(resource_path().'/views/left-menu.php');
 endif; ?>
	<div id="first-content-section" class="col-md-12"></div>
		<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">कर्मचारी सूचि</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="pid" id="pid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="orgid">कार्यालय</label>
					  <select class="form-control" id="orgid" name="orgid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($proCat as $p){?>
					  		<option value="<?php echo $p->pcid; ?>"><?php echo $p->name; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="post">पद</label>
					  <select class="form-control" id="post" name="post">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($proCat as $p){?>
					  		<option value="<?php echo $p->pcid; ?>"><?php echo $p->name; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="gender">लिङ्ग</label>
					  <select class="form-control" id="gender" name="gender">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($proCat as $p){?>
					  		<option value="<?php echo $p->pcid; ?>"><?php echo $p->name; ?></option>
					  <?php } ?> 
					  </select>
					</div>
				  	<div class="form-group">
					  <label for="description">नाम</label>
					  <input type="text" name='description' id='description' class="form-control" >
					</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>
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
<?php if(!request()->ajax()):
 include(resource_path().'/views/footer.php');
endif;?>