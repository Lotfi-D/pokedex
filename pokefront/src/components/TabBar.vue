<template>
    <div class="container-fluid">
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
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#lotfi" role="tab"
                    aria-controls="contact">Evolutions</a>
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
            <div class="tab-pane fade" id="lotfi" role="tabpanel" aria-labelledby="contact-tab">
                <ListPokemon />
            </div>
        </div>
    </div>
</template>

<script>
    import ListPokemon from '@/components/ListPokemon.vue'
    import DescriptionPokemon from '@/components/DescriptionPokemon.vue'
    import StatsPokemon from '@/components/StatsPokemon.vue'

    export default {
        components: {
            ListPokemon,
            DescriptionPokemon,
            StatsPokemon
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