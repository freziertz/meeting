import{T as w,o as i,d,b as o,u as s,w as m,F as b,Z as h,t as x,e as u,a as t,c as k,f as c,p as y,n as V,q as v}from"./app-c913df9e.js";import{A as $}from"./AuthenticationCard-b516b9dc.js";import{_ as B}from"./AuthenticationCardLogo-60c17eb8.js";import{_ as q}from"./Checkbox-80a5e118.js";import{_ as f,a as p}from"./TextInput-675b7235.js";import{_}from"./InputLabel-5883ba50.js";import{_ as C}from"./PrimaryButton-69a44eab.js";import"./_plugin-vue_export-helper-c27b6911.js";const F={key:0,class:"mb-4 font-medium text-sm text-green-600"},N=["onSubmit"],S={class:"mt-4"},L={class:"block mt-4"},P={class:"flex items-center"},R=t("span",{class:"ml-2 text-sm text-gray-600"},"Remember me",-1),U={class:"flex items-center justify-end mt-4"},G={__name:"Login",props:{canResetPassword:Boolean,status:String},setup(l){const e=w({email:"",password:"",remember:!1}),g=()=>{e.transform(n=>({...n,remember:e.remember?"on":""})).post(route("login"),{onFinish:()=>e.reset("password")})};return(n,a)=>(i(),d(b,null,[o(s(h),{title:"Log in"}),o($,null,{logo:m(()=>[o(B)]),default:m(()=>[l.status?(i(),d("div",F,x(l.status),1)):u("",!0),t("form",{onSubmit:v(g,["prevent"])},[t("div",null,[o(_,{for:"email",value:"Email"}),o(f,{id:"email",modelValue:s(e).email,"onUpdate:modelValue":a[0]||(a[0]=r=>s(e).email=r),type:"email",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),o(p,{class:"mt-2",message:s(e).errors.email},null,8,["message"])]),t("div",S,[o(_,{for:"password",value:"Password"}),o(f,{id:"password",modelValue:s(e).password,"onUpdate:modelValue":a[1]||(a[1]=r=>s(e).password=r),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"current-password"},null,8,["modelValue"]),o(p,{class:"mt-2",message:s(e).errors.password},null,8,["message"])]),t("div",L,[t("label",P,[o(q,{checked:s(e).remember,"onUpdate:checked":a[2]||(a[2]=r=>s(e).remember=r),name:"remember"},null,8,["checked"]),R])]),t("div",U,[l.canResetPassword?(i(),k(s(y),{key:0,href:n.route("password.request"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:m(()=>[c(" Forgot your password? ")]),_:1},8,["href"])):u("",!0),o(C,{class:V(["ml-4",{"opacity-25":s(e).processing}]),disabled:s(e).processing},{default:m(()=>[c(" Log in ")]),_:1},8,["class","disabled"])])],40,N)]),_:1})],64))}};export{G as default};