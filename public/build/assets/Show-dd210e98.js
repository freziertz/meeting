import{r as u,o as y,c as S,w as o,a as d,b as a,f as c,j as m,C as f}from"./app-1a6861a9.js";import{A as x}from"./AppLayout-01869b9d.js";import{S as $}from"./SectionBorder-7e2ecc25.js";import{_ as g}from"./TabButton-1f7cba2f.js";/* empty css                                                     */import b from"./MeetingInfoForm-f80356a4.js";import C from"./MeetingAgendaForm-34eddd00.js";import k from"./ParticipantForm-d0817bd3.js";import z from"./ActionForm-6a3b3165.js";import M from"./MeetingAgendaContributorForm-a5e9a3e2.js";import B from"./MeetingOrganizerForm-805c2af2.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-797ed137.js";import"./moment-fbc5633a.js";import"./ActionMessage-859b97af.js";import"./ActionSection-9b543b70.js";import"./SectionTitle-31d51009.js";import"./PrimaryButton-931cf8df.js";import"./NotificationButton-599c5c6f.js";import"./EditButtonLink-f3f944d0.js";import"./Checkbox-964fa033.js";import"./InputLabel-583b110a.js";import"./TextInput-ec4c3950.js";import"./PartialFormSection-818e1342.js";import"./TextArea-6f192829.js";import"./DeleteButton-9482ab12.js";import"./CancelButton-16aea2ee.js";import"./EditButton-4dcd9910.js";/* empty css                                                   */import"./CalendarButton-122187a2.js";import"./vue-filepond.esm-a0816f46.js";import"./filepond-plugin-image-preview.min-5cccdc19.js";import"./DialogModal-2bc42cf6.js";import"./Modal-3fa09e32.js";import"./SecondaryButton-2ac95559.js";const O=d("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Meeting ",-1),j={class:"max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8"},P={class:"flex justify-end mt-5 ml-"},N={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},he={__name:"Show",props:{confirmsTwoFactorAuthentication:Boolean,sessions:Array,actions:Array,meeting:Object,users:Array,meeting_roles:Array,groups:Array,purposes:Array,organizers:Array,contributors:Array,agendas:Array,statuses:Array,documents:Array,purposes:Array,participants:Array,schedules:Array,notifications:Array,can:Object},setup(e){const t=u(!1),s=u(!1),n=u(!1),r=u(!1);u(!1);const i=u(!1),v=()=>(s.value=!1,t.value=!1,n.value=!1,i.value=!1,r.value=!r.value),h=()=>(s.value=!1,r.value=!1,n.value=!1,i.value=!1,t.value=!t.value),p=()=>(t.value=!1,r.value=!1,n.value=!1,i.value=!1,s.value=!s.value),A=()=>(t.value=!1,s.value=!1,r.value=!1,i.value=!1,n.value=!n.value),w=()=>(t.value=!1,s.value=!1,r.value=!1,n.value=!1,i.value=!i.value);return(l,V)=>(y(),S(x,{title:"Profile"},{header:o(()=>[O]),default:o(()=>[d("div",null,[d("div",j,[a(b,{meeting:e.meeting,schedules:e.schedules,notifications:e.notifications,can:e.can,class:"mt-10 sm:mt-0"},null,8,["meeting","schedules","notifications","can"]),d("div",P,[a(g,{onClick:h},{default:o(()=>[c(" Organizer ")]),_:1}),a(g,{onClick:p},{default:o(()=>[c(" Contributor ")]),_:1}),a(g,{onClick:A},{default:o(()=>[c(" Agenda ")]),_:1}),a(g,{onClick:w},{default:o(()=>[c(" Participant ")]),_:1}),a(g,{onClick:v},{default:o(()=>[c(" Actions ")]),_:1})]),a($)]),d("div",N,[m(a(B,{can:e.can,users:e.users,organizers:e.organizers,meeting:e.meeting,user:l.$page.props.auth.user},null,8,["can","users","organizers","meeting","user"]),[[f,t.value]]),m(a(M,{can:e.can,users:e.users,contributors:e.contributors,meeting:e.meeting,user:l.$page.props.auth.user},null,8,["can","users","contributors","meeting","user"]),[[f,s.value]]),m(a(C,{can:e.can,users:e.users,agendas:e.agendas,documents:e.documents,purposes:e.purposes,meeting:e.meeting,user:l.$page.props.auth.user},null,8,["can","users","agendas","documents","purposes","meeting","user"]),[[f,n.value]]),m(a(k,{can:e.can,users:e.users,groups:e.groups,meeting_roles:e.meeting_roles,participants:e.participants,meeting:e.meeting,user:l.$page.props.auth.user},null,8,["can","users","groups","meeting_roles","participants","meeting","user"]),[[f,i.value]]),m(a(z,{can:e.can,users:e.users,agendas:e.agendas,statuses:e.statuses,actions:e.actions,meeting:e.meeting,user:l.$page.props.auth.user},null,8,["can","users","agendas","statuses","actions","meeting","user"]),[[f,r.value]])])])]),_:1}))}};export{he as default};