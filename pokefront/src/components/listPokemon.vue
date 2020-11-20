<template>
    <div class="container-fluid  ml-5">

        <table class="col-md-10 ml-5 mr-5 mt-5">

            <thead class="border border-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <br><br>

            <tbody v-for="item in listPokedex.data" :key="item.id_pok">
                <tr>

                    <td v-text="item.id"> </td>
                    <router-link v-bind:to="'/Pokemon/' + item.id">
                        <td> <img :src="return_Link(item)" style="height:90px" alt="image"> </td>
                    </router-link>
                    <td>
                        <p style="text-align: left;" v-text="item.nom_pok"> </p>
                    </td>
                    <td>
                        <p style="text-align: left;" v-text="item.type1"> </p>/<p style="text-align: left;"
                            v-text="item.type2"></p>
                    </td>

                </tr>
                <br>
            </tbody>
        </table>

    </div>
</template>


<script>
import axios from "axios"

export default {
name: 'Groupe',
data() {
    return {
        listPokedex: {},
    }

},

beforeMount() {
    this.showGroupe()
},



methods: {
    async showGroupe() {
        console.log("showgroupe")
        var myHeaders = new Headers();
        myHeaders.append("Authorization", "Bearer ");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };
        this.listPokedex = await axios.get("http://127.0.0.1:8000/api/v1/pokedex/", requestOptions)
        console.log(this.listPokedex.data)
    },
    return_Link(item) {
        console.log(item)
        console.log(`/assets/${item.image}`)
        return `/assets/${item.image}`
    }
},
    
}
</script>