<?php

// this requires typing the query string in the address bar.


// this is called routing - figuring out what data or page to load.

$page = 'home';  // the default page
$pageNames = ['home'=>"Home Page", 'charts'=>"Charts", 'contact'=>"Contact Us"];// these are the names of the pages we have set

if(isset($_GET['p'])){ //Check if page is set: isset(), strtolower()
   

    $tmpPage = strtolower($_GET['p']);

    if(array_key_exists($tmpPage, $pageNames)){// Use an associative array to store pages: array_key_exists($needle, $array)
        $page = $tmpPage;       
    }    
}

// echo $page; // this shows the page name at the top of the screen

include './inc/header.php';
include './inc/menu.php';
?>
<main>

<?php

require_once("./pages/$page.php");

?> 

</main>




<?php



include './inc/footer.php';

?>

<?php

$visits = 1;
if(isset($_COOKIE['visits'])){
    $visits = intval($_COOKIE['visits']);
    $visits++;
}


setcookie('visits',$visits,time()+60*60*24*30);
//   echo "Visites:$visits";
 
if(isset($_GET['delCookies'])) {
    setcookie('visites','',1);
}
?>