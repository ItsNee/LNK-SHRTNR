<?php

include 'init.php';



if (empty($_GET['code']))
{
  header('Location: ../cdenoexst');
} 

$getCode = $_REQUEST['code'];
print_r($getCode);
$query = "SELECT link FROM lnk WHERE code = '$getCode'";
$result = mysqli_query($conn, $query);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        header("Location: " .  $row['link'] . " ");
        // echo "link: " . $row["link"]. "<br>";
    }
    } else {
    // echo "0 results";
    header('Location: ../cdenoexst');
    }
$conn->close();
?>
<script>

window.onload = function(){
     window.open(<?php $row['link'] ?>, "_blank"); // will open new tab on window.onload
}
</script>