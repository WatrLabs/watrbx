//----------------------------------------------------------
// Copyright (C) Microsoft Corporation. All rights reserved.
//----------------------------------------------------------
// MicrosoftAjaxWebForms.js
Type._registerScript("MicrosoftAjaxWebForms.js",["MicrosoftAjaxCore.js","MicrosoftAjaxSerialization.js","MicrosoftAjaxNetwork.js","MicrosoftAjaxComponentModel.js"]);Type.registerNamespace("Sys.WebForms");Sys.WebForms.BeginRequestEventArgs=function(c,b,a){Sys.WebForms.BeginRequestEventArgs.initializeBase(this);this._request=c;this._postBackElement=b;this._updatePanelsToUpdate=a};Sys.WebForms.BeginRequestEventArgs.prototype={get_postBackElement:function(){return this._postBackElement},get_request:function(){return this._request},get_updatePanelsToUpdate:function(){return this._updatePanelsToUpdate?Array.clone(this._updatePanelsToUpdate):[]}};Sys.WebForms.BeginRequestEventArgs.registerClass("Sys.WebForms.BeginRequestEventArgs",Sys.EventArgs);Sys.WebForms.EndRequestEventArgs=function(c,a,b){Sys.WebForms.EndRequestEventArgs.initializeBase(this);this._errorHandled=false;this._error=c;this._dataItems=a||{};this._response=b};Sys.WebForms.EndRequestEventArgs.prototype={get_dataItems:function(){return this._dataItems},get_error:function(){return this._error},get_errorHandled:function(){return this._errorHandled},set_errorHandled:function(a){this._errorHandled=a},get_response:function(){return this._response}};Sys.WebForms.EndRequestEventArgs.registerClass("Sys.WebForms.EndRequestEventArgs",Sys.EventArgs);Sys.WebForms.InitializeRequestEventArgs=function(c,b,a){Sys.WebForms.InitializeRequestEventArgs.initializeBase(this);this._request=c;this._postBackElement=b;this._updatePanelsToUpdate=a};Sys.WebForms.InitializeRequestEventArgs.prototype={get_postBackElement:function(){return this._postBackElement},get_request:function(){return this._request},get_updatePanelsToUpdate:function(){return this._updatePanelsToUpdate?Array.clone(this._updatePanelsToUpdate):[]},set_updatePanelsToUpdate:function(a){this._updated=true;this._updatePanelsToUpdate=a}};Sys.WebForms.InitializeRequestEventArgs.registerClass("Sys.WebForms.InitializeRequestEventArgs",Sys.CancelEventArgs);Sys.WebForms.PageLoadedEventArgs=function(b,a,c){Sys.WebForms.PageLoadedEventArgs.initializeBase(this);this._panelsUpdated=b;this._panelsCreated=a;this._dataItems=c||{}};Sys.WebForms.PageLoadedEventArgs.prototype={get_dataItems:function(){return this._dataItems},get_panelsCreated:function(){return this._panelsCreated},get_panelsUpdated:function(){return this._panelsUpdated}};Sys.WebForms.PageLoadedEventArgs.registerClass("Sys.WebForms.PageLoadedEventArgs",Sys.EventArgs);Sys.WebForms.PageLoadingEventArgs=function(b,a,c){Sys.WebForms.PageLoadingEventArgs.initializeBase(this);this._panelsUpdating=b;this._panelsDeleting=a;this._dataItems=c||{}};Sys.WebForms.PageLoadingEventArgs.prototype={get_dataItems:function(){return this._dataItems},get_panelsDeleting:function(){return this._panelsDeleting},get_panelsUpdating:function(){return this._panelsUpdating}};Sys.WebForms.PageLoadingEventArgs.registerClass("Sys.WebForms.PageLoadingEventArgs",Sys.EventArgs);Sys._ScriptLoader=function(){this._scriptsToLoad=null;this._sessions=[];this._scriptLoadedDelegate=Function.createDelegate(this,this._scriptLoadedHandler)};Sys._ScriptLoader.prototype={dispose:function(){this._stopSession();this._loading=false;if(this._events)delete this._events;this._sessions=null;this._currentSession=null;this._scriptLoadedDelegate=null},loadScripts:function(d,b,c,a){var e={allScriptsLoadedCallback:b,scriptLoadFailedCallback:c,scriptLoadTimeoutCallback:a,scriptsToLoad:this._scriptsToLoad,scriptTimeout:d};this._scriptsToLoad=null;this._sessions[this._sessions.length]=e;if(!this._loading)this._nextSession()},queueCustomScriptTag:function(a){if(!this._scriptsToLoad)this._scriptsToLoad=[];Array.add(this._scriptsToLoad,a)},queueScriptBlock:function(a){if(!this._scriptsToLoad)this._scriptsToLoad=[];Array.add(this._scriptsToLoad,{text:a})},queueScriptReference:function(a,b){if(!this._scriptsToLoad)this._scriptsToLoad=[];Array.add(this._scriptsToLoad,{src:a,fallback:b})},_createScriptElement:function(c){var a=document.createElement("script");a.type="text/javascript";for(var b in c)a[b]=c[b];return a},_loadScriptsInternal:function(){var c=this._currentSession;if(c.scriptsToLoad&&c.scriptsToLoad.length>0){var b=Array.dequeue(c.scriptsToLoad),f=this._scriptLoadedDelegate;if(b.fallback){var g=b.fallback;delete b.fallback;var d=this;f=function(b,a){a||function(){var a=d._createScriptElement({src:g});d._currentTask=new Sys._ScriptLoaderTask(a,d._scriptLoadedDelegate);d._currentTask.execute()}()}}var a=this._createScriptElement(b);if(a.text&&Sys.Browser.agent===Sys.Browser.Safari){a.innerHTML=a.text;delete a.text}if(typeof b.src==="string"){this._currentTask=new Sys._ScriptLoaderTask(a,f);this._currentTask.execute()}else{document.getElementsByTagName("head")[0].appendChild(a);Sys._ScriptLoaderTask._clearScript(a);this._loadScriptsInternal()}}else{this._stopSession();var e=c.allScriptsLoadedCallback;if(e)e(this);this._nextSession()}},_nextSession:function(){if(this._sessions.length===0){this._loading=false;this._currentSession=null;return}this._loading=true;var a=Array.dequeue(this._sessions);this._currentSession=a;if(a.scriptTimeout>0)this._timeoutCookie=window.setTimeout(Function.createDelegate(this,this._scriptLoadTimeoutHandler),a.scriptTimeout*1000);this._loadScriptsInternal()},_raiseError:function(){var b=this._currentSession.scriptLoadFailedCallback,a=this._currentTask.get_scriptElement();this._stopSession();if(b){b(this,a);this._nextSession()}else{this._loading=false;throw Sys._ScriptLoader._errorScriptLoadFailed(a.src)}},_scriptLoadedHandler:function(a,b){if(b){Array.add(Sys._ScriptLoader._getLoadedScripts(),a.src);this._currentTask.dispose();this._currentTask=null;this._loadScriptsInternal()}else this._raiseError()},_scriptLoadTimeoutHandler:function(){var a=this._currentSession.scriptLoadTimeoutCallback;this._stopSession();if(a)a(this);this._nextSession()},_stopSession:function(){if(this._timeoutCookie){window.clearTimeout(this._timeoutCookie);this._timeoutCookie=null}if(this._currentTask){this._currentTask.dispose();this._currentTask=null}}};Sys._ScriptLoader.registerClass("Sys._ScriptLoader",null,Sys.IDisposable);Sys._ScriptLoader.getInstance=function(){var a=Sys._ScriptLoader._activeInstance;if(!a)a=Sys._ScriptLoader._activeInstance=new Sys._ScriptLoader;return a};Sys._ScriptLoader.isScriptLoaded=function(b){var a=document.createElement("script");a.src=b;return Array.contains(Sys._ScriptLoader._getLoadedScripts(),a.src)};Sys._ScriptLoader.readLoadedScripts=function(){if(!Sys._ScriptLoader._referencedScripts){var c=Sys._ScriptLoader._referencedScripts=[],d=document.getElementsByTagName("script");for(var b=d.length-1;b>=0;b--){var e=d[b],a=e.src;if(a.length)if(!Array.contains(c,a))Array.add(c,a)}}};Sys._ScriptLoader._errorScriptLoadFailed=function(b){var a;a=Sys.Res.scriptLoadFailed;var d="Sys.ScriptLoadFailedException: "+String.format(a,b),c=Error.create(d,{name:"Sys.ScriptLoadFailedException","scriptUrl":b});c.popStackFrame();return c};Sys._ScriptLoader._getLoadedScripts=function(){if(!Sys._ScriptLoader._referencedScripts){Sys._ScriptLoader._referencedScripts=[];Sys._ScriptLoader.readLoadedScripts()}return Sys._ScriptLoader._referencedScripts};Sys.WebForms.PageRequestManager=function(){this._form=null;this._activeDefaultButton=null;this._activeDefaultButtonClicked=false;this._updatePanelIDs=null;this._updatePanelClientIDs=null;this._updatePanelHasChildrenAsTriggers=null;this._asyncPostBackControlIDs=null;this._asyncPostBackControlClientIDs=null;this._postBackControlIDs=null;this._postBackControlClientIDs=null;this._scriptManagerID=null;this._pageLoadedHandler=null;this._additionalInput=null;this._onsubmit=null;this._onSubmitStatements=[];this._originalDoPostBack=null;this._originalDoPostBackWithOptions=null;this._originalFireDefaultButton=null;this._originalDoCallback=null;this._isCrossPost=false;this._postBackSettings=null;this._request=null;this._onFormSubmitHandler=null;this._onFormElementClickHandler=null;this._onWindowUnloadHandler=null;this._asyncPostBackTimeout=null;this._controlIDToFocus=null;this._scrollPosition=null;this._processingRequest=false;this._scriptDisposes={};this._transientFields=["__VIEWSTATEENCRYPTED","__VIEWSTATEFIELDCOUNT"];this._textTypes=/^(text|password|hidden|search|tel|url|email|number|range|color|datetime|date|month|week|time|datetime-local)$/i};Sys.WebForms.PageRequestManager.prototype={_get_eventHandlerList:function(){if(!this._events)this._events=new Sys.EventHandlerList;return this._events},get_isInAsyncPostBack:function(){return this._request!==null},add_beginRequest:function(a){this._get_eventHandlerList().addHandler("beginRequest",a)},remove_beginRequest:function(a){this._get_eventHandlerList().removeHandler("beginRequest",a)},add_endRequest:function(a){this._get_eventHandlerList().addHandler("endRequest",a)},remove_endRequest:function(a){this._get_eventHandlerList().removeHandler("endRequest",a)},add_initializeRequest:function(a){this._get_eventHandlerList().addHandler("initializeRequest",a)},remove_initializeRequest:function(a){this._get_eventHandlerList().removeHandler("initializeRequest",a)},add_pageLoaded:function(a){this._get_eventHandlerList().addHandler("pageLoaded",a)},remove_pageLoaded:function(a){this._get_eventHandlerList().removeHandler("pageLoaded",a)},add_pageLoading:function(a){this._get_eventHandlerList().addHandler("pageLoading",a)},remove_pageLoading:function(a){this._get_eventHandlerList().removeHandler("pageLoading",a)},abortPostBack:function(){if(!this._processingRequest&&this._request){this._request.get_executor().abort();this._request=null}},beginAsyncPostBack:function(c,a,f,d,e){if(d&&typeof Page_ClientValidate==="function"&&!Page_ClientValidate(e||null))return;this._postBackSettings=this._createPostBackSettings(true,c,a);var b=this._form;b.__EVENTTARGET.value=a||"";b.__EVENTARGUMENT.value=f||"";this._isCrossPost=false;this._additionalInput=null;this._onFormSubmit()},_cancelPendingCallbacks:function(){for(var a=0,e=window.__pendingCallbacks.length;a<e;a++){var c=window.__pendingCallbacks[a];if(c){if(!c.async)window.__synchronousCallBackIndex=-1;window.__pendingCallbacks[a]=null;var d="__CALLBACKFRAME"+a,b=document.getElementById(d);if(b)b.parentNode.removeChild(b)}}},_commitControls:function(a,b){if(a){this._updatePanelIDs=a.updatePanelIDs;this._updatePanelClientIDs=a.updatePanelClientIDs;this._updatePanelHasChildrenAsTriggers=a.updatePanelHasChildrenAsTriggers;this._asyncPostBackControlIDs=a.asyncPostBackControlIDs;this._asyncPostBackControlClientIDs=a.asyncPostBackControlClientIDs;this._postBackControlIDs=a.postBackControlIDs;this._postBackControlClientIDs=a.postBackControlClientIDs}if(typeof b!=="undefined"&&b!==null)this._asyncPostBackTimeout=b*1000},_createHiddenField:function(c,d){var b,a=document.getElementById(c);if(a)if(!a._isContained)a.parentNode.removeChild(a);else b=a.parentNode;if(!b){b=document.createElement("span");b.style.cssText="display:none !important";this._form.appendChild(b)}b.innerHTML="<input type='hidden' />";a=b.childNodes[0];a._isContained=true;a.id=a.name=c;a.value=d},_createPageRequestManagerTimeoutError:function(){var b="Sys.WebForms.PageRequestManagerTimeoutException: "+Sys.WebForms.Res.PRM_TimeoutError,a=Error.create(b,{name:"Sys.WebForms.PageRequestManagerTimeoutException"});a.popStackFrame();return a},_createPageRequestManagerServerError:function(a,d){var c="Sys.WebForms.PageRequestManagerServerErrorException: "+(d||String.format(Sys.WebForms.Res.PRM_ServerError,a)),b=Error.create(c,{name:"Sys.WebForms.PageRequestManagerServerErrorException",httpStatusCode:a});b.popStackFrame();return b},_createPageRequestManagerParserError:function(b){var c="Sys.WebForms.PageRequestManagerParserErrorException: "+String.format(Sys.WebForms.Res.PRM_ParserError,b),a=Error.create(c,{name:"Sys.WebForms.PageRequestManagerParserErrorException"});a.popStackFrame();return a},_createPanelID:function(e,b){var c=b.asyncTarget,a=this._ensureUniqueIds(e||b.panelsToUpdate),d=a instanceof Array?a.join(","):a||this._scriptManagerID;if(c)d+="|"+c;return encodeURIComponent(this._scriptManagerID)+"="+encodeURIComponent(d)+"&"},_createPostBackSettings:function(d,a,c,b){return {async:d,asyncTarget:c,panelsToUpdate:a,sourceElement:b}},_convertToClientIDs:function(a,f,e,d){if(a)for(var b=0,h=a.length;b<h;b+=d?2:1){var c=a[b],g=(d?a[b+1]:"")||this._uniqueIDToClientID(c);Array.add(f,c);Array.add(e,g)}},dispose:function(){if(this._form){Sys.UI.DomEvent.removeHandler(this._form,"submit",this._onFormSubmitHandler);Sys.UI.DomEvent.removeHandler(this._form,"click",this._onFormElementClickHandler);Sys.UI.DomEvent.removeHandler(window,"unload",this._onWindowUnloadHandler);Sys.UI.DomEvent.removeHandler(window,"load",this._pageLoadedHandler)}if(this._originalDoPostBack){window.__doPostBack=this._originalDoPostBack;this._originalDoPostBack=null}if(this._originalDoPostBackWithOptions){window.WebForm_DoPostBackWithOptions=this._originalDoPostBackWithOptions;this._originalDoPostBackWithOptions=null}if(this._originalFireDefaultButton){window.WebForm_FireDefaultButton=this._originalFireDefaultButton;this._originalFireDefaultButton=null}if(this._originalDoCallback){window.WebForm_DoCallback=this._originalDoCallback;this._originalDoCallback=null}this._form=null;this._updatePanelIDs=null;this._updatePanelClientIDs=null;this._asyncPostBackControlIDs=null;this._asyncPostBackControlClientIDs=null;this._postBackControlIDs=null;this._postBackControlClientIDs=null;this._asyncPostBackTimeout=null;this._scrollPosition=null;this._activeElement=null},_doCallback:function(d,b,c,f,a,e){if(!this.get_isInAsyncPostBack())this._originalDoCallback(d,b,c,f,a,e)},_doPostBack:function(a,k){var f=window.event;if(!f){var d=arguments.callee?arguments.callee.caller:null;if(d){var j=30;while(d.arguments.callee.caller&&--j)d=d.arguments.callee.caller;f=j&&d.arguments.length?d.arguments[0]:null}}this._additionalInput=null;var h=this._form;if(a===null||typeof a==="undefined"||this._isCrossPost){this._postBackSettings=this._createPostBackSettings(false);this._isCrossPost=false}else{var c=this._masterPageUniqueID,l=this._uniqueIDToClientID(a),g=document.getElementById(l);if(!g&&c)if(a.indexOf(c+"$")===0)g=document.getElementById(l.substr(c.length+1));if(!g)if(Array.contains(this._asyncPostBackControlIDs,a))this._postBackSettings=this._createPostBackSettings(true,null,a);else if(Array.contains(this._postBackControlIDs,a))this._postBackSettings=this._createPostBackSettings(false);else{var e=this._findNearestElement(a);if(e)this._postBackSettings=this._getPostBackSettings(e,a);else{if(c){c+="$";if(a.indexOf(c)===0)e=this._findNearestElement(a.substr(c.length))}if(e)this._postBackSettings=this._getPostBackSettings(e,a);else{var b;try{b=f?f.target||f.srcElement:null}catch(n){}b=b||this._activeElement;var m=/__doPostBack\(|WebForm_DoPostBackWithOptions\(/;function i(b){b=b?b.toString():"";return m.test(b)&&b.indexOf("'"+a+"'")!==-1||b.indexOf('"'+a+'"')!==-1}if(b&&(b.name===a||i(b.href)||i(b.onclick)||i(b.onchange)))this._postBackSettings=this._getPostBackSettings(b,a);else this._postBackSettings=this._createPostBackSettings(false)}}}else this._postBackSettings=this._getPostBackSettings(g,a)}if(!this._postBackSettings.async){h.onsubmit=this._onsubmit;this._originalDoPostBack(a,k);h.onsubmit=null;return}h.__EVENTTARGET.value=a;h.__EVENTARGUMENT.value=k;this._onFormSubmit()},_doPostBackWithOptions:function(a){this._isCrossPost=a&&a.actionUrl;var d=true;if(a.validation)if(typeof Page_ClientValidate=="function")d=Page_ClientValidate(a.validationGroup);if(d){if(typeof a.actionUrl!="undefined"&&a.actionUrl!=null&&a.actionUrl.length>0)theForm.action=a.actionUrl;if(a.trackFocus){var c=theForm.elements["__LASTFOCUS"];if(typeof c!="undefined"&&c!=null)if(typeof document.activeElement=="undefined")c.value=a.eventTarget;else{var b=document.activeElement;if(typeof b!="undefined"&&b!=null)if(typeof b.id!="undefined"&&b.id!=null&&b.id.length>0)c.value=b.id;else if(typeof b.name!="undefined")c.value=b.name}}}if(a.clientSubmit)this._doPostBack(a.eventTarget,a.eventArgument)},_elementContains:function(b,a){while(a){if(a===b)return true;a=a.parentNode}return false},_endPostBack:function(a,d,f){if(this._request===d.get_webRequest()){this._processingRequest=false;this._additionalInput=null;this._request=null}var e=this._get_eventHandlerList().getHandler("endRequest"),b=false;if(e){var c=new Sys.WebForms.EndRequestEventArgs(a,f?f.dataItems:{},d);e(this,c);b=c.get_errorHandled()}if(a&&!b)throw a},_ensureUniqueIds:function(a){if(!a)return a;a=a instanceof Array?a:[a];var c=[];for(var b=0,f=a.length;b<f;b++){var e=a[b],d=Array.indexOf(this._updatePanelClientIDs,e);c.push(d>-1?this._updatePanelIDs[d]:e)}return c},_findNearestElement:function(a){while(a.length>0){var d=this._uniqueIDToClientID(a),c=document.getElementById(d);if(c)return c;var b=a.lastIndexOf("$");if(b===-1)return null;a=a.substring(0,b)}return null},_findText:function(b,a){var c=Math.max(0,a-20),d=Math.min(b.length,a+20);return b.substring(c,d)},_fireDefaultButton:function(a,d){if(a.keyCode===13){var c=a.srcElement||a.target;if(!c||c.tagName.toLowerCase()!=="textarea"){var b=document.getElementById(d);if(b&&typeof b.click!=="undefined"){this._activeDefaultButton=b;this._activeDefaultButtonClicked=false;try{b.click()}finally{this._activeDefaultButton=null}a.cancelBubble=true;if(typeof a.stopPropagation==="function")a.stopPropagation();return false}}}return true},_getPageLoadedEventArgs:function(n,c){var m=[],l=[],k=c?c.version4:false,d=c?c.updatePanelData:null,e,g,h,b;if(!d){e=this._updatePanelIDs;g=this._updatePanelClientIDs;h=null;b=null}else{e=d.updatePanelIDs;g=d.updatePanelClientIDs;h=d.childUpdatePanelIDs;b=d.panelsToRefreshIDs}var a,f,j,i;if(b)for(a=0,f=b.length;a<f;a+=k?2:1){j=b[a];i=(k?b[a+1]:"")||this._uniqueIDToClientID(j);Array.add(m,document.getElementById(i))}for(a=0,f=e.length;a<f;a++)if(n||Array.indexOf(h,e[a])!==-1)Array.add(l,document.getElementById(g[a]));return new Sys.WebForms.PageLoadedEventArgs(m,l,c?c.dataItems:{})},_getPageLoadingEventArgs:function(f){var j=[],i=[],c=f.updatePanelData,k=c.oldUpdatePanelIDs,l=c.oldUpdatePanelClientIDs,n=c.updatePanelIDs,m=c.childUpdatePanelIDs,d=c.panelsToRefreshIDs,a,e,b,g,h=f.version4;for(a=0,e=d.length;a<e;a+=h?2:1){b=d[a];g=(h?d[a+1]:"")||this._uniqueIDToClientID(b);Array.add(j,document.getElementById(g))}for(a=0,e=k.length;a<e;a++){b=k[a];if(Array.indexOf(d,b)===-1&&(Array.indexOf(n,b)===-1||Array.indexOf(m,b)>-1))Array.add(i,document.getElementById(l[a]))}return new Sys.WebForms.PageLoadingEventArgs(j,i,f.dataItems)},_getPostBackSettings:function(a,c){var d=a,b=null;while(a){if(a.id){if(!b&&Array.contains(this._asyncPostBackControlClientIDs,a.id))b=this._createPostBackSettings(true,null,c,d);else if(!b&&Array.contains(this._postBackControlClientIDs,a.id))return this._createPostBackSettings(false);else{var e=Array.indexOf(this._updatePanelClientIDs,a.id);if(e!==-1)if(this._updatePanelHasChildrenAsTriggers[e])return this._createPostBackSettings(true,[this._updatePanelIDs[e]],c,d);else return this._createPostBackSettings(true,null,c,d)}if(!b&&this._matchesParentIDInList(a.id,this._asyncPostBackControlClientIDs))b=this._createPostBackSettings(true,null,c,d);else if(!b&&this._matchesParentIDInList(a.id,this._postBackControlClientIDs))return this._createPostBackSettings(false)}a=a.parentNode}if(!b)return this._createPostBackSettings(false);else return b},_getScrollPosition:function(){var a=document.documentElement;if(a&&(this._validPosition(a.scrollLeft)||this._validPosition(a.scrollTop)))return {x:a.scrollLeft,y:a.scrollTop};else{a=document.body;if(a&&(this._validPosition(a.scrollLeft)||this._validPosition(a.scrollTop)))return {x:a.scrollLeft,y:a.scrollTop};else if(this._validPosition(window.pageXOffset)||this._validPosition(window.pageYOffset))return {x:window.pageXOffset,y:window.pageYOffset};else return {x:0,y:0}}},_initializeInternal:function(f,g,a,b,e,c,d){if(this._prmInitialized)throw Error.invalidOperation(Sys.WebForms.Res.PRM_CannotRegisterTwice);this._prmInitialized=true;this._masterPageUniqueID=d;this._scriptManagerID=f;this._form=Sys.UI.DomElement.resolveElement(g);this._onsubmit=this._form.onsubmit;this._form.onsubmit=null;this._onFormSubmitHandler=Function.createDelegate(this,this._onFormSubmit);this._onFormElementClickHandler=Function.createDelegate(this,this._onFormElementClick);this._onWindowUnloadHandler=Function.createDelegate(this,this._onWindowUnload);Sys.UI.DomEvent.addHandler(this._form,"submit",this._onFormSubmitHandler);Sys.UI.DomEvent.addHandler(this._form,"click",this._onFormElementClickHandler);Sys.UI.DomEvent.addHandler(window,"unload",this._onWindowUnloadHandler);this._originalDoPostBack=window.__doPostBack;if(this._originalDoPostBack)window.__doPostBack=Function.createDelegate(this,this._doPostBack);this._originalDoPostBackWithOptions=window.WebForm_DoPostBackWithOptions;if(this._originalDoPostBackWithOptions)window.WebForm_DoPostBackWithOptions=Function.createDelegate(this,this._doPostBackWithOptions);this._originalFireDefaultButton=window.WebForm_FireDefaultButton;if(this._originalFireDefaultButton)window.WebForm_FireDefaultButton=Function.createDelegate(this,this._fireDefaultButton);this._originalDoCallback=window.WebForm_DoCallback;if(this._originalDoCallback)window.WebForm_DoCallback=Function.createDelegate(this,this._doCallback);this._pageLoadedHandler=Function.createDelegate(this,this._pageLoadedInitialLoad);Sys.UI.DomEvent.addHandler(window,"load",this._pageLoadedHandler);if(a)this._updateControls(a,b,e,c,true)},_matchesParentIDInList:function(c,b){for(var a=0,d=b.length;a<d;a++)if(c.startsWith(b[a]+"_"))return true;return false},_onFormElementActive:function(a,d,e){if(a.disabled)return;this._activeElement=a;this._postBackSettings=this._getPostBackSettings(a,a.name);if(a.name){var b=a.tagName.toUpperCase();if(b==="INPUT"){var c=a.type;if(c==="submit")this._additionalInput=encodeURIComponent(a.name)+"="+encodeURIComponent(a.value);else if(c==="image")this._additionalInput=encodeURIComponent(a.name)+".x="+d+"&"+encodeURIComponent(a.name)+".y="+e}else if(b==="BUTTON"&&a.name.length!==0&&a.type==="submit")this._additionalInput=encodeURIComponent(a.name)+"="+encodeURIComponent(a.value)}},_onFormElementClick:function(a){this._activeDefaultButtonClicked=a.target===this._activeDefaultButton;this._onFormElementActive(a.target,a.offsetX,a.offsetY)},_onFormSubmit:function(i){var f,x,h=true,z=this._isCrossPost;this._isCrossPost=false;if(this._onsubmit)h=this._onsubmit();if(h)for(f=0,x=this._onSubmitStatements.length;f<x;f++)if(!this._onSubmitStatements[f]()){h=false;break}if(!h){if(i)i.preventDefault();return}var w=this._form;if(z)return;if(this._activeDefaultButton&&!this._activeDefaultButtonClicked)this._onFormElementActive(this._activeDefaultButton,0,0);if(!this._postBackSettings||!this._postBackSettings.async)return;var b=new Sys.StringBuilder,s=w.elements,B=s.length,t=this._createPanelID(null,this._postBackSettings);b.append(t);for(f=0;f<B;f++){var e=s[f],g=e.name;if(typeof g==="undefined"||g===null||g.length===0||g===this._scriptManagerID)continue;var n=e.tagName.toUpperCase();if(n==="INPUT"){var p=e.type;if(this._textTypes.test(p)||(p==="checkbox"||p==="radio")&&e.checked){b.append(encodeURIComponent(g));b.append("=");b.append(encodeURIComponent(e.value));b.append("&")}}else if(n==="SELECT"){var A=e.options.length;for(var q=0;q<A;q++){var u=e.options[q];if(u.selected){b.append(encodeURIComponent(g));b.append("=");b.append(encodeURIComponent(u.value));b.append("&")}}}else if(n==="TEXTAREA"){b.append(encodeURIComponent(g));b.append("=");b.append(encodeURIComponent(e.value));b.append("&")}}b.append("__ASYNCPOST=true&");if(this._additionalInput){b.append(this._additionalInput);this._additionalInput=null}var c=new Sys.Net.WebRequest,a=w.action;if(Sys.Browser.agent===Sys.Browser.InternetExplorer){var r=a.indexOf("#");if(r!==-1)a=a.substr(0,r);var o="",v="",m=a.indexOf("?");if(m!==-1){v=a.substr(m);a=a.substr(0,m)}if(/^https?\:\/\/.*$/gi.test(a)){var y=a.indexOf("//")+2,l=a.indexOf("/",y);if(l===-1){o=a;a=""}else{o=a.substr(0,l);a=a.substr(l)}}a=o+encodeURI(decodeURI(a))+v}c.set_url(a);c.get_headers()["X-MicrosoftAjax"]="Delta=true";c.get_headers()["Cache-Control"]="no-cache";c.set_timeout(this._asyncPostBackTimeout);c.add_completed(Function.createDelegate(this,this._onFormSubmitCompleted));c.set_body(b.toString());var j,d,k=this._get_eventHandlerList().getHandler("initializeRequest");if(k){j=this._postBackSettings.panelsToUpdate;d=new Sys.WebForms.InitializeRequestEventArgs(c,this._postBackSettings.sourceElement,j);k(this,d);h=!d.get_cancel()}if(!h){if(i)i.preventDefault();return}if(d&&d._updated){j=d.get_updatePanelsToUpdate();c.set_body(c.get_body().replace(t,this._createPanelID(j,this._postBackSettings)))}this._scrollPosition=this._getScrollPosition();this.abortPostBack();k=this._get_eventHandlerList().getHandler("beginRequest");if(k){d=new Sys.WebForms.BeginRequestEventArgs(c,this._postBackSettings.sourceElement,j||this._postBackSettings.panelsToUpdate);k(this,d)}if(this._originalDoCallback)this._cancelPendingCallbacks();this._request=c;this._processingRequest=false;c.invoke();if(i)i.preventDefault()},_onFormSubmitCompleted:function(c){this._processingRequest=true;if(c.get_timedOut()){this._endPostBack(this._createPageRequestManagerTimeoutError(),c,null);return}if(c.get_aborted()){this._endPostBack(null,c,null);return}if(!this._request||c.get_webRequest()!==this._request)return;if(c.get_statusCode()!==200){this._endPostBack(this._createPageRequestManagerServerError(c.get_statusCode()),c,null);return}var a=this._parseDelta(c);if(!a)return;var b,e;if(a.asyncPostBackControlIDsNode&&a.postBackControlIDsNode&&a.updatePanelIDsNode&&a.panelsToRefreshNode&&a.childUpdatePanelIDsNode){var r=this._updatePanelIDs,n=this._updatePanelClientIDs,i=a.childUpdatePanelIDsNode.content,p=i.length?i.split(","):[],m=this._splitNodeIntoArray(a.asyncPostBackControlIDsNode),o=this._splitNodeIntoArray(a.postBackControlIDsNode),q=this._splitNodeIntoArray(a.updatePanelIDsNode),g=this._splitNodeIntoArray(a.panelsToRefreshNode),h=a.version4;for(b=0,e=g.length;b<e;b+=h?2:1){var j=(h?g[b+1]:"")||this._uniqueIDToClientID(g[b]);if(!document.getElementById(j)){this._endPostBack(Error.invalidOperation(String.format(Sys.WebForms.Res.PRM_MissingPanel,j)),c,a);return}}var f=this._processUpdatePanelArrays(q,m,o,h);f.oldUpdatePanelIDs=r;f.oldUpdatePanelClientIDs=n;f.childUpdatePanelIDs=p;f.panelsToRefreshIDs=g;a.updatePanelData=f}a.dataItems={};var d;for(b=0,e=a.dataItemNodes.length;b<e;b++){d=a.dataItemNodes[b];a.dataItems[d.id]=d.content}for(b=0,e=a.dataItemJsonNodes.length;b<e;b++){d=a.dataItemJsonNodes[b];a.dataItems[d.id]=Sys.Serialization.JavaScriptSerializer.deserialize(d.content)}var l=this._get_eventHandlerList().getHandler("pageLoading");if(l)l(this,this._getPageLoadingEventArgs(a));Sys._ScriptLoader.readLoadedScripts();Sys.Application.beginCreateComponents();var k=Sys._ScriptLoader.getInstance();this._queueScripts(k,a.scriptBlockNodes,true,false);this._processingRequest=true;k.loadScripts(0,Function.createDelegate(this,Function.createCallback(this._scriptIncludesLoadComplete,a)),Function.createDelegate(this,Function.createCallback(this._scriptIncludesLoadFailed,a)),null)},_onWindowUnload:function(){this.dispose()},_pageLoaded:function(a,c){var b=this._get_eventHandlerList().getHandler("pageLoaded");if(b)b(this,this._getPageLoadedEventArgs(a,c));if(!a)Sys.Application.raiseLoad()},_pageLoadedInitialLoad:function(){this._pageLoaded(true,null)},_parseDelta:function(h){var c=h.get_responseData(),d,i,E,F,D,b=0,e=null,k=[];while(b<c.length){d=c.indexOf("|",b);if(d===-1){e=this._findText(c,b);break}i=parseInt(c.substring(b,d),10);if(i%1!==0){e=this._findText(c,b);break}b=d+1;d=c.indexOf("|",b);if(d===-1){e=this._findText(c,b);break}E=c.substring(b,d);b=d+1;d=c.indexOf("|",b);if(d===-1){e=this._findText(c,b);break}F=c.substring(b,d);b=d+1;if(b+i>=c.length){e=this._findText(c,c.length);break}D=c.substr(b,i);b+=i;if(c.charAt(b)!=="|"){e=this._findText(c,b);break}b++;Array.add(k,{type:E,id:F,content:D})}if(e){this._endPostBack(this._createPageRequestManagerParserError(String.format(Sys.WebForms.Res.PRM_ParserErrorDetails,e)),h,null);return null}var x=[],w=[],q=[],j=[],t=[],C=[],A=[],z=[],v=[],s=[],m,p,u,n,o,r,y,g;for(var l=0,G=k.length;l<G;l++){var a=k[l];switch(a.type){case "#":g=a;break;case "updatePanel":Array.add(x,a);break;case "hiddenField":Array.add(w,a);break;case "arrayDeclaration":Array.add(q,a);break;case "scriptBlock":Array.add(j,a);break;case "fallbackScript":j[j.length-1].fallback=a.id;case "scriptStartupBlock":Array.add(t,a);break;case "expando":Array.add(C,a);break;case "onSubmit":Array.add(A,a);break;case "asyncPostBackControlIDs":m=a;break;case "postBackControlIDs":p=a;break;case "updatePanelIDs":u=a;break;case "asyncPostBackTimeout":n=a;break;case "childUpdatePanelIDs":o=a;break;case "panelsToRefreshIDs":r=a;break;case "formAction":y=a;break;case "dataItem":Array.add(z,a);break;case "dataItemJson":Array.add(v,a);break;case "scriptDispose":Array.add(s,a);break;case "pageRedirect":if(g&&parseFloat(g.content)>=4)a.content=unescape(a.content);if(Sys.Browser.agent===Sys.Browser.InternetExplorer){var f=document.createElement("a");f.style.display="none";f.attachEvent("onclick",B);f.href=a.content;this._form.parentNode.insertBefore(f,this._form);f.click();f.detachEvent("onclick",B);this._form.parentNode.removeChild(f);function B(a){a.cancelBubble=true}}else window.location.href=a.content;return null;case "error":this._endPostBack(this._createPageRequestManagerServerError(Number.parseInvariant(a.id),a.content),h,null);return null;case "pageTitle":document.title=a.content;break;case "focus":this._controlIDToFocus=a.content;break;default:this._endPostBack(this._createPageRequestManagerParserError(String.format(Sys.WebForms.Res.PRM_UnknownToken,a.type)),h,null);return null}}return {version4:g?parseFloat(g.content)>=4:false,executor:h,updatePanelNodes:x,hiddenFieldNodes:w,arrayDeclarationNodes:q,scriptBlockNodes:j,scriptStartupNodes:t,expandoNodes:C,onSubmitNodes:A,dataItemNodes:z,dataItemJsonNodes:v,scriptDisposeNodes:s,asyncPostBackControlIDsNode:m,postBackControlIDsNode:p,updatePanelIDsNode:u,asyncPostBackTimeoutNode:n,childUpdatePanelIDsNode:o,panelsToRefreshNode:r,formActionNode:y}},_processUpdatePanelArrays:function(e,q,r,f){var d,c,b;if(e){var i=e.length,j=f?2:1;d=new Array(i/j);c=new Array(i/j);b=new Array(i/j);for(var g=0,h=0;g<i;g+=j,h++){var p,a=e[g],k=f?e[g+1]:"";p=a.charAt(0)==="t";a=a.substr(1);if(!k)k=this._uniqueIDToClientID(a);b[h]=p;d[h]=a;c[h]=k}}else{d=[];c=[];b=[]}var n=[],l=[];this._convertToClientIDs(q,n,l,f);var o=[],m=[];this._convertToClientIDs(r,o,m,f);return {updatePanelIDs:d,updatePanelClientIDs:c,updatePanelHasChildrenAsTriggers:b,asyncPostBackControlIDs:n,asyncPostBackControlClientIDs:l,postBackControlIDs:o,postBackControlClientIDs:m}},_queueScripts:function(scriptLoader,scriptBlockNodes,queueIncludes,queueBlocks){for(var i=0,l=scriptBlockNodes.length;i<l;i++){var scriptBlockType=scriptBlockNodes[i].id;switch(scriptBlockType){case "ScriptContentNoTags":if(!queueBlocks)continue;scriptLoader.queueScriptBlock(scriptBlockNodes[i].content);break;case "ScriptContentWithTags":var scriptTagAttributes;eval("scriptTagAttributes = "+scriptBlockNodes[i].content);if(scriptTagAttributes.src){if(!queueIncludes||Sys._ScriptLoader.isScriptLoaded(scriptTagAttributes.src))continue}else if(!queueBlocks)continue;scriptLoader.queueCustomScriptTag(scriptTagAttributes);break;case "ScriptPath":var script=scriptBlockNodes[i];if(!queueIncludes||Sys._ScriptLoader.isScriptLoaded(script.content))continue;scriptLoader.queueScriptReference(script.content,script.fallback)}}},_registerDisposeScript:function(a,b){if(!this._scriptDisposes[a])this._scriptDisposes[a]=[b];else Array.add(this._scriptDisposes[a],b)},_scriptIncludesLoadComplete:function(e,b){if(b.executor.get_webRequest()!==this._request)return;this._commitControls(b.updatePanelData,b.asyncPostBackTimeoutNode?b.asyncPostBackTimeoutNode.content:null);if(b.formActionNode)this._form.action=b.formActionNode.content;var a,d,c;for(a=0,d=b.updatePanelNodes.length;a<d;a++){c=b.updatePanelNodes[a];var j=document.getElementById(c.id);if(!j){this._endPostBack(Error.invalidOperation(String.format(Sys.WebForms.Res.PRM_MissingPanel,c.id)),b.executor,b);return}this._updatePanel(j,c.content)}for(a=0,d=b.scriptDisposeNodes.length;a<d;a++){c=b.scriptDisposeNodes[a];this._registerDisposeScript(c.id,c.content)}for(a=0,d=this._transientFields.length;a<d;a++){var g=document.getElementById(this._transientFields[a]);if(g){var k=g._isContained?g.parentNode:g;k.parentNode.removeChild(k)}}for(a=0,d=b.hiddenFieldNodes.length;a<d;a++){c=b.hiddenFieldNodes[a];this._createHiddenField(c.id,c.content)}if(b.scriptsFailed)throw Sys._ScriptLoader._errorScriptLoadFailed(b.scriptsFailed.src,b.scriptsFailed.multipleCallbacks);this._queueScripts(e,b.scriptBlockNodes,false,true);var i="";for(a=0,d=b.arrayDeclarationNodes.length;a<d;a++){c=b.arrayDeclarationNodes[a];i+="Sys.WebForms.PageRequestManager._addArrayElement('"+c.id+"', "+c.content+");\r\n"}var h="";for(a=0,d=b.expandoNodes.length;a<d;a++){c=b.expandoNodes[a];h+=c.id+" = "+c.content+"\r\n"}if(i.length)e.queueScriptBlock(i);if(h.length)e.queueScriptBlock(h);this._queueScripts(e,b.scriptStartupNodes,true,true);var f="";for(a=0,d=b.onSubmitNodes.length;a<d;a++){if(a===0)f="Array.add(Sys.WebForms.PageRequestManager.getInstance()._onSubmitStatements, function() {\r\n";f+=b.onSubmitNodes[a].content+"\r\n"}if(f.length){f+="\r\nreturn true;\r\n});\r\n";e.queueScriptBlock(f)}e.loadScripts(0,Function.createDelegate(this,Function.createCallback(this._scriptsLoadComplete,b)),null,null)},_scriptIncludesLoadFailed:function(d,c,b,a){a.scriptsFailed={src:c.src,multipleCallbacks:b};this._scriptIncludesLoadComplete(d,a)},_scriptsLoadComplete:function(f,c){var e=c.executor;if(window.__theFormPostData)window.__theFormPostData="";if(window.__theFormPostCollection)window.__theFormPostCollection=[];if(window.WebForm_InitCallback)window.WebForm_InitCallback();if(this._scrollPosition){if(window.scrollTo)window.scrollTo(this._scrollPosition.x,this._scrollPosition.y);this._scrollPosition=null}Sys.Application.endCreateComponents();this._pageLoaded(false,c);this._endPostBack(null,e,c);if(this._controlIDToFocus){var a,d;if(Sys.Browser.agent===Sys.Browser.InternetExplorer){var b=$get(this._controlIDToFocus);a=b;if(b&&!WebForm_CanFocus(b))a=WebForm_FindFirstFocusableChild(b);if(a&&typeof a.contentEditable!=="undefined"){d=a.contentEditable;a.contentEditable=false}else a=null}WebForm_AutoFocus(this._controlIDToFocus);if(a)a.contentEditable=d;this._controlIDToFocus=null}},_splitNodeIntoArray:function(b){var a=b.content,c=a.length?a.split(","):[];return c},_uniqueIDToClientID:function(a){return a.replace(/\$/g,"_")},_updateControls:function(d,a,c,b,e){this._commitControls(this._processUpdatePanelArrays(d,a,c,e),b)},_updatePanel:function(updatePanelElement,rendering){for(var updatePanelID in this._scriptDisposes)if(this._elementContains(updatePanelElement,document.getElementById(updatePanelID))){var disposeScripts=this._scriptDisposes[updatePanelID];for(var i=0,l=disposeScripts.length;i<l;i++)eval(disposeScripts[i]);delete this._scriptDisposes[updatePanelID]}Sys.Application.disposeElement(updatePanelElement,true);updatePanelElement.innerHTML=rendering},_validPosition:function(a){return typeof a!=="undefined"&&a!==null&&a!==0}};Sys.WebForms.PageRequestManager.getInstance=function(){var a=Sys.WebForms.PageRequestManager._instance;if(!a)a=Sys.WebForms.PageRequestManager._instance=new Sys.WebForms.PageRequestManager;return a};Sys.WebForms.PageRequestManager._addArrayElement=function(a){if(!window[a])window[a]=[];for(var b=1,c=arguments.length;b<c;b++)Array.add(window[a],arguments[b])};Sys.WebForms.PageRequestManager._initialize=function(){var a=Sys.WebForms.PageRequestManager.getInstance();a._initializeInternal.apply(a,arguments)};Sys.WebForms.PageRequestManager.registerClass("Sys.WebForms.PageRequestManager");Sys.UI._UpdateProgress=function(a){Sys.UI._UpdateProgress.initializeBase(this,[a]);this._displayAfter=500;this._dynamicLayout=true;this._associatedUpdatePanelId=null;this._beginRequestHandlerDelegate=null;this._startDelegate=null;this._endRequestHandlerDelegate=null;this._pageRequestManager=null;this._timerCookie=null};Sys.UI._UpdateProgress.prototype={get_displayAfter:function(){return this._displayAfter},set_displayAfter:function(a){this._displayAfter=a},get_dynamicLayout:function(){return this._dynamicLayout},set_dynamicLayout:function(a){this._dynamicLayout=a},get_associatedUpdatePanelId:function(){return this._associatedUpdatePanelId},set_associatedUpdatePanelId:function(a){this._associatedUpdatePanelId=a},get_role:function(){return "status"},_clearTimeout:function(){if(this._timerCookie){window.clearTimeout(this._timerCookie);this._timerCookie=null}},_getUniqueID:function(b){var a=Array.indexOf(this._pageRequestManager._updatePanelClientIDs,b);return a===-1?null:this._pageRequestManager._updatePanelIDs[a]},_handleBeginRequest:function(f,e){var b=e.get_postBackElement(),a=true,d=this._associatedUpdatePanelId;if(this._associatedUpdatePanelId){var c=e.get_updatePanelsToUpdate();if(c&&c.length)a=Array.contains(c,d)||Array.contains(c,this._getUniqueID(d));else a=false}while(!a&&b){if(b.id&&this._associatedUpdatePanelId===b.id)a=true;b=b.parentNode}if(a)this._timerCookie=window.setTimeout(this._startDelegate,this._displayAfter)},_startRequest:function(){if(this._pageRequestManager.get_isInAsyncPostBack()){var a=this.get_element();if(this._dynamicLayout)a.style.display="block";else a.style.visibility="visible";if(this.get_role()==="status")a.setAttribute("aria-hidden","false")}this._timerCookie=null},_handleEndRequest:function(){var a=this.get_element();if(this._dynamicLayout)a.style.display="none";else a.style.visibility="hidden";if(this.get_role()==="status")a.setAttribute("aria-hidden","true");this._clearTimeout()},dispose:function(){if(this._beginRequestHandlerDelegate!==null){this._pageRequestManager.remove_beginRequest(this._beginRequestHandlerDelegate);this._pageRequestManager.remove_endRequest(this._endRequestHandlerDelegate);this._beginRequestHandlerDelegate=null;this._endRequestHandlerDelegate=null}this._clearTimeout();Sys.UI._UpdateProgress.callBaseMethod(this,"dispose")},initialize:function(){Sys.UI._UpdateProgress.callBaseMethod(this,"initialize");if(this.get_role()==="status")this.get_element().setAttribute("aria-hidden","true");this._beginRequestHandlerDelegate=Function.createDelegate(this,this._handleBeginRequest);this._endRequestHandlerDelegate=Function.createDelegate(this,this._handleEndRequest);this._startDelegate=Function.createDelegate(this,this._startRequest);if(Sys.WebForms&&Sys.WebForms.PageRequestManager)this._pageRequestManager=Sys.WebForms.PageRequestManager.getInstance();if(this._pageRequestManager!==null){this._pageRequestManager.add_beginRequest(this._beginRequestHandlerDelegate);this._pageRequestManager.add_endRequest(this._endRequestHandlerDelegate)}}};Sys.UI._UpdateProgress.registerClass("Sys.UI._UpdateProgress",Sys.UI.Control);
Type.registerNamespace('Sys.WebForms');Sys.WebForms.Res={"PRM_UnknownToken":"Unknown token: \u0027{0}\u0027.","PRM_MissingPanel":"Could not find UpdatePanel with ID \u0027{0}\u0027. If it is being updated dynamically then it must be inside another UpdatePanel.","PRM_ServerError":"An unknown error occurred while processing the request on the server. The status code returned from the server was: {0}","PRM_ParserError":"The message received from the server could not be parsed. Common causes for this error are when the response is modified by calls to Response.Write(), response filters, HttpModules, or server trace is enabled.\r\nDetails: {0}","PRM_TimeoutError":"The server request timed out.","PRM_ParserErrorDetails":"Error parsing near \u0027{0}\u0027.","PRM_CannotRegisterTwice":"The PageRequestManager cannot be initialized more than once."};
function WebForm_PostBackOptions(eventTarget, eventArgument, validation, validationGroup, actionUrl, trackFocus, clientSubmit) {
    this.eventTarget = eventTarget;
    this.eventArgument = eventArgument;
    this.validation = validation;
    this.validationGroup = validationGroup;
    this.actionUrl = actionUrl;
    this.trackFocus = trackFocus;
    this.clientSubmit = clientSubmit;
}
function WebForm_DoPostBackWithOptions(options) {
    var validationResult = true;
    if (options.validation) {
        if (typeof(Page_ClientValidate) == 'function') {
            validationResult = Page_ClientValidate(options.validationGroup);
        }
    }
    if (validationResult) {
        if ((typeof(options.actionUrl) != "undefined") && (options.actionUrl != null) && (options.actionUrl.length > 0)) {
            theForm.action = options.actionUrl;
        }
        if (options.trackFocus) {
            var lastFocus = theForm.elements["__LASTFOCUS"];
            if ((typeof(lastFocus) != "undefined") && (lastFocus != null)) {
                if (typeof(document.activeElement) == "undefined") {
                    lastFocus.value = options.eventTarget;
                }
                else {
                    var active = document.activeElement;
                    if ((typeof(active) != "undefined") && (active != null)) {
                        if ((typeof(active.id) != "undefined") && (active.id != null) && (active.id.length > 0)) {
                            lastFocus.value = active.id;
                        }
                        else if (typeof(active.name) != "undefined") {
                            lastFocus.value = active.name;
                        }
                    }
                }
            }
        }
    }
    if (options.clientSubmit) {
        __doPostBack(options.eventTarget, options.eventArgument);
    }
}
var __pendingCallbacks = new Array();
var __synchronousCallBackIndex = -1;
function WebForm_DoCallback(eventTarget, eventArgument, eventCallback, context, errorCallback, useAsync) {
    var postData = __theFormPostData +
                "__CALLBACKID=" + WebForm_EncodeCallback(eventTarget) +
                "&__CALLBACKPARAM=" + WebForm_EncodeCallback(eventArgument);
    if (theForm["__EVENTVALIDATION"]) {
        postData += "&__EVENTVALIDATION=" + WebForm_EncodeCallback(theForm["__EVENTVALIDATION"].value);
    }
    var xmlRequest,e;
    try {
        xmlRequest = new XMLHttpRequest();
    }
    catch(e) {
        try {
            xmlRequest = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch(e) {
        }
    }
    var setRequestHeaderMethodExists = true;
    try {
        setRequestHeaderMethodExists = (xmlRequest && xmlRequest.setRequestHeader);
    }
    catch(e) {}
    var callback = new Object();
    callback.eventCallback = eventCallback;
    callback.context = context;
    callback.errorCallback = errorCallback;
    callback.async = useAsync;
    var callbackIndex = WebForm_FillFirstAvailableSlot(__pendingCallbacks, callback);
    if (!useAsync) {
        if (__synchronousCallBackIndex != -1) {
            __pendingCallbacks[__synchronousCallBackIndex] = null;
        }
        __synchronousCallBackIndex = callbackIndex;
    }
    if (setRequestHeaderMethodExists) {
        xmlRequest.onreadystatechange = WebForm_CallbackComplete;
        callback.xmlRequest = xmlRequest;
        // e.g. http:
        var action = theForm.action || document.location.pathname, fragmentIndex = action.indexOf('#');
        if (fragmentIndex !== -1) {
            action = action.substr(0, fragmentIndex);
        }
        if (!__nonMSDOMBrowser) {
            var queryIndex = action.indexOf('?');
            if (queryIndex !== -1) {
                var path = action.substr(0, queryIndex);
                if (path.indexOf("%") === -1) {
                    action = encodeURI(path) + action.substr(queryIndex);
                }
            }
            else if (action.indexOf("%") === -1) {
                action = encodeURI(action);
            }
        }
        xmlRequest.open("POST", action, true);
        xmlRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8");
        xmlRequest.send(postData);
        return;
    }
    callback.xmlRequest = new Object();
    var callbackFrameID = "__CALLBACKFRAME" + callbackIndex;
    var xmlRequestFrame = document.frames[callbackFrameID];
    if (!xmlRequestFrame) {
        xmlRequestFrame = document.createElement("IFRAME");
        xmlRequestFrame.width = "1";
        xmlRequestFrame.height = "1";
        xmlRequestFrame.frameBorder = "0";
        xmlRequestFrame.id = callbackFrameID;
        xmlRequestFrame.name = callbackFrameID;
        xmlRequestFrame.style.position = "absolute";
        xmlRequestFrame.style.top = "-100px"
        xmlRequestFrame.style.left = "-100px";
        try {
            if (callBackFrameUrl) {
                xmlRequestFrame.src = callBackFrameUrl;
            }
        }
        catch(e) {}
        document.body.appendChild(xmlRequestFrame);
    }
    var interval = window.setInterval(function() {
        xmlRequestFrame = document.frames[callbackFrameID];
        if (xmlRequestFrame && xmlRequestFrame.document) {
            window.clearInterval(interval);
            xmlRequestFrame.document.write("");
            xmlRequestFrame.document.close();
            xmlRequestFrame.document.write('<html><body><form method="post"><input type="hidden" name="__CALLBACKLOADSCRIPT" value="t"></form></body></html>');
            xmlRequestFrame.document.close();
            xmlRequestFrame.document.forms[0].action = theForm.action;
            var count = __theFormPostCollection.length;
            var element;
            for (var i = 0; i < count; i++) {
                element = __theFormPostCollection[i];
                if (element) {
                    var fieldElement = xmlRequestFrame.document.createElement("INPUT");
                    fieldElement.type = "hidden";
                    fieldElement.name = element.name;
                    fieldElement.value = element.value;
                    xmlRequestFrame.document.forms[0].appendChild(fieldElement);
                }
            }
            var callbackIdFieldElement = xmlRequestFrame.document.createElement("INPUT");
            callbackIdFieldElement.type = "hidden";
            callbackIdFieldElement.name = "__CALLBACKID";
            callbackIdFieldElement.value = eventTarget;
            xmlRequestFrame.document.forms[0].appendChild(callbackIdFieldElement);
            var callbackParamFieldElement = xmlRequestFrame.document.createElement("INPUT");
            callbackParamFieldElement.type = "hidden";
            callbackParamFieldElement.name = "__CALLBACKPARAM";
            callbackParamFieldElement.value = eventArgument;
            xmlRequestFrame.document.forms[0].appendChild(callbackParamFieldElement);
            if (theForm["__EVENTVALIDATION"]) {
                var callbackValidationFieldElement = xmlRequestFrame.document.createElement("INPUT");
                callbackValidationFieldElement.type = "hidden";
                callbackValidationFieldElement.name = "__EVENTVALIDATION";
                callbackValidationFieldElement.value = theForm["__EVENTVALIDATION"].value;
                xmlRequestFrame.document.forms[0].appendChild(callbackValidationFieldElement);
            }
            var callbackIndexFieldElement = xmlRequestFrame.document.createElement("INPUT");
            callbackIndexFieldElement.type = "hidden";
            callbackIndexFieldElement.name = "__CALLBACKINDEX";
            callbackIndexFieldElement.value = callbackIndex;
            xmlRequestFrame.document.forms[0].appendChild(callbackIndexFieldElement);
            xmlRequestFrame.document.forms[0].submit();
        }
    }, 10);
}
function WebForm_CallbackComplete() {
    for (var i = 0; i < __pendingCallbacks.length; i++) {
        callbackObject = __pendingCallbacks[i];
        if (callbackObject && callbackObject.xmlRequest && (callbackObject.xmlRequest.readyState == 4)) {
            if (!__pendingCallbacks[i].async) {
                __synchronousCallBackIndex = -1;
            }
            __pendingCallbacks[i] = null;
            var callbackFrameID = "__CALLBACKFRAME" + i;
            var xmlRequestFrame = document.getElementById(callbackFrameID);
            if (xmlRequestFrame) {
                xmlRequestFrame.parentNode.removeChild(xmlRequestFrame);
            }
            WebForm_ExecuteCallback(callbackObject);
        }
    }
}
function WebForm_ExecuteCallback(callbackObject) {
    var response = callbackObject.xmlRequest.responseText;
    if (response.charAt(0) == "s") {
        if ((typeof(callbackObject.eventCallback) != "undefined") && (callbackObject.eventCallback != null)) {
            callbackObject.eventCallback(response.substring(1), callbackObject.context);
        }
    }
    else if (response.charAt(0) == "e") {
        if ((typeof(callbackObject.errorCallback) != "undefined") && (callbackObject.errorCallback != null)) {
            callbackObject.errorCallback(response.substring(1), callbackObject.context);
        }
    }
    else {
        var separatorIndex = response.indexOf("|");
        if (separatorIndex != -1) {
            var validationFieldLength = parseInt(response.substring(0, separatorIndex));
            if (!isNaN(validationFieldLength)) {
                var validationField = response.substring(separatorIndex + 1, separatorIndex + validationFieldLength + 1);
                if (validationField != "") {
                    var validationFieldElement = theForm["__EVENTVALIDATION"];
                    if (!validationFieldElement) {
                        validationFieldElement = document.createElement("INPUT");
                        validationFieldElement.type = "hidden";
                        validationFieldElement.name = "__EVENTVALIDATION";
                        theForm.appendChild(validationFieldElement);
                    }
                    validationFieldElement.value = validationField;
                }
                if ((typeof(callbackObject.eventCallback) != "undefined") && (callbackObject.eventCallback != null)) {
                    callbackObject.eventCallback(response.substring(separatorIndex + validationFieldLength + 1), callbackObject.context);
                }
            }
        }
    }
}
function WebForm_FillFirstAvailableSlot(array, element) {
    var i;
    for (i = 0; i < array.length; i++) {
        if (!array[i]) break;
    }
    array[i] = element;
    return i;
}
var __nonMSDOMBrowser = (window.navigator.appName.toLowerCase().indexOf('explorer') == -1);
var __theFormPostData = "";
var __theFormPostCollection = new Array();
var __callbackTextTypes = /^(text|password|hidden|search|tel|url|email|number|range|color|datetime|date|month|week|time|datetime-local)$/i;
function WebForm_InitCallback() {
    var formElements = theForm.elements,
        count = formElements.length,
        element;
    for (var i = 0; i < count; i++) {
        element = formElements[i];
        var tagName = element.tagName.toLowerCase();
        if (tagName == "input") {
            var type = element.type;
            if ((__callbackTextTypes.test(type) || ((type == "checkbox" || type == "radio") && element.checked))
                && (element.id != "__EVENTVALIDATION")) {
                WebForm_InitCallbackAddField(element.name, element.value);
            }
        }
        else if (tagName == "select") {
            var selectCount = element.options.length;
            for (var j = 0; j < selectCount; j++) {
                var selectChild = element.options[j];
                if (selectChild.selected == true) {
                    WebForm_InitCallbackAddField(element.name, element.value);
                }
            }
        }
        else if (tagName == "textarea") {
            WebForm_InitCallbackAddField(element.name, element.value);
        }
    }
}
function WebForm_InitCallbackAddField(name, value) {
    var nameValue = new Object();
    nameValue.name = name;
    nameValue.value = value;
    __theFormPostCollection[__theFormPostCollection.length] = nameValue;
    __theFormPostData += WebForm_EncodeCallback(name) + "=" + WebForm_EncodeCallback(value) + "&";
}
function WebForm_EncodeCallback(parameter) {
    if (encodeURIComponent) {
        return encodeURIComponent(parameter);
    }
    else {
        return escape(parameter);
    }
}
var __disabledControlArray = new Array();
function WebForm_ReEnableControls() {
    if (typeof(__enabledControlArray) == 'undefined') {
        return false;
    }
    var disabledIndex = 0;
    for (var i = 0; i < __enabledControlArray.length; i++) {
        var c;
        if (__nonMSDOMBrowser) {
            c = document.getElementById(__enabledControlArray[i]);
        }
        else {
            c = document.all[__enabledControlArray[i]];
        }
        if ((typeof(c) != "undefined") && (c != null) && (c.disabled == true)) {
            c.disabled = false;
            __disabledControlArray[disabledIndex++] = c;
        }
    }
    setTimeout("WebForm_ReDisableControls()", 0);
    return true;
}
function WebForm_ReDisableControls() {
    for (var i = 0; i < __disabledControlArray.length; i++) {
        __disabledControlArray[i].disabled = true;
    }
}
function WebForm_SimulateClick(element, event) {
    var clickEvent;
    if (element) {
        if (element.click) {
            element.click();
        } else { 
            clickEvent = document.createEvent("MouseEvents");
            clickEvent.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null);
            if (!element.dispatchEvent(clickEvent)) {
                return true;
            }
        }
        event.cancelBubble = true;
        if (event.stopPropagation) {
            event.stopPropagation();
        }
        return false;
    }
    return true;
}
function WebForm_FireDefaultButton(event, target) {
    if (event.keyCode == 13) {
        var src = event.srcElement || event.target;
        if (src &&
            ((src.tagName.toLowerCase() == "input") &&
             (src.type.toLowerCase() == "submit" || src.type.toLowerCase() == "button")) ||
            ((src.tagName.toLowerCase() == "a") &&
             (src.href != null) && (src.href != "")) ||
            (src.tagName.toLowerCase() == "textarea")) {
            return true;
        }
        var defaultButton;
        if (__nonMSDOMBrowser) {
            defaultButton = document.getElementById(target);
        }
        else {
            defaultButton = document.all[target];
        }
        if (defaultButton) {
            return WebForm_SimulateClick(defaultButton, event);
        } 
    }
    return true;
}
function WebForm_GetScrollX() {
    if (__nonMSDOMBrowser) {
        return window.pageXOffset;
    }
    else {
        if (document.documentElement && document.documentElement.scrollLeft) {
            return document.documentElement.scrollLeft;
        }
        else if (document.body) {
            return document.body.scrollLeft;
        }
    }
    return 0;
}
function WebForm_GetScrollY() {
    if (__nonMSDOMBrowser) {
        return window.pageYOffset;
    }
    else {
        if (document.documentElement && document.documentElement.scrollTop) {
            return document.documentElement.scrollTop;
        }
        else if (document.body) {
            return document.body.scrollTop;
        }
    }
    return 0;
}
function WebForm_SaveScrollPositionSubmit() {
    if (__nonMSDOMBrowser) {
        theForm.elements['__SCROLLPOSITIONY'].value = window.pageYOffset;
        theForm.elements['__SCROLLPOSITIONX'].value = window.pageXOffset;
    }
    else {
        theForm.__SCROLLPOSITIONX.value = WebForm_GetScrollX();
        theForm.__SCROLLPOSITIONY.value = WebForm_GetScrollY();
    }
    if ((typeof(this.oldSubmit) != "undefined") && (this.oldSubmit != null)) {
        return this.oldSubmit();
    }
    return true;
}
function WebForm_SaveScrollPositionOnSubmit() {
    theForm.__SCROLLPOSITIONX.value = WebForm_GetScrollX();
    theForm.__SCROLLPOSITIONY.value = WebForm_GetScrollY();
    if ((typeof(this.oldOnSubmit) != "undefined") && (this.oldOnSubmit != null)) {
        return this.oldOnSubmit();
    }
    return true;
}
function WebForm_RestoreScrollPosition() {
    if (__nonMSDOMBrowser) {
        window.scrollTo(theForm.elements['__SCROLLPOSITIONX'].value, theForm.elements['__SCROLLPOSITIONY'].value);
    }
    else {
        window.scrollTo(theForm.__SCROLLPOSITIONX.value, theForm.__SCROLLPOSITIONY.value);
    }
    if ((typeof(theForm.oldOnLoad) != "undefined") && (theForm.oldOnLoad != null)) {
        return theForm.oldOnLoad();
    }
    return true;
}
function WebForm_TextBoxKeyHandler(event) {
    if (event.keyCode == 13) {
        var target;
        if (__nonMSDOMBrowser) {
            target = event.target;
        }
        else {
            target = event.srcElement;
        }
        if ((typeof(target) != "undefined") && (target != null)) {
            if (typeof(target.onchange) != "undefined") {
                target.onchange();
                event.cancelBubble = true;
                if (event.stopPropagation) event.stopPropagation();
                return false;
            }
        }
    }
    return true;
}
function WebForm_TrimString(value) {
    return value.replace(/^\s+|\s+$/g, '')
}
function WebForm_AppendToClassName(element, className) {
    var currentClassName = ' ' + WebForm_TrimString(element.className) + ' ';
    className = WebForm_TrimString(className);
    var index = currentClassName.indexOf(' ' + className + ' ');
    if (index === -1) {
        element.className = (element.className === '') ? className : element.className + ' ' + className;
    }
}
function WebForm_RemoveClassName(element, className) {
    var currentClassName = ' ' + WebForm_TrimString(element.className) + ' ';
    className = WebForm_TrimString(className);
    var index = currentClassName.indexOf(' ' + className + ' ');
    if (index >= 0) {
        element.className = WebForm_TrimString(currentClassName.substring(0, index) + ' ' +
            currentClassName.substring(index + className.length + 1, currentClassName.length));
    }
}
function WebForm_GetElementById(elementId) {
    if (document.getElementById) {
        return document.getElementById(elementId);
    }
    else if (document.all) {
        return document.all[elementId];
    }
    else return null;
}
function WebForm_GetElementByTagName(element, tagName) {
    var elements = WebForm_GetElementsByTagName(element, tagName);
    if (elements && elements.length > 0) {
        return elements[0];
    }
    else return null;
}
function WebForm_GetElementsByTagName(element, tagName) {
    if (element && tagName) {
        if (element.getElementsByTagName) {
            return element.getElementsByTagName(tagName);
        }
        if (element.all && element.all.tags) {
            return element.all.tags(tagName);
        }
    }
    return null;
}
function WebForm_GetElementDir(element) {
    if (element) {
        if (element.dir) {
            return element.dir;
        }
        return WebForm_GetElementDir(element.parentNode);
    }
    return "ltr";
}
function WebForm_GetElementPosition(element) {
    var result = new Object();
    result.x = 0;
    result.y = 0;
    result.width = 0;
    result.height = 0;
    if (element.offsetParent) {
        result.x = element.offsetLeft;
        result.y = element.offsetTop;
        var parent = element.offsetParent;
        while (parent) {
            result.x += parent.offsetLeft;
            result.y += parent.offsetTop;
            var parentTagName = parent.tagName.toLowerCase();
            if (parentTagName != "table" &&
                parentTagName != "body" && 
                parentTagName != "html" && 
                parentTagName != "div" && 
                parent.clientTop && 
                parent.clientLeft) {
                result.x += parent.clientLeft;
                result.y += parent.clientTop;
            }
            parent = parent.offsetParent;
        }
    }
    else if (element.left && element.top) {
        result.x = element.left;
        result.y = element.top;
    }
    else {
        if (element.x) {
            result.x = element.x;
        }
        if (element.y) {
            result.y = element.y;
        }
    }
    if (element.offsetWidth && element.offsetHeight) {
        result.width = element.offsetWidth;
        result.height = element.offsetHeight;
    }
    else if (element.style && element.style.pixelWidth && element.style.pixelHeight) {
        result.width = element.style.pixelWidth;
        result.height = element.style.pixelHeight;
    }
    return result;
}
function WebForm_GetParentByTagName(element, tagName) {
    var parent = element.parentNode;
    var upperTagName = tagName.toUpperCase();
    while (parent && (parent.tagName.toUpperCase() != upperTagName)) {
        parent = parent.parentNode ? parent.parentNode : parent.parentElement;
    }
    return parent;
}
function WebForm_SetElementHeight(element, height) {
    if (element && element.style) {
        element.style.height = height + "px";
    }
}
function WebForm_SetElementWidth(element, width) {
    if (element && element.style) {
        element.style.width = width + "px";
    }
}
function WebForm_SetElementX(element, x) {
    if (element && element.style) {
        element.style.left = x + "px";
    }
}
function WebForm_SetElementY(element, y) {
    if (element && element.style) {
        element.style.top = y + "px";
    }
}
var Page_ValidationVer = "125";
var Page_IsValid = true;
var Page_BlockSubmit = false;
var Page_InvalidControlToBeFocused = null;
var Page_TextTypes = /^(text|password|file|search|tel|url|email|number|range|color|datetime|date|month|week|time|datetime-local)$/i;
function ValidatorUpdateDisplay(val) {
    if (typeof(val.display) == "string") {
        if (val.display == "None") {
            return;
        }
        if (val.display == "Dynamic") {
            val.style.display = val.isvalid ? "none" : "inline";
            return;
        }
    }
    if ((navigator.userAgent.indexOf("Mac") > -1) &&
        (navigator.userAgent.indexOf("MSIE") > -1)) {
        val.style.display = "inline";
    }
    val.style.visibility = val.isvalid ? "hidden" : "visible";
}
function ValidatorUpdateIsValid() {
    Page_IsValid = AllValidatorsValid(Page_Validators);
}
function AllValidatorsValid(validators) {
    if ((typeof(validators) != "undefined") && (validators != null)) {
        var i;
        for (i = 0; i < validators.length; i++) {
            if (!validators[i].isvalid) {
                return false;
            }
        }
    }
    return true;
}
function ValidatorHookupControlID(controlID, val) {
    if (typeof(controlID) != "string") {
        return;
    }
    var ctrl = document.getElementById(controlID);
    if ((typeof(ctrl) != "undefined") && (ctrl != null)) {
        ValidatorHookupControl(ctrl, val);
    }
    else {
        val.isvalid = true;
        val.enabled = false;
    }
}
function ValidatorHookupControl(control, val) {
    if (typeof(control.tagName) != "string") {
        return;  
    }
    if (control.tagName != "INPUT" && control.tagName != "TEXTAREA" && control.tagName != "SELECT") {
        var i;
        for (i = 0; i < control.childNodes.length; i++) {
            ValidatorHookupControl(control.childNodes[i], val);
        }
        return;
    }
    else {
        if (typeof(control.Validators) == "undefined") {
            control.Validators = new Array;
            var eventType;
            if (control.type == "radio") {
                eventType = "onclick";
            } else {
                eventType = "onchange";
                if (typeof(val.focusOnError) == "string" && val.focusOnError == "t") {
                    ValidatorHookupEvent(control, "onblur", "ValidatedControlOnBlur(event); ");
                }
            }
            ValidatorHookupEvent(control, eventType, "ValidatorOnChange(event); ");
            if (Page_TextTypes.test(control.type)) {
                ValidatorHookupEvent(control, "onkeypress", 
                    "event = event || window.event; if (!ValidatedTextBoxOnKeyPress(event)) { event.cancelBubble = true; if (event.stopPropagation) event.stopPropagation(); return false; } ");
            }
        }
        control.Validators[control.Validators.length] = val;
    }
}
function ValidatorHookupEvent(control, eventType, functionPrefix) {
    var ev = control[eventType];
    if (typeof(ev) == "function") {
        ev = ev.toString();
        ev = ev.substring(ev.indexOf("{") + 1, ev.lastIndexOf("}"));
    }
    else {
        ev = "";
    }
    control[eventType] = new Function("event", functionPrefix + " " + ev);
}
function ValidatorGetValue(id) {
    var control;
    control = document.getElementById(id);
    if (typeof(control.value) == "string") {
        return control.value;
    }
    return ValidatorGetValueRecursive(control);
}
function ValidatorGetValueRecursive(control)
{
    if (typeof(control.value) == "string" && (control.type != "radio" || control.checked == true)) {
        return control.value;
    }
    var i, val;
    for (i = 0; i<control.childNodes.length; i++) {
        val = ValidatorGetValueRecursive(control.childNodes[i]);
        if (val != "") return val;
    }
    return "";
}
function Page_ClientValidate(validationGroup) {
    Page_InvalidControlToBeFocused = null;
    if (typeof(Page_Validators) == "undefined") {
        return true;
    }
    var i;
    for (i = 0; i < Page_Validators.length; i++) {
        ValidatorValidate(Page_Validators[i], validationGroup, null);
    }
    ValidatorUpdateIsValid();
    ValidationSummaryOnSubmit(validationGroup);
    Page_BlockSubmit = !Page_IsValid;
    return Page_IsValid;
}
function ValidatorCommonOnSubmit() {
    Page_InvalidControlToBeFocused = null;
    var result = !Page_BlockSubmit;
    if ((typeof(window.event) != "undefined") && (window.event != null)) {
        window.event.returnValue = result;
    }
    Page_BlockSubmit = false;
    return result;
}
function ValidatorEnable(val, enable) {
    val.enabled = (enable != false);
    ValidatorValidate(val);
    ValidatorUpdateIsValid();
}
function ValidatorOnChange(event) {
    event = event || window.event;
    Page_InvalidControlToBeFocused = null;
    var targetedControl;
    if ((typeof(event.srcElement) != "undefined") && (event.srcElement != null)) {
        targetedControl = event.srcElement;
    }
    else {
        targetedControl = event.target;
    }
    var vals;
    if (typeof(targetedControl.Validators) != "undefined") {
        vals = targetedControl.Validators;
    }
    else {
        if (targetedControl.tagName.toLowerCase() == "label") {
            targetedControl = document.getElementById(targetedControl.htmlFor);
            vals = targetedControl.Validators;
        }
    }
    if (vals) {
        for (var i = 0; i < vals.length; i++) {
            ValidatorValidate(vals[i], null, event);
        }
    }
    ValidatorUpdateIsValid();
}
function ValidatedTextBoxOnKeyPress(event) {
    event = event || window.event;
    if (event.keyCode == 13) {
        ValidatorOnChange(event);
        var vals;
        if ((typeof(event.srcElement) != "undefined") && (event.srcElement != null)) {
            vals = event.srcElement.Validators;
        }
        else {
            vals = event.target.Validators;
        }
        return AllValidatorsValid(vals);
    }
    return true;
}
function ValidatedControlOnBlur(event) {
    event = event || window.event;
    var control;
    if ((typeof(event.srcElement) != "undefined") && (event.srcElement != null)) {
        control = event.srcElement;
    }
    else {
        control = event.target;
    }
    if ((typeof(control) != "undefined") && (control != null) && (Page_InvalidControlToBeFocused == control)) {
        control.focus();
        Page_InvalidControlToBeFocused = null;
    }
}
function ValidatorValidate(val, validationGroup, event) {
    val.isvalid = true;
    if ((typeof(val.enabled) == "undefined" || val.enabled != false) && IsValidationGroupMatch(val, validationGroup)) {
        if (typeof(val.evaluationfunction) == "function") {
            val.isvalid = val.evaluationfunction(val);
            if (!val.isvalid && Page_InvalidControlToBeFocused == null &&
                typeof(val.focusOnError) == "string" && val.focusOnError == "t") {
                ValidatorSetFocus(val, event);
            }
        }
    }
    ValidatorUpdateDisplay(val);
}
function ValidatorSetFocus(val, event) {
    var ctrl;
    if (typeof(val.controlhookup) == "string") {
        var eventCtrl;
        if ((typeof(event) != "undefined") && (event != null)) {
            if ((typeof(event.srcElement) != "undefined") && (event.srcElement != null)) {
                eventCtrl = event.srcElement;
            }
            else {
                eventCtrl = event.target;
            }
        }
        if ((typeof(eventCtrl) != "undefined") && (eventCtrl != null) &&
            (typeof(eventCtrl.id) == "string") &&
            (eventCtrl.id == val.controlhookup)) {
            ctrl = eventCtrl;
        }
    }
    if ((typeof(ctrl) == "undefined") || (ctrl == null)) {
        ctrl = document.getElementById(val.controltovalidate);
    }
    if ((typeof(ctrl) != "undefined") && (ctrl != null) &&
        (ctrl.tagName.toLowerCase() != "table" || (typeof(event) == "undefined") || (event == null)) && 
        ((ctrl.tagName.toLowerCase() != "input") || (ctrl.type.toLowerCase() != "hidden")) &&
        (typeof(ctrl.disabled) == "undefined" || ctrl.disabled == null || ctrl.disabled == false) &&
        (typeof(ctrl.visible) == "undefined" || ctrl.visible == null || ctrl.visible != false) &&
        (IsInVisibleContainer(ctrl))) {
        if ((ctrl.tagName.toLowerCase() == "table" && (typeof(__nonMSDOMBrowser) == "undefined" || __nonMSDOMBrowser)) ||
            (ctrl.tagName.toLowerCase() == "span")) {
            var inputElements = ctrl.getElementsByTagName("input");
            var lastInputElement  = inputElements[inputElements.length -1];
            if (lastInputElement != null) {
                ctrl = lastInputElement;
            }
        }
        if (typeof(ctrl.focus) != "undefined" && ctrl.focus != null) {
            ctrl.focus();
            Page_InvalidControlToBeFocused = ctrl;
        }
    }
}
function IsInVisibleContainer(ctrl) {
    if (typeof(ctrl.style) != "undefined" &&
        ( ( typeof(ctrl.style.display) != "undefined" &&
            ctrl.style.display == "none") ||
          ( typeof(ctrl.style.visibility) != "undefined" &&
            ctrl.style.visibility == "hidden") ) ) {
        return false;
    }
    else if (typeof(ctrl.parentNode) != "undefined" &&
             ctrl.parentNode != null &&
             ctrl.parentNode != ctrl) {
        return IsInVisibleContainer(ctrl.parentNode);
    }
    return true;
}
function IsValidationGroupMatch(control, validationGroup) {
    if ((typeof(validationGroup) == "undefined") || (validationGroup == null)) {
        return true;
    }
    var controlGroup = "";
    if (typeof(control.validationGroup) == "string") {
        controlGroup = control.validationGroup;
    }
    return (controlGroup == validationGroup);
}
function ValidatorOnLoad() {
    if (typeof(Page_Validators) == "undefined")
        return;
    var i, val;
    for (i = 0; i < Page_Validators.length; i++) {
        val = Page_Validators[i];
        if (typeof(val.evaluationfunction) == "string") {
            eval("val.evaluationfunction = " + val.evaluationfunction + ";");
        }
        if (typeof(val.isvalid) == "string") {
            if (val.isvalid == "False") {
                val.isvalid = false;
                Page_IsValid = false;
            }
            else {
                val.isvalid = true;
            }
        } else {
            val.isvalid = true;
        }
        if (typeof(val.enabled) == "string") {
            val.enabled = (val.enabled != "False");
        }
        if (typeof(val.controltovalidate) == "string") {
            ValidatorHookupControlID(val.controltovalidate, val);
        }
        if (typeof(val.controlhookup) == "string") {
            ValidatorHookupControlID(val.controlhookup, val);
        }
    }
    Page_ValidationActive = true;
}
function ValidatorConvert(op, dataType, val) {
    function GetFullYear(year) {
        var twoDigitCutoffYear = val.cutoffyear % 100;
        var cutoffYearCentury = val.cutoffyear - twoDigitCutoffYear;
        return ((year > twoDigitCutoffYear) ? (cutoffYearCentury - 100 + year) : (cutoffYearCentury + year));
    }
    var num, cleanInput, m, exp;
    if (dataType == "Integer") {
        exp = /^\s*[-\+]?\d+\s*$/;
        if (op.match(exp) == null)
            return null;
        num = parseInt(op, 10);
        return (isNaN(num) ? null : num);
    }
    else if(dataType == "Double") {
        exp = new RegExp("^\\s*([-\\+])?(\\d*)\\" + val.decimalchar + "?(\\d*)\\s*$");
        m = op.match(exp);
        if (m == null)
            return null;
        if (m[2].length == 0 && m[3].length == 0)
            return null;
        cleanInput = (m[1] != null ? m[1] : "") + (m[2].length>0 ? m[2] : "0") + (m[3].length>0 ? "." + m[3] : "");
        num = parseFloat(cleanInput);
        return (isNaN(num) ? null : num);
    }
    else if (dataType == "Currency") {
        var hasDigits = (val.digits > 0);
        var beginGroupSize, subsequentGroupSize;
        var groupSizeNum = parseInt(val.groupsize, 10);
        if (!isNaN(groupSizeNum) && groupSizeNum > 0) {
            beginGroupSize = "{1," + groupSizeNum + "}";
            subsequentGroupSize = "{" + groupSizeNum + "}";
        }
        else {
            beginGroupSize = subsequentGroupSize = "+";
        }
        exp = new RegExp("^\\s*([-\\+])?((\\d" + beginGroupSize + "(\\" + val.groupchar + "\\d" + subsequentGroupSize + ")+)|\\d*)"
                        + (hasDigits ? "\\" + val.decimalchar + "?(\\d{0," + val.digits + "})" : "")
                        + "\\s*$");
        m = op.match(exp);
        if (m == null)
            return null;
        if (m[2].length == 0 && hasDigits && m[5].length == 0)
            return null;
        cleanInput = (m[1] != null ? m[1] : "") + m[2].replace(new RegExp("(\\" + val.groupchar + ")", "g"), "") + ((hasDigits && m[5].length > 0) ? "." + m[5] : "");
        num = parseFloat(cleanInput);
        return (isNaN(num) ? null : num);
    }
    else if (dataType == "Date") {
        var yearFirstExp = new RegExp("^\\s*((\\d{4})|(\\d{2}))([-/]|\\. ?)(\\d{1,2})\\4(\\d{1,2})\\.?\\s*$");
        m = op.match(yearFirstExp);
        var day, month, year;
        if (m != null && (((typeof(m[2]) != "undefined") && (m[2].length == 4)) || val.dateorder == "ymd")) {
            day = m[6];
            month = m[5];
            year = (m[2].length == 4) ? m[2] : GetFullYear(parseInt(m[3], 10));
        }
        else {
            if (val.dateorder == "ymd"){
                return null;
            }
            var yearLastExp = new RegExp("^\\s*(\\d{1,2})([-/]|\\. ?)(\\d{1,2})(?:\\s|\\2)((\\d{4})|(\\d{2}))(?:\\s\u0433\\.|\\.)?\\s*$");
            m = op.match(yearLastExp);
            if (m == null) {
                return null;
            }
            if (val.dateorder == "mdy") {
                day = m[3];
                month = m[1];
            }
            else {
                day = m[1];
                month = m[3];
            }
            year = ((typeof(m[5]) != "undefined") && (m[5].length == 4)) ? m[5] : GetFullYear(parseInt(m[6], 10));
        }
        month -= 1;
        var date = new Date(year, month, day);
        if (year < 100) {
            date.setFullYear(year);
        }
        return (typeof(date) == "object" && year == date.getFullYear() && month == date.getMonth() && day == date.getDate()) ? date.valueOf() : null;
    }
    else {
        return op.toString();
    }
}
function ValidatorCompare(operand1, operand2, operator, val) {
    var dataType = val.type;
    var op1, op2;
    if ((op1 = ValidatorConvert(operand1, dataType, val)) == null)
        return false;
    if (operator == "DataTypeCheck")
        return true;
    if ((op2 = ValidatorConvert(operand2, dataType, val)) == null)
        return true;
    switch (operator) {
        case "NotEqual":
            return (op1 != op2);
        case "GreaterThan":
            return (op1 > op2);
        case "GreaterThanEqual":
            return (op1 >= op2);
        case "LessThan":
            return (op1 < op2);
        case "LessThanEqual":
            return (op1 <= op2);
        default:
            return (op1 == op2);
    }
}
function CompareValidatorEvaluateIsValid(val) {
    var value = ValidatorGetValue(val.controltovalidate);
    if (ValidatorTrim(value).length == 0)
        return true;
    var compareTo = "";
    if ((typeof(val.controltocompare) != "string") ||
        (typeof(document.getElementById(val.controltocompare)) == "undefined") ||
        (null == document.getElementById(val.controltocompare))) {
        if (typeof(val.valuetocompare) == "string") {
            compareTo = val.valuetocompare;
        }
    }
    else {
        compareTo = ValidatorGetValue(val.controltocompare);
    }
    var operator = "Equal";
    if (typeof(val.operator) == "string") {
        operator = val.operator;
    }
    return ValidatorCompare(value, compareTo, operator, val);
}
function CustomValidatorEvaluateIsValid(val) {
    var value = "";
    if (typeof(val.controltovalidate) == "string") {
        value = ValidatorGetValue(val.controltovalidate);
        if ((ValidatorTrim(value).length == 0) &&
            ((typeof(val.validateemptytext) != "string") || (val.validateemptytext != "true"))) {
            return true;
        }
    }
    var args = { Value:value, IsValid:true };
    if (typeof(val.clientvalidationfunction) == "string") {
        eval(val.clientvalidationfunction + "(val, args) ;");
    }
    return args.IsValid;
}
function RegularExpressionValidatorEvaluateIsValid(val) {
    var value = ValidatorGetValue(val.controltovalidate);
    if (ValidatorTrim(value).length == 0)
        return true;
    var rx = new RegExp(val.validationexpression);
    var matches = rx.exec(value);
    return (matches != null && value == matches[0]);
}
function ValidatorTrim(s) {
    var m = s.match(/^\s*(\S+(\s+\S+)*)\s*$/);
    return (m == null) ? "" : m[1];
}
function RequiredFieldValidatorEvaluateIsValid(val) {
    return (ValidatorTrim(ValidatorGetValue(val.controltovalidate)) != ValidatorTrim(val.initialvalue))
}
function RangeValidatorEvaluateIsValid(val) {
    var value = ValidatorGetValue(val.controltovalidate);
    if (ValidatorTrim(value).length == 0)
        return true;
    return (ValidatorCompare(value, val.minimumvalue, "GreaterThanEqual", val) &&
            ValidatorCompare(value, val.maximumvalue, "LessThanEqual", val));
}
function ValidationSummaryOnSubmit(validationGroup) {
    if (typeof(Page_ValidationSummaries) == "undefined")
        return;
    var summary, sums, s;
    var headerSep, first, pre, post, end;
    for (sums = 0; sums < Page_ValidationSummaries.length; sums++) {
        summary = Page_ValidationSummaries[sums];
        if (!summary) continue;
        summary.style.display = "none";
        if (!Page_IsValid && IsValidationGroupMatch(summary, validationGroup)) {
            var i;
            if (summary.showsummary != "False") {
                summary.style.display = "";
                if (typeof(summary.displaymode) != "string") {
                    summary.displaymode = "BulletList";
                }
                switch (summary.displaymode) {
                    case "List":
                        headerSep = "<br>";
                        first = "";
                        pre = "";
                        post = "<br>";
                        end = "";
                        break;
                    case "BulletList":
                    default:
                        headerSep = "";
                        first = "<ul>";
                        pre = "<li>";
                        post = "</li>";
                        end = "</ul>";
                        break;
                    case "SingleParagraph":
                        headerSep = " ";
                        first = "";
                        pre = "";
                        post = " ";
                        end = "<br>";
                        break;
                }
                s = "";
                if (typeof(summary.headertext) == "string") {
                    s += summary.headertext + headerSep;
                }
                s += first;
                for (i=0; i<Page_Validators.length; i++) {
                    if (!Page_Validators[i].isvalid && typeof(Page_Validators[i].errormessage) == "string") {
                        s += pre + Page_Validators[i].errormessage + post;
                    }
                }
                s += end;
                summary.innerHTML = s;
                window.scrollTo(0,0);
            }
            if (summary.showmessagebox == "True") {
                s = "";
                if (typeof(summary.headertext) == "string") {
                    s += summary.headertext + "\r\n";
                }
                var lastValIndex = Page_Validators.length - 1;
                for (i=0; i<=lastValIndex; i++) {
                    if (!Page_Validators[i].isvalid && typeof(Page_Validators[i].errormessage) == "string") {
                        switch (summary.displaymode) {
                            case "List":
                                s += Page_Validators[i].errormessage;
                                if (i < lastValIndex) {
                                    s += "\r\n";
                                }
                                break;
                            case "BulletList":
                            default:
                                s += "- " + Page_Validators[i].errormessage;
                                if (i < lastValIndex) {
                                    s += "\r\n";
                                }
                                break;
                            case "SingleParagraph":
                                s += Page_Validators[i].errormessage + " ";
                                break;
                        }
                    }
                }
                alert(s);
            }
        }
    }
}
if (window.jQuery) {
    (function ($) {
        var dataValidationAttribute = "data-val",
            dataValidationSummaryAttribute = "data-valsummary",
            normalizedAttributes = { validationgroup: "validationGroup", focusonerror: "focusOnError" };
        function getAttributesWithPrefix(element, prefix) {
            var i,
                attribute,
                list = {},
                attributes = element.attributes,
                length = attributes.length,
                prefixLength = prefix.length;
            prefix = prefix.toLowerCase();
            for (i = 0; i < length; i++) {
                attribute = attributes[i];
                if (attribute.specified && attribute.name.substr(0, prefixLength).toLowerCase() === prefix) {
                    list[attribute.name.substr(prefixLength)] = attribute.value;
                }
            }
            return list;
        }
        function normalizeKey(key) {
            key = key.toLowerCase();
            return normalizedAttributes[key] === undefined ? key : normalizedAttributes[key];
        }
        function addValidationExpando(element) {
            var attributes = getAttributesWithPrefix(element, dataValidationAttribute + "-");
            $.each(attributes, function (key, value) {
                element[normalizeKey(key)] = value;
            });
        }
        function dispose(element) {
            var index = $.inArray(element, Page_Validators);
            if (index >= 0) {
                Page_Validators.splice(index, 1);
            }
        }
        function addNormalizedAttribute(name, normalizedName) {
            normalizedAttributes[name.toLowerCase()] = normalizedName;
        }
        function parseSpecificAttribute(selector, attribute, validatorsArray) {
            return $(selector).find("[" + attribute + "='true']").each(function (index, element) {
                addValidationExpando(element);
                element.dispose = function () { dispose(element); element.dispose = null; };
                if ($.inArray(element, validatorsArray) === -1) {
                    validatorsArray.push(element);
                }
            }).length;
        }
        function parse(selector) {
            var length = parseSpecificAttribute(selector, dataValidationAttribute, Page_Validators);
            length += parseSpecificAttribute(selector, dataValidationSummaryAttribute, Page_ValidationSummaries);
            return length;
        }
        function loadValidators() {
            if (typeof (ValidatorOnLoad) === "function") {
                ValidatorOnLoad();
            }
            if (typeof (ValidatorOnSubmit) === "undefined") {
                window.ValidatorOnSubmit = function () {
                    return Page_ValidationActive ? ValidatorCommonOnSubmit() : true;
                };
            }
        }
        function registerUpdatePanel() {
            if (window.Sys && Sys.WebForms && Sys.WebForms.PageRequestManager) {
                var prm = Sys.WebForms.PageRequestManager.getInstance(),
                    postBackElement, endRequestHandler;
                if (prm.get_isInAsyncPostBack()) {
                    endRequestHandler = function (sender, args) {
                        if (parse(document)) {
                            loadValidators();
                        }
                        prm.remove_endRequest(endRequestHandler);
                        endRequestHandler = null;
                    };
                    prm.add_endRequest(endRequestHandler);
                }
                prm.add_beginRequest(function (sender, args) {
                    postBackElement = args.get_postBackElement();
                });
                prm.add_pageLoaded(function (sender, args) {
                    var i, panels, valFound = 0;
                    if (typeof (postBackElement) === "undefined") {
                        return;
                    }
                    panels = args.get_panelsUpdated();
                    for (i = 0; i < panels.length; i++) {
                        valFound += parse(panels[i]);
                    }
                    panels = args.get_panelsCreated();
                    for (i = 0; i < panels.length; i++) {
                        valFound += parse(panels[i]);
                    }
                    if (valFound) {
                        loadValidators();
                    }
                });
            }
        }
        $(function () {
            if (typeof (Page_Validators) === "undefined") {
                window.Page_Validators = [];
            }
            if (typeof (Page_ValidationSummaries) === "undefined") {
                window.Page_ValidationSummaries = [];
            }
            if (typeof (Page_ValidationActive) === "undefined") {
                window.Page_ValidationActive = false;
            }
            $.WebFormValidator = {
                addNormalizedAttribute: addNormalizedAttribute,
                parse: parse
            };
            if (parse(document)) {
                loadValidators();
            }
            registerUpdatePanel();
        });
    } (jQuery));
}
Type.registerNamespace("Roblox.Controls.Image"); Roblox.Controls.Image.IE6Hack = function(a) { a = a.getElementsByTagName("img")[0]; var b = a.src; a.src = a.blankUrl; a.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='crop', src='" + b + "')" }; Roblox.Controls.Image.SetImageSrc = function(a, b) { a = a.getElementsByTagName("img")[0]; if (a.blankUrl) a.runtimeStyle.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='crop', src='" + b + "')"; else a.src = b }; Roblox.Controls.Image.IsBadImage = function(a) { if (!a.complete) return false; if (typeof a.naturalWidth != "undefined" && a.naturalWidth === 0) return false; return true }; Roblox.Controls.Image.ErrorUrl = ""; Roblox.Controls.Image.OnError = function(a) { if (Roblox.Controls.Image.IsBadImage(a)) { var b = new XMLHttpRequest; a = a.src; b.open("POST", Roblox.Controls.Image.ErrorUrl, true); b.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); b.setRequestHeader("Content-length", a.length); b.setRequestHeader("Connection", "close"); b.send(a) } return false };
// Image.Js.  Register the namespace for the control.
Type.registerNamespace('Roblox.Thumbs');

