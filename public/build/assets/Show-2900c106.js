import{A as i}from"./AppLayout-5573c036.js";import o from"./DeleteTeamForm-720b97a9.js";import{S as r}from"./SectionBorder-2a659962.js";import l from"./TeamMemberManager-03513db7.js";import n from"./UpdateTeamNameForm-aa5cd07f.js";import{o as a,c,w as s,a as m,b as t,d as p,F as d,e as u}from"./app-50a02ccb.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-20cb3b2b.js";import"./ActionSection-6e358378.js";import"./SectionTitle-a79122dd.js";import"./ConfirmationModal-74edf4ee.js";import"./Modal-171bef66.js";import"./DangerButton-60f265b6.js";import"./SecondaryButton-918aa1af.js";import"./ActionMessage-c41efd97.js";import"./DialogModal-ad131b12.js";import"./FormSection-49e6f729.js";import"./TextInput-e86338ef.js";import"./InputLabel-31f57ddc.js";import"./PrimaryButton-a8a16e51.js";const f=m("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Team Settings ",-1),x={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},L={__name:"Show",props:{team:Object,availableRoles:Array,permissions:Object},setup(e){return(b,h)=>(a(),c(i,{title:"Team Settings"},{header:s(()=>[f]),default:s(()=>[m("div",null,[m("div",x,[t(n,{team:e.team,permissions:e.permissions},null,8,["team","permissions"]),t(l,{class:"mt-10 sm:mt-0",team:e.team,"available-roles":e.availableRoles,"user-permissions":e.permissions},null,8,["team","available-roles","user-permissions"]),e.permissions.canDeleteTeam&&!e.team.personal_team?(a(),p(d,{key:0},[t(r),t(o,{class:"mt-10 sm:mt-0",team:e.team},null,8,["team"])],64)):u("",!0)])])]),_:1}))}};export{L as default};
