/*! For license information please see vendor.scripts.js.LICENSE.txt */


!function () {
    var e = {
        3670: function (e, t, n) {
            function r(e) {
                return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                })(e)
            }

            e = n.nmd(e), function (t, n) {
                "use strict";
                "object" === r(e) && "object" === r(e.exports) ? e.exports = t.document ? n(t, !0) : function (e) {
                    if (!e.document) throw new Error("jQuery requires a window with a document");
                    return n(e)
                } : n(t)
            }("undefined" != typeof window ? window : this, (function (e, t) {
                "use strict";
                var n = [], i = Object.getPrototypeOf, o = n.slice, a = n.flat ? function (e) {
                        return n.flat.call(e)
                    } : function (e) {
                        return n.concat.apply([], e)
                    }, s = n.push, l = n.indexOf, u = {}, c = u.toString, d = u.hasOwnProperty, T = d.toString,
                    f = T.call(Object), p = {}, S = function (e) {
                        return "function" == typeof e && "number" != typeof e.nodeType && "function" != typeof e.item
                    }, b = function (e) {
                        return null != e && e === e.window
                    }, h = e.document, A = {type: !0, src: !0, nonce: !0, noModule: !0};

                function P(e, t, n) {
                    var r, i, o = (n = n || h).createElement("script");
                    if (o.text = e, t) for (r in A) (i = t[r] || t.getAttribute && t.getAttribute(r)) && o.setAttribute(r, i);
                    n.head.appendChild(o).parentNode.removeChild(o)
                }

                function M(e) {
                    return null == e ? e + "" : "object" === r(e) || "function" == typeof e ? u[c.call(e)] || "object" : r(e)
                }

                var m = "3.6.0 -ajax,-ajax/jsonp,-ajax/load,-ajax/script,-ajax/var/location,-ajax/var/nonce,-ajax/var/rquery,-ajax/xhr,-manipulation/_evalUrl,-deprecated/ajax-event-alias,-effects,-effects/Tween,-effects/animatedSelector",
                    g = function e(t, n) {
                        return new e.fn.init(t, n)
                    };

                function v(e) {
                    var t = !!e && "length" in e && e.length, n = M(e);
                    return !S(e) && !b(e) && ("array" === n || 0 === t || "number" == typeof t && t > 0 && t - 1 in e)
                }

                g.fn = g.prototype = {
                    jquery: m, constructor: g, length: 0, toArray: function () {
                        return o.call(this)
                    }, get: function (e) {
                        return null == e ? o.call(this) : e < 0 ? this[e + this.length] : this[e]
                    }, pushStack: function (e) {
                        var t = g.merge(this.constructor(), e);
                        return t.prevObject = this, t
                    }, each: function (e) {
                        return g.each(this, e)
                    }, map: function (e) {
                        return this.pushStack(g.map(this, (function (t, n) {
                            return e.call(t, n, t)
                        })))
                    }, slice: function () {
                        return this.pushStack(o.apply(this, arguments))
                    }, first: function () {
                        return this.eq(0)
                    }, last: function () {
                        return this.eq(-1)
                    }, even: function () {
                        return this.pushStack(g.grep(this, (function (e, t) {
                            return (t + 1) % 2
                        })))
                    }, odd: function () {
                        return this.pushStack(g.grep(this, (function (e, t) {
                            return t % 2
                        })))
                    }, eq: function (e) {
                        var t = this.length, n = +e + (e < 0 ? t : 0);
                        return this.pushStack(n >= 0 && n < t ? [this[n]] : [])
                    }, end: function () {
                        return this.prevObject || this.constructor()
                    }, push: s, sort: n.sort, splice: n.splice
                }, g.extend = g.fn.extend = function () {
                    var e, t, n, i, o, a, s = arguments[0] || {}, l = 1, u = arguments.length, c = !1;
                    for ("boolean" == typeof s && (c = s, s = arguments[l] || {}, l++), "object" === r(s) || S(s) || (s = {}), l === u && (s = this, l--); l < u; l++) if (null != (e = arguments[l])) for (t in e) i = e[t], "__proto__" !== t && s !== i && (c && i && (g.isPlainObject(i) || (o = Array.isArray(i))) ? (n = s[t], a = o && !Array.isArray(n) ? [] : o || g.isPlainObject(n) ? n : {}, o = !1, s[t] = g.extend(c, a, i)) : void 0 !== i && (s[t] = i));
                    return s
                }, g.extend({
                    expando: "jQuery" + (m + Math.random()).replace(/\D/g, ""), isReady: !0, error: function (e) {
                        throw new Error(e)
                    }, noop: function () {
                    }, isPlainObject: function (e) {
                        var t, n;
                        return !(!e || "[object Object]" !== c.call(e)) && (!(t = i(e)) || "function" == typeof (n = d.call(t, "constructor") && t.constructor) && T.call(n) === f)
                    }, isEmptyObject: function (e) {
                        var t;
                        for (t in e) return !1;
                        return !0
                    }, globalEval: function (e, t, n) {
                        P(e, {nonce: t && t.nonce}, n)
                    }, each: function (e, t) {
                        var n, r = 0;
                        if (v(e)) for (n = e.length; r < n && !1 !== t.call(e[r], r, e[r]); r++) ; else for (r in e) if (!1 === t.call(e[r], r, e[r])) break;
                        return e
                    }, makeArray: function (e, t) {
                        var n = t || [];
                        return null != e && (v(Object(e)) ? g.merge(n, "string" == typeof e ? [e] : e) : s.call(n, e)), n
                    }, inArray: function (e, t, n) {
                        return null == t ? -1 : l.call(t, e, n)
                    }, merge: function (e, t) {
                        for (var n = +t.length, r = 0, i = e.length; r < n; r++) e[i++] = t[r];
                        return e.length = i, e
                    }, grep: function (e, t, n) {
                        for (var r = [], i = 0, o = e.length, a = !n; i < o; i++) !t(e[i], i) !== a && r.push(e[i]);
                        return r
                    }, map: function (e, t, n) {
                        var r, i, o = 0, s = [];
                        if (v(e)) for (r = e.length; o < r; o++) null != (i = t(e[o], o, n)) && s.push(i); else for (o in e) null != (i = t(e[o], o, n)) && s.push(i);
                        return a(s)
                    }, guid: 1, support: p
                }), "function" == typeof Symbol && (g.fn[Symbol.iterator] = n[Symbol.iterator]), g.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), (function (e, t) {
                    u["[object " + t + "]"] = t.toLowerCase()
                }));
                var G = function (e) {
                    var t, n, r, i, o, a, s, l, u, c, d, T, f, p, S, b, h, A, P, M = "sizzle" + 1 * new Date,
                        m = e.document, g = 0, v = 0, G = le(), y = le(), C = le(), B = le(), E = function (e, t) {
                            return e === t && (d = !0), 0
                        }, H = {}.hasOwnProperty, x = [], I = x.pop, D = x.push, w = x.push, N = x.slice,
                        O = function (e, t) {
                            for (var n = 0, r = e.length; n < r; n++) if (e[n] === t) return n;
                            return -1
                        },
                        L = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                        R = "[\\x20\\t\\r\\n\\f]",
                        V = "(?:\\\\[\\da-fA-F]{1,6}[\\x20\\t\\r\\n\\f]?|\\\\[^\\r\\n\\f]|[\\w-]|[^\0-\\x7f])+",
                        k = "\\[[\\x20\\t\\r\\n\\f]*(" + V + ")(?:" + R + "*([*^$|!~]?=)" + R + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + V + "))|)" + R + "*\\]",
                        F = ":(" + V + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + k + ")*)|.*)\\)|)",
                        X = new RegExp(R + "+", "g"),
                        W = new RegExp("^[\\x20\\t\\r\\n\\f]+|((?:^|[^\\\\])(?:\\\\.)*)[\\x20\\t\\r\\n\\f]+$", "g"),
                        K = new RegExp("^[\\x20\\t\\r\\n\\f]*,[\\x20\\t\\r\\n\\f]*"),
                        U = new RegExp("^[\\x20\\t\\r\\n\\f]*([>+~]|[\\x20\\t\\r\\n\\f])[\\x20\\t\\r\\n\\f]*"),
                        j = new RegExp(R + "|>"), _ = new RegExp(F), Q = new RegExp("^" + V + "$"), q = {
                            ID: new RegExp("^#(" + V + ")"),
                            CLASS: new RegExp("^\\.(" + V + ")"),
                            TAG: new RegExp("^(" + V + "|[*])"),
                            ATTR: new RegExp("^" + k),
                            PSEUDO: new RegExp("^" + F),
                            CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\([\\x20\\t\\r\\n\\f]*(even|odd|(([+-]|)(\\d*)n|)[\\x20\\t\\r\\n\\f]*(?:([+-]|)[\\x20\\t\\r\\n\\f]*(\\d+)|))[\\x20\\t\\r\\n\\f]*\\)|)", "i"),
                            bool: new RegExp("^(?:" + L + ")$", "i"),
                            needsContext: new RegExp("^[\\x20\\t\\r\\n\\f]*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\([\\x20\\t\\r\\n\\f]*((?:-\\d)?\\d*)[\\x20\\t\\r\\n\\f]*\\)|)(?=[^-]|$)", "i")
                        }, z = /HTML$/i, $ = /^(?:input|select|textarea|button)$/i, Y = /^h\d$/i,
                        J = /^[^{]+\{\s*\[native \w/, Z = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/, ee = /[+~]/,
                        te = new RegExp("\\\\[\\da-fA-F]{1,6}[\\x20\\t\\r\\n\\f]?|\\\\([^\\r\\n\\f])", "g"),
                        ne = function (e, t) {
                            var n = "0x" + e.slice(1) - 65536;
                            return t || (n < 0 ? String.fromCharCode(n + 65536) : String.fromCharCode(n >> 10 | 55296, 1023 & n | 56320))
                        }, re = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g, ie = function (e, t) {
                            return t ? "\0" === e ? "�" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " " : "\\" + e
                        }, oe = function () {
                            T()
                        }, ae = Me((function (e) {
                            return !0 === e.disabled && "fieldset" === e.nodeName.toLowerCase()
                        }), {dir: "parentNode", next: "legend"});
                    try {
                        w.apply(x = N.call(m.childNodes), m.childNodes), x[m.childNodes.length].nodeType
                    } catch (e) {
                        w = {
                            apply: x.length ? function (e, t) {
                                D.apply(e, N.call(t))
                            } : function (e, t) {
                                for (var n = e.length, r = 0; e[n++] = t[r++];) ;
                                e.length = n - 1
                            }
                        }
                    }

                    function se(e, t, r, i) {
                        var o, s, u, c, d, p, h, A = t && t.ownerDocument, m = t ? t.nodeType : 9;
                        if (r = r || [], "string" != typeof e || !e || 1 !== m && 9 !== m && 11 !== m) return r;
                        if (!i && (T(t), t = t || f, S)) {
                            if (11 !== m && (d = Z.exec(e))) if (o = d[1]) {
                                if (9 === m) {
                                    if (!(u = t.getElementById(o))) return r;
                                    if (u.id === o) return r.push(u), r
                                } else if (A && (u = A.getElementById(o)) && P(t, u) && u.id === o) return r.push(u), r
                            } else {
                                if (d[2]) return w.apply(r, t.getElementsByTagName(e)), r;
                                if ((o = d[3]) && n.getElementsByClassName && t.getElementsByClassName) return w.apply(r, t.getElementsByClassName(o)), r
                            }
                            if (n.qsa && !B[e + " "] && (!b || !b.test(e)) && (1 !== m || "object" !== t.nodeName.toLowerCase())) {
                                if (h = e, A = t, 1 === m && (j.test(e) || U.test(e))) {
                                    for ((A = ee.test(e) && he(t.parentNode) || t) === t && n.scope || ((c = t.getAttribute("id")) ? c = c.replace(re, ie) : t.setAttribute("id", c = M)), s = (p = a(e)).length; s--;) p[s] = (c ? "#" + c : ":scope") + " " + Pe(p[s]);
                                    h = p.join(",")
                                }
                                try {
                                    return w.apply(r, A.querySelectorAll(h)), r
                                } catch (t) {
                                    B(e, !0)
                                } finally {
                                    c === M && t.removeAttribute("id")
                                }
                            }
                        }
                        return l(e.replace(W, "$1"), t, r, i)
                    }

                    function le() {
                        var e = [];
                        return function t(n, i) {
                            return e.push(n + " ") > r.cacheLength && delete t[e.shift()], t[n + " "] = i
                        }
                    }

                    function ue(e) {
                        return e[M] = !0, e
                    }

                    function ce(e) {
                        var t = f.createElement("fieldset");
                        try {
                            return !!e(t)
                        } catch (e) {
                            return !1
                        } finally {
                            t.parentNode && t.parentNode.removeChild(t), t = null
                        }
                    }

                    function de(e, t) {
                        for (var n = e.split("|"), i = n.length; i--;) r.attrHandle[n[i]] = t
                    }

                    function Te(e, t) {
                        var n = t && e, r = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
                        if (r) return r;
                        if (n) for (; n = n.nextSibling;) if (n === t) return -1;
                        return e ? 1 : -1
                    }

                    function fe(e) {
                        return function (t) {
                            return "input" === t.nodeName.toLowerCase() && t.type === e
                        }
                    }

                    function pe(e) {
                        return function (t) {
                            var n = t.nodeName.toLowerCase();
                            return ("input" === n || "button" === n) && t.type === e
                        }
                    }

                    function Se(e) {
                        return function (t) {
                            return "form" in t ? t.parentNode && !1 === t.disabled ? "label" in t ? "label" in t.parentNode ? t.parentNode.disabled === e : t.disabled === e : t.isDisabled === e || t.isDisabled !== !e && ae(t) === e : t.disabled === e : "label" in t && t.disabled === e
                        }
                    }

                    function be(e) {
                        return ue((function (t) {
                            return t = +t, ue((function (n, r) {
                                for (var i, o = e([], n.length, t), a = o.length; a--;) n[i = o[a]] && (n[i] = !(r[i] = n[i]))
                            }))
                        }))
                    }

                    function he(e) {
                        return e && void 0 !== e.getElementsByTagName && e
                    }

                    for (t in n = se.support = {}, o = se.isXML = function (e) {
                        var t = e && e.namespaceURI, n = e && (e.ownerDocument || e).documentElement;
                        return !z.test(t || n && n.nodeName || "HTML")
                    }, T = se.setDocument = function (e) {
                        var t, i, a = e ? e.ownerDocument || e : m;
                        return a != f && 9 === a.nodeType && a.documentElement ? (p = (f = a).documentElement, S = !o(f), m != f && (i = f.defaultView) && i.top !== i && (i.addEventListener ? i.addEventListener("unload", oe, !1) : i.attachEvent && i.attachEvent("onunload", oe)), n.scope = ce((function (e) {
                            return p.appendChild(e).appendChild(f.createElement("div")), void 0 !== e.querySelectorAll && !e.querySelectorAll(":scope fieldset div").length
                        })), n.attributes = ce((function (e) {
                            return e.className = "i", !e.getAttribute("className")
                        })), n.getElementsByTagName = ce((function (e) {
                            return e.appendChild(f.createComment("")), !e.getElementsByTagName("*").length
                        })), n.getElementsByClassName = J.test(f.getElementsByClassName), n.getById = ce((function (e) {
                            return p.appendChild(e).id = M, !f.getElementsByName || !f.getElementsByName(M).length
                        })), n.getById ? (r.filter.ID = function (e) {
                            var t = e.replace(te, ne);
                            return function (e) {
                                return e.getAttribute("id") === t
                            }
                        }, r.find.ID = function (e, t) {
                            if (void 0 !== t.getElementById && S) {
                                var n = t.getElementById(e);
                                return n ? [n] : []
                            }
                        }) : (r.filter.ID = function (e) {
                            var t = e.replace(te, ne);
                            return function (e) {
                                var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                                return n && n.value === t
                            }
                        }, r.find.ID = function (e, t) {
                            if (void 0 !== t.getElementById && S) {
                                var n, r, i, o = t.getElementById(e);
                                if (o) {
                                    if ((n = o.getAttributeNode("id")) && n.value === e) return [o];
                                    for (i = t.getElementsByName(e), r = 0; o = i[r++];) if ((n = o.getAttributeNode("id")) && n.value === e) return [o]
                                }
                                return []
                            }
                        }), r.find.TAG = n.getElementsByTagName ? function (e, t) {
                            return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0
                        } : function (e, t) {
                            var n, r = [], i = 0, o = t.getElementsByTagName(e);
                            if ("*" === e) {
                                for (; n = o[i++];) 1 === n.nodeType && r.push(n);
                                return r
                            }
                            return o
                        }, r.find.CLASS = n.getElementsByClassName && function (e, t) {
                            if (void 0 !== t.getElementsByClassName && S) return t.getElementsByClassName(e)
                        }, h = [], b = [], (n.qsa = J.test(f.querySelectorAll)) && (ce((function (e) {
                            var t;
                            p.appendChild(e).innerHTML = "<a id='" + M + "'></a><select id='" + M + "-\r\\' msallowcapture=''><option selected=''></option></select>", e.querySelectorAll("[msallowcapture^='']").length && b.push("[*^$]=[\\x20\\t\\r\\n\\f]*(?:''|\"\")"), e.querySelectorAll("[selected]").length || b.push("\\[[\\x20\\t\\r\\n\\f]*(?:value|" + L + ")"), e.querySelectorAll("[id~=" + M + "-]").length || b.push("~="), (t = f.createElement("input")).setAttribute("name", ""), e.appendChild(t), e.querySelectorAll("[name='']").length || b.push("\\[[\\x20\\t\\r\\n\\f]*name[\\x20\\t\\r\\n\\f]*=[\\x20\\t\\r\\n\\f]*(?:''|\"\")"), e.querySelectorAll(":checked").length || b.push(":checked"), e.querySelectorAll("a#" + M + "+*").length || b.push(".#.+[+~]"), e.querySelectorAll("\\\f"), b.push("[\\r\\n\\f]")
                        })), ce((function (e) {
                            e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                            var t = f.createElement("input");
                            t.setAttribute("type", "hidden"), e.appendChild(t).setAttribute("name", "D"), e.querySelectorAll("[name=d]").length && b.push("name[\\x20\\t\\r\\n\\f]*[*^$|!~]?="), 2 !== e.querySelectorAll(":enabled").length && b.push(":enabled", ":disabled"), p.appendChild(e).disabled = !0, 2 !== e.querySelectorAll(":disabled").length && b.push(":enabled", ":disabled"), e.querySelectorAll("*,:x"), b.push(",.*:")
                        }))), (n.matchesSelector = J.test(A = p.matches || p.webkitMatchesSelector || p.mozMatchesSelector || p.oMatchesSelector || p.msMatchesSelector)) && ce((function (e) {
                            n.disconnectedMatch = A.call(e, "*"), A.call(e, "[s!='']:x"), h.push("!=", F)
                        })), b = b.length && new RegExp(b.join("|")), h = h.length && new RegExp(h.join("|")), t = J.test(p.compareDocumentPosition), P = t || J.test(p.contains) ? function (e, t) {
                            var n = 9 === e.nodeType ? e.documentElement : e, r = t && t.parentNode;
                            return e === r || !(!r || 1 !== r.nodeType || !(n.contains ? n.contains(r) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(r)))
                        } : function (e, t) {
                            if (t) for (; t = t.parentNode;) if (t === e) return !0;
                            return !1
                        }, E = t ? function (e, t) {
                            if (e === t) return d = !0, 0;
                            var r = !e.compareDocumentPosition - !t.compareDocumentPosition;
                            return r || (1 & (r = (e.ownerDocument || e) == (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || !n.sortDetached && t.compareDocumentPosition(e) === r ? e == f || e.ownerDocument == m && P(m, e) ? -1 : t == f || t.ownerDocument == m && P(m, t) ? 1 : c ? O(c, e) - O(c, t) : 0 : 4 & r ? -1 : 1)
                        } : function (e, t) {
                            if (e === t) return d = !0, 0;
                            var n, r = 0, i = e.parentNode, o = t.parentNode, a = [e], s = [t];
                            if (!i || !o) return e == f ? -1 : t == f ? 1 : i ? -1 : o ? 1 : c ? O(c, e) - O(c, t) : 0;
                            if (i === o) return Te(e, t);
                            for (n = e; n = n.parentNode;) a.unshift(n);
                            for (n = t; n = n.parentNode;) s.unshift(n);
                            for (; a[r] === s[r];) r++;
                            return r ? Te(a[r], s[r]) : a[r] == m ? -1 : s[r] == m ? 1 : 0
                        }, f) : f
                    }, se.matches = function (e, t) {
                        return se(e, null, null, t)
                    }, se.matchesSelector = function (e, t) {
                        if (T(e), n.matchesSelector && S && !B[t + " "] && (!h || !h.test(t)) && (!b || !b.test(t))) try {
                            var r = A.call(e, t);
                            if (r || n.disconnectedMatch || e.document && 11 !== e.document.nodeType) return r
                        } catch (e) {
                            B(t, !0)
                        }
                        return se(t, f, null, [e]).length > 0
                    }, se.contains = function (e, t) {
                        return (e.ownerDocument || e) != f && T(e), P(e, t)
                    }, se.attr = function (e, t) {
                        (e.ownerDocument || e) != f && T(e);
                        var i = r.attrHandle[t.toLowerCase()],
                            o = i && H.call(r.attrHandle, t.toLowerCase()) ? i(e, t, !S) : void 0;
                        return void 0 !== o ? o : n.attributes || !S ? e.getAttribute(t) : (o = e.getAttributeNode(t)) && o.specified ? o.value : null
                    }, se.escape = function (e) {
                        return (e + "").replace(re, ie)
                    }, se.error = function (e) {
                        throw new Error("Syntax error, unrecognized expression: " + e)
                    }, se.uniqueSort = function (e) {
                        var t, r = [], i = 0, o = 0;
                        if (d = !n.detectDuplicates, c = !n.sortStable && e.slice(0), e.sort(E), d) {
                            for (; t = e[o++];) t === e[o] && (i = r.push(o));
                            for (; i--;) e.splice(r[i], 1)
                        }
                        return c = null, e
                    }, i = se.getText = function (e) {
                        var t, n = "", r = 0, o = e.nodeType;
                        if (o) {
                            if (1 === o || 9 === o || 11 === o) {
                                if ("string" == typeof e.textContent) return e.textContent;
                                for (e = e.firstChild; e; e = e.nextSibling) n += i(e)
                            } else if (3 === o || 4 === o) return e.nodeValue
                        } else for (; t = e[r++];) n += i(t);
                        return n
                    }, (r = se.selectors = {
                        cacheLength: 50,
                        createPseudo: ue,
                        match: q,
                        attrHandle: {},
                        find: {},
                        relative: {
                            ">": {dir: "parentNode", first: !0},
                            " ": {dir: "parentNode"},
                            "+": {dir: "previousSibling", first: !0},
                            "~": {dir: "previousSibling"}
                        },
                        preFilter: {
                            ATTR: function (e) {
                                return e[1] = e[1].replace(te, ne), e[3] = (e[3] || e[4] || e[5] || "").replace(te, ne), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4)
                            }, CHILD: function (e) {
                                return e[1] = e[1].toLowerCase(), "nth" === e[1].slice(0, 3) ? (e[3] || se.error(e[0]), e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3])), e[5] = +(e[7] + e[8] || "odd" === e[3])) : e[3] && se.error(e[0]), e
                            }, PSEUDO: function (e) {
                                var t, n = !e[6] && e[2];
                                return q.CHILD.test(e[0]) ? null : (e[3] ? e[2] = e[4] || e[5] || "" : n && _.test(n) && (t = a(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && (e[0] = e[0].slice(0, t), e[2] = n.slice(0, t)), e.slice(0, 3))
                            }
                        },
                        filter: {
                            TAG: function (e) {
                                var t = e.replace(te, ne).toLowerCase();
                                return "*" === e ? function () {
                                    return !0
                                } : function (e) {
                                    return e.nodeName && e.nodeName.toLowerCase() === t
                                }
                            }, CLASS: function (e) {
                                var t = G[e + " "];
                                return t || (t = new RegExp("(^|[\\x20\\t\\r\\n\\f])" + e + "(" + R + "|$)")) && G(e, (function (e) {
                                    return t.test("string" == typeof e.className && e.className || void 0 !== e.getAttribute && e.getAttribute("class") || "")
                                }))
                            }, ATTR: function (e, t, n) {
                                return function (r) {
                                    var i = se.attr(r, e);
                                    return null == i ? "!=" === t : !t || (i += "", "=" === t ? i === n : "!=" === t ? i !== n : "^=" === t ? n && 0 === i.indexOf(n) : "*=" === t ? n && i.indexOf(n) > -1 : "$=" === t ? n && i.slice(-n.length) === n : "~=" === t ? (" " + i.replace(X, " ") + " ").indexOf(n) > -1 : "|=" === t && (i === n || i.slice(0, n.length + 1) === n + "-"))
                                }
                            }, CHILD: function (e, t, n, r, i) {
                                var o = "nth" !== e.slice(0, 3), a = "last" !== e.slice(-4), s = "of-type" === t;
                                return 1 === r && 0 === i ? function (e) {
                                    return !!e.parentNode
                                } : function (t, n, l) {
                                    var u, c, d, T, f, p, S = o !== a ? "nextSibling" : "previousSibling",
                                        b = t.parentNode, h = s && t.nodeName.toLowerCase(), A = !l && !s, P = !1;
                                    if (b) {
                                        if (o) {
                                            for (; S;) {
                                                for (T = t; T = T[S];) if (s ? T.nodeName.toLowerCase() === h : 1 === T.nodeType) return !1;
                                                p = S = "only" === e && !p && "nextSibling"
                                            }
                                            return !0
                                        }
                                        if (p = [a ? b.firstChild : b.lastChild], a && A) {
                                            for (P = (f = (u = (c = (d = (T = b)[M] || (T[M] = {}))[T.uniqueID] || (d[T.uniqueID] = {}))[e] || [])[0] === g && u[1]) && u[2], T = f && b.childNodes[f]; T = ++f && T && T[S] || (P = f = 0) || p.pop();) if (1 === T.nodeType && ++P && T === t) {
                                                c[e] = [g, f, P];
                                                break
                                            }
                                        } else if (A && (P = f = (u = (c = (d = (T = t)[M] || (T[M] = {}))[T.uniqueID] || (d[T.uniqueID] = {}))[e] || [])[0] === g && u[1]), !1 === P) for (; (T = ++f && T && T[S] || (P = f = 0) || p.pop()) && ((s ? T.nodeName.toLowerCase() !== h : 1 !== T.nodeType) || !++P || (A && ((c = (d = T[M] || (T[M] = {}))[T.uniqueID] || (d[T.uniqueID] = {}))[e] = [g, P]), T !== t));) ;
                                        return (P -= i) === r || P % r == 0 && P / r >= 0
                                    }
                                }
                            }, PSEUDO: function (e, t) {
                                var n,
                                    i = r.pseudos[e] || r.setFilters[e.toLowerCase()] || se.error("unsupported pseudo: " + e);
                                return i[M] ? i(t) : i.length > 1 ? (n = [e, e, "", t], r.setFilters.hasOwnProperty(e.toLowerCase()) ? ue((function (e, n) {
                                    for (var r, o = i(e, t), a = o.length; a--;) e[r = O(e, o[a])] = !(n[r] = o[a])
                                })) : function (e) {
                                    return i(e, 0, n)
                                }) : i
                            }
                        },
                        pseudos: {
                            not: ue((function (e) {
                                var t = [], n = [], r = s(e.replace(W, "$1"));
                                return r[M] ? ue((function (e, t, n, i) {
                                    for (var o, a = r(e, null, i, []), s = e.length; s--;) (o = a[s]) && (e[s] = !(t[s] = o))
                                })) : function (e, i, o) {
                                    return t[0] = e, r(t, null, o, n), t[0] = null, !n.pop()
                                }
                            })), has: ue((function (e) {
                                return function (t) {
                                    return se(e, t).length > 0
                                }
                            })), contains: ue((function (e) {
                                return e = e.replace(te, ne), function (t) {
                                    return (t.textContent || i(t)).indexOf(e) > -1
                                }
                            })), lang: ue((function (e) {
                                return Q.test(e || "") || se.error("unsupported lang: " + e), e = e.replace(te, ne).toLowerCase(), function (t) {
                                    var n;
                                    do {
                                        if (n = S ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang")) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-")
                                    } while ((t = t.parentNode) && 1 === t.nodeType);
                                    return !1
                                }
                            })), target: function (t) {
                                var n = e.location && e.location.hash;
                                return n && n.slice(1) === t.id
                            }, root: function (e) {
                                return e === p
                            }, focus: function (e) {
                                return e === f.activeElement && (!f.hasFocus || f.hasFocus()) && !!(e.type || e.href || ~e.tabIndex)
                            }, enabled: Se(!1), disabled: Se(!0), checked: function (e) {
                                var t = e.nodeName.toLowerCase();
                                return "input" === t && !!e.checked || "option" === t && !!e.selected
                            }, selected: function (e) {
                                return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected
                            }, empty: function (e) {
                                for (e = e.firstChild; e; e = e.nextSibling) if (e.nodeType < 6) return !1;
                                return !0
                            }, parent: function (e) {
                                return !r.pseudos.empty(e)
                            }, header: function (e) {
                                return Y.test(e.nodeName)
                            }, input: function (e) {
                                return $.test(e.nodeName)
                            }, button: function (e) {
                                var t = e.nodeName.toLowerCase();
                                return "input" === t && "button" === e.type || "button" === t
                            }, text: function (e) {
                                var t;
                                return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase())
                            }, first: be((function () {
                                return [0]
                            })), last: be((function (e, t) {
                                return [t - 1]
                            })), eq: be((function (e, t, n) {
                                return [n < 0 ? n + t : n]
                            })), even: be((function (e, t) {
                                for (var n = 0; n < t; n += 2) e.push(n);
                                return e
                            })), odd: be((function (e, t) {
                                for (var n = 1; n < t; n += 2) e.push(n);
                                return e
                            })), lt: be((function (e, t, n) {
                                for (var r = n < 0 ? n + t : n > t ? t : n; --r >= 0;) e.push(r);
                                return e
                            })), gt: be((function (e, t, n) {
                                for (var r = n < 0 ? n + t : n; ++r < t;) e.push(r);
                                return e
                            }))
                        }
                    }).pseudos.nth = r.pseudos.eq, {
                        radio: !0,
                        checkbox: !0,
                        file: !0,
                        password: !0,
                        image: !0
                    }) r.pseudos[t] = fe(t);
                    for (t in {submit: !0, reset: !0}) r.pseudos[t] = pe(t);

                    function Ae() {
                    }

                    function Pe(e) {
                        for (var t = 0, n = e.length, r = ""; t < n; t++) r += e[t].value;
                        return r
                    }

                    function Me(e, t, n) {
                        var r = t.dir, i = t.next, o = i || r, a = n && "parentNode" === o, s = v++;
                        return t.first ? function (t, n, i) {
                            for (; t = t[r];) if (1 === t.nodeType || a) return e(t, n, i);
                            return !1
                        } : function (t, n, l) {
                            var u, c, d, T = [g, s];
                            if (l) {
                                for (; t = t[r];) if ((1 === t.nodeType || a) && e(t, n, l)) return !0
                            } else for (; t = t[r];) if (1 === t.nodeType || a) if (c = (d = t[M] || (t[M] = {}))[t.uniqueID] || (d[t.uniqueID] = {}), i && i === t.nodeName.toLowerCase()) t = t[r] || t; else {
                                if ((u = c[o]) && u[0] === g && u[1] === s) return T[2] = u[2];
                                if (c[o] = T, T[2] = e(t, n, l)) return !0
                            }
                            return !1
                        }
                    }

                    function me(e) {
                        return e.length > 1 ? function (t, n, r) {
                            for (var i = e.length; i--;) if (!e[i](t, n, r)) return !1;
                            return !0
                        } : e[0]
                    }

                    function ge(e, t, n, r, i) {
                        for (var o, a = [], s = 0, l = e.length, u = null != t; s < l; s++) (o = e[s]) && (n && !n(o, r, i) || (a.push(o), u && t.push(s)));
                        return a
                    }

                    function ve(e, t, n, r, i, o) {
                        return r && !r[M] && (r = ve(r)), i && !i[M] && (i = ve(i, o)), ue((function (o, a, s, l) {
                            var u, c, d, T = [], f = [], p = a.length, S = o || function (e, t, n) {
                                    for (var r = 0, i = t.length; r < i; r++) se(e, t[r], n);
                                    return n
                                }(t || "*", s.nodeType ? [s] : s, []), b = !e || !o && t ? S : ge(S, T, e, s, l),
                                h = n ? i || (o ? e : p || r) ? [] : a : b;
                            if (n && n(b, h, s, l), r) for (u = ge(h, f), r(u, [], s, l), c = u.length; c--;) (d = u[c]) && (h[f[c]] = !(b[f[c]] = d));
                            if (o) {
                                if (i || e) {
                                    if (i) {
                                        for (u = [], c = h.length; c--;) (d = h[c]) && u.push(b[c] = d);
                                        i(null, h = [], u, l)
                                    }
                                    for (c = h.length; c--;) (d = h[c]) && (u = i ? O(o, d) : T[c]) > -1 && (o[u] = !(a[u] = d))
                                }
                            } else h = ge(h === a ? h.splice(p, h.length) : h), i ? i(null, a, h, l) : w.apply(a, h)
                        }))
                    }

                    function Ge(e) {
                        for (var t, n, i, o = e.length, a = r.relative[e[0].type], s = a || r.relative[" "], l = a ? 1 : 0, c = Me((function (e) {
                            return e === t
                        }), s, !0), d = Me((function (e) {
                            return O(t, e) > -1
                        }), s, !0), T = [function (e, n, r) {
                            var i = !a && (r || n !== u) || ((t = n).nodeType ? c(e, n, r) : d(e, n, r));
                            return t = null, i
                        }]; l < o; l++) if (n = r.relative[e[l].type]) T = [Me(me(T), n)]; else {
                            if ((n = r.filter[e[l].type].apply(null, e[l].matches))[M]) {
                                for (i = ++l; i < o && !r.relative[e[i].type]; i++) ;
                                return ve(l > 1 && me(T), l > 1 && Pe(e.slice(0, l - 1).concat({value: " " === e[l - 2].type ? "*" : ""})).replace(W, "$1"), n, l < i && Ge(e.slice(l, i)), i < o && Ge(e = e.slice(i)), i < o && Pe(e))
                            }
                            T.push(n)
                        }
                        return me(T)
                    }

                    return Ae.prototype = r.filters = r.pseudos, r.setFilters = new Ae, a = se.tokenize = function (e, t) {
                        var n, i, o, a, s, l, u, c = y[e + " "];
                        if (c) return t ? 0 : c.slice(0);
                        for (s = e, l = [], u = r.preFilter; s;) {
                            for (a in n && !(i = K.exec(s)) || (i && (s = s.slice(i[0].length) || s), l.push(o = [])), n = !1, (i = U.exec(s)) && (n = i.shift(), o.push({
                                value: n,
                                type: i[0].replace(W, " ")
                            }), s = s.slice(n.length)), r.filter) !(i = q[a].exec(s)) || u[a] && !(i = u[a](i)) || (n = i.shift(), o.push({
                                value: n,
                                type: a,
                                matches: i
                            }), s = s.slice(n.length));
                            if (!n) break
                        }
                        return t ? s.length : s ? se.error(e) : y(e, l).slice(0)
                    }, s = se.compile = function (e, t) {
                        var n, i = [], o = [], s = C[e + " "];
                        if (!s) {
                            for (t || (t = a(e)), n = t.length; n--;) (s = Ge(t[n]))[M] ? i.push(s) : o.push(s);
                            (s = C(e, function (e, t) {
                                var n = t.length > 0, i = e.length > 0, o = function (o, a, s, l, c) {
                                    var d, p, b, h = 0, A = "0", P = o && [], M = [], m = u,
                                        v = o || i && r.find.TAG("*", c), G = g += null == m ? 1 : Math.random() || .1,
                                        y = v.length;
                                    for (c && (u = a == f || a || c); A !== y && null != (d = v[A]); A++) {
                                        if (i && d) {
                                            for (p = 0, a || d.ownerDocument == f || (T(d), s = !S); b = e[p++];) if (b(d, a || f, s)) {
                                                l.push(d);
                                                break
                                            }
                                            c && (g = G)
                                        }
                                        n && ((d = !b && d) && h--, o && P.push(d))
                                    }
                                    if (h += A, n && A !== h) {
                                        for (p = 0; b = t[p++];) b(P, M, a, s);
                                        if (o) {
                                            if (h > 0) for (; A--;) P[A] || M[A] || (M[A] = I.call(l));
                                            M = ge(M)
                                        }
                                        w.apply(l, M), c && !o && M.length > 0 && h + t.length > 1 && se.uniqueSort(l)
                                    }
                                    return c && (g = G, u = m), P
                                };
                                return n ? ue(o) : o
                            }(o, i))).selector = e
                        }
                        return s
                    }, l = se.select = function (e, t, n, i) {
                        var o, l, u, c, d, T = "function" == typeof e && e, f = !i && a(e = T.selector || e);
                        if (n = n || [], 1 === f.length) {
                            if ((l = f[0] = f[0].slice(0)).length > 2 && "ID" === (u = l[0]).type && 9 === t.nodeType && S && r.relative[l[1].type]) {
                                if (!(t = (r.find.ID(u.matches[0].replace(te, ne), t) || [])[0])) return n;
                                T && (t = t.parentNode), e = e.slice(l.shift().value.length)
                            }
                            for (o = q.needsContext.test(e) ? 0 : l.length; o-- && (u = l[o], !r.relative[c = u.type]);) if ((d = r.find[c]) && (i = d(u.matches[0].replace(te, ne), ee.test(l[0].type) && he(t.parentNode) || t))) {
                                if (l.splice(o, 1), !(e = i.length && Pe(l))) return w.apply(n, i), n;
                                break
                            }
                        }
                        return (T || s(e, f))(i, t, !S, n, !t || ee.test(e) && he(t.parentNode) || t), n
                    }, n.sortStable = M.split("").sort(E).join("") === M, n.detectDuplicates = !!d, T(), n.sortDetached = ce((function (e) {
                        return 1 & e.compareDocumentPosition(f.createElement("fieldset"))
                    })), ce((function (e) {
                        return e.innerHTML = "<a href='#'></a>", "#" === e.firstChild.getAttribute("href")
                    })) || de("type|href|height|width", (function (e, t, n) {
                        if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2)
                    })), n.attributes && ce((function (e) {
                        return e.innerHTML = "<input/>", e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value")
                    })) || de("value", (function (e, t, n) {
                        if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue
                    })), ce((function (e) {
                        return null == e.getAttribute("disabled")
                    })) || de(L, (function (e, t, n) {
                        var r;
                        if (!n) return !0 === e[t] ? t.toLowerCase() : (r = e.getAttributeNode(t)) && r.specified ? r.value : null
                    })), se
                }(e);
                g.find = G, (g.expr = G.selectors)[":"] = g.expr.pseudos, g.uniqueSort = g.unique = G.uniqueSort, g.text = G.getText, g.isXMLDoc = G.isXML, g.contains = G.contains, g.escapeSelector = G.escape;
                var y = function (e, t, n) {
                    for (var r = [], i = void 0 !== n; (e = e[t]) && 9 !== e.nodeType;) if (1 === e.nodeType) {
                        if (i && g(e).is(n)) break;
                        r.push(e)
                    }
                    return r
                }, C = function (e, t) {
                    for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                    return n
                }, B = g.expr.match.needsContext;

                function E(e, t) {
                    return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase()
                }

                var H = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;

                function x(e, t, n) {
                    return S(t) ? g.grep(e, (function (e, r) {
                        return !!t.call(e, r, e) !== n
                    })) : t.nodeType ? g.grep(e, (function (e) {
                        return e === t !== n
                    })) : "string" != typeof t ? g.grep(e, (function (e) {
                        return l.call(t, e) > -1 !== n
                    })) : g.filter(t, e, n)
                }

                g.filter = function (e, t, n) {
                    var r = t[0];
                    return n && (e = ":not(" + e + ")"), 1 === t.length && 1 === r.nodeType ? g.find.matchesSelector(r, e) ? [r] : [] : g.find.matches(e, g.grep(t, (function (e) {
                        return 1 === e.nodeType
                    })))
                }, g.fn.extend({
                    find: function (e) {
                        var t, n, r = this.length, i = this;
                        if ("string" != typeof e) return this.pushStack(g(e).filter((function () {
                            for (t = 0; t < r; t++) if (g.contains(i[t], this)) return !0
                        })));
                        for (n = this.pushStack([]), t = 0; t < r; t++) g.find(e, i[t], n);
                        return r > 1 ? g.uniqueSort(n) : n
                    }, filter: function (e) {
                        return this.pushStack(x(this, e || [], !1))
                    }, not: function (e) {
                        return this.pushStack(x(this, e || [], !0))
                    }, is: function (e) {
                        return !!x(this, "string" == typeof e && B.test(e) ? g(e) : e || [], !1).length
                    }
                });
                var I, D = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
                (g.fn.init = function (e, t, n) {
                    var r, i;
                    if (!e) return this;
                    if (n = n || I, "string" == typeof e) {
                        if (!(r = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : D.exec(e)) || !r[1] && t) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
                        if (r[1]) {
                            if (t = t instanceof g ? t[0] : t, g.merge(this, g.parseHTML(r[1], t && t.nodeType ? t.ownerDocument || t : h, !0)), H.test(r[1]) && g.isPlainObject(t)) for (r in t) S(this[r]) ? this[r](t[r]) : this.attr(r, t[r]);
                            return this
                        }
                        return (i = h.getElementById(r[2])) && (this[0] = i, this.length = 1), this
                    }
                    return e.nodeType ? (this[0] = e, this.length = 1, this) : S(e) ? void 0 !== n.ready ? n.ready(e) : e(g) : g.makeArray(e, this)
                }).prototype = g.fn, I = g(h);
                var w = /^(?:parents|prev(?:Until|All))/, N = {children: !0, contents: !0, next: !0, prev: !0};

                function O(e, t) {
                    for (; (e = e[t]) && 1 !== e.nodeType;) ;
                    return e
                }

                g.fn.extend({
                    has: function (e) {
                        var t = g(e, this), n = t.length;
                        return this.filter((function () {
                            for (var e = 0; e < n; e++) if (g.contains(this, t[e])) return !0
                        }))
                    }, closest: function (e, t) {
                        var n, r = 0, i = this.length, o = [], a = "string" != typeof e && g(e);
                        if (!B.test(e)) for (; r < i; r++) for (n = this[r]; n && n !== t; n = n.parentNode) if (n.nodeType < 11 && (a ? a.index(n) > -1 : 1 === n.nodeType && g.find.matchesSelector(n, e))) {
                            o.push(n);
                            break
                        }
                        return this.pushStack(o.length > 1 ? g.uniqueSort(o) : o)
                    }, index: function (e) {
                        return e ? "string" == typeof e ? l.call(g(e), this[0]) : l.call(this, e.jquery ? e[0] : e) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1
                    }, add: function (e, t) {
                        return this.pushStack(g.uniqueSort(g.merge(this.get(), g(e, t))))
                    }, addBack: function (e) {
                        return this.add(null == e ? this.prevObject : this.prevObject.filter(e))
                    }
                }), g.each({
                    parent: function (e) {
                        var t = e.parentNode;
                        return t && 11 !== t.nodeType ? t : null
                    }, parents: function (e) {
                        return y(e, "parentNode")
                    }, parentsUntil: function (e, t, n) {
                        return y(e, "parentNode", n)
                    }, next: function (e) {
                        return O(e, "nextSibling")
                    }, prev: function (e) {
                        return O(e, "previousSibling")
                    }, nextAll: function (e) {
                        return y(e, "nextSibling")
                    }, prevAll: function (e) {
                        return y(e, "previousSibling")
                    }, nextUntil: function (e, t, n) {
                        return y(e, "nextSibling", n)
                    }, prevUntil: function (e, t, n) {
                        return y(e, "previousSibling", n)
                    }, siblings: function (e) {
                        return C((e.parentNode || {}).firstChild, e)
                    }, children: function (e) {
                        return C(e.firstChild)
                    }, contents: function (e) {
                        return null != e.contentDocument && i(e.contentDocument) ? e.contentDocument : (E(e, "template") && (e = e.content || e), g.merge([], e.childNodes))
                    }
                }, (function (e, t) {
                    g.fn[e] = function (n, r) {
                        var i = g.map(this, t, n);
                        return "Until" !== e.slice(-5) && (r = n), r && "string" == typeof r && (i = g.filter(r, i)), this.length > 1 && (N[e] || g.uniqueSort(i), w.test(e) && i.reverse()), this.pushStack(i)
                    }
                }));
                var L = /[^\x20\t\r\n\f]+/g;

                function R(e) {
                    return e
                }

                function V(e) {
                    throw e
                }

                function k(e, t, n, r) {
                    var i;
                    try {
                        e && S(i = e.promise) ? i.call(e).done(t).fail(n) : e && S(i = e.then) ? i.call(e, t, n) : t.apply(void 0, [e].slice(r))
                    } catch (e) {
                        n.apply(void 0, [e])
                    }
                }

                g.Callbacks = function (e) {
                    e = "string" == typeof e ? function (e) {
                        var t = {};
                        return g.each(e.match(L) || [], (function (e, n) {
                            t[n] = !0
                        })), t
                    }(e) : g.extend({}, e);
                    var t, n, r, i, o = [], a = [], s = -1, l = function () {
                        for (i = i || e.once, r = t = !0; a.length; s = -1) for (n = a.shift(); ++s < o.length;) !1 === o[s].apply(n[0], n[1]) && e.stopOnFalse && (s = o.length, n = !1);
                        e.memory || (n = !1), t = !1, i && (o = n ? [] : "")
                    }, u = {
                        add: function () {
                            return o && (n && !t && (s = o.length - 1, a.push(n)), function t(n) {
                                g.each(n, (function (n, r) {
                                    S(r) ? e.unique && u.has(r) || o.push(r) : r && r.length && "string" !== M(r) && t(r)
                                }))
                            }(arguments), n && !t && l()), this
                        }, remove: function () {
                            return g.each(arguments, (function (e, t) {
                                for (var n; (n = g.inArray(t, o, n)) > -1;) o.splice(n, 1), n <= s && s--
                            })), this
                        }, has: function (e) {
                            return e ? g.inArray(e, o) > -1 : o.length > 0
                        }, empty: function () {
                            return o && (o = []), this
                        }, disable: function () {
                            return i = a = [], o = n = "", this
                        }, disabled: function () {
                            return !o
                        }, lock: function () {
                            return i = a = [], n || t || (o = n = ""), this
                        }, locked: function () {
                            return !!i
                        }, fireWith: function (e, n) {
                            return i || (n = [e, (n = n || []).slice ? n.slice() : n], a.push(n), t || l()), this
                        }, fire: function () {
                            return u.fireWith(this, arguments), this
                        }, fired: function () {
                            return !!r
                        }
                    };
                    return u
                }, g.extend({
                    Deferred: function (t) {
                        var n = [["notify", "progress", g.Callbacks("memory"), g.Callbacks("memory"), 2], ["resolve", "done", g.Callbacks("once memory"), g.Callbacks("once memory"), 0, "resolved"], ["reject", "fail", g.Callbacks("once memory"), g.Callbacks("once memory"), 1, "rejected"]],
                            i = "pending", o = {
                                state: function () {
                                    return i
                                }, always: function () {
                                    return a.done(arguments).fail(arguments), this
                                }, catch: function (e) {
                                    return o.then(null, e)
                                }, pipe: function () {
                                    var e = arguments;
                                    return g.Deferred((function (t) {
                                        g.each(n, (function (n, r) {
                                            var i = S(e[r[4]]) && e[r[4]];
                                            a[r[1]]((function () {
                                                var e = i && i.apply(this, arguments);
                                                e && S(e.promise) ? e.promise().progress(t.notify).done(t.resolve).fail(t.reject) : t[r[0] + "With"](this, i ? [e] : arguments)
                                            }))
                                        })), e = null
                                    })).promise()
                                }, then: function (t, i, o) {
                                    var a = 0;

                                    function s(t, n, i, o) {
                                        return function () {
                                            var l = this, u = arguments, c = function () {
                                                var e, c;
                                                if (!(t < a)) {
                                                    if ((e = i.apply(l, u)) === n.promise()) throw new TypeError("Thenable self-resolution");
                                                    c = e && ("object" === r(e) || "function" == typeof e) && e.then, S(c) ? o ? c.call(e, s(a, n, R, o), s(a, n, V, o)) : (a++, c.call(e, s(a, n, R, o), s(a, n, V, o), s(a, n, R, n.notifyWith))) : (i !== R && (l = void 0, u = [e]), (o || n.resolveWith)(l, u))
                                                }
                                            }, d = o ? c : function () {
                                                try {
                                                    c()
                                                } catch (e) {
                                                    g.Deferred.exceptionHook && g.Deferred.exceptionHook(e, d.stackTrace), t + 1 >= a && (i !== V && (l = void 0, u = [e]), n.rejectWith(l, u))
                                                }
                                            };
                                            t ? d() : (g.Deferred.getStackHook && (d.stackTrace = g.Deferred.getStackHook()), e.setTimeout(d))
                                        }
                                    }

                                    return g.Deferred((function (e) {
                                        n[0][3].add(s(0, e, S(o) ? o : R, e.notifyWith)), n[1][3].add(s(0, e, S(t) ? t : R)), n[2][3].add(s(0, e, S(i) ? i : V))
                                    })).promise()
                                }, promise: function (e) {
                                    return null != e ? g.extend(e, o) : o
                                }
                            }, a = {};
                        return g.each(n, (function (e, t) {
                            var r = t[2], s = t[5];
                            o[t[1]] = r.add, s && r.add((function () {
                                i = s
                            }), n[3 - e][2].disable, n[3 - e][3].disable, n[0][2].lock, n[0][3].lock), r.add(t[3].fire), a[t[0]] = function () {
                                return a[t[0] + "With"](this === a ? void 0 : this, arguments), this
                            }, a[t[0] + "With"] = r.fireWith
                        })), o.promise(a), t && t.call(a, a), a
                    }, when: function (e) {
                        var t = arguments.length, n = t, r = Array(n), i = o.call(arguments), a = g.Deferred(),
                            s = function (e) {
                                return function (n) {
                                    r[e] = this, i[e] = arguments.length > 1 ? o.call(arguments) : n, --t || a.resolveWith(r, i)
                                }
                            };
                        if (t <= 1 && (k(e, a.done(s(n)).resolve, a.reject, !t), "pending" === a.state() || S(i[n] && i[n].then))) return a.then();
                        for (; n--;) k(i[n], s(n), a.reject);
                        return a.promise()
                    }
                });
                var F = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
                g.Deferred.exceptionHook = function (t, n) {
                    e.console && e.console.warn && t && F.test(t.name) && e.console.warn("jQuery.Deferred exception: " + t.message, t.stack, n)
                }, g.readyException = function (t) {
                    e.setTimeout((function () {
                        throw t
                    }))
                };
                var X = g.Deferred();

                function W() {
                    h.removeEventListener("DOMContentLoaded", W), e.removeEventListener("load", W), g.ready()
                }

                g.fn.ready = function (e) {
                    return X.then(e).catch((function (e) {
                        g.readyException(e)
                    })), this
                }, g.extend({
                    isReady: !1, readyWait: 1, ready: function (e) {
                        (!0 === e ? --g.readyWait : g.isReady) || (g.isReady = !0, !0 !== e && --g.readyWait > 0 || X.resolveWith(h, [g]))
                    }
                }), g.ready.then = X.then, "complete" === h.readyState || "loading" !== h.readyState && !h.documentElement.doScroll ? e.setTimeout(g.ready) : (h.addEventListener("DOMContentLoaded", W), e.addEventListener("load", W));
                var K = function e(t, n, r, i, o, a, s) {
                    var l = 0, u = t.length, c = null == r;
                    if ("object" === M(r)) for (l in o = !0, r) e(t, n, l, r[l], !0, a, s); else if (void 0 !== i && (o = !0, S(i) || (s = !0), c && (s ? (n.call(t, i), n = null) : (c = n, n = function (e, t, n) {
                        return c.call(g(e), n)
                    })), n)) for (; l < u; l++) n(t[l], r, s ? i : i.call(t[l], l, n(t[l], r)));
                    return o ? t : c ? n.call(t) : u ? n(t[0], r) : a
                }, U = /^-ms-/, j = /-([a-z])/g;

                function _(e, t) {
                    return t.toUpperCase()
                }

                function Q(e) {
                    return e.replace(U, "ms-").replace(j, _)
                }

                var q = function (e) {
                    return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType
                };

                function z() {
                    this.expando = g.expando + z.uid++
                }

                z.uid = 1, z.prototype = {
                    cache: function (e) {
                        var t = e[this.expando];
                        return t || (t = {}, q(e) && (e.nodeType ? e[this.expando] = t : Object.defineProperty(e, this.expando, {
                            value: t,
                            configurable: !0
                        }))), t
                    }, set: function (e, t, n) {
                        var r, i = this.cache(e);
                        if ("string" == typeof t) i[Q(t)] = n; else for (r in t) i[Q(r)] = t[r];
                        return i
                    }, get: function (e, t) {
                        return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][Q(t)]
                    }, access: function (e, t, n) {
                        return void 0 === t || t && "string" == typeof t && void 0 === n ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t)
                    }, remove: function (e, t) {
                        var n, r = e[this.expando];
                        if (void 0 !== r) {
                            if (void 0 !== t) {
                                n = (t = Array.isArray(t) ? t.map(Q) : (t = Q(t)) in r ? [t] : t.match(L) || []).length;
                                for (; n--;) delete r[t[n]]
                            }
                            (void 0 === t || g.isEmptyObject(r)) && (e.nodeType ? e[this.expando] = void 0 : delete e[this.expando])
                        }
                    }, hasData: function (e) {
                        var t = e[this.expando];
                        return void 0 !== t && !g.isEmptyObject(t)
                    }
                };
                var $ = new z, Y = new z, J = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/, Z = /[A-Z]/g;

                function ee(e, t, n) {
                    var r;
                    if (void 0 === n && 1 === e.nodeType) if (r = "data-" + t.replace(Z, "-$&").toLowerCase(), "string" == typeof (n = e.getAttribute(r))) {
                        try {
                            n = function (e) {
                                return "true" === e || "false" !== e && ("null" === e ? null : e === +e + "" ? +e : J.test(e) ? JSON.parse(e) : e)
                            }(n)
                        } catch (e) {
                        }
                        Y.set(e, t, n)
                    } else n = void 0;
                    return n
                }

                g.extend({
                    hasData: function (e) {
                        return Y.hasData(e) || $.hasData(e)
                    }, data: function (e, t, n) {
                        return Y.access(e, t, n)
                    }, removeData: function (e, t) {
                        Y.remove(e, t)
                    }, _data: function (e, t, n) {
                        return $.access(e, t, n)
                    }, _removeData: function (e, t) {
                        $.remove(e, t)
                    }
                }), g.fn.extend({
                    data: function (e, t) {
                        var n, i, o, a = this[0], s = a && a.attributes;
                        if (void 0 === e) {
                            if (this.length && (o = Y.get(a), 1 === a.nodeType && !$.get(a, "hasDataAttrs"))) {
                                for (n = s.length; n--;) s[n] && 0 === (i = s[n].name).indexOf("data-") && (i = Q(i.slice(5)), ee(a, i, o[i]));
                                $.set(a, "hasDataAttrs", !0)
                            }
                            return o
                        }
                        return "object" === r(e) ? this.each((function () {
                            Y.set(this, e)
                        })) : K(this, (function (t) {
                            var n;
                            if (a && void 0 === t) return void 0 !== (n = Y.get(a, e)) || void 0 !== (n = ee(a, e)) ? n : void 0;
                            this.each((function () {
                                Y.set(this, e, t)
                            }))
                        }), null, t, arguments.length > 1, null, !0)
                    }, removeData: function (e) {
                        return this.each((function () {
                            Y.remove(this, e)
                        }))
                    }
                }), g.extend({
                    queue: function (e, t, n) {
                        var r;
                        if (e) return t = (t || "fx") + "queue", r = $.get(e, t), n && (!r || Array.isArray(n) ? r = $.access(e, t, g.makeArray(n)) : r.push(n)), r || []
                    }, dequeue: function (e, t) {
                        var n = g.queue(e, t = t || "fx"), r = n.length, i = n.shift(), o = g._queueHooks(e, t);
                        "inprogress" === i && (i = n.shift(), r--), i && ("fx" === t && n.unshift("inprogress"), delete o.stop, i.call(e, (function () {
                            g.dequeue(e, t)
                        }), o)), !r && o && o.empty.fire()
                    }, _queueHooks: function (e, t) {
                        var n = t + "queueHooks";
                        return $.get(e, n) || $.access(e, n, {
                            empty: g.Callbacks("once memory").add((function () {
                                $.remove(e, [t + "queue", n])
                            }))
                        })
                    }
                }), g.fn.extend({
                    queue: function (e, t) {
                        var n = 2;
                        return "string" != typeof e && (t = e, e = "fx", n--), arguments.length < n ? g.queue(this[0], e) : void 0 === t ? this : this.each((function () {
                            var n = g.queue(this, e, t);
                            g._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && g.dequeue(this, e)
                        }))
                    }, dequeue: function (e) {
                        return this.each((function () {
                            g.dequeue(this, e)
                        }))
                    }, clearQueue: function (e) {
                        return this.queue(e || "fx", [])
                    }, promise: function (e, t) {
                        var n, r = 1, i = g.Deferred(), o = this, a = this.length, s = function () {
                            --r || i.resolveWith(o, [o])
                        };
                        for ("string" != typeof e && (t = e, e = void 0), e = e || "fx"; a--;) (n = $.get(o[a], e + "queueHooks")) && n.empty && (r++, n.empty.add(s));
                        return s(), i.promise(t)
                    }
                });
                var te = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
                    ne = new RegExp("^(?:([+-])=|)(" + te + ")([a-z%]*)$", "i"),
                    re = ["Top", "Right", "Bottom", "Left"], ie = h.documentElement, oe = function (e) {
                        return g.contains(e.ownerDocument, e)
                    }, ae = {composed: !0};
                ie.getRootNode && (oe = function (e) {
                    return g.contains(e.ownerDocument, e) || e.getRootNode(ae) === e.ownerDocument
                });
                var se = function (e, t) {
                    return "none" === (e = t || e).style.display || "" === e.style.display && oe(e) && "none" === g.css(e, "display")
                };
                var le = {};

                function ue(e) {
                    var t, n = e.ownerDocument, r = e.nodeName, i = le[r];
                    return i || (t = n.body.appendChild(n.createElement(r)), i = g.css(t, "display"), t.parentNode.removeChild(t), "none" === i && (i = "block"), le[r] = i, i)
                }

                function ce(e, t) {
                    for (var n, r, i = [], o = 0, a = e.length; o < a; o++) (r = e[o]).style && (n = r.style.display, t ? ("none" === n && (i[o] = $.get(r, "display") || null, i[o] || (r.style.display = "")), "" === r.style.display && se(r) && (i[o] = ue(r))) : "none" !== n && (i[o] = "none", $.set(r, "display", n)));
                    for (o = 0; o < a; o++) null != i[o] && (e[o].style.display = i[o]);
                    return e
                }

                g.fn.extend({
                    show: function () {
                        return ce(this, !0)
                    }, hide: function () {
                        return ce(this)
                    }, toggle: function (e) {
                        return "boolean" == typeof e ? e ? this.show() : this.hide() : this.each((function () {
                            se(this) ? g(this).show() : g(this).hide()
                        }))
                    }
                });
                var de, Te, fe = /^(?:checkbox|radio)$/i, pe = /<([a-z][^\/\0>\x20\t\r\n\f]*)/i,
                    Se = /^$|^module$|\/(?:java|ecma)script/i;
                de = h.createDocumentFragment().appendChild(h.createElement("div")), (Te = h.createElement("input")).setAttribute("type", "radio"), Te.setAttribute("checked", "checked"), Te.setAttribute("name", "t"), de.appendChild(Te), p.checkClone = de.cloneNode(!0).cloneNode(!0).lastChild.checked, de.innerHTML = "<textarea>x</textarea>", p.noCloneChecked = !!de.cloneNode(!0).lastChild.defaultValue, de.innerHTML = "<option></option>", p.option = !!de.lastChild;
                var be = {
                    thead: [1, "<table>", "</table>"],
                    col: [2, "<table><colgroup>", "</colgroup></table>"],
                    tr: [2, "<table><tbody>", "</tbody></table>"],
                    td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                    _default: [0, "", ""]
                };

                function he(e, t) {
                    var n;
                    return n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : [], void 0 === t || t && E(e, t) ? g.merge([e], n) : n
                }

                function Ae(e, t) {
                    for (var n = 0, r = e.length; n < r; n++) $.set(e[n], "globalEval", !t || $.get(t[n], "globalEval"))
                }

                be.tbody = be.tfoot = be.colgroup = be.caption = be.thead, be.th = be.td, p.option || (be.optgroup = be.option = [1, "<select multiple='multiple'>", "</select>"]);
                var Pe = /<|&#?\w+;/;

                function Me(e, t, n, r, i) {
                    for (var o, a, s, l, u, c, d = t.createDocumentFragment(), T = [], f = 0, p = e.length; f < p; f++) if ((o = e[f]) || 0 === o) if ("object" === M(o)) g.merge(T, o.nodeType ? [o] : o); else if (Pe.test(o)) {
                        for (a = a || d.appendChild(t.createElement("div")), s = (pe.exec(o) || ["", ""])[1].toLowerCase(), l = be[s] || be._default, a.innerHTML = l[1] + g.htmlPrefilter(o) + l[2], c = l[0]; c--;) a = a.lastChild;
                        g.merge(T, a.childNodes), (a = d.firstChild).textContent = ""
                    } else T.push(t.createTextNode(o));
                    for (d.textContent = "", f = 0; o = T[f++];) if (r && g.inArray(o, r) > -1) i && i.push(o); else if (u = oe(o), a = he(d.appendChild(o), "script"), u && Ae(a), n) for (c = 0; o = a[c++];) Se.test(o.type || "") && n.push(o);
                    return d
                }

                var me = /^([^.]*)(?:\.(.+)|)/;

                function ge() {
                    return !0
                }

                function ve() {
                    return !1
                }

                function Ge(e, t) {
                    return e === function () {
                        try {
                            return h.activeElement
                        } catch (e) {
                        }
                    }() == ("focus" === t)
                }

                function ye(e, t, n, i, o, a) {
                    var s, l;
                    if ("object" === r(t)) {
                        for (l in "string" != typeof n && (i = i || n, n = void 0), t) ye(e, l, n, i, t[l], a);
                        return e
                    }
                    if (null == i && null == o ? (o = n, i = n = void 0) : null == o && ("string" == typeof n ? (o = i, i = void 0) : (o = i, i = n, n = void 0)), !1 === o) o = ve; else if (!o) return e;
                    return 1 === a && (s = o, (o = function (e) {
                        return g().off(e), s.apply(this, arguments)
                    }).guid = s.guid || (s.guid = g.guid++)), e.each((function () {
                        g.event.add(this, t, o, i, n)
                    }))
                }

                function Ce(e, t, n) {
                    n ? ($.set(e, t, !1), g.event.add(e, t, {
                        namespace: !1, handler: function (e) {
                            var r, i, a = $.get(this, t);
                            if (1 & e.isTrigger && this[t]) {
                                if (a.length) (g.event.special[t] || {}).delegateType && e.stopPropagation(); else if (a = o.call(arguments), $.set(this, t, a), r = n(this, t), this[t](), a !== (i = $.get(this, t)) || r ? $.set(this, t, !1) : i = {}, a !== i) return e.stopImmediatePropagation(), e.preventDefault(), i && i.value
                            } else a.length && ($.set(this, t, {value: g.event.trigger(g.extend(a[0], g.Event.prototype), a.slice(1), this)}), e.stopImmediatePropagation())
                        }
                    })) : void 0 === $.get(e, t) && g.event.add(e, t, ge)
                }

                g.event = {
                    global: {}, add: function (e, t, n, r, i) {
                        var o, a, s, l, u, c, d, T, f, p, S, b = $.get(e);
                        if (q(e)) for (n.handler && (n = (o = n).handler, i = o.selector), i && g.find.matchesSelector(ie, i), n.guid || (n.guid = g.guid++), (l = b.events) || (l = b.events = Object.create(null)), (a = b.handle) || (a = b.handle = function (t) {
                            return g.event.triggered !== t.type ? g.event.dispatch.apply(e, arguments) : void 0
                        }), u = (t = (t || "").match(L) || [""]).length; u--;) f = S = (s = me.exec(t[u]) || [])[1], p = (s[2] || "").split(".").sort(), f && (d = g.event.special[f] || {}, f = (i ? d.delegateType : d.bindType) || f, d = g.event.special[f] || {}, c = g.extend({
                            type: f,
                            origType: S,
                            data: r,
                            handler: n,
                            guid: n.guid,
                            selector: i,
                            needsContext: i && g.expr.match.needsContext.test(i),
                            namespace: p.join(".")
                        }, o), (T = l[f]) || ((T = l[f] = []).delegateCount = 0, d.setup && !1 !== d.setup.call(e, r, p, a) || e.addEventListener && e.addEventListener(f, a)), d.add && (d.add.call(e, c), c.handler.guid || (c.handler.guid = n.guid)), i ? T.splice(T.delegateCount++, 0, c) : T.push(c), g.event.global[f] = !0)
                    }, remove: function (e, t, n, r, i) {
                        var o, a, s, l, u, c, d, T, f, p, S, b = $.hasData(e) && $.get(e);
                        if (b && (l = b.events)) {
                            for (u = (t = (t || "").match(L) || [""]).length; u--;) if (f = S = (s = me.exec(t[u]) || [])[1], p = (s[2] || "").split(".").sort(), f) {
                                for (d = g.event.special[f] || {}, T = l[f = (r ? d.delegateType : d.bindType) || f] || [], s = s[2] && new RegExp("(^|\\.)" + p.join("\\.(?:.*\\.|)") + "(\\.|$)"), a = o = T.length; o--;) c = T[o], !i && S !== c.origType || n && n.guid !== c.guid || s && !s.test(c.namespace) || r && r !== c.selector && ("**" !== r || !c.selector) || (T.splice(o, 1), c.selector && T.delegateCount--, d.remove && d.remove.call(e, c));
                                a && !T.length && (d.teardown && !1 !== d.teardown.call(e, p, b.handle) || g.removeEvent(e, f, b.handle), delete l[f])
                            } else for (f in l) g.event.remove(e, f + t[u], n, r, !0);
                            g.isEmptyObject(l) && $.remove(e, "handle events")
                        }
                    }, dispatch: function (e) {
                        var t, n, r, i, o, a, s = new Array(arguments.length), l = g.event.fix(e),
                            u = ($.get(this, "events") || Object.create(null))[l.type] || [],
                            c = g.event.special[l.type] || {};
                        for (s[0] = l, t = 1; t < arguments.length; t++) s[t] = arguments[t];
                        if (l.delegateTarget = this, !c.preDispatch || !1 !== c.preDispatch.call(this, l)) {
                            for (a = g.event.handlers.call(this, l, u), t = 0; (i = a[t++]) && !l.isPropagationStopped();) for (l.currentTarget = i.elem, n = 0; (o = i.handlers[n++]) && !l.isImmediatePropagationStopped();) l.rnamespace && !1 !== o.namespace && !l.rnamespace.test(o.namespace) || (l.handleObj = o, l.data = o.data, void 0 !== (r = ((g.event.special[o.origType] || {}).handle || o.handler).apply(i.elem, s)) && !1 === (l.result = r) && (l.preventDefault(), l.stopPropagation()));
                            return c.postDispatch && c.postDispatch.call(this, l), l.result
                        }
                    }, handlers: function (e, t) {
                        var n, r, i, o, a, s = [], l = t.delegateCount, u = e.target;
                        if (l && u.nodeType && !("click" === e.type && e.button >= 1)) for (; u !== this; u = u.parentNode || this) if (1 === u.nodeType && ("click" !== e.type || !0 !== u.disabled)) {
                            for (o = [], a = {}, n = 0; n < l; n++) void 0 === a[i = (r = t[n]).selector + " "] && (a[i] = r.needsContext ? g(i, this).index(u) > -1 : g.find(i, this, null, [u]).length), a[i] && o.push(r);
                            o.length && s.push({elem: u, handlers: o})
                        }
                        return u = this, l < t.length && s.push({elem: u, handlers: t.slice(l)}), s
                    }, addProp: function (e, t) {
                        Object.defineProperty(g.Event.prototype, e, {
                            enumerable: !0,
                            configurable: !0,
                            get: S(t) ? function () {
                                if (this.originalEvent) return t(this.originalEvent)
                            } : function () {
                                if (this.originalEvent) return this.originalEvent[e]
                            },
                            set: function (t) {
                                Object.defineProperty(this, e, {
                                    enumerable: !0,
                                    configurable: !0,
                                    writable: !0,
                                    value: t
                                })
                            }
                        })
                    }, fix: function (e) {
                        return e[g.expando] ? e : new g.Event(e)
                    }, special: {
                        load: {noBubble: !0}, click: {
                            setup: function (e) {
                                var t = this || e;
                                return fe.test(t.type) && t.click && E(t, "input") && Ce(t, "click", ge), !1
                            }, trigger: function (e) {
                                var t = this || e;
                                return fe.test(t.type) && t.click && E(t, "input") && Ce(t, "click"), !0
                            }, _default: function (e) {
                                var t = e.target;
                                return fe.test(t.type) && t.click && E(t, "input") && $.get(t, "click") || E(t, "a")
                            }
                        }, beforeunload: {
                            postDispatch: function (e) {
                                void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result)
                            }
                        }
                    }
                }, g.removeEvent = function (e, t, n) {
                    e.removeEventListener && e.removeEventListener(t, n)
                }, (g.Event = function (e, t) {
                    if (!(this instanceof g.Event)) return new g.Event(e, t);
                    e && e.type ? (this.originalEvent = e, this.type = e.type, this.isDefaultPrevented = e.defaultPrevented || void 0 === e.defaultPrevented && !1 === e.returnValue ? ge : ve, this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target, this.currentTarget = e.currentTarget, this.relatedTarget = e.relatedTarget) : this.type = e, t && g.extend(this, t), this.timeStamp = e && e.timeStamp || Date.now(), this[g.expando] = !0
                }).prototype = {
                    constructor: g.Event,
                    isDefaultPrevented: ve,
                    isPropagationStopped: ve,
                    isImmediatePropagationStopped: ve,
                    isSimulated: !1,
                    preventDefault: function () {
                        var e = this.originalEvent;
                        this.isDefaultPrevented = ge, e && !this.isSimulated && e.preventDefault()
                    },
                    stopPropagation: function () {
                        var e = this.originalEvent;
                        this.isPropagationStopped = ge, e && !this.isSimulated && e.stopPropagation()
                    },
                    stopImmediatePropagation: function () {
                        var e = this.originalEvent;
                        this.isImmediatePropagationStopped = ge, e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation()
                    }
                }, g.each({
                    altKey: !0,
                    bubbles: !0,
                    cancelable: !0,
                    changedTouches: !0,
                    ctrlKey: !0,
                    detail: !0,
                    eventPhase: !0,
                    metaKey: !0,
                    pageX: !0,
                    pageY: !0,
                    shiftKey: !0,
                    view: !0,
                    char: !0,
                    code: !0,
                    charCode: !0,
                    key: !0,
                    keyCode: !0,
                    button: !0,
                    buttons: !0,
                    clientX: !0,
                    clientY: !0,
                    offsetX: !0,
                    offsetY: !0,
                    pointerId: !0,
                    pointerType: !0,
                    screenX: !0,
                    screenY: !0,
                    targetTouches: !0,
                    toElement: !0,
                    touches: !0,
                    which: !0
                }, g.event.addProp), g.each({focus: "focusin", blur: "focusout"}, (function (e, t) {
                    g.event.special[e] = {
                        setup: function () {
                            return Ce(this, e, Ge), !1
                        }, trigger: function () {
                            return Ce(this, e), !0
                        }, _default: function () {
                            return !0
                        }, delegateType: t
                    }
                })), g.each({
                    mouseenter: "mouseover",
                    mouseleave: "mouseout",
                    pointerenter: "pointerover",
                    pointerleave: "pointerout"
                }, (function (e, t) {
                    g.event.special[e] = {
                        delegateType: t, bindType: t, handle: function (e) {
                            var n, r = this, i = e.relatedTarget, o = e.handleObj;
                            return i && (i === r || g.contains(r, i)) || (e.type = o.origType, n = o.handler.apply(this, arguments), e.type = t), n
                        }
                    }
                })), g.fn.extend({
                    on: function (e, t, n, r) {
                        return ye(this, e, t, n, r)
                    }, one: function (e, t, n, r) {
                        return ye(this, e, t, n, r, 1)
                    }, off: function (e, t, n) {
                        var i, o;
                        if (e && e.preventDefault && e.handleObj) return i = e.handleObj, g(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                        if ("object" === r(e)) {
                            for (o in e) this.off(o, t, e[o]);
                            return this
                        }
                        return !1 !== t && "function" != typeof t || (n = t, t = void 0), !1 === n && (n = ve), this.each((function () {
                            g.event.remove(this, e, n, t)
                        }))
                    }
                });
                var Be = /<script|<style|<link/i, Ee = /checked\s*(?:[^=]|=\s*.checked.)/i,
                    He = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;

                function xe(e, t) {
                    return E(e, "table") && E(11 !== t.nodeType ? t : t.firstChild, "tr") && g(e).children("tbody")[0] || e
                }

                function Ie(e) {
                    return e.type = (null !== e.getAttribute("type")) + "/" + e.type, e
                }

                function De(e) {
                    return "true/" === (e.type || "").slice(0, 5) ? e.type = e.type.slice(5) : e.removeAttribute("type"), e
                }

                function we(e, t) {
                    var n, r, i, o, a, s;
                    if (1 === t.nodeType) {
                        if ($.hasData(e) && (s = $.get(e).events)) for (i in $.remove(t, "handle events"), s) for (n = 0, r = s[i].length; n < r; n++) g.event.add(t, i, s[i][n]);
                        Y.hasData(e) && (o = Y.access(e), a = g.extend({}, o), Y.set(t, a))
                    }
                }

                function Ne(e, t) {
                    var n = t.nodeName.toLowerCase();
                    "input" === n && fe.test(e.type) ? t.checked = e.checked : "input" !== n && "textarea" !== n || (t.defaultValue = e.defaultValue)
                }

                function Oe(e, t, n, r) {
                    t = a(t);
                    var i, o, s, l, u, c, d = 0, T = e.length, f = T - 1, b = t[0], h = S(b);
                    if (h || T > 1 && "string" == typeof b && !p.checkClone && Ee.test(b)) return e.each((function (i) {
                        var o = e.eq(i);
                        h && (t[0] = b.call(this, i, o.html())), Oe(o, t, n, r)
                    }));
                    if (T && (o = (i = Me(t, e[0].ownerDocument, !1, e, r)).firstChild, 1 === i.childNodes.length && (i = o), o || r)) {
                        for (l = (s = g.map(he(i, "script"), Ie)).length; d < T; d++) u = i, d !== f && (u = g.clone(u, !0, !0), l && g.merge(s, he(u, "script"))), n.call(e[d], u, d);
                        if (l) for (c = s[s.length - 1].ownerDocument, g.map(s, De), d = 0; d < l; d++) u = s[d], Se.test(u.type || "") && !$.access(u, "globalEval") && g.contains(c, u) && (u.src && "module" !== (u.type || "").toLowerCase() ? g._evalUrl && !u.noModule && g._evalUrl(u.src, {nonce: u.nonce || u.getAttribute("nonce")}, c) : P(u.textContent.replace(He, ""), u, c))
                    }
                    return e
                }

                function Le(e, t, n) {
                    for (var r, i = t ? g.filter(t, e) : e, o = 0; null != (r = i[o]); o++) n || 1 !== r.nodeType || g.cleanData(he(r)), r.parentNode && (n && oe(r) && Ae(he(r, "script")), r.parentNode.removeChild(r));
                    return e
                }

                g.extend({
                    htmlPrefilter: function (e) {
                        return e
                    }, clone: function (e, t, n) {
                        var r, i, o, a, s = e.cloneNode(!0), l = oe(e);
                        if (!(p.noCloneChecked || 1 !== e.nodeType && 11 !== e.nodeType || g.isXMLDoc(e))) for (a = he(s), r = 0, i = (o = he(e)).length; r < i; r++) Ne(o[r], a[r]);
                        if (t) if (n) for (o = o || he(e), a = a || he(s), r = 0, i = o.length; r < i; r++) we(o[r], a[r]); else we(e, s);
                        return (a = he(s, "script")).length > 0 && Ae(a, !l && he(e, "script")), s
                    }, cleanData: function (e) {
                        for (var t, n, r, i = g.event.special, o = 0; void 0 !== (n = e[o]); o++) if (q(n)) {
                            if (t = n[$.expando]) {
                                if (t.events) for (r in t.events) i[r] ? g.event.remove(n, r) : g.removeEvent(n, r, t.handle);
                                n[$.expando] = void 0
                            }
                            n[Y.expando] && (n[Y.expando] = void 0)
                        }
                    }
                }), g.fn.extend({
                    detach: function (e) {
                        return Le(this, e, !0)
                    }, remove: function (e) {
                        return Le(this, e)
                    }, text: function (e) {
                        return K(this, (function (e) {
                            return void 0 === e ? g.text(this) : this.empty().each((function () {
                                1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || (this.textContent = e)
                            }))
                        }), null, e, arguments.length)
                    }, append: function () {
                        return Oe(this, arguments, (function (e) {
                            1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType || xe(this, e).appendChild(e)
                        }))
                    }, prepend: function () {
                        return Oe(this, arguments, (function (e) {
                            if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                                var t = xe(this, e);
                                t.insertBefore(e, t.firstChild)
                            }
                        }))
                    }, before: function () {
                        return Oe(this, arguments, (function (e) {
                            this.parentNode && this.parentNode.insertBefore(e, this)
                        }))
                    }, after: function () {
                        return Oe(this, arguments, (function (e) {
                            this.parentNode && this.parentNode.insertBefore(e, this.nextSibling)
                        }))
                    }, empty: function () {
                        for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (g.cleanData(he(e, !1)), e.textContent = "");
                        return this
                    }, clone: function (e, t) {
                        return e = null != e && e, t = null == t ? e : t, this.map((function () {
                            return g.clone(this, e, t)
                        }))
                    }, html: function (e) {
                        return K(this, (function (e) {
                            var t = this[0] || {}, n = 0, r = this.length;
                            if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                            if ("string" == typeof e && !Be.test(e) && !be[(pe.exec(e) || ["", ""])[1].toLowerCase()]) {
                                e = g.htmlPrefilter(e);
                                try {
                                    for (; n < r; n++) 1 === (t = this[n] || {}).nodeType && (g.cleanData(he(t, !1)), t.innerHTML = e);
                                    t = 0
                                } catch (e) {
                                }
                            }
                            t && this.empty().append(e)
                        }), null, e, arguments.length)
                    }, replaceWith: function () {
                        var e = [];
                        return Oe(this, arguments, (function (t) {
                            var n = this.parentNode;
                            g.inArray(this, e) < 0 && (g.cleanData(he(this)), n && n.replaceChild(t, this))
                        }), e)
                    }
                }), g.each({
                    appendTo: "append",
                    prependTo: "prepend",
                    insertBefore: "before",
                    insertAfter: "after",
                    replaceAll: "replaceWith"
                }, (function (e, t) {
                    g.fn[e] = function (e) {
                        for (var n, r = [], i = g(e), o = i.length - 1, a = 0; a <= o; a++) n = a === o ? this : this.clone(!0), g(i[a])[t](n), s.apply(r, n.get());
                        return this.pushStack(r)
                    }
                }));
                var Re = new RegExp("^(" + te + ")(?!px)[a-z%]+$", "i"), Ve = function (t) {
                    var n = t.ownerDocument.defaultView;
                    return n && n.opener || (n = e), n.getComputedStyle(t)
                }, ke = function (e, t, n) {
                    var r, i, o = {};
                    for (i in t) o[i] = e.style[i], e.style[i] = t[i];
                    for (i in r = n.call(e), t) e.style[i] = o[i];
                    return r
                }, Fe = new RegExp(re.join("|"), "i");

                function Xe(e, t, n) {
                    var r, i, o, a, s = e.style;
                    return (n = n || Ve(e)) && ("" !== (a = n.getPropertyValue(t) || n[t]) || oe(e) || (a = g.style(e, t)), !p.pixelBoxStyles() && Re.test(a) && Fe.test(t) && (r = s.width, i = s.minWidth, o = s.maxWidth, s.minWidth = s.maxWidth = s.width = a, a = n.width, s.width = r, s.minWidth = i, s.maxWidth = o)), void 0 !== a ? a + "" : a
                }

                function We(e, t) {
                    return {
                        get: function () {
                            if (!e()) return (this.get = t).apply(this, arguments);
                            delete this.get
                        }
                    }
                }

                !function () {
                    function t() {
                        if (c) {
                            u.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0", c.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%", ie.appendChild(u).appendChild(c);
                            var t = e.getComputedStyle(c);
                            r = "1%" !== t.top, l = 12 === n(t.marginLeft), c.style.right = "60%", a = 36 === n(t.right), i = 36 === n(t.width), c.style.position = "absolute", o = 12 === n(c.offsetWidth / 3), ie.removeChild(u), c = null
                        }
                    }

                    function n(e) {
                        return Math.round(parseFloat(e))
                    }

                    var r, i, o, a, s, l, u = h.createElement("div"), c = h.createElement("div");
                    c.style && (c.style.backgroundClip = "content-box", c.cloneNode(!0).style.backgroundClip = "", p.clearCloneStyle = "content-box" === c.style.backgroundClip, g.extend(p, {
                        boxSizingReliable: function () {
                            return t(), i
                        }, pixelBoxStyles: function () {
                            return t(), a
                        }, pixelPosition: function () {
                            return t(), r
                        }, reliableMarginLeft: function () {
                            return t(), l
                        }, scrollboxSize: function () {
                            return t(), o
                        }, reliableTrDimensions: function () {
                            var t, n, r, i;
                            return null == s && (t = h.createElement("table"), n = h.createElement("tr"), r = h.createElement("div"), t.style.cssText = "position:absolute;left:-11111px;border-collapse:separate", n.style.cssText = "border:1px solid", n.style.height = "1px", r.style.height = "9px", r.style.display = "block", ie.appendChild(t).appendChild(n).appendChild(r), i = e.getComputedStyle(n), s = parseInt(i.height, 10) + parseInt(i.borderTopWidth, 10) + parseInt(i.borderBottomWidth, 10) === n.offsetHeight, ie.removeChild(t)), s
                        }
                    }))
                }();
                var Ke = ["Webkit", "Moz", "ms"], Ue = h.createElement("div").style, je = {};

                function _e(e) {
                    var t = g.cssProps[e] || je[e];
                    return t || (e in Ue ? e : je[e] = function (e) {
                        for (var t = e[0].toUpperCase() + e.slice(1), n = Ke.length; n--;) if ((e = Ke[n] + t) in Ue) return e
                    }(e) || e)
                }

                var Qe = /^(none|table(?!-c[ea]).+)/, qe = /^--/,
                    ze = {position: "absolute", visibility: "hidden", display: "block"},
                    $e = {letterSpacing: "0", fontWeight: "400"};

                function Ye(e, t, n) {
                    var r = ne.exec(t);
                    return r ? Math.max(0, r[2] - (n || 0)) + (r[3] || "px") : t
                }

                function Je(e, t, n, r, i, o) {
                    var a = "width" === t ? 1 : 0, s = 0, l = 0;
                    if (n === (r ? "border" : "content")) return 0;
                    for (; a < 4; a += 2) "margin" === n && (l += g.css(e, n + re[a], !0, i)), r ? ("content" === n && (l -= g.css(e, "padding" + re[a], !0, i)), "margin" !== n && (l -= g.css(e, "border" + re[a] + "Width", !0, i))) : (l += g.css(e, "padding" + re[a], !0, i), "padding" !== n ? l += g.css(e, "border" + re[a] + "Width", !0, i) : s += g.css(e, "border" + re[a] + "Width", !0, i));
                    return !r && o >= 0 && (l += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - o - l - s - .5)) || 0), l
                }

                function Ze(e, t, n) {
                    var r = Ve(e), i = (!p.boxSizingReliable() || n) && "border-box" === g.css(e, "boxSizing", !1, r),
                        o = i, a = Xe(e, t, r), s = "offset" + t[0].toUpperCase() + t.slice(1);
                    if (Re.test(a)) {
                        if (!n) return a;
                        a = "auto"
                    }
                    return (!p.boxSizingReliable() && i || !p.reliableTrDimensions() && E(e, "tr") || "auto" === a || !parseFloat(a) && "inline" === g.css(e, "display", !1, r)) && e.getClientRects().length && (i = "border-box" === g.css(e, "boxSizing", !1, r), (o = s in e) && (a = e[s])), (a = parseFloat(a) || 0) + Je(e, t, n || (i ? "border" : "content"), o, r, a) + "px"
                }

                g.extend({
                    cssHooks: {
                        opacity: {
                            get: function (e, t) {
                                if (t) {
                                    var n = Xe(e, "opacity");
                                    return "" === n ? "1" : n
                                }
                            }
                        }
                    },
                    cssNumber: {
                        animationIterationCount: !0,
                        columnCount: !0,
                        fillOpacity: !0,
                        flexGrow: !0,
                        flexShrink: !0,
                        fontWeight: !0,
                        gridArea: !0,
                        gridColumn: !0,
                        gridColumnEnd: !0,
                        gridColumnStart: !0,
                        gridRow: !0,
                        gridRowEnd: !0,
                        gridRowStart: !0,
                        lineHeight: !0,
                        opacity: !0,
                        order: !0,
                        orphans: !0,
                        widows: !0,
                        zIndex: !0,
                        zoom: !0
                    },
                    cssProps: {},
                    style: function (e, t, n, i) {
                        if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                            var o, a, s, l = Q(t), u = qe.test(t), c = e.style;
                            if (u || (t = _e(l)), s = g.cssHooks[t] || g.cssHooks[l], void 0 === n) return s && "get" in s && void 0 !== (o = s.get(e, !1, i)) ? o : c[t];
                            "string" === (a = r(n)) && (o = ne.exec(n)) && o[1] && (n = function (e, t, n, r) {
                                var i, o, a = 20, s = r ? function () {
                                        return r.cur()
                                    } : function () {
                                        return g.css(e, t, "")
                                    }, l = s(), u = n && n[3] || (g.cssNumber[t] ? "" : "px"),
                                    c = e.nodeType && (g.cssNumber[t] || "px" !== u && +l) && ne.exec(g.css(e, t));
                                if (c && c[3] !== u) {
                                    for (l /= 2, u = u || c[3], c = +l || 1; a--;) g.style(e, t, c + u), (1 - o) * (1 - (o = s() / l || .5)) <= 0 && (a = 0), c /= o;
                                    g.style(e, t, (c *= 2) + u), n = n || []
                                }
                                return n && (c = +c || +l || 0, i = n[1] ? c + (n[1] + 1) * n[2] : +n[2], r && (r.unit = u, r.start = c, r.end = i)), i
                            }(e, t, o), a = "number"), null != n && n == n && ("number" !== a || u || (n += o && o[3] || (g.cssNumber[l] ? "" : "px")), p.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (c[t] = "inherit"), s && "set" in s && void 0 === (n = s.set(e, n, i)) || (u ? c.setProperty(t, n) : c[t] = n))
                        }
                    },
                    css: function (e, t, n, r) {
                        var i, o, a, s = Q(t);
                        return qe.test(t) || (t = _e(s)), (a = g.cssHooks[t] || g.cssHooks[s]) && "get" in a && (i = a.get(e, !0, n)), void 0 === i && (i = Xe(e, t, r)), "normal" === i && t in $e && (i = $e[t]), "" === n || n ? (o = parseFloat(i), !0 === n || isFinite(o) ? o || 0 : i) : i
                    }
                }), g.each(["height", "width"], (function (e, t) {
                    g.cssHooks[t] = {
                        get: function (e, n, r) {
                            if (n) return !Qe.test(g.css(e, "display")) || e.getClientRects().length && e.getBoundingClientRect().width ? Ze(e, t, r) : ke(e, ze, (function () {
                                return Ze(e, t, r)
                            }))
                        }, set: function (e, n, r) {
                            var i, o = Ve(e), a = !p.scrollboxSize() && "absolute" === o.position,
                                s = (a || r) && "border-box" === g.css(e, "boxSizing", !1, o),
                                l = r ? Je(e, t, r, s, o) : 0;
                            return s && a && (l -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(o[t]) - Je(e, t, "border", !1, o) - .5)), l && (i = ne.exec(n)) && "px" !== (i[3] || "px") && (e.style[t] = n, n = g.css(e, t)), Ye(0, n, l)
                        }
                    }
                })), g.cssHooks.marginLeft = We(p.reliableMarginLeft, (function (e, t) {
                    if (t) return (parseFloat(Xe(e, "marginLeft")) || e.getBoundingClientRect().left - ke(e, {marginLeft: 0}, (function () {
                        return e.getBoundingClientRect().left
                    }))) + "px"
                })), g.each({margin: "", padding: "", border: "Width"}, (function (e, t) {
                    g.cssHooks[e + t] = {
                        expand: function (n) {
                            for (var r = 0, i = {}, o = "string" == typeof n ? n.split(" ") : [n]; r < 4; r++) i[e + re[r] + t] = o[r] || o[r - 2] || o[0];
                            return i
                        }
                    }, "margin" !== e && (g.cssHooks[e + t].set = Ye)
                })), g.fn.extend({
                    css: function (e, t) {
                        return K(this, (function (e, t, n) {
                            var r, i, o = {}, a = 0;
                            if (Array.isArray(t)) {
                                for (r = Ve(e), i = t.length; a < i; a++) o[t[a]] = g.css(e, t[a], !1, r);
                                return o
                            }
                            return void 0 !== n ? g.style(e, t, n) : g.css(e, t)
                        }), e, t, arguments.length > 1)
                    }
                }), g.fn.delay = function (t, n) {
                    return t = g.fx && g.fx.speeds[t] || t, n = n || "fx", this.queue(n, (function (n, r) {
                        var i = e.setTimeout(n, t);
                        r.stop = function () {
                            e.clearTimeout(i)
                        }
                    }))
                }, function () {
                    var e = h.createElement("input"),
                        t = h.createElement("select").appendChild(h.createElement("option"));
                    e.type = "checkbox", p.checkOn = "" !== e.value, p.optSelected = t.selected, (e = h.createElement("input")).value = "t", e.type = "radio", p.radioValue = "t" === e.value
                }();
                var et, tt = g.expr.attrHandle;
                g.fn.extend({
                    attr: function (e, t) {
                        return K(this, g.attr, e, t, arguments.length > 1)
                    }, removeAttr: function (e) {
                        return this.each((function () {
                            g.removeAttr(this, e)
                        }))
                    }
                }), g.extend({
                    attr: function (e, t, n) {
                        var r, i, o = e.nodeType;
                        if (3 !== o && 8 !== o && 2 !== o) return void 0 === e.getAttribute ? g.prop(e, t, n) : (1 === o && g.isXMLDoc(e) || (i = g.attrHooks[t.toLowerCase()] || (g.expr.match.bool.test(t) ? et : void 0)), void 0 !== n ? null === n ? void g.removeAttr(e, t) : i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : (e.setAttribute(t, n + ""), n) : i && "get" in i && null !== (r = i.get(e, t)) ? r : null == (r = g.find.attr(e, t)) ? void 0 : r)
                    }, attrHooks: {
                        type: {
                            set: function (e, t) {
                                if (!p.radioValue && "radio" === t && E(e, "input")) {
                                    var n = e.value;
                                    return e.setAttribute("type", t), n && (e.value = n), t
                                }
                            }
                        }
                    }, removeAttr: function (e, t) {
                        var n, r = 0, i = t && t.match(L);
                        if (i && 1 === e.nodeType) for (; n = i[r++];) e.removeAttribute(n)
                    }
                }), et = {
                    set: function (e, t, n) {
                        return !1 === t ? g.removeAttr(e, n) : e.setAttribute(n, n), n
                    }
                }, g.each(g.expr.match.bool.source.match(/\w+/g), (function (e, t) {
                    var n = tt[t] || g.find.attr;
                    tt[t] = function (e, t, r) {
                        var i, o, a = t.toLowerCase();
                        return r || (o = tt[a], tt[a] = i, i = null != n(e, t, r) ? a : null, tt[a] = o), i
                    }
                }));
                var nt = /^(?:input|select|textarea|button)$/i, rt = /^(?:a|area)$/i;

                function it(e) {
                    return (e.match(L) || []).join(" ")
                }

                function ot(e) {
                    return e.getAttribute && e.getAttribute("class") || ""
                }

                function at(e) {
                    return Array.isArray(e) ? e : "string" == typeof e && e.match(L) || []
                }

                g.fn.extend({
                    prop: function (e, t) {
                        return K(this, g.prop, e, t, arguments.length > 1)
                    }, removeProp: function (e) {
                        return this.each((function () {
                            delete this[g.propFix[e] || e]
                        }))
                    }
                }), g.extend({
                    prop: function (e, t, n) {
                        var r, i, o = e.nodeType;
                        if (3 !== o && 8 !== o && 2 !== o) return 1 === o && g.isXMLDoc(e) || (t = g.propFix[t] || t, i = g.propHooks[t]), void 0 !== n ? i && "set" in i && void 0 !== (r = i.set(e, n, t)) ? r : e[t] = n : i && "get" in i && null !== (r = i.get(e, t)) ? r : e[t]
                    }, propHooks: {
                        tabIndex: {
                            get: function (e) {
                                var t = g.find.attr(e, "tabindex");
                                return t ? parseInt(t, 10) : nt.test(e.nodeName) || rt.test(e.nodeName) && e.href ? 0 : -1
                            }
                        }
                    }, propFix: {for: "htmlFor", class: "className"}
                }), p.optSelected || (g.propHooks.selected = {
                    get: function (e) {
                        var t = e.parentNode;
                        return t && t.parentNode && t.parentNode.selectedIndex, null
                    }, set: function (e) {
                        var t = e.parentNode;
                        t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex)
                    }
                }), g.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], (function () {
                    g.propFix[this.toLowerCase()] = this
                })), g.fn.extend({
                    addClass: function (e) {
                        var t, n, r, i, o, a, s, l = 0;
                        if (S(e)) return this.each((function (t) {
                            g(this).addClass(e.call(this, t, ot(this)))
                        }));
                        if ((t = at(e)).length) for (; n = this[l++];) if (i = ot(n), r = 1 === n.nodeType && " " + it(i) + " ") {
                            for (a = 0; o = t[a++];) r.indexOf(" " + o + " ") < 0 && (r += o + " ");
                            i !== (s = it(r)) && n.setAttribute("class", s)
                        }
                        return this
                    }, removeClass: function (e) {
                        var t, n, r, i, o, a, s, l = 0;
                        if (S(e)) return this.each((function (t) {
                            g(this).removeClass(e.call(this, t, ot(this)))
                        }));
                        if (!arguments.length) return this.attr("class", "");
                        if ((t = at(e)).length) for (; n = this[l++];) if (i = ot(n), r = 1 === n.nodeType && " " + it(i) + " ") {
                            for (a = 0; o = t[a++];) for (; r.indexOf(" " + o + " ") > -1;) r = r.replace(" " + o + " ", " ");
                            i !== (s = it(r)) && n.setAttribute("class", s)
                        }
                        return this
                    }, toggleClass: function (e, t) {
                        var n = r(e), i = "string" === n || Array.isArray(e);
                        return "boolean" == typeof t && i ? t ? this.addClass(e) : this.removeClass(e) : S(e) ? this.each((function (n) {
                            g(this).toggleClass(e.call(this, n, ot(this), t), t)
                        })) : this.each((function () {
                            var t, r, o, a;
                            if (i) for (r = 0, o = g(this), a = at(e); t = a[r++];) o.hasClass(t) ? o.removeClass(t) : o.addClass(t); else void 0 !== e && "boolean" !== n || ((t = ot(this)) && $.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : $.get(this, "__className__") || ""))
                        }))
                    }, hasClass: function (e) {
                        var t, n, r = 0;
                        for (t = " " + e + " "; n = this[r++];) if (1 === n.nodeType && (" " + it(ot(n)) + " ").indexOf(t) > -1) return !0;
                        return !1
                    }
                });
                var st = /\r/g;
                g.fn.extend({
                    val: function (e) {
                        var t, n, r, i = this[0];
                        return arguments.length ? (r = S(e), this.each((function (n) {
                            var i;
                            1 === this.nodeType && (null == (i = r ? e.call(this, n, g(this).val()) : e) ? i = "" : "number" == typeof i ? i += "" : Array.isArray(i) && (i = g.map(i, (function (e) {
                                return null == e ? "" : e + ""
                            }))), (t = g.valHooks[this.type] || g.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, i, "value") || (this.value = i))
                        }))) : i ? (t = g.valHooks[i.type] || g.valHooks[i.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(i, "value")) ? n : "string" == typeof (n = i.value) ? n.replace(st, "") : null == n ? "" : n : void 0
                    }
                }), g.extend({
                    valHooks: {
                        option: {
                            get: function (e) {
                                var t = g.find.attr(e, "value");
                                return null != t ? t : it(g.text(e))
                            }
                        }, select: {
                            get: function (e) {
                                var t, n, r, i = e.options, o = e.selectedIndex, a = "select-one" === e.type,
                                    s = a ? null : [], l = a ? o + 1 : i.length;
                                for (r = o < 0 ? l : a ? o : 0; r < l; r++) if (((n = i[r]).selected || r === o) && !n.disabled && (!n.parentNode.disabled || !E(n.parentNode, "optgroup"))) {
                                    if (t = g(n).val(), a) return t;
                                    s.push(t)
                                }
                                return s
                            }, set: function (e, t) {
                                for (var n, r, i = e.options, o = g.makeArray(t), a = i.length; a--;) ((r = i[a]).selected = g.inArray(g.valHooks.option.get(r), o) > -1) && (n = !0);
                                return n || (e.selectedIndex = -1), o
                            }
                        }
                    }
                }), g.each(["radio", "checkbox"], (function () {
                    g.valHooks[this] = {
                        set: function (e, t) {
                            if (Array.isArray(t)) return e.checked = g.inArray(g(e).val(), t) > -1
                        }
                    }, p.checkOn || (g.valHooks[this].get = function (e) {
                        return null === e.getAttribute("value") ? "on" : e.value
                    })
                })), p.focusin = "onfocusin" in e;
                var lt = /^(?:focusinfocus|focusoutblur)$/, ut = function (e) {
                    e.stopPropagation()
                };
                g.extend(g.event, {
                    trigger: function (t, n, i, o) {
                        var a, s, l, u, c, T, f, p, A = [i || h], P = d.call(t, "type") ? t.type : t,
                            M = d.call(t, "namespace") ? t.namespace.split(".") : [];
                        if (s = p = l = i = i || h, 3 !== i.nodeType && 8 !== i.nodeType && !lt.test(P + g.event.triggered) && (P.indexOf(".") > -1 && (M = P.split("."), P = M.shift(), M.sort()), c = P.indexOf(":") < 0 && "on" + P, (t = t[g.expando] ? t : new g.Event(P, "object" === r(t) && t)).isTrigger = o ? 2 : 3, t.namespace = M.join("."), t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + M.join("\\.(?:.*\\.|)") + "(\\.|$)") : null, t.result = void 0, t.target || (t.target = i), n = null == n ? [t] : g.makeArray(n, [t]), f = g.event.special[P] || {}, o || !f.trigger || !1 !== f.trigger.apply(i, n))) {
                            if (!o && !f.noBubble && !b(i)) {
                                for (u = f.delegateType || P, lt.test(u + P) || (s = s.parentNode); s; s = s.parentNode) A.push(s), l = s;
                                l === (i.ownerDocument || h) && A.push(l.defaultView || l.parentWindow || e)
                            }
                            for (a = 0; (s = A[a++]) && !t.isPropagationStopped();) p = s, t.type = a > 1 ? u : f.bindType || P, (T = ($.get(s, "events") || Object.create(null))[t.type] && $.get(s, "handle")) && T.apply(s, n), (T = c && s[c]) && T.apply && q(s) && (t.result = T.apply(s, n), !1 === t.result && t.preventDefault());
                            return t.type = P, o || t.isDefaultPrevented() || f._default && !1 !== f._default.apply(A.pop(), n) || !q(i) || c && S(i[P]) && !b(i) && ((l = i[c]) && (i[c] = null), g.event.triggered = P, t.isPropagationStopped() && p.addEventListener(P, ut), i[P](), t.isPropagationStopped() && p.removeEventListener(P, ut), g.event.triggered = void 0, l && (i[c] = l)), t.result
                        }
                    }, simulate: function (e, t, n) {
                        var r = g.extend(new g.Event, n, {type: e, isSimulated: !0});
                        g.event.trigger(r, null, t)
                    }
                }), g.fn.extend({
                    trigger: function (e, t) {
                        return this.each((function () {
                            g.event.trigger(e, t, this)
                        }))
                    }, triggerHandler: function (e, t) {
                        var n = this[0];
                        if (n) return g.event.trigger(e, t, n, !0)
                    }
                }), p.focusin || g.each({focus: "focusin", blur: "focusout"}, (function (e, t) {
                    var n = function (e) {
                        g.event.simulate(t, e.target, g.event.fix(e))
                    };
                    g.event.special[t] = {
                        setup: function () {
                            var r = this.ownerDocument || this.document || this, i = $.access(r, t);
                            i || r.addEventListener(e, n, !0), $.access(r, t, (i || 0) + 1)
                        }, teardown: function () {
                            var r = this.ownerDocument || this.document || this, i = $.access(r, t) - 1;
                            i ? $.access(r, t, i) : (r.removeEventListener(e, n, !0), $.remove(r, t))
                        }
                    }
                })), g.parseXML = function (t) {
                    var n, r;
                    if (!t || "string" != typeof t) return null;
                    try {
                        n = (new e.DOMParser).parseFromString(t, "text/xml")
                    } catch (e) {
                    }
                    return r = n && n.getElementsByTagName("parsererror")[0], n && !r || g.error("Invalid XML: " + (r ? g.map(r.childNodes, (function (e) {
                        return e.textContent
                    })).join("\n") : t)), n
                };
                var ct, dt = /\[\]$/, Tt = /\r?\n/g, ft = /^(?:submit|button|image|reset|file)$/i,
                    pt = /^(?:input|select|textarea|keygen)/i;

                function St(e, t, n, i) {
                    var o;
                    if (Array.isArray(t)) g.each(t, (function (t, o) {
                        n || dt.test(e) ? i(e, o) : St(e + "[" + ("object" === r(o) && null != o ? t : "") + "]", o, n, i)
                    })); else if (n || "object" !== M(t)) i(e, t); else for (o in t) St(e + "[" + o + "]", t[o], n, i)
                }

                g.param = function (e, t) {
                    var n, r = [], i = function (e, t) {
                        var n = S(t) ? t() : t;
                        r[r.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n)
                    };
                    if (null == e) return "";
                    if (Array.isArray(e) || e.jquery && !g.isPlainObject(e)) g.each(e, (function () {
                        i(this.name, this.value)
                    })); else for (n in e) St(n, e[n], t, i);
                    return r.join("&")
                }, g.fn.extend({
                    serialize: function () {
                        return g.param(this.serializeArray())
                    }, serializeArray: function () {
                        return this.map((function () {
                            var e = g.prop(this, "elements");
                            return e ? g.makeArray(e) : this
                        })).filter((function () {
                            var e = this.type;
                            return this.name && !g(this).is(":disabled") && pt.test(this.nodeName) && !ft.test(e) && (this.checked || !fe.test(e))
                        })).map((function (e, t) {
                            var n = g(this).val();
                            return null == n ? null : Array.isArray(n) ? g.map(n, (function (e) {
                                return {name: t.name, value: e.replace(Tt, "\r\n")}
                            })) : {name: t.name, value: n.replace(Tt, "\r\n")}
                        })).get()
                    }
                }), g.fn.extend({
                    wrapAll: function (e) {
                        var t;
                        return this[0] && (S(e) && (e = e.call(this[0])), t = g(e, this[0].ownerDocument).eq(0).clone(!0), this[0].parentNode && t.insertBefore(this[0]), t.map((function () {
                            for (var e = this; e.firstElementChild;) e = e.firstElementChild;
                            return e
                        })).append(this)), this
                    }, wrapInner: function (e) {
                        return S(e) ? this.each((function (t) {
                            g(this).wrapInner(e.call(this, t))
                        })) : this.each((function () {
                            var t = g(this), n = t.contents();
                            n.length ? n.wrapAll(e) : t.append(e)
                        }))
                    }, wrap: function (e) {
                        var t = S(e);
                        return this.each((function (n) {
                            g(this).wrapAll(t ? e.call(this, n) : e)
                        }))
                    }, unwrap: function (e) {
                        return this.parent(e).not("body").each((function () {
                            g(this).replaceWith(this.childNodes)
                        })), this
                    }
                }), g.expr.pseudos.hidden = function (e) {
                    return !g.expr.pseudos.visible(e)
                }, g.expr.pseudos.visible = function (e) {
                    return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length)
                }, p.createHTMLDocument = ((ct = h.implementation.createHTMLDocument("").body).innerHTML = "<form></form><form></form>", 2 === ct.childNodes.length), g.parseHTML = function (e, t, n) {
                    return "string" != typeof e ? [] : ("boolean" == typeof t && (n = t, t = !1), t || (p.createHTMLDocument ? ((r = (t = h.implementation.createHTMLDocument("")).createElement("base")).href = h.location.href, t.head.appendChild(r)) : t = h), o = !n && [], (i = H.exec(e)) ? [t.createElement(i[1])] : (i = Me([e], t, o), o && o.length && g(o).remove(), g.merge([], i.childNodes)));
                    var r, i, o
                }, g.offset = {
                    setOffset: function (e, t, n) {
                        var r, i, o, a, s, l, u = g.css(e, "position"), c = g(e), d = {};
                        "static" === u && (e.style.position = "relative"), s = c.offset(), o = g.css(e, "top"), l = g.css(e, "left"), ("absolute" === u || "fixed" === u) && (o + l).indexOf("auto") > -1 ? (a = (r = c.position()).top, i = r.left) : (a = parseFloat(o) || 0, i = parseFloat(l) || 0), S(t) && (t = t.call(e, n, g.extend({}, s))), null != t.top && (d.top = t.top - s.top + a), null != t.left && (d.left = t.left - s.left + i), "using" in t ? t.using.call(e, d) : c.css(d)
                    }
                }, g.fn.extend({
                    offset: function (e) {
                        if (arguments.length) return void 0 === e ? this : this.each((function (t) {
                            g.offset.setOffset(this, e, t)
                        }));
                        var t, n, r = this[0];
                        return r ? r.getClientRects().length ? (t = r.getBoundingClientRect(), n = r.ownerDocument.defaultView, {
                            top: t.top + n.pageYOffset,
                            left: t.left + n.pageXOffset
                        }) : {top: 0, left: 0} : void 0
                    }, position: function () {
                        if (this[0]) {
                            var e, t, n, r = this[0], i = {top: 0, left: 0};
                            if ("fixed" === g.css(r, "position")) t = r.getBoundingClientRect(); else {
                                for (t = this.offset(), n = r.ownerDocument, e = r.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === g.css(e, "position");) e = e.parentNode;
                                e && e !== r && 1 === e.nodeType && ((i = g(e).offset()).top += g.css(e, "borderTopWidth", !0), i.left += g.css(e, "borderLeftWidth", !0))
                            }
                            return {
                                top: t.top - i.top - g.css(r, "marginTop", !0),
                                left: t.left - i.left - g.css(r, "marginLeft", !0)
                            }
                        }
                    }, offsetParent: function () {
                        return this.map((function () {
                            for (var e = this.offsetParent; e && "static" === g.css(e, "position");) e = e.offsetParent;
                            return e || ie
                        }))
                    }
                }), g.each({scrollLeft: "pageXOffset", scrollTop: "pageYOffset"}, (function (e, t) {
                    var n = "pageYOffset" === t;
                    g.fn[e] = function (r) {
                        return K(this, (function (e, r, i) {
                            var o;
                            if (b(e) ? o = e : 9 === e.nodeType && (o = e.defaultView), void 0 === i) return o ? o[t] : e[r];
                            o ? o.scrollTo(n ? o.pageXOffset : i, n ? i : o.pageYOffset) : e[r] = i
                        }), e, r, arguments.length)
                    }
                })), g.each(["top", "left"], (function (e, t) {
                    g.cssHooks[t] = We(p.pixelPosition, (function (e, n) {
                        if (n) return n = Xe(e, t), Re.test(n) ? g(e).position()[t] + "px" : n
                    }))
                })), g.each({Height: "height", Width: "width"}, (function (e, t) {
                    g.each({padding: "inner" + e, content: t, "": "outer" + e}, (function (n, r) {
                        g.fn[r] = function (i, o) {
                            var a = arguments.length && (n || "boolean" != typeof i),
                                s = n || (!0 === i || !0 === o ? "margin" : "border");
                            return K(this, (function (t, n, i) {
                                var o;
                                return b(t) ? 0 === r.indexOf("outer") ? t["inner" + e] : t.document.documentElement["client" + e] : 9 === t.nodeType ? (o = t.documentElement, Math.max(t.body["scroll" + e], o["scroll" + e], t.body["offset" + e], o["offset" + e], o["client" + e])) : void 0 === i ? g.css(t, n, s) : g.style(t, n, i, s)
                            }), t, a ? i : void 0, a)
                        }
                    }))
                })), g.fn.extend({
                    bind: function (e, t, n) {
                        return this.on(e, null, t, n)
                    }, unbind: function (e, t) {
                        return this.off(e, null, t)
                    }, delegate: function (e, t, n, r) {
                        return this.on(t, e, n, r)
                    }, undelegate: function (e, t, n) {
                        return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n)
                    }, hover: function (e, t) {
                        return this.mouseenter(e).mouseleave(t || e)
                    }
                }), g.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), (function (e, t) {
                    g.fn[t] = function (e, n) {
                        return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t)
                    }
                }));
                var bt = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                g.proxy = function (e, t) {
                    var n, r, i;
                    if ("string" == typeof t && (n = e[t], t = e, e = n), S(e)) return r = o.call(arguments, 2), (i = function () {
                        return e.apply(t || this, r.concat(o.call(arguments)))
                    }).guid = e.guid = e.guid || g.guid++, i
                }, g.holdReady = function (e) {
                    e ? g.readyWait++ : g.ready(!0)
                }, g.isArray = Array.isArray, g.parseJSON = JSON.parse, g.nodeName = E, g.isFunction = S, g.isWindow = b, g.camelCase = Q, g.type = M, g.now = Date.now, g.isNumeric = function (e) {
                    var t = g.type(e);
                    return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e))
                }, g.trim = function (e) {
                    return null == e ? "" : (e + "").replace(bt, "")
                }, "function" == typeof define && define.amd && define("jquery", [], (function () {
                    return g
                }));
                var ht = e.jQuery, At = e.$;
                return g.noConflict = function (t) {
                    return e.$ === g && (e.$ = At), t && e.jQuery === g && (e.jQuery = ht), g
                }, void 0 === t && (e.jQuery = e.$ = g), g
            }))
        }, 1780: function (e) {
            !function (e, t) {
                e((function () {
                    "use strict";
                    var e, n = {
                        mobileDetectRules: {
                            phones: {
                                iPhone: "\\biPhone\\b|\\biPod\\b",
                                BlackBerry: "BlackBerry|\\bBB10\\b|rim[0-9]+|\\b(BBA100|BBB100|BBD100|BBE100|BBF100|STH100)\\b-[0-9]+",
                                Pixel: "; \\bPixel\\b",
                                HTC: "HTC|HTC.*(Sensation|Evo|Vision|Explorer|6800|8100|8900|A7272|S510e|C110e|Legend|Desire|T8282)|APX515CKT|Qtek9090|APA9292KT|HD_mini|Sensation.*Z710e|PG86100|Z715e|Desire.*(A8181|HD)|ADR6200|ADR6400L|ADR6425|001HT|Inspire 4G|Android.*\\bEVO\\b|T-Mobile G1|Z520m|Android [0-9.]+; Pixel",
                                Nexus: "Nexus One|Nexus S|Galaxy.*Nexus|Android.*Nexus.*Mobile|Nexus 4|Nexus 5|Nexus 5X|Nexus 6",
                                Dell: "Dell[;]? (Streak|Aero|Venue|Venue Pro|Flash|Smoke|Mini 3iX)|XCD28|XCD35|\\b001DL\\b|\\b101DL\\b|\\bGS01\\b",
                                Motorola: "Motorola|DROIDX|DROID BIONIC|\\bDroid\\b.*Build|Android.*Xoom|HRI39|MOT-|A1260|A1680|A555|A853|A855|A953|A955|A956|Motorola.*ELECTRIFY|Motorola.*i1|i867|i940|MB200|MB300|MB501|MB502|MB508|MB511|MB520|MB525|MB526|MB611|MB612|MB632|MB810|MB855|MB860|MB861|MB865|MB870|ME501|ME502|ME511|ME525|ME600|ME632|ME722|ME811|ME860|ME863|ME865|MT620|MT710|MT716|MT720|MT810|MT870|MT917|Motorola.*TITANIUM|WX435|WX445|XT300|XT301|XT311|XT316|XT317|XT319|XT320|XT390|XT502|XT530|XT531|XT532|XT535|XT603|XT610|XT611|XT615|XT681|XT701|XT702|XT711|XT720|XT800|XT806|XT860|XT862|XT875|XT882|XT883|XT894|XT901|XT907|XT909|XT910|XT912|XT928|XT926|XT915|XT919|XT925|XT1021|\\bMoto E\\b|XT1068|XT1092|XT1052",
                                Samsung: "\\bSamsung\\b|SM-G950F|SM-G955F|SM-G9250|GT-19300|SGH-I337|BGT-S5230|GT-B2100|GT-B2700|GT-B2710|GT-B3210|GT-B3310|GT-B3410|GT-B3730|GT-B3740|GT-B5510|GT-B5512|GT-B5722|GT-B6520|GT-B7300|GT-B7320|GT-B7330|GT-B7350|GT-B7510|GT-B7722|GT-B7800|GT-C3010|GT-C3011|GT-C3060|GT-C3200|GT-C3212|GT-C3212I|GT-C3262|GT-C3222|GT-C3300|GT-C3300K|GT-C3303|GT-C3303K|GT-C3310|GT-C3322|GT-C3330|GT-C3350|GT-C3500|GT-C3510|GT-C3530|GT-C3630|GT-C3780|GT-C5010|GT-C5212|GT-C6620|GT-C6625|GT-C6712|GT-E1050|GT-E1070|GT-E1075|GT-E1080|GT-E1081|GT-E1085|GT-E1087|GT-E1100|GT-E1107|GT-E1110|GT-E1120|GT-E1125|GT-E1130|GT-E1160|GT-E1170|GT-E1175|GT-E1180|GT-E1182|GT-E1200|GT-E1210|GT-E1225|GT-E1230|GT-E1390|GT-E2100|GT-E2120|GT-E2121|GT-E2152|GT-E2220|GT-E2222|GT-E2230|GT-E2232|GT-E2250|GT-E2370|GT-E2550|GT-E2652|GT-E3210|GT-E3213|GT-I5500|GT-I5503|GT-I5700|GT-I5800|GT-I5801|GT-I6410|GT-I6420|GT-I7110|GT-I7410|GT-I7500|GT-I8000|GT-I8150|GT-I8160|GT-I8190|GT-I8320|GT-I8330|GT-I8350|GT-I8530|GT-I8700|GT-I8703|GT-I8910|GT-I9000|GT-I9001|GT-I9003|GT-I9010|GT-I9020|GT-I9023|GT-I9070|GT-I9082|GT-I9100|GT-I9103|GT-I9220|GT-I9250|GT-I9300|GT-I9305|GT-I9500|GT-I9505|GT-M3510|GT-M5650|GT-M7500|GT-M7600|GT-M7603|GT-M8800|GT-M8910|GT-N7000|GT-S3110|GT-S3310|GT-S3350|GT-S3353|GT-S3370|GT-S3650|GT-S3653|GT-S3770|GT-S3850|GT-S5210|GT-S5220|GT-S5229|GT-S5230|GT-S5233|GT-S5250|GT-S5253|GT-S5260|GT-S5263|GT-S5270|GT-S5300|GT-S5330|GT-S5350|GT-S5360|GT-S5363|GT-S5369|GT-S5380|GT-S5380D|GT-S5560|GT-S5570|GT-S5600|GT-S5603|GT-S5610|GT-S5620|GT-S5660|GT-S5670|GT-S5690|GT-S5750|GT-S5780|GT-S5830|GT-S5839|GT-S6102|GT-S6500|GT-S7070|GT-S7200|GT-S7220|GT-S7230|GT-S7233|GT-S7250|GT-S7500|GT-S7530|GT-S7550|GT-S7562|GT-S7710|GT-S8000|GT-S8003|GT-S8500|GT-S8530|GT-S8600|SCH-A310|SCH-A530|SCH-A570|SCH-A610|SCH-A630|SCH-A650|SCH-A790|SCH-A795|SCH-A850|SCH-A870|SCH-A890|SCH-A930|SCH-A950|SCH-A970|SCH-A990|SCH-I100|SCH-I110|SCH-I400|SCH-I405|SCH-I500|SCH-I510|SCH-I515|SCH-I600|SCH-I730|SCH-I760|SCH-I770|SCH-I830|SCH-I910|SCH-I920|SCH-I959|SCH-LC11|SCH-N150|SCH-N300|SCH-R100|SCH-R300|SCH-R351|SCH-R400|SCH-R410|SCH-T300|SCH-U310|SCH-U320|SCH-U350|SCH-U360|SCH-U365|SCH-U370|SCH-U380|SCH-U410|SCH-U430|SCH-U450|SCH-U460|SCH-U470|SCH-U490|SCH-U540|SCH-U550|SCH-U620|SCH-U640|SCH-U650|SCH-U660|SCH-U700|SCH-U740|SCH-U750|SCH-U810|SCH-U820|SCH-U900|SCH-U940|SCH-U960|SCS-26UC|SGH-A107|SGH-A117|SGH-A127|SGH-A137|SGH-A157|SGH-A167|SGH-A177|SGH-A187|SGH-A197|SGH-A227|SGH-A237|SGH-A257|SGH-A437|SGH-A517|SGH-A597|SGH-A637|SGH-A657|SGH-A667|SGH-A687|SGH-A697|SGH-A707|SGH-A717|SGH-A727|SGH-A737|SGH-A747|SGH-A767|SGH-A777|SGH-A797|SGH-A817|SGH-A827|SGH-A837|SGH-A847|SGH-A867|SGH-A877|SGH-A887|SGH-A897|SGH-A927|SGH-B100|SGH-B130|SGH-B200|SGH-B220|SGH-C100|SGH-C110|SGH-C120|SGH-C130|SGH-C140|SGH-C160|SGH-C170|SGH-C180|SGH-C200|SGH-C207|SGH-C210|SGH-C225|SGH-C230|SGH-C417|SGH-C450|SGH-D307|SGH-D347|SGH-D357|SGH-D407|SGH-D415|SGH-D780|SGH-D807|SGH-D980|SGH-E105|SGH-E200|SGH-E315|SGH-E316|SGH-E317|SGH-E335|SGH-E590|SGH-E635|SGH-E715|SGH-E890|SGH-F300|SGH-F480|SGH-I200|SGH-I300|SGH-I320|SGH-I550|SGH-I577|SGH-I600|SGH-I607|SGH-I617|SGH-I627|SGH-I637|SGH-I677|SGH-I700|SGH-I717|SGH-I727|SGH-i747M|SGH-I777|SGH-I780|SGH-I827|SGH-I847|SGH-I857|SGH-I896|SGH-I897|SGH-I900|SGH-I907|SGH-I917|SGH-I927|SGH-I937|SGH-I997|SGH-J150|SGH-J200|SGH-L170|SGH-L700|SGH-M110|SGH-M150|SGH-M200|SGH-N105|SGH-N500|SGH-N600|SGH-N620|SGH-N625|SGH-N700|SGH-N710|SGH-P107|SGH-P207|SGH-P300|SGH-P310|SGH-P520|SGH-P735|SGH-P777|SGH-Q105|SGH-R210|SGH-R220|SGH-R225|SGH-S105|SGH-S307|SGH-T109|SGH-T119|SGH-T139|SGH-T209|SGH-T219|SGH-T229|SGH-T239|SGH-T249|SGH-T259|SGH-T309|SGH-T319|SGH-T329|SGH-T339|SGH-T349|SGH-T359|SGH-T369|SGH-T379|SGH-T409|SGH-T429|SGH-T439|SGH-T459|SGH-T469|SGH-T479|SGH-T499|SGH-T509|SGH-T519|SGH-T539|SGH-T559|SGH-T589|SGH-T609|SGH-T619|SGH-T629|SGH-T639|SGH-T659|SGH-T669|SGH-T679|SGH-T709|SGH-T719|SGH-T729|SGH-T739|SGH-T746|SGH-T749|SGH-T759|SGH-T769|SGH-T809|SGH-T819|SGH-T839|SGH-T919|SGH-T929|SGH-T939|SGH-T959|SGH-T989|SGH-U100|SGH-U200|SGH-U800|SGH-V205|SGH-V206|SGH-X100|SGH-X105|SGH-X120|SGH-X140|SGH-X426|SGH-X427|SGH-X475|SGH-X495|SGH-X497|SGH-X507|SGH-X600|SGH-X610|SGH-X620|SGH-X630|SGH-X700|SGH-X820|SGH-X890|SGH-Z130|SGH-Z150|SGH-Z170|SGH-ZX10|SGH-ZX20|SHW-M110|SPH-A120|SPH-A400|SPH-A420|SPH-A460|SPH-A500|SPH-A560|SPH-A600|SPH-A620|SPH-A660|SPH-A700|SPH-A740|SPH-A760|SPH-A790|SPH-A800|SPH-A820|SPH-A840|SPH-A880|SPH-A900|SPH-A940|SPH-A960|SPH-D600|SPH-D700|SPH-D710|SPH-D720|SPH-I300|SPH-I325|SPH-I330|SPH-I350|SPH-I500|SPH-I600|SPH-I700|SPH-L700|SPH-M100|SPH-M220|SPH-M240|SPH-M300|SPH-M305|SPH-M320|SPH-M330|SPH-M350|SPH-M360|SPH-M370|SPH-M380|SPH-M510|SPH-M540|SPH-M550|SPH-M560|SPH-M570|SPH-M580|SPH-M610|SPH-M620|SPH-M630|SPH-M800|SPH-M810|SPH-M850|SPH-M900|SPH-M910|SPH-M920|SPH-M930|SPH-N100|SPH-N200|SPH-N240|SPH-N300|SPH-N400|SPH-Z400|SWC-E100|SCH-i909|GT-N7100|GT-N7105|SCH-I535|SM-N900A|SGH-I317|SGH-T999L|GT-S5360B|GT-I8262|GT-S6802|GT-S6312|GT-S6310|GT-S5312|GT-S5310|GT-I9105|GT-I8510|GT-S6790N|SM-G7105|SM-N9005|GT-S5301|GT-I9295|GT-I9195|SM-C101|GT-S7392|GT-S7560|GT-B7610|GT-I5510|GT-S7582|GT-S7530E|GT-I8750|SM-G9006V|SM-G9008V|SM-G9009D|SM-G900A|SM-G900D|SM-G900F|SM-G900H|SM-G900I|SM-G900J|SM-G900K|SM-G900L|SM-G900M|SM-G900P|SM-G900R4|SM-G900S|SM-G900T|SM-G900V|SM-G900W8|SHV-E160K|SCH-P709|SCH-P729|SM-T2558|GT-I9205|SM-G9350|SM-J120F|SM-G920F|SM-G920V|SM-G930F|SM-N910C|SM-A310F|GT-I9190|SM-J500FN|SM-G903F|SM-J330F|SM-G610F|SM-G981B|SM-G892A|SM-A530F",
                                LG: "\\bLG\\b;|LG[- ]?(C800|C900|E400|E610|E900|E-900|F160|F180K|F180L|F180S|730|855|L160|LS740|LS840|LS970|LU6200|MS690|MS695|MS770|MS840|MS870|MS910|P500|P700|P705|VM696|AS680|AS695|AX840|C729|E970|GS505|272|C395|E739BK|E960|L55C|L75C|LS696|LS860|P769BK|P350|P500|P509|P870|UN272|US730|VS840|VS950|LN272|LN510|LS670|LS855|LW690|MN270|MN510|P509|P769|P930|UN200|UN270|UN510|UN610|US670|US740|US760|UX265|UX840|VN271|VN530|VS660|VS700|VS740|VS750|VS910|VS920|VS930|VX9200|VX11000|AX840A|LW770|P506|P925|P999|E612|D955|D802|MS323|M257)|LM-G710",
                                Sony: "SonyST|SonyLT|SonyEricsson|SonyEricssonLT15iv|LT18i|E10i|LT28h|LT26w|SonyEricssonMT27i|C5303|C6902|C6903|C6906|C6943|D2533|SOV34|601SO|F8332",
                                Asus: "Asus.*Galaxy|PadFone.*Mobile",
                                Xiaomi: "^(?!.*\\bx11\\b).*xiaomi.*$|POCOPHONE F1|MI 8|Redmi Note 9S|Redmi Note 5A Prime|N2G47H|M2001J2G|M2001J2I|M1805E10A|M2004J11G|M1902F1G|M2002J9G|M2004J19G|M2003J6A1G",
                                NokiaLumia: "Lumia [0-9]{3,4}",
                                Micromax: "Micromax.*\\b(A210|A92|A88|A72|A111|A110Q|A115|A116|A110|A90S|A26|A51|A35|A54|A25|A27|A89|A68|A65|A57|A90)\\b",
                                Palm: "PalmSource|Palm",
                                Vertu: "Vertu|Vertu.*Ltd|Vertu.*Ascent|Vertu.*Ayxta|Vertu.*Constellation(F|Quest)?|Vertu.*Monika|Vertu.*Signature",
                                Pantech: "PANTECH|IM-A850S|IM-A840S|IM-A830L|IM-A830K|IM-A830S|IM-A820L|IM-A810K|IM-A810S|IM-A800S|IM-T100K|IM-A725L|IM-A780L|IM-A775C|IM-A770K|IM-A760S|IM-A750K|IM-A740S|IM-A730S|IM-A720L|IM-A710K|IM-A690L|IM-A690S|IM-A650S|IM-A630K|IM-A600S|VEGA PTL21|PT003|P8010|ADR910L|P6030|P6020|P9070|P4100|P9060|P5000|CDM8992|TXT8045|ADR8995|IS11PT|P2030|P6010|P8000|PT002|IS06|CDM8999|P9050|PT001|TXT8040|P2020|P9020|P2000|P7040|P7000|C790",
                                Fly: "IQ230|IQ444|IQ450|IQ440|IQ442|IQ441|IQ245|IQ256|IQ236|IQ255|IQ235|IQ245|IQ275|IQ240|IQ285|IQ280|IQ270|IQ260|IQ250",
                                Wiko: "KITE 4G|HIGHWAY|GETAWAY|STAIRWAY|DARKSIDE|DARKFULL|DARKNIGHT|DARKMOON|SLIDE|WAX 4G|RAINBOW|BLOOM|SUNSET|GOA(?!nna)|LENNY|BARRY|IGGY|OZZY|CINK FIVE|CINK PEAX|CINK PEAX 2|CINK SLIM|CINK SLIM 2|CINK +|CINK KING|CINK PEAX|CINK SLIM|SUBLIM",
                                iMobile: "i-mobile (IQ|i-STYLE|idea|ZAA|Hitz)",
                                SimValley: "\\b(SP-80|XT-930|SX-340|XT-930|SX-310|SP-360|SP60|SPT-800|SP-120|SPT-800|SP-140|SPX-5|SPX-8|SP-100|SPX-8|SPX-12)\\b",
                                Wolfgang: "AT-B24D|AT-AS50HD|AT-AS40W|AT-AS55HD|AT-AS45q2|AT-B26D|AT-AS50Q",
                                Alcatel: "Alcatel",
                                Nintendo: "Nintendo (3DS|Switch)",
                                Amoi: "Amoi",
                                INQ: "INQ",
                                OnePlus: "ONEPLUS",
                                GenericPhone: "Tapatalk|PDA;|SAGEM|\\bmmp\\b|pocket|\\bpsp\\b|symbian|Smartphone|smartfon|treo|up.browser|up.link|vodafone|\\bwap\\b|nokia|Series40|Series60|S60|SonyEricsson|N900|MAUI.*WAP.*Browser"
                            },
                            tablets: {
                                iPad: "iPad|iPad.*Mobile",
                                NexusTablet: "Android.*Nexus[\\s]+(7|9|10)",
                                GoogleTablet: "Android.*Pixel C",
                                SamsungTablet: "SAMSUNG.*Tablet|Galaxy.*Tab|SC-01C|GT-P1000|GT-P1003|GT-P1010|GT-P3105|GT-P6210|GT-P6800|GT-P6810|GT-P7100|GT-P7300|GT-P7310|GT-P7500|GT-P7510|SCH-I800|SCH-I815|SCH-I905|SGH-I957|SGH-I987|SGH-T849|SGH-T859|SGH-T869|SPH-P100|GT-P3100|GT-P3108|GT-P3110|GT-P5100|GT-P5110|GT-P6200|GT-P7320|GT-P7511|GT-N8000|GT-P8510|SGH-I497|SPH-P500|SGH-T779|SCH-I705|SCH-I915|GT-N8013|GT-P3113|GT-P5113|GT-P8110|GT-N8010|GT-N8005|GT-N8020|GT-P1013|GT-P6201|GT-P7501|GT-N5100|GT-N5105|GT-N5110|SHV-E140K|SHV-E140L|SHV-E140S|SHV-E150S|SHV-E230K|SHV-E230L|SHV-E230S|SHW-M180K|SHW-M180L|SHW-M180S|SHW-M180W|SHW-M300W|SHW-M305W|SHW-M380K|SHW-M380S|SHW-M380W|SHW-M430W|SHW-M480K|SHW-M480S|SHW-M480W|SHW-M485W|SHW-M486W|SHW-M500W|GT-I9228|SCH-P739|SCH-I925|GT-I9200|GT-P5200|GT-P5210|GT-P5210X|SM-T311|SM-T310|SM-T310X|SM-T210|SM-T210R|SM-T211|SM-P600|SM-P601|SM-P605|SM-P900|SM-P901|SM-T217|SM-T217A|SM-T217S|SM-P6000|SM-T3100|SGH-I467|XE500|SM-T110|GT-P5220|GT-I9200X|GT-N5110X|GT-N5120|SM-P905|SM-T111|SM-T2105|SM-T315|SM-T320|SM-T320X|SM-T321|SM-T520|SM-T525|SM-T530NU|SM-T230NU|SM-T330NU|SM-T900|XE500T1C|SM-P605V|SM-P905V|SM-T337V|SM-T537V|SM-T707V|SM-T807V|SM-P600X|SM-P900X|SM-T210X|SM-T230|SM-T230X|SM-T325|GT-P7503|SM-T531|SM-T330|SM-T530|SM-T705|SM-T705C|SM-T535|SM-T331|SM-T800|SM-T700|SM-T537|SM-T807|SM-P907A|SM-T337A|SM-T537A|SM-T707A|SM-T807A|SM-T237|SM-T807P|SM-P607T|SM-T217T|SM-T337T|SM-T807T|SM-T116NQ|SM-T116BU|SM-P550|SM-T350|SM-T550|SM-T9000|SM-P9000|SM-T705Y|SM-T805|GT-P3113|SM-T710|SM-T810|SM-T815|SM-T360|SM-T533|SM-T113|SM-T335|SM-T715|SM-T560|SM-T670|SM-T677|SM-T377|SM-T567|SM-T357T|SM-T555|SM-T561|SM-T713|SM-T719|SM-T813|SM-T819|SM-T580|SM-T355Y?|SM-T280|SM-T817A|SM-T820|SM-W700|SM-P580|SM-T587|SM-P350|SM-P555M|SM-P355M|SM-T113NU|SM-T815Y|SM-T585|SM-T285|SM-T825|SM-W708|SM-T835|SM-T830|SM-T837V|SM-T720|SM-T510|SM-T387V|SM-P610|SM-T290|SM-T515|SM-T590|SM-T595|SM-T725|SM-T817P|SM-P585N0|SM-T395|SM-T295|SM-T865|SM-P610N|SM-P615|SM-T970|SM-T380|SM-T5950|SM-T905|SM-T231|SM-T500|SM-T860",
                                Kindle: "Kindle|Silk.*Accelerated|Android.*\\b(KFOT|KFTT|KFJWI|KFJWA|KFOTE|KFSOWI|KFTHWI|KFTHWA|KFAPWI|KFAPWA|WFJWAE|KFSAWA|KFSAWI|KFASWI|KFARWI|KFFOWI|KFGIWI|KFMEWI)\\b|Android.*Silk/[0-9.]+ like Chrome/[0-9.]+ (?!Mobile)",
                                SurfaceTablet: "Windows NT [0-9.]+; ARM;.*(Tablet|ARMBJS)",
                                HPTablet: "HP Slate (7|8|10)|HP ElitePad 900|hp-tablet|EliteBook.*Touch|HP 8|Slate 21|HP SlateBook 10",
                                AsusTablet: "^.*PadFone((?!Mobile).)*$|Transformer|TF101|TF101G|TF300T|TF300TG|TF300TL|TF700T|TF700KL|TF701T|TF810C|ME171|ME301T|ME302C|ME371MG|ME370T|ME372MG|ME172V|ME173X|ME400C|Slider SL101|\\bK00F\\b|\\bK00C\\b|\\bK00E\\b|\\bK00L\\b|TX201LA|ME176C|ME102A|\\bM80TA\\b|ME372CL|ME560CG|ME372CG|ME302KL| K010 | K011 | K017 | K01E |ME572C|ME103K|ME170C|ME171C|\\bME70C\\b|ME581C|ME581CL|ME8510C|ME181C|P01Y|PO1MA|P01Z|\\bP027\\b|\\bP024\\b|\\bP00C\\b",
                                BlackBerryTablet: "PlayBook|RIM Tablet",
                                HTCtablet: "HTC_Flyer_P512|HTC Flyer|HTC Jetstream|HTC-P715a|HTC EVO View 4G|PG41200|PG09410",
                                MotorolaTablet: "xoom|sholest|MZ615|MZ605|MZ505|MZ601|MZ602|MZ603|MZ604|MZ606|MZ607|MZ608|MZ609|MZ615|MZ616|MZ617",
                                NookTablet: "Android.*Nook|NookColor|nook browser|BNRV200|BNRV200A|BNTV250|BNTV250A|BNTV400|BNTV600|LogicPD Zoom2",
                                AcerTablet: "Android.*; \\b(A100|A101|A110|A200|A210|A211|A500|A501|A510|A511|A700|A701|W500|W500P|W501|W501P|W510|W511|W700|G100|G100W|B1-A71|B1-710|B1-711|A1-810|A1-811|A1-830)\\b|W3-810|\\bA3-A10\\b|\\bA3-A11\\b|\\bA3-A20\\b|\\bA3-A30|A3-A40",
                                ToshibaTablet: "Android.*(AT100|AT105|AT200|AT205|AT270|AT275|AT300|AT305|AT1S5|AT500|AT570|AT700|AT830)|TOSHIBA.*FOLIO",
                                LGTablet: "\\bL-06C|LG-V909|LG-V900|LG-V700|LG-V510|LG-V500|LG-V410|LG-V400|LG-VK810\\b",
                                FujitsuTablet: "Android.*\\b(F-01D|F-02F|F-05E|F-10D|M532|Q572)\\b",
                                PrestigioTablet: "PMP3170B|PMP3270B|PMP3470B|PMP7170B|PMP3370B|PMP3570C|PMP5870C|PMP3670B|PMP5570C|PMP5770D|PMP3970B|PMP3870C|PMP5580C|PMP5880D|PMP5780D|PMP5588C|PMP7280C|PMP7280C3G|PMP7280|PMP7880D|PMP5597D|PMP5597|PMP7100D|PER3464|PER3274|PER3574|PER3884|PER5274|PER5474|PMP5097CPRO|PMP5097|PMP7380D|PMP5297C|PMP5297C_QUAD|PMP812E|PMP812E3G|PMP812F|PMP810E|PMP880TD|PMT3017|PMT3037|PMT3047|PMT3057|PMT7008|PMT5887|PMT5001|PMT5002",
                                LenovoTablet: "Lenovo TAB|Idea(Tab|Pad)( A1|A10| K1|)|ThinkPad([ ]+)?Tablet|YT3-850M|YT3-X90L|YT3-X90F|YT3-X90X|Lenovo.*(S2109|S2110|S5000|S6000|K3011|A3000|A3500|A1000|A2107|A2109|A1107|A5500|A7600|B6000|B8000|B8080)(-|)(FL|F|HV|H|)|TB-X103F|TB-X304X|TB-X304F|TB-X304L|TB-X505F|TB-X505L|TB-X505X|TB-X605F|TB-X605L|TB-8703F|TB-8703X|TB-8703N|TB-8704N|TB-8704F|TB-8704X|TB-8704V|TB-7304F|TB-7304I|TB-7304X|Tab2A7-10F|Tab2A7-20F|TB2-X30L|YT3-X50L|YT3-X50F|YT3-X50M|YT-X705F|YT-X703F|YT-X703L|YT-X705L|YT-X705X|TB2-X30F|TB2-X30L|TB2-X30M|A2107A-F|A2107A-H|TB3-730F|TB3-730M|TB3-730X|TB-7504F|TB-7504X|TB-X704F|TB-X104F|TB3-X70F|TB-X705F|TB-8504F|TB3-X70L|TB3-710F|TB-X704L",
                                DellTablet: "Venue 11|Venue 8|Venue 7|Dell Streak 10|Dell Streak 7",
                                YarvikTablet: "Android.*\\b(TAB210|TAB211|TAB224|TAB250|TAB260|TAB264|TAB310|TAB360|TAB364|TAB410|TAB411|TAB420|TAB424|TAB450|TAB460|TAB461|TAB464|TAB465|TAB467|TAB468|TAB07-100|TAB07-101|TAB07-150|TAB07-151|TAB07-152|TAB07-200|TAB07-201-3G|TAB07-210|TAB07-211|TAB07-212|TAB07-214|TAB07-220|TAB07-400|TAB07-485|TAB08-150|TAB08-200|TAB08-201-3G|TAB08-201-30|TAB09-100|TAB09-211|TAB09-410|TAB10-150|TAB10-201|TAB10-211|TAB10-400|TAB10-410|TAB13-201|TAB274EUK|TAB275EUK|TAB374EUK|TAB462EUK|TAB474EUK|TAB9-200)\\b",
                                MedionTablet: "Android.*\\bOYO\\b|LIFE.*(P9212|P9514|P9516|S9512)|LIFETAB",
                                ArnovaTablet: "97G4|AN10G2|AN7bG3|AN7fG3|AN8G3|AN8cG3|AN7G3|AN9G3|AN7dG3|AN7dG3ST|AN7dG3ChildPad|AN10bG3|AN10bG3DT|AN9G2",
                                IntensoTablet: "INM8002KP|INM1010FP|INM805ND|Intenso Tab|TAB1004",
                                IRUTablet: "M702pro",
                                MegafonTablet: "MegaFon V9|\\bZTE V9\\b|Android.*\\bMT7A\\b",
                                EbodaTablet: "E-Boda (Supreme|Impresspeed|Izzycomm|Essential)",
                                AllViewTablet: "Allview.*(Viva|Alldro|City|Speed|All TV|Frenzy|Quasar|Shine|TX1|AX1|AX2)",
                                ArchosTablet: "\\b(101G9|80G9|A101IT)\\b|Qilive 97R|Archos5|\\bARCHOS (70|79|80|90|97|101|FAMILYPAD|)(b|c|)(G10| Cobalt| TITANIUM(HD|)| Xenon| Neon|XSK| 2| XS 2| PLATINUM| CARBON|GAMEPAD)\\b",
                                AinolTablet: "NOVO7|NOVO8|NOVO10|Novo7Aurora|Novo7Basic|NOVO7PALADIN|novo9-Spark",
                                NokiaLumiaTablet: "Lumia 2520",
                                SonyTablet: "Sony.*Tablet|Xperia Tablet|Sony Tablet S|SO-03E|SGPT12|SGPT13|SGPT114|SGPT121|SGPT122|SGPT123|SGPT111|SGPT112|SGPT113|SGPT131|SGPT132|SGPT133|SGPT211|SGPT212|SGPT213|SGP311|SGP312|SGP321|EBRD1101|EBRD1102|EBRD1201|SGP351|SGP341|SGP511|SGP512|SGP521|SGP541|SGP551|SGP621|SGP641|SGP612|SOT31|SGP771|SGP611|SGP612|SGP712",
                                PhilipsTablet: "\\b(PI2010|PI3000|PI3100|PI3105|PI3110|PI3205|PI3210|PI3900|PI4010|PI7000|PI7100)\\b",
                                CubeTablet: "Android.*(K8GT|U9GT|U10GT|U16GT|U17GT|U18GT|U19GT|U20GT|U23GT|U30GT)|CUBE U8GT",
                                CobyTablet: "MID1042|MID1045|MID1125|MID1126|MID7012|MID7014|MID7015|MID7034|MID7035|MID7036|MID7042|MID7048|MID7127|MID8042|MID8048|MID8127|MID9042|MID9740|MID9742|MID7022|MID7010",
                                MIDTablet: "M9701|M9000|M9100|M806|M1052|M806|T703|MID701|MID713|MID710|MID727|MID760|MID830|MID728|MID933|MID125|MID810|MID732|MID120|MID930|MID800|MID731|MID900|MID100|MID820|MID735|MID980|MID130|MID833|MID737|MID960|MID135|MID860|MID736|MID140|MID930|MID835|MID733|MID4X10",
                                MSITablet: "MSI \\b(Primo 73K|Primo 73L|Primo 81L|Primo 77|Primo 93|Primo 75|Primo 76|Primo 73|Primo 81|Primo 91|Primo 90|Enjoy 71|Enjoy 7|Enjoy 10)\\b",
                                SMiTTablet: "Android.*(\\bMID\\b|MID-560|MTV-T1200|MTV-PND531|MTV-P1101|MTV-PND530)",
                                RockChipTablet: "Android.*(RK2818|RK2808A|RK2918|RK3066)|RK2738|RK2808A",
                                FlyTablet: "IQ310|Fly Vision",
                                bqTablet: "Android.*(bq)?.*\\b(Elcano|Curie|Edison|Maxwell|Kepler|Pascal|Tesla|Hypatia|Platon|Newton|Livingstone|Cervantes|Avant|Aquaris ([E|M]10|M8))\\b|Maxwell.*Lite|Maxwell.*Plus",
                                HuaweiTablet: "MediaPad|MediaPad 7 Youth|IDEOS S7|S7-201c|S7-202u|S7-101|S7-103|S7-104|S7-105|S7-106|S7-201|S7-Slim|M2-A01L|BAH-L09|BAH-W09|AGS-L09|CMR-AL19",
                                NecTablet: "\\bN-06D|\\bN-08D",
                                PantechTablet: "Pantech.*P4100",
                                BronchoTablet: "Broncho.*(N701|N708|N802|a710)",
                                VersusTablet: "TOUCHPAD.*[78910]|\\bTOUCHTAB\\b",
                                ZyncTablet: "z1000|Z99 2G|z930|z990|z909|Z919|z900",
                                PositivoTablet: "TB07STA|TB10STA|TB07FTA|TB10FTA",
                                NabiTablet: "Android.*\\bNabi",
                                KoboTablet: "Kobo Touch|\\bK080\\b|\\bVox\\b Build|\\bArc\\b Build",
                                DanewTablet: "DSlide.*\\b(700|701R|702|703R|704|802|970|971|972|973|974|1010|1012)\\b",
                                TexetTablet: "NaviPad|TB-772A|TM-7045|TM-7055|TM-9750|TM-7016|TM-7024|TM-7026|TM-7041|TM-7043|TM-7047|TM-8041|TM-9741|TM-9747|TM-9748|TM-9751|TM-7022|TM-7021|TM-7020|TM-7011|TM-7010|TM-7023|TM-7025|TM-7037W|TM-7038W|TM-7027W|TM-9720|TM-9725|TM-9737W|TM-1020|TM-9738W|TM-9740|TM-9743W|TB-807A|TB-771A|TB-727A|TB-725A|TB-719A|TB-823A|TB-805A|TB-723A|TB-715A|TB-707A|TB-705A|TB-709A|TB-711A|TB-890HD|TB-880HD|TB-790HD|TB-780HD|TB-770HD|TB-721HD|TB-710HD|TB-434HD|TB-860HD|TB-840HD|TB-760HD|TB-750HD|TB-740HD|TB-730HD|TB-722HD|TB-720HD|TB-700HD|TB-500HD|TB-470HD|TB-431HD|TB-430HD|TB-506|TB-504|TB-446|TB-436|TB-416|TB-146SE|TB-126SE",
                                PlaystationTablet: "Playstation.*(Portable|Vita)",
                                TrekstorTablet: "ST10416-1|VT10416-1|ST70408-1|ST702xx-1|ST702xx-2|ST80208|ST97216|ST70104-2|VT10416-2|ST10216-2A|SurfTab",
                                PyleAudioTablet: "\\b(PTBL10CEU|PTBL10C|PTBL72BC|PTBL72BCEU|PTBL7CEU|PTBL7C|PTBL92BC|PTBL92BCEU|PTBL9CEU|PTBL9CUK|PTBL9C)\\b",
                                AdvanTablet: "Android.* \\b(E3A|T3X|T5C|T5B|T3E|T3C|T3B|T1J|T1F|T2A|T1H|T1i|E1C|T1-E|T5-A|T4|E1-B|T2Ci|T1-B|T1-D|O1-A|E1-A|T1-A|T3A|T4i)\\b ",
                                DanyTechTablet: "Genius Tab G3|Genius Tab S2|Genius Tab Q3|Genius Tab G4|Genius Tab Q4|Genius Tab G-II|Genius TAB GII|Genius TAB GIII|Genius Tab S1",
                                GalapadTablet: "Android [0-9.]+; [a-z-]+; \\bG1\\b",
                                MicromaxTablet: "Funbook|Micromax.*\\b(P250|P560|P360|P362|P600|P300|P350|P500|P275)\\b",
                                KarbonnTablet: "Android.*\\b(A39|A37|A34|ST8|ST10|ST7|Smart Tab3|Smart Tab2)\\b",
                                AllFineTablet: "Fine7 Genius|Fine7 Shine|Fine7 Air|Fine8 Style|Fine9 More|Fine10 Joy|Fine11 Wide",
                                PROSCANTablet: "\\b(PEM63|PLT1023G|PLT1041|PLT1044|PLT1044G|PLT1091|PLT4311|PLT4311PL|PLT4315|PLT7030|PLT7033|PLT7033D|PLT7035|PLT7035D|PLT7044K|PLT7045K|PLT7045KB|PLT7071KG|PLT7072|PLT7223G|PLT7225G|PLT7777G|PLT7810K|PLT7849G|PLT7851G|PLT7852G|PLT8015|PLT8031|PLT8034|PLT8036|PLT8080K|PLT8082|PLT8088|PLT8223G|PLT8234G|PLT8235G|PLT8816K|PLT9011|PLT9045K|PLT9233G|PLT9735|PLT9760G|PLT9770G)\\b",
                                YONESTablet: "BQ1078|BC1003|BC1077|RK9702|BC9730|BC9001|IT9001|BC7008|BC7010|BC708|BC728|BC7012|BC7030|BC7027|BC7026",
                                ChangJiaTablet: "TPC7102|TPC7103|TPC7105|TPC7106|TPC7107|TPC7201|TPC7203|TPC7205|TPC7210|TPC7708|TPC7709|TPC7712|TPC7110|TPC8101|TPC8103|TPC8105|TPC8106|TPC8203|TPC8205|TPC8503|TPC9106|TPC9701|TPC97101|TPC97103|TPC97105|TPC97106|TPC97111|TPC97113|TPC97203|TPC97603|TPC97809|TPC97205|TPC10101|TPC10103|TPC10106|TPC10111|TPC10203|TPC10205|TPC10503",
                                GUTablet: "TX-A1301|TX-M9002|Q702|kf026",
                                PointOfViewTablet: "TAB-P506|TAB-navi-7-3G-M|TAB-P517|TAB-P-527|TAB-P701|TAB-P703|TAB-P721|TAB-P731N|TAB-P741|TAB-P825|TAB-P905|TAB-P925|TAB-PR945|TAB-PL1015|TAB-P1025|TAB-PI1045|TAB-P1325|TAB-PROTAB[0-9]+|TAB-PROTAB25|TAB-PROTAB26|TAB-PROTAB27|TAB-PROTAB26XL|TAB-PROTAB2-IPS9|TAB-PROTAB30-IPS9|TAB-PROTAB25XXL|TAB-PROTAB26-IPS10|TAB-PROTAB30-IPS10",
                                OvermaxTablet: "OV-(SteelCore|NewBase|Basecore|Baseone|Exellen|Quattor|EduTab|Solution|ACTION|BasicTab|TeddyTab|MagicTab|Stream|TB-08|TB-09)|Qualcore 1027",
                                HCLTablet: "HCL.*Tablet|Connect-3G-2.0|Connect-2G-2.0|ME Tablet U1|ME Tablet U2|ME Tablet G1|ME Tablet X1|ME Tablet Y2|ME Tablet Sync",
                                DPSTablet: "DPS Dream 9|DPS Dual 7",
                                VistureTablet: "V97 HD|i75 3G|Visture V4( HD)?|Visture V5( HD)?|Visture V10",
                                CrestaTablet: "CTP(-)?810|CTP(-)?818|CTP(-)?828|CTP(-)?838|CTP(-)?888|CTP(-)?978|CTP(-)?980|CTP(-)?987|CTP(-)?988|CTP(-)?989",
                                MediatekTablet: "\\bMT8125|MT8389|MT8135|MT8377\\b",
                                ConcordeTablet: "Concorde([ ]+)?Tab|ConCorde ReadMan",
                                GoCleverTablet: "GOCLEVER TAB|A7GOCLEVER|M1042|M7841|M742|R1042BK|R1041|TAB A975|TAB A7842|TAB A741|TAB A741L|TAB M723G|TAB M721|TAB A1021|TAB I921|TAB R721|TAB I720|TAB T76|TAB R70|TAB R76.2|TAB R106|TAB R83.2|TAB M813G|TAB I721|GCTA722|TAB I70|TAB I71|TAB S73|TAB R73|TAB R74|TAB R93|TAB R75|TAB R76.1|TAB A73|TAB A93|TAB A93.2|TAB T72|TAB R83|TAB R974|TAB R973|TAB A101|TAB A103|TAB A104|TAB A104.2|R105BK|M713G|A972BK|TAB A971|TAB R974.2|TAB R104|TAB R83.3|TAB A1042",
                                ModecomTablet: "FreeTAB 9000|FreeTAB 7.4|FreeTAB 7004|FreeTAB 7800|FreeTAB 2096|FreeTAB 7.5|FreeTAB 1014|FreeTAB 1001 |FreeTAB 8001|FreeTAB 9706|FreeTAB 9702|FreeTAB 7003|FreeTAB 7002|FreeTAB 1002|FreeTAB 7801|FreeTAB 1331|FreeTAB 1004|FreeTAB 8002|FreeTAB 8014|FreeTAB 9704|FreeTAB 1003",
                                VoninoTablet: "\\b(Argus[ _]?S|Diamond[ _]?79HD|Emerald[ _]?78E|Luna[ _]?70C|Onyx[ _]?S|Onyx[ _]?Z|Orin[ _]?HD|Orin[ _]?S|Otis[ _]?S|SpeedStar[ _]?S|Magnet[ _]?M9|Primus[ _]?94[ _]?3G|Primus[ _]?94HD|Primus[ _]?QS|Android.*\\bQ8\\b|Sirius[ _]?EVO[ _]?QS|Sirius[ _]?QS|Spirit[ _]?S)\\b",
                                ECSTablet: "V07OT2|TM105A|S10OT1|TR10CS1",
                                StorexTablet: "eZee[_']?(Tab|Go)[0-9]+|TabLC7|Looney Tunes Tab",
                                VodafoneTablet: "SmartTab([ ]+)?[0-9]+|SmartTabII10|SmartTabII7|VF-1497|VFD 1400",
                                EssentielBTablet: "Smart[ ']?TAB[ ]+?[0-9]+|Family[ ']?TAB2",
                                RossMoorTablet: "RM-790|RM-997|RMD-878G|RMD-974R|RMT-705A|RMT-701|RME-601|RMT-501|RMT-711",
                                iMobileTablet: "i-mobile i-note",
                                TolinoTablet: "tolino tab [0-9.]+|tolino shine",
                                AudioSonicTablet: "\\bC-22Q|T7-QC|T-17B|T-17P\\b",
                                AMPETablet: "Android.* A78 ",
                                SkkTablet: "Android.* (SKYPAD|PHOENIX|CYCLOPS)",
                                TecnoTablet: "TECNO P9|TECNO DP8D",
                                JXDTablet: "Android.* \\b(F3000|A3300|JXD5000|JXD3000|JXD2000|JXD300B|JXD300|S5800|S7800|S602b|S5110b|S7300|S5300|S602|S603|S5100|S5110|S601|S7100a|P3000F|P3000s|P101|P200s|P1000m|P200m|P9100|P1000s|S6600b|S908|P1000|P300|S18|S6600|S9100)\\b",
                                iJoyTablet: "Tablet (Spirit 7|Essentia|Galatea|Fusion|Onix 7|Landa|Titan|Scooby|Deox|Stella|Themis|Argon|Unique 7|Sygnus|Hexen|Finity 7|Cream|Cream X2|Jade|Neon 7|Neron 7|Kandy|Scape|Saphyr 7|Rebel|Biox|Rebel|Rebel 8GB|Myst|Draco 7|Myst|Tab7-004|Myst|Tadeo Jones|Tablet Boing|Arrow|Draco Dual Cam|Aurix|Mint|Amity|Revolution|Finity 9|Neon 9|T9w|Amity 4GB Dual Cam|Stone 4GB|Stone 8GB|Andromeda|Silken|X2|Andromeda II|Halley|Flame|Saphyr 9,7|Touch 8|Planet|Triton|Unique 10|Hexen 10|Memphis 4GB|Memphis 8GB|Onix 10)",
                                FX2Tablet: "FX2 PAD7|FX2 PAD10",
                                XoroTablet: "KidsPAD 701|PAD[ ]?712|PAD[ ]?714|PAD[ ]?716|PAD[ ]?717|PAD[ ]?718|PAD[ ]?720|PAD[ ]?721|PAD[ ]?722|PAD[ ]?790|PAD[ ]?792|PAD[ ]?900|PAD[ ]?9715D|PAD[ ]?9716DR|PAD[ ]?9718DR|PAD[ ]?9719QR|PAD[ ]?9720QR|TelePAD1030|Telepad1032|TelePAD730|TelePAD731|TelePAD732|TelePAD735Q|TelePAD830|TelePAD9730|TelePAD795|MegaPAD 1331|MegaPAD 1851|MegaPAD 2151",
                                ViewsonicTablet: "ViewPad 10pi|ViewPad 10e|ViewPad 10s|ViewPad E72|ViewPad7|ViewPad E100|ViewPad 7e|ViewSonic VB733|VB100a",
                                VerizonTablet: "QTAQZ3|QTAIR7|QTAQTZ3|QTASUN1|QTASUN2|QTAXIA1",
                                OdysTablet: "LOOX|XENO10|ODYS[ -](Space|EVO|Xpress|NOON)|\\bXELIO\\b|Xelio10Pro|XELIO7PHONETAB|XELIO10EXTREME|XELIOPT2|NEO_QUAD10",
                                CaptivaTablet: "CAPTIVA PAD",
                                IconbitTablet: "NetTAB|NT-3702|NT-3702S|NT-3702S|NT-3603P|NT-3603P|NT-0704S|NT-0704S|NT-3805C|NT-3805C|NT-0806C|NT-0806C|NT-0909T|NT-0909T|NT-0907S|NT-0907S|NT-0902S|NT-0902S",
                                TeclastTablet: "T98 4G|\\bP80\\b|\\bX90HD\\b|X98 Air|X98 Air 3G|\\bX89\\b|P80 3G|\\bX80h\\b|P98 Air|\\bX89HD\\b|P98 3G|\\bP90HD\\b|P89 3G|X98 3G|\\bP70h\\b|P79HD 3G|G18d 3G|\\bP79HD\\b|\\bP89s\\b|\\bA88\\b|\\bP10HD\\b|\\bP19HD\\b|G18 3G|\\bP78HD\\b|\\bA78\\b|\\bP75\\b|G17s 3G|G17h 3G|\\bP85t\\b|\\bP90\\b|\\bP11\\b|\\bP98t\\b|\\bP98HD\\b|\\bG18d\\b|\\bP85s\\b|\\bP11HD\\b|\\bP88s\\b|\\bA80HD\\b|\\bA80se\\b|\\bA10h\\b|\\bP89\\b|\\bP78s\\b|\\bG18\\b|\\bP85\\b|\\bA70h\\b|\\bA70\\b|\\bG17\\b|\\bP18\\b|\\bA80s\\b|\\bA11s\\b|\\bP88HD\\b|\\bA80h\\b|\\bP76s\\b|\\bP76h\\b|\\bP98\\b|\\bA10HD\\b|\\bP78\\b|\\bP88\\b|\\bA11\\b|\\bA10t\\b|\\bP76a\\b|\\bP76t\\b|\\bP76e\\b|\\bP85HD\\b|\\bP85a\\b|\\bP86\\b|\\bP75HD\\b|\\bP76v\\b|\\bA12\\b|\\bP75a\\b|\\bA15\\b|\\bP76Ti\\b|\\bP81HD\\b|\\bA10\\b|\\bT760VE\\b|\\bT720HD\\b|\\bP76\\b|\\bP73\\b|\\bP71\\b|\\bP72\\b|\\bT720SE\\b|\\bC520Ti\\b|\\bT760\\b|\\bT720VE\\b|T720-3GE|T720-WiFi",
                                OndaTablet: "\\b(V975i|Vi30|VX530|V701|Vi60|V701s|Vi50|V801s|V719|Vx610w|VX610W|V819i|Vi10|VX580W|Vi10|V711s|V813|V811|V820w|V820|Vi20|V711|VI30W|V712|V891w|V972|V819w|V820w|Vi60|V820w|V711|V813s|V801|V819|V975s|V801|V819|V819|V818|V811|V712|V975m|V101w|V961w|V812|V818|V971|V971s|V919|V989|V116w|V102w|V973|Vi40)\\b[\\s]+|V10 \\b4G\\b",
                                JaytechTablet: "TPC-PA762",
                                BlaupunktTablet: "Endeavour 800NG|Endeavour 1010",
                                DigmaTablet: "\\b(iDx10|iDx9|iDx8|iDx7|iDxD7|iDxD8|iDsQ8|iDsQ7|iDsQ8|iDsD10|iDnD7|3TS804H|iDsQ11|iDj7|iDs10)\\b",
                                EvolioTablet: "ARIA_Mini_wifi|Aria[ _]Mini|Evolio X10|Evolio X7|Evolio X8|\\bEvotab\\b|\\bNeura\\b",
                                LavaTablet: "QPAD E704|\\bIvoryS\\b|E-TAB IVORY|\\bE-TAB\\b",
                                AocTablet: "MW0811|MW0812|MW0922|MTK8382|MW1031|MW0831|MW0821|MW0931|MW0712",
                                MpmanTablet: "MP11 OCTA|MP10 OCTA|MPQC1114|MPQC1004|MPQC994|MPQC974|MPQC973|MPQC804|MPQC784|MPQC780|\\bMPG7\\b|MPDCG75|MPDCG71|MPDC1006|MP101DC|MPDC9000|MPDC905|MPDC706HD|MPDC706|MPDC705|MPDC110|MPDC100|MPDC99|MPDC97|MPDC88|MPDC8|MPDC77|MP709|MID701|MID711|MID170|MPDC703|MPQC1010",
                                CelkonTablet: "CT695|CT888|CT[\\s]?910|CT7 Tab|CT9 Tab|CT3 Tab|CT2 Tab|CT1 Tab|C820|C720|\\bCT-1\\b",
                                WolderTablet: "miTab \\b(DIAMOND|SPACE|BROOKLYN|NEO|FLY|MANHATTAN|FUNK|EVOLUTION|SKY|GOCAR|IRON|GENIUS|POP|MINT|EPSILON|BROADWAY|JUMP|HOP|LEGEND|NEW AGE|LINE|ADVANCE|FEEL|FOLLOW|LIKE|LINK|LIVE|THINK|FREEDOM|CHICAGO|CLEVELAND|BALTIMORE-GH|IOWA|BOSTON|SEATTLE|PHOENIX|DALLAS|IN 101|MasterChef)\\b",
                                MediacomTablet: "M-MPI10C3G|M-SP10EG|M-SP10EGP|M-SP10HXAH|M-SP7HXAH|M-SP10HXBH|M-SP8HXAH|M-SP8MXA",
                                MiTablet: "\\bMI PAD\\b|\\bHM NOTE 1W\\b",
                                NibiruTablet: "Nibiru M1|Nibiru Jupiter One",
                                NexoTablet: "NEXO NOVA|NEXO 10|NEXO AVIO|NEXO FREE|NEXO GO|NEXO EVO|NEXO 3G|NEXO SMART|NEXO KIDDO|NEXO MOBI",
                                LeaderTablet: "TBLT10Q|TBLT10I|TBL-10WDKB|TBL-10WDKBO2013|TBL-W230V2|TBL-W450|TBL-W500|SV572|TBLT7I|TBA-AC7-8G|TBLT79|TBL-8W16|TBL-10W32|TBL-10WKB|TBL-W100",
                                UbislateTablet: "UbiSlate[\\s]?7C",
                                PocketBookTablet: "Pocketbook",
                                KocasoTablet: "\\b(TB-1207)\\b",
                                HisenseTablet: "\\b(F5281|E2371)\\b",
                                Hudl: "Hudl HT7S3|Hudl 2",
                                TelstraTablet: "T-Hub2",
                                GenericTablet: "Android.*\\b97D\\b|Tablet(?!.*PC)|BNTV250A|MID-WCDMA|LogicPD Zoom2|\\bA7EB\\b|CatNova8|A1_07|CT704|CT1002|\\bM721\\b|rk30sdk|\\bEVOTAB\\b|M758A|ET904|ALUMIUM10|Smartfren Tab|Endeavour 1010|Tablet-PC-4|Tagi Tab|\\bM6pro\\b|CT1020W|arc 10HD|\\bTP750\\b|\\bQTAQZ3\\b|WVT101|TM1088|KT107"
                            },
                            oss: {
                                AndroidOS: "Android",
                                BlackBerryOS: "blackberry|\\bBB10\\b|rim tablet os",
                                PalmOS: "PalmOS|avantgo|blazer|elaine|hiptop|palm|plucker|xiino",
                                SymbianOS: "Symbian|SymbOS|Series60|Series40|SYB-[0-9]+|\\bS60\\b",
                                WindowsMobileOS: "Windows CE.*(PPC|Smartphone|Mobile|[0-9]{3}x[0-9]{3})|Windows Mobile|Windows Phone [0-9.]+|WCE;",
                                WindowsPhoneOS: "Windows Phone 10.0|Windows Phone 8.1|Windows Phone 8.0|Windows Phone OS|XBLWP7|ZuneWP7|Windows NT 6.[23]; ARM;",
                                iOS: "\\biPhone.*Mobile|\\biPod|\\biPad|AppleCoreMedia",
                                iPadOS: "CPU OS 13",
                                SailfishOS: "Sailfish",
                                MeeGoOS: "MeeGo",
                                MaemoOS: "Maemo",
                                JavaOS: "J2ME/|\\bMIDP\\b|\\bCLDC\\b",
                                webOS: "webOS|hpwOS",
                                badaOS: "\\bBada\\b",
                                BREWOS: "BREW"
                            },
                            uas: {
                                Chrome: "\\bCrMo\\b|CriOS|Android.*Chrome/[.0-9]* (Mobile)?",
                                Dolfin: "\\bDolfin\\b",
                                Opera: "Opera.*Mini|Opera.*Mobi|Android.*Opera|Mobile.*OPR/[0-9.]+$|Coast/[0-9.]+",
                                Skyfire: "Skyfire",
                                Edge: "\\bEdgiOS\\b|Mobile Safari/[.0-9]* Edge",
                                IE: "IEMobile|MSIEMobile",
                                Firefox: "fennec|firefox.*maemo|(Mobile|Tablet).*Firefox|Firefox.*Mobile|FxiOS",
                                Bolt: "bolt",
                                TeaShark: "teashark",
                                Blazer: "Blazer",
                                Safari: "Version((?!\\bEdgiOS\\b).)*Mobile.*Safari|Safari.*Mobile|MobileSafari",
                                WeChat: "\\bMicroMessenger\\b",
                                UCBrowser: "UC.*Browser|UCWEB",
                                baiduboxapp: "baiduboxapp",
                                baidubrowser: "baidubrowser",
                                DiigoBrowser: "DiigoBrowser",
                                Mercury: "\\bMercury\\b",
                                ObigoBrowser: "Obigo",
                                NetFront: "NF-Browser",
                                GenericBrowser: "NokiaBrowser|OviBrowser|OneBrowser|TwonkyBeamBrowser|SEMC.*Browser|FlyFlow|Minimo|NetFront|Novarra-Vision|MQQBrowser|MicroMessenger",
                                PaleMoon: "Android.*PaleMoon|Mobile.*PaleMoon"
                            },
                            props: {
                                Mobile: "Mobile/[VER]",
                                Build: "Build/[VER]",
                                Version: "Version/[VER]",
                                VendorID: "VendorID/[VER]",
                                iPad: "iPad.*CPU[a-z ]+[VER]",
                                iPhone: "iPhone.*CPU[a-z ]+[VER]",
                                iPod: "iPod.*CPU[a-z ]+[VER]",
                                Kindle: "Kindle/[VER]",
                                Chrome: ["Chrome/[VER]", "CriOS/[VER]", "CrMo/[VER]"],
                                Coast: ["Coast/[VER]"],
                                Dolfin: "Dolfin/[VER]",
                                Firefox: ["Firefox/[VER]", "FxiOS/[VER]"],
                                Fennec: "Fennec/[VER]",
                                Edge: "Edge/[VER]",
                                IE: ["IEMobile/[VER];", "IEMobile [VER]", "MSIE [VER];", "Trident/[0-9.]+;.*rv:[VER]"],
                                NetFront: "NetFront/[VER]",
                                NokiaBrowser: "NokiaBrowser/[VER]",
                                Opera: [" OPR/[VER]", "Opera Mini/[VER]", "Version/[VER]"],
                                "Opera Mini": "Opera Mini/[VER]",
                                "Opera Mobi": "Version/[VER]",
                                UCBrowser: ["UCWEB[VER]", "UC.*Browser/[VER]"],
                                MQQBrowser: "MQQBrowser/[VER]",
                                MicroMessenger: "MicroMessenger/[VER]",
                                baiduboxapp: "baiduboxapp/[VER]",
                                baidubrowser: "baidubrowser/[VER]",
                                SamsungBrowser: "SamsungBrowser/[VER]",
                                Iron: "Iron/[VER]",
                                Safari: ["Version/[VER]", "Safari/[VER]"],
                                Skyfire: "Skyfire/[VER]",
                                Tizen: "Tizen/[VER]",
                                Webkit: "webkit[ /][VER]",
                                PaleMoon: "PaleMoon/[VER]",
                                SailfishBrowser: "SailfishBrowser/[VER]",
                                Gecko: "Gecko/[VER]",
                                Trident: "Trident/[VER]",
                                Presto: "Presto/[VER]",
                                Goanna: "Goanna/[VER]",
                                iOS: " \\bi?OS\\b [VER][ ;]{1}",
                                Android: "Android [VER]",
                                Sailfish: "Sailfish [VER]",
                                BlackBerry: ["BlackBerry[\\w]+/[VER]", "BlackBerry.*Version/[VER]", "Version/[VER]"],
                                BREW: "BREW [VER]",
                                Java: "Java/[VER]",
                                "Windows Phone OS": ["Windows Phone OS [VER]", "Windows Phone [VER]"],
                                "Windows Phone": "Windows Phone [VER]",
                                "Windows CE": "Windows CE/[VER]",
                                "Windows NT": "Windows NT [VER]",
                                Symbian: ["SymbianOS/[VER]", "Symbian/[VER]"],
                                webOS: ["webOS/[VER]", "hpwOS/[VER];"]
                            },
                            utils: {
                                Bot: "Googlebot|facebookexternalhit|Google-AMPHTML|s~amp-validator|AdsBot-Google|Google Keyword Suggestion|Facebot|YandexBot|YandexMobileBot|bingbot|ia_archiver|AhrefsBot|Ezooms|GSLFbot|WBSearchBot|Twitterbot|TweetmemeBot|Twikle|PaperLiBot|Wotbox|UnwindFetchor|Exabot|MJ12bot|YandexImages|TurnitinBot|Pingdom|contentkingapp|AspiegelBot",
                                MobileBot: "Googlebot-Mobile|AdsBot-Google-Mobile|YahooSeeker/M1A1-R2D2",
                                DesktopMode: "WPDesktop",
                                TV: "SonyDTV|HbbTV",
                                WebKit: "(webkit)[ /]([\\w.]+)",
                                Console: "\\b(Nintendo|Nintendo WiiU|Nintendo 3DS|Nintendo Switch|PLAYSTATION|Xbox)\\b",
                                Watch: "SM-V700"
                            }
                        }, detectMobileBrowsers: {
                            fullPattern: /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,
                            shortPattern: /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
                            tabletPattern: /android|ipad|playbook|silk/i
                        }
                    }, r = Object.prototype.hasOwnProperty;

                    function i(e, t) {
                        return null != e && null != t && e.toLowerCase() === t.toLowerCase()
                    }

                    function o(e, t) {
                        var n, r, i = e.length;
                        if (!i || !t) return !1;
                        for (n = t.toLowerCase(), r = 0; r < i; ++r) if (n === e[r].toLowerCase()) return !0;
                        return !1
                    }

                    function a(e) {
                        for (var t in e) r.call(e, t) && (e[t] = new RegExp(e[t], "i"))
                    }

                    function s(e, t) {
                        this.ua = function (e) {
                            return (e || "").substr(0, 500)
                        }(e), this._cache = {}, this.maxPhoneWidth = t || 600
                    }

                    return n.FALLBACK_PHONE = "UnknownPhone", n.FALLBACK_TABLET = "UnknownTablet", n.FALLBACK_MOBILE = "UnknownMobile", e = "isArray" in Array ? Array.isArray : function (e) {
                        return "[object Array]" === Object.prototype.toString.call(e)
                    }, function () {
                        var t, i, o, s, l, u, c = n.mobileDetectRules;
                        for (t in c.props) if (r.call(c.props, t)) {
                            for (i = c.props[t], e(i) || (i = [i]), l = i.length, s = 0; s < l; ++s) (u = (o = i[s]).indexOf("[VER]")) >= 0 && (o = o.substring(0, u) + "([\\w._\\+]+)" + o.substring(u + 5)), i[s] = new RegExp(o, "i");
                            c.props[t] = i
                        }
                        a(c.oss), a(c.phones), a(c.tablets), a(c.uas), a(c.utils), c.oss0 = {
                            WindowsPhoneOS: c.oss.WindowsPhoneOS,
                            WindowsMobileOS: c.oss.WindowsMobileOS
                        }
                    }(), n.findMatch = function (e, t) {
                        for (var n in e) if (r.call(e, n) && e[n].test(t)) return n;
                        return null
                    }, n.findMatches = function (e, t) {
                        var n = [];
                        for (var i in e) r.call(e, i) && e[i].test(t) && n.push(i);
                        return n
                    }, n.getVersionStr = function (e, t) {
                        var i, o, a, s, l = n.mobileDetectRules.props;
                        if (r.call(l, e)) for (a = (i = l[e]).length, o = 0; o < a; ++o) if (null !== (s = i[o].exec(t))) return s[1];
                        return null
                    }, n.getVersion = function (e, t) {
                        var r = n.getVersionStr(e, t);
                        return r ? n.prepareVersionNo(r) : NaN
                    }, n.prepareVersionNo = function (e) {
                        var t;
                        return 1 === (t = e.split(/[a-z._ \/\-]/i)).length && (e = t[0]), t.length > 1 && (e = t[0] + ".", t.shift(), e += t.join("")), Number(e)
                    }, n.isMobileFallback = function (e) {
                        return n.detectMobileBrowsers.fullPattern.test(e) || n.detectMobileBrowsers.shortPattern.test(e.substr(0, 4))
                    }, n.isTabletFallback = function (e) {
                        return n.detectMobileBrowsers.tabletPattern.test(e)
                    }, n.prepareDetectionCache = function (e, r, i) {
                        if (e.mobile === t) {
                            var o, a, l;
                            if (a = n.findMatch(n.mobileDetectRules.tablets, r)) return e.mobile = e.tablet = a, void (e.phone = null);
                            if (o = n.findMatch(n.mobileDetectRules.phones, r)) return e.mobile = e.phone = o, void (e.tablet = null);
                            n.isMobileFallback(r) ? (l = s.isPhoneSized(i)) === t ? (e.mobile = n.FALLBACK_MOBILE, e.tablet = e.phone = null) : l ? (e.mobile = e.phone = n.FALLBACK_PHONE, e.tablet = null) : (e.mobile = e.tablet = n.FALLBACK_TABLET, e.phone = null) : n.isTabletFallback(r) ? (e.mobile = e.tablet = n.FALLBACK_TABLET, e.phone = null) : e.mobile = e.tablet = e.phone = null
                        }
                    }, n.mobileGrade = function (e) {
                        var t = null !== e.mobile();
                        return e.os("iOS") && e.version("iPad") >= 4.3 || e.os("iOS") && e.version("iPhone") >= 3.1 || e.os("iOS") && e.version("iPod") >= 3.1 || e.version("Android") > 2.1 && e.is("Webkit") || e.version("Windows Phone OS") >= 7 || e.is("BlackBerry") && e.version("BlackBerry") >= 6 || e.match("Playbook.*Tablet") || e.version("webOS") >= 1.4 && e.match("Palm|Pre|Pixi") || e.match("hp.*TouchPad") || e.is("Firefox") && e.version("Firefox") >= 12 || e.is("Chrome") && e.is("AndroidOS") && e.version("Android") >= 4 || e.is("Skyfire") && e.version("Skyfire") >= 4.1 && e.is("AndroidOS") && e.version("Android") >= 2.3 || e.is("Opera") && e.version("Opera Mobi") > 11 && e.is("AndroidOS") || e.is("MeeGoOS") || e.is("Tizen") || e.is("Dolfin") && e.version("Bada") >= 2 || (e.is("UC Browser") || e.is("Dolfin")) && e.version("Android") >= 2.3 || e.match("Kindle Fire") || e.is("Kindle") && e.version("Kindle") >= 3 || e.is("AndroidOS") && e.is("NookTablet") || e.version("Chrome") >= 11 && !t || e.version("Safari") >= 5 && !t || e.version("Firefox") >= 4 && !t || e.version("MSIE") >= 7 && !t || e.version("Opera") >= 10 && !t ? "A" : e.os("iOS") && e.version("iPad") < 4.3 || e.os("iOS") && e.version("iPhone") < 3.1 || e.os("iOS") && e.version("iPod") < 3.1 || e.is("Blackberry") && e.version("BlackBerry") >= 5 && e.version("BlackBerry") < 6 || e.version("Opera Mini") >= 5 && e.version("Opera Mini") <= 6.5 && (e.version("Android") >= 2.3 || e.is("iOS")) || e.match("NokiaN8|NokiaC7|N97.*Series60|Symbian/3") || e.version("Opera Mobi") >= 11 && e.is("SymbianOS") ? "B" : (e.version("BlackBerry") < 5 || e.match("MSIEMobile|Windows CE.*Mobile") || e.version("Windows Mobile"), "C")
                    }, n.detectOS = function (e) {
                        return n.findMatch(n.mobileDetectRules.oss0, e) || n.findMatch(n.mobileDetectRules.oss, e)
                    }, n.getDeviceSmallerSide = function () {
                        return window.screen.width < window.screen.height ? window.screen.width : window.screen.height
                    }, s.prototype = {
                        constructor: s, mobile: function () {
                            return n.prepareDetectionCache(this._cache, this.ua, this.maxPhoneWidth), this._cache.mobile
                        }, phone: function () {
                            return n.prepareDetectionCache(this._cache, this.ua, this.maxPhoneWidth), this._cache.phone
                        }, tablet: function () {
                            return n.prepareDetectionCache(this._cache, this.ua, this.maxPhoneWidth), this._cache.tablet
                        }, userAgent: function () {
                            return this._cache.userAgent === t && (this._cache.userAgent = n.findMatch(n.mobileDetectRules.uas, this.ua)), this._cache.userAgent
                        }, userAgents: function () {
                            return this._cache.userAgents === t && (this._cache.userAgents = n.findMatches(n.mobileDetectRules.uas, this.ua)), this._cache.userAgents
                        }, os: function () {
                            return this._cache.os === t && (this._cache.os = n.detectOS(this.ua)), this._cache.os
                        }, version: function (e) {
                            return n.getVersion(e, this.ua)
                        }, versionStr: function (e) {
                            return n.getVersionStr(e, this.ua)
                        }, is: function (e) {
                            return o(this.userAgents(), e) || i(e, this.os()) || i(e, this.phone()) || i(e, this.tablet()) || o(n.findMatches(n.mobileDetectRules.utils, this.ua), e)
                        }, match: function (e) {
                            return e instanceof RegExp || (e = new RegExp(e, "i")), e.test(this.ua)
                        }, isPhoneSized: function (e) {
                            return s.isPhoneSized(e || this.maxPhoneWidth)
                        }, mobileGrade: function () {
                            return this._cache.grade === t && (this._cache.grade = n.mobileGrade(this)), this._cache.grade
                        }
                    }, "undefined" != typeof window && window.screen ? s.isPhoneSized = function (e) {
                        return e < 0 ? t : n.getDeviceSmallerSide() <= e
                    } : s.isPhoneSized = function () {
                    }, s._impl = n, s.version = "1.4.5 2021-03-13", s
                }))
            }(function (t) {
                if (e.exports) return function (t) {
                    e.exports = t()
                };
                if ("function" == typeof define && define.amd) return define;
                if ("undefined" != typeof window) return function (e) {
                    window.MobileDetect = e()
                };
                throw new Error("unknown environment")
            }())
        }, 5022: function (e, t, n) {
            function r(e) {
                return (r = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                })(e)
            }

            e = n.nmd(e), function () {
                "use strict";
                var i = {function: !0, object: !0},
                    o = i["undefined" == typeof window ? "undefined" : r(window)] && window || this, a = i[r(t)] && t,
                    s = i[r(e)] && e && !e.nodeType && e,
                    l = a && s && "object" == (void 0 === n.g ? "undefined" : r(n.g)) && n.g;
                !l || l.global !== l && l.window !== l && l.self !== l || (o = l);
                var u = Math.pow(2, 53) - 1, c = /\bOpera/, d = Object.prototype, T = d.hasOwnProperty, f = d.toString;

                function p(e) {
                    return (e = String(e)).charAt(0).toUpperCase() + e.slice(1)
                }

                function S(e) {
                    return e = M(e), /^(?:webOS|i(?:OS|P))/.test(e) ? e : p(e)
                }

                function b(e, t) {
                    for (var n in e) T.call(e, n) && t(e[n], n, e)
                }

                function h(e) {
                    return null == e ? p(e) : f.call(e).slice(8, -1)
                }

                function A(e) {
                    return String(e).replace(/([ -])(?!$)/g, "$1?")
                }

                function P(e, t) {
                    var n = null;
                    return function (e, t) {
                        var n = -1, r = e ? e.length : 0;
                        if ("number" == typeof r && r > -1 && r <= u) for (; ++n < r;) t(e[n], n, e); else b(e, t)
                    }(e, (function (r, i) {
                        n = t(n, r, i, e)
                    })), n
                }

                function M(e) {
                    return String(e).replace(/^ +| +$/g, "")
                }

                var m = function e(t) {
                    var n = o, i = t && "object" == r(t) && "String" != h(t);
                    i && (n = t, t = null);
                    var a = n.navigator || {}, s = a.userAgent || "";
                    t || (t = s);
                    var l, u, d, T, p,
                        m = i ? !!a.likeChrome : /\bChrome\b/.test(t) && !/internal|\n/i.test(f.toString()),
                        g = "Object", v = i ? g : "ScriptBridgingProxyObject", G = i ? g : "Environment",
                        y = i && n.java ? "JavaPackage" : h(n.java), C = i ? g : "RuntimeObject",
                        B = /\bJava/.test(y) && n.java, E = B && h(n.environment) == G, H = B ? "a" : "α",
                        x = B ? "b" : "β", I = n.document || {}, D = n.operamini || n.opera,
                        w = c.test(w = i && D ? D["[[Class]]"] : h(D)) ? w : D = null, N = t, O = [], L = null,
                        R = t == s, V = R && D && "function" == typeof D.version && D.version(),
                        k = P([{label: "EdgeHTML", pattern: "Edge"}, "Trident", {
                            label: "WebKit",
                            pattern: "AppleWebKit"
                        }, "iCab", "Presto", "NetFront", "Tasman", "KHTML", "Gecko"], (function (e, n) {
                            return e || RegExp("\\b" + (n.pattern || A(n)) + "\\b", "i").exec(t) && (n.label || n)
                        })), F = function (e) {
                            return P(e, (function (e, n) {
                                return e || RegExp("\\b" + (n.pattern || A(n)) + "\\b", "i").exec(t) && (n.label || n)
                            }))
                        }(["Adobe AIR", "Arora", "Avant Browser", "Breach", "Camino", "Electron", "Epiphany", "Fennec", "Flock", "Galeon", "GreenBrowser", "iCab", "Iceweasel", "K-Meleon", "Konqueror", "Lunascape", "Maxthon", {
                            label: "Microsoft Edge",
                            pattern: "(?:Edge|Edg|EdgA|EdgiOS)"
                        }, "Midori", "Nook Browser", "PaleMoon", "PhantomJS", "Raven", "Rekonq", "RockMelt", {
                            label: "Samsung Internet",
                            pattern: "SamsungBrowser"
                        }, "SeaMonkey", {
                            label: "Silk",
                            pattern: "(?:Cloud9|Silk-Accelerated)"
                        }, "Sleipnir", "SlimBrowser", {
                            label: "SRWare Iron",
                            pattern: "Iron"
                        }, "Sunrise", "Swiftfox", "Vivaldi", "Waterfox", "WebPositive", {
                            label: "Yandex Browser",
                            pattern: "YaBrowser"
                        }, {label: "UC Browser", pattern: "UCBrowser"}, "Opera Mini", {
                            label: "Opera Mini",
                            pattern: "OPiOS"
                        }, "Opera", {label: "Opera", pattern: "OPR"}, "Chromium", "Chrome", {
                            label: "Chrome",
                            pattern: "(?:HeadlessChrome)"
                        }, {label: "Chrome Mobile", pattern: "(?:CriOS|CrMo)"}, {
                            label: "Firefox",
                            pattern: "(?:Firefox|Minefield)"
                        }, {label: "Firefox for iOS", pattern: "FxiOS"}, {label: "IE", pattern: "IEMobile"}, {
                            label: "IE",
                            pattern: "MSIE"
                        }, "Safari"]), X = U([{label: "BlackBerry", pattern: "BB10"}, "BlackBerry", {
                            label: "Galaxy S",
                            pattern: "GT-I9000"
                        }, {label: "Galaxy S2", pattern: "GT-I9100"}, {
                            label: "Galaxy S3",
                            pattern: "GT-I9300"
                        }, {label: "Galaxy S4", pattern: "GT-I9500"}, {
                            label: "Galaxy S5",
                            pattern: "SM-G900"
                        }, {label: "Galaxy S6", pattern: "SM-G920"}, {
                            label: "Galaxy S6 Edge",
                            pattern: "SM-G925"
                        }, {label: "Galaxy S7", pattern: "SM-G930"}, {
                            label: "Galaxy S7 Edge",
                            pattern: "SM-G935"
                        }, "Google TV", "Lumia", "iPad", "iPod", "iPhone", "Kindle", {
                            label: "Kindle Fire",
                            pattern: "(?:Cloud9|Silk-Accelerated)"
                        }, "Nexus", "Nook", "PlayBook", "PlayStation Vita", "PlayStation", "TouchPad", "Transformer", {
                            label: "Wii U",
                            pattern: "WiiU"
                        }, "Wii", "Xbox One", {label: "Xbox 360", pattern: "Xbox"}, "Xoom"]), W = function (e) {
                            return P(e, (function (e, n, r) {
                                return e || (n[X] || n[/^[a-z]+(?: +[a-z]+\b)*/i.exec(X)] || RegExp("\\b" + A(r) + "(?:\\b|\\w*\\d)", "i").exec(t)) && r
                            }))
                        }({
                            Apple: {iPad: 1, iPhone: 1, iPod: 1},
                            Alcatel: {},
                            Archos: {},
                            Amazon: {Kindle: 1, "Kindle Fire": 1},
                            Asus: {Transformer: 1},
                            "Barnes & Noble": {Nook: 1},
                            BlackBerry: {PlayBook: 1},
                            Google: {"Google TV": 1, Nexus: 1},
                            HP: {TouchPad: 1},
                            HTC: {},
                            Huawei: {},
                            Lenovo: {},
                            LG: {},
                            Microsoft: {Xbox: 1, "Xbox One": 1},
                            Motorola: {Xoom: 1},
                            Nintendo: {"Wii U": 1, Wii: 1},
                            Nokia: {Lumia: 1},
                            Oppo: {},
                            Samsung: {"Galaxy S": 1, "Galaxy S2": 1, "Galaxy S3": 1, "Galaxy S4": 1},
                            Sony: {PlayStation: 1, "PlayStation Vita": 1},
                            Xiaomi: {Mi: 1, Redmi: 1}
                        }), K = function (e) {
                            return P(e, (function (e, n) {
                                var r = n.pattern || A(n);
                                return !e && (e = RegExp("\\b" + r + "(?:/[\\d.]+|[ \\w.]*)", "i").exec(t)) && (e = function (e, t, n) {
                                    var r = {
                                        "10.0": "10",
                                        6.4: "10 Technical Preview",
                                        6.3: "8.1",
                                        6.2: "8",
                                        6.1: "Server 2008 R2 / 7",
                                        "6.0": "Server 2008 / Vista",
                                        5.2: "Server 2003 / XP 64-bit",
                                        5.1: "XP",
                                        5.01: "2000 SP1",
                                        "5.0": "2000",
                                        "4.0": "NT",
                                        "4.90": "ME"
                                    };
                                    return t && n && /^Win/i.test(e) && !/^Windows Phone /i.test(e) && (r = r[/[\d.]+$/.exec(e)]) && (e = "Windows " + r), e = String(e), t && n && (e = e.replace(RegExp(t, "i"), n)), S(e.replace(/ ce$/i, " CE").replace(/\bhpw/i, "web").replace(/\bMacintosh\b/, "Mac OS").replace(/_PowerPC\b/i, " OS").replace(/\b(OS X) [^ \d]+/i, "$1").replace(/\bMac (OS X)\b/, "$1").replace(/\/(\d)/, " $1").replace(/_/g, ".").replace(/(?: BePC|[ .]*fc[ \d.]+)$/i, "").replace(/\bx86\.64\b/gi, "x86_64").replace(/\b(Windows Phone) OS\b/, "$1").replace(/\b(Chrome OS \w+) [\d.]+\b/, "$1").split(" on ")[0])
                                }(e, r, n.label || n)), e
                            }))
                        }(["Windows Phone", "KaiOS", "Android", "CentOS", {
                            label: "Chrome OS",
                            pattern: "CrOS"
                        }, "Debian", {
                            label: "DragonFly BSD",
                            pattern: "DragonFly"
                        }, "Fedora", "FreeBSD", "Gentoo", "Haiku", "Kubuntu", "Linux Mint", "OpenBSD", "Red Hat", "SuSE", "Ubuntu", "Xubuntu", "Cygwin", "Symbian OS", "hpwOS", "webOS ", "webOS", "Tablet OS", "Tizen", "Linux", "Mac OS X", "Macintosh", "Mac", "Windows 98;", "Windows "]);

                    function U(e) {
                        return P(e, (function (e, n) {
                            var r = n.pattern || A(n);
                            return !e && (e = RegExp("\\b" + r + " *\\d+[.\\w_]*", "i").exec(t) || RegExp("\\b" + r + " *\\w+-[\\w]*", "i").exec(t) || RegExp("\\b" + r + "(?:; *(?:[a-z]+[_-])?[a-z]+\\d+|[^ ();-]*)", "i").exec(t)) && ((e = String(n.label && !RegExp(r, "i").test(n.label) ? n.label : e).split("/"))[1] && !/[\d.]+/.test(e[0]) && (e[0] += " " + e[1]), n = n.label || n, e = S(e[0].replace(RegExp(r, "i"), n).replace(RegExp("; *(?:" + n + "[_-])?", "i"), " ").replace(RegExp("(" + n + ")[-_.]?(\\w)", "i"), "$1 $2"))), e
                        }))
                    }

                    function j(e) {
                        return P(e, (function (e, n) {
                            return e || (RegExp(n + "(?:-[\\d.]+/|(?: for [\\w-]+)?[ /-])([\\d.]+[^ ();/_-]*)", "i").exec(t) || 0)[1] || null
                        }))
                    }

                    if (k && (k = [k]), /\bAndroid\b/.test(K) && !X && (l = /\bAndroid[^;]*;(.*?)(?:Build|\) AppleWebKit)\b/i.exec(t)) && (X = M(l[1]).replace(/^[a-z]{2}-[a-z]{2};\s*/i, "") || null), W && !X ? X = U([W]) : W && X && (X = X.replace(RegExp("^(" + A(W) + ")[-_.\\s]", "i"), W + " ").replace(RegExp("^(" + A(W) + ")[-_.]?(\\w)", "i"), W + " $2")), (l = /\bGoogle TV\b/.exec(X)) && (X = l[0]), /\bSimulator\b/i.test(t) && (X = (X ? X + " " : "") + "Simulator"), "Opera Mini" == F && /\bOPiOS\b/.test(t) && O.push("running in Turbo/Uncompressed mode"), "IE" == F && /\blike iPhone OS\b/.test(t) ? (W = (l = e(t.replace(/like iPhone OS/, ""))).manufacturer, X = l.product) : /^iP/.test(X) ? (F || (F = "Safari"), K = "iOS" + ((l = / OS ([\d_]+)/i.exec(t)) ? " " + l[1].replace(/_/g, ".") : "")) : "Konqueror" == F && /^Linux\b/i.test(K) ? K = "Kubuntu" : W && "Google" != W && (/Chrome/.test(F) && !/\bMobile Safari\b/i.test(t) || /\bVita\b/.test(X)) || /\bAndroid\b/.test(K) && /^Chrome/.test(F) && /\bVersion\//i.test(t) ? (F = "Android Browser", K = /\bAndroid\b/.test(K) ? K : "Android") : "Silk" == F ? (/\bMobi/i.test(t) || (K = "Android", O.unshift("desktop mode")), /Accelerated *= *true/i.test(t) && O.unshift("accelerated")) : "UC Browser" == F && /\bUCWEB\b/.test(t) ? O.push("speed mode") : "PaleMoon" == F && (l = /\bFirefox\/([\d.]+)\b/.exec(t)) ? O.push("identifying as Firefox " + l[1]) : "Firefox" == F && (l = /\b(Mobile|Tablet|TV)\b/i.exec(t)) ? (K || (K = "Firefox OS"), X || (X = l[1])) : !F || (l = !/\bMinefield\b/i.test(t) && /\b(?:Firefox|Safari)\b/.exec(F)) ? (F && !X && /[\/,]|^[^(]+?\)/.test(t.slice(t.indexOf(l + "/") + 8)) && (F = null), (l = X || W || K) && (X || W || /\b(?:Android|Symbian OS|Tablet OS|webOS)\b/.test(K)) && (F = /[a-z]+(?: Hat)?/i.exec(/\bAndroid\b/.test(K) ? K : l) + " Browser")) : "Electron" == F && (l = (/\bChrome\/([\d.]+)\b/.exec(t) || 0)[1]) && O.push("Chromium " + l), V || (V = j(["(?:Cloud9|CriOS|CrMo|Edge|Edg|EdgA|EdgiOS|FxiOS|HeadlessChrome|IEMobile|Iron|Opera ?Mini|OPiOS|OPR|Raven|SamsungBrowser|Silk(?!/[\\d.]+$)|UCBrowser|YaBrowser)", "Version", A(F), "(?:Firefox|Minefield|NetFront)"])), (l = ("iCab" == k && parseFloat(V) > 3 ? "WebKit" : /\bOpera\b/.test(F) && (/\bOPR\b/.test(t) ? "Blink" : "Presto")) || /\b(?:Midori|Nook|Safari)\b/i.test(t) && !/^(?:Trident|EdgeHTML)$/.test(k) && "WebKit" || !k && /\bMSIE\b/i.test(t) && ("Mac OS" == K ? "Tasman" : "Trident") || "WebKit" == k && /\bPlayStation\b(?! Vita\b)/i.test(F) && "NetFront") && (k = [l]), "IE" == F && (l = (/; *(?:XBLWP|ZuneWP)(\d+)/i.exec(t) || 0)[1]) ? (F += " Mobile", K = "Windows Phone " + (/\+$/.test(l) ? l : l + ".x"), O.unshift("desktop mode")) : /\bWPDesktop\b/i.test(t) ? (F = "IE Mobile", K = "Windows Phone 8.x", O.unshift("desktop mode"), V || (V = (/\brv:([\d.]+)/.exec(t) || 0)[1])) : "IE" != F && "Trident" == k && (l = /\brv:([\d.]+)/.exec(t)) && (F && O.push("identifying as " + F + (V ? " " + V : "")), F = "IE", V = l[1]), R) {
                        if (T = "global", p = null != (d = n) ? r(d[T]) : "number", /^(?:boolean|number|string|undefined)$/.test(p) || "object" == p && !d[T]) h(l = n.runtime) == v ? (F = "Adobe AIR", K = l.flash.system.Capabilities.os) : h(l = n.phantom) == C ? (F = "PhantomJS", V = (l = l.version || null) && l.major + "." + l.minor + "." + l.patch) : "number" == typeof I.documentMode && (l = /\bTrident\/(\d+)/i.exec(t)) ? (V = [V, I.documentMode], (l = +l[1] + 4) != V[1] && (O.push("IE " + V[1] + " mode"), k && (k[1] = ""), V[1] = l), V = "IE" == F ? String(V[1].toFixed(1)) : V[0]) : "number" == typeof I.documentMode && /^(?:Chrome|Firefox)\b/.test(F) && (O.push("masking as " + F + " " + V), F = "IE", V = "11.0", k = ["Trident"], K = "Windows"); else if (B && (N = (l = B.lang.System).getProperty("os.arch"), K = K || l.getProperty("os.name") + " " + l.getProperty("os.version")), E) {
                            try {
                                V = n.require("ringo/engine").version.join("."), F = "RingoJS"
                            } catch (e) {
                                (l = n.system) && l.global.system == n.system && (F = "Narwhal", K || (K = l[0].os || null))
                            }
                            F || (F = "Rhino")
                        } else "object" == r(n.process) && !n.process.browser && (l = n.process) && ("object" == r(l.versions) && ("string" == typeof l.versions.electron ? (O.push("Node " + l.versions.node), F = "Electron", V = l.versions.electron) : "string" == typeof l.versions.nw && (O.push("Chromium " + V, "Node " + l.versions.node), F = "NW.js", V = l.versions.nw)), F || (F = "Node.js", N = l.arch, K = l.platform, V = (V = /[\d.]+/.exec(l.version)) ? V[0] : null));
                        K = K && S(K)
                    }
                    if (V && (l = /(?:[ab]|dp|pre|[ab]\d+pre)(?:\d+\+?)?$/i.exec(V) || /(?:alpha|beta)(?: ?\d)?/i.exec(t + ";" + (R && a.appMinorVersion)) || /\bMinefield\b/i.test(t) && "a") && (L = /b/i.test(l) ? "beta" : "alpha", V = V.replace(RegExp(l + "\\+?$"), "") + ("beta" == L ? x : H) + (/\d+\+?/.exec(l) || "")), "Fennec" == F || "Firefox" == F && /\b(?:Android|Firefox OS|KaiOS)\b/.test(K)) F = "Firefox Mobile"; else if ("Maxthon" == F && V) V = V.replace(/\.[\d.]+/, ".x"); else if (/\bXbox\b/i.test(X)) "Xbox 360" == X && (K = null), "Xbox 360" == X && /\bIEMobile\b/.test(t) && O.unshift("mobile mode"); else if (!/^(?:Chrome|IE|Opera)$/.test(F) && (!F || X || /Browser|Mobi/.test(F)) || "Windows CE" != K && !/Mobi/i.test(t)) if ("IE" == F && R) try {
                        null === n.external && O.unshift("platform preview")
                    } catch (e) {
                        O.unshift("embedded")
                    } else (/\bBlackBerry\b/.test(X) || /\bBB10\b/.test(t)) && (l = (RegExp(X.replace(/ +/g, " *") + "/([.\\d]+)", "i").exec(t) || 0)[1] || V) ? (K = ((l = [l, /BB10/.test(t)])[1] ? (X = null, W = "BlackBerry") : "Device Software") + " " + l[0], V = null) : this != b && "Wii" != X && (R && D || /Opera/.test(F) && /\b(?:MSIE|Firefox)\b/i.test(t) || "Firefox" == F && /\bOS X (?:\d+\.){2,}/.test(K) || "IE" == F && (K && !/^Win/.test(K) && V > 5.5 || /\bWindows XP\b/.test(K) && V > 8 || 8 == V && !/\bTrident\b/.test(t))) && !c.test(l = e.call(b, t.replace(c, "") + ";")) && l.name && (l = "ing as " + l.name + ((l = l.version) ? " " + l : ""), c.test(F) ? (/\bIE\b/.test(l) && "Mac OS" == K && (K = null), l = "identify" + l) : (l = "mask" + l, F = w ? S(w.replace(/([a-z])([A-Z])/g, "$1 $2")) : "Opera", /\bIE\b/.test(l) && (K = null), R || (V = null)), k = ["Presto"], O.push(l)); else F += " Mobile";
                    (l = (/\bAppleWebKit\/([\d.]+\+?)/i.exec(t) || 0)[1]) && (l = [parseFloat(l.replace(/\.(\d)$/, ".0$1")), l], "Safari" == F && "+" == l[1].slice(-1) ? (F = "WebKit Nightly", L = "alpha", V = l[1].slice(0, -1)) : V != l[1] && V != (l[2] = (/\bSafari\/([\d.]+\+?)/i.exec(t) || 0)[1]) || (V = null), l[1] = (/\b(?:Headless)?Chrome\/([\d.]+)/i.exec(t) || 0)[1], 537.36 == l[0] && 537.36 == l[2] && parseFloat(l[1]) >= 28 && "WebKit" == k && (k = ["Blink"]), R && (m || l[1]) ? (k && (k[1] = "like Chrome"), l = l[1] || ((l = l[0]) < 530 ? 1 : l < 532 ? 2 : l < 532.05 ? 3 : l < 533 ? 4 : l < 534.03 ? 5 : l < 534.07 ? 6 : l < 534.1 ? 7 : l < 534.13 ? 8 : l < 534.16 ? 9 : l < 534.24 ? 10 : l < 534.3 ? 11 : l < 535.01 ? 12 : l < 535.02 ? "13+" : l < 535.07 ? 15 : l < 535.11 ? 16 : l < 535.19 ? 17 : l < 536.05 ? 18 : l < 536.1 ? 19 : l < 537.01 ? 20 : l < 537.11 ? "21+" : l < 537.13 ? 23 : l < 537.18 ? 24 : l < 537.24 ? 25 : l < 537.36 ? 26 : "Blink" != k ? "27" : "28")) : (k && (k[1] = "like Safari"), l = (l = l[0]) < 400 ? 1 : l < 500 ? 2 : l < 526 ? 3 : l < 533 ? 4 : l < 534 ? "4+" : l < 535 ? 5 : l < 537 ? 6 : l < 538 ? 7 : l < 601 ? 8 : l < 602 ? 9 : l < 604 ? 10 : l < 606 ? 11 : l < 608 ? 12 : "12"), k && (k[1] += " " + (l += "number" == typeof l ? ".x" : /[.+]/.test(l) ? "" : "+")), "Safari" == F && (!V || parseInt(V) > 45) ? V = l : "Chrome" == F && /\bHeadlessChrome/i.test(t) && O.unshift("headless")), "Opera" == F && (l = /\bzbov|zvav$/.exec(K)) ? (F += " ", O.unshift("desktop mode"), "zvav" == l ? (F += "Mini", V = null) : F += "Mobile", K = K.replace(RegExp(" *" + l + "$"), "")) : "Safari" == F && /\bChrome\b/.exec(k && k[1]) ? (O.unshift("desktop mode"), F = "Chrome Mobile", V = null, /\bOS X\b/.test(K) ? (W = "Apple", K = "iOS 4.3+") : K = null) : /\bSRWare Iron\b/.test(F) && !V && (V = j("Chrome")), V && 0 == V.indexOf(l = /[\d.]+$/.exec(K)) && t.indexOf("/" + l + "-") > -1 && (K = M(K.replace(l, ""))), K && -1 != K.indexOf(F) && !RegExp(F + " OS").test(K) && (K = K.replace(RegExp(" *" + A(F) + " *"), "")), k && !/\b(?:Avant|Nook)\b/.test(F) && (/Browser|Lunascape|Maxthon/.test(F) || "Safari" != F && /^iOS/.test(K) && /\bSafari\b/.test(k[1]) || /^(?:Adobe|Arora|Breach|Midori|Opera|Phantom|Rekonq|Rock|Samsung Internet|Sleipnir|SRWare Iron|Vivaldi|Web)/.test(F) && k[1]) && (l = k[k.length - 1]) && O.push(l), O.length && (O = ["(" + O.join("; ") + ")"]), W && X && X.indexOf(W) < 0 && O.push("on " + W), X && O.push((/^on /.test(O[O.length - 1]) ? "" : "on ") + X), K && (l = / ([\d.+]+)$/.exec(K), u = l && "/" == K.charAt(K.length - l[0].length - 1), K = {
                        architecture: 32,
                        family: l && !u ? K.replace(l[0], "") : K,
                        version: l ? l[1] : null,
                        toString: function () {
                            var e = this.version;
                            return this.family + (e && !u ? " " + e : "") + (64 == this.architecture ? " 64-bit" : "")
                        }
                    }), (l = /\b(?:AMD|IA|Win|WOW|x86_|x)64\b/i.exec(N)) && !/\bi686\b/i.test(N) ? (K && (K.architecture = 64, K.family = K.family.replace(RegExp(" *" + l), "")), F && (/\bWOW64\b/i.test(t) || R && /\w(?:86|32)$/.test(a.cpuClass || a.platform) && !/\bWin64; x64\b/i.test(t)) && O.unshift("32-bit")) : K && /^OS X/.test(K.family) && "Chrome" == F && parseFloat(V) >= 39 && (K.architecture = 64), t || (t = null);
                    var _ = {};
                    return _.description = t, _.layout = k && k[0], _.manufacturer = W, _.name = F, _.prerelease = L, _.product = X, _.ua = t, _.version = F && V, _.os = K || {
                        architecture: null,
                        family: null,
                        version: null,
                        toString: function () {
                            return "null"
                        }
                    }, _.parse = e, _.toString = function () {
                        return this.description || ""
                    }, _.version && O.unshift(V), _.name && O.unshift(F), K && F && (K != String(K).split(" ")[0] || K != F.split(" ")[0] && !X) && O.push(X ? "(" + K + ")" : "on " + K), O.length && (_.description = O.join(" ")), _
                }();
                "function" == typeof define && "object" == r(define.amd) && define.amd ? (o.platform = m, define((function () {
                    return m
                }))) : a && s ? b(m, (function (e, t) {
                    a[t] = e
                })) : o.platform = m
            }.call(this)
        }
    }, t = {};

    function n(r) {
        var i = t[r];
        if (void 0 !== i) return i.exports;
        var o = t[r] = {id: r, loaded: !1, exports: {}};
        return e[r].call(o.exports, o, o.exports, n), o.loaded = !0, o.exports
    }

    n.n = function (e) {
        var t = e && e.__esModule ? function () {
            return e.default
        } : function () {
            return e
        };
        return n.d(t, {a: t}), t
    }, n.d = function (e, t) {
        for (var r in t) n.o(t, r) && !n.o(e, r) && Object.defineProperty(e, r, {enumerable: !0, get: t[r]})
    }, n.g = function () {
        if ("object" == typeof globalThis) return globalThis;
        try {
            return this || new Function("return this")()
        } catch (e) {
            if ("object" == typeof window) return window
        }
    }(), n.o = function (e, t) {
        return Object.prototype.hasOwnProperty.call(e, t)
    }, n.nmd = function (e) {
        return e.paths = [], e.children || (e.children = []), e
    }, function () {
        "use strict";
        var e = n(3670), t = n.n(e);
        window.app.jQuery = t(), window.jQuery = t(), window.$ = window.jQuery;
        var r = n(1780), i = n.n(r);
        window.app.MobileDetect = i();
        var o = n(5022), a = n.n(o);
        window.app.platform = a()
    }()
}();
