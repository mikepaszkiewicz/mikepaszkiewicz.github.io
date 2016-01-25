<?php
function pr($val) {
  echo "<pre>";
  if (is_array($val)) {
    print_r($val);
  } else {
    echo $val;
  }
  echo "</pre>";
}
  
class form {
  public $model = '';
  public $publish = false;
  
  public function create($model = null, $options = array()) {
    $this->model = $model;
    $out = "<form method='post' action='".$_SERVER["PHP_SELF"]."'";
    if (isset($model)) {
    $out .= 'name="'.$model.'" ';
    }
    $opt = $this->formatOptions($options);
    $out .= $opt.' ';
    $out .='>';
    return $out;  
  }
  
  
  public function end($options = null) {
    $out = '';
    if (isset($options)) {
      if (is_array($options)) {
        if (isset($options['label'])) {
          $label = $options['label']; 
        } else {
          $label = 'Submit';        
        }
        $out .= $this->input($label, $options);
      } else {
        $out .= $this->input($options, array('type'=>'submit', 'value'=>$options));
      }      
    }
    $out .= '</form>';
    return $out;  
  }
  
	public function input($fieldName, $options = array()) {
	     $formValue = '';
	     if (isset($_REQUEST[$fieldName])) {
        $formValue = $_REQUEST[$fieldName];
       } else if (isset($options['value'])) {
        $formValue = $options['value'];        
       }
	     $input = '';
	     $opt = '';
    	if (isset($options['type'])) {
        $type = $options['type'];
      } else {
        $type = "text";	
      }
      $opt = $this->formatOptions($options);
      switch($type) {
      case 'select':
      $input = "<select name='$fieldName'>";
      if (isset($options['default'])) {
        $input .= "<option value='' ".($formValue == '' ? "selected" : "") . " >".$options['default'];
      }
        if (isset($options['options'])) {
          foreach ($options['options'] as $option=>$value) {
            $input .= "<option value='$value' ".($formValue == $value ? "selected" : "") . " >$option";
          }
        }
      $input .= "</select>";
      break;
      case 'textarea':
        $input = "<textarea name='$fieldName' $opt >$formValue</textarea>";
      break;
      case 'radio':
        $input = '';   
        
        if ($this->publish) {
    
        if (isset($options['options'])) {
          $i= 1;
          $totalo = count($options['options']);
          foreach ($options['options'] as $option=>$value) {
            if (is_numeric($option)) {
              $input .= (is_array($formValue) && in_array($value, $formValue) ? '[<span class="published">x</span>] '  : "[&nbsp;&nbsp;] ").$value;    
            } else {
              $input .= (is_array($formValue) && in_array($value, $formValue) ? '[<span class="published">x</span>] ' : "[&nbsp;&nbsp;] ").$option;
            } 
            if (isset($options['separator'])) {
              if ($i < $totalo) {
                $input .= $options['separator']; 
              }
            } else {
              if ($i < $totalo) {
                $input .= " ";
              }
            }
            $i++;
          }
                 
        } else  {
          $input .= ($formValue == "on" ? '[<span class="published">x</span>] ' : "[&nbsp;&nbsp;] ");
        }

        
          if (isset($options['after'])) {
              $input .= $options['after'];                      
            } else {

            }           
        } else {
          if (isset($options['options'])) {
            $i= 1;
            $totalo = count($options['options']);
            foreach ($options['options'] as $option=>$value) {
              $input .= "<input name='".$fieldName."[]' type='$type' $opt value='$value' ".(is_array($formValue) && in_array($value, $formValue) ? "checked" : "")." /> ";
              if (is_numeric($option)) {
                $input .= $value;    
              } else {
                $input .= $option;
              } 
              if (isset($options['separator'])) {
                if ($i < $totalo) {
                  $input .= $options['separator']; 
                }
              } else {
                if ($i < $totalo) {
                  $input .= " ";
                }
              }
              $i++;
            
            } 
              if (isset($options['after'])) {
                $input .= $options['after'];                      
              } else {
                $input .= " ";
              }
        if (isset($this->errors[$fieldName])) {
          $input .= '<br /><span class="errors">'.$this->errors[$fieldName].'</span>';
        }                        
          } else  {
          
            $input .= "<input ".($formValue == "on" ? 'checked' : "")." name='$fieldName' type='$type' $opt />";
            if (isset($this->errors[$fieldName])) {
          $input .= '<span class="errors"> '.$this->errors[$fieldName].'</span><br />';
        } 
          }
        }
      break;
      case 'checkbox':
        $input = '';   
        
        if ($this->publish) {
    
        if (isset($options['options'])) {
          $i= 1;
          $totalo = count($options['options']);
          foreach ($options['options'] as $option=>$value) {
            if (is_numeric($option)) {
              $input .= (is_array($formValue) && in_array($value, $formValue) ? '[<span class="published">x</span>] '  : "[&nbsp;&nbsp;] ").$value;    
            } else {
              $input .= (is_array($formValue) && in_array($value, $formValue) ? '[<span class="published">x</span>] ' : "[&nbsp;&nbsp;] ").$option;
            } 
            if (isset($options['separator'])) {
              if ($i < $totalo) {
                $input .= $options['separator']; 
              }
            } else {
              if ($i < $totalo) {
                $input .= " ";
              }
            }
            $i++;
          }
                 
        } else  {
          $input .= ($formValue == "on" ? '[<span class="published">x</span>] ' : "[&nbsp;&nbsp;] ");
        }

        
          if (isset($options['after'])) {
              $input .= $options['after'];                      
            } else {

            }           
        } else {
          if (isset($options['options'])) {
            $i= 1;
            $totalo = count($options['options']);
            foreach ($options['options'] as $option=>$value) {
              $input .= "<input name='".$fieldName."[]' type='$type' $opt value='$value' ".(is_array($formValue) && in_array($value, $formValue) ? "checked" : "")." /> ";
              if (is_numeric($option)) {
                $input .= $value;    
              } else {
                $input .= $option;
              } 
              if (isset($options['separator'])) {
                if ($i < $totalo) {
                  $input .= $options['separator']; 
                }
              } else {
                if ($i < $totalo) {
                  $input .= " ";
                }
              }
              $i++;
            
            } 
              if (isset($options['after'])) {
                $input .= $options['after'];                      
              } else {
                $input .= " ";
              }
        if (isset($this->errors[$fieldName])) {
          $input .= '<br /><span class="errors">'.$this->errors[$fieldName].'</span>';
        }                        
          } else  {
          
            $input .= "<input ".($formValue == "on" ? 'checked' : "")." name='$fieldName' type='$type' $opt />";
            if (isset($this->errors[$fieldName])) {
          $input .= '<span class="errors"> '.$this->errors[$fieldName].'</span><br />';
        } 
          }
        }
      break;
      case 'submit':
      if ($this->publish) {
          
        } else {
          $input = "<input name='$fieldName' type='$type' $opt value='$fieldName' />";
        }
      break;
      default:
          $input = '';
        if ($this->publish) {
          $input .= '<span class="published">';    
          $input .= "<span class='formText'>".$formValue."</span>";
          $input .= "</span>";
        } else {
          $input = "<input name='$fieldName' type='$type' $opt value='$formValue' />";
        }
        if (isset($this->errors[$fieldName])) {
          $input .= '<br /><span class="errors">'.$this->errors[$fieldName].'</span>';
        }
              
      break;
   }
	
	return $input;
	
	}
  
  function formatOptions($options) {
    $skip = array('type', 'label', 'before', 'after', 'separator', 'between', 'value' );
    $o = '';
    if (count($options) >0) {
      foreach ($options as $option=>$value) {
        if (is_array($value) || in_array($option, $skip) ) {continue;}
        $o .= $option.'="'.$value.'" ';
      }
    }
    if ($this->publish) {
      $o .= " disabled='disabled' ";   
    }

    return $o;
  }
  
  private function formatRequest() {
    pr($_REQUEST);  
  }
  
  	
}

