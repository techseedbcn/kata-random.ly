<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Group Randomizer</div>

                    <div class="card-body">
                        {{kata.name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'GroupRandomizer',
        components: {},
        data() {
            return {
                kata: {}
            }
        },

        methods: {
            getRandomKata() {
                axios.get('/api/random-kata').then(response => {
                    this.kata = response.data
                });
            }
        },

        mounted() {
            this.getRandomKata();
        }
    }
</script>
