import{d as E,y as f,f as u,e as N,m as P,s as c,x as S,r as I,c as n,g as C,w as g,o as s,k as b,E as T,b as t,h as L,j as m,z as Z,A as R,n as U,F as k,i as y,t as w}from"./index.9d87a49a.js";import{_ as W}from"./Details.vue_vue_type_script_setup_true_lang.28531b6e.js";import{a as q,A as G}from"./DataTable.f7fe463d.js";import{i as H}from"./AuthService.242eb547.js";const J={class:"svg-icon svg-icon-3"},K={key:0},O={class:"row"},Q={class:"col-12"},X={class:"d-inline-flex"},Y={class:"d-flex align-items-center position-relative"},tt=t("span",{class:"svg-icon svg-icon-1 position-absolute ms-6"},[t("svg",{width:"24",height:"24",viewBox:"0 0 24 24",fill:"none",xmlns:"http://www.w3.org/2000/svg"},[t("rect",{opacity:"0.5",x:"17.0365",y:"15.1223",width:"8.15546",height:"2",rx:"1",transform:"rotate(45 17.0365 15.1223)",fill:"currentColor"}),t("path",{d:"M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z",fill:"currentColor"})])],-1),et={class:"row mb-10"},ot={class:"col-md-6"},st={key:0},nt={class:"card card-custom shadow-none p-0 m-0"},at={class:"card-header border-0 p-0 m-0 min-h-60px"},lt={class:"card-title fw-bold"},it=t("div",{class:"card-toolbar"},[t("a",{href:"#",class:"btn btn-link btn-color-primary btn-active-color-primary btn-sm","data-skin":"primary","data-toggle":"tooltip","data-html":"true","data-original-title":"Pobierz poni\u017Csze dokumenty jako <b>.zip</b>"})],-1),rt={class:"card-body p-0 m-0"},ct={class:"mb-2"},dt={class:"d-flex align-items-center cursor-pointer"},ut={key:0},mt={class:"form-check form-check-sm form-check-custom form-check-solid me-3"},ht=["name","value","id"],pt=["onClick"],_t=["src"],vt=["onClick"],ft={class:"fs-7 fw-normal text-gray-800 mt-auto"},gt={class:"fs-7 fw-normal text-gray-400 mt-auto"},bt=t("div",{class:"my-0"},null,-1),Ft=E({__name:"ProductViewFiles",setup(kt){let z=f(!1);const h=()=>q(a.value,p.value,r.value),a=u(()=>c.state.products.product.files.data),F=u(()=>c.state.products.product.files.loading);let p=f([]);u(()=>c.getters.layoutConfig("general.layout"));const D=u(()=>c.getters.getThemeMode),M="http://bazawiedzy.int.openlife.pl",j="http://bazawiedzy.int.openlife.pl",V=N(),$=()=>{const l=[];a.value.forEach(i=>{const _=i.file_category.name;l.includes(_)||l.push(_)}),l.sort().reverse();const o=Math.ceil(l.length/2),d=l;return[d.slice(0,o),d.slice(o)]},x=l=>{let o=j+`/api/files/${l.id}`;window.open(o,"_blank")};P(()=>{c.dispatch("products/getProductFiles",V.params.id).then(()=>{p.value.splice(0,a.value.length,...a.value),S(),h()})});const r=f({global:"",draft:"0"}),B=()=>{a.value.splice(0,a.value.length,...p.value),r.value.draft=r.value.draft===""?"0":"",h()};return(l,o)=>{const d=I("router-link");return s(),n("div",null,[C(W,{title:"Dokumenty"},{toolbar:g(()=>[b(H)?(s(),T(d,{key:0,to:{name:"FileCreate"},class:"btn btn-light-primary font-weight-bold btn-flex btn-sm ms-2 card-rounded"},{default:g(()=>[t("span",J,[C(G)]),L(" Dodaj dokument ")]),_:1})):m("",!0)]),default:g(()=>[F.value?(s(),n("div",K," \u0141adowanie... ")):m("",!0),t("div",O,[t("div",Q,[t("div",X,[t("div",Y,[tt,Z(t("input",{type:"text","onUpdate:modelValue":o[0]||(o[0]=i=>r.value.global=i),onInput:o[1]||(o[1]=i=>h()),placeholder:"Wyszukaj dokument\xF3w...",class:"form-control form-control-sm card-rounded ps-15",style:{width:"250px",display:"inline-flex","border-style":"dashed","border-color":"#5E6278"}},null,544),[[R,r.value.global]])])]),t("a",{class:U(["btn btn-outline btn-outline-dashed btn-outline-info font-weight-bold btn-flex btn-sm ms-2 card-rounded",{active:r.value.draft!=="0"}]),onClick:o[2]||(o[2]=i=>B())}," Poka\u017C robocze ",2)])]),t("div",et,[(s(!0),n(k,null,y($(),(i,_)=>(s(),n("div",ot,[t("div",null,[(s(!0),n(k,null,y(i,(v,yt)=>(s(),n("div",null,[a.value.filter(e=>e.file_category.name==v).length>0?(s(),n("div",st,[t("div",nt,[t("div",at,[t("h3",lt,w(v),1),it]),t("div",rt,[(s(!0),n(k,null,y(a.value.filter(e=>e.file_category.name==v),e=>(s(),n("div",null,[t("div",ct,[t("div",dt,[b(z)?(s(),n("div",ut,[t("div",mt,[t("input",{class:"form-check-input",type:"checkbox",name:e.id.toString(),value:e.id,id:e.id.toString()},null,8,ht)])])):m("",!0),t("div",{onClick:A=>x(e),class:"me-3"},[t("img",{src:b(M)+"/media/svg/files/"+e.extension+(D.value==="light"?"":"-dark")+".svg",style:{width:"35px"}},null,8,_t)],8,pt),t("div",{onClick:A=>x(e),class:"d-flex flex-column flex-grow-1"},[t("span",ft,w(e.name),1),t("span",gt," Data ostatniej edycji: "+w(new Date(e.updated_at).toLocaleDateString()),1)],8,vt),bt])])]))),256))])])])):m("",!0)]))),256))])]))),256))])]),_:1})])}}});export{Ft as default};