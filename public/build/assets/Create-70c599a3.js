import{T as g,o as u,c as V,w as r,a as t,b as s,f as d,u as a,d as c,g as w,t as v,F as y,n as x}from"./app-425b229f.js";import{A as k}from"./AppLayout-6319fc3e.js";import{S as b}from"./SectionBorder-4b0b7e53.js";import{_ as U}from"./ActionMessage-f19acd45.js";import{_ as z}from"./FormSection-6fb30114.js";import{_ as m,a as n}from"./TextInput-6dd65b2a.js";import{_ as i}from"./InputLabel-6b65ea45.js";import{_ as q}from"./PrimaryButton-c602c2c2.js";import{_ as N}from"./Checkbox-25b62c83.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-1ed08302.js";import"./SectionTitle-54d82c40.js";const S=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Users ",-1),B={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},$={class:"col-span-6 sm:col-span-4"},A={class:"col-span-6 sm:col-span-4"},F={class:"col-span-6 sm:col-span-4"},C={class:"col-span-6 sm:col-span-4"},I={class:"col-span-6 sm:col-span-4"},L={class:"col-span-6 sm:col-span-4"},P={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},h={class:"col-span-6 sm:col-span-4"},D={class:"col-span-6 sm:col-span-4"},E={class:"col-span-6 sm:col-span-4"},M={class:"col-span-6 sm:col-span-4"},Y={class:"col-span-6 sm:col-span-4"},j={class:"col-span-6 sm:col-span-4"},G={class:"flex items-center"},H={class:"ml-2 text-sm text-gray-600"},te={__name:"Create",props:{roles:Array,accounts:Array,organizations:Array},setup(p){const e=g({name:"yahaya",email:"freziern@gmail.com",password:"12345678",password_confirmation:"12345678",terms:!1,title:"Mr",first_name:"Yahaya",middle_name:"",last_name:"Frezier",initials:"FBN",designation:"Business development manager",organization_id:"1",storage_limit:"200",pa_email:"zera.msanya@datahousetza.com",send_welcome_email:!1,send_start_guide:!1,roleIds:[]}),_=()=>{e.post(route("users.store"),{onFinish:()=>e.reset()})};return(J,o)=>(u(),V(k,{title:"Users"},{header:r(()=>[S]),default:r(()=>[t("div",null,[t("div",B,[t("div",null,[s(z,{onSubmitted:_},{title:r(()=>[d(" User Information ")]),description:r(()=>[d(" Create new user. ")]),form:r(()=>[t("div",$,[s(i,{for:"name",value:"Name"}),s(m,{id:"name",modelValue:a(e).name,"onUpdate:modelValue":o[0]||(o[0]=l=>a(e).name=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.name},null,8,["message"])]),t("div",A,[s(i,{for:"email",value:"Email"}),s(m,{id:"email",modelValue:a(e).email,"onUpdate:modelValue":o[1]||(o[1]=l=>a(e).email=l),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.email},null,8,["message"])]),t("div",F,[s(i,{for:"password",value:"Password"}),s(m,{id:"password",modelValue:a(e).password,"onUpdate:modelValue":o[2]||(o[2]=l=>a(e).password=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.password},null,8,["message"])]),t("div",C,[s(i,{for:"password_confirmation",value:"Confirm Password"}),s(m,{id:"password_confirmation",modelValue:a(e).password_confirmation,"onUpdate:modelValue":o[3]||(o[3]=l=>a(e).password_confirmation=l),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.password_confirmation},null,8,["message"])]),t("div",I,[s(i,{for:"title",value:"Title"}),s(m,{id:"title",modelValue:a(e).title,"onUpdate:modelValue":o[4]||(o[4]=l=>a(e).title=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"title"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.title},null,8,["message"])]),t("div",L,[s(i,{for:"first_name",value:"First Name"}),s(m,{id:"first_name",modelValue:a(e).first_name,"onUpdate:modelValue":o[5]||(o[5]=l=>a(e).first_name=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"first_name"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.first_name},null,8,["message"])]),t("div",P,[s(i,{for:"middle_name",value:"Middle Name"}),s(m,{id:"middle_name",modelValue:a(e).middle_name,"onUpdate:modelValue":o[6]||(o[6]=l=>a(e).middle_name=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"middle_name"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.middle_name},null,8,["message"])]),t("div",T,[s(i,{for:"last_name",value:"Last name"}),s(m,{id:"last_name",modelValue:a(e).last_name,"onUpdate:modelValue":o[7]||(o[7]=l=>a(e).last_name=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"last_name"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.last_name},null,8,["message"])]),t("div",h,[s(i,{for:"initials",value:"Initials"}),s(m,{id:"initialsinitials",modelValue:a(e).initials,"onUpdate:modelValue":o[8]||(o[8]=l=>a(e).initials=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"initials"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.initials},null,8,["message"])]),t("div",D,[s(i,{for:"designation",value:"Designation"}),s(m,{id:"designation",modelValue:a(e).designation,"onUpdate:modelValue":o[9]||(o[9]=l=>a(e).designation=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"designation"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.designation},null,8,["message"])]),t("div",E,[s(i,{for:"organization_id",value:"organization_id"}),s(m,{id:"organization_id",modelValue:a(e).organization_id,"onUpdate:modelValue":o[10]||(o[10]=l=>a(e).organization_id=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"organization_id"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.organization_id},null,8,["message"])]),t("div",M,[s(i,{for:"storage_limit",value:"Storage limit"}),s(m,{id:"storage_limit",modelValue:a(e).storage_limit,"onUpdate:modelValue":o[11]||(o[11]=l=>a(e).storage_limit=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"storage_limit"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.storage_limit},null,8,["message"])]),t("div",Y,[s(i,{for:"pa_email",value:"PA email"}),s(m,{id:"pa_email",modelValue:a(e).pa_email,"onUpdate:modelValue":o[12]||(o[12]=l=>a(e).pa_email=l),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"pa_email"},null,8,["modelValue"]),s(n,{class:"mt-2",message:a(e).errors.pa_email},null,8,["message"])]),t("div",j,[s(i,{for:"name",value:"Name"}),(u(!0),c(y,null,w(p.roles,l=>(u(),c("div",{key:l.id,class:"col-span-6 sm:col-span-4"},[t("label",G,[s(N,{checked:a(e).roleIds,"onUpdate:checked":o[13]||(o[13]=f=>a(e).roleIds=f),id:l.id,value:l.id},null,8,["checked","id","value"]),t("span",H,v(l.name),1)])]))),128))])]),actions:r(()=>[s(U,{on:a(e).recentlySuccessful,class:"mr-3"},{default:r(()=>[d(" Saved. ")]),_:1},8,["on"]),s(q,{class:x({"opacity-25":a(e).processing}),disabled:a(e).processing},{default:r(()=>[d(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(b)])])])]),_:1}))}};export{te as default};
