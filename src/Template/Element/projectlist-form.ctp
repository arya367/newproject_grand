<div class="col-lg-4">
<div class="plist_form">
<div class="plist_frmheading">Have any Questions?</div>
<div class="form_inner">
<?php // echo $msg->display();?>
<form role="form"  name="form1" method="post" onSubmit="return validate(true);">
<div class="row">
<div class="mb-4 col-md-12"><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required></div>
<div class="mb-4 col-md-12"><input type="email" name="email" class="form-control" placeholder="Enter email" required></div>
<div class="mb-4 col-md-12"><select name="pname" class="form-control" required>
<option value="">Select Project</option>
<? foreach($query as $project) { ?>
<option value="<? echo $project['name'];?>"><? echo$project['name'];?></option>
<? } ?>
</select></div>
<div class="mb-4 col-md-12"><div class="input-group"><select name="country" id="country" onchange="countrycode(this.options[this.selectedIndex].value)" class="form-control" required><option value="">Select Country</option></select><div class="input-group-prepend"><span class="input-group-text" id="phonecode"></span>
</div><input type="tel" name="phone" placeholder="Phone No." class="form-control" value="" required></div>
</div>
<div class="col-md-12 text-center"><input type="submit" name="Submit" class="btn btn-dark" value="Submit"></div>
</div>
</form>
</div>
</div>
</div>