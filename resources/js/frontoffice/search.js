const { default: Axios } = require("axios");

const SearchVue = new Vue({
   el: "#searchApp",
   data: {
      location: "",
      results: [],
      loading: false,
   },
   methods: {
      search: function () {
         this.loading = true;
      },
   },
});
