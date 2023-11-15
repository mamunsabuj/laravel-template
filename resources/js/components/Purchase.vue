<template>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Product</label>
                <select v-model="formData.product_id" id="" class="form-control" @change="getProductById($event)" >
                    <option value="">Select</option>

                    <option v-for="product in products" :value="product.id" :key="product.id">
                    {{ product.name }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Price</label>
                <input type="number"  v-model="formData.price" step="0.01" class="form-control" aria-describedby="emailHelp" placeholder="Enter price">
            </div>

             <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="number"  v-model="formData.quantity"  class="form-control" aria-describedby="emailHelp" placeholder="Enter price">
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Note</label>
                <textarea v-model="formData.note"  class="form-control" id="" cols="30" rows="3"></textarea>
            </div>
            <br>
            <div class="form-group ">
                
                <button class="btn btn-primary" @click="submitData" >Submit</button>
            </div>


</template>

<script>
import axios from "axios";
export default {
    name: 'purcahse',
    data () {
        return {
            formData: {
                product_id: '',
                price: '',
                quantity: '',
                note: ''
            },
            products: []
            
        }
    },
    methods: {
        async getProducts() {
            const { data } = await axios.get("/api/get-all-products");
            this.products = data;
        },

       async getProductById(event) {
            const { data } = await axios.get(`/api/get-product/${event.target.value}`);
            this.formData.price = data.price;
        },

        async submitData() {
            const res = await axios.post(`/api/purchase-create`, this.formData);
           window.location.href="/purchase";

        },
    },
    mounted() {
        this.getProducts();
    },
    
}
</script>