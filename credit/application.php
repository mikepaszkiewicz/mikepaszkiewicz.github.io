<?php 
include_once('form-class.php'); 
include_once('../tcpdf/tcpdf.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>VendLease Credit Application</title>
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
            
  </style>

<?php } ?> 
</head>

<body>
<?php 
if (!isset($form)) {
//  $form = new form();
//  $form->publish=0;
} 
  
?>
<?php echo $form->create('CreditApp'); ?>
<br />
<table class="mainTable">
  <tr>
    <td  colspan="5" style="width:50%;">
    <table class="sub-table">
      <tr>
        <td>
        <img src="/images/vl-logo.png" style="float:left; width:161px;height:46px;">
        </td>
        <td style="text-align:center;">
8100 SANDPIPER CIRCLE, SUITE 300<br />
BALTIMORE, MD<br />
888-363-5327<br />
www.vendlease.net
        </td>
      </tr>
    
    </table>

    </td>
    <?php if (!$form->publish) {?>
    <td colspan="5" style="width:50%;vertical-align:text-center;"><h1 style="text-align:center;">Please Complete this form and click Submit</h1></td>
    <?php } else { ?>
    <td colspan="5" style="width:50%;vertical-align:text-center;"><h1 style="text-align:center;">This application was submitted:<br /> <?php echo date('F d Y H:i:s A')?>
    <br >From: <?php echo $_SERVER["REMOTE_ADDR"]; ?>
    </h1></td>
    <?php } ?>
  </tr>
  <tr>
    <td  colspan="5" >Supplier / Sales Rep:<br />
      <?php echo $form->input('supplier', array('size'=>56) ); ?>
    </td>
    <td  colspan="3">Equipment Cost:<br />
      <?php echo $form->input('equipment_cost', array('size'=>31) ); ?>
    </td>
    <td  colspan="2">Desired Term:<br />
    <?php echo $form->input('desired_term', array('size'=>19)); ?>
    </td>
  </tr>
 
  <tr>
    <td colspan="3" >Business Information 1</td>
    <td colspan="7">
      <?php echo $form->input('business_information', array('type'=>'checkbox',  'options'=>array('Corporation', 'Partnership', 'LLC', 'Proprietorship', 'Non-Profit', 'Other') ) ); ?>
    </td>
  </tr>
  <tr>
    <td  colspan="5">Full Corporate Legal Name:<br />
      <?php echo $form->input('full_legal_name', array('size'=>56) ); ?>
    </td>
    <td  colspan="5">D/B/A Name:<br />
      <?php echo $form->input('dba_name', array('size'=>55)); ?>
    </td>
  </tr>
  <tr>
    <td  colspan="5">Address:<br />
      <?php echo $form->input('business_address', array('size'=>31)); ?>
    </td>
    <td  colspan="3">City:<br />
      <?php echo $form->input('business_city', array('size'=>19) ); ?>
    </td>
    <td  >State:<br />
      <?php echo $form->input('business_state', array('size'=>7)); ?>
    </td>
    <td  >Zip:<br />
      <?php echo $form->input('business_zip', array('size'=>7) ); ?>
    </td>
  </tr>

  <tr>
    <td  colspan="3">County:<br />
      <?php echo $form->input('business_telephone', array('size'=>19) ); ?>
    </td>  
    <td  colspan="2">Telephone:<br />
      <?php echo $form->input('business_telephone', array('size'=>19) ); ?>
    </td>
    <td  colspan="5">Fax:<br />
      <?php echo $form->input('business_fax', array('size'=>19) ); ?>
    </td>
    </tr>
    <tr>
    <td  colspan="3">Business Start Date:<br />
      <?php echo $form->input('business_start_date', array('size'=>19) ); ?>
    </td>
    <td  colspan="2">Tax ID #:<br />
      <?php echo $form->input('business_tax_id', array('size'=>19) ); ?>
    </td>
    <td  colspan="5">Business Property:<br />
      <?php echo $form->input('business_property', array('type'=>'checkbox',  'options'=>array('Own', 'Rent') ) ); ?>
    </td>    
  </tr><tr>
    <td colspan="10">Business Owned 1</td>
  
  
  </tr> <tr>
    <td  colspan="5">Full Legal Name:<br />
      <?php echo $form->input('business2_full_legal_name', array('size'=>56) ); ?>
    </td>
    <td colspan="5">D/B/A Name:<br />
      <?php echo $form->input('business2_dba_name', array('size'=>55)); ?>
    </td>
  
  </tr>
  <tr>
    <td  colspan="5">Address:<br />
      <?php echo $form->input('business2_address', array('size'=>31)); ?>
    </td>
    <td  colspan="3">City:<br />
      <?php echo $form->input('business2_city', array('size'=>19) ); ?>
    </td>
    <td  >State:<br />
      <?php echo $form->input('business2_state', array('size'=>7)); ?>
    </td>
    <td  >Zip:<br />
      <?php echo $form->input('business2_zip', array('size'=>7) ); ?>
    </td>

  
  </tr> <tr>
    <td  colspan="3">County:<br />
      <?php echo $form->input('business2_county', array('size'=>19) ); ?>
    </td>
    <td  colspan="2">Telephone:<br />
      <?php echo $form->input('business2_telephone', array('size'=>19) ); ?>
    </td>
    <td  colspan="5">Time in Business:<br />
      <?php echo $form->input('business2_start_date', array('size'=>19) ); ?>
    </td>
  </tr>
    
            
  <tr>
    <td  colspan="10" >Bank Information</td>
  </tr><tr>
    <td  colspan="5">Bank Name: <?php echo $form->input('bank_name', array('size'=>56) ); ?>
    </td>
    <td  colspan="5">Account Number: <?php echo $form->input('account_number', array('size'=>55)); ?>
    </td>
  </tr><tr>
      <td  colspan="10">Personal Information of Guarantors</td>
  </tr><tr>
    <td  colspan="5">Name:<br />
      <?php echo $form->input('guarantor1_name', array('size'=>44) ); ?>
    </td>
    <td colspan="2" >Title:<br />
      <?php echo $form->input('guarantor1_title', array('size'=>19) ); ?>
    </td>
    <td  colspan="2">Social Security Number:<br />
      <?php echo $form->input('guarantor1_ssn', array('size'=>19) ); ?>
    </td>
    <td  >Date of Birth:<br />
      <?php echo $form->input('guarantor1_dob', array('size'=>8) ); ?>
    </td>
  </tr><tr>
    <td  colspan="5">Address:<br />
      <?php echo $form->input('guarantor1_address', array('size'=>31) ); ?>
    </td>
    <td  colspan="3">City:<br />
      <?php echo $form->input('guarantor1_city', array('size'=>19) ); ?>
    </td>
    <td>State:<br />
      <?php echo $form->input('guarantor1_state', array('size'=>7) ); ?>
    </td>
    <td  >Zip:<br />
      <?php echo $form->input('guarantor1_zip', array('size'=>7) ); ?>
    </td>
  </tr><tr>
    <td  colspan="2">Home Phone:<br />
      <?php echo $form->input('guarantor1_home_phone', array('size'=>31) ); ?>
    </td>
    <td  colspan="2">Mobile Phone:<br />
      <?php echo $form->input('guarantor1_mobile_phone', array('size'=>31) ); ?>
    </td>
    <td  colspan="2">E-Mail Address:<br />
      <?php echo $form->input('guarantor1_email', array('size'=>43) ); ?>
    </td>
    <td  colspan="2">Ownership %:<br />
      <?php echo $form->input('guarantor1_ownership', array('size'=>43) ); ?>
    </td>
        <td  colspan="2">Residence:<br />
      <?php echo $form->input('guarantor1_residence', array('type'=>'checkbox',  'options'=>array('Own', 'Rent') ) ); ?>
    </td>
  </tr><tr>
    <td  colspan="5">Name:<br />
      <?php echo $form->input('guarantor2_name', array('size'=>44) ); ?>
    </td>
    <td colspan="2" >Title:<br />
      <?php echo $form->input('guarantor2_title', array('size'=>19) ); ?>
    </td>
    <td  colspan="2">Social Security Number:<br />
      <?php echo $form->input('guarantor2_ssn', array('size'=>19) ); ?>
    </td>
    <td  >Date of Birth:<br />
      <?php echo $form->input('guarantor2_dob', array('size'=>8) ); ?>
    </td>
  </tr><tr>
    <td colspan="5">Address:<br />
      <?php echo $form->input('guarantor2_address', array('size'=>31) ); ?>
    </td>
    <td colspan="3">City:<br />
      <?php echo $form->input('guarantor2_city', array('size'=>19) ); ?>
    </td>
    <td>State:<br />
      <?php echo $form->input('guarantor2_state', array('size'=>7) ); ?>
    </td>
    <td>Zip:<br />
      <?php echo $form->input('guarantor2_zip', array('size'=>7) ); ?>
    </td>
  </tr><tr>
    <td colspan="2">Home Phone:<br />
      <?php echo $form->input('guarantor2_home_phone', array('size'=>31) ); ?>
    </td>
    <td colspan="2">Mobile Phone:<br />
      <?php echo $form->input('guarantor2_mobile_phone', array('size'=>31) ); ?>
    </td>
    <td colspan="2">E-Mail Address:<br />
      <?php echo $form->input('guarantor2_email', array('size'=>43) ); ?>
    </td>
    <td  colspan="2">Ownership %:<br />
      <?php echo $form->input('guarantor2_ownership', array('size'=>43) ); ?>
    </td>
        <td  colspan="2">Residence:<br />
      <?php echo $form->input('guarantor2_residence', array('type'=>'checkbox',  'options'=>array('Own', 'Rent') ) ); ?>
    </td>
  </tr><tr>
    <td colspan="5">Name:<br />
      <?php echo $form->input('guarantor3_name', array('size'=>44) ); ?>
    </td>
    <td colspan="2" >Title:<br />
      <?php echo $form->input('guarantor3_title', array('size'=>19) ); ?>
    </td>
    <td colspan="2">Social Security Number:<br />
      <?php echo $form->input('guarantor3_ssn', array('size'=>19) ); ?>
    </td>
    <td>Date of Birth:<br />
      <?php echo $form->input('guarantor3_dob', array('size'=>8) ); ?>
    </td>
  </tr><tr>
    <td colspan="5">Address:<br />
      <?php echo $form->input('guarantor3_address', array('size'=>31) ); ?>
    </td>
    <td colspan="3">City:<br />
      <?php echo $form->input('guarantor3_city', array('size'=>19) ); ?>
    </td>
    <td>State:<br />
      <?php echo $form->input('guarantor3_state', array('size'=>7) ); ?>
    </td>
    <td >Zip:<br />
      <?php echo $form->input('guarantor3_zip', array('size'=>7) ); ?>
    </td>
  </tr><tr>
    <td  colspan="2">Home Phone:<br />
      <?php echo $form->input('guarantor3_home_phone', array('size'=>31) ); ?>
    </td>
    <td  colspan="2">Mobile Phone:<br />
      <?php echo $form->input('guarantor3_mobile_phone', array('size'=>31) ); ?>
    </td>
    <td  colspan="2">E-Mail Address:<br />
      <?php echo $form->input('guarantor3_email', array('size'=>43) ); ?>
    </td>
    <td  colspan="2">Ownership %:<br />
      <?php echo $form->input('guarantor3_ownership', array('size'=>43) ); ?>
    </td>
        <td  colspan="2">Residence:<br />
      <?php echo $form->input('guarantor3_residence', array('type'=>'checkbox',  'options'=>array('Own', 'Rent') ) ); ?>
    </td>
  </tr><tr>
      <td  colspan="10" style="font-size:16px;">
      Applicant(s) represents the foregoing information contained in this credit application is true and correct and that Vend Lease Company, Inc, or its designees, may totally rely on same and Applicant(s) hereby authorizes our banks, trade references and other financial institutions to release credit information to Vend Lease Company, Inc., or its designees, even if by fax or copy of this document.  Applicant(s) further authorizes Vend Lease Company, Inc., or its designees, to obtain other credit information from all sources including, but not limited to, credit bureau reports on the business and any guarantors as individuals.  By execution of this credit application, I/we hereby expressly waive any right(s) to notification pursuant to the Federal Equal Credit Opportunity Act, the Federal Fair Credit Reporting Act and/or any applicable state law.  Applicant(s) hereby release, discharge and indemnify Vend Lease Company, Inc. from any and all claims, actions, rights, damages and costs Applicant(s) may now have, ever had, or hereafter may have in any way relating to or growing out of this credit application.  By signing below, the individual(s), who is either a principal of the credit applicant or a personal guarantor of its obligations, provides written instruction to Vend Lease Company, Inc. or its designees (and any assignee or potential assignee thereof) authorizing review of his/her personal credit profile from a credit bureau.  Such authorization shall extend to obtaining a credit profile in considering this application and subsequently for the purposes of update, renewal or extension of such credit and for reviewing or collecting the resulting account.  A Photostat, facsimile copy or electronic signature of this authorization shall be valid as the original.  By signature below, I/we affirm my/our identity as the respective individuals identified in the above application with the proper authority to act as such.  It is further understood and agreed that Vend Lease Company, Inc. may, in its sole discretion, approve or reject this credit application.								      
      </td>
  </tr><tr>
      <td  colspan="3">Signature: <?php echo $form->input('guarantor1_signature', array('size'=>19)  ); ?></td>
      <td  colspan="5"><?php echo $form->input('guarantor1_agree', array('type'=>'checkbox') );?> By filling out my name I agree that I have digitally signed this application </td>
      <td  colspan="2">Date: <?php echo date('m/d/y'); ?></td>
  </tr><tr>
      <td  colspan="3">Signature: <?php echo $form->input('guarantor2_signature'); ?></td>
      <td  colspan="5"><?php echo $form->input('guarantor2_agree', array('type'=>'checkbox') );?> By filling out my name I agree that I have digitally signed this application </td>
      <td  colspan="2">Date: <?php echo date('m/d/y'); ?></td>
  </tr><tr>
      <td  colspan="3">Signature: <?php echo $form->input('guarantor3_signature'); ?></td>
      <td  colspan="5"><?php echo $form->input('guarantor3_agree', array('type'=>'checkbox') );?> By filling out my name I agree that I have digitally signed this application </td>
      <td  colspan="2">Date: <?php echo date('m/d/y'); ?></td>
  </tr>
</table>
</body>
</html>