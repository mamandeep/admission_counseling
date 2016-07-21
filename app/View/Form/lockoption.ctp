<div id="wrapper">
  <div id="sidebar"><?php echo $this->element('left-sidebar');?></div>
  <div id="maincontent">
        <?php //print_r($prev_seat);
            if(isset($data_set) && $data_set == 'true') {
                echo $this->Form->create('Student', array('id' => 'course_list', 'url' => Router::url( null, true ))); 
            //print_r($this->request->data);
        ?>
        <div id="tabs-1">
            <table id="student_input">
                    <?php 
                          //print_r($student['Student']['id']);
                          //print_r(empty($student['Student']['response_code']));
                          //print_r($student['Student']['response_code']);
                          //print_r($student['Student']['payment_mode']);
                          //print_r(empty($image['Document']['filename5']));
                          //print_r((empty($student['Student']['response_code']) && $student['Student']['payment_mode'] == 'Online (Credit Card/Debit Card/Netbanking)'));
                        /*if( empty($student['Student']['payment_mode']) || ($student['Student']['response_code'] != "0" && $student['Student']['payment_mode'] == 'Online (Credit Card/Debit Card/Netbanking)')
                             || ($student['Student']['payment_mode'] == 'RTGS' && empty($image['Document']['filename5']))
                             || ($student['Student']['payment_mode'] == 'Online (Credit Card/Debit Card/Netbanking)' 
                                     && $student['Student']['response_code'] == "0" && count($this->request->data['Choice']) > 0 
                                     && check_sa($student['Student']['seat_allocated'], $this->request->data['Choice']))
                             ) {*/
                        if(is_array($this->request->data['Choice']) && count($this->request->data['Choice']) > 0 && isset($lockflag) && $lockflag == 0) {
                            $seats = array();
                            //print_r($this->request->data['Choice']);
                            for ($key = 0; $key < count($this->request->data['Choice']); $key++) {
                                $value = $this->request->data['Choice'][$key]['preference'] . ":" . $this->request->data['Choice'][$key]['pref_order'];
                                $seats[$value] = $this->request->data['Choice'][$key]['preference'];
                            }
                    ?>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td width="30%"><?php echo $this->Form->input('Student.id', array('label' => false, 'type' => 'hidden', 'value' => $this->Session->read('std_id'))); ?></td>
                        <td class="table_headertxt" style="padding-top: 17px; width: 20%;">Select Course</td>
                        <td><?php 
                            if(count($seats) > 0) {
                                echo $this->Form->input('Student.lockoption', array(
                                    'options' => $seats,
                                    'id' => 'lockoption',
                                    'label' => false,
                                    'width' => '200px'
                                )); 
                        } ?></td>
                        <td width="30%"></td>
                    </tr>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td colspan="3" style="color: crimson; font-size: 20px;">Please choose your preference from above for locking</td>
                        <td width="30%" style="color: crimson; font-size: 20px;"></td>
                    </tr>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td colspan="3" style="color: crimson; font-size: 12px;">You will not be able to change your locked preference once locked.</td>
                        <td width="30%" style="color: crimson; font-size: 12px;"></td>
                    </tr>
                    <tr> <!--check if applicant has been alloted applicant_id-->
                        <td width="30%"></td>
                        <td class="table_headertxt" style="padding-top: 17px; width: 20%;"></td>
                        <td><div class="submit">
                            <?php echo $this->Form->submit('Lock', array('div' => false)); ?>
                        </div></td>
                        <td width="30%"></td>
                    </tr>
                    <?php } else { ?>
                    <tr> 
                        <td width="30%"></td>
                        <td class="table_headertxt" style="padding-top: 17px; width: 20%;">You have locked your option as <?php echo isset($optionLocked) ? $optionLocked : "Error in Locked Option. Please contact Support."; ?></td>
                        <td></td>
                        <td width="30%"></td>
                    </tr>
                    <?php } ?>
            </table>
            <!--<form  method="post" action="validate_api.php" name="frmTransaction" id="frmTransaction" onSubmit="return validate()">-->
            <!--<div style="font-size: 30px;">Kindly do not proceed further. It will be enabled shortly!</div>-->

        </div>

        <?php echo $this->Form->end(); 
            }
        ?>
