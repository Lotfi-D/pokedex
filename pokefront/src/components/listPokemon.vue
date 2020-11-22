<template>
    <div class="container-fluid fontPokemon" style="max-width:80rem">
        <div class="row justify-content-center">
            <div v-for="pokemon in pokemons.data" :key="pokemon.id_pok" class="card ml-2 mt-2">
                <router-link v-bind:to="'/Pokemon/' + pokemon.id">
                    <img :src="return_Link(pokemon)" class="card-img-top border test" alt="no pokemon's image"
                        style="width: 15rem;">
                </router-link>
                <div class="card-body">
                    <h5 class="font-weight-bold"> {{pokemon.nom_pok}}</h5>
                    <h6>(No.{{pokemon.id}})</h6>
                    <div v-if="pokemon.type2!=''" class="row justify-content-center">
                        <p>
                            <img :src="return_type_written(pokemon)" class="card-img-top"
                                alt=" no symbol of pokemon's type" style="width:3rem;">
                        </p>
                        <p class="ml-1">
                            <img :src="return_type(pokemon)" class="card-img-top" alt=" no symbol of pokemon's type"
                                style="width:2rem;">/
                        </p>
                        <p class="ml-1">
                            <img :src="return_type2_written(pokemon)" class="card-img-top"
                                alt=" no symbol of pokemon's type" style="width:3rem;">
                        </p>
                        <p class="ml-1">
                            <img :src="return_type2(pokemon)" class="card-img-top" alt=" no symbol of pokemon's type"
                                style="width:2rem;">
                        </p>
                    </div>
                    <div v-else class="row justify-content-center">
                        <p>
                            <img :src="return_type_written(pokemon)" class="card-img-top"
                                alt=" no symbol of pokemon's type" style="width:3rem;">
                        </p>
                        <p class="ml-1">
                            <img :src="return_type(pokemon)" class="card-img-top" alt=" no symbol of pokemon's type"
                                style="width:2rem;">
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import axios from "axios"

    export default {
        name: 'listPokemon',
        data() {
            return {
                pokemons: {},
            }

        },

        beforeMount() {
            this.listPokemon()
        },

        methods: {
            async listPokemon() {
                var myHeaders = new Headers();
                myHeaders.append("Authorization", "Bearer ");

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow'
                };
                this.pokemons = await axios.get("http://127.0.0.1:8000/api/v1/pokedex/", requestOptions)
                console.log(this.pokemons.data)
            },
            return_Link(pokemon) {
                return `/assets/${pokemon.image}`
            },
            return_type(pokemon) {
                return `/assets/types/${pokemon.type1}` + `.png`
            },
            return_type2(pokemon) {
                return `/assets/types/${pokemon.type2}` + `.png`
            },
            return_type_written(pokemon) {
                return `/assets/types_ecriture/${pokemon.type1}` + `.png`
            },
            return_type2_written(pokemon) {
                return `/assets/types_ecriture/${pokemon.type2}` + `.png`
            }
        },

    }
</script>

<style>

.fontPokemon {
  font-size: 30px;
  -webkit-font-smoothing: none;
  font-family: "pokemon-font", monospace;
}

.test{
background-color: #000000;
background-image: linear-gradient(45deg, #000000 0%, #00f736 100%);



}

</style>