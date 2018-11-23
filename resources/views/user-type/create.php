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
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick ="resetList()" >
                    <span aria-hidden="true">×</span>
                </button>
                <span class="pull-right">
                    <!-- Tabs -->
                    <ul class="nav panel-tabs">
                        <li class="active">
                            <a href="#tab1" data-toggle="tab" class="btn btn-flat btn-primary">Subordinate</a>
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
                       <div id="list-box" class="box col-md-12">
                            <div class="box-header">
                                <h5 class="box-title">Assign Permission</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row darbandi-roles tab-pane" id="tab2">
                        <div id="list-box" class="box col-md-12">
                            <div class="box-header">
                                <h5 class="box-title">Assign Permission</h5>
                            </div>
                            <form role="form" method="post" id="listform" class="oas-form" onsubmit="SubmitListPermission(event);" >
                                <input type="hidden" id="usertypeid" name="usertypeid" />
                                <input type="hidden" id="_token" name="_token" value="<?php echo csrf_token();?>"/>
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
        toast(rsp);
    });
}
function perm(id){
	//console.log(id);	
    $('#user-perm #usertypeid').val(id);
    $('.modal-body .tab-content #tab1').addClass('active');
    $('.modal-body .tab-content #tab2').removeClass('active');
}
function setPermission(){
    $("#perm-menu").html("");
    var usertypeid = $('#user-perm #usertypeid').val();
    var url = "getmenulist/"+usertypeid;
    var xhr = ajaxGetObj(url);
    xhr.done(function(response){
        console.log(response);
        createMenuWithPermission('perm-menu',response.menu);
        checkUserMenus(response.usermenus);
    }).fail(function(){
        console.log("failed");
    });
}
function createMenuWithPermission(domId, response){
if($('#'+domId).length){
         var data = response;
         if(data.length){
            var ht="";
            var ul ="";
            for(var i in data){
                var parent_nameen =data[i]['parent']['menu_nameen'];
                var parent_menuid = data[i]['parent']['menuid'];
                var iFa = "<i onClick='hideAndShow(\""+ parent_nameen +'_'+parent_menuid+"\","+parent_menuid+");' class='fa fa-caret-right'> </i>";
                ht = "<li class='treeview' id='"+parent_nameen+'_'+parent_menuid+"' ><a href='#'>"+(data[i]['parent']['childern']?iFa:'')+"<input type='checkbox' id='input_"+parent_menuid+"' name='menu[]' value='"+parent_menuid+"' onclick ='Parentclick(\""+ parent_nameen +'_'+parent_menuid+"\","+parent_menuid+");'> <i class='fa fa-dashboard'></i> <span>"+parent_nameen+"</span></a></li>";
                $('#'+domId).append(ht);
                if(data[i]['parent']['childern']){
                  //  $('#'+domId+' #'+parent_nameen+'_'+parent_menuid+' a').append("");
                $('#'+domId+' #' +parent_nameen+'_'+parent_menuid).append("<ul class='treeview-menu' id="+parent_menuid+"></ul>");
                }
                for(var j in data[i]['parent']['childern']){
                    var fChildName = data[i]['parent']['childern'][j]['menu_nameen'];
                    var fChildId = data[i]['parent']['childern'][j]['menuid'];
                    var iFac = "<i onClick='hideAndShow(\""+ fChildName +'_'+fChildId+"\","+fChildId+");' class='fa fa-caret-right'> </i>";
                    if(data[i]['parent']['childern'][j]['children']){
                        ul = "<li class='treeview' id='"+fChildName+'_'+fChildId+"'><a href='#' >"+iFac+"<input type='checkbox' id='input_"+fChildId+"' name='menu[]' value='"+fChildId+"' onclick ='firstChildClick(\""+ parent_nameen +'_'+ parent_menuid +"\",\""+ fChildName +'_'+fChildId+"\","+fChildId+");'>"+fChildName+"</a></li>";
                        $('#'+domId+' #'+parent_nameen+'_'+parent_menuid+' #'+parent_menuid).append(ul);
                         $('#'+domId+' #' +fChildName+'_'+fChildId).append("<ul class='treeview-menu' id="+fChildId+"></ul>");
                    }
                    else{
                      $('#'+domId+' #'+fChildName+'_'+fChildId+ 'a').removeAttr('href');
                      ul = "<li class='last-li' id='"+fChildName+'_'+fChildId+"'><input type='checkbox' id='input_"+fChildId+"' name='menu[]' value='"+fChildId+"'> <i class='fa fa-circle-o'></i>"+fChildName+"</li>";
                      $('#'+domId+' #'+parent_nameen+'_'+parent_menuid+' #'+parent_menuid).append(ul);
                    }
                for(var k in data[i]['parent']['childern'][j]['children']){
                    var sChildName = data[i]['parent']['childern'][j]['children'][k]['menu_nameen'];
                    var sChildId = data[i]['parent']['childern'][j]['children'][k]['menuid'];
                    //console.log(data[i]['parent']['childern'][j]['children'][k]['menu_nameen']+'_'+data[i]['parent']['childern'][j]['children'][k]['menuid']);
                	subul = "<li class='last-li' id='"+sChildName+'_'+sChildId+"'><input type='checkbox' id='input_"+sChildId+"' name='menu[]' value='"+sChildId+"'> <i class='fa fa-circle-o'></i>"+sChildName+"</li>";
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
function checkUserMenus(response){
    for(var i in response){
        $('#input_'+response[i]['menuid']).attr('checked','checked');
    }
}
function hideAndShow(liId, ulId){
    var domId = 'perm-menu';
    if($('#'+ domId+' #'+liId+' a i').hasClass('fa-caret-right')){
            if($('#'+ domId+' a i').hasClass('fa-caret-down')){
            $('#'+ domId+' a i').removeClass('fa-caret-down').addClass('fa-caret-right');
                if($('#'+domId+' #'+liId+' ul li #'+ulId).hasClass('active')){
                    $('#'+domId+' li ul li #'+ulId).removeClass('active');
                    console.log('4');
                }
                else if($('#'+domId+' #'+liId+' #'+ulId).hasClass('active')){
                    $('#'+domId+' #'+liId+' #'+ulId).removeClass('active');
                    console.log('3');
                    }
                else{
                    $('#'+domId+' li ul').removeClass('active');
                    console.log('5');
                }
                //console.log(1);
            }
        $('#'+ domId+' #'+liId+' a i').removeClass('fa-caret-right');
        $('#'+ domId+' #'+liId+' a i').addClass('fa-caret-down');
        if($('#'+ domId+' #'+liId+' ul li a i').hasClass('fa-caret-down')){
            console.log('1');
            $('#'+ domId+' #'+liId+' ul li a i').removeClass('fa-caret-down');
            $('#'+ domId+' #'+liId+' ul li a i').addClass('fa-caret-right');
        }
        // else{
        //     $('#'+ domId+' #'+liId+' a i').removeClass('fa-caret-right');
        //     $('#'+ domId+' #'+liId+' a i').addClass('fa-caret-down');
        //     console.log('2');
        // }
        //if($('#'+domId+' li #'+ulId).hasClass('active')){
        // $('#'+domId+' #'+liId+'a i').removeClass('fa fa-angle-down pull-right');
        // $('#'+domId+' #'+liId+'a i').addClass('fa fa-angle-left pull-right');
        // $('#'+domId+' #'+liId+'a i:last-child').removeClass('fa fa-angle-left pull-right');
        // $('#'+domId+' #'+liId+'a i:last-child').addClass('fa fa-angle-down pull-right');
        $('#'+domId+' li #'+ulId).addClass('active');
        return true;
    }
    else{
        $('#'+ domId+' #'+liId+' a i').removeClass('fa-caret-down');
        $('#'+ domId+' #'+liId+' a i').addClass('fa-caret-right');
        $('#'+domId+' li #'+ulId).removeClass('active');
        return true;
    }
    
}
function Parentclick(id, inputid){
    var domId = 'perm-menu';
    if ($('#'+domId+' #'+id+' #input_'+inputid).attr('checked')){
        $('#'+domId+' #'+id+' #input_'+inputid).removeAttr('checked');
        $('#'+domId+' #'+id+' ul li input[type=checkbox]').removeAttr('checked');
        console.log('wrong');
        return true;
    }
    else{
        $('#'+domId+' #'+id+' #input_'+inputid).attr('checked',true);
        $('#'+domId+' #'+id+' ul li input[type=checkbox]').attr('checked',true);
        console.log('right');
        return  true;
    }
}
function firstChildClick(parentid, id, inputid){
    var domId = 'perm-menu';
    if ($('#'+domId+' #'+ parentid+' #'+id+' #input_'+inputid).attr('checked','checked')){
        $('#'+domId+' #'+ parentid+' #'+id+' #input_'+inputid).attr('checked',false);
        $('#'+domId+' #'+ parentid+' #'+id+' ul li input[type=checkbox]').attr('checked',false);
        console.log('child wrong');
        return true;
    }
    else{
        $('#'+domId+' #'+ parentid+' #'+id+' #input_'+inputid).attr('checked',true);
        $('#'+domId+' #'+ parentid+' #'+id+' ul li input[type=checkbox]').attr('checked',true);
        console.log('child right');
        return  true;
    }
}
function SubmitListPermission(e){
    e.preventDefault();
    var url = 'user-type/manage-permission'
    var formData = $("#listform").serialize();
    var xhr = submitFormAjax(url,formData);
    xhr.done(function(resp){
        //resetForm($('#form'));
        //table();
        toast(resp);
    }).fail(function(reason){
        var rsp = reason.responseJSON;
        toast(rsp);
    });
}
function resetList(){
    console.log('triggered here');
    $("#user-perm").on("hidden.bs.modal", function(){
    $("#perm-menu").html("");
});
    return true;
}
</script>