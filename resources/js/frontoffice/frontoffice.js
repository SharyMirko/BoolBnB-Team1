const { default: Axios } = require("axios");

require("../bootstrap");

import { default as ttServices } from "@tomtom-international/web-sdk-services";
import { default as tt } from "@tomtom-international/web-sdk-services";
import { default as ttMaps } from "@tomtom-international/web-sdk-maps";
import { forEach, indexOf, isSet } from "lodash";

const LandingPageVue = new Vue({
   el: "#LandingPageVue",
   render: (h) => h(LandingPageVue),
});

// Landing Slider
let items = document.querySelectorAll(".carousel .carousel-item");

items.forEach((el) => {
   const minPerSlide = 3;

   let next = el.nextElementSibling;

   for (var i = 1; i < minPerSlide; i++) {
      if (!next) {
         // wrap carousel by using first child
         next = items[0];
      }

      let cloneChild = next.cloneNode(true);
      el.appendChild(cloneChild.children[0]);
      next = next.nextElementSibling;
   }
});

// form register validation

const FormRegisterVue = new Vue({
   el: "#registerModal",
   data: {
      email: "",
      password: "",
      password_confirmation: "",
      name: "",
      last_name: "",
      date: "",

   },
   methods: {
      register: function () {
         //validate email
         let btn = document.querySelector("#btnReg");
         let today= new Date();

         if (
            this.email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) &&
            this.password.length > 5 &&
            this.password_confirmation === this.password &&
            this.name.length > 2 &&
            this.last_name.length > 2 &&
            
            this.date != "" && today > new Date(this.date)
            
            
         ) {
            btn.disabled = false;
         } else {
            btn.disabled = true;
         }
      },
   },
});


// form login validation
const FormLoginVue = new Vue({
   el: "#loginModal",
   data: {
      email: "",
      password: "",
   },
   methods: {
      login: function () {
         //validate email
         let btn = document.querySelector("#btnLog");
         if (
            this.email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) &&
            this.password.length > 5
            ) {
               btn.disabled = false;
            } else {
               btn.disabled = true;
            }
      },
   },
});

// form reset password validation

const FormResetPasswordVue = new Vue({
   el: "#passwordResetModal",
   data: {
      email: "",
      password: "",
      password_confirmation: "",
   },
   methods: {
      resetPass: function () {
         //validate email
         let btn = document.querySelector("#btnReset");
         if (
            this.email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) &&
            this.password.length > 5 &&
            this.password_confirmation === this.password
            ) {
               btn.disabled = false;
            } else {
               btn.disabled = true;
            }
      },
   },
});

// form reset password validation

const msgForm = new Vue({
   el: "#msgForm",
   data: {
      email: "",
      text_ms: "",
   },
   methods: {
      msgValidate: function () {
         //validate email
         let btn = document.querySelector("#btnSendMsg");
         if (
            this.email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) &&
            this.text_ms > 20
            ) {
               btn.disabled = true;
            } else {
               btn.disabled = false;
            }
      },
   },
});

// form create

const FormCreateVue = new Vue({
   el: "#createModal",
   data: {
      title: "",
      category: "",
      price: "",
      description: "",
      address: "",
      service: [],
      area: "",
      city: "",
      beds_n: "",
      bathrooms_n: "",
      rooms_n: "",
      hiddenlat: "",
      hiddenlon: "",
     
   },
   methods: {
      create: function () {},
      addressSearch: function () {
         // API request to get address
         ttServices.services
            .geocode({
               key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
               query: this.address + " " + this.city,
            })
            .then(function (response) {
               FormCreateVue.hiddenlat = response.results[0].position.lat;
               FormCreateVue.hiddenlon = response.results[0].position.lng;
               console.log(response.results[0]);
            });
      },
   },
});


// Serve per la ricerca nell'Index


