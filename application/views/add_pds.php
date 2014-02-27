<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<script src="js/jquery-1.8.3.js" type="text/javascript"></script>
	<script src="js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
    <ul class="nav nav-tabs" id="myTab">
      <li class="active"><a href="#page1" data-toggle="tab">Page 1</a></li>
      <li><a href="#page2" data-toggle="tab">Page 2</a></li>
      <li><a href="#page3" data-toggle="tab">Page 3</a></li>
      <li><a href="#page4" data-toggle="tab">Page 4</a></li>
    </ul>
    <form method="post" id="mainform" action="index.php/savepds/savepersonalinfo" >
    <div class="tab-content">
        <div class="tab-pane active first-tab" id="page1">
            <table class="table table-bordered">
            <tr>
                <th colspan="4">PERSONAL INFORMATION</th>
            </tr>
            <tr>
                <td>SURNAME</td>
                <td colspan="3"><input id="surname" name="surname" class="form-control input-sm" type="text" /></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td colspan="3"><input id="firstname" name="firstname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td><input id="middlename" name="middlename" class="form-control input-sm"  type="text" /></td>
                <td>NAME EXTENSION (e.g. Jr., Sr.)</td>
                <td><input id="nameextension" name="nameextension" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>DATE OF BIRTH (mm/dd/yyyy)</td>
                <td><input id="dateofbirth" name="dateofbirth" class="form-control input-sm"  type="text" /></td>
                <td rowspan="3">RESIDENTIAL ADDRESS</td>
                <td rowspan="3"><textarea id="residentialaddtress" name="residentialaddtress" class="form-control"  cols="20" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>PLACE OF BIRTH</td>
                <td><input id="placeofbirth" name="placeofbirth" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>SEX</td>
                <td>
                    <input id="maleradio" name="sex" value="Male" type="radio" /> Male 
                    <input id="femaleradio" name="sex" value="Female" type="radio" /> Female 
                </td>
            </tr>
            <tr>
                <td rowspan="2">CIVIL STATUS</td>
                <td rowspan="2">
                    <input id="singleradio" name="civilstatus" value="Single" type="radio" /> Single 
                    <input id="marriedradio" name="civilstatus" value="Married" type="radio" /> Married 
                    <input id="anulledradio" name="civilstatus" value="Anulled" type="radio" /> Anulled <br />
                    <input id="widowedradio" name="civilstatus" value="Widowed"  type="radio" /> Widowed 
                    <input id="separatedradio" name="civilstatus" value="Separated"  type="radio" /> Separated 
                    <input id="othersradio" name="civilstatus" value="Others"  type="radio" /> Others 
                </td>
                <td>ZIP CODE</td>
                <td><input id="residentialzipcode" name="residentialzipcode" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>TELEPHONE NO.</td>
                <td><input id="residentialcontactno" name="residentialcontactno" class="form-control input-sm"  type="text" /></td>
                
            </tr>
            <tr>
                <td>CITIZENSHIP</td>
                <td><input id="citizenship" name="citizenship" class="form-control input-sm"  type="text" /></td>
                <td rowspan="3">PERMANENT ADDRESS</td>
                <td rowspan="3"><textarea id="permanentaddress" name="permanentaddress" class="form-control"  cols="20" rows="3"></textarea></td>
            </tr>
            <tr>
                <td>HEIGHT (m)</td>
                <td><input id="height" name="height" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>WEIGHT (kg)</td>
                <td><input id="weight" name="weight" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>BLOOD TYPE</td>
                <td><input id="bloodtype" name="bloodtype" class="form-control input-sm"  type="text" /></td>
                <td>ZIP CODE</td>
                <td><input id="permanentzipcode" name="permanentzipcode" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>GSIS ID NO.</td>
                <td><input id="gsisidno" name="gsisidno" class="form-control input-sm"  type="text" /></td>
                <td>TELEPHONE NO.</td>
                <td><input id="permanentcontactno" name="permanentcontactno" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>PAG-IBIG ID NO.</td>
                <td><input id="pagibigidno" name="pagibigidno" class="form-control input-sm"  type="text" /></td>
                <td>E-MAIL ADDRESS (if any)</td>
                <td><input id="emailaddress" name="emailaddress" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>PHILHEALTH NO.</td>
                <td><input id="philhealthno" name="philhealthno" class="form-control input-sm"  type="text" /></td>
                <td>CELLPHONE NO. (if any)</td>
                <td><input id="mobileno" name="mobileno" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>SSS NO.</td>
                <td><input id="sssno" name="sssno" class="form-control input-sm"  type="text" /></td>
                <td>AGENCY EMPLOYEE NO.</td>
                <td><input id="agencyemployeeno" name="agencyemployeeno" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>TIN</td>
                <td colspan="3"><input id="tinno" name="tinno" class="form-control input-sm"  type="text" /></td>
            </tr>
            </table>
            <table class="table table-bordered">
            <tr>
                <th colspan="4">FAMILY BACKGROUND</th>
            </tr>
            <tr>
                <td class="width-200">SPOUSE&#39;S SURNAME</td>
                <td>
                    <input id="spousesurname" class="form-control input-sm"  type="text" /></td>
                <td>
                    <input id="addchildbutton" class="btn btn-primary" type="button" 
                        value="Add Child" /></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>FIRST NAME&nbsp;</td>
                <td>
                    <input id="spousefirstname" class="form-control input-sm"  type="text" /></td>
                <td colspan="2" rowspan="13">&nbsp;</td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input id="spousemiddlename" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>OCCUPATION</td>
                <td>
                    <input id="spouseoccupation" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>EMPLOYER/BUS. NAME</td>
                <td>
                    <input id="spouseemployerbusinessname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>BUSINESS ADDRESS</td>
                <td>
                    <input id="spouseemployerbusinessaddress" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>TELEPHONE NO.</td>
                <td>
                    <input id="spousecontactno" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>FATHER&#39;S SURNAME</td>
                <td>
                    <input id="fathersurname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td>
                    <input id="fatherfirstname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input id="fathermiddlename" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MOTHER&#39;S MAIDEN NAME</td>
                <td>
                    <input id="mothermaidenname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>SURNAME</td>
                <td>
                    <input id="mothersurname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>FIRST NAME</td>
                <td>
                    <input id="motherfirstname" class="form-control input-sm"  type="text" /></td>
            </tr>
            <tr>
                <td>MIDDLE NAME</td>
                <td>
                    <input id="mothermiddlename" class="form-control input-sm"  type="text" /></td>
            </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th colspan="4">EDUCATIONAL BACKGROUND</th>
                </tr>
                <tr>
                    <td colspan="4"><input id="addeducationalbackgroundbutton" class="btn btn-primary" type="button" value="Add Educational Background" /></td>
                </tr>
            </table>
        </div>
        <div class="tab-pane fade second-tab" id="page2">
            <table class="table table-bordered">
                <tr>
                    <th colspan="6">CIVIL SERVICE ELIGIBILITY</th>
                </tr>
                <tr>
                    <td colspan="6">
                        <input id="addcivileligibilitybutton" type="button" class="btn btn-primary" value="Add Civil Service" /></td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th colspan="8">WORK EXPERIENCE (Include private employment.  Start from your current work)</th>
                </tr>
                <tr>
                    <td colspan="8">
                        <input id="addworkexpbutton" type="button" class="btn btn-primary" value="Add Work Experience" /></td>
                </tr>
            </table>
        </div>
        <div class="tab-pane fade third-tab" id="page3">
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</th>
                </tr>
                <tr>
                    <td colspan="5"><input id="addvoluntaryworkbutton" class="btn btn-primary" type="button" value="Add Voluntary Work" /></td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">TRAINING PROGRAMS (Start from the most recent training.)</th>
                </tr>
                <tr>
                    <td colspan="5"><input id="addtraningprogrambutton" class="btn btn-primary" type="button" value="Add Training Program" /></td>
                </tr>
            </table>
            <table class="table table-bordered">
                <tr>
                    <th colspan="5">OTHER INFORMATION</th>
                </tr>
                <tr>
                    <td colspan="5"><input id="addotherinfobutton" type="button" class="btn btn-primary" value="Add Other Information" /></td>
                </tr>
            </table>
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
                        <input id="q36ayes" name="q36aans" type="radio" /> Yes 
                        <input id="q36ano" name="q36aans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q36adetails" type="text" />
                    </td>
                </tr>
                <tr>
                    <td colspan="2" rowspan="2">
                       b. Within the fourth degree (for Local Government Employees): appointing authority or recommending authority where you will be appointed?
                    </td>
                    <td colspan="2">                       
                        <input id="q36byes" name="q36bans" type="radio" /> Yes 
                        <input id="q36bno" name="q36bans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q36bdetails" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       a. Have you ever been formally charged?
                    </td>
                    <td colspan="2">                       
                        <input id="q37ayes" name="q37aans" type="radio" /> Yes 
                        <input id="q37ano" name="q37aans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q37adetails" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       b. Have you ever been guilty of any administrative offense?
                    </td>
                    <td colspan="2">                       
                        <input id="q37byes" name="q37bans" type="radio" /> Yes 
                        <input id="q37bno" name="q37bans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q37bdetails" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                    </td>
                    <td colspan="2">                       
                        <input id="q38yes" name="q38ans" type="radio" /> Yes 
                        <input id="q38no" name="q38ans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q38details" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal, termination, end of term, finished contract, AWOL or phased out, in the public or private sector?
                    </td>
                    <td colspan="2">                       
                        <input id="q39yes" name="q39ans" type="radio" /> Yes 
                        <input id="q39no" name="q39ans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q39details" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Have you ever been a candidate in a national or local election (except Barangay election)?
                    </td>
                    <td colspan="2">                       
                        <input id="q40yes" name="q40ans" type="radio" /> Yes 
                        <input id="q40no" name="q40ans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q40details" type="text" />
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
                        <input id="q41ayes" name="q41aans" type="radio" /> Yes 
                        <input id="q41ano" name="q41aans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q41adetails" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you differently abled?
                    </td>
                    <td colspan="2">                       
                        <input id="q41byes" name="q41bans" type="radio" /> Yes 
                        <input id="q41bno" name="q41bans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q41bdetails" type="text" />
                    </td>
                </tr>

                <tr>
                    <td colspan="2" rowspan="2">
                       Are you a solo parent?
                    </td>
                    <td colspan="2">                       
                        <input id="q41cyes" name="q41cans" type="radio" /> Yes 
                        <input id="q41cno" name="q41cans" type="radio" /> No 
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        If YES, give details
                        <input id="q41cdetails" type="text" />
                    </td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th colspan="3">REFERENCES (Person not related by consanguinity or affinity to applicant / appointee)</th>
                </tr>
                <tr>
                    <td colspan="3"><input id="addreferencebutton" class="btn btn-primary" type="button" value="Add Reference" /></td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <td colspan="4">
                    I declare under oath that this Personal Data Sheet has been accomplished by me, and is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. <br /><br />
                    I also authorize the agency head / authorized representative to verify / validate the contents stated herein.  I trust that  this information shall remain confidential.
                    </td>
                </tr>
                <tr>
                    <td>COMMUNITY TAX CERTIFICATE NO.</td>
                    <td><input id="communitytaxcertno" type="text" /></td>
                    <td>ISSUED AT</td>
                    <td><input id="issuedat" type="text" /></td>
                </tr>
                <tr>
                    <td>ISSUED ON (mm/dd/yyyy)</td>
                    <td><input id="issuedon" type="text" /></td>
                    <td>DATE ACCOMPLISHED</td>
                    <td><input id="dateaccomplished" type="text" /></td>
                </tr>
            </table>
        </div>
    </div>
    <input type="submit" id="saveall" class="btn btn-primary" value="Save" /> 
    </form>
</body>
</html>
<script type="text/javascript">
<!--
$(function () {
    $('#myTab a:first').tab('show');
  })
//-->
</script>
