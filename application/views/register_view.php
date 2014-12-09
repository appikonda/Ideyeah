<!DOCTYPE html>
<html lang="en">
<head>
<title>Register | IdeYeah</title>
<meta charset="utf-8">
<link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="http://<?php echo $_SERVER['SERVER_NAME']; ?>/css/style.css" type="text/css" media="all">
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/cufon-replace.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/CabinSketch_700.font.js"></script>
<script type="text/javascript" src="http://<?php echo $_SERVER['SERVER_NAME']; ?>/js/EB_Garamond_400.font.js"></script>
<!-- [if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">
.bg {behavior:url(js/PIE.htc)}
</style>
<![endif]-->
<!-- [if lt IE 7]>
<div style='clear:both;text-align:center;position:relative'>
   <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://www.theie6countdown.com/images/upgrade.jpg" border="0" alt="" /></a>
</div>
<![endif]-->
</head>
<body id="page1">
<div class="main">
<!-- header -->
   <header>
      <div class="wrapper">
         <nav>
            <ul id="menu">
               <li><a href="<?php echo base_url().'register'; ?>"><span>R</span>egister</a></li>
               <li id="menu_active"><a href="<?php echo base_url().'login'; ?>"><span>L</span>ogin</a></li>
            </ul>
         </nav>
      </div>
      <h1><a href="index.html" id="logo">IdeYeah1.com</a></h1>
   </header><div class="inner_copy"><div class="inner_copy">Best selection of premium <a href="http://www.templatemonster.com/pack/joomla-1-6-templates/">Joomla 1.6 templates</a></div></div>
<!-- / header -->
<!-- content -->
   <section id="content">
      <div class="wrapper">
         <article class="col1">
                            
                                <!-- <h2><span>Login</span></h2> -->
            <div class="pad_left1">
               <div class="pad_left1">
                  <div class="wrapper pad_top1">                                                                                             
                                                    
                  </div>

               </div>
            </div>
                            
            <h2>Register</h2>
            <div class="pad_left1 pad_bot1">
               <div class="pad">
<fieldset>
<legend>Registration Form</legend>
<p>
Fields marked with * are mandatory
</p>
<form id="registerForm" name="registerForm" method="post" action="<?php echo base_url(); ?>register/validate" >

<?php 
      echo validation_errors('<div class="error">', '</div>'); 
      if(isset($exists) && !$exists) {
         echo '<div class="error">Username already exits</div>';
      } 
      if(isset($msg)) {
         echo '<div class="error">'.$msg.'</div>';
      }
?>

<label for="first_name">First Name:*</label> <input type="text" id="first_name" name="first_name" />
<label for="last_name">Last Name:*</label> <input type="text" id="last_name" name="last_name" />
<label for="username">Username:*</label> <input type="text" id="username" name="username" />
<label for="password">Password:*</label> <input type="password" id="password" name="password" />
<label for="password2">Confirm:*</label> <input type="password" id="password2" name="password2" />
<label for="bio">Bio:</label> <textarea rows="8" cols="20" id="bio" name="bio"></textarea>
<label for="username">Homepage:</label> <input type="text" id="url" name="url" />
<br/>
<input type="submit" id="register" name="register" value="Register" /> &nbsp; <input type="reset" value="Reset" />
</form>
<br/>
<p>Already a member? <?php echo '<a href="'.base_url().'login">Sign In here</a>';?></p>
</fieldset>
               </div>
            </div>
            
         </article>
         <article class="col2">
            <h3>Latest Works</h3>
            <ul class="ul_works">
               <li><a href="#"><img src="images/page1_img2.png" alt=""></a></li>
            </ul>
                  
         </article>
      </div>
   </section>
<!-- / content -->

</div>

</body>
</html>