import{r as F,l as j,T as M,i as X,o as r,c as y,w as d,f as p,a as n,e as f,b as o,d as m,g as h,j as b,y as B,u as e,v as A,F as V,t as g,n as N,D as T,O as fe,s as Y}from"./app-c913df9e.js";import"./moment-fbc5633a.js";import{_ as I}from"./ActionMessage-028e5f1a.js";import{_ as ge}from"./ActionSection-bc926544.js";import{_ as Z}from"./Checkbox-80a5e118.js";import{S as L}from"./SectionBorder-f7833fa9.js";import{_}from"./InputLabel-5883ba50.js";import{_ as x,a as w}from"./TextInput-675b7235.js";import{_ as R}from"./PartialFormSection-c0838b3b.js";import{_ as q}from"./PrimaryButton-69a44eab.js";import{_ as _e}from"./TextArea-e7ff9b2d.js";import{D as be}from"./DeleteButton-86965e4f.js";import{_ as ee,V as ve}from"./CancelButton-08c6ad6c.js";import{E as ye}from"./EditButton-29d67065.js";import{_ as te}from"./CalendarButton-cdeb2e08.js";import{_ as xe}from"./NotificationButton-5d978e1a.js";import{v as ke}from"./vue-filepond.esm-59597a84.js";import{p as he,a as Ve}from"./filepond-plugin-image-preview.min-5cccdc19.js";import"./SectionTitle-7347f455.js";import"./_plugin-vue_export-helper-c27b6911.js";/* empty css                                                     *//* empty css                                                   */const we={class:"flex space-x-2 justify-end"},Se={class:"text-sm text-gray-600"},Ae={class:"flex flex-col"},Ue={key:0},$e=n("h1",{class:"mb-4 text-xl font-bold"},"Edit Agenda",-1),Ce={class:"col-span-6 mt-2 sm:col-span-4"},Fe={class:"col-span-6 sm:col-span-4"},je=["error"],Oe=["value"],Pe={class:"col-span-6 sm:col-span-4"},Ee=["error"],ze=["value"],De={class:"col-span-6 sm:col-span-4"},Me=["error"],Be=["value"],Ne={class:"col-span-6 sm:col-span-4"},Te={class:"col-span-6 sm:col-span-4"},Ie={class:"block mt-4 mb-4"},Le={class:"flex items-center"},Re=n("span",{class:"ml-2 text-sm text-gray-600"},"Recuring",-1),qe={class:"align-top my-2"},Je={key:0,class:"flex flex-row"},Ge=["src"],He={key:1},Ke={class:"flex flex-row space-x-2 text-gray-500 text-xs font-thin"},Qe={class:"align-top mt-2"},We=["src"],Xe={key:2},Ye=n("h1",{class:"mb-4 text-xl font-bold"},"Add Vote",-1),Ze={class:"col-span-6 sm:col-span-4"},et={class:"col-span-6 sm:col-span-4"},tt={class:"col-span-6 sm:col-span-4"},lt=["error"],ot=["value"],st={class:"col-span-6 sm:col-span-4"},nt=["error"],it=["value"],rt={class:"col-span-6 sm:col-span-4"},at=["error"],dt=["value"],ut={class:"col-span-6 sm:col-span-4"},ct={class:"col-span-6 sm:col-span-4"},mt={class:"block mt-4 mb-4"},pt={class:"flex items-center"},ft=n("span",{class:"ml-2 text-sm text-gray-600"},"Recuring",-1),Bt={__name:"MeetingAgendaForm",props:{users:Array,user:Object,sessions:Array,agendas:Array,purposes:Array,documents:Array,meeting:Object,can:Object},setup(u){const S=u,J=ke(Ve,he),U=F(!1),E=F(!1);F(!1);const O=F(null),$=F(null);let P=j({}),z=j([]),C=j({});j(["index.txt"]);let G=j([]);const a=M({id:null,title:null,presenter_id:null,contributor_id:null,purpose_id:null,external_url:null,recurring:!1,minutes:null,photo:[],agendable_type:"Meeting",meeting_id:S.meeting.id});let i=M({_method:"PUT",id:P.id,title:P.title,presenter_id:P.presenter_id,contributor_id:P.contributor_id,purpose_id:C.purpose_id,external_url:C.title,recurring:C.title,minutes:C.title,photo:z,agendable_type:"Meeting",meeting_id:S.meeting.id});const le=()=>{a.post(route("agendas.store"),{errorBag:"updateProfileInformation",preserveScroll:!0,onSuccess:()=>a.reset()})},oe=()=>{i.post(route("agendas.update",i.id),{})},H=()=>{console.log("FilePond has initialized")},K=(c,t)=>{console.log("file processed",{error:c,file:t})},Q=(c,t)=>{console.log("file added",{error:c,file:t})},W=c=>{console.log("FilePond updated"),a.photo=c.map(t=>t.file)},se=()=>(E.value=!1,U.value=!U.value),ne=()=>E.value=!E.value,ie=c=>{a.delete(route("agendas.destroy",c),{preserveScroll:!0})},re=c=>{console.log("delete this document "+c),fe.delete(route("documents.destroy",c),{preserveScroll:!0})},ae=()=>{i.reset(),O.value=null},de=()=>{v.reset(),$.value=null},ue=c=>{c?(O.value=c,Y(()=>{const t=S.agendas.find(k=>k.id==c);C=JSON.stringify(t),console.log(t.title),ne(),i.id=t.id,i.title=t.title,i.contributor_id=t.contributor_id,i.presenter_id=t.presenter_id,i.purpose_id=t.purpose_id,i.external_url=t.external_url,i.recurring=t.recurring,i.minutes=t.minutes;for(const k of S.documents)k.agenda_id==t.id&&z.push(k.fullpath);return z})):O.value=null},v=M({meeting_id:S.meeting.id,agenda_id:null,subject:""}),ce=c=>{console.log(c),c?($.value=c,Y(()=>{const t=S.agendas.find(k=>k.id==c);v.agenda_id=t.id})):$.value=null},me=()=>{v.post(route("votes.store"),{preserveScroll:!0,onSuccess:()=>v.reset()}),v.reset(),$.value=null};return(c,t)=>{const k=X("icon"),D=X("NavLink");return r(),y(ge,null,{title:d(()=>[p(" Agendas ")]),description:d(()=>[p(" Manage Agendas ")]),content:d(()=>[n("div",we,[u.can.organize_meeting?(r(),y(te,{key:0,onClick:c.deliveryStatus},{default:d(()=>[p(" Delivery Status ")]),_:1},8,["onClick"])):f("",!0),u.can.organize_meeting?(r(),y(te,{key:1,onClick:c.permissions},{default:d(()=>[p(" Permissions ")]),_:1},8,["onClick"])):f("",!0),u.can.organize_meeting?(r(),y(xe,{key:2,onClick:c.agendaOptions},{default:d(()=>[p(" Options ")]),_:1},8,["onClick"])):f("",!0)]),n("div",Se,[o(L),n("ol",Ae,[(r(!0),m(V,null,h(u.agendas,(s,pe)=>(r(),m("li",{key:s.id,class:"mx-2 pl-2 text-lg font-medium p-2 border-b hover:bg-slate-100 focus-within:bg-gray-100"},[O.value==s.id?(r(),m("div",Ue,[$e,o(R,{onSubmitted:oe},{form:d(()=>[b(n("input",{id:"id","onUpdate:modelValue":t[0]||(t[0]=l=>e(i).id=l),type:"hidden"},null,512),[[B,e(i).id]]),n("div",Ce,[o(_,{for:"title",value:"Title"}),o(x,{id:"title",modelValue:e(i).title,"onUpdate:modelValue":t[1]||(t[1]=l=>e(i).title=l),type:"text",class:"mt-1 block w-full",autocomplete:"title"},null,8,["modelValue"]),o(w,{message:e(i).errors.title,class:"mt-2"},null,8,["message"])]),n("div",Fe,[o(_,{for:"presenter_id",value:"Select presenter"}),b(n("select",{"onUpdate:modelValue":t[2]||(t[2]=l=>e(i).presenter_id=l),error:e(i).errors.presenter_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Presenter"},[(r(!0),m(V,null,h(u.users,l=>(r(),m("option",{key:l.id,value:l.id},g(l.first_name+" "+l.last_name),9,Oe))),128))],8,je),[[A,e(i).presenter_id]])]),n("div",Pe,[o(_,{for:"contributor_id",value:"Select contributor"}),b(n("select",{"onUpdate:modelValue":t[3]||(t[3]=l=>e(i).contributor_id=l),error:e(i).errors.contributor_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Contributor"},[(r(!0),m(V,null,h(u.users,l=>(r(),m("option",{key:l.id,value:l.id},g(l.first_name+" "+l.last_name),9,ze))),128))],8,Ee),[[A,e(i).contributor_id]])]),n("div",De,[o(_,{for:"purpose",value:"Purpose"}),b(n("select",{"onUpdate:modelValue":t[4]||(t[4]=l=>e(i).purpose_id=l),error:e(i).errors.purpose_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Organization"},[(r(!0),m(V,null,h(u.purposes,l=>(r(),m("option",{key:l.id,value:l.id},g(l.name),9,Be))),128))],8,Me),[[A,e(i).purpose_id]])]),n("div",Ne,[o(_,{for:"external_url",value:"External Url"}),o(x,{id:"external_url",modelValue:e(i).external_url,"onUpdate:modelValue":t[5]||(t[5]=l=>e(i).external_url=l),type:"text",class:"mt-1 block w-full",autocomplete:"external_url"},null,8,["modelValue"]),o(w,{message:e(i).errors.external_url,class:"mt-2"},null,8,["message"])]),n("div",Te,[o(_,{for:"minutes",value:"Minutes"}),o(x,{id:"minutes",modelValue:e(i).minutes,"onUpdate:modelValue":t[6]||(t[6]=l=>e(i).minutes=l),type:"text",class:"mt-1 block w-full",autocomplete:"minutes"},null,8,["modelValue"]),o(w,{message:e(i).errors.minutes,class:"mt-2"},null,8,["message"]),n("div",Ie,[n("label",Le,[o(Z,{checked:e(i).recurring,"onUpdate:checked":t[7]||(t[7]=l=>e(i).recurring=l),name:"recurring"},null,8,["checked"]),Re])]),o(x,{id:"meeting_id",modelValue:e(i).meeting_id,"onUpdate:modelValue":t[8]||(t[8]=l=>e(i).meeting_id=l),type:"hidden"},null,8,["modelValue"]),o(x,{id:"agendable_type",modelValue:e(i).agendable_type,"onUpdate:modelValue":t[9]||(t[9]=l=>e(i).agendable_type=l),type:"hidden"},null,8,["modelValue"]),n("ol",qe,[(r(!0),m(V,null,h(u.documents,l=>(r(),m("li",{key:l.id,class:"mx-2 px-2"},[l.agenda_id==s.id?(r(),m("div",Je,[o(D,{class:"flex items-center px-2 py-1 text-sm focus:text-indigo-500",href:`/documents/${l.id}`},{default:d(()=>[n("img",{src:`/storage/icons/${l.extension}.png`,class:"image-fluid w-4 mr-2"},null,8,Ge),p(" "+g(l.name)+" ",1),l.deleted_at?(r(),y(k,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"]),u.can.organize_meeting||u.can.contribute_meeting?(r(),y(D,{key:0,onClick:gt=>re(`${l.id}`),class:"text-red-700 rounded-md cursor-pointer"},{default:d(()=>[p("x")]),_:2},1032,["onClick"])):f("",!0)])):f("",!0)]))),128))]),o(e(J),{name:"test",ref_for:!0,ref:"pond","class-name":"my-pond","label-idle":"Drop files here...","allow-multiple":"true","allow-reorder":"true","max-files":"10","chunk-uploads":"true",files:e(G),onInit:H,onUpdatefiles:W,onProcessfile:K,onAddfile:Q},null,8,["files"])])]),actions:d(()=>[o(ee,{onClick:ae},{default:d(()=>[p(" Cancel ")]),_:1}),o(I,{on:e(i).recentlySuccessful,class:"mr-3"},{default:d(()=>[p(" Saved. ")]),_:1},8,["on"]),o(q,{class:N({"opacity-25":e(i).processing}),disabled:e(i).processing},{default:d(()=>[p(" Save ")]),_:1},8,["class","disabled"])]),_:2},1024)])):(r(),m("div",He,[p(g(pe+1)+" . "+g(s.title)+" ",1),n("span",null,[u.can.organize_meeting||u.can.contribute_meeting?(r(),y(ve,{key:0,onSubmit:l=>ce(`${s.id}`),class:"text-lg"},{default:d(()=>[p("Add Vote")]),_:2},1032,["onSubmit"])):f("",!0),u.can.organize_meeting||u.can.contribute_meeting?(r(),y(ye,{key:1,onSubmit:l=>ue(`${s.id}`)},{default:d(()=>[p("Edit")]),_:2},1032,["onSubmit"])):f("",!0),u.can.organize_meeting||u.can.contribute_meeting?(r(),y(be,{key:2,onDelete:l=>ie(`${s.id}`)},{default:d(()=>[p("Delete")]),_:2},1032,["onDelete"])):f("",!0)]),n("div",Ke,[n("div",null,g(s.pfirst_name+" "+s.plast_name),1),n("div",null," for "+g(s.purpose_name),1),n("div",null," - "+g(s.minutes)+" Minutes",1)]),n("ol",Qe,[(r(!0),m(V,null,h(u.documents,l=>(r(),m("li",{key:l.id,class:"mx-2 px-2"},[l.agenda_id==s.id?(r(),y(D,{key:0,class:"flex items-center px-2 py-1 text-sm focus:text-indigo-500",href:`/documents/${l.id}`},{default:d(()=>[n("img",{src:`/storage/icons/${l.extension}.png`,class:"image-fluid w-4 mr-2"},null,8,We),p(" "+g(l.name)+" ",1),l.deleted_at?(r(),y(k,{key:0,name:"trash",class:"flex-shrink-0 ml-2 w-3 h-3 fill-gray-400"})):f("",!0)]),_:2},1032,["href"])):f("",!0)]))),128))])])),$.value==s.id?(r(),m("div",Xe,[o(L),Ye,o(R,{onSubmitted:me},{form:d(()=>[b(n("input",{id:"id","onUpdate:modelValue":t[10]||(t[10]=l=>e(v).agenda_id=l),type:"hidden"},null,512),[[B,e(v).agenda_id]]),b(n("input",{id:"id","onUpdate:modelValue":t[11]||(t[11]=l=>e(v).meeting_id=l),type:"hidden"},null,512),[[B,e(v).meeting_id]]),n("div",Ze,[o(_,{for:"subject",value:"Subject"}),o(_e,{id:"subject",modelValue:e(v).subject,"onUpdate:modelValue":t[12]||(t[12]=l=>e(v).subject=l),type:"textarea",class:"mt-1 block w-full",autocomplete:"subject"},null,8,["modelValue"]),o(w,{message:e(a).errors.subject,class:"mt-2"},null,8,["message"])])]),actions:d(()=>[o(ee,{onClick:de},{default:d(()=>[p(" Cancel ")]),_:1}),o(I,{on:e(i).recentlySuccessful,class:"mr-3"},{default:d(()=>[p(" Saved. ")]),_:1},8,["on"]),o(q,{class:N({"opacity-25":e(i).processing}),disabled:e(i).processing},{default:d(()=>[p(" Save ")]),_:1},8,["class","disabled"])]),_:1})])):f("",!0)]))),128))])]),u.can.organize_meeting||u.can.contribute_meeting?(r(),m("button",{key:0,class:"flex items-center px-6 py-4 focus:text-indigo-500",onClick:se},[b(n("p",null,"Add Agenda",512),[[T,!U.value]]),b(n("p",null,"Close Agenda Form",512),[[T,U.value]])])):f("",!0),o(L),b(n("div",null,[o(R,{onSubmitted:le},{form:d(()=>[n("div",et,[o(_,{for:"title",value:"Title"}),o(x,{id:"title",modelValue:e(a).title,"onUpdate:modelValue":t[13]||(t[13]=s=>e(a).title=s),type:"text",class:"mt-1 block w-full",autocomplete:"title",required:""},null,8,["modelValue"]),o(w,{message:e(a).errors.title,class:"mt-2"},null,8,["message"])]),n("div",tt,[o(_,{for:"presenter_id",value:"Select presenter"}),b(n("select",{"onUpdate:modelValue":t[14]||(t[14]=s=>e(a).presenter_id=s),error:e(a).errors.presenter_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Presenter"},[(r(!0),m(V,null,h(u.users,s=>(r(),m("option",{key:s.id,value:s.id},g(s.first_name+" "+s.last_name),9,ot))),128))],8,lt),[[A,e(a).presenter_id]])]),n("div",st,[o(_,{for:"contributor_id",value:"Select contributor"}),b(n("select",{"onUpdate:modelValue":t[15]||(t[15]=s=>e(a).contributor_id=s),error:e(a).errors.contributor_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Contributor"},[(r(!0),m(V,null,h(u.users,s=>(r(),m("option",{key:s.id,value:s.id},g(s.first_name+" "+s.last_name),9,it))),128))],8,nt),[[A,e(a).contributor_id]])]),n("div",rt,[o(_,{for:"purpose",value:"Purpose"}),b(n("select",{"onUpdate:modelValue":t[16]||(t[16]=s=>e(a).purpose_id=s),error:e(a).errors.purpose_id,class:"mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm",label:"Organization"},[(r(!0),m(V,null,h(u.purposes,s=>(r(),m("option",{key:s.id,value:s.id},g(s.name),9,dt))),128))],8,at),[[A,e(a).purpose_id]])]),n("div",ut,[o(_,{for:"external_url",value:"External Url"}),o(x,{id:"external_url",modelValue:e(a).external_url,"onUpdate:modelValue":t[17]||(t[17]=s=>e(a).external_url=s),type:"text",class:"mt-1 block w-full",autocomplete:"external_url"},null,8,["modelValue"]),o(w,{message:e(a).errors.external_url,class:"mt-2"},null,8,["message"])]),n("div",ct,[o(_,{for:"minutes",value:"Minutes"}),o(x,{id:"minutes",modelValue:e(a).minutes,"onUpdate:modelValue":t[18]||(t[18]=s=>e(a).minutes=s),type:"text",class:"mt-1 block w-full",autocomplete:"minutes"},null,8,["modelValue"]),o(w,{message:e(a).errors.minutes,class:"mt-2"},null,8,["message"]),n("div",mt,[n("label",pt,[o(Z,{checked:e(a).recurring,"onUpdate:checked":t[19]||(t[19]=s=>e(a).recurring=s),name:"recurring"},null,8,["checked"]),ft])]),o(x,{id:"meeting_id",modelValue:e(a).meeting_id,"onUpdate:modelValue":t[20]||(t[20]=s=>e(a).meeting_id=s),type:"hidden"},null,8,["modelValue"]),o(x,{id:"agendable_type",modelValue:e(a).agendable_type,"onUpdate:modelValue":t[21]||(t[21]=s=>e(a).agendable_type=s),type:"hidden"},null,8,["modelValue"]),o(e(J),{name:"test",ref:"pond","class-name":"my-pond","label-idle":"Drop files here...","allow-multiple":"true","allow-reorder":"true","max-files":"10","chunk-uploads":"true",files:e(G),onInit:H,onUpdatefiles:W,onProcessfile:K,onAddfile:Q},null,8,["files"])])]),actions:d(()=>[o(I,{on:e(a).recentlySuccessful,class:"mr-3"},{default:d(()=>[p(" Saved. ")]),_:1},8,["on"]),o(q,{class:N({"opacity-25":e(a).processing}),disabled:e(a).processing},{default:d(()=>[p(" Save ")]),_:1},8,["class","disabled"])]),_:1})],512),[[T,U.value]])]),_:1})}}};export{Bt as default};
