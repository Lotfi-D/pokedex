<template>
    <div class="mt-3">
        {{description}}
    </div>
</template>


<script>
    import axios from "axios"

    export default {
        name: 'DescriptionPokemon',
        components: {

        },
        props:{
            id:Number
        },
        data() {
            return {
                pokeInfo: {},
                description: "",
                type1: "", //On garde le type 1 et 2 et image pr le moment pour voir ce qu'on met ds tte la description
                type2: "",
                image: "",
                nom: "",
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
                            this.image = this.pokeInfo.Images[0].Images,
                            this.nom = this.pokeInfo.Name[0].nom_pok
                    })
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