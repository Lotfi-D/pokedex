<template>
    <div class="container-fluid" style="max-width:35rem">
        <ul class="nav nav-tabs justify-content-center font-weight-bold" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#description" role="tab"
                    aria-controls="home">About</a>
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
                    aria-controls="contact">Evolutions {{btnText}}</a>
            </li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active text-center" id="description" role="tabpanel" aria-labelledby="home-tab">
                <DescriptionPokemon />
            </div>
            <div class="tab-pane fade text-center" id="stats" role="tabpanel" aria-labelledby="profile-tab">
                <StatsPokemon />
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Je n'ai plus d'idée
            </div>
            <div class="tab-pane fade" id="evolution" role="tabpanel" aria-labelledby="contact-tab">
                <EvolutionPokemon />
            </div>
        </div>
    </div>
</template>

<script>
    import DescriptionPokemon from '@/components/DescriptionPokemon.vue'
    import StatsPokemon from '@/components/StatsPokemon.vue'
    import EvolutionPokemon from '@/components/EvolutionPokemon.vue'

    export default {
        props:['btnText'],
        components: {
            DescriptionPokemon,
            StatsPokemon,
            EvolutionPokemon
        },
        name: 'TabBar',
        data() {
            return {

            }
        },

        methods: {

        },
    }
</script>