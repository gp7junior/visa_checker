<form role="form" action="#" method="post">
                <div class="form-group row">
                    <div class="col-sm-2 my-auto">
                    <!-- empty col -->
                    </div>
                    <div class=" col-sm-3 my-auto">
                        <select class="form-control" name="code_country_orig">
                            <?php 
                                global $connection; 
                                $query  = "SELECT code_country_orig FROM country_visa";
                                $result = mysqli_query($connection, $query);
                                if(!$result){
                                        echo die('query failed' . mysqi_error());
                                } 
                                while($row = mysqli_fetch_assoc($result)){

                                    $code_country_orig = $row['code_country_orig'];
                                    echo "<option value=" . $code_country_orig . ">" . $code_country_orig . "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2 my-auto">
                    </div>
                    <div class="col-sm-3">
                        <select class="form-control" name="code_country_dest">
                        <?php 
                            global $connection; 
                            $query  = "SELECT code_country_dest FROM country_visa";
                            $result = mysqli_query($connection, $query);
                            if(!$result){
                                echo die('query failed' . mysqi_error());
                            } 
                            while($row = mysqli_fetch_assoc($result)){
                                $code_country_dest = $row['code_country_dest'];
                                echo "<option value=" . $code_country_dest . ">" . $code_country_dest . "</option>";
                            }
                        ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" value="Check Status" name="submit" class="btn btn-outline-primary">
                    </div>
                </div>
            </form>