//
// Define the control properties.
//
Roblox.Thumbs.Image = function (element) {
    Roblox.Thumbs.Image.initializeBase(this, [element]);
    this._fileExtension = null;
    this._spinnerUrl = null;
    this._pollTime = 3000;
    this._waitTime = 0;
    this._webService = null;
    this._requestThumbnail = null;
    this._updateTimeout = null;
    this._spinner = null;
};

//
// Create the prototype for the control.
//
Roblox.Thumbs.Image.prototype = {

    initialize: function () {
        Roblox.Thumbs.Image.callBaseMethod(this, 'initialize');
    },

    dispose: function () {
        if (typeof (this._updateTimeout) !== 'undefined')
            window.clearTimeout(this._updateTimeout);
        Roblox.Thumbs.Image.callBaseMethod(this, 'dispose');
    },

    _showSpinner: function () {
        if (this._spinner !== null)
            return;

        this.get_element().style.position = "relative";
        this._spinner = document.createElement("img");
        this._spinner.style.position = "absolute";
        this._spinner.style.left = "0px";
        this._spinner.style.top = "0px";
        this._spinner.style.height = "16px";
        this._spinner.style.width = "16px";
        this._spinner.style.border = 0;
        this._spinner.src = this._spinnerUrl;
        this.get_element().appendChild(this._spinner);
    },

    _hideSpinner: function () {
        if (!this._spinner)
            return;
        var e = this.get_element();
        if (e) {
            e.removeChild(this._spinner);
        }
        this._spinner = null;
    },

    _onUpdate: function () {

        if (!this._webService) {
            this._hideSpinner();
            return;
        }
        this._showSpinner();
        this._requestThumbnail();
    },

    _onUrl: function (result) {

        if (!this.get_element()) {
            this._hideSpinner();
            return;
        }

        Roblox.Controls.Image.SetImageSrc(this.get_element(), result.url);

        if ((!result.final || result.url.indexOf("unavail") > 0) && this._waitTime <= 40)   // Give up after 40 times.
        {
            // Try again later
            this._waitTime = parseInt(this._waitTime) + parseInt(1);
            this._updateTimeout = window.setTimeout(Function.createDelegate(this, this._onUpdate), this._pollTime);
        }
        else
            this._hideSpinner();
    },

    _onError: function (result) {
        this._hideSpinner();
    },

    get_thumbnailFormatID: function () {
        return this._thumbnailFormatID;
    },

    set_thumbnailFormatID: function (value) {
        if (this._thumbnailFormatID !== value) {
            this._thumbnailFormatID = value;
            this.raisePropertyChanged('thumbnailFormatID');
        }
    },

    get_pollTime: function () {
        return this._pollTime.value;
    },

    set_pollTime: function (value) {
        if (this._pollTime !== value) {
            this._pollTime = value;
            this.raisePropertyChanged('pollTime');
        }
    },

    get_fileExtension: function () {
        return this._fileExtension;
    },

    set_fileExtension: function (value) {
        if (this._fileExtension !== value) {
            this._fileExtension = value;
            this.raisePropertyChanged('fileExtension');
        }
    },

    get_spinnerUrl: function () {
        return this._spinnerUrl;
    },

    set_spinnerUrl: function (value) {
        if (this._spinnerUrl !== value) {
            this._spinnerUrl = value;
            this.raisePropertyChanged('spinnerUrl');
        }
    }
};

