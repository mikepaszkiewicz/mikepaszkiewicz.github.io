<?php 
include_once('form-class.php'); 
include_once('../tcpdf/tcpdf.php');
?>

 

<?php 
if (!isset($form)) {
//  $form = new form();
//  $form->publish=0;
} 
  
?>






<?php echo $form->create('CreditApp'); ?>


<fieldset class="formBox">

<h3 class="centerText">Complete our application here.  VLC will provide a response within hours of submission.  Thank You.</h3>
<br />
<div class="centerText">

</div>

<table width="100%">
<tr>

<td>
<table style="float:right;">
  <tr>
    <td class="rightText"><span class="required ">*</span>&nbsp;</td><td> Required Field</td>
  </tr><tr>                                                                                           
    <td class="rightText"><span class="required">**</span>&nbsp;</td><td> Required if the name for  the section has been set</td>
  </tr><tr>                                                                                           
    <td class="rightText"></td><td><br></td>
  </tr><tr>
      <td colspan="2">If the Field does not apply, N/A is an acceptable response.</td>
  </tr>
</table>
</td>
</tr>
</table>
<div class="centerText">
 
 </div>
<br style="clear:both;">
  

<br />
<table class="formTable" border=0 width="90%">
  <tr>
    <th>Supplier / Sales Rep:<span class="required">*</span></th>
    <td><?php echo $form->input('supplier', array('size'=>56) ); ?></td>
  </tr>
  <tr>
    <th>Equipment Cost:</th>
    <td><?php echo $form->input('equipment_cost', array('size'=>31, 'value'=>'0.00', 'class'=>'ghost-text price' ) ); ?></td>
  </tr>
  <tr>
    <th>Desired Term:<span class="required">*</span></th>
    <td><?php echo $form->input('desired_term', array('size'=>19)); ?></td>
  </tr>
</table>
</fieldset>


<fieldset class="formBox">
  <legend>Business Information</legend>
  <table class="formTable">
    <tr>
      <th>Full Corporate Legal Name:<span class="required">*</span></th>
      <td><?php echo $form->input('full_legal_name', array('size'=>56) ); ?></td>
    </tr><tr>
      <th>D/B/A Name:<span class="required">*</span></th>
      <td><?php echo $form->input('dba_name', array('size'=>55)); ?></td>
    </tr><tr>
      <th>Address:<span class="required">*</span></th>
      <td><?php echo $form->input('business_address', array('size'=>31)); ?></td>
    </tr><tr>
      <th>City:<span class="required">*</span></th>
      <td><?php echo $form->input('business_city', array('size'=>19) ); ?></td>
    </tr><tr>
      <th>State:<span class="required">*</span></th>
      <td><?php echo $form->input('business_state', array('type'=>'select', 'default'=>'--- Select State ---', 'default'=>'--- Select State ---', 'size'=>7, 'options'=>$states )); ?></td>
    </tr><tr>
      <th>Zip:<span class="required">*</span></th>
      <td><?php echo $form->input('business_zip', array('size'=>7) ); ?></td>
    </tr><tr>
      <th>County:<span class="required">*</span></th>
      <td><?php echo $form->input('business_county', array('size'=>7) ); ?></td>
    </tr><tr>
      <th>Telephone:<span class="required">*</span></th>
      <td><?php echo $form->input('business_telephone', array('size'=>19, 'class'=>'phone') ); ?></td>
    </tr><tr>
      <th>Fax:<span class="required">*</span></th>
      <td><?php echo $form->input('business_fax', array('size'=>19, 'class'=>'fax') ); ?></td>
    </tr><tr>
      <th>Business Start Date:<span class="required">*</span></th>
      <td><?php echo $form->input('business_start_date', array('size'=>19, 'class'=>'date ghost-text', 'value'=>'dd/mm/yyyy') ); ?></td>
    </tr><tr>
      <th>Nature of Business:<span class="required">*</span></th> 
      <td><?php echo $form->input('business_nature', array('size'=>19) ); ?></td>
    </tr><tr>
      <th>Tax ID #:<span class="required">*</span></th>
      <td><?php echo $form->input('business_tax_id', array('size'=>19) ); ?></td>
    </tr><tr>
      <th>Business Type:<span class="required">*</span></th>
      <td><?php echo $form->input('business_information', array('type'=>'checkbox', 'separator'=>'<br />', 'options'=>array('Corporation', 'Partnership', 'LLC', 'Proprietorship', 'Non-Profit', 'Other') ) ); ?></td>
    </tr><tr>
      <th>Business Property:<span class="required">*</span></th>
      <td><?php echo $form->input('business_property', array('type'=>'radio', 'separator'=>'<br />', 'options'=>array('Own', 'Rent') ) ); ?></td>
    </tr>
  </table>
  <fieldset class="innerSet">
    <legend>Additional Business Owned 1</legend>
