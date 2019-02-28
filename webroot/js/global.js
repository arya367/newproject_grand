
function validate(val) {if( document.form1.name.value == "" )
	{alert( "Please enter a valid name" ); document.form1.name.focus(); return false;}	
if( document.form1.email.value == "" )
	{alert( "Please enter a valid Email" ); document.form1.email.focus(); return false;}
if( document.form1.country.value == "0" )
	{alert( "Please select your country" ); document.form1.email.focus(); return false; }
if( document.form1.phone.value == "" || isNaN(document.form1.phone.value) || document.form1.phone.value.length <= 5 || document.form1.phone.value.length >= 13)
	{alert( "Please enter a valid phone number" ); document.form1.phone.focus() ; return false;}	
return true;}
function valid_name(b,a){b.value=b.value.replace(valid_name.r[a],"")}valid_name.r={name:/[0-9]/g};
function valid_mob(b,a){b.value=b.value.replace(valid_mob.r[a],"")}valid_mob.r={name:/[a-zA-Z]/g};
function countrycode(val){
$.ajax({url:"http://server/current/yoonewprojects.com/countries/countryCode/"+escape(val),dataType:"html",success:function(result){
$('#phonecode').html(result);
$('#resalephonecode').html(result);
}});
}

var country={"2":"India","8":"United States","7":"United  Kingdom","6":"United Arab Emirates","173":"Singapore","3":"Australia","4":"Canada","123":"Malaysia","108":"Kuwait","92":"Hong Kong","77":"Germany","168":"Saudi Arabia","9":"Afghanistan","10":"Albania","11":"Algeria","12":"American Samoa","13":"Andorra","14":"Angola","15":"Anguilla","16":"Antigua and Barbuda","17":"Argentina","18":"Armenia","19":"Austria","20":"Azerbaijan","21":"Bahamas","22":"Bahrain","23":"Bangladesh","24":"Barbados","25":"Belarus","26":"Belgium","27":"Belize","28":"Benin","29":"Bermuda","30":"Bhutan","31":"Bosnia and Herzegovina","32":"Botswana","33":"Brazil","34":"British Virgin Islands","35":"Brunei","36":"Bulgaria","37":"Burkina Faso","38":"Burundi","39":"Cambodia","40":"Cameroon","41":"Canary Islands","42":"Cape Verde","43":"Cayman Islands","44":"Central African","45":"Chad","46":"Chile","47":"China","48":"Colombia","49":"Comoros","50":"Congo","51":"Cook Islands","52":"Costa Rica","53":"Cote Dlvoire","54":"Croatia","55":"Cuba","56":"Cyprus","57":"Czech Republic","58":"Denmark","59":"Dominica","60":"Dominican Republic","61":"East Timor","62":"Ecuador","63":"Egypt","64":"El Salvador","65":"Equatorial Guinea","66":"Eritrea","67":"Estonia","68":"Ethiopia","69":"Faeroe Islands","70":"Fiji","71":"Finland","72":"France","73":"French Guiana","74":"French Polybesia","75":"Gambia","76":"Georgia","78":"Ghana","79":"Gibraltar","80":"Greece","81":"Greenland","82":"Grenada","83":"Guadeloupe","84":"Guam","85":"Guatemala","86":"Guinea","87":"Guinea-Bissau","88":"Guyana","89":"Haiti","90":"Holland","91":"Honduras","93":"Hungary","94":"Iceland","95":"Indonesia","96":"Iran","97":"Iraq","98":"Ireland","99":"Isleof Man","100":"Israel","101":"Italy","102":"Jamaica","103":"Japan","104":"Jordan","105":"Kazakhstan","106":"Kenya","107":"Kiribati","109":"Kyrgyzstan","110":"Laos","111":"Latvia","112":"Lebanon","113":"Lesotho","114":"Liberia","115":"Libya","116":"Liechtenstein","117":"Lithuania","118":"Luxembourg","119":"Macau","120":"Macedonia","121":"Madagascar","122":"Malawi","124":"Maldives","125":"Mali","126":"Malta","127":"Martinique","128":"Mauritius","129":"Mexico","130":"Moldova","131":"Monaco","132":"Mongolia","133":"Montenegro","134":"Montserrat","135":"Morocco","136":"Mozambique","137":"Myanmar","138":"Namibia","139":"Nepal","140":"Netherlands","141":"Netherlands Antilles","142":"New Caledonia","143":"New Zealand","144":"Nicaragua","145":"Niger","146":"Nigeria","147":"North Korea","148":"Norway","149":"Oman","151":"Panama","152":"Papua New Guinea","153":"Paraguay","154":"Peru","155":"Philippines","156":"Poland","157":"Portugal","158":"Puerto Rico","159":"Qatar","160":"Reunion","161":"Romania","162":"Russia","163":"Rwanda","164":"Saint Kitts","165":"Saint Lucia","166":"San Marino","167":"Sao Tome and Principe","169":"Senegal","170":"Serbia","171":"Seychelles","172":"Sierra Leone","174":"Slovakia","175":"Slovenia","176":"Solomon Islands","177":"Somalia","178":"South Africa","179":"South Korea","180":"Spain","181":"Sri Lanka","182":"Sudan","183":"Suriname","184":"Swaziland","185":"Sweden","186":"Switzerland","187":"Syrian Arab Republic","188":"Tahiti","189":"Taiwan","190":"Tajikistan","191":"Tanzania","192":"Thailand","193":"Togo","194":"Trinidad and Tobago","195":"Tunisia","196":"Turkey","197":"Turkmenistan","198":"Uganda","199":"Ukraine","200":"Uruguay","201":"Uzbekistan","202":"Vanuatu","203":"Vatican City State","204":"Venezuela","205":"Vietnam","206":"Wallis and Futuna","207":"Yemen","208":"Yugoslavia","209":"Zambia","210":"Zimbabwe","150":"Others"};
for(var item in country){$('<option value="'+item+'##'+country[item]+'">'+country[item]+'</option>').appendTo('#country');$('<option value="'+item+'##'+country[item]+'">'+country[item]+'</option>').appendTo('#resalecountry');}

