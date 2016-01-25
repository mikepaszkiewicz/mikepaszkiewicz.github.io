<?php

class validate {
  public $is_valid = 0;
  public $errors = array();
  public $data = array();
  public function checkValidation($validation, $data = array()) {
      $this->data = $data;

      $errors = array();
        foreach ($validation as $term=>$value) {
        if (!isset($this->data[$term])) {
          $this->data[$term] = 0; // Set the term to blank if it doesn't exist;
        }
          if (!is_array($value['rule'])) {
            $this->$value['rule']($term, $value);
          } else {
           if (method_exists($this, $value['rule'][0])) {
            $this->$value['rule'][0]($term, $value);
           } else {
           if (!$value['rule'][0]($this, $this->data[$term], $value['rule']['conditions'])) {
            $this->errors[$term] = $value['message'];
           };
           }
          }
          
          
          
        
        
        /*
        if (is_array($value) && count($value) > 0) {
            
            if ($this->$value['rule']($term)) {
            } else {
              $this->errors[$term] = $value['message'];
            }        
                    
            // Check for a message, if not set a default message.
            if (!isset($_REQUEST[$term])) {
                $value['message'] = "There was an issue with this field.";
            }
            // Check if the field is required and make sure that it is set if it is.
            if (isset($value['required'])) {
              if (!isset($_REQUEST[$term])) {
                $this->errors[$term] = $value['message'];
                continue;
              }
            } 
            
            if (isset($_REQUEST[$term])) {
              if (isset($value['rule'])) {
              if (!is_array($value['rule'])) {
              
                if (method_exists($this, $value['rule']) ) {
                  if ($this->$value['rule']($_REQUEST[$term], $value)) {
                  } else {
                    $this->errors[$term] = $value['message'];
                  }
                } else {
                  $value['rule']($this, $_REQUEST[$term], $value);
                }
              } else {

                  if (!$value['rule'][0]($this, $_REQUEST[$term], $value['rule']['conditions'])) {
                    $this->errors[$term] = $value['message'];
                  }            
              } 

              }           
            } else {

            }
            

        } else {
          
        }
        */
      }
      if (count($this->errors) > 0) {
        $this->is_valid = 0;
      } else {
        $this->is_valid = 1;
      }

  }
  
  function isNumber($val) {
  
  }

  function isEmail($val) {
  
  }

  function isZip($val) {
  
  }
  
  function isTrue() {
  
  }
  
  function ifExists($term, $cond= array()) {
    if (isset($cond['rule']['conditions'])) {
      $conditions = $cond['rule']['conditions'];
      $conditions['message'] = $cond['message'];
      if ($this->notEmpty($conditions['field'])) {
        if ($this->notEmpty($term, $conditions)) {
        
        } else {
          $this->errors[$term] = $cond['message'];
        }
      } else {
      return true;
      }
    }
   
  
  
  
  
  return false;
  }
  public function notEmpty($term, $cond= array()) {
  
  if (isset ($cond['required']) &&  $cond['required'] == 1) {
    if (!empty($this->data[$term])) {
      return true;
    } else {
      $this->errors[$term] = $cond['message'];
      return false;
    }
  } else if (!empty($this->data[$term])) {
    return true;
  }
    return false;              
  }
  
  function alphaNumeric($term) {
    
    return false;
  
  }
  
  function booleon() {
  
  }
  function date() {
  
  }
  
  

}

