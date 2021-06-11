<template>
    <div id="">
        <div class="tile">
            <h3 class="tile-title">Valeurs D'attribut</h3>
            <hr>
            <div class="tile-body">
                <div class="form-group">
                    <label class="control-label" for="value">Valeur</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Saisissez la valeur de l'attribut"
                        id="value"
                        name="value"
                        v-model="value"
                    />
                </div>
                <div class="form-group">
                    <label class="control-label" for="price">Prix</label>
                    <input
                        class="form-control"
                        type="text"
                        placeholder="Saisissez le prix "
                        id="price"
                        name="price"
                        v-model="price"
                    />
                </div>
            </div>
            <div class="tile-footer">
                <div class="row d-print-none mt-2">
                    <div class="col-12 text-right">
                        <button class="btn btn-success" type="submit" @click.stop="saveValue()" v-if="addValue">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Sauvegarder
                        </button>
                        <button class="btn btn-success" type="submit" @click.stop="updateValue()" v-if="!addValue">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Modifier
                        </button>
                        <button class="btn btn-primary" type="submit" @click.stop="reset()" v-if="!addValue">
                            <i class="fa fa-fw fa-lg fa-check-circle"></i>Annuler
                        </button>
                    </div>
                </div>
            </div>
        </div>
     <div class="tile">
        <h3 class="tile-title">Valeurs des options</h3>
        <div class="tile-body">
            <div class="table-responsive">
                <table class="table table-sm">
                    <thead>
                    <tr class="text-center">
                        <th>#</th>
                        <th>Valeur</th>
                        <th>Prix</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="value in values" v-bind:key="value.id">
                        <td style="width: 25%" class="text-center">{{ value.id}}</td>
                        <td style="width: 25%" class="text-center">{{ value.value}}</td>
                        <td style="width: 25%" class="text-center">{{ value.price}}</td>
                        <td style="width: 25%" class="text-center">
                            <button class="btn btn-sm btn-primary" @click.stop="editAttributeValue(value)">
                                    <i class="fa fa-edit"></i>
                                </button>
                            <button class="btn btn-sm btn-danger" @click.stop="deleteAttributeValue(value)">
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
        name: "attribute-values",
        props: ['attributeid'],
        data() {
            return {
                values: [],
                value: '',
                price: '',
                currentId: '',
                addValue: true,
                key: 0,
            }
        },
        created: function() {
            this.loadValues();
        },
        methods: {
            loadValues() {
                let attributeId = this.attributeid;
                let _this = this;
                axios.post('/admin/attributes/get-values', {
                    id: attributeId
                }).then (function(response){
                    _this.values = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            saveValue() {
                if (this.value === '' ) {
                    this.$swal("Erreur, la valeur de l'attribut est obligatoire.", {
                    icon: "error",
                    });
                } else {
                    let attributeId = this.attributeid;
                    let _this = this;
                    axios.post('/admin/attributes/add-values', {
                        id: attributeId,
                        value: _this.value,
                        price: _this.price,
                    }).then (function(response){
                        _this.values.push(response.data);
                        _this.resetValue();
                        _this.$swal("Succès! Valeur ajoutée avec succès!", {
                            icon: "success",
                        });
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
            editAttributeValue(value) {
                this.addValue = false;
                this.value = value.value;
                this.price = value.price;
                this.currentId = value.id;
                this.key = this.values.indexOf(value);
            },
            resetValue() {
                this.value = '';
                this.price = '';
            },
            reset() {
                this.addValue = true;
                this.resetValue();
            },
            updateValue() {
                if (this.value === '') {
                    this.$swal("Erreur, la valeur de l'attribut est obligatoire.", {
                        icon: "error",
                    });
                } else {
                    let attributeId = this.attributeid;
                    let _this = this;
                    axios.post('/admin/attributes/update-values', {
                        id: attributeId,
                        value: _this.value,
                        price: _this.price,
                        valueId: _this.currentId
                    }).then (function(response){
                        _this.values.splice(_this.key, 1);
                        _this.resetValue();
                        _this.values.push(response.data);
                        _this.$swal("Succès! Valeur modifiée avec succès!", {
                            icon: "success",
                        });
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            },
            deleteAttributeValue(value) {
                this.$swal({
                    title: "Êtes-vous sûr?",
                    text: "Une fois supprimé, vous ne pourrez pas récupérer cette valeur d'attribut!",
                    icon: "warning",
                    buttons: true,
                    buttons:['Annuler','Ok'],
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        this.currentId = value.id;
                        this.key = this.values.indexOf(value);
                        let _this = this;
                        axios.post('/admin/attributes/delete-values', {
                            id: _this.currentId
                        }).then (function(response){
                            if (response.data.status === 'success') {
                                _this.values.splice(_this.key, 1);
                                _this.resetValue();
                                _this.$swal("Succès! La valeur de l'option a été supprimée!", {
                                    icon: "success",
                                });
                            } else {
                                _this.$swal("La valeur de votre option n'est pas supprimée!");
                            }
                        }).catch(function (error) {
                            console.log(error);
                        });
                    } else {
                        this.$swal("La valeur de votre option n'est pas supprimée!");
                    }
                });
            },
        }
    }
</script>