<table class="formTable">
    <tr>
      <th>Full Legal Name:</th>
      <td><?php echo $form->input('business2_full_legal_name', array('size'=>56) ); ?></td>
    </tr><tr>
      <th>D/B/A Name:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_dba_name', array('size'=>55)); ?></td>
    </tr><tr>
      <th>Time in Business:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_start_date', array('size'=>19) ); ?></td>
    </tr><tr>
      <th>Address:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_address', array('size'=>31)); ?></td>
    </tr><tr>
      <th>City:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_city', array('size'=>19) ); ?></td>
    </tr><tr>
      <th>State:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_state', array('type'=>'select', 'default'=>'--- Select State ---', 'default'=>'--- Select State ---', 'size'=>7, 'options'=>$states )); ?></td>
    </tr><tr>
      <th>Zip:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_zip', array('size'=>7) ); ?></td>
    </tr><tr>
      <th>County:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_county', array('size'=>7) ); ?></td>
    </tr><tr>
      <th>Telephone:<span class="required">**</span></th>
      <td><?php echo $form->input('business2_telephone', array('size'=>19, 'class'=>'phone') ); ?></td>
    </tr><tr>
      <th>Nature of Business:<span class="required">**</span></th> 
      <td><?php echo $form->input('business2_nature', array('size'=>19) ); ?></td>
    </tr>
  </table>  
  </fieldset>
  

</fieldset>
 <fieldset class="formBox">
  <legend>Bank Information</legend>
  <table class="formTable">
    <tr>
      <th>Bank name:<span class="required">*</span></th>
      <td><?php echo $form->input('bank_name', array('size'=>56) ); ?></td>
    </tr><tr>
      <th>Account Number:<span class="required">*</span></th>
      <td><?php echo $form->input('account_number', array('size'=>55)); ?></td>
    </tr>
  </table>  
