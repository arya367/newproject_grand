<div class="col-md-8 order-md-1">
<div class="pr_config prject_heading"><h2><?=stripslashes($projects[0]['location_heading']);?></h2></div>
<div class="location_mpa">
<div class="neibour_location" id="testing">
<ul>
<li><input type="checkbox" name="mytype" class="chkbox" id="school"  value="school" /><label for="school">School</label></li>
<li><input type="checkbox" name="mytype" class="chkbox" id="restaurant"  value="restaurant"/><label for="restaurant" >Restaurant</label></li>
<li><input type="checkbox" name="mytype" class="chkbox"  id="hospital"  value="hospital"/><label for="hospital" >Hospital</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="bus_station"  value="bus_station"/><label for="bus_station" >Bus Stop</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="park"  value="park"/><label for="park" >Park</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="bank"  value="bank"/><label for="bank" >Bank</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="bar"  value="bar"/><label for="bar" >Bar</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="movie_theater"  value="movie_theater"/><label for="movie_theater" >Movie Theater</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="night_club"  value="night_club"/><label for="night_club" >Night Club</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="gym"  value="gym"/><label for="gym" >Gym</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="atm"  value="atm"/><label for="atm" >ATM</label></li>
<li><input type="checkbox" name="mytype"  class="chkbox" id="spa"  value="spa"/><label for="spa" >Spa</label></li>
</ul>
<input id="address"  type="hidden" style="width:400px;" value="<? echo $projects[0]['location_text'].' ( '.ucwords($projects[0]['locationname']).' ) '; ?>"/>
<input type="button" value="submit" id="btn" style="display:none;" onClick="showMap();"/>
<br/>
<div id="map"></div>
<input type="text" id="latitude" style="display:none;" placeholder="Latitude" />
<input type="text" id="longitude" style="display:none;" placeholder="Longitude" />
<input type="text" id="lat" style="display:none;" placeholder="Latitude" value="<? echo $projects[0]['latitude']; ?>"/>
<input type="text" id="long" style="display:none;" placeholder="Longitude" value="<? echo $projects[0]['longitude']; ?>"/>
<!-- <input type="button"  id="hide_btn" value="hide markers" onClick="clearMarkers();" />-->
<input type="button" id="show_btn" value="show  markers" onClick="showMarkers();" style="display:none;" />
<div id="test"></div>
</div>
</div>
</div>
