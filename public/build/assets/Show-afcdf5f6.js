import{o as l,d as i,a as e,b as o,u as s,q as k,p as X,I as Y,k as z,n as H,e as P,r as p,Q as D,T as G,i as me,Z as fe,w as c,f as m,j as y,C as S,F as $,g as w,t as f,c as I,v as T,m as _e}from"./app-4e17ed0d.js";import{l as B,f as pe,F as O,a as ge,b as ve,c as be,d as ye,e as he,_ as xe,g as $e}from"./CancelButton-0f67f45e.js";import{_ as q}from"./NavLink-ae07b30c.js";import{S as J}from"./SectionBorder-b125e4a7.js";import{_ as K}from"./ActionMessage-1ace2136.js";import{_ as M,a as j}from"./TextInput-797e3e17.js";import{_ as F}from"./InputLabel-31b28399.js";import{_ as W}from"./PrimaryButton-bcbf0fc5.js";import{_ as we}from"./TabButton-1ba34cb8.js";import{_ as L}from"./TextArea-52945472.js";import ke from"./DocumentInfoForm-7eb13a24.js";import"./moment-fbc5633a.js";/* empty css                                                     *//* empty css                                                   */import"./filepond-plugin-image-preview.min-5cccdc19.js";import"./_plugin-vue_export-helper-c27b6911.js";const Se=["type"],Ve={class:"px-2"},Ce={__name:"ParticipantButton",props:{type:{type:String,default:"submit"}},setup(a){return B.add(pe),(r,_)=>(l(),i("button",{type:a.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",Ve,[o(s(O),{icon:"fa-solid fa-users"})]),k(r.$slots,"default")],8,Se))}},Ae=["type"],Ue={class:"px-2"},Fe={__name:"ActionButton",props:{type:{type:String,default:"submit"}},setup(a){return B.add(ge),(r,_)=>(l(),i("button",{type:a.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",Ue,[o(s(O),{icon:"fa-solid fa-paper-plane"})]),k(r.$slots,"default")],8,Ae))}},je=["type"],Me={class:"px-2"},Be={__name:"MinuteButton",props:{type:{type:String,default:"submit"}},setup(a){return B.add(ve),(r,_)=>(l(),i("button",{type:a.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",Me,[o(s(O),{icon:"fa-solid fa-pencil-square"})]),k(r.$slots,"default")],8,je))}},Oe=["type"],Pe={class:"px-2"},De={__name:"ChatButton",props:{type:{type:String,default:"submit"}},setup(a){return B.add(be),(r,_)=>(l(),i("button",{type:a.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",Pe,[o(s(O),{icon:"fa-solid fa-comment"})]),k(r.$slots,"default")],8,Oe))}},qe=["type"],He={class:"px-2"},Ne={__name:"HandButton",props:{type:{type:String,default:"submit"}},setup(a){return B.add(ye),(r,_)=>(l(),i("button",{type:a.type,class:"inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-blue-700 tracking-widest hover:bg-gray-300 focus:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"},[e("span",He,[o(s(O),{icon:"fa-solid fa-hand-pointer"})]),k(r.$slots,"default")],8,qe))}},Re={class:"w-full"},Te={class:""},Le={class:""},Ie={key:0,class:"flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"},ze={__name:"FormMeetingSection",emits:["submitted"],setup(a){const r=X(()=>!!Y().actions);return(_,g)=>(l(),i("div",Re,[e("div",Te,[e("form",{onSubmit:g[0]||(g[0]=z(x=>_.$emit("submitted"),["prevent"]))},[e("div",{class:H(r.value?"sm:rounded-tl-md sm:rounded-tr-md":"sm:rounded-md")},[e("div",Le,[k(_.$slots,"minuteForm")])],2),r.value?(l(),i("div",Ie,[k(_.$slots,"actions")])):P("",!0)],32)])]))}},Ee={class:"w-full"},Qe={class:""},Ze={class:""},Ge={key:0,class:"flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md"},Je={__name:"FormActionSection",emits:["submitted"],setup(a){const r=X(()=>!!Y().actions);return(_,g)=>(l(),i("div",Ee,[e("div",Qe,[e("form",{onSubmit:g[0]||(g[0]=z(x=>_.$emit("submitted"),["prevent"]))},[e("div",{class:H(r.value?"sm:rounded-tl-md sm:rounded-tr-md":"sm:rounded-md")},[e("div",Ze,[k(_.$slots,"actionForm")])],2),r.value?(l(),i("div",Ge,[k(_.$slots,"actions")])):P("",!0)],32)])]))}},Ke={class:"flex flex-row space-x-2"},We={class:"w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow bg-white"},Xe={class:"flex flex-col w-3/12 border-x-2 border-t h-screen overflow-y-auto"},Ye=e("div",{class:"w-full text-3xl pl-6 font-extrabold bg-black text-white"},"Meeting Agenda",-1),et={class:"flex flex-col p-2 border-b hover:bg-slate-100"},tt={class:"flex flex-row space-x-2 text-gray-500 text-xs font-thin"},st={class:"align-top mt-2"},ot=["src"],at={class:"w-6/12 h-screen"},nt={class:"w-3/12 flex flex-col mx-2 px-2 h-screen overflow-y-auto"},lt={class:"mx-2 p-4 transition ease-in-out duration-150"},it={key:0,class:"px-2 text-green-700"},dt={class:"mx-2 p-4"},rt={key:0},ut={class:"col-span-6 sm:col-span-4"},ct={class:""},mt={class:"flex flex-row space-x-2"},ft={key:1},_t=["onClick"],pt={class:"mx-2 p-4 transition ease-in-out duration-150"},gt={class:"mx-2 p-4"},vt={class:"w-full text-sm text-gray-600"},bt={class:"w-full whitespace-nowrap"},yt=e("thead",null,[e("tr",{class:"text-left font-bold"},[e("th",{class:"pb-4 pt-6 px-6"},"Action"),e("th",{class:"pb-4 pt-6 px-6"},"Responsible"),e("th",{class:"pb-4 pt-6 px-6"},"Due Date")])],-1),ht={class:"border-t"},xt={class:"border-t"},$t={class:"border-t"},wt={class:"border-t"},kt=e("div",{class:"text-2xl mb-2"}," New Action",-1),St={class:"col-span-6 sm:col-span-4"},Vt=["error"],Ct=["value"],At={class:"col-span-6 sm:col-span-4"},Ut={class:"col-span-6 sm:col-span-4"},Ft=["onUpdate:modelValue","error"],jt=["value"],Mt={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},Bt=["onClick"],Ot={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},Pt=["onClick"],Dt={class:"col-span-6 sm:col-span-4"},qt={class:"col-span-4 sm:col-span-2"},Ht={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},Nt=["onClick"],Rt={class:"col-span-1 sm:col-span-1 ml-2 mt-8"},Tt=["onClick"],Lt={class:"col-span-6 sm:col-span-4"},It=["error"],zt=["value"],Et={class:"col-span-6 sm:col-span-4"},Qt={class:"col-span-6 sm:col-span-4"},Zt={class:"mx-2 p-4"},Gt={class:"mx-2 p-4"},Jt={__name:"MeetingLayout",props:{title:String,actions:Array,user:Object,sessions:Array,agendas:Array,documents:Array,participants:Array,document:Object,meeting:Object,minute:Object,agenda:Object,statuses:Array,can:Object},setup(a){const r=a;B.add(he),p(!1);let _=p(!0);p(!1),r.meeting.id;let g=p(!0),x=p(!1),V=p(!1),C=p(!1);D(!1),D(!0),D([]),D([]);let A=p(!1),U=p(!1);p(!0),p(null);let E=p(""),ee=p("");const te=p([]),N=p(null);function se(h){h?(N.value=h,_e(()=>{const d=r.agendas.find(R=>R.id===h);v.body=d.body,v.title=d.title,console.log(E)})):N.value=null}const v=G({_method:"PUT",body:r.agenda.body||ee.value,title:E.value,agenda_id:r.agenda.id}),oe=()=>{v.post(route("agendas.update",r.agenda.id),{onFinish:()=>v.reset()}),v.body=""},n=G({agenda_id:null,name:"test",actioners:[{actioner_id:null}],due_date:null,reminders:[{reminder:null}],status_id:null,notes:"",as_of_date:null,meeting_id:r.meeting.id}),ae=()=>{n.post(route("actions.store"),{onFinish:()=>form.reset()})},Q=(h,d)=>{d.push({})},Z=(h,d)=>{d.splice(h,1)},ne=()=>{g.value=!g.value,x.value=!1,A.value=!1,C.value=!1,V.value=!1,U.value=!1},le=()=>{x.value=!x.value,g.value=!1,A.value=!1,C.value=!1,V.value=!1,U.value=!1},ie=()=>{V.value=!V.value,g.value=!1,x.value=!1,A.value=!1,C.value=!1,U.value=!1},de=()=>{A.value=!A.value,g.value=!1,x.value=!1,C.value=!1,V.value=!1,U.value=!1},re=()=>{C.value=!C.value,g.value=!1,x.value=!1,A.value=!1,V.value=!1,U.value=!1},ue=()=>{U.value=!U.value,g.value=!1,x.value=!1,A.value=!1,C.value=!1,V.value=!1},ce=()=>{_.value=!_.value};return(h,d)=>{const R=me("delete-button");return l(),i("div",null,[o(s(fe),{title:a.title},null,8,["title"]),e("div",Ke,[o(we,{onClick:ce},{default:c(()=>[m(" left side ")]),_:1})]),e("div",We,[y(e("div",Xe,[Ye,e("ol",et,[(l(!0),i($,null,w(a.agendas,(t,b)=>(l(),i("li",{key:t.id,class:"mx-2 pl-2 text-lg font-medium"},[m(f(b+1)+" . "+f(t.title)+" ",1),e("div",tt,[e("div",null,f(t.pfirst_name+" "+t.plast_name),1),e("div",null," for "+f(t.purpose_name),1),e("div",null," - "+f(t.minutes)+" Minutes",1)]),e("ol",st,[(l(!0),i($,null,w(a.documents,u=>(l(),i("li",{key:u.id,class:"mx-2 px-2"},[u.agenda_id==t.id?(l(),I(q,{key:0,class:"flex items-center px-2 py-1 text-sm focus:text-indigo-500 align-top",href:h.route("live-meeting",{meeting_id:a.meeting.id,agenda_id:t.id,document_id:u.id})},{default:c(()=>[e("img",{src:`/storage/icons/${u.extension}.png`,class:"image-fluid w-4 mr-2"},null,8,ot),m(" "+f(u.name),1)]),_:2},1032,["href"])):P("",!0)]))),128))])]))),128))])],512),[[S,s(_)]]),e("main",at,[k(h.$slots,"default")]),e("div",nt,[e("div",null,[o(Ce,{onClick:ne},{default:c(()=>[m(" Participants ")]),_:1}),y(e("div",lt,[e("ol",null,[(l(!0),i($,null,w(a.participants,(t,b)=>(l(),i("li",{key:t.id},[m(f(b+1+". "+t.first_name+" "+t.last_name)+" ",1),`${t.status}`==1?(l(),i("span",it,[o(s(O),{icon:"fa-solid fa-check"})])):P("",!0)]))),128))])],512),[[S,s(g)]])]),e("div",null,[o(Be,{onClick:re},{default:c(()=>[m(" Minutes ")]),_:1}),y(e("div",dt,[e("ol",null,[(l(!0),i($,null,w(a.agendas,(t,b)=>(l(),i("li",{key:t.id,ref_for:!0,ref_key:"itemRefs",ref:te},[N.value===t.id?(l(),i("div",rt,[o(ze,{onSubmitted:oe},{minuteForm:c(()=>[e("div",ut,[o(M,{ref_for:!0,ref:`title${t.id}`,id:"title",modelValue:s(v).title,"onUpdate:modelValue":d[0]||(d[0]=u=>s(v).title=u),type:"text",class:"mt-1 block w-full",autocomplete:"title",required:"",readonly:""},null,8,["modelValue"]),o(j,{message:s(v).errors.title,class:"mt-2"},null,8,["message"])]),e("div",ct,[o(L,{ref_for:!0,ref:`body${t.id}`,id:"body",modelValue:s(v).body,"onUpdate:modelValue":d[1]||(d[1]=u=>s(v).body=u),type:"textarea",class:"mt-1 block w-full",autocomplete:"body"},null,8,["modelValue"]),o(j,{message:s(v).errors.body,class:"mt-2"},null,8,["message"])])]),actions:c(()=>[e("div",mt,[o(K,{on:s(v).recentlySuccessful,class:"mr-3"},{default:c(()=>[m(" Saved. ")]),_:1},8,["on"]),o(xe,{onClick:h.closeMinuteForm},{default:c(()=>[m(" Cancel ")]),_:1},8,["onClick"]),o(W,{class:H({"opacity-25":s(v).processing}),disabled:s(v).processing},{default:c(()=>[m(" Save ")]),_:1},8,["class","disabled"])])]),_:2},1024)])):(l(),i("div",ft,[e("span",{onClick:z(u=>se(t.id),["prevent"])},f(b+1)+" . "+f(t.title)+" presented by "+f(t.pfirst_name+" "+t.plast_name)+" ",9,_t)]))]))),128))])],512),[[S,s(C)]])]),e("div",null,[e("div",null,[o($e,{onClick:ie},{default:c(()=>[m(" Votes ")]),_:1}),y(e("div",pt," vote ",512),[[S,s(V)]])]),e("div",null,[o(Fe,{onClick:le},{default:c(()=>[m(" Actions ")]),_:1}),y(e("div",gt,[o(J),e("div",vt,[e("table",bt,[yt,e("tbody",null,[(l(!0),i($,null,w(a.actions,t=>(l(),i("tr",{key:t.id,class:"hover:bg-gray-100 focus-within:bg-gray-100"},[e("td",ht,[o(q,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/actions/${t.id}`},{default:c(()=>[m(f(t.name),1)]),_:2},1032,["href"])]),e("td",xt,[o(q,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/actions/${t.id}`},{default:c(()=>[m(f(t.first_name)+" "+f(t.last_name),1)]),_:2},1032,["href"])]),e("td",$t,[o(q,{class:"flex items-center px-6 py-4 focus:text-indigo-500",href:`/actions/${t.id}`},{default:c(()=>[m(f(t.due_date),1)]),_:2},1032,["href"])]),e("td",wt,[a.can.organize_meeting?(l(),I(R,{key:0,onDelete:b=>h.deleteAction(`${t.id}`)},{default:c(()=>[m("Delete")]),_:2},1032,["onDelete"])):P("",!0)])]))),128))])])]),o(J),kt,o(Je,{onSubmitted:ae},{actionForm:c(()=>[e("div",St,[o(F,{for:"agenda_id",value:"Select agenda"}),y(e("select",{"onUpdate:modelValue":d[2]||(d[2]=t=>s(n).agenda_id=t),error:s(n).errors.agenda_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"User",required:""},[(l(!0),i($,null,w(a.agendas,t=>(l(),i("option",{key:t.id,value:t.id},f(t.title),9,Ct))),128))],8,Vt),[[T,s(n).agenda_id]])]),e("div",At,[o(F,{for:"name",value:"Action"}),o(L,{id:"name",modelValue:s(n).name,"onUpdate:modelValue":d[3]||(d[3]=t=>s(n).name=t),type:"textarea",class:"mt-1 block w-full",autocomplete:"name",required:""},null,8,["modelValue"]),o(j,{message:s(n).errors.name,class:"mt-2"},null,8,["message"])]),(l(!0),i($,null,w(s(n).actioners,(t,b)=>(l(),i("div",{key:`Actioner-${b}`,class:"col-span-6 sm:col-span-4 flex"},[e("div",Ut,[o(F,{for:"actioner_id",value:`Assined to ${b+1}`},null,8,["value"]),y(e("select",{id:"actioner_id","onUpdate:modelValue":u=>t.actioner_id=u,error:s(n).errors.actioner_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"User",required:""},[(l(!0),i($,null,w(a.participants,u=>(l(),i("option",{key:u.id,value:u.id},f(u.first_name)+" "+f(u.last_name),9,jt))),128))],8,Ft),[[T,t.actioner_id]])]),e("div",Mt,[e("button",{type:"button",onClick:u=>Q(t,s(n).actioners),class:"text-xl"},"+",8,Bt)]),e("div",Ot,[y(e("button",{type:"button",onClick:u=>Z(b,s(n).actioners),class:"text-xl"},"-",8,Pt),[[S,s(n).actioners.length>1]])])]))),128)),e("div",Dt,[o(F,{for:"due_date",value:"Due Date"}),o(M,{id:"due_date",modelValue:s(n).due_date,"onUpdate:modelValue":d[4]||(d[4]=t=>s(n).due_date=t),type:"date",class:"mt-1 block w-full",autocomplete:"due_date",required:""},null,8,["modelValue"]),o(j,{message:s(n).errors.due_date,class:"mt-2"},null,8,["message"])]),(l(!0),i($,null,w(s(n).reminders,(t,b)=>(l(),i("div",{key:`Reminder-${b}`,class:"col-span-6 sm:col-span-4 flex"},[e("div",qt,[o(F,{for:"reminder",value:"Remainder in days"}),o(M,{id:"reminder",modelValue:t.reminder,"onUpdate:modelValue":u=>t.reminder=u,type:"number",min:"1",class:"mt-1 block w-full",autocomplete:"reminder"},null,8,["modelValue","onUpdate:modelValue"]),o(j,{message:s(n).errors.reminder,class:"mt-2"},null,8,["message"])]),e("div",Ht,[e("button",{type:"button",onClick:u=>Q(t,s(n).reminders),class:"text-xl"},"+",8,Nt)]),e("div",Rt,[y(e("button",{type:"button",onClick:u=>Z(b,s(n).reminders),class:"text-xl"},"-",8,Tt),[[S,s(n).reminders.length>1]])])]))),128)),e("div",Lt,[o(F,{for:"status_id",value:"Status"}),y(e("select",{"onUpdate:modelValue":d[5]||(d[5]=t=>s(n).status_id=t),error:s(n).errors.status_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"User"},[(l(!0),i($,null,w(a.statuses,t=>(l(),i("option",{key:t.id,value:t.id},f(t.name),9,zt))),128))],8,It),[[T,s(n).status_id]])]),e("div",Et,[o(F,{for:"as_of_date",value:"As of"}),o(M,{id:"as_of_date",modelValue:s(n).as_of_date,"onUpdate:modelValue":d[6]||(d[6]=t=>s(n).as_of_date=t),type:"date",class:"mt-1 block w-full",autocomplete:"as_of_date"},null,8,["modelValue"]),o(j,{message:s(n).errors.as_of_date,class:"mt-2"},null,8,["message"])]),e("div",Qt,[o(F,{for:"notes",value:"Progress/ Note"}),o(L,{id:"notes",modelValue:s(n).notes,"onUpdate:modelValue":d[7]||(d[7]=t=>s(n).notes=t),type:"textarea",class:"mt-1 block w-full",autocomplete:"notes"},null,8,["modelValue"]),o(j,{message:s(n).errors.notes,class:"mt-2"},null,8,["message"])]),o(M,{id:"meeting_id",modelValue:s(n).meeting_id,"onUpdate:modelValue":d[8]||(d[8]=t=>s(n).meeting_id=t),type:"hidden"},null,8,["modelValue"]),o(M,{id:"meeting_id",modelValue:s(n).meeting_id,"onUpdate:modelValue":d[9]||(d[9]=t=>s(n).meeting_id=t),type:"hidden"},null,8,["modelValue"])]),actions:c(()=>[o(K,{on:s(n).recentlySuccessful,class:"mr-3"},{default:c(()=>[m(" Saved. ")]),_:1},8,["on"]),o(W,{class:H({"opacity-25":s(n).processing}),disabled:s(n).processing},{default:c(()=>[m(" Save ")]),_:1},8,["class","disabled"])]),_:1})],512),[[S,s(x)]])]),o(De,{onClick:de},{default:c(()=>[m(" Chat ")]),_:1}),y(e("div",Zt," Chat ",512),[[S,s(A)]])]),e("div",null,[o(Ne,{onClick:ue},{default:c(()=>[m(" Hands ")]),_:1}),y(e("div",Gt," Hands ",512),[[S,s(U)]])])])])])}}},ms={__name:"Show",props:{user:Object,sessions:Array,agendas:Array,documents:Array,document:Object,minute:Object,participants:Array,meeting:Object,agenda:Object,statuses:Array,actions:Array,pdfFile:String,can:Object},setup(a){return(r,_)=>(l(),I(Jt,{title:"Live Meeting",user:a.user,actions:a.actions,agendas:a.agendas,documents:a.documents,participants:a.participants,statuses:a.statuses,meeting:a.meeting,document:a.document,minute:a.minute,agenda:a.agenda,session:r.session,can:a.can},{default:c(()=>[o(ke,{document:a.document,class:"mt-10 sm:mt-0"},null,8,["document"])]),_:1},8,["user","actions","agendas","documents","participants","statuses","meeting","document","minute","agenda","session","can"]))}};export{ms as default};