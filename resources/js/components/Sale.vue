<template>
    
            <div class="form-group">
                <label for="exampleInputEmail1">Product</label>
                <select v-model="formData.product_id" id="" class="form-control" @change="getBatches($event)" >
                    <option value="">Select</option>

                    <option v-for="product in products" :value="product.id" :key="product.id">
                    {{ product.name }}
                    </option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Batch</label>
                <select v-model="formData.batch" id="" class="form-control" @change="getProductStock($event)" >
                    <option value="">Select</option>

                    <option v-for="batch in batches" :value="batch" :key="batch">
                    {{ batch }}
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input type="number"  v-model="formData.stock" step="0.01" class="form-control" aria-describedby="emailHelp" placeholder="Stock" readonly>
            </div>
            

             <div class="form-group">
                <label for="exampleInputEmail1">Quantity</label>
                <input type="number"  v-model="formData.quantity"  class="form-control" aria-describedby="emailHelp" placeholder="Enter quantity" >
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
                batch:'',
                quantity: '',
                note: '',
                stock: 0
               
            },
            products: [],
            batches: []
            
        }
    },
    methods: {
        async getProducts() {
            const { data } = await axios.get("/api/get-all-products");
            this.products = data;
        },

        async getBatches(event) {
            const { data } = await axios.get(`/api/get-pur-batches/${event.target.value}`);
            this.batches = data;
        },

       async getProductById(event) {
            const { data } = await axios.get(`/api/get-product/${event.target.value}`);
            this.formData.price = data.price;
        },

        async getProductStock(event) {
            const { data } = await axios.get(`/api/get-product-stock/${this.formData.product_id}/${event.target.value}`);
            this.formData.stock = data.stock;
        },
        

        submitData() {
           
            axios.post(`/api/sale-create`, this.formData)
            window.location.href="/sale";

        },
    },
    mounted() {
        this.getProducts();
    },
    
}
</script>