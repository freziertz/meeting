import{l as w,T as C,o as u,c as M,w as d,a as s,b as l,f,j as p,v as S,u as t,d as g,g as y,t as N,F as h,D as z,y as k,n as q}from"./app-af9f5e7a.js";import{A}from"./AppLayout-aca1d140.js";import{S as B}from"./SectionBorder-49883444.js";import{_ as F}from"./ActionMessage-528c4072.js";import{_ as E}from"./FormSection-2c84ac1d.js";import{_ as c,a as m}from"./TextInput-63940a18.js";import{_ as i}from"./InputLabel-f519e289.js";import{_ as L}from"./PrimaryButton-8ca7cfae.js";import{_ as v}from"./Checkbox-71b3bff0.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-189730e5.js";import"./SectionTitle-0bf8328a.js";const O=s("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Meeting ",-1),R={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},D={class:"col-span-6 sm:col-span-4"},P=["error"],T=["value"],j={class:"col-span-6 sm:col-span-4"},G={class:"col-span-4 sm:col-span-2"},I={class:"col-span-2 sm:col-span-1 ml-2"},H={class:"col-span-2 sm:col-span-1 ml-2"},J={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},K=["onClick"],Q={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},W=["onClick"],X={class:"col-span-6 sm:col-span-4"},Y={class:"col-span-6 sm:col-span-4"},Z={class:"col-span-6 sm:col-span-4"},ee={class:"col-span-6 sm:col-span-4"},te={class:"col-span-6 sm:col-span-4"},se={class:"col-span-4 sm:col-span-2"},oe={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},le=["onClick"],ne={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},ae=["onClick"],ie={class:"flex space-x-2 col-span-6 sm:col-span-4"},re={class:"block mt-4"},me={class:"flex items-center"},de=s("span",{class:"ml-2 text-sm text-gray-600"},"Organizers",-1),ce={class:"block mt-4"},ue={class:"flex items-center"},_e=s("span",{class:"ml-2 text-sm text-gray-600"},"Contributors",-1),pe={class:"block mt-4"},ge={class:"flex items-center"},fe=s("span",{class:"ml-2 text-sm text-gray-600"},"Agendas",-1),ve={class:"block mt-4"},be={class:"flex items-center"},ye=s("span",{class:"ml-2 text-sm text-gray-600"},"Participants",-1),qe={__name:"Next",props:{meeting:Object,meeting_types:Array,events:Array,reminders:Array},setup(x){const a=x;w([{id:0,meeting_id:0,meeting_date:"",meeting_start_time:"",meeting_end_time:""}]),w([{reminder:""}]);const V=(b,n)=>{n.push({})},U=(b,n)=>{n.splice(b,1)},e=C({old_meeting_id:a.meeting.id,meeting_type_id:a.meeting.meeting_type_id,title:a.meeting.title,events:a.events,venue:a.meeting.venue,google_map_url:a.meeting.google_map_url,timezone_id:a.meeting.timezone_id,description:a.meeting.description,participants_notes:a.meeting.participants_notes,organizer_notes:a.meeting.organizer_notes,organizer_title:a.meeting.organizer_title,reminders:a.reminders,status:a.meeting.status,organizers:!1,contributors:!1,participants:!1,agendas:!1}),$=()=>{e.post(route("meetings.store"),{onFinish:()=>e.reset()})};return(b,n)=>(u(),M(A,{title:"Accounts"},{header:d(()=>[O]),default:d(()=>[s("div",null,[s("div",R,[s("div",null,[l(E,{onSubmitted:$},{title:d(()=>[f(" Meeting Information ")]),description:d(()=>[f(" Create Next Meeting. ")]),form:d(()=>[s("div",D,[l(i,{for:"Meeting type",value:"Meeting type"}),p(s("select",{"onUpdate:modelValue":n[0]||(n[0]=o=>t(e).meeting_type_id=o),error:t(e).errors.meeting_type_id,required:"",class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Organization"},[(u(!0),g(h,null,y(x.meeting_types,o=>(u(),g("option",{key:o.id,value:o.id},N(o.name),9,T))),128))],8,P),[[S,t(e).meeting_type_id]])]),s("div",j,[l(i,{for:"title",value:"Meeting title"}),l(c,{id:"title",modelValue:t(e).title,"onUpdate:modelValue":n[1]||(n[1]=o=>t(e).title=o),type:"text",class:"mt-1 block w-full",autocomplete:"title",required:""},null,8,["modelValue"]),l(m,{message:t(e).errors.title,class:"mb-2"},null,8,["message"])]),(u(!0),g(h,null,y(t(e).events,(o,_)=>(u(),g("div",{key:`Event-${_}`,class:"col-span-6 sm:col-span-4 flex"},[s("div",G,[l(i,{for:"meeting_date",value:`Meeting date for day ${_+1}`},null,8,["value"]),l(c,{id:"input.meeting_date",modelValue:o.meeting_date,"onUpdate:modelValue":r=>o.meeting_date=r,type:"date",class:"mt-1 block w-full",autocomplete:"inputmeeting_date",required:""},null,8,["modelValue","onUpdate:modelValue"]),l(m,{message:t(e).errors.meeting_date,class:"mt-2"},null,8,["message"])]),s("div",I,[l(i,{for:"meeting_start_time",value:"Start time"}),l(c,{id:"meeting_start_time",modelValue:o.meeting_start_time,"onUpdate:modelValue":r=>o.meeting_start_time=r,type:"time",class:"mt-1 block w-full",autocomplete:"meeting_start_time",required:""},null,8,["modelValue","onUpdate:modelValue"]),l(m,{message:t(e).errors.meeting_start_time,class:"mt-2"},null,8,["message"])]),s("div",H,[l(i,{for:"meeting_end_time",value:"End time"}),l(c,{id:"meeting_end_time",modelValue:o.meeting_end_time,"onUpdate:modelValue":r=>o.meeting_end_time=r,type:"time",class:"mt-1 block w-full",autocomplete:"meeting_end_time",required:""},null,8,["modelValue","onUpdate:modelValue"]),l(m,{message:t(e).errors.meeting_end_time,class:"mt-2"},null,8,["message"])]),s("div",J,[s("button",{type:"button",onClick:r=>V(o,t(e).events),class:"text-xl"},"+",8,K)]),s("div",Q,[p(s("button",{type:"button",onClick:r=>U(_,t(e).events),class:"text-xl"},"-",8,W),[[z,t(e).events.length>1]])])]))),128)),s("div",X,[l(i,{for:"venue",value:"Venue"}),l(c,{id:"venue",modelValue:t(e).venue,"onUpdate:modelValue":n[2]||(n[2]=o=>t(e).venue=o),type:"text",class:"mt-1 block w-full",autocomplete:"venue",required:""},null,8,["modelValue"]),l(m,{message:t(e).errors.venue,class:"mt-2"},null,8,["message"])]),s("div",Y,[l(i,{for:"venue",value:"Google Map URL"}),l(c,{id:"google_map_url",modelValue:t(e).google_map_url,"onUpdate:modelValue":n[3]||(n[3]=o=>t(e).google_map_url=o),type:"url",class:"mt-1 block w-full",autocomplete:"google_map_url",placeholder:"Enter Google map URL here"},null,8,["modelValue"]),l(m,{message:t(e).errors.google_map_url,class:"mt-2"},null,8,["message"])]),s("div",Z,[l(i,{for:"participants_notes",value:"Notes for Participants"}),p(s("textarea",{id:"description","onUpdate:modelValue":n[4]||(n[4]=o=>t(e).description=o),class:"mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",autocomplete:"description"},`
                        `,512),[[k,t(e).description]]),l(m,{message:t(e).errors.participants_notes,class:"mt-2"},null,8,["message"])]),s("div",ee,[l(i,{for:"participants_notes",value:"Notes for Participants"}),p(s("textarea",{id:"participants_notes","onUpdate:modelValue":n[5]||(n[5]=o=>t(e).participants_notes=o),class:"mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",autocomplete:"participants_notes"},`
                        `,512),[[k,t(e).participants_notes]]),l(m,{message:t(e).errors.participants_notes,class:"mt-2"},null,8,["message"])]),s("div",te,[l(i,{for:"organizer_notes",value:"Notes for Organizer"}),p(s("textarea",{id:"organizer_notes","onUpdate:modelValue":n[6]||(n[6]=o=>t(e).organizer_notes=o),class:"mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm",autocomplete:"organizer_notes"},`
                        `,512),[[k,t(e).organizer_notes]]),l(m,{message:t(e).errors.organizer_notes,class:"mt-2"},null,8,["message"])]),(u(!0),g(h,null,y(t(e).reminders,(o,_)=>(u(),g("div",{key:`Reminder-${_}`,class:"col-span-6 sm:col-span-4 flex"},[s("div",se,[l(i,{for:"reminder",value:"Remainder in days"}),l(c,{id:"reminder",modelValue:o.reminder,"onUpdate:modelValue":r=>o.reminder=r,type:"number",min:"1",class:"mt-1 block w-full",autocomplete:"reminder",required:""},null,8,["modelValue","onUpdate:modelValue"]),l(m,{message:t(e).errors.reminder,class:"mt-2"},null,8,["message"])]),s("div",oe,[s("button",{type:"button",onClick:r=>V(o,t(e).reminders),class:"text-xl"},"+",8,le)]),s("div",ne,[p(s("button",{type:"button",onClick:r=>U(_,t(e).reminders),class:"text-xl"},"-",8,ae),[[z,t(e).reminders.length>1]])])]))),128)),l(c,{id:"old_meeting_id",modelValue:t(e).old_meeting_id,"onUpdate:modelValue":n[7]||(n[7]=o=>t(e).old_meeting_id=o),type:"hidden"},null,8,["modelValue"]),s("div",ie,[l(i,{for:"includes",value:"Includes",class:"m-4"}),s("div",re,[s("label",me,[l(v,{checked:t(e).organizers,"onUpdate:checked":n[8]||(n[8]=o=>t(e).organizers=o),name:"organizers"},null,8,["checked"]),de])]),s("div",ce,[s("label",ue,[l(v,{checked:t(e).contributors,"onUpdate:checked":n[9]||(n[9]=o=>t(e).contributors=o),name:"contributors"},null,8,["checked"]),_e])]),s("div",pe,[s("label",ge,[l(v,{checked:t(e).agendas,"onUpdate:checked":n[10]||(n[10]=o=>t(e).agendas=o),name:"agendas"},null,8,["checked"]),fe])]),s("div",ve,[s("label",be,[l(v,{checked:t(e).participants,"onUpdate:checked":n[11]||(n[11]=o=>t(e).participants=o),name:"participants"},null,8,["checked"]),ye])])])]),actions:d(()=>[l(F,{on:t(e).recentlySuccessful,class:"mr-3"},{default:d(()=>[f(" Saved. ")]),_:1},8,["on"]),l(L,{class:q({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:d(()=>[f(" Create ")]),_:1},8,["class","disabled"])]),_:1}),l(B)])])])]),_:1}))}};export{qe as default};