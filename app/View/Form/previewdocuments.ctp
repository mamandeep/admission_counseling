<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
        <table>
            <tr>
                <td colspan="4" style="text-align: center"><div class="main_content_header">Preview Documents</div></td>
            </tr>
            <tr>
                <td width="20%"></td>
                <td width="30%"></td>
                <td width="30%"></td>
                <td width="20%"><label style="color: red;">* clear cache to preview latest document.</label></td>
            </tr>
            <tr>
                <td></td>
                <td>Photograph</td>
                <td><img src="<?php if(!empty($image['Document']['filename']) && file_exists(WWW_ROOT . DS . $image['Document']['filename'])) { echo $this->webroot . $image['Document']['filename']; } else { echo ""; } ?>" alt="Passport Size Photograph" height="132px" width="132px"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Date of Birth Certificate</td>
                <td><a href="<?php if(!empty($image['Document']['filename2']) && file_exists(WWW_ROOT . DS . $image['Document']['filename2'])) { echo $this->webroot . $image['Document']['filename2']; } else { echo "javascript: void(0);"; } ?>" >click here</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Caste Certificate</td>
                <td><a href="<?php if(!empty($image['Document']['filename3']) && file_exists(WWW_ROOT . DS . $image['Document']['filename3'])) { echo $this->webroot . $image['Document']['filename3']; } else { echo "javascript: void(0);"; } ?>" >click here</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>Signature</td>
                <td><img src="<?php if(!empty($image['Document']['filename4']) && file_exists(WWW_ROOT . DS . $image['Document']['filename4'])) { echo $this->webroot . $image['Document']['filename4']; } else { echo ""; } ?>" alt="Signature" height="50px" width="132px"/></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>CUCET Scorecard/Result Card</td>
                <td><a href="<?php if(!empty($image['Document']['filename6']) && file_exists(WWW_ROOT . DS . $image['Document']['filename6'])) { echo $this->webroot . $image['Document']['filename6']; } else { echo "javascript: void(0);"; } ?>" >click here</a></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <div class="submit">
                        <a href="<?php echo $this->webroot; ?>form/options" id="continue_bt" class="button_ct" style="font-size: 20px;">Continue</a>
                    </div>
                </td>
                <td>
                </td>
                <td></td>
            </tr>
        </table>
  </div>
</div>