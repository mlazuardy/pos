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
            axios.get(`/api/products/${this.product.id}`).then(res => {
                this.product = res.data;
                $("#price").val(res.data.price);
            })
        }
     
    }
})