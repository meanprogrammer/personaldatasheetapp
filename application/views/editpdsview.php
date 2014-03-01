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
                <td colspan="3"><input required id="surname" value="<?php echo $personal->Surname; ?>" name="surname" class="form-control input-sm" type="text" /></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td colspan="3"><input required id="firstname" name="firstname" value="<?php echo $personal->Firstname; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td><input id="middlename" required name="middlename" value="<?php echo $personal->Middlename; ?>" class="form-control input-sm"  type="text" /></td>
                <td>NAME EXTENSION (e.g. Jr., Sr.)</td>
                <td><input id="nameextension" name="nameextension" value="<?php echo $personal->ExtensionName; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>DATE OF BIRTH (mm/dd/yyyy)</td>
                <td><input id="dateofbirth" required  name="dateofbirth" value="<?php echo $personal->DateOfBirth; ?>" class="form-control input-sm"  type="text" /></td>
                <td rowspan="3">RESIDENTIAL ADDRESS</td>
                <td rowspan="3"><textarea id="residentialaddtress" name="residentialaddtress" class="form-control"  cols="20" rows="3"><?php echo $personal->ResidentialAddress; ?></textarea></td>
            </tr>
            <tr>
                <td>PLACE OF BIRTH</td>
                <td><input id="placeofbirth" name="placeofbirth" value="<?php echo $personal->PlaceOfBirth; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>SEX</td>
                <td>
                    <input id="maleradio" name="sex" value="Male" <?php if($personal->Sex == "Male") { echo 'checked'; }?> type="radio" /> Male 
                    <input id="femaleradio" name="sex" value="Female" <?php if($personal->Sex == "Female") { echo 'checked'; }?>  type="radio" /> Female 
                </td>
            </tr>
            <tr>
                <td rowspan="2">CIVIL STATUS</td>
                <td rowspan="2">
                    <input id="singleradio" name="civilstatus" value="Single" <?php if($personal->CivilStatus == "Single") { echo 'checked'; }?> type="radio" /> Single 
                    <input id="marriedradio" name="civilstatus" value="Married" <?php if($personal->CivilStatus == "Married") { echo 'checked'; }?> type="radio" /> Married 
                    <input id="anulledradio" name="civilstatus" value="Anulled" <?php if($personal->CivilStatus == "Anulled") { echo 'checked'; }?> type="radio" /> Anulled <br />
                    <input id="widowedradio" name="civilstatus" value="Widowed" <?php if($personal->CivilStatus == "Widowed") { echo 'checked'; }?> type="radio" /> Widowed 
                    <input id="separatedradio" name="civilstatus" value="Separated" <?php if($personal->CivilStatus == "Separated") { echo 'checked'; }?> type="radio" /> Separated 
                    <input id="othersradio" name="civilstatus" value="Others" <?php if($personal->CivilStatus == "Others") { echo 'checked'; }?> type="radio" /> Others 
                </td>
                <td>ZIP CODE</td>
                <td><input id="residentialzipcode" name="residentialzipcode" value="<?php echo $personal->ResidentialZipcode; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>TELEPHONE NO.</td>
                <td><input id="residentialcontactno" name="residentialcontactno" value="<?php echo $personal->ResidentialContactNo; ?>" class="form-control input-sm"  type="text" /></td>
                
            </tr>
            <tr>
                <td>CITIZENSHIP</td>
                <td><input id="citizenship" required name="citizenship" value="<?php echo $personal->Citizenship; ?>" class="form-control input-sm"  type="text" /></td>
                <td rowspan="3">PERMANENT ADDRESS</td>
                <td rowspan="3"><textarea id="permanentaddress" required  name="permanentaddress" class="form-control"  cols="20" rows="3"><?php echo $personal->PermanentAddress; ?></textarea></td>
            </tr>
            <tr>
                <td>HEIGHT (m)</td>
                <td><input id="height" name="height" required value="<?php echo $personal->Height; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>WEIGHT (kg)</td>
                <td><input id="weight" name="weight" required value="<?php echo $personal->Weight; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>BLOOD TYPE</td>
                <td><input id="bloodtype" name="bloodtype" value="<?php echo $personal->BloodType; ?>" class="form-control input-sm"  type="text" /></td>
                <td>ZIP CODE</td>
                <td><input id="permanentzipcode" name="permanentzipcode" value="<?php echo $personal->PermanentZipcode; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>GSIS ID NO.</td>
                <td><input id="gsisidno" name="gsisidno" value="<?php echo $personal->GSISNo; ?>" class="form-control input-sm"  type="text" /></td>
                <td>TELEPHONE NO.</td>
                <td><input id="permanentcontactno" name="permanentcontactno" value="<?php echo $personal->PermanentContactNo; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>PAG-IBIG ID NO.</td>
                <td><input id="pagibigidno" name="pagibigidno" value="<?php echo $personal->PAGIBIGNo; ?>" class="form-control input-sm"  type="text" /></td>
                <td>E-MAIL ADDRESS (if any)</td>
                <td><input id="emailaddress" name="emailaddress" value="<?php echo $personal->EmailAddress; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>PHILHEALTH NO.</td>
                <td><input id="philhealthno" name="philhealthno" value="<?php echo $personal->PhilHealthNo; ?>" class="form-control input-sm"  type="text" /></td>
                <td>CELLPHONE NO. (if any)</td>
                <td><input id="mobileno" name="mobileno" value="<?php echo $personal->MobileNo; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>SSS NO.</td>
                <td><input id="sssno" name="sssno" value="<?php echo $personal->SSSNo; ?>" class="form-control input-sm"  type="text" /></td>
                <td>AGENCY EMPLOYEE NO.</td>
                <td><input id="agencyemployeeno" name="agencyemployeeno" value="<?php echo $personal->AgencyEmployeeNo; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>TIN</td>
                <td colspan="3"><input id="tinno" name="tinno" value="<?php echo $personal->TINNo; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            </table>
            <table class="table table-bordered">
            <tr>
                <th colspan="4">FAMILY BACKGROUND</th>
            </tr>
            <tr>
                <td class="width-200">SPOUSE&#39;S SURNAME</td>
                <td style="width: 300px;">
                    <input id="spousesurname" name="spousesurname" value="<?php echo $family->SpouseSurname; ?>" class="form-control input-sm"  type="text" /></td>
                <td>
                    <input id="addchildbutton" name="addchildbutton" class="btn btn-primary" type="button" 
                        value="Add Child" /></td>
                    <input id="childrenhidden" name="childrenhidden" value='<?php echo json_encode($children); ?>' type="hidden"></input>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>FIRST NAME&nbsp;</td>
                <td>
                    <input id="spousefirstname" name="spousefirstname" value="<?php echo $family->SpouseFirstname; ?>" class="form-control input-sm"  type="text" /></td>
                <td colspan="2" rowspan="13"><div id="children-container"></div></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input id="spousemiddlename" name="spousemiddlename" value="<?php echo $family->SpouseMiddlename; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>OCCUPATION</td>
                <td>
                    <input id="spouseoccupation" name="spouseoccupation" value="<?php echo $family->SpouseOccupation; ?>" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>EMPLOYER/BUS. NAME</td>
                <td>
                    <input id="spouseemployerbusinessname" name="spouseemployerbusinessname" value="<?php echo $family->SpouseEmployerName; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>BUSINESS ADDRESS</td>
                <td>
                    <input id="spouseemployerbusinessaddress" name="spouseemployerbusinessaddress" value="<?php echo $family->SpouseEmployerAddress; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>TELEPHONE NO.</td>
                <td>
                    <input id="spousecontactno" name="spousecontactno" value="<?php echo $family->SpouseContactNo; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>FATHER&#39;S SURNAME</td>
                <td>
                    <input id="fathersurname" name="fathersurname" value="<?php echo $family->FatherSurname; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td>
                    <input id="fatherfirstname" name="fatherfirstname" value="<?php echo $family->FatherFirstname; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input id="fathermiddlename" name="fathermiddlename" value="<?php echo $family->FatherMiddlename; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MOTHER&#39;S MAIDEN NAME</td>
                <td>
                    <input id="mothermaidenname" name="mothermaidenname" value="<?php echo $family->MotherMaidenName; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>SURNAME</td>
                <td>
                    <input id="mothersurname" name="mothersurname" value="<?php echo $family->MotherLastname; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td>
                    <input id="motherfirstname" name="motherfirstname" value="<?php echo $family->MotherFirstname; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input id="mothermiddlename" name="mothermiddlename" value="<?php echo $family->MotherMiddlename; ?>"  class="form-control input-sm"  type="text" /></td>
            </tr>
            </table>

			<div id="addchild-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Child</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td>NAME OF CHILD</td>
			        		<td><input type="text" id="nameofchild" name="nameofchild" /></td>
			        		<td>DATE OF BIRTH (mm/dd/yyyy)</td>
			        		<td><input type="text" id="childdateofbirth" name="childdateofbirth" /></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="savechildbutton" name="savechildbutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->

            <table class="table table-bordered">
                <tr>
                    <th colspan="4">EDUCATIONAL BACKGROUND</th>
                </tr>
                <tr>
                    <td colspan="4"><input name="addeducationalbackgroundbutton" id="addeducationalbackgroundbutton" class="btn btn-primary" type="button" value="Add Educational Background" /></td>
                    <input type="hidden" id="educationhidden" name="educationhidden" value='<?php echo json_encode($education); ?>' />
                </tr>
                <tr>
                	<td colspan="4">
                		<div id="educational-background-container"></div>
                	</td>
                </tr>
            </table>
            
            <div id="addeducation-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Educational Background</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td>LEVEL</td>
			        		<td colspan="3">
			        			<select id="educationlevel" name="educationlevel">
			        				<option value="ELEMENTARY">ELEMENTARY</option>
			        				<option value="SECONDARY">SECONDARY</option>
			        				<option value="VOCATIONAL/TRADE COURSE">VOCATIONAL/TRADE COURSE</option>
			        				<option value="COLLEGE">COLLEGE</option>
			        				<option value="GRADUATE STUDIES">GRADUATE STUDIES</option>
			        			</select>
			        		</td>
			        	</tr>
			        	<tr>
			        		<td width="250">NAME OF SCHOOL(Write in full)</td>
			        		<td colspan="3"><input type="text" id="nameofschool" name="nameofschool" style="width: 300px;" /></td>
			        	</tr>
			        	<tr>
			        		<td>DEGREE COURSE(Write in full)</td>
			        		<td colspan="3"><textarea id="degreecourse" name="degreecourse" ></textarea></td>
			        	</tr>
			        	<tr>
			        		<td>YEAR GRADUATED(if graduated)</td>
			        		<td colspan="3"><input id="yeargraduated" name="yeargraduated" type="text" /></td>
			        	</tr>
			        	<tr>
			        		<td>HIGHEST GRADE/LEVEL/UNITS EARNED(if not graduated)</td>
			        		<td colspan="3"><textarea id="highestgrade" name="highestgrade" ></textarea></td>
			        	</tr>
			        	<tr>
			        		<td colspan="4">INCLUSIVE DATES OF ATTENDANCE</td>
			        	</tr>
			        	<tr>
			        		<td>FROM</td>
			        		<td><input type="text" id="educationfrom" name="educationfrom" /></td>
			        		<td>TO</td>
			        		<td><input type="text" id="educationto" name="educationto" /></td>
			        	</tr>
			        	<tr>
			        		<td>SCHOLARSHIP/ACADEMIC HONORS RECEIVED</td>
			        		<td colspan="3"><textarea id="academichonors" name="academichonors"></textarea></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="saveeducationbutton" name="saveeducationbutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
        </div>
        <div class="tab-pane fade second-tab" id="page2">
            <table class="table table-bordered">
                <tr>
                    <th colspan="6">CIVIL SERVICE ELIGIBILITY</th>
                </tr>
                <tr>
                    <td colspan="6">
                        <input id="addcivileligibilitybutton" name="addcivileligibilitybutton" type="button" class="btn btn-primary" value="Add Civil Service" /></td>
                        <input type="hidden" id="civilservicehidden" name="civilservicehidden" value='<?php echo json_encode($civilservice); ?>' ></input>
                </tr>
                <tr>
                	<td colspan="6">
                		<div id="civilservice-container"></div>
                	</td>
                </tr>
            </table>
            
            <div id="addcivilservice-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Civil Service Eligibility</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td width="250">CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE</td>
			        		<td><input type="text" style="width: 300px;" id="careerservice" name="careerservice" /></td>
			        	</tr>
			        	<tr>
			        		<td width="250">RATING</td>
			        		<td><input type="text" style="width: 300px;" id="civilrating" name="civilrating" /></td>
			        	</tr>
			        	<tr>
			        		<td width="250">DATE OF EXAMINATION / CONFERMENT</td>
			        		<td><input type="text" style="width: 300px;" id="dateofexam" name="dateofexam" /></td>
			        	</tr>
			        	<tr>
			        		<td width="250">PLACE OF EXAMINATION / CONFERMENT</td>
			        		<td><input type="text" style="width: 300px;" id="placeofexam" name="placeofexam" /></td>
			        	</tr>
			        	<tr>
			        		<td colspan="2">LICENSE (if applicable)</td>
			        	</tr>
			        	<tr>
			        		<td width="250">NUMBER</td>
			        		<td><input type="text" style="width: 300px;" id="licenseno" name="licenseno" /></td>
			        	</tr>
			        	<tr>
			        		<td width="250">DATE OF RELEASE</td>
			        		<td><input type="text" style="width: 300px;" id="licensereleasedate" name="licensereleasedate" /></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="savecivilservicebutton" name="savecivilservicebutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
            
            <table class="table table-bordered">
                <tr>
                    <th colspan="8">WORK EXPERIENCE (Include private employment.  Start from your current work)</th>
                </tr>
                <tr>
                    <td colspan="8">
                        <input id="addworkexpbutton" name="addworkexpbutton" type="button" class="btn btn-primary" value="Add Work Experience" /></td>
                        <input type="hidden" id="workexphidden" name="workexphidden" value='<?php echo json_encode($workexp); ?>' />
                </tr>
                <tr>
                	<td colspan="8">
                		<div id="workexp-container"></div>
                	</td>
                </tr>
            </table>
            
            <div id="addworkexp-modal" class="modal fade">
			  <div class="modal-dialog width-800">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Work Experience</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td colspan="4">INCLUSIVE DATES (mm/dd/yyyy)</td>
			        	</tr>
			        	<tr>
			        		<td width="150">FROM</td>
			        		<td width="200"><input type="text" id="workstart" name="workstart" ></input></td>
			        		<td width="150">TO</td>
			        		<td width="200"><input type="text" id="workend" name="workend" ></input></td>
			        	</tr>
			        	<tr>
			        		<td>POSITION TITLE (Write in full)</td>
			        		<td><input type="text" id="positiontitle" name="positiontitle" ></input></td>
			        		<td>DEPARTMENT / AGENCY / OFFICE / COMPANY (Write in full)</td>
			        		<td><input type="text" id="agencyname" name="agencyname" ></input></td>
			        	</tr>
			        	<tr>
			        		<td>MONTHLY SALARY</td>
			        		<td><input type="text" id="monthlysalary" name="monthlysalary" ></input></td>
			        		<td>SALARY GRADE & STEP INCREMENT (Format "00-0")</td>
			        		<td><input type="text" id="salaryincrement" name="salaryincrement" ></input></td>
			        	</tr>
			        	<tr>
			        		<td>STATUS OF APPOINTMENT</td>
			        		<td><input type="text" id="statusofappointment" name="statusofappointment" ></input></td>
			        		<td>GOV'T SERVICE (Yes/No)</td>
			        		<td><input type="text" id="govtservice" name="govtservice" ></input></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="saveworkexpbutton" name="saveworkexpbutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
        </div>
        <div class="tab-pane fade third-tab" id="page3">
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</th>
                </tr>
                <tr>
                    <td colspan="5"><input id="addvoluntaryworkbutton" name="addvoluntaryworkbutton" class="btn btn-primary" type="button" value="Add Voluntary Work" /></td>
                    <input type="hidden" id="voluntaryworkhidden" name="voluntaryworkhidden" value='<?php echo json_encode($vwork); ?>' ></input>
                </tr>
                <tr>
                	<td colspan="5">
                		<div id="voluntarywork-container"></div>
                	</td>
                </tr>
            </table>
            
            <div id="addvoluntarywork-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Voluntary Work</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td colspan="2">NAME & ADDRESS OF ORGANIZATION(Write in full)</td>
			        		<td colspan="2"><textarea id="voluntaryworkorg" name="voluntaryworkorg" cols="35" row="3" ></textarea></td>
			        	</tr>
			        	<tr>
			        		<td colspan="4">INCLUSIVE DATES (mm/dd/yyyy)</td>
			        	</tr>
			        	<tr>
			        		<td>FROM</td>
			        		<td><input type="text" id="voluntaryworkfrom" name="voluntaryworkfrom" /></td>
			        		<td>TO</td>
			        		<td><input type="text" id="voluntaryworkto" name="voluntaryworkto" /></td>
			        	</tr>
			        	<tr>
			        		<td>NUMBER OF HOURS</td>
			        		<td><input type="text" id="voluntaryworkhours" name="voluntaryworkhours" /></td>
			        		<td>POSITION / NATURE OF WORK</td>
			        		<td><input type="text" id="voluntaryworknature" name="voluntaryworknature" /></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="savevoluntaryworkbutton" name="savevoluntaryworkbutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
            
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">TRAINING PROGRAMS (Start from the most recent training.)</th>
                </tr>
                <tr>
                    <td colspan="5"><input id="addtraningprogrambutton" name="addtraningprogrambutton" class="btn btn-primary" type="button" value="Add Training Program" /></td>
                    <input type="hidden" id="trainingprogramhidden" name="trainingprogramhidden" value='<?php echo json_encode($training); ?>' />
                </tr>
                <tr>
                	<td colspan="5">
                		<div id="trainingprogram-container">
                		</div>
                	</td>
                </tr>
            </table>
            
            <div id="addtraningprogram-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Training Program</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td colspan="2">TITLE OF SEMINAR/CONFERENCE/WORKSHOP/SHORT COURSES (Write in full)</td>
			        		<td colspan="2"><textarea id="titleofseminar" name="titleofseminar" cols="35" row="3" ></textarea></td>
			        	</tr>
			        	<tr>
			        		<td colspan="4">INCLUSIVE DATES (mm/dd/yyyy)</td>
			        	</tr>
			        	<tr>
			        		<td>FROM</td>
			        		<td><input type="text" id="trainingfrom" name="trainingfrom" /></td>
			        		<td>TO</td>
			        		<td><input type="text" id="trainingto" name="trainingto" /></td>
			        	</tr>
			        	<tr>
			        		<td>NUMBER OF HOURS</td>
			        		<td><input type="text" id="traininghours" name="traininghours" /></td>
			        		<td>CONDUCTED/ SPONSORED BY (Write in full)</td>
			        		<td><input type="text" id="trainingconducted" name="trainingconducted" /></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="savetrainingprogrambutton" name="savetrainingprogrambutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->           
            
            <table class="table table-bordered">
                <tr>
                    <th colspan="3">OTHER INFORMATION</th>
                </tr>
                <tr>
                    <td colspan="3"><input id="addotherinfobutton" name="addotherinfobutton" type="button" class="btn btn-primary" value="Add Other Information" /></td>
                    <input type="hidden" id="otherinfohidden" name="otherinfohidden" value='<?php echo json_encode($other); ?>' />
                </tr>
                <tr>
                	<td colspan="3">
                		<div id="otherinfo-container">
                		</div>
                	</td>
                </tr>
            </table>
            
            
            <div id="addotherinfo-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Other Information</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td colspan="2">SPECIAL SKILLS / HOBBIES:</td>
			        		<td colspan="2"><textarea id="specialskills" name="specialskills" cols="35" row="3" ></textarea></td>
			        	</tr>
			        				        	<tr>
			        		<td colspan="2">NON-ACADEMIC DISTINCTIONS / RECOGNITION: (Write in full)</td>
			        		<td colspan="2"><textarea id="nonacademicdistinction" name="nonacademicdistinction" cols="35" row="3" ></textarea></td>
			        	</tr>
			        				        	<tr>
			        		<td colspan="2">MEMBERSHIP IN ASSOCIATION/ORGANIZATION(Write in full)</td>
			        		<td colspan="2"><textarea id="membershipassoc" name="membershipassoc" cols="35" row="3" ></textarea></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="saveotherinfobutton" name="saveotherinfobutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->       
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
                        <input id="q36ayes" value="Yes" <?php if($question->Q36aAns == "Yes") { echo 'checked'; }?> name="q36aans" type="radio" /> Yes 
                        <input id="q36ano" value="No" <?php if($question->Q36aAns == "No") { echo 'checked'; }?>  name="q36aans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q36adetails" name="q36adetails" value='<?php echo $question->Q36aDetails; ?>' type="text" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                       b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed?
                    </td>
                    <td colspan="2">                       
                        <input id="q36byes" value="Yes" name="q36bans" <?php if($question->Q36bAns == "Yes") { echo 'checked'; }?> type="radio" /> Yes 
                        <input id="q36bno" value="No" name="q36bans" <?php if($question->Q36bAns == "No") { echo 'checked'; }?> type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q36bdetails" name="q36bdetails" value='<?php echo $question->Q36bDetails; ?>' type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       a. Have you ever been formally charged?
                    </td>
                    <td colspan="2">                       
                        <input id="q37ayes" value="Yes" name="q37aans" <?php if($question->Q37aAns == "Yes") { echo 'checked'; }?> type="radio" /> Yes 
                        <input id="q37ano" value="No" name="q37aans" <?php if($question->Q37aAns == "No") { echo 'checked'; }?> type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q37adetails" name="q37adetails" value='<?php echo $question->Q37aDetails; ?>' type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       b. Have you ever been guilty of any administrative offense?
                    </td>
                    <td colspan="2">                       
                        <input id="q37byes" value="Yes" name="q37bans"  <?php if($question->Q37bAns == "Yes") { echo 'checked'; }?>  type="radio" /> Yes 
                        <input id="q37bno" value="No" name="q37bans" <?php if($question->Q37bAns == "No") { echo 'checked'; }?>  type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q37bdetails" name="q37bdetails"  value='<?php echo $question->Q37bDetails; ?>'  type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                    </td>
                    <td colspan="2">                       
                        <input id="q38yes" value="Yes" name="q38ans" <?php if($question->Q38Ans == "Yes") { echo 'checked'; }?>  type="radio" /> Yes 
                        <input id="q38no" value="No" name="q38ans" <?php if($question->Q38Ans == "No") { echo 'checked'; }?>  type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q38details" name="q38details" value='<?php echo $question->Q38Details; ?>' type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?
                    </td>
                    <td colspan="2">                       
                        <input id="q39yes" value="Yes" name="q39ans" <?php if($question->Q39Ans == "Yes") { echo 'checked'; }?>  type="radio" /> Yes 
                        <input id="q39no" value="No" name="q39ans" <?php if($question->Q39Ans == "No") { echo 'checked'; }?>  type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q39details" name="q39details" value='<?php echo $question->Q39Details; ?>' type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been a candidate in a national or local election (except Barangay election)?
                    </td>
                    <td colspan="2">                       
                        <input id="q40yes" value="Yes" name="q40ans" <?php if($question->Q40Ans == "Yes") { echo 'checked'; }?> type="radio" /> Yes 
                        <input id="q40no" value="No" name="q40ans" <?php if($question->Q40Ans == "No") { echo 'checked'; }?> type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q40details" name="q40details" value='<?php echo $question->Q40Details; ?>' type="text" />
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
                        <input id="q41ayes" value="Yes" name="q41aans" <?php if($question->Q41aAns == "Yes") { echo 'checked'; }?> type="radio" /> Yes 
                        <input id="q41ano" value="No" name="q41aans" <?php if($question->Q41aAns == "No") { echo 'checked'; }?> type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q41adetails"  name="q41adetails" value='<?php echo $question->Q41aDetails; ?>' type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you differently abled?
                    </td>
                    <td colspan="2">                       
                        <input id="q41byes" value="Yes" name="q41bans"  <?php if($question->Q41bAns == "Yes") { echo 'checked'; }?>  type="radio" /> Yes 
                        <input id="q41bno" value="No" name="q41bans"  <?php if($question->Q41bAns == "No") { echo 'checked'; }?>  type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q41bdetails"  name="q41bdetails"  value='<?php echo $question->Q41bDetails; ?>' type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you a solo parent?
                    </td>
                    <td colspan="2">                       
                        <input id="q41cyes" value="Yes" name="q41cans" <?php if($question->Q41cAns == "Yes") { echo 'checked'; }?> type="radio" /> Yes 
                        <input id="q41cno" value="No" name="q41cans" <?php if($question->Q41cAns == "No") { echo 'checked'; }?> type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q41cdetails" name="q41cdetails" value='<?php echo $question->Q41cDetails; ?>' type="text" />
                    </td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th colspan="3">REFERENCES (Person not related by consanguinity or affinity to applicant / appointee)</th>
                </tr>
                <tr>
                    <td colspan="3"><input id="addreferencebutton" class="btn btn-primary" type="button" value="Add Reference" /></td>
                    <input type="hidden" id="referenceshidden" name="referenceshidden" value='<?php echo json_encode($reference); ?>' />
                </tr>
                <tr>
                	<td colspan="3">
                		<div id="reference-container"></div>
                	</td>
                </tr>
            </table>

            <div id="addreference-modal" class="modal fade">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h4 class="modal-title">Add Reference</h4>
			      </div>
			      <div class="modal-body">
			        <table class="table table-bordered">
			        	<tr>
			        		<td colspan="2">NAME</td>
			        		<td colspan="2"><input  type="text" id="referencename" name="referencename" /></td>
			        	</tr>
			        	<tr>
			        		<td colspan="2">ADDRESS</td>
			        		<td colspan="2"><input  type="text" id="referenceaddress" name="referenceaddress" /></td>
			        	</tr>
			        	<tr>
			        		<td colspan="2">TEL. NO.</td>
			        		<td colspan="2"><input  type="text" id="referencecontact" name="referencecontact" /></td>
			        	</tr>
			        </table>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button id="savereferencebutton" name="savereferencebutton" type="button" class="btn btn-primary">Save</button>
			      </div>
			    </div><!-- /.modal-content -->
			  </div><!-- /.modal-dialog -->
			</div><!-- /.modal -->   

            <table class="table table-bordered">
                <tr>
                    <td colspan="4">
                    I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. <br /><br />
                    I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.
                    </td>
                </tr>
                <tr>
                    <td>COMMUNITY TAX CERTIFICATE NO.</td>
                    <td><input id="communitytaxcertno" name="communitytaxcertno" value="<?php echo $question->CommunityTaxCertNo; ?>" type="text" /></td>
                    <td>ISSUED AT</td>
                    <td><input id="issuedat" name="issuedat" value="<?php echo $question->IssuedAt; ?>" type="text" /></td>
                </tr>
                <tr>
                    <td>ISSUED ON (mm/dd/yyyy)</td>
                    <td><input id="issuedon" name="issuedon" value="<?php echo $question->IssuedOn; ?>" type="text" /></td>
                    <td>DATE ACCOMPLISHED</td>
                    <td><input id="dateaccomplished" name="dateaccomplished" value="<?php echo $question->DateAccomplished; ?>" type="text" /></td>
                </tr>
            </table>
        </div>
    </div>
    <hr />
    <div class="buttons-container">
    	<input type="submit" id="updateall" class="btn btn-primary" value="Update" />
    	<a href="<?php echo site_url("home") ?>" class="btn btn-default">Home</a>
    </div> 
    <input type="hidden" id="pagetype" value="edit"/>
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

   		 //ADD CHILD
	    $('#addchildbutton').click(function(){
	    	$('#addchild-modal').modal({ keyboard: false });
	    });

	    $('#issuedon,#dateaccomplished,#trainingfrom,#trainingto,#voluntaryworkfrom,#voluntaryworkto,#workstart,#workend,#dateofexam,#childdateofbirth,#licensereleasedate,#dateofbirth,#educationfrom,#educationto').datepicker();

	    $('#addchild-modal').on('hide.bs.modal', function (e) {
	    	  $('#nameofchild,#childdateofbirth').val('');
	    });

	    $('#savechildbutton').click(function(){
		    
		    var childname = $('#nameofchild').val();
		    var childdob = $('#childdateofbirth').val();
		    children.push({ "nameofchild":childname, "childdateofbirth": childdob });

		    renderchildren();
		    
		    $('#childrenhidden').val(JSON.stringify(children));
		    $('#addchild-modal').modal('hide');		    		 
		});

		renderchildrenfromdb();
		//ADD CHILD
	    
	    //ADD EDUC BACK
		$('#addeducationalbackgroundbutton').click(function(){
			$('#addeducation-modal').modal({ keyboard: false });
		});

		$('#saveeducationbutton').click(saveeducationalbackground);

	    $('#addeducation-modal').on('hide.bs.modal', function (e) {
		      $('#educationlevel').val('0');
	    	  $('#degreecourse,#nameofschool,#yeargraduated,#highestgrade,#educationfrom,#educationto,#academichonors').val('');
	    });
		rendereducationalbackgroundfromdb();	    
		//ADD EDUC BACK

		//CIVIL SERVICE
		$('#addcivileligibilitybutton').click(function(){
			$('#addcivilservice-modal').modal({ keyboard: false });
		});

		$('#savecivilservicebutton').click(savecivilservice);

	    $('#addcivilservice-modal').on('hide.bs.modal', function (e) {
			  $('#careerservice,#civilrating,#dateofexam,#placeofexam,#licenseno,#licensereleasedate').val('');
	    });
		rendercivilserverfromdb();	    
	  	//CIVIL SERVICE

		//WORK EXP
		$('#addworkexpbutton').click(function(){
			$('#addworkexp-modal').modal({ keyboard: false });
		});

		$('#saveworkexpbutton').click(saveworkexp);

	    $('#addworkexp-modal').on('hide.bs.modal', function (e) {
			 $('#workstart,#workend,#positiontitle,#agencyname,#monthlysalary,#salaryincrement,#statusofappointment,#govtservice').val('');
	    });
	    renderworkexpfromdb();
		//WORK EXP  

		//VOLUNTARY WORK
		$('#addvoluntaryworkbutton').click(function(){
			$('#addvoluntarywork-modal').modal({ keyboard: false });
		});

		$('#savevoluntaryworkbutton').click(savevoluntarywork);

	    $('#addvoluntarywork-modal').on('hide.bs.modal', function (e) {
			  $('#voluntaryworkorg,#voluntaryworkfrom,#voluntaryworkto,#voluntaryworkhours,#voluntaryworknature').val('');
	    });
	    rendervoluntaryworkfromdb();
		//VOLUNTARY WORK

		//TRAINING PROGRAM
		$('#addtraningprogrambutton').click(function(){
			$('#addtraningprogram-modal').modal({ keyboard: false });
		});

		$('#savetrainingprogrambutton').click(savetrainingprogram);

	    $('#addtraningprogram-modal').on('hide.bs.modal', function (e) {
			 $('#titleofseminar,#trainingfrom,#trainingto,#traininghours,#trainingconducted').val('');
	    });
	    rendertrainingprogramfromdb();
		//TRAINING PROGRAM

		//OTHER INFORMATION
		$('#addotherinfobutton').click(function(){
			$('#addotherinfo-modal').modal({ keyboard: false });
		});

		$('#saveotherinfobutton').click(saveotherinfo);

	    $('#addotherinfo-modal').on('hide.bs.modal', function (e) {
			  $('#specialskills,#nonacademicdistinction,#membershipassoc').val('');			 
	    });
	    renderotherinfofromdb();
		//OTHER INFORMATION

		//REFERENCE
		$('#addreferencebutton').click(function(){
			$('#addreference-modal').modal({ keyboard: false });
		});

		$('#savereferencebutton').click(savereference);

	    $('#addreference-modal').on('hide.bs.modal', function (e) {
			  $('#referencename,#referenceaddress,#referencecontact').val('');			 
	    });
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