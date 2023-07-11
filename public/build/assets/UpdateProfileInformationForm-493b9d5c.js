import{T as j,r as f,o as d,c as w,w as a,f as r,d as S,a as l,b as o,j as p,D as v,N as B,q as h,e as _,u as t,p as E,n as A,O as D}from"./app-425b229f.js";import{_ as F}from"./ActionMessage-f19acd45.js";import{_ as O}from"./FormSection-6fb30114.js";import{a as g,_ as V}from"./TextInput-6dd65b2a.js";import{_ as k}from"./InputLabel-6b65ea45.js";import{_ as R}from"./PrimaryButton-c602c2c2.js";import{_ as C}from"./SecondaryButton-9804795e.js";import"./SectionTitle-54d82c40.js";import"./_plugin-vue_export-helper-c27b6911.js";const T={key:0,class:"col-span-6 sm:col-span-4"},z={class:"mt-2"},L=["src","alt"],q={class:"mt-2"},M={class:"col-span-6 sm:col-span-4"},Y={class:"col-span-6 sm:col-span-4"},G={key:0},H={class:"text-sm mt-2"},J={class:"mt-2 font-medium text-sm text-green-600"},ae={__name:"UpdateProfileInformationForm",props:{user:Object},setup(c){const y=c,e=j({_method:"PUT",name:y.user.name,email:y.user.email,photo:null}),b=f(null),u=f(null),n=f(null),$=()=>{n.value&&(e.photo=n.value.files[0]),e.post(route("user-profile-information.update"),{errorBag:"updateProfileInformation",preserveScroll:!0,onSuccess:()=>P()})},x=()=>{b.value=!0},N=()=>{n.value.click()},I=()=>{const s=n.value.files[0];if(!s)return;const i=new FileReader;i.onload=m=>{u.value=m.target.result},i.readAsDataURL(s)},U=()=>{D.delete(route("current-user-photo.destroy"),{preserveScroll:!0,onSuccess:()=>{u.value=null,P()}})},P=()=>{var s;(s=n.value)!=null&&s.value&&(n.value.value=null)};return(s,i)=>(d(),w(O,{onSubmitted:$},{title:a(()=>[r(" Profile Information ")]),description:a(()=>[r(" Update your account's profile information and email address. ")]),form:a(()=>[s.$page.props.jetstream.managesProfilePhotos?(d(),S("div",T,[l("input",{ref_key:"photoInput",ref:n,type:"file",class:"hidden",onChange:I},null,544),o(k,{for:"photo",value:"Photo"}),p(l("div",z,[l("img",{src:c.user.profile_photo_url,alt:c.user.name,class:"rounded-full h-20 w-20 object-cover"},null,8,L)],512),[[v,!u.value]]),p(l("div",q,[l("span",{class:"block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center",style:B("background-image: url('"+u.value+"');")},null,4)],512),[[v,u.value]]),o(C,{class:"mt-2 mr-2",type:"button",onClick:h(N,["prevent"])},{default:a(()=>[r(" Select A New Photo ")]),_:1},8,["onClick"]),c.user.profile_photo_path?(d(),w(C,{key:0,type:"button",class:"mt-2",onClick:h(U,["prevent"])},{default:a(()=>[r(" Remove Photo ")]),_:1},8,["onClick"])):_("",!0),o(g,{message:t(e).errors.photo,class:"mt-2"},null,8,["message"])])):_("",!0),l("div",M,[o(k,{for:"name",value:"Name"}),o(V,{id:"name",modelValue:t(e).name,"onUpdate:modelValue":i[0]||(i[0]=m=>t(e).name=m),type:"text",class:"mt-1 block w-full",autocomplete:"name"},null,8,["modelValue"]),o(g,{message:t(e).errors.name,class:"mt-2"},null,8,["message"])]),l("div",Y,[o(k,{for:"email",value:"Email"}),o(V,{id:"email",modelValue:t(e).email,"onUpdate:modelValue":i[1]||(i[1]=m=>t(e).email=m),type:"email",class:"mt-1 block w-full",autocomplete:"username"},null,8,["modelValue"]),o(g,{message:t(e).errors.email,class:"mt-2"},null,8,["message"]),s.$page.props.jetstream.hasEmailVerification&&c.user.email_verified_at===null?(d(),S("div",G,[l("p",H,[r(" Your email address is unverified. "),o(t(E),{href:s.route("verification.send"),method:"post",as:"button",class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",onClick:h(x,["prevent"])},{default:a(()=>[r(" Click here to re-send the verification email. ")]),_:1},8,["href","onClick"])]),p(l("div",J," A new verification link has been sent to your email address. ",512),[[v,b.value]])])):_("",!0)])]),actions:a(()=>[o(F,{on:t(e).recentlySuccessful,class:"mr-3"},{default:a(()=>[r(" Saved. ")]),_:1},8,["on"]),o(R,{class:A({"opacity-25":t(e).processing}),disabled:t(e).processing},{default:a(()=>[r(" Save ")]),_:1},8,["class","disabled"])]),_:1}))}};export{ae as default};
