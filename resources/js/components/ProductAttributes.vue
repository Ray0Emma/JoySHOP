<template>
    <div>
        <div class="tile">
            <h3 class="tile-title">Attributs</h3>
            <hr>
            <div class="tile-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="parent">Sélectionnez un Attribut <span class="m-l-5 text-danger"> *</span></label>
                            <select id=parent class="form-control custom-select mt-15" v-model="attribute" @change="selectAttribute(attribute)">
                                <option :value="attribute" v-for="attribute in attributes" :key="attribute.name">
                                     {{ attribute.name }}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tile" v-if="attributeSelected">
            <h3 class="tile-title">Ajouter des Attributs au Produit</h3>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="values">Sélectionnez une valeur <span class="m-l-5 text-danger"> *</span></label>
                        <select id=values class="form-control custom-select mt-15" v-model="value" @change="selectValue(value)">
                            <option :value="value" v-for="value in attributeValues" v-bind:key="value.value">
                                 {{ value.value }}
                            </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row" v-if="valueSelected">
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="quantity">Quantité</label>
                        <input class="form-control" type="number" id="quantity" v-model="currentQty"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="price">Prix</label>
                        <input class="form-control" type="text" id="price" v-model="currentPrice"/>
                        <small class="text-danger">Ce prix sera ajouté au prix principal du produit sur l'interface d'utilisateur.</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <button class="btn btn-sm btn-primary" @click="addProductAttribute()">
                        <i class="fa fa-plus"></i> Ajouter
                    </button>
                </div>
            </div>
        </div>
        <div class="tile">
            <h3 class="tile-title">Attributs du Produit</h3>
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                        <tr class="text-center">
                            <th>Valeur</th>
                            <th>Quantité</th>
                            <th>Prix</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="pa in productAttributes" v-bind:key="pa.value">
                            <td style="width: 25%" class="text-center">{{ pa.value}}</td>
                            <td style="width: 25%" class="text-center">{{ pa.quantity}}</td>
                            <td style="width: 25%" class="text-center">{{ pa.price}}</td>
                            <td style="width: 25%" class="text-center">
                                <button class="btn btn-sm btn-danger" @click="deleteProductAttribute(pa)">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "product-attributes",
        props: ['productid'],
        data() {
            return {
                productAttributes: [],
                attribute:'',
                attributes: [],
                attributes: {},
                attributeSelected: false,
                attributeValues: [],
                value: {},
                valueSelected: false,
                currentAttributeId: '',
                currentValue: '',
                currentQty: '',
                currentPrice: '',
            }
        },

        /**
         * lifecycle hook of VueJS
         * load all the product attributes for our current product.
         */
        created: function() {
            this.loadAttributes();
            this.loadProductAttributes(this.productid);
        },
        methods: {
            loadAttributes() {
                let _this = this;
                axios.get('/admin/products/attributes/load').then (function(response){
                    _this.attributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            loadProductAttributes(id) {
                let _this = this;
                // We intend to perform a post request with axios.post
                // which takes the route and the data as parameters.
                axios.post('/admin/products/attributes', {
                    id: id
                }).then (function(response){
                    _this.productAttributes = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },selectAttribute(attribute) {
                let _this = this;
                this.currentAttributeId = attribute.id;
                axios.post('/admin/products/attributes/values', {
                    id: attribute.id
                }).then (function(response){
                    _this.attributeValues = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
                this.attributeSelected = true;
            },
            selectValue(value) {
                this.valueSelected = true;
                this.currentValue = value.value;
                this.currentQty = value.quantity;
                this.currentPrice = value.price;
            },
            addProductAttribute() {
                if (this.currentQty === null || this.currentPrice === null) {
                    this.$swal("Erreur, certaines valeurs sont manquantes.", {
                        icon: "error",
                    });
                } else {
                    let _this = this;
                    let data = {
                        attribute_id: this.currentAttributeId,
                        value:  this.currentValue,
                        quantity: this.currentQty,
                        price: this.currentPrice,
                        product_id: this.productid,
                    };

                    axios.post('/admin/products/attributes/add', {
                        data: data
                    }).then (function(response){
                        _this.$swal("Succès! " + response.data.message, {
                            icon: "success",
                        });
                        _this.currentValue = '';
                        _this.currentQty = '';
                        _this.currentPrice = '';
                        _this.valueSelected = false;
                    }).catch(function (error) {
                        console.log(error);
                    });
                    this.loadProductAttributes(this.productid);
                }
            },
            deleteProductAttribute(pa) {
                let _this = this;
                this.$swal({
                    title: "Êtes-vous sûr?",
                    text: "Une fois supprimées, vous ne pourrez pas récupérer ces données!",
                    icon: "warning",
                    buttons: true,
                    buttons:['Annuler','Ok'],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        console.log(pa.id);
                        axios.post('/admin/products/attributes/delete', {
                            id: pa.id,
                        }).then (function(response){
                            if (response.data.status === 'success') {
                                _this.$swal("Succès! L'attribut de produit a été supprimé !", {
                                    icon: "success",
                                });
                                _this.loadProductAttributes(_this.productid);
                            } else {
                                _this.$swal("Votre attribut de produit n'est pas supprimé!");
                            }
                        }).catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal("Action annulée!");
                    }
                });

            }
        }
    }
</script>
