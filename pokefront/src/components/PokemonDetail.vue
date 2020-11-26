<template>
    <div class="container fontPokemon" style="max-width:60rem">
        <router-link v-bind:to="'/pokedex/' + id">
            <a v-on:click="nextPokemon()">
                suivant
            </a>
        </router-link>
        <router-link v-bind:to="'/pokedex/' + id">
            <a v-on:click="previousPokemon()">
                precedent {{activateFunctions}}
            </a>
        </router-link>
        <div class="d-flex justify-content-center ">
            <div class=" mb-5">
                <div class="card-header mb-5">
                    <h5 class="font-weight-bold d-flex justify-content-center">{{name}}</h5>
                    <h6 class="d-flex justify-content-center">(No.{{id}})</h6>
                </div>
                <img :src="return_Image(image)" class="rounded mx-auto d-block container-fluid" alt="no pokemon's image"
                    style="max-width: 30rem;">
                    <div class=mt-5>
                        <TabBar :id="id" :name="name" style="min-width:20rem; max-width:30rem" />
                    </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from "axios"
    import TabBar from '@/components/TabBar.vue'

    export default {
        components: {
            TabBar
        },
        name: 'PokemonDetail',
        data() {
            return {
                id: Number(this.$route.params.id),
                pokeInfo: {},
                description: "",
                type1: "",
                type2: "",
                image: "",
                name: "",
                activateFunctions: false
            }
        },
        beforeMount() {
            this.getPokemonInformation();
        },
        methods: {
            async getPokemonInformation() {
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
                            this.image = this.pokeInfo.Images[0].Images,
                            this.name = this.pokeInfo.Name[0].nom_pok
                            this.activateFunctions = false
                    })
                    .catch((error) => console.log(error));
            },
            nextPokemon() {
                this.id++;
                this.getPokemonInformation();
                return this.activateFunctions = true
            },
            previousPokemon() {
                this.id--;
                this.getPokemonInformation();
            },
            return_Image(image) {
                return `/assets/${image}`
            },
            return_type(type1) {
                return `/assets/types/${type1}.png`
            },
            return_type2(type2) {
                return `/assets/types/${type2}.png`
            },
            return_type_written(type1) {
                return `/assets/types_ecriture/${type1}.png`
            },
            return_type2_written(type2) {
                return `/assets/types_ecriture/${type2}.png`
            },
        },
    }
</script>

<style scoped>
    .Fire {
        background: rgb(255, 0, 0);
        background: linear-gradient(214deg, rgba(255, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
        color: white;
    }

</style>