</div>
</div>
<script>
    var codeSubjectCentre = {}; // no need for an array

    codeSubjectCentre['L.L.M'] = "Bachelor’s Degree in Law with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Education'] = "Bachelor’s degree in any stream with 50% marks from a recognized Indian or foreign university";
    codeSubjectCentre['M.Ed.'] = "Candidates seeking admission to M.Ed. programme should have obtained at least 50% marks or an equivalent grade in the following programmes:i. B.Ed.ii. B.A.B.Ed., B.Sc.B.Ed.iii. B.El.Ed.iv. D.El.Ed. with an undergraduate degree(with 50% marks in Each)";
    codeSubjectCentre['M.A. English'] = 'Bachelor’s degree with English as a subject of study with 55% marks in aggregate from a recognized Indian or foreign university.';
    codeSubjectCentre['M.A. Hindi'] = "Bachelor's degree with Hindi as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Punjabi'] = "Bachelor’s degree in any stream with 50% marks from a recognized Indian or foreign university";
    codeSubjectCentre['M.A. History'] = "Bachelor's degree with History as main subject with 55% marks in aggregate from a recognized Indian or foreign university";
    codeSubjectCentre['M.A. Music (Vocal)'] = "Bachelor's degree with Music (Vocal) as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Music (Instrumental)'] = "Bachelor's degree with Music (Instrumental) as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Fine Arts'] = "Bachelor's degree with Fine Arts as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Theatre'] = "Bachelor's degree with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Geography'] = "For M.A. Geography Bachelor's degree in arts with Geography as main subject with 55% marks in aggregate from recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Geography'] = "For M.Sc. Geography Bachelor's degree in science with Geography as main subject with 55% marks in aggregate from recognized Indian or foreign university.";
    codeSubjectCentre['M.A. Sociology'] = "Bachelor's degree with Sociology as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Human Genetics)'] = "Bachelor’s degree in any branch of life sciences/M.B.B.S. or B.D.S. with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Molecular Medicine)'] = "Bachelor's degree in any branch of animal/medical sciences/life Sciences or any other related science with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Biochemistry)'] = "Bachelor’s degree in any branch of Life Sciences with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Microbial Sciences)'] = "Bachelor’s degree in any branch of Life Sciences with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Animal Sciences)'] = "Bachelor’s degree in any branch of Life Sciences with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Plant Sciences)'] = "Bachelor’s degree in any branch of Life Sciences with 55% marks from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Life Sciences (Specialization in Bioinformatics)'] = "Bachelor’s degree in any branch of Life Sciences/ Pharmaceutical Sciences/ Mathematical Sciences/ Computer Sciences (or applications)/ Physical Sciences/ Chemical Sciences/Veterinary Sciences/ Agricultural Sciences/ Medical Sciences or an engineering degree in a related stream with 55% marks from a recognized Indian or foreign university";
    codeSubjectCentre['M.Pharm. Pharmaceutical Sciences (Medicinal Chemistry)'] = "Bachelor’s degree in Pharmacy with 55% marks from a recognized Indian or foreign university and preference will be given to candidates having valid GPAT score.";
    codeSubjectCentre['M.Pharm. Pharmaceutical Sciences (Pharmacognosy and Phytochemistry)'] = "Bachelor’s degree in Pharmacy with 55% marks from a recognized Indian or foreign university and preference will be given to candidates having valid GPAT score.";
    codeSubjectCentre['M.Sc. Chemistry (Computational Chemistry)'] = "Bachelor's degree in Science with Chemistry as a subject with 55% marks in aggregate from a recognized Indian or foreign university";
    codeSubjectCentre['M.Sc. Chemical Sciences (Medicinal Chemistry)'] = "Bachelor's degree in Science with Chemistry as a subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Chemistry'] = "Bachelor's degree in Science with Chemistry as a subject with 55% marks in aggregate from a recognized Indian or foreign university";
    codeSubjectCentre['M.Sc. Mathematics'] = "Bachelor’s degree in science with Mathematics as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Physics (Computational Physics)'] = "Bachelor's degree in Science with Physics and Mathematics as main subjects with 55% marks in aggregate from recognized Indian or foreign University";
    codeSubjectCentre['M.Sc. Physics'] = "Bachelor's degree in Science with Physics and Mathematics as main subject with 55% marks in aggregate from recognized Indian or foreign University";
    codeSubjectCentre['M.Sc. Statistics'] = "Bachelor’s degree in science with Mathematics/Statistics as main subject with 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Sports Science'] = "B.Sc. (Medical/Non Medical)/Home Science/Physical Education & Sports Science or D.P.Ed./B.P.Ed or Bachelor's degree with one of the following subjects: Physiology of Exercise, Kinesiology, Bio-Mechanics, Human Anatomy, Human Physiology, Human Biology,Bio-Chemistry, Bio-Physics, Nutrition & Diet Therapy, Child Development & Family Relations with 50% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Tech. Computer Science and Technology'] = "B.Tech. / B.E. in Computer Science and Engineering / Information Technology / Electronics / Electronics & Communication from a recognized Indian or foreign university with minimum 55% marks. Preference will be given to candidates having valid GATE score.";
    codeSubjectCentre['M.Tech. Computer Science and Technology (Cyber Security)'] = "B.Tech. / B.E. in Computer Science and Engineering / Information Technology / Electronics / Electronics & Communication from a recognized Indian or foreign university with minimum 55% marks. Preference will be given to candidates having valid GATE score.";
    codeSubjectCentre['M.Sc. in Environment Science and Technology'] = "Bachelor's degree or equivalent in any branch of biological/chemical/environmental sciences or an engineering degree with minimum 55% marks from a recognized Indian orforeign university";
    codeSubjectCentre['MBA. Agribussiness'] = "B.Sc. Agriculture/Science/B.Com with 55% with Agriculture or Commerce as main Subject.";
    codeSubjectCentre['M.A. Political Science'] = "Bachelor's degree with Political Science/International Studies/International Relations as main subject with 55% marks in aggregate from a recognized Indian or foreign university";
    codeSubjectCentre['M.A. Economics'] = "Bachelor’s degree with Economics as a subject of study or its equivalent in any discipline with a minimum of 55% marks in aggregate from a recognized Indian or foreign university.";
    codeSubjectCentre['M.Sc. Geology'] = "Hons. in Geology at B.Sc. Level/Bachelor's degree with Geology as main subject with 55% marks in the aggregate in Science subjects.";
    
    $(document).ready(function(){
        $('#course_list').on('submit', function(){
            var optionSelected = $('#lockoption').find(":selected").text();
            var eligibility = "";
            for (var key in codeSubjectCentre) {
                if (codeSubjectCentre.hasOwnProperty(key)) {
                    if(optionSelected == key)
                        eligibility = codeSubjectCentre[key];
               }
            }
            if(!confirm("Minimum Eligibility \n\n " + eligibility)) {
                return false;
            }
        });
    });
</script>

<?php 
 /*
    function check_sa($prev_pref, $choice_arr) {
        $match = false;
        for ($key = 0; $key < count($choice_arr); $key++) {
            if(strcmp($prev_pref, $choice_arr[$key]['preference']) == 0) {
                $match = true;
            }
        }
        return !$match;
    } */
?>