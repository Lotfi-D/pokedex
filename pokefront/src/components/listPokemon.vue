<template>
    <div class="container-fluid fontPokemon" style="max-width:80rem">
        <div class="btn-group">
            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                Pokedex's color
            </button>
            <div class="dropdown-menu ">
                <a v-on:click="white" type="button" class="bgcardwhite color-box border ml-2"></a>
                <a v-on:click="black" type="button" class="bgcardblack color-box border ml-2"></a>
                <a v-on:click="blue" type="button" class="bgcardblue color-box ml-2"></a>
                <a v-on:click="grey" type="button" class="bgcardgrey color-box border ml-2"></a>
                <a v-on:click="purple" type="button" class="bgcardpurple color-box ml-2"></a>
                <a v-on:click="redpurple" type="button" class="bgcardredpurple color-box ml-2"></a>
                <a v-on:click="red" type="button" class="bgcardred color-box ml-2"></a>
                <a v-on:click="lightBlue" type="button" class="bgcardLightBlue color-box ml-2"></a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div v-for="pokemon in pokemons.data" :key="pokemon.id_pok" class="card ml-2 mt-2">
                <router-link v-bind:to="'/pokedex/' + pokemon.id">
                    <img :src="return_Link(pokemon)" class="card-img-top" v-bind:class="{Grass: pokemon.type1=='grass', Fire :pokemon.type1=='fire', 
                            Water :pokemon.type1=='water', Poison :pokemon.type1=='poison', Flying :pokemon.type1=='flying',
                            Bug :pokemon.type1=='bug', Normal :pokemon.type1=='normal', Dark :pokemon.type1=='dark',
                            Ice :pokemon.type1=='ice',Ground :pokemon.type1=='ground', Electric :pokemon.type1=='electric',
                            Fairy :pokemon.type1=='fairy',Psychic :pokemon.type1=='psychic', Fighting :pokemon.type1=='fighting',
                            Rock :pokemon.type1=='rock', Steel :pokemon.type1=='steel',Ghost :pokemon.type1=='ghost',
                            Dragon :pokemon.type1=='dragon',}" alt="no pokemon's image" style="width: 15rem;">
                </router-link>
                <div class="card-body " v-bind:class="{bgcardblack: color_cardBody=='black', bgcardgrey: color_cardBody=='grey', bgcardblue: color_cardBody=='blue',
                bgcardwhite: color_cardBody=='white', bgcardpurple: color_cardBody=='purple', bgcardredpurple: color_cardBody=='redpurple', bgcardred:color_cardBody=='red',
                bgcardLightBlue:color_cardBody=='lightBlue'}">
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
                color_cardBody: "white",
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
                await axios.get("http://127.0.0.1:8000/api/v1/pokedex/", requestOptions)
                .then(response => { this.pokemons = response})
                console.log(this.pokemons.data)
                // console.log(this.pokemons.data[0].type1)
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
            },
            white() {
                return this.color_cardBody = "white"
            },
            black() {
                return this.color_cardBody = "black"
            },
            grey() {
                return this.color_cardBody = "grey"
            },
            blue() {
                return this.color_cardBody = "blue"
            },
            purple() {
                return this.color_cardBody = "purple"
            },
            redpurple() {
                return this.color_cardBody = "redpurple"
            },
            red() {
                return this.color_cardBody = "red"
            },
            lightBlue() {
                return this.color_cardBody = "lightBlue"
            },
        },

    }
</script>

