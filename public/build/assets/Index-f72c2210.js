import{i,o as t,c as l,w as o,a as e,b as a,u as c,p as d,d as r,g as p,f as u,t as f,e as _,F as g}from"./app-1222412e.js";import{A as x}from"./AppLayout-7633008d.js";import{S as y}from"./SectionBorder-fe2b8d8c.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-d3dcef73.js";const b=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Roles ",-1),w={class:"mx-4"},k={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},v={class:"flex items-center justify-between mb-6"},N=e("span",null,"Create",-1),B=e("span",{class:"hidden md:inline"}," Role",-1),C={class:"bg-white rounded-md shadow overflow-x-auto"},V={class:"w-full whitespace-nowrap"},A=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Name")])],-1),R={class:"border-t"},S={key:0},F=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No roles found.",-1),L=[F],z={__name:"Index",props:{roles:Array},setup(n){return(j,D)=>{const h=i("icon"),m=i("pagination");return t(),l(x,{title:"Roles"},{header:o(()=>[b]),default:o(()=>[e("div",w,[e("div",k,[e("div",v,[a(c(d),{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/roles/create"},{default:o(()=>[N,B]),_:1})]),e("div",C,[e("table",V,[A,e("tbody",null,[(t(!0),r(g,null,p(n.roles,s=>(t(),r("tr",{key:s.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",R,[a(c(d),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/roles/${s.id}/edit`},{default:o(()=>[u(f(s.name)+" ",1),s.deleted_at?(t(),l(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):_("",!0)]),_:2},1032,["href"])])]))),128)),n.roles.length===0?(t(),r("tr",S,L)):_("",!0)])])]),a(m,{class:"mt-6",links:n.roles.links},null,8,["links"])]),a(y)])]),_:1})}}};export{z as default};