// Optional descriptor for JSON serialization.
Roblox.Thumbs.Image.descriptor = {
    properties: []
};

// Register the class as a type that inherits from Sys.UI.Control.
Roblox.Thumbs.Image.registerClass('Roblox.Thumbs.Image', Sys.UI.Control);
// AssetImage.js.  Register the namespace for the control.
Type.registerNamespace('Roblox.Thumbs');

//
// Define the control properties.
//
Roblox.Thumbs.AssetImage = function (element) {
    Roblox.Thumbs.AssetImage.initializeBase(this, [element]);
    this._assetID = 0;
    this._assetVersionID = null;
    this._ov = false;
};

//
// Create the prototype for the control.
//
Roblox.Thumbs.AssetImage.prototype = {

    initialize: function () {
        Roblox.Thumbs.AssetImage.callBaseMethod(this, 'initialize');
        this._webService = Roblox.Thumbs.Asset;
        this._requestThumbnail = Function.createDelegate(this, this.requestThumbnail);
    },

    dispose: function () {
        Roblox.Thumbs.AssetImage.callBaseMethod(this, 'dispose');
    },

    get_assetID: function () {
        return this._assetID;
    },

    set_assetID: function (value) {
        if (this._assetID !== value) {
            this._assetID = value;
            this.raisePropertyChanged('assetID');
        }
    },

    get_assetVersionID: function () {
        return this._assetVersionID;
    },

    set_assetVersionID: function (value) {
        if (this._assetVersionID !== value) {
            this._assetVersionID = value;
            this.raisePropertyChanged('assetVersionID');
        }
    },

    get_ov: function () {
        return this._ov;
    },

    set_ov: function (value) {
        if (this._ov !== value) {
            this._ov = value;
            this.raisePropertyChanged('ov');
        }
    },

    requestThumbnail: function () {
        var style = this.get_element().style;
        var width = style.pixelWidth;
        var height = style.pixelHeight;

        var onSuccess = function (result, context) { context._onUrl(result); };
        var onError = function (result, context) { context._onError(result); };

        this._webService.RequestThumbnail_v2(this._assetID, this._assetVersionID, width, height, this._fileExtension, this._thumbnailFormatID, this._ov, onSuccess, onError, this);
    }
};

