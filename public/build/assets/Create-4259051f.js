import{T as u,o as _,c as p,w as n,a as o,b as t,f as i,u as s,n as f}from"./app-4e17ed0d.js";import{A as V}from"./AppLayout-c0c952ff.js";import{S as g}from"./SectionBorder-b125e4a7.js";import{_ as v}from"./ActionMessage-1ace2136.js";import{_ as x}from"./FormSection-b30bbe2b.js";import{_ as m,a as d}from"./TextInput-797e3e17.js";import{_ as r}from"./InputLabel-31b28399.js";import{_ as b}from"./PrimaryButton-bcbf0fc5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-ae07b30c.js";import"./SectionTitle-c009be10.js";const y=o("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Announcements ",-1),w={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},k={class:"col-span-6 sm:col-span-4"},S={class:"col-span-6 sm:col-span-4"},A={class:"col-span-4 sm:col-span-3"},U={class:"col-span-2 sm:col-span-2 ml-2"},$={class:"col-span-4 sm:col-span-3"},C={class:"col-span-2 sm:col-span-2 ml-2"},G={__name:"Create",props:{can:Object},setup(q){const e=u({title:"",content:"",start_date:"",end_date:"",start_time:"",end_time:""}),c=()=>{e.post(route("announcements.store"),{onFinish:()=>e.reset()})};return(B,a)=>(_(),p(V,{title:"Announcements"},{header:n(()=>[y]),default:n(()=>[o("div",null,[o("div",w,[o("div",null,[t(x,{onSubmitted:c},{title:n(()=>[i(" Announcement Information ")]),description:n(()=>[i(" Create new announcement. ")]),form:n(()=>[o("div",k,[t(r,{for:"title",value:"Title"}),t(m,{id:"title",modelValue:s(e).title,"onUpdate:modelValue":a[0]||(a[0]=l=>s(e).title=l),type:"text",class:"mt-1 block w-full",autocomplete:"title"},null,8,["modelValue"]),t(d,{message:s(e).errors.title,class:"mt-2"},null,8,["message"])]),o("div",S,[t(r,{for:"content",value:"Content"}),t(m,{id:"content",modelValue:s(e).content,"onUpdate:modelValue":a[1]||(a[1]=l=>s(e).content=l),type:"text",class:"mt-1 block w-full",autocomplete:"content"},null,8,["modelValue"]),t(d,{message:s(e).errors.content,class:"mt-2"},null,8,["message"])]),o("div",A,[t(r,{for:"start_date",value:"Start Date"}),t(m,{id:"start_date",modelValue:s(e).start_date,"onUpdate:modelValue":a[2]||(a[2]=l=>s(e).start_date=l),type:"date",class:"mt-1 block w-full",autocomplete:"start_date",required:""},null,8,["modelValue"]),t(d,{message:s(e).errors.start_date,class:"mt-2"},null,8,["message"])]),o("div",U,[t(r,{for:"start_time",value:"Start time"}),t(m,{id:"start_time",modelValue:s(e).start_time,"onUpdate:modelValue":a[3]||(a[3]=l=>s(e).start_time=l),type:"time",class:"mt-1 block w-full",autocomplete:"start_time",required:""},null,8,["modelValue"]),t(d,{message:s(e).errors.start_time,class:"mt-2"},null,8,["message"])]),o("div",$,[t(r,{for:"end_date",value:"End Date"}),t(m,{id:"end_date",modelValue:s(e).end_date,"onUpdate:modelValue":a[4]||(a[4]=l=>s(e).end_date=l),type:"date",class:"mt-1 block w-full",autocomplete:"end_date",required:""},null,8,["modelValue"]),t(d,{message:s(e).errors.end_date,class:"mt-2"},null,8,["message"])]),o("div",C,[t(r,{for:"end_time",value:"End Time"}),t(m,{id:"end_time",modelValue:s(e).end_time,"onUpdate:modelValue":a[5]||(a[5]=l=>s(e).end_time=l),type:"time",class:"mt-1 block w-full",autocomplete:"end_time",required:""},null,8,["modelValue"]),t(d,{message:s(e).errors.end_time,class:"mt-2"},null,8,["message"])])]),actions:n(()=>[t(v,{on:s(e).recentlySuccessful,class:"mr-3"},{default:n(()=>[i(" Saved. ")]),_:1},8,["on"]),t(b,{class:f({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:n(()=>[i(" Save ")]),_:1},8,["class","disabled"])]),_:1}),t(g)])])])]),_:1}))}};export{G as default};