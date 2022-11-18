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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/backoffice/backoffice.js":
/*!***********************************************!*\
  !*** ./resources/js/backoffice/backoffice.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

//eliminazione appartamento da dashboard
var btnDel = document.querySelectorAll('.btn-del');
var indexForm = document.querySelector('#indexForm');

if (btnDel) {
  btnDel.forEach(function (btn) {
    btn.addEventListener('click', function () {
      if (this.dataset.type == 'apartment') {
        indexForm.action = this.dataset.baseurl + '/' + this.dataset.id;
      } else {//nothing
      }
    });
  });
} // anterprima thumb in create


if (document.querySelector("#thumbCreate")) {
  document.querySelector("#thumbCreate").addEventListener('change', function () {
    readURL(this);
  });
}

function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      document.querySelector('#thumb-preview').src = e.target.result;
    };

    reader.readAsDataURL(input.files[0]);
  }
} // payment app


var btnPromo24 = document.getElementById('promo24btn');
var btnPromo72 = document.getElementById('promo72btn');
var btnPromo144 = document.getElementById('promo144btn');
var amount = document.getElementById('amount');
var amoutshow = document.getElementById('selectedamount');

if (btnPromo24 && btnPromo72 && btnPromo144) {
  btnPromo24.addEventListener('click', function () {
    amount.setAttribute("value", "2.99");
    amoutshow.innerHTML = "2,99";
  });
  btnPromo72.addEventListener('click', function () {
    amount.setAttribute("value", "5.99");
    amoutshow.innerHTML = "5,99";
  });
  btnPromo144.addEventListener('click', function () {
    amount.setAttribute("value", "9.99");
    amoutshow.innerHTML = "9,99";
  });
}

/***/ }),

/***/ 1:
/*!*****************************************************!*\
  !*** multi ./resources/js/backoffice/backoffice.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\Users\Neeiser PC\Desktop\Boolean\BoolBnB-Team1\resources\js\backoffice\backoffice.js */"./resources/js/backoffice/backoffice.js");


/***/ })

/******/ });