// Optional descriptor for JSON serialization.
Roblox.Thumbs.AssetImage.descriptor = {
    properties: []
};

// Register the class as a type that inherits from Sys.UI.Control.
Roblox.Thumbs.AssetImage.registerClass('Roblox.Thumbs.AssetImage', Roblox.Thumbs.Image);

Roblox.Thumbs.AssetImage.updateUrl = function(componentID) {
    /// <summary>
    /// This static function (that is intended to be called from script emitted
    /// on the server)
    /// </summary>
    var a = $find(componentID);
    if (a != null || a != undefined) {
        a._onUpdate();
    }
};

Roblox.Thumbs.AssetImage.mediaPlayer = null;
Roblox.Thumbs.AssetImage.playingUrl = "";
Roblox.Thumbs.AssetImage.isInitialized = false;
Roblox.Thumbs.AssetImage.InitMediaPlayer = function () {
    if (typeof jQuery !== "undefined" && !Roblox.Thumbs.AssetImage.isInitialized) {
        Roblox.Thumbs.AssetImage.isInitialized = true;
        $(function () {
            $(document).on("click", "div.MediaPlayerIcon", function (e) {
                var target = $(e.target);
                var mediaUrl = target.attr("data-mediathumb-url");
                var stopHandler = function () {
                    target.removeClass("Pause").addClass("Play");
                    Roblox.Thumbs.AssetImage.playingUrl = "";
                    Roblox.Thumbs.AssetImage.mediaPlayer.off($.jPlayer.event.ended).off($.jPlayer.event.pause).off($.jPlayer.event.error);
                };
                var errorHandler = function () {
                    target.removeClass("Pause").addClass("Error");
                    Roblox.Thumbs.AssetImage.playingUrl = "";
                    Roblox.Thumbs.AssetImage.mediaPlayer.off($.jPlayer.event.ended).off($.jPlayer.event.pause).off($.jPlayer.event.error);
                };

                if (Roblox.Thumbs.AssetImage.mediaPlayer == null) {
                    // generate a jPlayer, when ready, setMedia and play
                    Roblox.Thumbs.AssetImage.mediaPlayer = $("<div id='MediaPlayerSingleton'></div>").appendTo("body").jPlayer({
                        swfPath: '/js/jPlayer/2.4.0/Jplayer.swf',
                        solution: "html, flash",
                        supplied: "mp3",
                        wmode: "transparent",
                        errorAlerts: false,
                        warningAlerts: false,
                        ready: function (event) {
                            Roblox.Thumbs.AssetImage.mediaPlayer.jPlayer("setMedia", { mp3: mediaUrl });
                            // handle finished event to reset icon
                            Roblox.Thumbs.AssetImage.mediaPlayer.on($.jPlayer.event.pause, stopHandler);
                            Roblox.Thumbs.AssetImage.mediaPlayer.on($.jPlayer.event.ended, stopHandler);
                            Roblox.Thumbs.AssetImage.mediaPlayer.on($.jPlayer.event.error, errorHandler);
                            Roblox.Thumbs.AssetImage.mediaPlayer.jPlayer("play");
                        }
                    });
                    Roblox.Thumbs.AssetImage.playingUrl = mediaUrl;
                    target.removeClass("Play").addClass("Pause");
                }
                else {  // player already exists
                    // stop jPlayer if it is playing.  ensure old icon is set to Play (from pause).
                    if (Roblox.Thumbs.AssetImage.playingUrl != "") {
                        Roblox.Thumbs.AssetImage.mediaPlayer.jPlayer("pause");
                        if (mediaUrl == Roblox.Thumbs.AssetImage.playingUrl) {
                            // if jPlayer was playing the selected sound, just stop playback
                            Roblox.Thumbs.AssetImage.playingUrl = "";
                            return;
                        }
                    }
                    // play the sound
                    Roblox.Thumbs.AssetImage.mediaPlayer.jPlayer("setMedia", { mp3: mediaUrl });
                    Roblox.Thumbs.AssetImage.playingUrl = mediaUrl;
                    Roblox.Thumbs.AssetImage.mediaPlayer.jPlayer("play");
                    target.removeClass("Play").addClass("Pause");
                    // handle finished event to reset icon
                    Roblox.Thumbs.AssetImage.mediaPlayer.on($.jPlayer.event.pause, stopHandler);
                    Roblox.Thumbs.AssetImage.mediaPlayer.on($.jPlayer.event.ended, stopHandler);
                    Roblox.Thumbs.AssetImage.mediaPlayer.on($.jPlayer.event.error, errorHandler);
                }
            });
        });
    }
}