const SearchVue = new Vue({
   el: "#searchApp",
   data: {
      results2: [],
      location: "",
      results: [],
      nRes: 0,
      link: "apartments/",
      loading: false,
      nBeds: "",
      services: [],
      nRooms: "",
      maxDistance: 20000,
      nRes2: 0,

   },
   methods: {
      search() {
         ttServices.services
            .geocode({
               key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
               query: this.location,
            })
            .then(function (response) {
               SearchVue.lat = response.results[0].position.lat;
               SearchVue.lon = response.results[0].position.lng;
            });
         Axios.get("/api/api-artments?city=" + this.location).then(
            (response) =>{
               let asparagi = response.data.response.data;
              asparagi.forEach((apartment, i) => {
                  setTimeout(() => {
                     tt.services.calculateRoute({
                        key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                        locations: apartment[1].longitude + ',' + apartment[1].latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                     })
                     .then(function(routeData) {
                        let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;
                        console.log('ciao');
                        if(dist < SearchVue.maxDistance){
                           apartment.splice(0, 1)
                           SearchVue.results.push(apartment);
                        };

                        SearchVue.nRes = SearchVue.results.length;
                     })}, i * 300
                    )

               });
            });
      },
      applyFilter() {
         this.loading = false;
         if(SearchVue.results.length != 0) {
            SearchVue.results = [];
         }
         ttServices.services
            .geocode({
               key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
               query: this.location,
            })
            .then(function (response) {
               SearchVue.lat = response.results[0].position.lat;
               SearchVue.lon = response.results[0].position.lng;
            });
            let tenuta = "";
            if(SearchVue.services[0] == undefined) {
               SearchVue.services.push('')
            } else {
               for (let i = 0; i < SearchVue.services.length; i++) {
                  tenuta += "&services=" + SearchVue.services[i]
               }
            }
            console.log(tenuta)
            Axios.get("/api/api-artments?" + "rooms=" + this.nRooms + tenuta + "&beds=" + this.nBeds).then(
               (response) => {
                  console.log(response.data.response.data)
                  let lest = Object.entries(response.data.response.data);
                  console.log(lest)
                 lest.forEach((apartment, i) => {
                     setTimeout(() => {
                        tt.services.calculateRoute({
                           key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                           locations: apartment[1].longitude + ',' + apartment[1].latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                        })
                        .then(function(routeData) {
                           let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;
                           console.log('ciao');
                           if(dist < parseInt(SearchVue.maxDistance)){
                              apartment.splice(0, 1);
                              SearchVue.results.push(apartment);
                           };

                           SearchVue.nRes = SearchVue.results.length;
                        })}, i * 300
                       )

                  });
               });
         },
         setService(e) {
            if(e.target.checked){
               SearchVue.services.push(e.target.value);

            }
            if(e.target.checked == false){
               SearchVue.services.splice(indexOf(SearchVue.services, e.target.value), 1);
            }
         },
         resetFilter() {
            
            SearchVue.nBeds = "";
            SearchVue.nRooms = ""; 

            const checkboxes = document.querySelectorAll('.form-check-input');
            checkboxes.forEach((checkbox) => {
                checkbox.checked = false;
            });
            
            SearchVue.services = [];
            
            SearchVue.maxDistance= 20000;
   
         },
      },
      mounted: function mounted () {
         if(window.location.search) {
            this.loading = true
/*             let test = window.location.search.slice(0, 1)
 */            let test = window.location.search.replace("?city=", '')
            this.location = test;
            Axios.get("/api/api-artments?" + "city=" + test + "&rooms=" + this.tenuta + "&beds=" + this.nBeds).then(
               (response) =>{
                  this.results2 = response.data.response.data
                  this.nRes2 = this.results2.length

               })
         }
         
   },
});


// Serve a creare mappa nello Show


let longitude = document.getElementById("longitude");
let latitude = document.getElementById("latitude");
var center = [longitude.innerHTML, latitude.innerHTML];
let map = ttMaps.map({
   key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
   container: "map",
   center: center,
   zoom: 15,
});
let marker = new ttMaps.Marker({
   draggable: false,
})
   .setLngLat(center)
   .addTo(map);


   // partenza pensiero della ricerca degli appartamenti vicini TODO:
   // const currentLocation = (coordinate zona ricercata);
   // let arrAppVicini = [];
   // array.forEach(element => {
   //    if (this.distance(currentLocation, element) <= 20000) {
   //       arrAppVicini.push(element);
   //    }
   // });
