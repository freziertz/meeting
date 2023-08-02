import{r as y,h as b,i as v,o as l,c,w as r,a as e,b as s,u as w,Z as k,j as V,v as S,d as f,g as U,f as m,t as _,e as h,F as N,O as T}from"./app-1a6861a9.js";import{A as B}from"./AppLayout-01869b9d.js";import{S as O}from"./SectionBorder-7e2ecc25.js";import{_ as $}from"./Pagination-e1b30b84.js";import{S as j}from"./SearchFilter-957067cb.js";import{_ as u}from"./NavLink-797ed137.js";import"./_plugin-vue_export-helper-c27b6911.js";const C=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Users ",-1),D={class:"mx-4"},A={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},E=e("h1",{class:"mb-8 text-3xl font-bold"},"Users",-1),I={class:"flex items-center justify-between mb-6"},L=e("label",{class:"block text-gray-700"},"Trashed:",-1),q=e("option",{value:null},null,-1),F=e("option",{value:"with"},"With Trashed",-1),M=e("option",{value:"only"},"Only Trashed",-1),P=[q,F,M],R=e("span",null,"Create",-1),W=e("span",{class:"hidden md:inline"}," User",-1),Z={class:"bg-white rounded-md shadow overflow-x-auto"},z={class:"w-full whitespace-nowrap"},G=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Name"),e("th",{class:"pb-4 pt-6 px-6"},"Designation"),e("th",{class:"pb-4 pt-6 px-6"},"Email")])],-1),H={class:"border-t"},J={class:"border-t"},K={class:"border-t"},Q={key:0},X=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No users found.",-1),Y=[X],ne={__name:"Index",props:{filters:Object,users:Object},setup(d){const p=d,a=y({search:p.filters.search,trashed:p.filters.trashed});let x=null;b(a,function(n){clearTimeout(x),x=setTimeout(()=>{const o={};for(const t in n)n[t]!==null&&(o[t]=n[t]);const i={preserveState:!0};T.get("/users",o,i)},150)},{deep:!0});const g=()=>{for(const n in a.value)a.value[n]=null};return(n,o)=>{const i=v("icon");return l(),c(B,{title:"Users"},{header:r(()=>[C]),default:r(()=>[e("div",D,[e("div",A,[s(w(k),{title:"Users"}),E,e("div",I,[s(j,{modelValue:a.value.search,"onUpdate:modelValue":o[1]||(o[1]=t=>a.value.search=t),class:"mr-4 w-full max-w-md",onReset:g},{default:r(()=>[L,V(e("select",{"onUpdate:modelValue":o[0]||(o[0]=t=>a.value.trashed=t),class:"form-select mt-1 w-full"},P,512),[[S,a.value.trashed]])]),_:1},8,["modelValue"]),s(u,{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/users/create"},{default:r(()=>[R,W]),_:1})]),e("div",Z,[e("table",z,[G,e("tbody",null,[(l(!0),f(N,null,U(d.users.data,t=>(l(),f("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",H,[s(u,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/users/${t.id}/edit`},{default:r(()=>[m(_(t.name)+" ",1),t.deleted_at?(l(),c(i,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):h("",!0)]),_:2},1032,["href"])]),e("td",J,[s(u,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/users/${t.id}/edit`},{default:r(()=>[m(_(t.designation)+" ",1),t.deleted_at?(l(),c(i,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):h("",!0)]),_:2},1032,["href"])]),e("td",K,[s(u,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/users/${t.id}/edit`},{default:r(()=>[m(_(t.email)+" ",1),t.deleted_at?(l(),c(i,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):h("",!0)]),_:2},1032,["href"])])]))),128)),d.users.length===0?(l(),f("tr",Q,Y)):h("",!0)])])]),s($,{class:"mt-6",links:d.users.links},null,8,["links"])]),s(O)])]),_:1})}}};export{ne as default};