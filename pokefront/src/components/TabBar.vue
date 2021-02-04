<template>
    <div class="container-fluid" style="max-width:35rem">
        <ul class="nav nav-tabs justify-content-center font-weight-bold" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="home">About</a> {{activeF}}
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#stats" role="tab"
                    aria-controls="profile">Stats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                    aria-controls="contact">Weaknesses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#evolution" role="tab"
                    aria-controls="contact">Evolutions </a>
            </li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active text-center" id="description" role="tabpanel" aria-labelledby="home-tab">
                <DescriptionPokemon :id="id" :name="name" />
            </div>
            <div class="tab-pane fade text-center" id="stats" role="tabpanel" aria-labelledby="profile-tab">
                <StatsPokemon :id="id" />
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <WeaknessStrengh :id="id" />
            </div>
            <div class="tab-pane fade" id="evolution" role="tabpanel" aria-labelledby="contact-tab">
                <EvolutionPokemon :id="id" :name="name" />
            </div>
        </div>
    </div>
</template>

<script>
    import DescriptionPokemon from '@/components/DescriptionPokemon.vue'
    import StatsPokemon from '@/components/StatsPokemon.vue'
    import EvolutionPokemon from '@/components/EvolutionPokemon.vue'
    import WeaknessStrengh from '@/components/WeaknessStrengh.vue'

    export default {
        name: 'TabBar',
        components: {
            DescriptionPokemon,
            StatsPokemon,
            EvolutionPokemon,
            WeaknessStrengh
        },
        props:{
            id:Number,
            name:String,
        },
        data() {
            return {

            }
        },
        methods: {

        },
    }
</script>