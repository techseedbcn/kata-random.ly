<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Group Randomizer</div>

                    <div class="card-body">
                        I'm an example component.
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

            }
        },

        methods: {
            getRandomKata() {
                $randomKata = axios.get();
                $this.kata = $randomkata;
            }
        },

        mounted() {
            this.getRandomKata();
        }
    }
</script>
