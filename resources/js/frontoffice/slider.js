const SliderThing = new Vue({
    el: "#sliderVue",

    data:{
        elementOrder: 0,
        apartments: [
            {
                name: 'blablacar',
                location: 'roma',
                type: 'hotel'
            },
            {
                name: 'hehehehe',
                location: 'torino',
                type: 'motel'
            },
            {
                name: 'blablacar',
                location: 'milano',
                type: 'b&b'
            },
            {
                name: 'lololol',
                location: 'lazio',
                type: 'b&b'
            },
        ]
    },

    methods:{
        forward(){
            if(this.elementOrder == this.apartments.length - 1){
                this.elementOrder = 0;
            } else {
                this.elementOrder++;
                console.log(this.elementOrder);
            }
        },
        backward(){
            if(this.elementOrder == 0){
                this.elementOrder = this.apartments.length - 1;
            } else {
                this.elementOrder--
            }
        },
        currentSlide(){
        }
    }
});

let items = document.querySelectorAll('.carousel .carousel-item')

items.forEach((el) => {
    const minPerSlide = 4
    let next = el.nextElementSibling
    for (var i=1; i<minPerSlide; i++) {
        if (!next) {
            // wrap carousel by using first child
        	next = items[0]
      	}
        let cloneChild = next.cloneNode(true)
        el.appendChild(cloneChild.children[0])
        next = next.nextElementSibling
    }
})
 