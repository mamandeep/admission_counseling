<div>Navigation</div>
<div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/generalinformation">General Information</a>
    </div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/studentdetails">Details</a>
    </div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/uploaddocuments">Upload Documents</a>
    </div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/previewdocuments">Preview Documents</a>
    </div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/options">Select Preferences (Options)</a>
    </div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/printoptions">Print Options</a>
    </div>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/seatallocation">Seat Allocation</a>
    </div>
    <?php if(!empty($this->Session->read('eligible_for_payment')) && $this->Session->read('eligible_for_payment') == "1") {?>
    <div class="nav-menu-link">
        <a href="<?php echo $this->webroot; ?>form/prepayment">Payment Details</a>
    </div>
    <?php } ?>
</div>