<template>
    <div class="container-fluid fontPokemon" style="max-width:60rem">
        <div class="d-flex justify-content-center ">
            <div class=" mb-5">
                <div class="card-header mb-5">
                    <h5 class="font-weight-bold d-flex justify-content-center">{{nom}}</h5>
                    <h6 class="d-flex justify-content-center">(No.{{id}})</h6>
                </div>
                <img :src="return_Image(image)" class="rounded mx-auto d-block " alt="no pokemon's image"
                    style="max-width: 30rem;">
                <div class="card-body">
                    <div v-if="type2!=''" class="row justify-content-center">
                        <p>
                            <img :src="return_type_written(type1)" class="card-img-top"
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
                    <div> 
                        <TabBar />
                    </div>
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
                id: this.$route.params.id,
                pokeInfo: {},
              description:"",
                type1: "",
                type2: "",
                image: "",
                nom: "",
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

<style scoped>
    .Fire {
        background: rgb(255, 0, 0);
        background: linear-gradient(214deg, rgba(255, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
        color: white;
    }


</style>