import{d as _,o as t,c as u,b as a,t as r,j as c,F as f,i as k,e as g,f as w,r as h,E as n,w as d,k as p,g as o,h as x,s as z}from"./index.f651692c.js";import{_ as j}from"./Details.vue_vue_type_script_setup_true_lang.7a806801.js";import{E as P}from"./EditIcon.c0f536a8.js";import{i as S}from"./AuthService.3bc398e3.js";const K={class:"mb-6"},B={class:"mb-2"},T={key:0,class:"mb-2"},C={class:"d-flex flex-wrap"},E={class:"flex-equal"},I={class:"row fs-6 fw-semibold gs-0 gy-2 gx-2 m-0 align-items-start"},N={class:"col-md-6 d-flex my-2"},O={class:"text-gray-400 w-150px align-self-start"},R={class:"text-gray-800 align-self-start"},i=_({__name:"DetailsRow",props:{title:{},description:{},details:{}},setup(v){return(l,e)=>(t(),u("div",K,[a("h5",B,r(l.title),1),l.description?(t(),u("div",T,r(l.description),1)):c("",!0),a("div",C,[a("div",E,[a("div",I,[(t(!0),u(f,null,k(l.details,s=>(t(),u("div",N,[a("div",O,r(s.label),1),a("div",R,r(s.value),1)]))),256))])])])]))}}),V={class:"svg-icon svg-icon-muted svg-icon-3"},L=_({__name:"ProductViewHome",setup(v){const l=g(),e=w(()=>z.state.products.product.data);function s(){return e.value.kind==="I"?"Inwestycyjny":e.value.kind==="O"?"Ochronny":e.value.kind==="P"?"Pracowniczy":e.value.kind==="B"?"Bancassurance":""}function m(){return e.value.type==="I"?"Indywidualny":e.value.type==="G"?"Grupowy":""}function y(){return e.value.premium_type==="R"?"Regularna":e.value.premium_type==="S"?"Jednorazowa":""}return(D,M)=>{const b=h("router-link");return t(),n(j,{title:"Szczeg\xF3\u0142y produktu"},{toolbar:d(()=>[p(S)?(t(),n(b,{key:0,to:{name:"ProductUpdate",params:{id:p(l).params.id}},class:"btn btn-sm btn-light-primary"},{default:d(()=>[a("span",V,[o(P)]),x("Edytuj")]),_:1},8,["to"])):c("",!0)]),default:d(()=>[o(i,{title:"Podstawowe informacje",details:[{label:"Nazwa",value:e.value.name},{label:"Rodzaj",value:s()},{label:"Kod TOiL",value:e.value.code_toil},{label:"Typ",value:m()},{label:"Kod OWU",value:e.value.code_owu},{label:"Sk\u0142adka",value:y()},{label:"Kod produktu",value:e.value.code},{label:"Okres ubezpieczenia",value:e.value.period_of_insurance},{label:"Kod grupy",value:e.value.group_code},{label:"Grupwa produktowa",value:e.value.group_name},{label:"Partner",value:e.value.partner_name},{label:"Kod partnera",value:e.value.partner_code},{label:"System produktowy",value:e.value.system_name},{label:"Status wdro\u017Cenia",value:e.value.system_status}]},null,8,["details"]),o(i,{title:"Ubezpieczaj\u0105cy",details:[{label:"Minimalny wiek",value:e.value.insurer_min_age},{label:"Maksymalny wiek",value:e.value.insurer_max_age}]},null,8,["details"]),o(i,{title:"Ubezpieczony",details:[{label:"Minimalny wiek",value:e.value.insured_min_age},{label:"Maksymalny wiek",value:e.value.insured_max_age}]},null,8,["details"]),e.value.is_subscriptions?(t(),n(i,{key:0,title:"Subskrypcja",description:"Ten produkt jest produktem subskrypcyjnym.",details:[{label:"Kod",value:e.value.subscription_code},{label:"Status",value:e.value.subscription_status},{label:"Data od",value:e.value.subscription_date_from},{label:"Data do",value:e.value.subscription_date_to}]},null,8,["details"])):c("",!0)]),_:1})}}});export{L as default};