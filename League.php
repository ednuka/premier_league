<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class League extends CI_Controller {

    public function index() {
        $data['main_content'] = "main_page";
        $data['menu'] = "includes/menu";

        $this->load->view('includes/template', $data);
    }

    public function result_form() {
        $data['main_content'] = "result_form";
        $data['menu'] = "includes/menu";
        $data['teams'] = $this->deleteadd_model->get_table('teams');
        $this->load->view('includes/template', $data);
    }

    function insert_score() {
        $score1 = $this->input->post('score1');
        $score2 = $this->input->post('score2');
        $team1 = $this->input->post('team1');
        $team2 = $this->input->post('team2');
        $values = array('week' => $this->input->post('week'),
            'first_team_id' => $team1,
            'second_team_id' => $team2,
            'first_score' => $score1,
            'second_score' => $score2);
       
        $insert = $this->deleteadd_model->insert('match_results', $values);
        if ($insert) {
            $msg = "Successfull";
        } else {
            $msg = "Failure";
        }
        ?>
        <script type="text/javascript" charset="utf-8">
            var base = "<?php echo $this->config->item('base_url'); ?>" + "index.php/";
            alert("<?php echo $msg ?>");
            window.location.href = base + 'league/show_results/';
        </script><?php
    }

    function show_results() {
        $data['menu'] = "includes/menu";
        $data['main_content'] = "match_results";
        $results = $this->deleteadd_model->get_table('match_results');
        $i = 0;
        foreach ($results as $result) {
            $cond1 = array('id' => $result->first_team_id);
            $cond2 = array('id' => $result->second_team_id);

            $data['team1_name'][$i] = $this->deleteadd_model->get_value('teams', $cond1, 'team_name');
            $data['team2_name'][$i] = $this->deleteadd_model->get_value('teams', $cond2, 'team_name');
            $i++;
        }$data['results'] = $results;
        $this->load->view('includes/template', $data);
    }

    function show_table($week) {
        $data['menu'] = "includes/menu";
        $data['main_content'] = "league_table";

        for ($i = 0; $i < $week; $i++) {
            $data['week'][$i] = $this->deleteadd_model->get_rows('match_results', 'week', $i + 1);
            $k = 0;
            foreach ($data['week'][$i] as $row) {
                $cond1 = array('id' => $row->first_team_id);
                $cond2 = array('id' => $row->second_team_id);

                $data['team1_name'][$i][$k] = $this->deleteadd_model->get_value('teams', $cond1, 'team_name');
                $data['team2_name'][$i][$k] = $this->deleteadd_model->get_value('teams', $cond2, 'team_name');
                $k++;
            }
        }
        $this->load->view('includes/template', $data);
    }

    function show_league_table() {
        $data['results'] = $this->deleteadd_model->get_table('teams');
        $data['menu'] = "includes/menu";
        $data['main_content'] = "lig_table";
        $this->load->view('includes/template', $data);
    }

    function weekly_league($week) {
$data['week']=$week;
        $results = $this->deleteadd_model->get_table('match_results');
        $i = 0;
        foreach ($results as $rw) {
            $weeks[$i] = $rw->week;
            $i++;
        }

        for ($i = 0; $i < count($weeks) - 1; $i++) {
            for ($j = $i + 1; $j < count($weeks); $j++) {
                if ($weeks[$i] < $weeks[$j]) {
                    $tmp = $weeks[$i];
                    $weeks[$i] = $weeks[$j];
                    $weeks[$j] = $tmp;
                }
            }
        }
        $data['week_number'] = $weeks[0];
        $teams = $this->deleteadd_model->get_table('teams');
        $i = 0;
        foreach ($teams as $tm) {
            $data['team_name'][$i] = $tm->team_name;
            $data['gf'][$i] = 0;
            $data['ga'][$i] = 0;
            $data['gd'][$i] = 0;
            $data['won'][$i] = 0;
            $data['lost'][$i] = 0;
            $data['drawn'][$i] = 0;
            $data['played'][$i] = 0;
            $data['point'][$i] = 0;
            for ($w = 1; $w <= $week; $w++) {
                $cond = array('week' => $w, 'first_team_id' => $tm->id);
                $results = $this->deleteadd_model->get_rows_cond('match_results', $cond);

                foreach ($results as $row) {
                    $data['played'][$i] ++;
                    $data['gf'][$i] += $row->first_score;
                    $data['ga'][$i] += $row->second_score;

                    if ($row->first_score > $row->second_score) {
                        $data['won'][$i] ++;
                        $data['point'][$i] += 3;
                    }
                    if ($row->first_score < $row->second_score) {
                        $data['lost'][$i] ++;
                    } if ($row->first_score == $row->second_score) {
                        $data['drawn'][$i] ++;
                        $data['point'][$i] ++;
                    }
                }

                $cond2 = array('week' => $w, 'second_team_id' => $tm->id);
                $results = $this->deleteadd_model->get_rows_cond('match_results', $cond2);
                foreach ($results as $row) {
                    $data['gf'][$i] += $row->second_score;
                    $data['ga'][$i] += $row->first_score;
                    $data['played'][$i] ++;

                    if ($row->second_score > $row->first_score) {
                        $data['won'][$i] ++;
                        $data['point'][$i] += 3;
                    }
                    if ($row->second_score < $row->first_score) {
                        $data['lost'][$i] ++;
                    } if ($row->second_score == $row->first_score) {
                        $data['drawn'][$i] ++;
                        $data['point'][$i] ++;
                    }
                }
            }
            $data['gd'][$i] = $data['gf'][$i] - $data['ga'][$i];

            $i++;
        }
        $data['menu'] = "includes/menu";
        $data['main_content'] = "weekly_lig_table";
        $this->load->view('includes/template', $data);
    }
    
    function week_league($week) {
$data['week']=$week;
        $results = $this->deleteadd_model->get_table('match_results');
        $i = 0;
        foreach ($results as $rw) {
            $weeks[$i] = $rw->week;
            $i++;
        }

        for ($i = 0; $i < count($weeks) - 1; $i++) {
            for ($j = $i + 1; $j < count($weeks); $j++) {
                if ($weeks[$i] < $weeks[$j]) {
                    $tmp = $weeks[$i];
                    $weeks[$i] = $weeks[$j];
                    $weeks[$j] = $tmp;
                }
            }
        }
        $data['week_number'] = $weeks[0];
        $teams = $this->deleteadd_model->get_table('teams');
        $i = 0;
        foreach ($teams as $tm) {
            $data['team_name'][$i] = $tm->team_name;
            $data['gf'][$i] = 0;
            $data['ga'][$i] = 0;
            $data['gd'][$i] = 0;
            $data['won'][$i] = 0;
            $data['lost'][$i] = 0;
            $data['drawn'][$i] = 0;
            $data['played'][$i] = 0;
            $data['point'][$i] = 0;
            for ($w = 1; $w <= $week; $w++) {
                $cond = array('week' => $w, 'first_team_id' => $tm->id);
                $results = $this->deleteadd_model->get_rows_cond('match_results', $cond);

                foreach ($results as $row) {
                    $data['played'][$i] ++;
                    $data['gf'][$i] += $row->first_score;
                    $data['ga'][$i] += $row->second_score;

                    if ($row->first_score > $row->second_score) {
                        $data['won'][$i] ++;
                        $data['point'][$i] += 3;
                    }
                    if ($row->first_score < $row->second_score) {
                        $data['lost'][$i] ++;
                    } if ($row->first_score == $row->second_score) {
                        $data['drawn'][$i] ++;
                        $data['point'][$i] ++;
                    }
                }

                $cond2 = array('week' => $w, 'second_team_id' => $tm->id);
                $results = $this->deleteadd_model->get_rows_cond('match_results', $cond2);
                foreach ($results as $row) {
                    $data['gf'][$i] += $row->second_score;
                    $data['ga'][$i] += $row->first_score;
                    $data['played'][$i] ++;

                    if ($row->second_score > $row->first_score) {
                        $data['won'][$i] ++;
                        $data['point'][$i] += 3;
                    }
                    if ($row->second_score < $row->first_score) {
                        $data['lost'][$i] ++;
                    } if ($row->second_score == $row->first_score) {
                        $data['drawn'][$i] ++;
                        $data['point'][$i] ++;
                    }
                }
            }
            $data['gd'][$i] = $data['gf'][$i] - $data['ga'][$i];

            $i++;
        }
        $data['menu'] = "includes/menu";
        $data['main_content'] = "week_table";
        $this->load->view('includes/template', $data);
    }
    
    function show_weekly()
    {
        $week=$this->input->post('week');
        $link='league/weekly_league/'.$week;
        redirect($link);
    }
    
     function next_week()
    {
        $week=$this->input->post('week');
        $week_number=$this->input->post('max_week');
       if($week>$week_number){
           ?>
        <script type="text/javascript" charset="utf-8">
            var base = "<?php echo $this->config->item('base_url'); ?>" + "index.php/";
            var week=<?php echo $week-1 ?>;
            alert("There is no next Week");
            window.location.href = base + 'league/week_league/'+week;
        </script><?php
        
       }
        else{$link='league/week_league/'.$week;
        redirect($link);}
    }

}
