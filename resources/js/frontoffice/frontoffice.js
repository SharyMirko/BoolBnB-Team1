const { default: Axios } = require("axios");

require("../bootstrap");

import { default as ttServices } from "@tomtom-international/web-sdk-services";
import { default as tt } from "@tomtom-international/web-sdk-services";
import { default as ttMaps } from "@tomtom-international/web-sdk-maps";
import { forEach, indexOf, isSet } from "lodash";


// const LandingPageVue = new Vue({
//    el: "#LandingPageVue",
//    render: (h) => h(LandingPageVue),
// });



// Landing Slider
let items = document.querySelectorAll(".carousel .carousel-item");

if (items) {
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
}



// form register validation
if(document.querySelector('#registerModal')) {
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
}



// form login validation
if (document.querySelector('#loginModal')) {
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
}




// form reset password validation
if (document.querySelector('#passwordResetModal')) {
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
}




// form create
if (document.querySelector('#createModal')) {
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
         thumb_create: "",
         hiddenlat: "",
         hiddenlon: "",

      },
      methods: {
         createApartmentForm: function (){
            let btn = document.querySelector("#btnCreateApart");
            if (
               this.title != "" &&
               this.category != "" &&
               this.price != "" &&
               this.description != "" &&
               this.address != "" &&
               this.service.length != 0 &&
               this.area != "" &&
               this.city != "" &&
               this.beds_n != "" &&
               this.bathrooms_n != "" &&
               this.rooms_n != "" &&
               this.thumb_create != ""
               ) {
                  btn.disabled = false;
               } else {
                  btn.disabled = true;
               }
         },
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
               });
         },
      },
      created: function () {
         let oldCity = document.querySelector('#city').value;
         let oldAddress = document.querySelector('#address').value;
         this.city = oldCity;
         this.address = oldAddress;

         ttServices.services
         .geocode({
            key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
            query: this.address + " " + this.city,
         })
         .then(function (response) {
            FormCreateVue.hiddenlat = response.results[0].position.lat;
            FormCreateVue.hiddenlon = response.results[0].position.lng;
         });
      },
   });
}


// form reset password validation
if (document.querySelector('#msgForm')) {
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
               this.text_ms.length > 20
               ) {
                  btn.disabled = false;
               } else {
                  btn.disabled = true;
               }
         },
      },
      created: function() {
         let oldEmail = document.querySelector('#emailMsg').value;
         console.log(oldEmail);
         this.email = oldEmail;
      }
   });
}


// Serve per la ricerca nell'Index
if (document.querySelector('#searchApp')) {
   const SearchVue = new Vue({
      el: "#searchApp",
      data: {
         results2: [],
         premium: [],
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
         lat: null,
         lon: null

      },
      methods: {
         search() {
            this.results2 = [];
            this.premium = [];
            this.results = [];
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
                           if(dist < SearchVue.maxDistance){
                              apartment.splice(0, 1)
                              SearchVue.results.push(apartment);
                           };
                           SearchVue.nRes = SearchVue.results.length + SearchVue.premium.length;
                        })}, i * 300
                       )

                  })
                  let pre = response.data.sql
                  pre.forEach((apartment, i) => {
                     setTimeout(() => {
                        tt.services.calculateRoute({
                           key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                           locations: apartment.longitude + ',' + apartment.latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                        })
                        .then(function(routeData) {
                           let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;
                           if(dist < parseInt(SearchVue.maxDistance)){
                              SearchVue.premium.push(apartment);
                           }
                           SearchVue.nRes = SearchVue.results.length + SearchVue.premium.length;
                        })}, i * 300
                       )
                  })
               });
         },
         applyFilter() {
            this.results2 = [];
            this.premium = [];
            this.results = [];
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
               Axios.get("/api/api-artments?" + "rooms=" + this.nRooms + tenuta + "&beds=" + this.nBeds).then(
                  (response) => {
                     let lest = Object.entries(response.data.response.data);
                     let pre = response.data.sql
                    lest.forEach((apartment, i) => {
                        setTimeout(() => {
                           tt.services.calculateRoute({
                              key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                              locations: apartment[1].longitude + ',' + apartment[1].latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                           })
                           .then(function(routeData) {
                              let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;
                              if(dist < parseInt(SearchVue.maxDistance)){
                                 apartment.splice(0, 1);
                                 SearchVue.results.push(apartment);
                              }
                              SearchVue.nRes = SearchVue.results.length + SearchVue.premium.length;
                           })}, i * 300
                          )
                     })
                     pre.forEach((apartment, i) => {
                        setTimeout(() => {
                           tt.services.calculateRoute({
                              key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                              locations: apartment.longitude + ',' + apartment.latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                           })
                           .then(function(routeData) {
                              let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;
                              if(dist < parseInt(SearchVue.maxDistance)){
                                 SearchVue.premium.push(apartment);
                              }
                              SearchVue.nRes = SearchVue.results.length + SearchVue.premium.length;
                           })}, i * 300
                          )
                     })
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
                  if(test.includes('+')) {


                    test = test.replace("+", " ")
                   test = test.replace("+", " ")
                   test = test.replace("+", " ")
                   test = test.replace("+", " ")
                  }
               this.location = test;
             /*   Axios.get("/api/api-artments?" + "city=" + test + "&rooms=" + this.tenuta + "&beds=" + this.nBeds).then(
                  (response) =>{
                     this.results2 = response.data.response.data
                     this.nRes2 = this.results2.length

                  }) */
                  ttServices.services
                  .geocode({
                     key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                     query: this.location,
                  })
                  .then(function (response) {
                     SearchVue.lat = response.results[0].position.lat;
                     SearchVue.lon = response.results[0].position.lng;
                  });

                  Axios.get("/api/api-artments?" + "rooms=" + this.nRooms + "$services=" + "&beds=" + this.nBeds).then(
                     (response) => {

                        let lest = Object.entries(response.data.response.data);

                       lest.forEach((apartment, i) => {
                           setTimeout(() => {
                              tt.services.calculateRoute({
                                 key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                                 locations: apartment[1].longitude + ',' + apartment[1].latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                              })
                              .then(function(routeData) {
                                 let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;

                                 if(dist < parseInt(SearchVue.maxDistance)){
                                    apartment.splice(0, 1);
                                    SearchVue.results2.push(apartment);
                                 };

                                 SearchVue.nRes2 = SearchVue.results2.length + SearchVue.premium.length;
                              })}, i * 300
                             )

                        })
                        let pre = response.data.sql
                        pre.forEach((apartment, i) => {
                           setTimeout(() => {
                              tt.services.calculateRoute({
                                 key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                                 locations: apartment.longitude + ',' + apartment.latitude + ':' + SearchVue.lon + ',' + SearchVue.lat,
                              })
                              .then(function(routeData) {
                                 let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;
                                 if(dist < parseInt(SearchVue.maxDistance)){
                                    SearchVue.premium.push(apartment);
                                 }
                                 SearchVue.nRes2 = SearchVue.results2.length + SearchVue.premium.length;
                              })}, i * 300
                             )
                        })
                     });
            }

      },
   });
}



// Mappa nello Show
let longitude = document.getElementById("longitude");
let latitude = document.getElementById("latitude");
let mapContainer = document.querySelector('#mapShow');

if (mapContainer) {
   let center = [longitude.innerHTML, latitude.innerHTML];

   let mapShow = ttMaps.map({
      key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
      container: "mapShow",
      center: center,
      zoom: 15,
   });
   let marker = new ttMaps.Marker({
      draggable: false,
      color: '#F15E75',
      scale: 1.5,
   }).setLngLat(center).addTo(mapShow);
}




