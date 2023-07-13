import{T as d,o as u,c as _,w as t,a,b as s,f as i,u as o,n as f}from"./app-45f22811.js";import{A as g}from"./AppLayout-e9cc592b.js";import{S as x}from"./SectionBorder-10f8ad92.js";import{_ as v}from"./ActionMessage-ca1d5bf9.js";import{_ as V}from"./FormSection-e5c02742.js";import{_ as r,a as m}from"./TextInput-5a1586da.js";import{_ as c}from"./InputLabel-eeed490a.js";import{_ as b}from"./PrimaryButton-9b759944.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-f33b499d.js";import"./SectionTitle-e3bea2c5.js";const y=a("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Meeting Roles ",-1),h={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={class:"col-span-6 sm:col-span-4"},S={class:"col-span-6 sm:col-span-4"},I={__name:"Create",props:{},setup($){const e=d({name:"",description:""}),p=()=>{e.post(route("meeting-roles.store"),{onFinish:()=>e.reset()})};return(k,l)=>(u(),_(g,{title:"MeetingRoles"},{header:t(()=>[y]),default:t(()=>[a("div",null,[a("div",h,[a("div",null,[s(V,{onSubmitted:p},{title:t(()=>[i(" Meeting Role Information ")]),description:t(()=>[i(" Create new meeting role. ")]),form:t(()=>[a("div",w,[s(c,{for:"name",value:"Name"}),s(r,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":l[0]||(l[0]=n=>o(e).name=n),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),s(m,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])]),a("div",S,[s(c,{for:"description",value:"Description"}),s(r,{id:"description",modelValue:o(e).description,"onUpdate:modelValue":l[1]||(l[1]=n=>o(e).description=n),type:"text",class:"mt-1 block w-full",autocomplete:"description"},null,8,["modelValue"]),s(m,{message:o(e).errors.description,class:"mt-2"},null,8,["message"])])]),actions:t(()=>[s(v,{on:o(e).recentlySuccessful,class:"mr-3"},{default:t(()=>[i(" Saved. ")]),_:1},8,["on"]),s(b,{class:f({"opacity-25":o(e).processing}),disabled:o(e).processing},{default:t(()=>[i(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(x)])])])]),_:1}))}};export{I as default};