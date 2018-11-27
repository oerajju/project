<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MIS [NMVF]</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo url('assets/bootstrap/dist/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo url('assets/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo url('assets/Ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo url('css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo url('css/style.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo url('css/skins/_all-skins.min.css'); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo url('assets/morris.js/morris.css'); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo url('assets/jvectormap/jquery-jvectormap.css'); ?>">
  <!-- Date Picker -->
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo url('assets/bootstrap-daterangepicker/daterangepicker.css'); ?>">
  <!-- toast-->
  <link rel="stylesheet" href="<?php echo asset('css/jquery.toast.min.css');?>">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo asset('css/nepali-date-picker.css');?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
  .main-header{
    min-height: 40px;
  }
    .main-header .logo, .main-sidebar{
      overflow: hidden;
      position: fixed;
    }
</style>
<script src="<?php echo url('assets/jquery/dist/jquery.min.js'); ?>"></script>
<script src="<?php echo url('js/scripts.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo asset('js/nepali-date-picker.js');?>"></script>

<script type="text/javascript">
  //essentail global variable
  var baseUrl = "<?php echo url('/');?>";
      var gLoader = "loader-animation";
      var mainContainer="main-body";
      var genLabels = {};
      var nepDate = '<?php echo \App\BaseModel::nepDate();?>';
      
     
    function t_field(field){
          return field+langCode;
      }
      
      function t_label(label){
          if(genLabels.hasOwnProperty(label)){
              return genLabels[label];
          }else{
              return label;
          }
      }
        $('.user.user-menu .dropdown-menu .user-header').click(function (event) {
            event.stopPropagation();
        });
        function switchLang(code){
            if(langCode!==code){
                var url = baseUrl + '/lang/'+code;
            var xhr = $.ajax({
                method:'GET',
                url:url
            });
                xhr.done(function(e){
                    location.reload();
                });
            }
            
            
        }
</script>
<?php 
 $details = (new \App\Users())->getUserDetails(session('userid'));
?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo url('/'); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>NM</b>VF</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>MIS </b>[NMVF]</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-fixed-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo url('img/user1.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $details->orgname; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo url('img/user1.png');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $details->orgname.'-'.$details->staffname; ?>
                  <!-- <small>Member since Nov. 2012</small> -->
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                 <a href="javascript:void(0)" class="btn btn-default btn-flat" onclick="logout(event)">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
