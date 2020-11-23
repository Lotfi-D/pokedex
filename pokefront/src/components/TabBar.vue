<template>

 <div style="max-width: 50rem;">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile">Bases stats</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" >Weaknesses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#lotfi" role="tab" aria-controls="contact" >Evolutions</a>
            </li>
        </ul>
        <div class="tab-content mb-5" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><DescriptionPokemon /></div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Bjr Gacem</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Je n'ai plus d'idée</div>
            <div class="tab-pane fade" id="lotfi" role="tabpanel" aria-labelledby="contact-tab">
                <ListPokemon />
            </div>
        </div>
    </div>
</template>

<script>
    import ListPokemon from '@/components/ListPokemon.vue'
    import DescriptionPokemon from '@/components/DescriptionPokemon.vue'

    export default {
        components: {
            ListPokemon,
            DescriptionPokemon
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
