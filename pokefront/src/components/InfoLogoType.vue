<template>
    <div id="accordion" class="container-fluid mt-2">
        <div class="border-bottom border-dark">
            <a class="btn bg-0 dropdown-toggle text-left " data-toggle="collapse" data-target="#collapseOne"
                aria-expanded="true" aria-controls="collapseOne">
                Information's type
            </a>
            <div id="collapseOne" class="collapse mt-3">
                <div class="row mb-4">
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('bug')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('bug')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('dark')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('dark')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('dragon')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('dragon')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('electric')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('electric')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('fairy')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('fairy')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('fight')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('fight')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('fire')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('fire')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('flying')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('flying')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('ghost')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('ghost')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('grass')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('grass')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('ground')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('ground')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('ice')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('ice')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('normal')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('normal')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('poison')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('poison')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('psychic')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('psychic')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('rock')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('rock')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('steel')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('steel')" class="sizeTypeItem" alt="no type's written">
                    </div>
                    <div class="mr-2 border-0 ml-5">
                        <img :src="return_type('water')" class="sizeTypeItem" alt="no type's symbol">
                        <img :src="return_type_written('water')" class="sizeTypeItem" alt="no type's written">
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: 'InfoLogoType',
        components: {

        },
        data() {
            return {

            }
        },
        methods: {
            return_type(type) {
                return `/assets/types/${type}` + `.png`
            },
            return_type_written(type) {
                return `/assets/types_ecriture/${type}` + `.png`
            }
        },
    }
</script>
<style>
    .sizeTypeItem {
        width: 2.75rem;
    }
    .test{
        border-bottom:1px;
    }
</style>