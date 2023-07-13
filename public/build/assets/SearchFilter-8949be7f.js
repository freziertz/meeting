import{r as Ae,m as gt,h as yt,M as wt,o as $e,d as Pe,x as De,a as V,q as bt,e as xt,i as Ot,b as Et,w as Ye,N as At}from"./app-563fdfa6.js";import{_ as $t}from"./_plugin-vue_export-helper-c27b6911.js";var B="top",L="bottom",T="right",k="left",ke="auto",pe=[B,L,T,k],Z="start",se="end",Pt="clippingParents",rt="viewport",oe="popper",Dt="reference",Ue=pe.reduce(function(e,t){return e.concat([t+"-"+Z,t+"-"+se])},[]),nt=[].concat(pe,[ke]).reduce(function(e,t){return e.concat([t,t+"-"+Z,t+"-"+se])},[]),Ct="beforeRead",Bt="read",kt="afterRead",Rt="beforeMain",jt="main",St="afterMain",Lt="beforeWrite",Tt="write",Mt="afterWrite",Wt=[Ct,Bt,kt,Rt,jt,St,Lt,Tt,Mt];function N(e){return e?(e.nodeName||"").toLowerCase():null}function j(e){if(e==null)return window;if(e.toString()!=="[object Window]"){var t=e.ownerDocument;return t&&t.defaultView||window}return e}function J(e){var t=j(e).Element;return e instanceof t||e instanceof Element}function S(e){var t=j(e).HTMLElement;return e instanceof t||e instanceof HTMLElement}function Re(e){if(typeof ShadowRoot>"u")return!1;var t=j(e).ShadowRoot;return e instanceof t||e instanceof ShadowRoot}function Vt(e){var t=e.state;Object.keys(t.elements).forEach(function(r){var o=t.styles[r]||{},n=t.attributes[r]||{},a=t.elements[r];!S(a)||!N(a)||(Object.assign(a.style,o),Object.keys(n).forEach(function(f){var i=n[f];i===!1?a.removeAttribute(f):a.setAttribute(f,i===!0?"":i)}))})}function Ht(e){var t=e.state,r={popper:{position:t.options.strategy,left:"0",top:"0",margin:"0"},arrow:{position:"absolute"},reference:{}};return Object.assign(t.elements.popper.style,r.popper),t.styles=r,t.elements.arrow&&Object.assign(t.elements.arrow.style,r.arrow),function(){Object.keys(t.elements).forEach(function(o){var n=t.elements[o],a=t.attributes[o]||{},f=Object.keys(t.styles.hasOwnProperty(o)?t.styles[o]:r[o]),i=f.reduce(function(s,l){return s[l]="",s},{});!S(n)||!N(n)||(Object.assign(n.style,i),Object.keys(a).forEach(function(s){n.removeAttribute(s)}))})}}const Nt={name:"applyStyles",enabled:!0,phase:"write",fn:Vt,effect:Ht,requires:["computeStyles"]};function H(e){return e.split("-")[0]}var K=Math.max,ye=Math.min,_=Math.round;function Ce(){var e=navigator.userAgentData;return e!=null&&e.brands&&Array.isArray(e.brands)?e.brands.map(function(t){return t.brand+"/"+t.version}).join(" "):navigator.userAgent}function ot(){return!/^((?!chrome|android).)*safari/i.test(Ce())}function ee(e,t,r){t===void 0&&(t=!1),r===void 0&&(r=!1);var o=e.getBoundingClientRect(),n=1,a=1;t&&S(e)&&(n=e.offsetWidth>0&&_(o.width)/e.offsetWidth||1,a=e.offsetHeight>0&&_(o.height)/e.offsetHeight||1);var f=J(e)?j(e):window,i=f.visualViewport,s=!ot()&&r,l=(o.left+(s&&i?i.offsetLeft:0))/n,p=(o.top+(s&&i?i.offsetTop:0))/a,m=o.width/n,y=o.height/a;return{width:m,height:y,top:p,right:l+m,bottom:p+y,left:l,x:l,y:p}}function je(e){var t=ee(e),r=e.offsetWidth,o=e.offsetHeight;return Math.abs(t.width-r)<=1&&(r=t.width),Math.abs(t.height-o)<=1&&(o=t.height),{x:e.offsetLeft,y:e.offsetTop,width:r,height:o}}function at(e,t){var r=t.getRootNode&&t.getRootNode();if(e.contains(t))return!0;if(r&&Re(r)){var o=t;do{if(o&&e.isSameNode(o))return!0;o=o.parentNode||o.host}while(o)}return!1}function F(e){return j(e).getComputedStyle(e)}function Ft(e){return["table","td","th"].indexOf(N(e))>=0}function z(e){return((J(e)?e.ownerDocument:e.document)||window.document).documentElement}function we(e){return N(e)==="html"?e:e.assignedSlot||e.parentNode||(Re(e)?e.host:null)||z(e)}function Ge(e){return!S(e)||F(e).position==="fixed"?null:e.offsetParent}function qt(e){var t=/firefox/i.test(Ce()),r=/Trident/i.test(Ce());if(r&&S(e)){var o=F(e);if(o.position==="fixed")return null}var n=we(e);for(Re(n)&&(n=n.host);S(n)&&["html","body"].indexOf(N(n))<0;){var a=F(n);if(a.transform!=="none"||a.perspective!=="none"||a.contain==="paint"||["transform","perspective"].indexOf(a.willChange)!==-1||t&&a.willChange==="filter"||t&&a.filter&&a.filter!=="none")return n;n=n.parentNode}return null}function le(e){for(var t=j(e),r=Ge(e);r&&Ft(r)&&F(r).position==="static";)r=Ge(r);return r&&(N(r)==="html"||N(r)==="body"&&F(r).position==="static")?t:r||qt(e)||t}function Se(e){return["top","bottom"].indexOf(e)>=0?"x":"y"}function ae(e,t,r){return K(e,ye(t,r))}function zt(e,t,r){var o=ae(e,t,r);return o>r?r:o}function it(){return{top:0,right:0,bottom:0,left:0}}function st(e){return Object.assign({},it(),e)}function ft(e,t){return t.reduce(function(r,o){return r[o]=e,r},{})}var It=function(t,r){return t=typeof t=="function"?t(Object.assign({},r.rects,{placement:r.placement})):t,st(typeof t!="number"?t:ft(t,pe))};function Xt(e){var t,r=e.state,o=e.name,n=e.options,a=r.elements.arrow,f=r.modifiersData.popperOffsets,i=H(r.placement),s=Se(i),l=[k,T].indexOf(i)>=0,p=l?"height":"width";if(!(!a||!f)){var m=It(n.padding,r),y=je(a),c=s==="y"?B:k,b=s==="y"?L:T,v=r.rects.reference[p]+r.rects.reference[s]-f[s]-r.rects.popper[p],d=f[s]-r.rects.reference[s],w=le(a),O=w?s==="y"?w.clientHeight||0:w.clientWidth||0:0,E=v/2-d/2,u=m[c],h=O-y[p]-m[b],g=O/2-y[p]/2+E,x=ae(u,g,h),P=s;r.modifiersData[o]=(t={},t[P]=x,t.centerOffset=x-g,t)}}function Yt(e){var t=e.state,r=e.options,o=r.element,n=o===void 0?"[data-popper-arrow]":o;n!=null&&(typeof n=="string"&&(n=t.elements.popper.querySelector(n),!n)||at(t.elements.popper,n)&&(t.elements.arrow=n))}const Ut={name:"arrow",enabled:!0,phase:"main",fn:Xt,effect:Yt,requires:["popperOffsets"],requiresIfExists:["preventOverflow"]};function te(e){return e.split("-")[1]}var Gt={top:"auto",right:"auto",bottom:"auto",left:"auto"};function Kt(e,t){var r=e.x,o=e.y,n=t.devicePixelRatio||1;return{x:_(r*n)/n||0,y:_(o*n)/n||0}}function Ke(e){var t,r=e.popper,o=e.popperRect,n=e.placement,a=e.variation,f=e.offsets,i=e.position,s=e.gpuAcceleration,l=e.adaptive,p=e.roundOffsets,m=e.isFixed,y=f.x,c=y===void 0?0:y,b=f.y,v=b===void 0?0:b,d=typeof p=="function"?p({x:c,y:v}):{x:c,y:v};c=d.x,v=d.y;var w=f.hasOwnProperty("x"),O=f.hasOwnProperty("y"),E=k,u=B,h=window;if(l){var g=le(r),x="clientHeight",P="clientWidth";if(g===j(r)&&(g=z(r),F(g).position!=="static"&&i==="absolute"&&(x="scrollHeight",P="scrollWidth")),g=g,n===B||(n===k||n===T)&&a===se){u=L;var $=m&&g===h&&h.visualViewport?h.visualViewport.height:g[x];v-=$-o.height,v*=s?1:-1}if(n===k||(n===B||n===L)&&a===se){E=T;var A=m&&g===h&&h.visualViewport?h.visualViewport.width:g[P];c-=A-o.width,c*=s?1:-1}}var D=Object.assign({position:i},l&&Gt),M=p===!0?Kt({x:c,y:v},j(r)):{x:c,y:v};if(c=M.x,v=M.y,s){var C;return Object.assign({},D,(C={},C[u]=O?"0":"",C[E]=w?"0":"",C.transform=(h.devicePixelRatio||1)<=1?"translate("+c+"px, "+v+"px)":"translate3d("+c+"px, "+v+"px, 0)",C))}return Object.assign({},D,(t={},t[u]=O?v+"px":"",t[E]=w?c+"px":"",t.transform="",t))}function Jt(e){var t=e.state,r=e.options,o=r.gpuAcceleration,n=o===void 0?!0:o,a=r.adaptive,f=a===void 0?!0:a,i=r.roundOffsets,s=i===void 0?!0:i,l={placement:H(t.placement),variation:te(t.placement),popper:t.elements.popper,popperRect:t.rects.popper,gpuAcceleration:n,isFixed:t.options.strategy==="fixed"};t.modifiersData.popperOffsets!=null&&(t.styles.popper=Object.assign({},t.styles.popper,Ke(Object.assign({},l,{offsets:t.modifiersData.popperOffsets,position:t.options.strategy,adaptive:f,roundOffsets:s})))),t.modifiersData.arrow!=null&&(t.styles.arrow=Object.assign({},t.styles.arrow,Ke(Object.assign({},l,{offsets:t.modifiersData.arrow,position:"absolute",adaptive:!1,roundOffsets:s})))),t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-placement":t.placement})}const Qt={name:"computeStyles",enabled:!0,phase:"beforeWrite",fn:Jt,data:{}};var he={passive:!0};function Zt(e){var t=e.state,r=e.instance,o=e.options,n=o.scroll,a=n===void 0?!0:n,f=o.resize,i=f===void 0?!0:f,s=j(t.elements.popper),l=[].concat(t.scrollParents.reference,t.scrollParents.popper);return a&&l.forEach(function(p){p.addEventListener("scroll",r.update,he)}),i&&s.addEventListener("resize",r.update,he),function(){a&&l.forEach(function(p){p.removeEventListener("scroll",r.update,he)}),i&&s.removeEventListener("resize",r.update,he)}}const _t={name:"eventListeners",enabled:!0,phase:"write",fn:function(){},effect:Zt,data:{}};var er={left:"right",right:"left",bottom:"top",top:"bottom"};function ge(e){return e.replace(/left|right|bottom|top/g,function(t){return er[t]})}var tr={start:"end",end:"start"};function Je(e){return e.replace(/start|end/g,function(t){return tr[t]})}function Le(e){var t=j(e),r=t.pageXOffset,o=t.pageYOffset;return{scrollLeft:r,scrollTop:o}}function Te(e){return ee(z(e)).left+Le(e).scrollLeft}function rr(e,t){var r=j(e),o=z(e),n=r.visualViewport,a=o.clientWidth,f=o.clientHeight,i=0,s=0;if(n){a=n.width,f=n.height;var l=ot();(l||!l&&t==="fixed")&&(i=n.offsetLeft,s=n.offsetTop)}return{width:a,height:f,x:i+Te(e),y:s}}function nr(e){var t,r=z(e),o=Le(e),n=(t=e.ownerDocument)==null?void 0:t.body,a=K(r.scrollWidth,r.clientWidth,n?n.scrollWidth:0,n?n.clientWidth:0),f=K(r.scrollHeight,r.clientHeight,n?n.scrollHeight:0,n?n.clientHeight:0),i=-o.scrollLeft+Te(e),s=-o.scrollTop;return F(n||r).direction==="rtl"&&(i+=K(r.clientWidth,n?n.clientWidth:0)-a),{width:a,height:f,x:i,y:s}}function Me(e){var t=F(e),r=t.overflow,o=t.overflowX,n=t.overflowY;return/auto|scroll|overlay|hidden/.test(r+n+o)}function pt(e){return["html","body","#document"].indexOf(N(e))>=0?e.ownerDocument.body:S(e)&&Me(e)?e:pt(we(e))}function ie(e,t){var r;t===void 0&&(t=[]);var o=pt(e),n=o===((r=e.ownerDocument)==null?void 0:r.body),a=j(o),f=n?[a].concat(a.visualViewport||[],Me(o)?o:[]):o,i=t.concat(f);return n?i:i.concat(ie(we(f)))}function Be(e){return Object.assign({},e,{left:e.x,top:e.y,right:e.x+e.width,bottom:e.y+e.height})}function or(e,t){var r=ee(e,!1,t==="fixed");return r.top=r.top+e.clientTop,r.left=r.left+e.clientLeft,r.bottom=r.top+e.clientHeight,r.right=r.left+e.clientWidth,r.width=e.clientWidth,r.height=e.clientHeight,r.x=r.left,r.y=r.top,r}function Qe(e,t,r){return t===rt?Be(rr(e,r)):J(t)?or(t,r):Be(nr(z(e)))}function ar(e){var t=ie(we(e)),r=["absolute","fixed"].indexOf(F(e).position)>=0,o=r&&S(e)?le(e):e;return J(o)?t.filter(function(n){return J(n)&&at(n,o)&&N(n)!=="body"}):[]}function ir(e,t,r,o){var n=t==="clippingParents"?ar(e):[].concat(t),a=[].concat(n,[r]),f=a[0],i=a.reduce(function(s,l){var p=Qe(e,l,o);return s.top=K(p.top,s.top),s.right=ye(p.right,s.right),s.bottom=ye(p.bottom,s.bottom),s.left=K(p.left,s.left),s},Qe(e,f,o));return i.width=i.right-i.left,i.height=i.bottom-i.top,i.x=i.left,i.y=i.top,i}function lt(e){var t=e.reference,r=e.element,o=e.placement,n=o?H(o):null,a=o?te(o):null,f=t.x+t.width/2-r.width/2,i=t.y+t.height/2-r.height/2,s;switch(n){case B:s={x:f,y:t.y-r.height};break;case L:s={x:f,y:t.y+t.height};break;case T:s={x:t.x+t.width,y:i};break;case k:s={x:t.x-r.width,y:i};break;default:s={x:t.x,y:t.y}}var l=n?Se(n):null;if(l!=null){var p=l==="y"?"height":"width";switch(a){case Z:s[l]=s[l]-(t[p]/2-r[p]/2);break;case se:s[l]=s[l]+(t[p]/2-r[p]/2);break}}return s}function fe(e,t){t===void 0&&(t={});var r=t,o=r.placement,n=o===void 0?e.placement:o,a=r.strategy,f=a===void 0?e.strategy:a,i=r.boundary,s=i===void 0?Pt:i,l=r.rootBoundary,p=l===void 0?rt:l,m=r.elementContext,y=m===void 0?oe:m,c=r.altBoundary,b=c===void 0?!1:c,v=r.padding,d=v===void 0?0:v,w=st(typeof d!="number"?d:ft(d,pe)),O=y===oe?Dt:oe,E=e.rects.popper,u=e.elements[b?O:y],h=ir(J(u)?u:u.contextElement||z(e.elements.popper),s,p,f),g=ee(e.elements.reference),x=lt({reference:g,element:E,strategy:"absolute",placement:n}),P=Be(Object.assign({},E,x)),$=y===oe?P:g,A={top:h.top-$.top+w.top,bottom:$.bottom-h.bottom+w.bottom,left:h.left-$.left+w.left,right:$.right-h.right+w.right},D=e.modifiersData.offset;if(y===oe&&D){var M=D[n];Object.keys(A).forEach(function(C){var I=[T,L].indexOf(C)>=0?1:-1,X=[B,L].indexOf(C)>=0?"y":"x";A[C]+=M[X]*I})}return A}function sr(e,t){t===void 0&&(t={});var r=t,o=r.placement,n=r.boundary,a=r.rootBoundary,f=r.padding,i=r.flipVariations,s=r.allowedAutoPlacements,l=s===void 0?nt:s,p=te(o),m=p?i?Ue:Ue.filter(function(b){return te(b)===p}):pe,y=m.filter(function(b){return l.indexOf(b)>=0});y.length===0&&(y=m);var c=y.reduce(function(b,v){return b[v]=fe(e,{placement:v,boundary:n,rootBoundary:a,padding:f})[H(v)],b},{});return Object.keys(c).sort(function(b,v){return c[b]-c[v]})}function fr(e){if(H(e)===ke)return[];var t=ge(e);return[Je(e),t,Je(t)]}function pr(e){var t=e.state,r=e.options,o=e.name;if(!t.modifiersData[o]._skip){for(var n=r.mainAxis,a=n===void 0?!0:n,f=r.altAxis,i=f===void 0?!0:f,s=r.fallbackPlacements,l=r.padding,p=r.boundary,m=r.rootBoundary,y=r.altBoundary,c=r.flipVariations,b=c===void 0?!0:c,v=r.allowedAutoPlacements,d=t.options.placement,w=H(d),O=w===d,E=s||(O||!b?[ge(d)]:fr(d)),u=[d].concat(E).reduce(function(Q,q){return Q.concat(H(q)===ke?sr(t,{placement:q,boundary:p,rootBoundary:m,padding:l,flipVariations:b,allowedAutoPlacements:v}):q)},[]),h=t.rects.reference,g=t.rects.popper,x=new Map,P=!0,$=u[0],A=0;A<u.length;A++){var D=u[A],M=H(D),C=te(D)===Z,I=[B,L].indexOf(M)>=0,X=I?"width":"height",R=fe(t,{placement:D,boundary:p,rootBoundary:m,altBoundary:y,padding:l}),W=I?C?T:k:C?L:B;h[X]>g[X]&&(W=ge(W));var ce=ge(W),Y=[];if(a&&Y.push(R[M]<=0),i&&Y.push(R[W]<=0,R[ce]<=0),Y.every(function(Q){return Q})){$=D,P=!1;break}x.set(D,Y)}if(P)for(var ue=b?3:1,be=function(q){var ne=u.find(function(ve){var U=x.get(ve);if(U)return U.slice(0,q).every(function(xe){return xe})});if(ne)return $=ne,"break"},re=ue;re>0;re--){var de=be(re);if(de==="break")break}t.placement!==$&&(t.modifiersData[o]._skip=!0,t.placement=$,t.reset=!0)}}const lr={name:"flip",enabled:!0,phase:"main",fn:pr,requiresIfExists:["offset"],data:{_skip:!1}};function Ze(e,t,r){return r===void 0&&(r={x:0,y:0}),{top:e.top-t.height-r.y,right:e.right-t.width+r.x,bottom:e.bottom-t.height+r.y,left:e.left-t.width-r.x}}function _e(e){return[B,T,L,k].some(function(t){return e[t]>=0})}function cr(e){var t=e.state,r=e.name,o=t.rects.reference,n=t.rects.popper,a=t.modifiersData.preventOverflow,f=fe(t,{elementContext:"reference"}),i=fe(t,{altBoundary:!0}),s=Ze(f,o),l=Ze(i,n,a),p=_e(s),m=_e(l);t.modifiersData[r]={referenceClippingOffsets:s,popperEscapeOffsets:l,isReferenceHidden:p,hasPopperEscaped:m},t.attributes.popper=Object.assign({},t.attributes.popper,{"data-popper-reference-hidden":p,"data-popper-escaped":m})}const ur={name:"hide",enabled:!0,phase:"main",requiresIfExists:["preventOverflow"],fn:cr};function dr(e,t,r){var o=H(e),n=[k,B].indexOf(o)>=0?-1:1,a=typeof r=="function"?r(Object.assign({},t,{placement:e})):r,f=a[0],i=a[1];return f=f||0,i=(i||0)*n,[k,T].indexOf(o)>=0?{x:i,y:f}:{x:f,y:i}}function vr(e){var t=e.state,r=e.options,o=e.name,n=r.offset,a=n===void 0?[0,0]:n,f=nt.reduce(function(p,m){return p[m]=dr(m,t.rects,a),p},{}),i=f[t.placement],s=i.x,l=i.y;t.modifiersData.popperOffsets!=null&&(t.modifiersData.popperOffsets.x+=s,t.modifiersData.popperOffsets.y+=l),t.modifiersData[o]=f}const mr={name:"offset",enabled:!0,phase:"main",requires:["popperOffsets"],fn:vr};function hr(e){var t=e.state,r=e.name;t.modifiersData[r]=lt({reference:t.rects.reference,element:t.rects.popper,strategy:"absolute",placement:t.placement})}const gr={name:"popperOffsets",enabled:!0,phase:"read",fn:hr,data:{}};function yr(e){return e==="x"?"y":"x"}function wr(e){var t=e.state,r=e.options,o=e.name,n=r.mainAxis,a=n===void 0?!0:n,f=r.altAxis,i=f===void 0?!1:f,s=r.boundary,l=r.rootBoundary,p=r.altBoundary,m=r.padding,y=r.tether,c=y===void 0?!0:y,b=r.tetherOffset,v=b===void 0?0:b,d=fe(t,{boundary:s,rootBoundary:l,padding:m,altBoundary:p}),w=H(t.placement),O=te(t.placement),E=!O,u=Se(w),h=yr(u),g=t.modifiersData.popperOffsets,x=t.rects.reference,P=t.rects.popper,$=typeof v=="function"?v(Object.assign({},t.rects,{placement:t.placement})):v,A=typeof $=="number"?{mainAxis:$,altAxis:$}:Object.assign({mainAxis:0,altAxis:0},$),D=t.modifiersData.offset?t.modifiersData.offset[t.placement]:null,M={x:0,y:0};if(g){if(a){var C,I=u==="y"?B:k,X=u==="y"?L:T,R=u==="y"?"height":"width",W=g[u],ce=W+d[I],Y=W-d[X],ue=c?-P[R]/2:0,be=O===Z?x[R]:P[R],re=O===Z?-P[R]:-x[R],de=t.elements.arrow,Q=c&&de?je(de):{width:0,height:0},q=t.modifiersData["arrow#persistent"]?t.modifiersData["arrow#persistent"].padding:it(),ne=q[I],ve=q[X],U=ae(0,x[R],Q[R]),xe=E?x[R]/2-ue-U-ne-A.mainAxis:be-U-ne-A.mainAxis,ct=E?-x[R]/2+ue+U+ve+A.mainAxis:re+U+ve+A.mainAxis,Oe=t.elements.arrow&&le(t.elements.arrow),ut=Oe?u==="y"?Oe.clientTop||0:Oe.clientLeft||0:0,We=(C=D==null?void 0:D[u])!=null?C:0,dt=W+xe-We-ut,vt=W+ct-We,Ve=ae(c?ye(ce,dt):ce,W,c?K(Y,vt):Y);g[u]=Ve,M[u]=Ve-W}if(i){var He,mt=u==="x"?B:k,ht=u==="x"?L:T,G=g[h],me=h==="y"?"height":"width",Ne=G+d[mt],Fe=G-d[ht],Ee=[B,k].indexOf(w)!==-1,qe=(He=D==null?void 0:D[h])!=null?He:0,ze=Ee?Ne:G-x[me]-P[me]-qe+A.altAxis,Ie=Ee?G+x[me]+P[me]-qe-A.altAxis:Fe,Xe=c&&Ee?zt(ze,G,Ie):ae(c?ze:Ne,G,c?Ie:Fe);g[h]=Xe,M[h]=Xe-G}t.modifiersData[o]=M}}const br={name:"preventOverflow",enabled:!0,phase:"main",fn:wr,requiresIfExists:["offset"]};function xr(e){return{scrollLeft:e.scrollLeft,scrollTop:e.scrollTop}}function Or(e){return e===j(e)||!S(e)?Le(e):xr(e)}function Er(e){var t=e.getBoundingClientRect(),r=_(t.width)/e.offsetWidth||1,o=_(t.height)/e.offsetHeight||1;return r!==1||o!==1}function Ar(e,t,r){r===void 0&&(r=!1);var o=S(t),n=S(t)&&Er(t),a=z(t),f=ee(e,n,r),i={scrollLeft:0,scrollTop:0},s={x:0,y:0};return(o||!o&&!r)&&((N(t)!=="body"||Me(a))&&(i=Or(t)),S(t)?(s=ee(t,!0),s.x+=t.clientLeft,s.y+=t.clientTop):a&&(s.x=Te(a))),{x:f.left+i.scrollLeft-s.x,y:f.top+i.scrollTop-s.y,width:f.width,height:f.height}}function $r(e){var t=new Map,r=new Set,o=[];e.forEach(function(a){t.set(a.name,a)});function n(a){r.add(a.name);var f=[].concat(a.requires||[],a.requiresIfExists||[]);f.forEach(function(i){if(!r.has(i)){var s=t.get(i);s&&n(s)}}),o.push(a)}return e.forEach(function(a){r.has(a.name)||n(a)}),o}function Pr(e){var t=$r(e);return Wt.reduce(function(r,o){return r.concat(t.filter(function(n){return n.phase===o}))},[])}function Dr(e){var t;return function(){return t||(t=new Promise(function(r){Promise.resolve().then(function(){t=void 0,r(e())})})),t}}function Cr(e){var t=e.reduce(function(r,o){var n=r[o.name];return r[o.name]=n?Object.assign({},n,o,{options:Object.assign({},n.options,o.options),data:Object.assign({},n.data,o.data)}):o,r},{});return Object.keys(t).map(function(r){return t[r]})}var et={placement:"bottom",modifiers:[],strategy:"absolute"};function tt(){for(var e=arguments.length,t=new Array(e),r=0;r<e;r++)t[r]=arguments[r];return!t.some(function(o){return!(o&&typeof o.getBoundingClientRect=="function")})}function Br(e){e===void 0&&(e={});var t=e,r=t.defaultModifiers,o=r===void 0?[]:r,n=t.defaultOptions,a=n===void 0?et:n;return function(i,s,l){l===void 0&&(l=a);var p={placement:"bottom",orderedModifiers:[],options:Object.assign({},et,a),modifiersData:{},elements:{reference:i,popper:s},attributes:{},styles:{}},m=[],y=!1,c={state:p,setOptions:function(w){var O=typeof w=="function"?w(p.options):w;v(),p.options=Object.assign({},a,p.options,O),p.scrollParents={reference:J(i)?ie(i):i.contextElement?ie(i.contextElement):[],popper:ie(s)};var E=Pr(Cr([].concat(o,p.options.modifiers)));return p.orderedModifiers=E.filter(function(u){return u.enabled}),b(),c.update()},forceUpdate:function(){if(!y){var w=p.elements,O=w.reference,E=w.popper;if(tt(O,E)){p.rects={reference:Ar(O,le(E),p.options.strategy==="fixed"),popper:je(E)},p.reset=!1,p.placement=p.options.placement,p.orderedModifiers.forEach(function(A){return p.modifiersData[A.name]=Object.assign({},A.data)});for(var u=0;u<p.orderedModifiers.length;u++){if(p.reset===!0){p.reset=!1,u=-1;continue}var h=p.orderedModifiers[u],g=h.fn,x=h.options,P=x===void 0?{}:x,$=h.name;typeof g=="function"&&(p=g({state:p,options:P,name:$,instance:c})||p)}}}},update:Dr(function(){return new Promise(function(d){c.forceUpdate(),d(p)})}),destroy:function(){v(),y=!0}};if(!tt(i,s))return c;c.setOptions(l).then(function(d){!y&&l.onFirstUpdate&&l.onFirstUpdate(d)});function b(){p.orderedModifiers.forEach(function(d){var w=d.name,O=d.options,E=O===void 0?{}:O,u=d.effect;if(typeof u=="function"){var h=u({state:p,name:w,instance:c,options:E}),g=function(){};m.push(h||g)}})}function v(){m.forEach(function(d){return d()}),m=[]}return c}}var kr=[_t,gr,Qt,Nt,mr,lr,br,Ut,ur],Rr=Br({defaultModifiers:kr});const jr={key:0},Sr={__name:"SearchDropdown",props:{placement:{type:String,default:"bottom-end"},autoClose:{type:Boolean,default:!0}},setup(e){const t=e,r=Ae(!1),o=Ae(null);return gt(()=>{const n=f=>{f.key==="Escape"&&(r.value=!1)};document.addEventListener("keydown",n),yt(r,()=>{r.value&&(o.value=Rr(r.value.$el,Ae.dropdown,{placement:t.placement,modifiers:[{name:"preventOverflow",options:{altBoundary:!0}}]}))},{immediate:!0}),wt(()=>{document.removeEventListener("keydown",n),o.value&&setTimeout(()=>o.value.destroy(),100)})}),(n,a)=>($e(),Pe("button",{type:"button",onClick:a[2]||(a[2]=f=>r.value=!0)},[De(n.$slots,"default"),r.value?($e(),Pe("div",jr,[V("div",{style:{position:"fixed",top:"0",right:"0",left:"0",bottom:"0","z-index":"99998",background:"black",opacity:"0.2"},onClick:a[0]||(a[0]=f=>r.value=!1)}),V("div",{ref:"dropdown",style:{position:"absolute","z-index":"99999"},onClick:a[1]||(a[1]=bt(f=>r.value=!e.autoClose,["stop"]))},[De(n.$slots,"dropdown")],512)])):xt("",!0)]))}},Lr={components:{Dropdown:Sr},props:{modelValue:String,maxWidth:{type:Number,default:300}},emits:["update:modelValue","reset"]},Tr={class:"flex items-center"},Mr={class:"flex w-full bg-white rounded shadow"},Wr=V("div",{class:"flex items-baseline"},[V("span",{class:"hidden text-gray-700 md:inline"},"Filter"),V("svg",{class:"w-2 h-2 fill-gray-700 md:ml-2",xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 961.243 599.998"},[V("path",{d:"M239.998 239.999L0 0h961.243L721.246 240c-131.999 132-240.28 240-240.624 239.999-.345-.001-108.625-108.001-240.624-240z"})])],-1),Vr=["value"];function Hr(e,t,r,o,n,a){const f=Ot("dropdown");return $e(),Pe("div",Tr,[V("div",Mr,[Et(f,{"auto-close":!1,class:"focus:z-10 px-4 hover:bg-gray-100 border-r focus:border-white rounded-l focus:ring md:px-6",placement:"bottom-start"},{default:Ye(()=>[Wr]),dropdown:Ye(()=>[V("div",{class:"mt-2 px-4 py-6 w-screen bg-white rounded shadow-xl",style:At({maxWidth:`${r.maxWidth}px`})},[De(e.$slots,"default")],4)]),_:3}),V("input",{class:"relative px-6 py-3 w-full rounded-r focus:shadow-outline",autocomplete:"off",type:"text",name:"search",placeholder:"Search…",value:r.modelValue,onInput:t[0]||(t[0]=i=>e.$emit("update:modelValue",i.target.value))},null,40,Vr)]),V("button",{class:"ml-3 text-gray-500 hover:text-gray-700 focus:text-indigo-500 text-sm",type:"button",onClick:t[1]||(t[1]=i=>e.$emit("reset"))},"Reset")])}const qr=$t(Lr,[["render",Hr]]);export{qr as S};