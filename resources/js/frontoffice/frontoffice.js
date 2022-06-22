const { default: Axios } = require("axios");

require("../bootstrap");

import { default as ttServices } from "@tomtom-international/web-sdk-services";
import { default as tt } from "@tomtom-international/web-sdk-services";
import { default as ttMaps } from "@tomtom-international/web-sdk-maps";
import { forEach, indexOf } from "lodash";

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
      valid: false,
   },
   methods: {
      register: function () {
         //validate email
         let btn = document.querySelector("#btnReg");
         if (
            this.email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) &&
            this.password.length > 5 &&
            this.password_confirmation === this.password &&
            this.name.length > 2 &&
            this.last_name.length > 2 &&
            this.date != ""
         ) {
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
      location: "",
      results: [],
      nRes: 0,
      link: "apartments/",
      loading: false,
      nBeds: "",
      services: [],
      nRooms: "",
      maxDistance: 20000
   },
   methods: {
      search() {
         Axios.get("/api/api-artments?city=" + this.location).then(
            (response) => {
               SearchVue.results = response.data.response.data;
               SearchVue.nRes = response.data.response.data.length;

            }
         );
      },
      applyFilter() {
            if(/*SearchVue.nBeds != "" &&*/ SearchVue.nRooms != ""){
               Axios.get("/api/api-artments?" + "beds=" + this.nBeds + "&rooms=" + this.nRooms)
                  .then((response) => {

                     response.data.response.data.forEach(apartment => {

                        tt.services.calculateRoute({
                           key: "SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE",
                           locations: apartment.longitude + ',' + apartment.latitude + ':' + '9.18' + ',' + '45.48',
                        })
                        .then(function(routeData) {
                           let dist = routeData.toGeoJson().features[0].properties.summary.lengthInMeters;

                           if(dist < SearchVue.maxDistance){
                              SearchVue.results.push(apartment);
                           };

                           SearchVue.nRes = SearchVue.results.length;
                        });

                     });
                  });
            }

            if (SearchVue.nBeds != "") {
               Axios.get("/api/api-artments?city=" + this.location + "&beds=" + this.nBeds).then(
                  (response) => {
                     SearchVue.results = response.data.response.data;
                     SearchVue.nRes = response.data.response.data.length;
                  }
               );
            }

            // if (SearchVue.nRooms != "") {
            //    Axios.get("/api/api-artments?city=" + this.location + "&rooms=" + this.nRooms).then(
            //       (response) => {
            //          SearchVue.results = response.data.response.data;
            //          SearchVue.nRes = response.data.response.data.length;
            //       }
            //    );
            // }

            if(SearchVue.services.length > 0){
               Axios.get("/api/api-artments?city=" + this.location + "&services=" + SearchVue.services[0]).then(
                  (response) => {
                     console.log(SearchVue.services[0]);
                     SearchVue.results = response.data.response.data;
                     SearchVue.nRes = response.data.response.data.length;
                  }
               );
            }

            if (SearchVue.services.length > 0 && SearchVue.nBeds != "" && SearchVue.nRooms != "") {
               Axios.get("/api/api-artments?city=" + this.location + "&services=" + SearchVue.services[0] + "&rooms=" + this.nRooms  + "&beds=" + this.nBeds).then(
                  (response) => {
                     console.log(SearchVue.services[0]);
                     SearchVue.results = response.data.response.data;
                     SearchVue.nRes = response.data.response.data.length;
                  }
               );
            }
            if (SearchVue.services.length > 0 && SearchVue.nBeds != "") {
               Axios.get("/api/api-artments?city=" + this.location + "&services=" + SearchVue.services[0] + "&beds=" + this.nBeds).then(
                  (response) => {
                     console.log(SearchVue.services[0]);
                     SearchVue.results = response.data.response.data;
                     SearchVue.nRes = response.data.response.data.length;
                  }
               );
            }
            if (SearchVue.services.length > 0 && SearchVue.nRooms != "") {
               Axios.get("/api/api-artments?city=" + this.location + "&services=" + SearchVue.services[0] + "&rooms=" + this.nRooms).then(
                  (response) => {
                     console.log(SearchVue.services[0]);
                     SearchVue.results = response.data.response.data;
                     SearchVue.nRes = response.data.response.data.length;
                  }
               );
            }
         },
         setService(e) {
            if(e.target.checked){
               SearchVue.services.push(e.target.value);

            }
            if(e.target.checked == false){
               SearchVue.services.splice(indexOf(SearchVue.services, e.target.value), 1);
            }
         }
      }
   },
);


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
