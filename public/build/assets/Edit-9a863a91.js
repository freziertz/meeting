import{T as p,o as _,c as f,w as s,a as c,b as t,f as a,u as o,n as i}from"./app-1a6861a9.js";import{A as x}from"./AppLayout-01869b9d.js";import{S as g}from"./SectionBorder-7e2ecc25.js";import{_ as b}from"./ActionMessage-859b97af.js";import{_ as h}from"./FormSection-35134dae.js";import{_ as v,a as y}from"./TextInput-ec4c3950.js";import{_ as A}from"./InputLabel-583b110a.js";import{_ as S}from"./PrimaryButton-931cf8df.js";import{_ as $}from"./DangerButton-97770810.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-797ed137.js";import"./SectionTitle-31d51009.js";const V=c("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Accounts ",-1),k={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},w={class:"col-span-6 sm:col-span-4"},P={__name:"Edit",props:{account:Object},setup(m){const n=m,e=p({_method:"PUT",name:n.account.name}),l=()=>{e.post(route("accounts.update",n.account.id),{onFinish:()=>e.reset()})},d=()=>{e.delete(route("accounts.destroy",n.account.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(B,r)=>(_(),f(x,{title:"Accounts"},{header:s(()=>[V]),default:s(()=>[c("div",null,[c("div",k,[c("div",null,[t(h,{onSubmitted:l},{title:s(()=>[a(" Account Information ")]),description:s(()=>[a(" Edit account. ")]),form:s(()=>[c("div",w,[t(A,{for:"name",value:"Name"}),t(v,{id:"name",modelValue:o(e).name,"onUpdate:modelValue":r[0]||(r[0]=u=>o(e).name=u),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),t(y,{message:o(e).errors.name,class:"mt-2"},null,8,["message"])])]),actions:s(()=>[t($,{class:i(["mx-3",{"opacity-25":o(e).processing}]),disabled:o(e).processing,onClick:d},{default:s(()=>[a(" Delete Account ")]),_:1},8,["class","disabled"]),t(b,{on:o(e).recentlySuccessful,class:"mr-3"},{default:s(()=>[a(" Saved. ")]),_:1},8,["on"]),t(S,{class:i({"opacity-25":o(e).processing}),disabled:o(e).processing},{default:s(()=>[a(" Save ")]),_:1},8,["class","disabled"])]),_:1}),t(g)])])])]),_:1}))}};export{P as default};