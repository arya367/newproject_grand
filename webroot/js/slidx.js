$(document).ready(function(){function i(){"right"==c&&($(s).animate({right:"0"},l),"click"==a&&$(e).animate({right:d},l)),"right"!==c&&($(s).animate({left:"0"},l),"click"==a&&(1==$("#slidx-shadow").length&&$("#slidx-shadow").remove(),$(e).animate({left:d},l))),"yes"==n&&($("<div>",{id:"slidx-shadow",css:{position:"fixed",top:"0px",width:"100%",height:"100%","background-color":"#000000",opacity:"0","z-index":"1033"}}).appendTo("html"),$("#slidx-shadow").fadeTo(r,o))}function t(i){"right"==c&&($(s).animate({right:"-"+d},i),"click"==a&&$(e).animate({right:0},i)),"right"!==c&&($(s).animate({left:"-"+d},i),"click"==a&&$(e).animate({left:0},i)),$(s).removeClass(""),$("#slidx-shadow").fadeOut(r)}var e="#slidx-button",s=".slidx-menu",a="click",c="left",n="yes",o=.6,d=250,h=.5,l=0,r=1e3*h;$(s).css({position:"fixed",top:"0px",width:d+"px","max-width":"100%",height:"100%","overflow-y":"auto",transition:h+"s","z-index":1040}),"right"==c&&$(s).css({right:"-"+d+"px"}),"right"!==c&&$(s).css({left:"-"+d+"px"}),"right"==c&&$(e).css({right:"0px"}),"right"!==c&&$(e).css({left:"0px"}),"click"==a&&($(e).click(function(){$(s).hasClass("")?t(l):i()}),$(s).click(function(){})),$(document).on("click","#slidx-shadow",function(){t(l)})});