(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4a7a"],{"44c6":function(e,t,a){e.exports=a.p+"img/facebook.f6c23aa2.svg"},b5df:function(e,t,a){e.exports=a.p+"img/google.2473ff62.svg"},cc7b:function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("Layout",{staticClass:"bg-green-linear"},[r("div",{staticClass:"container mx-auto"},[r("h1",{staticClass:"text-center my-4 md:my-8"},[e._v("Login")]),r("form",{staticClass:"white-wrapper form mb-12",on:{submit:function(t){return t.preventDefault(),e.tryToLogIn(t)}}},[r("BaseAlert",[r("p",{staticClass:"font-bold"},[e._v("User Test Credentials:")]),r("p",{staticClass:"text-sm"},[r("b",[e._v("Email:")]),e._v(" admin@admin.com")]),r("p",{staticClass:"text-sm"},[r("b",[e._v("Password:")]),e._v(" Testing@123")])]),r("BaseInput",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{error:e.authError&&e.authError.email?e.authError.email[0]:null,name:"email",placeholder:"Email"},model:{value:e.email,callback:function(t){e.email=t},expression:"email"}}),r("BasePassword",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{error:e.authError&&e.authError.password?e.authError.password[0]:null,name:"password",type:"password",placeholder:"Password"},model:{value:e.password,callback:function(t){e.password=t},expression:"password"}}),r("BaseButton",{staticClass:"btn mb-5",attrs:{disabled:e.load,type:"submit"}},[e.load?r("BaseIcon",{attrs:{name:"spinner",spin:""}}):r("span",[e._v("Log in")])],1),r("p",{staticClass:"flex flex-row mb-5 justify-between"},[r("BaseCheckbox",{staticClass:"cursor-pointer whitespace-no-wrap",attrs:{type:"checkbox",checked:e.remember_me},on:{input:e.toggleValue},model:{value:e.remember_me,callback:function(t){e.remember_me=t},expression:"remember_me"}},[e._v("\n          Remember Me\n        ")]),r("router-link",{staticClass:"forgot-password text-grey-darkest flex items-center text-green-darker hover:text-blue-dark",attrs:{to:{name:"forgot-password"}}},[e._v("Forgot Password")])],1),r("a",{staticClass:"btn btn-fb iconed-left mb-3",on:{click:function(t){e.loginViaSocial("facebook")}}},[r("img",{staticClass:"icon",attrs:{src:a("44c6"),width:"17",alt:"Facebook"}}),e._v("\n        Continue with Facebook\n      ")]),r("a",{staticClass:"btn btn-danger iconed-left mb-3",attrs:{href:e.loginGoogle}},[r("img",{staticClass:"icon",attrs:{src:a("b5df"),width:"14",alt:"Google"}}),e._v("\n        Continue with Google\n      ")]),r("div",{staticClass:"text-center mt-5"},[r("router-link",{staticClass:"text-grey-darkest hover:text-blue-dark",attrs:{to:"/register"}},[e._v("Create new account")])],1)],1)])])},s=[],n=(a("96cf"),a("3040")),o=a("c93e"),i=(a("551c"),a("bc3a")),c=a.n(i),l=a("4023"),u=a.n(l),m=a("c776"),d=a("2f62"),p=(Object(o["a"])({},Object(d["d"])("auth",{currentUser:function(e){return e.currentUser}}),Object(d["c"])("auth",["loggedIn"])),Object(d["b"])("auth",["logIn","logOut"])),h=(a("eae4"),{page:{title:"Log in",meta:[{name:"description",content:"Log in to ".concat(u.a.title)}]},components:{Layout:m["a"]},data:function(){return{email:"",password:"",authError:null,load:!1,remember_me:!1}},computed:{loginGoogle:function(){return"http://prophet.test/api/v1/social/redirect/google"}},methods:Object(o["a"])({},p,Object(d["b"])({saveToken:"auth/saveToken",handleAuth:"auth/handleAuth"}),{tryToLogIn:function(){var e=Object(n["a"])(regeneratorRuntime.mark(function e(){var t,a;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return this.load=!0,this.authError=null,e.prev=2,e.next=5,c.a.post("login",{email:this.email,password:this.password});case 5:t=e.sent,a=t.data,this.handleAuth(a.token),this.saveToken({remember_me:this.remember_me}),e.next=14;break;case 11:e.prev=11,e.t0=e["catch"](2),this.authError=e.t0.response.data.errors;case 14:this.load=!1;case 15:case"end":return e.stop()}},e,this,[[2,11]])}));return function(){return e.apply(this,arguments)}}(),toggleValue:function(e){this.remember_me=e},validateIP:function(){var e=Object(n["a"])(regeneratorRuntime.mark(function e(){var t;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,c.a.get("validate-ip");case 2:t=e.sent,t.data.valid;case 4:case"end":return e.stop()}},e,this)}));return function(){return e.apply(this,arguments)}}()})}),b=h,g=a("2877"),v=Object(g["a"])(b,r,s,!1,null,null,null);v.options.__file="Login.vue";t["default"]=v.exports}}]);
//# sourceMappingURL=chunk-4a7a.83292bfc.js.map