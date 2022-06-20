//eliminazione appartamento da dashboard
const btnDel = document.querySelectorAll('.btn-del');
const indexForm = document.querySelector('#indexForm');

btnDel.forEach(btn => {
   btn.addEventListener('click', function(){
      if (this.dataset.type == 'apartment') {
         indexForm.action = this.dataset.baseurl + '/' + this.dataset.id;
      } else {
         //nothing
      }
   });
});
