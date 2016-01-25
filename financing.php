<?php
if (isset($_GET['VendorCode'])) {
  $eblt = $_GET['VendorCode'];
} else {
  exit;
}
 
if (isset($_GET['ProductName'])) {
  $description = $_GET['ProductName'];
} else if (isset($_GET['productName'])) {
  $description = $_GET['ProductName'];
} else {
  $description = '';
}

if (isset($_GET['ButtonSize'])) {
  $button = $_GET['ButtonSize'];
} else {
  $button = 'CheckWithGradiantSmall';
}

if (isset($_GET['AmountToFinance'])) {
  $amount = $_GET['AmountToFinance'];
} else {
  $amount = 1000;
}

if (isset($_GET['Term'])) {
  $term = $_GET['Term'];
} else if (isset($_GET['term'])) {
  $term = $_GET['term'];
} else {
  $term = 48;
}

$rates = array (
  '1000-3000' => array (
    '24' => 0.0501,
    '36' => 0.0362,
    '48' => 0.0295
  ),
  '3001-15000'=> array (
    '24' => 0.0483,
    '36' => 0.0343,
    '48' => 0.0274,
    '60' => 0.0234    
  ), 
  '15001-30000' => array (
    '24' => 0.0481,
    '36' => 0.0340,
    '48' => 0.0272,
    '60' => 0.0231
  ),
  '30001-50000' => array (
    '24' => 0.0478,
    '36' => 0.0337,
    '48' => 0.0268,
    '60' => 0.0228
  ),
  '50001-1000000' => array (
    '24' => 0.0474,
    '36' => 0.0335,
    '48' => 0.0267,
    '60' => 0.0227
  ),
);

foreach ($rates as $ranges => $rate) {
  $range = explode('-', $ranges);
  if ($amount >= $range[0] && $amount <= $range[1]) {
    $theRate = $rate[$term];
  } else {
    continue;
  }
}
$monthly = ($amount * $theRate) ; 
?>
<!DOCTYPE html>
<html>
<head>
 <style>
  html, body {
    margin:0;
    padding:0;
  }
  .smallText {
    font-size:10px;
    color:#000;
    font-weight:bold;
  }
  
  .red {
    color:red;
    font-weight:bold;
    font-size:12px;
  }
  .buttonContainer {
    display:block;
  }
  
  .buttonContainer.CheckWithGradiantSmall {
    width:160px;
    height:62px;
    display:block;
    text-decoration:none;
    font-family:arial;
  }
   .buttonContainer.CheckWithGradiantSmall .button {
    background-color:#ccc;
    border-radius:4px;
    padding:5px;
    top:20px;
    margin-left:20px;
    margin-top:20px;
    background: #f2f5f6; /* Old browsers */
    background: -moz-linear-gradient(top,  #f2f5f6 0%, #e3eaed 37%, #c8d7dc 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f2f5f6), color-stop(37%,#e3eaed), color-stop(100%,#c8d7dc)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #f2f5f6 0%,#e3eaed 37%,#c8d7dc 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #f2f5f6 0%,#e3eaed 37%,#c8d7dc 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #f2f5f6 0%,#e3eaed 37%,#c8d7dc 100%); /* IE10+ */
    background: linear-gradient(to bottom,  #f2f5f6 0%,#e3eaed 37%,#c8d7dc 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f5f6', endColorstr='#c8d7dc',GradientType=0 ); /* IE6-9 */
    border:1px solid black;

  }
  .CheckWithGradiantSmall .centerText {
    text-align:center;
  }
  .CheckWithGradiantSmall .circle {
  
    margin-top:-20px;
    margin-left:-20px;
    float:left;    
    border-radius:50%;
    height:30px;
    width:30px;
    top:0;
    left:0;
    background: #b6e026; /* Old browsers */
    background: -moz-linear-gradient(top,  #b6e026 0%, #abdc28 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b6e026), color-stop(100%,#abdc28)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #b6e026 0%,#abdc28 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #b6e026 0%,#abdc28 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #b6e026 0%,#abdc28 100%); /* IE10+ */
    background: linear-gradient(to bottom,  #b6e026 0%,#abdc28 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b6e026', endColorstr='#abdc28',GradientType=0 ); /* IE6-9 */
    border:3px solid #eee;
    

  }
  .CheckWithGradiantSmall .apply {
    margin-left:20px;
    margin-top:2px;

  }
 </style>
</head>
<body>






<?php switch($button): 

case "test":
break;
?>


<?php 

default: ?>
<a target="_blank" href="https://www.elbtools.com/secure/apply.php?elbt=<?php echo $eblt;?>&calc_lease_amount=<?php echo $amount?>&calc_eq_descr=<?php echo $description;?>" class="buttonContainer CheckWithGradiantSmall">

<div class="button">
<div class="circle"><img style="margin-left:-2px;margin-top:-2px;" src="images/checkbox-01.png"></div>
<div class="smallText centerText">Finance as low as...</div>
<div class="red centerText">$<?php echo ceil($monthly)?> / month</div>
</div>
<div class="smallText centerText apply">Click to Apply Now</div>
</a>

<?php break; ?>

<?php endswitch; ?>

</body>
</html>