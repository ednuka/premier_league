<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Enter Match Scores</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <?php echo form_open_multipart('league/insert_score'); ?>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-3">
             <div class="form-group">
            <label for="week" class="cols-sm-2 control-label">Week: </label>
            <div class="cols-sm-10">
                <input type="number" name="week" class="form-control" />
            </div>
        </div>
        </div>
        <div class="col-lg-8"></div>
       
    </div>
    <div class="row">


        <div class="col-lg-4">
            <div class="row">


                <h3>Information Of Team-1</h3>


                <div class="form-group">
                    <label for="team1" class="cols-sm-2 control-label">Team 1 Name: </label>
                    <div class="cols-sm-10">
                        <select name="team1" id="team1" class="form-control">
                            <?php
                            foreach ($teams as $team) {
                                echo "<option value='$team->id'>$team->team_name</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="score1" class="cols-sm-2 control-label">Team 1 Score: </label>
                    <div class="cols-sm-10">
                        <input type="number" name="score1" class="form-control" />
                    </div>
                </div>




            </div>

        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-4">
            <h3>Information Of Team-2</h3>
            <div class="row">

                <div class="form-group">
                    <label for="team2" class="cols-sm-2 control-label">Team 2 Name: </label>
                    <div class="cols-sm-10">
                        <select name="team2" id="team2" class="form-control">
                            <?php
                            foreach ($teams as $team) {
                                echo "<option value='$team->id'>$team->team_name</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="score2" class="cols-sm-2 control-label">Team 2 Score: </label>
                    <div class="cols-sm-10">
                        <input type="number" name="score2" class="form-control" />
                    </div>
                </div>

                
            </div>
        
        </div>


    </div>
        <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-5">
                <div class="form-group">
                    <div class="cols-sm-10"></div>
                    <div class="cols-sm-2">
                        <button class='btn btn-lg btn-success' type='submit'>Save</button>
                    </div>
                </div>
            </div>
            
</div>

<?php echo form_close(); ?>

</div>



