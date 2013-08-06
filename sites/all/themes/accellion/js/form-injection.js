
/* ================ GA Click Attribution Form Injection ================ */

/* ====== 080513 consulting solution to integrate GA and Marketo ======= */


var _bamCA =  {
		'options' : {
			'formSelector' : '.ga_inject', // form identifier, could be class, id or any selector type
			'cookieExp' : 180, // how long before first click cookie expires
			'showFirst' : true, // show first click data
			'showLast' : false
	  } // show last click data
}
	
_bamCA.data = [];
  
_bamCA.getFromURL = function(name, url) { 
	name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
	var regexS = "[\\?&]" + name + "=([^&#]*)";
	var regex = new RegExp(regexS);
	var results = (typeof(url) != 'undefined') ? regex.exec(url): regex.exec(window.location.href);
	if(results == null) return undefined;
	else return decodeURIComponent(results[1].replace(/\+/g, " "));
}
_bamCA._uGC = function(l,n,s) { // extract parameter from string ( string, param, separator )
    if (!l || l=='' || !n || n=='' || !s || s=='') return ''; 
    var i,i2,i3,c='-'; i=l.indexOf(n); i3=n.indexOf('=')+1;
    if (i > -1) { i2=l.indexOf(s,i); if (i2 < 0) { i2=l.length; } c=l.substring((i+i3),i2); }
    if (c == '-') return ''; else return c;
}
_bamCA.getCookieStamps = function() { // parse GA time cookie separate into first, last, current and count
	var utma = _bamCA._uGC(document.cookie, '__utma=',';');
	var ret = [];
	ret.id = utma.split('.')[1]; ret.first = utma.split('.')[2]; ret.last = utma.split('.')[3]; ret.current = utma.split('.')[4]; ret.count = utma.split('.')[5];
	return ret;
}
_bamCA.getGAData = function() { // grab GA data from URL or if not present, from GA cookie
	var gaZ = _bamCA._uGC(document.cookie, '__utmz=',';'); 
	var gaG = _bamCA._uGC(gaZ,'utmgclid=','|');
	var ret = [];
	  _bamCA.data.reset 		= _bamCA.getFromURL('ga_reset') ? _bamCA.getFromURL('ga_reset'): false;
	  _bamCA.options.cookieExp 	= _bamCA.getFromURL('ga_exp') ? _bamCA.getFromURL('ga_exp'): _bamCA.options.cookieExp;
	  ret.source 				= _bamCA.getFromURL('ga_source') ? _bamCA.getFromURL('ga_source') :(gaG != '') ? 'google': _bamCA._uGC(gaZ,'utmcsr=','|');
	  ret.medium 				= _bamCA.getFromURL('ga_medium') ? _bamCA.getFromURL('ga_medium') : (gaG != '') ? 'cpc': _bamCA._uGC(gaZ,'utmcmd=','|');
      ret.term 					= _bamCA.getFromURL('ga_term') ? _bamCA.getFromURL('ga_term') : _bamCA._uGC(gaZ,'utmctr=','|').replace(/\%20/g," ");
      ret.campaign 				= _bamCA.getFromURL('ga_campaign') ? _bamCA.getFromURL('ga_campaign') : _bamCA._uGC(gaZ,'utmccn=','|');
      ret.content 				= _bamCA.getFromURL('ga_content') ? _bamCA.getFromURL('ga_content') : _bamCA._uGC(gaZ,'utmcct=','|');
      ret.network 				= _bamCA.getFromURL('ga_network') ? _bamCA.getFromURL('ga_network') : '(not passed)';
      ret.sitetarget 			= _bamCA.getFromURL('ga_sitetarget') ? _bamCA.getFromURL('ga_sitetarget') : '(not passed)';
      ret.matchtype 			= _bamCA.getFromURL('ga_matchtype') ? _bamCA.getFromURL('ga_matchtype') : '(not passed)';
      ret.visitcount 			= _bamCA.getCookieStamps()["count"];
      ret.firstvisit 			= _bamCA.getCookieStamps()["first"];
      ret.lastvisit 			= _bamCA.getCookieStamps()["last"];
      ret.landingpage 			= _bamCA.getFromURL('ga_landingpage') ? _bamCA.getFromURL('ga_landingpage') : location.pathname;
      ret.userid 				= _bamCA.getCookieStamps()["id"];
      
	return ret;
}
_bamCA.getCAData = function(type) { // Get cookie data, return false if not present; type of F for first, L for last
	var cookie = _bamCA._uGC(document.cookie,'GAca' + type + '=',';');
	var GAValues = cookie.split('!');
	var ret = [];
	var item,label;
		
	if (GAValues != "") {
		for (item in GAValues) {
			label = GAValues[item].split('=')[0];
			ret[label] = GAValues[item].split('=')[1];
		}
		return ret;
	} else return false;	
}
_bamCA.setCAData = function(type, items) { // set cookie; type F for first, L for last, items is GAData object
	var out = "GAca" + type + "=";
	var date = new Date();
	date.setTime(date.getTime()+(_bamCA.options.cookieExp*24*60*60*1000));
	var expires = "; expires="+date.toGMTString();
	for ( var item in items) { out += item + "=" + items[item] + "!"; }
	out = out.replace(/!$/,'') + expires + "; path=/";
	document.cookie = out;
}
_bamCA.setGACookies = function() { // check for first time, set cookie F or just update cookie L
	_bamCA.data.c = _bamCA.getGAData();
	if ( document.cookie.indexOf('GAcaF') < 0 || _bamCA.data.reset) {
		_bamCA.setCAData('F', _bamCA.data.c);

		//set visitor level custom variable upon initial visit to capture user ID
		_gaq.push(['_setCustomVar',1,'user-id',_bamCA.data.c['userid'],1]);
		_gaq.push(['_trackEvent', 'user-id', _bamCA.data.c['userid'] ]);
	}
	_bamCA.setCAData('L', _bamCA.data.c);
}
_bamCA.setCAForm = function() { // inject fields into form, including names and values	
	var form = jQuery('form');
	if(form.attr('id').match(/mktForm/i)) {
		_bamCA.form = form;
	}
		
	_bamCA.data.f = _bamCA.getCAData('F');

	var items = {};
  
  function prepArray(array,array2,object,invert,kpre,kpost,vpre,vpost) {
    array2 = typeof(array2) === 'object' ? array2: false; object = object !== undefined ? object: false; invert = invert !== undefined ? invert: false;
    kpre = kpre!==undefined ? kpre:''; kpost = kpost!==undefined ? kpost: '';
    vpre = vpre!==undefined ? vpre:''; vpost = vpost!==undefined ? vpost: '';

    if (arguments.length>1) {
      var o = object ? {}:[];
      if (!array2) {
        for (var key in array) {
          if (invert) {
            o[vpre+array[key]+vpost] = kpre+key+kpost;
          } else o[kpre+key+kpost] = vpre+array[key]+vpost;
        }
        return o;
      } else {
        for (var key in array2) {
          var adkey = object ? key: array.length+1+key;
          array[adkey] = array2[key]
        } return array;
      }
    }
    else return array;
  }

	items.data = (_bamCA.label!==undefined) ? _bamCA.label: (_bamCA.fields!==undefined) ? prepArray(prepArray(_bamCA.fields,false,true,true,'f_','','f_'),prepArray(_bamCA.fields,false,true,true,'l_','','l_'),true): prepArray(prepArray(_bamCA.data.f,false,true,false,'f_'),prepArray(_bamCA.data.c,false,true,false,'l_'),true);

 	for ( var item in items.data) {
 	
	 	var tagName = _bamCA.label!==undefined ? items.data[item]: item;
	 	var tagData = item.match(/^f_/) ? _bamCA.data.f[item.replace(/^._/,'')]: _bamCA.data.c[item.replace(/^._/,'')];
	 		
		if ((_bamCA.options.showFirst && item.match(/^f_/)) || (_bamCA.options.showLast && item.match(/^l_/))) {
			_bamCA.form.append('<input type="hidden" id="' + item + '" name="' + tagName + '" value="'+ tagData + '">');
		}
	}

}
_bamCA.init = function() {
	_bamCA.setGACookies();
	_bamCA.setCAForm();
}
