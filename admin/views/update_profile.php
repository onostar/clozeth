<div class="displays" id="profile">
    <div class="info"></div>
    <div class="add_user_form">
        <h3>Update profile</h3>
        <form method="POST"  id="addCatForm" action="../controller/update_exh_profile.php"">
            <input type="hidden" value="<?php echo $user->exhibitor_id?>" name="user_id">
            <div class="inputs">
                <div class="data">
                    <div class="user_passport">
                        <img src="<?php echo "../logos/".$user->company_logo;?>" alt="Logo">
                    </div>
                    <!-- <input type="file" name="company_logo" id="company_logo"> -->
                </div>
                <div class="data">
                    <label for="contact_person">Store address:</label>
                    <p style=" color:red; display:block; margin-right:10px"><?php echo "<a href='https://www.clozeth.com.ng/view/exhibitor_menu.php?company=".$user->reg_number."' title='share store link'>Copy and share store link</a>"?></p><br>
                    <label>About us</label>
                    <textarea name="about_com" id="about_com" rows="5" style="width:100%" placeholder="Give a short description of your business" ><?php echo $user->about?></textarea>
                </div>
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="company_name">Company Name</label>
                    <input type="text" name="company_name" value="<?php echo $user->company_name;?>" id="company_name">
                </div>
                <div class="data">
                    <label for="address">Address</label>
                    <input type="text" name="company_address" value="<?php echo $user->company_address;?>" id="company_address">
                </div>
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="company_phone">Company Phone</label>
                    <input type="tel" name="company_phone" value="<?php echo $user->company_phone;?>" id="company_phone">
                </div>
                <div class="data">
                    <label for="company_email">company_email</label>
                    <input type="email" name="company_email" value="<?php echo $user->company_email;?>" id="other_number">
                </div>
            </div>
            <div class="inputs">
                <div class="data">
                    <label for="contact_person">contact person</label>
                    <input type="text" name="contact_person" value="<?php echo $user->contact_person;?>" id="contact_person">
                </div>
                <div class="data">
                    <label for="contact_phone">contact phone</label>
                    <input type="text" name="contact_phone" value="<?php echo $user->contact_phone;?>" id="contact_phone">
                </div>
            </div>
            
            <div class="inputs">    
                <div class="data">
                    <button type="submit" id="update" name="update">Update Profile <i class="fas fa-user"></i></button>
                </div>
            </div>
            
                
        </form>
    </div>
</div>