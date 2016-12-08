<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
   <link rel="stylesheet" type="text/css" href="<?php echo $SERVER; ?>style/style.css" />
  <title><?php echo $title; ?></title>

 </head>
 <body>
   <div class="header">
        <div class="fon_header">
            <div class="container header_content">
                <div class="header_spisok"> 
			<?php echo $menu; //MENUHA ?>
         </div>
       </div>
       </div>
     </div>

     
     <div>
     <div style="background-color: #5A8FAE; min-height: 500px;"> 
     <div class="container">
       <h1 class="zagolovok">О нас</h1>
          <?php echo $content_for_layout; ?>
         <hr>
       
         </div>
     </div>
     </div>
    
           
 </body>
</html>