<div class="form2">
<div class="formtitle"> Join now, please fill in the form below</div>

  
<?php echo form_open(base_url()."index.php/register/")?>
<span class="error"><?php echo $captcha_return?><?php echo validation_errors() ?></span>
<div class="input">
         <div class="inputtext">Your Name: </div>
				<div class="inputcontent">
        <input type="text" name="name" value="<?php echo set_value('name') ?>" />
        		</div>
		</div>
        <div class="input">
        <div class="inputtext">Your Username</div>
        
         <div class="inputcontent">
        <input type="text" name="username" value="<?php echo set_value('username') ?>" /> 
      </div>
      </div>

<div class="input">
        <div class="inputtext">Your Password</div>
        <div class="inputcontent">
        <input type="password" name="password" value="<?php echo set_value('password') ?>" />
        </div>
        </div>
         
		<div class="input">
        <div class="inputtext">Confirm Your Password</div>
        <div class="inputcontent">
        <input type="password" name="passconf" value="<?php echo set_value('passconf') ?>" />
         </div>
         </div>
		<div class="input">
        <div class="inputtext">Your Email</div>
        <div class="inputcontent">
        <input type="text" name="email" value="<?php echo set_value('email') ?>" /> 
     </div>
     </div>
     <div class="input">
        <div class="inputtext">Country</div>
      
        <select name="country">
        <option value="">Select Country</option>
        <option value="Bangladesh" <?php echo set_select('country', 'Bangladesh'); ?> >Bangladesh</option>
        <option value="India" <?php echo set_select('country', 'India'); ?> >India</option>
        <option value="Pakistan" <?php echo set_select('country', 'Pakistan'); ?> >Pakistan</option>
        <option value="Nepal" <?php echo set_select('country', 'Nepal'); ?> >Nepal</option>
        <option value="Bhutan" <?php echo set_select('country', 'Bhutan'); ?> >Bhutan</option>
        <option value="Srilanka" <?php echo set_select('country', 'Srilanka'); ?> >Srilanka</option>
        
        </select>
     
        </div>
        
         <div class="inputtextbox">
        <div class="inputtext">Your Address</div>
        <div class="inputcontent">
		<textarea class="textarea" name="address"><?php echo set_value('address') ?></textarea> 
      </div>
        </div>
		 <div class="input">
       <div class="inputtext">Your Gender</div>
        
		<input type="radio" name="gender" value="Female"  <?php echo set_radio('gender', 'Male'); ?> /> Male &nbsp;&nbsp;   <input type="radio" name="gender" value="Male"  <?php echo set_radio('gender', 'Female'); ?> />   Female

</div>
         
         <div class="input">
      Type the Captcha number below:<br /><br />

        <?php echo $cap_img; ?>
        <input  type="text" name="captcha" value=""/>
       </div>
          <div class="input nobottomborder" >
 <input type="checkbox" name="terms" value="1" <?php echo set_checkbox('terms', '1'); ?> />I agree to the w3programmers Terms of Service and Privacy Policy
 </div>
        <div class="buttons"><input class="orangebutton" type="submit" value="Submit" name="submit"/></div>
  
</div>
  <?php echo form_close()?>
</body>
</html>