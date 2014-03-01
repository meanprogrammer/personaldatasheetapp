<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/jquery-ui-1.9.2.custom.min.css" rel="stylesheet" type="text/css" />
	<script src="<?php echo base_url(); ?>js/jquery-1.8.3.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.core.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.ui.datepicker.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/json2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>js/jquery.validate.min.js" type="text/javascript"></script>
</head>
<body>
	<?php 
	$personal = $pinfo->row();
	$family = $family->row(); 
	$children = $children->result();
	$education = $education->result();
	$civilservice = $civilservice->result();
	$workexp = $workexp->result();
	$vwork = $vwork->result();
	$training = $training->result();
	$other = $other->result();
	$reference = $reference->result();
	$question = $question->row();
	?>
	<div class="page-header custom-header">
	  <h1>Personal Data Sheet</h1>
	</div>
		<div class="logout-container">
		<div class="btn-group">
		  <button type="button" class="btn btn-default" />Welcome, <?php echo $this->session->userdata('Username');?></button>
		  <a class="btn btn-danger" href="<?php echo site_url('login/logout');?>">Log Out</a>
		</div>
	</div>
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#page1" data-toggle="tab">Page 1</a></li>
      <li><a href="#page2" data-toggle="tab">Page 2</a></li>
      <li><a href="#page3" data-toggle="tab">Page 3</a></li>
      <li><a href="#page4" data-toggle="tab">Page 4</a></li>
    </ul>
    <form method="post" id="mainform" action="<?php echo site_url("pds/update/").'/'.$currentid ?>" >
    <div class="tab-content">
        <div class="tab-pane active first-tab" id="page1">
            <table class="table table-bordered">
            <tr>
                <th colspan="4">PERSONAL INFORMATION</th>
            </tr>
            <tr>
                <td>SURNAME</td>
                <td colspan="3"><?php echo $personal->Surname; ?></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td colspan="3"><?php echo $personal->Firstname; ?></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td><?php echo $personal->Middlename; ?></td>
                <td>NAME EXTENSION (e.g. Jr., Sr.)</td>
                <td><?php echo $personal->ExtensionName; ?></td>
            </tr>
            <tr>
                <td>DATE OF BIRTH (mm/dd/yyyy)</td>
                <td><?php echo $personal->DateOfBirth; ?></td>
                <td rowspan="3">RESIDENTIAL ADDRESS</td>
                <td rowspan="3"><?php echo $personal->ResidentialAddress; ?></td>
            </tr>
            <tr>
                <td>PLACE OF BIRTH</td>
                <td><?php echo $personal->PlaceOfBirth; ?></td>
            </tr>
            <tr>
                <td>SEX</td>
                <td>
                    <?php echo $personal->Sex; ?> 
                </td>
            </tr>
            <tr>
                <td rowspan="2">CIVIL STATUS</td>
                <td rowspan="2">
                <?php echo $personal->CivilStatus ;?>
                </td>
                <td>ZIP CODE</td>
                <td><?php echo $personal->ResidentialZipcode; ?></td>
            </tr>
            <tr>
                <td>TELEPHONE NO.</td>
                <td><?php echo $personal->ResidentialContactNo; ?></td>
                
            </tr>
            <tr>
                <td>CITIZENSHIP</td>
                <td><?php echo $personal->Citizenship; ?></td>
                <td rowspan="3">PERMANENT ADDRESS</td>
                <td rowspan="3"><?php echo $personal->PermanentAddress; ?></td>
            </tr>
            <tr>
                <td>HEIGHT (m)</td>
                <td><?php echo $personal->Height; ?></td>
            </tr>
            <tr>
                <td>WEIGHT (kg)</td>
                <td><?php echo $personal->Weight; ?></td>
            </tr>
            <tr>
                <td>BLOOD TYPE</td>
                <td><?php echo $personal->BloodType; ?></td>
                <td>ZIP CODE</td>
                <td><?php echo $personal->PermanentZipcode; ?></td>
            </tr>
            <tr>
                <td>GSIS ID NO.</td>
                <td><?php echo $personal->GSISNo; ?></td>
                <td>TELEPHONE NO.</td>
                <td><?php echo $personal->PermanentContactNo; ?></td>
            </tr>
            <tr>
                <td>PAG-IBIG ID NO.</td>
                <td><?php echo $personal->PAGIBIGNo; ?></td>
                <td>E-MAIL ADDRESS (if any)</td>
                <td><?php echo $personal->EmailAddress; ?></td>
            </tr>
            <tr>
                <td>PHILHEALTH NO.</td>
                <td><?php echo $personal->PhilHealthNo; ?></td>
                <td>CELLPHONE NO. (if any)</td>
                <td><?php echo $personal->MobileNo; ?></td>
            </tr>
            <tr>
                <td>SSS NO.</td>
                <td><?php echo $personal->SSSNo; ?></td>
                <td>AGENCY EMPLOYEE NO.</td>
                <td><?php echo $personal->AgencyEmployeeNo; ?></td>
            </tr>
            <tr>
                <td>TIN</td>
                <td colspan="3"><?php echo $personal->TINNo; ?></td>
            </tr>
            </table>
            <table class="table table-bordered">
            <tr>
                <th colspan="4">FAMILY BACKGROUND</th>
            </tr>
            <tr>
                <td class="width-200">SPOUSE&#39;S SURNAME</td>
                <td style="width: 300px;">
                    <?php echo $family->SpouseSurname; ?></td>
                <td>
                    <!-- <input id="addchildbutton" name="addchildbutton" class="btn btn-primary" type="button" 
                        value="Add Child" /> --></td>
                    <input id="childrenhidden" name="childrenhidden" value='<?php echo json_encode($children); ?>' type="hidden"></input>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>FIRST NAME&nbsp;</td>
                <td>
                    <?php echo $family->SpouseFirstname; ?></td>
                <td colspan="2" rowspan="13"><div id="children-container"></div></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <?php echo $family->SpouseMiddlename; ?></td>
            </tr>
            <tr>
                <td>OCCUPATION</td>
                <td>
                    <?php echo $family->SpouseOccupation; ?></td>
            </tr>
            <tr>
                <td>EMPLOYER/BUS. NAME</td>
                <td>
                    <?php echo $family->SpouseEmployerName; ?></td>
            </tr>
            <tr>
                <td>BUSINESS ADDRESS</td>
                <td>
                    <?php echo $family->SpouseEmployerAddress; ?></td>
            </tr>
            <tr>
                <td>TELEPHONE NO.</td>
                <td>
                    <?php echo $family->SpouseContactNo; ?></td>
            </tr>
            <tr>
                <td>FATHER&#39;S SURNAME</td>
                <td>
                    <?php echo $family->FatherSurname; ?></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td>
                    <?php echo $family->FatherFirstname; ?></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                   <?php echo $family->FatherMiddlename; ?></td>
            </tr>
            <tr>
                <td>MOTHER&#39;S MAIDEN NAME</td>
                <td>
                    <?php echo $family->MotherMaidenName; ?></td>
            </tr>
            <tr>
                <td>SURNAME</td>
                <td>
                    <?php echo $family->MotherLastname; ?></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td>
                    <?php echo $family->MotherFirstname; ?></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <?php echo $family->MotherMiddlename; ?></td>
            </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th colspan="4">EDUCATIONAL BACKGROUND</th>
                </tr>
                <tr>
                	<td colspan="4">
                		<div id="educational-background-container"></div>
                	</td>
                </tr>
            </table>
            <input type="hidden" id="educationhidden" name="educationhidden" value='<?php echo json_encode($education); ?>' />
        </div>
        <div class="tab-pane fade second-tab" id="page2">
            <table class="table table-bordered">
                <tr>
                    <th colspan="6">CIVIL SERVICE ELIGIBILITY</th>
                </tr>
                <tr>
                	<td colspan="6">
                		<div id="civilservice-container"></div>
                	</td>
                </tr>
            </table>
            <input type="hidden" id="civilservicehidden" name="civilservicehidden" value='<?php echo json_encode($civilservice); ?>' ></input>
            
            <table class="table table-bordered">
                <tr>
                    <th colspan="8">WORK EXPERIENCE (Include private employment.  Start from your current work)</th>
                </tr>
                <tr>
                	<td colspan="8">
                		<div id="workexp-container"></div>
                	</td>
                </tr>
            </table>
            <input type="hidden" id="workexphidden" name="workexphidden" value='<?php echo json_encode($workexp); ?>' />
        </div>
        <div class="tab-pane fade third-tab" id="page3">
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</th>
                </tr>
                <tr>
                	<td colspan="5">
                		<div id="voluntarywork-container"></div>
                	</td>
                </tr>
            </table>
            <input type="hidden" id="voluntaryworkhidden" name="voluntaryworkhidden" value='<?php echo json_encode($vwork); ?>' ></input>
            
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">TRAINING PROGRAMS (Start from the most recent training.)</th>
                </tr>
                <tr>
                	<td colspan="5">
                		<div id="trainingprogram-container">
                		</div>
                	</td>
                </tr>
            </table>
           <input type="hidden" id="trainingprogramhidden" name="trainingprogramhidden" value='<?php echo json_encode($training); ?>' /> 
            
            <table class="table table-bordered">
                <tr>
                    <th colspan="3">OTHER INFORMATION</th>
                </tr>
                <tr>
                	<td colspan="3">
                		<div id="otherinfo-container">
                		</div>
                	</td>
                </tr>
            </table>
            <input type="hidden" id="otherinfohidden" name="otherinfohidden" value='<?php echo json_encode($other); ?>' />
            
        </div>
        <div class="tab-pane fade fourth-tab" id="page4">
            <table class="table table-bordered">
                <tr>
                    <td colspan="4">Are you related by consanguinity or affinity to any of the following : </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                       a. Within the third degree (for National Government Employees): appointing authority, recommending authority, chief of office/bureau/department or person who has immediate supervision over you in the Office, Bureau or Department where you will be appointed?
                    </td>
                    <td colspan="2">                       
                        <?php echo $question->Q36aAns; ?> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q36aDetails; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                       b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed?
                    </td>
                    <td colspan="2">           
                    <?php echo $question->Q36bAns;?>            
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br/>
                        <?php echo $question->Q36bDetails; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       a. Have you ever been formally charged?
                    </td>
                    <td colspan="2">                       
                        <?php echo $question->Q37aAns;?> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q37aDetails; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       b. Have you ever been guilty of any administrative offense?
                    </td>
                    <td colspan="2">                       
                    <?php echo $question->Q37bAns ; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q37bDetails; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                    </td>
                    <td colspan="2">  
                    	<?php echo $question->Q38Ans; ?>                     
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q38Details; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?
                    </td>
                    <td colspan="2">                       
                    <?php echo $question->Q39Ans; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q39Details; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been a candidate in a national or local election (except Barangay election)?
                    </td>
                    <td colspan="2">                       
                    <?php echo $question->Q40Ans; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q40Details; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:</td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you a member of any indigenous group?
                    </td>
                    <td colspan="2">                       
                    <?php echo $question->Q41aAns;?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q41aDetails; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you differently abled?
                    </td>
                    <td colspan="2">
                    <?php echo $question->Q41bAns; ?>                       
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br />
                        <?php echo $question->Q41bDetails; ?>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you a solo parent?
                    </td>
                    <td colspan="2">                       
                    	<?php echo $question->Q41cAns; ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details<br/>
                        <?php echo $question->Q41cDetails; ?>
                    </td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th colspan="3">REFERENCES (Person not related by consanguinity or affinity to applicant / appointee)</th>
                </tr>
                <tr>
                	<td colspan="3">
                		<div id="reference-container"></div>
                	</td>
                </tr>
            </table> 
