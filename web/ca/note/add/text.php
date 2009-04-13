<?php 
	include 'gloo.inc';
	require_once ($_SERVER['GLOO_INC_DIR'].'class_loader.inc' );
	require_once ($_SERVER['GLOO_INC_DIR'].'error.inc' );
	
    //web/ca/notes/add/text.php
    $page = new Gloo_Page();
    

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title> org title   </title>


    <meta http-equiv="keywords" content="cms,gloov2">
    <meta http-equiv="description" content="gloov2 Notes add page">
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
 
    <LINK REL=StyleSheet HREF="<?php echo $glooBaseURI ?>/ca/css/main.css" TYPE="text/css" MEDIA=screen>
   
	
 	<script type="text/javascript" src="<?php echo $glooBaseURI ?>/js/fckeditor/fckeditor.js"></script>
		
    </head>
	
	<body>
  	<div id="conetnt_container">
		<div id="banner">
				 <div id="logo"> v2 organization <br/>
                    <img src="<?php echo $glooBaseURI ?>/ca/css/imgs/indigloo.gif"/>
				 </div>
		 </div>
	
		<div id="content">
			<div id="rightPanel">
                <div id="nav">
                    <!-- menu -->
                </div>
				<br />
				<!-- sidebar -->
	
			</div> <!-- right panel -->
            
			<div id="mainArea">
				
			
				
				
                <?php
                    $sticky = $page->get_sticky_map('ca_note_form');
                    //page workflow data - set earlier 
                    $menuKey = $page->get_data('menu_key');
                    $frmMessages = $page->get_message('ca_note_form');
                    
                ?>

                <h5> Add Notes </h5>
				<!-- form  messages -->
                <?php
                    foreach($frmMessages as $frmMessage) {
                 ?>
                    <ul>
                        <li> <?php echo $message ?>  </li>
                    </ul>
                  <?php
                    }
                ?>


				<div id="form">
				<form name="ca_note_form"  action="<?php echo $glooBaseURI ?>/ca/note/frm/add.php" method="POST"  onSubmit=" " >
                
				<a name="spinner"> </a>
				
				<table cellspacing="5" class="formGroup">
					<tr>
						<td colspan="2"><div id="spinner_div"> </div></td>
					</tr>
					<tr>
						<td class="field"> <span style="color:red;">*</span> Title : </td>
						<td> <input type="text" name="title" maxlength="50"  value=""/></td>
					</tr>
												
					<tr>
						<td class="field"> &nbsp; </td> 
						<td> <hr> </td>
					</tr>
					
					<tr>
						<td class="field"> <span style="color:red;">*</span> Content:</td>
						<td> &nbsp;(please type details  below) </td>
					 </tr>
					 	
					<tr>
						
						<td colspan="2">
                             <textarea  id="contents"   name="contents" ><?php echo $sticky->get('content'); ?> </textarea>
                        </td>
					</tr>
					 	
					
					
					<tr>
											
						<td>&nbsp;</td>
						<td id="bottomBar">
							<button type="submit" name="save" value="Save" onclick="this.setAttribute('value','Save');" ><span>Save</span></button>				
							&nbsp;&nbsp;
							<button type="button" name="cancel" onClick="javascript:alert('Cancel');"><span>Cancel</span></button>
	
	
						</td>
					</tr>
	
				</table>
                    
                    <!-- Hidden fields -->
                    <input type="hidden" name="menu_key" value="<?php echo $menuKey ; ?>"/>
                    <input type="hidden" name="ui_type" value="TEXT_NOTE" />
                    
				</form>
			</div> <!-- form -->	
			
			<!-- Add Fckeditor to textarea -->
			
				<script language="javascript" type="text/javascript">
					window.onload = function(){
						var oFCKeditor = new FCKeditor( 'contents' ) ;
						oFCKeditor.BasePath = "/app2/js/fckeditor/" ;
						oFCKeditor.Height = "360px" ;
						oFCKeditor.ToolbarSet = 'Gloo' ;
						oFCKeditor.ReplaceTextarea() ;
						
					}
				</script> 
                
			</div> <!-- Main Area -->
			


	 </div> <!-- content  -->
	</div> <!-- content container -->

	<div id="footer">
        &copy; All Rights Reserved.
	</div>
  
  

  </body>
  
  </html>
