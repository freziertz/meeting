import{T as w,o as c,c as x,w as d,a as t,b as s,f as u,u as l,d as _,g as y,t as b,F as k,n as f}from"./app-425b229f.js";import{A as U}from"./AppLayout-6319fc3e.js";import{S as q}from"./SectionBorder-4b0b7e53.js";import{_ as z}from"./ActionMessage-f19acd45.js";import{_ as S}from"./FormSection-6fb30114.js";import{_ as n,a as r}from"./TextInput-6dd65b2a.js";import{_ as m}from"./InputLabel-6b65ea45.js";import{_ as $}from"./PrimaryButton-c602c2c2.js";import{_ as N}from"./Checkbox-25b62c83.js";import{_ as A}from"./DangerButton-08d7250c.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-1ed08302.js";import"./SectionTitle-54d82c40.js";const B=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Users ",-1),F={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},I={class:"col-span-6 sm:col-span-4"},C={class:"col-span-6 sm:col-span-4"},E={class:"col-span-6 sm:col-span-4"},P={class:"col-span-6 sm:col-span-4"},T={class:"col-span-6 sm:col-span-4"},j={class:"col-span-6 sm:col-span-4"},D={class:"col-span-6 sm:col-span-4"},L={class:"col-span-6 sm:col-span-4"},O={class:"col-span-6 sm:col-span-4"},R={class:"col-span-6 sm:col-span-4"},h={class:"col-span-6 sm:col-span-4"},M={class:"col-span-6 sm:col-span-4"},G={class:"col-span-6 sm:col-span-4"},H={class:"col-span-6 sm:col-span-4"},J={class:"flex items-center"},K={class:"ml-2 text-sm text-gray-600"},re={__name:"Edit",props:{user:Object,roles:Array,userRoles:Object,accounts:Array},setup(p){const i=p,e=w({_method:"PUT",name:i.user.name,email:i.user.email,terms:i.user.terms,title:i.user.title,first_name:i.user.first_name,middle_name:i.user.middle_name,last_name:i.user.last_name,initials:i.user.initials,designation:i.user.designation,organization_id:i.user.organization_id,storage_limit:i.user.storage_limit,pa_email:i.user.pa_email,send_welcome_email:i.user.send_welcome_email,send_start_guide:i.user.send_start_guide,roleIds:Object.values(i.userRoles)}),g=()=>{e.post(route("users.update",i.user.id),{onFinish:()=>e.reset()})},V=()=>{e.delete(route("users.destroy",i.user.id),{preserveScroll:!0,onFinish:()=>e.reset()})};return(Q,o)=>(c(),x(U,{title:"Users"},{header:d(()=>[B]),default:d(()=>[t("div",null,[t("div",F,[t("div",null,[s(S,{onSubmitted:g},{title:d(()=>[u(" User Information ")]),description:d(()=>[u(" Edit user. ")]),form:d(()=>[t("div",I,[s(m,{for:"name",value:"Name"}),s(n,{id:"name",modelValue:l(e).name,"onUpdate:modelValue":o[0]||(o[0]=a=>l(e).name=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.name},null,8,["message"])]),t("div",C,[s(m,{for:"email",value:"Email"}),s(n,{id:"email",modelValue:l(e).email,"onUpdate:modelValue":o[1]||(o[1]=a=>l(e).email=a),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.email},null,8,["message"])]),t("div",E,[s(m,{for:"password",value:"Password"}),s(n,{id:"password",modelValue:l(e).password,"onUpdate:modelValue":o[2]||(o[2]=a=>l(e).password=a),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.password},null,8,["message"])]),t("div",P,[s(m,{for:"password_confirmation",value:"Confirm Password"}),s(n,{id:"password_confirmation",modelValue:l(e).password_confirmation,"onUpdate:modelValue":o[3]||(o[3]=a=>l(e).password_confirmation=a),type:"password",class:"mt-1 block w-full",autocomplete:"new-password"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.password_confirmation},null,8,["message"])]),t("div",T,[s(m,{for:"title",value:"Title"}),s(n,{id:"title",modelValue:l(e).title,"onUpdate:modelValue":o[4]||(o[4]=a=>l(e).title=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"title"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.title},null,8,["message"])]),t("div",j,[s(m,{for:"first_name",value:"First Name"}),s(n,{id:"first_name",modelValue:l(e).first_name,"onUpdate:modelValue":o[5]||(o[5]=a=>l(e).first_name=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"first_name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.first_name},null,8,["message"])]),t("div",D,[s(m,{for:"middle_name",value:"Middle Name"}),s(n,{id:"middle_name",modelValue:l(e).middle_name,"onUpdate:modelValue":o[6]||(o[6]=a=>l(e).middle_name=a),type:"text",class:"mt-1 block w-full",autofocus:"",autocomplete:"middle_name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.middle_name},null,8,["message"])]),t("div",L,[s(m,{for:"last_name",value:"Last name"}),s(n,{id:"last_name",modelValue:l(e).last_name,"onUpdate:modelValue":o[7]||(o[7]=a=>l(e).last_name=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"last_name"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.last_name},null,8,["message"])]),t("div",O,[s(m,{for:"initials",value:"Initials"}),s(n,{id:"initialsinitials",modelValue:l(e).initials,"onUpdate:modelValue":o[8]||(o[8]=a=>l(e).initials=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"initials"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.initials},null,8,["message"])]),t("div",R,[s(m,{for:"designation",value:"Designation"}),s(n,{id:"designation",modelValue:l(e).designation,"onUpdate:modelValue":o[9]||(o[9]=a=>l(e).designation=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"designation"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.designation},null,8,["message"])]),t("div",h,[s(m,{for:"organization_id",value:"organization_id"}),s(n,{id:"organization_id",modelValue:l(e).organization_id,"onUpdate:modelValue":o[10]||(o[10]=a=>l(e).organization_id=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"organization_id"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.organization_id},null,8,["message"])]),t("div",M,[s(m,{for:"storage_limit",value:"Storage limit"}),s(n,{id:"storage_limit",modelValue:l(e).storage_limit,"onUpdate:modelValue":o[11]||(o[11]=a=>l(e).storage_limit=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"storage_limit"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.storage_limit},null,8,["message"])]),t("div",G,[s(m,{for:"pa_email",value:"PA email"}),s(n,{id:"pa_email",modelValue:l(e).pa_email,"onUpdate:modelValue":o[12]||(o[12]=a=>l(e).pa_email=a),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"pa_email"},null,8,["modelValue"]),s(r,{class:"mt-2",message:l(e).errors.pa_email},null,8,["message"])]),t("div",H,[s(m,{for:"name",value:"Name"}),(c(!0),_(k,null,y(p.roles,a=>(c(),_("div",{key:a.id,class:"col-span-6 sm:col-span-4"},[t("label",J,[s(N,{checked:l(e).roleIds,"onUpdate:checked":o[13]||(o[13]=v=>l(e).roleIds=v),id:a.id,value:a.id},null,8,["checked","id","value"]),t("span",K,b(a.name),1)])]))),128))])]),actions:d(()=>[s(A,{class:f(["mx-3",{"opacity-25":l(e).processing}]),disabled:l(e).processing,onClick:V},{default:d(()=>[u(" Delete User ")]),_:1},8,["class","disabled"]),s(z,{on:l(e).recentlySuccessful,class:"mr-3"},{default:d(()=>[u(" Saved. ")]),_:1},8,["on"]),s($,{class:f({"opacity-25":l(e).processing}),disabled:l(e).processing},{default:d(()=>[u(" Save ")]),_:1},8,["class","disabled"])]),_:1}),s(q)])])])]),_:1}))}};export{re as default};
