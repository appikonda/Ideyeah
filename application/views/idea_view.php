<!DOCTYPE html>
<html lang="en">
<head>
<title>View Idea | IdeYeah</title>
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
               <li><a href="<?php echo base_url(); ?>profile">Profile</a></li>
<li><a href="<?php echo base_url(); ?>profile/post_idea">Post Idea</a></li>
<li><a href="<?php echo base_url(); ?>profile/idea_stream">Idea Stream</a></li>
<li><a href="<?php echo base_url(); ?>profile/logout">Logout</a></li>
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
                            
            <h2>View Idea</h2>
            <div class="pad_left1 pad_bot1">
               <div class="pad">
               <?php 
   if(isset($msg)) {
      echo '<div class="message">'.$msg.'</div>';
   }
?>

<br/><br/><br/>

<?php 
if(isset($idea_info)) {
   echo '<h4>Title:</h4> '.$idea_info->idea_title.' (Posted on: '.$idea_info->date.' by: '.$user_info[0]->first_name.$user_info[0]->last_name.')<br/><h4>Idea:</h4> '.$idea_info->idea_content;
?>
<form id="commentForm" name="commentForm" method="post" action="<?php echo base_url(); ?>idea/validate_comment/<?php echo $idea_info->idea_id?>">
<label for="comment_content"><h4>Comment Content:*</h4></label> <textarea rows="8" cols="20" id="comment_content" name="comment_content"></textarea>
<br/>
<input type="submit" name="postComment" id="postComment" value="Post Comment" />
</form>
<fieldset>
<h2>Discussion</h2>

<?php 
$count = 1;
if(isset($comment_info)){
   foreach ($comment_info as $comment) {
      echo $count.'. '.$comment->comment_content.' (by '.$comment->first_name.' '.$comment->last_name.' on '.$comment->date.')<br/>';
      $count++;
   }
}
?>
</fieldset>

<?php 
}
?>

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