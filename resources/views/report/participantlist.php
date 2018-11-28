<?php if(!request()->ajax()):
    include(resource_path().'/views/header.php');
    include(resource_path().'/views/left-menu.php');
 endif; ?>
  <style>
 #first-content-section{
 	padding-top:8%;
 	padding-left:10%;
 	margin-left:20%;

 }
 #form label{
 	width:25%;
 	float:left;
 }
 #form select,#form input{
 	float:right;
 }
 #form #download{
 	float:left;
 	width:5px !important;
 }
 .download{
 	padding-left:20px;
 	padding-top:10px;
 }
 /*.header{
 	background:white;
 	color:black;
 	padding:5px;
 }*/
</style>
	<div id="first-content-section" class="col-md-7">
		<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">सहभागीको सूची</h3>
				</div>
				<form role="form" target="_blank" action="<?php echo url('report/search-participant-list');?>" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="pid" id="pid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="orgid">कार्यालय</label>
					  <select class="form-control" id="orgid" name="orgid">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($organization as $orgn){?>
					  		<option value="<?php echo $orgn->orgid;?>"><?php echo $orgn->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="product_type">सेवाको प्रकार </label>
					  <select class="form-control" id="product_type" name="product_type">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($protype as $pt){?>
					  		<option value="<?php echo $pt->ptid; ?>"><?php echo $pt->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="product_cat">सेवाको वर्ग</label>
					  <select class="form-control" id="product_cat" name="product_cat">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($proCategory as $pc){?>
					  		<option value="<?php echo $pc->pcid; ?>"><?php echo $pc->name; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="product">सेवा</label>
					  <select class="form-control" id="product" name="product">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($product as $pro){?>
					  		<option value="<?php echo $pro->pid; ?>"><?php echo $pro->product_name; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="teacher">दिक्षक</label>
					  <select class="form-control" id="teacher" name="teacher">
					  	<option value="">.......</option>
					  	 <?php
					  	foreach($staff as $s){?>
					  		<option value="<?php echo $s->staffid; ?>"><?php echo $s->namenp; ?></option>
					  <?php } ?> 
					  </select>
					</div>
				  	<div class="form-group">
					  <label for="start_date">Date From</label>
					  <input type="text" name='start_date' id='start_date' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="end_date">Date To</label>
					  <input type="text" name='end_date' id='end_date' class="form-control" >
					</div>
					<div class="download form-group">
						<label class="text-center" for="download" style="width:50% !important;">Download in excel</label>
						<input type="checkbox" name="download" id ="download" class="pull-left"/>
					</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				 	<button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
				</div>
				</form>
			  </div>
	</div>
<script>
// function formSubmit(e){
//     e.preventDefault();
//     var url = "product";
//     if( $('#pid').val()==""){
//         var formData = $("#form").serialize();
//     }else{
//        url += "/"+ $('#pid').val();
// 	var formData = $("#form").serialize()+'&_method=PUT';
//     }
//     var xhr = submitFormAjax(url,formData);
//     xhr.done(function(resp){
//         resetForm($('#form'));
//         table();
//         toast(resp);
//     }).fail(function(reason){
//     	var rsp = reason.responseJSON;
//     	console.log(rsp);
//         toast(rsp);
//     });
// }
NepDatePicker.createCalendar(document.getElementById('start_date'));
NepDatePicker.createCalendar(document.getElementById('end_date'));
</script>
<?php if(!request()->ajax()):
 include(resource_path().'/views/footer.php');
endif;?>