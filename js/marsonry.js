! function (e) {
"use strict";

function n(n) {
var t = e.event;
return t.target = t.target || t.srcElement || n, t
}
var t = document.documentElement,
o = function () {};
t.addEventListener ? o = function (e, n, t) {
e.addEventListener(n, t, !1)
} : t.attachEvent && (o = function (e, t, o) {
e[t + o] = o.handleEvent ? function () {
var t = n(e);
o.handleEvent.call(o, t)
} : function () {
var t = n(e);
o.call(e, t)
}, e.attachEvent("on" + t, e[t + o])
});
var c = function () {};
t.removeEventListener ? c = function (e, n, t) {
e.removeEventListener(n, t, !1)
} : t.detachEvent && (c = function (e, n, t) {
e.detachEvent("on" + n, e[n + t]);
try {
delete e[n + t]
} catch (o) {
e[n + t] = void 0
}
});
var i = {
bind: o,
unbind: c
};
"function" == typeof define && define.amd ? define(i) : "object" == typeof exports ? module.exports = i : e.eventie = i
}(window);
! function (e) {
"use strict";

function t(e) {
"function" == typeof e && (t.isReady ? e() : a.push(e))
}

function n(e) {
var n = "readystatechange" === e.type && "complete" !== o.readyState;
t.isReady || n || i()
}

function i() {
t.isReady = !0;
for (var e = 0, n = a.length; n > e; e++) {
var i = a[e];
i()
}
}

function d(d) {
return "complete" === o.readyState ? i() : (d.bind(o, "DOMContentLoaded", n), d.bind(o, "readystatechange", n), d.bind(e, "load", n)), t
}
var o = e.document,
a = [];
t.isReady = !1, "function" == typeof define && define.amd ? define(["eventie/eventie"], d) : "object" == typeof exports ? module.exports = d(require("eventie")) : e.docReady = d(e.eventie)
}(window);
(function () {
"use strict";

function e() {}

function t(e, t) {
for (var n = e.length; n--;)
if (e[n].listener === t) return n;
return -1
}

function n(e) {
return function () {
return this[e].apply(this, arguments)
}
}
var r = e.prototype,
i = this,
s = i.EventEmitter;
r.getListeners = function (e) {
var t, n, r = this._getEvents();
if (e instanceof RegExp) {
t = {};
for (n in r) r.hasOwnProperty(n) && e.test(n) && (t[n] = r[n])
} else t = r[e] || (r[e] = []);
return t
}, r.flattenListeners = function (e) {
var t, n = [];
for (t = 0; t < e.length; t += 1) n.push(e[t].listener);
return n
}, r.getListenersAsObject = function (e) {
var t, n = this.getListeners(e);
return n instanceof Array && (t = {}, t[e] = n), t || n
}, r.addListener = function (e, n) {
var r, i = this.getListenersAsObject(e),
s = "object" == typeof n;
for (r in i) i.hasOwnProperty(r) && -1 === t(i[r], n) && i[r].push(s ? n : {
listener: n,
once: !1
});
return this
}, r.on = n("addListener"), r.addOnceListener = function (e, t) {
return this.addListener(e, {
listener: t,
once: !0
})
}, r.once = n("addOnceListener"), r.defineEvent = function (e) {
return this.getListeners(e), this
}, r.defineEvents = function (e) {
for (var t = 0; t < e.length; t += 1) this.defineEvent(e[t]);
return this
}, r.removeListener = function (e, n) {
var r, i, s = this.getListenersAsObject(e);
for (i in s) s.hasOwnProperty(i) && (r = t(s[i], n), -1 !== r && s[i].splice(r, 1));
return this
}, r.off = n("removeListener"), r.addListeners = function (e, t) {
return this.manipulateListeners(!1, e, t)
}, r.removeListeners = function (e, t) {
return this.manipulateListeners(!0, e, t)
}, r.manipulateListeners = function (e, t, n) {
var r, i, s = e ? this.removeListener : this.addListener,
o = e ? this.removeListeners : this.addListeners;
if ("object" != typeof t || t instanceof RegExp)
for (r = n.length; r--;) s.call(this, t, n[r]);
else
for (r in t) t.hasOwnProperty(r) && (i = t[r]) && ("function" == typeof i ? s.call(this, r, i) : o.call(this, r, i));
return this
}, r.removeEvent = function (e) {
var t, n = typeof e,
r = this._getEvents();
if ("string" === n) delete r[e];
else if (e instanceof RegExp)
for (t in r) r.hasOwnProperty(t) && e.test(t) && delete r[t];
else delete this._events;
return this
}, r.removeAllListeners = n("removeEvent"), r.emitEvent = function (e, t) {
var n, r, i, s, o = this.getListenersAsObject(e);
for (i in o)
if (o.hasOwnProperty(i))
for (r = o[i].length; r--;) n = o[i][r], n.once === !0 && this.removeListener(e, n.listener), s = n.listener.apply(this, t || []), s === this._getOnceReturnValue() && this.removeListener(e, n.listener);
return this
}, r.trigger = n("emitEvent"), r.emit = function (e) {
var t = Array.prototype.slice.call(arguments, 1);
return this.emitEvent(e, t)
}, r.setOnceReturnValue = function (e) {
return this._onceReturnValue = e, this
}, r._getOnceReturnValue = function () {
return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
}, r._getEvents = function () {
return this._events || (this._events = {})
}, e.noConflict = function () {
return i.EventEmitter = s, e
}, "function" == typeof define && define.amd ? define(function () {
return e
}) : "object" == typeof module && module.exports ? module.exports = e : i.EventEmitter = e
}).call(this);
! function (e) {
"use strict";

function t(e) {
if (e) {
if ("string" == typeof o[e]) return e;
e = e.charAt(0).toUpperCase() + e.slice(1);
for (var t, r = 0, i = n.length; i > r; r++)
if (t = n[r] + e, "string" == typeof o[t]) return t
}
}
var n = "Webkit Moz ms Ms O".split(" "),
o = document.documentElement.style;
"function" == typeof define && define.amd ? define(function () {
return t
}) : "object" == typeof exports ? module.exports = t : e.getStyleProperty = t
}(window);
! function (t) {
"use strict";

function e(t) {
var e = parseFloat(t),
r = -1 === t.indexOf("%") && !isNaN(e);
return r && e
}

function r() {}

function i() {
for (var t = {
width: 0,
height: 0,
innerWidth: 0,
innerHeight: 0,
outerWidth: 0,
outerHeight: 0
}, e = 0, r = d.length; r > e; e++) {
var i = d[e];
t[i] = 0
}
return t
}

function n(r) {
function n() {
if (!p) {
p = !0;
var i = t.getComputedStyle;
if (a = function () {
var t = i ? function (t) {
return i(t, null)
} : function (t) {
return t.currentStyle
};
return function (e) {
var r = t(e);
return r || o("Style returned " + r + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), r
}
}(), u = r("boxSizing")) {
var n = document.createElement("div");
n.style.width = "200px", n.style.padding = "1px 2px 3px 4px", n.style.borderStyle = "solid", n.style.borderWidth = "1px 2px 3px 4px", n.style[u] = "border-box";
var d = document.body || document.documentElement;
d.appendChild(n);
var f = a(n);
g = 200 === e(f.width), d.removeChild(n)
}
}
}

function f(t) {
if (n(), "string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType) {
var r = a(t);
if ("none" === r.display) return i();
var o = {};
o.width = t.offsetWidth, o.height = t.offsetHeight;
for (var f = o.isBorderBox = !(!u || !r[u] || "border-box" !== r[u]), p = 0, l = d.length; l > p; p++) {
var y = d[p],
c = r[y];
c = h(t, c);
var m = parseFloat(c);
o[y] = isNaN(m) ? 0 : m
}
var s = o.paddingLeft + o.paddingRight,
v = o.paddingTop + o.paddingBottom,
b = o.marginLeft + o.marginRight,
x = o.marginTop + o.marginBottom,
W = o.borderLeftWidth + o.borderRightWidth,
S = o.borderTopWidth + o.borderBottomWidth,
w = f && g,
B = e(r.width);
B !== !1 && (o.width = B + (w ? 0 : s + W));
var L = e(r.height);
return L !== !1 && (o.height = L + (w ? 0 : v + S)), o.innerWidth = o.width - (s + W), o.innerHeight = o.height - (v + S), o.outerWidth = o.width + b, o.outerHeight = o.height + x, o
}
}

function h(e, r) {
if (t.getComputedStyle || -1 === r.indexOf("%")) return r;
var i = e.style,
n = i.left,
o = e.runtimeStyle,
d = o && o.left;
return d && (o.left = e.currentStyle.left), i.left = r, r = i.pixelLeft, i.left = n, d && (o.left = d), r
}
var a, u, g, p = !1;
return f
}
var o = "undefined" == typeof console ? r : function (t) {
console.error(t)
},
d = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
"function" == typeof define && define.amd ? define(["get-style-property/get-style-property"], n) : "object" == typeof exports ? module.exports = n(require("desandro-get-style-property")) : t.getSize = n(t.getStyleProperty)
}(window);
! function (t) {
"use strict";

function n() {}

function i(t) {
function i(n) {
n.prototype.option || (n.prototype.option = function (n) {
t.isPlainObject(n) && (this.options = t.extend(!0, this.options, n))
})
}

function e(n, i) {
t.fn[n] = function (e) {
if ("string" == typeof e) {
for (var a = o.call(arguments, 1), f = 0, c = this.length; c > f; f++) {
var s = this[f],
u = t.data(s, n);
if (u)
if (t.isFunction(u[e]) && "_" !== e.charAt(0)) {
var p = u[e].apply(u, a);
if (void 0 !== p) return p
} else r("no such method '" + e + "' for " + n + " instance");
else r("cannot call methods on " + n + " prior to initialization; attempted to call '" + e + "'")
}
return this
}
return this.each(function () {
var o = t.data(this, n);
o ? (o.option(e), o._init()) : (o = new i(this, e), t.data(this, n, o))
})
}
}
if (t) {
var r = "undefined" == typeof console ? n : function (t) {
console.error(t)
};
return t.bridget = function (t, n) {
i(n), e(t, n)
}, t.bridget
}
}
var o = Array.prototype.slice;
"function" == typeof define && define.amd ? define(["jquery"], i) : i(t.jQuery)
}(window);
! function (e) {
"use strict";

function t(e, t) {
return e[i](t)
}

function n(e) {
if (!e.parentNode) {
var t = document.createDocumentFragment();
t.appendChild(e)
}
}

function r(e, t) {
n(e);
for (var r = e.parentNode.querySelectorAll(t), o = 0, c = r.length; c > o; o++)
if (r[o] === e) return !0;
return !1
}

function o(e, r) {
return n(e), t(e, r)
}
var c, i = function () {
if (e.matches) return "matches";
if (e.matchesSelector) return "matchesSelector";
for (var t = ["webkit", "moz", "ms", "o"], n = 0, r = t.length; r > n; n++) {
var o = t[n],
c = o + "MatchesSelector";
if (e[c]) return c
}
}();
if (i) {
var u = document.createElement("div"),
f = t(u, "div");
c = f ? t : o
} else c = r;
"function" == typeof define && define.amd ? define(function () {
return c
}) : "object" == typeof exports ? module.exports = c : window.matchesSelector = c
}(Element.prototype);
! function (e, t) {
"use strict";
"function" == typeof define && define.amd ? define(["doc-ready/doc-ready", "matches-selector/matches-selector"], function (n, r) {
return t(e, n, r)
}) : "object" == typeof exports ? module.exports = t(e, require("doc-ready"), require("desandro-matches-selector")) : e.fizzyUIUtils = t(e, e.docReady, e.matchesSelector)
}(window, function (e, t, n) {
"use strict";
var r = {};
r.extend = function (e, t) {
for (var n in t) e[n] = t[n];
return e
}, r.modulo = function (e, t) {
return (e % t + t) % t
};
var o = Object.prototype.toString;
r.isArray = function (e) {
return "[object Array]" == o.call(e)
}, r.makeArray = function (e) {
var t = [];
if (r.isArray(e)) t = e;
else if (e && "number" == typeof e.length)
for (var n = 0, o = e.length; o > n; n++) t.push(e[n]);
else t.push(e);
return t
}, r.indexOf = Array.prototype.indexOf ? function (e, t) {
return e.indexOf(t)
} : function (e, t) {
for (var n = 0, r = e.length; r > n; n++)
if (e[n] === t) return n;
return -1
}, r.removeFrom = function (e, t) {
var n = r.indexOf(e, t); - 1 != n && e.splice(n, 1)
}, r.isElement = "function" == typeof HTMLElement || "object" == typeof HTMLElement ? function (e) {
return e instanceof HTMLElement
} : function (e) {
return e && "object" == typeof e && 1 == e.nodeType && "string" == typeof e.nodeName
}, r.setText = function () {
function e(e, n) {
t = t || (void 0 !== document.documentElement.textContent ? "textContent" : "innerText"), e[t] = n
}
var t;
return e
}(), r.getParent = function (e, t) {
for (; e != document.body;)
if (e = e.parentNode, n(e, t)) return e
}, r.getQueryElement = function (e) {
return "string" == typeof e ? document.querySelector(e) : e
}, r.handleEvent = function (e) {
var t = "on" + e.type;
this[t] && this[t](e)
}, r.filterFindElements = function (e, t) {
e = r.makeArray(e);
for (var o = [], i = 0, u = e.length; u > i; i++) {
var c = e[i];
if (r.isElement(c))
if (t) {
n(c, t) && o.push(c);
for (var a = c.querySelectorAll(t), f = 0, s = a.length; s > f; f++) o.push(a[f])
} else o.push(c)
}
return o
}, r.debounceMethod = function (e, t, n) {
var r = e.prototype[t],
o = t + "Timeout";
e.prototype[t] = function () {
var e = this[o];
e && clearTimeout(e);
var t = arguments,
i = this;
this[o] = setTimeout(function () {
r.apply(i, t), delete i[o]
}, n || 100)
}
}, r.toDashed = function (e) {
return e.replace(/(.)([A-Z])/g, function (e, t, n) {
return t + "-" + n
}).toLowerCase()
};
var i = e.console;
return r.htmlInit = function (n, o) {
t(function () {
for (var t = r.toDashed(o), u = document.querySelectorAll(".js-" + t), c = "data-" + t + "-options", a = 0, f = u.length; f > a; a++) {
var s, d = u[a],
l = d.getAttribute(c);
try {
s = l && JSON.parse(l)
} catch (p) {
i && i.error("Error parsing " + c + " on " + d.nodeName.toLowerCase() + (d.id ? "#" + d.id : "") + ": " + p);
continue
}
var y = new n(d, s),
m = e.jQuery;
m && m.data(d, o, y)
}
})
}, r
});
! function (t, i) {
"use strict";
"function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property", "fizzy-ui-utils/utils"], function (n, o, e, s) {
return i(t, n, o, e, s)
}) : "object" == typeof exports ? module.exports = i(t, require("wolfy87-eventemitter"), require("get-size"), require("desandro-get-style-property"), require("fizzy-ui-utils")) : (t.Outlayer = {}, t.Outlayer.Item = i(t, t.EventEmitter, t.getSize, t.getStyleProperty, t.fizzyUIUtils))
}(window, function (t, i, n, o, e) {
"use strict";

function s(t) {
for (var i in t) return !1;
return i = null, !0
}

function r(t, i) {
t && (this.element = t, this.layout = i, this.position = {
x: 0,
y: 0
}, this._create())
}

function a(t) {
return t.replace(/([A-Z])/g, function (t) {
return "-" + t.toLowerCase()
})
}
var p = t.getComputedStyle,
h = p ? function (t) {
return p(t, null)
} : function (t) {
return t.currentStyle
},
l = o("transition"),
y = o("transform"),
u = l && y,
d = !!o("perspective"),
f = {
WebkitTransition: "webkitTransitionEnd",
MozTransition: "transitionend",
OTransition: "otransitionend",
transition: "transitionend"
}[l],
c = ["transform", "transition", "transitionDuration", "transitionProperty"],
v = function () {
for (var t = {}, i = 0, n = c.length; n > i; i++) {
var e = c[i],
s = o(e);
s && s !== e && (t[e] = s)
}
return t
}();
e.extend(r.prototype, i.prototype), r.prototype._create = function () {
this._transn = {
ingProperties: {},
clean: {},
onEnd: {}
}, this.css({
position: "absolute"
})
}, r.prototype.handleEvent = function (t) {
var i = "on" + t.type;
this[i] && this[i](t)
}, r.prototype.getSize = function () {
this.size = n(this.element)
}, r.prototype.css = function (t) {
var i = this.element.style;
for (var n in t) {
var o = v[n] || n;
i[o] = t[n]
}
}, r.prototype.getPosition = function () {
var t = h(this.element),
i = this.layout.options,
n = i.isOriginLeft,
o = i.isOriginTop,
e = t[n ? "left" : "right"],
s = t[o ? "top" : "bottom"],
r = this.layout.size,
a = -1 != e.indexOf("%") ? parseFloat(e) / 100 * r.width : parseInt(e, 10),
p = -1 != s.indexOf("%") ? parseFloat(s) / 100 * r.height : parseInt(s, 10);
a = isNaN(a) ? 0 : a, p = isNaN(p) ? 0 : p, a -= n ? r.paddingLeft : r.paddingRight, p -= o ? r.paddingTop : r.paddingBottom, this.position.x = a, this.position.y = p
}, r.prototype.layoutPosition = function () {
var t = this.layout.size,
i = this.layout.options,
n = {},
o = i.isOriginLeft ? "paddingLeft" : "paddingRight",
e = i.isOriginLeft ? "left" : "right",
s = i.isOriginLeft ? "right" : "left",
r = this.position.x + t[o];
n[e] = this.getXValue(r), n[s] = "";
var a = i.isOriginTop ? "paddingTop" : "paddingBottom",
p = i.isOriginTop ? "top" : "bottom",
h = i.isOriginTop ? "bottom" : "top",
l = this.position.y + t[a];
n[p] = this.getYValue(l), n[h] = "", this.css(n), this.emitEvent("layout", [this])
}, r.prototype.getXValue = function (t) {
var i = this.layout.options;
return i.percentPosition && !i.isHorizontal ? t / this.layout.size.width * 100 + "%" : t + "px"
}, r.prototype.getYValue = function (t) {
var i = this.layout.options;
return i.percentPosition && i.isHorizontal ? t / this.layout.size.height * 100 + "%" : t + "px"
}, r.prototype._transitionTo = function (t, i) {
this.getPosition();
var n = this.position.x,
o = this.position.y,
e = parseInt(t, 10),
s = parseInt(i, 10),
r = e === this.position.x && s === this.position.y;
if (this.setPosition(t, i), r && !this.isTransitioning) return void this.layoutPosition();
var a = t - n,
p = i - o,
h = {};
h.transform = this.getTranslate(a, p), this.transition({
to: h,
onTransitionEnd: {
transform: this.layoutPosition
},
isCleaning: !0
})
}, r.prototype.getTranslate = function (t, i) {
var n = this.layout.options;
return t = n.isOriginLeft ? t : -t, i = n.isOriginTop ? i : -i, d ? "translate3d(" + t + "px, " + i + "px, 0)" : "translate(" + t + "px, " + i + "px)"
}, r.prototype.goTo = function (t, i) {
this.setPosition(t, i), this.layoutPosition()
}, r.prototype.moveTo = u ? r.prototype._transitionTo : r.prototype.goTo, r.prototype.setPosition = function (t, i) {
this.position.x = parseInt(t, 10), this.position.y = parseInt(i, 10)
}, r.prototype._nonTransition = function (t) {
this.css(t.to), t.isCleaning && this._removeStyles(t.to);
for (var i in t.onTransitionEnd) t.onTransitionEnd[i].call(this)
}, r.prototype._transition = function (t) {
if (!parseFloat(this.layout.options.transitionDuration)) return void this._nonTransition(t);
var i = this._transn;
for (var n in t.onTransitionEnd) i.onEnd[n] = t.onTransitionEnd[n];
for (n in t.to) i.ingProperties[n] = !0, t.isCleaning && (i.clean[n] = !0);
if (t.from) {
this.css(t.from);
var o = this.element.offsetHeight;
o = null
}
this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
};
var g = "opacity," + a(v.transform || "transform");
r.prototype.enableTransition = function () {
this.isTransitioning || (this.css({
transitionProperty: g,
transitionDuration: this.layout.options.transitionDuration
}), this.element.addEventListener(f, this, !1))
}, r.prototype.transition = r.prototype[l ? "_transition" : "_nonTransition"], r.prototype.onwebkitTransitionEnd = function (t) {
this.ontransitionend(t)
}, r.prototype.onotransitionend = function (t) {
this.ontransitionend(t)
};
var m = {
"-webkit-transform": "transform",
"-moz-transform": "transform",
"-o-transform": "transform"
};
r.prototype.ontransitionend = function (t) {
if (t.target === this.element) {
var i = this._transn,
n = m[t.propertyName] || t.propertyName;
if (delete i.ingProperties[n], s(i.ingProperties) && this.disableTransition(), n in i.clean && (this.element.style[t.propertyName] = "", delete i.clean[n]), n in i.onEnd) {
var o = i.onEnd[n];
o.call(this), delete i.onEnd[n]
}
this.emitEvent("transitionEnd", [this])
}
}, r.prototype.disableTransition = function () {
this.removeTransitionStyles(), this.element.removeEventListener(f, this, !1), this.isTransitioning = !1
}, r.prototype._removeStyles = function (t) {
var i = {};
for (var n in t) i[n] = "";
this.css(i)
};
var T = {
transitionProperty: "",
transitionDuration: ""
};
return r.prototype.removeTransitionStyles = function () {
this.css(T)
}, r.prototype.removeElem = function () {
this.element.parentNode.removeChild(this.element), this.css({
display: ""
}), this.emitEvent("remove", [this])
}, r.prototype.remove = function () {
if (!l || !parseFloat(this.layout.options.transitionDuration)) return void this.removeElem();
var t = this;
this.once("transitionEnd", function () {
t.removeElem()
}), this.hide()
}, r.prototype.reveal = function () {
delete this.isHidden, this.css({
display: ""
});
var t = this.layout.options,
i = {},
n = this.getHideRevealTransitionEndProperty("visibleStyle");
i[n] = this.onRevealTransitionEnd, this.transition({
from: t.hiddenStyle,
to: t.visibleStyle,
isCleaning: !0,
onTransitionEnd: i
})
}, r.prototype.onRevealTransitionEnd = function () {
this.isHidden || this.emitEvent("reveal")
}, r.prototype.getHideRevealTransitionEndProperty = function (t) {
var i = this.layout.options[t];
if (i.opacity) return "opacity";
for (var n in i) return n
}, r.prototype.hide = function () {
this.isHidden = !0, this.css({
display: ""
});
var t = this.layout.options,
i = {},
n = this.getHideRevealTransitionEndProperty("hiddenStyle");
i[n] = this.onHideTransitionEnd, this.transition({
from: t.visibleStyle,
to: t.hiddenStyle,
isCleaning: !0,
onTransitionEnd: i
})
}, r.prototype.onHideTransitionEnd = function () {
this.isHidden && (this.css({
display: "none"
}), this.emitEvent("hide"))
}, r.prototype.destroy = function () {
this.css({
position: "",
left: "",
right: "",
top: "",
bottom: "",
transition: "",
transform: ""
})
}, r
});
! function (t, e) {
"use strict";
"function" == typeof define && define.amd ? define(["eventie/eventie", "eventEmitter/EventEmitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function (i, o, n, s, r) {
return e(t, i, o, n, s, r)
}) : "object" == typeof exports ? module.exports = e(t, require("eventie"), require("wolfy87-eventemitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")) : t.Outlayer = e(t, t.eventie, t.EventEmitter, t.getSize, t.fizzyUIUtils, t.Outlayer.Item)
}(window, function (t, e, i, o, n, s) {
"use strict";

function r(t, e) {
var i = n.getQueryElement(t);
if (!i) return void(a && a.error("Bad element for " + this.constructor.namespace + ": " + (i || t)));
this.element = i, p && (this.$element = p(this.element)), this.options = n.extend({}, this.constructor.defaults), this.option(e);
var o = ++u;
this.element.outlayerGUID = o, m[o] = this, this._create(), this.options.isInitLayout && this.layout()
}
var a = t.console,
p = t.jQuery,
h = function () {},
u = 0,
m = {};
return r.namespace = "outlayer", r.Item = s, r.defaults = {
containerStyle: {
position: "relative"
},
isInitLayout: !0,
isOriginLeft: !0,
isOriginTop: !0,
isResizeBound: !0,
isResizingContainer: !0,
transitionDuration: "0.4s",
hiddenStyle: {
opacity: 0,
transform: "scale(0.001)"
},
visibleStyle: {
opacity: 1,
transform: "scale(1)"
}
}, n.extend(r.prototype, i.prototype), r.prototype.option = function (t) {
n.extend(this.options, t)
}, r.prototype._create = function () {
this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), n.extend(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
}, r.prototype.reloadItems = function () {
this.items = this._itemize(this.element.children)
}, r.prototype._itemize = function (t) {
for (var e = this._filterFindItemElements(t), i = this.constructor.Item, o = [], n = 0, s = e.length; s > n; n++) {
var r = e[n],
a = new i(r, this);
o.push(a)
}
return o
}, r.prototype._filterFindItemElements = function (t) {
return n.filterFindElements(t, this.options.itemSelector)
}, r.prototype.getItemElements = function () {
for (var t = [], e = 0, i = this.items.length; i > e; e++) t.push(this.items[e].element);
return t
}, r.prototype.layout = function () {
this._resetLayout(), this._manageStamps();
var t = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
this.layoutItems(this.items, t), this._isLayoutInited = !0
}, r.prototype._init = r.prototype.layout, r.prototype._resetLayout = function () {
this.getSize()
}, r.prototype.getSize = function () {
this.size = o(this.element)
}, r.prototype._getMeasurement = function (t, e) {
var i, s = this.options[t];
s ? ("string" == typeof s ? i = this.element.querySelector(s) : n.isElement(s) && (i = s), this[t] = i ? o(i)[e] : s) : this[t] = 0
}, r.prototype.layoutItems = function (t, e) {
t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
}, r.prototype._getItemsForLayout = function (t) {
for (var e = [], i = 0, o = t.length; o > i; i++) {
var n = t[i];
n.isIgnored || e.push(n)
}
return e
}, r.prototype._layoutItems = function (t, e) {
if (this._emitCompleteOnItems("layout", t), t && t.length) {
for (var i = [], o = 0, n = t.length; n > o; o++) {
var s = t[o],
r = this._getItemLayoutPosition(s);
r.item = s, r.isInstant = e || s.isLayoutInstant, i.push(r)
}
this._processLayoutQueue(i)
}
}, r.prototype._getItemLayoutPosition = function () {
return {
x: 0,
y: 0
}
}, r.prototype._processLayoutQueue = function (t) {
for (var e = 0, i = t.length; i > e; e++) {
var o = t[e];
this._positionItem(o.item, o.x, o.y, o.isInstant)
}
}, r.prototype._positionItem = function (t, e, i, o) {
o ? t.goTo(e, i) : t.moveTo(e, i)
}, r.prototype._postLayout = function () {
this.resizeContainer()
}, r.prototype.resizeContainer = function () {
if (this.options.isResizingContainer) {
var t = this._getContainerSize();
t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
}
}, r.prototype._getContainerSize = h, r.prototype._setContainerMeasure = function (t, e) {
if (void 0 !== t) {
var i = this.size;
i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
}
}, r.prototype._emitCompleteOnItems = function (t, e) {
function i() {
n.dispatchEvent(t + "Complete", null, [e])
}

function o() {
r++, r === s && i()
}
var n = this,
s = e.length;
if (!e || !s) return void i();
for (var r = 0, a = 0, p = e.length; p > a; a++) {
var h = e[a];
h.once(t, o)
}
}, r.prototype.dispatchEvent = function (t, e, i) {
var o = e ? [e].concat(i) : i;
if (this.emitEvent(t, o), p)
if (this.$element = this.$element || p(this.element), e) {
var n = p.Event(e);
n.type = t, this.$element.trigger(n, i)
} else this.$element.trigger(t, i)
}, r.prototype.ignore = function (t) {
var e = this.getItem(t);
e && (e.isIgnored = !0)
}, r.prototype.unignore = function (t) {
var e = this.getItem(t);
e && delete e.isIgnored
}, r.prototype.stamp = function (t) {
if (t = this._find(t)) {
this.stamps = this.stamps.concat(t);
for (var e = 0, i = t.length; i > e; e++) {
var o = t[e];
this.ignore(o)
}
}
}, r.prototype.unstamp = function (t) {
if (t = this._find(t))
for (var e = 0, i = t.length; i > e; e++) {
var o = t[e];
n.removeFrom(this.stamps, o), this.unignore(o)
}
}, r.prototype._find = function (t) {
return t ? ("string" == typeof t && (t = this.element.querySelectorAll(t)), t = n.makeArray(t)) : void 0
}, r.prototype._manageStamps = function () {
if (this.stamps && this.stamps.length) {
this._getBoundingRect();
for (var t = 0, e = this.stamps.length; e > t; t++) {
var i = this.stamps[t];
this._manageStamp(i)
}
}
}, r.prototype._getBoundingRect = function () {
var t = this.element.getBoundingClientRect(),
e = this.size;
this._boundingRect = {
left: t.left + e.paddingLeft + e.borderLeftWidth,
top: t.top + e.paddingTop + e.borderTopWidth,
right: t.right - (e.paddingRight + e.borderRightWidth),
bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
}
}, r.prototype._manageStamp = h, r.prototype._getElementOffset = function (t) {
var e = t.getBoundingClientRect(),
i = this._boundingRect,
n = o(t),
s = {
left: e.left - i.left - n.marginLeft,
top: e.top - i.top - n.marginTop,
right: i.right - e.right - n.marginRight,
bottom: i.bottom - e.bottom - n.marginBottom
};
return s
}, r.prototype.handleEvent = function (t) {
var e = "on" + t.type;
this[e] && this[e](t)
}, r.prototype.bindResize = function () {
this.isResizeBound || (e.bind(t, "resize", this), this.isResizeBound = !0)
}, r.prototype.unbindResize = function () {
this.isResizeBound && e.unbind(t, "resize", this), this.isResizeBound = !1
}, r.prototype.onresize = function () {
function t() {
e.resize(), delete e.resizeTimeout
}
this.resizeTimeout && clearTimeout(this.resizeTimeout);
var e = this;
this.resizeTimeout = setTimeout(t, 100)
}, r.prototype.resize = function () {
this.isResizeBound && this.needsResizeLayout() && this.layout()
}, r.prototype.needsResizeLayout = function () {
var t = o(this.element),
e = this.size && t;
return e && t.innerWidth !== this.size.innerWidth
}, r.prototype.addItems = function (t) {
var e = this._itemize(t);
return e.length && (this.items = this.items.concat(e)), e
}, r.prototype.appended = function (t) {
var e = this.addItems(t);
e.length && (this.layoutItems(e, !0), this.reveal(e))
}, r.prototype.prepended = function (t) {
var e = this._itemize(t);
if (e.length) {
var i = this.items.slice(0);
this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
}
}, r.prototype.reveal = function (t) {
this._emitCompleteOnItems("reveal", t);
for (var e = t && t.length, i = 0; e && e > i; i++) {
var o = t[i];
o.reveal()
}
}, r.prototype.hide = function (t) {
this._emitCompleteOnItems("hide", t);
for (var e = t && t.length, i = 0; e && e > i; i++) {
var o = t[i];
o.hide()
}
}, r.prototype.revealItemElements = function (t) {
var e = this.getItems(t);
this.reveal(e)
}, r.prototype.hideItemElements = function (t) {
var e = this.getItems(t);
this.hide(e)
}, r.prototype.getItem = function (t) {
for (var e = 0, i = this.items.length; i > e; e++) {
var o = this.items[e];
if (o.element === t) return o
}
}, r.prototype.getItems = function (t) {
t = n.makeArray(t);
for (var e = [], i = 0, o = t.length; o > i; i++) {
var s = t[i],
r = this.getItem(s);
r && e.push(r)
}
return e
}, r.prototype.remove = function (t) {
var e = this.getItems(t);
if (this._emitCompleteOnItems("remove", e), e && e.length)
for (var i = 0, o = e.length; o > i; i++) {
var s = e[i];
s.remove(), n.removeFrom(this.items, s)
}
}, r.prototype.destroy = function () {
var t = this.element.style;
t.height = "", t.position = "", t.width = "";
for (var e = 0, i = this.items.length; i > e; e++) {
var o = this.items[e];
o.destroy()
}
this.unbindResize();
var n = this.element.outlayerGUID;
delete m[n], delete this.element.outlayerGUID, p && p.removeData(this.element, this.constructor.namespace)
}, r.data = function (t) {
t = n.getQueryElement(t);
var e = t && t.outlayerGUID;
return e && m[e]
}, r.create = function (t, e) {
function i() {
r.apply(this, arguments)
}
return Object.create ? i.prototype = Object.create(r.prototype) : n.extend(i.prototype, r.prototype), i.prototype.constructor = i, i.defaults = n.extend({}, r.defaults), n.extend(i.defaults, e), i.prototype.settings = {}, i.namespace = t, i.data = r.data, i.Item = function () {
s.apply(this, arguments)
}, i.Item.prototype = new s, n.htmlInit(i, t), p && p.bridget && p.bridget(t, i), i
}, r.Item = s, r
});
! function (t, i) {
"use strict";
"function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size", "fizzy-ui-utils/utils"], i) : "object" == typeof exports ? module.exports = i(require("outlayer"), require("get-size"), require("fizzy-ui-utils")) : t.Masonry = i(t.Outlayer, t.getSize, t.fizzyUIUtils)
}(window, function (t, i, e) {
"use strict";
var o = t.create("masonry");
return o.prototype._resetLayout = function () {
this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
var t = this.cols;
for (this.colYs = []; t--;) this.colYs.push(0);
this.maxY = 0
}, o.prototype.measureColumns = function () {
if (this.getContainerWidth(), !this.columnWidth) {
var t = this.items[0],
e = t && t.element;
this.columnWidth = e && i(e).outerWidth || this.containerWidth
}
var o = this.columnWidth += this.gutter,
s = this.containerWidth + this.gutter,
h = s / o,
r = o - s % o,
n = r && 1 > r ? "round" : "floor";
h = Math[n](h), this.cols = Math.max(h, 1)
}, o.prototype.getContainerWidth = function () {
var t = this.options.isFitWidth ? this.element.parentNode : this.element,
e = i(t);
this.containerWidth = e && e.innerWidth
}, o.prototype._getItemLayoutPosition = function (t) {
t.getSize();
var i = t.size.outerWidth % this.columnWidth,
o = i && 1 > i ? "round" : "ceil",
s = Math[o](t.size.outerWidth / this.columnWidth);
s = Math.min(s, this.cols);
for (var h = this._getColGroup(s), r = Math.min.apply(Math, h), n = e.indexOf(h, r), a = {
x: this.columnWidth * n,
y: r
}, u = r + t.size.outerHeight, l = this.cols + 1 - h.length, c = 0; l > c; c++) this.colYs[n + c] = u;
return a
}, o.prototype._getColGroup = function (t) {
if (2 > t) return this.colYs;
for (var i = [], e = this.cols + 1 - t, o = 0; e > o; o++) {
var s = this.colYs.slice(o, o + t);
i[o] = Math.max.apply(Math, s)
}
return i
}, o.prototype._manageStamp = function (t) {
var e = i(t),
o = this._getElementOffset(t),
s = this.options.isOriginLeft ? o.left : o.right,
h = s + e.outerWidth,
r = Math.floor(s / this.columnWidth);
r = Math.max(0, r);
var n = Math.floor(h / this.columnWidth);
n -= h % this.columnWidth ? 0 : 1, n = Math.min(this.cols - 1, n);
for (var a = (this.options.isOriginTop ? o.top : o.bottom) + e.outerHeight, u = r; n >= u; u++) this.colYs[u] = Math.max(a, this.colYs[u])
}, o.prototype._getContainerSize = function () {
this.maxY = Math.max.apply(Math, this.colYs);
var t = {
height: this.maxY
};
return this.options.isFitWidth && (t.width = this._getContainerFitWidth()), t
}, o.prototype._getContainerFitWidth = function () {
for (var t = 0, i = this.cols; --i && 0 === this.colYs[i];) t++;
return (this.cols - t) * this.columnWidth - this.gutter
}, o.prototype.needsResizeLayout = function () {
var t = this.containerWidth;
return this.getContainerWidth(), t !== this.containerWidth
}, o
});
! function (e, t) {
"use strict";
"function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function (i, n) {
return t(e, i, n)
}) : "object" == typeof exports ? module.exports = t(e, require("wolfy87-eventemitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
}(window, function (e, t, i) {
"use strict";

function n(e, t) {
for (var i in t) e[i] = t[i];
return e
}

function o(e) {
return "[object Array]" === d.call(e)
}

function r(e) {
var t = [];
if (o(e)) t = e;
else if ("number" == typeof e.length)
for (var i = 0, n = e.length; n > i; i++) t.push(e[i]);
else t.push(e);
return t
}

function s(e, t, i) {
if (!(this instanceof s)) return new s(e, t);
"string" == typeof e && (e = document.querySelectorAll(e)), this.elements = r(e), this.options = n({}, this.options), "function" == typeof t ? i = t : n(this.options, t), i && this.on("always", i), this.getImages(), c && (this.jqDeferred = new c.Deferred);
var o = this;
setTimeout(function () {
o.check()
})
}

function h(e) {
this.img = e
}

function f(e) {
this.src = e, p[e] = this
}
var c = e.jQuery,
a = e.console,
u = "undefined" != typeof a,
d = Object.prototype.toString;
s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function () {
this.images = [];
for (var e = 0, t = this.elements.length; t > e; e++) {
var i = this.elements[e];
"IMG" === i.nodeName && this.addImage(i);
var n = i.nodeType;
if (n && (1 === n || 9 === n || 11 === n))
for (var o = i.querySelectorAll("img"), r = 0, s = o.length; s > r; r++) {
var h = o[r];
this.addImage(h)
}
}
}, s.prototype.addImage = function (e) {
var t = new h(e);
this.images.push(t)
}, s.prototype.check = function () {
function e(e, o) {
return t.options.debug && u && a.log("confirm", e, o), t.progress(e), i++, i === n && t.complete(), !0
}
var t = this,
i = 0,
n = this.images.length;
if (this.hasAnyBroken = !1, !n) return void this.complete();
for (var o = 0; n > o; o++) {
var r = this.images[o];
r.on("confirm", e), r.check()
}
}, s.prototype.progress = function (e) {
this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
var t = this;
setTimeout(function () {
t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
})
}, s.prototype.complete = function () {
var e = this.hasAnyBroken ? "fail" : "done";
this.isComplete = !0;
var t = this;
setTimeout(function () {
if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
var i = t.hasAnyBroken ? "reject" : "resolve";
t.jqDeferred[i](t)
}
})
}, c && (c.fn.imagesLoaded = function (e, t) {
var i = new s(this, e, t);
return i.jqDeferred.promise(c(this))
}), h.prototype = new t, h.prototype.check = function () {
var e = p[this.img.src] || new f(this.img.src);
if (e.isConfirmed) return void this.confirm(e.isLoaded, "cached was confirmed");
if (this.img.complete && void 0 !== this.img.naturalWidth) return void this.confirm(0 !== this.img.naturalWidth, "naturalWidth");
var t = this;
e.on("confirm", function (e, i) {
return t.confirm(e.isLoaded, i), !0
}), e.check()
}, h.prototype.confirm = function (e, t) {
this.isLoaded = e, this.emit("confirm", this, t)
};
var p = {};
return f.prototype = new t, f.prototype.check = function () {
if (!this.isChecked) {
var e = new Image;
i.bind(e, "load", this), i.bind(e, "error", this), e.src = this.src, this.isChecked = !0
}
}, f.prototype.handleEvent = function (e) {
var t = "on" + e.type;
this[t] && this[t](e)
}, f.prototype.onload = function (e) {
this.confirm(!0, "onload"), this.unbindProxyEvents(e)
}, f.prototype.onerror = function (e) {
this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
}, f.prototype.confirm = function (e, t) {
this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
}, f.prototype.unbindProxyEvents = function (e) {
i.unbind(e.target, "load", this), i.unbind(e.target, "error", this)
}, s
});
! function (s) {
"use strict";

function e(s) {
return new RegExp("(^|\\s+)" + s + "(\\s+|$)")
}

function n(s, e) {
var n = t(s, e) ? c : a;
n(s, e)
}
var t, a, c;
"classList" in document.documentElement ? (t = function (s, e) {
return s.classList.contains(e)
}, a = function (s, e) {
s.classList.add(e)
}, c = function (s, e) {
s.classList.remove(e)
}) : (t = function (s, n) {
return e(n).test(s.className)
}, a = function (s, e) {
t(s, e) || (s.className = s.className + " " + e)
}, c = function (s, n) {
s.className = s.className.replace(e(n), " ")
});
var o = {
hasClass: t,
addClass: a,
removeClass: c,
toggleClass: n,
has: t,
add: a,
remove: c,
toggle: n
};
"function" == typeof define && define.amd ? define(o) : "object" == typeof exports ? module.exports = o : s.classie = o
}(window);
! function (t) {
"use strict";

function e() {
for (var t = document.querySelectorAll("[data-js-module]"), e = 0, n = t.length; n > e; e++) {
var i = t[e],
a = i.getAttribute("data-js-module"),
r = o.modules[a];
r && r(i)
}
}

function n(t, e) {
t[c] = e
}

function i() {
var t = new Date,
e = t.getMinutes();
e = 10 > e ? "0" + e : e;
var n = t.getSeconds();
return n = 10 > n ? "0" + n : n, [t.getHours(), e, n].join(":")
}
var o = t.MD = {};
o.pages = {}, o.modules = {};
var a;
eventie.filterBind = function (t, e, n, i) {
return eventie.bind(t, e, function (t) {
matchesSelector(t.target, n) && i.call(t.target, t)
})
}, docReady(function () {
a = document.querySelector("#notification");
var t = document.body.getAttribute("data-page");
t && "function" == typeof o[t] && o[t](), e()
}), o.getItemElement = function () {
var t = document.createElement("div"),
e = Math.random(),
n = Math.random(),
i = e > .8 ? "grid-item--width3" : e > .6 ? "grid-item--width2" : "",
o = n > .8 ? "grid-item--height3" : n > .5 ? "grid-item--height2" : "";
return t.className = "grid-item " + i + " " + o, t
}, o.getSomeItemElements = function () {
for (var t = document.createDocumentFragment(), e = [], n = 0; 3 > n; n++) {
var i = document.createElement("div"),
o = Math.random(),
a = o > .85 ? "w4" : o > .7 ? "w2" : "",
r = Math.random(),
d = r > .85 ? "h4" : r > .7 ? "h2" : "";
i.className = "item " + a + " " + d, t.appendChild(i), e.push(i)
}
};
var r, d = document.documentElement,
c = void 0 !== d.textContent ? "textContent" : "innerText",
u = getStyleProperty("transition"),
m = u ? 1e3 : 1500;
o.notify = function (t) {
n(a, t + " at " + i()), u && (a.style[u] = "none"), a.style.display = "block", a.style.opacity = "1", r && clearTimeout(r), r = setTimeout(o.hideNotify, m)
}, o.hideNotify = function () {
u ? (a.style[u] = "opacity 1.0s", a.style.opacity = "0") : a.style.display = "none"
}
}(window);
MD.modules["animate-item-size"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
i = new Masonry(t, {
columnWidth: 60
});
eventie.filterBind(t, "click", ".animate-item-size-item__content", function (e) {
classie.toggleClass(e.target.parentNode, "is-expanded"), i.layout()
})
};
MD.modules["animate-item-size-responsive"] = function (t) {
"use strict";

function e(t) {
var e = getSize(t);
t.style[s] = "none", t.style.width = e.width + "px", t.style.height = e.height + "px"
}

function i(t) {
if (s) {
var e = function () {
t.style.width = "", t.style.height = "", t.removeEventListener(o, e, !1)
};
t.addEventListener(o, e, !1)
}
}

function n(t, e) {
var i = getSize(e);
t.style.width = i.width + "px", t.style.height = i.height + "px"
}
var s = getStyleProperty("transition"),
o = {
WebkitTransition: "webkitTransitionEnd",
MozTransition: "transitionend",
OTransition: "otransitionend",
transition: "transitionend"
}[s],
r = t.querySelector(".grid"),
a = new Masonry(r, {
itemSelector: ".animate-item-size-item",
columnWidth: ".grid-sizer",
percentPosition: !0
});
eventie.filterBind(r, "click", ".animate-item-size-item__content", function () {
var t = this;
e(t);
var o = t.parentNode;
classie.toggleClass(o, "is-expanded");
t.offsetWidth;
t.style[s] = "", i(t), n(t, o), a.layout()
})
};
MD.modules["appended-demo"] = function (e) {
"use strict";
var n = e.querySelector(".grid"),
t = new Masonry(n, {
columnWidth: 80
}),
d = e.querySelector(".append-button");
eventie.bind(d, "click", function () {
var e = [MD.getItemElement(), MD.getItemElement(), MD.getItemElement()],
d = document.createDocumentFragment();
d.appendChild(e[0]), d.appendChild(e[1]), d.appendChild(e[2]), n.appendChild(d), t.appended(e)
})
};
MD.modules["destroy-demo"] = function (e) {
"use strict";
var o = e.querySelector(".grid"),
t = {
columnWidth: 80
},
n = new Masonry(o, t),
r = !0,
c = e.querySelector(".toggle-button");
eventie.bind(c, "click", function () {
r ? n.destroy() : n = new Masonry(o, t), r = !r
})
};
MD.modules.hero = function (e) {
"use strict";

function t(e) {
var t = document.createElement("div");
t.className = "hero-grid__item";
var i = document.createElement("a");
i.className = "hero__example-link", i.href = e.url;
var r = document.createElement("img");
r.className = "hero__example-link__img", r.src = e.image;
var m = document.createElement("p");
return m.className = "hero__example-link__title", m.textContent = e.title, i.appendChild(r), i.appendChild(m), t.appendChild(i), t
}
for (var i = e.querySelector(".hero-grid"), r = new Masonry(i, {
itemSelector: ".hero-grid__item",
columnWidth: ".hero-grid__grid-sizer",
percentPosition: !0
}), m = [{
title: "Erik Johansson",
url: "http://erikjohanssonphoto.com/work/imagecats/personal/",
image: "http://i.imgur.com/6Lo8oun.jpg"
}, {
title: "BeyoncÃ© | I Am",
url: "http://iam.beyonce.com/",
image: "http://i.imgur.com/HDSAMFl.jpg"
}, {
title: "Webster Hall Timeline",
url: "http://www.websterhall.com/timeline/",
image: "http://i.imgur.com/VWfCPYx.jpg"
}, {
title: "Halcyon theme",
url: "http://halcyon-theme.tumblr.com/",
image: "http://i.imgur.com/A1RSOhg.jpg"
}, {
title: "RESIZE.THATSH.IT",
url: "http://resize.thatsh.it/",
image: "http://i.imgur.com/00xWxLG.png"
}, {
title: "Tumblr Staff: Archive",
url: "http://staff.tumblr.com/archive",
image: "http://i.imgur.com/igjvRa3.jpg"
}, {
title: "Kristian Hammerstad",
url: "http://www.kristianhammerstad.com/",
image: "http://i.imgur.com/Zwd7Sch.jpg"
}, {
title: "Loading Effects for Grid Items | Demo 2",
url: "http://tympanus.net/Development/GridLoadingEffects/index2.html",
image: "http://i.imgur.com/iFBSB1t.jpg"
}], a = [], o = document.createDocumentFragment(), n = 0, l = m.length; l > n; n++) {
var p = t(m[n]);
a.push(p), o.appendChild(p)
}
imagesLoaded(o).on("progress", function (e, t) {
var m = t.img.parentNode.parentNode;
i.appendChild(m), r.appended(m)
})
};
MD.modules["imagesloaded-callback"] = function (e) {
"use strict";
imagesLoaded(e, function () {
new Masonry(e, {
itemSelector: ".grid-image-item",
columnWidth: ".grid-sizer",
percentPosition: !0
})
})
};
MD.modules["imagesloaded-progress"] = function (e) {
"use strict";
var i = new Masonry(e, {
itemSelector: ".grid-image-item",
columnWidth: ".grid-sizer",
percentPosition: !0
}),
o = imagesLoaded(e);
o.on("progress", function () {
i.layout()
})
};
MD.modules["layout-complete-demo"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
o = new Masonry(t, {
columnWidth: 80
});
o.on("layoutComplete", function (e) {
MD.notify("Masonry layout completed on " + e.length + " items")
}), eventie.filterBind(t, "click", ".grid-item", function (e) {
classie.toggle(e.target, "grid-item--gigante"), o.layout()
})
};
MD.modules["layout-demo"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
i = new Masonry(t, {
columnWidth: 80
});
eventie.filterBind(t, "click", ".grid-item", function (e) {
classie.toggle(e.target, "grid-item--gigante"), i.layout()
})
};
MD.modules["prepended-demo"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
n = new Masonry(t, {
columnWidth: 80
}),
d = e.querySelector(".prepend-button");
eventie.bind(d, "click", function () {
var e = [MD.getItemElement(), MD.getItemElement(), MD.getItemElement()],
d = document.createDocumentFragment();
d.appendChild(e[0]), d.appendChild(e[1]), d.appendChild(e[2]), t.insertBefore(d, t.firstChild), n.prepended(e)
})
};
MD.modules["remove-complete-demo"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
o = new Masonry(t, {
columnWidth: 80
});
o.on("removeComplete", function (e) {
MD.notify("Removed " + e.length + " items")
}), eventie.filterBind(t, "click", ".grid-item", function (e) {
o.remove(e.target), o.layout()
})
};
MD.modules["remove-demo"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
i = new Masonry(t, {
columnWidth: 80
});
eventie.filterBind(t, "click", ".grid-item", function (e) {
i.remove(e.target), i.layout()
})
};
MD.modules["stamp-methods-demo"] = function (e) {
"use strict";
var t = e.querySelector(".grid"),
o = new Masonry(t, {
itemSelector: ".grid-item",
columnWidth: 80
}),
r = t.querySelector(".stamp"),
i = !1,
m = e.querySelector(".stamp-button");
eventie.bind(m, "click", function () {
i ? o.unstamp(r) : o.stamp(r), o.layout(), i = !i
})
};