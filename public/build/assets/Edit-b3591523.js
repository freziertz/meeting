import{T as V,o as g,c as v,w as l,a as o,b as t,f as c,u as s,n as u}from"./app-d9c4159a.js";import{A as x}from"./AppLayout-9e736171.js";import{S as b}from"./SectionBorder-d7637a53.js";import{_ as y}from"./ActionMessage-9ad3bd52.js";import{_ as k}from"./FormSection-e5b835c2.js";import{_ as d,a as i}from"./TextInput-1b111c55.js";import{_ as r}from"./InputLabel-769a9a7d.js";import{_ as w}from"./PrimaryButton-f81ce78e.js";import{_ as S}from"./DangerButton-de20422a.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-27278584.js";import"./SectionTitle-1831935a.js";const A=o("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Announcements ",-1),U={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},$={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},h={class:"col-span-4 sm:col-span-3"},q={class:"col-span-4 sm:col-span-2 ml-2"},B={class:"col-span-5 sm:col-span-3"},C={class:"col-span-2 sm:col-span-2 ml-2"},K={__name:"Edit",props:{announcement:Object},setup(_){const m=_,e=V({_method:"PUT",title:m.announcement.title,content:m.announcement.content,start_date:m.announcement.start_date,end_date:m.announcement.end_date,start_time:m.announcement.start_time,end_time:m.announcement.end_time}),p=()=>{e.post(route("announcements.update",m.announcement.id),{onFinish:()=>e.reset()})},f=()=>{e.delete(route("announcements.destroy",m.announcement.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(E,n)=>(g(),v(x,{title:"Announcements"},{header:l(()=>[A]),default:l(()=>[o("div",null,[o("div",U,[o("div",null,[t(k,{onSubmitted:p},{title:l(()=>[c(" Announcement Information ")]),description:l(()=>[c(" Edit announcement. ")]),form:l(()=>[o("div",$,[t(r,{for:"title",value:"Title"}),t(d,{id:"title",modelValue:s(e).title,"onUpdate:modelValue":n[0]||(n[0]=a=>s(e).title=a),type:"text",class:"mt-1 block w-full",autocomplete:"title"},null,8,["modelValue"]),t(i,{message:s(e).errors.title,class:"mt-2"},null,8,["message"])]),o("div",T,[t(r,{for:"content",value:"Content"}),t(d,{id:"content",modelValue:s(e).content,"onUpdate:modelValue":n[1]||(n[1]=a=>s(e).content=a),type:"text",class:"mt-1 block w-full",autocomplete:"content"},null,8,["modelValue"]),t(i,{message:s(e).errors.content,class:"mt-2"},null,8,["message"])]),o("div",h,[t(r,{for:"start_date",value:"Start Date"}),t(d,{id:"start_date",modelValue:s(e).start_date,"onUpdate:modelValue":n[2]||(n[2]=a=>s(e).start_date=a),type:"date",class:"mt-1 block w-full",autocomplete:"start_date",required:""},null,8,["modelValue"]),t(i,{message:s(e).errors.start_date,class:"mt-2"},null,8,["message"])]),o("div",q,[t(r,{for:"start_time",value:"Start time"}),t(d,{id:"start_time",modelValue:s(e).start_time,"onUpdate:modelValue":n[3]||(n[3]=a=>s(e).start_time=a),type:"time",class:"mt-1 block w-full",autocomplete:"start_time",required:""},null,8,["modelValue"]),t(i,{message:s(e).errors.start_time,class:"mt-2"},null,8,["message"])]),o("div",B,[t(r,{for:"end_date",value:"End Date"}),t(d,{id:"end_date",modelValue:s(e).end_date,"onUpdate:modelValue":n[4]||(n[4]=a=>s(e).end_date=a),type:"date",class:"mt-1 block w-full",autocomplete:"end_date",required:""},null,8,["modelValue"]),t(i,{message:s(e).errors.end_date,class:"mt-2"},null,8,["message"])]),o("div",C,[t(r,{for:"end_time",value:"End Time"}),t(d,{id:"end_time",modelValue:s(e).end_time,"onUpdate:modelValue":n[5]||(n[5]=a=>s(e).end_time=a),type:"time",class:"mt-1 block w-full",autocomplete:"end_time",required:""},null,8,["modelValue"]),t(i,{message:s(e).errors.end_time,class:"mt-2"},null,8,["message"])])]),actions:l(()=>[t(S,{class:u(["mx-3",{"opacity-25":s(e).processing}]),disabled:s(e).processing,onClick:f},{default:l(()=>[c(" Delete Announcement ")]),_:1},8,["class","disabled"]),t(y,{on:s(e).recentlySuccessful,class:"mr-3"},{default:l(()=>[c(" Saved. ")]),_:1},8,["on"]),t(w,{class:u({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:l(()=>[c(" Save ")]),_:1},8,["class","disabled"])]),_:1}),t(b)])])])]),_:1}))}};export{K as default};
