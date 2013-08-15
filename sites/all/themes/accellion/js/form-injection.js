jQuery(document).ready(function($) {
	try{
		_bamCA.setUserID();
	} 
	catch(e){}	
});

/* ================ GA Click Attribution Form Injection ================ */
var _bamCA =  {}
_bamCA.data = [];

_bamCA._uGC = function(l,n,s) { // extract parameter from string ( string, param, separator )
    if (!l || l=='' || !n || n=='' || !s || s=='') return ''; 
    var i,i2,i3,c='-'; i=l.indexOf(n); i3=n.indexOf('=')+1;
    if (i > -1) { i2=l.indexOf(s,i); if (i2 < 0) { i2=l.length; } c=l.substring((i+i3),i2); }
    if (c == '-') return ''; else return c;
}

_bamCA.getCookieData = function() { 
	var utma = _bamCA._uGC(document.cookie, '__utma=',';');
	var ret = [];
	ret.id = utma.split('.')[1]; 
	return ret;
}
_bamCA.setUserID = function() { 
	var userid = _bamCA.getCookieData()["id"];
	jQuery('#f_userid').attr('value', userid);
      
	//set visitor level custom variable upon initial visit to capture user ID
	var pageTracker = _gat._getTrackerByName();
	if(pageTracker._getVisitorCustomVar(1) == undefined ) {
		_gaq.push(['_setCustomVar',1,'user-id',userid,1]);
		_gaq.push(['_trackEvent', 'user-id', userid ]);
	}
}
