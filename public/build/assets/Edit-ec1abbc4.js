import{T as g,o as x,c as b,w as t,a,b as s,f as r,u as o,n as m}from"./app-1a6861a9.js";import{A as v}from"./AppLayout-01869b9d.js";import{S as y}from"./SectionBorder-7e2ecc25.js";import{_ as V}from"./ActionMessage-859b97af.js";import{_ as h}from"./FormSection-35134dae.js";import{_ as p,a as c}from"./TextInput-ec4c3950.js";import{_ as d}from"./InputLabel-583b110a.js";import{_ as S}from"./PrimaryButton-931cf8df.js";import{_ as $}from"./DangerButton-97770810.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-797ed137.js";import"./SectionTitle-31d51009.js";const G=a("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Groups ",-1),k={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={class:"col-span-6 sm:col-span-4"},B={class:"col-span-6 sm:col-span-4"},P={__name:"Edit",props:{group:Object},setup(u){const i=u,e=g({_method:"PUT",name:i.group.name,description:i.group.description}),_=()=>{e.post(route("groups.update",i.group.id),{onFinish:()=>e.reset()})},f=()=>{e.delete(route("groups.destroy",i.group.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(N,l)=>(x(),b(v,{title:"Groups"},{header:t(()=>[G]),default:t(()=>[a("div",null,[a("div",k,[a("div",null,[s(h,{onSubmitted:_},{title:t(()=>[r(" Group Information ")]),description:t(()=>[r(" Edit group. ")]),form:t(()=>[a("div",w,[s(d,{for:"name",value:"Name"}),s(p,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":l[0]||(l[0]=n=>o(e).name=n),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(c,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])]),a("div",B,[s(d,{for:"description",value:"Description"}),s(p,{id:"description",modelValue:o(e).description,"onUpdate:modelValue":l[1]||(l[1]=n=>o(e).description=n),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(c,{message:o(e).errors.description,class:"mt-2"},null,8,["message"])])]),actions:t(()=>[s($,{class:m(["mx-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:f},{default:t(()=>[r(" Delete Group ")]),_:1},8,["class","disabled"]),s(V,{on:o(e).recentlySuccessful,class:"mr-3"},{default:t(()=>[r(" Saved. ")]),_:1},8,["on"]),s(S,{class:m({"opacity-25":o(e).processing}),disabled:o(e).processing},{default:t(()=>[r(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(y)])])])]),_:1}))}};export{P as default};