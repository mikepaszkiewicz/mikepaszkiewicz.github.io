<?php
if($_SERVER["HTTPS"] != "on") {
   header("HTTP/1.1 301 Moved Permanently");
   header("Location: https://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
   exit;
}

include_once('tcpdf/tcpdf.php');
include_once('tcpdf/config/lang/eng.php');
include_once('credit/form-class.php');
include_once('credit/validation.php');
include_once('credit/states.php');

    
if (isset($_REQUEST["Reset_Application"])) {
  header("Location: ".$_SERVER['PHP_SELF']);
  exit;
}


   

$hash = md5($_REQUEST["full_legal_name"]. date('Y-m-d H:i:s'));

$validate = new validate();
if (isset($_REQUEST) && $_SERVER['REQUEST_METHOD'] == "POST") {

  $validate->checkValidation($validation, $_REQUEST);
}
    $form = new form();

    
    
    if ($validate->is_valid == 1) {
      $form->publish = 1;
    } else {
      $form->publish = 0;
      $form->errors = $validate->errors;
    }
    
if (isset($_REQUEST["Print_Application"])) {

  $PDFcreate = 1;
  $PDFoption = 'I';
  $PDFsecure = 0;
  $form->publish = 1;  
  $string = get_include_contents('credit/application.php', $form, $state_list);
  $form->publish = 0;
} else if ($form->publish == 1) {
  $PDFcreate = 1;
  $PDFoption = 'F';
  $PDFsecure = 1;
  $string = get_include_contents('credit/application.php', $form, $state_list);
} else {
  $string = get_include_contents('credit/form.php', $form, $state_list);
}   






     
function get_include_contents($filename, $form, $states) {
    if (is_file($filename)) {
        ob_start();
        include ($filename);
        return ob_get_clean();
    }
    return false;
}
if (isset($PDFcreate) && $PDFcreate == 1) {
  $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  
    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetAuthor('VENDLEASE');
    $pdf->SetTitle('CREDIT APPLICATION');
    $pdf->SetSubject('CREDIT APPLICATION');
    $pdf->SetKeywords('CREDIT, Application');
    // remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    // set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
    //set margins
    $pdf->SetMargins(10, 10, 10);
    //set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    //set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
    //set some language-dependent strings
    $lg = Array();
    $lg['a_meta_charset'] = 'ISO-8859-1';
    $lg['a_meta_dir'] = 'ltr';
    $lg['a_meta_language'] = 'en';
    $lg['w_page'] = 'page';
    //set some language-dependent strings
    $pdf->setLanguageArray($lg);
// ---------------------------------------------------------
    $pdf->AddPage();
    $pdf->writeHTML($string, true, false, true, false, '');  
  
    // *******************************************************************
    // reset pointer to the last page
    $pdf->lastPage();

    // ---------------------------------------------------------

    //Close and output PDF document

    //header('Content-type: application/pdf');
    //header('Content-Disposition: attachment; filename="downloaded.pdf"');

    if (isset($PDFsecure) && $PDFsecure == 1) {

      $pdf->SetProtection(
        array(),
        'VLC-'.date('m-d-Y'),
        'ADMIN'.date('m-d-Y'),
        '3',
        null
       );

     } 
     


    $pdfcontent = $pdf->Output('', 'S');
    

    $pdf->Output('files/applications/'.$_REQUEST["full_legal_name"].'-'.date('m-d-Y H:i:s').'-'.$hash.'.pdf', $PDFoption);
    }
if ($form->publish) {     
$htmlbody = "This form was submitted on ". date('m-d-Y')." at ". date("H:i:s"). " by " . $_SERVER["REMOTE_ADDR"];
$textmessage = "This form was submitted on ". date('m-d-Y')." at ". date("H:i:s"). " by " . $_SERVER["REMOTE_ADDR"];

//Set Recipient Address
//$to = "jmccloskey@vendlease.net,dsigai@vendlease.net,patrick@ddsystems.net,jason@ddsystems.net";
$to = "sales@vendlease.net,info@vendlease.net";


//Set Email Subject
$subject = "Online Submission from vendlease.net";

//define the from \ reply to headers
$headers = "From: no-reply@vendlease.net\nReply-To: no-reply@vendlease.net";

//create a unique boundary string to delimit different parts of the email (plain text, html, file attachment)
$random_hash = md5(date('r', time()));

//add boundary string and mime type specification
$headers .= "\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\"";

//read the atachment file contents into a string,
//encode it with MIME base64,
//and split it into smaller chunks for sending
$attachment = chunk_split(base64_encode($pdfcontent));

//define the body of the message.
$message = "--PHP-mixed-$random_hash\n"
."Content-Type: multipart/alternative; boundary=\"PHP-alt-$random_hash\"\n\n";
$message .= "--PHP-alt-$random_hash\n"
."Content-Type: text/plain; charset=\"iso-8859-1\"\n"
."Content-Transfer-Encoding: 7bit\n\n";

//Insert the plain text message.
$message .= strip_tags($textmessage);
$message .= "\n\n--PHP-alt-$random_hash\n"
."Content-Type: text/html; charset=\"iso-8859-1\n"
."Content-Transfer-Encoding: 7bit\n\n";

//Insert the html message.
$message .= $htmlbody;
$message .="\n\n--PHP-alt-$random_hash--\n\n";

//include attachment
$message .= "--PHP-mixed-$random_hash\n"
."Content-Type: application/pdf name=\"Form Submission ".date('m-d-Y').".pdf\"\n"
."Content-Disposition: attachment;\n"
." filename=\"Form Submission ".date('m-d-Y').".pdf\"\n"
."Content-Transfer-Encoding: base64\n\n";
$message .= $attachment ."\n\n";
$message .= "--PHP-mixed-$random_hash--";
//send the email

    // Send the message
    $ok = @mail($to, $subject, $message, $headers);
    if ($ok)  { 
     $string =<<<EOF
    <br><br>
     <h2 class="centerText">Thank you for your application. <br /><br />  Vend Lease Company, Inc.  will provide you with a response within hours of your submission. <br /><br /> If you have any questions please call 888-363-5327 x138 or x131</h2>
     <br><br>
EOF;
    } else {
      $form->publish = 0;
      $string = get_include_contents('credit/application.php', $form);
      $string = "<br /><h2 class=\"errors centerText\">Error sending application, please try again later.</h2>".$string;

    }
}  

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><!-- InstanceBegin template="/Templates/default.dwt" codeOutsideHTMLIsLocked="false" -->
<head>
<!-- InstanceBeginEditable name="doctitle" -->
	<title>Vend Lease Credit Application</title>
	<!-- InstanceEndEditable -->
<link type="text/css" rel="stylesheet" href="styles/reset-fonts-grids-min.css">
<link type="text/css" rel="stylesheet" href="styles/default.css">

<script type="text/javascript" src="flashobject.js"></script>
<!-- InstanceBeginEditable name="head" -->
<style type="text/css" media"screen">

	li#home a:link, li#home a:visited {
	    background: #166087;
		}
		li#home a:hover{
		background-color: #fe8d1b;
		}
