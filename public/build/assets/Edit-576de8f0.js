import{T as x,o as g,c as b,w as t,a,b as s,f as r,u as o,n}from"./app-1a6861a9.js";import{A as v}from"./AppLayout-01869b9d.js";import{S as y}from"./SectionBorder-7e2ecc25.js";import{_ as V}from"./ActionMessage-859b97af.js";import{_ as h}from"./FormSection-35134dae.js";import{_ as m,a as c}from"./TextInput-ec4c3950.js";import{_ as d}from"./InputLabel-583b110a.js";import{_ as P}from"./PrimaryButton-931cf8df.js";import{_ as S}from"./DangerButton-97770810.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-797ed137.js";import"./SectionTitle-31d51009.js";const $=a("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Purposes ",-1),k={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={class:"col-span-6 sm:col-span-4"},B={class:"col-span-6 sm:col-span-4"},q={__name:"Edit",props:{purpose:Object},setup(u){const i=u,e=x({_method:"PUT",name:i.purpose.name,description:i.purpose.description}),_=()=>{e.post(route("purposes.update",i.purpose.id),{onFinish:()=>e.reset()})},f=()=>{e.delete(route("purposes.destroy",i.purpose.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(N,l)=>(g(),b(v,{title:"Purposes"},{header:t(()=>[$]),default:t(()=>[a("div",null,[a("div",k,[a("div",null,[s(h,{onSubmitted:_},{title:t(()=>[r(" Purpose Information ")]),description:t(()=>[r(" Edit purpose. ")]),form:t(()=>[a("div",w,[s(d,{for:"name",value:"Name"}),s(m,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":l[0]||(l[0]=p=>o(e).name=p),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(c,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])]),a("div",B,[s(d,{for:"description",value:"Description"}),s(m,{id:"description",modelValue:o(e).description,"onUpdate:modelValue":l[1]||(l[1]=p=>o(e).description=p),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(c,{message:o(e).errors.description,class:"mt-2"},null,8,["message"])])]),actions:t(()=>[s(S,{class:n(["mx-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:f},{default:t(()=>[r(" Delete Purpose ")]),_:1},8,["class","disabled"]),s(V,{on:o(e).recentlySuccessful,class:"mr-3"},{default:t(()=>[r(" Saved. ")]),_:1},8,["on"]),s(P,{class:n({"opacity-25":o(e).processing}),disabled:o(e).processing},{default:t(()=>[r(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(y)])])])]),_:1}))}};export{q as default};