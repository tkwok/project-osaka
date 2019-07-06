/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "build/dist/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/js/index.js":
/*!*************************!*\
  !*** ./src/js/index.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("(function () {\n  //let additional = new Additional();\n  function animateValue(id, start, end, duration) {\n    var range = end - start;\n    var current = start;\n    var increment = end > start? 1 : -1;\n    var stepTime = Math.abs(Math.floor(duration / range));\n    var obj = document.getElementById(id);\n    var timer = setInterval(function() {\n        current += increment;\n        obj.innerHTML = current;\n        if (current == end) {\n            clearInterval(timer);\n        }\n    }, stepTime);\n  }\n\n  /* form validation */\n  function addEvent(node, type, callback) {\n    if (node.addEventListener) {\n      node.addEventListener(type, function(e) {\n        callback(e, e.target);\n      }, false);\n    } else if (node.attachEvent) {\n      node.attachEvent('on' + type, function(e) {\n        callback(e, e.srcElement);\n      });\n    }\n  }\n\n  function shouldBeValidated(field) {\n    return (\n      !(field.getAttribute(\"readonly\") || field.readonly) &&\n      !(field.getAttribute(\"disabled\") || field.disabled) &&\n      (field.getAttribute(\"pattern\") || field.getAttribute(\"required\"))\n    );\n  }\n\n  function instantValidation(field) {\n    if (shouldBeValidated(field)) {\n      var invalid =\n        (field.getAttribute(\"required\") && !field.value) ||\n        (field.getAttribute(\"pattern\") &&\n          field.value &&\n          !new RegExp(field.getAttribute(\"pattern\")).test(field.value));\n      if (!invalid && field.getAttribute(\"aria-invalid\")) {\n        field.removeAttribute(\"aria-invalid\");\n      } else if (invalid && !field.getAttribute(\"aria-invalid\")) {\n        field.setAttribute(\"aria-invalid\", \"true\");\n      }\n    }\n  }\n\n  AOS.init({\n    // Global settings:\n    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function\n    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on\n    initClassName: 'aos-init', // class applied after initialization\n    animatedClassName: 'aos-animate', // class applied on animation\n    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll\n    disableMutationObserver: false, // disables automatic mutations' detections (advanced)\n    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)\n    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)\n    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:\n    offset: 120, // offset (in px) from the original trigger point\n    delay: 0, // values from 0 to 3000, with step 50ms\n    duration: 400, // values from 0 to 3000, with step 50ms\n    easing: 'ease', // default easing for AOS animations\n    once: false, // whether animation should happen only once - while scrolling down\n    mirror: false, // whether elements should animate out while scrolling past them\n    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation\n  });\n\n\n})();\n\n\n//# sourceURL=webpack:///./src/js/index.js?");

/***/ }),

/***/ "./src/sass/main.scss":
/*!****************************!*\
  !*** ./src/sass/main.scss ***!
  \****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("// extracted by mini-css-extract-plugin\n\n//# sourceURL=webpack:///./src/sass/main.scss?");

/***/ }),

/***/ 0:
/*!****************************************************!*\
  !*** multi ./src/js/index.js ./src/sass/main.scss ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("__webpack_require__(/*! ./src/js/index.js */\"./src/js/index.js\");\nmodule.exports = __webpack_require__(/*! ./src/sass/main.scss */\"./src/sass/main.scss\");\n\n\n//# sourceURL=webpack:///multi_./src/js/index.js_./src/sass/main.scss?");

/***/ })

/******/ });