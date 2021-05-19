<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php

class Status {

    public $status;

    public function __construct($status) {
        $this->status = $status;
    }
    
    public function getPublication() {
        if($this->status == 1) {
            return '<span class="label label-success">widoczny na stronie</span>';
        } else {
            return '<span class="label">ukryty</span>';
        }
    }
    
    public function getActive() {
        if($this->status == 1) {
            return '<span class="label label-success">aktywny</span>';
        } else {
            return '<span class="label">nieaktywny</span>';
        }
    }

}

