(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-commons"],{1004:function(e,t,n){},"133c":function(e,t,n){"use strict";var i=n("d785"),a=n.n(i);a.a},"16d8":function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{attrs:{id:e.id}})},a=[],r=n("db72"),l=(n("a7be"),n("44f8"),n("a6e0"),n("547e")),o=n.n(l),s={minHeight:"200px",previewStyle:"vertical",useCommandShortcut:!0,useDefaultHTMLSanitizer:!0,usageStatistics:!1,hideModeSwitch:!1,toolbarItems:["heading","bold","italic","strike","divider","hr","quote","divider","ul","ol","task","indent","outdent","divider","table","image","link","divider","code","codeblock"]},u={name:"MarkdownEditor",props:{value:{type:String,default:""},id:{type:String,required:!1,default:function(){return"markdown-editor-"+ +new Date+(1e3*Math.random()).toFixed(0)}},options:{type:Object,default:function(){return s}},mode:{type:String,default:"markdown"},height:{type:String,required:!1,default:"300px"},language:{type:String,required:!1,default:"zh_CN"}},data:function(){return{editor:null}},computed:{editorOptions:function(){var e=Object.assign({},s,this.options);return e.initialEditType=this.mode,e.height=this.height,e.language=this.language,e}},watch:{value:function(e,t){e!==t&&e!==this.editor.getValue()&&this.editor.setValue(e)},language:function(e){this.destroyEditor(),this.initEditor()},height:function(e){this.editor.height(e)},mode:function(e){this.editor.changeMode(e)}},mounted:function(){this.initEditor()},destroyed:function(){this.destroyEditor()},methods:{initEditor:function(){var e=this;this.editor=new o.a(Object(r["a"])({el:document.getElementById(this.id)},this.editorOptions)),this.value&&this.editor.setValue(this.value),this.editor.on("change",(function(){e.$emit("input",e.editor.getValue())}))},destroyEditor:function(){this.editor&&(this.editor.off("change"),this.editor.remove())},setValue:function(e){this.editor.setValue(e)},getValue:function(){return this.editor.getValue()},setHtml:function(e){this.editor.setHtml(e)},getHtml:function(){return this.editor.getHtml()}}},c=u,d=n("2877"),h=Object(d["a"])(c,i,a,!1,null,null,null);t["a"]=h.exports},"1aba":function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"material-input__component",class:e.computedClasses},[n("div",{class:{iconClass:e.icon}},[e.icon?n("i",{staticClass:"el-input__icon material-input__icon",class:["el-icon-"+e.icon]}):e._e(),e._v(" "),"email"===e.type?n("input",{directives:[{name:"model",rawName:"v-model",value:e.currentValue,expression:"currentValue"}],staticClass:"material-input",attrs:{name:e.name,placeholder:e.fillPlaceHolder,readonly:e.readonly,disabled:e.disabled,autocomplete:e.autoComplete,required:e.required,type:"email"},domProps:{value:e.currentValue},on:{focus:e.handleMdFocus,blur:e.handleMdBlur,input:[function(t){t.target.composing||(e.currentValue=t.target.value)},e.handleModelInput]}}):e._e(),e._v(" "),"url"===e.type?n("input",{directives:[{name:"model",rawName:"v-model",value:e.currentValue,expression:"currentValue"}],staticClass:"material-input",attrs:{name:e.name,placeholder:e.fillPlaceHolder,readonly:e.readonly,disabled:e.disabled,autocomplete:e.autoComplete,required:e.required,type:"url"},domProps:{value:e.currentValue},on:{focus:e.handleMdFocus,blur:e.handleMdBlur,input:[function(t){t.target.composing||(e.currentValue=t.target.value)},e.handleModelInput]}}):e._e(),e._v(" "),"number"===e.type?n("input",{directives:[{name:"model",rawName:"v-model",value:e.currentValue,expression:"currentValue"}],staticClass:"material-input",attrs:{name:e.name,placeholder:e.fillPlaceHolder,step:e.step,readonly:e.readonly,disabled:e.disabled,autocomplete:e.autoComplete,max:e.max,min:e.min,minlength:e.minlength,maxlength:e.maxlength,required:e.required,type:"number"},domProps:{value:e.currentValue},on:{focus:e.handleMdFocus,blur:e.handleMdBlur,input:[function(t){t.target.composing||(e.currentValue=t.target.value)},e.handleModelInput]}}):e._e(),e._v(" "),"password"===e.type?n("input",{directives:[{name:"model",rawName:"v-model",value:e.currentValue,expression:"currentValue"}],staticClass:"material-input",attrs:{name:e.name,placeholder:e.fillPlaceHolder,readonly:e.readonly,disabled:e.disabled,autocomplete:e.autoComplete,max:e.max,min:e.min,required:e.required,type:"password"},domProps:{value:e.currentValue},on:{focus:e.handleMdFocus,blur:e.handleMdBlur,input:[function(t){t.target.composing||(e.currentValue=t.target.value)},e.handleModelInput]}}):e._e(),e._v(" "),"tel"===e.type?n("input",{directives:[{name:"model",rawName:"v-model",value:e.currentValue,expression:"currentValue"}],staticClass:"material-input",attrs:{name:e.name,placeholder:e.fillPlaceHolder,readonly:e.readonly,disabled:e.disabled,autocomplete:e.autoComplete,required:e.required,type:"tel"},domProps:{value:e.currentValue},on:{focus:e.handleMdFocus,blur:e.handleMdBlur,input:[function(t){t.target.composing||(e.currentValue=t.target.value)},e.handleModelInput]}}):e._e(),e._v(" "),"text"===e.type?n("input",{directives:[{name:"model",rawName:"v-model",value:e.currentValue,expression:"currentValue"}],staticClass:"material-input",attrs:{name:e.name,placeholder:e.fillPlaceHolder,readonly:e.readonly,disabled:e.disabled,autocomplete:e.autoComplete,minlength:e.minlength,maxlength:e.maxlength,required:e.required,type:"text"},domProps:{value:e.currentValue},on:{focus:e.handleMdFocus,blur:e.handleMdBlur,input:[function(t){t.target.composing||(e.currentValue=t.target.value)},e.handleModelInput]}}):e._e(),e._v(" "),n("span",{staticClass:"material-input-bar"}),e._v(" "),n("label",{staticClass:"material-label"},[e._t("default")],2)])])},a=[],r=(n("c5f6"),{name:"MdInput",props:{icon:String,name:String,type:{type:String,default:"text"},value:[String,Number],placeholder:String,readonly:Boolean,disabled:Boolean,min:String,max:String,step:String,minlength:Number,maxlength:Number,required:{type:Boolean,default:!0},autoComplete:{type:String,default:"off"},validateEvent:{type:Boolean,default:!0}},data:function(){return{currentValue:this.value,focus:!1,fillPlaceHolder:null}},computed:{computedClasses:function(){return{"material--active":this.focus,"material--disabled":this.disabled,"material--raised":Boolean(this.focus||this.currentValue)}}},watch:{value:function(e){this.currentValue=e}},methods:{handleModelInput:function(e){var t=e.target.value;this.$emit("input",t),"ElFormItem"===this.$parent.$options.componentName&&this.validateEvent&&this.$parent.$emit("el.form.change",[t]),this.$emit("change",t)},handleMdFocus:function(e){this.focus=!0,this.$emit("focus",e),this.placeholder&&""!==this.placeholder&&(this.fillPlaceHolder=this.placeholder)},handleMdBlur:function(e){this.focus=!1,this.$emit("blur",e),this.fillPlaceHolder=null,"ElFormItem"===this.$parent.$options.componentName&&this.validateEvent&&this.$parent.$emit("el.form.blur",[this.currentValue])}}}),l=r,o=(n("49b7"),n("2877")),s=Object(o["a"])(l,i,a,!1,null,"9d7baaf6",null);t["a"]=s.exports},"2c65":function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("el-select",e._g(e._b({ref:"dragSelect",staticClass:"drag-select",attrs:{multiple:"",filterable:""},model:{value:e.selectVal,callback:function(t){e.selectVal=t},expression:"selectVal"}},"el-select",e.$attrs,!1),e.$listeners),[e._t("default")],2)},a=[],r=n("75fc"),l=n("53fe"),o=n.n(l),s={name:"DragSelect",props:{value:{type:Array,required:!0}},computed:{selectVal:{get:function(){return Object(r["a"])(this.value)},set:function(e){this.$emit("input",Object(r["a"])(e))}}},mounted:function(){this.setSort()},methods:{setSort:function(){var e=this,t=this.$refs.dragSelect.$el.querySelectorAll(".el-select__tags > span")[0];this.sortable=o.a.create(t,{ghostClass:"sortable-ghost",setData:function(e){e.setData("Text","")},onEnd:function(t){var n=e.value.splice(t.oldIndex,1)[0];e.value.splice(t.newIndex,0,n)}})}}},u=s,c=(n("d9e4"),n("2877")),d=Object(c["a"])(u,i,a,!1,null,"2c27c150",null);t["a"]=d.exports},"2f737":function(e,t,n){"use strict";var i=n("af47"),a=n.n(i);a.a},"333d":function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"pagination-container",class:{hidden:e.hidden}},[n("el-pagination",e._b({staticStyle:{"text-align":"center"},attrs:{background:e.background,"current-page":e.currentPage,"page-size":e.pageSize,layout:e.layout,"page-sizes":e.pageSizes,total:e.total},on:{"update:currentPage":function(t){e.currentPage=t},"update:current-page":function(t){e.currentPage=t},"update:pageSize":function(t){e.pageSize=t},"update:page-size":function(t){e.pageSize=t},"size-change":e.handleSizeChange,"current-change":e.handleCurrentChange}},"el-pagination",e.$attrs,!1))],1)},a=[],r=(n("c5f6"),n("09f4")),l={name:"Pagination",props:{total:{required:!0,type:Number},page:{type:Number,default:1},limit:{type:Number,default:20},pageSizes:{type:Array,default:function(){return[10,20,30,50]}},layout:{type:String,default:"total, sizes, prev, pager, next, jumper"},background:{type:Boolean,default:!0},autoScroll:{type:Boolean,default:!0},hidden:{type:Boolean,default:!1}},computed:{currentPage:{get:function(){return this.page},set:function(e){this.$emit("update:page",e)}},pageSize:{get:function(){return this.limit},set:function(e){this.$emit("update:limit",e)}}},methods:{handleSizeChange:function(e){this.$emit("pagination",{page:this.currentPage,limit:e}),this.autoScroll&&Object(r["a"])(0,800)},handleCurrentChange:function(e){this.$emit("pagination",{page:e,limit:this.pageSize}),this.autoScroll&&Object(r["a"])(0,800)}}},o=l,s=(n("eaa8"),n("2877")),u=Object(s["a"])(o,i,a,!1,null,"0e8f124f",null);t["a"]=u.exports},"3cbc":function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"pan-item",style:{zIndex:e.zIndex,height:e.height,width:e.width}},[n("div",{staticClass:"pan-info"},[n("div",{staticClass:"pan-info-roles-container"},[e._t("default")],2)]),e._v(" "),n("div",{staticClass:"pan-thumb",style:{backgroundImage:"url("+e.image+")"}})])},a=[],r=(n("c5f6"),{name:"PanThumb",props:{image:{type:String,required:!0},zIndex:{type:Number,default:1},width:{type:String,default:"150px"},height:{type:String,default:"150px"}}}),l=r,o=(n("133c"),n("2877")),s=Object(o["a"])(l,i,a,!1,null,"799537af",null);t["a"]=s.exports},"49b7":function(e,t,n){"use strict";var i=n("1004"),a=n.n(i);a.a},"7de1":function(e,t,n){},8256:function(e,t,n){"use strict";var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"tinymce-container",class:{fullscreen:e.fullscreen},style:{width:e.containerWidth}},[n("textarea",{staticClass:"tinymce-textarea",attrs:{id:e.tinymceId}}),e._v(" "),n("div",{staticClass:"editor-custom-btn-container"},[n("editorImage",{staticClass:"editor-upload-btn",attrs:{color:"#1890ff"},on:{successCBK:e.imageSuccessCBK}})],1)])},a=[],r=(n("ac6a"),n("c5f6"),function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"upload-container"},[n("el-button",{style:{background:e.color,borderColor:e.color},attrs:{icon:"el-icon-upload",size:"mini",type:"primary"},on:{click:function(t){e.dialogVisible=!0}}},[e._v("\n    upload\n  ")]),e._v(" "),n("el-dialog",{attrs:{visible:e.dialogVisible},on:{"update:visible":function(t){e.dialogVisible=t}}},[n("el-upload",{staticClass:"editor-slide-upload",attrs:{multiple:!0,"file-list":e.fileList,"show-file-list":!0,"on-remove":e.handleRemove,"on-success":e.handleSuccess,"before-upload":e.beforeUpload,action:"http://47.104.214.127:8000/api/v1/upload/file","list-type":"picture-card"}},[n("el-button",{attrs:{size:"small",type:"primary"}},[e._v("\n        Click upload\n      ")])],1),e._v(" "),n("el-button",{on:{click:function(t){e.dialogVisible=!1}}},[e._v("\n      Cancel\n    ")]),e._v(" "),n("el-button",{attrs:{type:"primary"},on:{click:e.handleSubmit}},[e._v("\n      Confirm\n    ")])],1)],1)}),l=[],o=(n("456d"),{name:"EditorSlideUpload",props:{color:{type:String,default:"#1890ff"}},data:function(){return{dialogVisible:!1,listObj:{},fileList:[]}},methods:{checkAllSuccess:function(){var e=this;return Object.keys(this.listObj).every((function(t){return e.listObj[t].hasSuccess}))},handleSubmit:function(){var e=this,t=Object.keys(this.listObj).map((function(t){return e.listObj[t]}));this.checkAllSuccess()?(this.$emit("successCBK",t),this.listObj={},this.fileList=[],this.dialogVisible=!1):this.$message("Please wait for all images to be uploaded successfully. If there is a network problem, please refresh the page and upload again!")},handleSuccess:function(e,t){for(var n=t.uid,i=Object.keys(this.listObj),a=0,r=i.length;a<r;a++)if(this.listObj[i[a]].uid===n)return this.listObj[i[a]].url=e.files.file,void(this.listObj[i[a]].hasSuccess=!0)},handleRemove:function(e){for(var t=e.uid,n=Object.keys(this.listObj),i=0,a=n.length;i<a;i++)if(this.listObj[n[i]].uid===t)return void delete this.listObj[n[i]]},beforeUpload:function(e){var t=this,n=window.URL||window.webkitURL,i=e.uid;return this.listObj[i]={},new Promise((function(a,r){var l=new Image;l.src=n.createObjectURL(e),l.onload=function(){t.listObj[i]={hasSuccess:!1,uid:e.uid,width:this.width,height:this.height}},a(!0)}))}}}),s=o,u=(n("fa9c"),n("2877")),c=Object(u["a"])(s,r,l,!1,null,"6c62f198",null),d=c.exports,h=["advlist anchor autolink autosave code codesample colorpicker colorpicker contextmenu directionality emoticons fullscreen hr image imagetools insertdatetime link lists media nonbreaking noneditable pagebreak paste preview print save searchreplace spellchecker tabfocus table template textcolor textpattern visualblocks visualchars wordcount"],m=h,p=["searchreplace bold italic underline strikethrough alignleft aligncenter alignright outdent indent  blockquote undo redo removeformat subscript superscript code codesample","hr bullist numlist link image charmap preview anchor pagebreak insertdatetime media table emoticons forecolor backcolor fullscreen"],f=p,g=(n("ac4d"),n("8a81"),[]);function v(){return window.tinymce}var b=function(e,t){var n=document.getElementById(e),i=t||function(){};if(!n){var a=document.createElement("script");a.src=e,a.id=e,document.body.appendChild(a),g.push(i);var r="onload"in a?l:o;r(a)}function l(t){t.onload=function(){this.onerror=this.onload=null;var e=!0,n=!1,i=void 0;try{for(var a,r=g[Symbol.iterator]();!(e=(a=r.next()).done);e=!0){var l=a.value;l(null,t)}}catch(o){n=!0,i=o}finally{try{e||null==r.return||r.return()}finally{if(n)throw i}}g=null},t.onerror=function(){this.onerror=this.onload=null,i(new Error("Failed to load "+e),t)}}function o(e){e.onreadystatechange=function(){if("complete"===this.readyState||"loaded"===this.readyState){this.onreadystatechange=null;var t=!0,n=!1,i=void 0;try{for(var a,r=g[Symbol.iterator]();!(t=(a=r.next()).done);t=!0){var l=a.value;l(null,e)}}catch(o){n=!0,i=o}finally{try{t||null==r.return||r.return()}finally{if(n)throw i}}g=null}}}n&&i&&(v()?i(null,n):g.push(i))},y=b,_="https://cdn.jsdelivr.net/npm/tinymce-all-in-one@4.9.3/tinymce.min.js",w={name:"Tinymce",components:{editorImage:d},props:{id:{type:String,default:function(){return"vue-tinymce-"+ +new Date+(1e3*Math.random()).toFixed(0)}},value:{type:String,default:""},toolbar:{type:Array,required:!1,default:function(){return[]}},menubar:{type:String,default:"file edit insert view format table"},height:{type:[Number,String],required:!1,default:360},width:{type:[Number,String],required:!1,default:"auto"}},data:function(){return{hasChange:!1,hasInit:!1,tinymceId:this.id,fullscreen:!1,languageTypeList:{en:"en",zh:"zh_CN",es:"es_MX",ja:"ja"}}},computed:{containerWidth:function(){var e=this.width;return/^[\d]+(\.[\d]+)?$/.test(e)?"".concat(e,"px"):e}},watch:{value:function(e){var t=this;!this.hasChange&&this.hasInit&&this.$nextTick((function(){return window.tinymce.get(t.tinymceId).setContent(e||"")}))}},mounted:function(){this.init()},activated:function(){window.tinymce&&this.initTinymce()},deactivated:function(){this.destroyTinymce()},destroyed:function(){this.destroyTinymce()},methods:{init:function(){var e=this;y(_,(function(t){t?e.$message.error(t.message):e.initTinymce()}))},initTinymce:function(){var e=this,t=this;window.tinymce.init({selector:"#".concat(this.tinymceId),language:this.languageTypeList["zh"],height:this.height,body_class:"panel-body ",object_resizing:!1,toolbar:this.toolbar.length>0?this.toolbar:f,menubar:this.menubar,plugins:m,end_container_on_empty_block:!0,powerpaste_word_import:"clean",code_dialog_height:450,code_dialog_width:1e3,advlist_bullet_styles:"square",advlist_number_styles:"default",imagetools_cors_hosts:["www.tinymce.com","codepen.io"],default_link_target:"_blank",link_title:!1,nonbreaking_force_tab:!0,init_instance_callback:function(n){t.value&&n.setContent(t.value),t.hasInit=!0,n.on("NodeChange Change KeyUp SetContent",(function(){e.hasChange=!0,e.$emit("input",n.getContent())}))},setup:function(e){e.on("FullscreenStateChanged",(function(e){t.fullscreen=e.state}))}})},destroyTinymce:function(){var e=window.tinymce.get(this.tinymceId);this.fullscreen&&e.execCommand("mceFullScreen"),e&&e.destroy()},setContent:function(e){window.tinymce.get(this.tinymceId).setContent(e)},getContent:function(){window.tinymce.get(this.tinymceId).getContent()},imageSuccessCBK:function(e){var t=this;e.forEach((function(e){window.tinymce.get(t.tinymceId).insertContent('<img class="wscnph" src="'.concat(e.url,'" >'))}))}}},C=w,S=(n("2f737"),Object(u["a"])(C,i,a,!1,null,"2e7ca200",null));t["a"]=S.exports},acfe:function(e,t,n){},af47:function(e,t,n){},d785:function(e,t,n){},d9e4:function(e,t,n){"use strict";var i=n("e4c2"),a=n.n(i);a.a},e4c2:function(e,t,n){},eaa8:function(e,t,n){"use strict";var i=n("7de1"),a=n.n(i);a.a},f42c:function(e,t,n){"use strict";var i=n("ed08");t["a"]={data:function(){return{$_sidebarElm:null}},mounted:function(){var e=this;this.__resizeHandler=Object(i["b"])((function(){e.chart&&e.chart.resize()}),100),window.addEventListener("resize",this.__resizeHandler),this.$_sidebarElm=document.getElementsByClassName("sidebar-container")[0],this.$_sidebarElm&&this.$_sidebarElm.addEventListener("transitionend",this.$_sidebarResizeHandler)},beforeDestroy:function(){window.removeEventListener("resize",this.__resizeHandler),this.$_sidebarElm&&this.$_sidebarElm.removeEventListener("transitionend",this.$_sidebarResizeHandler)},methods:{$_sidebarResizeHandler:function(e){"width"===e.propertyName&&this.__resizeHandler()}}}},fa9c:function(e,t,n){"use strict";var i=n("acfe"),a=n.n(i);a.a}}]);