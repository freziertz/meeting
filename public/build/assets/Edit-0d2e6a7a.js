import{T as y,o as m,c,w as o,a,b as t,f as r,u as s,n as d,e as u}from"./app-1222412e.js";import{A as v}from"./AppLayout-7633008d.js";import{S as V}from"./SectionBorder-fe2b8d8c.js";import{_ as h}from"./ActionMessage-8ac08335.js";import{_ as k}from"./FormSection-fda20c53.js";import{_ as f,a as _}from"./TextInput-40c6425d.js";import{_ as x}from"./InputLabel-a98e9a31.js";import{_ as P}from"./PrimaryButton-f5d78856.js";import{_ as S}from"./DangerButton-4d8ba728.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-d3dcef73.js";import"./SectionTitle-70a31b56.js";const $=a("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Purposes ",-1),w={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},N={class:"col-span-6 sm:col-span-4"},B={class:"col-span-6 sm:col-span-4"},G={__name:"Edit",props:{purpose:Object,can:Object},setup(n){const i=n,e=y({_method:"PUT",name:i.purpose.name,description:i.purpose.description}),g=()=>{e.post(route("purposes.update",i.purpose.id),{onFinish:()=>e.reset()})},b=()=>{e.delete(route("purposes.destroy",i.purpose.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(C,l)=>(m(),c(v,{title:"Purposes"},{header:o(()=>[$]),default:o(()=>[a("div",null,[a("div",w,[a("div",null,[t(k,{onSubmitted:g},{title:o(()=>[r(" Purpose Information ")]),description:o(()=>[r(" Edit purpose. ")]),form:o(()=>[a("div",N,[t(x,{for:"name",value:"Name"}),t(f,{id:"name",modelValue:s(e).name,"onUpdate:modelValue":l[0]||(l[0]=p=>s(e).name=p),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(_,{message:s(e).errors.name,class:"mt-2"},null,8,["message"])]),a("div",B,[t(x,{for:"description",value:"Description"}),t(f,{id:"description",modelValue:s(e).description,"onUpdate:modelValue":l[1]||(l[1]=p=>s(e).description=p),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),t(_,{message:s(e).errors.description,class:"mt-2"},null,8,["message"])])]),actions:o(()=>[n.can.delete?(m(),c(S,{key:0,class:d(["mx-3",{"opacity-25":s(e).processing}]),disabled:s(e).processing,onClick:b},{default:o(()=>[r(" Delete Purpose ")]),_:1},8,["class","disabled"])):u("",!0),t(h,{on:s(e).recentlySuccessful,class:"mr-3"},{default:o(()=>[r(" Saved. ")]),_:1},8,["on"]),n.can.edit?(m(),c(P,{key:1,class:d({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:o(()=>[r(" Save ")]),_:1},8,["class","disabled"])):u("",!0)]),_:1}),t(V)])])])]),_:1}))}};export{G as default};