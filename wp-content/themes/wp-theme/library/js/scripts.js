"use strict";function updateViewportDimensions(){var t=window,e=document,i=e.documentElement,n=e.getElementsByTagName("body")[0],a=t.innerWidth||i.clientWidth||n.clientWidth,r=t.innerHeight||i.clientHeight||n.clientHeight;return{width:a,height:r}}function loadGravatars(){var t=this,e=updateViewportDimensions();e.width>=768&&jQuery(".comment img[data-gravatar]").each(function(){jQuery(t).attr("src",jQuery(t).attr("data-gravatar"))})}jQuery(document).ready(function(t){});var waitForFinalEvent=function(){var t={};return function(e,i,n){n||(n="Don't call this twice without a uniqueId"),t[n]&&clearTimeout(t[n]),t[n]=setTimeout(e,i)}}(),timeToWaitForLast=100;
!function(e,t,n){function r(e,t){return typeof e===t}function a(){var e,t,n,a,o,i,s;for(var l in x)if(x.hasOwnProperty(l)){if(e=[],t=x[l],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(a=r(t.fn,"function")?t.fn():t.fn,o=0;o<e.length;o++)i=e[o],s=i.split("."),1===s.length?w[s[0]]=a:(!w[s[0]]||w[s[0]]instanceof Boolean||(w[s[0]]=new Boolean(w[s[0]])),w[s[0]][s[1]]=a),b.push((a?"":"no-")+s.join("-"))}}function o(e){var t=P.className,n=w._config.classPrefix||"";if(R&&(t=t.baseVal),w._config.enableJSClass){var r=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(r,"$1"+n+"js$2")}w._config.enableClasses&&(t+=" "+n+e.join(" "+n),R?P.className.baseVal=t:P.className=t)}function i(e,t){if("object"==typeof e)for(var n in e)$(e,n)&&i(n,e[n]);else{e=e.toLowerCase();var r=e.split("."),a=w[r[0]];if(2==r.length&&(a=a[r[1]]),"undefined"!=typeof a)return w;t="function"==typeof t?t():t,1==r.length?w[r[0]]=t:(!w[r[0]]||w[r[0]]instanceof Boolean||(w[r[0]]=new Boolean(w[r[0]])),w[r[0]][r[1]]=t),o([(t&&0!=t?"":"no-")+r.join("-")]),w._trigger(e,t)}return w}function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):R?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function l(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function c(e,t){return!!~(""+e).indexOf(t)}function d(){var e=t.body;return e||(e=s(R?"svg":"body"),e.fake=!0),e}function u(e,n,r,a){var o,i,l,c,u="modernizr",f=s("div"),p=d();if(parseInt(r,10))for(;r--;)l=s("div"),l.id=a?a[r]:u+(r+1),f.appendChild(l);return o=s("style"),o.type="text/css",o.id="s"+u,(p.fake?p:f).appendChild(o),p.appendChild(f),o.styleSheet?o.styleSheet.cssText=e:o.appendChild(t.createTextNode(e)),f.id=u,p.fake&&(p.style.background="",p.style.overflow="hidden",c=P.style.overflow,P.style.overflow="hidden",P.appendChild(p)),i=n(f,e),p.fake?(p.parentNode.removeChild(p),P.style.overflow=c,P.offsetHeight):f.parentNode.removeChild(f),!!i}function f(e,t){return function(){return e.apply(t,arguments)}}function p(e,t,n){var a;for(var o in e)if(e[o]in t)return n===!1?e[o]:(a=t[e[o]],r(a,"function")?f(a,n||t):a);return!1}function h(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(t,r){var a=t.length;if("CSS"in e&&"supports"in e.CSS){for(;a--;)if(e.CSS.supports(h(t[a]),r))return!0;return!1}if("CSSSupportsRule"in e){for(var o=[];a--;)o.push("("+h(t[a])+":"+r+")");return o=o.join(" or "),u("@supports ("+o+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function g(e,t,a,o){function i(){u&&(delete V.style,delete V.modElem)}if(o=!r(o,"undefined")&&o,!r(a,"undefined")){var d=m(e,a);if(!r(d,"undefined"))return d}for(var u,f,p,h,g,v=["modernizr","tspan","samp"];!V.style&&v.length;)u=!0,V.modElem=s(v.shift()),V.style=V.modElem.style;for(p=e.length,f=0;p>f;f++)if(h=e[f],g=V.style[h],c(h,"-")&&(h=l(h)),V.style[h]!==n){if(o||r(a,"undefined"))return i(),"pfx"!=t||h;try{V.style[h]=a}catch(y){}if(V.style[h]!=g)return i(),"pfx"!=t||h}return i(),!1}function v(e,t,n,a,o){var i=e.charAt(0).toUpperCase()+e.slice(1),s=(e+" "+D.join(i+" ")+i).split(" ");return r(t,"string")||r(t,"undefined")?g(s,t,a,o):(s=(e+" "+N.join(i+" ")+i).split(" "),p(s,t,n))}function y(e,t,r){return v(e,n,n,t,r)}var b=[],x=[],T={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){x.push({name:e,fn:t,options:n})},addAsyncTest:function(e){x.push({name:null,fn:e})}},w=function(){};w.prototype=T,w=new w,w.addTest("applicationcache","applicationCache"in e),w.addTest("geolocation","geolocation"in navigator),w.addTest("history",function(){var t=navigator.userAgent;return(-1===t.indexOf("Android 2.")&&-1===t.indexOf("Android 4.0")||-1===t.indexOf("Mobile Safari")||-1!==t.indexOf("Chrome")||-1!==t.indexOf("Windows Phone"))&&(e.history&&"pushState"in e.history)}),w.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var C=!1;try{C="WebSocket"in e&&2===e.WebSocket.CLOSING}catch(S){}w.addTest("websockets",C);var E="CSS"in e&&"supports"in e.CSS,k="supportsCSS"in e;w.addTest("supports",E||k),w.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(t){return!1}});var _=T._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];T._prefixes=_;var P=t.documentElement,R="svg"===P.nodeName.toLowerCase();R||!function(e,t){function n(e,t){var n=e.createElement("p"),r=e.getElementsByTagName("head")[0]||e.documentElement;return n.innerHTML="x<style>"+t+"</style>",r.insertBefore(n.lastChild,r.firstChild)}function r(){var e=b.elements;return"string"==typeof e?e.split(" "):e}function a(e,t){var n=b.elements;"string"!=typeof n&&(n=n.join(" ")),"string"!=typeof e&&(e=e.join(" ")),b.elements=n+" "+e,c(t)}function o(e){var t=y[e[g]];return t||(t={},v++,e[g]=v,y[v]=t),t}function i(e,n,r){if(n||(n=t),u)return n.createElement(e);r||(r=o(n));var a;return a=r.cache[e]?r.cache[e].cloneNode():m.test(e)?(r.cache[e]=r.createElem(e)).cloneNode():r.createElem(e),!a.canHaveChildren||h.test(e)||a.tagUrn?a:r.frag.appendChild(a)}function s(e,n){if(e||(e=t),u)return e.createDocumentFragment();n=n||o(e);for(var a=n.frag.cloneNode(),i=0,s=r(),l=s.length;l>i;i++)a.createElement(s[i]);return a}function l(e,t){t.cache||(t.cache={},t.createElem=e.createElement,t.createFrag=e.createDocumentFragment,t.frag=t.createFrag()),e.createElement=function(n){return b.shivMethods?i(n,e,t):t.createElem(n)},e.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+r().join().replace(/[\w\-:]+/g,function(e){return t.createElem(e),t.frag.createElement(e),'c("'+e+'")'})+");return n}")(b,t.frag)}function c(e){e||(e=t);var r=o(e);return!b.shivCSS||d||r.hasCSS||(r.hasCSS=!!n(e,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),u||l(e,r),e}var d,u,f="3.7.3",p=e.html5||{},h=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,m=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,g="_html5shiv",v=0,y={};!function(){try{var e=t.createElement("a");e.innerHTML="<xyz></xyz>",d="hidden"in e,u=1==e.childNodes.length||function(){t.createElement("a");var e=t.createDocumentFragment();return"undefined"==typeof e.cloneNode||"undefined"==typeof e.createDocumentFragment||"undefined"==typeof e.createElement}()}catch(n){d=!0,u=!0}}();var b={elements:p.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output picture progress section summary template time video",version:f,shivCSS:p.shivCSS!==!1,supportsUnknownElements:u,shivMethods:p.shivMethods!==!1,type:"default",shivDocument:c,createElement:i,createDocumentFragment:s,addElements:a};e.html5=b,c(t),"object"==typeof module&&module.exports&&(module.exports=b)}("undefined"!=typeof e?e:this,t);var z="Moz O ms Webkit",N=T._config.usePrefixes?z.toLowerCase().split(" "):[];T._domPrefixes=N;var $;!function(){var e={}.hasOwnProperty;$=r(e,"undefined")||r(e.call,"undefined")?function(e,t){return t in e&&r(e.constructor.prototype[t],"undefined")}:function(t,n){return e.call(t,n)}}(),T._l={},T.on=function(e,t){this._l[e]||(this._l[e]=[]),this._l[e].push(t),w.hasOwnProperty(e)&&setTimeout(function(){w._trigger(e,w[e])},0)},T._trigger=function(e,t){if(this._l[e]){var n=this._l[e];setTimeout(function(){var e,r;for(e=0;e<n.length;e++)(r=n[e])(t)},0),delete this._l[e]}},w._q.push(function(){T.addTest=i});var A=function(){function e(e,t){var a;return!!e&&(t&&"string"!=typeof t||(t=s(t||"div")),e="on"+e,a=e in t,!a&&r&&(t.setAttribute||(t=s("div")),t.setAttribute(e,""),a="function"==typeof t[e],t[e]!==n&&(t[e]=n),t.removeAttribute(e)),a)}var r=!("onblur"in t.documentElement);return e}();T.hasEvent=A,w.addTest("hashchange",function(){return A("hashchange",e)!==!1&&(t.documentMode===n||t.documentMode>7)}),w.addTest("audio",function(){var e=s("audio"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),t.mp3=e.canPlayType('audio/mpeg; codecs="mp3"').replace(/^no$/,""),t.opus=e.canPlayType('audio/ogg; codecs="opus"')||e.canPlayType('audio/webm; codecs="opus"').replace(/^no$/,""),t.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),t.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(n){}return t}),w.addTest("video",function(){var e=s("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(n){}return t}),w.addTest("webgl",function(){var t=s("canvas"),n="probablySupportsContext"in t?"probablySupportsContext":"supportsContext";return n in t?t[n]("webgl")||t[n]("experimental-webgl"):"WebGLRenderingContext"in e}),w.addTest("cssgradients",function(){for(var e,t="background-image:",n="gradient(linear,left top,right bottom,from(#9f9),to(white));",r="",a=0,o=_.length-1;o>a;a++)e=0===a?"to ":"",r+=t+_[a]+"linear-gradient("+e+"left top, #9f9, white);";w._config.usePrefixes&&(r+=t+"-webkit-"+n);var i=s("a"),l=i.style;return l.cssText=r,(""+l.backgroundImage).indexOf("gradient")>-1}),w.addTest("multiplebgs",function(){var e=s("a").style;return e.cssText="background:url(https://),url(https://),red url(https://)",/(url\s*\(.*?){3}/.test(e.background)}),w.addTest("opacity",function(){var e=s("a").style;return e.cssText=_.join("opacity:.55;"),/^0.55$/.test(e.opacity)}),w.addTest("regions",function(){if(R)return!1;var e=w.prefixed("flowFrom"),t=w.prefixed("flowInto"),r=!1;if(!e||!t)return r;var a=s("iframe"),o=s("div"),i=s("div"),l=s("div"),c="modernizr_flow_for_regions_check";i.innerText="M",o.style.cssText="top: 150px; left: 150px; padding: 0px;",l.style.cssText="width: 50px; height: 50px; padding: 42px;",l.style[e]=c,o.appendChild(i),o.appendChild(l),P.appendChild(o);var d,u,f=i.getBoundingClientRect();return i.style[t]=c,d=i.getBoundingClientRect(),u=parseInt(d.left-f.left,10),P.removeChild(o),42==u?r=!0:(P.appendChild(a),f=a.getBoundingClientRect(),a.style[t]=c,d=a.getBoundingClientRect(),f.height>0&&f.height!==d.height&&0===d.height&&(r=!0)),i=l=o=a=n,r}),w.addTest("rgba",function(){var e=s("a").style;return e.cssText="background-color:rgba(150,255,150,.5)",(""+e.backgroundColor).indexOf("rgba")>-1});var B=s("input"),O="autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),L={};w.input=function(t){for(var n=0,r=t.length;r>n;n++)L[t[n]]=!!(t[n]in B);return L.list&&(L.list=!(!s("datalist")||!e.HTMLDataListElement)),L}(O);var M="search tel url email datetime date month week time datetime-local number range color".split(" "),j={};w.inputtypes=function(e){for(var r,a,o,i=e.length,s="1)",l=0;i>l;l++)B.setAttribute("type",r=e[l]),o="text"!==B.type&&"style"in B,o&&(B.value=s,B.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(r)&&B.style.WebkitAppearance!==n?(P.appendChild(B),a=t.defaultView,o=a.getComputedStyle&&"textfield"!==a.getComputedStyle(B,null).WebkitAppearance&&0!==B.offsetHeight,P.removeChild(B)):/^(search|tel)$/.test(r)||(o=/^(url|email)$/.test(r)?B.checkValidity&&B.checkValidity()===!1:B.value!=s)),j[e[l]]=!!o;return j}(M),w.addTest("hsla",function(){var e=s("a").style;return e.cssText="background-color:hsla(120,40%,100%,.5)",c(e.backgroundColor,"rgba")||c(e.backgroundColor,"hsla")});var F={}.toString;w.addTest("svgclippaths",function(){return!!t.createElementNS&&/SVGClipPath/.test(F.call(t.createElementNS("http://www.w3.org/2000/svg","clipPath")))});var q=function(){var t=e.matchMedia||e.msMatchMedia;return t?function(e){var n=t(e);return n&&n.matches||!1}:function(t){var n=!1;return u("@media "+t+" { #modernizr { position: absolute; } }",function(t){n="absolute"==(e.getComputedStyle?e.getComputedStyle(t,null):t.currentStyle).position}),n}}();T.mq=q,w.addTest("mediaqueries",q("only all"));var I=T.testStyles=u,W=function(){var e=navigator.userAgent,t=e.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=e.match(/w(eb)?osbrowser/gi),r=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9,a=533>t&&e.match(/android/gi);return n||a||r}();W?w.addTest("fontface",!1):I('@font-face {font-family:"font";src:url("https://")}',function(e,n){var r=t.getElementById("smodernizr"),a=r.sheet||r.styleSheet,o=a?a.cssRules&&a.cssRules[0]?a.cssRules[0].cssText:a.cssText||"":"",i=/src/i.test(o)&&0===o.indexOf(n.split(" ")[0]);w.addTest("fontface",i)}),I('#modernizr{font:0/0 a}#modernizr:after{content:":)";visibility:hidden;font:7px/1 a}',function(e){w.addTest("generatedcontent",e.offsetHeight>=7)});var D=T._config.usePrefixes?z.split(" "):[];T._cssomPrefixes=D;var H=function(t){var r,a=_.length,o=e.CSSRule;if("undefined"==typeof o)return n;if(!t)return!1;if(t=t.replace(/^@/,""),r=t.replace(/-/g,"_").toUpperCase()+"_RULE",r in o)return"@"+t;for(var i=0;a>i;i++){var s=_[i],l=s.toUpperCase()+"_"+r;if(l in o)return"@-"+s.toLowerCase()+"-"+t}return!1};T.atRule=H;var U={elem:s("modernizr")};w._q.push(function(){delete U.elem});var V={style:U.elem.style};w._q.unshift(function(){delete V.style});var G=T.testProp=function(e,t,r){return g([e],n,t,r)};w.addTest("textshadow",G("textShadow","1px 1px")),T.testAllProps=v,T.prefixed=function(e,t,n){return 0===e.indexOf("@")?H(e):(-1!=e.indexOf("-")&&(e=l(e)),t?v(e,t,n):v(e,"pfx"))},T.testAllProps=y,w.addTest("cssanimations",y("animationName","a",!0)),w.addTest("backgroundsize",y("backgroundSize","100%",!0)),w.addTest("borderimage",y("borderImage","url() 1",!0)),function(){w.addTest("csscolumns",function(){var e=!1,t=y("columnCount");try{(e=!!t)&&(e=new Boolean(e))}catch(n){}return e});for(var e,t,n=["Width","Span","Fill","Gap","Rule","RuleColor","RuleStyle","RuleWidth","BreakBefore","BreakAfter","BreakInside"],r=0;r<n.length;r++)e=n[r].toLowerCase(),t=y("column"+n[r]),("breakbefore"===e||"breakafter"===e||"breakinside"==e)&&(t=t||y(n[r])),w.addTest("csscolumns."+e,t)}(),w.addTest("flexbox",y("flexBasis","1px",!0)),w.addTest("cssreflections",y("boxReflect","above",!0)),w.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&y("transform","scale(1)",!0)}),w.addTest("csstransforms3d",function(){var e=!!y("perspective","1px",!0),t=w._config.usePrefixes;if(e&&(!t||"webkitPerspective"in P.style)){var n,r="#modernizr{width:0;height:0}";w.supports?n="@supports (perspective: 1px)":(n="@media (transform-3d)",t&&(n+=",(-webkit-transform-3d)")),n+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",I(r+n,function(t){e=7===t.offsetWidth&&18===t.offsetHeight})}return e}),w.addTest("csstransitions",y("transition","all",!0)),a(),o(b),delete T.addTest,delete T.addAsyncTest;for(var J=0;J<w._q.length;J++)w._q[J]();e.Modernizr=w}(window,document);