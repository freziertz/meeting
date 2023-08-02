import{r as m,T as _,o as w,c as y,w as s,f as e,a as c,b as r,u as t,x as h,n as g}from"./app-1a6861a9.js";import{_ as v}from"./ActionMessage-859b97af.js";import{_ as b}from"./ActionSection-9b543b70.js";import{_ as x}from"./DialogModal-2bc42cf6.js";import{_ as S,a as B}from"./TextInput-ec4c3950.js";import{_ as d}from"./PrimaryButton-931cf8df.js";import{_ as k}from"./SecondaryButton-2ac95559.js";import"./SectionTitle-31d51009.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./Modal-3fa09e32.js";const O=c("div",{class:"max-w-xl text-sm text-gray-600"}," If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password. ",-1),C={class:"flex items-center mt-5"},$={class:"mt-4"},E={__name:"LogoutOtherBrowserSessionsForm",props:{sessions:Array},setup(L){const a=m(!1),n=m(null),o=_({password:""}),f=()=>{a.value=!0,setTimeout(()=>n.value.focus(),250)},i=()=>{o.delete(route("other-browser-sessions.destroy"),{preserveScroll:!0,onSuccess:()=>l(),onError:()=>n.value.focus(),onFinish:()=>o.reset()})},l=()=>{a.value=!1,o.reset()};return(V,u)=>(w(),y(b,null,{title:s(()=>[e(" Browser Sessions ")]),description:s(()=>[e(" Manage and log out your active sessions on other browsers and devices. ")]),content:s(()=>[O,c("div",C,[r(d,{onClick:f},{default:s(()=>[e(" Log Out Other Browser Sessions ")]),_:1}),r(v,{on:t(o).recentlySuccessful,class:"ml-3"},{default:s(()=>[e(" Done. ")]),_:1},8,["on"])]),r(x,{show:a.value,onClose:l},{title:s(()=>[e(" Log Out Other Browser Sessions ")]),content:s(()=>[e(" Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices. "),c("div",$,[r(S,{ref_key:"passwordInput",ref:n,modelValue:t(o).password,"onUpdate:modelValue":u[0]||(u[0]=p=>t(o).password=p),type:"password",class:"mt-1 block w-3/4",placeholder:"Password",autocomplete:"current-password",onKeyup:h(i,["enter"])},null,8,["modelValue","onKeyup"]),r(B,{message:t(o).errors.password,class:"mt-2"},null,8,["message"])])]),footer:s(()=>[r(k,{onClick:l},{default:s(()=>[e(" Cancel ")]),_:1}),r(d,{class:g(["ml-3",{"opacity-25":t(o).processing}]),disabled:t(o).processing,onClick:i},{default:s(()=>[e(" Log Out Other Browser Sessions ")]),_:1},8,["class","disabled"])]),_:1},8,["show"])]),_:1}))}};export{E as default};