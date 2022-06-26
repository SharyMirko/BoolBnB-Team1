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
      console.log('ciao')
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
