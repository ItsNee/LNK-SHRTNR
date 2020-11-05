<link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
<?php

include 'init.php';


if (empty($_POST['inputLink']))
{
  header('Location: /');
  exit; 
} 
else{
    $inputLink = $_REQUEST['inputLink'];
    if (preg_match_all('#[-a-zA-Z0-9@:%_\+.~\#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~\#?&//=]*)?#si', $inputLink )){
        if(preg_match_all('/http(s?)\:\/\//i', $inputLink)){
            $check = "OK";
        }
        else{
            $inputLink = "http://" . $inputLink;
        }
        //echo "ISSA URL";
        $query = "SELECT * FROM members";
        $result = mysqli_query($conn, $query);
        // $inputLink = $_REQUEST['inputLink'];
        // print_r($inputLink);


        function getRandomString($length = 5) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $string = '';

            for ($i = 0; $i < $length; $i++) {
                $string .= $characters[mt_rand(0, strlen($characters) - 1)];
            }

            return $string;
        }
        // echo "<br>";
        $code = getRandomString(); // randbois
        $query = "SELECT * FROM lnk WHERE code = '$code'";
        $result = mysqli_query($conn, $query);
        if ($result->num_rows > 0) {
            // output data of each row
            header('Location: cdeerror');
          } else {
            //echo "0 results";
            $codeCheck = 'Passed';
          }

        $query = "INSERT INTO lnk (code, link) VALUES ('$code', '$inputLink')";
		$result = mysqli_query($conn, $query);
    }
    else{
        //echo "ISSA nono";
        header('Location: lnkerror');
    }

}
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LNK SHRTNR || NEE</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="https://neeranjan.xyz">Nee</a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                    </ul>
                </div>
            </div>
        </nav>
        <header class="masthead">   
            <div class="container d-flex h-100 align-items-center">
                <div class="mx-auto text-center">
                    <h1 class="mx-auto my-0 text-uppercase">LNK SHRTNR</h1>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">A free and easy link shortner created by <a href="https://neeranjan.com">NEE</a></h2>
                    <h2 class="text-white-50 mx-auto mt-2 mb-5">SHRTND LINK = <a href="https://neeranjan.xyz/s/<?php print_r($code); ?>">NEERANJAN.XYZ/s/<?php print_r($code); ?></a></h2>
                    <div class="col-md-10 col-lg-8 mx-auto text-center">
                        <form action="/" method="get" class="form-inline d-flex">
                            <button class="btn btn-primary mx-auto" type="submit">DO IT AGAIN!</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>