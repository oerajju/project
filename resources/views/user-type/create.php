<style type="text/css">
#user-perm .modal-dialog{
    width:50%;
}
#user-perm .modal-body{
    padding-left: 15%;
}
#list-box .box-body{
    padding-bottom: 5%;
}
.treeview-menu .last-li{
    color:white;
}
.active{
    display:block;
}
	.row-color tr{
        background: #fbfbfb;
    }
    .row-color tr:nth-child(1){
        background: #d4d4d4;
    }
    .staff{
        border: none !important;
    }
    .staff a{
        padding-left: 3px;
    }
    .tree li span.name{
        padding-left: 0px;
    }
    .section div>.fa:after{
        content: '';
        font-size: 20px;
        font-weight: bolder;
        color: #3c8dbc;
        border-bottom: 2px dotted #3c8dbc;
        width: 15px;
        height: 10px;
        position: relative;
        display: inline-block;
        top: -3px;    
    }
    .section div>.fa, .section .name>.fa {
        font-size: 18px;
    }
    .users .list-group li:hover{
        background-color: #f4f4f4;

        cursor: pointer;
    }
    .row.users{
        max-height: 500px;
        overflow: auto;
    }
	.modal-header ul {

        padding-right: 100px;
    }
    .modal-header .nav > li > a:focus{
        background: #286090;
    }
    .modal-header .nav > li > a:hover{
        background: #286090;
        color:#fff;
    }
    .modal-header .nav > li.active a{

        color:#fff;
    }
    .modal-header ul li{
        display: inline-block;
        padding-right: 5px;
    }
    #user-perm .model-dialog{
        padding:5%;
    }
    #user-perm .model-content{
        padding:5%;
    }
    #list-box {
    width: 80%;
    background: #dfe8f6;
    }
    #perm-menu{
        width:90% !important;
    }
    #perm-menu .treeview {
    padding-left: 18px;
    }
    #perm-menu .last-li {
    padding-left: 25px;
}
</style>
<div class="box">
				<div class="box-header with-border">
                                    <h3 class="box-title">प्रयोगकर्ताको प्रकार</h3>
				</div>
				<form role="form" onsubmit="formSubmit(event)" method="post" id="form" class="oas-form-inline">
				<input type="hidden" value="" name="utid" id="utid">
				<input type="hidden" name="_token" id="_token" value="<?php echo csrf_token();?>">
				<div class="box-body">
					<div class="form-group">
					  <label for="parent">parent</label>
					  <select class="form-control" id="parent" name="parent">
					  	<option value="0">None</option>
					  	 <?php
					  	foreach($parent as $p){?>
					  		<option value="<?php echo $p->utid; ?>"><?php echo $p->nameen; ?></option>
					  <?php } ?> 
					  </select>
					</div>
					<div class="form-group">
					  <label for="level">तह</label>
					  <input type="text" name='level' id='level' class="form-control"  >
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
					  <label for="descriptionnp">व्याख्या(नेपाली)</label>
					  <input type="text" name='descriptionnp' id='descriptionnp' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="descriptionen">व्याख्या(अङ्ग्रेजी) </label>
					  <input type="text" name='descriptionen' id='descriptionen' class="form-control" >
					</div>
					<div class="form-group">
					  <label for="approved">स्विकृत</label>
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

<div id="user-perm" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <span class="pull-right">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="active">
                            <a  href="#tab1" data-toggle="tab" class="btn btn-flat btn-primary">Subordinate</a>
                        </li>
                        <li>
                            <a href="#tab2" data-toggle="tab" class="btn btn-flat btn-primary"  onclick="setPermission();">Menu List</a>
                        </li>
                    </ul>
                </span>
                <h4 class="modal-title"> Users Permission</h4>
            </div>
            <div class="modal-body">
                <div class="tab-content clearfix">
                    <div class="col-md-12 tab-pane active" id="tab1">
                       
                    </div>
                    <div class="row darbandi-roles tab-pane" id="tab2">
                        <div id="list-box" class="box col-md-12">
                            <div class="box-header">
                                <h5 class="box-title">Assign Permission</h5>
                            </div>
                            <form role="form" method="post" id="listform" class="oas-form" onsubmit="SubmitListPermission(event);" >
                                <div class="box-body">
                                    <ul class="sidebar-menu tree col-md-8" id="perm-menu">
                                    
                                    </ul>
                                </div>
                                <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" onClick="resetForm()" class="btn btn-info pull-right">Reset</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
            <!-- /.modal-content -->
    </div>
</div>
<script>
    //$('')
