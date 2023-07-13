import{T as g,o as v,c as y,w as a,a as o,b as s,f as l,u as t,n as m}from"./app-563fdfa6.js";import{A as x}from"./AppLayout-c5d5f249.js";import{S as k}from"./SectionBorder-7a24db5d.js";import{_ as S}from"./ActionMessage-b6f86a06.js";import{_ as b}from"./FormSection-14d1748b.js";import{_ as c,a as d}from"./TextInput-f9b10853.js";import{_ as u}from"./InputLabel-79358de7.js";import{_ as V}from"./PrimaryButton-10522c9f.js";import{_ as h}from"./DangerButton-197fc5f1.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-ec48be57.js";import"./SectionTitle-3582e00a.js";const $=o("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Settings ",-1),w={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},B={class:"col-span-6 sm:col-span-4"},C={class:"col-span-6 sm:col-span-4"},P={__name:"Edit",props:{setting:Object},setup(p){const i=p,e=g({_method:"PUT",key:i.setting.key,value:i.setting.value}),_=()=>{e.post(route("settings.update",i.setting.id),{onFinish:()=>e.reset()})},f=()=>{e.delete(route("settings.destroy",i.setting.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(N,n)=>(v(),y(x,{title:"Settings"},{header:a(()=>[$]),default:a(()=>[o("div",null,[o("div",w,[o("div",null,[s(b,{onSubmitted:_},{title:a(()=>[l(" Setting Information ")]),description:a(()=>[l(" Edit setting. ")]),form:a(()=>[o("div",B,[s(u,{for:"key",value:"Key"}),s(c,{id:"key",modelValue:t(e).key,"onUpdate:modelValue":n[0]||(n[0]=r=>t(e).key=r),type:"text",class:"mt-1 block w-full",autocomplete:"key"},null,8,["modelValue"]),s(d,{message:t(e).errors.key,class:"mt-2"},null,8,["message"])]),o("div",C,[s(u,{for:"value",value:"Value"}),s(c,{id:"value",modelValue:t(e).value,"onUpdate:modelValue":n[1]||(n[1]=r=>t(e).value=r),type:"text",class:"mt-1 block w-full",autocomplete:"value"},null,8,["modelValue"]),s(d,{message:t(e).errors.value,class:"mt-2"},null,8,["message"])])]),actions:a(()=>[s(h,{class:m(["mx-3",{"opacity-25":t(e).processing}]),disabled:t(e).processing,onClick:f},{default:a(()=>[l(" Delete Setting ")]),_:1},8,["class","disabled"]),s(S,{on:t(e).recentlySuccessful,class:"mr-3"},{default:a(()=>[l(" Saved. ")]),_:1},8,["on"]),s(V,{class:m({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:a(()=>[l(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(k)])])])]),_:1}))}};export{P as default};