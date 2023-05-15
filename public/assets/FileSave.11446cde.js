import{d as _,e as f,u,y as r,E as v,w as b,k as s,I as p,s as g,o as h,b as o,g as a,J as i,L as c,h as w}from"./index.f718b679.js";import{S as y}from"./sweetalert2.all.59526288.js";const V={class:"card mb-5 mb-xl-10"},k=o("div",{class:"card-header border-0 cursor-pointer",role:"button","data-bs-toggle":"collapse","data-bs-target":"#files_save_overview","aria-expanded":"true","aria-controls":"files_save_overview"},[o("div",{class:"card-title m-0"},[o("h3",{class:"fw-bold m-0"},"Dane podstawowe")])],-1),x={id:"files_save_overview",class:"collapse show"},B={class:"card-body border-top p-9"},q={class:"row mb-6"},F=o("label",{class:"col-lg-3 col-form-label required fw-semobold fs-6"},"Nazwa dokumentu",-1),S={class:"col-lg-9"},U={class:"row"},z={class:"col-lg-12 fv-row"},N={class:"fv-plugins-message-container"},C={class:"fv-help-block"},A={class:"row mb-6"},E=o("label",{class:"col-lg-3 col-form-label required fw-semobold fs-6"},"Kod dokumentu",-1),K={class:"col-lg-9"},R={class:"row"},T={class:"col-lg-12 fv-row"},Z={class:"fv-plugins-message-container"},j={class:"fv-help-block"},D={class:"row mb-6"},I=o("label",{class:"col-lg-3 col-form-label required fw-semobold fs-6"},"type type",-1),J={class:"col-lg-9"},L={class:"row"},M={class:"col-lg-12 fv-row"},P={class:"fv-plugins-message-container"},$={class:"fv-help-block"},G={class:"row mb-6"},H=o("label",{class:"col-lg-3 col-form-label required fw-semobold fs-6"},"file_category_id",-1),O={class:"col-lg-9"},Q={class:"row"},W={class:"col-lg-12 fv-row"},X={class:"fv-plugins-message-container"},Y={class:"fv-help-block"},oo={class:"row mb-6"},so=o("label",{class:"col-lg-3 col-form-label required fw-semobold fs-6"},"draft",-1),eo={class:"col-lg-9"},lo={class:"row"},to={class:"col-lg-12 fv-row"},ao={class:"fv-plugins-message-container"},io={class:"fv-help-block"},co={class:"row mb-6"},no=o("label",{class:"col-lg-3 col-form-label required fw-semobold fs-6"},"file",-1),ro={class:"col-lg-9"},mo={class:"row"},_o={class:"col-lg-12 fv-row"},fo={class:"fv-plugins-message-container"},uo={class:"fv-help-block"},vo=o("span",{class:"indicator-label"}," Zapisz ",-1),bo=o("span",{class:"indicator-progress"},[w(" Prosz\u0119 czeka\u0107... "),o("span",{class:"spinner-border spinner-border-sm align-middle ms-2"})],-1),po=[vo,bo],yo=_({__name:"FileSave",setup(go){f(),u();const d=r(null);let l=r({name:"",code:"",type:"",file_category_id:"",draft:"",file:""});function m(){d.value&&(d.value.disabled=!0,d.value.setAttribute("data-kt-indicator","on")),g.dispatch("files/saveFile",l.value).then(n=>{alert("Zapisano!")}).catch(n=>{var e;y.fire({text:n.response.data.message,icon:"error",buttonsStyling:!1,confirmButtonText:"Spr\xF3buj ponownie!",customClass:{confirmButton:"btn fw-bold btn-light-danger"}}),(e=d.value)==null||e.removeAttribute("data-kt-indicator"),d.value.disabled=!1})}return(n,e)=>(h(),v(s(p),{class:"form w-100 fv-plugins-bootstrap5 fv-plugins-framework",novalidate:"novalidate",files:"true",onSubmit:e[6]||(e[6]=t=>m())},{default:b(()=>[o("div",V,[k,o("div",x,[o("div",B,[o("div",q,[F,o("div",S,[o("div",U,[o("div",z,[a(s(i),{type:"text",name:"name",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0",placeholder:"Nazwa dokumentu",modelValue:s(l).name,"onUpdate:modelValue":e[0]||(e[0]=t=>s(l).name=t)},null,8,["modelValue"]),o("div",N,[o("div",C,[a(s(c),{name:"name"})])])])])])]),o("div",A,[E,o("div",K,[o("div",R,[o("div",T,[a(s(i),{type:"text",name:"code",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0",placeholder:"Kod dokumentu",modelValue:s(l).code,"onUpdate:modelValue":e[1]||(e[1]=t=>s(l).code=t)},null,8,["modelValue"]),o("div",Z,[o("div",j,[a(s(c),{name:"code"})])])])])])]),o("div",D,[I,o("div",J,[o("div",L,[o("div",M,[a(s(i),{type:"text",name:"type",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0",placeholder:"type type",modelValue:s(l).type,"onUpdate:modelValue":e[2]||(e[2]=t=>s(l).type=t)},null,8,["modelValue"]),o("div",P,[o("div",$,[a(s(c),{name:"type"})])])])])])]),o("div",G,[H,o("div",O,[o("div",Q,[o("div",W,[a(s(i),{type:"text",name:"file_category_id",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0",placeholder:"file_category_id",modelValue:s(l).file_category_id,"onUpdate:modelValue":e[3]||(e[3]=t=>s(l).file_category_id=t)},null,8,["modelValue"]),o("div",X,[o("div",Y,[a(s(c),{name:"file_category_id"})])])])])])]),o("div",oo,[so,o("div",eo,[o("div",lo,[o("div",to,[a(s(i),{type:"text",name:"draft",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0",placeholder:"draft",modelValue:s(l).draft,"onUpdate:modelValue":e[4]||(e[4]=t=>s(l).draft=t)},null,8,["modelValue"]),o("div",ao,[o("div",io,[a(s(c),{name:"draft"})])])])])])]),o("div",co,[no,o("div",ro,[o("div",mo,[o("div",_o,[a(s(i),{type:"file",name:"file",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0",modelValue:s(l).file,"onUpdate:modelValue":e[5]||(e[5]=t=>s(l).file=t)},null,8,["modelValue"]),o("div",fo,[o("div",uo,[a(s(c),{name:"file"})])])])])])]),o("button",{ref_key:"submitButton",ref:d,type:"submit",class:"btn btn-lg btn-primary w-100"},po,512)])])])]),_:1}))}});export{yo as default};