<style scoped>
    .fontPokemon {
        font-size: 30px;
        -webkit-font-smoothing: none;
        font-family: "pokemon-font", monospace;
    }

    .Grass {
        background: rgb(0, 0, 0);
        background: linear-gradient(49deg, rgba(0, 0, 0, 1) 0%, rgba(32, 150, 32, 1) 40%, rgba(22, 255, 0, 1) 90%);
    }

    .Fire {
        background: rgb(255, 0, 0);
        background: linear-gradient(214deg, rgba(255, 0, 0, 1) 0%, rgba(0, 0, 0, 1) 100%);
    }

    .Fairy {
        background-image: linear-gradient(-20deg, #ddd6f3 0%, #faaca8 100%, #faaca8 100%);
    }

    .Water {
        background-color: #0033ff;
        background-image: linear-gradient(34deg, #0033ff 0%, #00e2ff 100%);

    }

    .Poison {
        background-color: #5300de;
        background-image: linear-gradient(27deg, #5300de 0%, #FC00FF 100%);
    }

    .Psychic {
        background: rgb(0, 0, 0);
        background: linear-gradient(0deg, rgba(0, 0, 0, 1) 0%, rgba(252, 82, 249, 1) 48%, rgba(0, 0, 0, 1) 100%);
    }

    .Bug {
        background: rgb(0, 210, 0);
        background: linear-gradient(227deg, rgba(0, 210, 0, 1) 5%, rgba(62, 255, 62, 1) 39%, rgba(159, 238, 159, 1) 62%);
    }

    .Ice {
        background-color: #00ffc7;
        background-image: linear-gradient(34deg, #00ffc7 0%, #009dd8 100%);
    }

    .Flying {
        background: rgb(187, 223, 255);
        background: linear-gradient(0deg, rgba(187, 223, 255, 1) 0%, rgba(255, 255, 255, 1) 46%, rgba(37, 142, 238, 1) 100%);
    }

    .Steel {
        background: rgb(178, 178, 178);
        background: linear-gradient(23deg, rgba(178, 178, 178, 1) 0%, rgba(255, 255, 255, 1) 51%, rgba(106, 106, 106, 1) 100%);
    }

    .Ghost {
        background: rgb(43, 0, 96);
        background: linear-gradient(18deg, rgba(43, 0, 96, 1) 3%, rgba(189, 189, 189, 1) 44%, rgba(0, 0, 0, 1) 84%);
    }

    .Dragon {
        background-color: #FBAB7E;
        background-image: linear-gradient(62deg, #FBAB7E 0%, #F7CE68 100%);
    }

    .Electric {
        background: rgb(0, 0, 0);
        background: linear-gradient(38deg, rgba(0, 0, 0, 1) 5%, rgba(255, 223, 0, 1) 41%, rgba(247, 255, 62, 1) 73%);
    }

    .Rock {
        background: rgb(0, 0, 0);
        background: linear-gradient(23deg, rgba(0, 0, 0, 1) 9%, rgba(182, 109, 52, 1) 42%, rgba(121, 53, 0, 1) 74%);
    }

    .Ground {
        background: rgb(110, 107, 99);
        background: linear-gradient(23deg, rgba(110, 107, 99, 1) 40%, rgba(125, 67, 22, 1) 89%);
    }

    .Fighting {
        background: rgb(131, 41, 11);
        background: linear-gradient(23deg, rgba(131, 41, 11, 1) 22%, rgba(218, 69, 10, 1) 47%, rgba(255, 30, 0, 1) 82%);
    }

    .Dark {
        background: rgb(0, 0, 0);
        background: linear-gradient(23deg, rgba(0, 0, 0, 1) 16%, rgba(34, 34, 34, 1) 52%, rgba(106, 106, 106, 1) 96%);
    }

    .Normal {
        background: rgb(52, 52, 52);
        background: linear-gradient(0deg, rgba(52, 52, 52, 1) 0%, rgba(255, 255, 255, 1) 50%, rgba(177, 177, 177, 1) 100%);
    }

    .bgcardblack {
        background: rgb(0, 0, 0);
        color: white
    }

    .bgcardgrey {
        background: rgb(178, 178, 178);
        background: linear-gradient(23deg, rgba(178, 178, 178, 1) 40%, rgba(255, 255, 255, 1) 100%);
        color: black
    }

    .bgcardblue {
        background: rgb(0, 0, 0);
        background: linear-gradient(23deg, rgba(0, 0, 0, 1) 22%, rgba(24, 47, 186, 1) 70%, rgba(0, 45, 255, 1) 100%);
        color: white
    }

    .bgcardwhite {
        color: black
    }

    .bgcardLightBlue {
        background: rgb(0, 0, 0);
        background: linear-gradient(13deg, rgba(0, 0, 0, 1) 11%, rgba(0, 247, 255, 1) 68%);
        color: black
    }

    .bgcardredpurple {
        background: rgb(77, 0, 154);
        background: linear-gradient(23deg, rgba(77, 0, 154, 1) 25%, rgba(227, 108, 78, 1) 59%, rgba(255, 0, 0, 1) 94%);
        color: white
    }

    .bgcardpurple {
        background: rgb(77, 0, 154);
        background: linear-gradient(23deg, rgba(77, 0, 154, 1) 40%, rgba(232, 215, 255, 1) 74%);
        color: black
    }

    .bgcardred {
        background: rgb(0, 0, 0);
        background: linear-gradient(180deg, rgba(0, 0, 0, 1) 11%, rgba(255, 0, 0, 1) 69%);
        color: white
    }

    .color-box {
        width: 30px;
        height: 30px;
        margin-top: 5px;
    }
</style>