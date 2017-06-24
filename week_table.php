﻿<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo"First $week Week"?></h1>
        </div>
    </div>
  <?php echo form_open_multipart('league/next_week'); ?>
    <input type="hidden" name="max_week" value="<?php echo $week_number ?>" />
   <input type="hidden" name="week" value="<?php echo $week+1 ?>" />
   
    <div class="row">

        <div class="col-lg-6">
            <div class="table-responsive " id="Menu">
                <table  class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Team</th>
                            <th>Played</th>
                            <th>Won</th>  
                            <th>Drawn</th>
                            <th>Lost</th>
                            <th>GF</th>
                            <th>GA</th>
                            <th>GD</th>
                            <th>Points</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($team_name); $i++) {
                            echo
                            "<tr>"
                            . "<td>$team_name[$i]</td>"
                            . "<td>$played[$i]</td>"
                            . "<td>$won[$i]</td>"
                            . "<td>$drawn[$i]</td>"
                            . "<td>$lost[$i]</td>"
                            . "<td>$gf[$i]</td>"
                            . "<td>$ga[$i]</td>"
                            . "<td>$gd[$i]</td>"
                            . "<td>$point[$i]</td>"
                            . "</tr>";
                        }
                        ?>
                    </tbody>
                </table>



            </div>
        </div>
        <div class="col-lg-3"></div>


    </div>
    
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">
                <div class="form-group">
                    <div class="cols-sm-10"></div>
                    <div class="cols-sm-2">
                        <button class='btn btn-lg btn-success' type='submit'>Next Week</button>
                    </div>
                </div>
            </div>
            
</div>
    
    <?php echo form_close(); ?>

</div>




