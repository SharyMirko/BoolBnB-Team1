const { default: Axios } = require("axios");

require("../bootstrap");

import { default as ttServices } from '@tomtom-international/web-sdk-services';
import { default as ttMaps } from '@tomtom-international/web-sdk-maps';

const LandingPageVue = new Vue({
   el: "#LandingPageVue",
   render: (h) => h(LandingPageVue),
});




// Landing Slider
let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
   const minPerSlide = 3;

   let next = el.nextElementSibling;

   for (var i = 1; i < minPerSlide; i++) {
      if (!next) {
         // wrap carousel by using first child
         next = items[0]
      }

      let cloneChild = next.cloneNode(true)
      el.appendChild(cloneChild.children[0])
      next = next.nextElementSibling
   }
})

// form register validation

const FormRegisterVue = new Vue({
   el: "#registerModal",
   data: {
      email: "",
      password: "",
      password_confirmation: "",
      name: "",
      last_name: "",
      date:"",
      valid: false,
   },
   methods: {  
      register: function () {
         //validate email
         let btn = document.querySelector("#btnReg");
         if (this.email.match(/^([\w.%+-]+)@([\w-]+\.)+([\w]{2,})$/i) && 
         this.password.length > 5 &&
         this.password_confirmation === this.password &&
         this.name.length > 2 &&
         this.last_name.length > 2 &&
         this.date != "") {
            btn.disabled = false;
         } 
      }
   }
});

// form create

const FormCreateVue = new Vue({
   el: "#createModal",
   data: {
      title: "",
      category: "",
      price: "",
      description: "",
      address:"",
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
      create: function () {
      },
      addressSearch: function() {
         // API request to get address
         ttServices.services.geocode({
            key: 'SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE',
            query: this.address + " " + this.city
          }).then(
            function(response) {
               FormCreateVue.hiddenlat = response.results[0].position.lat;
               FormCreateVue.hiddenlon = response.results[0].position.lng;
               console.log(response.results[0]);
            });
        }
},
});
let longitude = document.getElementById("longitude");
let latitude = document.getElementById("latitude");
var center = [longitude.innerHTML, latitude.innerHTML];
let map = ttMaps.map({
   key: 'SzN6PUdLOxzY6usjVDt2ZoioaXJbt2fE',
   container: 'map',
   center: center,
    zoom: 15,
});
let marker = new ttMaps.Marker({
   draggable: false
}).setLngLat(center).addTo(map);
