import{A as i}from"./AppLayout-3ed6d541.js";import o from"./DeleteTeamForm-4bfd45bb.js";import{S as r}from"./SectionBorder-dcfd11bf.js";import l from"./TeamMemberManager-2d42f6e3.js";import n from"./UpdateTeamNameForm-da429e4c.js";import{o as a,c,w as s,a as m,b as t,d as p,F as d,e as u}from"./app-f91aa3e5.js";import"./_plugin-vue_export-helper-c27b6911.js";import"./NavLink-3acb4ff1.js";import"./ActionSection-938b4b96.js";import"./SectionTitle-751222ee.js";import"./ConfirmationModal-5461a8b8.js";import"./Modal-457e011a.js";import"./DangerButton-a8814e47.js";import"./SecondaryButton-d4bf1d9e.js";import"./ActionMessage-bef4d2ae.js";import"./DialogModal-73005dc8.js";import"./FormSection-18d3aec2.js";import"./TextInput-795469fa.js";import"./InputLabel-c1a03fb0.js";import"./PrimaryButton-79124004.js";const f=m("h2",{class:"font-semibold text-xl text-gray-800 leading-tight"}," Team Settings ",-1),x={class:"max-w-7xl mx-auto py-10 sm:px-6 lg:px-8"},L={__name:"Show",props:{team:Object,availableRoles:Array,permissions:Object},setup(e){return(b,h)=>(a(),c(i,{title:"Team Settings"},{header:s(()=>[f]),default:s(()=>[m("div",null,[m("div",x,[t(n,{team:e.team,permissions:e.permissions},null,8,["team","permissions"]),t(l,{class:"mt-10 sm:mt-0",team:e.team,"available-roles":e.availableRoles,"user-permissions":e.permissions},null,8,["team","available-roles","user-permissions"]),e.permissions.canDeleteTeam&&!e.team.personal_team?(a(),p(d,{key:0},[t(r),t(o,{class:"mt-10 sm:mt-0",team:e.team},null,8,["team"])],64)):u("",!0)])])]),_:1}))}};export{L as default};
