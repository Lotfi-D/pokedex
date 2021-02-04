<template>
    <div class="mt-3">
        <div class="row">
            <div class='col-5 text-justify font-weight-bold'>
                <p>Types:</p>
            </div>
            <div class='col text-justify'>
                <div v-if="type2!=''" class="row">
                    <p>
                        <img :src="return_type_written(type1)" class="card-img-top" alt=" no symbol of pokemon's type"
                            style="width:3rem;">
                        <img :src="return_type(type1)" class="card-img-top" alt=" no symbol of pokemon's type"
                            style="width:2rem;">/<img :src="return_type2_written(type2)" class="card-img-top"
                            alt=" no symbol of pokemon's type" style="width:3rem;">
                        <img :src="return_type2(type2)" class="card-img-top" alt=" no symbol of pokemon's type"
                            style="width:2rem;">
                    </p>
                </div>
                <div v-else class="row">
                    <p>
                        <img :src="return_type_written(type1)" class="card-img-top" alt=" no symbol of pokemon's type"
                            style="width:3rem;">
                    </p>
                    <p class="ml-1">
                        <img :src="return_type(type1)" class="card-img-top" alt=" no symbol of pokemon's type"
                            style="width:2rem;">
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class='col-5 text-justify font-weight-bold'>
                <p>Height:</p>
                <p>Weight:</p>
                <p>{{name}}'s cry</p>
            </div>

            <div class='col text-justify'>
                <p>{{height}} m</p>
                <p>{{weight}} Kg</p>
                <button class="btn btn-sm ButtonCry font-weight-bold" v-on:click="pokeCries(id)">
                    Go!
                </button>

            </div>
        </div>
        <div class="text-justify mt-3">
            <p class="font-weight-bold">Description:</p>
            <p>{{description}}</p>
        </div>
    </div>
</template>


<script>
    import axios from "axios"

    export default {
        name: 'DescriptionPokemon',
        components: {

        },
        props: {
            id: Number,
            name:String,
        },
        data() {
            return {
                pokeInfo: {},
                description: "",
                type1: "", //On garde le type 1 et 2 et image pr le moment pour voir ce qu'on met ds tte la description
                type2: "",
                height: "",
                weight: "",
            }
        },
        beforeMount() {
            this.getPokemonDescription()
        },

        methods: {
            async getPokemonDescription() {
                var myHeaders = new Headers();
                myHeaders.append("Authorization", "Bearer ");

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow'
                };
                await axios.get("http://127.0.0.1:8000/api/v1/pokedex/" + this.id, requestOptions)
                    .then(response => {
                        this.pokeInfo = response.data.data,
                            this.description = this.pokeInfo.Description[0].description,
                            this.type1 = this.pokeInfo.Types[0].type1,
                            this.type2 = this.pokeInfo.Types[0].type2,
                            this.height = this.pokeInfo.Information[0].height,
                            this.weight = this.pokeInfo.Information[0].weight
                    })
            },
            return_type(type1) {
                return `/assets/types/${type1}` + `.png`
            },
            return_type2(type2) {
                return `/assets/types/${type2}` + `.png`
            },
            return_type_written(type1) {
                return `/assets/types_ecriture/${type1}` + `.png`
            },
            return_type2_written(type2) {
                return `/assets/types_ecriture/${type2}` + `.png`
            },
            pokeCries(id) {
                var audio = new Audio(`/assets/pokemon-cries/cries/${id}.ogg`);
                audio.play();
            }
        },
    }
</script>
<style>
    .ButtonCry {
        border-radius: 50%;
        background: rgb(250, 0, 0);
        background: linear-gradient(180deg, rgba(250, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 50%, rgba(255, 255, 255, 1) 100%);
        color: white;
        border: solid;
        border-color: black;

    }
</style>