</fieldset>
<fieldset class="formBox">
  <legend>Personal Information of Guarantors</legend>
    <fieldset class="innerSet">
    <legend>Guarantor 1</legend>     
    <table class="formTable">
      <tr>
        <th>Name:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_name', array('size'=>44) ); ?></td>
      </tr><tr>
        <th>Title:</th>
        <td><?php echo $form->input('guarantor1_title', array('size'=>19) ); ?></td>
      </tr><tr>
        <th>Ownership %:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_ownership', array('size'=>19) ); ?></td>
      </tr><tr>    
        <th>Social Security Number:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_ssn', array('size'=>19, 'class'=>'ssn' ) ); ?></td>
      </tr><tr>    
        <th>Date of Birth:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_dob', array('size'=>8, 'class'=>'date ghost-text', 'value'=>'dd/mm/yyyy') ); ?></td>
      </tr><tr>    
        <th>Address:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_address', array('size'=>31) ); ?></td>
      </tr><tr>    
        <th>City:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_city', array('size'=>19) ); ?></td>
      </tr><tr>    
        <th>State:<span class="required">*</span></th> 
        <td><?php echo $form->input('guarantor1_state', array('type'=>'select','default'=>'--- Select State ---', 'size'=>7, 'options'=>$states )); ?></td>
      </tr><tr>    
        <th>Zip:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_zip', array('size'=>7) ); ?></td>
      </tr><tr>
        <th>Home Phone:</th>
        <td><?php echo $form->input('guarantor1_home_phone', array('size'=>31, 'class'=>'phone') ); ?></td>
      </tr><tr>    
        <th>Mobile Phone:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_mobile_phone', array('size'=>31, 'class'=>'mobile') ); ?></td>
      </tr><tr>    
        <th>E-Mail Address:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_email', array('size'=>43) ); ?></td>
      </tr><tr>
        <th valign="top">Residence:<span class="required">*</span></th>
        <td><?php echo $form->input('guarantor1_residence', array('type'=>'radio', 'separator'=>'<br />', 'options'=>array('Own', 'Rent') ) ); ?></td>
      </tr>
    </table>
    </fieldset>
    <fieldset class="innerSet">
    <legend>Guarantor 2</legend>    
    <table class="formTable">
      <tr>
        <th>Name:</th>
        <td><?php echo $form->input('guarantor2_name', array('size'=>44) ); ?></td>
      </tr><tr>
        <th>Title:</th>
        <td><?php echo $form->input('guarantor2_title', array('size'=>19) ); ?></td>
      </tr><tr>
        <th>Ownership %:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_ownership', array('size'=>19) ); ?></td>
      </tr><tr>    
        <th>Social Security Number:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_ssn', array('size'=>19, 'class'=>'ssn') ); ?></td>
      </tr><tr>    
        <th>Date of Birth:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_dob', array('size'=>8, 'class'=>'date ghost-text', 'value'=>'dd/mm/yyyy' ) ); ?></td>
      </tr><tr>    
        <th>Address:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_address', array('size'=>31) ); ?></td>
      </tr><tr>    
        <th>City:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_city', array('size'=>19) ); ?></td>
      </tr><tr>    
        <th>State:<span class="required">**</span></th> 
        <td><?php echo $form->input('guarantor2_state', array('type'=>'select', 'default'=>'--- Select State ---', 'size'=>7, 'options'=>$states )); ?></td>
      </tr><tr>    
        <th>Zip:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_zip', array('size'=>7) ); ?></td>
      </tr><tr>
        <th>Home Phone:</th>
        <td><?php echo $form->input('guarantor2_home_phone', array('size'=>31, 'class'=>'phone') ); ?></td>
      </tr><tr>    
        <th>Mobile Phone:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_mobile_phone', array('size'=>31, 'class'=>'mobile') ); ?></td>
      </tr><tr>    
        <th>E-Mail Address:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_email', array('size'=>43) ); ?></td>
      </tr><tr>
        <th valign="top">Residence:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor2_residence', array('type'=>'radio', 'separator'=>'<br />', 'options'=>array('Own', 'Rent') ) ); ?></td>
      </tr>
    </table>
    </fieldset>
    <fieldset class="innerSet">
    <legend>Guarantor 3</legend>
    <table class="formTable">
      <tr>
        <th>Name:</th>
        <td><?php echo $form->input('guarantor3_name', array('size'=>44) ); ?></td>
      </tr><tr>
        <th>Title:</th>
        <td><?php echo $form->input('guarantor3_title', array('size'=>19) ); ?></td>
      </tr><tr>
        <th>Ownership %:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_ownership', array('size'=>19) ); ?></td>
      </tr><tr>    
        <th>Social Security Number:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_ssn', array('size'=>19, 'class'=>'ssn') ); ?></td>
      </tr><tr>    
        <th>Date of Birth:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_dob', array('size'=>8, 'class'=>'date ghost-text', 'value'=>'dd/mm/yyyy') ); ?></td>
      </tr><tr>    
        <th>Address:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_address', array('size'=>31) ); ?></td>
      </tr><tr>    
        <th>City:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_city', array('size'=>19) ); ?></td>
      </tr><tr>    
        <th>State:<span class="required">**</span></th> 
        <td><?php echo $form->input('guarantor3_state', array('type'=>'select', 'default'=>'--- Select State ---', 'size'=>7, 'options'=>$states )); ?></td>
      </tr><tr>    
        <th>Zip:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_zip', array('size'=>7) ); ?></td>
      </tr><tr>
        <th>Home Phone:</th>
        <td><?php echo $form->input('guarantor3_home_phone', array('size'=>31, 'class'=>'phone') ); ?></td>
      </tr><tr>    
        <th>Mobile Phone:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_mobile_phone', array('size'=>31, 'class'=>'mobile') ); ?></td>
      </tr><tr>    
        <th>E-Mail Address:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_email', array('size'=>43) ); ?></td>
      </tr><tr>
        <th valign="top">Residence:<span class="required">**</span></th>
        <td><?php echo $form->input('guarantor3_residence', array('type'=>'radio', 'separator'=>'<br />', 'options'=>array('Own', 'Rent') ) ); ?></td>
      </tr>
      <tr>
      <td colspan="2">
      
      </td>
    </table> 
    </fieldset>
