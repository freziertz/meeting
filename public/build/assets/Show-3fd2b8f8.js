import{T as i,o as p,c as u,w as s,a as t,b as a,f as n,u as o,n as _}from"./app-1222412e.js";import{A as d}from"./AppLayout-7633008d.js";import{S as f}from"./SectionBorder-fe2b8d8c.js";import{_ as x}from"./ActionMessage-8ac08335.js";import{_ as g}from"./FormSection-fda20c53.js";import{_ as h,a as b}from"./TextInput-40c6425d.js";import{_ as v}from"./InputLabel-a98e9a31.js";import{_ as S}from"./PrimaryButton-f5d78856.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-d3dcef73.js";import"./SectionTitle-70a31b56.js";const w=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Accounts ",-1),y={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},A={class:"col-span-6 sm:col-span-4"},U={__name:"Show",props:{account:Object},setup(m){const e=i({name:m.account.name}),r=()=>{e.post(route("accounts.store"),{onFinish:()=>e.reset()})};return($,c)=>(p(),u(d,{title:"Accounts"},{header:s(()=>[w]),default:s(()=>[t("div",null,[t("div",y,[t("div",null,[a(g,{onSubmitted:r},{title:s(()=>[n(" Account Information ")]),description:s(()=>[n(" Create new account. ")]),form:s(()=>[t("div",A,[a(v,{for:"name",value:"Name"}),a(h,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":c[0]||(c[0]=l=>o(e).name=l),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),a(b,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])])]),actions:s(()=>[a(x,{on:o(e).recentlySuccessful,class:"mr-3"},{default:s(()=>[n(" Saved. ")]),_:1},8,["on"]),a(S,{class:_({"opacity-25":o(e).processing}),disabled:o(e).processing},{default:s(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),_:1}),a(f)])])])]),_:1}))}};export{U as default};