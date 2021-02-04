<template>
<div>
{{openingHours.monday[0]}} <br>
{{openingHours.monday}}

<br><br><br><br>
<input v-model="openingHours.monday" v-on:keyup.enter="addRow()">

</div>


</template>

<script>
    export default {

        data() {
            return {
                openingHours:{
                    monday:[
                        {begin:"lo", end:""},
                        {begin:"", end:""},
                    ],
                    tuesday:[
                        {begin:"", end:""},
                        {begin:"", end:""},
                    ],
                    wednesday:[
                        {begin:"", end:""},
                        {begin:"", end:""},
                    ],
                    thursday:[
                        {begin:"", end:""},
                        {begin:"", end:""},
                    ],
                    friday:[],
                    saturday:[],
                    sunday:[]

                },

                daysSelected : {
                    monday:true,
                    tuesday:true,
                    wednesday:true,
                    thursday: true,
                    friday: false,
                    saturday:false,
                    sunday:false
                },

                hoursToAdd : {begin:"", end:""},
                
            }
        },
       
        
        methods: {
            addRow(daysSelected, hoursToAdd){
    this.monday.push(daysSelected, hoursToAdd); 
},
    }
}


</script>