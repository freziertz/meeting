import{r as h,T as D,o as l,c as y,w as r,f as n,a as t,e as g,d as c,g as v,b as o,t as u,u as s,l as p,F as b,j as m,C as x,v as w,k as U,n as j}from"./app-aafeade1.js";import"./moment-fbc5633a.js";import{_ as B}from"./ActionMessage-c93b71e1.js";import{_ as N}from"./ActionSection-db8f55f6.js";import{S as z}from"./SectionBorder-218e5a35.js";import{_ as V,a as F}from"./TextInput-414b79e9.js";import{_ as k}from"./InputLabel-cff9abdf.js";import{_ as T}from"./PartialFormSection-102c0662.js";import{_ as E}from"./PrimaryButton-390b49b1.js";import{_ as G}from"./CalendarButton-b2294ee3.js";import{_ as O}from"./NotificationButton-b912f820.js";import{D as R}from"./DeleteButton-1f3939c2.js";import"./SectionTitle-d875be3d.js";import"./_plugin-vue_export-helper-c27b6911.js";/* empty css                                                     */const L={class:"flex space-x-2 justify-end"},q={class:"w-full text-sm text-gray-600"},Y={class:"w-full whitespace-nowrap"},H=t("thead",null,[t("tr",{class:"text-left font-bold"},[t("th",{class:"pb-4 pt-6 px-6"},"Participant"),t("th",{class:"pb-4 pt-6 px-6"},"Title"),t("th",{class:"pb-4 pt-6 px-6"},"Meeting Role"),t("th",{class:"pb-4 pt-6 px-6"},"Group")])],-1),I={class:"border-t"},J={class:"border-t"},K={class:"border-t"},Q={class:"border-t"},W={class:"border-t"},X={class:"border-t"},Z={class:"col-span-6 sm:col-span-4"},ee=["error"],te=["value"],se={class:"col-span-6 sm:col-span-4"},ie=["error"],oe=["value"],re={class:"col-span-6 sm:col-span-4"},ae=["error"],le=["value"],ne={class:"col-span-6 sm:col-span-4"},de={key:0},ce={class:"text-sm mt-2"},ue={class:"mt-2 font-medium text-sm text-green-600"},Me={__name:"ParticipantForm",props:{users:Array,groups:Array,meeting_roles:Array,user:Object,sessions:Array,participants:Array,meeting:Object,can:Object},setup(d){const S=d;h(!1);const _=h(!1);h(!1),h(null);const i=D({id:null,title:null,primary:!1,participant_id:null,meeting_role_id:null,group_id:null,participantable_type:"Meeting",meeting_id:S.meeting.id}),$=()=>{i.post(route("participants.store"),{preserveScroll:!0,onSuccess:()=>i.reset()})},C=()=>{i.post(route("notifications.participant",S.meeting.id),{preserveScroll:!0})},M=()=>{i.post(route("schedules.conflict",S.meeting.id),{preserveScroll:!0})},P=()=>_.value=!_.value,A=(f,a)=>{i.delete(route("participants.destroy",{id:f,participantable_type:a}),{preserveScroll:!0})};return(f,a)=>(l(),y(N,null,{title:r(()=>[n(" Participants ")]),description:r(()=>[n(" Manage Participants ")]),content:r(()=>[t("div",L,[d.can.organize_meeting?(l(),y(G,{key:0,onClick:M},{default:r(()=>[n(" Check Schedule Conflict ")]),_:1})):g("",!0),d.can.organize_meeting?(l(),y(O,{key:1,onClick:C},{default:r(()=>[n(" Send Notification ")]),_:1})):g("",!0)]),t("div",q,[t("table",Y,[H,t("tbody",null,[(l(!0),c(b,null,v(d.participants,e=>(l(),c("tr",{key:e.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",I,[o(s(p),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/participants/${e.id}`},{default:r(()=>[n(u(e.first_name)+" "+u(e.last_name),1)]),_:2},1032,["href"])]),t("td",J,[o(s(p),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/participants/${e.id}`},{default:r(()=>[n(u(e.designation),1)]),_:2},1032,["href"])]),t("td",K,[o(s(p),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/participants/${e.id}`},{default:r(()=>[n(u(e.meeting_role_name),1)]),_:2},1032,["href"])]),t("td",Q,[o(s(p),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/participants/${e.id}`},{default:r(()=>[n(u(e.group_name),1)]),_:2},1032,["href"])]),t("td",W,[o(s(p),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/participants/${e.id}`},{default:r(()=>[n(u(e.group),1)]),_:2},1032,["href"])]),t("td",X,[d.can.organize_meeting?(l(),y(R,{key:0,onDelete:me=>A(`${e.id}`,`${e.participantable_type}`)},{default:r(()=>[n("Delete")]),_:2},1032,["onDelete"])):g("",!0)])]))),128))])])]),d.can.organize_meeting?(l(),c("button",{key:0,class:"flex items-center px-6 py-4 focus:text-indigo-500",onClick:P},[m(t("p",null,"Add Meeting Participant",512),[[x,!_.value]]),m(t("p",null,"Close Meeting Participant",512),[[x,_.value]])])):g("",!0),o(z),m(t("div",null,[o(T,{onSubmitted:$},{form:r(()=>[t("div",Z,[o(k,{for:"user_id",value:"Select user"}),m(t("select",{"onUpdate:modelValue":a[0]||(a[0]=e=>s(i).participant_id=e),error:s(i).errors.participant_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"User",required:""},[(l(!0),c(b,null,v(d.users,e=>(l(),c("option",{key:e.id,value:e.id},u(e.first_name+" "+e.last_name),9,te))),128))],8,ee),[[w,s(i).participant_id]])]),t("div",se,[o(k,{for:"meeting_role_id",value:"Select Meeting Role"}),m(t("select",{"onUpdate:modelValue":a[1]||(a[1]=e=>s(i).meeting_role_id=e),error:s(i).errors.meeting_role_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Meeting Role"},[(l(!0),c(b,null,v(d.meeting_roles,e=>(l(),c("option",{key:e.id,value:e.id},u(e.name),9,oe))),128))],8,ie),[[w,s(i).meeting_role_id]])]),t("div",re,[o(k,{for:"group_id",value:"Select Group"}),m(t("select",{"onUpdate:modelValue":a[2]||(a[2]=e=>s(i).group_id=e),error:s(i).errors.group_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Group"},[(l(!0),c(b,null,v(d.groups,e=>(l(),c("option",{key:e.id,value:e.id},u(e.name),9,le))),128))],8,ae),[[w,s(i).group_id]])]),o(V,{id:"meeting_id",modelValue:s(i).meeting_id,"onUpdate:modelValue":a[3]||(a[3]=e=>s(i).meeting_id=e),type:"hidden"},null,8,["modelValue"]),o(V,{id:"participantable_type",modelValue:s(i).participantable_type,"onUpdate:modelValue":a[4]||(a[4]=e=>s(i).participantable_type=e),type:"hidden"},null,8,["modelValue"]),t("div",ne,[o(k,{for:"title",value:"Title"}),o(V,{id:"title",modelValue:s(i).title,"onUpdate:modelValue":a[5]||(a[5]=e=>s(i).title=e),type:"text",class:"mt-1 block w-full",autocomplete:"title"},null,8,["modelValue"]),o(F,{message:s(i).errors.title,class:"mt-2"},null,8,["message"]),f.$page.props.jetstream.hasEmailVerification&&d.user.email_verified_at===null?(l(),c("div",de,[t("p",ce,[n(" Your email address is unverified. "),o(s(p),{href:f.route("verification.send"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",onClick:U(f.sendEmailVerification,["prevent"])},{default:r(()=>[n(" Click here to re-send the verification email. ")]),_:1},8,["href","onClick"])]),m(t("div",ue," A new verification link has been sent to your email address. ",512),[[x,f.verificationLinkSent]])])):g("",!0)])]),actions:r(()=>[o(B,{on:s(i).recentlySuccessful,class:"mr-3"},{default:r(()=>[n(" Saved. ")]),_:1},8,["on"]),o(E,{class:j({"opacity-25":s(i).processing}),disabled:s(i).processing},{default:r(()=>[n(" Save ")]),_:1},8,["class","disabled"])]),_:1})],512),[[x,_.value]])]),_:1}))}};export{Me as default};
