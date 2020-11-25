<template>
    <div class="container-fluid">
        <div class="card border-0">
            <h5 class="mt-3 card-header border-0 bg-white" id="weaknesses">Weaknesses : </h5>
            <div class="mt-1 ml-1 card-body row">
                <div class="mr-2" v-if="bug==2">
                    <img :src="return_type_written('bug')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="dark==2">
                    <img :src="return_type_written('dark')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="dragon==2">
                    <img :src="return_type_written('dragon')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="electric==2">
                    <img :src="return_type_written('electric')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="fairy==2">
                    <img :src="return_type_written('fairy')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="fight==2">
                    <img :src="return_type_written('fight')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="fire==2">
                    <img :src="return_type_written('fire')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="flying==2">
                    <img :src="return_type_written('flying')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="ghost==2">
                    <img :src="return_type_written('ghost')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="grass==2">
                    <img :src="return_type_written('grass')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="ground==2">
                    <img :src="return_type_written('ground')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="ice==2">
                    <img :src="return_type_written('ice')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="normal==2">
                    <img :src="return_type_written('normal')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="poison==2">
                    <img :src="return_type_written('poison')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="psychic==2">
                    <img :src="return_type_written('psychic')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="rock==2">
                    <img :src="return_type_written('rock')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="steel==2">
                    <img :src="return_type_written('steel')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="water==2" v-on:click="test()">
                    <img :src="return_type_written('water')" class="sizeItem" alt="no type's symbol">
                </div>
            </div>
        </div>

        <div class="card border-0">
            <h5 class="mt-3 card-header border-0 bg-white" id="strenghs">Efficience & Resistance : </h5>
            <div class="mt-1 ml-1 card-body row">
                <div class="mr-2" v-if="bug<1">
                    <img :src="return_type_written('bug')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="dark<1">
                    <img :src="return_type_written('dark')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="dragon<1">
                    <img :src="return_type_written('dragon')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="electric<1">
                    <img :src="return_type_written('electric')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="fairy<1">
                    <img :src="return_type_written('fairy')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="fight<1">
                    <img :src="return_type_written('fight')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="fire<1">
                    <img :src="return_type_written('fire')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="flying<1">
                    <img :src="return_type_written('flying')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="ghost<1">
                    <img :src="return_type_written('ghost')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="grass<1">
                    <img :src="return_type_written('grass')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="ground<1">
                    <img :src="return_type_written('ground')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="ice<1">
                    <img :src="return_type_written('ice')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="normal<1">
                    <img :src="return_type_written('normal')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="poison<1">
                    <img :src="return_type_written('poison')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="psychic<1">
                    <img :src="return_type_written('psychic')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="rock<1">
                    <img :src="return_type_written('rock')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="steel<1">
                    <img :src="return_type_written('steel')" class="sizeItem" alt="no type's symbol">
                </div>
                <div class="mr-2" v-if="water<1">
                    <img :src="return_type_written('water')" class="sizeItem" alt="no type's symbol">
                </div>
            </div>
        </div>

    </div>
</template>


<script>
    import axios from "axios"

    export default {
        name: 'StatsPokemon',
        components: {

        },
        props: {
            id: Number
        },
        data() {
            return {
                pokeInfo: {},
                bug: "",
                dark: "",
                dragon: "",
                electric: "",
                fairy: "",
                fight: "",
                fire: "",
                flying: "",
                ghost: "",
                grass: "",
                ground: "",
                ice: "",
                normal: "",
                poison: "",
                psychic: "",
                rock: "",
                steel: "",
                water: "",
                weaknesses: ""
            }
        },
        beforeMount() {
            this.getWeaknesses()
        },

        methods: {
            test(){
                alert(<DescriptionPokemon />)
            },
            async getWeaknesses() {
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
                            this.weaknesses = this.pokeInfo.Weaknesses[0]
                        this.bug = this.weaknesses.bug
                        this.dark = this.weaknesses.dark
                        this.dragon = this.weaknesses.dragon
                        this.electric = this.weaknesses.belectricug
                        this.fairy = this.weaknesses.fairy
                        this.fight = this.weaknesses.fight
                        this.fire = this.weaknesses.fire
                        this.flying = this.weaknesses.flying
                        this.ghost = this.weaknesses.ghost
                        this.grass = this.weaknesses.grass
                        this.ground = this.weaknesses.ground
                        this.ice = this.weaknesses.ice
                        this.normal = this.weaknesses.normal
                        this.poison = this.weaknesses.bupoisong
                        this.psychic = this.weaknesses.psychic
                        this.rock = this.weaknesses.rock
                        this.steel = this.weaknesses.steel
                        this.water = this.weaknesses.water
                        console.log(this.pokeInfo.Weaknesses)

                    })
            },

            return_type_written(type) {
                return `/assets/types/${type}` + `.png`
            },
        },
    }
</script>
<style scoped>
    #weaknesses {
        color: red;
        font-weight: bold;
    }

    #strenghs {
        color: green;
        font-weight: bold;
    }

    .sizeItem {
        width: 2.5rem;
    }
</style>