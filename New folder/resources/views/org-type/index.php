<?php if(!request()->ajax()):
    include(resource_path().'/views/header.php');
    include(resource_path().'/views/left-menu.php');
 endif; ?>
<div class="row">
    <div id="first-content-section" class="col-md-6" data-page-part="org-type/create"></div>
    <div id="second-content-section" class="col-md-6" data-page-part="org-type/list"></div>
</div>
<?php if(!request()->ajax()):
 include(resource_path().'/views/footer.php');
endif;?>