(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-10d8576c"],{"133c":function(t,e,s){"use strict";var a=s("d785"),i=s.n(a);i.a},"3cbc":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"pan-item",style:{zIndex:t.zIndex,height:t.height,width:t.width}},[s("div",{staticClass:"pan-info"},[s("div",{staticClass:"pan-info-roles-container"},[t._t("default")],2)]),t._v(" "),s("div",{staticClass:"pan-thumb",style:{backgroundImage:"url("+t.image+")"}})])},i=[],n=(s("c5f6"),{name:"PanThumb",props:{image:{type:String,required:!0},zIndex:{type:Number,default:1},width:{type:String,default:"150px"},height:{type:String,default:"150px"}}}),r=n,l=(s("133c"),s("2877")),c=Object(l["a"])(r,a,i,!1,null,"799537af",null);e["a"]=c.exports},"6e50":function(t,e,s){"use strict";var a=s("df1c"),i=s.n(a);i.a},c342:function(t,e,s){"use strict";var a=s("fdab"),i=s.n(a);i.a},d785:function(t,e,s){},df1c:function(t,e,s){},ecac:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"app-container"},[t.user?s("div",[s("el-row",{attrs:{gutter:20}},[s("el-col",{attrs:{span:6,xs:24}},[s("user-card",{attrs:{user:t.user}})],1),t._v(" "),s("el-col",{attrs:{span:18,xs:24}},[s("el-card",[s("el-tabs",{model:{value:t.activeTab,callback:function(e){t.activeTab=e},expression:"activeTab"}},[s("el-tab-pane",{attrs:{label:"工作经历",name:"timeline"}},[s("timeline")],1),t._v(" "),s("el-tab-pane",{attrs:{label:"Account",name:"account"}},[s("account",{attrs:{user:t.user}})],1)],1)],1)],1)],1)],1):t._e()])},i=[],n=(s("7f7f"),s("db72")),r=s("2f62"),l=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("el-card",{staticStyle:{"margin-bottom":"20px"}},[s("div",{staticClass:"clearfix",attrs:{slot:"header"},slot:"header"},[s("span",[t._v("About me")])]),t._v(" "),s("div",{staticClass:"user-profile"},[s("div",{staticClass:"box-center"},[s("pan-thumb",{attrs:{image:"https://wpimg.wallstcn.com/fb57f689-e1ab-443c-af12-8d4066e202e2.jpg"+t.avatarPrefix,height:"100px",width:"100px",hoverable:!1}},[s("div",[t._v("Hello")]),t._v("\n        "+t._s(t.user.name)+"\n      ")])],1)]),t._v(" "),s("div",{staticClass:"user-bio"},[s("div",{staticClass:"user-education user-bio-section"},[s("div",{staticClass:"user-bio-section-header"},[s("svg-icon",{attrs:{"icon-class":"education"}}),s("span",[t._v("Education")])],1),t._v(" "),s("div",{staticClass:"user-bio-section-body"},[s("div",{staticClass:"text-muted"},[t._v("\n          "+t._s(t.user.introduction)+"\n        ")])])]),t._v(" "),s("div",{staticClass:"user-skills user-bio-section"},[s("div",{staticClass:"user-bio-section-header"},[s("svg-icon",{attrs:{"icon-class":"skill"}}),s("span",[t._v("Skills")])],1),t._v(" "),s("div",{staticClass:"user-bio-section-body"},[s("div",{staticClass:"progress-item"},[s("span",[t._v("PHP")]),t._v(" "),s("el-progress",{attrs:{percentage:70}})],1),t._v(" "),s("div",{staticClass:"progress-item"},[s("span",[t._v("Laravel、Yii2、TP5")]),t._v(" "),s("el-progress",{attrs:{percentage:60}})],1),t._v(" "),s("div",{staticClass:"progress-item"},[s("span",[t._v("Mysql、Redis、Es")]),t._v(" "),s("el-progress",{attrs:{percentage:40}})],1),t._v(" "),s("div",{staticClass:"progress-item"},[s("span",[t._v("Vue、JavaScript、Css")]),t._v(" "),s("el-progress",{attrs:{percentage:30}})],1),t._v(" "),s("div",{staticClass:"progress-item"},[s("span",[t._v("Swoole、Workman")]),t._v(" "),s("el-progress",{attrs:{percentage:20}})],1),t._v(" "),s("div",{staticClass:"progress-item"},[s("span",[t._v("项目实战")]),t._v(" "),s("el-progress",{attrs:{percentage:100,status:"success"}})],1)])])])])},c=[],o=s("3cbc"),u="?imageView2/1/w/80/h/80",m={components:{PanThumb:o["a"]},data:function(){return{avatarPrefix:u}},props:{user:{type:Object,default:function(){return{name:"",email:"",avatar:"",roles:""}}}}},p=m,v=(s("c342"),s("2877")),d=Object(v["a"])(p,l,c,!1,null,"212665ee",null),f=d.exports,_=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"user-activity"},[s("div",{staticClass:"post"},[s("div",{staticClass:"user-block"},[s("img",{staticClass:"img-circle",attrs:{src:"https://wpimg.wallstcn.com/57ed425a-c71e-4201-9428-68760c0537c4.jpg"+t.avatarPrefix}}),t._v(" "),s("span",{staticClass:"username text-muted"},[t._v("Iron Man")]),t._v(" "),s("span",{staticClass:"description"},[t._v("Shared publicly - 7:30 PM today")])]),t._v(" "),s("p",[t._v("\n      Lorem ipsum represents a long-held tradition for designers,\n      typographers and the like. Some people hate it and argue for\n      its demise, but others ignore the hate as they create awesome\n      tools to help create filler text for everyone from bacon lovers\n      to Charlie Sheen fans.\n    ")]),t._v(" "),s("ul",{staticClass:"list-inline"},[t._m(0),t._v(" "),s("li",[s("span",{staticClass:"link-black text-sm"},[s("svg-icon",{attrs:{"icon-class":"like"}}),t._v("\n          Like\n        ")],1)])])]),t._v(" "),s("div",{staticClass:"post"},[s("div",{staticClass:"user-block"},[s("img",{staticClass:"img-circle",attrs:{src:"https://wpimg.wallstcn.com/9e2a5d0a-bd5b-457f-ac8e-86554616c87b.jpg"+t.avatarPrefix}}),t._v(" "),s("span",{staticClass:"username text-muted"},[t._v("Captain American")]),t._v(" "),s("span",{staticClass:"description"},[t._v("Sent you a message - yesterday")])]),t._v(" "),s("p",[t._v("\n      Lorem ipsum represents a long-held tradition for designers,\n      typographers and the like. Some people hate it and argue for\n      its demise, but others ignore the hate as they create awesome\n      tools to help create filler text for everyone from bacon lovers\n      to Charlie Sheen fans.\n    ")]),t._v(" "),s("ul",{staticClass:"list-inline"},[t._m(1),t._v(" "),s("li",[s("span",{staticClass:"link-black text-sm"},[s("svg-icon",{attrs:{"icon-class":"like"}}),t._v("\n          Like\n        ")],1)])])]),t._v(" "),s("div",{staticClass:"post"},[s("div",{staticClass:"user-block"},[s("img",{staticClass:"img-circle",attrs:{src:"https://wpimg.wallstcn.com/fb57f689-e1ab-443c-af12-8d4066e202e2.jpg"+t.avatarPrefix}}),t._v(" "),s("span",{staticClass:"username"},[t._v("Spider Man")]),t._v(" "),s("span",{staticClass:"description"},[t._v("Posted 4 photos - 2 days ago")])]),t._v(" "),s("div",{staticClass:"user-images"},[s("el-carousel",{attrs:{interval:6e3,type:"card",height:"220px"}},t._l(t.carouselImages,(function(e){return s("el-carousel-item",{key:e},[s("img",{staticClass:"image",attrs:{src:e+t.carouselPrefix}})])})),1)],1),t._v(" "),s("ul",{staticClass:"list-inline"},[t._m(2),t._v(" "),s("li",[s("span",{staticClass:"link-black text-sm"},[s("svg-icon",{attrs:{"icon-class":"like"}}),t._v(" Like")],1)])])])])},h=[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("li",[s("span",{staticClass:"link-black text-sm"},[s("i",{staticClass:"el-icon-share"}),t._v("\n          Share\n        ")])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("li",[s("span",{staticClass:"link-black text-sm"},[s("i",{staticClass:"el-icon-share"}),t._v("\n          Share\n        ")])])},function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("li",[s("span",{staticClass:"link-black text-sm"},[s("i",{staticClass:"el-icon-share"}),t._v(" Share")])])}],g="?imageView2/1/w/80/h/80",b="?imageView2/2/h/440",C={data:function(){return{carouselImages:["https://wpimg.wallstcn.com/9679ffb0-9e0b-4451-9916-e21992218054.jpg","https://wpimg.wallstcn.com/bcce3734-0837-4b9f-9261-351ef384f75a.jpg","https://wpimg.wallstcn.com/d1d7b033-d75e-4cd6-ae39-fcd5f1c0a7c5.jpg","https://wpimg.wallstcn.com/50530061-851b-4ca5-9dc5-2fead928a939.jpg"],avatarPrefix:g,carouselPrefix:b}}},x=C,k=(s("6e50"),Object(v["a"])(x,_,h,!1,null,"1066d76c",null)),y=k.exports,w=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"block"},[s("el-timeline",t._l(t.timeline,(function(e,a){return s("el-timeline-item",{key:a,attrs:{timestamp:e.timestamp,placement:"top"}},[s("el-card",[s("h4",[t._v(t._s(e.title))]),t._v(" "),s("p",[t._v(t._s(e.content))])])],1)})),1)],1)},j=[],S={data:function(){return{timeline:[{timestamp:"2015/05/01",title:"苏州乐邦美食有限公司",content:"实习1年，主要jquery，mysql，php搭建简单企业后台"},{timestamp:"2016/06/01",title:"一号农场",content:"工作1年多，主要负责ecshp电商系统二次开发，编写接口对接财务系统"},{timestamp:"2017/07/01",title:"上海毅进教育信息咨询公司",content:"工作3年，Yii2框架搭建公司CRM系统，lulucms搭建CMS系统，后转Laravel熟悉微信开发，小程序开发，前后分离模式，迭代公司CRM"},{timestamp:"2020/03/01",title:"常州昊视科技有限公司",content:"Workerman搭建IM系统，对接七牛云搭建直播系统"}]}}},P=S,E=Object(v["a"])(P,w,j,!1,null,null,null),$=E.exports,O=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("el-form",[s("el-form-item",{attrs:{label:"Name"}},[s("el-input",{model:{value:t.user.name,callback:function(e){t.$set(t.user,"name","string"===typeof e?e.trim():e)},expression:"user.name"}})],1),t._v(" "),s("el-form-item",{attrs:{label:"Email"}},[s("el-input",{model:{value:t.user.email,callback:function(e){t.$set(t.user,"email","string"===typeof e?e.trim():e)},expression:"user.email"}})],1),t._v(" "),s("el-form-item",[s("el-button",{attrs:{type:"primary"},on:{click:t.submit}},[t._v("Update")])],1)],1)},I=[],M={props:{user:{type:Object,default:function(){return{name:"",email:""}}}},methods:{submit:function(){this.$message({message:"User information has been updated successfully",type:"success",duration:5e3})}}},T=M,L=Object(v["a"])(T,O,I,!1,null,null,null),A=L.exports,U={name:"Profile",components:{UserCard:f,Activity:y,Timeline:$,Account:A},data:function(){return{user:{},activeTab:"timeline"}},computed:Object(n["a"])({},Object(r["b"])(["name","avatar","roles","introduction"])),created:function(){this.getUser()},methods:{getUser:function(){this.user={name:this.name,role:this.roles.join(" | "),email:"admin@test.com",avatar:this.avatar,introduction:this.introduction}}}},q=U,V=Object(v["a"])(q,a,i,!1,null,null,null);e["default"]=V.exports},fdab:function(t,e,s){}}]);