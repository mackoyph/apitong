
       <nav class="am-right-sidebar">
        <div class="sb-content">
          <div class="user-info"><img src="<?php echo $_SESSION['APITONG_PHOTO'] ?>"><span class="name"><?php echo $_SESSION['APITONG_FNAME'] . " " . $_SESSION['APITONG_LNAME'] ?><span class="status"></span></span><span class="position">Administrator</span></div>
        </div>
      </nav>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js" type="text/javascript"></script>
    <script src="assets/js/main.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        App.init();
        App.dashboard();
        
      });

      if(window.location.hash) {
            var hash = window.location.hash.substring(1);
            switch(hash){
              case 'admin-crud':
                   document.getElementById("mainframe").src = "pages/admin/crud.php";
                  break;
              case 'admin-report':
                   document.getElementById("mainframe").src = "pages/admin/report.php";
                  break;
              case 'admin-logs':
                   document.getElementById("mainframe").src = "pages/admin/logs.php";
                  break
              case 'user-crud':
                   document.getElementById("mainframe").src = "pages/user/crud.php";
                  break;
              case 'user-report':
                   document.getElementById("mainframe").src = "pages/user/report.php";
                  break;
              case 'user-logs':
                   document.getElementById("mainframe").src = "pages/user/logs.php";
                  break;           
              case 'main-header-logo':
                   document.getElementById("mainframe").src = "pages/main/header/logo.php";
                  break;
              case 'main-header-name':
                   document.getElementById("mainframe").src = "pages/main/header/name.php";
                  break;
              case 'main-header-tagline':
                   document.getElementById("mainframe").src = "pages/main/header/tagline.php";
                  break;  
              case 'main-footer-broker':
                   document.getElementById("mainframe").src = "pages/main/footer/broker.php";
                  break;
              case 'main-footer-contact':
                   document.getElementById("mainframe").src = "pages/main/footer/contact.php";
                  break;
              case 'main-footer-follow':
                   document.getElementById("mainframe").src = "pages/main/footer/follow.php";
                  break;
              case 'main-footer-note':
                   document.getElementById("mainframe").src = "pages/main/footer/note.php";
                  break; 
              case 'home-banner':
                   document.getElementById("mainframe").src = "pages/home/banner.php";
                  break;  
              case 'home-dev':
                   document.getElementById("mainframe").src = "pages/home/dev.php";
                  break;
              case 'home-featured':
                   document.getElementById("mainframe").src = "pages/home/featured.php";
                  break;
              case 'home-house':
                   document.getElementById("mainframe").src = "pages/home/house.php";
                  break;
              case 'home-tagline':
                   document.getElementById("mainframe").src = "pages/home/tagline.php";
                  break; 
              case 'about-desc':
                   document.getElementById("mainframe").src = "pages/about/desc.php";
                  break;
              case 'about-logo-banner':
                   document.getElementById("mainframe").src = "pages/about/logo-banner.php";
                  break; 
              case 'about-banner':
                   document.getElementById("mainframe").src = "pages/about/banner.php";
                  break;  
              case 'about-logo-desc':
                   document.getElementById("mainframe").src = "pages/about/logo-desc.php";
                  break;
              case 'about-sl-banner1':
                   document.getElementById("mainframe").src = "pages/about/sl-banner1.php";
                  break;
              case 'about-sl-banner2':
                   document.getElementById("mainframe").src = "pages/about/sl-banner2.php";
                  break;
              case 'about-sl-desc':
                   document.getElementById("mainframe").src = "pages/about/sl-desc.php";
                  break; 
              case 'gallery-crud':
                   document.getElementById("mainframe").src = "pages/gallery/crud.php";
                  break;
              case 'gallery-sidebar':
                   document.getElementById("mainframe").src = "pages/gallery/sidebar.php";
                  break; 
              case 'settings-changepass':
                   document.getElementById("mainframe").src = "pages/settings/changepass.php";
                  break; 
              case 'settings-deactivate':
                   document.getElementById("mainframe").src = "pages/settings/deactivate.php";
                  break;
              case 'settings-edit':
                   document.getElementById("mainframe").src = "pages/settings/edit.php";
                  break; 
           }
      }

      function switchpage(hash){
         switch(hash){
              case 'admin-crud':
                   document.getElementById("mainframe").src = "pages/admin/crud.php";
                  break;
              case 'admin-report':
                   document.getElementById("mainframe").src = "pages/admin/report.php";
                  break;
              case 'admin-logs':
                   document.getElementById("mainframe").src = "pages/admin/logs.php";
                  break
              case 'user-crud':
                   document.getElementById("mainframe").src = "pages/user/crud.php";
                  break;
              case 'user-report':
                   document.getElementById("mainframe").src = "pages/user/report.php";
                  break;
              case 'user-logs':
                   document.getElementById("mainframe").src = "pages/user/logs.php";
                  break;           
              case 'main-header-logo':
                   document.getElementById("mainframe").src = "pages/main/header/logo.php";
                  break;
              case 'main-header-name':
                   document.getElementById("mainframe").src = "pages/main/header/name.php";
                  break;
              case 'main-header-tagline':
                   document.getElementById("mainframe").src = "pages/main/header/tagline.php";
                  break;  
              case 'main-footer-broker':
                   document.getElementById("mainframe").src = "pages/main/footer/broker.php";
                  break;
              case 'main-footer-contact':
                   document.getElementById("mainframe").src = "pages/main/footer/contact.php";
                  break;
              case 'main-footer-follow':
                   document.getElementById("mainframe").src = "pages/main/footer/follow.php";
                  break;
              case 'main-footer-note':
                   document.getElementById("mainframe").src = "pages/main/footer/note.php";
                  break; 
              case 'home-banner':
                   document.getElementById("mainframe").src = "pages/home/banner.php";
                  break;  
              case 'home-dev':
                   document.getElementById("mainframe").src = "pages/home/dev.php";
                  break;
              case 'home-featured':
                   document.getElementById("mainframe").src = "pages/home/featured.php";
                  break;
              case 'home-house':
                   document.getElementById("mainframe").src = "pages/home/house.php";
                  break;
              case 'home-tagline':
                   document.getElementById("mainframe").src = "pages/home/tagline.php";
                  break; 
              case 'about-desc':
                   document.getElementById("mainframe").src = "pages/about/desc.php";
                  break;
              case 'about-logo-banner':
                   document.getElementById("mainframe").src = "pages/about/logo-banner.php";
                  break; 
              case 'about-banner':
                   document.getElementById("mainframe").src = "pages/about/banner.php";
                  break;  
              case 'about-logo-desc':
                   document.getElementById("mainframe").src = "pages/about/logo-desc.php";
                  break;
              case 'about-sl-banner1':
                   document.getElementById("mainframe").src = "pages/about/sl-banner1.php";
                  break;
              case 'about-sl-banner2':
                   document.getElementById("mainframe").src = "pages/about/sl-banner2.php";
                  break;
              case 'about-sl-desc':
                   document.getElementById("mainframe").src = "pages/about/sl-desc.php";
                  break; 
              case 'gallery-crud':
                   document.getElementById("mainframe").src = "pages/gallery/crud.php";
                  break;
              case 'gallery-sidebar':
                   document.getElementById("mainframe").src = "pages/gallery/sidebar.php";
                  break; 
              case 'settings-changepass':
                   document.getElementById("mainframe").src = "pages/settings/changepass.php";
                  break; 
              case 'settings-deactivate':
                   document.getElementById("mainframe").src = "pages/settings/deactivate.php";
                  break;
              case 'settings-edit':
                   document.getElementById("mainframe").src = "pages/settings/edit.php";
                  break; 
                }
      }

    </script>
   
  
  </body>

</html>