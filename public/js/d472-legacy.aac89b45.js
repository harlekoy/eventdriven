(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["d472"],{d472:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("Layout",{staticClass:"bg-green-linear"},[s("div",{staticClass:"container mx-auto"},[s("h1",{staticClass:"text-center my-4 md:my-8"},[t._v("Forgot Password")]),s("form",{staticClass:"white-wrapper form mb-12",on:{submit:function(e){return e.preventDefault(),t.forgot(e)}}},[t.message?s("BaseAlert",[t._v(t._s(t.message))]):t._e(),s("BaseInput",{attrs:{placeholder:"Email"},model:{value:t.email,callback:function(e){t.email=e},expression:"email"}}),t.error?s("p",{staticClass:"invalid text-center"},[t._v(t._s(t.error))]):t._e(),s("BaseButton",{staticClass:"btn mb-2",attrs:{disabled:t.load,type:"submit"}},[t.load?s("BaseIcon",{attrs:{name:"spinner",spin:""}}):s("span",[t._v("Reset Password")])],1),s("div",{staticClass:"text-center mt-5"},[s("router-link",{staticClass:"text-grey-darkest hover:text-blue-dark",attrs:{to:"/login"}},[t._v("Have an account? Sign In")])],1)],1)])])},o=[],r=s("c93e"),n=s("c776"),i=s("2f62"),l={page:{title:"ForgotPassword",meta:[{name:"description",content:"ForgotPassword"}]},components:{Layout:n["a"]},data:function(){return{email:"",load:!1,message:null,error:null}},methods:Object(r["a"])({},Object(i["b"])({forgotPassword:"auth/forgotPassword"}),{forgot:function(){var t=this;this.error=null,this.message=null,this.load=!0,this.forgotPassword({email:this.email,cb:function(e,s){e&&(t.error=e.description),t.message=s,t.load=!1}})}})},c=l,u=s("2877"),d=Object(u["a"])(c,a,o,!1,null,null,null);d.options.__file="ForgotPassword.vue";e["default"]=d.exports}}]);
//# sourceMappingURL=d472-legacy.aac89b45.js.map