import{r as v,h as k,i as w,o as s,c as m,w as l,a as e,b as r,u,Z as S,j as M,v as V,e as h,d as _,g as N,f as p,t as i,F as O,O as T}from"./app-1a6861a9.js";import{A as j}from"./AppLayout-01869b9d.js";import{S as B}from"./SectionBorder-7e2ecc25.js";import{h as x}from"./moment-fbc5633a.js";import{_ as $}from"./Pagination-e1b30b84.js";import{S as A}from"./SearchFilter-957067cb.js";import{_ as f}from"./NavLink-797ed137.js";import"./_plugin-vue_export-helper-c27b6911.js";const C=e("h1",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Meetings ",-1),D={class:"mx-4"},H={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},Y={class:"flex items-center justify-between mb-6"},U=e("label",{class:"block text-gray-700"},"Trashed:",-1),I=e("option",{value:null},null,-1),L=e("option",{value:"with"},"With Trashed",-1),q=e("option",{value:"only"},"Only Trashed",-1),E=[I,L,q],F=e("span",null,"Create",-1),P=e("span",{class:"hidden md:inline"}," Meeting",-1),R={class:"bg-white text-sm rounded-md shadow overflow-x-auto"},W={class:"w-full whitespace-nowrap"},Z=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Name"),e("th",{class:"pb-4 pt-6 px-6"},"Schedule"),e("th",{class:"pb-4 pt-6 px-6"},"Venue")])],-1),z={class:"border-t"},G={class:"text-red-500"},J={class:"border-t"},K={class:"border-t"},Q={key:0},X=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No meetings found.",-1),ee=[X],de={__name:"Index",props:{meetings:Object,meeting_date:String,filters:Object,url_prefix:String,can:Object},setup(d){const g=d,a=v({search:g.filters.search,trashed:g.filters.trashed});let y=null;k(a,function(n){clearTimeout(y),y=setTimeout(()=>{const o={};for(const t in n)n[t]!==null&&(o[t]=n[t]);const c={preserveState:!0};T.get("/meetings",o,c)},150)},{deep:!0});const b=()=>{for(const n in a.value)a.value[n]=null};return(n,o)=>{const c=w("icon");return s(),m(j,{title:"Meetings"},{header:l(()=>[C]),default:l(()=>[e("div",D,[e("div",H,[r(u(S),{title:"Meetings"}),e("div",Y,[r(A,{modelValue:a.value.search,"onUpdate:modelValue":o[1]||(o[1]=t=>a.value.search=t),class:"mr-4 w-full max-w-md",onReset:b},{default:l(()=>[U,M(e("select",{"onUpdate:modelValue":o[0]||(o[0]=t=>a.value.trashed=t),class:"form-select mt-1 w-full"},E,512),[[V,a.value.trashed]])]),_:1},8,["modelValue"]),d.can.create_meeting?(s(),m(f,{key:0,class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/meetings/create"},{default:l(()=>[F,P]),_:1})):h("",!0)]),e("div",R,[e("table",W,[Z,e("tbody",null,[(s(!0),_(O,null,N(d.meetings.data,t=>(s(),_("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",z,[r(f,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/meetings/${t.id}`},{default:l(()=>[p(i(t.title)+"   ",1),e("span",G,i(t.status===1?"   Unpublished":""),1),t.deleted_at?(s(),m(c,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):h("",!0)]),_:2},1032,["href"])]),e("td",J,[r(f,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/meetings/${t.id}`},{default:l(()=>[p(i(u(x)(t.meeting_date).format("dddd, MMMM DD, YYYY"))+" from "+i(u(x)(t.meeting_start_time,"HH:mm:ss").format("hh:mm A"))+" to "+i(u(x)(t.meeting_end_time,"HH:mm").format("hh:mm A"))+" ",1),t.deleted_at?(s(),m(c,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):h("",!0)]),_:2},1032,["href"])]),e("td",K,[r(f,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/meetings/${t.id}`},{default:l(()=>[p(i(t.venue)+" ",1),t.deleted_at?(s(),m(c,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):h("",!0)]),_:2},1032,["href"])])]))),128)),d.meetings.length===0?(s(),_("tr",Q,ee)):h("",!0)])])]),r($,{class:"mt-6",links:d.meetings.links},null,8,["links"])]),r(B)])]),_:1})}}};export{de as default};