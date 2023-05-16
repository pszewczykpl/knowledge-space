import{d as h,e as x,u as L,y as m,s as r,f as _,c as g,k as e,j as B,g as a,w as n,I as N,F as z,o as v,b as i,J as u,h as S}from"./index.01a7ca81.js";import{c as U,a as c}from"./object.4acb7d5e.js";import{S as F}from"./sweetalert2.all.2a1cb9e9.js";import{_ as R,a as p,b as f}from"./FormRow.vue_vue_type_script_setup_true_lang.4129d059.js";const $={key:0},C=i("span",{class:"indicator-label"},"Zapisz",-1),q=i("span",{class:"indicator-progress"},[S("Prosz\u0119 czeka\u0107... "),i("span",{class:"spinner-border spinner-border-sm align-middle ms-2"})],-1),O=[C,q],I=h({__name:"LinkSave",setup(j){const b=x(),w=L(),l=m(null),V=U().shape({name:c().required().label("Nazwa"),description:c().nullable().label("Opis"),url:c().required().label("URL")});let k=m(!1),t=m({name:"",description:"",url:""});typeof b.params.id<"u"&&(r.dispatch("links/getLink",b.params.id),t=_(()=>r.state.links.link.data),k=_(()=>r.state.links.link.loading));async function y(){l.value&&(l.value.disabled=!0,l.value.setAttribute("data-kt-indicator","on"));try{const d=await r.dispatch("links/saveLink",t.value);w.push({name:"Links"})}catch(d){F.fire({text:d.response.data.message,icon:"error",buttonsStyling:!1,confirmButtonText:"Spr\xF3buj ponownie!",customClass:{confirmButton:"btn fw-bold btn-light-danger"}}),l.value&&(l.value.removeAttribute("data-kt-indicator"),l.value.disabled=!1)}}return(d,o)=>(v(),g(z,null,[e(k)?(v(),g("div",$," \u0141adowanie... ")):B("",!0),a(e(N),{class:"form w-100 fv-plugins-bootstrap5 fv-plugins-framework",novalidate:"novalidate",onSubmit:o[3]||(o[3]=s=>y()),"validation-schema":e(V)},{default:n(()=>[i("button",{ref_key:"submitButton",ref:l,type:"submit",class:"btn btn-lg btn-primary mb-5"},O,512),a(R,{title:"Dane podstawowe"},{default:n(()=>[a(p,{label:"Nazwa",required:""},{default:n(()=>[a(e(u),{type:"text",name:"name",modelValue:e(t).name,"onUpdate:modelValue":o[0]||(o[0]=s=>e(t).name=s),placeholder:"Nazwa",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0"},null,8,["modelValue"]),a(f,{name:"name"})]),_:1}),a(p,{label:"Opis"},{default:n(()=>[a(e(u),{type:"text",name:"description",modelValue:e(t).description,"onUpdate:modelValue":o[1]||(o[1]=s=>e(t).description=s),placeholder:"Opis",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0"},null,8,["modelValue"]),a(f,{name:"description"})]),_:1}),a(p,{label:"URL"},{default:n(()=>[a(e(u),{type:"text",name:"url",modelValue:e(t).url,"onUpdate:modelValue":o[2]||(o[2]=s=>e(t).url=s),placeholder:"URL",class:"form-control form-control-lg form-control-solid mb-3 mb-lg-0"},null,8,["modelValue"]),a(f,{name:"url"})]),_:1})]),_:1})]),_:1},8,["validation-schema"])],64))}});export{I as default};