var states={"Alabama":"Alabama","Alaska":"Alaska","Arizona":"Arizona","Arkansas":"Arkansas","California":"California","Colorado":"Colorado","Connecticut":"Connecticut","District of Columbia":"District of Columbia","Florida":"Florida","Georgia":"Georgia","Hawai'i":"Hawai'i","Idaho":"Idaho","Illinois":"Illinois","Indiana":"Indiana","Iowa":"Iowa","Kansas":"Kansas","Kentucky":"Kentucky","Louisiana":"Louisiana","Maryland":"Maryland","Massachusetts":"Massachusetts","Michigan":"Michigan","Minnesota":"Minnesota","Mississippi":"Mississippi","Missouri":"Missouri","Montana":"Montana","Nebraska":"Nebraska","Nevada":"Nevada","New Hampshire":"New Hampshire","New Jersey":"New Jersey","New Mexico":"New Mexico","New York":"New York","North Carolina":"North Carolina","North Dakota":"North Dakota","Ohio":"Ohio","Oklahoma":"Oklahoma","Oregon":"Oregon","Pennsylvania":"Pennsylvania","Rhode Island":"Rhode Island","South Carolina":"South Carolina","South Dakota":"South Dakota","Tennessee":"Tennessee","Texas":"Texas","Utah":"Utah","Virginia":"Virginia","Washington":"Washington","Wisconsin":"Wisconsin"};for(var item in states){$('<option value="'+states[item]+'">'+states[item]+'</option>').appendTo('#states');}
$("#country").change(function(){ var c=$("#country").val();var res = c.split("##");if(res[0]==8){ $("#states").attr("required","required"); $("#resstate").show(); } else { $("#resstate").hide();} });
$(document).ready(function(){ $("#nav ul.child").removeClass("child");$("#nav li").has("ul").hover(function(){$(this).addClass("current").children("ul").fadeIn();}, function() {$(this).removeClass("current").children("ul").hide();});});

$(document).ready(function() {$ ('ul.ui-id-1 li:even').addClass('even');$ ('ul.ui-id-1 li:odd').addClass('odd');});

/*$(function(){$("#search_prop").autocomplete({minLength:0,source:"/properties/autosuggest/",focus:function(e,t){$("#search_prop").val(t.item.label);return false},select:function(e,t){$("#search_prop").val(t.item.label);
$("#project-id").val(t.item.value);return false}}).data("ui-autocomplete")._renderItem=function(e,t){return $("<li>").append("<span>"+t.type+"</span><a href='"+t.value+"/'>"+t.label+"</a>").appendTo(e)}});
$(document).ready(function(){$("#search_prop").on("autocompleteselect",function(e,t){window.location.href=t.item.value+"/";})})*/

function toggle_Slide(){document.getElementById("des").innerHTML="";if(document.getElementById("aboutdiv").style.display=="none"){document.getElementById("aboutdiv").style.display="inline";document.getElementById("des").innerHTML="Collapse"}else{document.getElementById("aboutdiv").style.display="none";document.getElementById("des").innerHTML="Read More..."}}

