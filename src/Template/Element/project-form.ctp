<div class="col-md-4 order-md-2">
<div class="pr_form">
<div class="form_heading"><div class="heading_name">Have any Questions?</div> <span></span></div>
<div class="form_inner">
<?php // echo $msg->display();?>
<form role="form"  name="form1" method="post" onSubmit="return validate(true);">
<div class="row">
<div class="mb-4 col-md-12"><input type="text" name="name" class="form-control" placeholder="Enter Your Name" required></div>
<div class="mb-4 col-md-12"><input type="email" name="email" class="form-control" placeholder="Enter email" required></div>
<div class="col-md-12"><input type="hidden" name="pname" class="form-control" value="<?=$title;?>" ></div>
<div class="mb-4 col-md-12"><select name="country" id="country" onchange="countrycode(this.options[this.selectedIndex].value)" class="form-control" required><option value="">Select Country</option></select></div>

<div class="mb-4 col-md-12"><div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="phonecode"></span>
</div><input type="tel" name="phone" placeholder="Phone No." class="form-control" value="" required></div>
</div>

<div class="col-md-12 text-center"><input type="submit" name="Submit" class="btn btn-dark" value="Submit"></div>
</div>
</form>
</div>
</div>
</div>