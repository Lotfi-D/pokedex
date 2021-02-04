<template>
    <div>
        <div v-if="idEvolution!=null && otherEvolution == false" class="mt-3 row justify-content-center text-center">
            <div class="card border-0">
                <img :src="return_ImagePokeBase(ImagePokemonBase)" alt="no pokemon's image" style="max-width: 5rem;">
                {{name}}
            </div>
            <span class="ml-5 mr-5" style='font-size:3rem;'>&#8594;</span>
            <div class="card border-0">
                <img :src="return_ImageEvolution(ImageEvolution)" alt="no pokemon's image" style="max-width: 5rem;">
                {{nomEvolution}}
            </div>
        </div>
        <div v-else-if="idEvolution!=null && otherEvolution == true "
            class="mt-3 row justify-content-center text-center">
            <div v-for="evolution in evolutions" :key="evolution.id_pok_evol" class="row mt-3">
                <div class="card border-0">
                    <img :src="return_ImagePokeBase(ImagePokemonBase)" alt="no pokemon's image"
                        style="max-width: 5rem;">
                    {{name}}
                </div>
                <span class="ml-5 mr-5" style='font-size:3rem;'>&#8594;</span>
                <div class="card border-0">
                    {{evolution.id_pok_evol}}
                    <img :src="returnImgageOtherEvolutions(evolution.id_pok_evol)" alt="no pokemon's image"
                        style="max-width: 5rem;">
                </div>
            </div>
        </div>
        <div v-else class="text-center mt-3">
            Ce pokémon n'a pas d'évolution selon le pokedex de Kanto
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
            name: String,
        },
        data() {
            return {
                pokeInfo: {},
                idEvolution: "",
                ImagePokemonBase: "",
                infoEvolution: "",
                ImageEvolution: "",
                nomEvolution: "",
                No: "",
                evolutions: "",
                otherEvolution: false
            }
        },
        beforeMount() {
            this.getPokemonIdEvolution();

        },


        methods: {
            Reload() {
                if (this.activeF == true) {
                    this.beforeMount()

                }
            },
            //Récupère le id de l'écolution du pokemon
            async getPokemonIdEvolution() {
                var myHeaders = new Headers();
                myHeaders.append("Authorization", "Bearer ");

                var requestOptions = {
                    method: 'GET',
                    headers: myHeaders,
                    redirect: 'follow'
                };
                await axios.get("http://127.0.0.1:8000/api/v1/pokedex/" + this.id, requestOptions)
                    .then(response => {
                        this.pokeInfo = response.data.data;
                        this.ImagePokemonBase = this.pokeInfo.Images[0].Images;
                        if (this.pokeInfo.Evolutions != "") {
                            this.evolutions = this.pokeInfo.Evolutions
                            this.idEvolution = this.pokeInfo.Evolutions[0].id_pok_evol
                            if (this.pokeInfo.Evolutions.length > 1) {
                                console.log("bjr")
                                this.otherEvolution = true
                            }
                        } else {
                            this.idEvolution = null
                        }
                    })
                if (this.idEvolution != null) {
                    await axios.get("http://127.0.0.1:8000/api/v1/pokedex/" + this.idEvolution, requestOptions)
                        .then(response => {
                            this.infoEvolution = response.data.data,
                                this.nomEvolution = this.infoEvolution.Name[0].nom_pok,
                                this.ImageEvolution = this.infoEvolution.Images[0].Images
                        })
                }

            },









            return_ImagePokeBase(ImagePokemonBase) {
                return `/assets/${ImagePokemonBase}`
            },
            return_ImageEvolution(ImageEvolution) {
                return `/assets/${ImageEvolution}`
            },
            returnImgageOtherEvolutions(id_pok_evol) {
                return `/assets/pokemon_image/${id_pok_evol}.png`
            },
        },
    }
</script>
<style>

</style>