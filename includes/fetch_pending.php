<?php
$connect = mysqli_connect("localhost", "root", "", "cash_solution");
$output = '<div class="list-group">';

//SEARCH   
    $query = "SELECT t_id, mg_name, location FROM transaction JOIN branch_office on transaction.branch_id = branch_office.branch_id WHERE comfirm = 1";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
       
        $output .='<div>'.count(mysqli_num_rows($result)).'</div> <button type="button" class="list-group-item list-group-item-action active" style="background:green;">
                 PENDING TRANSACTIONS </button>';
        while ($row = mysqli_fetch_array($result)) {
            $t_id = $row['t_id'];
            $location = $row['location'];
            $mgname = $row['mg_name'];
            
            $output .= '<div id="'.$t_id.'"><button type="button" class="list-group-item list-group-item-action">'
                    . '<div><h3>'.$location.'</h3><br><p>'.$mgname.'</p></div>'
                    . '</button></div>';
        }

        echo $output . '</div>';
    } else {
        echo '<div class="list-group">
         <button type="button" class="list-group-item list-group-item-action active" style="background:green;">
                 No Pending Found.
         </button>
      </div>';
    }
?>