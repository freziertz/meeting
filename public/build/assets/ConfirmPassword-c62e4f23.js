import{T as m,r as d,o as c,d as u,b as o,u as a,w as r,F as p,Z as f,a as e,n as _,f as w,q as b}from"./app-563fdfa6.js";import{A as g}from"./AuthenticationCard-2d9ff365.js";import{_ as h}from"./AuthenticationCardLogo-9d4f98f1.js";import{_ as x,a as v}from"./TextInput-f9b10853.js";import{_ as y}from"./InputLabel-79358de7.js";import{_ as V}from"./PrimaryButton-10522c9f.js";import"./_plugin-vue_export-helper-c27b6911.js";const C=e("div",{class:"mb-4 text-sm text-gray-600"}," This is a secure area of the application. Please confirm your password before continuing. ",-1),$=["onSubmit"],k={class:"flex justify-end mt-4"},j={__name:"ConfirmPassword",setup(A){const s=m({password:""}),t=d(null),n=()=>{s.post(route("password.confirm"),{onFinish:()=>{s.reset(),t.value.focus()}})};return(B,i)=>(c(),u(p,null,[o(a(f),{title:"Secure Area"}),o(g,null,{logo:r(()=>[o(h)]),default:r(()=>[C,e("form",{onSubmit:b(n,["prevent"])},[e("div",null,[o(y,{for:"password",value:"Password"}),o(x,{id:"password",ref_key:"passwordInput",ref:t,modelValue:a(s).password,"onUpdate:modelValue":i[0]||(i[0]=l=>a(s).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password",autofocus:""},null,8,["modelValue"]),o(v,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),e("div",k,[o(V,{class:_(["ml-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:r(()=>[w(" Confirm ")]),_:1},8,["class","disabled"])])],40,$)]),_:1})],64))}};export{j as default};