import{i as c,o as e,c as i,w as o,a as t,b as a,u as l,p as d,d as r,g as m,f as p,t as f,e as u,F as g}from"./app-425b229f.js";import{A as x}from"./AppLayout-6319fc3e.js";import{S as y}from"./SectionBorder-4b0b7e53.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-1ed08302.js";const b=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Accounts ",-1),w={class:"mx-4"},k={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},v={class:"flex items-center justify-between mb-6"},A=t("span",null,"Create",-1),N=t("span",{class:"hidden md:inline"}," Account",-1),B={class:"bg-white rounded-md shadow overflow-x-auto"},C={class:"w-full whitespace-nowrap"},S=t("thead",null,[t("tr",{class:"text-left font-bold"},[t("th",{class:"pb-4 pt-6 px-6"},"Name")])],-1),V={class:"border-t"},F={key:0},L=t("td",{class:"px-6 py-4 border-t",colspan:"4"},"No accounts found.",-1),j=[L],G={__name:"Index",props:{accounts:Array,url_prefix:String},setup(n){return(D,E)=>{const _=c("icon"),h=c("pagination");return e(),i(x,{title:"Accounts"},{header:o(()=>[b]),default:o(()=>[t("div",w,[t("div",k,[t("div",v,[a(l(d),{class:"inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition",href:"/accounts/create"},{default:o(()=>[A,N]),_:1})]),t("div",B,[t("table",C,[S,t("tbody",null,[(e(!0),r(g,null,m(n.accounts,s=>(e(),r("tr",{key:s.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",V,[a(l(d),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/accounts/${s.id}/edit`},{default:o(()=>[p(f(s.name)+" ",1),s.deleted_at?(e(),i(_,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):u("",!0)]),_:2},1032,["href"])])]))),128)),n.accounts.length===0?(e(),r("tr",F,j)):u("",!0)])])]),a(h,{class:"mt-6",links:n.accounts.links},null,8,["links"])]),a(y)])]),_:1})}}};export{G as default};
