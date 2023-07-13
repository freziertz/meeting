import{T as d,o as u,c as _,w as o,a,b as s,f as n,u as t,n as f}from"./app-563fdfa6.js";import{A as g}from"./AppLayout-c5d5f249.js";import{S as x}from"./SectionBorder-7a24db5d.js";import{_ as y}from"./ActionMessage-b6f86a06.js";import{_ as v}from"./FormSection-14d1748b.js";import{_ as r,a as m}from"./TextInput-f9b10853.js";import{_ as c}from"./InputLabel-79358de7.js";import{_ as V}from"./PrimaryButton-10522c9f.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-ec48be57.js";import"./SectionTitle-3582e00a.js";const b=a("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Meeting Types ",-1),h={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={class:"col-span-6 sm:col-span-4"},S={class:"col-span-6 sm:col-span-4"},L={__name:"Create",props:{},setup(T){const e=d({name:"",description:""}),p=()=>{e.post(route("meeting-types.store"),{onFinish:()=>e.reset()})};return($,i)=>(u(),_(g,{title:"MeetingTypes"},{header:o(()=>[b]),default:o(()=>[a("div",null,[a("div",h,[a("div",null,[s(v,{onSubmitted:p},{title:o(()=>[n(" Meeting Type Information ")]),description:o(()=>[n(" Create new meeting type. ")]),form:o(()=>[a("div",w,[s(c,{for:"name",value:"Name"}),s(r,{id:"name",modelValue:t(e).name,"onUpdate:modelValue":i[0]||(i[0]=l=>t(e).name=l),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(m,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),a("div",S,[s(c,{for:"description",value:"Description"}),s(r,{id:"description",modelValue:t(e).description,"onUpdate:modelValue":i[1]||(i[1]=l=>t(e).description=l),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(m,{message:t(e).errors.description,class:"mt-2"},null,8,["message"])])]),actions:o(()=>[s(y,{on:t(e).recentlySuccessful,class:"mr-3"},{default:o(()=>[n(" Saved. ")]),_:1},8,["on"]),s(V,{class:f({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:o(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(x)])])])]),_:1}))}};export{L as default};