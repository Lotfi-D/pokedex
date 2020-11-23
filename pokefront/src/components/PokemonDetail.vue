<template>
    <div  class="container-fluid fontPokemon" style="max-width:80rem">
         <img :src="return_Image(image)" class="card-img-top" style="width: 15rem;">

{{description}}{{id}}

        <div v-if="type2!=''" class="row justify-content-center">
                        <p>
                            <img :src="return_type_written(type2)" class="card-img-top"
                                alt=" no symbol of pokemon's type" style="width:3rem;">
                        </p>
                        <p class="ml-1">
                            <img :src="return_type(type1)" class="card-img-top" alt=" no symbol of pokemon's type"
                                style="width:2rem;">/
                        </p>
                        <p class="ml-1">
                            <img :src="return_type2_written(type2)" class="card-img-top"
                                alt=" no symbol of pokemon's type" style="width:3rem;">
                        </p>
                        <p class="ml-1">
                            <img :src="return_type2(type2)" class="card-img-top" alt=" no symbol of pokemon's type"
                                style="width:2rem;">
                        </p>
                    </div>
                    <div v-else class="row justify-content-center">
                        <p>
                            <img :src="return_type_written(type1)" class="card-img-top"
                                alt=" no symbol of pokemon's type" style="width:3rem;">
                        </p>
                        <p class="ml-1">
                            <img :src="return_type(type1)" class="card-img-top" alt=" no symbol of pokemon's type"
                                style="width:2rem;">
                        </p>
                    </div>

    </div>
</template>


<script>
    import axios from "axios"

    export default {
        name: 'PokemonDetail',
        data() {
            return {
                id: this.$route.params.id,
                pokeInfo: {},
                description:"",
                type1:"",
                type2:"",
                image:"",

            }
        },

        beforeMount() {
            this.getPokemonInformation()
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
                .then(response => { this.pokeInfo = response.data.data, 
                this.description = this.pokeInfo.Description[0].description
                this.type1=this.pokeInfo.Types[0].type1,
                this.type2=this.pokeInfo.Types[0].type2,
                this.image=this.pokeInfo.Images[0].Images
                })
                console.log(this.type1)
                //console.log(this.pokeInfo.data.data.Types[0].type1)
                // console.log(this.pokemons.data[0].type1)
            },
            return_Image(image) {
                return `/assets/${image}`
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

        },

    }
</script>