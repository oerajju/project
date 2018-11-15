<aside class="main-sidebar">
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
setPermission();
function setPermission(){
    var url = "/getmenulist";
    var xhr = ajaxGetObj(url);
    xhr.done(function(response){
        //console.log(response);
        createLeftMenuWithPermission('sidebar-menu',response);
    }).fail(function(){
        console.log("failed");
    });
}

  </script>