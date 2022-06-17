require("../bootstrap");
require("./comuni.js");

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