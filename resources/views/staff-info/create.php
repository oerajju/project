<style type="text/css">
	#spec-fieldset .form-group label{
		width:30%;
	}
	#spec-fieldset .form-group input,#spec-fieldset .form-group select{
		width:70% !important;
	}
	#spec-fieldset .but{
		float:right;
	}
	#spec-div{
		min-height: 200px;
		border: 1px solid black;
		padding: 2px;
		border-top: 0px;
		background:#FFF;
	}
	#spec-create{
		background:#ecf0f5b3;
	}
	.spec-fieldset-div{
		width: 200% !important;
		margin-top: 15%;
		background: #ecf0f5;
	}
</style>
<div id="spec-create" class="box">
				<div class="box-header with-border">
                    <h3 class="box-title">कर्मचारी विवरण</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="staffid" id="staffid">
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
					  <label for="dob">जन्म मिति</label>
					  <input type="text" name='dob' id='dob' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="postid">पद</label>
					  <select class="form-control" id="postid" name="posid">
					  	<option value="">........</option>
					  	 <?php
					  	foreach($post as $p){?>
					  		<option value="<?php echo $p->pid; ?>"><?php echo $p->namenp; ?></option>
					  <?php } ?> 
					  </select>
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
					<div class="spec-fieldset-div">
					<fieldset id="spec-fieldset">
						<legend>बिशेषज्ञता</legend>
					<div class="row">
						<div class="col-md-3 col-sm-3">
					<div class="form-group">
					  <label for="productid">सेवा</label>
					  <select class="form-control" id="productid" name="productid">
					  		<option value="">.........</option>
					  		<?php foreach($product as $p){ ?>
					  			<option value="<?php echo $p->pid;?>"><?php echo $p->product_name
								; ?></option>
							<?php } ?>    
                                          </select>
					</div>
					</div>
					<div class="col-md-3 col-sm-3">
					<div class="form-group">
						<label for="expertid">बिशेषज्ञता</label>
						<select class="form-control" id="expertid" name="expertid">      
					  		<option value="" >.........</option>
					  		<?php foreach($specialization as $s){ ?>
					  			<option value="<?php echo $s->etid;?>"><?php echo $s->namenp
								; ?></option>
							<?php } ?>           
                        </select>
                    </div>
					</div>
					<div class="col-md-3 col-sm-3">
					<div class="form-group">
					  <label for="remarks">कैफियत</label>
					  <input type="text" name='remarks' id='remarks' class="form-control" >
                    </div>
					</div>
					<div class="col-md-3 col-sm-3">
					<div class="but form-group">
					  <button type="button" class="btn btn-success" onClick="specFormSubmit(event)"><i class="fa fa-plus"></i> थप्नुहोस्</button>
                    </div>
					</div>
					</div>
					<div id="spec-div" class="box-body">
                            <table id="spec-table" class="table table-bordered">
                                <tr style="background:#A4BED4;">
                                  <th>क्र सं</th>
                                  <th>सेवा</th>
                                  <th>बिशेषज्ञता</th>
                                  <th>कैफियत</th>
                                  <th>कार्यहरु</th>
                                </tr>
							  
                                </table>
                        </div>
					</fieldset>
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
function specFormSubmit(e){
    var formData = {productid: $("#productid").val(),expertid: $("#expertid").val(),remarks: $("#remarks").val(),_token: '<?php echo csrf_token();?>'};
    var url = "staff-info/staff-spec";
    console.log(formData);
    var xhr = ajaxPostObj(url,formData);
    xhr.done(function(resp){
    	addSpecRow(resp);
    	console.log(resp);
    }).fail(function(reason){
    	var rsp = reason.responseJSON;
    	console.log(rsp);
        toast(rsp);
    });
}
function addSpecRow(resp){
	var html = "<tr id='spec"+resp.id+"'><td>1</td><td>"+resp['product']+"</td><td>"+resp['spec']+"</td><td>"+resp['remarks']+"</td><td><a href='javascript:void(0)' onclick=\"removeSpecRow('"+resp.id+"')\" class='btn btn-xs btn-danger' title='Delete'><i class='glyphicon glyphicon-trash'></i></a></td></tr>";
	$('#spec-table').append(html);
}
function specTable(id){
	var url = "staff-info";
    url += "/added-staff-spec/"+id;
    var xhr = ajaxGetObj(url);
    xhr.done(function(response){
    	console.log(response);
        //createTable(response);
    }).fail(function(){
        console.log("failed");
    });
}
function removeSpecRow(id){
	var url = "staff-info/remove-spec";
    url += "/"+id;
    var xhr = deleteData(url);
    xhr.done(function(resp){
    	$('#spec-table #spec'+id).remove();
        toast(resp);
        //table();
    }).fail(function(reason){
        console.log("Fail");
    });
}
</script>