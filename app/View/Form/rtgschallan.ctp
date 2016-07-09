<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
    <table>
        <tr>
            <td colspan="2" style="text-align: centre;">(Applicant Copy)</td>
            <td colspan="2" style="text-align: centre;">(Bank Copy)</td>
        </tr>
        <tr>
            <td colspan="2" style="font-weight: bold; text-align: center;">NEFT/RTGS</td>
            <td colspan="2" style="font-weight: bold; text-align: center;">NEFT/RTGS</td>
        </tr>
        <tr>
            <td colspan="2" style="text-align: left;">Date: <?php echo date("d/m/Y"); ?></td>
            <td colspan="2" style="text-align: left;">Date: <?php echo date("d/m/Y"); ?></td>
        </tr>
        <tr>
            <td>Beneficiary Name:</td>
            <td>Central University of Punjab</td>
            <td>Beneficiary Name:</td>
            <td>Central University of Punjab</td>
        </tr>
        <tr>
            <td>Account No.: </td>
            <td>CUPUNB<?php echo $student['Student']['id']; ?></td>
            <td>Account No.: </td>
            <td>CUPUNB<?php echo $student['Student']['id']; ?></td>
        </tr>
        <tr>
            <td>IFS Code: </td>
            <td>CUPUNB<?php echo $student['Student']['id']; ?></td>
            <td>Account No.: </td>
            <td>CUPUNB<?php echo $student['Student']['id']; ?></td>
        </tr>
    </table>
  </div>
</div>