<p class="app-message">Applicant(s) represents the foregoing information contained in this credit application is true and correct and that Vend Lease Company, Inc, or its designees, may totally rely on same and Applicant(s) hereby authorizes our banks, trade references and other financial institutions to release credit information to Vend Lease Company, Inc., or its designees, even if by fax or copy of this document. Applicant(s) further authorizes Vend Lease Company, Inc., or its designees, to obtain other credit information from all sources including, but not limited to, credit bureau reports on the business and any guarantors as individuals. By execution of this credit application, I/we hereby expressly waive any right(s) to notification pursuant to the Federal Equal Credit Opportunity Act, the Federal Fair Credit Reporting Act and/or any applicable state law. Applicant(s) hereby release, discharge and indemnify Vend Lease Company, Inc. from any and all claims, actions, rights, damages and costs Applicant(s) may now have, ever had, or hereafter may have in any way relating to or growing out of this credit application. By signing below, the individual(s), who is either a principal of the credit applicant or a personal guarantor of its obligations, provides written instruction to Vend Lease Company, Inc. or its designees (and any assignee or potential assignee thereof) authorizing review of his/her personal credit profile from a credit bureau. Such authorization shall extend to obtaining a credit profile in considering this application and subsequently for the purposes of update, renewal or extension of such credit and for reviewing or collecting the resulting account. A Photostat, facsimile copy or electronic signature of this authorization shall be valid as the original. By signature below, I/we affirm my/our identity as the respective individuals identified in the above application with the proper authority to act as such. It is further understood and agreed that Vend Lease Company, Inc. may, in its sole discretion, approve or reject this credit application.</p>
    <fieldset class="innerSet">
    
    <legend >Signature of  Guarantor 1 <span class="required ">*</span></legend>
    <table class="formTable">
      <tr>
        <td >Signature:</td><td> <?php echo $form->input('guarantor1_signature', array('size'=>19)  ); ?></td><td>Date: <?php echo date('m/d/y'); ?></td>
      </tr><tr>
          <td  colspan="3"><?php echo $form->input('guarantor1_agree', array('type'=>'checkbox') );?> By filling out my name I agree that I have digitally signed this application </td>
      </tr>
    </table>
    </fieldset>
    <fieldset class="innerSet">
    <legend>Signature of Guarantor 2 <span class="required ">**</span></legend>
    <table class="formTable">
      <tr>
          <td>Signature: </td><td><?php echo $form->input('guarantor2_signature'); ?></td><td> Date: <?php echo date('m/d/y'); ?></td>
      </tr><tr>      
          <td  colspan="3"><?php echo $form->input('guarantor2_agree', array('type'=>'checkbox') );?> By filling out my name I agree that I have digitally signed this application </td>
      </tr>
    </table>
    </fieldset>
    <fieldset class="innerSet">
    <legend >Signature of Guarantor 3 <span class="required ">**</span></legend>
    <table class="formTable">      
      <tr>
          <td >Signature: </td><td><?php echo $form->input('guarantor3_signature'); ?></td><td> Date: <?php echo date('m/d/y'); ?></td>
      </tr><tr>      
          <td  colspan="3"><?php echo $form->input('guarantor3_agree', array('type'=>'checkbox') );?> By filling out my name I agree that I have digitally signed this application </td>
      </tr>
    </table>
    </fieldset> 
</fieldset>


      
     <br /> 
      <div class="centerText hidePrint">
      
      <?php echo $form->end('Submit Application'); ?>
      <br /><br />
      <input type="button" value="Print Application" onclick='javascript:window.print()'>
      <?php echo $form->input('Reset Application', array('type'=>'submit', 'value'=>'Reset Application') ); ?>
      
      
      
</div><br><br>

</body>
</html>