<input type="hidden" id="referenceshidden" name="referenceshidden" value='<?php echo json_encode($reference); ?>' />
            <table class="table table-bordered">
                <tr>
                    <td colspan="4">
                    I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. <br /><br />
                    I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.
                    </td>
                </tr>
                <tr>
                    <td>COMMUNITY TAX CERTIFICATE NO.</td>
                    <td><?php echo $question->CommunityTaxCertNo; ?></td>
                    <td>ISSUED AT</td>
                    <td><?php echo $question->IssuedAt; ?></td>
                </tr>
                <tr>
                    <td>ISSUED ON (mm/dd/yyyy)</td>
                    <td><?php echo $question->IssuedOn; ?></td>
                    <td>DATE ACCOMPLISHED</td>
                    <td><?php echo $question->DateAccomplished; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <hr />
    <div class="buttons-container">
    	<!-- <input type="submit" id="updateall" class="btn btn-primary btn-md" value="Update" /> -->
    	<a href="<?php echo site_url('pds/edit/'.$currentid)?>" class="btn btn-primary btn-md">Edit</a>
    	<a href="<?php echo site_url("home") ?>" class="btn btn-default btn-md">Home</a>
    </div> 
    <input type="hidden" id="pagetype" value="detail"/>
    </form>
</body>
</html>
<script type="text/javascript">
<!--
	var children = [];
	var educationalbackground = [];
	var civilservice = [];
	var workexp = [];
	var voluntarywork = [];
	var trainingprogram = [];
	var otherinfo = [];
	var references = [];
	$(document).ready(function() {	
   		 $('#myTab a[href="#page1"]').tab('show');

		renderchildrenfromdb();
		//ADD CHILD
	    
	    //ADD EDUC BACK
		rendereducationalbackgroundfromdb();	    
		//ADD EDUC BACK

		//CIVIL SERVICE
		rendercivilserverfromdb();	    
	  	//CIVIL SERVICE

		//WORK EXP
	    renderworkexpfromdb();
		//WORK EXP  

		//VOLUNTARY WORK
	    rendervoluntaryworkfromdb();
		//VOLUNTARY WORK

		//TRAINING PROGRAM
	    rendertrainingprogramfromdb();
		//TRAINING PROGRAM

		//OTHER INFORMATION
	    renderotherinfofromdb();
		//OTHER INFORMATION

		//REFERENCE
	    renderreferencefromdb();
	  //REFERENCE

		  //DEFAULT
		 // $('#maleradio').prop('checked', true);
		 // $('#singleradio').prop('checked', true);
	});



//-->
</script>
<script src="<?php echo base_url(); ?>js/children.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/educationalbackground.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/civilservice.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/workexp.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/voluntarywork.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/trainingprogram.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/otherinfo.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/reference.js" type="text/javascript"></script>