import{T as d,o as u,c as _,w as a,a as t,b as s,f as l,u as o,n as f}from"./app-1222412e.js";import{A as x}from"./AppLayout-7633008d.js";import{S as g}from"./SectionBorder-fe2b8d8c.js";import{_ as v}from"./ActionMessage-8ac08335.js";import{_ as V}from"./FormSection-fda20c53.js";import{_ as n,a as m}from"./TextInput-40c6425d.js";import{_ as c}from"./InputLabel-a98e9a31.js";import{_ as b}from"./PrimaryButton-f5d78856.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-d3dcef73.js";import"./SectionTitle-70a31b56.js";const y=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Groups ",-1),h={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={class:"col-span-6 sm:col-span-4"},S={class:"col-span-6 sm:col-span-4"},L={__name:"Create",props:{},setup($){const e=d({name:"",description:""}),p=()=>{e.post(route("groups.store"),{onFinish:()=>e.reset()})};return(k,r)=>(u(),_(x,{title:"Groups"},{header:a(()=>[y]),default:a(()=>[t("div",null,[t("div",h,[t("div",null,[s(V,{onSubmitted:p},{title:a(()=>[l(" Group Information ")]),description:a(()=>[l(" Create new group. ")]),form:a(()=>[t("div",w,[s(c,{for:"name",value:"Name"}),s(n,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=i=>o(e).name=i),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(m,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])]),t("div",S,[s(c,{for:"description",value:"Description"}),s(n,{id:"description",modelValue:o(e).description,"onUpdate:modelValue":r[1]||(r[1]=i=>o(e).description=i),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(m,{message:o(e).errors.description,class:"mt-2"},null,8,["message"])])]),actions:a(()=>[s(v,{on:o(e).recentlySuccessful,class:"mr-3"},{default:a(()=>[l(" Saved. ")]),_:1},8,["on"]),s(b,{class:f({"opacity-25":o(e).processing}),disabled:o(e).processing},{default:a(()=>[l(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(g)])])])]),_:1}))}};export{L as default};