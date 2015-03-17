  <?php
  $page == 'about'   ? $about_active   = 'class="active"' : $about_active   = '';
  $page == 'contact' ? $contact_active = 'class="active"' : $contact_active = '';
  $page == 'faq'     ? $faq_active     = 'class="active"' : $faq_active     = '';
  $page == 'home'    ? $home_active    = 'class="active"' : $home_active    = '';
  $page == 'book'    ? $book_active    = 'class="active"' : $book_active    = '';
  ?>

<style>
.navigation2 a:link {
   color: #FFFFFF !important;
}

.navigation2 a:visited {
   color: #FFFFFF !important;
}

.navigation2 {
  margin-top: 12px;
  font-size: 1.1em;
  border-radius: 6px !important;
  text-align: left;
}
</style>

<div class='navigation2'>

     <div class="two columns center" style='border-right: 1px solid white; margin-bottom:5px; margin-left:3px;'> 
              <li><a href="<?php echo $base_url; ?>" title="" <?php echo $home_active; ?>>Home</a> </li>
     </div>
          <div class="two columns center" style='border-right: 1px solid white; margin-bottom:5px;margin-left:3px;'> 
              <li><a href="<?php echo $base_url; ?>about" title="" <?php echo $about_active; ?>>About Us</a> </li>
     </div>
     <div class="two columns center" style='border-right: 1px solid white; margin-bottom:5px;margin-left:3px;'> 
              <li><a href="<?php echo $base_url; ?>bookings" title="" <?php echo $book_active; ?>>Book Online</a></li>
     </div>
         <div class="two columns center" style='border-right: 1px solid white; margin-bottom:5px;margin-left:3px;'> 
              <li><a href="<?php echo $base_url; ?>faq" title="" <?php echo $faq_active; ?>>FAQ</a></li>
     </div>
     <div class="two columns center" > 
              <li><a href="<?php echo $base_url; ?>contact" title="" <?php echo $contact_active; ?>>Contact Us</a></li>
     </div>

    <div class="two columns left"></div>
</div>
