import{r as M,p as H,T as S,o,c as b,w as s,f as r,a as e,e as c,t as n,d as a,g as w,j as g,u as m,F as x,C as u,b as d}from"./app-1a6861a9.js";import{h as k}from"./moment-fbc5633a.js";import{_ as y}from"./ActionMessage-859b97af.js";import{_ as T}from"./ActionSection-9b543b70.js";import{_ as v}from"./PrimaryButton-931cf8df.js";import{_ as C}from"./NotificationButton-599c5c6f.js";import{_ as D}from"./EditButtonLink-f3f944d0.js";import{_ as Y}from"./NavLink-797ed137.js";/* empty css                                                     */import"./SectionTitle-31d51009.js";import"./_plugin-vue_export-helper-c27b6911.js";const F={class:"flex space-x-2 mb-2 justify-end"},I={class:"w-full text-sm text-gray-600"},O={class:"w-full whitespace-nowrap"},U={class:"hover:bg-gray-100 focus-within:bg-gray-100"},R=e("td",{class:"border-t p-2"}," Meeting type ",-1),G={class:"border-t p-2"},J={class:"hover:bg-gray-100 focus-within:bg-gray-100"},L=e("td",{class:"border-t p-2"}," Meeting title ",-1),q={class:"border-t p-2"},K={class:"border-t p-2"},Q={class:"border-t p-2"},W={class:"border-t p-2"},X={class:"hover:bg-gray-100 focus-within:bg-gray-100"},Z=e("td",{class:"border-t p-2"}," Timezone ",-1),ee={class:"border-t p-2"},te={class:"hover:bg-gray-100 focus-within:bg-gray-100"},se=e("td",{class:"border-t p-2"}," Venue ",-1),oe={class:"border-t p-2"},re={class:"hover:bg-gray-100 focus-within:bg-gray-100"},ne=e("td",{class:"border-t p-2"}," Google map url ",-1),ie={class:"border-t p-2"},ce={class:"border-t p-2"},ae={class:"border-t p-2"},de={class:"border-t p-2"},le={class:"hover:bg-gray-100 focus-within:bg-gray-100"},ge=e("td",{class:"border-t p-2"}," Description ",-1),me={class:"border-t p-2"},ue={class:"hover:bg-gray-100 focus-within:bg-gray-100"},_e=e("td",{class:"border-t p-2"}," Notes for participants ",-1),he={class:"border-t p-2"},fe={class:"hover:bg-gray-100 focus-within:bg-gray-100"},be=e("td",{class:"border-t p-2"}," Notes for Organizers ",-1),ye={class:"border-t p-2"},pe={class:"hover:bg-gray-100 focus-within:bg-gray-100"},ve=e("td",{class:"border-t p-2"}," Status ",-1),ke={class:"border-t p-2"},Me={key:0},Se=e("td",{class:"px-6 py-4 border-t",colspan:"4"},"No meetings found.",-1),we=[Se],xe={key:0,class:"flex items-center mt-5"},Ce={key:1,class:"flex items-center mt-5"},De={key:2,class:"flex items-center mt-5"},Pe={key:3,class:"flex items-center mt-5"},Ne={key:4,class:"flex items-center mt-5"},Oe={__name:"MeetingInfoForm",props:{sessions:Array,meeting:Object,users:Array,organizers:Array,schedules:Array,notifications:Array,can:Object},setup(t){const i=t;M(!1),M(null);const h=H(()=>{switch(parseInt(i.meeting.status)){case 1:return"UnPublished";case 2:return"Published";case 3:return"Progress";case 4:return"Closed"}}),l=S({_method:"PUT",id:i.meeting.id,status:i.meeting.status}),p=S({}),P=()=>{l.post(route("meeting-publish",i.meeting.id),{preserveScroll:!0})},N=()=>{l.post(route("meeting-start",i.meeting.id),{preserveScroll:!0})},A=()=>{l.post(route("meeting-end",i.meeting.id),{preserveScroll:!0})},E=()=>{l.post(route("meeting-reset",i.meeting.id),{preserveScroll:!0})},$=()=>{p.get(route("next-meeting",i.meeting.id),{preserveScroll:!0})},z=()=>{p.get(route("generate-draft-minutes",i.meeting.id),{preserveScroll:!0})},V=()=>{p.get(route("generate-meeting-pack",i.meeting.id),{preserveScroll:!0})},j=()=>{p.get(route("meetings.edit",i.meeting.id),{preserveScroll:!0})};return(B,Ae)=>(o(),b(T,null,{title:s(()=>[r(" Meeting Info ")]),description:s(()=>[]),content:s(()=>[e("div",F,[t.can.create_meeting?(o(),b(C,{key:0,onClick:$},{default:s(()=>[r(" Schedule Next Meeting ")]),_:1})):c("",!0),t.can.export_meeting_minutes?(o(),b(D,{key:1,onClick:z},{default:s(()=>[r(" Export Draft Minutes ")]),_:1})):c("",!0),t.can.send_meeting_pack?(o(),b(C,{key:2,onClick:V},{default:s(()=>[r(" Export/ Send Meeting Pack ")]),_:1})):c("",!0),t.can.edit_meeting?(o(),b(D,{key:3,onClick:j},{default:s(()=>[r(" Edit ")]),_:1})):c("",!0)]),e("div",I,[e("table",O,[e("tbody",null,[e("tr",U,[R,e("td",G,n(t.meeting.meeting_type),1)]),e("tr",J,[L,e("td",q,n(t.meeting.title),1)]),(o(!0),a(x,null,w(t.schedules,(_,f)=>(o(),a("tr",{key:_.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[g(e("td",K," Meeting Schedule ",512),[[u,f==0]]),g(e("td",Q,null,512),[[u,f!=0]]),e("td",W,n(m(k)(_.meeting_date).format("dddd, MMMM DD, YYYY"))+" "+n(m(k)(_.meeting_start_time,"HH:mm:ss").format("hh:mm A"))+" to "+n(m(k)(_.meeting_end_time,"HH:mm").format("hh:mm A")),1)]))),128)),e("tr",X,[Z,e("td",ee,n(t.meeting.timezone_id),1)]),e("tr",te,[se,e("td",oe,n(t.meeting.venue),1)]),e("tr",re,[ne,e("td",ie,n(t.meeting.google_map_url),1)]),(o(!0),a(x,null,w(t.notifications,(_,f)=>(o(),a("tr",{key:_.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[g(e("td",ce," Reminder ",512),[[u,f==0]]),g(e("td",ae,null,512),[[u,f!=0]]),e("td",de,n(_.notification_date),1)]))),128)),e("tr",le,[ge,e("td",me,n(t.meeting.description),1)]),e("tr",ue,[_e,e("td",he,n(t.meeting.participants_notes),1)]),e("tr",fe,[be,e("td",ye,n(t.meeting.organizer_notes),1)]),e("tr",pe,[ve,e("td",ke,n(h.value),1)]),t.meeting.length===0?(o(),a("tr",Me,we)):c("",!0)])])]),t.can.publish_meeting?g((o(),a("div",xe,[d(v,{onClick:P},{default:s(()=>[r(" Publish ")]),_:1}),d(y,{on:m(l).recentlySuccessful,class:"ml-3"},{default:s(()=>[r(" Done. ")]),_:1},8,["on"])],512)),[[u,h.value==="UnPublished"]]):c("",!0),t.can.participate_meeting?g((o(),a("div",Ce,[d(Y,{href:B.route("live-meeting",{meeting_id:t.meeting.id,agenda_id:0,document_id:0})},{default:s(()=>[r(" Join Meeting ")]),_:1},8,["href"]),d(y,{on:m(l).recentlySuccessful,class:"ml-3"},{default:s(()=>[r(" Done. ")]),_:1},8,["on"])],512)),[[u,h.value==="Progress"]]):c("",!0),t.can.start_meeting?g((o(),a("div",De,[d(v,{onClick:N},{default:s(()=>[r(" Start Meeting ")]),_:1}),d(y,{on:m(l).recentlySuccessful,class:"ml-3"},{default:s(()=>[r(" Done. ")]),_:1},8,["on"])],512)),[[u,h.value==="Published"]]):c("",!0),t.can.close_meeting?g((o(),a("div",Pe,[d(v,{onClick:A},{default:s(()=>[r(" Close Meeting ")]),_:1}),d(y,{on:m(l).recentlySuccessful,class:"ml-3"},{default:s(()=>[r(" Done. ")]),_:1},8,["on"])],512)),[[u,h.value==="Progress"]]):c("",!0),t.can.reset_meeting?(o(),a("div",Ne,[d(v,{onClick:E},{default:s(()=>[r(" Reset Meeting ")]),_:1}),d(y,{on:m(l).recentlySuccessful,class:"ml-3"},{default:s(()=>[r(" Done. ")]),_:1},8,["on"])])):c("",!0)]),_:1}))}};export{Oe as default};