var bugmin={"1000000":"10 Lacs","2000000":"20 Lacs","3000000":"30 Lacs","4000000":"40 Lacs","5000000":"50 Lacs","6000000":"60 Lacs","7000000":"70 Lacs","8000000":"80 Lacs","9000000":"90 Lacs","10000000":"1 Cr","20000000":"2 Cr","30000000":"3 Cr","40000000":"4 Cr","50000000":"5 Cr","60000000":"6 Cr","70000000":"7 Cr","80000000":"8 Cr","90000000":"9 Cr","100000000":"10 Cr","110000000":"11 Cr","120000000":"12 Cr","130000000":"13 Cr","140000000":"14 Cr","150000000":"15 Cr","160000000":"16 Cr","170000000":"17 Cr","180000000":"18 Cr","190000000":"19 Cr","200000000":"20 Cr","210000000":"21 Cr","220000000":"22 Cr","230000000":"23 Cr","240000000":"24 Cr","250000000":"25 Cr",}
for(var item in bugmin){$('<option value="'+item+'">'+bugmin[item]+'</option>').appendTo('#budget-min');}

var bugmax={"1000000":"10 Lacs","2000000":"20 Lacs","3000000":"30 Lacs","4000000":"40 Lacs","5000000":"50 Lacs","6000000":"60 Lacs","7000000":"70 Lacs","8000000":"80 Lacs","9000000":"90 Lacs","10000000":"1 Cr","20000000":"2 Cr","30000000":"3 Cr","40000000":"4 Cr","50000000":"5 Cr","60000000":"6 Cr","70000000":"7 Cr","80000000":"8 Cr","90000000":"9 Cr","100000000":"10 Cr","110000000":"11 Cr","120000000":"12 Cr","130000000":"13 Cr","140000000":"14 Cr","150000000":"15 Cr","160000000":"16 Cr","170000000":"17 Cr","180000000":"18 Cr","190000000":"19 Cr","200000000":"20 Cr","210000000":"21 Cr","220000000":"22 Cr","230000000":"23 Cr","240000000":"24 Cr","250000000":"25 Cr","260000000":"26 Cr","270000000":"27 Cr","280000000":"28 Cr","290000000":"29 Cr","300000000":"30 Cr","190000000":"31 Cr","320000000":"32 Cr","330000000":"33 Cr","340000000":"34 Cr","350000000":"35 Cr","360000000":"36 Cr","370000000":"37 Cr","380000000":"38 Cr","3990000000":"39 Cr","400000000":"40 Cr",}

for(var item in bugmax){$('<option value="'+item+'">'+bugmax[item]+'</option>').appendTo('#budget-max');}

if($("#builders").length) {for(var item in builders){$('<option value="'+item+'">'+builders[item]+'</option>').appendTo('#builders');}}

if($("#sub_property_id").length) {for(var item in subtypes){$('<option value="'+item+'">'+subtypes[item]+'</option>').appendTo('#sub_property_id');}}

var beds={"1":"1 BHK","2":"2 BHK","3":"3 BHK","4":"4 BHK","5":"5 BHK","6":"6 BHK","8":"Penthouse"}
for(var item in beds){$('<option value="'+item+'">'+beds[item]+'</option>').appendTo('#beds');}
if($("#locations").length) {for(var item in locations){$('<option value="'+item+'">'+locations[item]+'</option>').appendTo('#locations');}}

var propertytype={"1":"Residential","2":"Commercial"}
for(var item in propertytype){$('<option value="'+item+'">'+propertytype[item]+'</option>').appendTo('#property_id');}

$(document).ready( function() {
$('#backTop').backTop({'position' : 700,'speed' : 500,'color' : 'black',});});
!function(o){o.fn.backTop=function(e){var n=this,i=o.extend({position:400,speed:500,color:"white"},e),t=i.position,c=i.speed,d=i.color;n.addClass("white"==d?"white":"red"==d?"red":"green"==d?"green":"black"),n.css({right:15,bottom:80,position:"fixed"}),o(document).scroll(function(){var e=o(window).scrollTop();console.log(e),e>=t?n.fadeIn(c):n.fadeOut(c)}),n.click(function(){o("html, body").animate({scrollTop:0},{duration:1200})})}}(jQuery);
$('.resalelist:odd').addClass("row_border1");$('.resalelist:even').addClass("row_border2");
$(document).ready(function(){ $(".ui-autocomplete-input").keyup(function() {
if($(this).val().length > 0) {	
var pathval='document.location.href="/search?pr='+$(this).val()+'"';
    $('.sear_btn').attr('onClick', pathval);
}else{ 
	$('.sear_btn').removeAttr('onClick');
	}
}); });

$(document).ready(function(){$(".subscrb_btn").click(function(){$("#sub_loading").html("<img src='images/preloader.gif'>&nbsp;Please wait.... "); var s=$(".subs_type").val();if(s=='' || s==0){$("#sub_loading").html("Please enter email id.");}else{$.ajax({url:"/subscribes/send/"+escape(s),data:"",dataType:"html",success:function(d){ resp=d.split("##"); if(resp[0]==0){$("#sub_loading").html(resp[1])}else{$("#sub_loading").html("");$(".subs_type").val("");$("#sub_loading").html("");alert('Thank you for your subscription');}}})}})});
$("[name=search_prop]").focus();