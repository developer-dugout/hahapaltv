<?php 
   session_start();

   include("inc/header.php"); 
   include("inc/body.php"); 
   $email=$_SESSION['user'];
   $qry = "SELECT * FROM users WHERE email = '$email'";
   $run = mysqli_query($connect,$qry);
   $row = mysqli_fetch_array($run);
   if(mysqli_num_rows($run) > 0)
   {
      $user_id=$row['user_id'];
      $name=$row['name'];
      $dob=$row['date'];
      $lang=$row['language'];
      $country=$row['country'];
      $image=$row['image'];
    
   }

if(isset($_POST['updateinfo']))
{
   $name = $_POST['name'];
   $dob = $_POST['dob'];
   $language = $_POST['language'];
   $country = $_POST['country'];
   
   $filename=$_FILES['image']['name'];
   $tempname1=$_FILES['image']['tmp_name'];
   move_uploaded_file($tempname1,"upload/$filename");

   $upqry = "UPDATE users SET `name` = '$name', `date` = '$dob', `language` = '$language', `country` = '$country', `image` = '$filename' WHERE email = '$email'";
   $uprun = mysqli_query($connect,$upqry);
   if ($uprun) 
   {
      $msg="Successfully Updated";
   }
   else
   {
      $error="Something went wrong";
   }
}
if (isset($_POST['updatepass'])) 
{
   $cpass=$_POST["cpass"];
   $npass=$_POST["npass"];
   $vpass=$_POST["vpass"];

   $result = mysqli_query($connect, "SELECT *from users WHERE email='" . $email . "'");
   $row = mysqli_fetch_array($result);
   if ($cpass == $row["password"]) 
   {
      if ($npass == $vpass) 
      {
         mysqli_query($connect, "UPDATE users set password='" . $npass . "' WHERE email='" . $email . "'");
         $msg = "Password Changed";
      }
      else
      {
         $error="password doesnot match with confirm password";
      }
      
   } 
   else
   {
      $error = "Current Password is not correct";
   }
}

    
?>
   <!-- Page Content  -->
   <div id="content-page" class="content-page">
      <div class="container-fluid">
         <div class="row profile-content">
            <div class="col-12 col-md-12 col-lg-4">
               <div class="iq-card" style="background-color: lightblue;">
                  <div class="iq-card-body profile-page">
                     <div class="profile-header">
                        <div class="cover-container text-center">
                          
                           <div class="profile-detail mt-3">
                                <img src="upload/<?php echo $image; ?>" class="img-fluid rounded-circle mr-3" alt="user" height="110px" width="110px">
                                <h3><?php echo $name; ?></h3>
                                <p class="text-primary"><?php echo $user_id; ?></p>
                              
                           </div>
                           <div class="iq-social d-inline-block align-items-center">
                              
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-12 col-lg-8">
               <div class="row">
                  <div class="col-md-8">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Personal Details</h4>
                           </div>
                        </div> 
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                              <li>
                                 <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                       <h6>Birthday</h6>                                       
                                    </div>
                                    <div class="col-sm-6">
                                       <p class="mb-0"><?php echo $dob; ?></p>                                       
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                       <h6>Country</h6>                                       
                                    </div>
                                    <div class="col-sm-6">
                                       <p class="mb-0"><?php echo $country; ?></p>                                       
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                       <h6>language</h6>                                       
                                    </div>
                                    <div class="col-sm-6">
                                       <p class="mb-0"><?php echo $lang; ?></p>                                       
                                    </div>
                                 </div>
                              </li>
                              <li>
                                 <div class="row align-items-center justify-content-between mb-3">
                                    <div class="col-sm-6">
                                       <h6>email</h6>                                       
                                    </div>
                                    <div class="col-sm-6">
                                       <p class="mb-0"><?php echo $email; ?></p>                                       
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-header d-flex justify-content-between align-items-center mb-0">
                           <div class="iq-header-title">
                              <h4 class="card-title mb-0">Latest Uploads</h4>
                           </div>
                        </div> 
                        <div class="iq-card-body">
                           <ul class="list-inline p-0 mb-0">
                              <li class="d-flex mb-4 align-items-center">
                                 <div class="profile-icon bg-secondary"><span><i class="ri-file-3-fill"></i></span></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Documentation</h6>
                                 </div>
                                 <div class="iq-card-toolbar">
                                    <p class="mb-0">48kb</p>
                                 </div>
                              </li>
                              <li class="d-flex mb-4 align-items-center">
                                 <div class="profile-icon bg-secondary"><span><i class="ri-image-fill"></i></span></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Images</h6>
                                 </div>
                                 <div class="iq-card-toolbar">
                                    <p class="mb-0">204kb</p>
                                 </div>
                              </li>
                              <li class="d-flex mb-4 align-items-center">
                                 <div class="profile-icon bg-secondary"><span><i class="ri-video-fill"></i></span></div>
                                 <div class="media-support-info ml-3">
                                    <h6>Videos</h6>
                                 </div>
                                 <div class="iq-card-toolbar">
                                    <p class="mb-0">509kb</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="container-fluid">
