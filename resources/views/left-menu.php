
<script type="text/javascript">
</script>
<aside class="main-sidebar">
  <?php

use \App\UserMenus;
$org = (new UserMenus())->getAllMenus();
?>

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Menu Section</li>
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>  
<div id="main" class="content-wrapper" style="min-height: 1069px;">
  <div id="dragbar" class=""></div>
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <div class="row" >
    <section id="main-body" class="content col-lg-12">
<script type="text/javascript">
  var response = <?php echo json_encode($org) ?>;
createLeftMenuWithPermission('sidebar-menu',response);
  console.log(response);

function createLeftMenuWithPermission(domId, response){
    if($('.'+domId).length){
        var data = response.menu;
        if(data.length){
            var ht="";
            var ul ="";
            for(var i in data){
              var parentName = data[i]['parent']['menu_nameen'];
              var parentId = data[i]['parent']['menuid'];
                ht = "<li class='treeview' id='"+parentName+'_'+parentId+"' ><a href='#'><i class='fa fa-dashboard'></i><span>"+parentName+"</span></a></li>";
                $('.sidebar .'+domId).append(ht);
                if(data[i]['parent']['childern']){
                    $('#'+parentName+'_'+parentId+' a').append(' <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>');
                $('#' +parentName+'_'+parentId).append("<ul class='treeview-menu' id="+parentId+"></ul>");
                }
                for(var j in data[i]['parent']['childern']){
                  var fchildName = data[i]['parent']['childern'][j]['menu_nameen'];
                  var fchildId = data[i]['parent']['childern'][j]['menuid'];
                    if(data[i]['parent']['childern'][j]['children']){
                        ul = "<li class='treeview' id='"+fchildName+'_'+fchildId+"'><a href='#'><i class='fa fa-plus'></i><span>"+fchildName+"</span><span class='pull-right-container'><i class='fa fa-angle-left pull-right'></i></a></li>";
                        $('#'+parentName+'_'+parentId+' #'+parentId).append(ul);
                         $('#' +fchildName+'_'+fchildId).append("<ul class='treeview-menu' id="+fchildId+"></ul>");
                    }
                    else{
                        $('#'+fchildName+'_'+fchildId+ 'a').removeAttr('href');
                        ul = "<li id='"+fchildName+'_'+fchildId+"'><a data-async='fullpage' href="+baseUrl+'/'+data[i]['parent']['childern'][j]['menu_url']+"><i class='fa fa-circle-o'></i>"+fchildName+"</a></li>";
                        $('#'+parentName+'_'+parentId+' #'+parentId).append(ul);
                    }
                    for(var k in data[i]['parent']['childern'][j]['children']){
                      var schildName = data[i]['parent']['childern'][j]['children'][k]['menu_nameen'];
                      var schildId = data[i]['parent']['childern'][j]['children'][k]['menuid']; 
                        subul = "<li id='"+schildName+'_'+schildId+"'><a data-async='fullpage' href="+baseUrl+'/'+data[i]['parent']['childern'][j]['children'][k]['menu_url']+"><i class='fa fa-circle-o'></i>"+schildName+"</a></li>";
                        $('#'+fchildName+'_'+fchildId+' #'+fchildId).append(subul);
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
</script>