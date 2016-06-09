<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent" class="section-to-print">
      <div class="main_content_header">Options Selected<input type="button" id="printLOptions" value="Print" onclick="window.print()" /></div>
      <table>
          <tr>
              <td width="40%" style="font-weight: bold;">Name of the Center</td>
              <td width="40%" style="font-weight: bold;">Name of the Course</td>
              <td width="20%" style="font-weight: bold;">Preference Order</td>
          </tr>
          <?php //print_r($this->request->data['Choice']); 
            if(is_array($this->request->data['Choice']) && count($this->request->data['Choice']) > 0) {
                for ($key = 0; $key < count($this->request->data['Choice']); $key++) {
                    if($this->request->data['Choice'][$key]['subject'] !== "- select -") {
                        echo "<tr>";
                        echo "<td>" . $this->request->data['Choice'][$key]['centre'] . "</td>";
                        echo "<td>" . $this->request->data['Choice'][$key]['preference'] . "</td>";
                        echo "<td>" . $this->request->data['Choice'][$key]['pref_order'] . "</td>";
                        echo "</tr>";
                    }
                }
            }
            else { ?>
                <tr>
                    <td>No Center Selected</td>
                    <td>No Branch Selected</td>
                    <td>No Preference Order Selected</td>
                </tr>    
            <?php }
          ?>
      </table>
      <div id="termsconditions">
              <p>This is sample terms and conditions. You have to read them and take a printout of this page. This is sample terms and conditions. You have to read them and take a printout of this page.</p>  
              <p>This is sample terms and conditions. You have to read them and take a printout of this page. This is sample terms and conditions. You have to read them and take a printout of this page.</p>  
              <p>This is sample terms and conditions. You have to read them and take a printout of this page. This is sample terms and conditions. You have to read them and take a printout of this page.</p>  
      </div>
  </div>
</div>