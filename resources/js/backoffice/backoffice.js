//eliminazione appartamento da dashboard
const btnDel = document.querySelectorAll('.btn-del');
const indexForm = document.querySelector('#indexForm');

if (btnDel) {
   btnDel.forEach(btn => {
      btn.addEventListener('click', function(){
         if (this.dataset.type == 'apartment') {
            indexForm.action = this.dataset.baseurl + '/' + this.dataset.id;
         } else {
            //nothing
         }
      });
   });
}



// anterprima thumb in create
if (document.querySelector("#thumbCreate")) {
   document.querySelector("#thumbCreate").addEventListener('change', function(){
      readURL(this);
   });
}

function readURL(input) {
   if (input.files && input.files[0]) {
      let reader = new FileReader();

      reader.onload = function (e) {
         document.querySelector('#thumb-preview').src = e.target.result;
      }

      reader.readAsDataURL(input.files[0]);
   }
}



// payment app
let btnPromo24 = document.getElementById('promo24btn');
let btnPromo72 = document.getElementById('promo72btn');
let btnPromo144 = document.getElementById('promo144btn');
let amount = document.getElementById('amount');
let amoutshow = document.getElementById('selectedamount');

if (btnPromo24 && btnPromo72 && btnPromo144) {
   btnPromo24.addEventListener('click', function(){
      amount.setAttribute("value", "2.99");
      amoutshow.innerHTML = "2,99";
   });

   btnPromo72.addEventListener('click', function(){
      amount.setAttribute("value", "5.99");
      amoutshow.innerHTML = "5,99";
   });

   btnPromo144.addEventListener('click', function(){
      amount.setAttribute("value", "9.99");
      amoutshow.innerHTML = "9,99";
   })
}