function formSubmit(e){
    e.preventDefault();
    var url = "user-type";
    if( $('#utid').val()==""){
        var formData = $("#form").serialize();
    }else{
       url += "/"+ $('#utid').val();
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
function perm(id){
	//console.log(id);	
    $('#user-perm #usertypeid').val(id);
}
function setPermission(){
    var url = "/getmenulist";
    var xhr = ajaxGetObj(url);
    xhr.done(function(response){
        //console.log(response);
        createMenuWithPermission('perm-menu',response);
    }).fail(function(){
        console.log("failed");
    });
}
function createMenuWithPermission(domId, response){
if($('#'+domId).length){
         var data = response.menu;
         if(data.length){
            var ht="";
            var ul ="";
            for(var i in data){
                var parent_nameen =data[i]['parent']['menu_nameen'];
                var parent_menuid = data[i]['parent']['menuid'];
                ht = "<li class='treeview' id='"+parent_nameen+'_'+parent_menuid+"' ><a href='#'  onClick='hideAndShow(\""+ parent_nameen +'_'+parent_menuid+"\","+parent_menuid+");'><input type='checkbox' id='input_"+parent_menuid+"' name='input_"+parent_menuid+"' onclick ='Parentclick(\""+ parent_nameen +'_'+parent_menuid+"\","+parent_menuid+");'> <i class='fa fa-dashboard'></i> <span>"+parent_nameen+"</span></a></li>";
                $('#'+domId).append(ht);
                if(data[i]['parent']['childern']){
                    $('#'+domId+' #'+parent_nameen+'_'+parent_menuid+' a').append("<i class='fa fa-angle-left pull-right'></i>");
                $('#'+domId+' #' +parent_nameen+'_'+parent_menuid).append("<ul class='treeview-menu' id="+parent_menuid+"></ul>");
                }
                for(var j in data[i]['parent']['childern']){
                    var fChildName = data[i]['parent']['childern'][j]['menu_nameen'];
                    var fChildId = data[i]['parent']['childern'][j]['menuid'];
                    if(data[i]['parent']['childern'][j]['children']){
                        ul = "<li class='treeview' id='"+fChildName+'_'+fChildId+"'> <a href='#' onClick='hideAndShow(\""+ fChildName +'_'+fChildId+"\","+fChildId+");'><input type='checkbox' name='input_"+fChildId+"' onclick ='Parentclick(\""+ parent_nameen +'_'+parent_menuid+"\","+parent_menuid+");'> <i class='fa fa-angle-left pull-right'></i>"+fChildName+"</a></li>";
                        $('#'+domId+' #'+parent_nameen+'_'+parent_menuid+' #'+parent_menuid).append(ul);
                         $('#'+domId+' #' +fChildName+'_'+fChildId).append("<ul class='treeview-menu' id="+fChildId+"></ul>");
                    }
                    else{
                      $('#'+domId+' #'+fChildName+'_'+fChildId+ 'a').removeAttr('href');
                      ul = "<li class='last-li' id='"+fChildName+'_'+fChildId+"'><input type='checkbox' name='input_"+i+"'> <i class='fa fa-circle-o'></i>"+fChildName+"</li>";
                      $('#'+domId+' #'+parent_nameen+'_'+parent_menuid+' #'+parent_menuid).append(ul);
                    }
                for(var k in data[i]['parent']['childern'][j]['children']){
                    var sChildName = data[i]['parent']['childern'][j]['children'][k]['menu_nameen'];
                    var sChildId = data[i]['parent']['childern'][j]['children'][k]['menuid'];
                    //console.log(data[i]['parent']['childern'][j]['children'][k]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['children'][k]['menuid']);
                	subul = "<li class='last-li' id='"+sChildName+'_'+sChildId+"'><input type='checkbox' name='input_"+i+"'> <i class='fa fa-circle-o'></i>"+sChildName+"</li>";
                	$('#'+domId+' #'+fChildName+'_'+fChildId+' #'+fChildId).append(subul);
                }
                }
                }
         }else{
            console.log('No data provided to list menu.');
        }
    }else{
        console.log('Dom with id '+ domId+' not found.');
    }
}
function hideAndShow(liId, ulId){
    var domId = 'perm-menu';
            if($('#'+domId+' li #'+ulId).hasClass('active')){
                // $('#'+domId+' #'+liId+'a i').removeClass('fa fa-angle-down pull-right');
                // $('#'+domId+' #'+liId+'a i').addClass('fa fa-angle-left pull-right');
                $('#'+domId+' li #'+ulId).removeClass('active');
                return false;   
        }
        // $('#'+domId+' #'+liId+'a i:last-child').removeClass('fa fa-angle-left pull-right');
        // $('#'+domId+' #'+liId+'a i:last-child').addClass('fa fa-angle-down pull-right');
        $('#'+domId+' li #'+ulId).addClass('active');
        return false;
}
function Parentclick(id, inputid){
    var domId = 'perm-menu';
    var attr = $('#'+domId+' #'+id+' #input_'+inputid).attr('checked');
    if (typeof attr !== typeof undefined && attr !== false) {
    }
    else{
        $('#'+domId+' #'+id+' #input_'+inputid).attr('checked','ON');
        return false;
    }
}
function SubmitListPermission(e){
    e.preventDefault();
    var formData = $("#listform").serialize();
    console.log(formData);
}
</script>