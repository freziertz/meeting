import{o,d as i,a as e,b as n,u as a,x as h,k as Q,J as W,q as T,n as q,e as F,r,l as j,T as X,Z as Y,w as d,f,j as k,D as S,F as B,g as M,t as _,c as L,s as ee}from"./app-af9f5e7a.js";import{l as C,f as te,F as A,a as se,b as ae,c as ne,d as oe,e as le,_ as ie,V as re}from"./CancelButton-dc487433.js";import{_ as ue}from"./NavLink-189730e5.js";import{_ as de}from"./ActionMessage-528c4072.js";import{_ as ce,a as H}from"./TextInput-63940a18.js";import{_ as fe}from"./PrimaryButton-8ca7cfae.js";import{_ as me}from"./TabButton-aa012ed8.js";import{_ as pe}from"./TextArea-775094fb.js";import _e from"./DocumentInfoForm-c53617a1.js";import"./moment-fbc5633a.js";/* empty css                                                     *//* empty css                                                   */import"./filepond-plugin-image-preview.min-5cccdc19.js";import"./_plugin-vue_export-helper-c27b6911.js";const ge=["type"],ve={class:"px-2"},be={__name:"ParticipantButton",props:{type:{type:String,default:"submit"}},setup(t){return C.add(te),(l,c)=>(o(),i("button",{type:t.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",ve,[n(a(A),{icon:"fa-solid fa-users"})]),h(l.$slots,"default")],8,ge))}},ye=["type"],xe={class:"px-2"},he={__name:"ActionButton",props:{type:{type:String,default:"submit"}},setup(t){return C.add(se),(l,c)=>(o(),i("button",{type:t.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",xe,[n(a(A),{icon:"fa-solid fa-paper-plane"})]),h(l.$slots,"default")],8,ye))}},we=["type"],$e={class:"px-2"},ke={__name:"MinuteButton",props:{type:{type:String,default:"submit"}},setup(t){return C.add(ae),(l,c)=>(o(),i("button",{type:t.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",$e,[n(a(A),{icon:"fa-solid fa-pencil-square"})]),h(l.$slots,"default")],8,we))}},Se=["type"],Ce={class:"px-2"},Ae={__name:"ChatButton",props:{type:{type:String,default:"submit"}},setup(t){return C.add(ne),(l,c)=>(o(),i("button",{type:t.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",Ce,[n(a(A),{icon:"fa-solid fa-comment"})]),h(l.$slots,"default")],8,Se))}},Ve=["type"],je={class:"px-2"},Be={__name:"HandButton",props:{type:{type:String,default:"submit"}},setup(t){return C.add(oe),(l,c)=>(o(),i("button",{type:t.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",je,[n(a(A),{icon:"fa-solid fa-hand-pointer"})]),h(l.$slots,"default")],8,Ve))}},Me={class:"w-full"},Oe={class:""},Fe={class:""},Pe={key:0,class:"flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"},He={__name:"FormMeetingSection",emits:["submitted"],setup(t){const l=Q(()=>!!W().actions);return(c,m)=>(o(),i("div",Me,[e("div",Oe,[e("form",{onSubmit:m[0]||(m[0]=T(g=>c.$emit("submitted"),["prevent"]))},[e("div",{class:q(l.value?"sm:rounded-tl-md sm:rounded-tr-md":"sm:rounded-md")},[e("div",Fe,[h(c.$slots,"minuteForm")])],2),l.value?(o(),i("div",Pe,[h(c.$slots,"actions")])):F("",!0)],32)])]))}},Te={class:"flex flex-row space-x-2"},qe={class:"w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow bg-white"},Le={class:"flex flex-col w-3/12 border-x-2 border-t h-screen overflow-y-auto"},Ne=e("div",{class:"w-full text-3xl pl-6 font-extrabold bg-black text-white"},"Meeting Agenda",-1),Ue={class:"flex flex-col p-2 border-b hover:bg-slate-100"},De={class:"flex flex-row space-x-2 text-gray-500 text-xs font-thin"},Ee={class:"align-top mt-2"},Ie=["src"],Re={class:"w-6/12 h-screen"},ze={class:"w-3/12 flex flex-col mx-2 px-2 h-screen overflow-y-auto"},Je={class:"mx-2 p-4 transition ease-in-out duration-150"},Ze={key:0,class:"px-2 text-green-700"},Ge={class:"mx-2 p-4"},Ke={key:0},Qe={class:"col-span-6 sm:col-span-4"},We={class:""},Xe={class:"flex flex-row space-x-2"},Ye={key:1},et=["onClick"],tt={class:"mx-2 p-4 transition ease-in-out duration-150"},st={class:"mx-2 p-4"},at={class:"mx-2 p-4"},nt={class:"mx-2 p-4"},ot={__name:"MeetingLayout",props:{title:String,user:Object,sessions:Array,agendas:Array,documents:Array,participants:Array,document:Object,meeting:Object,minute:Object,agenda:Object,can:Object},setup(t){const l=t;C.add(le),r(!1);let c=r(!0);r(!1),l.meeting.id;let m=r(!0),g=r(!1),v=r(!1),b=r(!1);j(!1),j(!0),j([]),j([]);let y=r(!1),x=r(!1);r(!0),r(null);let P=r(""),N=r("");const U=r([]),O=r(null);function D(w){w?(O.value=w,ee(()=>{const $=l.agendas.find(s=>s.id===w);u.body=$.body,u.title=$.title,console.log(P)})):O.value=null}const u=X({_method:"PUT",body:l.agenda.body||N.value,title:P.value,agenda_id:l.agenda.id}),E=()=>{u.post(route("agendas.update",l.group.id),{onFinish:()=>u.reset()}),u.body=""},I=()=>{m.value=!m.value,g.value=!1,y.value=!1,b.value=!1,v.value=!1,x.value=!1},R=()=>{g.value=!g.value,m.value=!1,y.value=!1,b.value=!1,v.value=!1,x.value=!1},z=()=>{v.value=!v.value,m.value=!1,g.value=!1,y.value=!1,b.value=!1,x.value=!1},J=()=>{y.value=!y.value,m.value=!1,g.value=!1,b.value=!1,v.value=!1,x.value=!1},Z=()=>{b.value=!b.value,m.value=!1,g.value=!1,y.value=!1,v.value=!1,x.value=!1},G=()=>{x.value=!x.value,m.value=!1,g.value=!1,y.value=!1,b.value=!1,v.value=!1},K=()=>{c.value=!c.value};return(w,$)=>(o(),i("div",null,[n(a(Y),{title:t.title},null,8,["title"]),e("div",Te,[n(me,{onClick:K},{default:d(()=>[f(" left side ")]),_:1})]),e("div",qe,[k(e("div",Le,[Ne,e("ol",Ue,[(o(!0),i(B,null,M(t.agendas,(s,V)=>(o(),i("li",{key:s.id,class:"mx-2 pl-2 text-lg font-medium"},[f(_(V+1)+" . "+_(s.title)+" ",1),e("div",De,[e("div",null,_(s.pfirst_name+" "+s.plast_name),1),e("div",null," for "+_(s.purpose_name),1),e("div",null," - "+_(s.minutes)+" Minutes",1)]),e("ol",Ee,[(o(!0),i(B,null,M(t.documents,p=>(o(),i("li",{key:p.id,class:"mx-2 px-2"},[p.agenda_id==s.id?(o(),L(ue,{key:0,class:"flex items-center px-2 py-1 text-sm focus:text-indigo-500 align-top",href:w.route("live-meeting",{meeting_id:t.meeting.id,agenda_id:s.id,document_id:p.id})},{default:d(()=>[e("img",{src:`/storage/icons/${p.extension}.png`,class:"image-fluid w-4 mr-2"},null,8,Ie),f(" "+_(p.name),1)]),_:2},1032,["href"])):F("",!0)]))),128))])]))),128))])],512),[[S,a(c)]]),e("main",Re,[h(w.$slots,"default")]),e("div",ze,[e("div",null,[n(be,{onClick:I},{default:d(()=>[f(" Participants ")]),_:1}),k(e("div",Je,[e("ol",null,[(o(!0),i(B,null,M(t.participants,(s,V)=>(o(),i("li",{key:s.id},[f(_(V+1+". "+s.first_name+" "+s.last_name)+" ",1),`${s.status}`==1?(o(),i("span",Ze,[n(a(A),{icon:"fa-solid fa-check"})])):F("",!0)]))),128))])],512),[[S,a(m)]])]),e("div",null,[n(ke,{onClick:Z},{default:d(()=>[f(" Minutes ")]),_:1}),k(e("div",Ge,[e("ol",null,[(o(!0),i(B,null,M(t.agendas,(s,V)=>(o(),i("li",{key:s.id,ref_for:!0,ref_key:"itemRefs",ref:U},[O.value===s.id?(o(),i("div",Ke,[n(He,{onSubmitted:E},{minuteForm:d(()=>[e("div",Qe,[n(ce,{ref_for:!0,ref:`title${s.id}`,id:"title",modelValue:a(u).title,"onUpdate:modelValue":$[0]||($[0]=p=>a(u).title=p),type:"text",class:"mt-1 block w-full",autocomplete:"title",required:"",readonly:""},null,8,["modelValue"]),n(H,{message:a(u).errors.title,class:"mt-2"},null,8,["message"])]),e("div",We,[n(pe,{ref_for:!0,ref:`body${s.id}`,id:"body",modelValue:a(u).body,"onUpdate:modelValue":$[1]||($[1]=p=>a(u).body=p),type:"textarea",class:"mt-1 block w-full",autocomplete:"body"},null,8,["modelValue"]),n(H,{message:a(u).errors.body,class:"mt-2"},null,8,["message"])])]),actions:d(()=>[e("div",Xe,[n(de,{on:a(u).recentlySuccessful,class:"mr-3"},{default:d(()=>[f(" Saved. ")]),_:1},8,["on"]),n(ie,{onClick:w.closeMinuteForm},{default:d(()=>[f(" Cancel ")]),_:1},8,["onClick"]),n(fe,{class:q({"opacity-25":a(u).processing}),disabled:a(u).processing},{default:d(()=>[f(" Save ")]),_:1},8,["class","disabled"])])]),_:2},1024)])):(o(),i("div",Ye,[e("span",{onClick:T(p=>D(s.id),["prevent"])},_(V+1)+" . "+_(s.title)+" presented by "+_(s.pfirst_name+" "+s.plast_name)+" ",9,et)]))]))),128))])],512),[[S,a(b)]])]),e("div",null,[e("div",null,[n(re,{onClick:z},{default:d(()=>[f(" Votes ")]),_:1}),k(e("div",tt," vote ",512),[[S,a(v)]])]),e("div",null,[n(he,{onClick:R},{default:d(()=>[f(" Actions ")]),_:1}),k(e("div",st," Action ",512),[[S,a(g)]])]),n(Ae,{onClick:J},{default:d(()=>[f(" Chat ")]),_:1}),k(e("div",at," Chat ",512),[[S,a(y)]])]),e("div",null,[n(Be,{onClick:G},{default:d(()=>[f(" Hands ")]),_:1}),k(e("div",nt," Hands ",512),[[S,a(x)]])])])])]))}},xt={__name:"Show",props:{user:Object,sessions:Array,agendas:Array,documents:Array,document:Object,minute:Object,participants:Array,meeting:Object,agenda:Object,pdfFile:String,can:Object},setup(t){return(l,c)=>(o(),L(ot,{title:"Live Meeting",user:t.user,agendas:t.agendas,documents:t.documents,participants:t.participants,meeting:t.meeting,document:t.document,minute:t.minute,agenda:t.agenda,session:l.session,can:t.can},{default:d(()=>[n(_e,{document:t.document,class:"mt-10 sm:mt-0"},null,8,["document"])]),_:1},8,["user","agendas","documents","participants","meeting","document","minute","agenda","session","can"]))}};export{xt as default};
