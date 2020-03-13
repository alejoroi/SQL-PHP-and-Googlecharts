<nav class="topnav">
<ul>
<?php
foreach($pageNames as $k=>$p){
    $class = $k === $page ? 'class="selected" ' : "";
    echo "<li $class><a  href=\"?p=$k\">$p</a></li>";
}

?>
</ul>
<?php
include './inc/content.php';
?>
</nav>