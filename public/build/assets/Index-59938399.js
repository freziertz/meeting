import{h as g}from"./moment-fbc5633a.js";import{i as u,o as s,c as n,w as o,a as e,b as a,u as r,p as l,d as f,g as y,f as i,t as p,e as c,F as b,O as k}from"./app-a0df8eaa.js";import{A as w}from"./AppLayout-2aca7c7f.js";import{S as v}from"./SectionBorder-36494ee4.js";import{_ as D}from"./NavLink-86216fb4.js";import"./_plugin-vue_export-helper-c27b6911.js";const C=e("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Documents ",-1),$={class:"mx-4"},B={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},N={class:"flex items-center justify-between mb-6"},S=e("span",null,"Create",-1),M=e("span",{class:"hidden md:inline"}," Document",-1),A={class:"bg-white rounded-md shadow overflow-x-auto"},V={class:"w-full whitespace-nowrap"},Y=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Name"),e("th",{class:"pb-4 pt-6 px-6"},"Size in MB"),e("th",{class:"pb-4 pt-6 px-6"},"Created At"),e("th",{class:"pb-4 pt-6 px-6"},"Delete")])],-1),F={class:"border-t"},z=["src"],H={class:"border-t"},L={class:"border-t"},O={key:0},j=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No documents found.",-1),E=[j],R={__name:"Index",props:{documents:Array,url_prefix:String},setup(d){const _=m=>{console.log("delete this document "+m),k.delete(route("documents.destroy",m),{preserveScroll:!0})};return(m,I)=>{const h=u("icon"),x=u("pagination");return s(),n(w,{title:"Documents"},{header:o(()=>[C]),default:o(()=>[e("div",$,[e("div",B,[e("div",N,[a(r(l),{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/documents/create"},{default:o(()=>[S,M]),_:1})]),e("div",A,[e("table",V,[Y,e("tbody",null,[(s(!0),f(b,null,y(d.documents,t=>(s(),f("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",F,[a(r(l),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/documents/${t.id}`},{default:o(()=>[e("img",{src:`/storage/icons/${t.extension}.png`,class:"image-fluid w-4 mr-2"},null,8,z),i(" "+p(t.name)+" ",1),t.deleted_at?(s(),n(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),_:2},1032,["href"])]),e("td",H,[a(r(l),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/documents/${t.id}`},{default:o(()=>[i(p((t.size/1024/1024).toFixed(2))+" ",1),t.deleted_at?(s(),n(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),_:2},1032,["href"])]),e("td",L,[a(r(l),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/documents/${t.id}`},{default:o(()=>[i(p(r(g)(t.created_at).format("dddd, MMMM DD, YYYY HH:mm:ss"))+" ",1),t.deleted_at?(s(),n(h,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):c("",!0)]),_:2},1032,["href"])]),e("td",null,[a(D,{onClick:T=>_(`${t.id}`),class:"text-red-700 rounded-md cursor-pointer"},{default:o(()=>[i("x")]),_:2},1032,["onClick"])])]))),128)),d.documents.length===0?(s(),f("tr",O,E)):c("",!0)])])]),a(x,{class:"mt-6",links:d.documents.links},null,8,["links"])]),a(v)])]),_:1})}}};export{R as default};
