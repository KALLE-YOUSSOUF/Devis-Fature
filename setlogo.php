l<?php
require_once 'php_action/db_connect.php'; 
require_once 'includes/header.php';
?>


    <div class="pageheader">
      <h2><i class="fa fa-cog"></i> Logo </h2>
    </div>

    <div class="contentpanel">

      <div class="row">

        <div class="col-md-12">
      
      <div class="panel panel-default">
        <!--div class="panel-heading">
          <div class="panel-btns">
            <a href="#" class="panel-close">×</a>
            <a href="#" class="minimize">−</a>
          </div>      
        </div-->
        <div style="display: block;" class="panel-body panel-body-nopadding">
          

    <?php
if(isset($_FILES['bgimg']['name'])){
// IMAGE UPLOAD //////////////////////////////////////////////////////////
	$folder = "assests/images/";
	$extention = strrchr($_FILES['bgimg']['name'], ".");
	$new_name = "logo";
	$bgimg = $new_name.'.png';
	$uploaddir = $folder . $bgimg;
	move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);
//////////////////////////////////////////////////////////////////////////

}

?>
							 <form name="" id="" action="" method="post" enctype="multipart/form-data" >
<br/>
				  
            <div class="form-group">
              <label class="col-sm-3 control-label">Logo</label>
              <div class="col-sm-6"><input name="bgimg" type="file" id="bgimg" /></div>
            </div>
                
            
            

            
            
        </div><!-- panel-body -->
        
        <div style="display: block;" class="panel-footer">
			 <div class="row">
				<div class="col-sm-6 col-sm-offset-3">
				<button type="submit" class="btn btn-primary btn-block">Télécharger</button>
				</div>
			 </div>
			 
			 
          </form>
          
			 
		  </div><!-- panel-footer -->
        
		
Logo actuelle: <br/><img src="assests/images/logo.png" width="300px;" height="120px" alt="IMG">

<br/><br/>Si le logo ne change pas appuyez sur "Ctrl + F5" pour rafraîchir votre navigateur<br/><br/>
		
		
      </div><!-- panel -->
      
     
      
     
      
      

     
     
    </div>
	  
	  
	  
       

       
      
      </div><!-- row -->

      
      
      
    </div><!-- contentpanel -->



 





 <?php require_once 'includes/footer.php'; ?>

 
 	
</body>
</html>