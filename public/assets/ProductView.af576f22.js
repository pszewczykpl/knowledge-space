import{d as _,c as a,b as t,t as c,D as $,o,F as g,i as k,e as S,f,m as V,s as d,r as h,j as C,g as n,w as u,k as w,n as x,h as b}from"./index.3bc8ff3c.js";const N={class:"card mb-5 mb-xl-8"},P={class:"card-header"},z={class:"card-title"},F={class:"card-body pt-0 fs-6"},B=_({__name:"Summary",props:{title:{}},setup(m){return(e,s)=>(o(),a("div",N,[t("div",P,[t("div",z,[t("h2",null,c(e.title),1)])]),t("div",F,[$(e.$slots,"default")])]))}}),D={class:"mb-7 mt-7"},T={class:"mb-4"},j={class:"table fs-6 gs-0 gy-2 gx-2"},L={class:"text-gray-400 w-25"},O={class:"text-gray-800"},R=_({__name:"SummaryRow",props:{title:{},details:{}},setup(m){return(e,s)=>(o(),a("div",D,[t("h5",T,c(e.title),1),t("table",j,[t("tbody",null,[(o(!0),a(g,null,k(e.details,(r,i)=>(o(),a("tr",null,[t("td",L,c(i),1),t("td",O,c(r),1)]))),256))])])]))}}),A={key:0},E={class:"d-flex flex-column flex-xl-row"},G={class:"flex-column flex-lg-row-auto w-100 w-xl-350px mb-10"},I={class:"flex-lg-row-fluid ms-lg-15"},K={class:"nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8"},M={class:"nav-item"},U={class:"nav-item"},W=t("li",{class:"nav-item ms-auto"},null,-1),H=_({__name:"ProductView",setup(m){const e=S(),s=f(()=>d.state.products.product.data),r=f(()=>d.state.products.product.loading);V(()=>{d.dispatch("products/getProduct",e.params.id)});const i=p=>{let l;if(String(e.path).includes("/files")?l="/files":String(e.path).includes("/funds")?l="/funds":l="/",p===l)return!0};return(p,l)=>{const v=h("router-link"),y=h("router-view");return o(),a(g,null,[r.value?(o(),a("div",A," \u0141adowanie... ")):C("",!0),t("div",E,[t("div",G,[n(B,{title:"Podsumowanie"},{default:u(()=>[n(R,{title:"Szczeg\xF3\u0142y produktu",details:{Nazwa:s.value.name,TOiL:s.value.code_toil,OWU:s.value.code_owu,Kod:s.value.code,Grupa:s.value.group_code,Typ:s.value.type}},null,8,["details"])]),_:1})]),t("div",I,[t("ul",K,[t("li",M,[n(v,{to:{name:"ProductView",params:{id:w(e).params.id}},class:x([{active:i("/")},"nav-link text-active-primary pb-4"])},{default:u(()=>[b("Informacje")]),_:1},8,["to","class"])]),t("li",U,[n(v,{to:{name:"ProductViewFiles",params:{id:w(e).params.id}},class:x([{active:i("/files")},"nav-link text-active-primary pb-4"])},{default:u(()=>[b("Dokumenty")]),_:1},8,["to","class"])]),W]),t("div",null,[t("div",null,[n(y)])])])])],64)}}});export{H as default};
