import{A as i}from"./AppLayout-c5d5f249.js";import o from"./DeleteTeamForm-7be9c625.js";import{S as r}from"./SectionBorder-7a24db5d.js";import l from"./TeamMemberManager-8d12ce36.js";import n from"./UpdateTeamNameForm-ccdba694.js";import{o as a,c,w as s,a as m,b as t,d as p,F as d,e as u}from"./app-563fdfa6.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-ec48be57.js";import"./ActionSection-97fd4fb0.js";import"./SectionTitle-3582e00a.js";import"./ConfirmationModal-31fd26a6.js";import"./Modal-db25e380.js";import"./DangerButton-197fc5f1.js";import"./SecondaryButton-e2db6f30.js";import"./ActionMessage-b6f86a06.js";import"./DialogModal-f4abc809.js";import"./FormSection-14d1748b.js";import"./TextInput-f9b10853.js";import"./InputLabel-79358de7.js";import"./PrimaryButton-10522c9f.js";const f=m("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Team Settings ",-1),x={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},L={__name:"Show",props:{team:Object,availableRoles:Array,permissions:Object},setup(e){return(b,h)=>(a(),c(i,{title:"Team Settings"},{header:s(()=>[f]),default:s(()=>[m("div",null,[m("div",x,[t(n,{team:e.team,permissions:e.permissions},null,8,["team","permissions"]),t(l,{class:"mt-10 sm:mt-0",team:e.team,"available-roles":e.availableRoles,"user-permissions":e.permissions},null,8,["team","available-roles","user-permissions"]),e.permissions.canDeleteTeam&&!e.team.personal_team?(a(),p(d,{key:0},[t(r),t(o,{class:"mt-10 sm:mt-0",team:e.team},null,8,["team"])],64)):u("",!0)])])]),_:1}))}};export{L as default};