$validation = array(

  'supplier'=> array(
    'rule' => 'notEmpty',
    'message' => 'Please enter a valid supplier',
    'required' => true
  ),
                                                  
  'desired_term'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter your desired term',
    'required' => true
  ),
  'bank_name'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please provide your bank name',
    'required' => true
  ),
  'account_number'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please provide your account number',
    'required' => true
  ),    
  'business_information'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please provide your business type',
    'required' => true
  ),
  'business_property'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please provide the type of property',
    'required' => true
  ),  
  'full_legal_name'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter business full legal name',
    'required' => true
  ),
  'dba_name'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please Enter the D/B/A Name',
    'required' => true
  ),
  'business_address'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business address',
    'required' => true
  ),
  'business_city'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the valid business city',
    'required' => true
  ),
  'business_state'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business state',
    'required' => true
  ),
  'business_zip'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business zip',
    'required' => true
  ),
  'business_county'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business county',
    'required' => true
  ),
  
  'business_telephone'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business telephone',
    'required' => true
  ),
  'business_fax'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business fax',
    'required' => true
  ),
  'business_start_date'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business start date',
    'required' => true
  ),

  'business_tax_id'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the business tax id',
    'required' => true
  ),
  'business2_full_legal_name'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter business full legal name',
  ),
  'business2_dba_name'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please Enter the D/B/A Name',
    'required' => true
  ),  
  'business2_start_date'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business start date',
    'required' => true
  ),
    'business2_address'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business address',
    'required' => true
  ),
  'business2_city'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the valid business city',
    'required' => true
  ),
  'business2_state'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business state',
    'required' => true
  ),
  'business2_zip'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business zip',
    'required' => true
  ),
  'business2_county'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business county',
    'required' => true
  ),
  
  'business2_telephone'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business telephone',
    'required' => true
  ),
  'business2_nature'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'business2_full_legal_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the business nature',
    'required' => true
  ),       
  
  
    
  'guarantor1_name'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors name',
    'required' => true
  ),
  'guarantor1_ssn'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors social security number',
    'required' => true
  ),
  'guarantor1_dob'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors date of birth',
    'required' => true
  ),
  'guarantor1_address'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors address',
    'required' => true
  ),
  'guarantor1_city'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors city',
    'required' => true
  ),
  'guarantor1_state'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors state',
    'required' => true
  ),
  'guarantor1_zip'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors zip',
    'required' => true
  ),
  'guarantor1_mobile_phone'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors cell phone',
    'required' => true
  ),
  'guarantor1_email'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors email',
    'required' => true
  ),
  'guarantor1_residence'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the first guarantors residence type',
    'required' => true
  ),  
  'guarantor2_name'=>array(
    'rule' => 'notEmpty',
    'message' => 'Please enter the second guarantors name',
  ),  
  'guarantor2_ssn'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors social security number',
  ),
  'guarantor2_dob'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors date of birth',
  ),
  'guarantor2_address'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors address',
  ),
  'guarantor2_city'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors city',
  ),
  'guarantor2_state'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors state',
  ),
  'guarantor2_zip'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors zip',
  ),
  'guarantor2_mobile_phone'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors cell phone',
  ),
  'guarantor2_email'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors email',
  ),
  'guarantor2_residence'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the first guarantors residence type',
    'required' => true
  ),  
  'guarantor3_name'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors name',
  ),  
  'guarantor3_ssn'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors social security number',
  ),
  'guarantor3_dob'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors date of birth',
  ),
  'guarantor3_address'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors address',
  ),
  'guarantor3_city'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors city',
  ),
  'guarantor3_state'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors state',
  ),
  'guarantor3_zip'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors zip',
  ),
  'guarantor3_mobile_phone'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors cell phone',
  ),
  'guarantor3_email'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors email',
  ),
  'guarantor3_residence'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the first guarantors residence type',
    'required' => true
  ),
  'guarantor1_signature'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor1_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the first guarantors signature',
  ),
  'guarantor2_signature'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the second guarantors signature',
  ),
  'guarantor3_signature'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_name','rule'=>'notEmpty' )),
    'message' => 'Please enter the third guarantors signature',
  ),
'guarantor1_agree'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor1_signature','rule'=>'notEmpty', 'required'=>true )),
    'message' => 'Please mark accept the digital signature agreement for the first gaurantor',
  ),  
'guarantor2_agree'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor2_signature','rule'=>'notEmpty', 'required'=>true )),
    'message' => 'Please mark accept the digital signature agreement for the second gaurantor',
  ),  
'guarantor3_agree'=>array(
    'rule' => array('ifExists', 'conditions'=>array('field'=>'guarantor3_signature','rule'=>'notEmpty', 'required'=>true )),
    'message' => 'Please mark accept the digital signature agreement for the third gaurantor',
  ),              
  
);




    


    