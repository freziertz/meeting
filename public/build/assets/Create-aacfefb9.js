import{T as l,o as i,c as p,w as e,a as t,b as s,f as m,u as o,n as _}from"./app-425b229f.js";import{A as u}from"./AppLayout-6319fc3e.js";import{S as d}from"./SectionBorder-4b0b7e53.js";import{_ as f}from"./ActionMessage-f19acd45.js";import{_ as x}from"./FormSection-6fb30114.js";import{_ as g,a as v}from"./TextInput-6dd65b2a.js";import{_ as b}from"./InputLabel-6b65ea45.js";import{_ as h}from"./PrimaryButton-c602c2c2.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-1ed08302.js";import"./SectionTitle-54d82c40.js";const y=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Accounts ",-1),A={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},S={class:"col-span-6 sm:col-span-4"},q={__name:"Create",props:{},setup(V){const a=l({name:""}),c=()=>{a.post(route("accounts.store"),{})};return($,n)=>(i(),p(u,{title:"Accounts"},{header:e(()=>[y]),default:e(()=>[t("div",null,[t("div",A,[t("div",null,[s(x,{onSubmitted:c},{title:e(()=>[m(" Account Information ")]),description:e(()=>[m(" Create new account. ")]),form:e(()=>[t("div",S,[s(b,{for:"name",value:"Name"}),s(g,{id:"name",modelValue:o(a).name,"onUpdate:modelValue":n[0]||(n[0]=r=>o(a).name=r),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(v,{message:o(a).errors.name,class:"mt-2"},null,8,["message"])])]),actions:e(()=>[s(f,{on:o(a).recentlySuccessful,class:"mr-3"},{default:e(()=>[m(" Saved. ")]),_:1},8,["on"]),s(h,{class:_({"opacity-25":o(a).processing}),disabled:o(a).processing},{default:e(()=>[m(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(d)])])])]),_:1}))}};export{q as default};
