import{r as n,o as v,c as h,w as a,a as i,b as s,f as l,j as m,D as c}from"./app-c913df9e.js";import{A as x}from"./AppLayout-016d8f42.js";import{S as w}from"./SectionBorder-f7833fa9.js";import{_ as f}from"./TabButton-0a431671.js";/* empty css                                                     */import A from"./ResolutionInfoForm-80a1a549.js";import y from"./ResolutionAgendaForm-1950c98d.js";import S from"./VoterForm-7684ccf3.js";import $ from"./ResolutionOrganizerForm-48e92348.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-3490ed30.js";import"./moment-fbc5633a.js";import"./ActionMessage-028e5f1a.js";import"./ActionSection-bc926544.js";import"./SectionTitle-7347f455.js";import"./PrimaryButton-69a44eab.js";import"./NotificationButton-5d978e1a.js";import"./EditButtonLink-48fb3893.js";import"./InputLabel-5883ba50.js";import"./TextInput-675b7235.js";import"./PartialFormSection-c0838b3b.js";import"./DeleteButton-86965e4f.js";import"./EditButton-29d67065.js";/* empty css                                                   */import"./vue-filepond.esm-59597a84.js";import"./filepond-plugin-image-preview.min-5cccdc19.js";import"./CalendarButton-cdeb2e08.js";import"./Checkbox-80a5e118.js";const z=i("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Resolution ",-1),V={class:"max-w-7xl mx-auto pt-10 sm:px-6 lg:px-8"},k={class:"flex justify-end mt-5 ml-"},B={class:"max-w-7xl mx-auto sm:px-6 lg:px-8"},re={__name:"Show",props:{resolution:Object,users:Array,groups:Array,purposes:Array,organizers:Array,agendas:Array,statuses:Array,documents:Array,voters:Array,notifications:Array},setup(e){const o=n(!1),r=n(!1),t=n(!1);n(!1);const p=()=>(r.value=!1,t.value=!1,o.value=!o.value),d=()=>(o.value=!1,t.value=!1,r.value=!r.value),g=()=>(o.value=!1,r.value=!1,t.value=!t.value);return(u,C)=>(v(),h(x,{title:"Profile"},{header:a(()=>[z]),default:a(()=>[i("div",null,[i("div",V,[s(A,{resolution:e.resolution,schedules:u.schedules,notifications:e.notifications,class:"mt-10 sm:mt-0"},null,8,["resolution","schedules","notifications"]),i("div",k,[s(f,{onClick:p},{default:a(()=>[l(" Organizer ")]),_:1}),s(f,{onClick:d},{default:a(()=>[l(" Documents ")]),_:1}),s(f,{onClick:g},{default:a(()=>[l(" Voter ")]),_:1})]),s(w)]),i("div",B,[m(s($,{users:e.users,organizers:e.organizers,resolution:e.resolution,user:u.$page.props.auth.user},null,8,["users","organizers","resolution","user"]),[[c,o.value]]),m(s(y,{users:e.users,agendas:e.agendas,documents:e.documents,purposes:e.purposes,resolution:e.resolution,user:u.$page.props.auth.user},null,8,["users","agendas","documents","purposes","resolution","user"]),[[c,r.value]]),m(s(S,{users:e.users,groups:e.groups,voters:e.voters,resolution:e.resolution,user:u.$page.props.auth.user},null,8,["users","groups","voters","resolution","user"]),[[c,t.value]])])])]),_:1}))}};export{re as default};