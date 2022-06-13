const { default: Axios } = require("axios");

const landinSearch = new Vue({
   el: "#jumbotron",
   data: {
      search: "",
      comuni: [],
      resultComuni: [],
   },
   methods: {
      searchComuni: function () {
         if (this.search.length > 0) {
            for (i = 0; i < this.comuni.length; i++) {
               if (
                  this.comuni[i].substr(0, this.search.length).toUpperCase() ==
                  this.search.toUpperCase()
               ) {
                  if (!this.resultComuni.includes(this.comuni[i])) {
                     this.resultComuni.unshift(this.comuni[i]);
                  }
               }
            }
         }
      },
      setComune: function (comune) {
         this.search = comune;
         this.resultComuni = [];
      },
   },
   created: function () {
      Axios.get(
         "https://comuni-ita.herokuapp.com/api/province?onlyname=true"
      ).then((response) => {
         this.comuni = response.data;
      });
   },
});
