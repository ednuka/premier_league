<div id="page-wrapper" >
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Match Results</h1>
        </div>
    </div>


    <div class="row">
        
        <div class="col-lg-6">
            <div class="table-responsive " id="Menu">
                <table  class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Week</th>
                            <th>Team 1</th>
                            <th>Score</th>
                            <th>Team 2</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($results as $row) {
                            echo "<tr>"
                            . "<td>$row->week</td>"
                            . "<td>$team1_name[$i]</td>"
                            . "<td>$row->first_score -  $row->second_score</td>"
                            ."<td>$team2_name[$i]</td>"
                            . "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-3"></div>


    </div>

</div>




