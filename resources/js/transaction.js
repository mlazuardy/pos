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
        cart: {
            product_id:'',
            qty:1
        },
        shoppingCart:[],
        submitCart:false
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
        this.getCart();
    },
    methods: {
        getProduct(){
            axios.get(`/api/products/${this.product.id}`).then(res => this.product = res.data)
        },
        addToCart(){
            this.submitCart = true;
            axios.post('/api/cart',this.cart)
            .then((res) => {
                setTimeout(() => {
                    this.shoppingCart = res.data;
                    this.cart.product_id = '';
                    this.cart.qty = 1;
                    this.product = {
                        id:"",
                        price:'',
                        name:''
                    }
                    $('#product_id').val('')
                    this.submitCart = false;
                }, 1000);
            })
        },
        getCart(){
            axios.get('/api/cart').then(res => this.shoppingCart = res.data).catch(err => console.log(err.response))
        },
        removeCart(id) {
            axios.delete(`/api/cart/${id}`)
                .then((response) => {
                    //load cart yang baru
                    this.getCart();
                })
                .catch((error) => {
                    console.log(error);
                })
        }
    }
})