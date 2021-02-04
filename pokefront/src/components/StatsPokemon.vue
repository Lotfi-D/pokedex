<template>
    <div>
        <div class="row mt-3">
            <div class="col text-left font-weight-bold">
                Hp
            </div>
            <div class="col">
                {{hp}}
            </div>
            <div class="col">
                <div class="progress" style="max-width:10rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        :aria-valuenow="hp" aria-valuemin="0" aria-valuemax="100" v-bind:style="{ width: hp + '%' }"
                        v-bind:class="{infmoyenne:hp<68, supmoyenne:hp>68}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-3">
            <div class="col text-left font-weight-bold">
                Attack
            </div>
            <div class="col">
                {{attack}}
            </div>
            <div class="col">
                <div class="progress" style="max-width:20rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        :aria-valuenow="attack" aria-valuemin="0" aria-valuemax="100"
                        v-bind:style="{ width: attack + '%' }"
                        v-bind:class="{infmoyenne:attack<75 , supmoyenne:attack>75 }">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-left font-weight-bold">
                Defense
            </div>
            <div class="col">
                {{defense}}
            </div>
            <div class="col">
                <div class="progress" style="max-width:20rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        :aria-valuenow="defense" aria-valuemin="0" aria-valuemax="100"
                        v-bind:style="{ width: defense + '%' }"
                        v-bind:class="{infmoyenne:defense<70, supmoyenne:defense>70}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-left font-weight-bold">
                Sp. attack
            </div>
            <div class="col">
                {{sp_attack}}
            </div>
            <div class="col">
                <div class="progress" style="max-width:20rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        :aria-valuenow="sp_attack" aria-valuemin="0" aria-valuemax="100"
                        v-bind:style="{ width: sp_attack + '%' }"
                        v-bind:class="{infmoyenne:sp_attack<69, supmoyenne:sp_attack>69}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-left font-weight-bold">
                Sp. defense
            </div>
            <div class="col">
                {{sp_defense}}
            </div>
            <div class="col">
                <div class="progress" style="max-width:20rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        :aria-valuenow="sp_defense" aria-valuemin="0" aria-valuemax="100"
                        v-bind:style="{ width: sp_defense + '%' }"
                        v-bind:class="{infmoyenne:sp_defense<69, supmoyenne:sp_defense>69}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-left font-weight-bold">
                Speed
            </div>
            <div class="col">
                {{speed}}
            </div>
            <div class="col">
                <div class="progress" style="max-width:20rem">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
                        :aria-valuenow="speed" aria-valuemin="0" aria-valuemax="100"
                        v-bind:style="{ width: speed + '%' }" v-bind:class="{infmoyenne:speed<66, supmoyenne:speed>66}">
                    </div>
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
            id: Number,
        },
        data() {
            return {
                pokeInfo: {},
                hp: "",
                attack: "",
                defense: "",
                sp_attack: "",
                sp_defense: "",
                speed: ""
            }
        },
        beforeMount() {
            this.getPokemonStats();
        },
        methods: {
            async getPokemonStats() {
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
                            this.hp = this.pokeInfo.Stats[0].hp,
                            this.attack = this.pokeInfo.Stats[0].attack,
                            this.defense = this.pokeInfo.Stats[0].defense,
                            this.sp_attack = this.pokeInfo.Stats[0].sp_attack,
                            this.sp_defense = this.pokeInfo.Stats[0].sp_defense,
                            this.speed = this.pokeInfo.Stats[0].speed
                    })
            },
        },
    }
</script>
<style scoped>
    .infmoyenne {
        background-color: red;
    }

    .supmoyenne {
        background-color: green;

    }
</style>