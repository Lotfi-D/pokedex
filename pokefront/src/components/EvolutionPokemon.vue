<template>
    <div>
        <div class="mt-3" v-if="idEvolution!=null">
            <img :src="return_ImagePokeBase(ImagePokemonBase)" class="rounded mx-auto d-block " alt="no pokemon's image"
                style="max-width: 5rem;">
            <img :src="return_Image(ImageEvolution)" class="rounded mx-auto d-block " alt="no pokemon's image"
                style="max-width: 5rem;">
        </div>
        <div v-else class="text-center mt-3">
            Ce pokémon n'a pas d'évolution selon le pokedex de Kanto
        </div>
    </div>
</template>


<script>
    import axios from "axios"

    export default {
        components: {

        },
        name: 'DescriptionPokemon',
        data() {
            return {
                id: this.$route.params.id,
                pokeInfo: {},
                idEvolution: "",
                ImagePokemonBase: "",
                infoEvolution: "",
                ImageEvolution: "",
                nomEvolution: "",
            }
        },
        beforeMount() {
            this.getPokemonIdEvolution()

        },
        methods: {
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
                        if (this.pokeInfo.Evolutions != "") {
                            this.idEvolution = this.pokeInfo.Evolutions[0].id_pok_evol
                        } else {
                            this.idEvolution = null
                        }
                        this.ImagePokemonBase = this.pokeInfo.Images[0].Images
                    })


                if (this.idEvolution != null) {
                    await axios.get("http://127.0.0.1:8000/api/v1/pokedex/" + this.idEvolution, requestOptions)
                        .then(response => {
                            this.infoEvolution = response.data.data,
                                this.nomEvolution = this.infoEvolution.Name[0].nom_pok
                            this.ImageEvolution = this.infoEvolution.Images[0].Images
                            console.log(this.ImageEvolution)
                        })
                }
            },
            return_ImagePokeBase(ImagePokemonBase) {
                return `/assets/${ImagePokemonBase}`
            },
            return_Image(ImageEvolution) {
                return `/assets/${ImageEvolution}`
            },
        },
    }
</script>