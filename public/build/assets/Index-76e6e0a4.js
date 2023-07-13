import{i as h,o as s,c as i,w as o,a as e,b as a,u as r,p as l,d as c,g as u,f as m,t as f,e as d,F as g}from"./app-563fdfa6.js";import{A as x}from"./AppLayout-c5d5f249.js";import{S as y}from"./SectionBorder-7a24db5d.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-ec48be57.js";const b=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Meeting Types ",-1),w={class:"mx-4"},k={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},v={class:"flex items-center justify-between mb-6"},N=e("span",null,"Create",-1),B=e("span",{class:"hidden md:inline"}," Meeting Type",-1),C={class:"bg-white rounded-md shadow overflow-x-auto"},T={class:"w-full whitespace-nowrap"},V=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Name")])],-1),A={class:"border-t"},M={class:"border-t"},S={key:0},F=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No meeting types found.",-1),L=[F],G={__name:"Index",props:{meeting_types:Array},setup(n){return($,j)=>{const p=h("icon"),_=h("pagination");return s(),i(x,{title:"MeetingTypes"},{header:o(()=>[b]),default:o(()=>[e("div",w,[e("div",k,[e("div",v,[a(r(l),{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/meeting-types/create"},{default:o(()=>[N,B]),_:1})]),e("div",C,[e("table",T,[V,e("tbody",null,[(s(!0),c(g,null,u(n.meeting_types,t=>(s(),c("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",A,[a(r(l),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/meeting-types/${t.id}/edit`},{default:o(()=>[m(f(t.name)+" ",1),t.deleted_at?(s(),i(p,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)]),_:2},1032,["href"])]),e("td",M,[a(r(l),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/meeting-types/${t.id}/edit`},{default:o(()=>[m(f(t.description)+" ",1),t.deleted_at?(s(),i(p,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):d("",!0)]),_:2},1032,["href"])])]))),128)),n.meeting_types.length===0?(s(),c("tr",S,L)):d("",!0)])])]),a(_,{class:"mt-6",links:n.meeting_types.links},null,8,["links"])]),a(y)])]),_:1})}}};export{G as default};