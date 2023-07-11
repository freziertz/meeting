import{T as p,o as f,d as c,b as e,u as a,w as n,F as g,Z as V,a as o,f as u,e as w,p as v,n as y,q as b}from"./app-425b229f.js";import{A as k}from"./AuthenticationCard-4899a157.js";import{_ as x}from"./AuthenticationCardLogo-81b8e99f.js";import{_ as h}from"./Checkbox-25b62c83.js";import{_ as r,a as i}from"./TextInput-6dd65b2a.js";import{_ as m}from"./InputLabel-6b65ea45.js";import{_ as q}from"./PrimaryButton-c602c2c2.js";import"./_plugin-vue_export-helper-c27b6911.js";const U=["onSubmit"],z={class:"mt-4"},N={class:"mt-4"},F={class:"mt-4"},P={class:"mt-4"},$={class:"mt-4"},A={class:"mt-4"},B={class:"mt-4"},C={class:"mt-4"},T={class:"mt-4"},S={class:"mt-4"},M={class:"mt-4"},R={class:"mt-4"},j={key:0,class:"mt-4"},E={class:"flex items-center"},I={class:"ml-2"},D=["href"],L=["href"],Y={class:"flex items-center justify-end mt-4"},ee={__name:"Register",setup(Z){const s=p({name:"yahaya",email:"freziern@gmail.com",password:"12345678",password_confirmation:"12345678",terms:!1,title:"Mr",first_name:"Yahaya",middle_name:"",last_name:"Frezier",initials:"FBN",designation:"Business development manager",organization_id:"1",storage_limit:"200",pa_email:"zera.msanya@datahousetza.com",send_welcome_email:!1,send_start_guide:!1}),_=()=>{s.post(route("register"),{onFinish:()=>s.reset("password","password_confirmation")})};return(d,l)=>(f(),c(g,null,[e(a(V),{title:"Register"}),e(k,null,{logo:n(()=>[e(x)]),default:n(()=>[o("form",{onSubmit:b(_,["prevent"])},[o("div",null,[e(m,{for:"name",value:"Name"}),e(r,{id:"name",modelValue:a(s).name,"onUpdate:modelValue":l[0]||(l[0]=t=>a(s).name=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.name},null,8,["message"])]),o("div",z,[e(m,{for:"email",value:"Email"}),e(r,{id:"email",modelValue:a(s).email,"onUpdate:modelValue":l[1]||(l[1]=t=>a(s).email=t),type:"email",class:"mt-1 block w-full",required:"",autocomplete:"username"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.email},null,8,["message"])]),o("div",N,[e(m,{for:"password",value:"Password"}),e(r,{id:"password",modelValue:a(s).password,"onUpdate:modelValue":l[2]||(l[2]=t=>a(s).password=t),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.password},null,8,["message"])]),o("div",F,[e(m,{for:"password_confirmation",value:"Confirm Password"}),e(r,{id:"password_confirmation",modelValue:a(s).password_confirmation,"onUpdate:modelValue":l[3]||(l[3]=t=>a(s).password_confirmation=t),type:"password",class:"mt-1 block w-full",required:"",autocomplete:"new-password"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.password_confirmation},null,8,["message"])]),o("div",P,[e(m,{for:"title",value:"Title"}),e(r,{id:"title",modelValue:a(s).title,"onUpdate:modelValue":l[4]||(l[4]=t=>a(s).title=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"title"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.title},null,8,["message"])]),o("div",$,[e(m,{for:"first_name",value:"First Name"}),e(r,{id:"first_name",modelValue:a(s).first_name,"onUpdate:modelValue":l[5]||(l[5]=t=>a(s).first_name=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"first_name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.first_name},null,8,["message"])]),o("div",A,[e(m,{for:"middle_name",value:"Middle Name"}),e(r,{id:"middle_name",modelValue:a(s).middle_name,"onUpdate:modelValue":l[6]||(l[6]=t=>a(s).middle_name=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"middle_name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.middle_name},null,8,["message"])]),o("div",B,[e(m,{for:"last_name",value:"Last name"}),e(r,{id:"last_name",modelValue:a(s).last_name,"onUpdate:modelValue":l[7]||(l[7]=t=>a(s).last_name=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"last_name"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.last_name},null,8,["message"])]),o("div",C,[e(m,{for:"initials",value:"Initials"}),e(r,{id:"initialsinitials",modelValue:a(s).initials,"onUpdate:modelValue":l[8]||(l[8]=t=>a(s).initials=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"initials"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.initials},null,8,["message"])]),o("div",T,[e(m,{for:"designation",value:"Designation"}),e(r,{id:"designation",modelValue:a(s).designation,"onUpdate:modelValue":l[9]||(l[9]=t=>a(s).designation=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"designation"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.designation},null,8,["message"])]),o("div",S,[e(m,{for:"organization_id",value:"organization_id"}),e(r,{id:"organization_id",modelValue:a(s).organization_id,"onUpdate:modelValue":l[10]||(l[10]=t=>a(s).organization_id=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"organization_id"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.organization_id},null,8,["message"])]),o("div",M,[e(m,{for:"storage_limit",value:"Storage limit"}),e(r,{id:"storage_limit",modelValue:a(s).storage_limit,"onUpdate:modelValue":l[11]||(l[11]=t=>a(s).storage_limit=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"storage_limit"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.storage_limit},null,8,["message"])]),o("div",R,[e(m,{for:"pa_email",value:"PA email"}),e(r,{id:"pa_email",modelValue:a(s).pa_email,"onUpdate:modelValue":l[12]||(l[12]=t=>a(s).pa_email=t),type:"text",class:"mt-1 block w-full",required:"",autofocus:"",autocomplete:"pa_email"},null,8,["modelValue"]),e(i,{class:"mt-2",message:a(s).errors.pa_email},null,8,["message"])]),d.$page.props.jetstream.hasTermsAndPrivacyPolicyFeature?(f(),c("div",j,[e(m,{for:"terms"},{default:n(()=>[o("div",E,[e(h,{id:"terms",checked:a(s).terms,"onUpdate:checked":l[13]||(l[13]=t=>a(s).terms=t),name:"terms",required:""},null,8,["checked"]),o("div",I,[u(" I agree to the "),o("a",{target:"_blank",href:d.route("terms.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Terms of Service",8,D),u(" and "),o("a",{target:"_blank",href:d.route("policy.show"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},"Privacy Policy",8,L)])]),e(i,{class:"mt-2",message:a(s).errors.terms},null,8,["message"])]),_:1})])):w("",!0),o("div",Y,[e(a(v),{href:d.route("login"),class:"underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"},{default:n(()=>[u(" Already registered? ")]),_:1},8,["href"]),e(q,{class:y(["ml-4",{"opacity-25":a(s).processing}]),disabled:a(s).processing},{default:n(()=>[u(" Register ")]),_:1},8,["class","disabled"])])],40,U)]),_:1})],64))}};export{ee as default};
