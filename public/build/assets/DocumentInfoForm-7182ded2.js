import{r as o,P as b,i as g,o as p,c as v,w as i,f as l,a as t,t as c,j as n,C as a,u as d,b as x}from"./app-1a6861a9.js";import"./moment-fbc5633a.js";import{_ as $}from"./ActionSection-9b543b70.js";import"./SectionTitle-31d51009.js";import"./_plugin-vue_export-helper-c27b6911.js";const D={class:"w-full"},P={class:"hover:bg-gray-50 focus-within:bg-gray-50"},V=t("td",{class:"border-t font-bold"},"Name",-1),j={class:"pl-4 border-t"},B={class:"hover:bg-gray-50 focus-within:bg-gray-50"},N=t("td",{class:"border-t font-bold"},"Date",-1),k={class:"pl-4 border-t"},C={class:"hover:bg-gray-50 focus-within:bg-gray-50"},F=t("td",{class:"border-t font-bold"},"Owner",-1),I={class:"pl-4 border-t"},O={class:"hover:bg-gray-50 focus-within:bg-gray-50"},U=t("td",{class:"border-t font-bold"},"Description",-1),S={class:"pl-4 border-t"},A={class:"w-full h-screen text-sm text-gray-600"},L=["data"],M=["href"],T={class:"w-full h-screen text-sm text-gray-600"},q=["src","alt"],z={class:"w-full text-sm text-gray-600"},E={autoplay:"",auto:"",controls:"",class:"w-full"},G=["src","type"],H=["href"],J={class:"w-full text-sm text-gray-600"},K=["src","type"],Q=["href"],R={class:"w-full text-sm text-gray-600"},W=["src"],X={class:"w-full text-sm text-gray-600"},Y=["data"],Z=["href"],at={__name:"DocumentInfoForm",props:{document:Object},setup(e){const w=e;let u=o(!1),r=o(!1),f=o(!1),h=o(!1),m=o(!1);o(!1);let _=o(!1),s=o("");return b(()=>{s=w.document.mime_type,s.includes("pdf")?u=!0:s.includes("image")?r=!0:s.includes("video")?f=!0:s.includes("audio")?h=!0:s.includes("opendocument")||(s.includes("officedocument")||s.includes("msword")||s.includes("msexcel")?m=!0:_=!0)}),(tt,et)=>{const y=g("VueDocPreview");return p(),v($,null,{title:i(()=>[l(" Document Info ")]),description:i(()=>[t("table",D,[t("tbody",null,[t("tr",P,[V,t("td",j,c(e.document.name),1)]),t("tr",B,[N,t("td",k,c(e.document.created_at),1)]),t("tr",C,[F,t("td",I,c(e.document.user_id),1)]),t("tr",O,[U,t("td",S,c(e.document.description),1)])])])]),content:i(()=>[n(t("div",A,[t("object",{data:`${e.document.fullpath}`,type:"application/pdf",class:"w-full h-full"},[t("p",null,[l("Unable to display PDF file. "),t("a",{href:`${e.document.fullpath}`},"Download",8,M),l(" instead.")])],8,L)],512),[[a,d(u)]]),n(t("div",T,[t("img",{src:`${e.document.fullpath}`,alt:"${document.name}"},null,8,q)],512),[[a,d(r)]]),n(t("div",z,[t("video",E,[t("source",{src:`${e.document.fullpath}`,type:`${e.document.mime_type}`},null,8,G),l(" Download the "),t("a",{href:`${e.document.fullpath}`},c(e.document.extension),9,H)])],512),[[a,d(f)]]),n(t("div",J,[t("figure",null,[t("figcaption",null,"Listen "+c(e.document.name),1),t("audio",{autoplay:"",loop:"",controls:"",src:`${e.document.fullpath}`,type:`${e.document.mime_type}`},[l(" Download the "),t("a",{href:`${e.document.fullpath}`},c(e.document.extension),9,Q)],8,K)])],512),[[a,d(h)]]),n(t("div",R,[x(y,{value:`${e.document.fullpath}`,type:"office"},null,8,["value"]),t("iframe",{src:`https://view.office.live.com/op/embed.aspx?src=${e.document.fullpath}`,class:"w-full",frameborder:"0"},`
                `,8,W)],512),[[a,d(m)]]),n(t("div",X,[t("object",{data:`${e.document.fullpath}`,type:"application/pdf",class:"w-full h-screen"},[t("p",null,[l("Unable to display PDF file. "),t("a",{href:`${e.document.fullpath}`},"Download",8,Z),l(" instead.")])],8,Y)],512),[[a,d(_)]])]),_:1})}}};export{at as default};