</style>
<!-- InstanceEndEditable -->
<script type="text/javascript">
function MM_CheckFlashVersion(reqVerStr,msg){
  with(navigator){
    var isIE  = (appVersion.indexOf("MSIE") != -1 && userAgent.indexOf("Opera") == -1);
    var isWin = (appVersion.toLowerCase().indexOf("win") != -1);
    if (!isIE || !isWin){  
      var flashVer = -1;
      if (plugins && plugins.length > 0){
        var desc = plugins["Shockwave Flash"] ? plugins["Shockwave Flash"].description : "";
        desc = plugins["Shockwave Flash 2.0"] ? plugins["Shockwave Flash 2.0"].description : desc;
        if (desc == "") flashVer = -1;
        else{
          var descArr = desc.split(" ");
          var tempArrMajor = descArr[2].split(".");
          var verMajor = tempArrMajor[0];
          var tempArrMinor = (descArr[3] != "") ? descArr[3].split("r") : descArr[4].split("r");
          var verMinor = (tempArrMinor[1] > 0) ? tempArrMinor[1] : 0;
          flashVer =  parseFloat(verMajor + "." + verMinor);
        }
      }
      // WebTV has Flash Player 4 or lower -- too low for video
      else if (userAgent.toLowerCase().indexOf("webtv") != -1) flashVer = 4.0;

      var verArr = reqVerStr.split(",");
      var reqVer = parseFloat(verArr[0] + "." + verArr[2]);
  
      if (flashVer < reqVer){
        if (confirm(msg))
          window.location = "http://www.macromedia.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash";
      }
    }
  } 
}
</script>
<script src="scripts/AC_RunActiveContent.js" type="text/javascript"></script>
  <?php if (!$form->publish) { ?>
<link type="text/css" rel="stylesheet" href="styles/credit-form.css">  
  <?php } else { ?>
<link type="text/css" rel="stylesheet" href="styles/credit-published.css">
  <?php } ?>
  

  <?php if ($form->publish) { ?>
  
  <style>
    table.mainTable, table.mainTable td {
      border:1px solid black;
      font-size:28px;
      padding:3px;
    }

    .sub-table table, .sub-table td {
      border:1px solid white;

    }
    .published {
      font-weight:bold;
      font-size:32px;
    }
    .ghost-text {
      color:#ccc !important;
      font-weight:bold !important; 
      color:red;
    }  
  </style>

<?php } ?>
<script src="/js/jquery.js"></script>
<script src="/js/jquery.maskedinput.js"></script>
<script src="/js/jquery.priceformat.js"></script>
 