<?php
   if (isset($msg)) 
   {
?>
            <div class="alert text-white bg-success" role="alert">
               <div class="iq-alert-text">Welldone! <?php echo $msg; ?></div>
            </div>
<?php
   }
   if (isset($error)) 
   {
?>
            <div class="alert text-white bg-danger" role="alert">
               <div class="iq-alert-text">Ohh! <?php echo $error; ?></div>
            </div>
<?php
   }

?>
            <div class="row">
               <div class="col-lg-12">
                  <div class="iq-card">
                     <div class="iq-card-body p-0">
                        <div class="iq-edit-list">
                           <ul class="iq-edit-profile d-flex nav nav-pills">
                              <li class="col-md-6 p-0">
                                 <a class="nav-link active" data-toggle="pill" href="#personal-information">
                                    Personal Information
                                 </a>
                              </li>
                              <li class="col-md-6 p-0">
                                 <a class="nav-link" data-toggle="pill" href="#chang-pwd">
                                    Change Password
                                 </a>
                              </li>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-12">
                  <div class="iq-edit-list-data">
                     <div class="tab-content">
                        <div class="tab-pane fade active show" id="personal-information" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Personal Information</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form method="post" enctype="multipart/form-data">
                                    <div class=" row align-items-center">
                                        <div class="col-md-12">
                                            <div class="profile-img-edit">
                                                <img class="profile-pic" src="upload/<?php echo $image; ?>" alt="profile-pic">
                                                <div class="p-image">
                                                   <i class="ri-pencil-line upload-button"></i>
                                                   <input class="file-upload" type="file" name="image" accept="image/*" value="<?php echo $image; ?>"/>
                                                </div>
                                            </div>
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label for="fname">UserName:</label>
                                          <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label>Date Of Birth:</label>
                                          <input class="form-control date-input basicFlatpickr" type="Date" name="dob" value="<?php echo $dob; ?>">
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label>Language:</label>
                                          <select data-placeholder="Choose a Language..." name="language" class="form-control mb-0" value="<?php echo $lang; ?>" required>
                                             <option value="<?php echo $lang; ?>"><?php echo $lang; ?></option>
                                             <option value="English">English</option>
                                             <option value="Afrikaans">Afrikaans</option>
                                             <option value="Albanian">Albanian</option>
                                             <option value="Arabic">Arabic</option>
                                             <option value="Armenian">Armenian</option>
                                             <option value="Basque">Basque</option>
                                             <option value="Bengali">Bengali</option>
                                             <option value="Bulgarian">Bulgarian</option>
                                             <option value="Catalan">Catalan</option>
                                             <option value="Cambodian">Cambodian</option>
                                             <option value="Chinese (Mandarin)">Chinese (Mandarin)</option>
                                             <option value="Croatian">Croatian</option>
                                             <option value="Czech">Czech</option>
                                             <option value="Danish">Danish</option>
                                             <option value="Dutch">Dutch</option>
                                             <option value="Estonian">Estonian</option>
                                             <option value="Fiji">Fiji</option>
                                             <option value="Finnish">Finnish</option>
                                             <option value="French">French</option>
                                             <option value="Georgian">Georgian</option>
                                             <option value="German">German</option>
                                             <option value="Greek">Greek</option>
                                             <option value="Gujarati">Gujarati</option>
                                             <option value="Hebrew">Hebrew</option>
                                             <option value="Hindi">Hindi</option>
                                             <option value="Hungarian">Hungarian</option>
                                             <option value="Icelandic">Icelandic</option>
                                             <option value="Indonesian">Indonesian</option>
                                             <option value="Irish">Irish</option>
                                             <option value="Italian">Italian</option>
                                             <option value="Japanese">Japanese</option>
                                             <option value="Javanese">Javanese</option>
                                             <option value="Korean">Korean</option>
                                             <option value="Latin">Latin</option>
                                             <option value="Latvian">Latvian</option>
                                             <option value="Lithuanian">Lithuanian</option>
                                             <option value="Macedonian">Macedonian</option>
                                             <option value="Malay">Malay</option>
                                             <option value="Malayalam">Malayalam</option>
                                             <option value="Maltese">Maltese</option>
                                             <option value="Maori">Maori</option>
                                             <option value="Marathi">Marathi</option>
                                             <option value="Mongolian">Mongolian</option>
                                             <option value="Nepali">Nepali</option>
                                             <option value="Norwegian">Norwegian</option>
                                             <option value="Persian">Persian</option>
                                             <option value="Polish">Polish</option>
                                             <option value="Portuguese">Portuguese</option>
                                             <option value="Punjabi">Punjabi</option>
                                             <option value="Quechua">Quechua</option>
                                             <option value="Romanian">Romanian</option>
                                             <option value="Russian">Russian</option>
                                             <option value="Samoan">Samoan</option>
                                             <option value="Serbian">Serbian</option>
                                             <option value="Slovak">Slovak</option>
                                             <option value="Slovenian">Slovenian</option>
                                             <option value="Spanish">Spanish</option>
                                             <option value="Swahili">Swahili</option>
                                             <option value="Swedish ">Swedish </option>
                                             <option value="Tamil">Tamil</option>
                                             <option value="Tatar">Tatar</option>
                                             <option value="Telugu">Telugu</option>
                                             <option value="Thai">Thai</option>
                                             <option value="Tibetan">Tibetan</option>
                                             <option value="Tonga">Tonga</option>
                                             <option value="Turkish">Turkish</option>
                                             <option value="Ukrainian">Ukrainian</option>
                                             <option value="Urdu">Urdu</option>
                                             <option value="Uzbek">Uzbek</option>
                                             <option value="Vietnamese">Vietnamese</option>
                                             <option value="Welsh">Welsh</option>
                                             <option value="Xhosa">Xhosa</option>
                                          </select>
                                       </div>
                                       <div class="form-group col-sm-6">
                                          <label>Country:</label>
                                          <select data-placeholder="Choose a Country..." name="country"  class="form-control mb-0" required>
                                             <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                             <option value="Afganistan">Afghanistan</option>
                                             <option value="Albania">Albania</option>
                                             <option value="Algeria">Algeria</option>
                                             <option value="American Samoa">American Samoa</option>
                                             <option value="Andorra">Andorra</option>
                                             <option value="Angola">Angola</option>
                                             <option value="Anguilla">Anguilla</option>
                                             <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                             <option value="Argentina">Argentina</option>
                                             <option value="Armenia">Armenia</option>
                                             <option value="Aruba">Aruba</option>
                                             <option value="Australia">Australia</option>
                                             <option value="Austria">Austria</option>
                                             <option value="Azerbaijan">Azerbaijan</option>
                                             <option value="Bahamas">Bahamas</option>
                                             <option value="Bahrain">Bahrain</option>
                                             <option value="Bangladesh">Bangladesh</option>
                                             <option value="Barbados">Barbados</option>
                                             <option value="Belarus">Belarus</option>
                                             <option value="Belgium">Belgium</option>
                                             <option value="Belize">Belize</option>
                                             <option value="Benin">Benin</option>
                                             <option value="Bermuda">Bermuda</option>
                                             <option value="Bhutan">Bhutan</option>
                                             <option value="Bolivia">Bolivia</option>
                                             <option value="Bonaire">Bonaire</option>
                                             <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                             <option value="Botswana">Botswana</option>
                                             <option value="Brazil">Brazil</option>
                                             <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                             <option value="Brunei">Brunei</option>
                                             <option value="Bulgaria">Bulgaria</option>
                                             <option value="Burkina Faso">Burkina Faso</option>
                                             <option value="Burundi">Burundi</option>
                                             <option value="Cambodia">Cambodia</option>
                                             <option value="Cameroon">Cameroon</option>
                                             <option value="Canada">Canada</option>
                                             <option value="Canary Islands">Canary Islands</option>
                                             <option value="Cape Verde">Cape Verde</option>
                                             <option value="Cayman Islands">Cayman Islands</option>
                                             <option value="Central African Republic">Central African Republic</option>
                                             <option value="Chad">Chad</option>
                                             <option value="Channel Islands">Channel Islands</option>
                                             <option value="Chile">Chile</option>
                                             <option value="China">China</option>
                                             <option value="Christmas Island">Christmas Island</option>
                                             <option value="Cocos Island">Cocos Island</option>
                                             <option value="Colombia">Colombia</option>
                                             <option value="Comoros">Comoros</option>
                                             <option value="Congo">Congo</option>
                                             <option value="Cook Islands">Cook Islands</option>
                                             <option value="Costa Rica">Costa Rica</option>
                                             <option value="Cote DIvoire">Cote DIvoire</option>
                                             <option value="Croatia">Croatia</option>
                                             <option value="Cuba">Cuba</option>
                                             <option value="Curaco">Curacao</option>
                                             <option value="Cyprus">Cyprus</option>
                                             <option value="Czech Republic">Czech Republic</option>
                                             <option value="Denmark">Denmark</option>
                                             <option value="Djibouti">Djibouti</option>
                                             <option value="Dominica">Dominica</option>
                                             <option value="Dominican Republic">Dominican Republic</option>
                                             <option value="East Timor">East Timor</option>
                                             <option value="Ecuador">Ecuador</option>
                                             <option value="Egypt">Egypt</option>
                                             <option value="El Salvador">El Salvador</option>
                                             <option value="Equatorial Guinea">Equatorial Guinea</option>
   <option value="Eritrea">Eritrea</option>
   <option value="Estonia">Estonia</option>
   <option value="Ethiopia">Ethiopia</option>
   <option value="Falkland Islands">Falkland Islands</option>
   <option value="Faroe Islands">Faroe Islands</option>
   <option value="Fiji">Fiji</option>
   <option value="Finland">Finland</option>
   <option value="France">France</option>
   <option value="French Guiana">French Guiana</option>
   <option value="French Polynesia">French Polynesia</option>
   <option value="French Southern Ter">French Southern Ter</option>
   <option value="Gabon">Gabon</option>
   <option value="Gambia">Gambia</option>
   <option value="Georgia">Georgia</option>
   <option value="Germany">Germany</option>
   <option value="Ghana">Ghana</option>
   <option value="Gibraltar">Gibraltar</option>
   <option value="Great Britain">Great Britain</option>
   <option value="Greece">Greece</option>
   <option value="Greenland">Greenland</option>
   <option value="Grenada">Grenada</option>
   <option value="Guadeloupe">Guadeloupe</option>
   <option value="Guam">Guam</option>
   <option value="Guatemala">Guatemala</option>
   <option value="Guinea">Guinea</option>
   <option value="Guyana">Guyana</option>
   <option value="Haiti">Haiti</option>
   <option value="Hawaii">Hawaii</option>
   <option value="Honduras">Honduras</option>
   <option value="Hong Kong">Hong Kong</option>
   <option value="Hungary">Hungary</option>
   <option value="Iceland">Iceland</option>
   <option value="Indonesia">Indonesia</option>
   <option value="India">India</option>
   <option value="Iran">Iran</option>
   <option value="Iraq">Iraq</option>
   <option value="Ireland">Ireland</option>
   <option value="Isle of Man">Isle of Man</option>
   <option value="Israel">Israel</option>
   <option value="Italy">Italy</option>
   <option value="Jamaica">Jamaica</option>
   <option value="Japan">Japan</option>
   <option value="Jordan">Jordan</option>
   <option value="Kazakhstan">Kazakhstan</option>
   <option value="Kenya">Kenya</option>
   <option value="Kiribati">Kiribati</option>
   <option value="Korea North">Korea North</option>
   <option value="Korea Sout">Korea South</option>
   <option value="Kuwait">Kuwait</option>
   <option value="Kyrgyzstan">Kyrgyzstan</option>
   <option value="Laos">Laos</option>
   <option value="Latvia">Latvia</option>
   <option value="Lebanon">Lebanon</option>
   <option value="Lesotho">Lesotho</option>
   <option value="Liberia">Liberia</option>
   <option value="Libya">Libya</option>
   <option value="Liechtenstein">Liechtenstein</option>
   <option value="Lithuania">Lithuania</option>
   <option value="Luxembourg">Luxembourg</option>
   <option value="Macau">Macau</option>
   <option value="Macedonia">Macedonia</option>
   <option value="Madagascar">Madagascar</option>
   <option value="Malaysia">Malaysia</option>
   <option value="Malawi">Malawi</option>
   <option value="Maldives">Maldives</option>
   <option value="Mali">Mali</option>
   <option value="Malta">Malta</option>
   <option value="Marshall Islands">Marshall Islands</option>
   <option value="Martinique">Martinique</option>
   <option value="Mauritania">Mauritania</option>
   <option value="Mauritius">Mauritius</option>
   <option value="Mayotte">Mayotte</option>
   <option value="Mexico">Mexico</option>
   <option value="Midway Islands">Midway Islands</option>
   <option value="Moldova">Moldova</option>
   <option value="Monaco">Monaco</option>
   <option value="Mongolia">Mongolia</option>
   <option value="Montserrat">Montserrat</option>
   <option value="Morocco">Morocco</option>
   <option value="Mozambique">Mozambique</option>
   <option value="Myanmar">Myanmar</option>
   <option value="Nambia">Nambia</option>
   <option value="Nauru">Nauru</option>
   <option value="Nepal">Nepal</option>
   <option value="Netherland Antilles">Netherland Antilles</option>
   <option value="Netherlands">Netherlands (Holland, Europe)</option>
   <option value="Nevis">Nevis</option>
   <option value="New Caledonia">New Caledonia</option>
   <option value="New Zealand">New Zealand</option>
   <option value="Nicaragua">Nicaragua</option>
   <option value="Niger">Niger</option>
   <option value="Nigeria">Nigeria</option>
   <option value="Niue">Niue</option>
   <option value="Norfolk Island">Norfolk Island</option>
   <option value="Norway">Norway</option>
   <option value="Oman">Oman</option>
   <option value="Pakistan">Pakistan</option>
   <option value="Palau Island">Palau Island</option>
   <option value="Palestine">Palestine</option>
   <option value="Panama">Panama</option>
   <option value="Papua New Guinea">Papua New Guinea</option>
   <option value="Paraguay">Paraguay</option>
   <option value="Peru">Peru</option>
   <option value="Phillipines">Philippines</option>
   <option value="Pitcairn Island">Pitcairn Island</option>
   <option value="Poland">Poland</option>
   <option value="Portugal">Portugal</option>
   <option value="Puerto Rico">Puerto Rico</option>
   <option value="Qatar">Qatar</option>
   <option value="Republic of Montenegro">Republic of Montenegro</option>
   <option value="Republic of Serbia">Republic of Serbia</option>
   <option value="Reunion">Reunion</option>
   <option value="Romania">Romania</option>
   <option value="Russia">Russia</option>
   <option value="Rwanda">Rwanda</option>
   <option value="St Barthelemy">St Barthelemy</option>
   <option value="St Eustatius">St Eustatius</option>
   <option value="St Helena">St Helena</option>
   <option value="St Kitts-Nevis">St Kitts-Nevis</option>
   <option value="St Lucia">St Lucia</option>
   <option value="St Maarten">St Maarten</option>
   <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
   <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
   <option value="Saipan">Saipan</option>
   <option value="Samoa">Samoa</option>
   <option value="Samoa American">Samoa American</option>
   <option value="San Marino">San Marino</option>
   <option value="Sao Tome & Principe">Sao Tome & Principe</option>
   <option value="Saudi Arabia">Saudi Arabia</option>
   <option value="Senegal">Senegal</option>
   <option value="Seychelles">Seychelles</option>
   <option value="Sierra Leone">Sierra Leone</option>
   <option value="Singapore">Singapore</option>
   <option value="Slovakia">Slovakia</option>
   <option value="Slovenia">Slovenia</option>
   <option value="Solomon Islands">Solomon Islands</option>
   <option value="Somalia">Somalia</option>
   <option value="South Africa">South Africa</option>
   <option value="Spain">Spain</option>
   <option value="Sri Lanka">Sri Lanka</option>
   <option value="Sudan">Sudan</option>
   <option value="Suriname">Suriname</option>
   <option value="Swaziland">Swaziland</option>
   <option value="Sweden">Sweden</option>
   <option value="Switzerland">Switzerland</option>
   <option value="Syria">Syria</option>
   <option value="Tahiti">Tahiti</option>
   <option value="Taiwan">Taiwan</option>
   <option value="Tajikistan">Tajikistan</option>
   <option value="Tanzania">Tanzania</option>
   <option value="Thailand">Thailand</option>
   <option value="Togo">Togo</option>
   <option value="Tokelau">Tokelau</option>
   <option value="Tonga">Tonga</option>
   <option value="Trinidad & Tobago">Trinidad & Tobago</option>
   <option value="Tunisia">Tunisia</option>
   <option value="Turkey">Turkey</option>
   <option value="Turkmenistan">Turkmenistan</option>
   <option value="Turks & Caicos Is">Turks & Caicos Is</option>
   <option value="Tuvalu">Tuvalu</option>
   <option value="Uganda">Uganda</option>
   <option value="United Kingdom">United Kingdom</option>
   <option value="Ukraine">Ukraine</option>
   <option value="United Arab Erimates">United Arab Emirates</option>
   <option value="United States of America">United States of America</option>
   <option value="Uraguay">Uruguay</option>
   <option value="Uzbekistan">Uzbekistan</option>
   <option value="Vanuatu">Vanuatu</option>
   <option value="Vatican City State">Vatican City State</option>
   <option value="Venezuela">Venezuela</option>
   <option value="Vietnam">Vietnam</option>
   <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
   <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
   <option value="Wake Island">Wake Island</option>
   <option value="Wallis & Futana Is">Wallis & Futana Is</option>
   <option value="Yemen">Yemen</option>
   <option value="Zaire">Zaire</option>
   <option value="Zambia">Zambia</option>
   <option value="Zimbabwe">Zimbabwe</option>
</select>
                                       </div>
                                    </div>
                                    <center>
                                       <button type="submit" name="updateinfo" class="btn btn-primary mr-2">Update</button>
                                    </center>
                                    
                               
                                 </form>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="chang-pwd" role="tabpanel">
                           <div class="iq-card">
                              <div class="iq-card-header d-flex justify-content-between">
                                 <div class="iq-header-title">
                                    <h4 class="card-title">Change Password</h4>
                                 </div>
                              </div>
                              <div class="iq-card-body">
                                 <form method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                       <label for="cpass">Current Password:</label>
                                       <input type="Password" class="form-control" name="cpass" placeholder="Current Password">
                                    </div>
                                    <div class="form-group">
                                       <label for="npass">New Password:</label>
                                       <input type="Password" class="form-control" name="npass" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                       <label for="vpass">Verify Password:</label>
                                       <input type="Password" class="form-control" name="vpass" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" name="updatepass" class="btn btn-primary mr-2">Update</button>
                                 </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>

</div>
</div>
</div>
</div>
<!-- Wrapper END -->
<?php 
include("inc/footer.php"); 
include("inc/script.php"); 
?>