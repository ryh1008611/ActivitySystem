(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-140670a4"],{"333d":function(e,t,n){"use strict";var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"pagination-container",class:{hidden:e.hidden}},[n("el-pagination",e._b({staticStyle:{"text-align":"center"},attrs:{background:e.background,"current-page":e.currentPage,"page-size":e.pageSize,layout:e.layout,"page-sizes":e.pageSizes,total:e.total},on:{"update:currentPage":function(t){e.currentPage=t},"update:current-page":function(t){e.currentPage=t},"update:pageSize":function(t){e.pageSize=t},"update:page-size":function(t){e.pageSize=t},"size-change":e.handleSizeChange,"current-change":e.handleCurrentChange}},"el-pagination",e.$attrs,!1))],1)},i=[];n("c5f6");Math.easeInOutQuad=function(e,t,n,a){return e/=a/2,e<1?n/2*e*e+t:(e--,-n/2*(e*(e-2)-1)+t)};var s=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(e){window.setTimeout(e,1e3/60)}}();function r(e){document.documentElement.scrollTop=e,document.body.parentNode.scrollTop=e,document.body.scrollTop=e}function l(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function o(e,t,n){var a=l(),i=e-a,o=20,u=0;t="undefined"===typeof t?500:t;var c=function e(){u+=o;var l=Math.easeInOutQuad(u,a,i,t);r(l),u<t?s(e):n&&"function"===typeof n&&n()};c()}var u={name:"Pagination",props:{total:{required:!0,type:Number},page:{type:Number,default:1},limit:{type:Number,default:20},pageSizes:{type:Array,default:function(){return[10,20,30,50]}},layout:{type:String,default:"total, sizes, prev, pager, next, jumper"},background:{type:Boolean,default:!0},autoScroll:{type:Boolean,default:!0},hidden:{type:Boolean,default:!1}},computed:{currentPage:{get:function(){return this.page},set:function(e){this.$emit("update:page",e)}},pageSize:{get:function(){return this.limit},set:function(e){this.$emit("update:limit",e)}}},methods:{handleSizeChange:function(e){this.$emit("pagination",{page:this.currentPage,limit:e}),this.autoScroll&&o(0,800)},handleCurrentChange:function(e){this.$emit("pagination",{page:e,limit:this.pageSize}),this.autoScroll&&o(0,800)}}},c=u,d=(n("eaa8"),n("2877")),p=Object(d["a"])(c,a,i,!1,null,"0e8f124f",null);t["a"]=p.exports},"7de1":function(e,t,n){},a417:function(e,t,n){"use strict";n.d(t,"a",(function(){return i}));var a=n("b775");function i(e){return Object(a["a"])({url:"/v1/options",method:"get",params:e})}},eaa8:function(e,t,n){"use strict";var a=n("7de1"),i=n.n(a);i.a},fd7b:function(e,t,n){"use strict";n.r(t);var a=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"app-container"},[n("div",{staticClass:"filter-container"},[n("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"帐号"},nativeOn:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.handleFilter(t)}},model:{value:e.listQuery.username,callback:function(t){e.$set(e.listQuery,"username",t)},expression:"listQuery.username"}}),e._v(" "),n("el-button",{staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:e.handleFilter}},[e._v("\n      查询\n    ")]),e._v(" "),n("el-button",{staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-plus"},on:{click:e.handleAddRole}},[e._v("新增 ")])],1),e._v(" "),n("el-table",{directives:[{name:"loading",rawName:"v-loading",value:e.listLoading,expression:"listLoading"}],staticStyle:{width:"100%","margin-top":"30px"},attrs:{data:e.lists,border:"",fit:"","highlight-current-row":""}},[n("el-table-column",{attrs:{align:"center",label:"序号"},scopedSlots:e._u([{key:"default",fn:function(t){return[e._v("\n        "+e._s(t.$index+1)+"\n      ")]}}])}),e._v(" "),n("el-table-column",{attrs:{align:"center",label:"帐号"},scopedSlots:e._u([{key:"default",fn:function(t){return[e._v("\n        "+e._s(t.row.username)+"\n      ")]}}])}),e._v(" "),n("el-table-column",{attrs:{align:"center",label:"角色"},scopedSlots:e._u([{key:"default",fn:function(t){return[e._v("\n        "+e._s(t.row.role&&t.row.role.role_name)+"\n      ")]}}])}),e._v(" "),n("el-table-column",{attrs:{align:"center",label:"状态"},scopedSlots:e._u([{key:"default",fn:function(t){var a=t.row;return[n("el-tag",{attrs:{type:e._f("statusFilter")(1*a.status)}},[e._v("\n          "+e._s(e.statusArr[a.status])+"\n        ")])]}}])}),e._v(" "),n("el-table-column",{attrs:{align:"center",label:"操作"},scopedSlots:e._u([{key:"default",fn:function(t){return[1!=t.row.status?n("el-button",{attrs:{size:"small",type:"success"},on:{click:function(n){return e.handleModifyStatus(t.row,1)}}},[e._v("\n          启用\n        ")]):e._e(),e._v(" "),0!=t.row.status?n("el-button",{attrs:{size:"small"},on:{click:function(n){return e.handleModifyStatus(t.row,0)}}},[e._v("\n         停用\n        ")]):e._e(),e._v(" "),n("el-button",{attrs:{type:"primary",size:"small",icon:"el-icon-edit"},on:{click:function(n){return e.handleEdit(t)}}},[e._v("编辑")])]}}])})],1),e._v(" "),n("pagination",{directives:[{name:"show",rawName:"v-show",value:e.total>0,expression:"total>0"}],attrs:{total:e.total,page:e.listQuery.page,limit:e.listQuery.limit},on:{"update:page":function(t){return e.$set(e.listQuery,"page",t)},"update:limit":function(t){return e.$set(e.listQuery,"limit",t)},pagination:e.getUsers}}),e._v(" "),n("el-dialog",{attrs:{visible:e.dialogVisible,title:"edit"===e.dialogType?"修改":"新增"},on:{"update:visible":function(t){e.dialogVisible=t}}},[n("el-form",{attrs:{model:e.user,"label-width":"80px","label-position":"left"}},[n("el-form-item",{attrs:{label:"帐号"}},[n("el-input",{model:{value:e.user.username,callback:function(t){e.$set(e.user,"username",t)},expression:"user.username"}})],1),e._v(" "),n("el-form-item",{attrs:{label:"密码"}},[n("el-input",{attrs:{"show-password":""},model:{value:e.user.password,callback:function(t){e.$set(e.user,"password",t)},expression:"user.password"}})],1),e._v(" "),n("el-form-item",{attrs:{label:"角色"}},[n("el-select",{staticClass:"filter-item",attrs:{placeholder:"Please select"},model:{value:e.user.role_id,callback:function(t){e.$set(e.user,"role_id",t)},expression:"user.role_id"}},e._l(e.roles,(function(e,t,a){return n("el-option",{key:1*t,attrs:{label:e,value:1*t}})})),1)],1),e._v(" "),n("el-form-item",{attrs:{label:"状态"}},[n("el-select",{staticClass:"filter-item",attrs:{placeholder:"Please select"},model:{value:e.user.status,callback:function(t){e.$set(e.user,"status",t)},expression:"user.status"}},e._l(e.statusArr,(function(e,t){return n("el-option",{key:t,attrs:{label:e,value:t}})})),1)],1)],1),e._v(" "),n("div",{staticStyle:{"text-align":"right"}},[n("el-button",{attrs:{type:"danger"},on:{click:function(t){e.dialogVisible=!1}}},[e._v("取消")]),e._v(" "),n("el-button",{attrs:{type:"primary"},on:{click:e.confirmRole}},[e._v("确认")])],1)],1)],1)},i=[],s=(n("96cf"),n("3b8d")),r=n("c24f"),l=n("a417"),o=n("333d"),u={username:"",password:"",status:"",role_id:""},c={name:"userslist",components:{Pagination:o["a"]},filters:{statusFilter:function(e){var t=["danger","success"];return t[e]}},data:function(){return{lists:[],total:0,dialogVisible:!1,dialogType:"new",checkStrictly:!1,listLoading:!0,listQuery:{page:1,limit:10,username:void 0},user:Object.assign({},u),statusArr:["停用","启用"],options_key:{key:"roles"},roles:[]}},activated:function(){this.getUsers(),this.getRoles()},methods:{getUsers:function(){var e=this;this.listLoading=!0,Object(r["c"])(this.listQuery).then((function(t){e.lists=t.data.list,e.total=t.data.total,e.listLoading=!1}))},getRoles:function(){var e=this;Object(l["a"])(this.options_key).then((function(t){var n=t.data;e.roles=n}))},handleFilter:function(){this.listQuery.page=1,this.getUsers()()},handleAddRole:function(){this.dialogType="new",this.dialogVisible=!0,this.user=Object.assign({},u)},handleEdit:function(e){this.dialogType="edit",this.dialogVisible=!0,this.checkStrictly=!0,this.user=e.row},confirmRole:function(){var e=Object(s["a"])(regeneratorRuntime.mark((function e(){var t;return regeneratorRuntime.wrap((function(e){while(1)switch(e.prev=e.next){case 0:if(t="edit"===this.dialogType,!t){e.next=6;break}return e.next=4,Object(r["f"])(this.user.id,this.user);case 4:e.next=9;break;case 6:return e.next=8,Object(r["a"])(this.user);case 8:this.listQuery.page=1;case 9:this.getUsers(),this.dialogVisible=!1,this.$notify({title:"Success",type:"success",duration:2e3});case 12:case"end":return e.stop()}}),e,this)})));function t(){return e.apply(this,arguments)}return t}(),handleModifyStatus:function(e,t){this.$message({message:"Success",type:"success"}),e.status=t,Object(r["f"])(e.id,e)}}},d=c,p=n("2877"),f=Object(p["a"])(d,a,i,!1,null,null,null);t["default"]=f.exports}}]);