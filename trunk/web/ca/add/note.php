<?php 
	include 'gloo.inc';
	require_once ($_SERVER['GLOO_INC_DIR'].'class_loader.inc' );
	require_once ($_SERVER['GLOO_INC_DIR'].'error.inc' );
	
    //web/ca/add/note.php
	
	

?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head><title> org title   </title>


    <meta http-equiv="keywords" content="cms,gloov2">
    <meta http-equiv="description" content="gloov2 Notes add page">
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
 
   <LINK REL=StyleSheet HREF="<?php echo $glooBaseURI ?>/ca/css/main.css" TYPE="text/css" MEDIA=screen>
   
	<script type="text/javascript" src="<?php echo $glooBaseURI ?>/js/jsval.js"></script>
 	<script type="text/javascript" src="<?php echo $glooBaseURI ?>/js/fckeditor/fckeditor.js"></script>
		
    </head>
	
	<body>
  	<div id="conetnt_container">
		<div id="banner">
				 
				<img src="<?php echo $glooBaseURI ?>/ca/imgs/indigloo.gif"/> </div>
				 
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
				
			
				<h5> Add notes </h5>
				<!-- error messages -->
				
	
				<div id="form">
				<form name="ca_text_note_form"  action="<?php echo $glooBaseURI ?>/ca/forms/note.php"
					method="POST"  onSubmit="return validateStandard(this,'jsValError');" >
	
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
						<td class="field"> <span style="color:red;">*</span> Description:</td> 
						<td> &nbsp;(type detailed description below) </td>
					 </tr>
					 	
					<tr>
						
						<td colspan="2"><textarea  id="description"   name="description" ><?php echo $sticky->get2('description',$organization['description']); ?></textarea></td>
					</tr>
					 	
					
					
					<tr>
											
						<td>&nbsp;</td>
						<td id="bottomBar">
							<button type="submit" name="save" value="Save" onclick="this.setAttribute('value','Save');" ><span>Save</span></button>				
							&nbsp;&nbsp;
							<button type="button" name="cancel" onClick="javascript:clean_form();"><span>Cancel</span></button>		
	
	
						</td>
					</tr>
	
				</table>
				<input type="hidden" name="domain" value="<?php echo $organization['domain']; ?>"/>
				<input type="hidden" name="website" value="<?php echo $organization['website']; ?>"/>
				</form>
			</div> <!-- form -->	
			
			<!-- Add Fckeditor to textarea -->
			
				<script language="javascript" type="text/javascript">
					window.onload = function(){
						var oFCKeditor = new FCKeditor( 'description' ) ;
						oFCKeditor.BasePath = "/app/js/fckeditor/" ;
						oFCKeditor.Height = "480px" ;
						oFCKeditor.ToolbarSet = 'Gloo' ;
						oFCKeditor.ReplaceTextarea() ;
						jsValidation();
						
					}
				</script>
			
			</div>


	 </div> <!-- content  -->
	</div> <!-- content container -->

	<div id="footer">
	&copy; All Rights Reserved.
	</footer>
  
  	<div id="page-stats">
		<?php include ($_SERVER['GLOO_INC_DIR'].'t_footer.inc'); ?>
	</div>
	

	

  </body>
  
  </html>
