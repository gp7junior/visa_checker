<?php
function formProcess(){
        if (isset($_POST['submit'])){ //checking if the form is submitted
            global $connection; 

            $origin = $_POST['code_country_orig']; // getting values passed by the POST object and setting them into variables
            $destin = $_POST['code_country_dest'];
            // echo "selected country of origin: " . $origin . "<br>";
            // echo "selected country of destin: " . $destin . "<br>";
        
            $query  = "SELECT * FROM country_visa ";
            $query .= "WHERE (code_country_orig = '$origin' AND code_country_dest = '$destin') ";
            $query .= "   OR (code_country_orig = '$destin' AND code_country_dest = '$origin');";

            $result = mysqli_query($connection,$query);

            $output  ="<div class='row'> 
                        <div class='col-sm-2 my-auto'>
                        </div>
                        <div class=' col-sm-3'>";
            $country_name = mysqli_fetch_assoc(mysqli_query($connection,"SELECT country_name FROM COUNTRIES WHERE country_code = '$origin'"))["country_name"];
            $output .=          "<p>" . $country_name . "</p>";
            $output .=" </div>
                        <div class='col-sm-2 my-auto'>
                        </div>
                        <div class=' col-sm-3'>";
            $country_name = mysqli_fetch_assoc(mysqli_query($connection,"SELECT country_name FROM COUNTRIES WHERE country_code = '$destin'"))["country_name"];
            $output .=          "<p>" . $country_name . "</p>
                        </div>
                        </div> <br>";

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $visa_required = $row["visa_required"];
                    
                                
                    if ($visa_required < 4){
                        $card_text .=  "<div class='alert alert-info' role='alert'>You need a visa to this destination </div>";
                        $card_text .=  "<a href='#' class='btn btn-primary'>Get your visa!</a>";
                    }elseif($visa_required >= 4 && $visa_required <=6 ){
                        $card_text .=  "<div class='alert alert-info' role='alert'>You do not need a visa to this destination </div>";
                    }

                    $new_query = "SELECT * FROM visa_types WHERE id_type =$visa_required";
                    $new_result = mysqli_query($connection,$new_query);

                    while($new_row = mysqli_fetch_assoc($new_result)) {
                        $image_name = $new_row["type_image"];
                        $type_info = $new_row["type_info"]; 
                        $output .= "
                        <div class='card mx-auto' style='max-width: 540px; padding: 7px;'>
                            <div class='row no-gutters'>
                                <div class='col-md-4'>
                                <br>
                                    <img class='card-img-top' src='visa_icons/$image_name' heigt='62' width='62' alt='Card image cap'>
                                </div>
                                <div class='col-md-8'>
                                    <br>
                                    <h5 class='card-title my-auto'>Result: $type_info </h5>
                                    <div class='card-body'>
                                        <p class='card-text'> $card_text </p>
                                    </div>
                                </div>
                            </div>
                        </div> ";
                    }
                    

                }
            } else {
                $output .=  "<div class='alert alert-info' role='alert'>no visa information on the database!</div>";
            }

            echo $output;

            mysqli_close($connection);
        }
}
?>

<!-- TODO ORGANIZE THE LAYOUT -->