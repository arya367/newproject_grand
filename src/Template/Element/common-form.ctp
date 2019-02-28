<div id="contact" class="text-center">
<div class="container">
<div class="contact-form"><!--container-->
<div class="row form-side"><!--manage-->
<div class="col-md-8 col-md-offset-2 set-left">
<div class="heading_2 change-form top-form"><h2>Get in Touch</h2><div class="line"><hr></div></div>
<form role="form" class="top-form" name="form1" method="post" onSubmit="return validate(true);">
<div class="row">

<div class="col-sm-6 change-form-title">
Enquire Now!
</div>

<div class="col-sm-6 change-form-field">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
<input type="text" name="name" class="form-control" placeholder="Enter Your Name" required>
</div>
</div> 

<div class="col-sm-6 change-form-field">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
<input type="email" name="email" class="form-control" placeholder="Enter email" required>
</div>
</div>

</div>

<div class="row">

<div class="col-sm-6 change-form-field">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
<select name="country" id="country" onchange="countrycode(this.options[this.selectedIndex].value)" class="form-control country"><option value="0">Select Country</option></select>
</div>
</div>

<div class="col-sm-6 change-form-field">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
<span class="input-group-addon" id="phonecode"></span>
<input type="text" name="phone" placeholder="Phone No." class="form-control" value="">
</div>
</div>

</div>

<div class="row">
<div class="col-sm-12">
<div class="input-group">
<span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
<textarea class="form-control" name="comment">I need to know more about this project.</textarea>
</div>
</div>

</div>

<div class="row"><div class="col-sm-12"><input type="submit" name="Submit" class="btn btn btn-default btn-block" value="Submit"></div></div>
</form>
</div>
</div>
</div>
</div><!--container-->
</div>