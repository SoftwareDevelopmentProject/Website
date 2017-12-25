<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>Register</title>
    <?php include "_head.php";?>
</head>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $db->myaccount($_POST['name'],$_POST['email'],$_POST['phone'],$_POST['country']);
    }

?>
<body>
    <?php include "_header.php";?>
       <div class="register_account" style="margin-bottom: 50px;">
          	<div class="wrap">
    	      <h4 class="title">My Account</h4>
    		   <form method="post">
    			 <div class="col_1_of_2 span_1_of_2">
		   			 <div><input type="text" name ="name" value="<?php echo $user['member_name']?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $user['member_name']?>';}"></div>
		    			<div><input type="text" name="email" value="<?php echo $user['member_email']?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $user['member_email']?>';}"></div>
                     <div><a href="" style="text-decoration: underline;font-size: 14px;">change password</a> </div>
		    	 </div>
		    	  <div class="col_1_of_2 span_1_of_2">
                      <div><input type="text" name="phone" value="<?php echo $user['member_phone']?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $user['member_phone']?>';}"></div>
		    		<div><select id="country" name="country" onchange="change_country(this.value)" class="frm-field required">
		            <option value="null">Select a Country</option>
		            <option value="AX" <?php if($user['member_country'] == "AX") echo "selected"; ?>>Åland Islands</option>
		            <option value="AF" <?php if($user['member_country'] == "AF") echo "selected"; ?>>Afghanistan</option>
		            <option value="AL" <?php if($user['member_country'] == "AL") echo "selected"; ?>>Albania</option>
		            <option value="DZ" <?php if($user['member_country'] == "DZ") echo "selected"; ?>>Algeria</option>
		            <option value="AS" <?php if($user['member_country'] == "AS") echo "selected"; ?>>American Samoa</option>
		            <option value="AD" <?php if($user['member_country'] == "AD") echo "selected"; ?>>Andorra</option>
		            <option value="AO" <?php if($user['member_country'] == "AO") echo "selected"; ?>>Angola</option>
		            <option value="AI" <?php if($user['member_country'] == "AI") echo "selected"; ?>>Anguilla</option>
		            <option value="AQ" <?php if($user['member_country'] == "AQ") echo "selected"; ?>>Antarctica</option>
		            <option value="AG" <?php if($user['member_country'] == "AG") echo "selected"; ?>>Antigua And Barbuda</option>
		            <option value="AR" <?php if($user['member_country'] == "AX") echo "selected"; ?>>Argentina</option>
		            <option value="AM" <?php if($user['member_country'] == "AM") echo "selected"; ?>>Armenia</option>
		            <option value="AW" <?php if($user['member_country'] == "AW") echo "selected"; ?>>Aruba</option>
		            <option value="AU" <?php if($user['member_country'] == "AU") echo "selected"; ?>>Australia</option>
		            <option value="AT" <?php if($user['member_country'] == "AT") echo "selected"; ?>>Austria</option>
		            <option value="AZ" <?php if($user['member_country'] == "AZ") echo "selected"; ?>>Azerbaijan</option>
		            <option value="BS" <?php if($user['member_country'] == "BS") echo "selected"; ?>>Bahamas</option>
		            <option value="BH" <?php if($user['member_country'] == "BH") echo "selected"; ?>>Bahrain</option>
		            <option value="BD" <?php if($user['member_country'] == "BD") echo "selected"; ?>>Bangladesh</option>
		            <option value="BB" <?php if($user['member_country'] == "BB") echo "selected"; ?>>Barbados</option>
		            <option value="BY" <?php if($user['member_country'] == "BY") echo "selected"; ?>>Belarus</option>
		            <option value="BE" <?php if($user['member_country'] == "BE") echo "selected"; ?>>Belgium</option>
		            <option value="BZ" <?php if($user['member_country'] == "BZ") echo "selected"; ?>>Belize</option>
		            <option value="BJ" <?php if($user['member_country'] == "BJ") echo "selected"; ?>>Benin</option>
		            <option value="BM" <?php if($user['member_country'] == "BM") echo "selected"; ?>>Bermuda</option>
		            <option value="BT" <?php if($user['member_country'] == "BT") echo "selected"; ?>>Bhutan</option>
		            <option value="BO" <?php if($user['member_country'] == "BO") echo "selected"; ?>>Bolivia</option>
		            <option value="BA" <?php if($user['member_country'] == "BA") echo "selected"; ?>>Bosnia and Herzegovina</option>
		            <option value="BW" <?php if($user['member_country'] == "BW") echo "selected"; ?>>Botswana</option>
		            <option value="BV" <?php if($user['member_country'] == "BV") echo "selected"; ?>>Bouvet Island</option>
		            <option value="BR" <?php if($user['member_country'] == "BR") echo "selected"; ?>>Brazil</option>
		            <option value="IO" <?php if($user['member_country'] == "IO") echo "selected"; ?>>British Indian Ocean Territory</option>
		            <option value="BN" <?php if($user['member_country'] == "BN") echo "selected"; ?>>Brunei</option>
		            <option value="BG" <?php if($user['member_country'] == "BG") echo "selected"; ?>>Bulgaria</option>
		            <option value="BF" <?php if($user['member_country'] == "BF") echo "selected"; ?>>Burkina Faso</option>
		            <option value="BI" <?php if($user['member_country'] == "BI") echo "selected"; ?>>Burundi</option>
		            <option value="KH" <?php if($user['member_country'] == "KH") echo "selected"; ?>>Cambodia</option>
		            <option value="CM" <?php if($user['member_country'] == "CM") echo "selected"; ?>>Cameroon</option>
		            <option value="CA" <?php if($user['member_country'] == "CA") echo "selected"; ?>>Canada</option>
		            <option value="CV" <?php if($user['member_country'] == "CV") echo "selected"; ?>>Cape Verde</option>
		            <option value="KY" <?php if($user['member_country'] == "KY") echo "selected"; ?>>Cayman Islands</option>
		            <option value="CF" <?php if($user['member_country'] == "CF") echo "selected"; ?>>Central African Republic</option>
		            <option value="TD" <?php if($user['member_country'] == "TD") echo "selected"; ?>>Chad</option>
		            <option value="CL" <?php if($user['member_country'] == "CL") echo "selected"; ?>>Chile</option>
		            <option value="CN" <?php if($user['member_country'] == "CN") echo "selected"; ?>>China</option>
		            <option value="CX" <?php if($user['member_country'] == "CX") echo "selected"; ?>>Christmas Island</option>
		            <option value="CC" <?php if($user['member_country'] == "CC") echo "selected"; ?>>Cocos (Keeling) Islands</option>
		            <option value="CO" <?php if($user['member_country'] == "CO") echo "selected"; ?>>Colombia</option>
		            <option value="KM" <?php if($user['member_country'] == "KM") echo "selected"; ?>>Comoros</option>
		            <option value="CG" <?php if($user['member_country'] == "CG") echo "selected"; ?>>Congo</option>
		            <option value="CD" <?php if($user['member_country'] == "CD") echo "selected"; ?>>Congo, Democractic Republic</option>
		            <option value="CK" <?php if($user['member_country'] == "CK") echo "selected"; ?>>Cook Islands</option>
		            <option value="CR" <?php if($user['member_country'] == "CR") echo "selected"; ?>>Costa Rica</option>
		            <option value="CI" <?php if($user['member_country'] == "CI") echo "selected"; ?>>Cote D'Ivoire (Ivory Coast)</option>
		            <option value="HR" <?php if($user['member_country'] == "HR") echo "selected"; ?>>Croatia (Hrvatska)</option>
		            <option value="CU" <?php if($user['member_country'] == "CU") echo "selected"; ?>>Cuba</option>
		            <option value="CY" <?php if($user['member_country'] == "CY") echo "selected"; ?>>Cyprus</option>
		            <option value="CZ" <?php if($user['member_country'] == "CZ") echo "selected"; ?>>Czech Republic</option>
		            <option value="DK" <?php if($user['member_country'] == "DK") echo "selected"; ?>>Denmark</option>
		            <option value="DJ" <?php if($user['member_country'] == "DJ") echo "selected"; ?>>Djibouti</option>
		            <option value="DM" <?php if($user['member_country'] == "DM") echo "selected"; ?>>Dominica</option>
		            <option value="DO" <?php if($user['member_country'] == "DO") echo "selected"; ?>>Dominican Republic</option>
		            <option value="TP" <?php if($user['member_country'] == "TP") echo "selected"; ?>>East Timor</option>
		            <option value="EC" <?php if($user['member_country'] == "EC") echo "selected"; ?>>Ecuador</option>
		            <option value="EG" <?php if($user['member_country'] == "EG") echo "selected"; ?>>Egypt</option>
		            <option value="SV" <?php if($user['member_country'] == "SV") echo "selected"; ?>>El Salvador</option>
		            <option value="GQ" <?php if($user['member_country'] == "GQ") echo "selected"; ?>>Equatorial Guinea</option>
		            <option value="ER" <?php if($user['member_country'] == "ER") echo "selected"; ?>>Eritrea</option>
		            <option value="EE" <?php if($user['member_country'] == "EE") echo "selected"; ?>>Estonia</option>
		            <option value="ET" <?php if($user['member_country'] == "ET") echo "selected"; ?>>Ethiopia</option>
		            <option value="FK" <?php if($user['member_country'] == "FK") echo "selected"; ?>>Falkland Islands (Islas Malvinas)</option>
		            <option value="FO" <?php if($user['member_country'] == "FO") echo "selected"; ?>>Faroe Islands</option>
		            <option value="FJ" <?php if($user['member_country'] == "FJ") echo "selected"; ?>>Fiji Islands</option>
		            <option value="FI" <?php if($user['member_country'] == "FI") echo "selected"; ?>>Finland</option>
		            <option value="FR" <?php if($user['member_country'] == "FR") echo "selected"; ?>>France</option>
		            <option value="FX" <?php if($user['member_country'] == "FX") echo "selected"; ?>>France, Metropolitan</option>
		            <option value="GF" <?php if($user['member_country'] == "GF") echo "selected"; ?>>French Guiana</option>
		            <option value="PF" <?php if($user['member_country'] == "PF") echo "selected"; ?>>French Polynesia</option>
		            <option value="TF" <?php if($user['member_country'] == "TF") echo "selected"; ?>>French Southern Territories</option>
		            <option value="GA" <?php if($user['member_country'] == "GA") echo "selected"; ?>>Gabon</option>
		            <option value="GM" <?php if($user['member_country'] == "GM") echo "selected"; ?>>Gambia, The</option>
		            <option value="GE" <?php if($user['member_country'] == "GE") echo "selected"; ?>>Georgia</option>
		            <option value="DE" <?php if($user['member_country'] == "DE") echo "selected"; ?>>Germany</option>
		            <option value="GH" <?php if($user['member_country'] == "GH") echo "selected"; ?>>Ghana</option>
		            <option value="GI" <?php if($user['member_country'] == "GI") echo "selected"; ?>>Gibraltar</option>
		            <option value="GR" <?php if($user['member_country'] == "GR") echo "selected"; ?>>Greece</option>
		            <option value="GL" <?php if($user['member_country'] == "GL") echo "selected"; ?>>Greenland</option>
		            <option value="GD" <?php if($user['member_country'] == "GD") echo "selected"; ?>>Grenada</option>
		            <option value="GP" <?php if($user['member_country'] == "GP") echo "selected"; ?>>Guadeloupe</option>
		            <option value="GU" <?php if($user['member_country'] == "GU") echo "selected"; ?>>Guam</option>
		            <option value="GT" <?php if($user['member_country'] == "GT") echo "selected"; ?>>Guatemala</option>
		            <option value="GG" <?php if($user['member_country'] == "GG") echo "selected"; ?>>Guernsey</option>
		            <option value="GN" <?php if($user['member_country'] == "GN") echo "selected"; ?>>Guinea</option>
		            <option value="GW" <?php if($user['member_country'] == "GW") echo "selected"; ?>>Guinea-Bissau</option>
		            <option value="GY" <?php if($user['member_country'] == "GY") echo "selected"; ?>>Guyana</option>
		            <option value="HT" <?php if($user['member_country'] == "HT") echo "selected"; ?>>Haiti</option>
		            <option value="HM" <?php if($user['member_country'] == "HM") echo "selected"; ?>>Heard and McDonald Islands</option>
		            <option value="HN" <?php if($user['member_country'] == "HN") echo "selected"; ?>>Honduras</option>
		            <option value="HK" <?php if($user['member_country'] == "HK") echo "selected"; ?>>Hong Kong S.A.R.</option>
		            <option value="HU" <?php if($user['member_country'] == "HU") echo "selected"; ?>>Hungary</option>
		            <option value="IS" <?php if($user['member_country'] == "IS") echo "selected"; ?>>Iceland</option>
		            <option value="IN" <?php if($user['member_country'] == "IN") echo "selected"; ?>>India</option>
		            <option value="ID" <?php if($user['member_country'] == "ID") echo "selected"; ?>>Indonesia</option>
		            <option value="IR" <?php if($user['member_country'] == "IR") echo "selected"; ?>>Iran</option>
		            <option value="IQ" <?php if($user['member_country'] == "IQ") echo "selected"; ?>>Iraq</option>
		            <option value="IE" <?php if($user['member_country'] == "IE") echo "selected"; ?>>Ireland</option>
		            <option value="IM" <?php if($user['member_country'] == "IM") echo "selected"; ?>>Isle of Man</option>
		            <option value="IL" <?php if($user['member_country'] == "IL") echo "selected"; ?>>Israel</option>
		            <option value="IT" <?php if($user['member_country'] == "IT") echo "selected"; ?>>Italy</option>
		            <option value="JM" <?php if($user['member_country'] == "JM") echo "selected"; ?>>Jamaica</option>
		            <option value="JP" <?php if($user['member_country'] == "JP") echo "selected"; ?>>Japan</option>
		            <option value="JE" <?php if($user['member_country'] == "JE") echo "selected"; ?>>Jersey</option>
		            <option value="JO" <?php if($user['member_country'] == "JO") echo "selected"; ?>>Jordan</option>
		            <option value="KZ" <?php if($user['member_country'] == "KZ") echo "selected"; ?>>Kazakhstan</option>
		            <option value="KE" <?php if($user['member_country'] == "KE") echo "selected"; ?>>Kenya</option>
		            <option value="KI" <?php if($user['member_country'] == "KI") echo "selected"; ?>>Kiribati</option>
		            <option value="KR" <?php if($user['member_country'] == "KR") echo "selected"; ?>>Korea</option>
		            <option value="KP" <?php if($user['member_country'] == "KP") echo "selected"; ?>>Korea, North</option>
		            <option value="KW" <?php if($user['member_country'] == "KW") echo "selected"; ?>>Kuwait</option>
		            <option value="KG" <?php if($user['member_country'] == "KG") echo "selected"; ?>>Kyrgyzstan</option>
		            <option value="LA" <?php if($user['member_country'] == "LA") echo "selected"; ?>>Laos</option>
		            <option value="LV" <?php if($user['member_country'] == "LV") echo "selected"; ?>>Latvia</option>
		            <option value="LB" <?php if($user['member_country'] == "LB") echo "selected"; ?>>Lebanon</option>
		            <option value="LS" <?php if($user['member_country'] == "LS") echo "selected"; ?>>Lesotho</option>
		            <option value="LR" <?php if($user['member_country'] == "LR") echo "selected"; ?>>Liberia</option>
		            <option value="LY" <?php if($user['member_country'] == "LY") echo "selected"; ?>>Libya</option>
		            <option value="LI" <?php if($user['member_country'] == "LI") echo "selected"; ?>>Liechtenstein</option>
		            <option value="LT" <?php if($user['member_country'] == "LT") echo "selected"; ?>>Lithuania</option>
		            <option value="LU" <?php if($user['member_country'] == "LU") echo "selected"; ?>>Luxembourg</option>
		            <option value="MO" <?php if($user['member_country'] == "MO") echo "selected"; ?>>Macau S.A.R.</option>
		            <option value="MK" <?php if($user['member_country'] == "MK") echo "selected"; ?>>Macedonia</option>
		            <option value="MG" <?php if($user['member_country'] == "MG") echo "selected"; ?>>Madagascar</option>
		            <option value="MW" <?php if($user['member_country'] == "MW") echo "selected"; ?>>Malawi</option>
		            <option value="MY" <?php if($user['member_country'] == "MY") echo "selected"; ?>>Malaysia</option>
		            <option value="MV" <?php if($user['member_country'] == "MV") echo "selected"; ?>>Maldives</option>
		            <option value="ML" <?php if($user['member_country'] == "ML") echo "selected"; ?>>Mali</option>
		            <option value="MT" <?php if($user['member_country'] == "MT") echo "selected"; ?>>Malta</option>
		            <option value="MH" <?php if($user['member_country'] == "MH") echo "selected"; ?>>Marshall Islands</option>
		            <option value="MQ" <?php if($user['member_country'] == "MQ") echo "selected"; ?>>Martinique</option>
		            <option value="MR" <?php if($user['member_country'] == "MR") echo "selected"; ?>>Mauritania</option>
		            <option value="MU" <?php if($user['member_country'] == "MU") echo "selected"; ?>>Mauritius</option>
		            <option value="YT" <?php if($user['member_country'] == "YT") echo "selected"; ?>>Mayotte</option>
		            <option value="MX" <?php if($user['member_country'] == "MX") echo "selected"; ?>>Mexico</option>
		            <option value="FM" <?php if($user['member_country'] == "FM") echo "selected"; ?>>Micronesia</option>
		            <option value="MD" <?php if($user['member_country'] == "MD") echo "selected"; ?>>Moldova</option>
		            <option value="MC" <?php if($user['member_country'] == "MC") echo "selected"; ?>>Monaco</option>
		            <option value="MN" <?php if($user['member_country'] == "MN") echo "selected"; ?>>Mongolia</option>
		            <option value="ME" <?php if($user['member_country'] == "ME") echo "selected"; ?>>Montenegro</option>
		            <option value="MS" <?php if($user['member_country'] == "MS") echo "selected"; ?>>Montserrat</option>
		            <option value="MA" <?php if($user['member_country'] == "MA") echo "selected"; ?>>Morocco</option>
		            <option value="MZ" <?php if($user['member_country'] == "MZ") echo "selected"; ?>>Mozambique</option>
		            <option value="MM" <?php if($user['member_country'] == "MM") echo "selected"; ?>>Myanmar</option>
		            <option value="NA" <?php if($user['member_country'] == "NA") echo "selected"; ?>>Namibia</option>
		            <option value="NR" <?php if($user['member_country'] == "NR") echo "selected"; ?>>Nauru</option>
		            <option value="NP" <?php if($user['member_country'] == "NP") echo "selected"; ?>>Nepal</option>
		            <option value="NL" <?php if($user['member_country'] == "NL") echo "selected"; ?>>Netherlands</option>
		            <option value="AN" <?php if($user['member_country'] == "AN") echo "selected"; ?>>Netherlands Antilles</option>
		            <option value="NC" <?php if($user['member_country'] == "NC") echo "selected"; ?>>New Caledonia</option>
		            <option value="NZ" <?php if($user['member_country'] == "NZ") echo "selected"; ?>>New Zealand</option>
		            <option value="NI" <?php if($user['member_country'] == "NI") echo "selected"; ?>>Nicaragua</option>
		            <option value="NE" <?php if($user['member_country'] == "NE") echo "selected"; ?>>Niger</option>
		            <option value="NG" <?php if($user['member_country'] == "NG") echo "selected"; ?>>Nigeria</option>
		            <option value="NU" <?php if($user['member_country'] == "NU") echo "selected"; ?>>Niue</option>
		            <option value="NF" <?php if($user['member_country'] == "NF") echo "selected"; ?>>Norfolk Island</option>
		            <option value="MP" <?php if($user['member_country'] == "MP") echo "selected"; ?>>Northern Mariana Islands</option>
		            <option value="NO" <?php if($user['member_country'] == "NO") echo "selected"; ?>>Norway</option>
		            <option value="OM" <?php if($user['member_country'] == "OM") echo "selected"; ?>>Oman</option>
		            <option value="PK" <?php if($user['member_country'] == "PK") echo "selected"; ?>>Pakistan</option>
		            <option value="PW" <?php if($user['member_country'] == "PW") echo "selected"; ?>>Palau</option>
		            <option value="PS" <?php if($user['member_country'] == "PS") echo "selected"; ?>>Palestinian Territory, Occupied</option>
		            <option value="PA" <?php if($user['member_country'] == "PA") echo "selected"; ?>>Panama</option>
		            <option value="PG" <?php if($user['member_country'] == "PG") echo "selected"; ?>>Papua new Guinea</option>
		            <option value="PY" <?php if($user['member_country'] == "PY") echo "selected"; ?>>Paraguay</option>
		            <option value="PE" <?php if($user['member_country'] == "PE") echo "selected"; ?>>Peru</option>
		            <option value="PH" <?php if($user['member_country'] == "PH") echo "selected"; ?>>Philippines</option>
		            <option value="PN" <?php if($user['member_country'] == "PN") echo "selected"; ?>>Pitcairn Island</option>
		            <option value="PL" <?php if($user['member_country'] == "PL") echo "selected"; ?>>Poland</option>
		            <option value="PT" <?php if($user['member_country'] == "PT") echo "selected"; ?>>Portugal</option>
		            <option value="PR" <?php if($user['member_country'] == "PR") echo "selected"; ?>>Puerto Rico</option>
		            <option value="QA" <?php if($user['member_country'] == "QA") echo "selected"; ?>>Qatar</option>
		            <option value="RE" <?php if($user['member_country'] == "RE") echo "selected"; ?>>Reunion</option>
		            <option value="RO" <?php if($user['member_country'] == "RO") echo "selected"; ?>>Romania</option>
		            <option value="RU" <?php if($user['member_country'] == "RU") echo "selected"; ?>>Russia</option>
		            <option value="RW" <?php if($user['member_country'] == "RW") echo "selected"; ?>>Rwanda</option>
		            <option value="SH" <?php if($user['member_country'] == "SH") echo "selected"; ?>>Saint Helena</option>
		            <option value="KN" <?php if($user['member_country'] == "KN") echo "selected"; ?>>Saint Kitts And Nevis</option>
		            <option value="LC" <?php if($user['member_country'] == "LC") echo "selected"; ?>>Saint Lucia</option>
		            <option value="PM" <?php if($user['member_country'] == "PM") echo "selected"; ?>>Saint Pierre and Miquelon</option>
		            <option value="VC" <?php if($user['member_country'] == "VC") echo "selected"; ?>>Saint Vincent And The Grenadines</option>
		            <option value="WS" <?php if($user['member_country'] == "WS") echo "selected"; ?>>Samoa</option>
		            <option value="SM" <?php if($user['member_country'] == "SM") echo "selected"; ?>>San Marino</option>
		            <option value="ST" <?php if($user['member_country'] == "ST") echo "selected"; ?>>Sao Tome and Principe</option>
		            <option value="SA" <?php if($user['member_country'] == "SA") echo "selected"; ?>>Saudi Arabia</option>
		            <option value="SN" <?php if($user['member_country'] == "SN") echo "selected"; ?>>Senegal</option>
		         </select></div>
		          </div>

		         <div class="clear"></div>
                   <input type="submit" class="grey" value="Save" />

		    </form>
    	  </div> 
        </div>
    <?php include "_footer.php";?>
</body>
</html>