<script>

  
  $(function()  {
   //$(".date").mask("?**/**/**");
   //$(".phone").mask("?**9-999-999? ext:99999");
   //$(".mobile").mask("?**9-999-9999");
   //$(".fax").mask("?**9-999-9999");
   $(".tin").mask("?**-999999");
   //$(".ssn").mask("?**9-99-9999");


    $('.ghost-text').each(function(){
        var d = $(this).val();
        $(this).focus(function(){
            if ($(this).val() == d){
                $(this).val('').removeClass('ghost-text');
            }
        });
        $(this).blur(function(){
            if ($(this).val() == ''){
                $(this).val(d).addClass('ghost-text');
            }
        });
    });
    
    $(document).on('keydown', '.ssn', function() {
        var curchr = this.value.length;
		    var curval = $(this).val();
		    if (curchr == 3) {
			     $(this).val(curval + "-");
		    } else if (curchr == 6) {
			   $(this).val(curval + "-");
			  }
      });
      
      $(document).on('keydown', '.date', function() {
        var curchr = this.value.length;
		    var curval = $(this).val();
		    if (curchr == 2) {
			     $(this).val(curval + "/");
		    } else if (curchr == 5) {
			   $(this).val(curval + "/");
			  }
      });      
      
      
      $(document).on('keydown', '.mobile, .fax, .phone', function() {
        var curchr = this.value.length;
		    var curval = $(this).val();
		    if (curchr == 3) {
			     $(this).val(curval  + "-");
		    } else if (curchr == 7) {
			   $(this).val(curval + "-");
			  }
			  
			  
      });      
   $(document).on('change', '.price', function() {
       //var curchr = this.value.length;
    });
    
    $('.price').priceFormat({
     prefix: "$",
     
    });

  function transform( obj ) {
    var val = obj.value.replace( /\D/g, '' );
    if ( /^(\d{3})(\d{3})(\d{4})$/.test( val ) ) {
      obj.value = RegExp.$1 + '   ' + RegExp.$2 + '-' + RegExp.$3;
    } else {
      alert( 'Invalid input: ' + obj.value );
    }
  }


    

  });

</script>  
</head>

<body id="yahoo-com" onLoad="MM_CheckFlashVersion('7,0,0,0','Content on this site requires a newer version of Macromedia Flash Player. Do you want to download it now?');">
<div id="doc3" class="yui-t4"><!-- "doc" here for example only; use any page width -->			
	<div id="hd">
		<!-- the following div is for search engines -->
		<div class="ct">
			<div class="replace">
				<h1>Vend Lease Company, Inc. Established 1979</h1>
				<h2>You can't buy success ... but you can lease it.</h2>
			</div>
			
			
			<table width="100%" border="0" cellspacing="0" cellpadding="0" valign="top">
  <tr>
    <td width="515" valign="top"><div class="headerImage"><img src="layout/headerLogo.gif" height="93"  ></div></td>
    <td width="100%" valign="top"></td>
    <td width="400" valign="top">
	<div id="firstflash">
You do not have Flash Player installed...install the player by clicking on the link.
<a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Get Player</a>
 
</div>
      <script type="text/javascript">
   var fo = new FlashObject("layout/keyWords.swf", "firstflash", "400", "93", "8,0,0,0", "#000000");
   fo.addParam("quality", "high");
   fo.write("firstflash");
</script>
</td>
  </tr>
</table>

			<div class="topNav">
				<ul id="navlist">
					<li id="home"><a href="index.htm">Home</a></li>
					<li id="customer"><a href="customerbenefits.htm">Customer Benefits</a></li>
					<li id="vendor"><a href="vendorbenefits.htm">Vendor Benefits</a></li>
                    <li id="apply"><a href="applynow.htm">Apply Now</a></li>
					<li id="about"><a href="aboutus.htm">About Us</a></li>
					<li id="our"><a href="ourteam.htm">Our Team</a></li>
                    <li id="news"><a href="news.htm">News</a></li>
					<li id="contact"><a href="contact.htm">Contact Us</a></li>
				</ul>
		  </div>
	  </div>
	</div>
	<div id="bd">

    <table class="contParent01" >
      <tr>
        <td align="left" valign="top" class="contWind02">
          <table width="100%" border="0" cellspacing="0" cellpadding="0"></table>
            <!-- InstanceBeginEditable name="EditRegion1" -->
      	  <table class="pageTitle">
            <tr>
              <td background="images/titBlank.gif" class="title" >Vend Lease Credit Application</td>
            </tr>
          </table>

          <?php
              echo $string;
              
              
          ?>
          <!-- InstanceEndEditable -->
        </td>
    </tr>
    </table>
	</div>

</div>

</body>
<!-- InstanceEnd --></html>

