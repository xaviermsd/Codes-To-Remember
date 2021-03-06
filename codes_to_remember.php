<?php
/* CODES TO REMEMBER */

/* PHP */

//Connection Paramaters
mysqli_connect($host,$user,$password,$db_name);

//Die Function for MSQL Error
die("Something is wrong becouse  ".mysqli_connect_error());

//Insert query with Die query error
$query="INSERT INTO `regi_form` (`First Name`, `Last Name`, `Company`, `Email`, `Phone`, `Subject`, `Developer`) VALUES ('$fname', '$lname', '$company', '$email', '$phone', '$subject', '$developer');";  
$run=mysqli_query($con,$query);
if($run)
{
    $success="Registered Successfully!";
}
else
{
    die("Something is wrong with ".mysqli_error($con));
}

//select Fatch Rows and Shows data in Array

$query="SELECT * FROM `regi_form`";
$run=mysqli_query($con,$query);
$res=mysqli_num_rows($run);

//Take in while to fatch it as in While loop
$res=mysqli_fetch_array($run);

//like 
while($res=mysqli_fetch_array($run))
{
    echo $res['Table name field'];
}

//______________________________________________________________________________
//update Radio button, Checkbox and dropdown
//https://www.phptpoint.com/update-radio-button-drop-down-list-and-checkboxes-in-php/

//For Radio
//Do this first
//like 
while($res=mysqli_fetch_array($run))
{
    echo $res['Table name field'];
}
//Then
//Besides of Value e.g -
?>
<input type="radio" checked="checked" name="exist" value="Yes" <?php if($arrayData['Developer']=="Yes"){ echo "checked";}?>>
<?php

//For Checkbox
//First same as above array loop then,
$chkbox=$arrayData['Technologies'];
$tech=explode(",",$chkbox);
?>
<input <?php if(in_array("MEAN",$tech)){echo "checked";}?> type="checkbox" name="technologies[]" value="MEAN">

<?php
//For Drop Down
//Same process as above
?>
<option <?php if($arrayData['Subject']=="Subject 1"){echo "selected";}?> selected="selected" value="Subject 1">Subject 1</option>
<?php


//______________________________________________________________________________
//Functions Save From SQL Injection, Harmful Code or Invalid Data
//Function to clean the submitted data 
function clean_input($fields){
    $fields=trim($fields); //Cleans White Spaces
    $fields=stripslashes($fields); //Quoated Strins to HTML
    $fields=htmlspecialchars($fields); //Charaters to HTML
    return $fields;
}

//To Get Multiple values from Checkbox
//For e.g
$technologies=$_POST['technologies'];
$tech="";
foreach ($technologies as $tech1){
    //$tech.=$tech2.',';
    $tech=$tech.$tech1.',';
}
/*
* PHP Loops
*/

$i = 1;
$colors = array ("red", "green", "blue", "yellow");
//While Loop
while ($i <= 5) {
    //code to be executed
    echo "This number is ".$i."<br>";
    $i++;
}

//Do-While Loop
do {
    echo "This number is ".$i."<br>";
    $i++;
} while ($i <= 5);


//For Loop
for ($x = 0; $x <= 100; $x+=10) {
    echo "This number is ".$x."<br>";   
}

//Foreach Loop
foreach($colors as $value) {
    echo "This color is ".$value."<br>";
}

/*
* PHP Arrays With An Example
*/

//Indexed Arrays
$brands = array("Samsung", "Nokia", "Apple", "Motorola");

$phones[10] = "Galaxy S10";
$phones[20] = "iPhone 11";
$phones[30] = "Nokia 6.2";

//Associative Arrays
$persons = array("Kashif"=>"00123454", "Aslam"=>"012457896", "Rasahid"=>"6579478" );
//echo "Kashif's Phone Number Is: ".$persons["Kashif"];

$products = array(
    array(1, "Galaxy S10",10,799),
    array(2, "iPhone 11", 20, 999),
    array(3, "Nokia 6.2", 10, 499)
);
//echo $products[1][1]."'s Price is $".$products[1][3]." and stock count is ".$products[1][2];

/* Form Validation Feilds */
 // Check if field contains only letters and white spaces
 if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
    $nameErr = "Only letters and white spaces are allowed";
}

// Check valid email ID with built-in function
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Enter a valid Email ID";
}

// Check if it's a valid URL: Check this guide for in-depth regular expression explaination https://www.guru99.com/php-regular-expressions.html
if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
    $websiteErr = "Invalid URL";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Arrays in PHP</title>
</head>
<body>
    <h2>Brands</h2>
    <ul>
    <?php 
        foreach($brands as $value) {
            echo "<li>".$value."</li>";
        }
    ?>
    </ul>
    <h2>Phones</h2>
    <ul>
    <?php 
        foreach($phones as $value2) {
            echo "<li>".$value2."</li>";
        }
    ?>
    </ul>
    <h2>Phone Numbers</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Phone Number</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($persons as $x => $y) {
                    echo "<tr><td>".$x."</td><td>".$y."</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <h2>Products</h2>
    <table>
        <thead>
            <tr>
                <th>ID </th>
                <th>Product Name</th>
                <th>Stock</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($products as $row) {
                    echo "<tr>";
                        foreach ($row as $col) {
                            echo "<td>".$col."</td>";
                        }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>

/*===================
 String Functions
===================*/
//String Length
echo strlen($string);

//Count Words in a String
echo str_word_count($string);

//Reverse a string
echo strrev($string);

//Search for a text
echo strpos($string, "that");

//Replace text in a string
echo str_replace("information", "data", $string);

/*===================
 Numeric Functions
===================*/

//Is Integer
var_dump( is_int($num) );

//Is Float
var_dump( is_float($float) );

//Is Number
var_dump(is_numeric($string_number));

//Casting Strings and Floats to Integers
$int_cast = (int)$float;
$int_cast = (int)$string_number;
var_dump($int_cast);

?>