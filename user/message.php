<?php
//connecting to database
$conn = mysqli_connect("localhost", "root","","chatbot") or die("Database Error");
mysqli_query($conn,"SET CHARACTER SET UTF8");

// getting user message through ajax
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);

//checking user query to database query
$check_data = "SELECT replies FROM chatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database to the user query
    $fetch_data =mysqli_fetch_assoc($run_query);
    //stooring replay to a varible which we'll send to ajax
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo"ไม่พบข้อมูล";
} 

?>
