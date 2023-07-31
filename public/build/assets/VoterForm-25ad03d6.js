import{r as u,T as D,o as c,c as B,w as r,f as i,a as t,b as o,d as p,g,t as d,u as l,l as h,F as x,j as f,C as v,v as F,n as N}from"./app-4e17ed0d.js";import"./moment-fbc5633a.js";import{_ as T}from"./ActionMessage-1ace2136.js";import{_ as U}from"./ActionSection-538b0a6c.js";import{S as j}from"./SectionBorder-b125e4a7.js";import{_ as b,a as A}from"./TextInput-797e3e17.js";import{_ as V}from"./InputLabel-31b28399.js";import{_ as R}from"./PartialFormSection-ff242a5a.js";import{_ as z}from"./PrimaryButton-bcbf0fc5.js";import{_ as M}from"./CalendarButton-3aafab84.js";import{_ as O}from"./NotificationButton-221c1ff0.js";import{D as E}from"./DeleteButton-5b30ceaa.js";import"./SectionTitle-c009be10.js";import"./_plugin-vue_export-helper-c27b6911.js";/* empty css                                                     */const L={class:"flex space-x-2 justify-end"},q={class:"w-full text-sm text-gray-600"},G={class:"w-full whitespace-nowrap"},H=t("thead",null,[t("tr",{class:"text-left font-bold"},[t("th",{class:"pb-4 pt-6 px-6"},"Voter"),t("th",{class:"pb-4 pt-6 px-6"},"Title"),t("th",{class:"pb-4 pt-6 px-6"},"Vote")])],-1),I={class:"border-t"},J={class:"border-t"},K={class:"border-t"},P={class:"border-t"},Q={class:"col-span-6 sm:col-span-4"},W=["error"],X=["value"],Y={class:"col-span-6 sm:col-span-4"},_e={__name:"VoterForm",props:{users:Array,user:Object,sessions:Array,voters:Array,resolution:Object},setup(m){const _=m;u(!1);const n=u(!1);u(!1),u(null);const s=D({title:null,voter_id:null,participantable_type:"Resolution",resolution_id:_.resolution.id}),S=()=>{s.post(route("participants.store"),{preserveScroll:!0,onSuccess:()=>s.reset()})},w=()=>{s.post(route("notifications.voter",_.resolution.id),{preserveScroll:!0})},$=()=>{s.post(route("schedules.conflict",_.resolution.id),{preserveScroll:!0})},k=()=>n.value=!n.value,C=y=>{s.delete(route("participants.destroy",y),{preserveScroll:!0})};return(y,a)=>(c(),B(U,null,{title:r(()=>[i(" Voters ")]),description:r(()=>[i(" Manage Voters ")]),content:r(()=>[t("div",L,[o(M,{onClick:$},{default:r(()=>[i(" Check Schedule Conflict ")]),_:1}),o(O,{onClick:w},{default:r(()=>[i(" Send Notification ")]),_:1})]),t("div",q,[t("table",G,[H,t("tbody",null,[(c(!0),p(x,null,g(m.voters,e=>(c(),p("tr",{key:e.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[t("td",I,[o(l(h),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/voters/${e.id}`},{default:r(()=>[i(d(e.first_name)+" "+d(e.last_name),1)]),_:2},1032,["href"])]),t("td",J,[o(l(h),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/voters/${e.id}`},{default:r(()=>[i(d(e.designation),1)]),_:2},1032,["href"])]),t("td",K,[o(l(h),{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/voters/${e.id}`},{default:r(()=>[i(d(e.vote),1)]),_:2},1032,["href"])]),t("td",P,[o(E,{onDelete:Z=>C(`${e.id}`)},{default:r(()=>[i("Delete")]),_:2},1032,["onDelete"])])]))),128))])])]),t("button",{class:"flex items-center px-6 py-4 focus:text-indigo-500",onClick:k},[f(t("p",null,"Add Resolution Voter",512),[[v,!n.value]]),f(t("p",null,"Close Resolution Voter",512),[[v,n.value]])]),o(j),f(t("div",null,[o(R,{onSubmitted:S},{form:r(()=>[t("div",Q,[o(V,{for:"user_id",value:"Select user"}),f(t("select",{"onUpdate:modelValue":a[0]||(a[0]=e=>l(s).voter_id=e),error:l(s).errors.voter_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"User"},[(c(!0),p(x,null,g(m.users,e=>(c(),p("option",{key:e.id,value:e.id},d(e.first_name+" "+e.last_name),9,X))),128))],8,W),[[F,l(s).voter_id]])]),o(b,{id:"resolution_id",modelValue:l(s).resolution_id,"onUpdate:modelValue":a[1]||(a[1]=e=>l(s).resolution_id=e),type:"hidden"},null,8,["modelValue"]),o(b,{id:"organizable_type",modelValue:l(s).participantable_type,"onUpdate:modelValue":a[2]||(a[2]=e=>l(s).participantable_type=e),type:"hidden"},null,8,["modelValue"]),t("div",Y,[o(V,{for:"title",value:"Title"}),o(b,{id:"title",modelValue:l(s).title,"onUpdate:modelValue":a[3]||(a[3]=e=>l(s).title=e),type:"text",class:"mt-1 block w-full",autocomplete:"title"},null,8,["modelValue"]),o(A,{message:l(s).errors.title,class:"mt-2"},null,8,["message"])])]),actions:r(()=>[o(T,{on:l(s).recentlySuccessful,class:"mr-3"},{default:r(()=>[i(" Saved. ")]),_:1},8,["on"]),o(z,{class:N({"opacity-25":l(s).processing}),disabled:l(s).processing},{default:r(()=>[i(" Save ")]),_:1},8,["class","disabled"])]),_:1})],512),[[v,n.value]])]),_:1}))}};export{_e as default};