<?php
$connect = mysqli_connect("localhost", "root", "", "cash_solution");
$output = '<div class="list-group">';

//SEARCH
if (isset($_POST["message"])) {
    $search = mysqli_real_escape_string($connect, $_POST["message"]);
    
    $query = "SELECT t_id, reciever_name, t_date FROM transaction WHERE acc_number LIKE '%".$search."%' OR deposit_number LIKE '%".$search."%' OR sender_name LIKE '%".$search."%'";
    $result = mysqli_query($connect, $query);

    if (mysqli_num_rows($result) > 0) {
       
        $output .=' <button type="button" class="list-group-item list-group-item-action active" style="background:green;">
                 ' . count(mysqli_num_rows($result)) . ' Result Found
                     
         </button>';
        while ($row = mysqli_fetch_array($result)) {
            $transactionid = $row['t_id'];
            $recievername = $row['reciever_name'];
            $transactiondate = $row['t_date'];
            
            $output .= '<a href="view-child-record.php?c_no=' . $transactionid . '"><button type="button" class="list-group-item list-group-item-action">Time: ' . $transactiondate . ' Reciever: ' . $recievername . '</button></a>';
        }

        echo $output . '</div>';
    } else {
        echo '<div class="list-group">
         <button type="button" class="list-group-item list-group-item-action active" style="background:green;">
                 No Result Found.
         </button>
      </div>';
    }
}
?>