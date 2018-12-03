import Vue from 'vue';
import axios from 'axios';

new Vue({
    el:"#ts",
    data: {
        product: {
            id: '',
            qty: '',
            price: '',
            name: '',
            image: ''
        },
    },
    watch: {
        'product.id': function () {
            if (this.product.id) {
                this.getProduct()
            }
        }
    },
    mounted() {
        $('#product_id').select2({
            width: '100%'
        }).on('change', () => {
            this.product.id = $('#product_id').val();
        });
     
    },
    methods: {
        getProduct(){
            axios.get(`/api/products/${this.product.id}`,{
                headers:{
                    'Accept':'application/json',
                    'Authorization':'Bearer qvXOdIRHOl2Jq7fEr4BjtkbdsK71gG44Fh4kESgDqH2Fja9nzAad2qKYvBaI'
                }
            }).then(res => {
                this.product = res.data;
                $("#price").val(res.data.price);
            })
        }
     
    }
})