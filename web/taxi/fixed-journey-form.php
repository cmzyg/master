<div id="block-system-main" class="block block-system">
  <div class="content" style="padding: 8px;">
     <h2><strong>Passenger Details</strong>  <span style="font-size:0.4em;">Please fill in below</span></h2>


    
      
      <div class="form-item form-type-textfield form-item-name">
        <label class="required">Fullname <span class="form-required" title="This field is required.">*</span></label>
        <input type="text" id="contact_name" name="fullname" value="" size="60" maxlength="255" class="valid form-text required" />
      </div>
      <br />

      <div class="form-item form-type-textfield form-item-mail">
        <label class="required">E-mail Address <span class="form-required" title="This field is required.">*</span></label>
        <input type="email" id="contact_email" name="email" value="" size="60" maxlength="255" class="form-text required" />
      </div>
      <br />
      
      <div class="form-item form-type-textfield form-item-subject">
        <label>Mobile No <span class="form-required" title="This field is required.">*</span></label>
        <input type="text" id="edit-subject" name="telephone" value="" size="60" maxlength="255" class="form-text required" />
      </div>
      <br />


      <div class="form-item form-type-textfield form-item-subject">
        <label>Additional Notes/ Requirements / Flight Details </label>
        <textarea id="note" name="note" class="form-text" cols="100" style="width:100%; height: 140px;"></textarea>
      </div>



    <div id="panel" style="display:none">
    <input type='text' name='start' id='start' value='' />
    <input type='text' name='end' id='end' value='' />
    </div>


      <div class="clear"></div>
    
  </div>
</div>



        
    </div>
        
        </div>
        <!-- end of Content --> 
        
      </div>
    </div>









    <div id="content" class="six columns">
      <div class="region region-content">
        <div id="block-system-main" class="block block-system"> 
          <!-- end of Content -->

        
            <div class="row" id="icon_map">








<div id="block-system-main" class="block block-system">
  <div class="content" style="padding: 8px;">
     <h2><strong>Travel Details</strong> <span style="font-size:0.4em;">Please fill in below</span></h2>

      <div class="form-item form-type-textfield form-item-subject">
        <label>Pickup Address <span class="form-required" title="This field is required.">*</span></label>       
        <input type="text" name="pickup" class="form-text" value="" style="width:100%" />
      </div><br />

      <div class="form-item form-type-textfield form-item-subject">
        <label>Destination Address <span class="form-required" title="This field is required.">*</span></label>       
        <input type="text" name="actual_destination" class="form-text" value="" style="width:100%" />
      </div><br />

           
     



      <div class="form-item form-type-textfield form-item-subject">
        <label>Pickup Date &amp; Time<span class="form-required" title="This field is required.">*</span></label><br />
        <input type="text" id="datepicker" class="form-text" name="booking_date" oninput='removeErrorDate()' onmouseout='removeErrorDate()' placeholder="Date" style='width:50%'>
         <select class="form-text" name="hour" id="hour" style="width:60px; margin-top: -3px;">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12" selected="selected">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                  </select>
                                  <select class="form-text" name="minute" id="minute" style="width:60px; margin-top: -3px">
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                  </select>

      </div>

    


<br />
      <!--<h2>Return Journey <span style="font-size:0.4em;">Leave blank if no return is required</span></h2>-->
       <div class="form-item form-type-textfield form-item-subject">
        <label>Return Date &amp; Time</label><br />
        <input type="text" id="datepicker2" class="form-text" name="return_date" placeholder="Return Date" style='width:50%'>
        <select class="form-text" name="return_hour" id="return_hour" style="width:60px; margin-top: -3px;">
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                  </select>
                                  <select class="form-text" name="return_minute" id="return_minute" style="width:60px; margin-top: -3px;">
                                    <option value="00">00</option>
                                    <option value="05">05</option>
                                    <option value="10">10</option>
                                    <option value="15">15</option>
                                    <option value="20">20</option>
                                    <option value="25">25</option>
                                    <option value="30">30</option>
                                    <option value="35">35</option>
                                    <option value="40">40</option>
                                    <option value="45">45</option>
                                    <option value="50">50</option>
                                    <option value="55">55</option>
                                  </select>
      </div>
      <br />

                                  

      <div class="form-actions form-wrapper" id="submit-edit-actions" style="float:left">
        <input type="checkbox" name="meet_and_greet" id="meet_and_greet" value="1" style="cursor: pointer;" class="form-submit" /> Meet &amp; Greet Service<br />
        <span style='font: inherit; font-size: 33px; font-size: 2.0625rem; font-weight: 300; font-size: 0.9em; margin-left: 23px;'>Your driver will meet you at a designated area inside the airport</span><br />
      </div>
      <br /><br /><br /><br />





      
      <div class="form-actions form-wrapper" id="submit-edit-actions" style="float:left">
        <input type="checkbox" name="terms" id="terms" value="1" style="cursor: pointer;" class="form-submit" /> <a href='terms'>I Agree to the Terms and Conditions</a>
      </div>
      <br /><br />

      <br />
      <div class="form-actions form-wrapper" id="submit-edit-actions" style="float:left">
        <input type="submit" id="submit-contact" value="Continue" style="cursor: pointer; width:170px; margin: 0 auto; text-align: center; float: right" class="form-submit" />
      </div>