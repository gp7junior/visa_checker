<?php include "header.php"; ?>

<?php include "db.php"; ?>

<?php include "functions.php"; ?>
 
    
<div class="vertical-center text-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-2 my-auto">
                <img src="icons/passport.svg" heigt="62" width="62">
            </div>
                
            <div class="col-sm-3 my_auto">
                <h2>Where I am From?</h2>
                <h5>Nationality as in passport</h4>
                </div>
                <div class="col-sm-2 my-auto">
                    <img src="icons/destination.svg" heigt="62" width="62">
                </div>

                <div class="col-sm-3 my-auto">
                    <h2>Where I am Going?</h2>
                    <h5>Travelling to</h5>
                </div>
                <div class="col-sm-2 my-auto">
                    <img src="icons/world.svg" heigt="62" width="62">
                </div>
            </div> 
            <!-- end col -->
            <?php include "form_check_visa.php"; ?>
            <?php formProcess(); ?>
        </div>
    </div>
   
</div>
    </div>
    
</div>


<?php include "footer.php";?>

<!-- TODO ORGANIZE THE LAYOUT -->