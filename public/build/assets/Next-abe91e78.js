import{l as j,T as w,o as _,c as $,w as a,a as t,b as o,f as i,j as p,y as v,u as s,d as g,g as C,D as R,F as S,n as b}from"./app-425b229f.js";import{A as B}from"./AppLayout-6319fc3e.js";import{S as F}from"./SectionBorder-4b0b7e53.js";import{_ as N}from"./ActionMessage-f19acd45.js";import{_ as U}from"./FormSection-6fb30114.js";import{a as c,_ as x}from"./TextInput-6dd65b2a.js";import{_ as m}from"./InputLabel-6b65ea45.js";import{_ as A}from"./PrimaryButton-c602c2c2.js";import{_ as D}from"./DangerButton-08d7250c.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-1ed08302.js";import"./SectionTitle-54d82c40.js";const T=t("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Resolution ",-1),E={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},L={class:"col-span-6 sm:col-span-4"},q={class:"col-span-6 sm:col-span-4"},z={class:"col-span-6 sm:col-span-4"},I={class:"col-span-6 sm:col-span-4"},M={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},O=["onClick"],G={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},H=["onClick"],le={__name:"Next",props:{resolution:Object,reminders:Array},setup(h){const r=h;j([{reminder:""}]);const y=(d,l)=>{l.push({})},k=(d,l)=>{l.splice(d,1)},e=w({subject:r.resolution.subject,notes_to_voters:r.resolution.notes_to_voters,voting_deadline:r.resolution.voting_deadline,reminders:r.reminders,status:r.resolution.status}),V=()=>{e.post(route("resolutions.store"),{onFinish:()=>e.reset()})};return(d,l)=>(_(),$(B,{title:"Accounts"},{header:a(()=>[T]),default:a(()=>[t("div",null,[t("div",E,[t("div",null,[o(U,{onSubmitted:V},{title:a(()=>[i(" Resolution Information ")]),description:a(()=>[i(" Edit Resolution. ")]),form:a(()=>[t("div",L,[o(m,{for:"subject",value:"Subject"}),p(t("textarea",{id:"subject","onUpdate:modelValue":l[0]||(l[0]=n=>s(e).subject=n),class:"mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",autocomplete:"subject"},`
                        `,512),[[v,s(e).subject]]),o(c,{message:s(e).errors.subject,class:"mt-2"},null,8,["message"])]),t("div",q,[o(m,{for:"notes_to_voters",value:"Notes to Voters"}),p(t("textarea",{id:"notes_to_voters","onUpdate:modelValue":l[1]||(l[1]=n=>s(e).notes_to_voters=n),class:"mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",autocomplete:"notes_to_voters"},`
                        `,512),[[v,s(e).notes_to_voters]]),o(c,{message:s(e).errors.notes_to_voters,class:"mt-2"},null,8,["message"])]),t("div",z,[o(m,{for:"voting_deadline",value:"Voting Deadline"}),o(x,{id:"voting_deadline",modelValue:s(e).voting_deadline,"onUpdate:modelValue":l[2]||(l[2]=n=>s(e).voting_deadline=n),type:"date",class:"mt-1 block w-full",autocomplete:"voting_deadline"},null,8,["modelValue"]),o(c,{message:s(e).errors.voting_deadline,class:"mt-2"},null,8,["message"])]),(_(!0),g(S,null,C(s(e).reminders,(n,f)=>(_(),g("div",{key:`Reminder-${f}`,class:"col-span-6 sm:col-span-4 flex"},[t("div",I,[o(m,{for:"reminder",value:"Remainder in days"}),o(x,{id:"reminder",modelValue:n.reminder,"onUpdate:modelValue":u=>n.reminder=u,type:"number",min:"1",class:"mt-1 block w-full",autocomplete:"reminder",required:""},null,8,["modelValue","onUpdate:modelValue"]),o(c,{message:s(e).errors.reminder,class:"mt-2"},null,8,["message"])]),t("div",M,[t("button",{type:"button",onClick:u=>y(n,s(e).reminders),class:"text-xl"},"+",8,O)]),t("div",G,[p(t("button",{type:"button",onClick:u=>k(f,s(e).reminders),class:"text-xl"},"-",8,H),[[R,s(e).reminders.length>1]])])]))),128))]),actions:a(()=>[o(D,{class:b(["mx-3",{"opacity-25":s(e).processing}]),disabled:s(e).processing,onClick:d.deleteResolution},{default:a(()=>[i(" Delete Resolution ")]),_:1},8,["class","disabled","onClick"]),o(N,{on:s(e).recentlySuccessful,class:"mr-3"},{default:a(()=>[i(" Saved. ")]),_:1},8,["on"]),o(A,{class:b({"opacity-25":s(e).processing}),disabled:s(e).processing},{default:a(()=>[i(" Save ")]),_:1},8,["class","disabled"])]),_:1}),o(F)])])])]),_:1}))}};export{le as default};
